<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['theme'])) {
    $theme = $_POST['theme'];
    setcookie('theme', $theme, time() + 120, '/'); // for 2 minutes
    header("Location: index.php");
    exit();
}
else {
    header("Location: index.php");
    exit();
}
?>
