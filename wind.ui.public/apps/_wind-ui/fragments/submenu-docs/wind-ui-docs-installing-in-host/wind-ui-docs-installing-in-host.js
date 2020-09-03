/*
 * Here is the JavaScript code for your snippet. Prefer to leave all the JavaScript code in here and avoid using
 * <script> tags within your fragment, use them only if you really need to.
*/

function generateHash() {
    var value = StringField.getText("hashInput");
    document.getElementById("hash").innerHTML = CryptoJS.MD5(value);
}