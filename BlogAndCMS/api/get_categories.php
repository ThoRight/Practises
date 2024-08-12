<?php
include('../includes/database.php');
include('../includes/validation.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $response = [
            'status' => 'error',
            'message' => 'Prepare failed: ' . $conn->error,
        ];
    } else {
        if (!$stmt->execute()) {
            $response = [
                'status' => 'error',
                'message' => 'Execute failed: ' . $stmt->error,
            ];
        } else {
            $result = $stmt->get_result();
            $categories = [];
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
                $count++;
            }
            $response = [
                'status' => 'success',
                'data' => $categories,
                'message' => 'Categories fetched successfully',
            ];
        }
        $stmt->close();
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
