<?php
    //Start Wind UI Client Core
    include_once("../../.core/base/client/wind-ui-client-prepare.php");
    WindUiClientRenderer::setParameters((object)
    array(
        "thisAppRootDir"=>(__DIR__),
        "externalJsLib_0"=>"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js",
        "externalCssLib_0"=>"",
        "thirdPartyBeforeBodyCloseJsLib_0"=>"rainbow.js",
        "thirdPartyBeforeBodyCloseJsLib_1"=>"rainbow.generic.js",
        "thirdPartyBeforeBodyCloseJsLib_2"=>"rainbow.javascript.js",
        "thirdPartyBeforeBodyCloseJsLib_3"=>"rainbow.css.js",
        "thirdPartyBeforeBodyCloseJsLib_4"=>"rainbow.html.js",
        "thirdPartyBeforeBodyCloseJsLib_5"=>"rainbow.php.js",
        "thirdPartyBeforeBodyCloseJsLib_6"=>"rainbow.c.js",
        "thirdPartyBeforeBodyCloseJsLib_7"=>"rainbow.csharp.js",
        "thirdPartyBeforeBodyCloseJsLib_8"=>"rainbow.go.js",
        "thirdPartyBeforeBodyCloseJsLib_9"=>"rainbow.java.js",
        "thirdPartyBeforeBodyCloseJsLib_10"=>"rainbow.json.js",
        "thirdPartyBeforeBodyCloseJsLib_11"=>"rainbow.lua.js",
        "thirdPartyBeforeBodyCloseJsLib_12"=>"rainbow.python.js",
        "thirdPartyBeforeBodyCloseJsLib_13"=>"rainbow.ruby.js",
        "thirdPartyBeforeBodyCloseJsLib_14"=>"rainbow.scheme.js",
        "thirdPartyBeforeBodyCloseJsLib_15"=>"rainbow.shell.js",
        "thirdPartyBeforeBodyCloseJsLib_16"=>"rainbow.sql.js",
        "thirdPartyOnHeadJsLib_0"=>"",
        "thirdPartyCssLib_0"=>"rainbow-github.css",
        "defaultFragmentToLoad"=>"home"
    ));
    WindUiClientRenderer::startClient();
?>
<!-- /////////////////////////////////////////////////// Start of client.php modifiable area /////////////////////////////////////////////////// -->

<!-- client.php JavaScript -->
<script type="text/javascript">
    //This is acessible to all fragments and components

    function openAppMenu() {
        var bodyMenuBackground = document.getElementById("bodyMenuBackground");
        var bodyMenuBase = document.getElementById("bodyMenuBase");

        //Close the app menu
        bodyMenuBackground.style.opacity = "0.35";
        bodyMenuBackground.style.pointerEvents = "all";
        bodyMenuBase.style.right = "0%";
    }

    function closeAppMenu() {
        var bodyMenuBackground = document.getElementById("bodyMenuBackground");
        var bodyMenuBase = document.getElementById("bodyMenuBase");

        //Close the app menu
        bodyMenuBackground.style.opacity = "0";
        bodyMenuBackground.style.pointerEvents = "none";
        bodyMenuBase.style.right = "-100%";
    }

    //Register function to be runned after load a new fragment
    WindUiJs.setFunctionToBeRunnedAfterLoadANewFragment(function(){
        var allMenuItens = document.getElementsByClassName("bodyMenuItem");
        for(var i = 0; i < allMenuItens.length; i++){
            allMenuItens[i].classList.remove("bodyMenuItemCurrentSelected");
            //Set background color to selected, if this menu item is equal to current fragment requested
            if(allMenuItens[i].getAttribute("fragmentOfThisButton") == WindUiJs.getCurrentRequestedFragmentName())
                allMenuItens[i].classList.add("bodyMenuItemCurrentSelected");
        }

        //Colorize all <code><pre> blocks of Rainbow Sintax Highlighter third party library, after load a fragment
        Rainbow.color();
    });
</script>

