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
    <div class="col-md-4">
        <div class="card mb-3" data-post-id="${post.post_id}" style="background-image: url('http://localhost/BlogAndCMS/public/images/blog.png'); position: relative;">
            <!-- Header with title and metadata -->
            <div class="card-header d-flex justify-content-between align-items-center p-2 bg-transparent border-0 position-relative">
                <!-- Metadata and user info -->
                <div class="d-flex align-items-center">
                    <div class="me-2">
                        <span class="fw-bold text-light">${post.title}</span>
                    </div>
                    <div class="text-muted small">
                        <span class="d-block">${post.user_name}</span>
                        <span class="d-block">${post.date}</span>
                        <span class="d-block">${post.read_time}</span>
                    </div>
                </div>
                <!-- More actions button -->
                <button class="btn btn-outline-light btn-sm" type="button" aria-label="More actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img" class="bi bi-three-dots">
                        <path d="M2.5 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zM9.5 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0zM16.5 9.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z" />
                    </svg>
                </button>
            </div>
            <!-- Card body -->
            <div class="card-body bg-transparent">
                <!-- Additional content goes here -->
            </div>
            <!-- Card footer -->
            <div class="card-footer bg-transparent text-muted">${post.footer}</div>
        </div>
    </div>


    <script src="jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>