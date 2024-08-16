$(document).ready(function () {
    console.log("works: ", userId)
    $.ajax({
        url: appURL + 'api/get_profile_data.php',
        method: 'GET',
        dataType: 'json',
        data: { user_id: userId },
        success: function (response) {
            if (response.status === 'success') {
                //$('#profileImg').attr('src', response.data.profile_img);
                $('#profile-fullname').text(response.data.fullname);
                $('#profile-email').text(response.data.email);
                $('#profile-username').text("@" + response.data.username);
                $('#profile-created_at').text(response.data.created_at);
                $('#profile-about').text(response.data.about);
                $('#profile-role').text(response.data.role);
                $('#profile-city').text(response.data.city);
            } else {
                alert('Failed to load profile data');
            }
        },
        error: function (response) {
            alert('Error fetching profile data'+ response.message);
        }
    });
});