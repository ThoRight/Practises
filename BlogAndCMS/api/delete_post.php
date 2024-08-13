<?php
include('../includes/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['post_id'])) {
        $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);

        if (!filter_var($post_id, FILTER_VALIDATE_INT)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid post ID.']);
            exit;
        }

        $sql = "DELETE FROM posts WHERE post_id = ?";

        $response = ['status' => 'error', 'message' => 'Failed to delete post.'];

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('i', $post_id);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $response['status'] = 'success';
                    $response['message'] = 'Post deleted successfully.';
                } else {
                    $response['message'] = 'No post found with the given ID.';
                }
            } else {
                $response['message'] = 'Error executing query.';
            }

            $stmt->close();
        } else {
            $response['message'] = 'Error preparing statement.';
        }

        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Post ID not provided.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
