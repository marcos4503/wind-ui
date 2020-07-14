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

        //Tools methods

        static isFunction(variableToCheck){
            //If our variable is an instance of "Function"
            if (variableToCheck instanceof Function) {
                return true;
            }
            return false;
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

        //Cookies Warning

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
                //function(value, total){}
                if(onProgressUpdate != null && WindUiJs.isFunction(onProgressUpdate) == true){
                    if(event.lengthComputable == true)
                        onProgressUpdate(event.loaded / event.total, 1.0);
                    if(event.lengthComputable == false)
                        onProgressUpdate(1.0, 1.0);
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
    }
</script>