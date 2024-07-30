<?php
session_start();
$_SESSION['name'] = 'No name found in session.';
header("Location: index.php");
exit();
?>
