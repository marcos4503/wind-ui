<?php
//-------- WindUiAppPrefs:: already been included in this client and all preferences from this app is imported by wind-ui-client-prepare ----------

//Include the core files on top of Client.php.
include_once(WindUiAppPrefs::$appRootPath . "/app-variables.php");
include_once(__DIR__ . "/../../library/backend/wind-ui-php.php");
WindUiPhp::$typeOfScriptCurrentlyUsingThisLib = "client";

//Set default timezone of Wind UI
date_default_timezone_set(WindUiAppPrefs::$appPhpTimeZone);
?>

<!-- Start of Wind UI Client.php HTML document -->
<!DOCTYPE html>
<html lang="<?php echo(WindUiAppPrefs::$appLang); ?>">
    <head>
        <meta charset="<?php echo(WindUiAppPrefs::$appCharSet); ?>" />
        <title><?php echo(WindUiAppPrefs::$appTitle); ?></title>
        <meta name="theme-color" content="<?php echo(WindUiAppPrefs::$appBrowserColor); ?>" />
        <meta name="viewport" content="width=device-width" />
        <noscript><?php echo((WindUiPhp::getCurrentScriptName() != "noscript.php") ? '<meta http-equiv="refresh" content="0; url='.WindUiAppPrefs::$appRootPath.'/../../.core/pages/noscript.php" />' : ''); ?></noscript>
        <!-- Wind UI Client.php External Libs -->
        <?php
            //Include all external libs setted
            for ($i = 0; $i < count(WindUiAppPrefs::$clientExternalJsLibs); $i++)
                if(WindUiAppPrefs::$clientExternalJsLibs[$i] != "")
                    echo('<script type="text/javascript" src="'.WindUiAppPrefs::$clientExternalJsLibs[$i].'"></script>');
            for ($i = 0; $i < count(WindUiAppPrefs::$clientExternalCssLibs); $i++)
                if(WindUiAppPrefs::$clientExternalCssLibs[$i] != "")
                    echo('<link rel="stylesheet" href="'.WindUiAppPrefs::$clientExternalCssLibs[$i].'" type="text/css" />');
        ?>
        <!-- Wind UI App Third Party Libs -->
        <?php
            //Include all third party css libs
            for ($i = 0; $i < count(WindUiAppPrefs::$clientThirdPartyCssLibs); $i++){
                $filePath = WindUiAppPrefs::$appRootPath . "/thirdparty-libs/css/" . WindUiAppPrefs::$clientThirdPartyCssLibs[$i];
                if(is_file($filePath) == true)
                    echo("<style>".file_get_contents($filePath)."</style>");
            }
            //Include all third party js libs on head
            for ($i = 0; $i < count(WindUiAppPrefs::$clientThirdPartyOnHeadJsLibs); $i++){
                $filePath = WindUiAppPrefs::$appRootPath . "/thirdparty-libs/js/" . WindUiAppPrefs::$clientThirdPartyOnHeadJsLibs[$i];
                if(is_file($filePath) == true)
                    echo('<script type="text/javascript">'.file_get_contents($filePath)."</script>");
            }
        ?>
        <!-- Wind UI Client.php dynamic Open Graph Universal Meta Tags of current requested fragment in URL get PARAM -->
        <meta property="og:locale" content="<?php echo(WindUiAppPrefs::$appLang); ?>" />
        <meta id="windUiOgMetaTagUrl" property="og:url" content="<?php echo("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" />
        <meta id="windUiOgMetaTagTitle" property="og:title" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgMetaTagTitle")); ?>" />
        <meta id="windUiOgMetaTagSiteName" property="og:site_name" content="<?php echo(WindUiAppPrefs::$appTitle); ?>" />
        <meta id="windUiOgMetaTagDescription" property="og:description" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgMetaTagDescription")); ?>">
        <meta id="windUiOgMetaTagImage" property="og:image" content="<?php echo(WindUiAppPrefs::$appRootPath . WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgMetaTagImage")); ?>">
        <meta id="windUiOgMetaTagImageType" property="og:image:type" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgMetaTagImageType")); ?>">
        <meta id="windUiOgMetaTagImageWidth" property="og:image:width" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgMetaTagImageWidth")); ?>">
        <meta id="windUiOgMetaTagImageHeight" property="og:image:height" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgMetaTagImageHeight")); ?>">
        <meta id="windUiOgMetaTagType" property="og:type" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgMetaTagType")); ?>">
        <meta id="windUiOgArticleAuthor" property="article:author" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgArticleAuthor")); ?>">
        <meta id="windUiOgArticleSection" property="article:section" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgArticleSection")); ?>">
        <meta id="windUiOgArticleTag" property="article:tag" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgArticleTags")); ?>">
        <meta id="windUiOgArticlePublishTime" property="article:published_time" content="<?php echo(WindUiPhp::getOgMetaTagsFromFragmentFile(urldecode($_GET["fragment"]), "fragmentOgArticlePublishTime")); ?>">
        <!-- Wind UI Client.php dynamic elements -->
        <!-- Tags of dynamic favicon and dynamic current fragment javascript will be rendered below -->
        <link id="windUiDynamicIcon" rel="shortcut icon" href="<?php; echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$appDefaultFavicon); ?>" />
        <script id="windUiDynamicFragmentJavaScript" type="text/javascript" src=""></script>
    </head>
    <body>
        <!-- The base CSS for all Wind UI applications  -->
        <?php include_once(__DIR__ . "/wind-ui-client-css.php"); ?>

        <!-- The base JavaScript for all Wind UI applications -->
        <?php include_once(__DIR__ . "/../../library/frontend/wind-ui-js.php"); ?>

        <!-- Library Pace Loadbar JavaScript 1.0.0 -->
        <?php include_once(__DIR__ . "/../../library/frontend/pace-js.php"); ?>

        <!-- All CSS of this app Wind UI components -->
        <style>
            <?php
                //Retun all style node content of all components.html compiled into a unique text file
                $style = "";
                $allComponents = scandir(WindUiAppPrefs::$appRootPath."/components");
                for($i = 0; $i < count($allComponents); $i++){
                    //Skip if is not a folder with a valid name to be a component
                    if(preg_match("/[^a-zA-Z]/", $allComponents[$i]) == true)
                        continue;
                    $styleFileOfCurrentComponent = WindUiAppPrefs::$appRootPath."/components/".$allComponents[$i]."/".$allComponents[$i].".html";
                    if(is_file($styleFileOfCurrentComponent) == true){
                        //Read the document and get content of correct block
                        $dom = new DOMDocument;
                        $dom->loadXML(file_get_contents($styleFileOfCurrentComponent));
                        $htmlTags = $dom->getElementsByTagName("style");
                        foreach($htmlTags as $htmlTag){
                            if($htmlTag->getAttribute('type') == "text/css" && $htmlTag->getAttribute('app') == "wind.ui"){
                                $innerHTML = WindUiPhp::DOMinnerHTML($htmlTag);
                                $style .= $innerHTML;
                            }
                        }
                    }
                }
                echo($style);
            ?>
        </style>

        <!-- All JavaScript of this app Wind UI components -->
        <script type="text/javascript">
            <?php
                //Retun all script nodes content of all components.html compiled into a unique text file
                $script = "";
                $allComponents = scandir(WindUiAppPrefs::$appRootPath."/components");
                for($i = 0; $i < count($allComponents); $i++){
                    //Skip if is not a folder with a valid name to be a component
                    if(preg_match("/[^a-zA-Z]/", $allComponents[$i]) == true)
                        continue;
                    $scriptFileOfCurrentComponent = WindUiAppPrefs::$appRootPath."/components/".$allComponents[$i]."/".$allComponents[$i].".html";
                    if(is_file($scriptFileOfCurrentComponent) == true){
                        //Read the document and get content of correct block
                        $dom = new DOMDocument;
                        $dom->loadXML(file_get_contents($scriptFileOfCurrentComponent));
                        $htmlTags = $dom->getElementsByTagName("script");
                        foreach($htmlTags as $htmlTag){
                            if($htmlTag->getAttribute('type') == "text/javacript" && $htmlTag->getAttribute('app') == "wind.ui"){
                                $innerHTML = WindUiPhp::DOMinnerHTML($htmlTag);
                                $script .= $innerHTML;
                            }
                        }
                    }
                }
                echo($script);
            ?>
        </script>

        <?php
            //Include PHP and CSS of app
            include_once(WindUiAppPrefs::$appRootPath . "/app-javascript.php");
            include_once(WindUiAppPrefs::$appRootPath . "/app-css-style.php");
        ?>

        <!-- Startup Load Screen -->
        <div id="windUiLoadingScreen" class="windUiLoadingScreen">
            <div class="windUiLoadingScreenContent">
                <div style="width: 80px; margin-left: auto; margin-right: auto;">
                    <image src="<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$loadScreenLogoResource); ?>" style="width: 100%;" />
                </div>
                <div class="windUiLoadingScreenContentCharging">
                    <image src="<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$loadScreenSpinnerResource); ?>" style="height: <?php echo(WindUiAppPrefs::$loadScreenSpinnerSizePx); ?>px;" />
                    <div style="margin-left: <?php echo(((WindUiAppPrefs::$loadScreenLoadingMessage == "") ? "0" : "4")); ?>px; line-height: <?php echo(WindUiAppPrefs::$loadScreenSpinnerSizePx); ?>px; font-size: <?php echo(WindUiAppPrefs::$loadScreenLoadingMessageFontSizePx); ?>px;">
                        <?php echo(WindUiAppPrefs::$loadScreenLoadingMessage); ?>
                    </div>
                </div>
            </div>
            <div class="windUiLoadingScreenPoweredByBase">
                <div class="windUiLoadingScreenPoweredBy">
                    Powered by Wind UI
                </div>
            </div>
        </div>

        <!-- Notification Area -->
        <div id="windUiNotificationArea" class="windUiNotificationArea">
        </div>
        <audio id="windUiNotificationAreaSound">
            <source src="<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$notificationOggSoundFile); ?>" type="audio/ogg">
            <source src="<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$notificationMp3SoundFile); ?>" type="audio/mpeg">
        </audio>

        <!-- ========================= Wind UI End of Client Renderer base code ========================= -->