$(document).ready(function () {
    $('#delete_account').on('submit', function (e) {
        let userConfirmed = confirm("Are you sure you want to delete this user?");
        if (!userConfirmed) {
            e.preventDefault();
        }
    });
});