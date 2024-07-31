<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = trim($_POST['task']);
    $task = htmlspecialchars($task, ENT_QUOTES, 'UTF-8');

    $sql = "INSERT INTO tasks (task) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $task);

    if ($stmt->execute()) {
        echo "New task added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    header("Location: index.php");
    exit();
}
$conn->close();
?>
