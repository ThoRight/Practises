$(document).ready(function () {
    const postsPerPage = 9; // Number of cards per page
    let totalPages = 1;
    let currentPage = getPageFromURL() || 1; // Get page from URL or default to 1

    function getPageFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        return parseInt(urlParams.get('page'), 10);
    }

    function fetchPosts(page) {

        console.log('Fetching Page: ' + page);
        $.ajax({
            url: 'http://localhost/BlogAndCMS/api/get_posts.php',
            method: 'GET',
            data: { 'page': page },
            dataType: 'json',
            success: function (response) {
                // Update posts
                $('#posts').empty();
                response.data.forEach(post => {

                    $('#posts').append(`
                        <div class="col-md-4">
                            <div class="card mb-3" data-post-id="${post.post_id}" style="background-image: url('http://localhost/BlogAndCMS/public/images/blog.png');">
                                <div class="card-header bg-transparent">${post.title}</div>
                                <div class="card-body bg-transparent">
                                </div>
                                <div class="card-footer bg-transparent">${post.title}</div>
                            </div>
                        </div>
                    `);
                });

                // Update pagination
                currentPage = page;
                totalPages = response.totalPages;
                updatePagination();
            },
            error: function () {
                alert('Error loading posts');
            }
        });
    }

    function updatePagination() {
        $('#pagination').empty();

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

        // Previous Page Number
        if (currentPage > 1) {
            $('#pagination').append(`
                <li class="page-item">
                    <a class="page-link" href="#" data-page="${currentPage - 1}">${currentPage - 1}</a>
                </li>
            `);
        }

        // Current Page Number
        $('#pagination').append(`
            <li class="page-item active" aria-current="page">
                <span class="page-link">${currentPage}</span>
            </li>
        `);

        // Next Page Number
        if (currentPage < totalPages) {
            $('#pagination').append(`
                <li class="page-item">
                    <a class="page-link" href="#" data-page="${currentPage + 1}">${currentPage + 1}</a>
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

    // Initial fetch
    fetchPosts(currentPage);

    // Handle pagination click
    $('#pagination').on('click', '.page-link', function (e) {
        e.preventDefault();
        const page = $(this).data('page');
        if (page) {
            fetchPosts(page);
            // Update URL to reflect the current page
            window.history.pushState(null, '', `?page=${page}`);
        }
    });

    $('#posts').on('click', '.card', function () {
        const postId = $(this).data('post-id');
        if (postId) {
            window.location.href = `post_details.php?post_id=${postId}`;
        }
    });

    // Handle browser navigation (e.g., back/forward buttons)
    window.onpopstate = function (event) {
        const page = getPageFromURL();
        if (page) {
            fetchPosts(page);
        }
    };
});
