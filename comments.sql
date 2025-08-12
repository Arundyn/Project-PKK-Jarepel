-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2025 pada 08.44
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comments`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`, `created_at`) VALUES
(23, 'firly', 'website nya bagus,responsif,dan keren', '2025-08-05 08:21:26'),
(24, 'Dika', 'aku sangat suka dengan jasuke nya', '2025-08-06 12:29:14'),
(25, 'arel', 'jasuke nya enak dan mantap', '2025-08-07 02:49:48'),
(26, 'wildan', 'aku cinta jasuke', '2025-08-11 05:22:25'),
(27, 'Arkana', 'Mewing bngt njir website nya', '2025-08-11 13:47:05'),
(28, 'dilon', 'aoidowdod', '2025-08-12 05:59:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items_pesanan`
--

CREATE TABLE `items_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `items_pesanan`
--

INSERT INTO `items_pesanan` (`id`, `id_pesanan`, `id_product`, `jumlah`, `subtotal`) VALUES
(38, 13, 7, 5, 50000.00),
(39, 13, 8, 1, 10000.00),
(40, 14, 7, 2, 20000.00),
(41, 14, 1, 6, 60000.00),
(42, 14, 8, 2, 20000.00),
(43, 15, 7, 4, 40000.00),
(44, 15, 1, 11, 110000.00),
(45, 15, 8, 4, 40000.00),
(46, 16, 1, 3, 30000.00),
(47, 16, 7, 2, 20000.00),
(48, 16, 8, 1, 10000.00),
(49, 17, 1, 2, 20000.00),
(50, 17, 7, 1, 10000.00),
(51, 18, 8, 1, 10000.00),
(52, 19, 7, 1, 10000.00),
(53, 19, 1, 1, 10000.00),
(54, 19, 8, 5, 50000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `alamat` text NOT NULL,
  `tanggal_pesan` datetime DEFAULT current_timestamp(),
  `jumlah` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_user`, `total`, `alamat`, `tanggal_pesan`, `jumlah`, `produk_id`) VALUES
(13, 'Ernando Torez', 80000.00, 'bali selatan', '2025-08-11 00:00:00', 2, 1),
(14, 'Kenny', 100000.00, 'yang penting sehat', '2025-08-11 00:00:00', 2, 7),
(15, 'Pascalis', 190000.00, 'anjay alok', '2025-08-11 00:00:00', 4, 7),
(16, 'Dilon dan vinell', 60000.00, 'jl semolowaru', '2025-08-11 00:00:00', 3, 1),
(17, 'dilon', 30000.00, 'sembarang', '2025-08-12 00:00:00', 2, 1),
(18, 'firly ari w.m', 10000.00, 'Sunda ', '2025-08-12 00:00:00', 1, 8),
(19, 'firly', 70000.00, 'jl.smkn1', '2025-08-12 00:00:00', 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `gambar`, `deskripsi`) VALUES
(1, 'Jasuke Coklat', 10000.00, 'coklat.jpg', 'Jasuke dengan varian rasa coklat yang mantap dan lezat, cocok untuk dimakan saat siang hari'),
(7, 'Jasuke Keju', 10000.00, 'keju.jpg', 'jasuke dengan varian keju menghadirkan cita rasa asin dan gurih pada jasuke anda!'),
(8, 'Jasuke Coju', 10000.00, 'coklat keju.jpg', 'Nikmatnya perbaduan antara coklat dan keju pada varian jasuke Coju!!');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items_pesanan`
--
ALTER TABLE `items_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesanan_produk` (`produk_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `items_pesanan`
--
ALTER TABLE `items_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `items_pesanan`
--
ALTER TABLE `items_pesanan`
  ADD CONSTRAINT `items_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`),
  ADD CONSTRAINT `items_pesanan_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_produk` FOREIGN KEY (`produk_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
