/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: formHandler.js
 * PURPOSE: Handles the form submission and displays a thank you message.
 */

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('appointmentForm');
    const thankYouMessage = document.getElementById('thankYouMessage');
    const formContainer = document.getElementById('formContainer');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Hide the form and show the thank you message
        formContainer.style.display = 'none';
        thankYouMessage.style.display = 'block';

        // Prepare form data
        const formData = new FormData(form);

        // Send AJAX request
        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
            .then(response => response.text())
            .then(data => {
                console.log('Success:', data);
                // Optionally handle response data
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });
});
