<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
//Receive the data
$appToDelete = $_POST["appToDelete"];
$password = $_POST["password"];

//Validate the data
$appToDeleteValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false,
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"-"
            ), $appToDelete);
$passwordValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false
            ), $password);

//Prepare the response
$response = new stdClass;
$response->passwordValid = false;
$response->appDeleted = false;

//If all variables is valid
if($appToDelete == true && $password == true){
    //Check if the password matches
    $passwordOk = true;
    $passwordFileContent = file_get_contents("../../../../../../../wind.ui.data/management-key.txt");
    if($passwordFileContent != md5($password))
        $passwordOk = false;
    $response->passwordValid = $passwordOk;
    
    //Start the app creation
    if($passwordOk == true){
        //If app to delete is equal to "_wind-ui", cancel the app delete
        if($appToDelete != "_wind-ui"){
            WindUiPhp::deleteDirContent("../../../../../" . $appToDelete);
        }

        //Register that the app is created
        $response->appDeleted = true;
    }
}

//Return the response
echo(json_encode($response));
?>