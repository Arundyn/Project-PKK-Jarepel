<?php
include 'config.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$gambar = null;

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
    $gambar_name = basename($_FILES['gambar']['name']);
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $target_path = "img/" . $gambar_name;

    if (move_uploaded_file($gambar_tmp, $target_path)) {
        $gambar = $gambar_name;
    }
}

$query = "INSERT INTO products (nama, harga, gambar, deskripsi) VALUES (
    '$nama',
    '$harga',
    " . ($gambar ? "'$gambar'" : "NULL") . ",
    '$deskripsi'
)";

mysqli_query($conn, $query);

header("Location: admin_dashboard.php");
exit();
?>
