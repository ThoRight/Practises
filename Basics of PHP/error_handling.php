<?php
$filename = "nonExistingFile.txt";
try {
    $file = fopen($filename, "r");
    if (!$file) {
        throw new Exception("File could not be opened: $filename");
    }
    $content = fread($file, filesize($filename));
    echo "File Content: ";
    echo "$content";
    echo "\n";
    fclose($file);
} catch (Exception $e) {
    echo "Exception Error: " . $e->getMessage() . "\n";
}

?>
