<?php
//Base class of core methods only for Fragment
class WindUiFragmentRenderer{
    private function __construct() {}

    //Base vars (parameters) of Fragment
    public static $thisAppRootDir = "";
    public static $thisFragmentTitle = "";

    public static function setParameters(stdClass $params){
        //Catch all params in array of vars and store in this PHP file
        self::$thisAppRootDir = self::getFirstVariableThatMatch("thisAppRootDir", $params);
        self::$thisFragmentTitle = self::getFirstVariableThatMatch("thisFragmentTitle", $params);
    }

    public static function startFragment(){
        //Start the Fragment

        //Finally include the wind-ui-fragment-start, to print all initial code of Fragment
        include_once(__DIR__ . "/wind-ui-fragment-start.php");
    }

    public static function finishFragment(){
        //End the Fragment

        //To finish creation of Fragment, include wind-ui-fragment-finish to print all remaing code of Fragment
        include_once(__DIR__ . "/wind-ui-fragment-finish.php");
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