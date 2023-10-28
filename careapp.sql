-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 04:50 PM
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
-- Database: `booka`
--
CREATE DATABASE IF NOT EXISTS `booka` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `booka`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bk_id` int(11) NOT NULL,
  `bk_title` varchar(500) NOT NULL,
  `bk_category_id` int(11) NOT NULL,
  `bk_author` varchar(100) NOT NULL,
  `bk__publisher` varchar(200) NOT NULL,
  `bk_description` text NOT NULL,
  `bk_published_year` year(4) NOT NULL,
  `bk_cover_image` varchar(200) NOT NULL,
  `bk_added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bk_id`, `bk_title`, `bk_category_id`, `bk_author`, `bk__publisher`, `bk_description`, `bk_published_year`, `bk_cover_image`, `bk_added_date`) VALUES
(1, 'Hello from moat', 1, 'sam psalm', 'ps', 'hello', '2020', 'hello.png', '2023-09-08 16:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(200) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_desc`, `cat_image`) VALUES
(1, 'short story', 'short story', 'shortstory.png'),
(2, 'crime', 'crime', 'crime.png'),
(3, 'romance', 'romance', 'romance.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `com_content` text NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `com_summary_id` int(11) NOT NULL,
  `com_date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `summaries`
--

CREATE TABLE `summaries` (
  `sum_id` int(11) NOT NULL,
  `sum_content` text NOT NULL,
  `sum_user_id` int(11) NOT NULL,
  `sum_book_id` int(11) NOT NULL,
  `sum_approved` tinyint(1) NOT NULL DEFAULT 1,
  `sum_date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(22) NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_Intro` text NOT NULL,
  `user_dp` varchar(200) NOT NULL DEFAULT 'profile.png',
  `user_role` enum('user','admin') NOT NULL DEFAULT 'user',
  `user_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_Intro`, `user_dp`, `user_role`, `user_created`) VALUES
(1, 'User Six', 'user6@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 14:20:24'),
(4, 'User Six Six', 'user66@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 16:20:22'),
(5, 'User 77', 'user77@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 16:22:31'),
(6, 'User 77', 'user7987@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 17:47:14'),
(7, 'User 9', 'user9@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 17:47:45'),
(8, 'User 10', 'user10@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 18:10:23'),
(9, 'User 11', 'user11@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 18:11:56'),
(10, 'victoria umoh', 'victoriasuave07@gmail.com', '$2y$10$PDi0w3pcCHNQeSaGlv6yR.ounvqdRjC7SHszAtR/tj1ZmcXXSb0Xu', 'hi', 'profile.png', 'user', '2023-09-07 11:16:42'),
(11, 'dele', 'my@yahoo.com', 'pass123', 'hello', 'profile.png', 'user', '2023-09-07 11:17:25'),
(12, 'seyi', 'seyi@yahoo.com', 'pasword123', 'thanks', 'profile.png', 'user', '2023-09-07 12:22:09'),
(13, 'Emeka', 'emeka@yahoo.com', 'pasword123', 'thank', 'profile.png', 'user', '2023-09-07 12:37:23'),
(14, 'Emeka', 'e@yahoo.com', 'pasword123', 'thank', 'profile.png', 'user', '2023-09-07 12:39:32'),
(15, 'Emeka Lucius', 'emekalucius@yahoo.com', '$2y$10$B1Y9H.ike7KmXIWgrRLmt.9YzqZeOclSKANaLIiMreO2YtjnPRL..', 'whatever', '', 'admin', '2023-09-07 12:40:55'),
(16, 'habibat', 'habibat@yahoo.com', '$2y$10$K7TM/aj2F7PM9SddV2aIAe55bQOESY3AfZXG3Ch8NOWTLPnAoZ.ka', 'hi vic', 'profile.png', 'user', '2023-09-07 14:49:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `bk_category_id` (`bk_category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_title` (`cat_title`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `com_userId` (`com_user_id`),
  ADD KEY `comment_summary_id` (`com_summary_id`);

--
-- Indexes for table `summaries`
--
ALTER TABLE `summaries`
  ADD PRIMARY KEY (`sum_id`),
  ADD KEY `sum_user_id` (`sum_user_id`),
  ADD KEY `sum_book_id` (`sum_book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `summaries`
--
ALTER TABLE `summaries`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`bk_category_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_summary_id` FOREIGN KEY (`com_summary_id`) REFERENCES `summaries` (`sum_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`com_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `summaries`
--
ALTER TABLE `summaries`
  ADD CONSTRAINT `sum_book_id` FOREIGN KEY (`sum_book_id`) REFERENCES `books` (`bk_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `sum_user_id` FOREIGN KEY (`sum_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
--
-- Database: `careapp`
--
CREATE DATABASE IF NOT EXISTS `careapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `careapp`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `community_id` int(11) NOT NULL,
  `community_type` varchar(45) NOT NULL,
  `community_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `goal_id` int(11) NOT NULL,
  `goal_user_id` int(11) NOT NULL,
  `goal_type` varchar(45) NOT NULL,
  `goal_start_time` datetime NOT NULL,
  `goal_dealine` varchar(45) NOT NULL,
  `goal_actual_value` varchar(45) NOT NULL,
  `goal_reminder` varchar(45) NOT NULL,
  `goal_reward` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `healthtips`
--

CREATE TABLE `healthtips` (
  `healthtips_id` int(11) NOT NULL,
  `healthtips_type` varchar(45) NOT NULL,
  `healthtips_content` longtext NOT NULL,
  `healthtips_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progress_id` int(11) NOT NULL,
  `progress_goal_id` int(11) NOT NULL,
  `progress_value` varchar(45) NOT NULL,
  `progress_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews/rate`
--

CREATE TABLE `reviews/rate` (
  `review_id` int(11) NOT NULL,
  `review_user_id` int(11) DEFAULT NULL,
  `review_msg` mediumtext NOT NULL,
  `review_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` enum('male','female') NOT NULL,
  `user_height` float NOT NULL,
  `user_weight` float NOT NULL,
  `user_reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`community_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goal_id`);

--
-- Indexes for table `healthtips`
--
ALTER TABLE `healthtips`
  ADD PRIMARY KEY (`healthtips_id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`);

--
-- Indexes for table `reviews/rate`
--
ALTER TABLE `reviews/rate`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `community_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `healthtips`
--
ALTER TABLE `healthtips`
  MODIFY `healthtips_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews/rate`
--
ALTER TABLE `reviews/rate`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `community`
--
ALTER TABLE `community`
  ADD CONSTRAINT `community_user_id` FOREIGN KEY (`community_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `goal_user_id` FOREIGN KEY (`goal_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_goal_id` FOREIGN KEY (`progress_id`) REFERENCES `goals` (`goal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `reviews/rate`
--
ALTER TABLE `reviews/rate`
  ADD CONSTRAINT `review_user_id` FOREIGN KEY (`review_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;
--
-- Database: `demoapp`
--
CREATE DATABASE IF NOT EXISTS `demoapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `demoapp`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_fname` varchar(50) NOT NULL,
  `cust_lname` varchar(50) NOT NULL,
  `cust_dob` date NOT NULL,
  `cust_phone` varchar(50) NOT NULL,
  `cust_city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='This table stores the information about our customers';

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_fname`, `cust_lname`, `cust_dob`, `cust_phone`, `cust_city`) VALUES
(1, 'Olawole', 'Ajao', '1990-03-07', '080123456', 'Lagos'),
(2, 'Saheed', 'Balogun', '1998-03-07', '0802345687', 'Ibadan'),
(3, 'Abiola', 'Lawal', '2007-03-07', '0236789997', 'Lagos'),
(4, 'Oluwole', 'Idowu', '2009-03-07', '0803467778', 'Akure'),
(5, 'Tola', 'Oni', '1983-03-07', '0804566456', 'Ibadan'),
(6, 'Tola', 'Oni', '2000-03-07', '0803564588', 'Ondo');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_amt` float NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '=1 if paid, 0 if not paid',
  `order_customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='This table stores the orders made by the customers';

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `order_date`, `order_amt`, `order_status`, `order_customerid`) VALUES
(1, '2017-01-07 09:55:05', 2000, 1, 1),
(2, '2017-03-02 09:55:24', 1000, 1, 2),
(3, '2017-03-04 09:55:43', 6000, 1, 1),
(4, '2017-03-04 09:55:57', 2300, 1, 3),
(5, '2017-03-05 09:56:09', 1500, 0, 2),
(6, '2017-03-06 09:56:19', 600, 0, 4),
(7, '2017-03-07 09:57:27', 4900, 1, 5),
(8, '2017-02-07 09:57:47', 7230, 1, 3),
(9, '2017-01-07 10:12:09', 2750, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_description` text DEFAULT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_stock_quantity` int(11) NOT NULL,
  `prod_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `prod_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_description`, `prod_price`, `prod_stock_quantity`, `prod_created_at`, `prod_updated_at`) VALUES
(1, 'Laptop', '15-inch laptop with 8GB RAM', 799.99, 50, '2023-09-03 17:55:46', '2023-09-03 17:55:46'),
(2, 'Smartphone', '5.5-inch smartphone with 64GB storage', 399.99, 100, '2023-09-03 17:55:46', '2023-09-03 17:55:46'),
(3, 'Tablet', '10-inch tablet with HD display', 199.99, 75, '2023-09-03 17:55:46', '2023-09-03 17:55:46'),
(4, 'Headphones', 'Over-ear headphones with noise cancellation', 149.99, 30, '2023-09-03 17:55:46', '2023-09-03 17:55:46'),
(5, 'Smartwatch', 'Fitness tracker with heart rate monitor', 79.99, 60, '2023-09-03 17:55:46', '2023-09-03 17:55:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"booka\",\"table\":\"users\"},{\"db\":\"booka\",\"table\":\"books\"},{\"db\":\"booka\",\"table\":\"category\"},{\"db\":\"careapp\",\"table\":\"user\"},{\"db\":\"regform\",\"table\":\"contactform\"},{\"db\":\"demoapp\",\"table\":\"products\"},{\"db\":\"demoapp\",\"table\":\"customers\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-09-09 14:50:39', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `regform`
--
CREATE DATABASE IF NOT EXISTS `regform` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `regform`;

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `user_id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`user_id`, `user`, `email`, `content`) VALUES
(1, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(2, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(3, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(4, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(5, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(6, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(7, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(8, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(9, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(10, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(11, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(12, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(13, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(14, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(15, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(16, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(17, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(18, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(19, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(20, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(21, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(22, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(23, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(24, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(25, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(26, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(27, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(28, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(29, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(30, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(31, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(32, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(33, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(34, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(35, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(36, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(37, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(38, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(39, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(40, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(41, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(42, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(43, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(44, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(45, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(46, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(47, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(48, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(49, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(50, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(51, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(52, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(53, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(54, 'Seyi', 'Makinde@yahoo.c', 'I Did It'),
(55, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(56, 'Seyi', 'Makinde@yahoo.c', 'I Did It'),
(57, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(58, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(59, 'Seyi', 'Makinde@yahoo.c', 'I Did It.'),
(60, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(61, 'Mom', 'Mom@yahoo.com', 'I Made It.'),
(62, 'Victoria', 'vic@yahoo.com', 'i\'m thankful to God'),
(63, 'Mom', 'Mom@yahoo.com', 'I Made It.'),
(64, 'Mom', 'Mom@yahoo.com', 'I Made It.'),
(65, 'seyi', 'seyi@yahoo.com', 'i did it'),
(66, 'Mom', 'Mom@yahoo.com', 'I Made It.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
