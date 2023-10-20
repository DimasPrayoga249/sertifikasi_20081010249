-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2023 pada 15.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(6) UNSIGNED NOT NULL,
  `payment_price` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `transfer_from` varchar(100) DEFAULT NULL,
  `transfer_to` varchar(100) DEFAULT NULL,
  `transfer_to_account_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_price`, `payment_date`, `picture`, `transfer_from`, `transfer_to`, `transfer_to_account_no`) VALUES
(1, 1, 51000000.00, '2023-10-20', 'uploads/Bukti1.png', '0911900808', 'Dimas Satria Prayoga', '0777661374');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrations`
--

CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `paypal_id` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `registrations`
--

INSERT INTO `registrations` (`id`, `username`, `full_name`, `password`, `email`, `date_of_birth`, `gender`, `address`, `city`, `contact_no`, `paypal_id`, `registration_date`) VALUES
(1, 'johndoe123', 'John Doe', '$2y$10$6EB.mesL.avOdee.c3lU1eS5Rp9xTi2oBfsvCU3APgY1c5F2h.DTq', 'johndoe@example.com', '2000-01-01', 'Male', '123 Main Street', 'Surabaya', '62123456789', 'johndoe.paypal@example.com', '2023-10-20 13:10:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) NOT NULL,
  `order_id` int(6) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`review_id`, `order_id`, `user_id`, `rating`, `comment`, `product_image`, `timestamp`) VALUES
(1, 1, 1, 5, 'Pengiriman Cepat', 'uploads/ProdukDM7000.jpeg', '2023-10-20 13:47:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `whatastore_categories`
--

CREATE TABLE IF NOT EXISTS `whatastore_categories` (
  `id` int(6) UNSIGNED NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `whatastore_categories`
--

INSERT INTO `whatastore_categories` (`id`, `category`) VALUES
(1, 'Anesthesia Machine'),
(2, 'Blood Bank'),
(3, 'CTG Fetal'),
(4, 'Defibrilator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `whatastore_config`
--

CREATE TABLE IF NOT EXISTS `whatastore_config` (
  `id` int(6) UNSIGNED NOT NULL,
  `config` varchar(150) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `whatastore_config`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `whatastore_messages`
--

CREATE TABLE IF NOT EXISTS `whatastore_messages` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `message` varchar(1300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `whatastore_messages`
--

INSERT INTO `whatastore_messages` (`id`, `date`, `message`) VALUES
(1, '1697807090795', 'ORDER ID: 2281/2023-10-20 20:4:12\nDATE: Fri Oct 20 2023 20:04:12 GMT+0700 (Western Indonesia Time)\n- DEFIBRILATOR DM 7000 x 1 = Rp  51000000\nTotal Semua = Rp  51000000\nNama: John Doe\nNomor Telepon: 62123456789\nAlamat: 123 Main Street\nMetode Pengiriman: Transfer ATM\nORDER NOTES: Segera di proses ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `whatastore_posts`
--

CREATE TABLE IF NOT EXISTS `whatastore_posts` (
  `id` int(6) UNSIGNED NOT NULL,
  `postid` varchar(70) NOT NULL,
  `catid` int(6) NOT NULL,
  `normalprice` float NOT NULL,
  `discountprice` float NOT NULL,
  `title` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` varchar(150) NOT NULL,
  `options` varchar(200) NOT NULL,
  `picture` varchar(300) NOT NULL,
  `moreimages` text NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `whatastore_posts`
--

INSERT INTO `whatastore_posts` (`id`, `postid`, `catid`, `normalprice`, `discountprice`, `title`, `time`, `options`, `picture`, `moreimages`, `content`) VALUES
(1, 'lqtfjcfmvv', 4, 51000000, 0, 'DEFIBRILATOR DM 7000', '1697806244241', '', 'yw0kizvclh.jpg', 'pictures/mvcs7wv9pj.jpg,', '<p><span style=\"color: #696f6f; font-family: \'Open Sans\', Helvetica, Arial, sans-serif;\">DM 7000 adalah perangkat defibrillator, yang dapat memenuhi kebutuhan klinis Anda dari Basic Life Support (BLS) ke Advanced Cardiac Life Support (ACLS).</span></p>'),
(2, 'geplbenulc', 4, 20000000, 0, 'DEFIBRILATOR AED HR 501', '1697806478995', '', 'kutm4ikywv.jpg', 'pictures/mzcjf2r5sq.jpg,', '<p><strong style=\"box-sizing: border-box; color: #696f6f; font-family: \'Open Sans\', Helvetica, Arial, sans-serif;\">AED (Automated External Defibrillators)</strong><br style=\"box-sizing: border-box; color: #696f6f; font-family: \'Open Sans\', Helvetica, Arial, sans-serif;\" /><span style=\"color: #696f6f; font-family: \'Open Sans\', Helvetica, Arial, sans-serif;\">Membantu memulihkan fungsi jantung normal pada penyakit jantung akut, seperti serangan jantung akut, dengan analisis fungsi jantung dan, jika perlu, terjadi kejut listrik.</span></p>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `whatastore_categories`
--
ALTER TABLE `whatastore_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `whatastore_config`
--
ALTER TABLE `whatastore_config`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `whatastore_messages`
--
ALTER TABLE `whatastore_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `whatastore_posts`
--
ALTER TABLE `whatastore_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `whatastore_categories`
--
ALTER TABLE `whatastore_categories`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `whatastore_config`
--
ALTER TABLE `whatastore_config`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `whatastore_messages`
--
ALTER TABLE `whatastore_messages`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `whatastore_posts`
--
ALTER TABLE `whatastore_posts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `order_payments` FOREIGN KEY (`order_id`) REFERENCES `whatastore_messages` (`id`);

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `order_reviews` FOREIGN KEY (`order_id`) REFERENCES `whatastore_messages` (`id`),
  ADD CONSTRAINT `user_reviews` FOREIGN KEY (`user_id`) REFERENCES `registrations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
