// navigation.js

function setActiveLink(event) {
    // Remove 'active' class from all links
    const links = document.querySelectorAll('.nav-link');
    links.forEach(link => {
        link.classList.remove('active');
    });

    // Add 'active' class to the clicked link
    event.currentTarget.classList.add('active');
}

// Attach click event listeners to navigation links
document.addEventListener('DOMContentLoaded', () => {
    const reservationLink = document.querySelector('a[href="{{ route('reservation.index') }}"]');
    if (reservationLink) {
        reservationLink.addEventListener('click', setActiveLink);
    }
});
