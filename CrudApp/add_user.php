<?php
include('database.php');

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])
    && isset($_POST['email']) && isset($_POST['password'])
) {

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
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
