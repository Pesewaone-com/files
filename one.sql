-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 09:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE `business_category` (
  `category_id` int(11) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`category_id`, `industry_id`, `category_name`) VALUES
(1, 1, 'Mobile Phones '),
(2, 1, 'Computer Accessories '),
(3, 1, 'Computers & Tablets '),
(4, 1, 'Mobile Phone Accessories '),
(5, 1, 'Cameras & Camcorders '),
(6, 2, 'Accounting'),
(7, 2, 'Sales and Accounting'),
(8, 3, 'Savings and Loans'),
(9, 3, 'Microfinance'),
(10, 3, 'Banks'),
(11, 4, 'Restaurant'),
(12, 4, 'Hotels'),
(13, 4, 'Food Joints'),
(14, 4, 'Snack Bars'),
(15, 4, 'Retailers and wholesalers'),
(16, 4, 'Crops , seeds and Plants'),
(17, 5, 'Houses'),
(18, 5, 'Apartments'),
(19, 5, 'Land'),
(20, 5, 'Commercial Properties'),
(21, 5, 'Rooms'),
(22, 6, 'Shoes and footwear'),
(23, 6, 'Clothing'),
(24, 6, 'Beauty, Hair and Makeup Products'),
(25, 6, 'Jewelry and Watches'),
(26, 6, 'Bags'),
(27, 6, 'Eye glasses'),
(28, 7, 'Teaching'),
(29, 7, 'Training'),
(30, 7, 'Apprenticeship'),
(31, 8, 'Notepads'),
(32, 8, 'Clerical items'),
(33, 8, 'Office Supplies'),
(34, 9, 'Clinics'),
(35, 9, 'Hospitals'),
(36, 9, 'Pharmacy'),
(37, 9, 'Herbal shops'),
(38, 9, 'Health products'),
(39, 9, 'Medical items'),
(40, 10, 'Cars'),
(41, 10, 'Trucks, vans & buses'),
(42, 10, 'Motorbikes and Bicycles'),
(43, 10, 'Auto parts and accessories'),
(44, 10, 'Tractors and heavy duty'),
(45, 10, 'Rentals'),
(46, 11, 'Pets'),
(47, 11, 'Pets Accessories'),
(48, 11, 'Caretakers and Pet walkers'),
(49, 11, 'Pet food'),
(50, 11, 'Veterinary services'),
(51, 12, 'Home appliances'),
(52, 12, 'Furniture'),
(53, 12, 'Office'),
(54, 12, 'Bathroom and Garden supplies'),
(55, 13, 'Photography'),
(56, 13, 'Advertising'),
(57, 13, 'Graphic design');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` varchar(255) NOT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `identifier`, `category`, `created_at`) VALUES
('130564390', 'f88c2a8499c841471d2a6af220baf42b703ade3be0c83181eb2e402afe0e4be4', 'Technologies Services', '2019-11-07 17:56:10'),
('135260511', '4dd46580059ff3aa71386bdef51936f7dacbe31c59133e44d34712d34c05c6f5', 'Restaurant And Hotel', '2019-11-07 19:40:19'),
('1536019029', '9f078b76b3ed140f9381c77204dd107c5bc47d8ac991ffb9184b0042667bc61c', 'Media Services', '2019-11-07 17:56:12'),
('1697291443', '318ad9557a5ee8068d9b3272eec51bb58a8546b13782f18faf4aaa24fc55786c', 'Business Services', '2019-11-07 17:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(50) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `code` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `Country`, `code`) VALUES
(1, 'Algeria', 213),
(2, 'Angola', 244),
(3, 'Benin', 229),
(4, 'Botswana', 267),
(5, 'Burkina Faso', 226),
(6, 'Burundi', 257),
(7, 'Cameroon', 237),
(8, 'Canary Islands', 34),
(9, 'Cape Verde', 238),
(10, 'Central African Republic', 236),
(11, 'Ceuta', 34),
(12, 'Chad', 235),
(13, 'Comoros', 269),
(14, 'Cote dIvoire', 225),
(15, 'DR Of Congo', 249),
(16, 'Djibouti', 253),
(17, 'Egypt', 20),
(18, 'Equatorial Guinea', 240),
(19, 'Eritrea', 291),
(20, 'Ethiopia', 251),
(21, 'Gabon', 241),
(22, 'Gambia', 220),
(23, 'Ghana', 233),
(24, 'Guinea', 224),
(25, 'Guinea-Bissau', 245),
(26, 'Kenya', 254),
(27, 'Lesotho', 266),
(28, 'Liberia', 231),
(29, 'Libya', 218),
(30, 'Madagascar', 261),
(31, 'Madeira', 351),
(32, 'Malawi', 265),
(33, 'Mali', 223),
(34, 'Mauritania', 222),
(35, 'Mauritius', 230),
(36, 'Mayotte', 262),
(37, 'Melilla', 34),
(38, 'Morocco', 212),
(39, 'Mozambique', 258),
(40, 'Namibia', 264),
(41, 'Niger', 227),
(42, 'Nigeria', 234),
(43, 'Republic Of Congo', 242),
(44, 'Reunion', 262),
(45, 'Rwanda', 250),
(46, 'Saint Helena', 290),
(47, 'Sao Tome and Principe', 239),
(48, 'Senegal', 221),
(49, 'Seychelles', 248),
(50, 'Sierra Leone', 232),
(51, 'Somalia', 252),
(52, 'South Africa', 27),
(53, 'Sudan', 249),
(54, 'Swaziland', 268),
(55, 'Somalia', 252),
(56, 'South Africa', 27),
(57, 'Sudan', 249),
(58, 'Swaziland', 268),
(60, 'Tanzania', 255),
(61, 'Togo', 228),
(62, 'Tunisia', 216),
(63, 'Uganda', 256),
(64, 'Western Sahara', 212),
(65, 'Zambia', 260),
(66, 'Zimbabwe', 263),
(435, 'Djibouti', 899);

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enterpreneur_manager_table`
--

