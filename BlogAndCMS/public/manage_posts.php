<?php
include('../includes/session_management.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Only admins can manage posts...");
}
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
    <link rel="stylesheet" href="./css/category.css"> <!-- Link to custom CSS -->
    <style>
        /* Additional CSS for new elements */
        .cms-container {
            padding: 2rem;
            background-color: #f8f9fa;
        }

        .cms-card {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .cms-card-header {
            background-color: #343a40;
            color: #fff;
            padding: 1rem;
            border-radius: 8px 8px 0 0;
        }

        .cms-card-body {
            padding: 1.5rem;
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>

<body>
    <header class="d-flex justify-content-between align-items-center py-3">
        <!-- Left Side - Navigation Links -->
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="posts.php" class="nav-link">Posts</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="create_post.php" class="nav-link">Add Post</a></li>
            <li class="nav-item"><a href="manage_posts.php" class="nav-link active">Manage Posts</a></li>
        </ul>

        <!-- Center - Image or Text -->
        <div class="navbar-center">
            <img src="http://localhost/BlogAndCMS/public/images/blog.png" alt="Center Image" class="navbar-center-image">
            <!-- or use text -->
            <!-- <span class="navbar-center-text">Your Text Here</span> -->
        </div>

        <!-- Right Side - Profile Dropdown -->
        <div class="dropdown profile-dropdown">
            <a href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="http://localhost/BlogAndCMS/public/images/profile_img.jpg" class="rounded-circle" width="40" height="40" alt="Profile Picture">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <!-- Categories Section -->
    <div class="container mt-5">
        <ul class="list-inline categories-list" id="categories-list">
            <!-- lists from database -->
        </ul>
        <hr> <!-- Horizontal line to separate categories from posts -->
    </div>

    <!-- Posts Section -->
    <div class="container cms-container">
        <div class="card cms-card">
            <div class="card-header cms-card-header">
                <h2>Manage Posts</h2>
            </div>
            <div id="posts" class="cms-card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Views</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Sample Post 1</td>
                            <td>Technology</td>
                            <td>2024-08-01</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav>
                <ul class="pagination justify-content-center mt-4" id="pagination">
                    <!-- Pagination buttons will be dynamically added here -->
                </ul>
            </nav>
        </div>
    </div>

    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/manage_posts.js"></script>
</body>

</html>