<!-- client.php CSS -->
<style>
    /* This is acessible to all fragments and components */

    /* Normal and multiscreen style */
    ul {
        list-style-type: circle;
        padding-inline-start: 20px;
    }
    .bodyContent{
        padding-top: 58px;
        padding-left: 8px;
        padding-right: 8px;
        padding-bottom: 8px;
        width: 90%;
        max-width: 1128px;
        margin-left: auto;
        margin-right: auto;
        background-color: #f3f3f3;
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    .bodyFooter{
        margin-top: 8px;
        padding-top: 16px;
        padding-left: 8px;
        padding-right: 8px;
        padding-bottom: 16px;
        width: 90%;
        max-width: 1128px;
        margin-left: auto;
        margin-right: auto;
        background-color: #f3f3f3;
        border-radius: 6px;
    }
    .bodyHeader{
        width: 100%;
        height: 42px;
        z-index: 11000;
        background-color: #1360ac;
        box-shadow: 0px 0px 12px 0px rgba(0,0,0,0.3);
        position: fixed;
        top: 0px;
        left: 0px;
        display: grid;
        grid-template-columns: auto auto;
        padding: 4px;
    }
    .bodyHeaderLogo{
        display: grid;
        grid-template-columns: 58px auto;
        cursor: pointer;
        max-width: 200px;
    }
    .bodyHeaderLogoText{
        display: grid;
        grid-template-rows: auto auto;
        color: white;
    }
    .bodyMenuBackground{
        position: fixed;
        top: 0px;
        left: 0px;
        background-color: #000000;
        opacity: 0;
        width: 100%;
        height: 100%;
        z-index: 10900;
        transition: all 250ms;
        pointer-events: none;
    }
    .bodyOpenMenuButton{
        height: 42px;
        width: 42px;
        border-radius: 42px;
        float: right; 
        cursor: pointer;
        background-image: url(<?php echo(WindUiPhp::getResourcePath("images/app-menu.png")); ?>);
        background-position: center;
        background-size: 22px 16px;
        background-repeat: no-repeat;
        transition: all 250ms;
    }
    .bodyOpenMenuButton:hover{
        background-color: rgba(1, 1, 1, 0.4);
    }
    .bodyDownloadOnGitHub{
        height: 42px;
        width: 42px;
        border-radius: 42px;
        float: right; 
        cursor: pointer;
        background-image: url(<?php echo(WindUiPhp::getResourcePath("images/github-white.png")); ?>);
        background-position: center;
        background-size: 24px 22px;
        background-repeat: no-repeat;
        transition: all 250ms;
    }
    .bodyDownloadOnGitHub:hover{
        background-color: rgba(1, 1, 1, 0.4);
    }
    .bodyMenuBase{
        position: fixed;
        top: 0px;
        right: -100%;
        height: 100%;
        background-color: #f3f3f3;
        z-index: 11100;
        box-shadow: 0px 0px 12px 0px rgba(0,0,0,0.3);
        padding: 8px;
        transition: all 250ms;
    }
    .bodyMenuHeader{
        height: 42px;
        width: 100%;
        display: grid;
        grid-template-columns: auto 42px;
        margin-top: -4px;
        margin-bottom: 3px;
    }
    .bodyMenuSeparator{
        width: calc(100% - 8px);
        height: 1px;
        background-color: #000000;
        margin-left: 0px;
        margin-right: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border-style: none;
        opacity: 0.1;
    }
    .bodyCloseMenuButton{
        height: 42px;
        width: 42px;
        border-radius: 42px;
        float: right; 
        cursor: pointer;
        background-image: url(<?php echo(WindUiPhp::getResourcePath("images/arrow.png")); ?>);
        background-position: center;
        background-size: 22px 22px;
        background-repeat: no-repeat;
        transition: all 250ms;
    }
    .bodyCloseMenuButton:hover{
        background-color: rgba(1, 1, 1, 0.25);
    }
    .bodyMenuItem{
        height: 40px;
        width: 100%;
        cursor: pointer;
        transition: all 250ms;
        display: grid;
        grid-template-columns: 40px auto;
        margin-bottom: 4px;
    }
    .bodyMenuItem:hover{
        background-color: rgba(1, 1, 1, 0.25);
    }
    .bodyMenuItemCurrentSelected{
        background-color: rgba(1, 1, 1, 0.25);
    }
    .bodyMenuItemIcon{
        width: calc(100% - 16px);
        height: calc(100% - 16px);
        margin: 8px;
    }
    .bodyMenuItemText{
        line-height: 40px;
        margin-left: 8px;
    }

    /* CSS style by screen width */
    @media screen and (max-width: 3840px) {
        .bodyMenuBase{
            width: 80%;
            max-width: 400px;
        }
    }
    @media screen and (max-width: 2560px) {
        .bodyMenuBase{
            width: 80%;
            max-width: 400px;
        }
    }
    @media screen and (max-width: 1920px) {
        .bodyMenuBase{
            width: 80%;
            max-width: 400px;
        }
    }
    @media screen and (max-width: 1368px) {
        .bodyMenuBase{
            width: 80%;
            max-width: 400px;
        }
    }
    @media screen and (max-width: 1280px) {
        .bodyMenuBase{
            width: 80%;
            max-width: 400px;
        }
    }
    @media screen and (max-width: 720px) {
        .bodyMenuBase{
            width: 100%;
            max-width: 90%;
        }
    }
    @media screen and (max-width: 480px) {
        .bodyMenuBase{
            width: 100%;
            max-width: 90%;
        }
    }
</style>

<!-- Topbar -->
<div class="bodyHeader">
    <div class="bodyHeaderLogo" onclick="WindUiJs.loadNewFragment('home', null); closeAppMenu();">
        <img src="<?php echo(WindUiPhp::getResourcePath("images/wind-white.png")); ?>" style="height: 34px; margin-top: 5px; border-radius: 6px; cursor: pointer; margin-left: 4px;" />
        <div class="bodyHeaderLogoText">
            <div style="font-size: 26px; line-height: 26px;">Wind UI</div>
            <div style="font-size: 12px;">Framework</div>
        </div>
    </div>
    <div style="width: calc(100% - 10px); height: 42px;">
        <div class="bodyOpenMenuButton" onclick="openAppMenu();"></div>
        <div class="bodyDownloadOnGitHub" onclick="window.open('https://github.com/marcos4503/wind-ui', '_blank');"></div>
    </div>
</div>

<!-- Menu Black Background -->
<div id="bodyMenuBackground" class="bodyMenuBackground" onclick="closeAppMenu();"></div>

<!-- Menu -->
<div id="bodyMenuBase" class="bodyMenuBase">
    <div class="bodyMenuHeader">
        <div style="line-height: 42px; font-weight: bold; font-size: 18px;">Menu do App</div>
        <div style="42px; height: 42px;">
            <div class="bodyCloseMenuButton" style="transform: rotate(180deg);" onclick="closeAppMenu();">
            </div>
        </div>
    </div>
    <hr class="bodyMenuSeparator" style="margin-bottom: 16px;" />
    <!-- Página Inicial -->
    <div class="bodyMenuItem" fragmentOfThisButton="home" onclick="WindUiJs.loadNewFragment('home', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/home.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Página Inicial</div>
    </div>
    <!-- Como funciona -->
    <div class="bodyMenuItem" fragmentOfThisButton="how-works" onclick="WindUiJs.loadNewFragment('how-works', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/how-work.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Como Funciona</div>
    </div>
    <!-- Criando seu app -->
    <div class="bodyMenuItem" fragmentOfThisButton="making-app" onclick="WindUiJs.loadNewFragment('making-app', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/making-app.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Criando Seu App</div>
    </div>
    <!-- Notificações -->
    <div class="bodyMenuItem" fragmentOfThisButton="notifications" onclick="WindUiJs.loadNewFragment('notifications', null); closeAppMenu();">
        <div class="bodyMenuItemIcon"><img src="<?php echo(WindUiPhp::getResourcePath("menu/bell.png")); ?>" style="width: 100%;" /></div>
        <div class="bodyMenuItemText">Notificações</div>
    </div>
</div>

<!-- Body of Client -->
<div class="bodyContent">
    <?php WindUiPhp::renderFragmentsViewerHere(); ?>
</div>

<!-- Footer -->
<div class="bodyFooter">
    <center>
        <small>
            Wind UI <?php echo(date("Y")); ?> - Created With ❤ by Marcos Tomaz
        </small>
    <center>
</div>

<!-- /////////////////////////////////////////////////// End of client.php modifiable area /////////////////////////////////////////////////// -->
<?php
    //End Wind UI Client Core
    WindUiClientRenderer::finishClient(); 
?>