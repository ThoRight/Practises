<?php
include('../includes/validation.php');
include('../includes/database.php');
header('Content-Type: application/json');
session_start();


if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (
        isset($data['username']) &&
        isset($data['password'])
    ) {
        $errorStr = "";
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $errorStr = checkCredentials($username, $password, $conn);

        if (!empty($errorStr)) {
            echo json_encode(['status' => 'error', 'message' => $errorStr]);
            exit();
        } else {
            $user_id = 0;

            $user_check = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
            $user_check->bind_param('s', $username);
            $user_check->execute();
            $user_check->bind_result($user_id);
            if ($user_check->fetch()) {
                // Result fetched successfully
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                echo json_encode(['status' => 'success', 'message' => 'Login Successful']);
            } else {
                // Handle case where no result was fetched
                echo json_encode(['status' => 'error', 'message' => 'User not found']);
            }
            $user_check->close();
            //header("Location: ../public/home.php");
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
