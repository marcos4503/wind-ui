//Component "StringField" JavaScript Code
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

class StringField {
    //Automatic API

    //Auto hide characters count of StringField
    static autoHideCharCount(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.id;
        var charCount = document.getElementById(id + "CharCount");
        charCount.style.opacity = "0";
    }

    //Auto show characters count of StringField
    static autoShowCharCount(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.id;
        var value = targetInput.value;
        var charCount = document.getElementById(id + "CharCount");
        var maxchars = targetInput.getAttribute("maxchars");
        charCount.style.opacity = "1";

        //Update char count and color
        StringField.autoUpdateCharCount(charCount, value, maxchars, "red", "");
    }

    //Update char count
    static autoUpdateCharCount(element, currentValue, max, colorIvalid, defaultColor) {
        //Update char count and color
        element.innerHTML = currentValue.length + ((max != "0") ? ("/" + max) : "");
        if (currentValue.length > max && max != "0")
            element.style.color = colorIvalid;
        if (currentValue.length <= max && max != "0")
            element.style.color = defaultColor;
    }

    //Validate a StringField component and show status
    static autoValidation(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.id;
        var value = targetInput.value;
        var status = document.getElementById(id + "Status");
        var charCount = document.getElementById(id + "CharCount");
        var minchars = targetInput.getAttribute("minchars");
        var maxchars = targetInput.getAttribute("maxchars");
        var validationtype = targetInput.getAttribute("validationtype");
        var allowespecialchars = targetInput.getAttribute("allowespecialchars");
        var specialcharsallowed = targetInput.getAttribute("specialcharsallowed");
        var allownumbers = targetInput.getAttribute("allownumbers");
        var allowuppercase = targetInput.getAttribute("allowuppercase");
        var allowlowercase = targetInput.getAttribute("allowlowercase");
        var allowempty = targetInput.getAttribute("allowempty");
        var onchangecontent = targetInput.getAttribute("onchangecontent");

        var isValid = "";

        //Update char count and color
        StringField.autoUpdateCharCount(charCount, value, maxchars, "red", "");

        //Start the base validation
        if (validationtype == "url") {
            var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
            if (regex.test(value) === false) {
                isValid = "- O conteúdo digitado não se parece com uma URL.";
            }
        }
        if (validationtype == "email") {
            var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (regex.test(value) === false) {
                isValid = "- O conteúdo digitado não se parece com um E-mail.";
            }
        }
        if (validationtype == "ip") {
            var regex = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
            if (regex.test(value) === false) {
                isValid = "- O conteúdo digitado não se parece com um endereço IP.";
            }
        }
        if (validationtype == "uri") {
            var regex = /\w+:(\/?\/?)[^\s]+/gm;
            if (regex.test(value) === false) {
                isValid = "- O conteúdo digitado não se parece com uma URI.";
            }
        }

        //Start the other validations
        if (minchars >= 1 && value.length < minchars)
            isValid = "- O conteúdo precisa ter no mínimo " + minchars + " caracteres.";
        if (maxchars > 0 && value.length > maxchars)
            isValid = "- O conteúdo pode ter no máximo " + maxchars + " caracteres.";
        if (allowespecialchars == "false" && /[ ¹!@²#³$£%¢¨¬^&*()_§´`ª~º°•√π÷×¶∆€¥©®™✓+\-=\[\]{};':"\\|,.<>\/?]/g.test(value) == true) {
            isValid = "- O conteúdo não pode conter caracteres especiais.";
            //Check if have a special char that can be acepted
            if (specialcharsallowed != "") {
                var regex = " ¹!@²#³$£%¢¨¬^&*()_§´`ª~º°•√π÷×¶∆€¥©®™✓+\-=\[\]{};':\"\\|,.<>\/?";
                var charArray = specialcharsallowed.split(",");
                for (var i = 0; i < charArray.length; i++) {
                    if (charArray[i] == "'" || charArray[i] == "\"")
                        continue;
                    var newRegex1 = regex.replace("\\" + charArray[i], "");
                    var newRegex2 = newRegex1.replace(charArray[i], "");
                    var newRegex3 = newRegex2;
                    if (charArray[i] == "comma")
                        newRegex3 = newRegex2.replace(",", "");
                    regex = newRegex3;
                }
                var regexEscaped0 = regex.replace("\\", "\\\\");
                var regexEscaped1 = regexEscaped0.replace("/", "\\/");
                var regexEscaped2 = regexEscaped1.replace("]", "\\]");
                var regexEscaped3 = regexEscaped2.replace("[", "\\[");
                var regexEscaped4 = regexEscaped3.replace("-", "\\-");
                var regexFinal = new RegExp("[" + regexEscaped4 + "]", "g");
                var resultOfTest = regexFinal.test(value);
                if (resultOfTest == true)
                    isValid = "- Somente os seguintes caracteres especiais são aceitos: " + charArray;
                if (resultOfTest == false)
                    isValid = "";
            }
        }
        if (allownumbers == "false" && /\d/.test(value) == true)
            isValid = "- O conteúdo não pode conter números.";
        if (allowuppercase == "false" && /[A-Z]/.test(value) == true)
            isValid = "- O conteúdo não pode conter letras maiúsculas.";
        if (allowlowercase == "false" && /[a-z]/.test(value) == true)
            isValid = "- O conteúdo não pode conter letras minúsculas.";
        if (allowempty == "false" && value == "")
            isValid = "- O conteúdo não pode estar vazio.";

        //If is valid have a reason, is not valid
        if (isValid != "") {
            targetInput.style.borderColor = "red";
            status.style.color = "red";
            status.style.visibility = "visible";
            status.innerHTML = isValid;
            targetInput.setAttribute("isvalid", "false");
        }
        if (isValid == "") {
            targetInput.style.borderColor = "#ccc";
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

    //Check if a StringField is valid
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

    //Set a text in StringField
    static setText(componentId, newText) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Change the text
            if (WindUiJs.isString(newText) == true)
                component.value = newText;
        }
    }

    //Get current text in StringField
    static getText(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Change the text
            return component.value;
        }
    }

    //Force the field to validate
    static forceValidate(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Validate the field
            StringField.autoValidation(component);
        }
    }

    //Set a new status
    static setStatus(componentId, isGood, message) {
        //Access the component status
        var componentInput = WindUiJs.getComponentById(componentId + "Input");
        var componentStatus = WindUiJs.getComponentById(componentId + "Status");
        if (componentInput != null && componentStatus != null) {
            //Force the field to validate
            StringField.forceValidate(componentId);
            //check if field is valid, before set a new status
            var isValid = componentInput.getAttribute("isvalid");
            //If is valid
            if (isValid == "true") {
                //set status according to the good or not
                if (isGood == true) {
                    componentInput.style.borderColor = "#00911d";
                    componentStatus.style.color = "#00911d";
                    componentStatus.style.visibility = "visible";
                    componentStatus.innerHTML = "- " + message;
                }
                if (isGood == false) {
                    componentInput.style.borderColor = "red";
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