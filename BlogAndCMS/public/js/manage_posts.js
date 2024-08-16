$(document).ready(function () {
    const postsPerPage = 9; // Number of cards per page
    let totalPages = 1;
    let currentPage = getPageFromURL('page') || 1;
    let currentCategory = getPageFromURL('category') || 1;
    let currentCriteria = getPageFromURL('criteria') || 'created_at';
    let currentOrder = getPageFromURL('order') || 'asc';

    function getPageFromURL(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return parseInt(urlParams.get(name), 10);
    }

    function fetchPosts(page, currentCategory, currentOrder, currentCriteria) {

        console.log('Fetching Page: ' + page);
        $.ajax({
            url: appURL + 'api/get_posts.php',
            method: 'GET',
            data: {
                'page': page,
                'category_id': currentCategory,
                'criteria': currentCriteria,
                'order': currentOrder
            },
            dataType: 'json',
            success: function (response) {
                console.log("Total pages: " + response.totalPages);
                let tbody = $('#posts table tbody');
                tbody.empty(); // Clear any existing data
                const startNumber = (page - 1) * postsPerPage + 1;
                response.data.forEach((post, index) => {
                    let row = '<tr>' +
                        '<th scope="row">' + (startNumber + index) + '</th>' +
                        '<td>' + post.title + '</td>' +
                        '<td>' + post.category_id + '</td>' +
                        '<td>' + post.view_count + '</td>' +
                        '<td>' + post.created_at + '</td>' +
                        '<td>' +
                        '<button class="btn btn-sm btn-danger delete-post-button" data-post-id="' + post.post_id + '">Delete</button>' +
                        '</td>' +
                        '</tr>';
                    tbody.append(row);
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
    fetchPosts(currentPage, currentCategory, currentOrder, currentCriteria);

    // Handle pagination click
    $('#pagination').on('click', '.page-link', function (e) {
        e.preventDefault();
        const page = $(this).data('page');
        if (page) {
            fetchPosts(page, currentCategory, currentOrder, currentCriteria);
            // Update URL to reflect the current page
            window.history.pushState(null, '', `?page=${page}&category=${currentCategory}&order=${currentOrder}&criteria=${currentCriteria}`);
        }
    });

    $('#posts').on('click', '.card', function () {
        const postId = $(this).data('post-id');
        if (postId) {
            window.location.href = `post_details.php?post_id=${postId}`;
        }
    });
    $('#criteriaDropdown').change(function () {
        let criteria = $(this).val();
        currentCriteria = criteria;
        console.log("CRITERIA: ", currentCriteria);
        fetchPosts(currentPage, currentCategory, currentOrder, currentCriteria);
        window.history.pushState(null, '', `?page=${currentPage}&category=${currentCategory}&order=${currentOrder}&criteria=${currentCriteria}`);
    });
    $('#orderDropdown').change(function () {
        let order = $(this).val();
        currentOrder = order;
        console.log("ORDER: ", currentOrder);
        fetchPosts(currentPage, currentCategory, currentOrder, currentCriteria);
        window.history.pushState(null, '', `?page=${currentPage}&category=${currentCategory}&order=${currentOrder}&criteria=${currentCriteria}`);
    });
    window.onpopstate = function (event) {
        const page = getPageFromURL('page');
        const category = getPageFromURL('category');
        const criteria = getPageFromURL('criteria');
        const order = getPageFromURL('order');
        if (page) {
            fetchPosts(page, category, order, criteria);
        }
    };

    function fetchCategories() {
        console.log("Fetching Categories");
        $.ajax({
            url: appURL + 'api/get_categories.php',
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
                    fetchPosts(1, currentCategory, currentOrder, currentCriteria); // Fetch posts for the first page
                    window.history.pushState(null, '', `?page=1&category=${currentCategory}&order=${currentOrder}&criteria=${currentCriteria}`);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX request failed:', textStatus, errorThrown);
            }
        });
    }

    // Handle delete post
    $('#posts').on('click', '.delete-post-button', function (e) {
        e.preventDefault();
        const postId = $(this).data('post-id');

        if (confirm('Are you sure you want to delete this post?')) {
            $.ajax({
                url: appURL + 'api/delete_post.php',
                method: 'POST',
                data: {
                    'post_id': postId
                },
                success: function (response) {
                    alert('Post deleted successfully.');
                    fetchPosts(currentPage, currentCategory, currentOrder, currentCriteria); // Refresh the posts
                },
                error: function (xhr, status, error) {
                    alert('Error deleting post: ' + error);
                }
            });
        }
    });



    console.log("TEST");
    fetchCategories();
});
