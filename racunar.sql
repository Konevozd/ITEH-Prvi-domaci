-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 05:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `racunari`
--

-- --------------------------------------------------------

--
-- Table structure for table `kompanija`
--

CREATE TABLE `kompanija` (
  `kompanijaID` int(11) NOT NULL,
  `nazivKompanije` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompanija`
--

INSERT INTO `kompanija` (`kompanijaID`, `nazivKompanije`) VALUES
(1, 'AMD'),
(2, 'Intel'),
(3, 'Xiaomi'),
(4, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `racunar`
--

CREATE TABLE `racunar` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `specifikacija` varchar(300) NOT NULL,
  `kompanijaID` int(11) DEFAULT NULL,
  `tipId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `racunar`
--

INSERT INTO `racunar` (`id`, `naziv`, `specifikacija`, `kompanijaID`, `tipId`) VALUES
(1, 'Prime Pro Fighter Računar', 'Tip procesora:AMD Ryzen 5 RAM memorija:16GB DDR4 3200 MHz HDD / SSD:500GB SSD Model grafičke kartice:AMD Radeon RX 6600', 1, 1),
(2, 'MacBook Air 13 Retina Silver ', 'Model procesora:Apple M1 do 3.2GHz Dijagonala ekrana:13.3\" Tip grafičke kartice:Integrisana Apple M1 RAM (memorija):8GB HDD SSD:256GB SSD', 4, 3),
(3, 'Xiaomi Mi 9T Pro 64GB', 'Masa:191 grama Dimenzije:156.7 x 74.3 x 8.8mm Operativni:Android 9.0 Pie Selfi:20Mpx Glavna: 48Mpx + 13Mpx + 8Mpx Memorija:6GB RAM, 64GB interne memorije', 3, 2),
(4, 'Desk G64058G240SW10P Računar', 'Tip procesora:Intel Pentium Processor RAM memorija:8GB DDR4 3200 MHz HDD / SSD:240GB SSD Model grafičke kartice:Integrisana UHD 610', 2, 1),
(5, 'Aurora Pro Arcadia', 'Tip procesora:AMD Ryzen 5\r\nRAM memorija:16GB DDR4 3200 MHz\r\nHDD / SSD:500GB SSD\r\nModel grafičke kartice:Integrisana Radeon Graphics', 1, 1),
(6, 'Aurora Lider MAX 1607 Računar', 'Tip procesora:Intel Pentium Processor\r\nRAM memorija:8GB DDR4 2666 MHz\r\nHDD / SSD:240GB SSD\r\nModel grafičke kartice:Integrisana UHD 610', 2, 1),
(7, 'Apple LideriPhone 14 Pro Max 512GB', 'RAM 6GB LPDDR4X 0.6V 4Gbps 4 kamere, foto 48Mpx, video foto 8Mpx glavni senzor 10.3mmÂ² (3.9x2.6mm) selfi kamera rupa u ekranu (Hole)', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

CREATE TABLE `tip` (
  `tipID` int(11) NOT NULL,
  `nazivTipa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`tipID`, `nazivTipa`) VALUES
(1, 'Stoni racunar'),
(2, 'Mobilni racunar'),
(3, 'Laptop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kompanija`
--
ALTER TABLE `kompanija`
  ADD PRIMARY KEY (`kompanijaID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `racunar`
--
ALTER TABLE `racunar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`tipID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kompanija`
--
ALTER TABLE `kompanija`
  MODIFY `kompanijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `racunar`
--
ALTER TABLE `racunar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tip`
--
ALTER TABLE `tip`
  MODIFY `tipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
