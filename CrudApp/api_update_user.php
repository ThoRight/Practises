<?php
include('database.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    $id = isset($data['id']) ? intval($data['id']) : '';
    $username = isset($data['username']) ? htmlspecialchars($data['username']) : '';
    $email = isset($data['email']) ? htmlspecialchars($data['email']) : '';
    $password = isset($data['password']) ? htmlspecialchars($data['password']) : '';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (empty($id) || empty($username) || empty($email) || empty($password) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400); // Bad Request
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid input'
        ]);
        exit;
    }

    $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        http_response_code(500); // Internal Server Error
        echo json_encode([
            'status' => 'error',
            'message' => 'Database prepare failed'
        ]);
        exit;
    }

    $stmt->bind_param('sssi', $username, $email, $hashed_password, $id);

    if ($stmt->execute()) {
        http_response_code(201); // Created
        echo json_encode([
            'status' => 'success',
            'message' => 'User updated successfully'
        ]);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode([
            'status' => 'error',
            'message' => 'Database error: ' . $stmt->error
        ]);
    }

    $stmt->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        'status' => 'error',
        'message' => 'Method not allowed'
    ]);
}

$conn->close();
