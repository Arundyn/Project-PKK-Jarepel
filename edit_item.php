<?php
include 'config.php';

$id = $_GET['id'];
$item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = $id"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Edit Item</h1>
    <form action="update_item.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $item['id'] ?>">

        <label>Nama Item:</label><br>
        <input type="text" name="nama" value="<?= $item['nama'] ?>" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?= $item['harga'] ?>" step="0.01" required><br><br>

        <label>Gambar Lama:</label><br>
        <?php if ($item['gambar']): ?>
            <img src="img/<?= $item['gambar'] ?>" width="100"><br>
        <?php else: ?>
            Tidak ada gambar<br>
        <?php endif; ?>
        <input type="file" name="gambar"><br><br>

        <textarea name="deskripsi"><?= $item['deskripsi'] ?></textarea>

        <button type="submit">Update Item</button>
    </form>
</body>
</html>
