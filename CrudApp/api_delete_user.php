<?php
include('database.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    $id = isset($data['id']) ? intval($data['id']) : '';

    if (empty($id)) {
        http_response_code(400); // Bad Request
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid input'
        ]);
        exit;
    }

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        http_response_code(500); // Internal Server Error
        echo json_encode([
            'status' => 'error',
            'message' => 'Database prepare failed'
        ]);
        exit;
    }

    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        http_response_code(201); // Created
        echo json_encode([
            'status' => 'success',
            'message' => 'User deleted successfully'
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
