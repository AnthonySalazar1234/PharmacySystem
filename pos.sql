-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 05:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `product_id` int(100) NOT NULL,
  `brand_name` varchar(200) DEFAULT NULL,
  `generic_name` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `dosage` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `manufactured` varchar(200) DEFAULT NULL,
  `expiration` varchar(200) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `manufacturer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `brand_name`, `generic_name`, `category`, `type`, `dosage`, `date`, `manufactured`, `expiration`, `price`, `quantity`, `manufacturer`) VALUES
(708180049, 'Alaxan Fr', 'Iburprofen+Paracetamol', 'Capsule', 'Body & Muscle Pain', '500mg', '2018-07-08', '2018-07-16', '2018-07-26', 5, 36, 'Mercury Drug Store'),
(708180207, 'Medicol Advance', 'Ibuprofen', 'Softgel Capsule', 'Body & Muscle Pain', '200mg', '2018-07-08', '2018-07-13', '2018-07-28', 5, 40, 'Mercury Drug Store'),
(708180316, 'Medicol Advance 400', 'Ibuprofen', 'Softgel Capsule', 'Body & Muscle Pain', '400mg', '2018-07-08', '2018-07-06', '2018-07-28', 7, 50, 'Mercury Drug Store'),
(708180405, 'Skelan', 'Naproxen Sodium', 'Tablet', 'Body & Muscle Pain', '220mg', '2018-07-08', '2018-07-06', '2018-07-31', 6, 40, 'Mercury Drug Store'),
(708180536, 'Bioflu', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', 'Tablet', 'Headache,Fever & Flu', '50mg', '2018-07-08', '2018-07-11', '2018-07-28', 5, 45, 'Mercury Drug Store'),
(708180641, 'Biogesic', 'Paracetamol', 'Caplet', 'Headache,Fever & Flu', '500mg', '2018-07-08', '2018-07-07', '2018-07-28', 5, 37, 'Mercury Drug Store'),
(708180819, 'Neurogen E', 'Vitamin B-Complex+Vitamin E', 'Tablet', 'Healthy Aging Seniors', '300mg', '2018-07-08', '2018-07-07', '2018-07-28', 20, 40, 'Mercury Drug Store'),
(708181032, 'Allerin', 'Diphenhydramine HCI,Phenylpropanolamine HCI', 'Syrup', 'Allergy', '12.5mg', '2018-07-08', '2018-07-20', '2018-07-27', 6, 22, 'Mercury Drug Store'),
(708181223, 'Allerkid', 'Citirizine', 'Syrup', 'Allergy', '2.5mg', '2018-07-08', '2018-07-12', '2018-07-28', 6, 40, 'Mercury Drug Store'),
(708181345, 'Allerta', 'Loratadine', 'Tablet', 'Allergy', '10mg', '2018-07-08', '2018-07-12', '2018-07-28', 5, 40, 'Mercury Drug Store'),
(708181449, 'Enervon', 'Multivitamins', 'Tablet', 'Vitamins', '500mg', '2018-07-08', '2018-07-06', '2018-07-28', 5, 38, 'Mercury Drug Store'),
(708181644, 'Forti-D', 'Colicalciferol', 'Softgel Capsule', 'Vitamins', '800IU', '2018-07-08', '2018-07-13', '2018-07-31', 12, 28, 'Mercury Drug Store'),
(708184029, 'Myracof', 'Ambroxol', 'Syrup', 'Cough & Colds', '30mg', '2018-07-08', '2018-08-01', '2018-08-31', 5, 40, 'Mercury Drug Store'),
(708184235, 'Expel OD', 'Ambroxol HC1', 'Capsule', 'Cough & Colds', '75mg', '2018-07-08', '2018-07-10', '2018-07-27', 5, 40, 'Mercury Drug Store'),
(708184511, 'Decolgen Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', 'Tablet', 'Cough & Colds', '500mg', '2018-07-08', '2018-07-22', '2018-07-27', 6, 27, 'Mercury Drug Store'),
(708184651, 'Neozep Non-Drowsy', 'Phenylepherine HC1+Paracetamol', 'Caplet', 'Cough & Colds', '500mg', '2018-07-08', '2018-07-19', '2018-07-28', 6, 32, 'Mercury Drug Store'),
(708184827, 'Neozep Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', 'Tablet', 'Cough & Colds', '500mg', '2018-07-08', '2018-07-18', '2018-08-25', 5, 27, 'Mercury Drug Store'),
(708184938, 'Nafarin-A', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', 'Tablet', 'Cough & Colds', '30mg', '2018-07-08', '2018-07-24', '2018-07-28', 5, 37, 'Mercury Drug Store'),
(708185136, 'Tuseran Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', 'Capsule', 'Cough & Colds', '300mg', '2018-07-08', '2018-07-17', '2018-07-27', 5, 40, 'Mercury Drug Store'),
(708185309, 'Solmux', 'Carbocistine', 'Capsule', 'Cough & Colds', '75mg', '2018-07-08', '2018-07-13', '2018-07-28', 5, 40, 'Mercury Drug Store'),
(708185426, 'No Drowse Decolgen', 'Phenylepherine HC1+Paracetamol', 'Tablet', 'Cough & Colds', '500mg', '2018-07-08', '2018-07-13', '2018-07-28', 6, 38, 'Mercury Drug Store'),
(708185544, 'Rexidol Forte', 'Paracetamol Caffeine', 'Tablet', 'Body & Muscle Pain', '500mg', '2018-07-08', '2018-07-21', '2018-07-31', 7, 40, 'Mercury Drug Store'),
(708185644, 'Dolfenal', 'Mefenamic Acid', 'Tablet', 'Body & Muscle Pain', '250mg', '2018-07-08', '2018-07-18', '2018-07-26', 5, 50, 'Mercury Drug Store'),
(708185959, 'Alaxan', 'Iburprofen+Paracetamol', 'Tablet', 'Body & Muscle Pain', '500mg', '2018-07-08', '2018-07-12', '2018-07-23', 6, 23, 'Mercury Drug Store');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `RS` int(100) NOT NULL,
  `total_qty` int(100) NOT NULL,
  `total_items` int(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `vat` int(100) NOT NULL,
  `total_payment` int(100) NOT NULL,
  `paid` int(100) NOT NULL,
  `total_change` int(100) NOT NULL,
  `date_paid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `RS`, `total_qty`, `total_items`, `discount`, `vat`, `total_payment`, `paid`, `total_change`, `date_paid`) VALUES
