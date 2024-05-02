-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2023 at 04:56 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `einzigartige-movie-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_us_userid_foreign` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `userid`, `fullname`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 12, 'gauri mishra', 'gauri@gmail.com', 'feedback', 'very good website', '2023-03-24 07:22:14', '2023-03-24 07:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `download_p_d_f_s`
--

DROP TABLE IF EXISTS `download_p_d_f_s`;
CREATE TABLE IF NOT EXISTS `download_p_d_f_s` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint UNSIGNED NOT NULL,
  `movieshowid` bigint UNSIGNED NOT NULL,
  `ticketid` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `download_p_d_f_s_userid_foreign` (`userid`),
  KEY `download_p_d_f_s_movieshowid_foreign` (`movieshowid`),
  KEY `download_p_d_f_s_ticketid_foreign` (`ticketid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_02_05_131103_create_sessions_table', 1),
(7, '2022_02_08_091738_create_movies_table', 1),
(9, '2022_02_18_045340_create_multiplexes_table', 2),
(15, '2022_02_18_113239_create_screens_table', 5),
(16, '2022_02_22_132855_create_movie_shows_table', 6),
(19, '2022_03_06_055001_create_contact_us_table', 8),
(22, '2022_03_10_073550_create_coupons_table', 10),
(23, '2022_03_08_112007_create_payments_table', 11),
(24, '2022_03_21_103517_create_upcomings_table', 12),
(26, '2022_03_03_130509_create_tickets_table', 13),
(27, '2022_04_01_073823_create_p_d_f_s_table', 14),
(28, '2022_04_01_074724_create_download_p_d_f_s_table', 15),
(29, '2023_03_27_102727_add_username_tickets_table', 16),
(30, '2023_03_27_102906_add_moviename_tickets_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `moviename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `releasedate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailerlink` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cast` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imdb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `moviename`, `description`, `releasedate`, `genre`, `type`, `length`, `trailerlink`, `slug`, `rating`, `cast`, `image`, `lang`, `imdb`, `rt`, `created_at`, `updated_at`) VALUES
(22, 'Pathaan', 'An Indian spy battles against the leader of a gang of mercenaries who have a heinous plot.', '2022-04-22', 'Action , Thriller', '2D', '2h 26m', 'https://www.youtube.com/embed/vqu4z34wENw', 'pathaan', 'UA', 'shah rukh khan, Deepika padukone, john abraham', '1678707018.jpg', 'Hindi, Tamil, Telugu', '8.2', '81', '2022-04-22 10:18:15', '2023-03-13 11:30:18'),
(24, 'Vash', 'Believe it or not but the world is part of two different energies `good` and `evil`. What happens when they collide? Who wins? And at what cost?', '2023-02-10', 'Psychological , Thriller', '2D', '1h 57m', 'https://www.youtube.com/embed/DuWOpHkG49s', 'vash', 'A', 'Hitu Kanodia ,  Janki bodiwala', '1678707784.avif', 'Gujarati', '7', '80', '2023-03-13 10:05:11', '2023-03-13 11:43:04'),
(25, 'Creed III', 'After dominating the boxing world, Adonis Creed has been thriving in both his career and family life. When a childhood friend and former boxing prodigy, Damian (Jonathan Majors), resurfaces after serving a long sentence in prison, he is eager to prove that he deserves his shot in the ring. The face-off between former friends is more than just a fight. To settle the score, Adonis must put his future on the line to battle Damian - a fighter who has nothing to lose.', '2023-03-03', 'Drama , Sports', '2D,4DX,,MX4D,ICE,IMAX2D', '1h 57m', 'https://www.youtube.com/embed/AHmCH7iB_IM', 'creed III', 'UA', 'Micheal B. jordan, Tessa Thompson', '1678707835.avif', 'English', '8.2', '80', '2023-03-13 10:27:42', '2023-03-13 11:43:55'),
(26, '65', 'After a catastrophic crash on an unknown planet, pilot Mills (Adam Driver) quickly discovers he`s actually stranded on Earth but 65 million years ago. Now, with only one chance at a rescue, Mills and the only other survivor, Koa, must make their way across an unknown terrain riddled with dangerous prehistoric creatures.', '2023-03-10', 'Adventure , Sci-Fi , Thriller', '2D,4DX', '1h 33m', 'https://www.youtube.com/embed/bHXejJq5vr0', '65', '7', 'adam driver, ariana greenblatt', '1678707862.avif', 'English, Hindi, Tamil, Telugu', '7', '75', '2023-03-13 11:02:48', '2023-03-13 11:44:22'),
(28, 'Zwitago', 'Manas, an ex-factory floor manager loses his job during the pandemic. He is then forced to work as a food delivery rider, grappling with the app and the world of ratings and incentives. Life is relentless for him, but not without shared moments of joy with his wife, Pratima. The film captures the life of invisible `ordinary` people, hidden in plain sight.', '2023-03-17', 'Drama', '2D', '1h 45m', 'https://www.youtube.com/embed/RCMxX6lWJcY', 'zwitago', 'U', 'Kapil Sharma', '1679214345.avif', 'Hindi', '5.9', '6', '2023-03-19 08:25:45', '2023-03-19 08:25:45'),
(29, 'Mrs. Chatterjee Vs Norway', 'Mrs. Chatterjee`s fight against an entire nation to reunite with her children is now Desh Ka Matter.', '2023-03-17', 'Biography , Drama', '2D', '2h 13m', 'https://www.youtube.com/embed/CioDVCtgyN0', 'mrs. chatterjee vs norway', '6.2', 'Rani Mukerji', '1679380486.avif', 'Hindi', '8.9', '8', '2023-03-19 08:58:00', '2023-03-21 06:34:46'),
(30, 'Selfiee', 'abc', '2023-04-20', 'Action', 'Hindi', '1hr 30 m', 'abc', 'selfiee', '7.0', 'abc', '1680770631.avif', 'Hindi', '7', '70', '2023-04-06 08:43:51', '2023-04-06 08:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `movie_shows`
--

DROP TABLE IF EXISTS `movie_shows`;
CREATE TABLE IF NOT EXISTS `movie_shows` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `movieid` bigint UNSIGNED NOT NULL,
  `multiplexid` bigint UNSIGNED NOT NULL,
  `screenid` bigint UNSIGNED NOT NULL,
  `showdate` date NOT NULL,
  `showtime` time NOT NULL,
  `showtype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `showlang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `normalprice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `executiveprice` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `premiumprice` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalseats` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_shows_movieid_foreign` (`movieid`),
  KEY `movie_shows_multiplexid_foreign` (`multiplexid`),
  KEY `movie_shows_screenid_foreign` (`screenid`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_shows`
--

INSERT INTO `movie_shows` (`id`, `movieid`, `multiplexid`, `screenid`, `showdate`, `showtime`, `showtype`, `showlang`, `normalprice`, `executiveprice`, `premiumprice`, `totalseats`, `created_at`, `updated_at`) VALUES
(231, 24, 5, 43, '2023-04-06', '12:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 06:09:30', '2023-04-05 06:09:30'),
(232, 26, 5, 44, '2023-04-06', '15:00:00', '2D', 'English, Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 06:11:58', '2023-04-05 06:11:58'),
(233, 26, 5, 43, '2023-04-06', '15:00:00', '4DX', 'English, Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 06:14:22', '2023-04-05 06:14:22'),
(234, 22, 7, 45, '2023-04-06', '11:00:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 06:16:58', '2023-04-05 06:16:58'),
(235, 29, 7, 46, '2023-04-06', '14:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 06:18:18', '2023-04-05 06:18:18'),
(236, 25, 7, 45, '2023-04-06', '17:00:00', '4DX', 'English', '200', '250', '300', '100', '2023-04-05 06:19:19', '2023-04-05 06:19:19'),
(237, 29, 8, 47, '2023-04-06', '09:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 06:20:11', '2023-04-05 06:20:11'),
(238, 28, 8, 48, '2023-04-06', '13:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 06:21:09', '2023-04-05 06:21:09'),
(239, 24, 8, 47, '2023-04-06', '20:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 06:22:57', '2023-04-05 06:22:57'),
(240, 26, 11, 49, '2023-04-06', '10:30:00', '2D', 'English, Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 06:24:09', '2023-04-05 06:24:09'),
(241, 26, 11, 50, '2023-04-06', '10:30:00', '4DX', 'English, Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 06:25:11', '2023-04-05 06:25:11'),
(242, 22, 11, 51, '2023-04-06', '14:00:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 06:26:09', '2023-04-05 06:26:09'),
(243, 29, 11, 49, '2023-04-06', '16:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 06:26:57', '2023-04-05 06:26:57'),
(244, 25, 12, 52, '2023-04-06', '11:30:00', '2D', 'English', '200', '250', '300', '100', '2023-04-05 06:27:55', '2023-04-05 06:27:55'),
(245, 25, 12, 53, '2023-04-06', '14:00:00', '4DX', 'English', '200', '250', '300', '100', '2023-04-05 06:29:14', '2023-04-05 06:29:14'),
(246, 28, 12, 54, '2023-04-06', '13:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 06:30:08', '2023-04-05 06:30:08'),
(248, 29, 7, 46, '2023-04-06', '08:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 16:53:55', '2023-04-05 16:53:55'),
(249, 29, 11, 50, '2023-04-06', '22:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 16:57:12', '2023-04-05 16:57:12'),
(250, 28, 8, 48, '2023-04-06', '19:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 16:59:34', '2023-04-05 16:59:34'),
(251, 26, 5, 42, '2023-04-06', '20:00:00', '2D', 'English, Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 17:02:43', '2023-04-05 17:02:43'),
(252, 25, 12, 54, '2023-04-06', '19:30:00', '2D', 'English', '200', '250', '300', '100', '2023-04-05 17:05:50', '2023-04-05 17:05:50'),
(253, 24, 8, 47, '2023-04-06', '14:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 17:08:15', '2023-04-05 17:08:15'),
(254, 22, 11, 51, '2023-04-06', '21:30:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 17:11:04', '2023-04-05 17:11:04'),
(257, 29, 7, 46, '2023-04-07', '14:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:20:34', '2023-04-05 17:20:34'),
(258, 29, 7, 46, '2023-04-07', '20:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:22:50', '2023-04-05 17:22:50'),
(259, 29, 8, 47, '2023-04-07', '09:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:24:33', '2023-04-05 17:24:33'),
(260, 29, 11, 49, '2023-04-07', '16:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:26:26', '2023-04-05 17:26:26'),
(261, 29, 11, 50, '2023-04-07', '10:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:27:36', '2023-04-05 17:27:36'),
(262, 28, 8, 48, '2023-04-07', '13:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:29:14', '2023-04-05 17:29:14'),
(263, 28, 8, 48, '2023-04-07', '19:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:31:10', '2023-04-05 17:31:10'),
(264, 28, 12, 54, '2023-04-07', '13:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:32:18', '2023-04-05 17:32:18'),
(265, 26, 5, 44, '2023-04-07', '15:00:00', '2D', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 17:33:26', '2023-04-05 17:33:26'),
(266, 26, 5, 42, '2023-04-07', '20:00:00', '2D', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 17:34:27', '2023-04-05 17:34:27'),
(267, 26, 11, 49, '2023-04-07', '10:30:00', '2D', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 17:36:14', '2023-04-05 17:36:14'),
(268, 26, 5, 43, '2023-04-07', '15:00:00', '4DX', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 17:42:53', '2023-04-05 17:42:53'),
(269, 26, 11, 50, '2023-04-07', '10:30:00', '4DX', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 17:44:26', '2023-04-05 17:44:26'),
(270, 25, 7, 45, '2023-04-07', '17:00:00', '4DX', 'English', '200', '250', '300', '100', '2023-04-05 17:46:30', '2023-04-05 17:46:30'),
(271, 25, 12, 53, '2023-04-07', '14:00:00', '4DX', 'English', '200', '250', '300', '100', '2023-04-05 17:48:17', '2023-04-05 17:48:17'),
(272, 25, 12, 52, '2023-04-07', '11:30:00', '2D', 'English', '200', '250', '300', '100', '2023-04-05 17:49:07', '2023-04-05 17:49:07'),
(273, 25, 12, 54, '2023-04-07', '19:30:00', '2D', 'English', '200', '250', '300', '100', '2023-04-05 17:50:13', '2023-04-05 17:50:13'),
(274, 24, 5, 43, '2023-04-07', '12:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 17:51:32', '2023-04-05 17:51:32'),
(275, 24, 8, 47, '2023-04-07', '20:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 17:52:37', '2023-04-05 17:52:37'),
(276, 24, 8, 47, '2023-04-07', '14:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 17:53:13', '2023-04-05 17:53:13'),
(277, 22, 7, 45, '2023-04-07', '11:00:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 17:53:47', '2023-04-05 17:53:47'),
(278, 22, 11, 51, '2023-04-07', '14:00:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 17:54:20', '2023-04-05 17:54:20'),
(279, 22, 11, 51, '2023-04-07', '21:30:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 17:55:32', '2023-04-05 17:55:32'),
(284, 29, 7, 46, '2023-04-08', '14:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:58:39', '2023-04-05 17:58:39'),
(285, 29, 7, 46, '2023-04-08', '20:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:59:27', '2023-04-05 17:59:27'),
(286, 29, 8, 47, '2023-04-08', '09:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 17:59:56', '2023-04-05 17:59:56'),
(287, 29, 11, 49, '2023-04-08', '16:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 18:00:43', '2023-04-05 18:00:43'),
(288, 29, 11, 50, '2023-04-08', '22:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 18:01:43', '2023-04-05 18:01:43'),
(289, 28, 8, 48, '2023-04-08', '13:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 18:02:20', '2023-04-05 18:02:20'),
(290, 28, 8, 48, '2023-04-08', '19:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 18:03:02', '2023-04-05 18:03:02'),
(291, 28, 12, 54, '2023-04-08', '13:30:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-05 18:03:27', '2023-04-05 18:03:27'),
(292, 26, 5, 44, '2023-04-08', '15:00:00', '2D', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 18:04:03', '2023-04-05 18:04:03'),
(293, 26, 5, 42, '2023-04-08', '20:00:00', '2D', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 18:04:43', '2023-04-05 18:04:43'),
(294, 26, 11, 49, '2023-04-08', '10:30:00', '2D', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 18:05:47', '2023-04-05 18:05:47'),
(295, 26, 5, 43, '2023-04-08', '15:00:00', '4DX', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 18:06:25', '2023-04-05 18:06:25'),
(296, 26, 11, 50, '2023-04-08', '10:30:00', '4DX', 'Hindi, Tamil, Telugu, English', '200', '250', '300', '100', '2023-04-05 18:06:59', '2023-04-05 18:06:59'),
(297, 25, 7, 45, '2023-04-08', '17:00:00', '4DX', 'English', '200', '250', '300', '100', '2023-04-05 18:08:16', '2023-04-05 18:08:16'),
(298, 25, 12, 53, '2023-04-08', '14:00:00', '4DX', 'English', '200', '250', '300', '100', '2023-04-05 18:09:08', '2023-04-05 18:09:08'),
(299, 25, 12, 52, '2023-04-08', '11:30:00', '2D', 'English', '200', '250', '300', '100', '2023-04-05 18:09:43', '2023-04-05 18:09:43'),
(300, 25, 12, 54, '2023-04-08', '19:30:00', '2D', 'English', '200', '250', '300', '100', '2023-04-05 18:10:08', '2023-04-05 18:10:08'),
(301, 24, 5, 43, '2023-04-08', '12:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 18:10:48', '2023-04-05 18:10:48'),
(302, 24, 8, 47, '2023-04-08', '20:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 18:11:18', '2023-04-05 18:11:18'),
(303, 24, 8, 47, '2023-04-08', '14:00:00', '2D', 'Gujarati', '200', '250', '300', '100', '2023-04-05 18:11:55', '2023-04-05 18:11:55'),
(304, 22, 7, 45, '2023-04-08', '11:00:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 18:12:26', '2023-04-05 18:12:26'),
(305, 22, 11, 51, '2023-04-08', '14:00:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 18:13:12', '2023-04-05 18:13:12'),
(306, 22, 11, 51, '2023-04-08', '21:30:00', '2D', 'Hindi, Tamil, Telugu', '200', '250', '300', '100', '2023-04-05 18:14:08', '2023-04-05 18:14:08'),
(311, 25, 8, 48, '2023-04-06', '15:00:00', '2D', 'Hindi', '200', '250', '300', '100', '2023-04-06 08:46:47', '2023-04-06 08:46:47'),
(312, 30, 7, 46, '2023-04-22', '19:10:00', '2D', 'Hindi', '150', '200', '300', '50', '2023-04-22 13:28:56', '2023-04-22 13:28:56'),
(313, 26, 8, 47, '2023-04-22', '20:30:00', '2D', 'Hindi', '100', '100', '100', '100', '2023-04-22 14:55:57', '2023-04-22 14:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `multiplexes`
--

DROP TABLE IF EXISTS `multiplexes`;
CREATE TABLE IF NOT EXISTS `multiplexes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalscreen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multiplexes`
--

INSERT INTO `multiplexes` (`id`, `name`, `address`, `contact`, `email`, `totalscreen`, `created_at`, `updated_at`) VALUES
(5, 'INOX: VR Mall, Surat', '3rd Floor, VR Mall, Dumas Road, Magdalla, Near Sunglass Hut, Surat, Gujarat 395007, India', '8586848987', 'inox@cinemas.com', '3', '2022-02-18 10:46:34', '2023-03-23 07:41:18'),
(7, 'Cinemax: Iris, Surat', 'Iris Mall, 3rd Floor, Dumas Road, Opposite Valentine Theater, Near Govardhan Haveli, Gaurav Path, Surat, Gujarat 395007, India', '7326468942', 'cinemax@gmail.com', '2', '2022-02-25 05:50:15', '2023-03-23 07:41:24'),
(8, 'Time Cinema: Galaxy Circle Pal, Surat', 'Fortune The Shopping Island, Near Galaxy Circle, New Rto-Pal Lake Road, Pal, Surat, Gujarat 394510, India', '0261 489 0044', 'support@timecinemas.com', '2', '2022-03-21 04:40:33', '2023-03-23 07:41:31'),
(11, 'PVR: Rahul Raj, Surat', '3rd Floor, RahulRaj Mall, Dumas Road, Surat, Gujarat 395007, India', '0261 400 7000', 'pvr@cares.com', '3', '2022-03-24 05:48:13', '2023-03-23 07:41:36'),
(12, 'Rajhans Multiplex: Adajan, Surat', 'Pal-Hazira Road, Adajan, Near ICICI Bank, Surat, Gujarat 395009, India', '99247 88803', 'rajhans@cinemas.com', '3', '2022-03-24 05:49:49', '2022-03-24 05:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$wn4SVu5KA/ZR2WkhaIbWt.hOEEvaEl4Wd/Cjr2BsmqpbLtoeLkNvi', '2023-03-21 08:34:38'),
('mgauri644@gmail.com', '$2y$10$xYMjXwqoQEg9aCM0njYMHebLKgJgqmCG2eZD6WlFotTFad.gSseju', '2023-03-21 08:44:21'),
('apurv_patel@yopmail.com', '$2y$10$QO/lRfjKE/uuE8Qq2/cEvOLUlU.hkDrtv65YV9hKY0ChsW5w1AEMS', '2023-03-23 05:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `r_payment_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `productid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticketid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_d_f_s`
--

DROP TABLE IF EXISTS `p_d_f_s`;
CREATE TABLE IF NOT EXISTS `p_d_f_s` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint UNSIGNED NOT NULL,
  `movieshowid` bigint UNSIGNED NOT NULL,
  `ticketid` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p_d_f_s_userid_foreign` (`userid`),
  KEY `p_d_f_s_movieshowid_foreign` (`movieshowid`),
  KEY `p_d_f_s_ticketid_foreign` (`ticketid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

DROP TABLE IF EXISTS `screens`;
CREATE TABLE IF NOT EXISTS `screens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `screenno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `multiplexid` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `screens_multiplexid_foreign` (`multiplexid`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `screenno`, `screenname`, `multiplexid`, `created_at`, `updated_at`) VALUES
(42, '1', 'AUDI-01', 5, '2023-04-05 05:55:53', '2023-04-05 05:55:53'),
(43, '2', 'AUDI-02', 5, '2023-04-05 05:56:38', '2023-04-05 05:56:38'),
(44, '3', 'AUDI-03', 5, '2023-04-05 05:56:49', '2023-04-05 05:56:49'),
(45, '1', 'AUDI-01', 7, '2023-04-05 05:57:03', '2023-04-05 05:57:03'),
(46, '2', 'AUDI-02', 7, '2023-04-05 05:57:17', '2023-04-05 05:57:17'),
(47, '1', 'AUDI-01', 8, '2023-04-05 05:57:30', '2023-04-05 05:57:30'),
(48, '2', 'AUDI-02', 8, '2023-04-05 05:57:48', '2023-04-05 05:57:48'),
(49, '1', 'AUDI-01', 11, '2023-04-05 05:58:15', '2023-04-05 05:58:15'),
(50, '2', 'AUDI-02', 11, '2023-04-05 05:58:27', '2023-04-05 05:58:27'),
(51, '3', 'AUDI-03', 11, '2023-04-05 05:58:40', '2023-04-05 05:58:40'),
(52, '1', 'AUDI-01', 12, '2023-04-05 05:58:58', '2023-04-05 05:58:58'),
(53, '2', 'AUDI-02', 12, '2023-04-05 05:59:12', '2023-04-05 05:59:12'),
(54, '3', 'AUDI-03', 12, '2023-04-05 05:59:24', '2023-04-05 05:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('77zOMD0ZVjkyYJikm0hP0Jb0OGDTUADbVLu7YmOO', 18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTjQ2WndGU0szdGY1VXhheGh4SXVEYzBwSlozcEg4YmNGYUN1SlJYUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9laW56aWdhcnRpZ2UtbW92aWUtYm9va2luZy9hYm91dHVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTg7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRZQ2diQ1RweXltN3lrdUVTWkFzSUFlRlJQTVk1R2xoMnRydnNSY0NLNzN1NHJsYWdDbHdmRyI7czo0OiJwaWlkIjtpOjEzMTtzOjc6InN1Y2Nlc3MiO3M6MTA6IlN1Y2Nlc3NmdWwiO30=', 1682175806),
('EaQGHBtIlZIncFCngiMRhRcrKLp2AuyQLoXrJLI2', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoidlRHYzJKN1VUMjV2a1Q1aUcyTXpyQ25DeTJKWkMxWjVkc29BNVRkWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRZQU95L1IvU1ljWWJ2S09oTC5ZL011T1l6VzNSaEh5VURxaGI3elYyaDFnU3M2cXVlUkNELiI7czo0OiJwaWlkIjtpOjEzMDtzOjc6InN1Y2Nlc3MiO3M6MTA6IlN1Y2Nlc3NmdWwiO30=', 1682170837),
('hs3Z8q0hcQ5r1k0fIC0lY9QwmghKKxuZrV2cqn21', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaUxpV2Z0V1IxMDN2WXhGdUdjUmpEUzNRQURaZnB6eDV0cWE3N1IzdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9laW56aWdhcnRpZ2UtbW92aWUtYm9va2luZy9hZG1pbnVzZXJ0aWNrZXRzZGF0YSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRONUpXTEo5ZXRxZ3VwYk9yd3pQdXBlcklmSS5BYnZzNm1ncjQ0MWg1dUVJcFNrMFZRUDYydSI7fQ==', 1682175420),
('ZuyPyiEA442UV8c7sxQiCVgqZ9bSjbgMEO9O1CsP', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidzlEaDg0UzNROW0zZDhvZTV2TlZLbEhoNzFCcHJtcm50ZXY4Mzl0byI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE41SldMSjlldHFndXBiT3J3elB1cGVySWZJLkFidnM2bWdyNDQxaDV1RUlwU2swVlFQNjJ1Ijt9', 1682171004);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` bigint UNSIGNED NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movieshowid` bigint UNSIGNED NOT NULL,
  `normalprice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `executiveprice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `premiumprice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seatnames` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalseats` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookingdate` date NOT NULL,
  `totalcost` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalpay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Completed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_userid_foreign` (`userid`),
  KEY `tickets_movieshowid_foreign` (`movieshowid`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `userid`, `user_name`, `movie_name`, `movieshowid`, `normalprice`, `executiveprice`, `premiumprice`, `seatnames`, `totalseats`, `bookingdate`, `totalcost`, `coupon`, `totalpay`, `Completed`, `created_at`, `updated_at`) VALUES
(130, 12, 'gauri', 'Selfiee', 312, '150', '200', '300', 'F-9,F-10,F-11', '3', '2023-04-22', '600', '', '713', 'Successful', '2023-04-22 13:29:21', '2023-04-22 13:29:38'),
(131, 18, 'Apurv Patel', '65', 313, '100', '100', '100', 'F-9,F-10,F-11', '3', '2023-04-22', '300', '', '356', 'Successful', '2023-04-22 14:56:24', '2023-04-22 14:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `upcomings`
--

DROP TABLE IF EXISTS `upcomings`;
CREATE TABLE IF NOT EXISTS `upcomings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `moviename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(4999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `releasedate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailerlink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cast` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upcomings`
--

INSERT INTO `upcomings` (`id`, `moviename`, `description`, `releasedate`, `genre`, `type`, `trailerlink`, `slug`, `cast`, `image`, `lang`, `created_at`, `updated_at`) VALUES
(14, 'Fast X', 'Dom Toretto and his family must confront a terrifying new enemy who`s fueled by revenge.', '2023-05-19', 'Action , Adventure , Crime , Thriller', '2D,IMAX2D', 'https://www.youtube.com/embed/XdF7PkwJT1A', 'fast x', 'vin diesel, jason momoa, john cena', '1678703670.avif', 'English, Hindi, Tamil, Telugu', '2023-03-13 10:34:31', '2023-03-13 10:34:31'),
(15, 'Adipurush', 'Adipurush is an adaptation of Indian mythology that depicts the triumph of good over evil.', '2023-06-16', 'Action , Adventure, mythology', '2D, 3D', 'https://www.youtube.com/embed/jF5rJAXUY4A', 'adipurush', 'Prabhas , Saif Ali Khan, Kritisanon', '1679209869.avif', 'Hindi, Telugu', '2023-03-13 10:40:06', '2023-03-19 07:11:09'),
(16, 'Bholaa', 'Bhola, a prisoner, is finally going home after 10 years of imprisonment to meet his young daughter. His journey gets difficult when he is arrested mid-way. At first, he is not aware of the grave situation he has got himself into but after a crazy incident takes place, he must travel a pathway full of crazy obstacles with death lurking around every corner. Will he get to meet his daughter?', '2023-03-30', 'Action, Drama , Thriller', '2D,3D', 'https://www.youtube.com/embed/K-EMszLvRIQ', 'bholaa', 'ajay devgan, tabu', '1678704547.avif', 'hindi', '2023-03-13 10:49:07', '2023-03-13 10:49:07'),
(17, 'Kisi Ka Bhai Kisi Ki Jaan', 'Salman Khan is a self-appointed vigilante committed to the cause of keeping the society crime-free. His younger brothers set him up with a woman similar to his previous love interest. What follows is a series of events that takes all of them across the length of the country and various revelations with all the elements of a wholesome entertainer.', '2023-04-21', 'Action , Comedy , Drama', '2D', 'https://www.youtube.com/embed/bGM490nJoDE', 'kisi ka bhai kisi ki jaan', 'Salaman Khan, Pooja Hegde', '1679210238.avif', 'Hindi', '2023-03-13 10:57:22', '2023-03-19 07:17:18'),
(18, 'Jawan', 'Jawan helmed by director Atlee Kumar, features Shah Rukh Khan and Nayanthara in prominent roles.', '2023-06-02', 'Action, Thriller', '2D', 'https://www.youtube.com/embed/fPX0C-g5xpU', 'jawan', 'Shah rukh khan, Nayan thara', '1679213698.avif', 'Hindi', '2023-03-19 08:14:58', '2023-03-19 08:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `city`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@gmail.com', '7878787878', 'Surat', '1', NULL, '$2y$10$N5JWLJ9etqgupbOrwzPuperIfI.Abvs6mgr441h5uEIpSk0VQP62u', NULL, NULL, NULL, NULL, NULL, '2022-02-14 23:03:15', '2022-03-21 03:42:45'),
(11, 'vedi', 'vedi@gmail.com', '1234567890', 'surat', '0', NULL, '$2y$10$c2VkcRcS841LxWTOTp1rTe9mcxbPG8VNOoNFPgaA1cyF8XKBHponi', NULL, NULL, 'FdoUAQOjKlwTc37toNw4ZJBRYrAXxPG3WP740f4exWd47tO6ghsGdc4HDOte', NULL, NULL, '2023-03-02 08:03:36', '2023-04-05 06:40:51'),
(12, 'gauri', 'gauri@gmail.com', '7865785433', 'kim', '0', NULL, '$2y$10$YAOy/R/SYcYbvKOhL.Y/MuOYzW3RhHyUDqhb7zV2h1gSs6queRCD.', NULL, NULL, '4HiHbrtbEsCkTYDfXRiEGXSdmjTGjU41PPzq8NZRD0PHUVHr1lKyz8ZdXUZz', NULL, NULL, '2023-03-02 08:06:14', '2023-04-05 06:38:04'),
(13, 'vruti', 'vruti@gmail.com', '0099887766', 'surat', '0', NULL, '$2y$10$nZ5Un8GRo2OfEUxuWhKAL.BR73NEXNcqZng4oz5csTM.exzgn0FNG', NULL, NULL, 'cdF4GUSHlnQuXfvmpIRvdZcbMpA9N4C2Pn8RWBZPxTh8DBVuOXCRVH8KKDhZ', NULL, NULL, '2023-03-20 10:44:52', '2023-04-05 06:39:21'),
(17, 'Anahita mam', 'anahita@gmail.com', '8976567543', 'Surat', '0', NULL, '$2y$10$77U8CZqWtHt7eS2XJHut.OoPiecG8xXtGwKwjLqPbRFCjG0ZFGgYi', NULL, NULL, NULL, NULL, NULL, '2023-04-06 08:48:14', '2023-04-06 08:48:14'),
(18, 'Apurv Patel', 'apurv_patel@yopmail.com', '9685968596', 'Surat', '0', NULL, '$2y$10$YCgbCTpyym7ykuESZAsIAeFRPMY5Glh2trvsRcCK73u4rlagClwfG', NULL, NULL, NULL, NULL, NULL, '2023-04-22 14:49:17', '2023-04-22 14:49:17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `download_p_d_f_s`
--
ALTER TABLE `download_p_d_f_s`
  ADD CONSTRAINT `download_p_d_f_s_movieshowid_foreign` FOREIGN KEY (`movieshowid`) REFERENCES `movie_shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `download_p_d_f_s_ticketid_foreign` FOREIGN KEY (`ticketid`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `download_p_d_f_s_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_shows`
--
ALTER TABLE `movie_shows`
  ADD CONSTRAINT `movie_shows_movieid_foreign` FOREIGN KEY (`movieid`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_shows_multiplexid_foreign` FOREIGN KEY (`multiplexid`) REFERENCES `multiplexes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_shows_screenid_foreign` FOREIGN KEY (`screenid`) REFERENCES `screens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_d_f_s`
--
ALTER TABLE `p_d_f_s`
  ADD CONSTRAINT `p_d_f_s_movieshowid_foreign` FOREIGN KEY (`movieshowid`) REFERENCES `movie_shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_d_f_s_ticketid_foreign` FOREIGN KEY (`ticketid`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_d_f_s_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `screens`
--
ALTER TABLE `screens`
  ADD CONSTRAINT `screens_multiplexid_foreign` FOREIGN KEY (`multiplexid`) REFERENCES `multiplexes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_movieshowid_foreign` FOREIGN KEY (`movieshowid`) REFERENCES `movie_shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
