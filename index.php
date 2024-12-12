<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupuk Organizer</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="snackbar">Apakah Anda Ingin Melakukan Login</div>
    <nav class="navbar">
        <div class="logo">
            <img src="image/logooo.png" alt="Logo">
        </div>
        <div class="hamburger" id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul class="nav-links" id="navLinks">
            <li><a href="#">Home</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Chart</a></li>
        </ul>
        <a href="register.php"><button class="register-btn">Register Now <span class="arrow">→</span></button></a>
    </nav>

    <!-- Hero Section -->
    <div class="container">
        <div class="text-section">
            <h1>Lessons and insights</h1>
            <h2 class="highlight">Win Solution</h2>
            <p>Where to grow your business as a photographer: site or social media?</p>
            <div class="button-container">
                <a href="login.php"><button class="btn login">Login</button></a>
                <button class="btn register">Register</button>
            </div>
        </div>
        <div class="image-section">
            <img src="image/ilus.png" alt="Illustration">
        </div>
    </div>

    <!-- Clients Section -->
    <section class="clients-section">
        <h2>Our Clients</h2>
        <div class="clients-logos">
            <img src="image/logoo.jpg" alt="Client 1">
            <img src="image/logoo.jpg" alt="Client 2">
            <img src="image/logoo.jpg" alt="Client 3">
            <img src="image/logoo.jpg" alt="Client 4">
        </div>
    </section>

    <!-- Management Section -->
    <section class="management-section">
        <h2>Manage your entire community in a single system</h2>
        <h3>Who is Nextcent suitable for?</h3>
        <div class="features">
            <div class="feature-box">
                <h4>Membership Organisations</h4>
                <p>Our membership management software provides full automation of membership renewals and payments</p>
            </div>
            <div class="feature-box">
                <h4>National Associations</h4>
                <p>Our membership management software provides full automation of membership renewals and payments</p>
            </div>
            <div class="feature-box">
                <h4>Clubs And Groups</h4>
                <p>Our membership management software provides full automation of membership renewals and payments</p>
            </div>
        </div>
    </section>


    <!-- Feature Story Section -->
    <section class="feature-story-section">
        <div class="story-text">
            <h2>The unseen of spending three years at Pixelgrade</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet justo quam...</p>
            <a href="#" class="learn-more-btn">Learn More</a>
        </div>
        <div class="story-image">
            <img src="image/ilustrasi.jpeg" alt="Pixelgrade Story Illustration">
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <h2>Helping a local business reinvent itself</h2>
        <p>We reached here with our hard work and dedication</p>
        <div class="stats">
            <div class="stat-box">
                <h3>2,245,341</h3>
                <p>Members</p>
            </div>
            <div class="stat-box">
                <h3>46,328</h3>
                <p>Clubs</p>
            </div>
            <div class="stat-box">
                <h3>828,867</h3>
                <p>Event Bookings</p>
            </div>
            <div class="stat-box">
                <h3>1,926,436</h3>
                <p>Payments</p>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container">
            <p>&copy; 2024 Pupuk Organizer. All Rights Reserved.</p>
            <ul class="footer-links">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </footer>

    <script src="js/script.js">
        document.addEventListener('DOMContentLoaded', () => {
            // Contoh: Memunculkan snackbar saat tombol ditekan
            document.querySelector('.register-btn').addEventListener('click', () => {
                showSnackbar('Successfully registered!');
            });
        });
    </script>
</body>

</html>