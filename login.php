<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <?php require_once "SSR/LoginForm.php"; ?>
</head>

<body>
    <div class="container-fluid form-box">
        <h1 class="text-center">Login</h1>
        <p>Please fill in this form to Login to your account.</p>
        <form action="backend-logic/Login.php" method="post" class="mx-auto align-middle" onsubmit="return validateLoginForm()">
            <div class="mb-3">
                <label for="userName" class="form-label">User Name</label>
                <?php
                loginUserNameInput();
                ?>
                <div class="form-text" id="userNameHelp">placeholder</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" required>
                <div class="form-text" id="passwordHelp">placeholder</div>
            </div>
            <a class="btn btn-secondary" href="signup.php" role="button">Create Account</a>
            <button type="submit" class="btn btn-primary">Login</button>
            <?php
            displayLoginErrors();
            ?>
        </form>
    </div>
    <script src="js/LoginValidation.js"></script>
</body>

</html>