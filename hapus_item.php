<?php
include 'config.php';

$id = $_GET['id'];

// Ambil nama gambar (jika ada)
$get = mysqli_query($conn, "SELECT gambar FROM products WHERE id = $id");
$data = mysqli_fetch_assoc($get);

if ($data['gambar']) {
    unlink("img/" . $data['gambar']); // hapus file gambar
}

mysqli_query($conn, "DELETE FROM products WHERE id = $id");

header("Location: admin_dashboard.php");
exit();
?>
