function validateLoginForm() {
    const username = document.getElementById('userName').value;
    const password = document.getElementById('password').value;
    isUsernameOk = usernameValidation(username);
    isPasswordOk = passwordValidation(password);
    return (isUsernameOk && isPasswordOk) ? true : false
}


function usernameValidation(username) {
    if (username === "") {
        document.getElementById("userNameHelp").innerHTML = "Fill in user name";
        return false;
    }
    return true;
}

function passwordValidation(password) {
    if (password === "") {
        document.getElementById("passwordHelp").innerHTML = "Fill in password";
        return false;
    }
    return true;
}