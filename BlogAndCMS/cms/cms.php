<?php
include('../includes/session_management.php');
include('../config.php');
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Only admins!!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="./css/cms.css">
    <script type="text/javascript">
        const appURL = '<?php echo APP_URL; ?>';
    </script>
</head>

<body>
    <?php
    $currentPage = "cms";
    include('./navbar/navbar.php');
    ?>
    <?php
    include('./cmsCard.php');
    ?>

    <?php
    include '../public/footer/footer.php';
    ?>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/cms.js"></script>

</body>

</html>