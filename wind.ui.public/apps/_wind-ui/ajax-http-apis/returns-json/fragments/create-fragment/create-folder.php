<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
//Receive the data
$createFolderInto = $_POST["createFolderInto"];
$folderName = $_POST["folderName"];
$password = $_POST["password"];

//Validate the data
$createFolderIntoValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false,
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"-,/"
            ), $createFolderInto);
$folderNameValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false,
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"-"
            ), $folderName);
$passwordValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false
            ), $password);

//Prepare the response
$response = new stdClass;
$response->passwordValid = false;
$response->folderCreated = false;

//If all variables is valid
if($createFolderIntoValid == true && $folderNameValid == true && $passwordValid == true){
    //Check if the password matches
    $passwordOk = true;
    $passwordFileContent = file_get_contents("../../../../../../../wind.ui.data/management-key.txt");
    if($passwordFileContent != md5($password))
        $passwordOk = false;
    $response->passwordValid = $passwordOk;

    //Start the app creation
    if($passwordOk == true){
        //Create the dir
        $dir = "../../../../../" . $createFolderInto . "/" . $folderName;

        //Check if the dir is valid
        if(is_dir($dir) == false){
            mkdir($dir);
            $response->folderCreated = true;
        }
    }
}

//Return the response
echo(json_encode($response));
?>