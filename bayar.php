<?php
include 'config.php';

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $cart = json_decode($_POST['cart'], true);

    // Hitung total & ambil jumlah + produk_id dari item pertama
    $total = 0;
    $jumlah = 0;
    $produk_id = 0;
    if (!empty($cart)) {
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }
        // Ambil dari item pertama (atau bisa diubah kalau mau multiple)
        $jumlah = (int)$cart[0]['jumlah'];
        $produk_id = (int)$cart[0]['id'];
    }

    // Simpan ke tabel pesanan
    $stmt = $conn->prepare("INSERT INTO pesanan (nama_user, total, alamat, tanggal_pesan, jumlah, produk_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssii", $nama, $total, $alamat, $tanggal, $jumlah, $produk_id);
    $stmt->execute();
    $id_pesanan = $stmt->insert_id;

    // Simpan detail item
    $stmt_item = $conn->prepare("INSERT INTO items_pesanan (id_pesanan, id_product, jumlah, subtotal) VALUES (?, ?, ?, ?)");
    foreach ($cart as $item) {
        $subtotal = $item['harga'] * $item['jumlah'];
        $stmt_item->bind_param("iiid", $id_pesanan, $item['id'], $item['jumlah'], $subtotal);
        $stmt_item->execute();
    }

    // Redirect ke WhatsApp
    $pesan_wa = "Halo Jarepel, saya ingin memesan:%0A".
                "Nama: $nama%0A".
                "No Telp: $telp%0A".
                "Alamat: $alamat%0A".
                "Tanggal: $tanggal%0A".
                "Total: Rp ".number_format($total,0,',','.')."%0A%0A".
                "Detail Pesanan:%0A";
    foreach ($cart as $item) {
        $pesan_wa .= "- {$item['nama']} ({$item['jumlah']}) x Rp ".number_format($item['harga'],0,',','.')."%0A";
    }
    header("Location: https://wa.me/6285711416024?text=$pesan_wa");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="bayar.css">
</head>
<body>

<h2>Detail Pesanan</h2>
<table border="1" cellpadding="8" cellspacing="0" id="cartTable">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody></tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="right"><strong>Total</strong></td>
            <td id="totalCell"><strong>Rp 0</strong></td>
        </tr>
    </tfoot>
</table>

<br>

<form method="POST">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="telp" placeholder="No Telepon" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
    
    <input type="hidden" name="cart" id="cartInput">

    <button type="submit">Order Now</button>
</form>

<script>
let cart = JSON.parse(sessionStorage.getItem('cart') || localStorage.getItem('cart')) || [];
document.getElementById('cartInput').value = JSON.stringify(cart);

// Render tabel
let tbody = document.querySelector('#cartTable tbody');
let total = 0;
cart.forEach(item => {
    let subtotal = item.harga * item.jumlah;
    total += subtotal;

    let row = document.createElement('tr');
    row.innerHTML = `
        <td>${item.nama}</td>
        <td>${item.jumlah}</td>
        <td>Rp ${item.harga.toLocaleString()}</td>
        <td>Rp ${subtotal.toLocaleString()}</td>
    `;
    tbody.appendChild(row);
});

document.getElementById('totalCell').innerHTML = `<strong>Rp ${total.toLocaleString()}</strong>`;
</script>

</body>
</html>
