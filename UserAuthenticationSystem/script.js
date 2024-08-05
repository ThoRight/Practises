const form = document.getElementById('reg-form');

form.addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('response').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
});
