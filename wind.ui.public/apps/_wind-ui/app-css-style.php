<!-- Client.php CSS -->
<style>
    /* This is acessible to all fragments and components */

    /* Normal and multiscreen style */
    
    ul {
        list-style-type: circle;
        padding-inline-start: 20px;
    }
    .bodyContent{
        padding-top: 52px;
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
        overflow: auto;
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
        width: 100%;
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
    .bodyMenuSubMenu{
        height: 32px;
        width: 100%;
        font-weight: bolder;
        font-size: 12px;
    }
    .bodyMenuItem{
        margin-left: 16px;
        height: 40px;
        width: calc(100% - 16px);
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
        display: flex;
        align-items: center;
        margin-left: 8px;
        margin-bottom: 6px;
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