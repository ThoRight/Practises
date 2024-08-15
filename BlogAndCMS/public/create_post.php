<?php
include('../includes/session_management.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Only admins can add post.");
}

$userId = $_SESSION['user_id'];
$currentPage = 'create_post';
include './navbar/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/create_post.css">
    <script type="text/javascript">
        const userId = <?php echo json_encode($userId); ?>;
    </script>
</head>

<body>

    <div class="container mt-5">
        <div class="post-section">
            <h2>Create a New Post</h2>
            <input type="text" class="form-control" id="post-title" placeholder="Enter the post title" required>
            <div id="editor"></div>
            <div class="form-group">
                <label for="category-select" class="form-label">Choose Categories</label>
                <select id="category-select" class="form-select" multiple>

                </select>
            </div>
            <button id="submit-button">Submit</button>
        </div>
    </div>
    <?php
    include './footer/footer.php';
    ?>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Include Editor.js -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    <!-- Include Header Tool -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>

    <!-- Include Image Tool -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>

    <!-- Include List Tool -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>

    <!-- Include Paragraph Tool -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>

    <!-- Include Embed Tool -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
    <script src="./js/create_post.js"></script>
    <script src="./js/editorjs.js"></script>

</body>

</html>