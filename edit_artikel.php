<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_artikel WHERE id_artikel = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul_artikel = $_POST['judul_artikel'];
    $deskripsi_artikel = $_POST['deskripsi_artikel'];
    $foto_artikel = $_FILES['foto_artikel']['name'];

    if ($foto_artikel) {
        $target_dir = "image/";
        $target_file = $target_dir . basename($foto_artikel);
        move_uploaded_file($_FILES['foto_artikel']['tmp_name'], $target_file);
        $stmt = $conn->prepare("UPDATE tb_artikel SET judul_artikel = :judul_artikel, deskripsi_artikel = :deskripsi_artikel, foto_artikel = :foto_artikel WHERE id_artikel = :id");
        $stmt->bindParam(':foto_artikel', $foto_artikel);
    } else {
        $stmt = $conn->prepare("UPDATE tb_artikel SET judul_artikel = :judul_artikel, deskripsi_artikel = :deskripsi_artikel WHERE id_artikel = :id");
    }

    $stmt->bindParam(':judul_artikel', $judul_artikel);
    $stmt->bindParam(':deskripsi_artikel', $deskripsi_artikel);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<script>alert('Artikel berhasil diperbarui!'); window.location = 'data_artikel.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui artikel!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
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
    </style>
</head>
<body>
    <h1>Edit Artikel</h1>
    <div class="form-container">
        <form action="edit_artikel.php?id=<?php echo $article['id_artikel']; ?>" method="POST" enctype="multipart/form-data">
            <label for="judul_artikel">Judul Artikel</label>
            <input type="text" name="judul_artikel" value="<?php echo htmlspecialchars($article['judul_artikel']); ?>" required><br>

            <label for="deskripsi_artikel">Deskripsi Artikel</label>
            <textarea name="deskripsi_artikel" required><?php echo htmlspecialchars($article['deskripsi_artikel']); ?></textarea><br>

            <label for="foto_artikel">Foto Artikel</label>
            <input type="file" name="foto_artikel"><br>

            <button type="submit">Update Artikel</button>
            <a href="data_artikel.php" class="cancel-btn">Batal</a>
        </form>
    </div>
</body>
</html>
