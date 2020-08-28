<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
    $appToReceive = $_POST["appToReceive"]; 
    $componentName = $_POST["componentName"];
    $componentDir = (__DIR__. "/../../../../.." . "/" . $appToReceive . "/components/" . $componentName);
    $componentFilesList = WindUiPhp::getListOfFilesInDir($componentDir);
    $contentOfAllMd = "";
    for($i = 0; $i < count($componentFilesList); $i++)
        if(WindUiPhp::getExtensionOfFile($componentDir . "/" . $componentFilesList[$i]) == "md")
            $contentOfAllMd .= '<h3>'.$componentFilesList[$i].'</h3><pre style="user-select: text;">' . file_get_contents($componentDir . "/" . $componentFilesList[$i]) . "</pre>";
    echo($contentOfAllMd);
?>