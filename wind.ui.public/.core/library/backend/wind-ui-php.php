<?php
    //Base vars of methods
    $fragmentsViewerAlreadyRendered = false;

    //Wind UI Core methods class. All methods acessible for Apps(fragments and components) from Wind UI Core
    class WindUiPhp{
        //Vars of library
        public static $typeOfScriptCurrentlyUsingThisLib = "unknown"; //Can be "client", "fragment" or "ajax-http-api"

        private function __construct() {}

        //Basic tools for all methods

        public static function isJson(string $string) {
            //Return true if string is json
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }

        public static function DOMinnerHTML(DOMNode $element) { 
            ///Return innerHTML of a XML or HTML node
            $innerHTML = ""; 
            $children  = $element->childNodes;

            foreach ($children as $child) 
                $innerHTML .= $element->ownerDocument->saveHTML($child);
                
            return $innerHTML; 
        }

        //Core methods

        public static function getResourcePath(string $resPath){
            //Return path to a file founded in "my-resources"
            if($resPath != "")
                return(WindUiAppPrefs::$appRootPath . "/resources/" . $resPath);
            if($resPath == "")
                return(WindUiAppPrefs::$appRootPath . "/resources");
        }

        public static function getPathToFragmentPhpFileBasingOnGetFragmentParamInUrl(string $fragmentGetParamInUrl){
            //Returns path to fragment PHP file with the "fragment" url GET param

            //Split fragment url param
            $fragmentUrlParamSplited = explode("/", $fragmentGetParamInUrl);

            //Get file from fragment param
            $file = "";
            if (count($fragmentUrlParamSplited) == 1)
                $file = $fragmentUrlParamSplited[0];
            if (count($fragmentUrlParamSplited) > 1)
                $file = $fragmentUrlParamSplited[count($fragmentUrlParamSplited) - 1];

            return WindUiAppPrefs::$appRootPath . "/fragments/" . $fragmentGetParamInUrl . "/" . $file . ".php";
        }

        public static function getValueOfSpecificOgMetaTagFromFragmentJsonManifest(string $fragmentGetParamInUrl, string $desiredOgMetaTag){
            //Read json manifest of a fragment and return desired metatag from it
            $phpFragmentFilePath = self::getPathToFragmentPhpFileBasingOnGetFragmentParamInUrl($fragmentGetParamInUrl);

            //Convert PHP file path, to a json manifest file path
            $fragmentFilePathDir = dirname($phpFragmentFilePath);
            $fragmentFilePhpName = basename($fragmentFilePathDir);
            $fragmentJsonManifestFilePath = $fragmentFilePathDir . "/" . $fragmentFilePhpName . ".json";

            //If file json of manifest not found, return error
            if(is_file($fragmentJsonManifestFilePath) == false)
                return WindUiAppPrefs::$fragmentsViewerNotFoundTitleMessage;

            //Get json code of file
            $jsonCode = file_get_contents($fragmentJsonManifestFilePath);

            //Verify if is valid json
            if(self::isJson($jsonCode) == true){
                //Decode the json
                $jsonFinal = json_decode($jsonCode);

                //Get the variable from json
                foreach (get_object_vars($jsonFinal) as $variable => $value) 
                    if (strpos($variable, $desiredOgMetaTag) !== false)
                        return $value;

                //If variable not found, return empty string
                return WindUiAppPrefs::$fragmentsViewerNotFoundTitleMessage;
            }
            if(self::isJson($jsonCode) == false)
                return WindUiAppPrefs::$fragmentsViewerNotFoundTitleMessage;
        }

        public static function renderFragmentsViewerHere(){
            global $fragmentsViewerAlreadyRendered;

            //Stop if is a fragment
            if(self::$typeOfScriptCurrentlyUsingThisLib != "client"){
                echo('<br><b>Wind UI:</b> Could not render FragmentsViewer here. This component can\'t rendered inside a Fragment.');
                return;
            }

            //Stop if already is rendered
            if($fragmentsViewerAlreadyRendered == true){
                echo('<br><b>Wind UI:</b> This Client already have a FragmentsViewer rendered! Stoping renderization of a new...');
                return;
            }

            //Render the fragments view
            $code = '<div id="windUiClientFragmentsViewer" class="windUiClientFragmentsViewer" style="width: 100%; min-height: '.WindUiAppPrefs::$fragmentsViewerMinHeightPx.'px; word-wrap: break-word;"></div>';
            echo($code);
            $fragmentsViewerAlreadyRendered = true;
        }
        
        public static function renderComponentHere(string $componentFolderName, stdClass $variables, bool $warnIfThisComponentHaveNotUsedVars){
            //Stop if is a client
            if(self::$typeOfScriptCurrentlyUsingThisLib != "fragment"){
                echo('<br><b>Wind UI:</b> Could not render Component "'.$componentFolderName.'" here. All components only can rendered inside a Fragment.');
                return;
            }
            
            $backTrace = debug_backtrace();
            $phpScriptCaller = array_shift($backTrace);

            //Include HTML block of a component.xml in a place that this method are called
            $xmlFileOfComponent = WindUiAppPrefs::$appRootPath."/components/".$componentFolderName."/".$componentFolderName.".xml";
            if(is_file($xmlFileOfComponent) == true){

                //Read the document and get content of json, to know default value of all variables
                $jsonDefaultVariablesValues = new stdClass;
                $dom = new DOMDocument;
                $dom->loadXML(file_get_contents($xmlFileOfComponent));
                $jsonTags = $dom->getElementsByTagName("json");
                foreach($jsonTags as $jsonTags){
                    if($jsonTags->getAttribute('type') == "text/json" && $jsonTags->getAttribute('app') == "wind.ui"){
                        $innerHTML = self::DOMinnerHTML($jsonTags);
                        if(self::isJson($innerHTML) == true)
                            $jsonDefaultVariablesValues = json_decode($innerHTML);
                    }
                }

                //Read the document and get content of HTML block code
                $dom = new DOMDocument;
                $dom->loadXML(file_get_contents($xmlFileOfComponent));
                $htmlTags = $dom->getElementsByTagName("html");
                foreach($htmlTags as $htmlTag){
                    if($htmlTag->getAttribute('type') == "text/html" && $htmlTag->getAttribute('app') == "wind.ui"){
                        $innerHTML = self::DOMinnerHTML($htmlTag);
                        $innerHTMLinflatedWithVariablesPassed = "";
                        $innerHTMLinflatedWithVariablesPassedAndDefaultVariablesValues = "";

                        //Inflate the HTML of component with all variables passed
                        if($variables != null){
                            $arrayOfVars = array();
                            $arrayOfValues = array();

                            //Scan all variables passed into stdClass(or array) and fill all in HTML code of component
                            foreach (get_object_vars($variables) as $variable => $value) {
                                if (strpos($innerHTML, "__".$variable."__") !== false) {
                                    array_push($arrayOfVars, "__".$variable."__");
                                    array_push($arrayOfValues, $value);
                                }
                                else {
                                    echo('<br><b>Wind UI:</b> It was not possible to fill variable "'.$variable.'" when rendering component "'.$componentFolderName.'" below. This variable has not been declared or does not exist in the source HTML code of this component on line '.$phpScriptCaller['line'].'.');
                                }
                            }
                            $innerHTMLinflatedWithVariablesPassed = str_replace($arrayOfVars, $arrayOfValues, $innerHTML);
                        }
                        //If not passed variables, get the component code basic
                        if($variables == null)
                            $innerHTMLinflatedWithVariablesPassed = $innerHTML;

                        //Inflate the innerHTMLinflatedWithVariablesPassed with all default variables values that is not used because not passed on render this component
                        $arrayOfVars = array();
                        $arrayOfValues = array();
                        //Scan all variables present in json default values and fill all in HTML node code of component
                        foreach (get_object_vars($jsonDefaultVariablesValues) as $variable => $value) {
                            if (strpos($innerHTMLinflatedWithVariablesPassed, "__".$variable."__") !== false) {
                                array_push($arrayOfVars, "__".$variable."__");
                                array_push($arrayOfValues, str_replace("(__WindUiPhp::getResourcePath__)", WindUiAppPrefs::$appRootPath . "/resources", $value)); //Before set default value, change (__WindUiPhp::getResourcePath__) to dir to "Resources" path of this App
                            }
                        }
                        $innerHTMLinflatedWithVariablesPassedAndDefaultVariablesValues = str_replace($arrayOfVars, $arrayOfValues, $innerHTMLinflatedWithVariablesPassed);

                        //Warn on render this component, if a not used var is detected
                        if($warnIfThisComponentHaveNotUsedVars == true)
                            if (strpos($innerHTMLinflatedWithVariablesPassedAndDefaultVariablesValues, "__") !== false)
                                echo('<br><b>Wind UI:</b> Unused variables were detected when instantiating component "'.$componentFolderName.'" below. This means that these variables were not passed through the PHP command (or JSON default values of component), when instantiating this component. Check if all the variables of the component are being informed (or registered in JSON default values of Component code) in the stdClass when instantiating this component on line '.$phpScriptCaller['line'].'.');

                        echo("<!-- Wind UI Component Renderization: ".$componentFolderName." -->" . $innerHTMLinflatedWithVariablesPassedAndDefaultVariablesValues);
                    }
                }
            }
            else{
                echo('<br><b>Wind UI:</b> Could not render component "'.$componentFolderName.'" here. The component (folder) with this name or the "'.$componentFolderName.'.xml" file for this component was not found. Error on line '.$phpScriptCaller['line'].'.');
            }
        }

        //Client user input via POST or GET validators

        public static function isValidContentOfClientInput(string $type, stdClass $parameters, $content){
            //Store the is valid
            $isValid = true;

            //If parameters is not a array
            if($parameters == null)
                return false;
            //Get all vars into a array
            $params = get_object_vars($parameters);
        
            //Start the validation process

            //If is a string
            if($type == "string"){
                //String Parameters
                $minchars = (array_key_exists("minchars", $params) == true) ? $params["minchars"] : 0;
                $maxchars = (array_key_exists("maxchars", $params) == true) ? $params["maxchars"] : 0;
                $validationtype = (array_key_exists("validationtype", $params) == true) ? $params["validationtype"] : "text";
                $allowespecialchars = (array_key_exists("allowespecialchars", $params) == true) ? $params["allowespecialchars"] : true;
                $specialcharsallowed = (array_key_exists("specialcharsallowed", $params) == true) ? $params["specialcharsallowed"] : "";
                $allownumbers = (array_key_exists("allownumbers", $params) == true) ? $params["allownumbers"] : true;
                $allowuppercase = (array_key_exists("allowuppercase", $params) == true) ? $params["allowuppercase"] : true;
                $allowlowercase = (array_key_exists("allowlowercase", $params) == true) ? $params["allowlowercase"] : true;
                $allowempty = (array_key_exists("allowempty", $params) == true) ? $params["allowempty"] : true;

                //Start the validation
                if($allowespecialchars == false && preg_match_all('/[ ¹!@²#³$£%¢¨¬^&*()_§´`ª~º°•√π÷×¶∆€¥©®™✓+\-=\[\]{};\':"\\|,.<>\/?]/', $content) == true){
                    $isValid = false;
                    if($specialcharsallowed != ""){
                        $regex = ' ¹!@²#³$£%¢¨¬^&*()_§´`ª~º°•√π÷×¶∆€¥©®™✓+\-=\[\]{};\':\"\\|,.<>\/?';
                        $charArray = explode(",", $specialcharsallowed);
                        for($i = 0; $i < count($charArray); $i++){
                            if($charArray[$i] == "'" || $charArray[$i] == "\"")
                                continue;
                            $newRegex = str_replace(array('\\'.$charArray[$i], $charArray[$i], (($charArray[$i] == "comma") ? "," : "")), array("", "", ""), $regex);
                            $regex = $newRegex;
                        }
                        $regexEscaped0 = str_replace(array('\\', '/'), array('\\\\', '\\/'), $regex);
                        $regexEscaped1 = str_replace(array('[', ']', '-'), array('\\[', '\\]', '\\-'), $regexEscaped0);
                        $finalRegex = '/['.$regexEscaped1.']/';
                        if(preg_match_all($finalRegex, $content) == true)
                            $isValid = false;
                        if(preg_match_all($finalRegex, $content) == false)
                            $isValid = true;
                    }
                }

                //Start the base validation
                if($validationtype == "url" && preg_match('/(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/', $content) == false)
                    $isValid = false;
                if($validationtype == "email" && preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $content) == false)
                    $isValid = false;
                if($validationtype == "ip" && preg_match('/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $content) == false)
                    $isValid = false;
                if($validationtype == "uri" && preg_match('/\w+:(\/?\/?)[^\s]+/gm', $content) == false)
                    $isValid = false;

                //Resumes the validation
                if($minchars != 0 && strlen($content) < $minchars)
                    $isValid = false;
                if($maxchars != 0 && strlen($content) > $maxchars)
                    $isValid = false;
                if($allownumbers == false && preg_match('/\d/', $content) == true)
                    $isValid = false;
                if($allowuppercase == false && preg_match('/[A-Z]/', $content) == true)
                    $isValid = false;
                if($allowlowercase == false && preg_match('/[a-z]/', $content) == true)
                    $isValid = false;
                if($allowempty == false && $content == "")
                    $isValid = false;
            }

            //If is a integer
            if($type == "int"){
                //Integer Parameters
                $minchars = (array_key_exists("minchars", $params) == true) ? $params["minchars"] : 0;
                $maxchars = (array_key_exists("maxchars", $params) == true) ? $params["maxchars"] : 0;
                $minvalue = (array_key_exists("minvalue", $params) == true) ? $params["minvalue"] : 0;
                $maxvalue = (array_key_exists("maxvalue", $params) == true) ? $params["maxvalue"] : 0;
                $allowzero = (array_key_exists("allowzero", $params) == true) ? $params["allowzero"] : true;
                $allownegative = (array_key_exists("allownegative", $params) == true) ? $params["allownegative"] : true;
                $allowempty = (array_key_exists("allowempty", $params) == true) ? $params["allowempty"] : true;

                //Start base validation
                if(preg_match('/^([+-]?[1-9]\d*|0)$/', $content) == false)
                    $isValid = false;
                if($minchars != 0 && strlen($content) < $minchars)
                    $isValid = false;
                if($maxchars != 0 && strlen($content) > $maxchars)
                    $isValid = false;
                if($minvalue != 0 && $content < $minvalue)
                    $isValid = false;
                if($maxvalue != 0 && $content > $maxvalue)
                    $isValid = false;
                if($allowzero == false && $content == "0")
                    $isValid = false;
                if($allownegative == false && $content < 0)
                    $isValid = false;
                if($allowempty == false && $content == "")
                    $isValid = false;
            }

            //If is a float
            if($type == "float"){
                //Float Parameters
                $minchars = (array_key_exists("minchars", $params) == true) ? $params["minchars"] : 0;
                $maxchars = (array_key_exists("maxchars", $params) == true) ? $params["maxchars"] : 0;
                $minvalue = (array_key_exists("minvalue", $params) == true) ? $params["minvalue"] : 0;
                $maxvalue = (array_key_exists("maxvalue", $params) == true) ? $params["maxvalue"] : 0;
                $allowzero = (array_key_exists("allowzero", $params) == true) ? $params["allowzero"] : true;
                $allownegative = (array_key_exists("allownegative", $params) == true) ? $params["allownegative"] : true;
                $allowempty = (array_key_exists("allowempty", $params) == true) ? $params["allowempty"] : true;

                //Start base validation
                if(is_numeric($content) == false)
                    $isValid = false;
                if($minchars != 0 && strlen($content) < $minchars)
                    $isValid = false;
                if($maxchars != 0 && strlen($content) > $maxchars)
                    $isValid = false;
                if($minvalue != 0 && $content < $minvalue)
                    $isValid = false;
                if($maxvalue != 0 && $content > $maxvalue)
                    $isValid = false;
                if($allowzero == false && $content == "0")
                    $isValid = false;
                if($allownegative == false && $content < 0)
                    $isValid = false;
                if($allowempty == false && $content == "")
                    $isValid = false;
            }

            //If is a bool
            if($type == "bool"){
                //Bool Parameters

                //Start base validation
                if($content !== "true" && $content !== "1" && $content !== 1 && $content !== true && $content !== "false" && $content !== "0" && $content !== 0 && $content !== false)
                    $isValid = false;
            }

            //If is a date
            if($type == "date"){
                //Date Parameters
                $typee = (array_key_exists("type", $params) == true) ? $params["type"] : "";
                $allowempty = (array_key_exists("allowempty", $params) == true) ? $params["allowempty"] : true;

                //If date (Check if is in YYYY-MM-DD format)
                if($typee == "date"){
                    if(preg_match('/^\d{4}-\d{2}-\d{2}$/', $content) == false)
                        $isValid = false;
                }
                //If time (Check if is in HH:MM format)
                if($typee == "time"){
                    if(preg_match('/^(?:1[012]|0[0-9]):[0-5][0-9]$/', $content) == false && preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/', $content) == false)
                        $isValid = false;
                }
                //If datetime-local (Check if is in YYYY-MM-DDTHH:MM format)
                if($typee == "datetime-local"){
                    if(preg_match('/^([\+-]?\d{4}(?!\d{2}\b))((-?)((0[1-9]|1[0-2])(\3([12]\d|0[1-9]|3[01]))?|W([0-4]\d|5[0-2])(-?[1-7])?|(00[1-9]|0[1-9]\d|[12]\d{2}|3([0-5]\d|6[1-6])))([T\s]((([01]\d|2[0-3])((:?)[0-5]\d)?|24\:?00)([\.,]\d+(?!:))?)?(\17[0-5]\d([\.,]\d+)?)?([zZ]|([\+-])([01]\d|2[0-3]):?([0-5]\d)?)?)?)?$/', $content) == false)
                        $isValid = false;
                }
            }

            //Return the is valid
            return $isValid;
        }

        public static function receiveFileUploadedFromClientIfIsValid(string $fileReceptorVarName, string $destinationDir, string $destinationNameOfFile, int $maxSizeInMebiBytes, string $allowedExtensions){
            //Receive file and validate
            if($fileReceptorVarName == "")
                return "";
        
            //If is set
            if(isset($_FILES[$fileReceptorVarName]) == true){
                ini_set("post_max_size", $maxSizeInMebiBytes . "M");
                ini_set("upload_max_size", $maxSizeInMebiBytes . "M");
                ini_set("upload_max_filesize", $maxSizeInMebiBytes . "M");
                ini_set("memory_limit", "20000M"); 
                ini_set("max_execution_time", "300"); 
                $haveErrors = false;
                $maxsize = $maxSizeInMebiBytes * 1048576;
                $extensions = explode(",", $allowedExtensions);

                //Check if size is major than acceptable or empty
                if($maxSizeInMebiBytes > 0){
                    if(($_FILES[$fileReceptorVarName]["size"] >= $maxsize) || ($_FILES[$fileReceptorVarName]["size"] == 0))
                        $haveErrors = true;
                }
                //Check if is a allowed extension, if have a filter
                if($allowedExtensions != ""){
                    $isAllowedExtension = false;
                    for($i = 0; $i < count($extensions); $i++)
                        if($extensions[$i] == end((explode(".", ($_FILES[$fileReceptorVarName]["name"])))))
                            $isAllowedExtension = true;
                    if($isAllowedExtension == false)
                        $haveErrors = true;
                }
                
                //If have errors, return empty dir
                if($haveErrors == true){
                    return "";
                }
                //If don't have errors, move and return dir
                if($haveErrors == false){
                    move_uploaded_file($_FILES[$fileReceptorVarName]["tmp_name"], ($destinationDir . "/" . $destinationNameOfFile));
                    return ($destinationDir . "/" . $destinationNameOfFile);
                }
            }

            //If is not set, return empty dir
            return "";
        }
    
        //Files manipulation methods

        public static function getCurrentScriptName(){
            //Return the name of current script PHP that called this method
            return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
        }
    
        public static function getListOfFilesInDir(string $dir){
            //Set the array of files in dir
            $files = array();

            //Scan dir to get all files
            if($dir != "" && is_dir($dir) == true){
                $elements = scandir($dir);
                for($i = 0; $i < count($elements); $i++)
                    if(is_file($dir . "/" . $elements[$i]) == true)
                        array_push($files, $elements[$i]);
            }

            //Return the list
            return $files;
        }

        public static function getListOfFoldersInDir(string $dir){
            //Set the array of folders in dir
            $folders = array();

            //Scan dir to get all folders
            if($dir != "" && is_dir($dir) == true){
                $elements = scandir($dir);
                for($i = 0; $i < count($elements); $i++)
                    if(is_dir($dir . "/" . $elements[$i]) == true)
                        if($elements[$i] != "." && $elements[$i] != "..")
                            array_push($folders, $elements[$i]);
            }

            //Return the list
            return $folders;
        }

        public static function getExtensionOfFile(string $fileDir){
            //Get extension of file and return
            if($fileDir != "" && is_file($fileDir) == true){
                $fileExt = end(explode(".", $fileDir));
                return $fileExt;
            }

            //Return empty if not found file or error occurs
            return "";
        }
    }
?>