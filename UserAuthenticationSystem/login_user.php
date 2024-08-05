<?php
include('validation.php');
include('database.php');
session_start();
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])
    && isset($_POST['password'])
    && !empty($_POST['username']) && !empty($_POST['password'])
) {
    $errorStr = "";
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $errorStr = checkCredentials($username, $hashed_password, $conn);
    if (!empty($errorStr)) {
        $encodedErrorStr = urlencode($errorStr);
        header("Location: index.php?status=error&errorStr=" . $encodedErrorStr);
        exit();
    } else {
        $_SESSION['username'] = $username;
        header("Location: home.php");
    }
} else {
    $errorStr = "Please fill the blanks.";
    $encodedErrorStr = urlencode($errorStr);
    header("Location: index.php?status=error&errorStr=" . $encodedErrorStr);
    exit();
}
