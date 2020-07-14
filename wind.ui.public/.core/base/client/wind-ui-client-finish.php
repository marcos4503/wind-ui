        <?php
            //Generate script code to include all third party js libs before </body>
            $beforeBodyCloseThirdPartyJs = "";
            for ($i = 0; $i < count(WindUiAppPrefs::$clientThirdPartyBeforeBodyCloseJsLibs); $i++){
                $filePath = WindUiAppPrefs::$appRootPath . "/thirdparty-libs/js/" . WindUiAppPrefs::$clientThirdPartyBeforeBodyCloseJsLibs[$i];
                if(is_file($filePath) == true)
                    $beforeBodyCloseThirdPartyJs .= "<script type=\"text/javascript\">".file_get_contents($filePath)."</script>";
            }
        ?>
        <!-- ========================= Wind UI Start of Client Renderer Finish base code ========================= -->
        <!-- Startup Fragment Load -->
        <script type="text/javascript">
            window.onload = function(){

                <?php
                    //Try to load the requested fragment in ULR, if exists this request or if this request is valid. Else, load the default fragment

                    //Get params from URL in client.php
                    $defaultFragmentToLoad = WindUiAppPrefs::$appDefaultFragmentToLoad;
                    $fragmentInUrlParamIsInvalid = false;
                    $fragmentUrlParam = urldecode($_GET["fragment"]);

                    if($fragmentUrlParam != ""){
                        //Set code to load a startup fragment
                        if(is_file(WindUiPhp::getPathToFragmentWithFragmentUrlGetParam($fragmentUrlParam)) == true)
                            $defaultFragmentToLoad = $fragmentUrlParam;
                        //If is a invalid fragment param
                        if(is_file(WindUiPhp::getPathToFragmentWithFragmentUrlGetParam($fragmentUrlParam)) == false)
                            $fragmentInUrlParamIsInvalid = true;
                    }

                    //If not seted a default fragment to load in client
                    if($defaultFragmentToLoad == "noDefaultFragmentDefined"){
                        echo("console.error('Wind UI: No default fragment have been defined to be loaded into client.php.');");
                    }

                    //If the fragment in "fragment" get param of url, is invalid or inexistent
                    if($fragmentInUrlParamIsInvalid == true){
                        echo("WindUiJs.showSimpleNotification('".WindUiAppPrefs::$appFragmentNotFoundMessage."', 0, false, null);");
                    }
                ?>

                WindUiJs.loadNewFragment("<?php echo($defaultFragmentToLoad); ?>", null);
            }
        </script>
        <!-- Wind UI App Third Party Libs before </body> tag -->
        <?php echo($beforeBodyCloseThirdPartyJs); ?>
    </body>
</html>
<!-- End of Wind UI Client.php HTML document -->