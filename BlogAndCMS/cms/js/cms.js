$(document).ready(function () {
    console.log(appURL);
    $.ajax({
        url: appURL + 'api/admin/get_statistic.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            let tbody = $('#statistic table tbody');
            tbody.empty(); // Clear any existing data
            response.data.forEach((stat, index) => {
                let row = '<tr>' +
                    '<th scope="row">' + index + '</th>' +
                    '<td>' + stat.name + '</td>' +
                    '<td>' + stat.value + '</td>' +
                    '</tr>';
                tbody.append(row);
            });

        },
        error: function (response) {
            alert('Error loading posts' + response.message);
        }
    });
});