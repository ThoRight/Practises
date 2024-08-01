<?php
include('database.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Create New User</h1>
    <form method="POST" action="add_user.php">
        <label>Name: </label>
        <input type="text" name="username" placeholder="Enter Username">
        <label>Email: </label>
        <input type="email" name="email" placeholder="Enter Email">
        <label>Password: </label>
        <input type="text" name="password" placeholder="Enter Password">
        <input id="submit_button" type="submit" value="Create Account">
    </form>
</body>

</html>