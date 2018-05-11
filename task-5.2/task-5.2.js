$(document).ready(function() {

    // Used jquery for preventing the default submition of the form
    $('form').submit(function (event) {

        let isValid = validate();
        if (isValid) {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;

            let input = {username, password};
            let json_upload = JSON.stringify(input);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", 'register.php', true);
            xhr.setRequestHeader("Content-type", "application/json");

            xhr.onload = function() {
                if(xhr.status == 200) {
                    let response = JSON.parse(xhr.responseText);
                    $('#success').text("Hello, " + response.username);
                    formEmpty();
                }
                else{
                    console.error(xhr.responseText);
                }
            };
            xhr.send(json_upload);
        }
        event.preventDefault();
    });

});


function formEmpty() {
    document.getElementById('username').value = "";
    document.getElementById('password').value = "";
    document.getElementById('password-confirm').value = "";
}

function validate(){
    let username = document.getElementById('username').value;
    let password =  document.getElementById('password').value;
    let passwordConfirm =  document.getElementById('password-confirm').value;

    if(username.length < 3 || username.length > 10)
    {
        showFailureMessage("Потребителското име трябва да бъде между 3 и 10 символа.");
        return false;
    }

    if(!username.match(/^[A-Za-z0-9_]+$/))
    {
        showFailureMessage("Потребителското име може да съдържа само букви, цифри и долна черта.");
        return false;
    }

    if(password.length < 6)
    {
        showFailureMessage("Паролата трябва да бъде поне 6 символа");
        return false;
    }

    if(!password.match(/^(?=.*\d)(?=.*[a-zA-Z]).*$/))
    {
         showFailureMessage("Паролата трябва да съдържа поне една главна буква, поне една малка буква и поне една цифра.");
        return false;
    }

    if(password !== passwordConfirm)
    {
         showFailureMessage("Паролите не съвпадат.");
        return false;
    }

    showSuccessMessage("Всички полета са валидни");
    return true;

}

function showSuccessMessage(message) {
    $("div.success").empty().append(`<p>${message}</p>`);
    $("div.success").fadeIn(300).delay(1500).fadeOut(400);
};

function showFailureMessage(message) {
    $("div.failure").empty().append(`<p>${message}</p>`);
    $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
};
