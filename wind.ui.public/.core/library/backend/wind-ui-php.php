<?php
    //Base vars of methods
    $fragmentsViewerAlreadyRendered = false;

    //Wind UI Core methods class. All methods acessible for Apps(fragments and components) from Wind UI Core
    class WindUiPhp{
        //Vars of library
        public static $typeOfScriptCurrentlyUsingThisLib = "unknown"; //Can be "client" or "fragment"

        private function __construct() {}

        function isJson($string) {
            //Return true if string is json
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }

        public static function getResourcePath($resPath){
            //Return path to a file founded in "my-resources"
            return(WindUiAppPrefs::$appRootPath . "/resources/" . $resPath);
        }

        public static function getCurrentScriptName(){
            //Return the name of current script PHP that called this method
            return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
        }

        public static function getPathToFragmentWithFragmentUrlGetParam($fragmentUrlGetParam){
            //Returns path to fragment PHP file with the "fragment" url GET param

            //Split fragment url param
            $fragmentUrlParamSplited = explode("/", $fragmentUrlGetParam);

            //Get file from fragment param
            $file = "";
            if (count($fragmentUrlParamSplited) == 1)
                $file = $fragmentUrlParamSplited[0];
            if (count($fragmentUrlParamSplited) > 1)
                $file = $fragmentUrlParamSplited[count($fragmentUrlParamSplited) - 1];

            return WindUiAppPrefs::$appRootPath . "/fragments/" . $fragmentUrlGetParam . "/" . $file . ".php";
        }

        public static function getOgMetaTagsFromFragmentFile($fragmentUrlGetParam, $desiredMetaTag){
            //Read json manifest of a fragment PHP file and return desired metatag from it

            //Case don't have a default fragment defined
            if(WindUiAppPrefs::$appDefaultFragmentToLoad == "noDefaultFragmentDefined")
                return "";
            //Case have a default fragment defined
            if(WindUiAppPrefs::$appDefaultFragmentToLoad != "noDefaultFragmentDefined"){
                $phpFragmentFileContent = "";
                if($fragmentUrlGetParam == "")
                    $phpFragmentFileContent = file_get_contents(self::getPathToFragmentWithFragmentUrlGetParam(WindUiAppPrefs::$appDefaultFragmentToLoad));
                if($fragmentUrlGetParam != ""){
                    if(is_file(self::getPathToFragmentWithFragmentUrlGetParam($fragmentUrlGetParam)) == true)
                        $phpFragmentFileContent = file_get_contents(self::getPathToFragmentWithFragmentUrlGetParam($fragmentUrlGetParam));
                    if(is_file(self::getPathToFragmentWithFragmentUrlGetParam($fragmentUrlGetParam)) == false)
                        $phpFragmentFileContent = file_get_contents(self::getPathToFragmentWithFragmentUrlGetParam(WindUiAppPrefs::$appDefaultFragmentToLoad));
                }

                //Get json code of fragment file
                $jsonCode = "";
                $dom = new DOMDocument;
                $dom->loadXML((explode("</json>", $phpFragmentFileContent)[0] . "</json>"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                foreach ($dom->getElementsByTagName('json') as $node)
                    if($node->getAttribute('type') == "text/json" && $node->getAttribute('app') == "wind.ui"){
                        $jsonCode = self::DOMinnerHTML($node);
                    }

                //Verify if is valid json
                if(self::isJson($jsonCode) == true){
                    //Decode the json
                    $jsonFinal = json_decode($jsonCode);

                    //Get the variable from json
                    foreach (get_object_vars($jsonFinal) as $variable => $value) 
                        if (strpos($variable, $desiredMetaTag) !== false)
                            return $value;
                }
                if(self::isJson($jsonCode) == false){
                    return "";
                }
            }
        }

        public static function DOMinnerHTML(DOMNode $element) { 
            ///Return innerHTML of a XML or HTML node
            $innerHTML = ""; 
            $children  = $element->childNodes;

            foreach ($children as $child) 
                $innerHTML .= $element->ownerDocument->saveHTML($child);
                
            return $innerHTML; 
        }

        public static function renderFragmentsViewerHere(){
            global $fragmentsViewerAlreadyRendered;

            //Stop if is a fragment
            if(self::$typeOfScriptCurrentlyUsingThisLib == "fragment"){
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

        public static function renderComponentHere($componentFolderName, stdClass $variables, $warnIfThisComponentHaveNotUsedVars){
            //Stop if is a client
            if(self::$typeOfScriptCurrentlyUsingThisLib == "client"){
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
    }

?>