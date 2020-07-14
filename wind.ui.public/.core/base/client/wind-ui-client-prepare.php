<?php
//Base class of core methods only for Client.php
class WindUiClientRenderer{
    private function __construct() {}

    public static function startClient($thisAppRootDir){
        //Start the Client.php

        //Include all preferences and load all
        include_once(__DIR__ . "/../../base/settings/wind-ui-app-prefs-loader.php");
        WindUiAppPrefs::loadAllSettingsFromCurrentApp($thisAppRootDir);

        //Finally include the wind-ui-client-start, to print all initial code of client.php
        include_once(__DIR__ . "/wind-ui-client-start.php");
    }

    public static function finishClient(){
        //End the Client.php

        //To finish creation of client.php, include wind-ui-client-finish to print all remaing code of client.php
        include_once(__DIR__ . "/wind-ui-client-finish.php");
    }
}
?>