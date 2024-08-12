<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        /* Additional CSS specific to the post section */
        .post-section {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }

        .post-section h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }

        .post-image-preview {
            width: 100%;
            height: auto;
            margin-top: 15px;
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="post-section">
            <h2>Create a New Post</h2>
            <form id="post-form">
                <div class="form-group">
                    <label for="post-title">Post Title</label>
                    <input type="text" class="form-control" id="post-title" placeholder="Enter post title">
                </div>
                <div class="form-group">
                    <label for="post-content">Post Content</label>
                    <textarea class="form-control" id="post-content" rows="5" placeholder="Enter post content"></textarea>
                </div>
                <div class="form-group">
                    <label for="post-image">Upload Image</label>
                    <input type="file" class="form-control-file" id="post-image" accept="image/*">
                    <img id="post-image-preview" class="post-image-preview" src="#" alt="Image Preview">
                </div>
                <button type="submit" class="btn btn-primary">Submit Post</button>
            </form>
        </div>
    </div>

    <script src="jquery3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="post_section.js"></script>
</body>

</html>