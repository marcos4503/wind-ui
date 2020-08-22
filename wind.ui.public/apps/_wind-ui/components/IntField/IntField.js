//Component "IntField" JavaScript Code
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


class IntField {
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

    //Auto hide characters count of IntField
    static autoHideCharCount(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.id;
        var charCount = document.getElementById(id + "CharCount");
        charCount.style.opacity = "0";
    }

    //Auto show characters count of IntField
    static autoShowCharCount(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.id;
        var value = targetInput.value;
        var charCount = document.getElementById(id + "CharCount");
        var maxchars = targetInput.getAttribute("maxchars");
        charCount.style.opacity = "1";

        //Update char count and color
        IntField.autoUpdateCharCount(charCount, value, maxchars, "red", "");
    }

    //Update char count
    static autoUpdateCharCount(element, currentValue, max, colorIvalid, defaultColor) {
        //Update char count and color
        if (element == null)
            return;
        element.innerHTML = currentValue.length + ((max != "0") ? ("/" + max) : "");
        if (currentValue.length > max && max != "0")
            element.style.color = colorIvalid;
        if (currentValue.length <= max && max != "0")
            element.style.color = defaultColor;
    }

    //Validate a IntField component and show status
    static autoValidation(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.id;
        var value = targetInput.value;
        var status = document.getElementById(id + "Status");
        var charCount = document.getElementById(id + "CharCount");
        var minchars = targetInput.getAttribute("minchars");
        var maxchars = targetInput.getAttribute("maxchars");
        var minvalue = targetInput.getAttribute("minvalue");
        var maxvalue = targetInput.getAttribute("maxvalue");
        var allowzero = targetInput.getAttribute("allowzero");
        var allownegative = targetInput.getAttribute("allownegative");
        var allowempty = targetInput.getAttribute("allowempty");
        var onchangecontent = targetInput.getAttribute("onchangecontent");

        var isValid = "";

        //Update char count and color
        IntField.autoUpdateCharCount(charCount, value, maxchars, "red", "");

        //Start base validation
        if (value != "" && /^([+-]?[1-9]\d*|0)$/.test(value) == false)
            isValid = "- O valor não se parece com um número inteiro.";

        //Start the other validations
        if (minchars >= 1 && value.length < minchars)
            isValid = "- O conteúdo precisa ter no mínimo " + minchars + " caracteres.";
        if (maxchars > 0 && value.length > maxchars)
            isValid = "- O conteúdo pode ter no máximo " + maxchars + " caracteres.";
        if (minvalue != "0" && parseFloat(value) < minvalue)
            isValid = "- O valor deve ser de no mínimo " + minvalue.toString() + ".";
        if (maxvalue != "0" && parseFloat(value) > maxvalue)
            isValid = "- O valor deve ser de no máximo " + maxvalue.toString() + ".";
        if (allowzero == "false" && value == "0")
            isValid = "- O valor não pode ser zero.";
        if (allownegative == "false" && parseFloat(value) < 0)
            isValid = "- O valor não pode ser negativo.";
        if (allowempty == "false" && value == "")
            isValid = "- O valor não pode ser vazio.";

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

    //Check if a IntField is valid
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

    //Set a text in IntField
    static setNumber(componentId, newNumber) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Change the text
            if (WindUiJs.isInt(newNumber) == true)
                component.value = newNumber;
        }
    }

    //Get current number in IntField
    static getNumber(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Change the text
            return parseInt(component.value);
        }
    }

    //Force the field to validate
    static forceValidate(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Validate the field
            IntField.autoValidation(component);
        }
    }

    //Set a new status
    static setStatus(componentId, isGood, message) {
        //Access the component status
        var componentInput = WindUiJs.getComponentById(componentId + "Input");
        var componentStatus = WindUiJs.getComponentById(componentId + "Status");
        if (componentInput != null && componentStatus != null) {
            //Force the field to validate
            IntField.forceValidate(componentId);
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