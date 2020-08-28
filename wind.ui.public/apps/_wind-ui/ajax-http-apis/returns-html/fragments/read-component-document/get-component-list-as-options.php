<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
    $appToReceive = $_POST["appToReceive"]; 
    $appFoldersList = WindUiPhp::getListOfFoldersInDir(__DIR__. "/../../../../.." . "/" . $appToReceive . "/components");
    $optionsHtml = "";
    for($i = 0; $i < count($appFoldersList); $i++)
        $optionsHtml .= '<option value="'.$appFoldersList[$i].'">'.$appFoldersList[$i].'</option>';
    echo($optionsHtml);
?>