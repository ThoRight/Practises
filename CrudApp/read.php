<?php
include 'database.php';

$records_per_page = 5;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

$total_sql = "SELECT COUNT(*) FROM users";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_row();
$total_records = $total_row[0];
$total_pages = ceil($total_records / $records_per_page);

$sql = "SELECT * FROM users LIMIT $start_from, $records_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Read Users</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="create.php" class="nav-link">Create User</a></li>
            <li class="nav-item"><a href="update.php" class="nav-link">Update User</a></li>
            <li class="nav-item"><a href="delete.php" class="nav-link">Delete User</a></li>
            <li class="nav-item"><a href="read.php" class="nav-link active">Display User</a></li>
        </ul>
    </header>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $currentRowNum = $start_from + 1; // Start numbering from the correct offset
                if ($result->num_rows > 0) :
                    while ($row = $result->fetch_object()) :
                ?>
                        <tr>
                            <th scope="row"><?php echo $currentRowNum; ?></th>
                            <td><?php echo htmlspecialchars($row->id); ?></td>
                            <td><?php echo htmlspecialchars($row->username); ?></td>
                            <td><?php echo htmlspecialchars($row->email); ?></td>
                            <td><?php echo htmlspecialchars($row->password); ?></td>
                        </tr>
                        <?php $currentRowNum++; ?>
                <?php
                    endwhile;
                endif;
                ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="read.php?page=<?php echo $page - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Previous">&laquo;</span>
                    </li>
                <?php endif; ?>

                <?php if ($page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="read.php?page=<?php echo $page - 1; ?>"><?php echo $page - 1; ?></a>
                    </li>
                <?php endif; ?>

                <li class="page-item active" aria-current="page">
                    <span class="page-link"><?php echo $page; ?></span>
                </li>

                <?php if ($page < $total_pages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="read.php?page=<?php echo $page + 1; ?>"><?php echo $page + 1; ?></a>
                    </li>
                <?php endif; ?>

                <?php if ($page < $total_pages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="read.php?page=<?php echo $page + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Next">&raquo;</span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>