<?php
    //Import core files and start ajax-http-api request processing.
    include_once("../../../../../../.core/base/http-api/wind-ui-ajax-http-api-prepare.php");
    WindUiAjaxHttpApi::startAjaxHttpApiRequestProcessing(__DIR__);
?>

<?php
//Receive the data
$appToReceive = $_POST["appToReceive"];
$componentName = $_POST["componentName"];
$password = $_POST["password"];

//Validate the data
$appToReceiveValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowespecialchars"=>false,
                "allowuppercase"=>false,
                "specialcharsallowed"=>"_,-",
                "allowempty"=>false
            ), $appToReceive);
$componentNameValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowespecialchars"=>false,
                "allownumbers"=>false,
                "allowempty"=>false
            ), $componentName);
$passwordValid = WindUiPhp::isValidContentOfClientInput("string", (object)array(
                "allowempty"=>false
            ), $password);

//Prepare the response
$response = new stdClass;
$response->passwordValid = false;
$response->componentCreated = false;

//If all variables is valid
if($appToReceiveValid == true && $componentNameValid == true && $passwordValid == true){
    //Check if the password matches
    $passwordOk = true;
    $passwordFileContent = file_get_contents("../../../../../../../wind.ui.data/management-key.txt");
    if($passwordFileContent != md5($password))
        $passwordOk = false;
    $response->passwordValid = $passwordOk;

    //Start the component creation
    if($passwordOk == true){
        //Create the component dir
        $componentDir = "../../../../../" . $appToReceive . "/components/" . $componentName;

        //If the dir is not created
        if(is_dir($componentDir) == false){
            //Create the dir
            mkdir($componentDir);

            //Create the component.css
            $componentCss = str_replace(array("%COMPONENT_NAME%"), 
                                      array($componentName),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/components/ComponentTemplate/ComponentTemplate.css")));
            file_put_contents($componentDir . "/" . $componentName . ".css", $componentCss);

            //Create the component.js
            $componentJs = str_replace(array("%COMPONENT_NAME%", "% COMPONENT_NAME %"), 
                                      array($componentName, $componentName),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/components/ComponentTemplate/ComponentTemplate.js")));
            file_put_contents($componentDir . "/" . $componentName . ".js", $componentJs);

            //Create the component.md
            $componentMd = str_replace(array("%COMPONENT_NAME%"), 
                                      array($componentName),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/components/ComponentTemplate/ComponentTemplate.md")));
            file_put_contents($componentDir . "/_" . $componentName . ".md", $componentMd);

            //Create the component.xml
            $componentXml = str_replace(array("%COMPONENT_NAME%"), 
                                      array($componentName),
                                      file_get_contents(WindUiPhp::getResourcePath("app-creation-template/components/ComponentTemplate/ComponentTemplate.xml")));
            file_put_contents($componentDir . "/" . $componentName . ".xml", $componentXml);

            //Return the fragment created
            $response->componentCreated = true;
        }
    }
}

//Return the response
echo(json_encode($response));
?>