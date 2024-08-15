<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <?php
    $currentPage = "about";
    include('./navbar/navbar.php');
    ?>

    <div class="container">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquet lorem sit amet ante dapibus, sit amet sodales urna dictum. Etiam viverra enim eget eros molestie vestibulum. Aenean lectus purus, ultricies vel neque lacinia, sollicitudin pellentesque mauris. Curabitur lacinia convallis mattis. Vestibulum non dui urna. Cras et massa porttitor, efficitur erat euismod, euismod lacus. Donec non nisl ac dolor gravida consequat. Vestibulum ultrices risus non sapien pharetra, vel ultrices diam gravida. Vestibulum egestas mauris quam. Suspendisse tempor, nulla ac aliquam suscipit, lacus odio semper tellus, ut interdum sem lacus ut elit.

            Ut non scelerisque lacus. Integer nec orci ligula. Vestibulum a sollicitudin ipsum, feugiat fermentum risus. Nullam pharetra blandit turpis a faucibus. Cras vel luctus diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin finibus volutpat sapien, in rutrum dui iaculis non. Duis rutrum egestas felis vel consectetur. Duis faucibus lacus non sem dictum fermentum. Morbi eu neque nisi. Sed purus urna, ultricies a tincidunt et, mollis a libero.</p>
    </div>

    <?php
    include('./footer/footer.php');
    ?>
    <script src="./js/jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/about.js"></script>
</body>

</html>