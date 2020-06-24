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
    .windUiLoadingScreen{
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 9999998;
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
    .windUiNotificationArea{
        position: fixed;
        top: 0px;
        left: 0px;
        height: calc(100% - 16px);
        width: 100%;
        z-index: 9999997;
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

    /* All CSS style by screen width */
    @media screen and (max-width: 3840px) {
        .windUiNotificationArea{
            max-width: 450px;
        }
    }
    @media screen and (max-width: 2560px) {
        .windUiNotificationArea{
            max-width: 450px;
        }
    }
    @media screen and (max-width: 1920px) {
        .windUiNotificationArea{
            max-width: 450px;
        }
    }
    @media screen and (max-width: 1368px) {
        .windUiNotificationArea{
            max-width: 400px;
        }
    }
    @media screen and (max-width: 1280px) {
        .windUiNotificationArea{
            max-width: 400px;
        }
    }
    @media screen and (max-width: 720px) {
        .windUiNotificationArea{
            max-width: calc(100% - 16px)
        }
    }
    @media screen and (max-width: 480px) {
        .windUiNotificationArea{
            max-width: calc(100% - 16px)
        }
    }
</style>