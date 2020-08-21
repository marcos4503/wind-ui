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