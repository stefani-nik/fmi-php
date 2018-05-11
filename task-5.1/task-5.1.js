function validate(){
    let username = document.getElementById('username').value;
    let password =  document.getElementById('password').value;
    let passwordConfirm =  document.getElementById('password-confirm').value;

    console.log(username);

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

    showSuccessMessage("Всички полета са валидни.");


     // Returned false so that you can see the success message since the register.php file does not exist
     return false;
}

function showSuccessMessage(message) {
    $("div.success").empty().append(`<p>${message}</p>`);
    $("div.success").fadeIn(300).delay(1500).fadeOut(400);
};

function showFailureMessage(message) {
    $("div.failure").empty().append(`<p>${message}</p>`);
    $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
};
