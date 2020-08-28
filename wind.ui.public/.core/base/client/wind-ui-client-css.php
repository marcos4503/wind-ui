<style>
    /* CSS of Pace Progress Bar */

    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }
    .pace-inactive {
        display: none;
    }
    .pace .pace-progress {
        position: fixed;
        z-index: 9999999;
        top: 0;
        right: 100%;
        width: 100%;
        background: <?php echo(WindUiAppPrefs::$loadBarColor); ?>;
        height: <?php echo(WindUiAppPrefs::$loadBarHeight); ?>;
    }

    /* CSS of scroll bar */

    ::-webkit-scrollbar {
        width: <?php echo(WindUiAppPrefs::$scrollBarWidthPx); ?>px;
        height: <?php echo(WindUiAppPrefs::$scrollBarWidthPx); ?>px;
    }
    ::-webkit-scrollbar-track {
        background: <?php echo(WindUiAppPrefs::$scrollBarTrackColor); ?>; 
    }
    ::-webkit-scrollbar-thumb {
        background: <?php echo(WindUiAppPrefs::$scrollBarThumbColor); ?>; 
    }

    /* All CSS style of client.php unique page of Wind UI */

    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }
    }
    html, body {
        height: 100%;
        user-select: <?php echo(((WindUiAppPrefs::$appTextSelectionHighlight == true) ? "auto" : "none")); ?>;
    }
    body {
        background-color: <?php echo(WindUiAppPrefs::$styleBodyBackgroundColor); ?>;
        font-family: <?php echo(WindUiAppPrefs::$styleBodyPrimaryFontFamily); ?>;
        font-family: <?php echo(WindUiAppPrefs::$styleBodySecondaryFontFamily); ?>;
        font-size: <?php echo(WindUiAppPrefs::$styleBodyFontSizePx); ?>px;
        padding: 0;
        margin: 0 auto !important;
        color: <?php echo(WindUiAppPrefs::$styleBodyFontColor); ?>;
        overflow-y: <?php echo(((WindUiAppPrefs::$appAlwaysShowYScrollBar == true) ? "scroll" : "auto")); ?>;
    }
    textarea {
        font-family: <?php echo(WindUiAppPrefs::$styleBodyPrimaryFontFamily); ?>;
        font-family: <?php echo(WindUiAppPrefs::$styleBodySecondaryFontFamily); ?>;
        font-size: <?php echo(WindUiAppPrefs::$styleBodyFontSizePx); ?>px;
        color: <?php echo(WindUiAppPrefs::$styleBodyFontColor); ?>;
    }
    pre, code{
        user-select: all;
    }
    a {
        text-decoration: none;
        color: <?php echo(WindUiAppPrefs::$styleLinkFontColor); ?>;
    }
    a:link {
        text-decoration: none;
        color: <?php echo(WindUiAppPrefs::$styleLinkFontColor); ?>;
    }
    a:hover {
        color: <?php echo(WindUiAppPrefs::$styleLinkHoverFontColor); ?>;
        text-decoration: underline dotted <?php echo(WindUiAppPrefs::$styleLinkHoverFontColor); ?>;
    }
    a:visited {
        color: <?php echo(WindUiAppPrefs::$styleLinkVisitedFontColor); ?>;
        text-decoration:none;
    }

    /* Start-up loading screen CSS */

    .windUiLoadingScreen{
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 9999995;
        background-color: <?php echo(WindUiAppPrefs::$loadScreenBackgroundColor); ?>;
        top: 0px;
        left: 0px;
        display: flex;
        align-items: center;
        transition: all 250ms;
        opacity: 1;
    }
    .windUiLoadingScreenContent{
        width: 80%;
        max-width: 200px;
        margin-left: auto;
        margin-right: auto;
    }
    .windUiLoadingScreenContentCharging{
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .windUiLoadingScreenPoweredByBase{
        width: 100%;
        position: fixed;
        bottom: 0px;
        margin-bottom: 32px;
    }
    .windUiLoadingScreenPoweredBy{
        margin-left: auto;
        margin-right: auto;
        height: 100%;
        text-align: center;
    }

    /* Notifications and Notification area CSS */

    .windUiNotificationArea{
        position: fixed;
        top: 0px;
        left: 0px;
        height: calc(100% - 16px);
        width: 100%;
        z-index: 9999996;
        padding: 8px;
        pointer-events: none;
        display: flex;
        align-items: flex-end;
        flex-direction: column-reverse;
        transition: all 250ms;
    }
    .windUiNotificationPopUp{
        width: calc(100% - 16px);
        background-color: <?php echo(WindUiAppPrefs::$notificationBackgroundColor); ?>;
        pointer-events: all;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        box-shadow: 0px 2px 7px 0px rgba(0,0,0,0.25);
        padding: 8px;
        border-radius: 6px;
        margin-top: 8px;
        margin-right: 110%;
        transition: all 250ms;
    }
    .windUiNotificationPopUpText{
        width: 100%;
        padding: 8px;
        color: <?php echo(WindUiAppPrefs::$notificationTextFontColor); ?>;
        font-size: <?php echo(WindUiAppPrefs::$notificationTextFontSizePx); ?>;
        display: flex;
        align-items: center;
    }
    .windUiNotificationPopUpButton{
        white-space: nowrap;
        height: 35px;
        margin: 4px;
        color: <?php echo(WindUiAppPrefs::$notificationButtonTextFontColor); ?>;
        font-size: <?php echo(WindUiAppPrefs::$notificationButtonTextFontSizePx); ?>;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 250ms;
        border-radius: 6px;
        padding-right: 4px;
        padding-left: 4px;
    }
    .windUiNotificationPopUpButton:hover{
        background-color: rgba(1, 1, 1, 0.4);
    }

    /* Dialog boxes and Dialog box area */

    .windUiDialogBoxAreaBackgroundClickBlock{
        position: fixed;
        top: 0px;
        right: 0px;
        z-index: 9999997;
        width: 100%;
        height: 100%;
        background-color: rgba(1, 1, 1, 0.6);
        pointer-events: none;
        transition: all 100ms;
        opacity: 0;
    }
    .windUiDialogBoxArea{
        position: fixed;
        top: 0px;
        right: 0px;
        z-index: 9999998;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }
    .windUiComplexDialogBackground{
        position: absolute;
        top: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: auto;
        transition: all 150ms;
        opacity: 0;
    }
    .windUiComplexDialogPopUp{
        width: 100%;
        max-width: 512px;
        background-color: #ffffff;
        border-radius: 6px;
        padding: 24px;
        box-shadow: 0px 2px 7px 0px rgba(0,0,0,0.25);
        pointer-events: all;
    }
    .windUiComplexDialogTitle{
        width: 100%;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
    }
    .windUiComplexDialogTitleIcon{
        width: 48px;
        height: 48px;
        margin-right: 16px;
    }
    .windUiComplexDialogTitleText{
        display: flex;
        align-items: center;
        font-size: 22px;
        font-weight: bolder;
    }
    .windUiComplexDialogTextContent{
        font-size: 16px;
        margin-bottom: 24px;
    }
    .windUiComplexDialogButtons{
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }
    .windUiComplexDialogButton{
        white-space: nowrap;
        height: 35px;
        margin: 4px;
        color: #31454f;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 250ms;
        border-radius: 6px;
        padding-right: 4px;
        padding-left: 4px;
        font-weight: bolder;
        text-transform: uppercase;
        margin-right: 16px;
    }
    .windUiComplexDialogButton:hover{
        background-color: rgba(1, 1, 1, 0.25);
    }
    .windUiLoadingDialogBackground{
        position: absolute;
        top: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: auto;
        transition: all 150ms;
        opacity: 0;
    }
    .windUiLoadingDialogPopUp{
        width: 100%;
        max-width: 512px;
        background-color: #ffffff;
        border-radius: 6px;
        padding: 24px;
        box-shadow: 0px 2px 7px 0px rgba(0,0,0,0.25);
        pointer-events: all;
        display: flex;
        align-items: center;
    }
    .windUiLoadingDialogSpinner{
        width: 32px;
        height: 32px;
        margin-right: 16px;
        background-image: url(<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$loadScreenSpinnerResource); ?>);
        background-size: 32px 32px;
        background-repeat: no-repeat;
        background-position: center;
    }
    .windUiLoadingDialogTitle{
        display: flex;
        align-items: center;
        font-size: 18px;
        font-weight: bolder;
    }
    .windUiCustomContentDialogBackground{
        position: absolute;
        top: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: auto;
        transition: all 150ms;
        opacity: 0;
    }
    .windUiCustomContentDialogPopUp{
        width: 100%;
        height: 100%;
        max-width: 480px;
        max-height: 480px;
        background-color: #ffffff;
        border-radius: 6px;
        padding: 24px;
        box-shadow: 0px 2px 7px 0px rgba(0,0,0,0.25);
        transition: all 250ms;
    }
    .windUiCustomContentDialogPopUpClose{
        position: relative;
        top: calc(-100% - 28px);
        left: calc(100% - 4px);
        width: 32px;
        height: 32px;
        background-image: url(<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$notificationCloseIcon); ?>);
        background-size: 24px 24px;
        background-repeat: no-repeat;
        background-position: center;
        cursor: pointer;
        background-color: #8c0000;
        border-radius: 6px;
        transition: all 250ms;
    }
    .windUiCustomContentDialogPopUpClose:hover{
        background-color: #c60000;
        border-radius: 32px;
    }

    /* CSS style of div that stores important images */

    .windUiRequiredAndImportantImages{
        display: none;
    }

    /* All CSS style by screen width */

    @media screen and (max-width: 3840px) {
        .windUiNotificationArea{
            max-width: 450px;
        }
        .windUiComplexDialogPopUp{
            width: 100%;
        }
        .windUiLoadingDialogPopUp{
            width: 100%;
        }
        .windUiCustomContentDialogPopUp{
            width: 100%;
            height: 100%;
        }
    }
    @media screen and (max-width: 2560px) {
        .windUiNotificationArea{
            max-width: 450px;
        }
        .windUiComplexDialogPopUp{
            width: 100%;
        }
        .windUiLoadingDialogPopUp{
            width: 100%;
        }
        .windUiCustomContentDialogPopUp{
            width: 100%;
            height: 100%;
        }
    }
    @media screen and (max-width: 1920px) {
        .windUiNotificationArea{
            max-width: 450px;
        }
        .windUiComplexDialogPopUp{
            width: 100%;
        }
        .windUiLoadingDialogPopUp{
            width: 100%;
        }
        .windUiCustomContentDialogPopUp{
            width: 100%;
            height: 100%;
        }
    }
    @media screen and (max-width: 1368px) {
        .windUiNotificationArea{
            max-width: 400px;
        }
        .windUiComplexDialogPopUp{
            width: 95%;
        }
        .windUiLoadingDialogPopUp{
            width: 95%;
        }
        .windUiCustomContentDialogPopUp{
            width: 95%;
            height: 95%;
        }
    }
    @media screen and (max-width: 1280px) {
        .windUiNotificationArea{
            max-width: 400px;
        }
        .windUiComplexDialogPopUp{
            width: 95%;
        }
        .windUiLoadingDialogPopUp{
            width: 95%;
        }
        .windUiCustomContentDialogPopUp{
            width: 95%;
            height: 95%;
        }
    }
    @media screen and (max-width: 720px) {
        .windUiNotificationArea{
            max-width: calc(100% - 16px)
        }
        .windUiComplexDialogPopUp{
            width: calc(100% - 62px);
        }
        .windUiLoadingDialogPopUp{
            width: calc(100% - 62px);
        }
        .windUiCustomContentDialogPopUp{
            width: calc(100% - 62px);
            height: calc(90% - 62px);
        }
    }
    @media screen and (max-width: 480px) {
        .windUiNotificationArea{
            max-width: calc(100% - 16px)
        }
        .windUiComplexDialogPopUp{
            width: calc(100% - 62px);
        }
        .windUiLoadingDialogPopUp{
            width: calc(100% - 62px);
        }
        .windUiCustomContentDialogPopUp{
            width: calc(100% - 62px);
            height: calc(90% - 62px);
        }
    }
</style>