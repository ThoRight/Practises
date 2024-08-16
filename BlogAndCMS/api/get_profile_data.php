<?php
include('../includes/database.php');
include('../includes/validation.php');
include('../includes/utils.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 1;

    $sql = "SELECT * FROM users where user_id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $response = [
            'status' => 'error',
            'message' => 'Prepare failed: ' . $conn->error,
        ];
    } else {
        $stmt->bind_param('i', $user_id);

        if (!$stmt->execute()) {
            $response = [
                'status' => 'error',
                'message' => 'Execute failed: ' . $stmt->error,
            ];
        } else {
            $result = $stmt->get_result();
            $user;
            while ($row = $result->fetch_assoc()) {
                $user = $row;
            }
            //$res_inc_view_count = inc_view_count($post, $conn);
            $response = [
                'status' => 'success',
                'data' => $user,
                'message' => 'User Proifile fetched successfully',
                //'response_increment_view_count' => $res_inc_view_count
            ];
        }
        $stmt->close();
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
