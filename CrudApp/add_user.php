<?php
include('database.php');
include('validation.php');
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])
    && isset($_POST['email']) && isset($_POST['password'])
) {
    $errorStr = "";
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $errorStr = checkUsername($username);
    if (!empty($errorStr)) {
        $encodedErrorStr = urlencode($errorStr);
        header("Location: index.php?status=error&errorStr=" . $encodedErrorStr);
        exit();
    }
    $errorStr = checkEmail($email);
    if (!empty($errorStr)) {
        $encodedErrorStr = urlencode($errorStr);
        header("Location: index.php?status=error&errorStr=" . $encodedErrorStr);
        exit();
    }
    $errorStr = checkPassword($password);
    if (!empty($errorStr)) {
        $encodedErrorStr = urlencode($errorStr);
        header("Location: index.php?status=error&errorStr=" . $encodedErrorStr);
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $hashed_password);
    if ($stmt->execute()) {
        header("Location: index.php?status=success_create");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ERROR!";
}

$conn->close();
