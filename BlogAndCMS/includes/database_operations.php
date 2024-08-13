<?php
include('database.php');
function getUsernameByUserId($id, $conn)
{
    $sql = "SELECT username FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $username = "";
    if ($stmt === false) {
        return ['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error];
    }

    $stmt->bind_param('i', $id);

    $stmt->execute();

    $stmt->bind_result($username);

    $result = $stmt->fetch();

    $stmt->close();

    if ($result) {
        return ['status' => 'success', 'username' => $username];
    } else {
        return ['status' => 'error', 'message' => 'User not found'];
    }
}

function getTotalPostsByCategoryId($category_id, $conn)
{
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM post_categories WHERE category_id = ?");
    if (!$stmt) {
        return (['status' => 'error', 'message' => 'Error preparing the SQL statement: ' . $conn->error]);
    }

    $stmt->bind_param('i', $category_id); // 'i' denotes the type is integer

    if (!$stmt->execute()) {
        $stmt->close();
        return (['status' => 'error', 'message' => 'Error executing the SQL statement: ' . $stmt->error]);
    }

    $result = $stmt->get_result();
    if ($result) {
        $row = $result->fetch_assoc();
        $totalPosts = $row['total'];
        $stmt->close();
        return (['status' => 'success', 'totalPosts' => $totalPosts]);
    } else {
        $stmt->close();
        return (['status' => 'error', 'message' => 'Error fetching the result: ' . $stmt->error]);
    }
}

function getPostByPostId($id, $conn)
{
    $sql = "SELECT * FROM posts WHERE post_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        return ['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error];
    }

    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    $stmt->close();

    if ($post) {
        return [
            'status' => 'success',
            'post' => $post
        ];
    } else {
        return ['status' => 'error', 'message' => 'Post not found'];
    }
}
