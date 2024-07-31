$(document).ready(function () {
    $('#fetch-data').on('click', function () {
        $('#data-content').empty();
        $.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let content = "";
                for (let i = 0; i < data.length; ++i) {
                    content += `<p>${data[i].title} - ${data[i].body}</p>`;
                    content += '<br>';
                }
                $('#data-content').html(content);
            },
            error: function (err) {
                console.log(err);
                $('#data-content').html('<p>An error occurred while fetching the data.</p>');
            }
        });
    });
});
