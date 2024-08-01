<?php
include('database.php');

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'])
) {

    $id = intval($_POST['id']);
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: index.php?status=success_delete");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "ERROR!";
}

$conn->close();
