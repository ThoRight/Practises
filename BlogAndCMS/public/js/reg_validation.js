$(document).ready(function () {
    $('#reg-form').on('submit', function (event) {
        event.preventDefault();
        let fullname = $('#inputFullname').val();
        let username = $('#inputUsername').val();
        let email = $('#inputEmail').val();
        let password = $('#inputPassword').val();
        let city = $('#inputCity').val();
        let about = $('#inputAbout').val();
        let check = $('#inputCheck').is(':checked');

        let isValid = true;

        if (username === '' || /\s/.test(username) || !/^[a-zA-Z0-9]+$/.test(username)) {
            $('#inputUsername').addClass('is-invalid');
            $('#username-feedback').text('Username must be filled, contain no spaces, and only letters and numbers.').show();
            isValid = false;
        } else {
            $('#inputUsername').removeClass('is-invalid');
            $('#username-feedback').hide();
        }
        if (email === '' || !/^\S+@\S+\.\S+$/.test(email)) {
            $('#inputEmail').addClass('is-invalid');
            $('#email-feedback').text('Invalid email format.').show();
            isValid = false;
        } else {
            $('#inputEmail').removeClass('is-invalid');
            $('#email-feedback').hide();
        }
        if (password === '' || password.length < 8 || !/[a-zA-Z]/.test(password) || !/[0-9]/.test(password) || !/[\W_]/.test(password)) {
            $('#inputPassword').addClass('is-invalid');
            $('#password-feedback').text('Password must be at least 8 characters long, contain letters, numbers, and special characters.').show();
            isValid = false;
        } else {
            $('#exampleInputPassword1').removeClass('is-invalid');
            $('#password-feedback').hide();
        }
        if (about === '') {
            $('#inputAbout').addClass('is-invalid');
            $('#about-feedback').text('Password must be at least 8 characters long, contain letters, numbers, and special characters.').show();
            isValid = false;
        } else {
            $('#inputAbout').removeClass('is-invalid');
            $('#about-feedback').hide();
        }
        if (!check) {
            $('#inputCheck').addClass('is-invalid');
            $('#check-feedback').text('Password must be at least 8 characters long, contain letters, numbers, and special characters.').show();
            isValid = false;
        } else {
            $('#inputCheck').removeClass('is-invalid');
            $('#check-feedback').hide();
        }
        if (!isValid) {
            event.preventDefault();
        }
        else {
            let formData = {
                fullname: fullname,
                username: username,
                email: email,
                password: password,
                city: city,
                about: about,
                check: check
            };
            $.ajax({
                url: 'http://localhost/BlogAndCMS/api/create_user.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function (response) {
                    if (response.status === 'success') {
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        }
    });
});