(55, 70258, 10, 4, '0.20', 64, 72, 100, 49, '2018-07-08'),
(56, 74702, 4, 2, '0', 18, 20, 20, 0, '2018-07-08'),
(57, 74625, 4, 2, '0', 20, 22, 22, 0, '2018-07-09'),
(58, 73240, 17, 5, '0.20', 86, 96, 100, 31, '2018-07-09'),
(59, 75329, 3, 1, '0.20', 13, 15, 15, 4, '2018-07-10'),
(60, 70256, 3, 1, '0', 16, 18, 18, 0, '2018-07-10'),
(61, 73013, 5, 2, '0.15', 27, 30, 30, 7, '2018-07-11'),
(62, 73159, 5, 2, '0.20', 27, 30, 30, 9, '2018-07-11'),
(63, 71021, 5, 1, '0', 27, 30, 30, 0, '2018-07-12'),
(64, 71135, 6, 2, '0.20', 32, 36, 36, 10, '2018-07-12'),
(65, 71219, 4, 2, '0', 9, 22, 22, 0, '2018-07-13'),
(66, 72608, 4, 2, '0', 9, 22, 50, 28, '2018-07-13'),
(67, 72901, 2, 1, '0.20', 9, 10, 20, 13, '2018-07-13'),
(68, 73824, 3, 1, '0', 13, 15, 15, 0, '2018-07-13'),
(69, 70607, 2, 1, '0', 9, 10, 10, 0, '2018-07-14'),
(70, 75238, 3, 2, '0.20', 9, 16, 50, 43, '2018-07-15'),
(71, 72915, 2, 1, '0', 9, 10, 10, 0, '2018-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_item`
--

CREATE TABLE `purchased_item` (
  `RS` int(100) NOT NULL,
  `product_id` int(100) DEFAULT NULL,
  `brand_name` varchar(200) NOT NULL,
  `generic_name` varchar(200) NOT NULL,
  `expiration` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `dosage` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `date_purchased` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased_item`
--

INSERT INTO `purchased_item` (`RS`, `product_id`, `brand_name`, `generic_name`, `expiration`, `category`, `dosage`, `price`, `qty`, `subtotal`, `date_purchased`) VALUES
(70258, 708181032, 'Allerin', 'Diphenhydramine HCI,Phenylpropanolamine HCI', '2018-07-28', 'Syrup', '12.5mg', 6, 4, 24, '2018-07-08'),
(70258, 708181644, 'Forti-D', 'Colicalciferol', '2018-07-31', 'Softgel Capsule', '800IU', 12, 2, 24, '2018-07-08'),
(70258, 708185426, 'No Drowse Decolgen', 'Phenylepherine HC1+Paracetamol', '2018-07-28', 'Tablet', '500mg', 6, 2, 12, '2018-07-08'),
(70258, 708185959, 'Alaxan', 'Iburprofen+Paracetamol', '2018-07-20', 'Tablet', '500mg', 6, 2, 12, '2018-07-08'),
(74702, 708180536, 'Bioflu', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-28', 'Tablet', '50mg', 5, 3, 15, '2018-07-08'),
(74702, 708180641, 'Biogesic', 'Paracetamol', '2018-07-28', 'Caplet', '500mg', 5, 1, 5, '2018-07-08'),
(74625, 708184827, 'Neozep Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-08-25', 'Tablet', '500mg', 5, 2, 10, '2018-07-09'),
(74625, 708185959, 'Alaxan', 'Iburprofen+Paracetamol', '2018-07-20', 'Tablet', '500mg', 6, 2, 12, '2018-07-09'),
(73240, 708180049, 'Alaxan Fr', 'Iburprofen+Paracetamol', '2018-07-18', 'Capsule', '500mg', 5, 2, 10, '2018-07-09'),
(73240, 708181032, 'Allerin', 'Diphenhydramine HCI,Phenylpropanolamine HCI', '2018-07-28', 'Syrup', '12.5mg', 6, 3, 18, '2018-07-09'),
(73240, 708184511, 'Decolgen Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-27', 'Tablet', '500mg', 6, 4, 24, '2018-07-09'),
(73240, 708184827, 'Neozep Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-08-25', 'Tablet', '500mg', 5, 4, 20, '2018-07-09'),
(73240, 708185959, 'Alaxan', 'Iburprofen+Paracetamol', '2018-07-20', 'Tablet', '500mg', 6, 4, 24, '2018-07-09'),
(75329, 708184827, 'Neozep Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-08-25', 'Tablet', '500mg', 5, 3, 15, '2018-07-10'),
(70256, 708184651, 'Neozep Non-Drowsy', 'Phenylepherine HC1+Paracetamol', '2018-07-28', 'Caplet', '500mg', 6, 3, 18, '2018-07-10'),
(73013, 708184511, 'Decolgen Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-27', 'Tablet', '500mg', 6, 3, 18, '2018-07-11'),
(73013, 708184651, 'Neozep Non-Drowsy', 'Phenylepherine HC1+Paracetamol', '2018-07-28', 'Caplet', '500mg', 6, 2, 12, '2018-07-11'),
(73159, 708184511, 'Decolgen Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-27', 'Tablet', '500mg', 6, 2, 12, '2018-07-11'),
(73159, 708184651, 'Neozep Non-Drowsy', 'Phenylepherine HC1+Paracetamol', '2018-07-28', 'Caplet', '500mg', 6, 3, 18, '2018-07-11'),
(71021, 708181032, 'Allerin', 'Diphenhydramine HCI,Phenylpropanolamine HCI', '2018-07-27', 'Syrup', '12.5mg', 6, 5, 30, '2018-07-12'),
(71135, 708184511, 'Decolgen Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-27', 'Tablet', '500mg', 6, 3, 18, '2018-07-12'),
(71135, 708185959, 'Alaxan', 'Iburprofen+Paracetamol', '2018-07-20', 'Tablet', '500mg', 6, 3, 18, '2018-07-12'),
(71219, 708180536, 'Bioflu', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-28', 'Tablet', '50mg', 5, 2, 10, '2018-07-13'),
(71219, 708181032, 'Allerin', 'Diphenhydramine HCI,Phenylpropanolamine HCI', '2018-07-27', 'Syrup', '12.5mg', 6, 2, 12, '2018-07-13'),
(72608, 708180536, 'Bioflu', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-28', 'Tablet', '50mg', 5, 2, 10, '2018-07-13'),
(72608, 708181032, 'Allerin', 'Diphenhydramine HCI,Phenylpropanolamine HCI', '2018-07-27', 'Syrup', '12.5mg', 6, 2, 12, '2018-07-13'),
(72901, 708184827, 'Neozep Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-08-25', 'Tablet', '500mg', 5, 2, 10, '2018-07-13'),
(73824, 708184938, 'Nafarin-A', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-28', 'Tablet', '30mg', 5, 3, 15, '2018-07-13'),
(70607, 708184827, 'Neozep Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-08-25', 'Tablet', '500mg', 5, 2, 10, '2018-07-14'),
(75238, 708180049, 'Alaxan Fr', 'Iburprofen+Paracetamol', '2018-07-26', 'Capsule', '500mg', 5, 2, 10, '2018-07-15'),
(75238, 708184511, 'Decolgen Forte', 'Phenylepherine HC1 Chlorphenamine Maleate,Paracetamol', '2018-07-27', 'Tablet', '500mg', 6, 1, 6, '2018-07-15'),
(72915, 708181449, 'Enervon', 'Multivitamins', '2018-07-28', 'Tablet', '500mg', 5, 2, 10, '2018-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `product_id` int(100) NOT NULL,
  `brand_name` varchar(500) NOT NULL,
  `generic_name` varchar(500) NOT NULL,
  `expiration` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `dosage` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `qty` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `date_purchased` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `contact_person`, `address`, `contact`, `email`, `note`, `date`) VALUES
(4, 'Mercury Drug Store', 'anthony salazar', 'Hibao-an Sur Mand. IC', '09096231908', 'wikiwidetony123@gmail.com', 'hellow\r\n\r\n\r\n\r\n\r\n', '06/16/2018');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `birthdate` varchar(200) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `birthdate`, `age`, `gender`, `address`, `contact`, `username`, `password`, `user_type`, `name`, `type`) VALUES
(10, 'Kimberly', 'Serafin', 'March/5/1999', 18, 'Female', 'Calumpang iloilo city', '09391739497', 'user', 'pass', 'user', '25635138_1386224378172771_1662047086_o.jpg', 'image/jpeg'),
(11, 'Anthony', 'Salazar', 'December/20/1997', 20, 'Male', 'Hibao-an Sur Mand. IC', '09096231908', 'admin', 'admin', 'admin', 'hunter_x_hunter_do_not_mention_those_eyes_by_nick_ian-d7n06s5.jpg', 'image/jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
