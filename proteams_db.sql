-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 08:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proteams_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 'Bangalore', '2025-03-02 18:57:16', NULL, NULL, NULL),
(2, 'Mumbai', '2025-03-02 18:57:16', NULL, NULL, NULL),
(3, 'Hydrabad', '2025-03-02 18:57:16', NULL, NULL, NULL),
(4, 'Kolkata', '2025-03-02 18:57:16', NULL, NULL, NULL),
(5, 'Pune', '2025-03-02 18:57:16', NULL, NULL, NULL),
(6, 'Delhi', '2025-03-02 18:57:16', NULL, NULL, NULL),
(7, 'Chennai', '2025-03-02 18:57:16', NULL, NULL, NULL),
(8, 'Kochi', '2025-03-02 18:57:16', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `location` int(11) NOT NULL,
  `dob` datetime NOT NULL DEFAULT current_timestamp(),
  `profile_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `email`, `password`, `location`, `dob`, `profile_photo`) VALUES
(1, 'wpexplorer', 'wpexplorer@192002', 1, '2025-03-01 00:00:00', ''),
(2, 'anushabupalam561@gmail.com', 'sDrrs6t56s', 3, '2025-03-02 00:00:00', ''),
(4, 'anushab@gmail.com', 'an7645433t', 5, '2025-03-01 00:00:00', ''),
(6, 'anushabupalam@gmail.com', '243anus68', 4, '2025-03-01 00:00:00', ''),
(7, 'anushabb@gmail.com', '05e8bba0f3dbfb88600571fdac4864d29d9b060ba0d3157367e792f8bd53da0eb7b85866c73638be672ec6572b9cd1454e1fa3af5b8ac8be4eb97b5ec2370214RDoqAmsSNeghF4oic7xVk1mVd3bL+qXzrT8Ycu+rO1k=', 5, '2025-03-01 00:00:00', ''),
(8, 'anusha456@gmail.com', 'ee7578d4eb4c8a962fe0988abd128ceda042a744093e6f739ab7686c4b8ff90de38d39876d1dabd6443791625e85793586a40a0407526b696f6d6909c037f521hdan6XMbdbx6TTNmZgSpKqtWdZI/og1oCQS4dqA6tKg=', 4, '2025-03-01 00:00:00', ''),
(9, 'anusha561@gmail.com', 'e63a5e7e3e812e3f4fb2d7c00e1ecd7c4c2d62aa81f865c1194c27352228454c237f1d5173946d87a6a128cce483f659cc14a14d06472bddffa1ba6af64983a5tqISBOF7oue+w50fzG1vq8UM8j/7RR8FtaR9feVK0sc=', 4, '2025-03-01 00:00:00', ''),
(10, 'anusha133@gmail.com', '969e6627fbc0f50af9d4c05160cbe84546b5e39e7abfd15923ef5a597d0c80ea00473c77c0d3e6b3fb7ef6e35bfd304e32e9a69a7d03a7d0c57c5f348c41253dPQ66r9liFU5UMPI0OmDFXOjNiUD8vjeFhU79BUNB7SQ=', 1, '2025-03-01 00:00:00', ''),
(11, 'anushab123@gmail.com', '11d5477ff03b545c18709fb9e2ee8a3345a8b520837aa7d25bd66f72479e407b5659794986d98e4486d31893b4fda2e9b2669c4e41bf30f0827eed86ed34554ddf3HrKdV0Us/9qB/sJZMAJArrukW/fCMfsRrUACdvgE=', 2, '2025-03-01 00:00:00', ''),
(12, 'anusha5612@gmail.com', '12f3268b5f2fde6d094d655062ad13cad4f1a286607ea99bc6f3f91360f3a4aad6af56e4bf3013e7cbfad0f6a5450570995424d68eadbfe96e7827b99377582a6lE3ExVAoSwpfl129NvtMgivY3RLKwQtWYycWMvQzYY=', 6, '2025-03-01 00:00:00', ''),
(13, 'anushappp@gmail.com', '10a98e68c38abd92d3f73c9470d46fba9fdb81716866df5016eb0eb1f93fc61128a3cd22d0d48c8275bb6e3bd3ca35baf91d6d1d384f49e929a8aec06f3b6beeFmlJBjbdfNar1Yk7M8EWeq4lf4yI+jxN5BRDpqD3joI=', 3, '2025-03-01 00:00:00', 'http://localhost/proteams-project/./uploads/1694972928281.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
