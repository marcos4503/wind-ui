<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php

//Vai retornar "true"
WindUiAppSessions::isCurrentSessionOfReceivedCookiesValid(false, false, true, true);


?>