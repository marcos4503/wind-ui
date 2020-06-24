<?php
//Base class of core methods only for Client.php
class WindUiClientRenderer{
    private function __construct() {}

    //Base vars (parameters) of Client.php
    public static $thisAppRootDir = "";
    public static $externalJsLibs = array();
    public static $externalCssLibs = array();
    public static $thirdPartyBeforeBodyCloseJsLibs = array();
    public static $thirdPartyOnHeadJsLibs = array();
    public static $thirdPartyCssLibs = array();
    public static $defaultFragmentToLoad = "noDefaultFragmentDefined";

    public static function setParameters(stdClass $params){
        //Catch all params in array of vars and store in this PHP file
        self::$thisAppRootDir = self::getFirstVariableThatMatch("thisAppRootDir", $params);
        self::$externalJsLibs = self::getArrayOfAllVariablesThatMatch("externalJsLib_", $params);
        self::$externalCssLibs = self::getArrayOfAllVariablesThatMatch("externalCssLib_", $params);
        self::$thirdPartyBeforeBodyCloseJsLibs = self::getArrayOfAllVariablesThatMatch("thirdPartyBeforeBodyCloseJsLib_", $params);
        self::$thirdPartyOnHeadJsLibs = self::getArrayOfAllVariablesThatMatch("thirdPartyOnHeadJsLib_", $params);
        self::$thirdPartyCssLibs = self::getArrayOfAllVariablesThatMatch("thirdPartyCssLib_", $params);
        self::$defaultFragmentToLoad = self::getFirstVariableThatMatch("defaultFragmentToLoad", $params);
    }

    public static function startClient(){
        //Start the Client.php

        //Get params from URL in client.php
        $fragmentUrlParam = $_GET["fragment"];

        //Set code to load a startup fragment
        if ($fragmentUrlParam != "")
            if(is_file(self::$thisAppRootDir . "/fragments/" . $fragmentUrlParam . "/".$fragmentUrlParam.".php") == true)
                self::$defaultFragmentToLoad = $fragmentUrlParam;

        //Finally include the wind-ui-client-start, to print all initial code of client.php
        include_once(__DIR__ . "/wind-ui-client-start.php");
    }

    public static function finishClient(){
        //End the Client.php

        //To finish creation of client.php, include wind-ui-client-finish to print all remaing code of client.php
        include_once(__DIR__ . "/wind-ui-client-finish.php");
    }

    public static function getFirstVariableThatMatch($variableName, stdClass $params){
        //Get a variable from params
        foreach (get_object_vars($params) as $variable => $value) 
            if (strpos($variable, $variableName) !== false)
                return $value;
    }

    public static function getArrayOfAllVariablesThatMatch($variableName, stdClass $params){
        //Get a array of values of all variables that names match with variableName
        $values = array();
        foreach (get_object_vars($params) as $variable => $value) 
            if (strpos($variable, $variableName) !== false)
                array_push($values, $value);
        return $values;
    }
}
?>