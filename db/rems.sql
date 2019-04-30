-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 07:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` char(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `active_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `email`, `phone`, `password`, `img_url`, `active_status`) VALUES
(1, 'Akram Khan', 'admin@gmail.com', '01749307467', '123', 'admin_img/27309.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agent_assign`
--

CREATE TABLE `agent_assign` (
  `assign_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_assign`
--

INSERT INTO `agent_assign` (`assign_id`, `property_id`, `agent_id`) VALUES
(33, 42, 10030),
(36, 42, 10029);

-- --------------------------------------------------------

--
-- Table structure for table `agent_info`
--

CREATE TABLE `agent_info` (
  `agent_id` int(10) NOT NULL,
  `agent_name` varchar(250) NOT NULL,
  `agent_company` varchar(256) NOT NULL,
  `agent_address` text NOT NULL,
  `agent_email` varchar(250) NOT NULL,
  `agent_mobile` varchar(250) NOT NULL,
  `agent_password` varchar(250) NOT NULL,
  `agent_img` varchar(50) NOT NULL,
  `agent_nid` varchar(250) NOT NULL,
  `active_status_agent` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_info`
--

INSERT INTO `agent_info` (`agent_id`, `agent_name`, `agent_company`, `agent_address`, `agent_email`, `agent_mobile`, `agent_password`, `agent_img`, `agent_nid`, `active_status_agent`) VALUES
(10029, 'Ajgor Khan', 'Newbuilders', 'uttara', 'ajgor@gmail.com', '017458766', '123', 'agent/agent_img/profile/pro32140.jpg', 'agent/agent_img/nid/nid19669.jpg', 1),
(10030, 'Anayet Hossain', 'Uday Builders', 'H#21,R#05, Shadinata Sharani Road, Uttar Badda, Dhaka-1212   Bangladesh', 'anayet@gmail.com', '01953255847', '123', 'agent/agent_img/profile/pro4780.jpg', 'agent/agent_img/nid/nid2933.jpg', 1),
(10031, 'Hasmot Ullah', 'Green Life', 'Panthopoth, Dhaka', 'hasmot@gmail.com', '01973463862', '123', 'agent/agent_img/profile/pro24323.png', 'agent/agent_img/nid/nid3712.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_time_info`
--

CREATE TABLE `inspection_time_info` (
  `inspection_id` int(50) NOT NULL,
  `property_id` int(50) NOT NULL,
  `inspection_date` date DEFAULT NULL,
  `inspection_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspection_time_info`
--

INSERT INTO `inspection_time_info` (`inspection_id`, `property_id`, `inspection_date`, `inspection_time`) VALUES
(46, 37, NULL, NULL),
(47, 38, NULL, NULL),
(48, 40, NULL, NULL),
(49, 42, NULL, NULL),
(50, 43, NULL, NULL),
(55, 44, NULL, NULL),
(56, 45, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_info`
--

CREATE TABLE `property_info` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `property_type` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `bedroom` int(10) DEFAULT NULL,
  `bathroom` int(10) DEFAULT NULL,
  `kitchen` int(10) DEFAULT NULL,
  `parking` int(10) DEFAULT NULL,
  `sell_by` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `selling_price` float DEFAULT NULL,
  `img_1` varchar(250) NOT NULL,
  `img_2` varchar(250) NOT NULL,
  `img_3` varchar(250) NOT NULL,
  `img_4` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `property_added_date` date NOT NULL,
  `active_status_property` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_info`
--

INSERT INTO `property_info` (`id`, `user_id`, `property_type`, `address`, `area`, `latitude`, `longitude`, `bedroom`, `bathroom`, `kitchen`, `parking`, `sell_by`, `price`, `selling_price`, `img_1`, `img_2`, `img_3`, `img_4`, `description`, `property_added_date`, `active_status_property`) VALUES
(37, 44, '1', 'House: 50  Nuakhali gate', 'Lakhsam', 23.979, 90.6811, 5, 2, 1, 1, 'Private', 1000000, 900000, 'user_img/property/property1.jpg', 'user_img/property/property2.jpg', 'user_img/property/property3.jpg', 'user_img/property/property4.jpg', 'Awesome house', '2018-03-01', 2),
(38, 44, '1', 'Ghorashal Sar kharkhana\nNarsingdi', 'Palash', 23.9386, 90.6265, 4, 2, 1, 1, 'Private', 2000000, 1900000, 'user_img/property/property1.jpg', 'user_img/property/property1.jpg', 'user_img/property/property1.jpg', 'user_img/property/property1.jpg', 'Project Name :Park Homes Esquire\n205/3,Manikdi Bazar,Cantonment,Dhaka\nSize-1140 sft, \nFacing- South-West corner\nLand Area - 8.5 Katha\nG+9\nHand Over Date –June-2018\nBest Quality Materials\n\nLift Hyundai\n\nEuropean Standby Generator\n\nLong term installment facility \nLoan facility .\n\n3 Bed, 3 Bath, 2 Verandas, Living, Dining, Kitchen etc.\n\nThanks\nAtiqur Rahman Sumon\nJapan Taguchi Construction Company Ltd.(JTCCL)\nA Japan Bangladesh Joint Venture Company.\n\nMember- REHAB', '2018-03-02', 2),
(40, 48, '3', 'Dhaka uttara', 'Uttara', 23.8925, 90.3874, NULL, NULL, NULL, NULL, 'Private', 1020000, 900000, 'user_img/property/property1271.jpg', 'user_img/property/property3940.jpg', 'user_img/property/property13773.jpg', 'user_img/property/property3714.jpg', 'near dhaka airport', '2018-03-03', 2),
(42, 43, '2', 'Panchrukhi', 'Narayongonj', 23.8319, 90.6116, 4, 2, 1, 1, 'Auction', 3500000, 3000000, 'user_img/property/property10025.jpg', 'user_img/property/property23214.jpg', 'user_img/property/property20559.jpg', 'user_img/property/property29660.jpg', 'This Property is 5 stories building', '2018-03-04', 1),
(43, 43, '2', 'Panchrukhi', 'Narayongonj', 23.8319, 90.6116, 4, 2, 1, 1, 'Private', 3500000, 1000, 'user_img/property/property17483.jpg', 'user_img/property/property7720.jpg', 'user_img/property/property14145.jpg', 'user_img/property/property1254.jpg', 'Awesome house', '2018-03-19', 1),
(44, 43, '2', 'Abdullahpur, Dhaka', 'Uttara', 23.8811, 90.4001, 3, 2, 1, 0, 'Private', 3000000, NULL, 'user_img/property/property19507.jpg', 'user_img/property/property11248.jpg', 'user_img/property/property1385.jpg', 'user_img/property/property31726.jpg', 'Near Uttara Sector 9', '2018-04-21', 1),
(45, 43, '1', 'Panditpara, Palash', 'Narsingdi', 23.9769, 90.6546, 3, 2, 1, 0, 'Private', 14000000, NULL, 'user_img/property/property5658.jpg', 'user_img/property/property1355.jpg', 'user_img/property/property19240.jpg', 'user_img/property/property24641.jpg', 'This house is monu mia''s near ghurashal , palash narsingdi', '2018-04-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_request`
--

CREATE TABLE `property_request` (
  `request_id` int(50) NOT NULL,
  `property_id` int(50) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `active_status_request` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_request`
--

INSERT INTO `property_request` (`request_id`, `property_id`, `sender_id`, `subject`, `message`, `active_status_request`) VALUES
(1, 40, 43, 'hi', 'ami bari kinbo', 'accept'),
(2, 38, 43, 'hello', 'I wanna buy your property', 'accept'),
(4, 37, 43, 'Property buy', 'I wanna buy your property', 'accept'),
(5, 42, 44, 'Buy property', 'I wanna buy property', 'pending'),
(6, 43, 44, 'hay', 'wanna buy', 'pending'),
(8, 44, 48, 'hay', 'i wanna buy your property', 'pending'),
(9, 44, 44, 'hello seller', 'i want to buy property', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `property_type_list`
--

CREATE TABLE `property_type_list` (
  `property_type_id` int(50) NOT NULL,
  `property_type_name` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_type_list`
--

INSERT INTO `property_type_list` (`property_type_id`, `property_type_name`) VALUES
(1, 'Apartment'),
(2, 'Building'),
(3, 'Land');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_address` text NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_img` varchar(50) NOT NULL,
  `user_nid` varchar(250) NOT NULL,
  `active_status_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `user_address`, `user_email`, `user_mobile`, `user_password`, `user_img`, `user_nid`, `active_status_user`) VALUES
(43, 'Rayhan Hasan', 'Palash, Narsingdi', 'akram.chowdhury8@gmail.com', '01749307468', '123', 'user/user_img/profile/pro18783.jpg', 'user/user_img/nid/nid24492.jpg', 1),
(44, 'Mahedi Hasan', 'Pabna', 'akram.cse007@gmail.com', '01914557773', '123', 'user/user_img/profile/pro8266.jpg', 'user/user_img/nid/nid31675.jpg', 1),
(48, 'Alvi', 'Nikunjo', '14103123iubat@gmail.com', '01785479354', '123', 'user/user_img/profile/pro12590.jpg', 'user/user_img/nid/nid9423.jpg', 1),
(49, 'Habibur Rahman', 'Baluka, Mymansing', 'habib@gmail.com', '01478965321', '123456', 'user/user_img/profile/pro21701.jpg', 'user/user_img/nid/nid19994.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agent_assign`
--
ALTER TABLE `agent_assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `agent_info`
--
ALTER TABLE `agent_info`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `inspection_time_info`
--
ALTER TABLE `inspection_time_info`
  ADD PRIMARY KEY (`inspection_id`);

--
-- Indexes for table `property_info`
--
ALTER TABLE `property_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_request`
--
ALTER TABLE `property_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `property_type_list`
--
ALTER TABLE `property_type_list`
  ADD PRIMARY KEY (`property_type_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agent_assign`
--
ALTER TABLE `agent_assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `agent_info`
--
ALTER TABLE `agent_info`
  MODIFY `agent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10032;
--
-- AUTO_INCREMENT for table `inspection_time_info`
--
ALTER TABLE `inspection_time_info`
  MODIFY `inspection_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `property_info`
--
ALTER TABLE `property_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `property_request`
--
ALTER TABLE `property_request`
  MODIFY `request_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `property_type_list`
--
ALTER TABLE `property_type_list`
  MODIFY `property_type_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
