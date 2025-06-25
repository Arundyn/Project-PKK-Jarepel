<?php 
include 'config.php'; 
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
              <li><a href="#testi">Testimoni</a></li>
              <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <section class="hero" id="home">
        <div class="hero-content">
          </div>
        </div>
        <div class="hero-image">
          <img src="img/banner.jpg" alt="Hero Image" />
        </div>
      </section>

      <section class="product-section" id="menu">
        <div class="container">
            <div class="section-title">
              <h2>Menu</h2>
            </div>
            <div class="product-row">
                <div class="product-image">
                    <img src="img/coklat.jpg" alt="Product Image">
                </div>
                <div class="product-text">
                    <h2 class="product-title">Jasuke Coklat</h2>
                    <p>Manisnya jagung dan susu berpadu sempurna dengan taburan coklat meses yang meleleh di mulut. Cocok untuk kamu pencinta rasa manis yang klasik!</p>
                    <button class="menu-button" onclick="sendToWhatsApp(this)">Lihat Detail</button>
                </div>
            </div>
            
            <div class="product-row">
                <div class="product-image">
                    <img src="img/keju.jpg" alt="Product Image">
                </div>
                <div class="product-text">
                    <h2 class="product-title">Jasuke Keju</h2>
                    <p>Perpaduan jagung hangat dengan keju cheddar parut dan aroma mentega menciptakan sensasi gurih yang bikin nagih. Favorit sejuta umat!</p>
                    <button class="menu-button" onclick="sendToWhatsApp(this)">Lihat Detail</button>
                </div>
            </div>
            
            <div class="product-row">
                <div class="product-image">
                    <img src="img/coklat keju.jpg" alt="Product Image">
                </div>
                <div class="product-text">
                    <h2 class="product-title">Jasuke Coju</h2>
                    <p>Kombinasi lengkap untuk kamu yang ingin semuanya! Manis, gurih, dan creamy dalam satu cup—dengan topping coklat dan keju yang melimpah.</p>
                    <button class="menu-button" onclick="sendToWhatsApp(this)">Lihat Detail</button>
                </div>
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
                    <p>Jasuke adalah camilan lezat yang terbuat dari kombinasi bahan-bahan sederhana namun kaya rasa. Disajikan dalam cup praktis yang memudahkan untuk dinikmati di mana saja, jasuke mengandalkan jagung manis yang telah direbus hingga empuk sebagai bahan utamanya. Jagung kemudian dicampur dengan mentega yang memberikan aroma gurih dan tekstur yang lebih lembut.</p>
                    <p>Untuk menambah cita rasa, susu kental manis ditambahkan di atas jagung, memberikan sentuhan manis dan creamy yang menggoda. Taburan keju parut menjadi pelengkap sempurna, memberikan rasa gurih dan tekstur lembut yang berpadu dengan manisnya jagung dan susu. Beberapa varian juga menambahkan coklat meses sebagai topping, menambah rasa manis yang unik dan memperkaya rasa secara keseluruhan.</p>
                    <p>Dengan perpaduan rasa manis, gurih, dan tekstur yang beragam, Jasuke menjadi pilihan camilan yang disukai berbagai kalangan.</p>
                </div>
            </div>
        </div>
      </section>

      <div class="scroll-to-top" id="scrollToTop">↑</div>

      <section class="comment-section" id="testi">
  <h2>Tinggalkan Komentar Anda</h2>

  <form id="commentForm" class="comment-form">
    <input type="text" id="username" placeholder="Nama Anda" required>
    <textarea id="comment" placeholder="Tulis komentar..." rows="4" required></textarea>
    <button type="submit">Kirim Komentar</button>
  </form>

  <div class="testimonial-list" id="commentsContainer">
    <!-- Komentar akan muncul di sini -->
  </div>
</section>  
      
      <footer>
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; max-width: 800px; margin: auto;">
            <!-- Google Maps -->
            <div style="flex: 1; min-width: 200px;">
                <h3 style="font-size: 16px; font-family:sans-serif">Lokasi Kami</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d247.34013247100046!2d112.7334544!3d-7.3041239!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb9e994eb1d1%3A0x672bc3dd7b0b485f!2sJl.%20Karangrejo%20Timur%20No.2%2C%20RW.15%2C%20Wonokromo%2C%20Kec.%20Wonokromo%2C%20Surabaya%2C%20Jawa%20Timur%2060243!5e0!3m2!1sen!2sid!4v1747886776629!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
            <!-- Waktu Operasional -->
            <div style="flex: 1; min-width: 200px; text-align: center;">
                <h3 style="font-size: 16px; font-family: sans-serif;">Operational Hours</h3>
                <p style="font-family: sans-serif; margin: 5px 0;">Senin - Jumat: 09:00 - 18:00</p>
                <p style="font-family: sans-serif; margin: 5px 0;">Sabtu - Minggu: 10:00 - 16:00</p>
            </div>
            
            <!-- Social Media -->
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
</body>
<script src="index.js"></script>
</html>