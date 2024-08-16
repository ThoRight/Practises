<?php
include('../config.php');
include('../includes/session_management.php');
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Only admins can manage posts...");
}
$currentPage = 'manage_posts';
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
    <script type="text/javascript">
        const appURL = '<?php echo APP_URL; ?>';
    </script>
</head>

<body>

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
    <?php
    include './footer/footer.php';
    ?>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/manage_posts.js"></script>
</body>

</html>