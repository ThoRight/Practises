<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional CSS for new elements */
        .cms-container {
            padding: 2rem;
            background-color: #f8f9fa;
        }

        .cms-card {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .cms-card-header {
            background-color: #343a40;
            color: #fff;
            padding: 1rem;
            border-radius: 8px 8px 0 0;
        }

        .cms-card-body {
            padding: 1.5rem;
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container cms-container">
        <h1 class="text-center mb-4">Blog Content Management System</h1>

        <!-- Add New Post -->
        <div class="card cms-card">
            <div class="card-header cms-card-header">
                <h2>Add New Post</h2>
            </div>
            <div class="card-body cms-card-body">
                <form>
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Post Title</label>
                        <input type="text" class="form-control" id="postTitle" placeholder="Enter post title">
                    </div>
                    <div class="mb-3">
                        <label for="postCategory" class="form-label">Category</label>
                        <select class="form-select" id="postCategory">
                            <option value="1">Technology</option>
                            <option value="2">Lifestyle</option>
                            <option value="3">Education</option>
                            <option value="4">Health</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="postContent" class="form-label">Post Content</label>
                        <textarea class="form-control" id="postContent" rows="6" placeholder="Write your post content here..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="postImage" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="postImage">
                    </div>
                    <button type="submit" class="btn btn-custom">Add Post</button>
                </form>
            </div>
        </div>

        <!-- Manage Existing Posts -->
        <div class="card cms-card">
            <div class="card-header cms-card-header">
                <h2>Manage Posts</h2>
            </div>
            <div class="card-body cms-card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Sample Post 1</td>
                            <td>Technology</td>
                            <td>2024-08-01</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Sample Post 2</td>
                            <td>Lifestyle</td>
                            <td>2024-08-05</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>