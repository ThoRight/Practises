<?php
include('validation.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Main Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="jquery3.7.1.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="create.php" class="nav-link">Create User</a></li>
            <li class="nav-item"><a href="update.php" class="nav-link">Update User</a></li>
            <li class="nav-item"><a href="delete.php" class="nav-link">Delete User</a></li>
            <li class="nav-item"><a href="read.php" class="nav-link">Display User</a></li>
        </ul>
    </header>
    <form action="create.php" method="get">
    </form>
    <?php
    $status = "";
    if (isset($_GET['status'])) :
        $status = $_GET['status'];
        if ($status === 'success_create') :
    ?>
            <div class="alert alert-success font-weight-bold" role="alert">
                Account has been created.
            </div>
        <?php
        elseif ($status === 'success_update') :
        ?>
            <div class="alert alert-success font-weight-bold" role="alert">
                Account has been updated.
            </div>
        <?php
        elseif ($status === 'success_delete') :
        ?>
            <div class="alert alert-success font-weight-bold" role="alert">
                Account has been deleted.
            </div>
        <?php
        elseif ($status === 'error') :
        ?>
            <?php $errorStr = isset($_GET['errorStr']) ? htmlspecialchars(urldecode($_GET['errorStr']), ENT_QUOTES, 'UTF-8') : 'gg'; ?>
            <div class="alert alert-danger font-weight-bold" role="alert">
                Error!! <?php echo $errorStr ?>
            </div>
        <?php
        elseif ($status === '') :
        ?>
            <p></p>
        <?php
        else :
        ?>
            <p class="font-weight-bold">Unknown status: <?php echo htmlspecialchars($status); ?></p>
        <?php
        endif;
    else :
        ?>
        <p></p>
    <?php
    endif;
    ?>
    <form action="read.php" method="get">
    </form>
    <form action="update.php" method="get">
    </form>
    <form action="delete.php" method="get">
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>