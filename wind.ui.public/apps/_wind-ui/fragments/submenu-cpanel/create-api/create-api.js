var appSelected = "";
var appNewApiDirectory = "";

function selectAppAndNextStep() {
    //Get IDs of all fields
    var appToReceive = "appToReceive";

    //Force validation of all fields
    SelectField.forceValidate(appToReceive);

    //Validate all fields
    var appToReceiveValid = StringField.isValid(appToReceive);

    if (appToReceiveValid == true) {
        //Save the selected app and go to next step
        appSelected = SelectField.getValue("appToReceive");

        //Run the animation of change screen
        document.getElementById("currentStepName").innerHTML = "2. Agora, selecione a pasta que conterá a nova API";
        document.getElementById("currentStepPercent").style.width = "50.0%";
        document.getElementById("step1interface").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("step1interface").style.display = "none";
            document.getElementById("step2interface").style.display = "block";
            document.getElementById("step2interface").style.opacity = "1";
            getListOfApisFoldersOfSelectedApp();
        }, 300);
    }
    else {
        //Send notification
        WindUiJs.showSimpleNotification("Por favor, selecione um aplicativo.", 5000, false, null);
    }
}

function getListOfApisFoldersOfSelectedApp() {
    //Set the loading interface
    document.getElementById("step2interface").innerHTML = "<center>Obtendo diretórios do app <b>wind.ui.public/apps/" + appSelected + "</b>...</center>";

    //Get the list of folders of selected app
    var form = new FormData();
    form.append("appToList", appSelected);
    WindUiJs.loadNewAjaxHttpRequestOnApi("returns-html/fragments/create-api/get-api-hierarchy", form,
        function (isSuccess, responseText, responseJson) {
            //Caso tenha dado tudo certo
            if (isSuccess == true) {
                document.getElementById("step2interface").innerHTML = responseText;
            }
            //Caso tenha dado algo errado
            if (isSuccess == false) {
                document.getElementById("step2interface").innerHTML = "<center>Ocorreu um erro ao obter a lista de diretórios.<br><br><a onclick=\"getListOfApisFoldersOfSelectedApp();\">Tentar Novamente</a></center>";
            }
        });
}

function selectFolderAndNextStep(folderSelected) {
    //Save the selected app and go to next step
    appNewApiDirectory = folderSelected;

    //Run the animation of change screen
    document.getElementById("currentStepName").innerHTML = "3. Agora, preencha os dados da nova API";
    document.getElementById("currentStepPercent").style.width = "75%";
    document.getElementById("step2interface").style.opacity = "0";
    setTimeout(function () {
        document.getElementById("step2interface").style.display = "none";
        document.getElementById("step3interface").style.display = "block";
        document.getElementById("step3interface").style.opacity = "1";
        document.getElementById("appToInstall").innerHTML = appSelected;
        document.getElementById("appToInstallDir").innerHTML = appNewApiDirectory;
    }, 300);

    //Hide the folder creation interface
    document.getElementById("folderCreationInterface").style.display = "none";
    document.getElementById("folderCreationInterface").style.opacity = "0";

    //Update the content shower
    updateSelectedFolderContentList();
}

function openFolderCreationInterface(createOnDir) {
    //Show interface of creation of folder
    document.getElementById("folderCreationInterface").style.display = "block";
    document.getElementById("createFolderInto").innerHTML = createOnDir;
    setTimeout(function () {
        document.getElementById("folderCreationInterface").style.opacity = "1";
    }, 25);
}

