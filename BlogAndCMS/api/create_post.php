<?php
// Read the JSON input from the request
$data = file_get_contents('php://input');
$decodedData = json_decode($data, true);

// Check if decoding was successful
if ($decodedData === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
    exit;
}

// Process the data as needed (e.g., save to database)
// For demonstration, we just print it
file_put_contents('output.json', json_encode($decodedData, JSON_PRETTY_PRINT));

// Respond with success
echo json_encode(['success' => true, 'message' => 'Data received successfully']);
