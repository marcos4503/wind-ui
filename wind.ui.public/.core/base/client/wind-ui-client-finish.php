        <?php
            //Generate script code to include all third party js libs before </body> tag
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
            //Will be executed after Client.php done first loading
            window.onload = function(){

                <?php
                    //Try to load the requested fragment in ULR, if exists this request or if this request is valid. Else, load the default fragment

                    //Get params from URL in client.php
                    $defaultFragmentToLoad = WindUiAppPrefs::$appDefaultFragmentToLoad;
                    $fragmentUrlParam = urldecode($_GET["fragment"]);

<<<<<<< HEAD
                    //Set code to load a startup fragment
                    if($fragmentUrlParam != "")
                        $defaultFragmentToLoad = $fragmentUrlParam;
=======
                    if($fragmentUrlParam != ""){
                        //Set code to load a startup fragment
                        if(is_file(WindUiPhp::getPathToFragmentPhpFileBasingOnGetFragmentParamInUrl($fragmentUrlParam)) == true)
                            $defaultFragmentToLoad = $fragmentUrlParam;
                        //If is a invalid fragment param
                        if(is_file(WindUiPhp::getPathToFragmentPhpFileBasingOnGetFragmentParamInUrl($fragmentUrlParam)) == false)
                            $fragmentInUrlParamIsInvalid = true;
                    }
>>>>>>> 4311b5564d08e846da9da9d6e1f506ad76ade9f5

                    //If not seted a default fragment to load in client
                    if($defaultFragmentToLoad == "noDefaultFragmentDefined")
                        echo("console.error('Wind UI: No default fragment have been defined to be loaded into client.php.');");
                ?>

                WindUiJs.loadNewFragment("<?php echo($defaultFragmentToLoad); ?>", null);
            }
        </script>
        <!-- Wind UI App Third Party Libs before </body> tag -->
        <?php echo($beforeBodyCloseThirdPartyJs); ?>
    </body>
</html>
<!-- End of Wind UI Client.php HTML document -->