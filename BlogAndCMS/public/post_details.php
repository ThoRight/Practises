<?php
include('../config.php');
include('../includes/session_management.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$userId = $_SESSION['user_id'];
$userName = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Details</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/post_details.css">

    <script type="text/javascript">
        // Pass PHP variables to JavaScript
        const userId = <?php echo json_encode($userId); ?>;
        const userName = <?php echo json_encode($userName); ?>;
        const appURL = '<?php echo APP_URL; ?>';
        // Now variable1 and variable2 can be used in your JavaScript
        console.log(userId); // Output: 3
        console.log(userName); // Output: 4
    </script>
</head>

<body>
    <?php
    $currentPage = 'posts';
    include './navbar/navbar.php';
    ?>
    <div class="container mt-5">
        <div class="post-container">
            <h1 class="post-title" id="post-title">Loading...</h1>
            <div class="post-content" id="post-content">
                <div id="editor-display"></div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Comments</h4>
            </div>
            <div class="card-body">
                <!-- Comment Form -->
                <div class="mb-4">
                    <h5>Leave a Comment</h5>
                    <form id="comment-form">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment-content" rows="3" placeholder="Enter your comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
                    </form>
                </div>

                <!-- Displayed Comments -->
                <div class="comment-section" id="comments-list">

                </div>
                <div class="container mt-5">
                    <div id="comments" class="row"></div>
                    <nav>
                        <ul class="pagination justify-content-center mt-4" id="pagination">
                            <!-- Pagination buttons will be dynamically added here -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './footer/footer.php';
    ?>

    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="./js/post_details.js"></script>
</body>

</html>