<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select2 Example</title>
    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
    <style>
        /* Optional: styling for better appearance */
        .container {
            width: 300px;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Select2 Example</h2>
        <label for="example-select">Choose an option:</label>
        <select id="example-select" class="form-control" style="width: 100%;">
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
            <option value="4">Option 4</option>
        </select>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize Select2 on the select element
            $('#example-select').select2({
                placeholder: "Select an option",
                allowClear: true
            });
        });
    </script>
</body>

</html>