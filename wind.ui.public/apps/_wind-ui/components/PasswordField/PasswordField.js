//Component "PasswordField" JavaScript Code
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

class PasswordField {
    //Automatic API

    //Validate a DateField component and show status
    static autoValidation(targetInput) {
        //Get metadata of field
        var id = targetInput.parentNode.id;
        var value = targetInput.value;
        var status = document.getElementById(id + "Status");
        var minchars = targetInput.getAttribute("minchars");
        var requirespecialchars = targetInput.getAttribute("requirespecialchars");
        var requirenumbers = targetInput.getAttribute("requirenumbers");
        var allowempty = targetInput.getAttribute("allowempty");
        var onchangecontent = targetInput.getAttribute("onchangecontent");

        var isValid = "";

        //Start the other validations
        if (minchars != "0" && value.length < minchars)
            isValid = "- A senha deve conter no mínimo " + minchars.toString() + " caracters.";
        if (requirespecialchars == "true" && /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g.test(value) == false)
            isValid = "- A senha deve conter caracteres especiais, como !@$#$.";
        if (requirenumbers == "true" && /\d/.test(value) == false)
            isValid = "- A senha deve conter números.";
        if (allowempty == "false" && value == "")
            isValid = "- A senha não pode estar vazia.";

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

    //Check if a DateField is valid
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

    //Get type of DateField
    static getValue(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Return the value
            return component.value;
        }
    }

    //Force the field to validate
    static forceValidate(componentId) {
        //Access the component
        var component = WindUiJs.getComponentById(componentId + "Input");
        if (component != null) {
            //Validate the field
            PasswordField.autoValidation(component);
        }
    }

    //Set a new status
    static setStatus(componentId, isGood, message) {
        //Access the component status
        var componentInput = WindUiJs.getComponentById(componentId + "Input");
        var componentStatus = WindUiJs.getComponentById(componentId + "Status");
        if (componentInput != null && componentStatus != null) {
            //Force the field to validate
            PasswordField.forceValidate(componentId);
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