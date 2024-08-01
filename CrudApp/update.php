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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_object()) :
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($row->id); ?></td>
                    <td><?php echo htmlspecialchars($row->username); ?></td>
                    <td><?php echo htmlspecialchars($row->email); ?></td>
                    <td><?php echo htmlspecialchars($row->password); ?></td>
                </tr>
        <?php
            endwhile;
        endif;
        ?>

        <div class="pagination">
            <?php if ($page > 1) : ?>
                <a href="read.php?page=<?php echo $page - 1; ?>">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <a href="read.php?page=<?php echo $i; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($page < $total_pages) : ?>
                <a href="read.php?page=<?php echo $page + 1; ?>">Next</a>
            <?php endif; ?>
        </div>
    </table>
    <h1>Update the user's details by id.</h1>
    <form method="POST" action="update_user.php">
        <label>Id:</label>
        <input type="number" name="id" placeholder="Enter Id">
        <label>Name: </label>
        <input type="text" name="username" placeholder="Enter Username">
        <label>Email: </label>
        <input type="email" name="email" placeholder="Enter Email">
        <label>Password: </label>
        <input type="text" name="password" placeholder="Enter Password">
        <input id="submit_button" type="submit" value="Update Account">
    </form>
    <form action="index.php">
        <input type="submit" value="Main Menu">
    </form>
</body>

</html>