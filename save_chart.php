<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"), true);
$cart = $data['cart'] ?? [];

if (empty($cart)) {
    echo json_encode(["success" => false, "message" => "Cart kosong"]);
    exit;
}

// Simpan ke tabel pesanan
$tanggal_pesan = date("Y-m-d");
$total = 0;
foreach ($cart as $item) {
    $total += $item['harga'] * $item['jumlah'];
}

mysqli_query($conn, "INSERT INTO pesanan (nama_user, total, alamat, tanggal_pesan) VALUES ('', $total, '', '$tanggal_pesan')");
$id_pesanan = mysqli_insert_id($conn);

// Simpan ke tabel items_pesanan
foreach ($cart as $item) {
    $subtotal = $item['harga'] * $item['jumlah'];
    mysqli_query($conn, "INSERT INTO items_pesanan (id_pesanan, id_product, jumlah, subtotal) VALUES ($id_pesanan, {$item['id']}, {$item['jumlah']}, $subtotal)");
}

echo json_encode(["success" => true, "id_pesanan" => $id_pesanan]);
?>
