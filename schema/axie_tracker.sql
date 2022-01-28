-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 10:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axie_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `scholar_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `ronin_address` varchar(255) NOT NULL,
  `share` int(11) NOT NULL DEFAULT 50,
  `quota` int(11) NOT NULL DEFAULT 100,
  `name` varchar(255) NOT NULL DEFAULT 'Assign scholar name',
  `email` varchar(255) NOT NULL DEFAULT 'Assign scholar email',
  `contact` varchar(255) NOT NULL DEFAULT 'Assign scholar contact',
  `address` varchar(255) NOT NULL DEFAULT 'Assign scholar address',
  `image_location` varchar(255) NOT NULL DEFAULT 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png',
  `valid_id` varchar(255) NOT NULL DEFAULT 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg',
  `slp_chart` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholar`
--

INSERT INTO `scholar` (`scholar_id`, `manager_id`, `ronin_address`, `share`, `quota`, `name`, `email`, `contact`, `address`, `image_location`, `valid_id`, `slp_chart`) VALUES
(1, 9, '0x2c4ec27f2c134804eb0b5ef322a3b2594e52931d', 50, 150, 'Franco De Guzman', 'franco.deguzman@gmail.com', '12312312', '[removed]alert&#40;\'123A\'&#41;[removed]', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/scholar/1.jpg', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/id/1.png', '[{\"slp\":204,\"time\":1642806000},{\"slp\":246,\"time\":1642892400},{\"slp\":265,\"time\":1642978800},{\"slp\":123,\"time\":1643065200},{\"slp\":183,\"time\":1643151600},{\"slp\":195,\"time\":1643238000},{\"slp\":219,\"time\":1643324400}]'),
(2, 9, '0x5e0416928b459f380dde1c078fd41204fb7d209d', 40, 100, 'Luke Juniel Galicia', 'lukejuniel.galicia@tup.edu.ph', '092941411', '[removed]alert&#40;1&#41;[removed]', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/scholar/2.jpg', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/id/2.jpg', '[{\"slp\":187,\"time\":1642806000},{\"slp\":216,\"time\":1642892400},{\"slp\":165,\"time\":1642978800},{\"slp\":142,\"time\":1643065200},{\"slp\":141,\"time\":1643151600},{\"slp\":169,\"time\":1643238000},{\"slp\":171,\"time\":1643324400}]'),
(13, 9, '0x1655dc224957d3d8a5dc6a48997e9ebd641a62fc', 40, 180, 'Austin', 'austin@gmail.com', '11111111', 'address nya di ko alam pero lalagay ko parin in case lang', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/scholar/13.jpg', 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg', '[{\"slp\":186,\"time\":1642806000},{\"slp\":150,\"time\":1642892400},{\"slp\":186,\"time\":1642978800},{\"slp\":167,\"time\":1643065200},{\"slp\":201,\"time\":1643151600},{\"slp\":165,\"time\":1643238000},{\"slp\":221,\"time\":1643324400}]'),
(30, 9, '0x6dbd75620928d6a7db3e16e32e1d51c7b5c50828', 40, 100, 'Franco deguzman', 'franco@gmail.com', '09999912123', '[removed]alert&#40;1&#41;[removed]', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/scholar/30.png', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/id/30.png', '[{\"slp\":226,\"time\":1642806000},{\"slp\":189,\"time\":1642892400},{\"slp\":195,\"time\":1642978800},{\"slp\":195,\"time\":1643065200},{\"slp\":246,\"time\":1643151600},{\"slp\":252,\"time\":1643238000},{\"slp\":217,\"time\":1643324400}]'),
(33, 9, '0x2925c2626e9eb5232e862ebd379d0585b58c2111', 40, 100, 'sample name', 'sample@gmail.com', '12312312', 'sample address', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/scholar/33.jpg', 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg', '[{\"slp\":89,\"time\":1642806000},{\"slp\":100,\"time\":1642892400},{\"slp\":104,\"time\":1642978800},{\"slp\":85,\"time\":1643065200},{\"slp\":81,\"time\":1643151600},{\"slp\":76,\"time\":1643238000},{\"slp\":1,\"time\":1643324400}]'),
(36, 9, '0x3f4ff4264a7b2fc8aa5b2a3a0ab4fb3f1e3281e3', 50, 100, 'Assign scholar name', 'Assign scholar email', 'Assign scholar contact', 'Assign scholar address', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png	', 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg', '[{\"slp\":218,\"time\":1642806000},{\"slp\":0,\"time\":1642892400},{\"slp\":195,\"time\":1642978800},{\"slp\":66,\"time\":1643065200},{\"slp\":0,\"time\":1643151600},{\"slp\":0,\"time\":1643238000},{\"slp\":0,\"time\":1643324400}]'),
(37, 9, '0xa4e1512769726aada2b857bc93315feac0fda3bf', 50, 100, 'Vann Chezter Lizam', 'lizam@gmail.com', '09992131', 'asdfsfsafasdf', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/scholar/37.png', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/id/37.png', '[{\"slp\":126,\"time\":1642806000},{\"slp\":129,\"time\":1642892400},{\"slp\":141,\"time\":1642978800},{\"slp\":135,\"time\":1643065200},{\"slp\":177,\"time\":1643151600},{\"slp\":201,\"time\":1643238000},{\"slp\":0,\"time\":1643324400}]'),
(38, 9, '0xf3427e68da3936ebf414f4d0d81abbd9316b6def', 50, 100, 'Assign scholar name', 'Assign scholar email', 'Assign scholar contact', 'Assign scholar address', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png	', 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg', '[{\"slp\":231,\"time\":1642806000},{\"slp\":171,\"time\":1642892400},{\"slp\":231,\"time\":1642978800},{\"slp\":186,\"time\":1643065200},{\"slp\":207,\"time\":1643151600},{\"slp\":174,\"time\":1643238000},{\"slp\":141,\"time\":1643324400}]'),
(42, 11, '0x68437d4dc7948772971a25b3df593c64efe425d4', 50, 100, 'Assign scholar name', 'Assign scholar email', 'Assign scholar contact', 'Assign scholar address', 'https://www.seekpng.com/png/detail/428-4287240_no-avatar-user-circle-icon-png.png', 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg', '[{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":126,\"time\":1643151600},{\"slp\":156,\"time\":1643238000}]'),
(44, 13, '0x9aeca74f7c6882a308ccc530e8c6c75bd2711010', 50, 100, 'Luke Juniel Galicia', 'luke@gmail.com', '11111111', '[removed]alert&#40;[removed]&#41;[removed]', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/scholar/44.jpg', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/id/44.png', '[{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":133,\"time\":1643238000},{\"slp\":156,\"time\":1643324400}]'),
(48, 13, '0x8dcb35f9eb62f27d9e5db67d62c7e3e7fa529caa', 50, 100, 'Assign scholar name', 'Assign scholar email', 'Assign scholar contact', 'Assign scholar address', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png', 'https://images.assetsdelivery.com/compings_v2/photoplotnikov/photoplotnikov1610/photoplotnikov161000024.jpg', '[{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":0,\"time\":1640995200},{\"slp\":null,\"time\":1643324400}]');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `difference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `difference`) VALUES
(1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_location` varchar(255) NOT NULL DEFAULT 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png',
  `difference` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `first_name`, `last_name`, `password`, `image_location`, `difference`) VALUES
(9, 'bagao@gmail.com', 'bagong pangalan', 'sample', '$2y$10$PxOnRBnwpyLdwQ6fzduoJ.HcsJTTjPZLWN8JSGcwhhsDnNaaB2aYK', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/profile/9.png', 27),
(10, 'b@gmail.com', 'my neaaaasd', 'nameasdasdas', '$2y$10$fkylYwwzoO7O957eDKcejumWbk5QxfyntnR9ABj5dwEyQfPdGpD9C', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/profile/10.png', 25),
(11, 'sample@gmail.com', 'bago dadada', 'heeheasd', '$2y$10$w6UwIdq.7Q0/Gu6zK27xa.YHEmDFn8He9hxLmQkehQE5eA.RRxOyC', 'http://localhost/axie-management-tracker/Home/get_image/?path=uploads/profile/11.jpg', 26),
(12, 'tes@gmail.com', 'test', 'set', '$2y$10$dWjoUQjAmqabFW3UqaFaZOSu2.mdBxpp4lP6aG9YOBIX31aaJj48K', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png', 25),
(13, 'new@gmail.com', 'new', 'new', '$2y$10$J326oLEBSVjNbutbejbSVOB/De96Hu1Bfeb9DlY8P9NDmX1Iga5oS', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`scholar_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scholar`
--
ALTER TABLE `scholar`
  MODIFY `scholar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scholar`
--
ALTER TABLE `scholar`
  ADD CONSTRAINT `scholar_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
