<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM tb_artikel WHERE id_artikel = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "<script>alert('Artikel berhasil dihapus!'); window.location = 'data_artikel.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus artikel!');</script>";
}
