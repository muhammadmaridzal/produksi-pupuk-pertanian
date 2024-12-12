<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $foto_produk = $_FILES['foto_produk']['name'];
    $target_dir = "image/";
    $target_file = $target_dir . basename($foto_produk);

    // Upload file
    move_uploaded_file($_FILES['foto_produk']['tmp_name'], $target_file);

    $stmt = $conn->prepare("INSERT INTO tb_produk (nama_produk, harga_produk, deskripsi_produk, foto_produk) VALUES (:nama_produk, :harga_produk, :deskripsi_produk, :foto_produk)");
    $stmt->bindParam(':nama_produk', $nama_produk);
    $stmt->bindParam(':harga_produk', $harga_produk);
    $stmt->bindParam(':deskripsi_produk', $deskripsi_produk);
    $stmt->bindParam(':foto_produk', $foto_produk);

    if ($stmt->execute()) {
        echo "<script>alert('Produk berhasil ditambahkan!'); window.location = 'data_produk.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan produk!');</script>";
    }
}
