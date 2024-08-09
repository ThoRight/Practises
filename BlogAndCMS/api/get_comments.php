<?php
include('../includes/database.php');
include('../includes/validation.php');
include('../includes/database_operations.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['post_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'No Post Id']);
        exit();
    }
    $post_id = $_GET['post_id'];

    $sql = "SELECT * FROM comments WHERE post_id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $response = [
            'status' => 'error',
            'message' => 'Prepare failed: ' . $conn->error,
        ];
    } else {
        $stmt->bind_param('i', $post_id);

        if (!$stmt->execute()) {
            $response = [
                'status' => 'error',
                'message' => 'Execute failed: ' . $stmt->error,
            ];
        } else {
            $result = $stmt->get_result();
            $comments = [];
            while ($row = $result->fetch_assoc()) {
                $res = getUsernameByUserId($row['user_id'], $conn);
                if ($res['status'] === 'success') {
                    $comments[] = [
                        'username' => $res['username'],
                        'comment' => $row['comment']
                    ];
                }
            }
            $response = [
                'status' => 'success',
                'data' => $comments,
                'message' => 'Comments fetched successfully',
            ];
        }
        $stmt->close();
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
