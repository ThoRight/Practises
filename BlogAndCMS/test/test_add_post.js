$(document).ready(function () {
    $.ajax({
        url: 'https://jsonplaceholder.typicode.com/posts',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log("GET SUCCESS");

            // Check if response is an array and has at least one post
            if (Array.isArray(response) && response.length > 0) {
                for (let i = 0; i < response.length; ++i) {
                    let firstPostBody = response[i].body;  // Get the body of the first post

                    $.ajax({
                        url: 'http://localhost/BlogAndCMS/api/add_post.php',
                        method: 'POST',
                        data: JSON.stringify({
                            'user_id': 1,
                            'title': 'TITLE POST',
                            'content': firstPostBody,  // Use the body from the first post
                            'category_id': 2
                        }),
                        contentType: 'application/json',  // Specify content type
                        dataType: 'json',
                        success: function () {
                            console.log("POST SUCCESS");
                        },
                        error: function () {
                            console.log("POST ERROR");
                        }
                    });
                }
            } else {
                console.log("No posts available in GET response.");
            }
        },
        error: function () {
            console.log("GET ERROR");
        }
    });
});
