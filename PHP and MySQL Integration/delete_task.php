<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_id'])) {
    $task_id = intval($_POST['task_id']);

    $sql = "DELETE FROM tasks WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $task_id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
