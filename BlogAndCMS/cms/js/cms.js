$(document).ready(function () {
    console.log(appURL);
    $.ajax({
        url: appURL + 'api/admin/get_statistic.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            response.data.forEach((stat, index) => {
                if (stat.name == "Total Users") {
                    let info = $('#total-users-info');
                    info.empty();
                    let row = '<h1>' + stat.value +
                        '</h1>';
                    info.append(row);
                console.log(stat);

                }
                else if (stat.name == "Total Posts") {
                    let info = $('#total-posts-info');
                    info.empty();
                    let row = '<h1>' + stat.value +
                        '</h1>';
                    info.append(row);
                }
                if (stat.name == "Total Comments") {
                    let info = $('#total-comments-info');
                    info.empty();
                    let row = '<h1>' + stat.value +
                        '</h1>';
                    info.append(row);
                }
                if (stat.name == "Total Views") {
                    let info = $('#total-views-info');
                    info.empty();
                    let row = '<h1>' + stat.value +
                        '</h1>';
                    info.append(row);
                }

            });

        },
        error: function (response) {
            alert('Error loading posts' + response.message);
        }
    });
});