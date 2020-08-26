<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
//Receive the data
$fragmentDir = $_POST["fragmentDir"];
$fragmentName = $_POST["fragmentName"];
$fragmentTitle = $_POST["fragmentTitle"];
$fragmentDescription = $_POST["fragmentDescription"];
$fragmentImage = $_POST["fragmentImage"];
$fragmentType = $_POST["fragmentType"];
$fragmentArticleAuthor = $_POST["fragmentArticleAuthor"];
$fragmentArticleSection = $_POST["fragmentArticleSection"];
$fragmentArticleTags = $_POST["fragmentArticleTags"];
$password = $_POST["password"];

//Validate the data
$fragmentDirValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"-,/",
                "allowempty"=>false
            ), $fragmentDir);
$fragmentNameValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"-",
                "allowempty"=>false
            ), $fragmentName);
$fragmentTitleValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false
            ), $fragmentTitle);
$fragmentDescriptionValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(), $fragmentDescription);
$fragmentImageValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(), $fragmentImage);
$fragmentTypeValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowespecialchars"=>false,
                "allowempty"=>false
            ), $fragmentType);
$fragmentArticleAuthorValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(), $fragmentArticleAuthor);
$fragmentArticleSectionValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(), $fragmentArticleSection);
$fragmentArticleTagsValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowespecialchars"=>false,
                "specialcharsallowed"=>"comma, "
            ), $fragmentArticleTags);
$passwordValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false
            ), $password);

//Prepare the response
$response = new stdClass;
$response->passwordValid = false;
$response->fragmentCreated = false;
$response->imageOfManifestFounded = false;

//If all variables is valid
if($fragmentDirValid == true && $fragmentNameValid == true && $fragmentTitleValid == true && $fragmentDescriptionValid == true && $fragmentImageValid == true && $fragmentTypeValid == true && $fragmentArticleAuthorValid == true && $fragmentArticleSectionValid == true && $fragmentArticleTagsValid == true && $passwordValid == true){
    //Check if the password matches
    $passwordOk = true;
    $passwordFileContent = file_get_contents("../../../../../../../wind.ui.data/management-key.txt");
    if($passwordFileContent != md5($password))
        $passwordOk = false;
    $response->passwordValid = $passwordOk;

    //Start the fragment creation
    if($passwordOk == true){
        //Create the fragment dir
        $fragmentDir = "../../../../../" . $fragmentDir . "/" . $fragmentName;

        //If the dir is not created
        if(is_dir($fragmentDir) == false){
            //Create the dir
            mkdir($fragmentDir);

            //Create the fragment.js
            $fragmentJs = str_replace(array("%VAR%"), 
                                      array("content"),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/fragments/FragmentTemplate/FragmentTemplate.js")));
            file_put_contents($fragmentDir . "/" . $fragmentName . ".js", $fragmentJs);

            //Create the fragment.css
            $fragmentCss = str_replace(array("%VAR%"), 
                                      array("content"),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/fragments/FragmentTemplate/FragmentTemplate.css")));
            file_put_contents($fragmentDir . "/" . $fragmentName . ".css", $fragmentCss);

            //Create the fragment.json
            $appName = array_shift(explode("/fragments/", str_replace("../../../../../", "", $fragmentDir)));
            $imagePath = ("../../../../../" . $appName . "/resources/" . $fragmentImage);
            if(file_exists($imagePath) == true){
                $imageExtension = WindUiPhp::getExtensionOfFile($imagePath);
                list($width, $height, $type, $attr) = getimagesize($imagePath);
                $response->imageOfManifestFounded = true;
            }
            $publishTime = date("Y/m/d H:i");
            $fragmentJson = str_replace(array("%TITLE%", "%DESCRIPTION%", "%IMAGE%", "%EXTENSION%", "%PIXELS_SIZE_WIDTH%", "%PIXELS_SIZE_HEIGHT%", "%TYPE%", "%AUTHOR%", "%SECTION%", "%TAGS%", "%PUBLISH_TIME%"), 
                                      array($fragmentTitle, $fragmentDescription, $fragmentImage, $imageExtension, $width, $height, $fragmentType, $fragmentArticleAuthor, $fragmentArticleSection, $fragmentArticleTags, $publishTime),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/fragments/FragmentTemplate/FragmentTemplate.json")));
            file_put_contents($fragmentDir . "/" . $fragmentName . ".json", $fragmentJson);

            //Create the fragment.php
            $levelsToCore = "..";
            $bars = count(explode("/", str_replace("../../../../../", "", $fragmentDir)));
            for($i = 0; $i < $bars; $i++)
                $levelsToCore .= "/..";
            $fragmentPhp = str_replace(array("%ADITIONAL_CONTENT_CODE%", "%DIR_TO_CORE_FOLDER%"), 
                                      array("This is the fragment \"" . $fragmentName . "\" created with Wind UI App.", $levelsToCore),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/fragments/FragmentTemplate/FragmentTemplate.php")));
            file_put_contents($fragmentDir . "/" . $fragmentName . ".php", $fragmentPhp);

            //Return the fragment created
            $response->fragmentCreated = true;
        }
    }
}

//Return the response
echo(json_encode($response));
?>