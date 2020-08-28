<?php
//Base class of core methods only for Fragment
class WindUiFragmentRenderer{
    private function __construct() {}

    public static function startFragment(string $fragmentDir){
        //Start the Fragment

        //Convert fragment dir, to app root dir
        $fragmentDirExploded = explode("/fragments", $fragmentDir);
        $thisAppRootDir = $fragmentDirExploded[0];

        //Include all preferences and load all
        include_once(__DIR__ . "/../../base/settings/wind-ui-app-prefs-loader.php");
        WindUiAppPrefs::loadAllSettingsFromCurrentApp($thisAppRootDir);

        //Finally include the wind-ui-fragment-start, to print all initial code of Fragment
        include_once(__DIR__ . "/wind-ui-fragment-start.php");
    }

    public static function finishFragment(){
        //End the Fragment

        //To finish creation of Fragment, include wind-ui-fragment-finish to print all remaing code of Fragment
        include_once(__DIR__ . "/wind-ui-fragment-finish.php");
    }
}
?>