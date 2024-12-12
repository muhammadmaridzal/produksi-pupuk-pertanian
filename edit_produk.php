<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_produk WHERE id_produk = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $foto_produk = $_FILES['foto_produk']['name'];

    // Jika ada foto baru, upload dan ganti nama foto
    if ($foto_produk) {
        $target_dir = "image/";
        $target_file = $target_dir . basename($foto_produk);
        move_uploaded_file($_FILES['foto_produk']['tmp_name'], $target_file);
        $stmt = $conn->prepare("UPDATE tb_produk SET nama_produk = :nama_produk, harga_produk = :harga_produk, deskripsi_produk = :deskripsi_produk, foto_produk = :foto_produk WHERE id_produk = :id");
        $stmt->bindParam(':foto_produk', $foto_produk);
    } else {
        $stmt = $conn->prepare("UPDATE tb_produk SET nama_produk = :nama_produk, harga_produk = :harga_produk, deskripsi_produk = :deskripsi_produk WHERE id_produk = :id");
    }

    $stmt->bindParam(':nama_produk', $nama_produk);
    $stmt->bindParam(':harga_produk', $harga_produk);
    $stmt->bindParam(':deskripsi_produk', $deskripsi_produk);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location = 'data_produk.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui produk!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Anda dapat menambahkan file CSS terpisah -->
    <style>
        /* Global styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-size: 2.5rem;
            color: #333;
        }

        .form-container {
            width: 50%;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #fafafa;
            box-sizing: border-box;
        }

        .form-container input[type="file"] {
            font-size: 1rem;
            padding: 6px;
            background-color: #fff;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .form-container button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .form-container .cancel-btn {
            background-color: #f44336;
            margin-left: 10px;
        }

        .form-container .cancel-btn:hover {
            background-color: #da190b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 80%;
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <h1>Edit Produk</h1>
    <div class="form-container">
        <form action="edit_produk.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($product['nama_produk']); ?>" required><br>

            <label for="harga_produk">Harga Produk</label>
            <input type="text" name="harga_produk" value="<?php echo htmlspecialchars($product['harga_produk']); ?>" required><br>

            <label for="deskripsi_produk">Deskripsi Produk</label>
            <textarea name="deskripsi_produk" required><?php echo htmlspecialchars($product['deskripsi_produk']); ?></textarea><br>

            <label for="foto_produk">Foto Produk</label>
            <input type="file" name="foto_produk"><br>

            <button type="submit">Update Produk</button>
        </form>
    </div>
</body>

</html>