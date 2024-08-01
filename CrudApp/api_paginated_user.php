<?php
include('database.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $page = isset($data['page']) ? (int)$data['page'] : 1;
    $records_per_page = isset($data['records_per_page']) ? (int)$data['records_per_page'] : 4;

    if ($page < 1 || $records_per_page < 1) {
        http_response_code(400); // Bad Request
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid input'
        ]);
        exit;
    }
    $start_from = ($page - 1) * $records_per_page;

    $total_sql = "SELECT COUNT(*) FROM users";
    $total_result = $conn->query($total_sql);
    $total_row = $total_result->fetch_row();
    $total_records = $total_row[0];
    $total_pages = ceil($total_records / $records_per_page);

    $sql = "SELECT * FROM users LIMIT $start_from, $records_per_page";
    $result = $conn->query($sql);
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        http_response_code(500); // Internal Server Error
        echo json_encode([
            'status' => 'error',
            'message' => 'Database prepare failed'
        ]);
        exit;
    }

    //$stmt->bind_param('ii', $start_from, $records_per_page);
    $users = $result->fetch_all(MYSQLI_ASSOC);

    if ($stmt->execute()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Users are displayed successfully',
            'data' => $users
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
