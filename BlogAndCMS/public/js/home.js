$(document).ready(function () {
    const postsPerPage = 9; // Number of cards per page
    let totalPages = 1;
    let currentPage = getPageFromURL('page') || 1;
    let currentCategory = getPageFromURL('category') || 1;

    function getPageFromURL(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return parseInt(urlParams.get(name), 10);
    }

    function fetchPosts(page, currentCategory) {

        console.log('Fetching Page: ' + page);
        $.ajax({
            url: 'http://localhost/BlogAndCMS/api/get_posts.php',
            method: 'GET',
            data: {
                'page': page,
                'category_id': currentCategory
            },
            dataType: 'json',
            success: function (response) {
                console.log("Total pages: " + response.totalPages);
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
            error: function (response) {
                alert('Error loading posts' + response.message);
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
    fetchPosts(currentPage, currentCategory);

    // Handle pagination click
    $('#pagination').on('click', '.page-link', function (e) {
        e.preventDefault();
        const page = $(this).data('page');
        if (page) {
            fetchPosts(page, currentCategory);
            // Update URL to reflect the current page
            window.history.pushState(null, '', `?page=${page}&category=${currentCategory}`);
        }
    });

    $('#posts').on('click', '.card', function () {
        const postId = $(this).data('post-id');
        if (postId) {
            window.location.href = `post_details.php?post_id=${postId}`;
        }
    });

    window.onpopstate = function (event) {
        const page = getPageFromURL('page');
        const category = getPageFromURL('category');
        if (page) {
            fetchPosts(page, category);
        }
    };

    function fetchCategories() {
        console.log("Fetching Categories");
        $.ajax({
            url: 'http://localhost/BlogAndCMS/api/get_categories.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data.message);
                var $categoriesList = $('#categories-list');
                $categoriesList.empty();

                data.data.forEach(function (category, index) {
                    var isActive = (category.category_id == currentCategory) ? 'active' : ''; // Use currentCategory to set active class
                    var categoryItem = `<li class="list-inline-item">
                                            <a href="#" class="category-link ${isActive}" data-category-id="${category.category_id}">
                                                ${category.category_name}
                                            </a>
                                        </li>`;
                    $categoriesList.append(categoryItem);
                });

                // Handle category clicks
                $('.category-link').on('click', function (e) {
                    e.preventDefault();
                    const categoryId = $(this).data('category-id'); // Use data-category-id attribute
                    const categoryName = $(this).text();

                    // Remove active class from all
                    $('.category-link').removeClass('active');

                    // Add active class to clicked category
                    $(this).addClass('active');

                    // Fetch posts for the selected category
                    currentCategory = categoryId;
                    fetchPosts(1, currentCategory); // Fetch posts for the first page
                    window.history.pushState(null, '', `?page=1&category=${currentCategory}`);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX request failed:', textStatus, errorThrown);
            }
        });
    }




    console.log("TEST");
    fetchCategories();
});