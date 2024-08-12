<?php
include('../includes/database.php');
header('Content-Type: application/json');

// Get the base URL dynamically
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']) . '/';

// Check if a file was uploaded and no error occurred
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['image'];

    // Validate the image (you can add more validation here)
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedTypes)) {
        echo json_encode(['success' => 0, 'message' => 'Invalid file type.']);
        exit;
    }

    // Generate a unique file name and save the file
    $filename = uniqid() . '-' . basename($file['name']);
    $filepath = 'images/' . $filename; // Define your upload directory

    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO media (name, path, uploaded_at) VALUES (?, ?, NOW())");

        // Bind the parameters
        $stmt->bind_param('ss', $file['name'], $filepath);

        // Execute the statement
        if ($stmt->execute()) {
            // Return the full URL to Editor.js
            echo json_encode([
                'success' => 1,
                'file' => ['url' => $baseUrl . $filepath]
            ]);
        } else {
            echo json_encode(['success' => 0, 'message' => 'Database insertion failed.']);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(['success' => 0, 'message' => 'File upload failed.']);
    }
} else {
    echo json_encode(['success' => 0, 'message' => 'No file uploaded or upload error.']);
}

// Close the database connection
$conn->close();
