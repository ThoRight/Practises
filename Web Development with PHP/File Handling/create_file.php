<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileName = $_POST['fileName'];
    $content = $_POST['content'];
    
    $fileName = htmlspecialchars($fileName);
    $content = htmlspecialchars($content);
    
    if(file_exists($fileName)){
        echo "Error: File '$fileName' already exists.";
    } 
    else{
        file_put_contents($fileName, $content);    
        echo "File '$fileName' created successfully with the provided content.";
    }
}
?>
<form action="index.php" method="get">
    <input type="submit" value="Go to main page">
</form>
