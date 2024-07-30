<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST["name"];
    header("Location: index.php");
    exit();
}
else {
    header("Location: index.php");
    exit();
}
?>
