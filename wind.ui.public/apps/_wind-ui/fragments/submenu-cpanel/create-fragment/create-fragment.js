var appSelected = "";
var appNewFragmentDirectory = "";

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
        document.getElementById("currentStepName").innerHTML = "2. Agora, selecione a pasta que conterá o novo Fragmento";
        document.getElementById("currentStepPercent").style.width = "66.6%";
        document.getElementById("step1interface").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("step1interface").style.display = "none";
            document.getElementById("step2interface").style.display = "block";
            document.getElementById("step2interface").style.opacity = "1";
            getListOfFragmentsFoldersOfSelectedApp();
        }, 300);
    }
    else {
        //Send notification
        WindUiJs.showSimpleNotification("Por favor, selecione um aplicativo.", 5000, false, null);
    }
}

function getListOfFragmentsFoldersOfSelectedApp() {
    //Set the loading interface
    document.getElementById("step2interface").innerHTML = "<center>Obtendo diretórios do app <b>wind.ui.public/apps/" + appSelected + "</b>...</center>";

    //Get the list of folders of selected app
    var form = new FormData();
    form.append("appToList", appSelected);
    WindUiJs.loadNewAjaxHttpRequestOnApi("returns-html/fragments/create-fragment/get-fragments-hierarchy", form,
        function (isSuccess, responseText, responseJson) {
            //Caso tenha dado tudo certo
            if (isSuccess == true) {
                document.getElementById("step2interface").innerHTML = responseText;
            }
            //Caso tenha dado algo errado
            if (isSuccess == false) {
                document.getElementById("step2interface").innerHTML = "<center>Ocorreu um erro ao obter a lista de diretórios.<br><br><a onclick=\"getListOfFragmentsFoldersOfSelectedApp();\">Tentar Novamente</a></center>";
            }
        });
}

function selectFolderAndNextStep(folderSelected) {
    //Save the selected app and go to next step
    appNewFragmentDirectory = folderSelected;

    //Run the animation of change screen
    document.getElementById("currentStepName").innerHTML = "3. Agora, preencha os dados do novo Fragmento";
    document.getElementById("currentStepPercent").style.width = "100%";
    document.getElementById("step2interface").style.opacity = "0";
    setTimeout(function () {
        document.getElementById("step2interface").style.display = "none";
        document.getElementById("step3interface").style.display = "block";
        document.getElementById("step3interface").style.opacity = "1";
        document.getElementById("appToInstall").innerHTML = appSelected;
        document.getElementById("appToInstallDir").innerHTML = appNewFragmentDirectory;
    }, 300);
}

function onChangeFragmentType() {
    //Show or hide the fragment data
    var type = SelectField.getValue("fragmentType");
    if (type == "website") {
        document.getElementById("articleData").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("articleData").style.display = "none";
        }, 300);
    }
    if (type == "article") {
        document.getElementById("articleData").style.display = "block";
        setTimeout(function () {
            document.getElementById("articleData").style.opacity = "1";
        }, 300);
    }
}

function finallyCreateTheFragment() {

}

function deleteAppRequested() {
    //Get IDs of all fields
    var appToDelete = "appToDelete";
    var passwordWindUi = "password";

    //Force validation of all fields
    StringField.forceValidate(appToDelete);
    StringField.forceValidate(passwordWindUi);

    //Validate all fields
    var appToDeleteValid = StringField.isValid(appToDelete);
    var passwordWindUiValid = StringField.isValid(passwordWindUi);

    //If all is valid
    if (appToDeleteValid == true && passwordWindUiValid == true) {
        //Show the confirmation
        WindUiJs.showConfirmationDialog("", "Deletar aplicativo?",
            "O aplicativo " + SelectField.getValue(appToDelete) + " será deletado. Essa ação não poderá ser desfeita. Deseja continuar?",
            "Sim",
            function () {
                //Show the loading button
                var originalState = WindUiJs.changeStateOfButtonToLoadingAjaxHttpRequest(Button.getInput("deleteAppRequest"));

                //Start the request
                var form = new FormData();
                form.append("appToDelete", SelectField.getValue(appToDelete));
                form.append("password", StringField.getText(passwordWindUi));
                WindUiJs.loadNewAjaxHttpRequestOnApi("returns-json/fragments/delete-app/delete-app-existing", form,
                    function (isSuccess, responseText, responseJson) {
                        console.log(responseText);
                        //Caso tenha dado tudo certo
                        if (isSuccess == true) {
                            //response
                            if (responseJson.passwordValid == false) {
                                //Show the error
                                StringField.setStatus(passwordWindUi, false, "Senha incorreta.");
                            }
                            if (responseJson.appDeleted == true) {
                                //Show the nofication
                                WindUiJs.showSimpleDialog("", "O app \"" + SelectField.getValue(appToDelete) + "\" foi deletado", "O app agora não existe mais, dentro do seu Wind UI.", "Ok", function () {
                                    WindUiJs.loadNewFragment("home", null);
                                });

                                //Change the UI to app created
                                StringField.setText(passwordWindUi, "");
                            }
                        }
                        //Caso tenha dado algo errado
                        if (isSuccess == false) {
                            WindUiJs.showSimpleNotification("Ocorreu um erro de rede. Por favor, tente novamente.", 0, false, null);
                        }

                        //Restore original state
                        WindUiJs.restoreOriginalStateOfButtonNow(Button.getInput("deleteAppRequest"), originalState);
                    });
            },
            "Não", null);
    }
    else {
        //Send notification
        WindUiJs.showSimpleNotification("Há campos inválidos. Por favor, verifique todos.", 5000, false, null);
    }
}