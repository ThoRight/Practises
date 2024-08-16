$(document).ready(function () {
    $('#login-form').on('submit', function (event) {
        event.preventDefault();
        console.log("CALLED");
        let username = $('#inputUsername').val();
        let password = $('#inputPassword').val();

        let isValid = true;

        if (username === '' || /\s/.test(username) || !/^[a-zA-Z0-9]+$/.test(username)) {
            $('#inputUsername').addClass('is-invalid');
            $('#username-feedback').text('Username must be filled, contain no spaces, and only letters and numbers.').show();
            $('#login-feedback').hide();
            isValid = false;
        } else {
            $('#inputUsername').removeClass('is-invalid');
            $('#username-feedback').hide();
        }
        if (password === '' || password.length < 8 || !/[a-zA-Z]/.test(password) || !/[0-9]/.test(password) || !/[\W_]/.test(password)) {
            $('#inputPassword').addClass('is-invalid');
            $('#password-feedback').text('Password must be at least 8 characters long, contain letters, numbers, and special characters.').show();
            $('#login-feedback').hide();
            isValid = false;
        } else {
            $('#exampleInputPassword1').removeClass('is-invalid');
            $('#password-feedback').hide();
        }
        console.log(isValid);
        if (!isValid) {
            event.preventDefault();
        }
        else {
            let formData = {
                username: username,
                password: password,
            };
            $.ajax({
                url: appURL + 'api/login_user.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function (response) {
                    console.log(response);
                    if (response.status === 'success') {
                        window.location.href = appURL + 'public/home.php';
                    } else {
                        $('#inputUsername').addClass('is-invalid');
                        $('#inputPassword').addClass('is-invalid');
                        $('#username-feedback').hide();
                        $('#password-feedback').hide();
                        $('#login-feedback').text(response.message).show();
                    }
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        }
    });
});
