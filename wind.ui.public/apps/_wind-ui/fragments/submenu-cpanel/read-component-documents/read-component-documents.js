function updateCreatedComponentsListForThisApp() {
    //Update the app list

    //Get IDs of all fields
    var appName = "appName";

    //Show loading
    var dialog = WindUiJs.showLoadingDialogBox("Obtendo componentes...");

    //Update content
    var form = new FormData();
    form.append("appToReceive", SelectField.getValue(appName));
    WindUiJs.loadNewAjaxHttpRequestOnApi("returns-html/fragments/read-component-document/get-component-list-as-options", form,
        function (isSuccess, responseText, responseJson) {
            //On success
            if (isSuccess == true) {
                document.getElementById("componentNameInput").innerHTML = "<option value=\"\">Selecione um Componente</option>" + responseText;
            }
            //On error
            if (isSuccess == false) {
                WindUiJs.showSimpleNotification("Ocorreu um erro de conexão ao obter a lista de componentes para este app. Por favor, tente novamente.", 5000, false, null);
            }

            //Hide dialog
            WindUiJs.hideDialogBoxAndDestroyNode(null, dialog);
        });

    //Remove focus
    document.getElementById("appNameInput").blur();
}

function loadDocumentation() {
    //Update the app list

    //Get IDs of all fields
    var appName = "appName";
    var componentName = "componentName";

    //Show loading
    var originalState = WindUiJs.changeStateOfButtonToLoadingAjaxHttpRequest(Button.getInput("loadDocumentationRequest"));

    //Update content
    var form = new FormData();
    form.append("appToReceive", SelectField.getValue(appName));
    form.append("componentName", SelectField.getValue(componentName));
    WindUiJs.loadNewAjaxHttpRequestOnApi("returns-html/fragments/read-component-document/get-content-of-all-md-component-files", form,
        function (isSuccess, responseText, responseJson) {
            //On success
            if (isSuccess == true) {
                document.getElementById("visualizer").innerHTML = responseText;
                document.getElementById("visualizer").addEventListener("click", null, false);
            }
            //On error
            if (isSuccess == false) {
                WindUiJs.showSimpleNotification("Ocorreu um erro de conexão ao obter a documentação deste componente. Por favor, tente novamente.", 5000, false, null);
            }

            //Restore original state
            WindUiJs.restoreOriginalStateOfButtonNow(Button.getInput("loadDocumentationRequest"), originalState);
        });
}