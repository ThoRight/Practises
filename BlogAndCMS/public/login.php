<?php
include('../includes/session_management.php');

if (isset($_SESSION['username'])) {
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="container">
        <form form method="POST" action="../api/login_user.php" id="login-form">
            <h1>Login</h1>
            <div class="form-group">
                <label for="exampleInputUsername1">Username</label>
                <input type="text" name="username" class="form-control" id="inputUsername" aria-describedby="emailHelp" placeholder="Enter Username">
                <div class="invalid-feedback" id="username-feedback"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                <div class="invalid-feedback" id="password-feedback"></div>
            </div>
            <div class="form-group invalid-feedback" id="login-feedback"></div>
            <div class="form-group">
                <input id="submit_button" type="submit" class="btn btn-primary" value="Login"></button>
                <a href="index.php" class="btn btn-secondary">Main Menu</a>
            </div>
        </form>
    </div>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/login.js"></script>
</body>

</html>