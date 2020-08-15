<?php
//Base class of core methods only for ajax http apis
class WindUiAjaxHttpApi{
    private function __construct() {}

    public static function startAjaxHttpApiRequestProcessing(string $apiDir){
        //Start the Ajax-Http-Api

        //Convert api dir, to app root dir
        $apiDirExploded = explode("/ajax-http-apis/", $apiDir);
        $thisAppRootDir = $apiDirExploded[0];

        //Include all preferences and load all
        include_once(__DIR__ . "/../../base/settings/wind-ui-app-prefs-loader.php");
        WindUiAppPrefs::loadAllSettingsFromCurrentApp($thisAppRootDir);

        //Include app variables
        include_once(WindUiAppPrefs::$appRootPath . "/app-variables.php");

        //Include PHP backend library
        include_once(__DIR__ . "/../../library/backend/wind-ui-php.php");
        WindUiPhp::$typeOfScriptCurrentlyUsingThisLib = "ajax-http-api";
        include_once(__DIR__ . "/../../library/backend/wind-ui-app-sessions.php");

        //Set default timezone of Wind UI
        date_default_timezone_set(WindUiAppPrefs::$appPhpTimeZone);
<<<<<<< HEAD
<<<<<<< HEAD

        //Show the message to represent that is it a content returned by API
        echo("[Wind UI API Successfully Loaded]<br>");
=======
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
=======
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5
    }
}
?>