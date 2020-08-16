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
        $appsRootFolder = "../../../../../" . $folderName;
        
        //Create the app folder
        mkdir($appsRootFolder, 0777);

        //Read the list of folders to make
        $listOfFoldersJson = file_get_contents(WindUiPhp::getResourcePath("app-creation-template/list-of-folders.json"));
        $listOfFolders = json_decode($listOfFoldersJson)->folders;
        for($i = 0; $i < count($listOfFolders); $i++)
            mkdir($appsRootFolder . "/" . $listOfFolders[$i], 0777);

        

        //Register that the app is created
        $response->appCreated = true;
    }
}

//Return the response
echo(json_encode($response));
?>