<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
//Receive the data
$appToList = $_POST["appToList"];

//Validate the data
$appToListValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false,
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"_,-"
            ), $appToList);

//If the app is valid
if($appToListValid == true){
    echo("<ul>");

    echo("<li>(<a onclick=\"selectFolderAndNextStep('" . $appToList . "/fragments');\">Selecionar Raiz</a>)</li>");
    //Run recursivelly, getting all list of folders inside "fragments" of a app
    $fragmentsOfAppDir = "../../../../../" . $appToList . "/fragments";
    listAllFolderWithoutFragmentData($appToList, $fragmentsOfAppDir);

    echo("</ul>");
}
else{
    echo("<center>O aplicativo informado, não é válido.</center>");
}

//Function to list all folders of a directory. Skip folders that contains a fragment
function listAllFolderWithoutFragmentData(string $app, string $dir){
    //Get all folders inside dir
    $folders = WindUiPhp::getListOfFoldersInDir($dir);
    for($i = 0; $i < count($folders); $i++){
        if(is_file($dir . "/" . $folders[$i] . "/" . $folders[$i] . ".php") == true)
            echo("<li><b>" . $folders[$i] . "</b> (Fragmento)</li>");
        if(is_file($dir . "/" . $folders[$i] . "/" . $folders[$i] . ".php") == false){
            $foldersInside = WindUiPhp::getListOfFoldersInDir($dir . "/" . $folders[$i]);
            echo("<li><b>" . $folders[$i] . "</b> (<a onclick=\"selectFolderAndNextStep('" . $app . "/fragments/" . $folders[$i] . "');\">Selecionar</a>)</li>");
            if(count($foldersInside) > 0){
                echo("<ul>");
                listAllFolderWithoutFragmentData($app, $dir . "/" . $folders[$i]);
                echo("</ul>");
            }
        }
    }
}
?>