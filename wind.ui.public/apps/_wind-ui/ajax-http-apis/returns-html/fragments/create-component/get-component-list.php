<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<ul>
    <?php
        $appToReceive = $_POST["appToReceive"]; 
        $appFoldersList = WindUiPhp::getListOfFoldersInDir(__DIR__. "/../../../../.." . "/" . $appToReceive . "/components");
        for($i = 0; $i < count($appFoldersList); $i++)
            echo("<li>" . $appFoldersList[$i] . "</li>");
    ?>
</ul>