//Component "FileField" JavaScript Code
/*
/* All the JavaScript code for your component goes here.
/* It is highly recommended that you wrap your component code in a static class or at least
/* include the name of your component in the name of your global functions and variables.
/* There is no need to do this on variables created within functions.
/* Example
/* function componentYourComponentName_yourFunctionName(){}
/* var componentYourComponentName_yourNameVar(){}
*/
/*
/* If you wrap your component JS code within a static class, you must use YourClassName.variable
/* to access your variables and YourClassName.method() to access your methods.
/* Methods within static classes are declared with "static yourMethodName()"
/* Variables within static classes should always be declared with "var yourVariableName"
*/

class FileField {
    //Automatic API

    //Auto hide or show the tooltip, if has one
    static autoShowTooltip(targetInput, show) {
        //Get metadata of field
        var id = targetInput.id;
        var tooltipText = document.getElementById(id + "Tooltip");
        var tooltipNode = tooltipText.parentNode;
        if (tooltipText.innerHTML != "") {
            if (show == true) {
                tooltipNode.style.maxWidth = "240px";
                tooltipNode.style.visibility = "visible";
                tooltipNode.style.opacity = "0.8";
            }
            if (show == false) {
                tooltipNode.style.maxWidth = "80px";
                tooltipNode.style.visibility = "hidden";
                tooltipNode.style.opacity = "0";
            }
        }
    }

    //Simulate click on input, on user click in "Select"
    static autoClick(targetInputId) {
        //Click in the input
        document.getElementById(targetInputId).click();
    }

    //Validate a FileField component and show status
    static autoValidation(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.id;
        var files = targetInput.files;
        var status = document.getElementById(id + "Status");
        var inputFake = document.getElementById(id + "InputFake");
        var inputFakeLabelText = document.getElementById(id + "InputFakeLabelText");
        var filesList = document.getElementById(id + "FilesList");
        var filesListContent = document.getElementById(id + "FilesListContent");
        var maxfiles = targetInput.getAttribute("maxfiles");
        var maxsizemebibytes = targetInput.getAttribute("maxsizemebibytes");
        var allowedextensions = targetInput.getAttribute("allowedextensions");
        var allowempty = targetInput.getAttribute("allowempty");
        var onchangecontent = targetInput.getAttribute("onchangecontent");

        var isValid = "";

        //Start the base validations
        if (allowedextensions != "" && files.length > 0) {
            var extensions = allowedextensions.split(",");
            for (var i = 0; i < files.length; i++)
                if ((extensions.indexOf(files[i].name.split(".").pop()) > -1) == false)
                    isValid = "- As únicas extensões permitidas são somente " + extensions + ".";
        }
        if (maxsizemebibytes != "0" && files.length > 0) {
            for (var i = 0; i < files.length; i++)
                if ((files[i].size / 1048576).toFixed(0) > parseInt(maxsizemebibytes))
                    isValid = "- O tamanho máximo para cada arquivo é de " + maxsizemebibytes + " MiB.";
        }

        //Start the other validations
        if (maxfiles != "0" && files.length > maxfiles)
            isValid = "- Você pode selecionar no máximo " + maxfiles + " arquivo(s).";
        if (allowempty == "false" && files.length == 0)
            isValid = "- Por favor, selecione um ou mais arquivos.";

        //Show selected files counter and update list
        if (files.length == 0) {
            inputFakeLabelText.innerHTML = "Nenhum arquivo selecionado";
            filesList.style.maxHeight = "0px";

        }
        if (files.length > 0) {
            inputFakeLabelText.innerHTML = files.length + " arquivos selecionados";
            filesList.style.maxHeight = (40 + (files.length * 20)).toString() + "px";
            filesListContent.innerHTML = "";

            //Create a node for each file
            for (var i = 0; i < files.length; i++) {
                var parentNode = document.createElement("div");
                parentNode.classList.add("componentFileFieldInputFileUnity");

                var name = document.createElement("div");
                name.classList.add("componentFileFieldInputFileUnityName");
                name.innerHTML = files[i].name + " (" + ((files[i].size / 1048576).toFixed(0)).toString() + " MiB)";
                parentNode.appendChild(name);

                var progress = document.createElement("div");
                progress.classList.add("componentFileFieldInputFileUnityProgress");
                parentNode.appendChild(progress);

                var progressBarBg = document.createElement("div");
                progressBarBg.classList.add("componentFileFieldInputFileUnityProgressBg");
                progress.appendChild(progressBarBg);

                var progressBarFg = document.createElement("div");
                progressBarFg.classList.add("componentFileFieldInputFileUnityProgressFg");
                progressBarFg.id = id + i.toString() + "FileUploadProgress"
                progressBarBg.appendChild(progressBarFg);

                //If area don't have child elements
                if (filesListContent.childElementCount == 0)
                    filesListContent.appendChild(parentNode);
                //If area have child elements
                if (filesListContent.childElementCount > 0) {
                    var lastNode = filesListContent.firstChild;
                    filesListContent.insertBefore(parentNode, lastNode);
                }
            }
        }

        //If is valid have a reason, is not valid
        if (isValid != "") {
            inputFake.style.borderColor = "red";
            status.style.color = "red";
            status.style.visibility = "visible";
            status.innerHTML = isValid;
            targetInput.setAttribute("isvalid", "false");
        }
        if (isValid == "") {
            inputFake.style.borderColor = "#ccc";
            status.style.color = "#ccc";
            status.style.visibility = "hidden";
            status.innerHTML = "Empty";
            targetInput.setAttribute("isvalid", "true");
        }

        //Run on change content event if have a event registered
        if (onchangecontent != null && isValid == "")
            eval(onchangecontent);
    }

