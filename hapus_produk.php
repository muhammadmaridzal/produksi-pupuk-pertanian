<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM tb_produk WHERE id_produk = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "<script>alert('Produk berhasil dihapus!'); window.location = 'data_produk.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus produk!');</script>";
}
