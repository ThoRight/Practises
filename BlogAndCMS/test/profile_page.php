<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS for profile page */
        .profile-container {
            margin-top: 50px;
        }

        .profile-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header img {
            border-radius: 50%;
            border: 5px solid #007bff;
        }

        .profile-details {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-details h2 {
            margin-top: 0;
        }

        .profile-details .list-group-item {
            border: none;
        }

        .btn-edit {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-edit:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container profile-container">
        <div class="profile-header">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" width="150" height="150">
            <h1>John Doe</h1>
            <p class="text-muted">Web Developer at Company</p>
        </div>

        <div class="profile-details">
            <h2>Profile Details</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Email:</strong> john.doe@example.com</li>
                <li class="list-group-item"><strong>Phone:</strong> (123) 456-7890</li>
                <li class="list-group-item"><strong>Location:</strong> New York, USA</li>
                <li class="list-group-item"><strong>Bio:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel urna eu dolor euismod consequat.</li>
            </ul>
        </div>

        <div class="text-center mt-4">
            <a href="edit-profile.html" class="btn btn-edit">Edit Profile</a>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>