function createFolder() {
    //Get IDs of all fields
    var folderName = "createFolderName";
    var passwordWindUi = "passwordToCreateFolder";

    //Force validation of all fields
    StringField.forceValidate(folderName);
    StringField.forceValidate(passwordWindUi);

    //Validate all fields
    var folderNameValid = StringField.isValid(folderName);
    var passwordWindUiValid = StringField.isValid(passwordWindUi);

    if (folderNameValid == true && passwordWindUiValid == true) {
        //Show the loading button
        var originalState = WindUiJs.changeStateOfButtonToLoadingAjaxHttpRequest(Button.getInput("createFolderRequest"));

        //Start the request
        var form = new FormData();
        form.append("createFolderInto", document.getElementById("createFolderInto").innerHTML);
        form.append("folderName", StringField.getText(folderName));
        form.append("password", StringField.getText(passwordWindUi));
        WindUiJs.loadNewAjaxHttpRequestOnApi("returns-json/fragments/create-api/create-folder", form,
            function (isSuccess, responseText, responseJson) {
                //Caso tenha dado tudo certo
                if (isSuccess == true) {
                    //response
                    if (responseJson.passwordValid == false) {
                        //Show the error
                        StringField.setStatus(passwordWindUi, false, "Senha incorreta.");
                    }
                    if (responseJson.folderCreated == true) {
                        //Show the nofication
                        WindUiJs.showSimpleDialog("", "Pasta criada", "A pasta \"" + StringField.getText(folderName) + "\" foi criada com sucesso.", "Ok", null);

                        //Change the UI to app created
                        StringField.setText(folderName, "");
                        StringField.setText(passwordWindUi, "");

                        //Refresh folders list
                        getListOfApisFoldersOfSelectedApp();

                        //Hide the UI    
                        document.getElementById("folderCreationInterface").style.opacity = "0";
                        setTimeout(function () {
                            document.getElementById("folderCreationInterface").style.display = "none";
                        }, 500);
                    }
                    if (responseJson.passwordValid == true && responseJson.folderCreated == false) {
                        //Send notification
                        WindUiJs.showSimpleNotification("Houve um problema ao criar a pasta. Por favor, certifique-se de que já não exista uma pasta usando este nome, neste diretório.", 0, false, null);
                    }
                }
                //Caso tenha dado algo errado
                if (isSuccess == false) {
                    WindUiJs.showSimpleNotification("Ocorreu um erro de rede. Por favor, tente novamente.", 0, false, null);
                }

                //Restore original state
                WindUiJs.restoreOriginalStateOfButtonNow(Button.getInput("createFolderRequest"), originalState);
            });
    }
    else {
        //Send notification
        WindUiJs.showSimpleNotification("Há campos inválidos. Por favor, verifique todos.", 5000, false, null);
    }
}

function finallyCreateTheApi() {
    //Get IDs of all fields
    var apiName = "apiName";
    var passwordWindUi = "password";

    //Force validation of all fields
    StringField.forceValidate(apiName);
    StringField.forceValidate(passwordWindUi);

    //Validate all fields
    var apiNameValid = StringField.isValid(apiName);
    var passwordWindUiValid = StringField.isValid(passwordWindUi);

    if (apiNameValid == true && passwordWindUiValid == true) {
        //Show the loading button
        var originalState = WindUiJs.changeStateOfButtonToLoadingAjaxHttpRequest(Button.getInput("createApiRequest"));

        //Start the request
        var form = new FormData();
        form.append("apiDir", appNewApiDirectory);
        form.append("apiName", StringField.getText(apiName));
        form.append("password", StringField.getText(passwordWindUi));
        WindUiJs.loadNewAjaxHttpRequestOnApi("returns-json/fragments/create-api/create-api", form,
            function (isSuccess, responseText, responseJson) {
                //Caso tenha dado tudo certo
                if (isSuccess == true) {
                    //response
                    if (responseJson.passwordValid == false) {
                        //Show the error
                        StringField.setStatus(passwordWindUi, false, "Senha incorreta.");
                    }
                    if (responseJson.apiCreated == true) {
                        //Show the nofication
                        WindUiJs.showSimpleDialog("", "API criada", "O nova API foi criada com sucesso!", "Ok", function () {
                            WindUiJs.loadNewFragment("home", null);
                        });
                    }
                    if (responseJson.passwordValid == true && responseJson.apiCreated == false) {
                        //Send notification
                        WindUiJs.showSimpleNotification("Houve um problema ao criar esta API. Por favor, tente novamente. Verifique também, se já não existe uma API com este nome de API, no diretório selecionado.", 0, false, null);
                    }
                }
                //Caso tenha dado algo errado
                if (isSuccess == false) {
                    WindUiJs.showSimpleNotification("Ocorreu um erro de rede. Por favor, tente novamente.", 0, false, null);
                }

                //Restore original state
                WindUiJs.restoreOriginalStateOfButtonNow(Button.getInput("createApiRequest"), originalState);
            });
    }
    else {
        //Send notification
        WindUiJs.showSimpleNotification("Há campos inválidos. Por favor, verifique todos.", 5000, false, null);
    }
}

function updateSelectedFolderContentList() {
    //Update the app list

    //Get the app list
    var appListDiv = document.getElementById("folderSelectedContent");
    appListDiv.innerHTML = "<ul><li>Um momento...</li></ul>";

    //Update content
    var form = new FormData();
    form.append("folder", appNewApiDirectory);
    WindUiJs.loadNewAjaxHttpRequestOnApi("returns-html/fragments/create-api/get-folder-content", form,
        function (isSuccess, responseText, responseJson) {
            //On success
            if (isSuccess == true) {
                appListDiv.innerHTML = responseText;
            }
            //On error
            if (isSuccess == false) {
                appListDiv.innerHTML = "<ul><li>Erro ao obter conteúdo da pasta. <a onclick=\"updateSelectedFolderContentList();\">Tentar novamente</a></li></ul>";
            }
        });
}