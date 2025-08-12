<?php 
include 'config.php'; 
?>
<?php
include 'config.php';

$query = "SELECT * FROM products";
$items = mysqli_query($conn, $query);

if (!$items) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarepel</title>
    <link rel="website icon" href="img/jasuke1.png">
    <link rel="stylesheet" href="jasuke.css">
</head>
<body>
    <header>
        <img class="logo" src="img/jasuke1.png" alt="logo" />
                <nav>
                    <ul class="nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">Bahan</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#komen">Comment</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a onclick="toggleKeranjang()" id="cartButton">🛒</a></li>
                     <div id="keranjang" class="keranjang-section" style="display: none;">
                    <!-- Isi keranjang akan dirender di sini -->
                    </div>
                    </ul>
                </nav>
    </header>
    <section class="hero" id="home">
        <div class="hero-content"></div>
        <div class="hero-image">
          <img src="img/banner.jpg" alt="Hero Image" />
        </div>
    </section>

    <section class="product-section" id="menu">
        <div class="container">
            <div class="section-title">
              <h2>Menu</h2>
            </div>
            <div class="product-section">
                <?php while($item = mysqli_fetch_assoc($items)): ?>
                <div class="product-row">
                    <div class="product-image">
                        <img src="img/<?= $item['gambar'] ?>" alt="Product Image">
                    </div>
                    <div class="product-text">
                        <h2 class="product-title"><?= $item['nama'] ?></h2>
                        <p><?= $item['deskripsi'] ?></p>
                        <p>Harga: Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
                        <label for="qty">Jumlah:</label>
                        <input type="number" class="qty-input" min="1" value="1">
                        <button class="menu-button" onclick="addToCart(<?= $item['id'] ?>, '<?= $item['nama'] ?>', <?= $item['harga'] ?>, this)">Add to Cart</button>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="section-container">
            <div class="section-title">
                <h2>Bahan-Bahan Kami</h2>
            </div>
            <div class="about-content">
                <div class="about-image">
                    <img src="img/bahan.png" alt="Wiendy's Store">
                </div>
                <div class="about-text">
                    <p>Jasuke adalah camilan lezat yang terbuat dari kombinasi bahan-bahan sederhana namun kaya rasa...</p>
                </div>
            </div>
        </div>
    </section>

    <div class="scroll-to-top" id="scrollToTop">↑</div>

    <section class="comment-section" id="komen">
        <h2>Tinggalkan Komentar Anda</h2>
        <form id="commentForm" class="comment-form">
            <input type="text" id="username" placeholder="Nama Anda" required>
            <textarea id="comment" placeholder="Tulis komentar..." rows="4" required></textarea>
            <button type="submit">Kirim Komentar</button>
        </form>
        <div class="testimonial-list" id="commentsContainer"></div>
    </section>

    <footer>
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; max-width: 800px; margin: auto;">
            <div style="flex: 1; min-width: 200px;">
                <h3 style="font-size: 16px; font-family:sans-serif">Lokasi Kami</h3>
                <iframe src="https://www.google.com/maps/embed?..." width="220" height="220" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div style="flex: 1; min-width: 200px; text-align: center;">
                <h3 style="font-size: 16px; font-family: sans-serif;">Operational Hours</h3>
                <p style="font-family: sans-serif; margin: 5px 0;">Senin - Jumat: 09:00 - 18:00</p>
                <p style="font-family: sans-serif; margin: 5px 0;">Sabtu - Minggu: 10:00 - 16:00</p>
            </div>
            <div style="flex: 1; min-width: 200px; text-align: center;">
                <h3 style="font-size: 16px; font-family: sans-serif;">Follow Us</h3>
                <a href="https://www.instagram.com/_frkze/" target="_blank" style="color: white; text-decoration: none; font-family: sans-serif; display: block; margin-top: 5px;">
                    <img src="img/social.png" alt="Instagram" style="width: 24px; height: 24px;">
                </a>
            </div>
        </div>
    </footer>

    <div class="copyright">
        © 2025 Jarepel's. All rights reserved.
    </div>
<script src="index.js"></script>
</body>
</html>
