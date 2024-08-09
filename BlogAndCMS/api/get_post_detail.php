<?php
include('../includes/database.php');
include('../includes/validation.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 1;

    $sql = "SELECT * FROM posts where post_id=?";
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
            $post;
            while ($row = $result->fetch_assoc()) {
                $post = $row;
            }
            $response = [
                'status' => 'success',
                'data' => $post,
                'message' => 'Post fetched successfully',
            ];
        }
        $stmt->close();
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
