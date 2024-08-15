<?php
include('../includes/session_management.php');
if (isset($_SESSION['username'])) {
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
        </ul>
    </header>
    <form action="register.php" method="get"></form>
    <form action="login.php" method="get"></form>

    <?php
    $status = "";
    if (isset($_GET['status'])) :
        $status = $_GET['status'];
        if ($status === 'success_create') :
    ?>
            <div class="alert alert-success font-weight-bold" role="alert">
                You registered successfully. Go to main page or login page: <a href="index.php" class="btn btn-primary">Main Page</a> <a href="login.php" class="btn btn-primary">Login Page</a>
            </div>
        <?php
        elseif ($status === 'error') :
        ?>
            <?php $errorStr = isset($_GET['errorStr']) ? htmlspecialchars(urldecode($_GET['errorStr']), ENT_QUOTES, 'UTF-8') : 'gg'; ?>
            <div class="alert alert-danger font-weight-bold" role="alert">
                Error!! <?php echo $errorStr ?> Go to main page: <a href="index.php" class="btn btn-primary">Main Page</a>
            </div>
        <?php
        elseif ($status === '') :
        ?>
            <p></p>
        <?php
        else :
        ?>
            <p class="font-weight-bold">Unknown status: <?php echo htmlspecialchars($status); ?> Go to main page: <a href="index.php" class="btn btn-primary">Main Page</a></p>
        <?php
        endif;
    else :
        ?>
        <p></p>
    <?php
    endif;
    ?>
    <?php
    include './footer/footer.php';
    ?>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>