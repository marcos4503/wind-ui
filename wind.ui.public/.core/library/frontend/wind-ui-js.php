<script type="text/javascript">
    //Run functions on page loaded
    window.addEventListener('load', function(){
        WindUiJs.checkIfTheUserAcceptedCookiesForThisApp();
        WindUiJs.disableDragEventOnAllImagesIfDesired();
    }, false);

    //Run functions with a interval
    window.setInterval(function(){
        WindUiJs.loadRightFragmentIfUrlIsDifferent();
        WindUiJs.checkCurrentClientScreenWidthAndRunCustomFunction();
        WindUiJs.countNodesOnNotificationAreaAndShowCorrectFavicon();
        WindUiJs.countNodesOnDialogAreaAndShowBackgroundBlock();
        if(WindUiJs.customFunctionToBeRunnedOnEach100Milliseconds != null && WindUiJs.isFunction(WindUiJs.customFunctionToBeRunnedOnEach100Milliseconds) == true)
            WindUiJs.customFunctionToBeRunnedOnEach100Milliseconds();
    }, 100);

    //Catch all logs
    function catchConsoleLog(msg) { 
        <?php echo(((WindUiAppPrefs::$appShowNotificationOnJsLogs == true) ? "" : "return;")); ?>
        WindUiJs.showSimpleNotification("[JavaScript Log] " + msg, 0, true, null); 
    }
    <?php echo(((WindUiAppPrefs::$appShowNotificationOnJsLogs == false) ? "//" : "")); ?>window.console.log = catchConsoleLog;
    function catchConsoleError(msg) { 
        <?php echo(((WindUiAppPrefs::$appShowNotificationOnJsLogs == true) ? "" : "return;")); ?>
        WindUiJs.showSimpleNotification("[JavaScript Error] " + msg, 0, true, null); 
    }
    <?php echo(((WindUiAppPrefs::$appShowNotificationOnJsLogs == false) ? "//" : "")); ?>window.console.error = catchConsoleError;
    function catchConsoleWarn(msg) { 
        <?php echo(((WindUiAppPrefs::$appShowNotificationOnJsLogs == true) ? "" : "return;")); ?>
        WindUiJs.showSimpleNotification("[JavaScript Warn] " + msg, 0, true, null); 
    }
    <?php echo(((WindUiAppPrefs::$appShowNotificationOnJsLogs == false) ? "//" : "")); ?>window.console.warn = catchConsoleWarn;

    //All public methods of JavaScript Wind UI
    class WindUiJs{
        //Variables from Wind UI Core JS
        static alreadyLoadingFragment = false;
        static defaultAppIcon = "";
        static withNotificationsAppIcon = "";
        static notificationAreaElement = null;
        static lastQuantityOfNodesInNotificationArea = -1;
        static customFunctionToRunBeforeLoadFragment = null;
        static customFunctionToRunAfterLoadFragment = null;
        static currentRequestedFragment = "";
        static blockOnLoadNewFragmentWhileAjaxHttpRequestRunning = false;
        static currentAjaxHttpRequestsRunning = 0;
        static customFunctionToOnTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning = null;
        static alwaysShowNotificationFavicon = false;
        static customFunctionToRunAccordingClientScreenWidth = null;
        static customFunctionToBeRunnedOnEach100Milliseconds = null;
        static isCurrentPingingServerNow = false;
        static dialogAreaElement = null;
        static lastQuantityOfNodesInDialogArea = -1;

        //Basic tools for all methods

        static isFunction(variableToCheck){
            //If our variable is an instance of "Function"
            if (variableToCheck instanceof Function) {
                return true;
            }
            return false;
        }

        static isJsonString(str) {
            //Return true if a string is a json syntax
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }

        static isXmlHttpRequest(object){
            //Return true if object is xmlhttprequest
            try {
                var test = object.responseText;
            } 
            catch (e) {
                return false;
            }
            return true;
        }

        static isFormData(object){
            //Return true if object is formdata
            try {
                var test = object.append("", "");
            } 
            catch (e) {
                return false;
            }
            return true;
        }

        static isString(value){
            //Return true if value is a string
            if(typeof value === "string" || value instanceof String){
                return true;
            }  
            else{
                return false;
            }
        }

        static isNumber(value){
            //Return true if value is a number
            if(isNaN(value) == false && isFinite(value) == true && typeof value !== "boolean" && value != null){
                return true;
            }    
            else{
                return false;
            }
        }

        static isFloat(value){
            //Return true if value is a float
            if(isNaN(value) == false && value != null && value.toString().indexOf('.') != -1){
                return true;
            }  
            else{
                return false;
            }
        }

        static isInt(value){
            //Return true if value is a int
            if(value === parseInt(value, 10)){
                return true;
            }  
            else{
                return false;
            }
        }

        static isBool(value){
            //Return true if value is a bool
            if(typeof value === "boolean"){
                return true;
            }  
            else{
                return false;
            }
        }

        static loadJsFile(filename){
            //Remove old script
            document.getElementsByTagName("head")[0].removeChild(document.getElementById("windUiDynamicFragmentJavaScript"));

            //Create and load new script
            var fileref = document.createElement('script');
            fileref.setAttribute("id","windUiDynamicFragmentJavaScript");
            fileref.setAttribute("type","text/javascript");
            fileref.setAttribute("src", filename);
            if (typeof fileref != "undefined")
                document.getElementsByTagName("head")[0].appendChild(fileref);

            //Return the script element
            return fileref;
        }

        static getFileFromFragmentNameStr(fragmentName){
            //Split fragment name
            var splited = fragmentName.split('/');
            if(splited.length == 1)
                return fragmentName;
            if(splited.length > 1){
                return splited[splited.length - 1];
            }
        }

        static getDirFromFragmentNameStr(fragmentName){
            //Split dir in fragment name
            var splited = fragmentName.split('/');
            if(splited.length == 1)
                return fragmentName;
            if(splited.length > 1){
                var dir = "";
                var firstBar = false;
                for(var i = 0; i < splited.length; i++){
                    if(firstBar == false){
                        dir += splited[i];
                        firstBar = true;
                        continue;
                    }    
                    if(firstBar == true){
                        dir += "/" + splited[i];
                        continue;
                    }
                }
                return dir;
            }
        }

        static getDayConvertedToString(dateObject){
            //Converts day to string
            var day = dateObject.getDate();
            if(day < 10)
                return ("0" + day.toString());
            if(day >= 10)
                return day.toString();
        }

        static getMonthConvertedToString(dateObject){
            //Converts month to string
            var month = dateObject.getMonth();
            if(month < 10)
                return ("0" + (month + 1).toString());
            if(month >= 10)
                return (month + 1).toString();
        }

        static getYearConvertedToString(dateObject){
            //Converts year to string
            var year = dateObject.getFullYear();
            if(year < 10)
                return ("0" + year.toString());
            if(year >= 10)
                return year.toString();
        }

        static getHourConvertedToString(dateObject){
            //Converts hour to string
            var hour = dateObject.getHours();
            if(hour < 10)
                return ("0" + hour.toString());
            if(hour >= 10)
                return hour.toString();
        }

        static getMinuteConvertedToString(dateObject){
            //Converts minute to string
            var minute = dateObject.getMinutes();
            if(minute < 10)
                return ("0" + minute.toString());
            if(minute >= 10)
                return minute.toString();
        }

        static getSecondConvertedToString(dateObject){
            //Converts second to string
            var second = dateObject.getSeconds();
            if(second < 10)
                return ("0" + second.toString());
            if(second >= 10)
                return second.toString();
        }

        //Client after load methods

        static disableDragEventOnAllImagesIfDesired() {
            //Verify in PHP in app prefs if is desired to disable drag event on images
            var canDisable = <?php echo(((WindUiAppPrefs::$appPreventDragImages == true) ? "true" : "false")); ?>;
            if(canDisable == false)
                return;

            //Disable drag events for all images
            var allImages = document.getElementsByTagName("IMG");
            for (var i = 0; i < allImages.length; i++){
                allImages[i].ondragstart = function() { return false; };
            }
        }

        static checkIfTheUserAcceptedCookiesForThisApp(){
            //Check if the user has accepted cookies, if not display the dialog
            if(localStorage.getItem("acceptedCookie:<?php echo(WindUiAppPrefs::$appCode); ?>") == null){
                WindUiJs.showActionNotification('<?php echo(WindUiAppPrefs::$cookieWarningPopUpMessage); ?>', 0, false, '<?php echo(WindUiAppPrefs::$cookieWarningPopUpAcceptButton); ?>', function(){
                    localStorage.setItem("acceptedCookie:<?php echo(WindUiAppPrefs::$appCode); ?>", "true");
                }, true, function(){
                    WindUiJs.checkIfTheUserAcceptedCookiesForThisApp();
                });
            }
        }

        //Client core methods

        static setFunctionToBeRunnedOnBeforeLoadANewFragment(customFunction){
            //Set a function to be runned before start to load a new fragment. This function registered here is automatically cleared on execute by Wind UI
            WindUiJs.customFunctionToRunBeforeLoadFragment = customFunction;
        }

        static setFunctionToBeRunnedAfterLoadANewFragment(customFunction){
            //Set a function to be runned after load a new fragment. Runs function on sucess or on error of load a fragment
            WindUiJs.customFunctionToRunAfterLoadFragment = customFunction;
        }

        static setFunctionToBeRunnedOnEach100Milliseconds(customFunction){
            //Set the custom function to be runned on each 100 milliseconds
            WindUiJs.customFunctionToBeRunnedOnEach100Milliseconds = customFunction;
        }

        static loadNewFragment(fragmentName, postData) {
            //If already is loading a new fragment, cancel request
            if(WindUiJs.alreadyLoadingFragment == true){
                console.log("Wind UI: Already loading a Fragment. Please, wait the load, to request a new Fragment.");
                return;
            }

            //If the requested fragment is null or empty, cancel load
            if(fragmentName == null || fragmentName == ""){
                console.error("Wind UI: Error on load Fragment " + fragmentName + ". Fragment name is invalid.");
                return;
            }

            //If is running a ajax http request, cancel load of fragment
            if(WindUiJs.blockOnLoadNewFragmentWhileAjaxHttpRequestRunning == true && WindUiJs.currentAjaxHttpRequestsRunning > 0){
                if(WindUiJs.customFunctionToOnTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning != null && WindUiJs.isFunction(WindUiJs.customFunctionToOnTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning) == true)
                    WindUiJs.customFunctionToOnTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning();
                console.error("Wind UI: Error on load Fragment " + fragmentName + ". " + WindUiJs.currentAjaxHttpRequestsRunning.toString() + " Ajax Http Request is running. Please, wait.");
                return;
            }

            //Insert this fragment request data
            WindUiJs.alreadyLoadingFragment = true;
            WindUiJs.currentRequestedFragment = fragmentName;

            //Change the current url, to show current fragment (and add this new URL to history of browser)
            var queryParams = new URLSearchParams(window.location.search);
            queryParams.set("fragment", fragmentName);
            history.pushState(null, null, "?" + queryParams.toString());

            //Get elements
            var windUiLoadingScreen = document.getElementById("windUiLoadingScreen");
            var windUiClientFragmentsViewer = document.getElementById("windUiClientFragmentsViewer");

            //Reset the fragments viewer and show a 'loading' content
            windUiClientFragmentsViewer.innerHTML = '<?php echo(''
            .'<div style="width: 100%; height: '.WindUiAppPrefs::$fragmentsViewerMinHeightPx.'px; display: flex; align-items: center; justify-content: center;">'
                .'<image src="'.WindUiAppPrefs::$appRootPath.WindUiAppPrefs::$fragmentsViewerSpinnerResource.'" style="width: '.WindUiAppPrefs::$fragmentsViewerSpinnerSizePx.'px; height: '.WindUiAppPrefs::$fragmentsViewerSpinnerSizePx.'px;" />'
                .'<div style="margin-left: '.((WindUiAppPrefs::$fragmentsViewerLoadingMessage == "") ? "0" : "8").'px; font-size: '.WindUiAppPrefs::$fragmentsViewerLoadingMessageSizePx.'px; line-height: '.WindUiAppPrefs::$fragmentsViewerSpinnerSizePx.'px;">'
                    .WindUiAppPrefs::$fragmentsViewerLoadingMessage
                .'</div>'
            .'</div>'
            .'');
            ?>';

            //Run the custom function before stats to load a new fragment, if is desired, and clear that function
            if(WindUiJs.customFunctionToRunBeforeLoadFragment != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunBeforeLoadFragment) == true){
                WindUiJs.customFunctionToRunBeforeLoadFragment();
                WindUiJs.customFunctionToRunBeforeLoadFragment = null;
            }

            //Prepare to load a new fragment
            var xmlHttpreq = new XMLHttpRequest();
            xmlHttpreq.open("POST", "<?php echo(WindUiAppPrefs::$appRootPath . "/fragments/"); ?>" + WindUiJs.getDirFromFragmentNameStr(fragmentName) + "/" + WindUiJs.getFileFromFragmentNameStr(fragmentName) + ".php", true);
            xmlHttpreq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlHttpreq.onreadystatechange = function(){
                if (xmlHttpreq.readyState === 4) {
                    if (xmlHttpreq.status === 200) {
                        //IF SUCESS

                        //Insert the loaded content inside the fragments viewer
                        windUiClientFragmentsViewer.innerHTML = xmlHttpreq.responseText;

                        //Change the contents of all og metatags of client with the metatags of this fragment, delete <json> from this fragment
                        var windUiJsonFragmentManifestNode = document.getElementById("windUiJsonFragmentManifest");
                        if(windUiJsonFragmentManifestNode == null)
                            console.error("Wind UI: We couldn't find a Json tag manifest in this fragment.");
                        if(windUiJsonFragmentManifestNode != null){
                            var jsonManifestOfThisFragment = windUiJsonFragmentManifestNode.innerHTML;
                            if(WindUiJs.isJsonString(jsonManifestOfThisFragment) == true){
                                var jsonManifest = JSON.parse(jsonManifestOfThisFragment);
                                WindUiJs.changeCurrentClientTitle(jsonManifest.fragmentOgMetaTagTitle);
                                document.getElementById("windUiOgMetaTagUrl").content = window.location.href;
                                document.getElementById("windUiOgMetaTagTitle").content = jsonManifest.fragmentOgMetaTagTitle;
                                document.getElementById("windUiOgMetaTagDescription").content = jsonManifest.fragmentOgMetaTagDescription;
                                document.getElementById("windUiOgMetaTagImage").content = "<?php echo(WindUiAppPrefs::$appRootPath); ?>" + jsonManifest.fragmentOgMetaTagImage;
                                document.getElementById("windUiOgMetaTagImageType").content = jsonManifest.fragmentOgMetaTagImageType;
                                document.getElementById("windUiOgMetaTagImageWidth").content = jsonManifest.fragmentOgMetaTagImageWidth;
                                document.getElementById("windUiOgMetaTagImageHeight").content = jsonManifest.fragmentOgMetaTagImageHeight;
                                document.getElementById("windUiOgMetaTagType").content = jsonManifest.fragmentOgMetaTagType;
                                document.getElementById("windUiOgArticleAuthor").content = jsonManifest.fragmentOgArticleAuthor;
                                document.getElementById("windUiOgArticleSection").content = jsonManifest.fragmentOgArticleSection;
                                document.getElementById("windUiOgArticleTag").content = jsonManifest.fragmentOgArticleTags;
                                document.getElementById("windUiOgArticlePublishTime").content = jsonManifest.fragmentOgArticlePublishTime;
                            }
                            windUiClientFragmentsViewer.removeChild(windUiJsonFragmentManifestNode);
                        }
                        
                        //Eval all JavaScript tags of fragment code
                        var allScriptTagsInsideFragment = windUiClientFragmentsViewer.getElementsByTagName("SCRIPT");
                        for (var i = 0; i < allScriptTagsInsideFragment.length; i++)
                            eval(allScriptTagsInsideFragment[i].innerHTML);
                    }
                    else {
                        //IF NETWORK ERROR

                        //Show network error message
                        windUiClientFragmentsViewer.innerHTML = '<?php echo(''
                        .'<div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; min-height: '.WindUiAppPrefs::$fragmentsViewerMinHeightPx.'px;">'
                            .'<div style="display: grid; grid-template-rows: auto auto; width: 80%; max-width: 250px;">'
                                .'<center>'
                                    .'<image src="'.WindUiAppPrefs::$appRootPath.WindUiAppPrefs::$fragmentsViewerErrorResource.'" style="width: '.WindUiAppPrefs::$fragmentsViewerErrorSizePx.'px;" />'
                                .'</center>'
                                .'<div style="margin-top: 16px;">'
                                    .'<center>'
                                        .WindUiAppPrefs::$fragmentsViewerErrorMessage
                                    .'</center>'
                                .'</div>'
                            .'</div>'
                        .'</div>'
                        .'');
                        ?>';
                    }

                    //Run functions needed after load fragment
                    WindUiJs.disableDragEventOnAllImagesIfDesired();
                    WindUiJs.alreadyLoadingFragment = false;

                    //Disable the startup load screen
                    setTimeout(function () { 
                        windUiLoadingScreen.style.opacity = "0";
                        windUiLoadingScreen.style.pointerEvents = "none";
                    }, 1000);

                    //Run the custom function after loaded a new fragment, if is desired
                    if(WindUiJs.customFunctionToRunAfterLoadFragment != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAfterLoadFragment) == true)
                        WindUiJs.customFunctionToRunAfterLoadFragment();
                }
            }

            //Try to load script.js from fragment preventing from cache
            var dynamicJsScript = WindUiJs.loadJsFile("<?php echo(WindUiAppPrefs::$appRootPath . "/fragments/"); ?>" + WindUiJs.getDirFromFragmentNameStr(fragmentName) + "/" + WindUiJs.getFileFromFragmentNameStr(fragmentName) + ".js?noCache=" + (Date.now().toString()));
            dynamicJsScript.onload = function(){
                //Only starts to load fragment, after load script.js of fragment
                setTimeout(function () { xmlHttpreq.send(postData); }, <?php echo(WindUiAppPrefs::$appDelayBeforeLoadFragment); ?>);
            }
            dynamicJsScript.onerror = function(){
                //Show warning about error
                WindUiJs.showSimpleNotification('Wind UI: An error occurred while loading the ' + fragmentName + '.js for this fragment. Please try to refresh the page.', 0, true, null);
            }
        }

        static loadRightFragmentIfUrlIsDifferent(){
            //Load the correct fragment, if parameter "fragment" is different from current fragment
            var currentUrl = new URL(window.location.href);
            var fragmentParam = currentUrl.searchParams.get("fragment");

            //Validate all variables, if some of one is invalid, return
            if(WindUiJs.currentRequestedFragment == "" || WindUiJs.currentRequestedFragment == null || 
                fragmentParam == "" || fragmentParam == null || WindUiJs.alreadyLoadingFragment == true)
                return;

            if (fragmentParam != WindUiJs.currentRequestedFragment)
                WindUiJs.loadNewFragment(fragmentParam, null);
        }

        static changeCurrentClientTitle(newTitle){
            //Change the title of client.page on call this
            document.title = newTitle;
        }

        static getCurrentRequestedFragmentName(){
            //Return the current fragment that is showed on client.php. Return "networkError" if have problem to load current fragment
            return WindUiJs.currentRequestedFragment;
        }

        static checkCurrentClientScreenWidthAndRunCustomFunction(){
            //customFunctionToRunAccordingClientScreenWidth function example
            //function(roundedScreenWidth, realtimeScreenWidth){}

            //This method runs with interval of 100ms to guarantee accuracy
            var screenWidth = WindUiJs.getCurrentClientScreenWidth();
            switch(true){
                case (screenWidth >= 3840):
                    //Run functions
                    if(WindUiJs.customFunctionToRunAccordingClientScreenWidth != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAccordingClientScreenWidth) == true)
                        WindUiJs.customFunctionToRunAccordingClientScreenWidth(3840, screenWidth);
                    break;
                case (screenWidth >= 2560):
                    //Run functions
                    if(WindUiJs.customFunctionToRunAccordingClientScreenWidth != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAccordingClientScreenWidth) == true)
                        WindUiJs.customFunctionToRunAccordingClientScreenWidth(2560, screenWidth);
                    break;
                case (screenWidth >= 1920):
                    //Run functions
                    if(WindUiJs.customFunctionToRunAccordingClientScreenWidth != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAccordingClientScreenWidth) == true)
                        WindUiJs.customFunctionToRunAccordingClientScreenWidth(1920, screenWidth);
                    break;
                case (screenWidth >= 1368):
                    //Run functions
                    if(WindUiJs.customFunctionToRunAccordingClientScreenWidth != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAccordingClientScreenWidth) == true)
                        WindUiJs.customFunctionToRunAccordingClientScreenWidth(1368, screenWidth);
                    break;
                case (screenWidth >= 1280):
                    //Run functions
                    if(WindUiJs.customFunctionToRunAccordingClientScreenWidth != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAccordingClientScreenWidth) == true)
                        WindUiJs.customFunctionToRunAccordingClientScreenWidth(1280, screenWidth);
                    break;
                case (screenWidth >= 720):
                    //Run functions
                    if(WindUiJs.customFunctionToRunAccordingClientScreenWidth != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAccordingClientScreenWidth) == true)
                        WindUiJs.customFunctionToRunAccordingClientScreenWidth(720, screenWidth);
                    break;
                case (screenWidth >= 480 || screenWidth < 480):
                    //Run functions
                    if(WindUiJs.customFunctionToRunAccordingClientScreenWidth != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAccordingClientScreenWidth) == true)
                        WindUiJs.customFunctionToRunAccordingClientScreenWidth(480, screenWidth);
                    break;
                default:
                    if(WindUiJs.customFunctionToRunAccordingClientScreenWidth != null && WindUiJs.isFunction(WindUiJs.customFunctionToRunAccordingClientScreenWidth) == true)
                        WindUiJs.customFunctionToRunAccordingClientScreenWidth(0, screenWidth);
            }
        }

        static setFunctionToBeRunnedAccordingClientScreenWidth(customFunction){
            //Set a custom function to be runned according the current client screen width
            WindUiJs.customFunctionToRunAccordingClientScreenWidth = customFunction;
        }

        static getCurrentClientScreenWidth(){
            //Return current screen width
            return document.body.clientWidth;
        }

        static getResourcePath(resourceName){
            //Return the full path to a desired resource of Wind UI app
            var appRootPath = "<?php echo(WindUiAppPrefs::$appRootPath); ?>/";
            return appRootPath + resourceName;
        }

        //Components core methods

        static getComponentById(componentId){
            //Try to find the component
            var component = document.getElementById(componentId);
            if(component == null)
                console.error("WindUI Component: Could not find component with ID " + componentId + ".");
            if(component != null)
                return component;
            return null;
        }

        //Api Ajax methods

        static instantiateNewPostDataForAjaxHttpRequest(){
            //Instantiate formdata object and return
            return new FormData();
        }

        static addNewFieldInPostDataForAjaxHttpRequest(postData, ajaxHttpApiFileReceptorVarName, textValue){
            //Add the var in post data, if object postdata is a formdata
            if(WindUiJs.isFormData(postData) == true)
                postData.append(ajaxHttpApiFileReceptorVarName, textValue);
        }

        static loadNewAjaxHttpRequestOnApi(ajaxHttpApiName, postData, onDone){
            //onDone function example (Response Json is null, if string of responseText is not a Json syntax)
            //function(isSuccess, responseText, responseXml, responseJson){}

            //Check a new http request running
            WindUiJs.currentAjaxHttpRequestsRunning += 1;

            //Prepare to load a new fragment
            var xmlHttpreq = new XMLHttpRequest();
            xmlHttpreq.open("POST", "<?php echo(WindUiAppPrefs::$appRootPath . "/ajax-http-apis/"); ?>" + ajaxHttpApiName + ".php", true);
            xmlHttpreq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlHttpreq.onreadystatechange = function(){
                if (xmlHttpreq.readyState === 4) {
                    if (xmlHttpreq.status === 200) {
                        //IF SUCESS

                        //Call "onDone" if is registered
                        if(onDone != null && WindUiJs.isFunction(onDone) == true){
                            if(WindUiJs.isJsonString(xmlHttpreq.responseText) == true){
                                onDone(true, xmlHttpreq.responseText, xmlHttpreq.responseXML, JSON.parse(xmlHttpreq.responseText));
                            }
                            else{
                                onDone(true, xmlHttpreq.responseText, xmlHttpreq.responseXML, null);
                            }     
                        } 
                    }
                    else {
                        //IF NETWORK ERROR

                        //Call "onDone" if is registered
                        if(onDone != null && WindUiJs.isFunction(onDone) == true)
                            onDone(false, null, null, null);
                    }

                    //End a new http request running
                    WindUiJs.currentAjaxHttpRequestsRunning -= 1;
                }
            }
            setTimeout(function () { xmlHttpreq.send(postData); }, <?php echo(WindUiAppPrefs::$appDelayBeforeLoadAjaxRequest); ?>);
        }

        static uploadNewFileOnAjaxHttpRequestInApi(ajaxHttpApiName, ajaxHttpApiFileReceptorVarName, inputFileElement, inputFileElementFileToUploadIndex, onStartLoad, onProgressUpdate, onDoneLoad, onError, onAbort){
            //Check a new http request running
            WindUiJs.currentAjaxHttpRequestsRunning += 1;

            //Get the file
            var formData = new FormData();
            formData.append(ajaxHttpApiFileReceptorVarName, inputFileElement.files[inputFileElementFileToUploadIndex]);

            //Start upload
            var xmlHttpreq = new XMLHttpRequest();
            xmlHttpreq.upload.addEventListener("loadstart", function(event){
                //onStartLoad function example
                //function(){}
                if(onStartLoad != null && WindUiJs.isFunction(onStartLoad) == true)
                    onStartLoad();
            }, false);
            xmlHttpreq.upload.addEventListener("progress", function(event){
                //onProgressUpdate function example
                //function(value){}
                if(onProgressUpdate != null && WindUiJs.isFunction(onProgressUpdate) == true){
                    if(event.lengthComputable == true)
                        onProgressUpdate(event.loaded / event.total);
                    if(event.lengthComputable == false)
                        onProgressUpdate(1.0);
                }
            }, false);
            xmlHttpreq.addEventListener("load", function(event){
                //onDoneLoad function example
                //function(){}
                if(onDoneLoad != null && WindUiJs.isFunction(onDoneLoad) == true)
                    onDoneLoad();

                //End a new http request running
                WindUiJs.currentAjaxHttpRequestsRunning -= 1;
            }, false);
            xmlHttpreq.addEventListener("error", function(event){
                //onError function example
                //function(){}
                if(onError != null && WindUiJs.isFunction(onError) == true)
                    onError();

                //End a new http request running
                WindUiJs.currentAjaxHttpRequestsRunning -= 1;
            }, false);
            xmlHttpreq.addEventListener("abort", function(event){
                //onAbort function example
                //function(){}
                if(onAbort != null && WindUiJs.isFunction(onAbort) == true)
                    onAbort();

                //End a new http request running
                WindUiJs.currentAjaxHttpRequestsRunning -= 1;
            }, false);
            xmlHttpreq.open("POST", "<?php echo(WindUiAppPrefs::$appRootPath . "/ajax-http-apis/"); ?>" + ajaxHttpApiName + ".php", true);
            xmlHttpreq.send(formData);

            //Return the windUiJsAjaxUploadOperation
            return xmlHttpreq;
        }

        static abortUploadOfNewFileOnAjaxHttpRequestInApi(windUiJsAjaxUploadOperation){
            //Abort operation of ajaxUpload if exists and if is a xmlhttprequest object
            if(WindUiJs.isXmlHttpRequest(windUiJsAjaxUploadOperation) == true)
                windUiJsAjaxUploadOperation.abort();
        }

        static changeStateOfButtonToLoadingAjaxHttpRequest(buttonElement){
            //Change the state of a button, to loading and return the original state of button, converted to string json

            //Verify if buttonElement is really a button
            if(buttonElement.tagName == "INPUT" && buttonElement.type == "button"){
                //Get the original state of button
                var originalStateJson = "{";
                originalStateJson += '"backgroundImage":"' + buttonElement.style.backgroundImage + '",';
                originalStateJson += '"backgroundSize":"' + buttonElement.style.backgroundSize + '",';
                originalStateJson += '"backgroundPosition":"' + buttonElement.style.backgroundPosition + '",';
                originalStateJson += '"backgroundRepeat":"' + buttonElement.style.backgroundRepeat + '",';
                originalStateJson += '"value":"' + buttonElement.value + '",';
                originalStateJson += '"width":"' + buttonElement.width + '",';
                originalStateJson += '"height":"' + buttonElement.height + '"';
                originalStateJson += "}";

                //Get height and width of element
                var originalWidth = buttonElement.offsetWidth;
                var originalHeight = buttonElement.offsetHeight;

                //Set the new state
                buttonElement.style.backgroundImage = "url(<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$ajaxHttpRequestLoadingOnButtonSpinnerResource); ?>)";
                buttonElement.style.backgroundSize = "<?php echo(WindUiAppPrefs::$ajaxHttpRequestLoadingOnButtonSpinnerSizePx); ?>px";
                buttonElement.style.backgroundPosition = "center";
                buttonElement.style.backgroundRepeat = "no-repeat";
                buttonElement.style.width = originalWidth.toString() + "px";
                buttonElement.style.height = originalHeight.toString() + "px";
                buttonElement.value = "";
                buttonElement.disabled = "disabled";

                //Return the original state
                return originalStateJson;
            }
        }

        static restoreOriginalStateOfButtonNow(buttonElement, originalState){
            //Restores a state of a button
            if(WindUiJs.isJsonString(originalState) == true){
                var json = JSON.parse(originalState);

                //set the original state
                //Set the new state
                buttonElement.style.backgroundImage = json.backgroundImage;
                buttonElement.style.backgroundSize = json.backgroundSize;
                buttonElement.style.backgroundPosition = json.backgroundPosition;
                buttonElement.style.backgroundRepeat = json.backgroundRepeat;
                buttonElement.value = json.value;
                buttonElement.width = json.width;
                buttonElement.height = json.height;
                buttonElement.disabled = "";
            }
        }

        static enableBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunning(onTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning){
            //Enable the block, to prevent load of a new fragment, while ajax http request is running. Save the function to run onTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning
            WindUiJs.blockOnLoadNewFragmentWhileAjaxHttpRequestRunning = true;
            WindUiJs.customFunctionToOnTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning = onTryToLoadNewFragmentWhileExistsAjaxHttpRequestsRunning;
        }

        static disableBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunning(){
            //Disable the block, to prevent load of a new fragment, while ajax http request is running
            WindUiJs.blockOnLoadNewFragmentWhileAjaxHttpRequestRunning = true;
        }

        static isBlockOnLoadNewFragmentWhileAjaxHttpRequestIsRunningEnabled(){
            //Return if the block is enabled or disabled
            return WindUiJs.blockOnLoadNewFragmentWhileAjaxHttpRequestRunning;
        }

        static getCountOfAjaxHttpRequestsRunningNow(){
            //Return the count of ajax http requests running now
            return WindUiJs.currentAjaxHttpRequestsRunning;
        }

        static isNetworkAvailableOnBrowserNow(){
            //Return if network is available now
            return navigator.onLine;
        }

        //Notifications methods

        static countNodesOnNotificationAreaAndShowCorrectFavicon(){
            //Get default icon
            if(WindUiJs.defaultAppIcon == ""){
                WindUiJs.defaultAppIcon = document.getElementById('windUiDynamicIcon').href;
            }

            //Get icon with notifications
            if(WindUiJs.withNotificationsAppIcon == ""){
                WindUiJs.withNotificationsAppIcon = "<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$appWithNotificationsFavicon); ?>";
            }

            //Get notification area element if is null
            if(WindUiJs.notificationAreaElement == null){
                WindUiJs.notificationAreaElement = document.getElementById("windUiNotificationArea");
            }

            //Count quantity of nodes of notifications inside Notifications Area
            var nodesInNotificationArea = WindUiJs.notificationAreaElement.childElementCount;
            if(nodesInNotificationArea != WindUiJs.lastQuantityOfNodesInNotificationArea){
                //Only update the DOM if have new notifications
                if(nodesInNotificationArea == 0 && WindUiJs.alwaysShowNotificationFavicon == false){
                    //Change favicon to default
                    var link = document.createElement('link'),
                    oldLink = document.getElementById('windUiDynamicIcon');
                    link.id = 'windUiDynamicIcon';
                    link.rel = 'shortcut icon';
                    link.href = WindUiJs.defaultAppIcon;
                    if(oldLink)
                        document.head.removeChild(oldLink);
                    document.head.appendChild(link);
                }
                if(nodesInNotificationArea > 0 && WindUiJs.alwaysShowNotificationFavicon == false){
                    //Change favicon to favicon with indicator
                    var link = document.createElement('link'),
                    oldLink = document.getElementById('windUiDynamicIcon');
                    link.id = 'windUiDynamicIcon';
                    link.rel = 'shortcut icon';
                    link.href = WindUiJs.withNotificationsAppIcon;
                    if(oldLink)
                        document.head.removeChild(oldLink);
                    document.head.appendChild(link);
                }
                if(WindUiJs.alwaysShowNotificationFavicon == true){
                    //If force to always show notification favicon
                    //Change favicon to favicon with indicator
                    var link = document.createElement('link'),
                    oldLink = document.getElementById('windUiDynamicIcon');
                    link.id = 'windUiDynamicIcon';
                    link.rel = 'shortcut icon';
                    link.href = WindUiJs.withNotificationsAppIcon;
                    if(oldLink)
                        document.head.removeChild(oldLink);
                    document.head.appendChild(link);
                }
            }
            WindUiJs.lastQuantityOfNodesInNotificationArea = nodesInNotificationArea;
        }

        static forceAlwaysExibitionOfNotificationFavicon(enabled){
            //Set the force of always show notification favicon
            if(WindUiJs.lastQuantityOfNodesInNotificationArea <= 0)
                WindUiJs.lastQuantityOfNodesInNotificationArea = 1;
            if(WindUiJs.lastQuantityOfNodesInNotificationArea >= 1)
                WindUiJs.lastQuantityOfNodesInNotificationArea += 1;
            WindUiJs.alwaysShowNotificationFavicon = enabled;
        }

        static isNotificationFaviconForcedToAlwaysShow(){
            //Return if the notification favicon is forced to show
            return WindUiJs.alwaysShowNotificationFavicon;
        }

        static showSimpleNotification(message, duration, playSound, onCloseEvent){
            //Show a simple notification
            return WindUiJs.createRequestedNotification(message, duration, playSound, null, null, null, null, false, onCloseEvent);
        }

        static showActionNotification(message, duration, playSound, actionText, onClickActionEvent, closeNotificationOnClickOnActionButton, onCloseEvent){
            if(actionText == "" || actionText == null)
                actionText = "Action";

            //Show a notification with a action
            return WindUiJs.createRequestedNotification(message, duration, playSound, null, null, actionText, onClickActionEvent, closeNotificationOnClickOnActionButton, onCloseEvent);
        }

        static showComplexNotification(message, duration, playSound, yesButtonText, onClickYesEvent, noButtonText, onClickNoEvent, closeNotificationOnClickOnActionButton, onCloseEvent){
            //Show a notification with two action buttons
            return WindUiJs.createRequestedNotification(message, duration, playSound, yesButtonText, onClickYesEvent, noButtonText, onClickNoEvent, closeNotificationOnClickOnActionButton, onCloseEvent);
        }

        static createRequestedNotification(message, duration, playSound, yesButtonText, onClickYesEvent, noButtonText, onClickNoEvent, closeNotificationOnClickOnActionButton, onCloseEvent){
            //Get notification area
            var notifyArea = document.getElementById("windUiNotificationArea");

            //Create the popup element
            var popUp = document.createElement("div");
            popUp.classList.add("windUiNotificationPopUp");

            var popUpText = document.createElement("div");
            popUpText.classList.add("windUiNotificationPopUpText");
            popUpText.innerHTML = message;
            popUp.appendChild(popUpText);

            if(yesButtonText != null && yesButtonText != ""){
                var popUpYesButton = document.createElement("div");
                popUpYesButton.classList.add("windUiNotificationPopUpButton");
                popUpYesButton.innerHTML = yesButtonText;
                popUpYesButton.onclick = function(){
                    if(closeNotificationOnClickOnActionButton == true)
                        WindUiJs.hideNotificationAndDestroyNode(notifyArea, popUp); 
                    if(onClickYesEvent != null && WindUiJs.isFunction(onClickYesEvent) == true)
                        onClickYesEvent();
                };
                popUp.appendChild(popUpYesButton);
            }

            if(noButtonText != null && noButtonText != ""){
                var popUpNoButton = document.createElement("div");
                popUpNoButton.classList.add("windUiNotificationPopUpButton");
                popUpNoButton.innerHTML = noButtonText;
                popUpNoButton.onclick = function(){ 
                    if(closeNotificationOnClickOnActionButton == true)
                        WindUiJs.hideNotificationAndDestroyNode(notifyArea, popUp); 
                    if(onClickNoEvent != null && WindUiJs.isFunction(onClickNoEvent) == true)
                        onClickNoEvent();
                };
                popUp.appendChild(popUpNoButton);
            }

            var popUpCloseButton = document.createElement("div");
            popUpCloseButton.classList.add("windUiNotificationPopUpButton");
            popUpCloseButton.innerHTML = '<img src="<?php echo(WindUiAppPrefs::$appRootPath . WindUiAppPrefs::$notificationCloseIcon); ?>" style="width: 24px;" draggable="false" />';
            popUpCloseButton.onclick = function(){ 
                WindUiJs.hideNotificationAndDestroyNode(notifyArea, popUp); 
                if(onCloseEvent != null && WindUiJs.isFunction(onCloseEvent) == true)
                    onCloseEvent();
            };
            popUp.appendChild(popUpCloseButton);

            //If notify area don't have child elements
            if(notifyArea.childElementCount == 0)
                notifyArea.appendChild(popUp);
            //If notify area have child elements
            if(notifyArea.childElementCount > 0){
                var lastNode = notifyArea.firstChild;
                notifyArea.insertBefore(popUp, lastNode);
            }

            //Run animation of entry
            setTimeout(function () { 
                popUp.style.marginRight = "0%";

                //Play sound, if is desired
                if(playSound == true){
                    var sound = document.getElementById("windUiNotificationAreaSound");
                    if(sound.duration > 0 && sound.paused == false){
                        sound.pause();
                        sound.currentTime = 0;
                        sound.play();
                    }
                    if(sound.duration > 0 && sound.paused == true){
                        sound.play();
                    }
                }
            }, 25);

            //Create method to delete notification after X time
            if(duration > 0){
                setTimeout(function () { 
                    WindUiJs.hideNotificationAndDestroyNode(notifyArea, popUp);
                }, duration);
            }

            //Return the notification popup node
            return popUp;
        }

        static isNotificationCurrentlyInScreen(notificationNodeObj){
            //Get notification area
            var notifyArea = document.getElementById("windUiNotificationArea");

            //Check if notification provided is a node
            if(notificationNodeObj == null || notificationNodeObj.nodeType != Node.ELEMENT_NODE)
                return false;

            //If obj informed not have parent of notification area, return
            if(notificationNodeObj.parentNode != notifyArea)
                return false;

            //Return if the notification is active or not
            if(notificationNodeObj == null)
                return false;
            if(notificationNodeObj != null)
                return true;
        }

        static changeTextContentOfNotification(notificationNodeObj, newTextContent){
            //Get notification area
            var notifyArea = document.getElementById("windUiNotificationArea");

            //Check if notification provided is a node
            if(notificationNodeObj == null || notificationNodeObj.nodeType != Node.ELEMENT_NODE)
                return false;

            //If obj informed not have parent of notification area, return
            if(notificationNodeObj.parentNode != notifyArea)
                return false;

            //Change text content of node passed
            notificationNodeObj.firstChild.innerHTML = newTextContent;
        }

        static hideNotificationAndDestroyNode(parentnode, nodeToDelete){
            //If node to delete is null, return
            if(nodeToDelete == null){
                return;
            }

            //Run animation of delete
            nodeToDelete.style.marginRight = "110%";

            //If parent node informed is null, get parent node of nodeToDelete
            if(parentnode == null){
                parentnode = nodeToDelete.parentNode;
            }

            //Delete the node after animation
            setTimeout(function () { 
                if(parentnode != null && nodeToDelete != null)
                    if(nodeToDelete.parentNode == parentnode)
                        parentnode.removeChild(nodeToDelete);
            }, 250);
        }

        static getCountOfNotificationsInScreen(){
            //Return quantity of notifications current in screen of client.php
            return document.getElementById("windUiNotificationArea").childElementCount;
        }

        //Dialog box methods

        static countNodesOnDialogAreaAndShowBackgroundBlock(){
            //Get dialog area element if is null
            if(WindUiJs.dialogAreaElement == null){
                WindUiJs.dialogAreaElement = document.getElementById("windUiDialogBoxArea");
            }

            //Count quantity of nodes of dialogs inside Dialog Area
            var nodesInDialogArea = WindUiJs.dialogAreaElement.childElementCount;
            if(nodesInDialogArea != WindUiJs.lastQuantityOfNodesInDialogArea){
                //Only update the DOM if have new dialogs updates
                if(nodesInDialogArea == 0)
                    document.getElementById("windUiDialogBoxAreaBackgroundClickBlock").style.opacity = "0";
                if(nodesInDialogArea > 0)
                    document.getElementById("windUiDialogBoxAreaBackgroundClickBlock").style.opacity = "1";
            }
            WindUiJs.lastQuantityOfNodesInDialogArea = nodesInDialogArea;
        }

        static showSimpleDialog(optionalUrlOfIcon, title, content, okButtonText, onClickOkButtonEvent){
            //Create a simple dialog
            return WindUiJs.createRequestedComplexDialog(optionalUrlOfIcon, title, content, okButtonText, onClickOkButtonEvent, '', null, '', null);
        }

        static showConfirmationDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent){
            //Create a confirmation dialog
            return WindUiJs.createRequestedComplexDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent, '', null);
        }

        static showComplexDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent, neutralButtonText, onClickNeutralButtonEvent){
            //Create a complex dialog
            return WindUiJs.createRequestedComplexDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent, neutralButtonText, onClickNeutralButtonEvent);
        }

        static createRequestedComplexDialog(optionalUrlOfIcon, title, content, yesButtonText, onClickYesButtonEvent, noButtonText, onClickNoButtonEvent, neutralButtonText, onClickNeutralButtonEvent){
            //Get dialog box area
            var dialogArea = document.getElementById("windUiDialogBoxArea");

            //Create the complex dialog background element
            var complexDialogBackground = document.createElement("div");
            complexDialogBackground.classList.add("windUiComplexDialogBackground");

            //Create the dialog popup element
            var complexDialogPopUp = document.createElement("div");
            complexDialogPopUp.classList.add("windUiComplexDialogPopUp");
            complexDialogBackground.appendChild(complexDialogPopUp);

            var complexDialogTitle = document.createElement("div");
            complexDialogTitle.classList.add("windUiComplexDialogTitle");
            complexDialogPopUp.appendChild(complexDialogTitle);
            if(optionalUrlOfIcon != ""){
                var complexDialogTitleIcon = document.createElement("div");
                complexDialogTitleIcon.classList.add("windUiComplexDialogTitleIcon");
                complexDialogTitleIcon.innerHTML = "<img src=" + optionalUrlOfIcon + " style=\"width: 100%;\" />";
                complexDialogTitle.appendChild(complexDialogTitleIcon);
            }
            var complexDialogTitleText = document.createElement("div");
            complexDialogTitleText.classList.add("windUiComplexDialogTitleText");
            complexDialogTitleText.innerHTML = title;
            complexDialogTitle.appendChild(complexDialogTitleText);

            var complexDialogTextContent = document.createElement("div");
            complexDialogTextContent.classList.add("windUiComplexDialogTextContent");
            complexDialogTextContent.innerHTML = content;
            complexDialogPopUp.appendChild(complexDialogTextContent);

            var complexDialogButtons = document.createElement("div");
            complexDialogButtons.classList.add("windUiComplexDialogButtons");
            complexDialogPopUp.appendChild(complexDialogButtons);
            if(yesButtonText == "" && noButtonText == "" && neutralButtonText == ""){
                var complexDialogNoButtonDefined = document.createElement("div");
                complexDialogNoButtonDefined.classList.add("windUiComplexDialogButton");
                complexDialogNoButtonDefined.innerHTML = "OK";
                complexDialogNoButtonDefined.onclick = function(){
                    WindUiJs.hideDialogBoxAndDestroyNode(dialogArea, complexDialogBackground);

                    if(onClickNeutralButtonEvent != null && WindUiJs.isFunction(onClickNeutralButtonEvent) == true)
                        onClickNeutralButtonEvent();
                }
                complexDialogButtons.appendChild(complexDialogNoButtonDefined);
            }
            if(yesButtonText != "" || noButtonText != "" || neutralButtonText != ""){
                if(neutralButtonText != ""){
                    var complexDialogNeutralButton = document.createElement("div");
                    complexDialogNeutralButton.classList.add("windUiComplexDialogButton");
                    complexDialogNeutralButton.innerHTML = neutralButtonText;
                    complexDialogNeutralButton.onclick = function(){
                        WindUiJs.hideDialogBoxAndDestroyNode(dialogArea, complexDialogBackground);

                        if(onClickNeutralButtonEvent != null && WindUiJs.isFunction(onClickNeutralButtonEvent) == true)
                            onClickNeutralButtonEvent();
                    }
                    complexDialogButtons.appendChild(complexDialogNeutralButton);
                }
                if(yesButtonText != ""){
                    var complexDialogYesButton = document.createElement("div");
                    complexDialogYesButton.classList.add("windUiComplexDialogButton");
                    complexDialogYesButton.innerHTML = yesButtonText;
                    complexDialogYesButton.onclick = function(){
                        WindUiJs.hideDialogBoxAndDestroyNode(dialogArea, complexDialogBackground);

                        if(onClickYesButtonEvent != null && WindUiJs.isFunction(onClickYesButtonEvent) == true)
                            onClickYesButtonEvent();
                    }
                    complexDialogButtons.appendChild(complexDialogYesButton);
                }
                if(noButtonText != ""){
                    var complexDialogNoButton = document.createElement("div");
                    complexDialogNoButton.classList.add("windUiComplexDialogButton");
                    complexDialogNoButton.innerHTML = noButtonText;
                    complexDialogNoButton.onclick = function(){
                        WindUiJs.hideDialogBoxAndDestroyNode(dialogArea, complexDialogBackground);

                        if(onClickNoButtonEvent != null && WindUiJs.isFunction(onClickNoButtonEvent) == true)
                            onClickNoButtonEvent();
                    }
                    complexDialogButtons.appendChild(complexDialogNoButton);
                }
            }

            //If dialog area don't have child elements
            if(dialogArea.childElementCount == 0)
                dialogArea.appendChild(complexDialogBackground);
            //If dialog area have child elements
            if(dialogArea.childElementCount > 0){
                var lastNode = dialogArea.firstChild;
                dialogArea.insertBefore(complexDialogBackground, lastNode);
            }

            //Run animation of entry
            setTimeout(function () { 
                complexDialogBackground.style.opacity = "1";
            }, 25);

            //Return the complex dialog node
            return complexDialogBackground;
        }

        static showLoadingDialogBox(title){
            //Get dialog box area
            var dialogArea = document.getElementById("windUiDialogBoxArea");

            //Create the loading dialog background element
            var loadingDialogBackground = document.createElement("div");
            loadingDialogBackground.classList.add("windUiLoadingDialogBackground");

            //Create the dialog popup element
            var loadingDialogPopUp = document.createElement("div");
            loadingDialogPopUp.classList.add("windUiLoadingDialogPopUp");
            loadingDialogBackground.appendChild(loadingDialogPopUp);

            var spinnerDialogPopUp = document.createElement("div");
            spinnerDialogPopUp.classList.add("windUiLoadingDialogSpinner");
            loadingDialogPopUp.appendChild(spinnerDialogPopUp);
            var titleDialogPopUp = document.createElement("div");
            titleDialogPopUp.classList.add("windUiLoadingDialogTitle");
            titleDialogPopUp.innerHTML = title;
            loadingDialogPopUp.appendChild(titleDialogPopUp);

            //If dialog area don't have child elements
            if(dialogArea.childElementCount == 0)
                dialogArea.appendChild(loadingDialogBackground);
            //If dialog area have child elements
            if(dialogArea.childElementCount > 0){
                var lastNode = dialogArea.firstChild;
                dialogArea.insertBefore(loadingDialogBackground, lastNode);
            }

            //Run animation of entry
            setTimeout(function () { 
                loadingDialogBackground.style.opacity = "1";
            }, 25);

            //Return the complex dialog node
            return loadingDialogBackground;
        }

        static showCustomContentDialogBox(showCloseButton, maxWidth, maxHeight, content){
            //Get dialog box area
            var dialogArea = document.getElementById("windUiDialogBoxArea");

            //Create the custom content dialog background element
            var customContentDialogBackground = document.createElement("div");
            customContentDialogBackground.classList.add("windUiCustomContentDialogBackground");

            //Create the dialog popup element
            var customContentDialogPopUp = document.createElement("div");
            customContentDialogPopUp.classList.add("windUiCustomContentDialogPopUp");
            customContentDialogPopUp.innerHTML = '<div style="width: 100%; height: 100%; overflow: auto;">' + content + '</div>';
            customContentDialogPopUp.style.maxWidth = maxWidth;
            customContentDialogPopUp.style.maxHeight = maxHeight;
            customContentDialogBackground.appendChild(customContentDialogPopUp);
            if(showCloseButton == true){
                 var customContentDialogPopUpClose = document.createElement("div");
                customContentDialogPopUpClose.classList.add("windUiCustomContentDialogPopUpClose");
                customContentDialogPopUpClose.onclick = function(){
                    WindUiJs.hideDialogBoxAndDestroyNode(dialogArea, customContentDialogBackground);
                }
                customContentDialogPopUp.appendChild(customContentDialogPopUpClose);
            }

            //If dialog area don't have child elements
            if(dialogArea.childElementCount == 0)
                dialogArea.appendChild(customContentDialogBackground);
            //If dialog area have child elements
            if(dialogArea.childElementCount > 0){
                var lastNode = dialogArea.firstChild;
                dialogArea.insertBefore(customContentDialogBackground, lastNode);
            }

            //Run animation of entry
            setTimeout(function () { 
                customContentDialogBackground.style.opacity = "1";
            }, 25);

            //Return the complex dialog node
            return customContentDialogBackground;
        }

        static changeContentOfCustomContentDialogBox(customContentDialogNodeObj, showCloseButton, maxWidth, maxHeight, newContent){
            //Get dialog box area
            var dialogArea = document.getElementById("windUiDialogBoxArea");

            //Check if dialog provided is a node
            if(customContentDialogNodeObj == null || customContentDialogNodeObj.nodeType != Node.ELEMENT_NODE)
                return false;

            //If obj informed not have parent of dialog area, return
            if(customContentDialogNodeObj.parentNode != dialogArea)
                return false;

            //Change text content of node passed
            customContentDialogNodeObj.firstChild.style.maxWidth = maxWidth;
            customContentDialogNodeObj.firstChild.style.maxHeight = maxHeight;
            customContentDialogNodeObj.firstChild.innerHTML = '<div style="width: 100%; height: 100%; overflow: auto;">' + newContent + '</div>';
            if(showCloseButton == true){
                 var customContentDialogPopUpClose = document.createElement("div");
                customContentDialogPopUpClose.classList.add("windUiCustomContentDialogPopUpClose");
                customContentDialogPopUpClose.onclick = function(){
                    WindUiJs.hideDialogBoxAndDestroyNode(dialogArea, customContentDialogNodeObj);
                }
                customContentDialogNodeObj.firstChild.appendChild(customContentDialogPopUpClose);
            }
        }

        static isDialogCurrentlyInScreen(dialogNodeObj){
            //Get dialog area
            var dialogArea = document.getElementById("windUiDialogBoxArea");

            //Check if dialog provided is a node
            if(dialogNodeObj == null || dialogNodeObj.nodeType != Node.ELEMENT_NODE)
                return false;

            //If obj informed not have parent of notification area, return
            if(dialogNodeObj.parentNode != dialogArea)
                return false;

            //Return if the notification is active or not
            if(dialogNodeObj == null)
                return false;
            if(dialogNodeObj != null)
                return true;
        }

        static hideDialogBoxAndDestroyNode(parentnode, nodeToDelete){
            //If node to delete is null, return
            if(nodeToDelete == null){
                return;
            }

            //Run animation of delete
            nodeToDelete.style.opacity = "0";

            //If parent node informed is null, get parent node of nodeToDelete
            if(parentnode == null){
                parentnode = nodeToDelete.parentNode;
            }

            //Delete the node after animation
            setTimeout(function () { 
                if(parentnode != null && nodeToDelete != null)
                    if(nodeToDelete.parentNode == parentnode)
                        parentnode.removeChild(nodeToDelete);
            }, 160);
        }
    }
</script>