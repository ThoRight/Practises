<?php
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
