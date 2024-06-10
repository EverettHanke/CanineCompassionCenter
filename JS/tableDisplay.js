/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: tableDisplay.js
 * PURPOSE: Helps display the selected tables in admin.html
 */

/**
 * Displays the preview of the selected image.
 *
 * @param {Event} event - The event triggered when the image file is selected.
 */
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}

/**
 * Initializes event listeners after the DOM content has been loaded.
 */
document.addEventListener('DOMContentLoaded', function () {
    // Show sections based on button clicks
    document.getElementById('dogsBtn').addEventListener('click', function () {
        showSection('dogs');
    });
    document.getElementById('appointmentsBtn').addEventListener('click', function () {
        showSection('appointments');
    });
    document.getElementById('usersBtn').addEventListener('click', function () {
        showSection('users');
    });

    // Handle dog form submission
    const dogForm = document.getElementById('dogForm');
    const thankYouMessageAdmin = document.getElementById('thankYouMessageAdmin');
    const dogFormSection = document.getElementById('dogFormSection');

    dogForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Hide the form and show the thank you message
        dogForm.style.display = 'none';
        thankYouMessageAdmin.style.display = 'block';

        // Use JavaScript to submit the form after showing the thank you message
        setTimeout(() => {
            dogForm.submit();
        }, 2000); // Delay the form submission by 500ms to show the thank you message
    });

    // Handle image preview
    const dogProfileInput = document.getElementById('dogProfile');
    dogProfileInput.addEventListener('change', function (event) {
        previewImage(event);
    });
});

/**
 * Shows the specified section and hides all others.
 *
 * @param {string} section - The section to be displayed ('dogs', 'appointments', 'users').
 */
function showSection(section) {
    console.log(`Switching to section: ${section}`);
    // Hide all sections
    document.getElementById('dogsSection').style.display = 'none';
    document.getElementById('appointmentsSection').style.display = 'none';
    document.getElementById('usersSection').style.display = 'none';
    document.getElementById('dogFormSection').style.display = 'none';

    // Reset classes
    document.getElementById('contentSection').className = 'col-md-7 dogDB';
    document.getElementById('dogFormSection').className = 'col-md-5 vertical-divider';

    // Show the selected section and adjust classes
    if (section === 'dogs') {
        document.getElementById('dogsSection').style.display = 'block';
        document.getElementById('dogFormSection').style.display = 'block';
    } else if (section === 'appointments') {
        document.getElementById('contentSection').className = 'col-12 dogDB';
        document.getElementById('appointmentsSection').style.display = 'block';
    } else if (section === 'users') {
        document.getElementById('contentSection').className = 'col-11 dogDB';
        document.getElementById('usersSection').style.display = 'block';
    }
}

/**
 * Toggles the admin status and updates the display of the checkbox.
 *
 * @param {Element} element - The element that was clicked to trigger the toggle.
 */
function toggleAdmin(element) {
    const td = element.closest('td');
    const userId = td.getAttribute('data-id');
    const checkedIcon = td.querySelector('.checked-icon');
    const uncheckedIcon = td.querySelector('.unchecked-icon');
    const isAdmin = checkedIcon.classList.contains('hidden') ? 1 : 0;

    // Toggle display immediately
    checkedIcon.classList.toggle('hidden');
    checkedIcon.classList.toggle('visible');
    uncheckedIcon.classList.toggle('hidden');
    uncheckedIcon.classList.toggle('visible');

    // Send AJAX request to update admin status
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/328/CanineCompassionCenter/updateAdminStatus', true); // Adjusted path
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText);
            // You can add additional logic here if needed for a successful response
        } else if (xhr.readyState === XMLHttpRequest.DONE) {
            console.error('Error updating admin status');
            // Revert the display if there was an error
            checkedIcon.classList.toggle('hidden');
            checkedIcon.classList.toggle('visible');
            uncheckedIcon.classList.toggle('hidden');
            uncheckedIcon.classList.toggle('visible');
        }
    };
    xhr.send(`userId=${userId}&isAdmin=${isAdmin}`);
}







