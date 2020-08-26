var appSelected = "";
var appNewFragmentDirectory = "";

var createdFragmentName = "";

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
        document.getElementById("currentStepPercent").style.width = "50.0%";
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
    document.getElementById("currentStepPercent").style.width = "75%";
    document.getElementById("step2interface").style.opacity = "0";
    setTimeout(function () {
        document.getElementById("step2interface").style.display = "none";
        document.getElementById("step3interface").style.display = "block";
        document.getElementById("step3interface").style.opacity = "1";
        document.getElementById("appToInstall").innerHTML = appSelected;
        document.getElementById("appToInstallDir").innerHTML = appNewFragmentDirectory;
    }, 300);

    //Hide the folder creation interface
    document.getElementById("folderCreationInterface").style.display = "none";
    document.getElementById("folderCreationInterface").style.opacity = "0";
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
        WindUiJs.loadNewAjaxHttpRequestOnApi("returns-json/fragments/create-fragment/create-folder", form,
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
                        getListOfFragmentsFoldersOfSelectedApp();

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

function finallyCreateTheFragment() {
    //Get IDs of all fields
    var fragmentName = "fragmentName";
    var fragmentTitle = "fragmentTitle";
    var fragmentDescription = "fragmentDescription";
    var fragmentImage = "fragmentImage";
    var fragmentType = "fragmentType";
    var fragmentArticleAuthor = "fragmentArticleAuthor";
    var fragmentArticleSection = "fragmentArticleSection";
    var fragmentArticleTags = "fragmentArticleTags";
    var passwordWindUi = "password";

    //Force validation of all fields
    StringField.forceValidate(fragmentName);
    StringField.forceValidate(fragmentTitle);
    StringField.forceValidate(fragmentDescription);
    StringField.forceValidate(fragmentImage);
    StringField.forceValidate(fragmentType);
    StringField.forceValidate(fragmentArticleAuthor);
    StringField.forceValidate(fragmentArticleSection);
    StringField.forceValidate(fragmentArticleTags);
    StringField.forceValidate(passwordWindUi);

    //Validate all fields
    var fragmentNameValid = StringField.isValid(fragmentName);
    var fragmentTitleValid = StringField.isValid(fragmentTitle);
    var fragmentDescriptionValid = StringField.isValid(fragmentDescription);
    var fragmentImageValid = StringField.isValid(fragmentImage);
    var fragmentTypeValid = StringField.isValid(fragmentType);
    var fragmentArticleAuthorValid = StringField.isValid(fragmentArticleAuthor);
    var fragmentArticleSectionValid = StringField.isValid(fragmentArticleSection);
    var fragmentArticleTagsValid = StringField.isValid(fragmentArticleTags);
    var passwordWindUiValid = StringField.isValid(passwordWindUi);

    if (fragmentNameValid == true && fragmentTitleValid == true && fragmentDescriptionValid == true && fragmentImageValid == true && fragmentTypeValid == true && fragmentArticleAuthorValid == true && fragmentArticleSectionValid == true && fragmentArticleTagsValid == true && passwordWindUiValid == true) {
        //Show the loading button
        var originalState = WindUiJs.changeStateOfButtonToLoadingAjaxHttpRequest(Button.getInput("createFragmentRequest"));

        //Start the request
        var form = new FormData();
        form.append("fragmentDir", appNewFragmentDirectory);
        form.append("fragmentName", StringField.getText(fragmentName));
        form.append("fragmentTitle", StringField.getText(fragmentTitle));
        form.append("fragmentDescription", StringField.getText(fragmentDescription));
        form.append("fragmentImage", StringField.getText(fragmentImage));
        form.append("fragmentType", StringField.getText(fragmentType));
        form.append("fragmentArticleAuthor", StringField.getText(fragmentArticleAuthor));
        form.append("fragmentArticleSection", StringField.getText(fragmentArticleSection));
        form.append("fragmentArticleTags", StringField.getText(fragmentArticleTags));
        form.append("password", StringField.getText(passwordWindUi));
        WindUiJs.loadNewAjaxHttpRequestOnApi("returns-json/fragments/create-fragment/create-fragment", form,
            function (isSuccess, responseText, responseJson) {
                //Caso tenha dado tudo certo
                if (isSuccess == true) {
                    //response
                    if (responseJson.passwordValid == false) {
                        //Show the error
                        StringField.setStatus(passwordWindUi, false, "Senha incorreta.");
                    }
                    if (responseJson.fragmentCreated == true) {
                        //Show the nofication
                        WindUiJs.showSimpleDialog("", "Fragmento criado", "O fragmento foi criado com sucesso.", "Ok", function () {
                            createdFragmentName = StringField.getText(fragmentName);
                            WindUiJs.showActionNotification("O fragmento \"" + createdFragmentName + "\" foi criado com sucesso no diretório \"" + appNewFragmentDirectory + "\" dentro do app \"" + appSelected + "\".", 0, false, "Visualizar", function () {
                                //Open the created app in new tab
                                var currentUrl = window.location.href.split('?')[0];
                                var urlOfNewApp = currentUrl.replace("_wind-ui", appSelected);
                                if (appNewFragmentDirectory.includes("/fragments/") == true) {
                                    window.open(urlOfNewApp + "?fragment=" + (appNewFragmentDirectory.replace((appSelected + "/fragments/"), "")) + "/" + createdFragmentName);
                                }
                                else {
                                    window.open(urlOfNewApp + "?fragment=" + (appNewFragmentDirectory.replace((appSelected + "/fragments"), "")) + createdFragmentName);
                                }
                            }, true, null)
                            if (responseJson.imageOfManifestFounded == false)
                                WindUiJs.showSimpleNotification("A Imagem de Capa do Fragmento que você inseriu  não foi encontrada na pasta \"resources\" do app alvo, por isso o Wind UI não pode buscar suas informações como resolução, automaticamente.", 0, false, null);
                            WindUiJs.loadNewFragment("home", null);
                        });
                    }
                    if (responseJson.passwordValid == true && responseJson.fragmentCreated == false) {
                        //Send notification
                        WindUiJs.showSimpleNotification("Houve um problema ao criar este fragmento. Por favor, tente novamente. Verifique também, se já não existe uma pasta com este nome de fragmento, no diretório selecionado.", 0, false, null);
                    }
                }
                //Caso tenha dado algo errado
                if (isSuccess == false) {
                    WindUiJs.showSimpleNotification("Ocorreu um erro de rede. Por favor, tente novamente.", 0, false, null);
                }

                //Restore original state
                WindUiJs.restoreOriginalStateOfButtonNow(Button.getInput("createFragmentRequest"), originalState);
            });
    }
    else {
        //Send notification
        WindUiJs.showSimpleNotification("Há campos inválidos. Por favor, verifique todos.", 5000, false, null);
    }
}