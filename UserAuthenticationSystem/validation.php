<?php
include('database.php');

function checkUsername($username)
{
    if (empty($username)) {
        return 'Username is required.';
    }
    if (preg_match('/\s/', $username)) {
        return 'Username cannot contain spaces.';
    }
    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        return 'Username can only contain letters and numbers.';
    }
    return "";
}
function checkEmail($email)
{
    if (empty($email)) {
        return 'Email is required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Invalid email format.';
    }
    return "";
}

function checkPassword($password)
{
    if (empty($password)) {
        return 'Password is required.';
    }
    if (strlen($password) < 8) {
        return 'Password must be at least 8 characters long.';
    }
    if (!preg_match('/[a-zA-Z]/', $password)) {
        return 'Password must contain at least one letter.';
    }
    if (!preg_match('/[0-9]/', $password)) {
        return 'Password must contain at least one number.';
    }
    if (!preg_match('/[\W_]/', $password)) {
        return 'Password must contain at least one special character.';
    }
    return "";
}
function checkUsernameIfExist($entry, $conn)
{
    $count = 0;
    $sql = "SELECT COUNT(*) FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $entry);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count == 0) {
        return "";
    } else {
        return "The username already exists";
    }
}
function checkEmailIfExist($entry, $conn)
{
    $count = 0;
    $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $entry);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count == 0) {
        return "";
    } else {
        return "The email already exists";
    }
}
function checkIdIfExist($entry, $conn)
{
    $count = 0;
    $sql = "SELECT COUNT(*) FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $entry);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count == 0) {
        return "";
    } else {
        return "The id already exists";
    }
}

function checkCredentials($username, $password, $conn)
{
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            return "";
        } else {
            return "Invalid password.";
        }
    } else {
        return "User not found.";
    }
}
