function regvalidate() {
var fnamesignup = document.forms.myForm.fnamesignup.value;
var lnamesignup = document.forms.myForm.lnamesignup.value;
var emailsignup = document.forms.myForm.emailsignup.value;
var contactsignup = document.forms.myForm.contactsignup.value;
var passwordsignup = document.forms.myForm.passwordsignup.value;
var passwordsignup_confirm = document.forms.myForm.passwordsignup_confirm.value;

if (Alphabetic(fnamesignup))
    if (AlphaVal(lnamesignup))
            if (emailValidation(emailsignup))
                if (numeric(contactsignup))
                    if (checkPassword(passwordsignup, passwordsignup_confirm))
                        return true;
                    else
                        return false;
                else
                    return false;
            else
                return false;
        else
            return false;
    else
        return false;
}

function empty(elemValue, field) {
if (elemValue === "" || elemValue === null){
    alert("You cannot have " + field + " field empty");
    return true;
}
else
    return false;
}

function Alphabetic(elemValue) {

//First Name must be consist of Alphabetical characters only
if (!empty(elemValue, "Your First Name")){
    var exp = /^[a-zA-Z]+$/;
    if (elemValue.match(exp)){
        return true;
    }
    else {
        alert("Enter only characters for Your First Name");
        return false;
    }
}
else
    return false;
}

function AlphaVal(elemValue) {

//Last Name must be consist of Alphabetical characters only
if (!empty(elemValue, "Your Last Name")){
    var exp = /^[a-zA-Z]+$/;
    if (elemValue.match(exp)){
        return true;
    }
    else {
        alert("Enter only characters for Your Last Name");
        return false;
    }
}
else
    return false;
}

function emailValidation(elemValue) {
    if (!empty(elemValue, "Your Email")){
        var atop = elemValue.indexOf("@");
        var dotop = elemValue.indexOf(".");

        if (atop < 1 || dotop + 2 >= elemValue.length || atop + 2 > dotop){
            alert("Enter a valid Your Email");
            return false;
        }
        else
            return true;
    }
    else
        return false;
}

function numeric(elemValue) {
    if (!empty(elemValue, "Your Contact Number")){
        var exp = /^[0-9]+$/;
        //Contact number field must consist of numbers only
        if (elemValue.match(exp)){
            return true;
        }
        else {
            alert("Enter valid Your Contact Number");
            return false;
        }
    }
    else
        return false;
}

function checkPassword(elemValue, elemValue1) {
    var exp = /^(?=.*\d)(?=.*[A-Z])(?!.*[^a-zA-Z0-9@#$^+=])(.{8,})$/;

    if (!empty(elemValue, "Your Password") && !empty(elemValue1, "Confirm Your Password")) {
        if (elemValue.match(exp)) {
            if (elemValue === elemValue1) {

                return true;
            }
            else {

                alert("Password doesn't match.");
                return false;
            }

        }
        else {

            alert("There should be more than 8 characters.");
            return false;

        }
    }
    else
    {
        return false;
    }
}
