/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: tableDisplay.js
 * PURPOSE: Helps display the selected tables in admin.html
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
        }, 1500); // Delay the form submission by 500ms to show the thank you message
    });
});

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
