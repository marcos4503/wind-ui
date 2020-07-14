<?php
//-------- WindUiAppPrefs:: already been included in this fragment and all preferences from this app is imported by wind-ui-fragment-prepare ----------

//Include core files on top of fragment
include_once(WindUiAppPrefs::$appRootPath . "/app-variables.php");
include_once(__DIR__ . "/../../library/backend/wind-ui-php.php");
WindUiPhp::$typeOfScriptCurrentlyUsingThisLib = "fragment";

//Set default timezone of Wind UI
date_default_timezone_set(WindUiAppPrefs::$appPhpTimeZone);

//Redirect the user to client.php of site, if the user tries to access this fragment directly, instead of accessing it through a client.
if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    header("Location: " . WindUiAppPrefs::$appRootPath . "/client.php");

?>
<!-- ========================= Wind UI Start of Fragment Renderer base code ========================= -->