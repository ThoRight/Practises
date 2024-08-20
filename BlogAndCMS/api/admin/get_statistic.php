<?php

include('../../includes/database.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get counts
    $userCount = getCount($conn, 'users');
    $postCount = getCount($conn, 'posts');
    $commentCount = getCount($conn, 'comments');
    $totalViewCount = getTotalViewCount($conn);
    $stats[] = ['name' => 'Total Users', 'value' => $userCount];
    $stats[] = ['name' => 'Total Posts', 'value' => $postCount];
    $stats[] = ['name' => 'Total Comments', 'value' => $commentCount];
    $stats[] = ['name' => 'Total Views', 'value' => $totalViewCount];
    // Close connection
    $conn->close();
    $response = [
        'status' => 'success',
        'data' => $stats,
        'message' => 'Statistics fetched successfully',
    ];

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
function getCount($conn, $table)
{
    $count = 0;
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM $table");
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count;
}

// Function to get the total view count from posts
function getTotalViewCount($conn)
{
    $total_views = 0;
    $stmt = $conn->prepare("SELECT SUM(view_count) AS total_views FROM posts");
    $stmt->execute();
    $stmt->bind_result($total_views);
    $stmt->fetch();
    $stmt->close();
    return $total_views;
}
