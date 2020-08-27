<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
//Receive the data
$apiDir = $_POST["apiDir"];
$apiName = $_POST["apiName"];
$password = $_POST["password"];

//Validate the data
$apiDirValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"_,-,/",
                "allowempty"=>false
            ), $apiDir);
$apiNameValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"-",
                "allowempty"=>false
            ), $apiName);
$passwordValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false
            ), $password);

//Prepare the response
$response = new stdClass;
$response->passwordValid = false;
$response->apiCreated = false;

//If all variables is valid
if($apiDirValid == true && $apiNameValid == true && $passwordValid == true){
    //Check if the password matches
    $passwordOk = true;
    $passwordFileContent = file_get_contents("../../../../../../../wind.ui.data/management-key.txt");
    if($passwordFileContent != md5($password))
        $passwordOk = false;
    $response->passwordValid = $passwordOk;

    //Start the fragment creation
    if($passwordOk == true){
        //Create the fragment dir
        $apiDir = "../../../../../" . $apiDir . "/" . $apiName . ".php";

        //If the dir is not created
        if(is_file($apiDir) == false){
            //Create the fragment.php
            $levelsToCore = "..";
            $bars = count(explode("/", str_replace("../../../../../", "", $apiDir)));
            for($i = 0; $i < $bars; $i++){
                if($i == 0)
                    continue;
                $levelsToCore .= "/..";
            }
            $apiPhp = str_replace(array("%DIR_TO_CORE_FOLDER%"), 
                                      array($levelsToCore),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/ajax-http-apis/ajax-http-apis-template.php")));
            file_put_contents($apiDir, $apiPhp);

            //Return the fragment created
            $response->apiCreated = true;
        }
    }
}

//Return the response
echo(json_encode($response));
?>