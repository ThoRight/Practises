$(document).ready(function () {


    function fetchCategories() {
        $.ajax({
            url: 'http://localhost/BlogAndCMS/api/get_categories.php',
            method: 'GET',
            contentType: 'application/json',
            success: function (response) {
                // Clear existing options
                $('#category-select').empty();
                if (Array.isArray(response.data)) {
                    response.data.forEach(function (category) {
                        if (category.category_id != 1) {
                            var option = $('<option></option>')
                                .attr('value', category.category_id) // Use category ID as the value
                                .text(category.category_name);       // Display category name

                            $('#category-select').append(option);
                        }
                    });
                } else {
                    console.log('Unexpected data format:', response);
                }
            },
            error: function (response) {
                console.log('Error:', response.message);
            }
        });
    }

    fetchCategories();
    // Submit button click handler
    $('#submit-button').on('click', function () {
        let title = $('#post-title').val();
        editor.save().then((outputData) => {
            console.log('Article data: ', outputData);

            // Ensure userId is defined and use it
            let selectedCategories = $('#category-select').val();
            selectedCategories.push('1');
            // Send the data to the server
            $.ajax({
                url: 'http://localhost/BlogAndCMS/api/add_post.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    'title': title,
                    'user_id': userId,
                    'category_id': 1,
                    'selected_categories': selectedCategories,
                    'content': JSON.stringify(outputData) // Ensure content is a JSON string
                }),
                success: function (data) {
                    console.log('--Success:', data);
                    var url = 'http://localhost/BlogAndCMS/public/post_details.php?post_id=' + data.post_id;

                    window.location.href = url;
                },
                error: function (response) {
                    console.log('Error:', response.message);
                }
            });
        }).catch((error) => {
            console.error('Saving failed: ', error.message);
        });
    });
});