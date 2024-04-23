-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2024 at 01:25 PM
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
-- Database: `db-skill-wave`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `image`, `email`) VALUES
(1, 'admin', 'admin', '$2y$10$O.b0UXUgTgYXqFrNWv8y4eRyFkPsl/e79pNYQ5ydzDqYH5yrrpnTO', '4be7636756f81a2b459162edb6ba4d99.png', 'mushkirmohamed@gmail.com'),
(2, 'mushkir', 'mushkir', '$2y$10$Xgoty9CS350llSTDLPuEXeXLWLoynYgWsZhhS8TGgtoTCzLL0mhau', 'aef964a327106ae36f04f7d20c19a17d.jpeg', 'zajopeda@example.com'),
(3, 'faqabeqybu', 'faqabeqybu', '$2y$10$ngVhgsnJS5NkjtXg61ejU.lH5/Gr5z4.OxND/TCprRqpImUqbt2dS', '601b958f34e56db4198f25aa37b06351.png', 'taqutyxy@example.com'),
(4, 'nasiqyfy', 'nasiqyfy', '$2y$10$48mdYUMlH1DubK1npLmvueHnMnFtdqYvLddOD01pyvVG.jOSYh/VS', '2851460c5753eaed96e7ae2c87f464ea.png', 'pubita@example.com'),
(5, 'hisowuqaky', 'hisowuqaky', '$2y$10$4ueevNcsahEhPNUv3buViu.KeoWXe82DDf1OE9U6At2.NVMSLKt3i', '8b7f270b6847f6d0697b70f1f9839b9e.jpg', 'volef@example.com'),
(6, 'mikareby', 'mikareby', '$2y$10$TGDzDUy.hyL.POPJJPIRAeSQGcilKKW5LqqY4QvmNGfgIKNpVpOBW', '39d20177166a0c85a22b2b5c19a5ebea.png', 'feqyxujam@example.com'),
(7, 'sigupyho', 'sigupyho', '$2y$10$EnY4XUQL.VaEbjXLU4hdFOWc47K/aphLih9HFtr0f4tpnjeJsBrkG', '5e8289f166e6ecba71d477d862be3150.png', 'duryra@example.com'),
(8, 'Kishor Ramesh', 'hygufem', '$2y$10$Kz99l22ivAxql7jukUBYw.Q.yeb.4cKierU0lDdZEZgDi4AyeY/W.', 'f068014f2e7260f3d463f0a116bda28e.jpeg', 'nohuz@example.com'),
(9, 'Gayathri Selvan', 'tahano', '$2y$10$vM5xULtnPEFStUPutJkPUuV5siLymKZt0CDW0h4C8Pwd7z9ZnHtyu', '92194c6044c86f159ae56c83bbfd803b.jpg', 'cofirase@example.com'),
(10, 'Yogharaj Sharif', 'qeceg', '$2y$10$sq8irlophX262HXxnSWpVenarC3v2COSM5Vl9J6aDjYH4sHlln9ty', 'f04c0e56495a0094ce89e648beea4bee.png', 'nuhero@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `table_&_providers_detail`
--

CREATE TABLE `table_&_providers_detail` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_district`
--

CREATE TABLE `table_district` (
  `district_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_district`
--

INSERT INTO `table_district` (`district_id`, `name`) VALUES
(2, 'Anuradhapura'),
(3, 'Badulla'),
(4, 'Batticaloa'),
(5, 'Colombo'),
(6, 'Galle'),
(7, 'Gampaha'),
(8, 'Hambantota'),
(9, 'Jaffna'),
(13, 'Kilinochchi'),
(14, 'Kurunegala'),
(15, 'Mannar'),
(16, 'Matale'),
(17, 'Matara'),
(31, 'Kalkuda'),
(32, 'Thaalanguda');

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

CREATE TABLE `table_feedback` (
  `feedback_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `nic_no` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_payment`
--

CREATE TABLE `table_payment` (
  `payment_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nic_no` varchar(12) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_services`
--

CREATE TABLE `table_services` (
  `services_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `nic_no` varchar(12) NOT NULL,
  `description` varchar(200) NOT NULL,
  `service_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_service_category`
--

CREATE TABLE `table_service_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_service_provider`
--

CREATE TABLE `table_service_provider` (
  `service_provider_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address_line` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL,
  `town_id` int(11) NOT NULL,
  `latitude_value` varchar(20) NOT NULL,
  `longitutde_value` varchar(20) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(50) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_service_provider`
--

INSERT INTO `table_service_provider` (`service_provider_id`, `name`, `email_address`, `contact_no`, `username`, `password`, `gender`, `address_line`, `district_id`, `town_id`, `latitude_value`, `longitutde_value`, `qualification`, `skills`, `image`, `description`, `keywords`, `price`, `status`) VALUES
(1, 'Jeya Kummar', 'vywagy@example.com', '+91218373429', 'fumawewo', '$2y$10$qYLafcZ0iOoCPpl2MztyX.GfFOEuV8oHGq0xzhil00sF0Hf8DxW.6', 'Other', '638 North Cowley Court', 7, 4, '7.4143831', '81.8306334', 'In et veritatis dolo', 'Repudiandae aliqua ', '20f98461e50ae8b28e979ea208478b3f.jpeg', 'Voluptatem accusamus', 'Blanditiis labore ad', 618, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `table_service_seeker`
--

CREATE TABLE `table_service_seeker` (
  `service_seeker_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address_line` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `latitude_Value` varchar(100) NOT NULL,
  `longitude_value` varchar(100) NOT NULL,
  `identity_card_no` varchar(12) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_service_seeker`
--

INSERT INTO `table_service_seeker` (`service_seeker_id`, `name`, `email_address`, `contact_no`, `username`, `password`, `gender`, `address_line`, `city`, `latitude_Value`, `longitude_value`, `identity_card_no`, `image`) VALUES
(24, 'Muthu Kumar', 'tiwusevo@example.com', '+94777195282', 'piqosoqu', '$2y$10$cFELBnT9ISofro5hkBVGb.29j3m9l0tvNFdus.bxEXLVPe2VhOlP.', 'Male', 'No. 246/A, Meera Nagar Road', 'Nintavur', '7.3314137', '81.8333656', '199631401505', '7d9b5d1912afa6ce0fc1cadc40e7623e.png'),
(25, 'Vasanth Akalya', 'vycuho@example.com', '+914984193297', 'pymuquqo', '$2y$10$1hnHdoXZ7u1WVc0ux5Ccp.EVjzV/Ib9LA6R6qaHiigftyR81PFRQS', 'Female', '690 North White First Boulevard', 'Nintavur', '7.3314137', '81.8333656', '999631401505', '34e59786381293150833bb806e4e0bce.png'),
(26, 'Muthu Sweety', 'pofaxep@example.com', '+94777195287', 'nizonowepo', '$2y$10$POvciyQP628UNXH.qcEvgeVu3TEvw.Pirl1U8Z/elhAHWVHAzNkHC', 'Other', '19 South Fabien Lane', 'Nintavur', '7.3314137', '81.8333656', '199631401509', '75eb2710dd80781c7309dadece1623b3.jpg'),
(27, 'Riyaz Selvan', 'zajiz@example.com', '+911488711841', 'noqopyna', '$2y$10$nqYs2vOT6uj.0sVL0OMJ2OC6mRJP6kOEyEbGwSFyxVj2aRPzNIywe', 'Male', '760 Oak Freeway', 'Nintavur', '7.3314137', '81.8333656', '179631401505', '1c9aa7058e3e41d69d86af5ad8c99520.png'),
(28, 'Mohamed Suthan', 'muku@example.com', '+914217728474', 'qotysy', '$2y$10$8Z4nbrvRJY6TUofunAwGXOKc.pYFBxPFpDsiJVbdtx4fyU9G9jrU.', 'Male', '87 White Old Street', 'Nintavur', '7.3314137', '81.8333656', '199631401508', 'cc3bc6118d85974edceb5c02e4eac7ee.jpg'),
(29, 'Dinesh Kummar', 'gyguqo@example.com', '+919324413814', 'pawyke', '$2y$10$G51r29LvOkWIQeY/.UWV4.HC9UDGbj14PS3nkEitoOpAHAEHYnj2W', 'Other', '46 West Rocky Hague Lane', 'Nintavur', '7.3314137', '81.8333656', '199631411505', 'b1dea88788ea5b2934412601bb80f1d8.jpg'),
(30, 'Jeya Suthan', 'xiduxufaq@example.com', '+915315999221', 'peniwoma', '$2y$10$lr6KRBtvjcHAV8rGvhSkiOgDVZJt0/8zdee99.RKhakSf6M5nLIoS', 'Female', '656 East First Extension', 'Nintavur', '7.3314137', '81.8333656', '199631401405', 'b432ed0d3eb9534765f48137f2764fa9.jpeg'),
(31, 'Mohamed Suthan', 'gidume@example.com', '+912262677435', 'nufijyw', '$2y$10$Z6Ynv2jtXwEJIML5EFF9.eQ827BKMJdmW6jYa1Tj.bqABh2tkb/fe', 'Other', '51 White Old Road', 'Nintavur', '7.3314137', '81.8333656', '199631474505', '6b16015af39fab42227a59560b4245e8.png'),
(32, 'Jeba Kumar', 'xonycecype@example.com', '+911947885298', 'wyhidoha', '$2y$10$TNleW3BK0zJ5NbfSlGCMqOyXzINAXuOynqnfP9bmwTbrDK27ICcOG', 'Female', '917 East Hague Boulevard', 'Nintavur', '7.3314137', '81.8333656', '199631400000', '5baccc7997564857032c56a802bb9726.png');

-- --------------------------------------------------------

--
-- Table structure for table `table_town`
--

CREATE TABLE `table_town` (
  `town_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_town`
--

INSERT INTO `table_town` (`town_id`, `name`, `district_id`, `district_name`) VALUES
(4, 'Kalmunai', 4, 'Batticaloa'),
(5, 'Dehiwala', 5, 'Colombo'),
(6, 'Batticaloa', 4, 'Batticaloa'),
(7, 'Maradana', 5, 'Colombo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `table_&_providers_detail`
--
ALTER TABLE `table_&_providers_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ser_provider_FK` (`provider_id`),
  ADD KEY `cat_id_FK` (`category_id`);

--
-- Indexes for table `table_district`
--
ALTER TABLE `table_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `table_feedback`
--
ALTER TABLE `table_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `service_id_FK` (`service_id`);

--
-- Indexes for table `table_payment`
--
ALTER TABLE `table_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `table_services`
--
ALTER TABLE `table_services`
  ADD PRIMARY KEY (`services_id`),
  ADD KEY `service_provider_id_FK` (`provider_id`),
  ADD KEY `service_seeker_id` (`seeker_id`);

--
-- Indexes for table `table_service_category`
--
ALTER TABLE `table_service_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `table_service_provider`
--
ALTER TABLE `table_service_provider`
  ADD PRIMARY KEY (`service_provider_id`);

--
-- Indexes for table `table_service_seeker`
--
ALTER TABLE `table_service_seeker`
  ADD PRIMARY KEY (`service_seeker_id`);

--
-- Indexes for table `table_town`
--
ALTER TABLE `table_town`
  ADD PRIMARY KEY (`town_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_&_providers_detail`
--
ALTER TABLE `table_&_providers_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_district`
--
ALTER TABLE `table_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_feedback`
--
ALTER TABLE `table_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_payment`
--
ALTER TABLE `table_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_services`
--
ALTER TABLE `table_services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_service_category`
--
ALTER TABLE `table_service_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_service_provider`
--
ALTER TABLE `table_service_provider`
  MODIFY `service_provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_service_seeker`
--
ALTER TABLE `table_service_seeker`
  MODIFY `service_seeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `table_town`
--
ALTER TABLE `table_town`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_&_providers_detail`
--
ALTER TABLE `table_&_providers_detail`
  ADD CONSTRAINT `cat_id_FK` FOREIGN KEY (`category_id`) REFERENCES `table_&_providers_detail` (`id`),
  ADD CONSTRAINT `ser_provider_FK` FOREIGN KEY (`provider_id`) REFERENCES `table_service_provider` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_feedback`
--
ALTER TABLE `table_feedback`
  ADD CONSTRAINT `service_id_FK` FOREIGN KEY (`service_id`) REFERENCES `table_services` (`services_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_services`
--
ALTER TABLE `table_services`
  ADD CONSTRAINT `service_provider_id_FK` FOREIGN KEY (`provider_id`) REFERENCES `table_service_provider` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_seeker_id` FOREIGN KEY (`seeker_id`) REFERENCES `table_service_seeker` (`service_seeker_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
