$(document).ready(function () {
    $('#reg-form').on('submit', function (event) {
        console.log("TEST");
        let username = $('#exampleInputUsername1').val().trim();
        let email = $('#exampleInputEmail1').val().trim();
        let password = $('#exampleInputPassword1').val().trim();

        let isValid = true;

        if (username === '' || /\s/.test(username) || !/^[a-zA-Z0-9]+$/.test(username)) {
            $('#exampleInputUsername1').addClass('is-invalid');
            $('#username-feedback').text('Username must be filled, contain no spaces, and only letters and numbers.').show();
            isValid = false;
        } else {
            $('#exampleInputUsername1').removeClass('is-invalid');
            $('#username-feedback').hide();
        }

        if (email === '' || !/^\S+@\S+\.\S+$/.test(email)) {
            $('#exampleInputEmail1').addClass('is-invalid');
            $('#email-feedback').text('Invalid email format.').show();
            isValid = false;
        } else {
            $('#exampleInputEmail1').removeClass('is-invalid');
            $('#email-feedback').hide();
        }

        if (password === '' || password.length < 8 || !/[a-zA-Z]/.test(password) || !/[0-9]/.test(password) || !/[\W_]/.test(password)) {
            $('#exampleInputPassword1').addClass('is-invalid');
            $('#password-feedback').text('Password must be at least 8 characters long, contain letters, numbers, and special characters.').show();
            isValid = false;
        } else {
            $('#exampleInputPassword1').removeClass('is-invalid');
            $('#password-feedback').hide();
        }
        if (!isValid) {
            event.preventDefault();
        }
    });
});