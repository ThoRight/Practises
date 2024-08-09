<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Comments</h4>
            </div>
            <div class="card-body">
                <!-- Comment Form -->
                <div class="mb-4">
                    <h5>Leave a Comment</h5>
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" rows="3" placeholder="Enter your comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
                    </form>
                </div>

                <!-- Displayed Comments -->
                <div class="comment-section">
                    <div class="media mb-4">
                        <img class="mr-3 rounded-circle" src="https://via.placeholder.com/50" alt="User image">
                        <div class="media-body">
                            <h5 class="mt-0">John Doe</h5>
                            This is a comment example.
                        </div>
                    </div>
                    <div class="media mb-4">
                        <img class="mr-3 rounded-circle" src="https://via.placeholder.com/50" alt="User image">
                        <div class="media-body">
                            <h5 class="mt-0">Jane Smith</h5>
                            Another comment goes here.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>