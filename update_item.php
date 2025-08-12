<?php
include 'config.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi']; // Tambahkan deskripsi

$gambar = null;

// Cek jika ada upload gambar baru
if ($_FILES['gambar']['error'] === 0) {
    $gambar_name = basename($_FILES['gambar']['name']);
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $target_path = "img/" . $gambar_name;

    if (move_uploaded_file($gambar_tmp, $target_path)) {
        $gambar = $gambar_name;

        // Hapus gambar lama
        $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT gambar FROM products WHERE id = $id"));
        if ($old['gambar']) {
            unlink("img/" . $old['gambar']);
        }

        // Update dengan gambar
        $query = "UPDATE products SET nama='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
    }
} else {
    // Update tanpa gambar
    $query = "UPDATE products SET nama='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id=$id";
}

mysqli_query($conn, $query);

header("Location: admin_dashboard.php");
exit();
?>
