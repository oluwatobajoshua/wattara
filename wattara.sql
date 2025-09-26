-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 05:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wattara`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `profile_id`, `name`, `created`, `modified`) VALUES
(5, 4, 'Ekotedo', '2021-01-07 08:00:15', '2021-01-07 08:00:15'),
(8, 7, '70, Liberty Road, Opposite Jos Carpet Ibadan., Oyo State', '2021-01-12 02:20:42', '2021-01-12 02:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `book_type_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `publisher_id`, `book_type_id`, `created`, `modified`) VALUES
(1, 'WATTARA NURSERY MATHS  BOOK 1', 1, 1, '2021-01-07', '2021-01-15'),
(2, 'WATTARA NURSERY MATHS  BOOK 2', 1, 1, '2021-01-07', '2021-01-07'),
(3, 'WATTARA NURSERY MATHS  BOOK 3', 1, 1, '2021-01-07', '2021-01-07'),
(4, 'WATTARA FUN WITH PHONICS BOOK 1', 1, 1, '2021-01-15', '2021-01-15'),
(5, 'WATTARA FUN WITH PHONICS BOOK 2', 1, 1, '2021-01-15', '2021-01-15'),
(6, 'WATTARA FUN WITH PHONICS BOOK 3', 1, 1, '2021-01-15', '2021-01-15'),
(7, 'WATTARA NURSERY ENGLISH  BOOK 1', 1, 1, '2021-01-15', '2021-01-15'),
(8, 'WATTARA NURSERY ENGLISH  BOOK 2', 1, 1, '2021-01-15', '2021-01-15'),
(9, 'WATTARA NURSERY ENGLISH  BOOK 3', 1, 1, '2021-01-15', '2021-01-15'),
(10, 'WATTARA QUANTITATIVE AND VERBAL REASONING BOOK 1', 1, 1, '2021-01-15', '2021-01-15'),
(11, 'WATTARA QUANTITATIVE AND VERBAL REASONING BOOK 2', 1, 1, '2021-01-15', '2021-01-15'),
(12, 'WATTARA QUANTITATIVE AND VERBAL REASONING BOOK 3', 1, 1, '2021-01-15', '2021-01-15'),
(13, 'WATTARA I CAN WRITE FOR BEGINNERS', 1, 1, '2021-01-15', '2021-01-15'),
(14, 'WATTARA I CAN WRITE BOOK 2', 1, 1, '2021-01-15', '2021-01-15'),
(15, 'WATTARA I CAN WRITE  BOOK 3', 1, 1, '2021-01-15', '2021-01-15'),
(16, 'WATTARA LEARNING CHARTS', 1, 1, '2021-01-15', '2021-01-15'),
(17, 'IPEKE', 1, 1, '2021-01-15', '2021-01-15'),
(18, 'FOUR FIGURE TABLE', 1, 1, '2021-01-15', '2021-01-15'),
(19, 'VIRTUES', 1, 1, '2021-01-15', '2021-01-15'),
(20, 'Smart Start Basic Science and Technology Nursery 1 with Cambridge Elevate Edition', 2, 1, '2021-01-15', '2021-01-15'),
(21, 'Smart Start Letter Work Nursery 2 Workbook', 2, 1, '2021-01-15', '2021-01-15'),
(22, 'Smart Start Number Work Nursery 2 Workbook', 2, 1, '2021-01-15', '2021-01-15'),
(23, 'Smart Start Civic Education Nursery 2 Workbook', 2, 1, '2021-01-15', '2021-01-15'),
(24, 'Smart Start Basic Science and Technology Nursery 2 Workbook', 2, 1, '2021-01-15', '2021-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `book_types`
--

CREATE TABLE `book_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_types`
--

INSERT INTO `book_types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'WB', '2021-01-07 16:17:01', '2021-01-07 16:17:01'),
(2, 'PB', '2021-01-07 16:17:09', '2021-01-07 16:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `users_count` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `company_id`, `users_count`, `name`, `address`, `created`, `modified`) VALUES
(1, 3, 1, 'HEAD OFFICE', '70, Liberty Road, Opposite Jos Carpet Ibadan, Oyo State', '2021-01-07', '2021-01-12 04:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `repayment_mode` varchar(50) NOT NULL,
  `interest` double NOT NULL,
  `service_charge` double NOT NULL,
  `soft_loan` int(1) NOT NULL,
  `soft_loan_sc` double NOT NULL,
  `normal_loan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `repayment_mode`, `interest`, `service_charge`, `soft_loan`, `soft_loan_sc`, `normal_loan`) VALUES
