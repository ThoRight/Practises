<?php
include('../includes/database.php');
include('../includes/validation.php');
include('../includes/database_operations.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = [];
    $comments = [];
    if (!isset($_GET['post_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'No Post Id']);
        exit();
    }
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $comments_per_page = 5;
    $offset = ($page - 1) * $comments_per_page;


    $sql = "SELECT COUNT(*) FROM comments WHERE post_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
        exit();
    }

    $stmt->bind_param('i', $_GET['post_id']);

    $stmt->execute();

    $stmt->bind_result($totalComments);

    // Fetch the result
    $stmt->fetch();
    $stmt->close();

    if ($totalComments === null) {
        echo json_encode(['status' => 'error', 'message' => 'Error calculating total comments']);
        exit();
    }
    // Calculate total number of pages
    $totalPages = ceil($totalComments / $comments_per_page);

    $sql = "SELECT * FROM comments WHERE post_id = ? LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        $response = [
            'status' => 'error',
            'message' => 'Prepare failed: ' . $conn->error,
        ];
    } else {
        $stmt->bind_param('iii', $_GET['post_id'], $offset, $comments_per_page);

        if (!$stmt->execute()) {
            $response = [
                'status' => 'error',
                'message' => 'Execute failed: ' . $stmt->error,
            ];
        } else {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $check = getUsernameByUserId($row['user_id'], $conn);
                if ($check['status'] === 'success') {
                    $comments[] = [
                        'comment' => $row['comment'],
                        'username' => $check['username']
                    ];
                }
            }
            $response = [
                'status' => 'success',
                'data' => $comments,
                'message' => 'Comments fetched successfully',
                'totalPages' => $totalPages
            ];
        }
        $stmt->close();
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
