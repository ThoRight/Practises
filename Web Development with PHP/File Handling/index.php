<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Handling</title>
  </head>
  <body>
    <form method="post" action="create_file.php">
        <label for="fileName">File Name:</label>
        <input type="text" id="fileName" name="fileName" required>
        <label for="fileName">Content:</label>
        <input type="text area" id="content" name="content" required>
        <input type="submit" value="Create File">
    </form>
    <form method="post" action="append_file.php">
        <label for="fileName">File Name:</label>
        <input type="text" id="fileName" name="fileName" required>
        <label for="content">Content:</label>
        <input type="text area" id="content" name="content" required>
        <input type="submit" value="Append File">
    </form>
    <form method="post" action="display_file.php">
        <label for="fileName">File Name:</label>
        <input type="text" id="fileName" name="fileName" required>
        <input type="submit" value="Display File">
    </form>
  </body>
</html>