var phoneFormat  = /^07[7-9][0-9]{7}$/;
var numberFormat = /[-.0-9]+/;
var emailFormat  = /^[A-ZA-z0-9._-]+@(hotmail|gmail|yahoo|outlook).com$/;
var passFormat   = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
//Ful Name
var fullname     = document.getElementById("name")
var nameMessage  = document.getElementById("nameMessage")
var nameDiv      = document.getElementById("namediv")
//Email
var email        = document.getElementById("email")
var emailMesaage = document.getElementById("emailMessage")
var emailDiv     = document.getElementById("emaildiv")
//Phone
var phone        = document.getElementById("phone")
var phoneMesaage = document.getElementById("phoneMessage")
var phoneDiv     = document.getElementById("phonediv")
//Paswword
var pass         = document.getElementById("pass")
var passMessage  = document.getElementById("passMessage")
var passDiv      = document.getElementById("passdiv")
//Paswword Repeat
var passR         = document.getElementById("re-pass")
var passRMessage  = document.getElementById("re-passMessage")
var passRDiv      = document.getElementById("re-passdiv")

//Name Validation
fullname.onkeyup = function(){
    if (fullname.value.match(numberFormat)){
        nameMessage.style.color="red"
        nameMessage.style.marginBottom="5px"
        nameMessage.style.width="90%"
        nameMessage.style.fontSize="12px"
        fullname.style.borderBottom="2px solid red"
        nameDiv.style.margin="0px"
        nameMessage.innerHTML="Please Enter a Valid Name"
    }else{
        nameMessage.style.color="rgb(0, 212, 0)"
        nameMessage.style.marginBottom="5px"
        nameMessage.style.width="90%"
        nameMessage.style.fontSize="12px"
        fullname.style.borderBottom="2px solid rgb(0, 212, 0)"
        nameDiv.style.margin="0px"
        nameMessage.innerHTML="Ok"
    }
}
//Email Validation
email.onkeyup = function(){
    if (!email.value.match(emailFormat)){
        emailMesaage.style.color="red"
        emailMesaage.style.marginBottom="5px"
        emailMesaage.style.width="90%"
        emailMesaage.style.fontSize="12px"
        email.style.borderBottom="2px solid red"
        emailDiv.style.margin="0px"
        emailMesaage.innerHTML="Please Enter a Valid Email"
    }else{
        emailMesaage.style.color="rgb(0, 212, 0)"
        emailMesaage.style.marginBottom="5px"
        emailMesaage.style.width="90%"
        emailMesaage.style.fontSize="12px"
        email.style.borderBottom="2px solid rgb(0, 212, 0)"
        emailDiv.style.margin="0px"
        emailMesaage.innerHTML="Ok"
    }
    }
//Phone Validation
phone.onkeyup = function(){
    if (!phone.value.match(phoneFormat)){
        phoneMesaage.style.color="red"
        phoneMesaage.style.marginBottom="5px"
        phoneMesaage.style.width="90%"
        phoneMesaage.style.fontSize="12px"
        phone.style.borderBottom="2px solid red"
        phoneDiv.style.margin="0px"
        phoneMesaage.innerHTML="Please Enter a Valid Mobile"
    }else{
        phoneMesaage.style.color="rgb(0, 212, 0)"
        phoneMesaage.style.marginBottom="5px"
        phoneMesaage.style.width="90%"
        phoneMesaage.style.fontSize="12px"
        phone.style.borderBottom="2px solid rgb(0, 212, 0)"
        phoneDiv.style.margin="0px"
        phoneMesaage.innerHTML="Ok"
    }
    }
//Pass Validation
pass.onkeyup = function(){
    if (!pass.value.match(passFormat)){
        passMessage.style.color="red"
        passMessage.style.marginBottom="5px"
        passMessage.style.width="90%"
        passMessage.style.fontSize="12px"
        pass.style.borderBottom="2px solid red"
        passDiv.style.margin="0px"
        passMessage.innerHTML="Password must contain Upper Case, Number, Special Character and at least 8 Characters"
    }else{
        passMessage.style.color="rgb(0, 212, 0)"
        passMessage.style.marginBottom="5px"
        passMessage.style.width="90%"
        passMessage.style.fontSize="12px"
        pass.style.borderBottom="2px solid rgb(0, 212, 0)"
        passDiv.style.margin="0px"
        passMessage.innerHTML="Ok"
    }
    }
//RePass Validation
passR.onkeyup = function(){
    if (passR.value!==pass.value){
        passRMessage.style.color="red"
        passRMessage.style.marginBottom="5px"
        passRMessage.style.width="90%"
        passRMessage.style.fontSize="12px"
        passR.style.borderBottom="2px solid red"
        passRDiv.style.margin="0px"
        passRMessage.innerHTML="Your password and confirmation password do not match"
    }else{
        passRMessage.style.color="rgb(0, 212, 0)"
        passRMessage.style.marginBottom="5px"
        passRMessage.style.width="90%"
        passRMessage.style.fontSize="12px"
        passR.style.borderBottom="2px solid rgb(0, 212, 0)"
        passRDiv.style.margin="0px"
        passRMessage.innerHTML="Ok"
    }
    }