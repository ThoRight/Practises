<?php
function inc_view_count($post, $conn)
{
    if (!isset($post['post_id'])) {
        return ['status' => 'error', 'message' => 'Post object must have a post_id property.'];
    }

    $query = "UPDATE posts SET view_count = view_count + 1 WHERE post_id = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $post['post_id']);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $response = ['status' => 'success', 'message' => 'View count updated'];
            } else {
                $response = ['status' => 'error', 'message' => 'Post not found'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to execute query: ' . $stmt->error];
        }

        $stmt->close();
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to prepare statement: ' . $conn->error];
    }

    return $response;
}
