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
