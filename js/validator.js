var submit = document.getElementById("submit_btn");

//PASSWORD VALIDATOR
var password = document.getElementById("password");
var confirm_password = document.getElementById("conferma_password");

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Le Password non Corrispondono");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


//EMAIL VALIDATOR
var email = document.getElementById("email");
var confirm_email = document.getElementById("conferma_email");

function validateEmail(){
    if(email.value != confirm_email.value) {
        confirm_email.setCustomValidity("Le Email non Corrispondono");
    } else {
        confirm_email.setCustomValidity('');
    }
}

email.onchange = validateEmail;
confirm_email.onkeyup = validateEmail;


//DATE VALIDATOR


function validateData() {
    var gg = document.getElementById("data_nascita_gg");
    var mm = document.getElementById("data_nascita_mm");
    var aa = document.getElementById("data_nascita_aa");
    if(gg.value === "GG"){
        gg.setCustomValidity("Scegliere il Giorno di Nascita");
    }
    else{
        gg.setCustomValidity('');
    }
    if(mm.value === "MM"){
        mm.setCustomValidity("Scegliere il Mese di Nascita");
    }
    else{
        mm.setCustomValidity('');
    }
    if(aa.value === "AA"){
        aa.setCustomValidity("Scegliere l'Anno di Nascita");
    }
    else{
        aa.setCustomValidity('');
    }
}

$('#submit_btn').on('click',validateData);