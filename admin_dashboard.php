<?php
include 'config.php';

// Ambil data item
$item_query = mysqli_query($conn, "SELECT * FROM products");

// Ambil data pesanan
$pesanan_query = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");

$sql = "SELECT * FROM pesanan ORDER BY tanggal_pesan DESC";
$result = mysqli_query($conn, $sql);

$query = "
    SELECT 
        p.id,
        p.nama_user,
        p.alamat,
        p.tanggal_pesan,
        SUM(ip.jumlah) AS total_jumlah
    FROM pesanan p
    LEFT JOIN items_pesanan ip ON p.id = ip.id_pesanan
    GROUP BY p.id, p.nama_user, p.alamat, p.tanggal_pesan
    ORDER BY p.id ASC
";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - Jasuke</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Dashboard Admin</h1>

    <h2>Tambah Item Baru</h2>
    <form action="tambah_item.php" method="POST" enctype="multipart/form-data">
        <label>Nama Item:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Harga (Rp):</label><br>
        <input type="number" name="harga" step="0.01" required><br><br>

        <label>Gambar (opsional):</label><br>
        <input type="file" name="gambar"><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" rows="4" required></textarea><br><br>

        <button type="submit">Tambah Item</button>
    </form>

    <h2>Daftar Item</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
            <th>Deskripsi</th>
        </tr>
       <?php
$no = 1;
while($item = mysqli_fetch_assoc($item_query)) {
    echo "<tr>";
    echo "<td>{$no}</td>";
    echo "<td>{$item['nama']}</td>";
    echo "<td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>";
    
    // Gambar
    echo "<td>";
    if ($item['gambar']) {
        echo "<img src='img/{$item['gambar']}' width='80'>";
    } else {
        echo "-";
    }
    echo "</td>";
    
    // Aksi
    echo "<td>
            <a href='edit_item.php?id={$item['id']}'>Edit</a> |
            <a href='hapus_item.php?id={$item['id']}' onclick=\"return confirm('Yakin ingin menghapus item ini?')\">Hapus</a>
          </td>";
    
    // Deskripsi
    echo "<td>{$item['deskripsi']}</td>";
    
    echo "</tr>";
    $no++;
}
?>

    </table>

   <h2>Daftar Pesanan</h2>
<table border="1">
    <tr>
        <th>ID Pesanan</th>
        <th>Nama User</th>
        <th>Alamat</th>
        <th>Tanggal Pesan</th>
        <th>Jumlah Produk</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nama_user'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['tanggal_pesan'] ?></td>
        <td><?= $row['total_jumlah'] ?: 0 ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
