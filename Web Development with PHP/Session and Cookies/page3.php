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
    <title>Page2</title>
  </head>
  <body>
  <h1>Current Name: <?= htmlspecialchars($name) ?></h1>
  <h1>Current Theme: <?= htmlspecialchars($theme)?></h1>
    <form action="index.php" method="get">
        <input type="submit" value="Go to main page">
    </form>
  </body>
</html>