function updateCreatedComponentsList() {
    //Update the app list

    //Get IDs of all fields
    var appToReceive = "appToReceive";

    if (SelectField.getValue(appToReceive) != "") {
        //Get the app list
        var appListDiv = document.getElementById("componentsList");
        appListDiv.innerHTML = "<ul><li>Um momento...</li></ul>";

        //Update content
        var form = new FormData();
        form.append("appToReceive", SelectField.getValue(appToReceive));
        WindUiJs.loadNewAjaxHttpRequestOnApi("returns-html/fragments/create-component/get-component-list", form,
            function (isSuccess, responseText, responseJson) {
                //On success
                if (isSuccess == true) {
                    appListDiv.innerHTML = responseText;
                }
                //On error
                if (isSuccess == false) {
                    appListDiv.innerHTML = "<ul><li>Erro ao obter lista de Componentes. <a onclick=\"updateCreatedComponentsList();\">Tentar novamente</a></li></ul>";
                }
            });
    }
}

function createRequestedApp() {
    //Get IDs of all fields
    var appToReceive = "appToReceive";
    var componentName = "componenteName";
    var passwordWindUi = "password";

    //Force validation of all fields
    SelectField.forceValidate(appToReceive);
    StringField.forceValidate(componentName);
    StringField.forceValidate(passwordWindUi);

    //Validate all fields
    var appToReceiveValid = SelectField.isValid(appToReceive);
    var componentNameValid = StringField.isValid(componentName);
    var passwordWindUiValid = StringField.isValid(passwordWindUi);

    //If all is valid
    if (appToReceiveValid == true && componentNameValid == true && passwordWindUiValid == true) {
        //Show the loading button
        var originalState = WindUiJs.changeStateOfButtonToLoadingAjaxHttpRequest(Button.getInput("submitRequestButton"));

        //Start the request
        var form = new FormData();
        form.append("appToReceive", SelectField.getValue(appToReceive));
        form.append("componentName", StringField.getText(componentName));
        form.append("password", StringField.getText(passwordWindUi));
        WindUiJs.loadNewAjaxHttpRequestOnApi("returns-json/fragments/create-component/create-component", form,
            function (isSuccess, responseText, responseJson) {
                //Caso tenha dado tudo certo
                if (isSuccess == true) {
                    //response
                    if (responseJson.passwordValid == false) {
                        //Show the error
                        StringField.setStatus(passwordWindUi, false, "Senha incorreta.");
                    }
                    if (responseJson.componentCreated == true) {
                        //Show the nofication
                        WindUiJs.showSimpleDialog("", "Componente criado", "O componente \"" + StringField.getText(componentName) + "\" foi criado com sucesso!", "Ok");

                        //Change the UI to app created
                        StringField.setText(componentName, "");
                        StringField.setText(passwordWindUi, "");
                    }
                    if (responseJson.passwordValid == true && responseJson.componentCreated == false) {
                        //Show the nofication
                        WindUiJs.showSimpleNotification("Houve um problema ao criar o Componente. Aparentemente já existe um componente com este nome, no aplicativo selecionado.", 0, false, null);
                    }
                }
                //Caso tenha dado algo errado
                if (isSuccess == false) {
                    WindUiJs.showSimpleNotification("Ocorreu um erro de rede. Por favor, tente novamente.", 0, false, null);
                }

                //Restore original state
                WindUiJs.restoreOriginalStateOfButtonNow(Button.getInput("submitRequestButton"), originalState);
                //Update app list
                updateCreatedComponentsList();
            });
    }
    else {
        //Send notification
        WindUiJs.showSimpleNotification("Há campos inválidos. Por favor, verifique todos.", 5000, false, null);
    }
}