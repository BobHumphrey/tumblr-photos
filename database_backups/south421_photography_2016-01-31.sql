-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2016 at 10:09 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `south421_photography`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `quality` tinyint(1) NOT NULL,
  `promo` tinyint(1) NOT NULL,
  `accepts_members` tinyint(1) NOT NULL,
  `member` tinyint(1) NOT NULL,
  `membership_date` date NOT NULL,
  `no_submissions` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `url`, `quality`, `promo`, `accepts_members`, `member`, `membership_date`, `no_submissions`, `created_at`, `updated_at`) VALUES
(1, 'Light Is Photography ', 'http://lightisphotography.tumblr.com/  ', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:52:46', '2015-08-22 22:52:46'),
(2, 'Photographers of Colour', 'http://photographers-of-colour.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-15 14:26:19', '0000-00-00 00:00:00'),
(3, 'Imiging', 'http://imiging.tumblr.com/submit', 1, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:51:28', '2015-08-22 22:51:28'),
(4, 'Photographers Society', 'http://thephotographerssociety.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-16 15:43:12', '2015-12-13 20:09:05'),
(5, 'Photographers Directory', 'http://photographersdirectory.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:53:13', '2015-08-22 22:53:13'),
(6, 'Lensblr', 'http://lensblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:55:49', '2015-12-13 20:08:22'),
(7, 'San Francisco MOMA', 'http://sfmoma.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:57:15', '2015-08-22 22:57:15'),
(8, 'Tumblr Open Arts', 'http://tumblropenarts.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:57:50', '2015-08-22 22:57:50'),
(9, 'YC Photography', 'http://ycphotographs.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:58:52', '2015-08-22 22:58:52'),
(10, 'Original Photographers', 'http://original-photographers.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:59:18', '2015-08-22 22:59:18'),
(11, 'Definitely Photography', 'http://definitelyphotography.tumblr.com/     ', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 22:59:48', '2015-08-22 22:59:48'),
(12, 'World Street Photography', 'http://www.worldsp.co/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:00:55', '2015-08-22 23:00:55'),
(13, 'If You Leave', 'http://if-you-leave.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:01:22', '2015-08-22 23:01:22'),
(14, 'Travel This World', 'http://travelthisworld.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:01:51', '2015-08-22 23:01:51'),
(15, 'Traveling Colors', 'http://travelingcolors.net/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:02:18', '2015-08-22 23:02:18'),
(16, 'Cross Connect Magazine', 'http://www.crossconnectmag.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:03:07', '2015-08-22 23:03:07'),
(17, 'Luxlit', 'http://www.luxlit.net/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:03:26', '2015-12-13 20:08:40'),
(18, 'Splash and Grab', 'http://splashandgrab.co.uk/       ', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:03:47', '2015-08-22 23:03:47'),
(19, 'Gray Card', 'http://gray-card.tumblr.com/   ', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:04:05', '2015-08-22 23:04:05'),
(20, 'Photos Worth Seeing', 'http://photosworthseeing.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:04:27', '2015-12-13 20:09:12'),
(21, 'Booooooom', 'http://www.booooooom.com/blog/photo/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:05:48', '2015-08-22 23:05:48'),
(22, '#Photography', 'http://www.hashtagphotographymagazine.co.uk/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:07:42', '2015-08-24 09:19:53'),
(23, 'Telescopical', 'http://telescopical.tumblr.com/submit', 0, 1, 0, 0, '0000-00-00', 0, '2015-08-22 23:09:44', '2015-08-22 23:09:44'),
(24, 'Camera Raw', 'http://camera-raw.tumblr.com/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:11:27', '2015-08-22 23:11:27'),
(25, 'American Guide', 'http://blog.theamericanguide.org/', 0, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:13:58', '2015-08-22 23:13:58'),
(26, 'Um Yes Please Photography', 'http://um-yesplease-photography.tumblr.com/', 1, 0, 0, 0, '0000-00-00', 0, '2015-08-22 23:15:05', '2015-12-13 20:09:25'),
(27, 'Original Plant', 'http://theoriginalplant.tumblr.com/', 1, 1, 0, 0, '0000-00-00', 0, '2015-08-22 23:16:01', '2016-01-17 00:08:49'),
(28, 'Radvis', 'http://radivs.tumblr.com/', 1, 0, 0, 0, '0000-00-00', 0, '2015-12-07 11:35:16', '2015-12-13 20:09:34'),
(29, 'I Stumbled Upon', 'http://istumbled-upon.tumblr.com/', 1, 0, 0, 0, '0000-00-00', 0, '2015-12-07 11:41:19', '2015-12-13 20:09:43'),
(30, 'Beautifully Framed', 'http://beautifullyframed.tumblr.com/', 1, 0, 0, 0, '0000-00-00', 0, '2016-01-17 00:08:31', '2016-01-17 00:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(10) unsigned NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `posted_date` date NOT NULL,
  `notes` smallint(6) NOT NULL,
  `other_notes` smallint(6) NOT NULL,
  `total_notes` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `file_name`, `url`, `posted_date`, `notes`, `other_notes`, `total_notes`, `created_at`, `updated_at`) VALUES
(1, 'j1UJryUnpm.jpg', 'http://bobhumphreyphotography.tumblr.com/post/117187405030/kure-beach-nc', '2015-04-23', 69, 0, 69, '2015-11-22 22:44:40', '2015-12-07 02:26:08'),
(2, 'vUYDgl53Oo.jpg', 'http://bobhumphreyphotography.tumblr.com/post/117720159251/wilmington-nc', '2015-04-29', 2, 0, 2, '2015-11-22 22:44:53', '2015-12-07 02:27:35'),
(3, 'mMmZUwpMHI.jpg', 'http://bobhumphreyphotography.tumblr.com/post/118633413555/myrtle-beach-sc', '2015-05-10', 2, 0, 2, '2015-11-22 22:46:00', '2015-12-07 02:29:37'),
(4, 'yyPNMWsBqb.jpg', 'http://bobhumphreyphotography.tumblr.com/post/118226757446/raleigh-nc', '2015-05-05', 1, 0, 1, '2015-11-22 22:46:02', '2015-12-07 02:30:21'),
(5, 'Q6nSmbdRe9.jpg', 'http://bobhumphreyphotography.tumblr.com/post/119134477889/wilmington-nc', '2015-05-16', 1, 0, 1, '2015-11-22 22:47:41', '2015-12-07 02:31:14'),
(6, 'sDl96TphNb.jpg', 'http://bobhumphreyphotography.tumblr.com/post/119691174267/southport-nc', '2015-05-23', 1, 0, 1, '2015-11-22 22:47:44', '2015-12-07 02:31:57'),
(7, 'WfqPZwBCD3.jpg', 'http://bobhumphreyphotography.tumblr.com/post/120282087450/hollywood-ca', '2015-05-30', 2, 0, 2, '2015-11-22 22:48:23', '2015-12-07 02:32:51'),
(8, 'TkVVB0efdh.jpg', 'http://bobhumphreyphotography.tumblr.com/post/120785697016/wilmington-nc', '2015-06-05', 4, 43, 47, '2015-11-22 22:48:29', '2015-12-07 02:34:39'),
(9, 'vfM7gNgwf9.jpg', 'http://bobhumphreyphotography.tumblr.com/post/121289290172/new-bern-nc', '2015-06-11', 0, 0, 0, '2015-11-22 22:48:33', '2015-12-07 02:35:31'),
(10, 'bFQyURDliP.jpg', 'http://bobhumphreyphotography.tumblr.com/post/121855662651/wilmington-nc', '2015-06-18', 0, 0, 0, '2015-11-22 22:48:37', '2015-12-07 02:36:15'),
(11, 'H4cQPMksrB.jpg', 'http://bobhumphreyphotography.tumblr.com/post/122372298495/raleigh-nc', '2015-06-24', 4, 0, 4, '2015-11-22 22:48:41', '2015-12-07 02:37:04'),
(12, '5IVjDECu8F.jpg', 'http://bobhumphreyphotography.tumblr.com/post/122791498374/carolina-beach-nc', '2015-06-29', 3, 0, 3, '2015-11-22 22:48:45', '2015-12-07 02:37:52'),
(13, 'lOOcqbLpic.jpg', 'http://bobhumphreyphotography.tumblr.com/post/123403862277/kure-beach-nc', '2015-07-06', 1, 0, 1, '2015-11-22 22:48:49', '2015-12-07 02:38:50'),
(14, 'FqBe6WHZLl.jpg', 'http://bobhumphreyphotography.tumblr.com/post/123927138771/british-columbia', '2015-07-12', 1, 0, 1, '2015-11-22 22:49:00', '2015-12-07 02:39:40'),
(15, '2kSsIcRHUg.jpg', 'http://bobhumphreyphotography.tumblr.com/post/124432236358/california', '2015-07-18', 3, 0, 3, '2015-11-22 22:49:03', '2015-12-07 10:48:00'),
(16, 'koNEp3d4Kp.jpg', 'http://bobhumphreyphotography.tumblr.com/post/124946408448/new-mexico', '2015-07-24', 14, 0, 14, '2015-11-22 22:49:06', '2015-12-07 10:48:59'),
(17, 'QEDFIVu9yO.jpg', 'http://bobhumphreyphotography.tumblr.com/post/125456833772/new-mexico', '2015-07-30', 2, 0, 2, '2015-11-22 22:49:09', '2015-12-07 10:49:56'),
(18, 'FhSBbWqQcA.jpg', 'http://bobhumphreyphotography.tumblr.com/post/125959405485/arizona-httpbobhumphreyphotographytumblrcom', '2015-08-05', 6, 0, 6, '2015-11-22 22:49:11', '2015-12-07 10:52:16'),
(19, 'r1GgjmPqy4.jpg', 'http://bobhumphreyphotography.tumblr.com/post/126533228207/colorado-httpbobhumphreyphotographytumblrcom', '2015-08-12', 4, 0, 4, '2015-11-22 22:49:17', '2015-12-07 10:53:25'),
(20, 'hRwaOkWUTB.jpg', 'http://bobhumphreyphotography.tumblr.com/post/127098220299/arizona-httpbobhumphreyphotographytumblrcom', '2015-08-19', 80, 0, 80, '2015-11-22 22:49:21', '2015-12-07 10:54:14'),
(21, 'NndPzREoWE.jpg', 'http://bobhumphreyphotography.tumblr.com/post/127668042040/utah-httpbobhumphreyphotographytumblrcom', '2015-08-26', 3, 0, 3, '2015-11-22 22:49:31', '2015-12-07 10:54:59'),
(22, 'tpiHHgnO8x.jpg', 'http://bobhumphreyphotography.tumblr.com/post/128291950883/page-az-httpbobhumphreyphotographytumblrcom', '2015-09-03', 3, 0, 3, '2015-11-22 22:49:34', '2015-12-07 10:55:40'),
(23, 'BdC6cjOLeG.jpg', 'http://bobhumphreyphotography.tumblr.com/post/128802425637/canon-beach-or', '2015-09-10', 59, 0, 59, '2015-11-22 22:49:37', '2016-01-17 00:13:59'),
(24, 'IqByVEwakt.jpg', 'http://bobhumphreyphotography.tumblr.com/post/129378497580/oregon-dunes-or', '2015-09-18', 2, 0, 2, '2015-11-22 22:49:40', '2015-12-07 10:57:04'),
(25, 'dNH5JVe4EM.jpg', 'http://bobhumphreyphotography.tumblr.com/post/129945333681/oregon-dunes-or', '2015-09-26', 6, 0, 6, '2015-11-22 22:49:43', '2015-12-07 10:57:43'),
(26, 'DjpPpcyv2d.jpg', 'http://bobhumphreyphotography.tumblr.com/post/130435310877/oregon-dunes-or', '2015-10-03', 2, 0, 2, '2015-11-22 22:49:47', '2015-12-07 10:58:18'),
(27, 'Xf0jMNddYK.jpg', 'http://bobhumphreyphotography.tumblr.com/post/130911916218/oregon-dunes-or', '2015-10-10', 4, 0, 4, '2015-11-22 22:49:51', '2015-12-07 10:59:00'),
(28, '77SSdy2lwG.jpg', 'http://bobhumphreyphotography.tumblr.com/post/131311905986/oregon-dunes', '2015-10-16', 4, 0, 4, '2015-11-22 22:50:02', '2015-12-07 11:01:45'),
(29, 'inV4yBWdsC.jpg', 'http://bobhumphreyphotography.tumblr.com/post/131771776856/oregon-dunes-or', '2015-10-23', 49, 0, 49, '2015-11-22 22:50:05', '2015-12-07 11:40:12'),
(30, 'X9AVxdX5PZ.jpg', '', '0000-00-00', 0, 0, 0, '2015-12-08 12:16:31', '2015-12-08 12:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `submission_id` int(10) unsigned NOT NULL,
  `gallery_id` int(10) unsigned NOT NULL,
  `photo_id` int(10) unsigned NOT NULL,
  `submitted_date` date NOT NULL,
  `published_flag` tinyint(1) NOT NULL,
  `published_date` date NOT NULL,
  `published_not_submitted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submission_id`, `gallery_id`, `photo_id`, `submitted_date`, `published_flag`, `published_date`, `published_not_submitted`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2015-05-01', 1, '2015-05-05', 0, '2015-12-07 11:20:10', '2015-12-07 11:31:20'),
(2, 28, 20, '2015-08-20', 1, '2015-08-20', 1, '2015-12-07 11:37:26', '2015-12-07 11:37:26'),
(3, 26, 8, '2015-06-15', 1, '2015-06-19', 0, '2015-12-07 11:38:50', '2015-12-07 11:38:50'),
(4, 29, 29, '2015-10-30', 1, '2015-10-30', 1, '2015-12-07 11:45:22', '2015-12-07 11:45:22'),
(5, 14, 29, '2015-12-07', 0, '0000-00-00', 0, '2015-12-07 12:12:20', '2015-12-07 12:16:29'),
(6, 26, 25, '2015-12-07', 0, '0000-00-00', 0, '2015-12-07 12:17:02', '2015-12-07 12:17:02'),
(7, 17, 23, '2015-12-07', 0, '0000-00-00', 0, '2015-12-07 12:22:40', '2015-12-07 12:22:40'),
(8, 27, 18, '2015-12-09', 0, '0000-00-00', 0, '2015-12-09 11:26:56', '2015-12-09 11:26:56'),
(9, 23, 25, '2015-12-09', 0, '0000-00-00', 0, '2015-12-09 11:30:37', '2015-12-09 11:30:37'),
(10, 27, 23, '2016-01-13', 1, '2016-01-13', 1, '2016-01-17 00:06:17', '2016-01-17 00:06:17'),
(11, 30, 23, '2016-01-15', 1, '2016-01-15', 1, '2016-01-17 00:09:59', '2016-01-17 00:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'rphumphrey@gmail.com', 'Bob', '$2y$10$d2dw9oBrbHBnAnhMBbEl8OAfESv6pR.7VhhL4ymQPsXwug2eyymWG', 'rApalmBw5asC3p3q902cmLevg0COuLsQQI7OWBq4yA4rcL3kML7r73ZQjN5y', '2015-10-10 20:50:47', '2015-10-10 21:30:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`), ADD KEY `quality` (`quality`), ADD KEY `promo` (`promo`), ADD KEY `accepts_members` (`accepts_members`), ADD KEY `member` (`member`), ADD KEY `name` (`name`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`), ADD KEY `file_name` (`file_name`), ADD KEY `posted_date` (`posted_date`), ADD KEY `total_notes` (`total_notes`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submission_id`), ADD KEY `gallery_id` (`gallery_id`), ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD KEY `email` (`email`), ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submission_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
ADD CONSTRAINT `gallery` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `photo` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
