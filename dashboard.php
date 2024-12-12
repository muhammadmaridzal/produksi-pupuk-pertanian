<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
} else if (isset($_SESSION['username_admin'])) {
    $username = htmlspecialchars($_SESSION['username_admin']);
} else {
    $username = "Guest";
}

require 'koneksi.php';

$query_produk = "SELECT COUNT(*) FROM tb_produk";
$stmt_produk = $conn->prepare($query_produk);
$stmt_produk->execute();
$total_produk = $stmt_produk->fetchColumn();

$query_artikel = "SELECT COUNT(*) FROM tb_artikel";
$stmt_artikel = $conn->prepare($query_artikel);
$stmt_artikel->execute();
$total_artikel = $stmt_artikel->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-section">
            <img src="image/logooo.png" alt="Logo" class="logo">
            <h3>ORGANIK FERTILIZER</h3>
            <p>Solusi Pupuk Pertanian</p>
        </div>
        <ul class="nav-menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">Data Sales</a></li>
            <li><a href="data_artikel.php">Data Artikel</a></li>
            <li><a href="data_produk.php">Data Produk</a></li>
            <li><a href="#">Data Pembelian</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Dashboard</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search here...">
            </div>
            <div class="user-info">
                <span>Eng (US)</span>
                <div class="user-profile">
                    <img src="image/user.jpg" alt="User">
                    <span><?php echo $username ?></span>
                </div>
            </div>
        </header>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card sales-card">
                <h3><?php echo $total_produk; ?></h3>
                <p>Total Produk</p>
                <small>Jumlah Produk di Sistem</small>
            </div>
            <div class="card order-card">
                <h3><?php echo $total_artikel; ?></h3>
                <p>Total Artikel</p>
                <small>Jumlah Artikel di Sistem</small>
            </div>
        </div>

        <!-- Popup -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span id="closePopupBtn" class="close-btn">&times;</span>
                <h2>Hallo Admin</h2>
                <p>Selamat Datang Pada Menu Dashboard</p>
            </div>
        </div>

        <script>
            const popup = document.getElementById('popup');
            const closePopupBtn = document.getElementById('closePopupBtn');
            window.onload = function() {
                popup.style.display = 'flex';
            };
            closePopupBtn.addEventListener('click', () => {
                popup.style.display = 'none';
            });

            const ctx = document.getElementById('targetChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May'],
                    datasets: [{
                            label: 'Target',
                            data: [50, 70, 80, 60, 90],
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        },
                        {
                            label: 'Reality',
                            data: [45, 60, 70, 55, 85],
                            backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        },
                    ],
                },
            });
        </script>
</body>

</html>