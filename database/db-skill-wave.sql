-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2024 at 12:57 PM
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
(32, 'Thaalangud'),
(35, 'Ampara');

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

CREATE TABLE `table_feedback` (
  `feedback_id` int(11) NOT NULL,
  `subject` varchar(12) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_feedback`
--

INSERT INTO `table_feedback` (`feedback_id`, `subject`, `provider_id`, `seeker_id`, `feedback`, `rating`, `service_id`) VALUES
(9, 'Nice', 20, 36, 'super, wonderful, marveloussuper, wonderful, marveloussuper, wonderful, marvelous', '2.3', 1),
(10, 'Low', 1, 36, 'Need more improvement', '2.9', 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_payment`
--

CREATE TABLE `table_payment` (
  `payment_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_payment`
--

INSERT INTO `table_payment` (`payment_id`, `status`, `seeker_id`, `provider_id`, `services_id`, `amount`, `date_time`) VALUES
(2, 'Paid', 36, 20, 1, 1000, '2024-06-08 10:05:45'),
(3, 'Paid', 36, 1, 2, 900, '2024-06-08 10:40:57'),
(4, 'Paid', 36, 1, 3, 896, '2024-06-08 10:52:23'),
(5, 'Pending', 24, 19, 4, 500, '2024-06-09 03:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `table_services`
--

CREATE TABLE `table_services` (
  `services_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `service_charge` int(11) NOT NULL,
  `service_agreed` tinyint(1) NOT NULL,
  `service_status` varchar(20) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` tinyint(1) NOT NULL,
  `feedback_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_services`
--

INSERT INTO `table_services` (`services_id`, `provider_id`, `seeker_id`, `description`, `service_charge`, `service_agreed`, `service_status`, `date_time`, `payment_status`, `feedback_status`) VALUES
(1, 20, 36, 'Engine oil, suspension oil changed', 1000, 1, 'completed', '2024-06-08 15:07:51', 1, 1),
(2, 1, 36, 'Pipeline changed, valve changed', 900, 1, 'completed', '2024-06-08 15:23:16', 1, 1),
(3, 1, 36, 'Enim ad ratione non ', 896, 1, 'completed', '2024-06-08 10:52:23', 1, 0),
(4, 19, 24, 'asass', 500, 1, 'completed', '2024-06-09 03:19:12', 0, 0);

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
  `keywords` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(20) NOT NULL,
  `profile_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_service_provider`
--

INSERT INTO `table_service_provider` (`service_provider_id`, `name`, `email_address`, `contact_no`, `username`, `password`, `gender`, `address_line`, `district_id`, `town_id`, `latitude_value`, `longitutde_value`, `qualification`, `skills`, `image`, `description`, `keywords`, `price`, `status`, `profile_status`) VALUES
(1, 'Jeya Kummar', 'vywagy@example.com', '0777156325', 'fumawewo', '$2y$10$qYLafcZ0iOoCPpl2MztyX.GfFOEuV8oHGq0xzhil00sF0Hf8DxW.6', 'Other', '638 North Cowley Court', 4, 6, '7.7249146', '81.6966911', 'In et veritatis dolo', 'Electrician', '8ae2956c4f157050ce7687b3f254fa26.jpeg', 'House Electrical Fixing', 'Electrical, electrician, electrical man, electrical worker, electric worker', 618, 'available', 'accepted'),
(3, 'Mohamed Ramesh', 'tysiho@example.com', '+91177768935', 'zuvosifano', '$2y$10$WA6lMInx0iW3dXHpg5K50.6ppeu.2ScSKyOBaPkdj/cZYSthim1Xm', 'Other', '27 Hague Extension', 16, 7, '6.926997', '79.8639835', 'Labore reiciendis el', 'Mechanic', '54eea2d903de3172582bfaf1d1f7d6f1.jpeg', 'Quasi mollit explica', 'mechanic, bike mechanic, car mechanic, light vehicle mechanic, heavy vehicle mechanic, puncture, oil changing', 517, 'busy', 'accepted'),
(4, 'Khaja Mariyaan', 'kylyqeqyxi@example.com', '+91793611313', 'sufeq', '$2y$10$/CpA6pR/mIEZvBhTOK1FnOboaKQQ/ItZLvzef3U/5LiF1Obm/hDIC', 'Male', '65 Milton Road', 9, 6, '7.7249146', '81.6966911', 'MBBS, MD', 'Surgeon, Child Doctor', 'cd96ec1eaa95fc27e2d16d9234fbf7dd.jpeg', 'Tempor ad eius non t', 'surgeon, child doctor, doctor', 146, 'available', 'accepted'),
(5, 'Jeba Mohamed', 'zykutaqimo@example.com', '+91711297825', 'cymitazuv', '$2y$10$Z0hNj8atKzueaqUQaQzPy.CEVPaatFaNoBuDLMIE1cNOOXdR/LpQK', 'Female', '42 White Hague Freeway', 4, 4, '7.4143831', '81.8306334', 'Et debitis autem dol', 'Electrician', 'fe8235cda713ff183c8817db8bb636af.jpeg', 'Dicta officiis minim', 'Dolore proident sin', 63, 'busy', 'accepted'),
(7, 'Sudharshan Vedhasek', 'behuqup@example.com', '+91152869969', 'kohudokyby', '$2y$10$AMqCj7HvZIEs1MIzMVWfee48TCATD.9UfOXzG3klG6RhHZiYseW5y', 'Other', '284 First Freeway', 32, 7, '6.926997', '79.8639835', 'Engineer', 'Civil Engineer', 'a7ce9f4a10dc83c1f493d0efd8b2234c.jpeg', 'Harum vel eos duis ', 'Civil Engineer, civil, engineer, construction, building', 631, 'available', 'accepted'),
(8, 'Dinesh Sweety', 'betisogub@example.com', '+91313297941', 'sidof', '$2y$10$tKg.aImPge1r.fO/MrNOHucYgylVkZUlcP3yTje3Fb0atvRqXPcMS', 'Other', '23 North Old Road', 14, 5, '6.8559485', '79.8629683', 'Corporis est id vo', 'Computer Technician', 'd4f14c9e0789217d2dc87a357963f166.jpeg', 'Elit laboriosam la', 'computer repairing, computer, os installing, computer fixing', 628, 'available', 'accepted'),
(9, 'Shajid Ramesh', 'pyxedi@example.com', '+91569483918', 'nasizateky', '$2y$10$M3RivHzbL8Ot2jXm.GaU5.IxyabnlAM6ZqYZCgjXo4A7adAtZmyj6', 'Female', '17 West Fabien Lane', 7, 5, '6.8559485', '79.8629683', 'Qui anim libero aut ', 'Quam quos et archite', '7ac26b3287f781a15ef7be333e95299a.jpeg', 'Ea voluptatum ullamc', 'Qui nulla qui animi', 781, 'available', 'accepted'),
(10, 'Sudharshan Sweety', 'tuvivemiru@example.com', '+91169671724', 'tucuc', '$2y$10$pcDlbV1/7BIMhLuepUW3wOJbM5xqP8BMxVP0L/0KA7hL6E8FFG.9.', 'Other', '708 First Court', 6, 6, '7.7249146', '81.6966911', 'Deserunt rerum possi', 'Deleniti est autem ', '2d6c5175229a5dc5652817b20e21478c.jpeg', 'Dolorum a autem et d', 'Optio fugit cum ex', 283, 'available', 'accepted'),
(11, 'Riyaz Mushkir', 'hacu@example.com', '+91417448683', 'besan', '$2y$10$t9hRPVcMtKAWOJzy6z/QVetcRzS9kz3CEmJmH9IbQGH/X9SE6YXnK', 'Female', '81 Old Extension', 7, 4, '7.4143831', '81.8306334', 'Anim provident mole', 'Ea maxime alias quas', 'fb1951be98a0c677bc246280f4d72eaa.jpeg', 'Alias aut amet dolo', 'Laboriosam quibusda', 68, 'available', 'accepted'),
(12, 'Muthu Selvan', 'kibi@example.com', '+91282473523', 'gywegahuro', '$2y$10$QPxCFLzJuhiRdWzo4YuVye2Zbwj7ZWnEU14RaSDNPYNN/D9fBiDKK', 'Male', '850 Rocky Second Avenue', 17, 6, '7.7249146', '81.6966911', 'Aperiam dolore dolor', 'Sit quos et vero nis', 'fc20ad7559b675380c4152c2d3c81b09.jpeg', 'Architecto qui dolor', 'Quas quia rem qui la', 607, 'available', 'accepted'),
(13, 'Suriya Mohamed', 'some@example.com', '+91583355712', 'tugahu', '$2y$10$u2cfYWTAyLTXSZMVSjfbAeeMBvbbS7XctwWIGe6hcwtPoF1vkggxS', 'Male', '411 West Second Extension', 7, 6, '7.7249146', '81.6966911', 'Unde ut soluta et qu', 'Esse aspernatur est ', '4cad6a3ed2d70d33473f0573e6d6bd2a.jpeg', 'Voluptatem Eiusmod ', 'Dolore proident sit', 704, 'available', 'accepted'),
(14, 'Jeya Mohamed', 'jyqodipevu@example.com', '+91433717579', 'habokudaz', '$2y$10$IMvYSpibmYMUM8epWFF5Tu5BGbP2BifW3g/pIjNpAaqGcbSoGrGYq', 'Male', '760 West Cowley Street', 32, 7, '6.926997', '79.8639835', 'Porro enim sapiente ', 'Dolore minus laudant', 'e76fc6cc030865381cfe1c36a0fbaba5.jpeg', 'Dolor aperiam sit ir', 'Est soluta ipsa vo', 13, 'available', 'accepted'),
(15, 'Anbu Sweety', 'risop@example.com', '+91897668227', 'punih', '$2y$10$owstBnyhsTK4iQIk/PIr8.0GNt3amwRBBv.0ahliZ1ov8A6rGzROy', 'Other', '55 East Rocky Fabien Parkway', 7, 7, '6.926997', '79.8639835', 'Ut tempor aliquam ip', 'Quod ipsum consequat', 'a2eaccc21b771edf6ceb4e2e7db14b08.jpeg', 'Laboris illum volup', 'Cillum ea laboris as', 702, 'available', 'accepted'),
(16, 'Vijay Dhayalan', 'xukyjehos@example.com', '+91143677181', 'pepoti', '$2y$10$jBOWaOgju1RYcwUkq5PPhuz.J8ussR3GG22mn18HBz5VzUuE3RQrK', 'Male', '544 North Clarendon Road', 5, 5, '6.8559485', '79.8629683', 'Sint tempore volup', 'Inventore et modi co', '91dcb7432aae3698c9a96c4b16f4af7a.jpeg', 'Quaerat autem laboru', 'Qui id sunt veritati', 535, 'available', 'accepted'),
(17, 'Swetha Sabari', 'secegehosa@example.com', '+91323662147', 'modidete', '$2y$10$lzcWZcnesckfv.eCGbqdoOJdY03QgGs26A4uu64Gy6JQb73/2BJ1u', 'Female', '470 West White Old Parkway', 7, 7, '6.926997', '79.8639835', 'Minim placeat eius ', 'Molestiae quia ut al', '528f1c12a2ccd54e3653c655db3b4852.jpeg', 'Natus velit in tenet', 'Assumenda incididunt', 387, 'available', 'accepted'),
(18, 'Sudharshan Gangathar', 'cywepys@example.com', '+91769671633', 'qywutuk', '$2y$10$6QCpnr/qL4dzUszsSrUt7O.tT/3jA9OwDgIRBlf4cylipXv2SHOES', 'Female', '64 South Second Street', 7, 6, '7.7249146', '81.6966911', 'Non nulla sint sequ', 'Incidunt perspiciat', 'bcd2abce98d83c245820d845ceaa2394.jpeg', 'Ipsum culpa saepe t', 'Rerum rem optio et ', 389, 'busy', 'accepted'),
(19, 'Mushkir Mohamed', 'mushkirmohamed@gmail.com', '+94777195282', 'mushkir_96', '$2y$10$q8u4CoYYWnA9J9bEJjrNhug6lc/9yVY/iJiO0SpAXHXMLwVguWRSu', 'Male', 'No. 246/A, Meera Nagar Road', 5, 7, '6.926997', '79.8639835', 'OW', 'Mechanic', '58ee9650878ff83154fff0e21742634c.jpeg', 'pgfjpdohg', 'Puncture, Bike oil changing, Engine issue fixing', 1000, 'available', 'accepted'),
(20, 'Kishor Devi', 'mushkirmohamed9699@gmail.com', '+94756989876', 'kalyqiw', '$2y$10$YAy4BqKMkxeuCwPwzspNMunY3eaYagtPzHjRL8RSvxjzcTMZqFDv.', 'Male', '109 East Clarendon Drive', 4, 6, '7.7249146', '81.6966911', 'Nihil perspiciatis ', 'Magna ex distinctio', '67996a702fe1bdc41a282c8571e7cc23.jpeg', 'Officia natus offici', 'Omnis optio aut atq', 489, 'available', 'accepted');

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
(30, 'Jeya Suthan', 'xiduxufaq@example.com', '+915315999221', 'peniwoma', '$2y$10$lr6KRBtvjcHAV8rGvhSkiOgDVZJt0/8zdee99.RKhakSf6M5nLIoS', 'Female', '656 East First Extension', 'Nintavur', '7.3314137', '81.8333656', '199631401405', 'b432ed0d3eb9534765f48137f2764fa9.jpeg'),
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
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `table_feedback`
--
ALTER TABLE `table_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_payment`
--
ALTER TABLE `table_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_services`
--
ALTER TABLE `table_services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_service_category`
--
ALTER TABLE `table_service_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_service_provider`
--
ALTER TABLE `table_service_provider`
  MODIFY `service_provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_service_seeker`
--
ALTER TABLE `table_service_seeker`
  MODIFY `service_seeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `table_town`
--
ALTER TABLE `table_town`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
