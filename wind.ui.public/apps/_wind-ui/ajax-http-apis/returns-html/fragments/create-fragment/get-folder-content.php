<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<ul>
    <?php
        $dir = $_POST["folder"];
        $folderList = WindUiPhp::getListOfFoldersInDir(__DIR__. "/../../../../../" . $dir);
        for($i = 0; $i < count($folderList); $i++)
            echo("<li>" . $folderList[$i] . "</li>");
        $filesList = WindUiPhp::getListOfFilesInDir(__DIR__. "/../../../../../" . $dir);
        for($i = 0; $i < count($filesList); $i++)
            echo("<li>" . $filesList[$i] . "</li>");
        if(count($folderList) == 0 && count($filesList) == 0)
            echo("<li>Nenhum conteúdo</li>");
    ?>
</ul>