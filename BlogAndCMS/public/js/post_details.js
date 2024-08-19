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
        fetchPost(postId, appURL);
        fetchComments(currentPage, postId, appURL);
    } else {
        $('#post-title').text('ERROR!');
        $('#post-content').html('<p>No Post Here...</p>');
    }

    function renderEditorContent(editorData) {
        // Empty the container where the content will be rendered
        $('#editor-display').empty();

        // Iterate through each block in the Editor.js JSON data
        editorData.blocks.forEach(block => {
            switch (block.type) {
                case 'header':
                    $('#editor-display').append(`<h${block.data.level}>${block.data.text}</h${block.data.level}>`);
                    break;

                case 'paragraph':
                    $('#editor-display').append(`<p>${block.data.text}</p>`);
                    break;

                case 'image':
                    let imageHtml = `<img src="${block.data.file.url}" alt="${block.data.caption}"`;
                    if (block.data.stretched) imageHtml += ' class="img-fluid"';
                    if (block.data.withBorder) imageHtml += ' style="border: 1px solid #000;"';
                    if (block.data.withBackground) imageHtml += ' style="background: #f5f5f5;"';
                    imageHtml += '>';

                    $('#editor-display').append(`<figure>${imageHtml}<figcaption>${block.data.caption}</figcaption></figure>`);
                    break;

                case 'list':
                    let listTag = block.data.style === 'ordered' ? 'ol' : 'ul';
                    let listItems = block.data.items.map(item => `<li>${item}</li>`).join('');
                    $('#editor-display').append(`<${listTag}>${listItems}</${listTag}>`);
                    break;

                // Add cases for other block types (e.g., embed, quote) if needed

                default:
                    console.warn('Unknown block type', block.type);
                    break;
            }
        });
    }


    // Function to fetch post details
    function fetchPost(postId, appURL) {
        $.ajax({
            url: appURL + 'api/get_post_detail.php',
            method: 'GET',
            data: { post_id: postId },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    $('#post-title').text(response.data.title);
                    //editor.render(JSON.parse(response.data.content));
                    // Render the content
                    let editorData = JSON.parse(response.data.content);
                    renderEditorContent(editorData);
                    //$('#post-content').html(response.data.content);
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
    // Handle form submission
    $('#comment-form').on('submit', function (e) {
        e.preventDefault();
        if (userId < 1) {
            alert('Login to comment!!');
        }
        else {
            const commentContent = $('#comment-content').val();
            console.log("Comment" + commentContent);
            console.log("userId: " + userId);
            console.log("postId: " + postId);
            $.ajax({
                url: appURL + 'api/add_comment.php',
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
                        fetchComments(currentPage, postId, appURL);
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
        }
    });

    function getPageFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        return parseInt(urlParams.get('page'), 1);
    }

    function fetchComments(page, postId, appURL) {

        console.log('Fetching Page: ' + page + "  ->" + postId);
        $.ajax({
            url: appURL + 'api/get_comments.php',
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
                        console.log("comment: ", comment);
                        $('#comments-list').append(`
                            <div class="media mb-4">
                                <div class="media-body">
                                    <a href="profile.php?user_id=${comment.user_id}">
                                    <img class="mr-3 rounded-circle" src="https://via.placeholder.com/50" alt="User image">
                                    </a>
                                    <a href="profile.php?user_id=${comment.user_id}">
                                    <h5 class="mt-0">${comment.username}</h5>
                                    </a>
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
            fetchComments(page, postId, appURL);
            // Update URL to reflect the current page
            window.history.pushState(null, '', `?post_id=${postId}&page=${page}`);
        }
    });

    // Handle browser navigation (e.g., back/forward buttons)
    window.onpopstate = function (event) {
        const page = getPageFromURL();
        if (page) {
            fetchComments(page, postId, appURL);
        }
    };







    // Initial fetch
    fetchComments(currentPage, postId, appURL);

});






