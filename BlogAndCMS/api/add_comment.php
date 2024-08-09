<?php
include('../includes/database.php');
include('../includes/validation.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $response = [];
    if (!isset($data['user_id']) || !isset($data['post_id']) || !isset($data['comment'])) {
        $response = [
            'status' => 'error',
            'message' => 'Missing required fields',
        ];
    } else {
        $user_check = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_id = ?");
        $user_check->bind_param('i', $data['user_id']);
        $user_check->execute();
        $user_check->bind_result($user_exists);
        $user_check->fetch();
        $user_check->close();

        $post_check = $conn->prepare("SELECT COUNT(*) FROM posts WHERE post_id = ?");
        $post_check->bind_param('i', $data['post_id']);
        $post_check->execute();
        $post_check->bind_result($post_exists);
        $post_check->fetch();
        $post_check->close();

        if ($user_exists == 0) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid user_id',
            ];
        } elseif ($post_exists == 0) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid post_id',
            ];
        } else {

            $sql = "INSERT INTO comments (user_id, post_id, comment, created_at) VALUES (?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                $response = [
                    'status' => 'error',
                    'message' => 'Prepare failed: ' . $conn->error,
                ];
            } else {
                $stmt->bind_param('iis', $data['user_id'], $data['post_id'], $data['comment']);

                if (!$stmt->execute()) {
                    $response = [
                        'status' => 'error',
                        'message' => 'Execute failed: ' . $stmt->error,
                    ];
                } else {
                    $response = [
                        'status' => 'success',
                        'message' => 'Comment added successfully',
                    ];
                }

                $stmt->close();
            }
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
