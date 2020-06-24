<?php
    //Base vars of methods
    $fragmentsViewerAlreadyRendered = false;

    //Wind UI Core methods class. All methods acessible for Apps(fragments and components) from Wind UI Core
    class WindUiPhp{
        //Vars of library
        public static $typeOfScriptCurrentlyUsingThisLib = "unknown"; //Can be "client" or "fragment"

        private function __construct() {}

        public static function getResourcePath($resPath){
            //Return path to a file founded in "my-resources"
            return(WindUiAppPrefs::$appRootPath . "/resources/" . $resPath);
        }

        public static function getCurrentScriptName(){
            //Return the name of current script PHP that called this method
            return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
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

            //Include HTML block of a component.html in a place that this method are called
            $codeFileOfComponent = WindUiAppPrefs::$appRootPath."/components/".$componentFolderName."/".$componentFolderName.".html";
            if(is_file($codeFileOfComponent) == true){
                //Read the document and get content of correct block
                $dom = new DOMDocument;
                $dom->loadXML(file_get_contents($codeFileOfComponent));
                $htmlTags = $dom->getElementsByTagName("html");
                foreach($htmlTags as $htmlTag){
                    if($htmlTag->getAttribute('type') == "text/html" && $htmlTag->getAttribute('app') == "wind.ui"){
                        $innerHTML = self::DOMinnerHTML($htmlTag);
                        $innerHTMLinflated = "";

                        //Inflate the innerHTML with all variables
                        if($variables != null){
                            $arrayOfVars = array();
                            $arrayOfValues = array();

                            //Scan all variables passed into stdClass(or array) and fill all in HTML node code of component
                            foreach (get_object_vars($variables) as $variable => $value) {
                                if (strpos($innerHTML, "__%".$variable."__") !== false) {
                                    array_push($arrayOfVars, "__%".$variable."__");
                                    array_push($arrayOfValues, $value);
                                }
                                else {
                                    echo('<br><b>Wind UI:</b> It was not possible to fill variable "'.$variable.'" when rendering component "'.$componentFolderName.'" below. This variable has not been declared or does not exist in the source code of this component on line '.$phpScriptCaller['line'].'.');
                                }
                            }
                            $innerHTMLinflated = str_replace($arrayOfVars, $arrayOfValues, $innerHTML);

                            //Warn on render this component, if a not used var is detected
                            if($warnIfThisComponentHaveNotUsedVars == true)
                                if (strpos($innerHTMLinflated, "__%") !== false)
                                    echo('<br><b>Wind UI:</b> Unused variables were detected when instantiating component "'.$componentFolderName.'" below. This means that these variables were not passed through the PHP command, when instantiating this component. Check if all the variables of the component are being informed in the stdClass when instantiating this component on line '.$phpScriptCaller['line'].'.');
                        }

                        echo("<!-- Wind UI Component Renderization: ".$componentFolderName." -->" . $innerHTMLinflated);
                    }
                }
            }
            else{
                echo('<br><b>Wind UI:</b> Could not render component "'.$componentFolderName.'" here. The component (folder) with this name or the "'.$componentFolderName.'.html" file for this component was not found. Error on line '.$phpScriptCaller['line'].'.');
            }
        }
    }

?>