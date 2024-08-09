$(document).ready(function () {
    // Function to get query parameters from the URL
    function getQueryParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Get post_id from URL
    const postId = getQueryParameter('post_id');

    if (postId) {
        fetchPost(postId);
        fetchComments(postId);
    } else {
        $('#post-title').text('ERROR!');
        $('#post-content').html('<p>No Post Here...</p>');
    }

    // Function to fetch post details
    function fetchPost(postId) {
        $.ajax({
            url: 'http://localhost/BlogAndCMS/api/get_post_detail.php',
            method: 'GET',
            data: { post_id: postId },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    $('#post-title').text(response.data.title);
                    $('#post-content').html(response.data.content);
                } else {
                    $('#post-title').text('Post Not Found');
                    $('#post-content').html('<p>The post you are looking for does not exist.</p>');
                }
            },
            error: function () {
                $('#post-title').text('Error');
                $('#post-content').html('<p>An error occurred while fetching the post.</p>');
            }
        });
    }

    // Function to fetch comments
    function fetchComments(postId) {
        $.ajax({
            url: 'http://localhost/BlogAndCMS/api/get_comments.php',
            method: 'GET',
            data: { post_id: postId },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    $('#comments-list').empty();
                    response.data.forEach(comment => {
                        $('#comments-list').append(`
                            <div class="comment card p-3 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">${comment.username}</h5>
                                    <p class="card-text">${comment.comment}</p>
                                </div>
                            </div>
                        `);
                    });
                } else {
                    $('#comments-list').html('<p>No comments available.</p>');
                }
            },
            error: function () {
                $('#comments-list').html('<p>An error occurred while fetching comments.</p>');
            }
        });
    }

    // Handle form submission
    $('#comment-form').on('submit', function (e) {

        e.preventDefault();
        const commentContent = $('#comment-content').val();
        console.log("Comment" + commentContent);
        console.log("userId: " + userId);
        console.log("postId: " + postId);
        $.ajax({
            url: 'http://localhost/BlogAndCMS/api/add_comment.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                user_id: userId,
                post_id: postId,
                comment: commentContent
            }),
            success: function (response) {
                if (response.status === 'success') {
                    $('#comment-content').val('');
                    fetchComments(postId);
                    // Update the URL with the current post_id (if needed)
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('post_id', postId);
                    const newUrl = `${window.location.pathname}?${urlParams.toString()}`;
                    window.history.pushState({ path: newUrl }, '', newUrl);
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                //alert('An error occurred while adding the comment.');
            }
        });
    });
});
