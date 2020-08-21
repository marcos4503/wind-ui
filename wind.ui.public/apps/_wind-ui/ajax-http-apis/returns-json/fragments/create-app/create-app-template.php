<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
//Receive the data
$appName = $_POST["appName"];
$folderName = $_POST["folderName"];
$appCode = $_POST["appCode"];
$appLang = $_POST["appLang"];
$password = $_POST["password"];

//Validate the data
$appNameValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false
            ), $appName);
$folderNameValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false,
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"-"
            ), $folderName);
$appCodeValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false,
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>".,-,_"
            ), $appCode);
$appLangValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false,
                "allowespecialchars"=>false,
                "specialcharsallowed"=>"-,_",
                "maxchars"=>6
            ), $appLang);
$passwordValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false
            ), $password);

//Prepare the response
$response = new stdClass;
$response->folderNameAvailable = false;
$response->passwordValid = false;
$response->appCreated = false;

//If all variables is valid
if($appNameValid == true && $folderNameValid == true && $appCodeValid == true && $appLangValid == true && $passwordValid == true){
    //Check if already have a folder with this name
    $folderAvailable = true;
    $appFoldersList = WindUiPhp::getListOfFoldersinDir("../../../../../");
    for($i = 0; $i < count($appFoldersList); $i++)
        if($appFoldersList[$i] == $folderName)
            $folderAvailable = false;
    $response->folderNameAvailable = $folderAvailable;

    //Check if the password matches
    $passwordOk = true;
    $passwordFileContent = file_get_contents("../../../../../../../wind.ui.data/management-key.txt");
    if($passwordFileContent != md5($password))
        $passwordOk = false;
    $response->passwordValid = $passwordOk;
    
    //Start the app creation
    if($folderAvailable == true && $passwordOk == true){
        //Create the path to apps root folder
        $appRootFolder = "../../../../../" . $folderName;
        
        //Create the app folder
        mkdir($appRootFolder, 0777);

        //Create the "ajax-http-apis" folders
        mkdir($appRootFolder . "/ajax-http-apis");
        mkdir($appRootFolder . "/ajax-http-apis/returns-html");
        mkdir($appRootFolder . "/ajax-http-apis/returns-json");
        $apiTemplateFilled = str_replace(array("%DIR_TO_CORE_FOLDER%"), 
                                         array("../../../.."),
                                         file_get_contents(WindUiPhp::getResourcePath("app-creation-template/ajax-http-apis/ajax-http-apis-template.php")));
        file_put_contents($appRootFolder . "/ajax-http-apis/returns-html/example.php", $apiTemplateFilled);
        file_put_contents($appRootFolder . "/ajax-http-apis/returns-json/example.php", $apiTemplateFilled);

        //Create the "components" folders
        mkdir($appRootFolder . "/components");
        mkdir($appRootFolder . "/components/Button");
        mkdir($appRootFolder . "/components/BoolField");
        mkdir($appRootFolder . "/components/DateField");
        mkdir($appRootFolder . "/components/FileField");
        mkdir($appRootFolder . "/components/FloatField");
        mkdir($appRootFolder . "/components/IntField");
        mkdir($appRootFolder . "/components/PasswordField");
        mkdir($appRootFolder . "/components/SelectField");
        mkdir($appRootFolder . "/components/StringField");
        mkdir($appRootFolder . "/components/TextField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/Button", $appRootFolder . "/components/Button");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/BoolField", $appRootFolder . "/components/BoolField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/DateField", $appRootFolder . "/components/DateField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/FileField", $appRootFolder . "/components/FileField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/FloatField", $appRootFolder . "/components/FloatField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/IntField", $appRootFolder . "/components/IntField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/PasswordField", $appRootFolder . "/components/PasswordField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/SelectField", $appRootFolder . "/components/SelectField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/StringField", $appRootFolder . "/components/StringField");
        WindUiPhp::copyDirContentToAnotherDir("../../../../components/TextField", $appRootFolder . "/components/TextField");

        //Create the "fragments" folders
        mkdir($appRootFolder . "/fragments");
        mkdir($appRootFolder . "/fragments/fragment1");
        mkdir($appRootFolder . "/fragments/fragment2");
        WindUiPhp::copyDirContentToAnotherDir(WindUiPhp::getResourcePath("app-creation-template/fragments/FragmentTemplate"), $appRootFolder . "/fragments/fragment1");
        WindUiPhp::copyDirContentToAnotherDir(WindUiPhp::getResourcePath("app-creation-template/fragments/FragmentTemplate"), $appRootFolder . "/fragments/fragment2");
        $fragment1JsonFilled = str_replace(array("%TITLE%", "%DESCRIPTION%", "%IMAGE%", "%EXTENSION%", "%PIXELS_SIZE_WIDTH%", "%PIXELS_SIZE_HEIGHT%", "%TYPE%", "%AUTHOR%", "%SECTION%", "%TAGS%", "%PUBLISH_TIME%"), 
                                          array("Fragment 1", "This is the fragment 1, of your app.", "app-image.png", "png", "512", "512", "website", "", "", "", ""),
                                          file_get_contents($appRootFolder . "/fragments/fragment1/FragmentTemplate.json"));
        $fragment2JsonFilled = str_replace(array("%TITLE%", "%DESCRIPTION%", "%IMAGE%", "%EXTENSION%", "%PIXELS_SIZE_WIDTH%", "%PIXELS_SIZE_HEIGHT%", "%TYPE%", "%AUTHOR%", "%SECTION%", "%TAGS%", "%PUBLISH_TIME%"), 
                                          array("Fragment 2", "This is the fragment 2, of your app.", "app-image.png", "png", "512", "512", "website", "", "", "", ""),
                                          file_get_contents($appRootFolder . "/fragments/fragment2/FragmentTemplate.json"));
        unlink($appRootFolder . "/fragments/fragment1/FragmentTemplate.json");
        unlink($appRootFolder . "/fragments/fragment2/FragmentTemplate.json");
        file_put_contents($appRootFolder . "/fragments/fragment1/fragment1.json", $fragment1JsonFilled);
        file_put_contents($appRootFolder . "/fragments/fragment2/fragment2.json", $fragment2JsonFilled);
        rename($appRootFolder . "/fragments/fragment1/FragmentTemplate.css", $appRootFolder . "/fragments/fragment1/fragment1.css");
        rename($appRootFolder . "/fragments/fragment2/FragmentTemplate.css", $appRootFolder . "/fragments/fragment2/fragment2.css");
        rename($appRootFolder . "/fragments/fragment1/FragmentTemplate.js", $appRootFolder . "/fragments/fragment1/fragment1.js");
        rename($appRootFolder . "/fragments/fragment2/FragmentTemplate.js", $appRootFolder . "/fragments/fragment2/fragment2.js");
        $fragment1PhpFilled = str_replace(array("%DIR_TO_CORE_FOLDER%", "%ADITIONAL_CONTENT_CODE%"), 
                                          array("../../../..", "This is content of the fragment 1 of your new App! You can render components and other things here."),
                                          file_get_contents($appRootFolder . "/fragments/fragment1/FragmentTemplate.php"));
        $fragment2PhpFilled = str_replace(array("%DIR_TO_CORE_FOLDER%", "%ADITIONAL_CONTENT_CODE%"), 
                                          array("../../../..", "This is content of the fragment 2 of your new App! You can render components and other things here."),
                                          file_get_contents($appRootFolder . "/fragments/fragment2/FragmentTemplate.php"));
        unlink($appRootFolder . "/fragments/fragment1/FragmentTemplate.php");
        unlink($appRootFolder . "/fragments/fragment2/FragmentTemplate.php");
        file_put_contents($appRootFolder . "/fragments/fragment1/fragment1.php", $fragment1PhpFilled);
        file_put_contents($appRootFolder . "/fragments/fragment2/fragment2.php", $fragment2PhpFilled);

        //Create the "resources" folder
        mkdir($appRootFolder . "/resources");
        mkdir($appRootFolder . "/resources/icons");
        mkdir($appRootFolder . "/resources/images");
        mkdir($appRootFolder . "/resources/sounds");
        mkdir($appRootFolder . "/resources/php");
        mkdir($appRootFolder . "/resources/text");
        mkdir($appRootFolder . "/resources/others");
        mkdir($appRootFolder . "/resources/videos");
        WindUiPhp::copyDirContentToAnotherDir(WindUiPhp::getResourcePath("app-creation-template/resources/icons"), $appRootFolder . "/resources/icons");
        WindUiPhp::copyDirContentToAnotherDir(WindUiPhp::getResourcePath("app-creation-template/resources/images"), $appRootFolder . "/resources/images");

        //Create the "thirdparty-libs" folders
        mkdir($appRootFolder . "/thirdparty-libs");
        WindUiPhp::copyDirContentToAnotherDir(WindUiPhp::getResourcePath("app-creation-template/thirdparty-libs"), $appRootFolder . "/thirdparty-libs");

        //Create the "app-css-style.php" file
        copy(WindUiPhp::getResourcePath("app-creation-template/app-css-style-template.php"), $appRootFolder . "/app-css-style.php");

        //Create the "app-javascript.php" file
        copy(WindUiPhp::getResourcePath("app-creation-template/app-javascript-template.php"), $appRootFolder . "/app-javascript.php");

        //Create the "app-settings.json" file
        $appSettingsJsonFilled = str_replace(array("%APP_NAME%", "%APP_CODE%", "%APP_LANG%"), 
                                             array($appName, $appCode, $appLang),
                                             file_get_contents(WindUiPhp::getResourcePath("app-creation-template/app-settings-template.json")));
        file_put_contents($appRootFolder . "/app-settings.json", $appSettingsJsonFilled);

        //Create the "app-variables.php" file
        copy(WindUiPhp::getResourcePath("app-creation-template/app-variables-template.php"), $appRootFolder . "/app-variables.php");

        //Create the "client.php" file
        copy(WindUiPhp::getResourcePath("app-creation-template/client-template.php"), $appRootFolder . "/client.php");

        //Register that the app is created
        $response->appCreated = true;
    }
}

//Return the response
echo(json_encode($response));
?>