<?php
    class WindUiAppPrefs{
        //Here, you can config all preferences of this Wind UI app. Only change the variables values!
        private function __construct() {}

        //Base settings
        public static $appRootPath = "noAppRootDirectoryDefined";
        public static $appTitle = "Wind UI App";
        public static $appCode = "wind.ui.app";
        public static $appLang = "pt-br";
        public static $appCharSet = "UTF-8";
        public static $appDefaultFavicon = "/../../.core/resources/icons/favicon.png";
        public static $appWithNotificationsFavicon = "/../../.core/resources/icons/favicon-notify.png";
        public static $appBrowserColor = "#0055A5";
        public static $appPhpTimeZone = "America/Sao_Paulo";
        public static $appPreventDragImages = false;
        public static $appTextSelectionHighlight = true;
        public static $appShowNotificationOnJsLogs = false;
        public static $appAlwaysShowYScrollBar = false;
        public static $appDelayBeforeLoadFragment = 1000;
        public static $appDelayBeforeLoadAjaxRequest = 500;
        public static $appDefaultFragmentToLoad = "noDefaultFragmentDefined";
        public static $appFragmentNotFoundMessage = "Wind UI: Erro 404. We were unable to find the desired snippet you requested at this URL. The default Snippet has been loaded.";

        //App external and third party libs
        public static $clientExternalJsLibs = array();
        public static $clientExternalCssLibs = array();
        public static $clientThirdPartyBeforeBodyCloseJsLibs = array();
        public static $clientThirdPartyOnHeadJsLibs = array();
        public static $clientThirdPartyCssLibs = array();

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
        public static $cookieWarningPopUpMessage = "This application uses Cookies to maintain the best possible functioning. By continuing to use this application, you agree to this condition of use of Cookies.";
        public static $cookieWarningPopUpAcceptButton = "All Right";

        //Initial load screen
        public static $loadScreenEnabled = true;
        public static $loadScreenBackgroundColor = "#f7f7f7";
        public static $loadScreenLogoResource = "/../../.core/resources/images/startup-loading.png";
        public static $loadScreenSpinnerResource = "/../../.core/resources/images/spinner.gif";
        public static $loadScreenSpinnerSizePx = "18";
        public static $loadScreenLoadingMessage = "Loading...";
        public static $loadScreenLoadingMessageFontSizePx = "12";

        //Fragments Viewer options
        public static $fragmentsViewerSpinnerResource = "/../../.core/resources/images/spinner.gif";
        public static $fragmentsViewerSpinnerSizePx = "18";
        public static $fragmentsViewerErrorResource = "/../../.core/resources/images/network-error.png";
        public static $fragmentsViewerErrorSizePx = "64";
        public static $fragmentsViewerErrorMessage = "The content could not be loaded. Please check your Internet connection and try again.";
        public static $fragmentsViewerMinHeightPx = "450";
        public static $fragmentsViewerLoadingMessage = "Loading content...";
        public static $fragmentsViewerLoadingMessageSizePx = "14";
        public static $fragmentsViewerNotFoundResource = "/../../.core/resources/images/fragment-error.png";
        public static $fragmentsViewerNotFoundTitleMessage = "Error On Load Content";
        public static $fragmentsViewerNotFoundMessage = "<b>Wind UI:</b> The desired fragment could not be loaded. Apparently the Fragment was not found or has invalid content. Please check that the path to the fragment is correct. Also check, if there is any PHP code with any syntax error, in the fragment.";

        //Notifications options
        public static $notificationBackgroundColor = "#31454f";
        public static $notificationTextFontColor = "#f5f5f5";
        public static $notificationTextFontSizePx = "14px";
        public static $notificationButtonTextFontColor = "#ccbe00";
        public static $notificationButtonTextFontSizePx = "14px";
        public static $notificationOggSoundFile = "/../../.core/resources/sounds/notification.ogg";
        public static $notificationMp3SoundFile = "/../../.core/resources/sounds/notification.mp3";
        public static $notificationCloseIcon = "/../../.core/resources/images/close-notification.png";

        //Ajax request running loading buttons
        public static $ajaxHttpRequestLoadingOnButtonSpinnerResource = "/../../.core/resources/images/spinner.gif";
        public static $ajaxHttpRequestLoadingOnButtonSpinnerSizePx = "18";

        //Sessions settings
        public static $sessionsRequiredDefinedVariablesToSessionBeValid = array();
        public static $sessionsValidateSessionWithIp = false;

        



        //Load all settings in "app-settings.json"
        public static function loadAllSettingsFromCurrentApp(string $appRootPath){
            //Get the app root dir
            self::$appRootPath = $appRootPath;
            //Build the app-settings.json path
            $appSettingsJsonFile = $appRootPath . "/app-settings.json";
            //Get the app settings stdClass
            $appSettings = null;

            //Read app-settings.json file if is a file
            if(is_file($appSettingsJsonFile) == true)
                $appSettings = json_decode(file_get_contents($appSettingsJsonFile));
            if(is_file($appSettingsJsonFile) == false){
                echo("<b>Wind UI:</b> This app's preferences and settings could not be read. The \"app-settings.json\" file was not found.");
                echo("<script type=\"text/javascript\"> console.error('Wind UI: This app\'s preferences and settings could not be read. The \"app-settings.json\" file was not found.'); </script>");
                exit();
            }

            //Load all vars

            //Base settings
            self::$appTitle = self::getFirstVariableThatMatch("appTitle", self::$appTitle, $appSettings);
            self::$appCode = self::getFirstVariableThatMatch("appCode", self::$appCode, $appSettings);
            self::$appLang = self::getFirstVariableThatMatch("appLang", self::$appLang , $appSettings);
            self::$appCharSet = self::getFirstVariableThatMatch("appCharSet", self::$appCharSet, $appSettings);
            self::$appDefaultFavicon = self::getFirstVariableThatMatch("appDefaultFavicon", self::$appDefaultFavicon, $appSettings);
            self::$appWithNotificationsFavicon = self::getFirstVariableThatMatch("appWithNotificationsFavicon", self::$appWithNotificationsFavicon, $appSettings);
            self::$appBrowserColor = self::getFirstVariableThatMatch("appBrowserColor", self::$appBrowserColor, $appSettings);
            self::$appPhpTimeZone = self::getFirstVariableThatMatch("appPhpTimeZone", self::$appPhpTimeZone, $appSettings);
            self::$appPreventDragImages = self::getFirstVariableThatMatch("appPreventDragImages", self::$appPreventDragImages, $appSettings);
            self::$appTextSelectionHighlight = self::getFirstVariableThatMatch("appTextSelectionHighlight", self::$appTextSelectionHighlight, $appSettings);
            self::$appShowNotificationOnJsLogs = self::getFirstVariableThatMatch("appShowNotificationOnJsLogs", self::$appShowNotificationOnJsLogs, $appSettings);
            self::$appAlwaysShowYScrollBar = self::getFirstVariableThatMatch("appAlwaysShowYScrollBar", self::$appAlwaysShowYScrollBar, $appSettings);
            self::$appDelayBeforeLoadFragment = self::getFirstVariableThatMatch("appDelayBeforeLoadFragment", self::$appDelayBeforeLoadFragment, $appSettings);
            self::$appDelayBeforeLoadAjaxRequest = self::getFirstVariableThatMatch("appDelayBeforeLoadAjaxRequest", self::$appDelayBeforeLoadAjaxRequest, $appSettings);
            self::$appDefaultFragmentToLoad = self::getFirstVariableThatMatch("appDefaultFragmentToLoad", self::$appDefaultFragmentToLoad, $appSettings);
            self::$appFragmentNotFoundMessage = self::getFirstVariableThatMatch("appFragmentNotFoundMessage", self::$appFragmentNotFoundMessage, $appSettings);

            //App external and third party libs
            self::$clientExternalJsLibs = self::getFirstVariableThatMatch("clientExternalJsLibs", self::$clientExternalJsLibs, $appSettings);
            self::$clientExternalCssLibs = self::getFirstVariableThatMatch("clientExternalCssLibs", self::$clientExternalCssLibs, $appSettings);
            self::$clientThirdPartyBeforeBodyCloseJsLibs = self::getFirstVariableThatMatch("clientThirdPartyBeforeBodyCloseJsLibs", self::$clientThirdPartyBeforeBodyCloseJsLibs, $appSettings);
            self::$clientThirdPartyOnHeadJsLibs = self::getFirstVariableThatMatch("clientThirdPartyOnHeadJsLibs", self::$clientThirdPartyOnHeadJsLibs, $appSettings);
            self::$clientThirdPartyCssLibs = self::getFirstVariableThatMatch("clientThirdPartyCssLibs", self::$clientThirdPartyCssLibs, $appSettings);

            //client.php base style
            self::$styleBodyBackgroundColor = self::getFirstVariableThatMatch("styleBodyBackgroundColor", self::$styleBodyBackgroundColor, $appSettings);
            self::$styleBodyPrimaryFontFamily = self::getFirstVariableThatMatch("styleBodyPrimaryFontFamily", self::$styleBodyPrimaryFontFamily, $appSettings);
            self::$styleBodySecondaryFontFamily = self::getFirstVariableThatMatch("styleBodySecondaryFontFamily", self::$styleBodySecondaryFontFamily, $appSettings);
            self::$styleBodyFontSizePx = self::getFirstVariableThatMatch("styleBodyFontSizePx", self::$styleBodyFontSizePx, $appSettings);
            self::$styleBodyFontColor = self::getFirstVariableThatMatch("styleBodyFontColor", self::$styleBodyFontColor, $appSettings);
            self::$styleLinkFontColor = self::getFirstVariableThatMatch("styleLinkFontColor", self::$styleLinkFontColor, $appSettings);
            self::$styleLinkHoverFontColor = self::getFirstVariableThatMatch("styleLinkHoverFontColor", self::$styleLinkHoverFontColor, $appSettings);
            self::$styleLinkVisitedFontColor = self::getFirstVariableThatMatch("styleLinkVisitedFontColor", self::$styleLinkVisitedFontColor, $appSettings);

            //client.php load bar style
            self::$loadBarHeight = self::getFirstVariableThatMatch("loadBarHeight", self::$loadBarHeight, $appSettings);
            self::$loadBarColor = self::getFirstVariableThatMatch("loadBarColor", self::$loadBarColor, $appSettings);
            self::$loadBarShowOnEachAjaxRequest = self::getFirstVariableThatMatch("loadBarShowOnEachAjaxRequest", self::$loadBarShowOnEachAjaxRequest, $appSettings);

            //client.php scrollbar style
            self::$scrollBarWidthPx = self::getFirstVariableThatMatch("scrollBarWidthPx", self::$scrollBarWidthPx, $appSettings);
            self::$scrollBarTrackColor = self::getFirstVariableThatMatch("scrollBarTrackColor", self::$scrollBarTrackColor, $appSettings);
            self::$scrollBarThumbColor = self::getFirstVariableThatMatch("scrollBarThumbColor", self::$scrollBarThumbColor, $appSettings);

            //Cookie warning options
            self::$cookieWarningPopUpMessage = self::getFirstVariableThatMatch("cookieWarningPopUpMessage", self::$cookieWarningPopUpMessage, $appSettings);
            self::$cookieWarningPopUpAcceptButton = self::getFirstVariableThatMatch("cookieWarningPopUpAcceptButton", self::$cookieWarningPopUpAcceptButton, $appSettings);

            //Initial load screen
            self::$loadScreenEnabled = self::getFirstVariableThatMatch("loadScreenEnabled", self::$loadScreenEnabled, $appSettings);
            self::$loadScreenBackgroundColor = self::getFirstVariableThatMatch("loadScreenBackgroundColor", self::$loadScreenBackgroundColor, $appSettings);
            self::$loadScreenLogoResource = self::getFirstVariableThatMatch("loadScreenLogoResource", self::$loadScreenLogoResource, $appSettings);
            self::$loadScreenSpinnerResource = self::getFirstVariableThatMatch("loadScreenSpinnerResource", self::$loadScreenSpinnerResource, $appSettings);
            self::$loadScreenSpinnerSizePx = self::getFirstVariableThatMatch("loadScreenSpinnerSizePx", self::$loadScreenSpinnerSizePx, $appSettings);
            self::$loadScreenLoadingMessage = self::getFirstVariableThatMatch("loadScreenLoadingMessage", self::$loadScreenLoadingMessage, $appSettings);
            self::$loadScreenLoadingMessageFontSizePx = self::getFirstVariableThatMatch("loadScreenLoadingMessageFontSizePx", self::$loadScreenLoadingMessageFontSizePx, $appSettings);

            //Fragments Viewer options
            self::$fragmentsViewerSpinnerResource = self::getFirstVariableThatMatch("fragmentsViewerSpinnerResource", self::$fragmentsViewerSpinnerResource, $appSettings);
            self::$fragmentsViewerSpinnerSizePx = self::getFirstVariableThatMatch("fragmentsViewerSpinnerSizePx", self::$fragmentsViewerSpinnerSizePx, $appSettings);
            self::$fragmentsViewerErrorResource = self::getFirstVariableThatMatch("fragmentsViewerErrorResource", self::$fragmentsViewerErrorResource, $appSettings);
            self::$fragmentsViewerErrorSizePx = self::getFirstVariableThatMatch("fragmentsViewerErrorSizePx", self::$fragmentsViewerErrorSizePx, $appSettings);
            self::$fragmentsViewerErrorMessage = self::getFirstVariableThatMatch("fragmentsViewerErrorMessage", self::$fragmentsViewerErrorMessage, $appSettings);
            self::$fragmentsViewerMinHeightPx = self::getFirstVariableThatMatch("fragmentsViewerMinHeightPx", self::$fragmentsViewerMinHeightPx, $appSettings);
            self::$fragmentsViewerLoadingMessage = self::getFirstVariableThatMatch("fragmentsViewerLoadingMessage", self::$fragmentsViewerLoadingMessage, $appSettings);
            self::$fragmentsViewerLoadingMessageSizePx = self::getFirstVariableThatMatch("fragmentsViewerLoadingMessageSizePx", self::$fragmentsViewerLoadingMessageSizePx, $appSettings);
            self::$fragmentsViewerNotFoundResource = self::getFirstVariableThatMatch("fragmentsViewerNotFoundResource", self::$fragmentsViewerNotFoundResource, $appSettings);
            self::$fragmentsViewerNotFoundTitleMessage = self::getFirstVariableThatMatch("fragmentsViewerNotFoundTitleMessage", self::$fragmentsViewerNotFoundTitleMessage, $appSettings);
            self::$fragmentsViewerNotFoundMessage = self::getFirstVariableThatMatch("fragmentsViewerNotFoundMessage", self::$fragmentsViewerNotFoundMessage, $appSettings);

            //Notifications options
            self::$notificationBackgroundColor = self::getFirstVariableThatMatch("notificationBackgroundColor", self::$notificationBackgroundColor, $appSettings);
            self::$notificationTextFontColor = self::getFirstVariableThatMatch("notificationTextFontColor", self::$notificationTextFontColor, $appSettings);
            self::$notificationTextFontSizePx = self::getFirstVariableThatMatch("notificationTextFontSizePx", self::$notificationTextFontSizePx, $appSettings);
            self::$notificationButtonTextFontColor = self::getFirstVariableThatMatch("notificationButtonTextFontColor", self::$notificationButtonTextFontColor, $appSettings);
            self::$notificationButtonTextFontSizePx = self::getFirstVariableThatMatch("notificationButtonTextFontSizePx", self::$notificationButtonTextFontSizePx, $appSettings);
            self::$notificationOggSoundFile = self::getFirstVariableThatMatch("notificationOggSoundFile", self::$notificationOggSoundFile, $appSettings);
            self::$notificationMp3SoundFile = self::getFirstVariableThatMatch("notificationMp3SoundFile", self::$notificationMp3SoundFile, $appSettings);
            self::$notificationCloseIcon = self::getFirstVariableThatMatch("notificationCloseIcon", self::$notificationCloseIcon, $appSettings);

            //Ajax request running loading buttons
            self::$ajaxHttpRequestLoadingOnButtonSpinnerResource = self::getFirstVariableThatMatch("ajaxHttpRequestLoadingOnButtonSpinnerResource", self::$ajaxHttpRequestLoadingOnButtonSpinnerResource, $appSettings);
            self::$ajaxHttpRequestLoadingOnButtonSpinnerSizePx = self::getFirstVariableThatMatch("ajaxHttpRequestLoadingOnButtonSpinnerSizePx", self::$ajaxHttpRequestLoadingOnButtonSpinnerSizePx, $appSettings);
        
            //Sessions settings
            self::$sessionsRequiredDefinedVariablesToSessionBeValid = self::getFirstVariableThatMatch("sessionsRequiredDefinedVariablesToSessionBeValid", self::$sessionsRequiredDefinedVariablesToSessionBeValid, $appSettings);
            self::$sessionsValidateSessionWithIp = self::getFirstVariableThatMatch("sessionsValidateSessionWithIp", self::$sessionsValidateSessionWithIp, $appSettings);

            //Validate some variables values
            if(self::$appDelayBeforeLoadFragment <= 150)
                self::$appDelayBeforeLoadFragment = 150;
            if(self::$appDelayBeforeLoadAjaxRequest <= 100)
                self::$appDelayBeforeLoadAjaxRequest = 100;
        }

        //Get a value of json that have a specific name
        public static function getFirstVariableThatMatch(string $variableName, $originalAndDefaultValue, stdClass $json){
            //Get a variable from params, the variable cannot be empty or inexistent, or this return te original and default value
            foreach (get_object_vars($json) as $variable => $value) 
                if (strpos($variable, $variableName) !== false){
                    //Case bool
                    if(is_bool($value) === true){
                        if($value == "true" || $value == 1 || $value == true)
                            return true;
                        if($value == "false" || $value == 0 || $value == false)
                            return false;
                    }
                    if(is_bool($value) === true){
                        if($value == "true" || $value == 1 || $value == true)
                            return true;
                        if($value == "false" || $value == 0 || $value == false)
                            return false;
                    }
                    //Case string
                    if(is_string($value) === true){
                        if($value != "")
                            return $value;
                    }
                    //Case number
                    if(is_numeric($value) === true){
                        if(is_float($value) === true)
                            return (float)$value;
                        if(is_int($value) === true)
                            return (int)$value;
                    }
                    //Case array
                    if(is_array($value) === true){
                        $newValidatedArray = array();
                        for($i = 0; $i < count($value); $i++)
                            if($value[$i] != "")
                                array_push($newValidatedArray, $value[$i]);
                        return $newValidatedArray;
                    }
                }
            return $originalAndDefaultValue;
        }
    }
?>