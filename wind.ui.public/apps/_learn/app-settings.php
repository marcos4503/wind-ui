<?php
    class WindUiAppPrefs{
        //Here, you can config all preferences of this Wind UI app. Only change the variables values!
        private function __construct() {}

        //Base settings
        public static $appTitle = "Wind UI";
        public static $appCode = "wind.ui.learn.app";
        public static $appLang = "pt-br";
        public static $appCharSet = "UTF-8";
        public static $appDefaultFavicon = "/resources/icons/favicon.png";
        public static $appWithNotificationsFavicon = "/resources/icons/favicon-notify.png";
        public static $appBrowserColor = "#0055A5";
        public static $appPhpTimeZone = "America/Sao_Paulo";
        public static $appRootPath = (__DIR__);
        public static $appPreventDragImages = true;
        public static $appTextSelectionHighlight = false;
        public static $appShowNotificationOnJsLogs = true;

        //client.php base style
        public static $styleBodyBackgroundColor = "#d9d9d9";
        public static $styleBodyPrimaryFontFamily = "Helvetica, sans-seri";
        public static $styleBodySecondaryFontFamily = "-apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
        public static $styleBodyFontSizePx = "14";
        public static $styleBodyFontColor = "#444444";
        public static $styleLinkFontColor = "#3068c1";
        public static $styleLinkHoverFontColor = "#404144";
        public static $styleLinkVisitedFontColor = "#3068c1";

        //client.php load bar style
        public static $loadBarHeight = "2px";
        public static $loadBarColor = "#ba0000";
        public static $loadBarShowOnEachAjaxRequest = false;

        //client.php scrollbar style
        public static $scrollBarWidthPx = "8";
        public static $scrollBarTrackColor = "#cecece";
        public static $scrollBarThumbColor = "#282828";

        //Cookie warning options
        public static $cookieWarningPopUpMessage = "Esta aplicação utiliza Cookies para garantir o melhor funcionamento. Ao utilizar esta aplicação, você concorda com o uso de Cookies.";
        public static $cookieWarningPopUpAcceptButton = "Concordo";

        //Initial load screen
        public static $loadScreenBackgroundColor = "#f7f7f7";
        public static $loadScreenLogoResource = "/resources/images/startup-loading.png";
        public static $loadScreenSpinnerResource = "/../../.core/resources/images/spinner.gif";
        public static $loadScreenSpinnerSizePx = "18";
        public static $loadScreenLoadingMessage = "Carregando...";
        public static $loadScreenLoadingMessageFontSizePx = "12";

        //Fragments Viewer options
        public static $fragmentsViewerSpinnerResource = "/../../.core/resources/images/spinner.gif";
        public static $fragmentsViewerSpinnerSizePx = "18";
        public static $fragmentsViewerErrorResource = "/../../.core/resources/images/network-error.png";
        public static $fragmentsViewerErrorSizePx = "64";
        public static $fragmentsViewerErrorMessage = "Não foi possível carregar este conteúdo. Por favor, verifique sua conexão e tente novamente.";
        public static $fragmentsViewerMinHeightPx = "450";
        public static $fragmentsViewerLoadingMessage = "Carregando conteúdo...";
        public static $fragmentsViewerLoadingMessageSizePx = "14";

        //Notifications options
        public static $notificationBackgroundColor = "#31454f";
        public static $notificationTextFontColor = "#f5f5f5";
        public static $notificationTextFontSizePx = "14px";
        public static $notificationButtonTextFontColor = "#ccbe00";
        public static $notificationButtonTextFontSizePx = "14px";
        public static $notificationOggSoundFile = "/../../.core/resources/sounds/notification.ogg";
        public static $notificationMp3SoundFile = "/../../.core/resources/sounds/notification.mp3";
        public static $notificationCloseIcon = "/../../.core/resources/images/close-notification.png";
    }
?>