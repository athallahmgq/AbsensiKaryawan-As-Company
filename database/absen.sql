-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2024 at 02:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `name`) VALUES
(1, 'Jajaran Direksi'),
(2, 'Direktur Utama'),
(3, 'Direktur IT'),
(4, 'HRD'),
(5, 'Manajer'),
(6, 'Software Engineer'),
(7, 'Web Development'),
(8, 'Cyber Security'),
(9, 'Data Analyst'),
(10, 'UI/UX Designer'),
(11, 'Sekertaris Perusahaan'),
(12, 'Administrasi '),
(13, 'Creative Team'),
(14, 'Planner Team'),
(15, 'Cleaning Service');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status1_id` varchar(10) NOT NULL,
  `jabatan_id` varchar(10) NOT NULL,
  `jam_masuk` timestamp NULL DEFAULT current_timestamp(),
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `name`, `status1_id`, `jabatan_id`, `jam_masuk`, `foto`) VALUES
(232324, 'Athallah Muhammad Ghiyast Qintara', '1', '1', '2024-11-13 14:24:39', '6734b6a7a0fa3.jpeg'),
(432453, 'Toni Kroos', '1', '5', '2024-11-14 01:29:35', '6735527fbf93c.jpg'),
(678887, 'zaky', '1', '15', '2024-11-19 07:37:26', '673c40365b871.png'),
(869899, 'majot', '1', '15', '2024-11-18 04:29:13', '673ac299f39ad.jpeg'),
(980909, 'leng leng', '1', '6', '2024-11-18 01:28:52', '673a9854686bf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `status1`
--

CREATE TABLE `status1` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status1`
--

INSERT INTO `status1` (`id`, `name`) VALUES
(1, 'Sehat'),
(2, 'Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role_id`) VALUES
(1, 'admin', 'Admin', '$2y$10$MOX4uJbyUBFnPJJN9XPeR.IMVfvKuLoW7dUgJbRPS/1Gyo980pw2K', 1),
(2, 'karyawan', 'Karyawan', '', 2),
(10, 'Athallah', 'Athallah Muhammad', '$2y$10$MOX4uJbyUBFnPJJN9XPeR.IMVfvKuLoW7dUgJbRPS/1Gyo980pw2K', 2),
(19, 'majot', 'majot', '$2y$10$7YvcFnhveX.N9CSZgORjROlQSLVL8p.isXAN0shLTpnhCTbMg7TdC', 2),
(20, 'keydo', 'keydo', '$2y$10$K32H8Hb3nRHx6Ww.7yCrrOottDQKXJcbGRJoZDb3PWETJPzprcU7O', 2),
(21, 'zaky', 'zaky', '$2y$10$mTIy7d3ljURzT8WbKCkrAOf6QBEWWce38yOmhgShin3LyrrXgVMe6', 2),
(22, 'tala', 'tala', '$2y$10$CuuqnbuMiGJn8qmaC4Y0c.78Cjfqt3JcJrVdGH38kjzM5weoTsdTa', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `class_id` (`status1_id`),
  ADD KEY `major_id` (`jabatan_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status1`
--
ALTER TABLE `status1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status1`
--
ALTER TABLE `status1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
