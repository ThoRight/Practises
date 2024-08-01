<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Main Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <script src="jquery3.7.1.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <form action="create.php" method="get">
        <input type="submit" value="Create User">
    </form>
    <?php
    $status = "";
    if (isset($_GET['status'])) :
        $status = $_GET['status'];
        if ($status === 'success_create') :
    ?>
            <p>Created Account Successfully!</p>
        <?php
        elseif ($status === 'success_update') :
        ?>
            <p>Updated Account Successfully!</p>
        <?php
        elseif ($status === 'success_delete') :
        ?>
            <p>Deleted Account Successfully!</p>
        <?php
        elseif ($status === '') :
        ?>
            <p></p>
        <?php
        else :
        ?>
            <p>Unknown status: <?php echo htmlspecialchars($status); ?></p>
        <?php
        endif;
    else :
        ?>
        <p></p>
    <?php
    endif;
    ?>
    <form action="read.php" method="get">
        <input type="submit" value="Display Users">
    </form>
    <form action="update.php" method="get">
        <input type="submit" value="Update Users">
    </form>
    <form action="delete.php" method="get">
        <input type="submit" value="Delete Users">
    </form>

</body>

</html>