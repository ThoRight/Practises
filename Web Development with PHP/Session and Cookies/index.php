<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'No name found in session.';
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light'; // light is default.

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session and Cookies</title>
</head>
<body>
    <h2>Session and Cookies</h2>
    <h1>Current Name: <?= htmlspecialchars($name) ?></h1>
    <h1>Current Theme: <?= htmlspecialchars($theme)?></h1>
    <form method="post" action="set_name.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <input type="submit" value="Submit">
    </form>
    <form method="post" action="set_theme.php">
        <button type="submit" name="theme" value="light">Light Theme</button>
        <button type="submit" name="theme" value="dark">Dark Theme</button>
    </form>
    <form action="page2.php" method="get">
        <input type="submit" value="Go to Page 2">
    </form>
</body>
</html>
