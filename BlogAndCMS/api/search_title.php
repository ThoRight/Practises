<?php
header('Content-Type: application/json');

include('../includes/database.php');

$query = isset($_GET['query']) ? $_GET['query'] : '';

$results = [];

if ($query) {
    $stmt = $conn->prepare("SELECT post_id, title, SUBSTRING(content, 1, 100) AS excerpt 
                               FROM posts 
                               WHERE title LIKE ?
                               LIMIT 10");

    // Bind parameters
    $searchQuery = "%{$query}%";
    $stmt->bind_param('s', $searchQuery);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the posts
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    // Close the statement
    $stmt->close();
}

echo json_encode($results);
