<?php
$nameErr = $emailErr = $ageErr = "";
$name = $email = $age = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z'-]*$/", $name)) {
            $nameErr = "Only letters and must be non-empty for name";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate age
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = test_input($_POST["age"]);
        if (!filter_var($age, FILTER_VALIDATE_INT) || $age <= 0) {
            $ageErr = "Age must be a positive integer";
        }
    }

    // Check if there are no errors
    if (empty($nameErr) && empty($emailErr) && empty($ageErr)) {
        echo "<h2>Successful Submission:</h2>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Age: $age<br>";
    } else {
        // Display error messages
        echo "<h2>Error:</h2>";
        echo $nameErr . "<br>";
        echo $emailErr . "<br>";
        echo $ageErr . "<br>";
    }
}
