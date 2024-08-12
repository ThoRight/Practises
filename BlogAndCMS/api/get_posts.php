<?php
include('../includes/database.php');
include('../includes/validation.php');
include('../includes/database_operations.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 1;
    $posts_per_page = 9;
    $offset = ($page - 1) * $posts_per_page;

    $response = getTotalPostsByCategoryId($category_id, $conn);
    if ($response['status'] === 'error') {
        echo json_encode(['status' => 'error', 'message' => $response['message']]);
    }
    // Calculate total number of pages
    $totalPages = ceil($response['totalPosts'] / $posts_per_page);

    $sql = "SELECT * FROM post_categories WHERE category_id = ?  LIMIT ?, ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $response = [
            'status' => 'error',
            'message' => 'Prepare failed: ' . $conn->error,
        ];
    } else {
        $stmt->bind_param('iii', $category_id, $offset, $posts_per_page);

        if (!$stmt->execute()) {
            $response = [
                'status' => 'error',
                'message' => 'Execute failed: ' . $stmt->error,
            ];
        } else {
            $result = $stmt->get_result();
            $posts = [];
            while ($row = $result->fetch_assoc()) {
                $res = getPostbyPostId($row['post_id'], $conn);
                if ($res['status'] === 'success') {
                    $posts[] = $res['post'];
                }
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
