<?php
include('../config.php');
include('../includes/session_management.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$currentPage = 'posts';
include './navbar/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/category.css"> <!-- Link to custom CSS -->
</head>

<body>

    <!-- Categories Section -->
    <div class="container mt-5">
        <ul class="list-inline categories-list" id="categories-list">
            <!-- lists from database -->
        </ul>
        <hr> <!-- Horizontal line to separate categories from posts -->
    </div>
    <div class="container mt-5">
        <h2>Search Posts</h2>
        <input type="text" id="search-input" class="form-control" placeholder="Search for posts by title...">
        <div id="search-results" class="search-results mt-3">
            <!-- Search results will be displayed here -->
        </div>
    </div>
    <div class="container mt-3">
        <select id="criteriaDropdown" class="form-select form-select-lg">
            <option value="created_at">Sort By</option>
            <option value="title">Title</option>
            <option value="view_count">View</option>
            <option value="created_at">Date</option>
        </select>
    </div>
    <div class="container mt-3">
        <select id="orderDropdown" class="form-select form-select-lg">
            <option value="asc">Order</option>
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>
    </div>

    <!-- Posts Section -->
    <div class="container mt-5">
        <div id="posts" class="row"></div>
        <nav>
            <ul class="pagination justify-content-center mt-4" id="pagination">
                <!-- Pagination buttons will be dynamically added here -->
            </ul>
        </nav>
    </div>

    <div class="alert alert-success font-weight-bold" role="alert">
        You logged in successfully. This is main page
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
    <?php
    include './footer/footer.php';
    ?>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/home.js"></script>
</body>

</html>