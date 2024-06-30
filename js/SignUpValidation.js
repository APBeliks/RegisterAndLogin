function validateSignUpForm() {
    const username = document.getElementById('userName').value;
    const password = document.getElementById('password').value;
    const email = document.getElementById('email').value;
    const repeatPassword = document.getElementById('repeatPassword').value;

    clearValidationErrors();

    isUsernameOk = usernameValidation(username);
    isPasswordOk = passwordValidation(password, repeatPassword);
    isEmailOk = emailValidation(email);

    return (isUsernameOk && isPasswordOk && isEmailOk) ? true : false
}



function usernameValidation(username) {
    if (username === "") {
        document.getElementById("userNameHelp").innerHTML = "Fill in user name";
        return false;
    }
    if (username.length > 30) {
        document.getElementById("userNameHelp").innerHTML = "Username can by max 30 characters long";
        return false;
    }
    return true;
}

function passwordValidation(password, repeatPassword) {
    if (password === "") {
        document.getElementById("passwordHelp").innerHTML = "Fill in password";
        return false;
    }

    if (!/[A-Z]/.test(password)) {
        document.getElementById("passwordHelp").innerHTML = "Password must contain large letters";
        return false;
    }

    if (!/[a-z]/.test(password)) {
        document.getElementById("passwordHelp").innerHTML = "Password must contain small letters";
        return false;
    }

    if (!/[0-9]/.test(password)) {
        document.getElementById("passwordHelp").innerHTML = "Password must contain numbers";
        return false;
    }
    if (repeatPassword === "") {
        document.getElementById("repeatPasswordHelp").innerHTML = "U need to repeat password";
        return false;
    }

    if (password !== repeatPassword) {
        document.getElementById("passwordHelp").innerHTML = "Passwords must match";
        document.getElementById("repeatPasswordHelp").innerHTML = "Passwords must match";
        return false;
    }
    return true;
}

function emailValidation(email) {
    if (email === "") {
        document.getElementById("emailHelp").innerHTML = "Fill in email";
        return false;
    }
    //Basic validation with regex will return !true if string is in format: name@domain.tld (tld - top level domain for example .pl .com .org...)
    if (!/^\S+@\S+\.\S+$/.test(email)) {
        document.getElementById("emailHelp").innerHTML = "This is not valid email";
        return false;
    }
    return true;
}
function clearValidationErrors() {
    document.getElementById("userNameHelp").innerHTML = "";
    document.getElementById("passwordHelp").innerHTML = "";
    document.getElementById("repeatPasswordHelp").innerHTML = "";
    document.getElementById("emailHelp").innerHTML = "";
}