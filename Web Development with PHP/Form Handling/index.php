<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Validation</title>
  </head>
  <body>
    <h2>FORM VALIDATION</h2>
    <form method="post" action="process_form.php">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label>Age:</label>
        <input type="number" name="age" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
  </body>
</html>