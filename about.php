<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="website icon" href="img/jasuke1.png">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        line-height: 1.6;
        background-color: #f9f9f9;
        color: #333;
    }

    header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    width: 100%;
    background-color: transparent;
    z-index: 1000;
    padding: 20px 10%;
    transition: background-color 0.3s ease-in-out;
}

header:hover {
    background-color: rgba(255, 255, 255, 0.9); /* Warna latar saat hover */
}

.logo {
    cursor: pointer;
    width: 70px;
    height: auto;
    margin-left: -10px;
}

nav ul {
    display: flex;
    list-style: none;
    align-items: center;
    padding: 0;
}

nav ul li{
    margin-left: 25px;
    display: inline-block;
}

nav ul li a  {
    padding: 10px 15px;
    border-radius: 5px;
    transition: background 0.3s ease;
}

nav ul li a:hover {
    background: #a8a6a6;

}

    a {
        text-decoration: none;
        color: #333;
        transition: all 0.3s ease;
    }

    .about {
        padding: 100px 5%;
        background-color: #fff;
    }

    .section-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-title h2 {
        font-size: 36px;
        color: #333;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
        font-weight: 700;
    }

    .section-title h2:after {
        content: '';
        position: absolute;
        width: 70px;
        height: 4px;
        background-color:rgb(0, 0, 0);
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .about-content {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 60px;
    }

    .about-image {
    flex: 1;
    min-width: 50%;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.about-image img {
    width: 100%;
    height: auto; /* Biarkan gambar menyesuaikan tinggi alami */
    display: block;
    transition: transform 0.5s ease;
    object-fit: cover; /* opsional, jika ingin cropping proporsional */
}

    
    .about-image:hover img {
        transform: scale(1.05);
    }

    .about-text {
        flex: 1;
        min-width: 300px;
    }

    .about-text p {
        margin-bottom: 25px;
        font-size: 16px;
        color: #555;
        line-height: 1.8;
    }
    
    .about-text p:last-child {
        margin-bottom: 0;
    }
    
    .scroll-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
       background-color: rgb(255, 187, 0);
        color: #fff;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 999;
    }
    
    .scroll-to-top.active {
        opacity: 1;
    }
    
    .scroll-to-top:hover {
        background-color:rgb(255, 215, 82);
        transform: translateY(-5px);
    }
    
    .financial-section {
        padding: 80px 5%;
        background-color: #f9f9f9;
    }
    
    .table-container {
        width: 100%;
        overflow-x: auto;
        margin-bottom: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .financial-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        overflow: hidden;
    }
    
    .financial-table th,
    .financial-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    
    .financial-table th {
        background-color:rgb(255, 208, 107);
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .financial-table tr:hover {
        background-color: #f5f5f5;
    }
    
    .financial-table .total-row {
        background-color: #f0f0f0;
        font-weight: 600;
    }
    
    .financial-table .total-row td {
        border-top: 2px solid #ddd;
    }
    
    @media (max-width: 768px) {
        .financial-table th,
        .financial-table td {
            padding: 10px;
            font-size: 14px;
        }
    }
    
    .comment-section {
        padding: 80px 5%;
        background-color: #f5f5f5;
    }
    
    @media (max-width: 768px) {
        .about-content {
            flex-direction: column;
        }
        
        .section-title h2 {
            font-size: 28px;
        }
        
        .about {
            padding: 70px 5%;
        }
        
        /* Responsif untuk section image */
        .about-image {
            padding-top: 75%; /* Rasio yang lebih tinggi untuk tampilan mobile */
        }
    }

    footer {
    background-color: #323232;
    color: white;
    text-align: center;
    padding: 15px;
    font-size: 14px;
  }
  
  .copyright {
    text-align: center;
    padding: 15px;
    font-size: 12px;
    color: #777;
    background-color: #f5f5f5;
  }
</style>
</head>
<body>
 <header>
        <img class="logo" src="img/jasuke1.png" alt="logo" />
        <nav>
            <ul class="nav">
              <li><a href="frontpage.php">Home</a></li>
              <li><a href="frontpage.php">Bahan</a></li>
              <li><a href="frontpage.php">Menu</a></li>
              <li><a href="frontpage.php">Testimoni</a></li>
              <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
<section class="about" id="about">
    <div class="section-container">
        <div class="section-title">
            <h2>Tentang Kami</h2>
        </div>
        <div class="about-content">
            <div class="about-image">
                <img src="img/kelompok.jpg" alt="Tim Wiendy's Store">
            </div>
            <div class="about-text">
                <p>Selamat datang di Website Jarepel, tempat di mana kualitas dan kepuasan pelanggan menjadi prioritas utama kami. Didirikan pada tahun 2025, kami telah berkomitmen untuk menyediakan produk terbaik dengan pelayanan yang ramah dan profesional.</p>
                <p>Tim kami terdiri dari individu berbakat dan berdedikasi yang bekerja tanpa henti untuk memastikan setiap pelanggan mendapatkan pengalaman berbelanja yang tak terlupakan. Kami percaya bahwa keberhasilan bisnis kami adalah hasil dari hubungan yang kuat dengan pelanggan kami.</p>
                <p>Visi kami adalah menjadi destinasi belanja pilihan utama dengan terus berinovasi dan mengembangkan produk yang memenuhi kebutuhan dan harapan pelanggan. Bergabunglah dengan keluarga besar Jarepel dan rasakan perbedaannya!</p>
            </div>
        </div>
    </div>
</section>

<div class="scroll-to-top" id="scrollToTop">↑</div>

<section class="financial-section" id="keuangan">
    <div class="section-container">
        <div class="section-title">
            <h2>Laporan Keuangan</h2>
        </div>
        <div class="table-container">
            <table class="financial-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bahan</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan (Rp)</th>
                        <th>Total (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jagung</td>
                        <td>6 Buah</td>
                        <td>1 Pack Isi 2: 7.000</td>
                        <td>21.000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Susu Kental Manis</td>
                        <td>1 Kaleng</td>
                        <td>12.000</td>
                        <td>12.000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Keju</td>
                        <td>1 Batang</td>
                        <td>10.000</td>
                        <td>10.000</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Mesis Coklat</td>
                        <td>1 Pack</td>
                        <td>10.000</td>
                        <td>10.000</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Sendok</td>
                        <td>1 Pack</td>
                        <td>500</td>
                        <td>500</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Cup</td>
                        <td>15 Pcs</td>
                        <td>8.000</td>
                        <td>8.000</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Mentega</td>
                        <td>250 Gram</td>
                        <td>5.500</td>
                        <td>5.500</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="2"><strong>Total</strong></td>
                        <td>67.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="financial-section" id="keuangan">
    <div class="section-container">
        <div class="section-title">
            <h2>Menghitung Laba</h2>
        </div>
        <div class="table-container">
            <table class="financial-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Total Biaya</th>
                        <th>Jumlah Produksi</th>
                        <th>Harga Per Porsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Rp.68.000</td>
                        <td>15 Porsi</td>
                        <td>Rp.6.000</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="2"><strong>Laba kotor</strong></td>
                        <td>15 x Rp.6.000 = Rp.75.000</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="2"><strong>Laba Bersih</strong></td>
                        <td>Rp. 75.000 - Rp. 67.000 = Rp. 8.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
 <footer>
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; max-width: 800px; margin: auto;">
            <!-- Google Maps -->
            <div style="flex: 1; min-width: 200px;">
                <h3 style="font-size: 16px; font-family:sans-serif">Lokasi Kami</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d247.34013247100046!2d112.7334544!3d-7.3041239!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb9e994eb1d1%3A0x672bc3dd7b0b485f!2sJl.%20Karangrejo%20Timur%20No.2%2C%20RW.15%2C%20Wonokromo%2C%20Kec.%20Wonokromo%2C%20Surabaya%2C%20Jawa%20Timur%2060243!5e0!3m2!1sen!2sid!4v1747886776629!5m2!1sen!2sid" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<script>
    // Script untuk scroll-to-top button
    const scrollToTopBtn = document.getElementById("scrollToTop");
    
    window.addEventListener("scroll", function() {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add("active");
        } else {
            scrollToTopBtn.classList.remove("active");
        }
    });
    
    scrollToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>
</body>
</html>