    //Manual API

    //Check if a FileField is valid
    static isValid(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Return if is valid
            var isValid = component.getAttribute("isvalid");
            if (isValid == "true")
                return true;
            if (isValid == "false")
                return false;
        }
    }

    //Get the file input
    static getInput(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Return the input
            return component;
        }
    }

    //Get all files from FileField
    static getFiles(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Return the value
            return component.files;
        }
    }

    //Lock the selection of files
    static lockInterface(componentId) {
        //Access the component select file
        var component = WindUiJs.getComponentById(componentId + "InputClick");
        var componentTwo = WindUiJs.getComponentById(componentId + "InputWait");
        if (component != null) {
            //Change to none the button of selection
            component.style.display = "none";
            componentTwo.style.display = "flex";
        }
    }

    //Unlock the selection of files
    static unlockInterface(componentId) {
        //Access the component select file
        var component = WindUiJs.getComponentById(componentId + "InputClick");
        var componentTwo = WindUiJs.getComponentById(componentId + "InputWait");
        if (component != null) {
            //Change to flex the button of selection
            component.style.display = "flex";
            componentTwo.style.display = "none";
        }
    }

    //Update progress of a file
    static updateProgress(componentId, fileIndex, value) {
        //Access the component select file
        var component = WindUiJs.getComponentById(componentId + fileIndex + "FileUploadProgress");
        if (component != null) {
            //Change progress
            component.style.width = (value * 100.0).toString() + "%";
        }
    }

    //Force the field to validate
    static forceValidate(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Validate the field
            FileField.autoValidation(component);
        }
    }

    //Set a new status
    static setStatus(componentId, isGood, message) {
        //Access the component status
        var componentInputFake = WindUiJs.getComponentById(componentId + "InputFake");
        var componentInput = WindUiJs.getComponentById(componentId + "Input");
        var componentStatus = WindUiJs.getComponentById(componentId + "Status");
        if (componentInput != null && componentStatus != null && componentInputFake != null) {
            //Force the field to validate
            FileField.forceValidate(componentId);
            //check if field is valid, before set a new status
            var isValid = componentInput.getAttribute("isvalid");
            //If is valid
            if (isValid == "true") {
                //set status according to the good or not
                if (isGood == true) {
                    componentInputFake.style.borderColor = "#00911d";
                    componentStatus.style.color = "#00911d";
                    componentStatus.style.visibility = "visible";
                    componentStatus.innerHTML = "- " + message;
                }
                if (isGood == false) {
                    componentInputFake.style.borderColor = "red";
                    componentStatus.style.color = "red";
                    componentStatus.style.visibility = "visible";
                    componentStatus.innerHTML = "- " + message;
                }
            }
            if (isValid == "false")
                console.error("Component Error: It was not possible to define a status for field " + componentId + " because it is not yet valid according to the content that is now inside it.");
        }
    }

    //Get the style of component parent div
    static getStyle(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId);
        if (component != null) {
            //Return the style class of component target
            return component.style;
        }
    }
}