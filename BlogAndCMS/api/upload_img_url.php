<?php
include('../includes/database.php');
header('Content-Type: application/json');

if (isset($_POST['url'])) {
    $imageUrl = $_POST['url'];

    // Validate the URL
    if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
        echo json_encode(['success' => 0, 'message' => 'Invalid URL.']);
        exit;
    }

    // Get the file content
    $imageContent = file_get_contents($imageUrl);
    if ($imageContent === false) {
        echo json_encode(['success' => 0, 'message' => 'Failed to fetch the image.']);
        exit;
    }

    // Get the file type and generate a unique name
    $fileInfo = pathinfo($imageUrl);
    $filename = uniqid() . '-' . basename($fileInfo['basename']);
    $filepath = 'images/' . $filename; // Define your upload directory

    // Save the image file to the server
    if (file_put_contents($filepath, $imageContent)) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO media (name, path, uploaded_at) VALUES (?, ?, NOW())");

        // Check if prepare() succeeded
        if ($stmt === false) {
            echo json_encode(['success' => 0, 'message' => 'Failed to prepare the statement.']);
            exit;
        }

        // Bind the parameters
        $stmt->bind_param('ss', $fileInfo['basename'], $filepath);

        // Execute the statement
        if ($stmt->execute()) {
            // Return the file URL to Editor.js
            echo json_encode([
                'success' => 1,
                'file' => ['url' => $filepath]
            ]);
        } else {
            echo json_encode(['success' => 0, 'message' => 'Failed to insert into the database.']);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(['success' => 0, 'message' => 'Failed to save the image.']);
    }
} else {
    echo json_encode(['success' => 0, 'message' => 'No URL provided.']);
}
