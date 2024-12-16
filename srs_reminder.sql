-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Des 2024 pada 16.26
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srs_reminder`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`) VALUES
(1, 'ari', 'admin@akuari.my.id', '08976388612'),
(2, 'rizal', 'rizal@canvaku.my.id', '0895333016753');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder`
--

CREATE TABLE `reminder` (
  `id` int NOT NULL,
  `reminder_title` varchar(255) NOT NULL,
  `reminder_description` text,
  `reminder_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `reminder`
--

INSERT INTO `reminder` (`id`, `reminder_title`, `reminder_description`, `reminder_date`, `created_at`, `status`) VALUES
(5, 'tes', 'bayar', '2024-12-14', '2024-12-14 12:27:06', 1),
(6, 'stnk', 'Perpanjang STNK MOTOR G 231 GG Pada tanggal 10 maret 1999', '2024-12-16', '2024-12-14 13:02:18', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder_contact`
--

CREATE TABLE `reminder_contact` (
  `id` int NOT NULL,
  `reminder_id` int DEFAULT NULL,
  `contact_id` int DEFAULT NULL,
  `contact_type` enum('email','phone') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `reminder_contact`
--

INSERT INTO `reminder_contact` (`id`, `reminder_id`, `contact_id`, `contact_type`) VALUES
(18, 5, 1, 'email'),
(19, 6, 1, 'email'),
(20, 6, 2, 'email');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'yogi', '$2y$10$/h6zxphvCB0RA10GhqXWQerWoQGIyBQlM9v2Upt8jsMgXABtWVVi.', 'admin', '2024-12-14 12:14:35'),
(2, 'ari', '$2y$10$UaJhRS7PHUnGDy.Og2v9WupO/KXxcG3qdS3hxw/NWMa8c.ZzvoYRu', 'user', '2024-12-15 16:04:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reminder_contact`
--
ALTER TABLE `reminder_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminder_id` (`reminder_id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `reminder_contact`
--
ALTER TABLE `reminder_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reminder_contact`
--
ALTER TABLE `reminder_contact`
  ADD CONSTRAINT `reminder_contact_ibfk_1` FOREIGN KEY (`reminder_id`) REFERENCES `reminder` (`id`),
  ADD CONSTRAINT `reminder_contact_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
