<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_id']) && isset($_POST['task'])) {
    $task_id = intval($_POST['task_id']);
    $task = trim($_POST['task']);
    $task = htmlspecialchars($task, ENT_QUOTES, 'UTF-8');

    $sql = "UPDATE tasks SET task = ? WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $task, $task_id);

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
