-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 04:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `CREATE_AT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `descriptions`, `user_id`, `image`, `CREATE_AT`) VALUES
(1, 'فيسبوك', 'يُعتبر الفيس بوك موقع التواصل الاجتماعيّ الأشهر عبر الإنترنت كما يُمكن استخدامه من خلال التطبيق الخاص بأجهزة الهواتف الذكية وأجهزة الكمبيوتر اللوحية  وتجدر الإشارة إلى أنّ اسم الفيس بوك جاء من اسم المُستند الورقي الذي يتضمن أسماء وصور الطلبة الجدد الوافدين إلى الجامعة والذي يُساعدهم على التعرف على بعضهم البعض.', 1, '/assets/imgs/facebook-thumb-bramjstore.jpg', '2025-04-29 18:56:08'),
(2, 'لينكد إن', 'لينكد إن ‏ هو موقع على شبكة الإنترنت يصنف ضمن الشبكات الاجتماعية، تأسس في ديسمبر كانون الأول عام 2002 وبدأ التشغيل الفعلي في 5 مايو 2003. يستخدم الموقع أساسًا كشبكة تواصل مهنية. في يونيو 2012 بلغ عدد المسجلين في الموقع أكثر من 176 مليون عضو من أكثر من 200 دولة.', 1, '/assets/imgs/images.png', '2025-04-29 18:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'fathyelnaa', 'fathyelnaa1@gmail.com', '$2y$10$wmbWpnCShVVlIFEr2hElPOSIfplSl61TPrT5QVEEmhbjkW44YsoX2'),
(2, 'fathyelnaa2', 'fathyelnaa2@gmail.com', '$2y$10$iLcYLz0zJBxnmBEfCI4qzOgXnQG8bj5Qi.sjVicH2TNMfCsOvLfne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
