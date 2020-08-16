//On Start
WindUiJs.setAnOtherFunctionToBeRunnedAfterLoadANewFragment(function () {
    //Start updating app list
    updateCreatedAppsList();
});

function updateCreatedAppsList() {
    //Update the app list

    //Get the app list
    var appListDiv = document.getElementById("appList");
    appListDiv.innerHTML = "<ul><li>Um momento...</li></ul>";

    //Update content
    WindUiJs.loadNewAjaxHttpRequestOnApi("returns-html/fragments/create-app/get-app-list", null,
        function (isSuccess, responseText, responseJson) {
            //On success
            if (isSuccess == true) {
                appListDiv.innerHTML = responseText;
            }
            //On error
            if (isSuccess == false) {
                appListDiv.innerHTML = "<ul><li>Erro ao obter lista de apps. <a onclick=\"updateCreatedAppsList();\">Tentar novamente</a></li></ul>";
            }
        });
}

function createRequestedApp() {
    //Get IDs of all fields
    var appName = "appTitle";
    var folderName = "appBaseUrl";
    var appCode = "appCode";
    var appLang = "appLang";
    var passwordWindUi = "password";

    //Force validation of all fields
    StringField.forceValidate(appName);
    StringField.forceValidate(folderName);
    StringField.forceValidate(appCode);
    StringField.forceValidate(appLang);
    StringField.forceValidate(passwordWindUi);

    //Validate all fields
    var appNameValid = StringField.isValid(appName);
    var folderNameValid = StringField.isValid(folderName);
    var appCodeValid = StringField.isValid(appCode);
    var appLangValid = StringField.isValid(appLang);
    var passwordWindUiValid = StringField.isValid(passwordWindUi);

    //If all is valid
    if (appNameValid == true && folderNameValid == true && appCodeValid == true && appLangValid == true && passwordWindUiValid == true) {
        //Show the confirmation
        WindUiJs.showConfirmationDialog("", "Criar aplicativo?",
            "Um novo aplicativo será criado dentro do Framework Wind UI do seu app. Deseja continuar?",
            "Sim",
            function () {
                //Show the loading button
                var originalState = WindUiJs.changeStateOfButtonToLoadingAjaxHttpRequest(Button.getInput("submitRequestButton"));

                //Start the request
                var form = new FormData();
                form.append("appName", StringField.getText(appName));
                form.append("folderName", StringField.getText(folderName));
                form.append("appCode", StringField.getText(appCode));
                form.append("appLang", StringField.getText(appLang));
                form.append("password", StringField.getText(passwordWindUi));
                WindUiJs.loadNewAjaxHttpRequestOnApi("returns-json/fragments/create-app/create-app-template", form,
                    function (isSuccess, responseText, responseJson) {
                        //Caso tenha dado tudo certo
                        if (isSuccess == true) {
                            //response
                            if (responseJson.folderNameAvailable == false) {
                                //Show the error
                                StringField.setStatus(folderName, false, "Essa pasta já está sendo usada por um outro app.");
                            }
                            if (responseJson.passwordValid == false) {
                                //Show the error
                                StringField.setStatus(passwordWindUi, false, "Senha incorreta.");
                            }
                            if (responseJson.appCreated == true) {
                                //Show the nofication
                                WindUiJs.showSimpleDialog("", "Novo Wind UI App Criado", "O app \"" + StringField.getText(appName) + "\" foi criado dentro do seu Framework Wind UI. Sinta-se livre para criar um novo app, se quiser. Aproveite e leia a documentação do Wind UI e comece a editar seu novo app agora mesmo!", "Tudo bem!");

                                //Change the UI to app created
                                StringField.setText(appName, "");
                                StringField.setText(folderName, "");
                                StringField.setText(appCode, "");
                                StringField.setText(appLang, "");
                                StringField.setText(passwordWindUi, "");
                            }
                        }
                        //Caso tenha dado algo errado
                        if (isSuccess == false) {
                            WindUiJs.showSimpleNotification("Ocorreu um erro de rede. Por favor, tente novamente.", 0, false, null);
                        }

                        //Restore original state
                        WindUiJs.restoreOriginalStateOfButtonNow(Button.getInput("submitRequestButton"), originalState);
                        //Update app list
                        updateCreatedAppsList();
                    });
            },
            "Não", null);
    }
    else {
        //Send notification
        WindUiJs.showSimpleNotification("Há campos inválidos. Por favor, verifique todos.", 5000, false, null);
    }
}