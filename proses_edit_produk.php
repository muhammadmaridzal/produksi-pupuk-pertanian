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
        $stmt = $conn->prepare("UPDATE produk SET nama_produk = :nama_produk, harga_produk = :harga_produk, deskripsi_produk = :deskripsi_produk, foto_produk = :foto_produk WHERE id_produk = :id");
        $stmt->bindParam(':foto_produk', $foto_produk);
    } else {
        $stmt = $conn->prepare("UPDATE produk SET nama_produk = :nama_produk, harga_produk = :harga_produk, deskripsi_produk = :deskripsi_produk WHERE id_produk = :id");
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