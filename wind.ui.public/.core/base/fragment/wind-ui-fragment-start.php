<?php
//Include core files on top of fragment
include_once(WindUiFragmentRenderer::$thisAppRootDir . "app-settings.php");
include_once(__DIR__ . "/../../library/backend/wind-ui-php.php");
WindUiPhp::$typeOfScriptCurrentlyUsingThisLib = "fragment";

//Set default timezone of Wind UI
date_default_timezone_set(WindUiAppPrefs::$appPhpTimeZone);
?>
<!-- ========================= Wind UI Start of Fragment Renderer base code ========================= -->