(1, 'Short Term', 'Daily | Weekly | Monthly', 0, 3.3, 1, 10, 1),
(2, 'Long Term', 'Daily | Weekly | Monthly', 5, 0, 2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `profile_id`, `created`, `modified`) VALUES
(1, 5, '2021-01-07', '2021-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rc` text NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `rc`, `address`) VALUES
(3, 'WATTARA PUBLISHERS LTD.', '11025', '70, Liberty Road, Opposite Jos Carpet Ibadan, Oyo State');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `value`, `created`, `modified`) VALUES
(1, '5%', '5', '2021-01-18 14:10:52', '2021-01-18 14:11:04'),
(2, '10%', '10', '2021-01-18 14:11:14', '2021-01-18 14:11:14'),
(3, '15%', '15', '2021-01-18 14:11:22', '2021-01-18 14:11:22'),
(4, '20%', '20', '2021-01-18 14:11:34', '2021-01-18 14:11:34'),
(5, '30%', '30', '2021-01-18 14:30:38', '2021-01-18 14:30:38'),
(6, '40%', '40', '2021-01-18 14:30:52', '2021-01-18 14:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment_mode_id` int(11) NOT NULL,
  `received` float DEFAULT NULL,
  `total` float NOT NULL,
  `paid_date` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `discount_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Cash', '2021-01-07 16:09:38', '2021-01-07 16:09:38'),
(2, 'Credit', '2021-01-07 16:09:46', '2021-01-07 16:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL,
  `status_id` int(25) NOT NULL,
  `user_id` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `last_name`, `first_name`, `date_of_birth`, `email`, `phone`, `passport`, `sign`, `status_id`, `user_id`) VALUES
(5, 'Kehinde', 'Adegbola', '2020-01-06', 'bose@gmail.com', '07068407128', '', '', 1, 123),
(6, 'Niyi', 'Niyi', '2021-01-06', 'niyi@gmail.com', '07068407128', NULL, NULL, 1, 124),
(7, 'Publisher', 'Wattara', NULL, 'wattara@gmail.com', '', NULL, NULL, 1, 125);

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `address`, `created`, `modified`) VALUES
(1, 'Wattara Publishers', '70, Liberty Road,\r\nOpposite Jos Carpet, \r\nIbadan, Oyo State', '2021-01-07', '2021-01-07'),
(2, 'Cambridge University Press', 'Plot 3, Otunba Jobi Fele Way, \r\nAlausa, Lagos', '2021-01-07', '2021-01-07'),
(3, 'Pearson UK', 'UK', '2021-01-07', '2021-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `order_id`, `amount`, `created`, `modified`) VALUES
(10, 53, 52000, '2021-01-20 22:12:06', '2021-01-20 22:12:06'),
(15, 54, 500000, '2021-01-20 22:36:17', '2021-01-20 22:36:17'),
(16, 54, 616000, '2021-01-20 22:36:32', '2021-01-20 22:36:32'),
(19, 176, 10000, '2021-01-21 16:59:46', '2021-01-21 16:59:46'),
(20, 176, 2825, '2021-01-21 17:00:10', '2021-01-21 17:00:10'),
(22, 248, 17100, '2021-01-22 04:32:42', '2021-01-22 04:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Super User'),
(2, 'Manager', 'Office Manager'),
(3, 'Cashier', 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `description`) VALUES
(1, 'Active', 'Active State'),
(2, 'Inactive', 'not active'),
(3, 'processing', 'under processing '),
(4, 'Approved ', 'Approved'),
(5, 'Not Approved', 'Not Approved'),
(6, 'Paid', 'Payment Paid'),
(7, 'UnPaid', 'Not Paid'),
(8, 'Overdue', 'Overdue'),
(9, 'Running', 'In progress'),
(10, 'Closed', 'Ended'),
(11, 'Confirmed', 'Payment Confirmed'),
(12, 'Successful', 'Successful'),
(13, 'Pending', 'Pending'),
(14, 'Declined', 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `cost_price` float DEFAULT NULL,
  `sales_price` float NOT NULL,
  `quantity` int(50) NOT NULL,
  `quantity_out` int(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `branch_id` int(25) NOT NULL,
  `accounts_count` int(11) NOT NULL,
  `credit` float DEFAULT NULL,
  `debit` float DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `raw_password` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `quest_one` varchar(4000) NOT NULL,
  `ans_one` varchar(4000) NOT NULL,
  `quest_two` varchar(4000) NOT NULL,
  `ans_two` varchar(4000) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `branch_id`, `accounts_count`, `credit`, `debit`, `balance`, `username`, `password`, `raw_password`, `password_reset_token`, `quest_one`, `ans_one`, `quest_two`, `ans_two`, `currency`, `created`, `modified`) VALUES
(56, 1, 2, 0, 0, 0, 0, 'sampresh', '$2y$10$s4.stLmzzm4fgmM91VBeU.CHgxieHieT9r5U.worMSoZu8Wi.fFMu', 'f741516568aa3d78b62d043cfe320d09', '', 'what was the first mobile that you purchased?', 'sampresh', 'what is the name of your favourite sports team?', 'sampresh', 'ngn', '2019-09-04 11:57:32', '2020-11-16 11:13:34'),
(123, 3, 0, 0, NULL, NULL, NULL, 'bose', '$2y$10$9Gz4bX22LV6wTaR3EwGfr.bDQtQENBKEyGpW7Sv/O2FVpnCkOnWo.', '$2y$10$JjqfIKyqawJRg159XOCcDujQKkJF96dxk7mCVYhxsTO2F6Bt5GPqO', '', 'what was the first mobile that you purchased?', 'sampresh1705', 'what was the first mobile that you purchased?', 'sampresh1705', 'NGN', '2021-01-07 08:28:53', '2021-01-07 08:34:02'),
(124, 2, 0, 0, NULL, NULL, NULL, 'niyi', '$2y$10$4QXo4I7BqAGrJugKelRdPex5BbGbS1sc6tZAhFqLhDL8rvdTQDOg.', '$2y$10$5eeN8oVI2yJpxjzvR3lL0.0LjI2R2QG7St5IfHfsKmznMtBHptmV2', '', 'what was the first mobile that you purchased?', 'sampresh1705', 'what was the first mobile that you purchased?', 'sampresh1705', 'NGN', '2021-01-07 09:17:04', '2021-01-07 09:17:04'),
(125, 1, 1, 0, NULL, NULL, NULL, 'wattara', '$2y$10$NeH0g7HZs.IOVP96kA.AN.mv44SJqSDz1kpsBHnbCy/8v22Ldvhlq', '$2y$10$3nX1KRosrpHwM34P5NtyJOLJ8F.K4gXoXPDVq1syhbJGwjaaicp7q', '', 'what was the first mobile that you purchased?', 'sampresh1705', 'what was the first mobile that you purchased?', 'sampresh1705', 'NGN', '2021-01-12 02:20:42', '2021-01-12 02:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_types`
--
ALTER TABLE `book_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `book_types`
--
ALTER TABLE `book_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
