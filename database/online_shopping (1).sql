-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 06:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('admin', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `cus_details`
--

CREATE TABLE `cus_details` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Postalcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_details`
--

INSERT INTO `cus_details` (`FirstName`, `LastName`, `UserName`, `Address`, `City`, `Country`, `Postalcode`) VALUES
('aththas', 'rizwan', 'aththas', '16/8/8, wellampitiya', 'colombo', 'srilanka', 10600),
('afzal', 'hussain', 'goodgames12', 'colombo', 'Beruwala', 'Srilanka', 12070);

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

CREATE TABLE `grn` (
  `GRN_no` int(10) NOT NULL,
  `GRN_date` varchar(10) NOT NULL,
  `po_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`GRN_no`, `GRN_date`, `po_no`) VALUES
(1, '2020-02-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `bill_no` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `total` int(10) NOT NULL,
  `payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`bill_no`, `order_id`, `user_name`, `total`, `payment_method`) VALUES
(68, 104, 'goodgames12', 56, 'Cash on Delievery'),
(69, 123, 'aththas', 112, 'Cash on Delievery'),
(70, 126, 'aththas', 112, 'Cash on Delievery'),
(71, 124, 'aththas', 224, 'Cash on Delievery'),
(72, 118, 'aththas', 224, 'Cash on Delievery');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `po_no` int(10) NOT NULL,
  `po_date` varchar(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`po_no`, `po_date`, `s_id`, `total`) VALUES
(1, '2020-02-11', 1, 560),
(2, '2020-02-11', 1, 600),
(3, '2020-02-11', 6, 500);

-- --------------------------------------------------------

--
-- Table structure for table `registered_customers`
--

CREATE TABLE `registered_customers` (
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_customers`
--

INSERT INTO `registered_customers` (`user_name`, `email`, `pwd`) VALUES
('afzal', 'mh724476@gmail.com', '123456'),
('afzalggg', 'aaa@gmail.com', 'ttrt'),
('Assasin1.0', 'aththasrizwan123@gmail.com', '123456'),
('aththas', 'aththasrizwan@gmail.com', '123abc'),
('goodgames', 'aaa@gmail.com', '123456'),
('goodgames12', 'mmmmmass@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(10) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `s_addr` varchar(100) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `s_name`, `s_addr`, `s_email`, `s_phone`) VALUES
(1, 'shabith', 'wellampitiya', 'abc@gmail.com', '0775845621'),
(6, 'thahir', 'colombo', 'abc123@gmail.com', '0775642512');

-- --------------------------------------------------------

--
-- Table structure for table `sup_invoice`
--

CREATE TABLE `sup_invoice` (
  `invoice_no` int(10) NOT NULL,
  `invoice_date` varchar(10) NOT NULL,
  `po_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sup_invoice`
--

INSERT INTO `sup_invoice` (`invoice_no`, `invoice_date`, `po_no`) VALUES
(1, '2020-02-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `Item` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `uname` varchar(40) NOT NULL,
  `order_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` varchar(10) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`uname`, `order_id`, `p_name`, `price`, `p_quantity`, `product_id`, `total`, `order_date`, `order_status`) VALUES
('goodgames12', 104, 'Easy Polo Black Edition ', 56, 1, '10', 56, '2020-02-01', 'completed'),
('aththas', 116, 'Easy Polo Black Edition ', 56, 2, '10', 112, '2020-02-08', 'processing'),
('aththas', 118, 'Japanese Rose dress', 56, 4, '14', 224, '2020-02-08', 'completed'),
('aththas', 121, 'Women casual tshirt medium', 56, 4, '11', 224, '2020-02-08', 'processing'),
('aththas', 122, 'Polo Black Edition', 56, 5, '18', 280, '2020-02-08', 'processing'),
('aththas', 123, 'Easy Polo Black Edition ', 56, 2, '10', 112, '2020-02-08', 'completed'),
('aththas', 124, 'Easy Polo Black Edition ', 56, 4, '10', 224, '2020-02-08', 'completed'),
('aththas', 125, 'Women casual tshirt medium', 56, 5, '11', 280, '2020-02-08', 'processing'),
('aththas', 126, 'Easy Polo Black Edition ', 56, 2, '10', 112, '2020-02-10', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `price`, `p_quantity`, `product_image`, `category`) VALUES
(10, 'Easy Polo Black Edition ', 56, 10, 'images/shop/product12.jpg', 'mens'),
(11, 'Women casual tshirt medium', 56, 10, 'images/shop/product11.jpg', 'womens'),
(12, 'Women casual tshirt large', 56, 10, 'images/shop/product10.jpg', 'womens'),
(13, 'Easy Polo Red Edition', 56, 10, 'images/shop/product9.jpg', 'womens'),
(14, 'Japanese Rose dress', 56, 10, 'images/shop/product8.jpg', 'womens'),
(15, 'American White dress', 56, 10, 'images/shop/product7.jpg', 'womens'),
(16, 'Womens white tshirt', 56, 10, 'images/shop/product6.jpg', 'womens'),
(17, 'Womens blue tshirt', 56, 10, 'images/shop/product5.jpg', 'womens'),
(18, 'Polo Black Edition', 56, 10, 'images/shop/product4.jpg', 'womens');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cus_details`
--
ALTER TABLE `cus_details`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `grn`
--
ALTER TABLE `grn`
  ADD PRIMARY KEY (`GRN_no`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`po_no`);

--
-- Indexes for table `registered_customers`
--
ALTER TABLE `registered_customers`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sup_invoice`
--
ALTER TABLE `sup_invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `bill_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
