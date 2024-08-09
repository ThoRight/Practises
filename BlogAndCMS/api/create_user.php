<?php
include('../includes/database.php');
include('../includes/validation.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (
        isset($data['username']) &&
        isset($data['fullname']) &&
        isset($data['city']) &&
        isset($data['email']) &&
        isset($data['password']) &&
        isset($data['about']) &&
        isset($data['check'])
    ) {
        $errorStr = "";

        $fullname = htmlspecialchars($data['fullname']);
        $username = htmlspecialchars($data['username']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $city = htmlspecialchars($data['city']);
        $about = htmlspecialchars($data['about']);
        $check = isset($data['check']) ? true : false;

        $errorStr = checkUsername($username);
        if (!empty($errorStr)) {
            echo json_encode(['status' => 'error', 'message' => $errorStr]);
            exit();
        }

        $errorStr = checkEmail($email);
        if (!empty($errorStr)) {
            echo json_encode(['status' => 'error', 'message' => $errorStr]);
            exit();
        }

        $errorStr = checkPassword($password);
        if (!empty($errorStr)) {
            echo json_encode(['status' => 'error', 'message' => $errorStr]);
            exit();
        }

        $errorStr = checkUsernameIfExist($username, $conn);
        if (!empty($errorStr)) {
            echo json_encode(['status' => 'error', 'message' => $errorStr]);
            exit();
        }

        $errorStr = checkEmailIfExist($email, $conn);
        if (!empty($errorStr)) {
            echo json_encode(['status' => 'error', 'message' => $errorStr]);
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $role = "user";
        $sql = "INSERT INTO users (fullname, email, city, username, password, role, about) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss', $fullname, $email, $city, $username, $hashed_password, $role, $about);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'User created successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    }

    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
