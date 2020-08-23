//Component "BoolField" JavaScript Code
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

class BoolField {
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
                tooltipNode.style.opacity = "1";
            }
            if (show == false) {
                tooltipNode.style.maxWidth = "80px";
                tooltipNode.style.visibility = "hidden";
                tooltipNode.style.opacity = "0";
            }
        }
    }

    //Validate a BoolField component and show status
    static autoValidation(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.parentNode.parentNode.id;
        var checked = targetInput.checked;
        var status = document.getElementById(id + "Status");
        var check = document.getElementById(id + "Check");
        var requirechecked = targetInput.getAttribute("requirechecked");
        var requireunchecked = targetInput.getAttribute("requireunchecked");
        var onchangecontent = targetInput.getAttribute("onchangecontent");

        var isValid = "";

        //Start the other validations
        if (requirechecked == "true" && checked == false)
            isValid = "- Este parâmetro deve estar marcado.";
        if (requireunchecked == "true" && checked == true)
            isValid = "- Este parâmetro não pode estar marcado.";

        //If is valid have a reason, is not valid
        if (isValid != "") {
            check.style.borderColor = "red";
            status.style.color = "red";
            status.style.visibility = "visible";
            status.innerHTML = isValid;
            targetInput.setAttribute("isvalid", "false");
        }
        if (isValid == "") {
            check.style.borderColor = "#ccc";
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

    //Check if a BoolField is valid
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

    //Get value of a BoolField is valid
    static getValue(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Return value of BoolField
            if (component.checked == true)
                return "true";
            if (component.checked == false)
                return "false";
        }
    }

    //Set value of a BoolField is valid
    static setValue(componentId, newValue) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Set value of BoolField
            if (newValue == true)
                component.checked = true;
            if (newValue == false)
                component.checked = false;
        }
    }

    //Force the field to validate
    static forceValidate(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Validate the field
            BoolField.autoValidation(component);
        }
    }

    //Set a new status
    static setStatus(componentId, isGood, message) {
        //Access the component status
        var componentCheck = WindUiJs.getComponentById(componentId + "Check");
        var componentInput = WindUiJs.getComponentById(componentId + "Input");
        var componentStatus = WindUiJs.getComponentById(componentId + "Status");
        if (componentInput != null && componentStatus != null && componentCheck != null) {
            //Force the field to validate
            BoolField.forceValidate(componentId);
            //check if field is valid, before set a new status
            var isValid = componentInput.getAttribute("isvalid");
            //If is valid
            if (isValid == "true") {
                //set status according to the good or not
                if (isGood == true) {
                    componentCheck.style.borderColor = "#00911d";
                    componentStatus.style.color = "#00911d";
                    componentStatus.style.visibility = "visible";
                    componentStatus.innerHTML = "- " + message;
                }
                if (isGood == false) {
                    componentCheck.style.borderColor = "red";
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