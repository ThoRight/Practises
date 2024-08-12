<?php
include('../includes/database.php');
include('../includes/validation.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $response = [];
    if (!isset($data['user_id']) || !isset($data['title']) || !isset($data['category_id']) || !isset($data['content'])) {
        $response = [
            'status' => 'error',
            'message' => 'Missing required fields',
        ];
    } else {
        // Check if user exists
        $user_check = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_id = ?");
        $user_check->bind_param('i', $data['user_id']);
        $user_check->execute();
        $user_check->bind_result($user_exists);
        $user_check->fetch();
        $user_check->close();

        // Check if category exists
        $category_check = $conn->prepare("SELECT COUNT(*) FROM categories WHERE category_id = ?");
        $category_check->bind_param('i', $data['category_id']);
        $category_check->execute();
        $category_check->bind_result($category_exists);
        $category_check->fetch();
        $category_check->close();

        if ($user_exists == 0) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid user_id',
            ];
        } elseif ($category_exists == 0) {
            $response = [
                'status' => 'error',
                'message' => 'Invalid category_id',
            ];
        } else {
            // Prepare and execute insert statement
            $sql = "INSERT INTO posts (user_id, title, category_id, content, created_at) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                $response = [
                    'status' => 'error',
                    'message' => 'Prepare failed: ' . $conn->error,
                ];
            } else {
                $content = json_encode($data['content']);
                $default_category_id = 1;
                $stmt->bind_param('isis', $data['user_id'], $data['title'], $default_category_id, $data['content']);

                if (!$stmt->execute()) {
                    $response = [
                        'status' => 'error',
                        'message' => 'Execute failed: ' . $stmt->error,
                    ];
                } else {
                    // Get the ID of the newly inserted post
                    $post_id = $stmt->insert_id;

                    // Prepare and execute insert statements for post_categories
                    $category_sql = "INSERT INTO post_categories (post_id, category_id) VALUES (?, ?)";
                    $category_stmt = $conn->prepare($category_sql);

                    if ($category_stmt === false) {
                        $response = [
                            'status' => 'error',
                            'message' => 'Prepare failed: ' . $conn->error,
                        ];
                    } else {
                        // Traverse each category_id and insert it into post_categories
                        if (is_array($data['selected_categories'])) {
                            foreach ($data['selected_categories'] as $category_id) {
                                $category_stmt->bind_param('ii', $post_id, $category_id);

                                if (!$category_stmt->execute()) {
                                    $response = [
                                        'status' => 'error',
                                        'message' => 'Execute failed for category insertion: ' . $category_stmt->error,
                                    ];
                                    break;
                                }
                            }
                        }
                        $category_stmt->close();
                        $response = [
                            'status' => 'success',
                            'message' => 'Post added successfully',
                            'post_id' => $post_id
                        ];
                    }
                }

                $stmt->close();
            }
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
