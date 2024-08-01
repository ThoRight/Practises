<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "web_dev_crud";

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("SQL Connection Error: " . $conn->connect_error);
}
