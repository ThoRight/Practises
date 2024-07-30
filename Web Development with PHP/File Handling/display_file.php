<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileName = $_POST['fileName'];
    
    $fileName = htmlspecialchars($fileName);
    
    if(file_exists($fileName)){
        $fileContent = file_get_contents($fileName);
        echo "Content of $fileName: " . "$fileContent";
    } 
    else{
        echo "Error: File '$fileName' doesn't exist.";
    }
}
?>
<form action="index.php" method="get">
    <input type="submit" value="Go to main page">
</form>
