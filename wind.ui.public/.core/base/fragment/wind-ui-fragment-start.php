<?php
//-------- WindUiAppPrefs:: already been included in this fragment and all preferences from this app is imported by wind-ui-fragment-prepare ----------

//Include core files on top of fragment
include_once(WindUiAppPrefs::$appRootPath . "/app-variables.php");
include_once(__DIR__ . "/../../library/backend/wind-ui-php.php");
WindUiPhp::$typeOfScriptCurrentlyUsingThisLib = "fragment";
include_once(__DIR__ . "/../../library/backend/wind-ui-app-sessions.php");

//Show the message to represent that is it a valid fragment content
echo("[Wind UI Fragment Successfully Loaded]<br>");

//Include the CSS file of fragment, if this exists
$possiblePathOfCssOfThisFragment = dirname($_SERVER["PHP_SELF"]) . "/" . basename(dirname($_SERVER["PHP_SELF"])) . ".css";
if(is_file($possiblePathOfCssOfThisFragment) == true){
    echo("<!-- CSS style file of this fragment -->");
    echo('<style id="windUiCssStyleOfFragment" type="text/css" app="wind.ui">');
    include($possiblePathOfCssOfThisFragment);
    echo("</style>");
}

//Include the Json manifest of fragment, if this exists
$possiblePathOfJsonOfThisFragment = dirname($_SERVER["PHP_SELF"]) . "/" . basename(dirname($_SERVER["PHP_SELF"])) . ".json";
if(is_file($possiblePathOfJsonOfThisFragment) == true){
    echo("<!-- JSON manifest file of this fragment -->");
    echo('<json id="windUiJsonFragmentManifest" type="text/json" app="wind.ui">');
    include($possiblePathOfJsonOfThisFragment);
    echo("</json>");
}

//Set default timezone of Wind UI
date_default_timezone_set(WindUiAppPrefs::$appPhpTimeZone);

//Redirect the user to client.php of site, if the user tries to access this fragment directly, instead of accessing it through a client.
if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    header("Location: " . WindUiAppPrefs::$appRootPath . "/client.php");
?>
<!-- ========================= Wind UI Start of Fragment Renderer base code ========================= -->