<?php
// The URL of the PHP script that will handle the request
$url = 'http://localhost/BlogAndCMS/api/add_comment.php'; // Replace with the actual URL of your PHP script
for ($num = 8; $num < 58; ++$num) {
    // The data to be sent in JSON format
    $data = [
        'user_id' => 1,
        'post_id' => 46,
        'comment' => "New Comment" . $num,
    ];

    // Initialize cURL
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Output the response from the server
        echo $response;
    }

    // Close cURL
    curl_close($ch);
}
