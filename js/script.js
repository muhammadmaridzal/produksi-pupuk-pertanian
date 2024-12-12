const hamburger = document.getElementById('hamburger');
const navLinks = document.querySelector('.nav-links');

const clientLogos = document.querySelectorAll('.clients-logos img');

clientLogos.forEach((logo, index) => {
    logo.addEventListener('click', () => {
        alert(`Ini adalah client ke ${index + 1}`);
    });
});

const statBoxes = document.querySelectorAll('.stat-box h3');
const updatedStats = [2500000, 50000, 900000, 2000000];

function updateStats() {
    statBoxes.forEach((box, index) => {
        box.textContent = updatedStats[index].toLocaleString();
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('.navbar');

    // Function to toggle the 'fixed' class based on scroll position
    const toggleNavbarFixed = () => {
        if (window.scrollY > 0) { // Check if the page is scrolled
            navbar.classList.add('fixed');
        } else {
            navbar.classList.remove('fixed');
        }
    };

    // Attach the function to the scroll event
    window.addEventListener('scroll', toggleNavbarFixed);
});

function showSnackbar(message) {
    const snackbar = document.getElementById('snackbar');

    // Ubah teks di snackbar
    snackbar.textContent = message;

    // Tambahkan kelas "show" untuk memunculkan snackbar
    snackbar.classList.add('show');

    // Hapus kelas "show" setelah 3 detik
    setTimeout(() => {
        snackbar.classList.remove('show');
    }, 3000); // 3000ms = 3 detik
}

document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');

    // Tambahkan event listener untuk mengontrol menu
    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
});
