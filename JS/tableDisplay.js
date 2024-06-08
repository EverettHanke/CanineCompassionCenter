/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: hoverDiv.js
 * PURPOSE: Helps display the selected tables in admin.html
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

