<?php
include('../config.php');
session_start();
$userId = isset($_GET['user_id']) ? intval($_GET['user_id']) : 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/profile.css">
    <script type="text/javascript">
        const appURL = '<?php echo APP_URL; ?>';
        const userId = <?php echo json_encode($userId); ?>;
    </script>
</head>

<body>
    <?php
    include('./navbar/navbar.php');
    ?>
    <div class="container">
        <div class="profile-header">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture">
            <div class="profile-info">
                <h3 id="profile-fullname"></h3>
                <p id="profile-username"></p>
            </div>
        </div>

        <div class="profile-details">
            <div class="row">
                <div class="col-md-6">
                    <h5>Personal Information</h5>
                    <p><strong>Email:</strong> <span id="profile-email"></span></p>
                    <p><strong>Role:</strong> <span id="profile-role"></span></p>
                    <p><strong>Location:</strong> <span id="profile-city"></span></p>
                    <p><strong>Joined Date:</strong> <span id="profile-created_at"></span></p>
                </div>
                <div class="col-md-6">
                    <h5>About Me</h5>
                    <p id="profile-about"></p>
                </div>

            </div>
        </div>
        <div class="profile-details">
            <h5>Recent Activities</h5>
            <ul>
                <li>Posted a new blog article on <a href="#">How to learn Bootstrap</a></li>
                <li>Commented on a blog post <a href="#">"The Future of Web Development"</a></li>
                <li>Joined the group <a href="#">Web Developers Network</a></li>
            </ul>
        </div>
        <div class="text-center mt-4">
            <a href="edit-profile.php" class="btn btn-edit">Edit Profile</a>
        </div>
    </div>

    <?php
    include('./footer/footer.php');
    ?>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/profile.js"></script>
</body>

</html>