CREATE TABLE `enterpreneur_manager_table` (
  `ent_manager_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `business_id` varchar(255) NOT NULL,
  `ent_adf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enterpreneur_manager_table`
--

INSERT INTO `enterpreneur_manager_table` (`ent_manager_id`, `user_id`, `business_id`, `ent_adf_id`) VALUES
('96d8ea2fd0e9894b5435944042e07e43ce528674cbf5005ef435f0f36731199c', '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `entreprenuer`
--

CREATE TABLE `entreprenuer` (
  `eid` varchar(255) NOT NULL,
  `business` varchar(255) DEFAULT NULL,
  `line` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(14) DEFAULT NULL,
  `email` varchar(266) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `rdate` varchar(50) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `cate_id` varchar(255) DEFAULT NULL,
  `about` text,
  `address` text,
  `customer` text,
  `entreprenuer` text,
  `jobber` text,
  `intern` text,
  `bimage` varchar(80) DEFAULT NULL,
  `pimage` varchar(80) DEFAULT NULL,
  `investor` text,
  `description` varchar(500) DEFAULT NULL,
  `intern_state` int(11) DEFAULT NULL,
  `customer_state` int(11) DEFAULT NULL,
  `entreprenuer_state` int(11) DEFAULT NULL,
  `investor_state` int(11) DEFAULT NULL,
  `jobber_state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entreprenuer`
--

INSERT INTO `entreprenuer` (`eid`, `business`, `line`, `type`, `status`, `size`, `location`, `country`, `name`, `contact`, `email`, `salt`, `rdate`, `state`, `cate_id`, `about`, `address`, `customer`, `entreprenuer`, `jobber`, `intern`, `bimage`, `pimage`, `investor`, `description`, `intern_state`, `customer_state`, `entreprenuer_state`, `investor_state`, `jobber_state`) VALUES
('62a770e0b10f89ca93c789dc7fe47228d0951132182581a322b8082f9f0f2997', 'DEDE FASHION', 'oops', 'Employee', 'Entrepreneaur', 'Employee', 'Entrepreneaur', 'Employer', 'iiii khih', '5735363', 'aa@gmail.com', '62a770e0b10f89ca93c789dc7fe47228d0951132182581a322b8082f9f0f2997', '2019-11-07 20:12:02', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, 1),
('85df43dad0c264dc4bf7f7a2581b9a00cff5d1d1af784fc05a4119fecb171254', 'Ruth Cosmetics', '3', 'Corporatio', 'Registered', 'Micro sized business', 'Employer', '235', NULL, NULL, NULL, NULL, '2019-11-14 02:34:23', 1, '1536019029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 'Dede Cosmetics', 'MyBusiness', 'Graduate', 'Employee', 'Entrepreneaur', 'Student', 'Unemployed', 'Pm Pm', '05454266284', 'me@gmail.com', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', '2019-11-07 20:36:48', 1, '1536019029', '&lt;h4&gt;&lt;i&gt;Dede Cosmetics is a cutting edge, young and vibrant photography and video outfit. We offer visual packages for events and programs. We currently have these special offers for Birthdays, Engagements &amp;amp; White Weddings and Naming Ceremonies :&lt;/i&gt;&lt;/h4&gt;&lt;h4&gt;&lt;i&gt;&lt;strong&gt;Birthday Pack Package : &lt;/strong&gt;Softcopy via Online or Pendrive for both Photos &amp;amp; Videos (GHC 300)&lt;/i&gt;&lt;/h4&gt;&lt;h4&gt;&lt;i&gt;&lt;strong&gt;Engagement &amp;amp; White Wedding Pack Package : &lt;/strong&gt;Photobook, 2 Big Sized Frames, Photos &amp;amp; Videos, Softcopy &amp;amp; HD Video on a drive (GHC 1,500 to GHC 3,000)&lt;/i&gt;&lt;/h4&gt;&lt;h4&gt;&lt;i&gt;&lt;strong&gt;Naming Ceremony Packages :&lt;/strong&gt;&lt;/i&gt;&lt;/h4&gt;&lt;blockquote&gt;&lt;h4&gt;&lt;i&gt;1st Package &ndash; Soft copies on Pendrive for both Video &amp;amp; Photos (GHC 400)&lt;/i&gt;&lt;/h4&gt;&lt;h4&gt;&lt;i&gt;2nd Package &ndash; Soft copies on Pendrive, Album &amp;amp; 1 small frame, Photos &amp;amp; Videos (GHC 700)&lt;/i&gt;&lt;/h4&gt;&lt;h4&gt;&lt;i&gt;3rd Package &ndash; Soft copies on Pendrive, Photo book &amp;amp; 1 big frame, Photos &amp;amp; Videos (GHC 950)&lt;/i&gt;&lt;/h4&gt;&lt;/blockquote&gt;', 'Peduase Valley Ret', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Phasellus elementum ultricies venenatis. Vivamus eget semper ligula. Suspendisse efficitur est ac nisl sollicitudin, ac venenatis libero faucibus. Curabitur dictum pulvinar dui, nec posuere sapien condimentum in.\r\n                                                                                Sed ornare enim quis enim pretium, tempus maximus dolor scelerisque.\r\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Phasellus elementum ultricies venenatis. Vivamus eget semper ligula. Suspendisse efficitur est ac nisl sollicitudin, ac venenatis libero faucibus. Curabitur dictum pulvinar dui, nec posuere sapien condimentum in.\r\n                                                                                    Sed ornare enim quis enim pretium, tempus maximus dolor scelerisque.\r\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        hello World is coming to the end very soon                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        17 Motivational Quotes to Inspire You to Be Successful\r\n\r\n    Your limitation&mdash;it&#039;s only your imagination.\r\n    Push yourself, because no one else is going to do it for you.\r\n    Sometimes later becomes never. ...\r\n    Great things never come from comfort zones.\r\n    Dream it. ...\r\n    Success doesn&#039;t just find you. ...\r\n    The harder you work for something, the greater you&#039;ll feel when you achieve it.\r\n    Dream bigger.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5.jpg', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Phasellus elementum ultricies venenatis. Vivamus eget semper ligula. Suspendisse efficitur est ac nisl sollicitudin, ac venenatis libero faucibus. Curabitur dictum pulvinar dui, nec posuere sapien condimentum in.\r\n                                                                                    Sed ornare enim quis enim pretium, tempus maximus dolor scelerisque.\r\n                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', 'lksdjfl nl vnvlknlklkdnlkn lk nlk nlk nkldsnlkaf ln ln lkdsnlakn lkdnfkl kldnf lndlfns ', 1, 1, 1, 1, 1),
('dsfdbwfsfsfd', 'Fashionova', '3', 'Sole Proprietorship', 'Registered', 'small sized business', 'Employer', '235', NULL, NULL, NULL, NULL, '2019-11-14 02:29:29', 1, '130564390', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ent_manager_add_information`
--

CREATE TABLE `ent_manager_add_information` (
  `ent_adf_id` int(11) NOT NULL,
  `level_of_education` varchar(50) NOT NULL,
  `equity` varchar(50) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `business_id` varchar(255) NOT NULL,
  `request` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ent_manager_add_information`
--

INSERT INTO `ent_manager_add_information` (`ent_adf_id`, `level_of_education`, `equity`, `user_id`, `business_id`, `request`) VALUES
(1, 'Masters', 'Yes', '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `industry_id` int(11) NOT NULL,
  `industry_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`industry_id`, `industry_name`) VALUES
(1, 'Electronics and Accessories'),
(3, 'Banking and Finance'),
(4, 'Food and Hospitality'),
(5, 'Estates and Housing'),
(6, 'Fashion and Clothing'),
(7, 'Education'),
(8, 'Books and Stationery'),
(9, 'Health and Wellness'),
(10, 'Vehicles'),
(11, 'Animals and Pets'),
(12, 'Home and Furniture'),
(13, 'Media and Ads');

-- --------------------------------------------------------

--
-- Table structure for table `intern_additional_information`
--

CREATE TABLE `intern_additional_information` (
  `intern_adf_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `business_id` varchar(255) NOT NULL,
  `institution_id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `account_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern_additional_information`
--

INSERT INTO `intern_additional_information` (`intern_adf_id`, `user_id`, `business_id`, `institution_id`, `program`, `level`, `payment_method`, `mobile_number`, `account_no`) VALUES
(1, '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 0, 'hello world', '300', '23232', '1212313', ''),
(2, '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 0, 'hello world', '400', '23232', '3343353', ''),
(3, '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 0, 'hello world', '400', '23232', '1212313', ''),
(4, '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 0, 'hello world', '300', '23232', '1212313', ''),
(5, '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 0, 'hello world', '300', '23232', '1212313', ''),
(6, '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', 0, 'hello world', '200', '23232', '344555', '');

-- --------------------------------------------------------

--
-- Table structure for table `intern_client`
--

CREATE TABLE `intern_client` (
  `nid` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `mobile` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `idate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `business_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intern_table`
--

CREATE TABLE `intern_table` (
  `intern_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `business_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern_table`
--

INSERT INTO `intern_table` (`intern_id`, `user_id`, `business_id`) VALUES
(6, '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5');

-- --------------------------------------------------------

--
-- Table structure for table `investor_additional_information`
--

CREATE TABLE `investor_additional_information` (
  `invest_adf_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `type_of_investment` varchar(20) NOT NULL,
  `range_of_investment` varchar(20) NOT NULL,
  `investment_experience` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investor_table`
--

CREATE TABLE `investor_table` (
  `investor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobbers_table`
--

CREATE TABLE `jobbers_table` (
  `jobber_id` int(11) NOT NULL,
  `jobber_adf_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobber_add_information`
--

CREATE TABLE `jobber_add_information` (
  `jobber_adf_id` int(11) NOT NULL,
  `level_of_education` varchar(20) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `availability` int(11) NOT NULL,
  `job_options` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lounge`
--

CREATE TABLE `lounge` (
  `id` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `mobile` varchar(14) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `normal` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `aby` varchar(255) DEFAULT NULL,
  `adate` varchar(50) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `dob` varchar(40) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lounge`
--

INSERT INTO `lounge` (`id`, `firstname`, `username`, `password`, `salt`, `city`, `mobile`, `role`, `normal`, `active`, `aby`, `adate`, `surname`, `code`, `country`, `gender`, `occupation`, `dob`, `image`) VALUES
('1376338263', 'Pm', 'me@gmail.com', '7cb903e5e87c0a3a5bb08f05c2b5641b0dff7dda5afcf29c3fc62140cfff6c58', 'c374faf7fffe89d34af14bfa6c2db3caf46cd573e8621638f4ff1f3fb7f44fe5', NULL, NULL, 500, 'aaaa', NULL, NULL, NULL, 'Pm', NULL, NULL, NULL, NULL, NULL, NULL),
('1479577675', 'James', 'james@gmail.com', '69af4f20deb8d7dbab86b42659d2bdf8469a9d16ae9cb3f9fb32b57005720a9d', '009839dc822038ed074891e7c8f631a9ddf184feacdfd70cc9dbc5bb79c9247a', 'Me Hello', 'WorldHello', NULL, 'aaaaa', 1, NULL, '2019-11-07 12:28:20', 'Arthur', '233', 'South Africa', 'Male', 'Entrepreneaur', '2017-05-17', '1479577675.jpg'),
('2022784680', 'New', 'new@gmail.com', '926756370a251eaecc337783b94f92319384d2ca27935b014ea3028c0987f8f4', '093027c829be17ac96e555ac9b8f51e6c9d7ed1421f83c8e8d503d02a3a26354', 'Location', '0545436618', NULL, 'hhhh', 1, NULL, '2019-11-07 13:30:12', 'Old', '233', 'Benin', 'Female', 'Employer', '2019-11-24', NULL),
('903430310', 'Wprld', 'darlinchipz@gmail.com', 'cfa9264f705bb03d30f3b2de44494a99a43fb1d8b2c42ce0639ed5fe8f4b1a47', '3ed8c10d0a4f1b4ac0f7c5fe7566f272700cf415c3febdfb62d0ecda41ddf3e7', 'Helo', '05437466473', NULL, 'aaaa', 1, NULL, '2019-11-07 11:54:33', 'Hello', '233', 'Benin', 'Female', 'Employee', '2019-11-11', NULL),
('972275059', 'iiii', 'aa@gmail.com', '9fa28d6b868c0864bacbbe136f2218598b4691a0fb6215482fa7cf43655a9483', '62a770e0b10f89ca93c789dc7fe47228d0951132182581a322b8082f9f0f2997', NULL, NULL, 500, 'pop', NULL, NULL, NULL, 'khih', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

CREATE TABLE `portal` (
  `pid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `pdate` varchar(40) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `checker` int(11) DEFAULT NULL,
  `vdate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portal`
--

INSERT INTO `portal` (`pid`, `title`, `body`, `pdate`, `image`, `category`, `checker`, `vdate`) VALUES
(24, 'Where can I get some?', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', '2019-10-30 23:30:11', '', 100, 2, ''),
(25, 'Ruth', '&lt;h2&gt;Lorem Ipsum is &lt;i&gt;simply &amp;nbsp;&lt;/i&gt;dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer &lt;i&gt;took &lt;/i&gt;a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/h2&gt;', '2019-10-30 23:34:25', '', 200, 2, ''),
(26, 'Selling Van Over The Wall', '&lt;h4&gt;Lorem Ipsum is &lt;i&gt;simply &amp;nbsp;&lt;/i&gt;dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer &lt;i&gt;took &lt;/i&gt;a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/h4&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;Where does it come from?&lt;/h2&gt;&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;p&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/p&gt;&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;', '2019-10-30 23:36:31', '30102019233631.jpg', 100, 1, ''),
(27, 'Professional lorem ipsum generator for typographers', '&lt;h4&gt;Lorem Ipsum is &lt;i&gt;simply &amp;nbsp;&lt;/i&gt;dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer &lt;i&gt;took &lt;/i&gt;a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/h4&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;Where does it come from?&lt;/h2&gt;&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;p&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/p&gt;&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;', '2019-10-30 23:39:44', '', 300, 2, ''),
(28, '', '&lt;h4&gt;Lorem Ipsum is &lt;i&gt;simply &amp;nbsp;&lt;/i&gt;dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer &lt;i&gt;took &lt;/i&gt;a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/h4&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;Where does it come from?&lt;/h2&gt;&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;p&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/p&gt;&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected &lt;a href=&quot;google.com&quot;&gt;humour&lt;/a&gt; and the like).&lt;/p&gt;', '2019-10-31 00:22:33', '', 100, 2, ''),
(29, 'Jesus Is Lord', '&lt;p&gt;The authentication cloudServices.tokenUrl configuration is required for creating a&amp;nbsp;&lt;/p&gt;&lt;p&gt;The cloudServices.webSocketUrl configuration is required for creating a websocket&amp;nbsp;&lt;/p&gt;', '2019-11-13 22:27:51', '', 200, 2, ''),
(30, 'Jesus Is Lord', '&lt;p&gt;dsfd lj lkjlk lksd nlkndslkvn kls df&lt;/p&gt;', '2019-11-13 22:30:32', '', 100, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `tid` varchar(255) NOT NULL,
  `business_id` varchar(255) DEFAULT NULL,
  `description` text,
  `tdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `hash` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_category`
--
ALTER TABLE `business_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `industry_id` (`industry_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `enterpreneur_manager_table`
--
ALTER TABLE `enterpreneur_manager_table`
  ADD PRIMARY KEY (`ent_manager_id`);

--
-- Indexes for table `entreprenuer`
--
ALTER TABLE `entreprenuer`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `ent_manager_add_information`
--
ALTER TABLE `ent_manager_add_information`
  ADD PRIMARY KEY (`ent_adf_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industry_id`);

--
-- Indexes for table `intern_additional_information`
--
ALTER TABLE `intern_additional_information`
  ADD PRIMARY KEY (`intern_adf_id`);

--
-- Indexes for table `intern_client`
--
ALTER TABLE `intern_client`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `intern_table`
--
ALTER TABLE `intern_table`
  ADD PRIMARY KEY (`intern_id`);

--
-- Indexes for table `investor_additional_information`
--
ALTER TABLE `investor_additional_information`
  ADD PRIMARY KEY (`invest_adf_id`);

--
-- Indexes for table `investor_table`
--
ALTER TABLE `investor_table`
  ADD PRIMARY KEY (`investor_id`);

--
-- Indexes for table `jobbers_table`
--
ALTER TABLE `jobbers_table`
  ADD PRIMARY KEY (`jobber_id`);

--
-- Indexes for table `jobber_add_information`
--
ALTER TABLE `jobber_add_information`
  ADD PRIMARY KEY (`jobber_adf_id`);

--
-- Indexes for table `lounge`
--
ALTER TABLE `lounge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `portal`
--
ALTER TABLE `portal`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_category`
--
ALTER TABLE `business_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT for table `ent_manager_add_information`
--
ALTER TABLE `ent_manager_add_information`
  MODIFY `ent_adf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `industry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `intern_additional_information`
--
ALTER TABLE `intern_additional_information`
  MODIFY `intern_adf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `intern_table`
--
ALTER TABLE `intern_table`
  MODIFY `intern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `investor_additional_information`
--
ALTER TABLE `investor_additional_information`
  MODIFY `invest_adf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investor_table`
--
ALTER TABLE `investor_table`
  MODIFY `investor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobbers_table`
--
ALTER TABLE `jobbers_table`
  MODIFY `jobber_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobber_add_information`
--
ALTER TABLE `jobber_add_information`
  MODIFY `jobber_adf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portal`
--
ALTER TABLE `portal`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
