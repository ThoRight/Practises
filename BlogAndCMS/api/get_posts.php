<?php
include('../includes/database.php');
include('../includes/validation.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $posts_per_page = 9;
    $offset = ($page - 1) * $posts_per_page;

    $result = $conn->query("SELECT COUNT(*) AS total FROM posts");
    if ($result) {
        $row = $result->fetch_assoc();
        $totalPosts = $row['total'];
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error in calculating total posts']);
        exit();
    }

    // Calculate total number of pages
    $totalPages = ceil($totalPosts / $posts_per_page);

    $sql = "SELECT * FROM posts LIMIT ?, ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $response = [
            'status' => 'error',
            'message' => 'Prepare failed: ' . $conn->error,
        ];
    } else {
        $stmt->bind_param('ii', $offset, $posts_per_page);

        if (!$stmt->execute()) {
            $response = [
                'status' => 'error',
                'message' => 'Execute failed: ' . $stmt->error,
            ];
        } else {
            $result = $stmt->get_result();
            $posts = [];
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
            $response = [
                'status' => 'success',
                'data' => $posts,
                'message' => 'Posts fetched successfully',
                'totalPages' => $totalPages
            ];
        }
        $stmt->close();
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
