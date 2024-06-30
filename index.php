<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <?php require_once "SSR/Index.php"; ?>
</head>

<body>
    <div class="container-fluid form-box">
        <?php
        displayWelcomeMsg();
        displayButtons();
        ?>
    </div>
    <script src="js/LoginValidation.js"></script>
</body>

</html>