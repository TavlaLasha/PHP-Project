-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 11:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmw`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(28, 26, 4, 'The strongest and sweetest songs yet remain to be sung', 'none', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.vLorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.&lt;/p&gt;', 1, '2020-06-02 23:57:54'),
(29, 26, 5, 'That love is all there is, is all we know of love', 'none', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.vLorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.&lt;/p&gt;', 1, '2020-06-02 23:58:14'),
(30, 26, 8, 'One day life will flash before your eyes', 'none', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.vLorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.&lt;/p&gt;', 1, '2020-06-02 23:58:57'),
(31, 26, 9, 'Do anything, but let it produce joy and love', 'none', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.vLorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.&lt;/p&gt;', 1, '2020-06-02 23:59:21'),
(32, 26, 7, 'The spectacles before us was indeed sublime', 'none', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.vLorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus expedita tempora qui sunt! Ipsum nihil unde obcaecati.&lt;/p&gt;', 1, '2020-06-03 00:00:14'),
(33, 26, 6, 'jQuery ', '1591174039_image_7.png', '&lt;p&gt;sdsd&lt;/p&gt;', 1, '2020-06-03 12:47:19'),
(34, 26, 5, 'qqw', 'image_5.png', '&lt;p&gt;as&lt;/p&gt;', 1, '2020-06-03 13:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(4, 'Quotes', ''),
(5, 'Lession', ''),
(6, 'Fiction', ''),
(7, 'Biography', ''),
(8, 'Motivation', ''),
(9, 'Inspiration', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `create_dt`) VALUES
(26, 1, 'Tavla_Lasha', 'lashatavlalashvili@yahoo.com', '$2y$10$8z9PupkTqXiADpQeR0DbKem9CP02blE5qhHKPpB8EtFwAdVxH.Lka', '2020-06-02 19:07:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
