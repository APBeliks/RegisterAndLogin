<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <?php require_once "SSR/SignUpForm.php"; ?>
</head>

<body>
    <div class="container-fluid form-box">
        <h1 class="text-center">Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <form action="backend-logic/SignUp.php" method="post" class="mx-auto align-middle" onsubmit="return validateSignUpForm()">
            <div class="mb-3">
                <label for="userName" class="form-label">User Name</label>
                <?php
                signUpUserNameInput();
                ?>
                <div class="form-text" id="userNameHelp">Max 30 characters</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Adress</label>
                <?php
                signUpEmailInput();
                ?>
                <div class="form-text" id="emailHelp">Max 100 characters</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <?php
                signUpPasswordInput();
                ?>
                <div class="form-text" id="passwordHelp">Min 8 chars, 1 upper letter, 1 lower letter, and 1 number</div>
            </div>
            <div class="mb-3">
                <label for="repeatPassword" class="form-label">Repeat Password</label>
                <?php
                signUpRepeatPasswordInput();
                ?>
                <div class="form-text" id="repeatPasswordHelp"></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php
            displayErrors();
            ?>
        </form>
    </div>
    <script src="js/SignUpValidation.js"></script>

</body>

</html>