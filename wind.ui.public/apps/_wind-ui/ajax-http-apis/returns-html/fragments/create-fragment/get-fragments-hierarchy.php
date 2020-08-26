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

    echo("<li>".
            "<div style=\"display: grid; grid-template-columns: 24px auto; width: 100%;\">".
                "<img src=\"".WindUiPhp::getResourcePath("menu-icons/folder.png")."\" style=\"width: 100%;\" />".
                "<div style=\"margin-left: 4px; display: flex; align-items: center;\">(<a onclick=\"selectFolderAndNextStep('" . $appToList . "/fragments');\">Selecionar Raiz</a>)<div style=\"margin-left: 4px;\">(<a onclick=\"openFolderCreationInterface('" . $appToList . "/fragments');\">Criar Pasta</a>)</div></div>".
            "</div>".
        "</li>");
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
            echo("<li>".
                    "<div style=\"display: grid; grid-template-columns: 24px auto; width: 100%;\">".
                        "<img src=\"".WindUiPhp::getResourcePath("menu-icons/create-fragment.png")."\" style=\"width: 100%;\" />".
                        "<div style=\"margin-left: 4px; display: flex; align-items: center;\"><b>" . $folders[$i] . "</b></div>".
                    "</div>".
                "</li>");
        if(is_file($dir . "/" . $folders[$i] . "/" . $folders[$i] . ".php") == false){
            $foldersInside = WindUiPhp::getListOfFoldersInDir($dir . "/" . $folders[$i]);
            echo("<li>".
                    "<div style=\"display: grid; grid-template-columns: 24px auto; width: 100%;\">".
                        "<img src=\"".WindUiPhp::getResourcePath("menu-icons/folder.png")."\" style=\"width: 100%;\" />".
                        "<div style=\"margin-left: 4px; display: flex; align-items: center;\"><b>" . $folders[$i] . "</b><div style=\"margin-left: 4px;\">(<a onclick=\"selectFolderAndNextStep('".getFullPathToThisItem($app, $dir, $folders[$i])."');\">Selecionar</a>)</div><div style=\"margin-left: 4px;\">(<a onclick=\"openFolderCreationInterface('".getFullPathToThisItem($app, $dir, $folders[$i])."');\">Criar Pasta</a>)</div></div>".
                    "</div>".
                "</li>");
            if(count($foldersInside) > 0){
                echo("<ul>");
                    listAllFolderWithoutFragmentData($app, $dir . "/" . $folders[$i]);
                echo("</ul>");
            }
        }
    }
}

//Return the path of a item
function getFullPathToThisItem(string $app, string $pathToParent, string $itemName){
    return ($app . "/" . array_pop(explode("../../../../../" . $app . "/", $pathToParent)) . "/". $itemName);
}
?>