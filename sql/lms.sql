-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 10:41 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(70) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_author_name` varchar(50) NOT NULL,
  `book_publication_name` varchar(50) NOT NULL,
  `book_purchase_date` varchar(50) NOT NULL,
  `book_price` varchar(10) NOT NULL,
  `book_qty` int(5) NOT NULL,
  `available_qty` int(5) NOT NULL,
  `librarian_username` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `datetime`) VALUES
(19, 'বেলা ফুরাবার আগে', '200530070742.jpg', 'আরিফ আজাদ', 'সমকালিন প্রকাশনী', '2020-05-29', '250', 200, 1, 'kamal123456', '2020-05-30 05:07:42'),
(20, 'Peradoxical Sazid', '200530070815.jpg', 'আরিফ আজাদ', 'সমকালিন প্রকাশনী', '2020-05-29', '350', 100, 100, 'kamal123456', '2020-05-30 05:08:15'),
(26, 'কিতাবুল আকাইদ', '200530022048.jpg', 'সাইখুল হাদিস', 'Unknown', '2020-05-25', '500', 211, 10, 'kamal123456', '2020-05-30 12:20:48'),
(27, 'Human Research', '200530022131.jpg', 'Unknown', 'Unknown', '2020-05-09', '633', 788, 500, 'kamal123456', '2020-05-30 12:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(5, 1, 19, '30-05-20', '', '2020-05-30 10:13:27'),
(6, 2, 19, '30-05-20', '30--05-20', '2020-05-30 12:13:21'),
(7, 2, 20, '30-05-20', '', '2020-05-30 12:13:29'),
(8, 3, 20, '30-05-20', '', '2020-05-30 12:13:45'),
(9, 4, 19, '30-05-20', '30--05-20', '2020-05-30 12:13:54'),
(10, 2, 26, '30-05-20', '', '2020-05-30 12:21:44'),
(11, 2, 27, '30-05-20', '', '2020-05-30 12:21:54'),
(12, 4, 25, '30-05-20', '', '2020-05-30 12:22:04'),
(13, 4, 27, '30-05-20', '30--05-20', '2020-05-30 12:22:13'),
(14, 3, 26, '30-05-20', '', '2020-05-30 12:22:20'),
(15, 4, 27, '30-05-20', '30--05-20', '2020-05-30 12:22:27'),
(16, 4, 27, '30-05-20', '30--05-20', '2020-05-30 12:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(3) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'kamal', 'Hossain', 'librarian@gmail.com', 'librarian', '123456789', '2020-05-29 11:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(2, 'Ariful', 'Islam', 123456, 123456, 'ariful@gmail.com', 'ariful123456', '$2y$10$yqwGQ6RdtL8Iowf8lf1pcuRLZEvJ6j3bkmmF6RqhYhyN/TVqg/qC.', 16817298, NULL, 1, '2020-05-29 11:10:20'),
(3, 'hossain', 'islam', 654321, 654321, 'hossain@gmail.com', 'hossain123456', '$2y$10$JRwkD27vIl0h.fj4q4epIeDjcXy/SdH7hp6TcT0/knVsdQUonvFpe', 1746433081, NULL, 1, '2020-05-29 13:55:23'),
(4, 'mamun', 'hossain', 123456, 123456, 'mamun@gmail.com', 'mamun123456', '$2y$10$euevCfffBTK8G/EGdF58oer.268lYIrembZxdKtqUjzlCAuK7lpTm', 1830608507, NULL, 1, '2020-05-29 14:12:47'),
(18, 'masus', 'hossain', 123456, 123456, 'masud@gmail.com', 'masud123456', '$2y$10$W5IOx8N13H/XmrujqvPsvuOr5uq8FpEOFBHc1QDuvPY4uHAsViWry', 1746433081, NULL, 0, '2020-05-31 08:38:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
