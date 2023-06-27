-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2023 pada 10.00
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `images`
--

INSERT INTO `images` (`image_id`, `item_id`, `image_url`, `created_at`) VALUES
(1, 1, 'images/2sajjd3jwrnohn0gtd-16841482756202.jpg', '2023-06-27 02:47:55'),
(4, 4, 'images/resep-cireng-lezat.jpeg', '2023-06-27 03:43:07'),
(8, 11, 'images/ginjal.jpg', '2023-06-27 05:13:57'),
(9, 14, 'images/AIM_9L_Sidewinder_(modified)_copy.jpg', '2023-06-27 05:38:55'),
(10, 15, 'images/keqing.jpg', '2023-06-27 05:41:52'),
(11, 16, 'images/Kambing.webp', '2023-06-27 07:58:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` date NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `description`, `price`, `created_at`, `image_url`) VALUES
(1, 'dedek manis super lembut', 'mofu mofu', '1700', '0000-00-00', ''),
(4, 'cireng lezat dan bergizi', 'cireng lembut lejad dan beergiji asli pluto 100%', '1', '0000-00-00', ''),
(11, 'ginjal aseliii', 'ginjal tikus aseli', '13000', '0000-00-00', ''),
(14, 'AIM-9 Sidewinder', 'air to air missile', '25000', '0000-00-00', ''),
(15, 'pacar cina kecil', 'pacar cina 100% wangi', '1500', '0000-00-00', ''),
(16, 'kambing kurban', 'kambing kurban berkualitas bukan glonggongan', '500', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
