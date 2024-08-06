<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form id="reg-form" method="POST" action="add_user.php">
            <h1>Registration</h1>
            <div class="form-group">
                <label for="exampleInputUsername1">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" placeholder="Enter Username">
                <div class="invalid-feedback" id="username-feedback"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                <div class="invalid-feedback" id="email-feedback"></div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <small id="passwordHelp" class="form-text text-muted">Use at least one character, number, and symbol, length must be at least 8.</small>
                <div class="invalid-feedback" id="password-feedback"></div>
            </div>
            <div class="form-group">
                <input id="submit_button" type="submit" class="btn btn-primary" value="Register">
                <a href="index.php" class="btn btn-secondary">Main Menu</a>
            </div>
        </form>
    </div>

    <script src="jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="reg_validation.js"></script>
</body>

</html>