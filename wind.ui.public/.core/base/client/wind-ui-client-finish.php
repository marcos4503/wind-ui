<?php
//Generate script code to include all third party js libs before </body>
$beforeBodyCloseThirdPartyJs = "";
for ($i = 0; $i < count(WindUiClientRenderer::$thirdPartyBeforeBodyCloseJsLibs); $i++){
    $filePath = WindUiAppPrefs::$appRootPath . "/thirdparty-libs/js/" . WindUiClientRenderer::$thirdPartyBeforeBodyCloseJsLibs[$i];
    if(is_file($filePath) == true)
        $beforeBodyCloseThirdPartyJs .= "<script type=\"text/javascript\">".file_get_contents($filePath)."</script>";
}
?>
        <!-- ========================= Wind UI Start of Client Renderer Finish base code ========================= -->
        <!-- Startup Fragment Load -->
        <script type="text/javascript">
            window.onload = function(){ 
                WindUiJs.loadNewFragment("<?php echo(WindUiClientRenderer::$defaultFragmentToLoad); ?>", null); 
            }
        </script>
        <!-- Wind UI App Third Party Libs before </body> tag -->
        <?php echo($beforeBodyCloseThirdPartyJs); ?>
    </body>
</html>
<!-- End of Wind UI Client.php HTML document -->