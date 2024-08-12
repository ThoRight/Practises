$(document).ready(function () {

    const commentsPerPage = 5; // Number of cards per page
    let totalPages = 1;
    let currentPage = getPageFromURL() || 1; // Get page from URL or default to 1
    // Function to get query parameters from the URL
    function getQueryParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Get post_id from URL
    const postId = getQueryParameter('post_id');
    currentPage = getQueryParameter('page') || 1; // Ensure currentPage is set
    console.log("current Page: " + currentPage);
    if (postId) {
        fetchPost(postId);
        fetchComments(currentPage, postId);
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
    /*
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
    
                                <div class="media mb-4">
                                    <div class="media-body">
                                    <img class="mr-3 rounded-circle" src="https://via.placeholder.com/50" alt="User image">
                                        <h5 class="mt-0">${comment.username}</h5>
                                        ${comment.comment}
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
    */
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
                    fetchComments(currentPage, postId);
                    // Update the URL with the current post_id (if needed)
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('post_id', postId);
                    urlParams.set('page', currentPage);
                    const newUrl = `${window.location.pathname}?${urlParams.toString()}`;
                    window.history.pushState({ path: newUrl }, '', newUrl);

                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('An error occurred while adding the comment.');
            }
        });
    });

    function getPageFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        return parseInt(urlParams.get('page'), 1);
    }

    function fetchComments(page, postId) {

        console.log('Fetching Page: ' + page + "  ->" + postId);
        $.ajax({
            url: 'http://localhost/BlogAndCMS/api/get_comments.php',
            method: 'GET',
            dataType: 'json',
            data: {
                'page': page,
                'post_id': postId
            },
            success: function (response) {
                if (response.status === 'success') {
                    if (response.data.length === 0) {
                        $('#comments-list').append(`
                            <div class="media mb-4">
                                <div class="media-body">
                                    No Comments Available
                                </div>
                            </div>
                        `);
                    }
                    // Update posts
                    $('#comments-list').empty();
                    response.data.forEach(comment => {

                        $('#comments-list').append(`
                            <div class="media mb-4">
                                <div class="media-body">
                                <img class="mr-3 rounded-circle" src="https://via.placeholder.com/50" alt="User image">
                                <h5 class="mt-0">${comment.username}</h5>
                                    ${comment.comment}
                                </div>
                            </div>
                        `);
                    });
                } else {
                    alert("error: " + response.message);
                }

                // Update pagination
                currentPage = page;
                totalPages = response.totalPages;
                updatePagination();
            },
            error: function (response) {
                alert('Errorrr ' + response.message);
            }
        });
    }

    function updatePagination() {
        $('#pagination').empty();

        // Define the range of page numbers to show
        const pageRange = 2; // Number of page buttons to show before and after the current page

        // Calculate the start and end page numbers
        const startPage = Math.max(1, currentPage - pageRange);
        const endPage = Math.min(totalPages, currentPage + pageRange);

        // Previous Page Link
        if (currentPage > 1) {
            $('#pagination').append(`
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" data-page="${currentPage - 1}">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            `);
        } else {
            $('#pagination').append(`
                <li class="page-item disabled">
                    <span class="page-link" aria-label="Previous">&laquo;</span>
                </li>
            `);
        }

        // First Page Link
        if (startPage > 1) {
            $('#pagination').append(`
                <li class="page-item">
                    <a class="page-link" href="#" data-page="1">1</a>
                </li>
            `);

            if (startPage > 2) {
                $('#pagination').append(`
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                `);
            }
        }

        // Page Number Links
        for (let page = startPage; page <= endPage; page++) {
            $('#pagination').append(`
                <li class="page-item ${page === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${page}">${page}</a>
                </li>
            `);
        }

        // Last Page Link
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                $('#pagination').append(`
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                `);
            }
            $('#pagination').append(`
                <li class="page-item">
                    <a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>
                </li>
            `);
        }

        // Next Page Link
        if (currentPage < totalPages) {
            $('#pagination').append(`
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next" data-page="${currentPage + 1}">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            `);
        } else {
            $('#pagination').append(`
                <li class="page-item disabled">
                    <span class="page-link" aria-label="Next">&raquo;</span>
                </li>
            `);
        }
    }

    // Handle pagination click
    $('#pagination').on('click', '.page-link', function (e) {
        e.preventDefault();
        const page = $(this).data('page');
        if (page) {
            fetchComments(page, postId);
            // Update URL to reflect the current page
            window.history.pushState(null, '', `?post_id=${postId}&page=${page}`);
        }
    });

    // Handle browser navigation (e.g., back/forward buttons)
    window.onpopstate = function (event) {
        const page = getPageFromURL();
        if (page) {
            fetchComments(page, postId);
        }
    };







    // Initial fetch
    fetchComments(currentPage, postId);
    
});






