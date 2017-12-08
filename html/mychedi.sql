-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 10:18 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `aid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `address_name` varchar(100) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `residential` varchar(100) DEFAULT NULL,
  `street` varchar(100) NOT NULL,
  `area` varchar(200) NOT NULL,
  `city` int(11) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `default_address` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-new,1-default',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`aid`, `cid`, `address_name`, `house_no`, `residential`, `street`, `area`, `city`, `landmark`, `default_address`, `status`, `createdTime`) VALUES
(1, 1, 'RT', '5', 'f', '23', 'dfh', 1, '', 0, 0, '2017-09-15 03:37:36'),
(2, 2, 'Office', '1124', '', 'Anna Nagar West End colony', 'PAdi', 0, 'Opposite DAV boys Hr. Sec school', 1, 0, '2017-10-05 14:02:09'),
(3, 6, 'sakthi', 'no.42', '', 'thamirabarani street', 'Taramani', 0, '', 0, 0, '2017-11-16 12:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `bid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `hashtag` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`bid`, `image`, `hashtag`, `status`, `createdTime`) VALUES
(1, 'mychedi_15070132304946535504.png', 'red rose yellow', 0, '0000-00-00 00:00:00'),
(2, '', 'red rose yellow', 2, '0000-00-00 00:00:00'),
(3, 'mychedi_15070138833734448883.jpg', 'fruits', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bulksms`
--

CREATE TABLE `bulksms` (
  `id` int(11) NOT NULL,
  `sms_text` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `category_name_english` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category_name_tamil` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` int(11) NOT NULL DEFAULT '0',
  `modifiedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `category_name_english`, `category_name_tamil`, `image`, `status`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(1, 'Fruits', 'பழங்கள்', 'mychedi_15070057299717136485.jpg', 1, 1, '2017-08-22 02:27:52', 1, '2017-10-03 01:12:09'),
(2, 'Flowers', 'பூக்கள்', 'mychedi_15070066871538334436.jpg', 0, 1, '2017-10-03 01:28:07', 0, '0000-00-00 00:00:00'),
(3, 'Creepers', 'படரும் கொடிகள்', 'mychedi_15071923465559083688.jpg', 0, 1, '2017-10-05 15:32:26', 0, '0000-00-00 00:00:00'),
(4, 'Combo plants', 'சேர்க்கை தாவரங்கள்', 'mychedi_15076259027757996866.jpg', 0, 1, '2017-10-10 15:58:22', 0, '0000-00-00 00:00:00'),
(5, 'Ornamental', 'Alagu thavarangal', 'mychedi_15108262573465842769.jpg', 0, 1, '2017-11-16 16:57:38', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `code` varchar(10) NOT NULL,
  `code_limit` int(11) NOT NULL,
  `purchase_limit` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-yes, 2-no',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-amount, 2-percentage',
  `offer_val` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` int(11) NOT NULL,
  `modifiedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `start_date`, `end_date`, `code`, `code_limit`, `purchase_limit`, `amount`, `type`, `offer_val`, `status`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(1, '2017-07-08', '2017-08-31', 'FHFDH57', 10, 1, '300.00', 2, '10.00', 0, 1, '2017-07-06 00:44:35', 1, '2017-08-03 06:13:32'),
(2, '2017-08-03', '2017-08-31', 'ESLUDO5V', 10, 2, '0.00', 1, '50.00', 0, 1, '2017-08-03 06:17:06', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usage`
--

CREATE TABLE `coupon_usage` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `oid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_usage`
--

INSERT INTO `coupon_usage` (`coupon_id`, `coupon_code`, `oid`, `cid`, `createdTime`) VALUES
(0, '', 4, 1, '2017-09-13 02:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `verification` varchar(100) NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-verified, 1-not verified',
  `mobile_verified` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-verified, 1-not verified',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-new, 1-active, 2-inactive, 3-deleted',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `firstname`, `lastname`, `email`, `password`, `mobile`, `otp`, `verification`, `email_verified`, `mobile_verified`, `status`, `createdTime`) VALUES
(1, 'Raja', 'Sekar', 'rajasekar@addobyte.com', 'guest', '4574745747457', '', '', 0, 0, 1, '2017-09-07 03:11:22'),
(2, 'Rajkumar Appuchami', 'Kumaran', 'appuchami89@gmail.com', 'appuchami89', '9538789987', '', '', 1, 0, 1, '2017-10-05 13:31:41'),
(5, 'sakthi', 'v', 'sakthiraghav81@gmail.com', '12345', '9894530240', '387731', '', 1, 1, 3, '2017-11-06 12:01:47'),
(6, 'sakthi', 'raghav', 'sathyakumaran619@gmail.com', '12345678', '7397223410', '', '', 1, 0, 3, '2017-11-16 12:29:28'),
(7, 'Raja', 'Sekar', 'sirs.rajasekar@gmail.com', 'guest', '9585383457', '203216', '', 1, 1, 0, '2017-11-17 04:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_city`
--

CREATE TABLE `delivery_city` (
  `city_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `delivery_city`
--

INSERT INTO `delivery_city` (`city_id`, `name`, `status`) VALUES
(1, 'Chennai', 0),
(2, 'Chennai', 2),
(3, 'Delhi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_settings`
--

CREATE TABLE `delivery_settings` (
  `id` int(11) NOT NULL,
  `delivery_charge` varchar(10) NOT NULL,
  `delivery_limit` varchar(100) NOT NULL,
  `delivery_minimum` decimal(10,2) NOT NULL,
  `delivery_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_settings`
--

INSERT INTO `delivery_settings` (`id`, `delivery_charge`, `delivery_limit`, `delivery_minimum`, `delivery_amount`) VALUES
(1, 'yes', 'yes', '300.00', '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_time`
--

CREATE TABLE `delivery_time` (
  `tid` int(11) NOT NULL,
  `time_slot` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` int(11) NOT NULL DEFAULT '0',
  `modifiedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_time`
--

INSERT INTO `delivery_time` (`tid`, `time_slot`, `status`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(1, '7:00 AM - 9.30 AM', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, '11:00 AM - 1:00 PM', 0, 1, '2017-07-08 04:11:33', 1, '2017-07-08 04:15:43'),
(3, '12', 0, 1, '2017-11-13 18:39:14', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `garden`
--

CREATE TABLE `garden` (
  `gid` int(11) NOT NULL,
  `garden_name_english` varchar(200) CHARACTER SET utf8 NOT NULL,
  `garden_name_tamil` varchar(200) CHARACTER SET utf8 NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-basic,2-premium,3-luxury',
  `size` varchar(200) NOT NULL,
  `description_english` text CHARACTER SET utf8 NOT NULL,
  `description_tamil` text CHARACTER SET utf8 NOT NULL,
  `price` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garden`
--

INSERT INTO `garden` (`gid`, `garden_name_english`, `garden_name_tamil`, `type`, `size`, `description_english`, `description_tamil`, `price`, `status`, `createdTime`) VALUES
(1, 'Garden1', '', 0, '50', 'Test', 'Test', '1000.00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `garden_products`
--

CREATE TABLE `garden_products` (
  `gid` int(11) NOT NULL,
  `product_name_english` varchar(200) CHARACTER SET utf8 NOT NULL,
  `product_name_tamil` varchar(200) CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garden_products`
--

INSERT INTO `garden_products` (`gid`, `product_name_english`, `product_name_tamil`, `quantity`) VALUES
(1, '1', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_points`
--

CREATE TABLE `loyalty_points` (
  `cid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `type` enum('A','R') NOT NULL COMMENT 'A-add,R-redeem',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loyalty_points`
--

INSERT INTO `loyalty_points` (`cid`, `oid`, `points`, `type`, `createdTime`) VALUES
(1, 4, 1, 'A', '2017-09-13 02:07:50'),
(1, 1, 1, 'R', '2017-09-15 03:37:36'),
(1, 1, 1, 'A', '2017-09-15 03:37:36'),
(1, 2, 1, 'R', '2017-09-15 06:32:35'),
(1, 2, 1, 'A', '2017-09-15 06:32:35'),
(2, 3, 4, 'A', '2017-10-05 14:02:09'),
(2, 4, 4, 'R', '2017-10-05 14:06:37'),
(2, 4, 2, 'A', '2017-10-05 14:06:37'),
(6, 5, 3, 'A', '2017-11-16 12:34:55'),
(6, 6, 3, 'R', '2017-11-16 13:09:16'),
(6, 6, 3, 'A', '2017-11-16 13:09:16'),
(6, 7, 3, 'R', '2017-11-16 15:57:16'),
(6, 7, 2, 'A', '2017-11-16 15:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_settings`
--

CREATE TABLE `loyalty_settings` (
  `lid` int(11) NOT NULL,
  `loyalty` varchar(10) NOT NULL,
  `point_amount` decimal(10,2) NOT NULL,
  `point_redeem` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loyalty_settings`
--

INSERT INTO `loyalty_settings` (`lid`, `loyalty`, `point_amount`, `point_redeem`) VALUES
(1, 'yes', '110.00', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-amount, 2-percentage',
  `offer_val` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` int(11) NOT NULL DEFAULT '0',
  `modifiedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `start_date`, `end_date`, `amount`, `type`, `offer_val`, `status`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(1, '2017-07-06', '2017-07-13', '150.00', 2, '15.00', 0, 1, '2017-07-06 01:00:14', 1, '2017-07-06 01:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `delivery` decimal(10,2) NOT NULL DEFAULT '0.00',
  `loyalty` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-cod, 1-payment gateway',
  `delivery_date` date NOT NULL,
  `delivery_time` tinyint(1) NOT NULL DEFAULT '0',
  `offer_id` int(11) NOT NULL DEFAULT '0',
  `offer_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `coupon_id` int(11) NOT NULL DEFAULT '0',
  `coupon_amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-new, 1-active, 2-dispatched, 3-delivered',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `aid`, `cid`, `quantity`, `subtotal`, `delivery`, `loyalty`, `total`, `payment_type`, `delivery_date`, `delivery_time`, `offer_id`, `offer_amount`, `coupon_id`, `coupon_amount`, `status`, `createdTime`) VALUES
(1, 1, 1, 1, '100.00', '50.00', '10.00', '150.00', 0, '2017-09-15', 1, 0, '0.00', 0, '0.00', 3, '2017-09-15 03:37:36'),
(2, 1, 1, 1, '100.00', '50.00', '10.00', '150.00', 0, '2017-09-15', 1, 0, '0.00', 0, '0.00', 1, '2017-09-15 06:32:35'),
(3, 2, 2, 2, '400.00', '0.00', '0.00', '400.00', 0, '2017-10-06', 1, 0, '0.00', 0, '0.00', 1, '2017-10-05 14:02:09'),
(4, 2, 2, 1, '150.00', '50.00', '40.00', '200.00', 0, '2017-10-05', 1, 0, '0.00', 0, '0.00', 1, '2017-10-05 14:06:37'),
(5, 3, 6, 1, '250.00', '50.00', '0.00', '300.00', 0, '2017-11-16', 1, 0, '0.00', 0, '0.00', 1, '2017-11-16 12:34:55'),
(6, 3, 6, 1, '250.00', '50.00', '30.00', '300.00', 0, '2017-11-16', 1, 0, '0.00', 0, '0.00', 1, '2017-11-16 13:09:16'),
(7, 3, 6, 1, '200.00', '50.00', '30.00', '250.00', 0, '2017-11-16', 1, 0, '0.00', 0, '0.00', 1, '2017-11-16 15:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`oid`, `pid`, `quantity`, `price`, `tax`, `subtotal`, `total`) VALUES
(1, 1, 1, '100.00', '8.00', '100.00', '100.00'),
(2, 1, 1, '100.00', '8.00', '100.00', '100.00'),
(3, 4, 1, '200.00', '0.00', '200.00', '200.00'),
(3, 8, 1, '200.00', '0.00', '200.00', '200.00'),
(4, 11, 1, '150.00', '0.00', '150.00', '150.00'),
(5, 14, 1, '250.00', '0.00', '250.00', '250.00'),
(6, 3, 1, '250.00', '0.00', '250.00', '250.00'),
(7, 8, 1, '200.00', '0.00', '200.00', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `oid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`oid`, `status`, `createdTime`, `message`) VALUES
(1, 2, '2017-09-15 04:05:31', ''),
(1, 3, '2017-09-15 04:12:45', '');

-- --------------------------------------------------------

--
-- Table structure for table `plant_placements`
--

CREATE TABLE `plant_placements` (
  `id` int(11) NOT NULL,
  `placement_english` varchar(200) CHARACTER SET utf8 NOT NULL,
  `placement_tamil` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant_placements`
--

INSERT INTO `plant_placements` (`id`, `placement_english`, `placement_tamil`, `status`) VALUES
(1, 'Indoor', '', 0),
(2, 'Terrace', '', 0),
(3, 'Balcony', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plant_types`
--

CREATE TABLE `plant_types` (
  `type_id` int(11) NOT NULL,
  `type_english` varchar(200) CHARACTER SET utf8 NOT NULL,
  `type_tamil` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant_types`
--

INSERT INTO `plant_types` (`type_id`, `type_english`, `type_tamil`, `status`) VALUES
(1, 'Herbs', '', 0),
(2, 'Shrubs', '', 0),
(3, 'Pernnials', '', 0),
(4, 'Flowers', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plant_use`
--

CREATE TABLE `plant_use` (
  `id` int(11) NOT NULL,
  `use_english` varchar(200) CHARACTER SET utf8 NOT NULL,
  `use_tamil` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant_use`
--

INSERT INTO `plant_use` (`id`, `use_english`, `use_tamil`, `status`) VALUES
(1, 'Aromatic', '', 0),
(2, 'Ornamental', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `product_name_english` varchar(200) CHARACTER SET utf8 NOT NULL,
  `product_name_tamil` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL DEFAULT '0',
  `plant_type` int(11) NOT NULL,
  `plant_placement` int(11) NOT NULL,
  `plant_use` int(11) NOT NULL,
  `description_english` text CHARACTER SET utf8,
  `description_tamil` text CHARACTER SET utf8 NOT NULL,
  `short_description_english` text CHARACTER SET utf8 NOT NULL,
  `short_description_tamil` text CHARACTER SET utf8 NOT NULL,
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `hashtag` varchar(200) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `retail_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `shortname` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `trending` tinyint(11) NOT NULL DEFAULT '0' COMMENT '0-not trending, 1- trending',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` int(11) NOT NULL DEFAULT '0',
  `modifiedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `product_name_english`, `product_name_tamil`, `cid`, `scid`, `supplier_id`, `plant_type`, `plant_placement`, `plant_use`, `description_english`, `description_tamil`, `short_description_english`, `short_description_tamil`, `tax`, `hashtag`, `barcode`, `sku`, `retail_price`, `sale_price`, `shortname`, `status`, `trending`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(1, 'Pomegranate', 'மாதுளை', 1, 0, 1, 1, 2, 2, 'sample', 'சாம்பிள் ', '', '', '8.00', 'fruits', '', '', '110.00', '100.00', '', 1, 1, 1, '2017-08-28 03:13:02', 1, '2017-10-10 15:43:00'),
(2, 'Rose', 'ரோஜா', 2, 0, 2, 4, 2, 2, '<p>Rose is the plant that comes to the mind when people think about flowers. Rose comes in multiple varieties differentiated by their flower colour [red, pink, yellow, white and many more]. Rose is an ornamental shrub with upright and climbing stem. Normally it grown  5-6 feet height.  It is used for decoration, flower adornment, dry flower arrangements, worship and making matrimonial garlands. Roses attract bees & butterflies. Optimum temperature for growing rose is 25-30ᵒC. Bright sunshine for minimum of 6 hours is essential for the cultivation of roses. Watering should be done once in 3 days. Weeding should be done in weekly intervals. In rose,pruning is most important. The vigorous past season shoots are cut back to half the length. All the weak, diseased, criss-crossing and unproductive shoots are removed.</p><p>Thrips is the major problem. To avoid this, to spray organocides. To control mites,spray neem oil. Black spot and powdery mildew is the major problem. To avoid black spot,Removal of diseased & dried leaves. And control powdery mildew, spray wettable sulphur. </p>', 'இந்த ரோஜா மலர் மஞ்சள்,சிவப்பு,வெள்ளை என பல நிறங்களில் மிக அழகாக தோற்றமளிக்க கூடியது. ரோஜா செடி புதர் போன்று நேராகவும்,அதிக கிளைகளை கொண்டதாகவும் வளரும். ரோஜா செடி 5-6 அடி உயரத்தில் வளரும். ரோஜா பூங்கோத்து செய்யவும்,அலங்காரத்திற்காகவும்,மாலை கட்டுவதற்கும்,கோவில்களிலும் பயன்படுகிறது. இது தேனீயை கவர பயன்படுகிறது. ரோஜா மலர் 25-30ᵒC வெப்பநிலையில் வளர கூடியது. ரோஜா செடிக்கு 8 மணி நேரம் சூரிய ஒளி தேவைப்படுகிறது. 3 நாட்களுக்கு ஒருமுறை நீர் அளிக்க வேண்டும். வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும். கவாத்து செய்தல் மிகவும் முக்கியமானதாகும். முந்திய ஆண்டில் 50 சதம் வளர்ந்த தண்டுகளை வெட்டிவிடவேண்டும். மேலும் காய்ந்த, நோயுற்ற பூச்சி தாக்கப்பட்ட கிளைகள் மற்றும் குறுக்காக வளர்ந்த கிளைகளையும் வெட்டி அப்புறப்படுத்தவேண்டும். . ரோஜா மலரில் இலைப்பேன் தாக்கம் அதிகமாக இருக்கும். இதனை கட்டுப்படுத்த ஆர்கனோஸிட் தெளிக்க வேண்டும். மற்றும் சிலந்தியின் தாக்கத்தை கட்டுப்படுத்த வேப்ப எண்ணையை தெளிக்க வேண்டும். கரும்புள்ளி நோயை கட்டுப்படுத்த,நோயை தாக்கிய கிளைகளை அகற்ற வேண்டும். சாம்பல் நோயை கட்டுப்படுத்த நனைந்த கந்தகம் தெளிக்க வேண்டும். ', '', '', '0.00', 'red, rose, yellow rose.', '', '', '0.00', '75.00', '', 0, 0, 1, '2017-10-03 01:32:11', 1, '2017-10-20 15:35:12'),
(3, 'Ixora dwarf red', 'இட்லி பூ', 2, 0, 2, 0, 0, 0, 'Ixora is one of the most popular flowering shrubs. It has attractive red flowers. It has a rounded form with a spread that may exceed its height. It is used to offering to lord. It is used to flower arrangement, decoration& grown in pots. It should be dwarf. It will attracts many honey bees. It can be grown on temperature of 20-25ᵒC. Partial shade shall be provided to get a few hours of direct sunlight, either morning or evening. Irrigation should be done on 3 days intervals. Weekly once weeding is done. Ixora plants require light pruning to maintain the shape and promote flowering.', '<p>இட்லி பூ அழகான சிவப்பு நிறத்தில் தோற்றமளிக்கும். இந்த செடி புதர் போன்று நன்றாக வளரும். இட்லி பூ, பூங்கொத்து செய்யவும், அலங்காரத்திற்காகவும்</p><p>&nbsp;பயன்படுகிறது. தேனீக்கள், வண்ணத்து பூச்சிகளால் கவரப்படுகிறது. மாலை கட்டுவதற்கும் பயன்படுகிறது. இந்த செடி மிகவும் குட்டையாகவும் காணப்படுகிறது. இட்லி பூ&nbsp; 25-30ᵒC வெப்பநிலையில் வளர கூடியது. நேரடியான சூரிய வெப்ப நிலையில் செடிகளை வைக்க கூடாது. நிழலான பகுதியில் வைக்க வேண்டும். 3 நாட்களுக்கு ஒருமுறை நீர் அளிக்க வேண்டும். வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும். கவாத்து செய்தல் மிகவும் முக்கியமானதாகும். இதனால் அழகான வடிவத்தையும், பூக்களின் எண்ணிக்கையை அதிகரிக்கிறது.&nbsp;</p>', '', '', '0.00', '', '', '', '0.00', '250.00', '', 0, 0, 1, '2017-10-04 05:35:13', 1, '2017-10-20 15:36:31'),
(4, 'Hibiscus', 'செம்பருத்தி', 2, 0, 1, 4, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"180\" style=\"height:135.0pt\">  <td height=\"180\" class=\"xl64\" align=\"left\" width=\"634\" style=\"height:135.0pt;  width:476pt\">Hibiscus plants grow upto 15 feet height. The flowers come in  bright red, yellow, white and other colours based on the variety. It can  enhance the beauty of any garden. It will attracts bees & butterflies. It  adapts in balcony gardens in crammed urban spaces and can be easily grown in  pots. It requires full sunlight. Hibiscus petals can be used to make Hibiscus  tea. Irrigation should be done in once in 5 days. Weeding should be done in  weekly intervals. In hibiscus, pruning is important. They should be cut about  a third of the way back, leaving atleast two or three nodes on the branches  to encourage the new growth. Thrips infestation is the major problem that  could happen. To avoid this, organocides can be sprayed to . And leaf spot is  the major disease that can hamper growth of Hibiscus. A spray of wettable  sulphur will help control this disease.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"180\" style=\"height:135.0pt\">  <td height=\"180\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:135.0pt;  width:448pt\">செம்பருத்தி மலர் மஞ்சள், சிகப்பு, வெள்ளை என பல அழகான நிறங்களில்  தோற்றமளிக்க கூடியது. இந்த செடி 15அடி வளர கூடியது. இது மாடி தோட்டங்களில்  வளர்க்க  பயன்படுகிறது. இது தொங்கும் கூடைகளிலும், தோட்டத்தின் எல்லைகளில் வளர்க்க  பயன்படுகிறது. இது தேனீக்கள், வண்ணத்து பூச்சிகளால் கவரப்படுகிறது. இது  கோவில்களில், சாமி அலங்காரத்திற்கு பயன்படுகிறது. செம்பருத்தி மலர் 25-30ᵒC  வெப்பநிலையில் வளர கூடியது. 13 மணி நேரம் சூரிய ஒளி தேவைப்படுகிறது. 5  நாட்களுக்கு ஒருமுறை நீர் அளிக்க வேண்டும். வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும்.  கவாத்து செய்தல் மிகவும் முக்கியமானதாகும். ஒரு கிளைக்கு3 அல்லது 4மொட்டுக்களை  விட்டு கவாத்து செய்ய வேண்டும். மற்றும் நோய் உற்ற , இறந்த கிளைகளை அகற்றுதல்.  இலைப்பேன் தாக்கம் அதிகமாக இருக்கும். இதனை கட்டுப்படுத்த ஆர்கனோஸிட் தெளிக்க  வேண்டும். மற்றும் இலைபுள்ளி நோயை கட்டுப்படுத்த நனைந்த கந்தகத்தை தெளிக்க  வேண்டும். </td></tr></tbody></table>', '<p>Test</p>', '<p>Test</p>', '0.00', '', '', '', '0.00', '200.00', '', 0, 0, 1, '2017-10-04 05:55:23', 1, '2017-11-17 04:15:26'),
(5, 'Lavender', 'லெவெண்டர்', 2, 0, 1, 4, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"140\" style=\"height:105.0pt\">  <td height=\"140\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:105.0pt;  width:476pt\">Lavender is a small, aromatic shrub which is used extensively in  fragrances and room freshners. It&nbsp; has bright purple coloured flowers. The  flower spikes are used for dry flower arrangement. It is also used in  gardens, flower beds &amp; terraces. It can be grown temperature of 15-21ᵒC.  The plant should be grown in partial shade conditions. Irrigation should be  done in once in 3 days. Lavenders grow very slowly and need to be kept  compact to encourage more flower spikes. Spittle bug is the major problem in  Lavendar which can be shooed away by giving a powerful spray of water.</td></tr></tbody></table>&nbsp;&nbsp;', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"140\" style=\"height:105.0pt\">  <td height=\"140\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:105.0pt;  width:448pt\">லெவெண்டர் மலர் அழகான ஊதா நிறத்தில் காட்சியளிக்கும். இது மிகவும்  வாசனையுள்ள மலர். லாவெண்டர் செடி புதர் போன்று வளர கூடியது. <br>    அலங்காரத்திற்காகவும், தேனீயை கவர பயன்படுகிறது. இது மலர் பூங்காக்களிலும்  வளர்க்கப்படுகிறது. லெவெண்டர் மலர் 25-30ᵒC வெப்பநிலையில் வளர கூடியது. அதிக  சூரிய ஒளி இருக்க கூடாது. 3 நாட்களுக்கு ஒருமுறை நீர் அளிக்க வேண்டும்.  வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும். வருடத்திற்கு ஒருமுறை கவாத்து செய்ய  வேண்டும். உமிழ்நீர்(spittle bug) பூச்சியை கட்டுப்படுத்த மிகவும் அழுத்தமாக  தண்ணீரை தெளிக்க வேண்டும். </td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '1500.00', '', 0, 1, 1, '2017-10-04 06:01:56', 1, '2017-10-20 15:42:10'),
(6, 'Hibiscus white', 'செம்பருத்தி', 2, 0, 1, 4, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"180\" style=\"height:135.0pt\">  <td height=\"180\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:135.0pt;  width:476pt\">Hibiscus plants grow upto 15 feet height. The flowers come in  bright red, yellow, white and other colours based on the variety. It can  enhance the beauty of any garden. It will attracts bees &amp; butterflies. It  adapts in balcony gardens in crammed urban spaces and can be easily grown in  pots. It requires full sunlight. Hibiscus petals can be used to make Hibiscus  tea. Irrigation should be done in once in 5 days. Weeding should be done in  weekly intervals. In hibiscus, pruning is important. They should be cut about  a third of the way back, leaving atleast two or three nodes on the branches  to encourage the new growth. Thrips infestation is the major problem that  could happen. To avoid this, organocides can be sprayed to . And leaf spot is  the major disease that can hamper growth of Hibiscus. A spray of wettable  sulphur will help control this disease.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"180\" style=\"height:135.0pt\">  <td height=\"180\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:135.0pt;  width:448pt\">செம்பருத்தி மலர் வெள்ளை நிறங்களில் தோற்றமளிக்க கூடியது. . இந்த  செடி 15அடி வளர கூடியது. இது மாடி தோட்டங்களில் வளர்க்க பயன்படுகிறது. இது  தொங்கும் கூடைகளிலும், தோட்டத்தின் எல்லைகளில் வளர்க்க பயன்படுகிறது. இது  தேனீக்கள், வண்ணத்து பூச்சிகளால் கவரப்படுகிறது. இது கோவில்களில், சாமி  அலங்காரத்திற்கு பயன்படுகிறது. செம்பருத்தி மலர் 25-30ᵒC வெப்பநிலையில் வளர  கூடியது. 13 மணி நேரம் சூரிய ஒளி தேவைப்படுகிறது. 5 நாட்களுக்கு ஒருமுறை நீர்  அளிக்க வேண்டும். வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும். கவாத்து செய்தல்  மிகவும் முக்கியமானதாகும். ஒரு கிளைக்கு3 அல்லது 4மொட்டுக்களை விட்டு கவாத்து  செய்ய வேண்டும். மற்றும் நோய் உற்ற , இறந்த கிளைகளை அகற்றுதல். இலைப்பேன்  தாக்கம் அதிகமாக இருக்கும். இதனை கட்டுப்படுத்த ஆர்கனோஸிட் தெளிக்க வேண்டும்.  மற்றும் இலைபுள்ளி நோயை கட்டுப்படுத்த நனைந்த கந்தகத்தை தெளிக்க வேண்டும்.&nbsp;</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '150.00', '', 0, 0, 1, '2017-10-04 06:06:07', 0, '0000-00-00 00:00:00'),
(7, 'Ixora dark red', 'இட்லி பூ', 2, 0, 1, 4, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"140\" style=\"height:105.0pt\">  <td height=\"140\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:105.0pt;  width:476pt\">Ixora is one of the most popular flowering shrubs. It has dark  red flowers. It has a rounded form with a spread that may exceed its height.  It is used to offering to lord. It is used to flower arrangement,  decoration&amp; grown in pots. It should be dwarf. It will attracts many  honey bees. It can be grown on temperature of 20-25ᵒC. Partial shade shall be  provided to get a few hours of direct sunlight, either morning or evening.  Irrigation should be done on 3 days intervals. Weekly once weeding is done. Ixora  plants require light pruning to maintain the shape and promote flowering.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"140\" style=\"height:105.0pt\">  <td height=\"140\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:105.0pt;  width:448pt\">இட்லி பூ அழகான சிவப்பு நிறத்தில் தோற்றமளிக்கும். இந்த செடி புதர்  போன்று நன்றாக வளரும். இட்லி பூ, பூங்கொத்து செய்யவும்,  அலங்காரத்திற்காகவும்<br>    &nbsp;பயன்படுகிறது. தேனீக்கள், வண்ணத்து  பூச்சிகளால் கவரப்படுகிறது. மாலை கட்டுவதற்கும் பயன்படுகிறது. இட்லி பூ 25-30ᵒC  வெப்பநிலையில் வளர கூடியது. நேரடியான சூரிய வெப்ப நிலையில் செடிகளை வைக்க  கூடாது. நிழலான பகுதியில் வைக்க வேண்டும். 3 நாட்களுக்கு ஒருமுறை நீர் அளிக்க  வேண்டும். வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும். கவாத்து செய்தல் மிகவும்  முக்கியமானதாகும். இதனால் அழகான வடிவத்தையும், பூக்களின் எண்ணிக்கையை  அதிகரிக்கிறது.&nbsp;</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '100.00', '', 0, 0, 1, '2017-10-04 06:08:56', 0, '0000-00-00 00:00:00'),
(8, 'zabranthus', 'ஸிபிரான்தஸ்(Jephyranthus)', 2, 0, 1, 5, 1, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"97\" style=\"height:72.75pt\">  <td height=\"97\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:72.75pt;  width:476pt\">Flowers are bright pink, white yellow colour flowers. It is  attractive funnel shaped flowers. Flowers are sweet and fragrance. It will be  grown in ornamental garden. It grow well suited temperature of 21ᵒC. It is  tolerant to cold temperature. partial shade condition is needed. Irrigation  should be done once in 5-7 days. Weeding should be done in every 2  weeks.&nbsp;</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"97\" style=\"height:72.75pt\">  <td height=\"97\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:72.75pt;  width:448pt\">இந்த மலர் மிகவும் அழகான தோற்றத்துடன் காட்சியளிக்கும். இது  இளஞ்சிவப்பு, மஞ்சள், வெள்ளை நிறங்களில் காட்சியளிக்கும். இந்த மலர் மிகவும்  வாசனை உள்ள மலராக திகழ்கிறது. இது குடுவை வடிவத்தில் இருக்கும். அதிக சூரிய ஒளி  இருக்க கூடாது. . அலங்கார தோட்டங்களில் பயன்படுகிறது. . 21ᵒC வெப்பநிலையில் வளர  கூடியது. குறைந்த வெப்பத்தை தாங்கி வளர கூடியது. 3-5 நாட்களுக்கு ஒருமுறை நீர்  அளிக்க வேண்டும். 2 வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும்.&nbsp;</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '200.00', '', 0, 1, 1, '2017-10-04 06:12:44', 0, '0000-00-00 00:00:00'),
(9, 'Fern gold', 'பெரணி', 2, 0, 1, 5, 1, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"100\" style=\"height:75.0pt\">  <td height=\"100\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:75.0pt;  width:476pt\">It is excellent foliage plant. It will attractive green colour  leaves. Beautiful in mass plantings as a groundcover, especially under  flowering shrubs. Herbaceous perennial. It grows 24 inches height. It will be  grown on ornamental garden purpose. It grow well suited temperature of 20ᵒC.  It provide shade condition. Irrigation should be done once in 5-7 days.  Weeding should be done in every 2 weeks.&nbsp;</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"100\" style=\"height:75.0pt\">  <td height=\"100\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:75.0pt;  width:448pt\">இது மிக சிறந்த அலங்கார செடியாகும். . இதன் இலைகள் அழகான பச்சை  நிறத்தில் தோற்றமளிக்கும். இது மிக சிறந்த வீட்டினுள் வளரும் செடியாகும். இந்த  செடி புதர் போன்று வளர கூடியது. இந்த செடி அலங்கார தோட்டங்களில் பயன்படுகிறது.  இது 24 இன்ச் உயரத்தில் வளர கூடியது. காற்றை தூய்மையாக்க பயன்படுகிறது. 20ᵒC  வெப்பநிலையில் வளர கூடியது. நிழலில் வளர கூடியது. 7 நாட்களுக்கு ஒருமுறை நீர்  அளிக்க வேண்டும். 2 வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும்.&nbsp;</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '250.00', '', 0, 0, 1, '2017-10-04 06:17:39', 0, '0000-00-00 00:00:00'),
(10, 'Calatheya', 'கேளத்தியா(Calatheya)', 2, 0, 1, 0, 1, 2, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"80\" style=\"height:60.0pt\">  <td height=\"80\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:60.0pt;  width:476pt\">It has bright attractive green colour leaves. These are  excellent plants for house garden. It will give a very good ornamental look  to the garden. The well suited temperature for growing is 21ᵒC. The partial  shade is required. Irrigation should be done once in 5-7 days. Weeding should  be done in every 2 weeks.&nbsp;</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"80\" style=\"height:60.0pt\">  <td height=\"80\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:60.0pt;  width:448pt\">இதன் இலைகள் மிகவும் அழகாக தோற்றமளிக்கும். இது மிக சிறந்த அலங்கார  செடியாகும். இது மிக சிறந்த வீட்டினுள் வளர்க்கும் செடியாக காட்சியளிக்கிறது. .  21ᵒC வெப்பநிலையில் வளர கூடியது. 7 நாட்களுக்கு ஒருமுறை நீர் அளிக்க வேண்டும். 2  வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும். . நிழலில் வளர கூடியது.&nbsp;</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '0.00', '', 0, 0, 1, '2017-10-04 06:20:06', 1, '2017-10-20 17:01:00'),
(11, 'Dracena mahatma', 'ட்ரஸ்ன்னா', 2, 0, 1, 5, 1, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"81\" style=\"height:60.75pt\">  <td height=\"81\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:60.75pt;  width:476pt\">Leaves are attractive reddish pink colour.It is&nbsp; durable foliage plants used indoors in  offices building, hotels, and malls but also as an everyday house plant. It  grows&nbsp; 6 feet height. It is grown in  pots. It can be grown temperature of 21ᵒC. Irrigation should be done in once  in 7 days. 10-15 days interval weeding is done. No serious pest and disease  problem.&nbsp;</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"81\" style=\"height:60.75pt\">  <td height=\"81\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:60.75pt;  width:448pt\">ட்ரஸ்ன்னா(Dracena) இலைகள் இளஞ்சிவப்பு நிறத்தில் அழகான  தோற்றத்துடன் காட்சியளிக்கும். இது மிக சிறந்த வீடு மற்றும் அலுவலகத்தில்  வளர்க்கும் அலங்கார செடியாகும். இது 6 அடிஉயரத்தில் வளர கூடியது. 21ᵒC  வெப்பநிலையில் வளர கூடியது. 7 நாட்களுக்கு ஒருமுறை நீர் அளிக்க வேண்டும். 2  வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும். பூச்சி மற்றும் நோய் தாக்குதல்  அதிகமாக இருக்காது.&nbsp;</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '150.00', '', 0, 1, 1, '2017-10-04 06:26:21', 0, '0000-00-00 00:00:00'),
(12, 'Adenium(Normal Variety)', 'அடினியம்', 2, 0, 1, 5, 1, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"129\" style=\"height:96.75pt\">  <td height=\"129\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:96.75pt;  width:476pt\">It is bright red &amp; pink coloured flowers. Adeniums are  basically long lived, succulent perennials from tropical regions.&nbsp; It can be grown on both indoor and outdoor.  It can be grown in pots. It is mainly used for gardening purpose and also  grown in bonsai. The flowers are very attractive. It is grown on temperature  of 25ᵒC. It requires 8 hours sunlight. Irrigation should be done in once in  5-7 days. 2 weeks interval weeding should be done. Pruning should be done in  every 2 years. Diseased and dried leaves should be removed.&nbsp;</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"129\" style=\"height:96.75pt\">  <td height=\"129\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:96.75pt;  width:448pt\">அடினியம்(Adenium) மலர் சிவப்பு மற்றும் இளஞ்சிவப்பு நிறத்தில்  தோற்றமளிக்கும். இந்த மலர் மிகவும் அழகானமலராகும். அதிக வெப்பம் நிறைந்த  பகுதிகளிலும் வளர கூடியது. வீட்டின் உள் பகுதிகளிலும் மற்றும் வெளிப்புற  தோட்டங்களிலும் வளர்க்கப்படுகிறது. இந்த செடி, தொட்டிகளில் வளர்க்கப்படுகிறது.  குட்டைசெடியாகவும் வளர்க்கப்படுகிறது. 25ᵒC வெப்பநிலையில் வளர கூடியது. 8 மணி  நேரம் சூரிய ஒளி தேவைப்படுகிறது. 5-7 நாட்களுக்கு ஒருமுறை நீர் அளிக்க வேண்டும்.  2 வாரத்திற்கு ஒருமுறை களை எடுக்க வேண்டும். கவாத்து 2வருடங்களுக்கு ஒருமுறை  செய்ய வேண்டும். காய்ந்து போன கிளைகளை அகற்ற வேண்டும்.&nbsp;</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '1200.00', '', 0, 0, 1, '2017-10-04 06:29:22', 0, '0000-00-00 00:00:00'),
(13, 'Ixora white', 'இட்லீ பூ', 2, 0, 1, 4, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"145\" style=\"height:108.75pt\">  <td height=\"145\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:108.75pt;  width:476pt\">Brightly white coloured globe shape&nbsp; flowers.Dense, multi-branched evergreen  shrub, commonly 4–6 ft (1.2–2 m) in height. Ixora ia mainly used for hedge  plant in landscaping.It is also used in pot plant indoor &amp; outdoor.It is  best suited for growing18-23°C.Watering is apply weekly twice,weeding is done  weekly once.Pruning is done once in a year to encourage the growth.Disease  &amp; dried branches remove.spidermite and thrips are major pest.Use  insecticidal oil spray or neem oil 3%.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"145\" style=\"height:108.75pt\">  <td height=\"145\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:108.75pt;  width:448pt\">வெள்ளை நிற பந்து போன்ற வடிவில்பூக்கள் அழகாக  இருக்கும்.அடர்த்தியான,&nbsp; பசுமையான செடி,  பொதுவாக 4-6 அடி (1.2-2 மீ) உயரம் வரை வளரும்.இந்த செடி லாண்ட்ஸ்கேப்  பூங்காவில்<br>    வேலியாக ஆக அதிகம் பண்படுத்துகின்றனர். வீட்டில் சிறிய தொட்டிகளில் வைத்து  <br>    அழகு செடியாக வளர்க்கப்படுகிறது.இந்த செடியை வீட்டின் உள் மற்றும்  வெளிப்புறங்களில் வளர்க்கலாம்.வெப்பநிலை:18-23°C. வாரம்&nbsp; இரண்டு முறை தண்ணிர் விட வேண்டும்.வாரம் ஒரு  முறை களை எடுக்க வேண்டும்.செடியின் வளர்ச்சியை அதிகரிக்க வருடத்திற்கு ஒரு முறை  கவாத்து செய்ய வேண்டும்.அசுவினி பூச்சி மற்றும் ஸ்பைடர் மீட் அதிகமாக செடியை  தாக்க கூடிய பூச்சி ஆகும்.சோப்பு ஆயில் (எ)வேப்பஎண்ணெயை பயன்படுத்தி பூச்சி  தாக்கத்தை குறைக்கலாம்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '150.00', '', 0, 0, 1, '2017-10-04 06:32:19', 0, '0000-00-00 00:00:00'),
(14, 'Nirium dwarf pink flower', 'அரளி பூ', 2, 0, 1, 4, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"129\" style=\"height:96.75pt\">  <td height=\"129\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:96.75pt;  width:476pt\">Bright pink bell shape flower,fragrant flower.nerium grows to  2–4 m tall, with erect stem.It is an ornamental plant extensively used in  landscapes, parks, and along roadside planting.It is mostly grown out  door.Best suited climate tropical climate 25-30°C.Watering weekly  once,weeding two weeks once done.Pruning -cut the old shoots,increase new  branch and flowering).<br>    Pest: Leaf Caterpillar-Spray the foliage of plants with neem oil.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"129\" style=\"height:96.75pt\">  <td height=\"129\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:96.75pt;  width:448pt\">இந்த செடி அதிகமாக லாண்ட்ஸ்<br>    கேப்,பூங்கா மற்றும் சாலையோரங்களில் வளர்க்கும் செடியாகவும்  பயன்படுகிறது.<br>    இந்த செடி கார்பன் டை ஆஸ்சைடை மற்றும் வாகனங்களிலிருந்து வெளிவரும் புகையை  உறிஞ்சி&nbsp; கொள்கிறது.இந்த செடியை வீட்டின்  வெளிப்புறங்களில் வளர்க்கலாம்.வெப்பநிலை:25-30°C வாரம் ஒரு முறை தண்ணிர் விட  வேண்டும்.இரண்டு வாரத்திற்கு ஒரு முறை களை எடுக்கவேண்டும்.செடியிலிருந்து  வளரும்பழைய கிளைகளை ப்ரூனிங் செய்யவேண்டும்.பூச்சி தாக்கம்:இலைகளை உண்ணும்  பூச்சியை கட்டுப்படுத்த இலைகளின்மீது வேப்பஎண்ணையை தெளிக்க வேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '250.00', '', 0, 1, 1, '2017-10-04 06:36:30', 0, '0000-00-00 00:00:00'),
(15, 'Lantana yellow', 'உன்னி செடி', 2, 0, 1, 4, 0, 0, '<span style=\"color:rgb(153,0,0);\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt; color: rgb(153, 0, 0);\"><tbody style=\"color: rgb(153, 0, 0);\"><tr height=\"180\" style=\"height: 135pt; color: rgb(153, 0, 0);\">  <td height=\"180\" class=\"xl70\" align=\"left\" width=\"634\" style=\"height: 135pt; width: 476pt; color: rgb(153, 0, 0);\"><span style=\"color: rgb(153, 0, 0);\"><font class=\"font6\" style=\"color: rgb(153, 0, 0);\"><b style=\"color: rgb(153, 0, 0);\"><i style=\"color: rgb(153, 0, 0);\">Lantana</i></b></font><font class=\"font5\" style=\"color: rgb(153, 0, 0);\"> is a  rugged evergreen shrub from the tropics. The species will grow to 6 ft high  and may spread wide with ability to clamber vinelike up supports to greater  heights. The leaves are small with rounded tooth edges. </font><font class=\"font7\" style=\"color: rgb(153, 0, 0);\">Stems and leaves are covered with rough hairs and emit an  unpleasant aroma when crushed. </font><font class=\"font5\" style=\"color: rgb(153, 0, 0);\">The flowers are  tiny and held in clusters (called umbels). Flower color ranges from white,  yellow, orange, red, pink to rose in unlimited combinations. The flowers  usually dull or change the color as they age. </font><font class=\"font8\" style=\"color: rgb(153, 0, 0);\">Lantana  also comes in white, yellow and red colour combination that blend when viewed  from afar.</font></span></td></tr></tbody></table></span>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"168\" style=\"height:126.0pt\">  <td height=\"168\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:126.0pt;  width:448pt\">பிரைட் மஞ்சள் நிற பூக்கள்.இந்த செடி நான்கு குழாய் கொண்ட சிறிய  குழாய் வடிவ பூக்கள் மற்றும் முனை பகுதிகளில் கொத்தாக பூத்து குலுங்குகிறது.ஒரு  சிறிய வற்றாத புதர் இது வளர 2 மீட்டர் வளரும்.இந்த செடி மாஸ்  செடியாகவும்,எட்ஜ்,ஹாங்கிங் பாஸ்கெட் லாண்ட்ஸ்கேப்பில் பயன்படுகிறது.அழகு  செடியாக சிறிய தொட்டிகளில் வளர்க்கப்படுகிறது.இந்த செடியின் பூக்கள்  வந்துவண்ணத்துபூச்சிகளை அதிகம் ஈர்க்கிறது. கொசுக்களுக்கு எதிராகவும்  பயன்படுகிறது. இந்தசெடியை வீட்டின் உள் மற்றும் வெளிப்புறங்களில்  வளர்க்கலாம்.வெப்பநிலை:25-30°C. வாரத்திற்கு ஒரு முறை தண்ணீர் விட  வேண்டும்.இரண்டு வாரத்திற்கு ஒரு முறை களை எடுக்க வேண்டும்.பூத்து முடிந்த  பூக்களை ப்ரூனிங் செய்ய வேண்டும்.நோய்: சாம்பல் நோய்-காற்றோட்டத்தை அதிகப்படுத்த  வேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '100.00', '', 0, 0, 1, '2017-10-04 06:39:17', 1, '2017-10-05 14:39:39'),
(16, 'Allamanda', 'கோல்டன் டரும்ப்லேட்', 2, 0, 1, 4, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"126\" style=\"height:94.5pt\">  <td height=\"126\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:94.5pt;  width:476pt\">Yellow color flower has five lobed sepals and a bell- or  funnel-shaped corolla of five petals.It is Quick growing climber with <br>    shining foliage.It is mainly used for single specimen&amp;&nbsp; mixed bed,along a fence,on each side of a  garden gate or entryway corner accent for the house.It is mostly grown  outdoor.Suitable Temperature: 18-27.Watering twice in week,weeding once in a  week.Staking is provide to support the climber.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"126\" style=\"height:94.5pt\">  <td height=\"126\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:94.5pt;  width:448pt\">இந்தப் பூக்கள்&nbsp; மஞ்சள்  நிறமாக இருக்கும் ஐந்து இதழ்கள், அல்லது பெல்லல்-வடிவ கரோலாவை  கொண்டிருக்கும்.இந்த செடி கொடியாக வளரும்.இந்த செடி எட்ஜ்,கலப்பு  செடியாகவும்,வேலியாகவும் &amp;வீடு&nbsp;  மற்றும் கேட்டின் முன்புறமாகவும் அழகு செடியாக வளர்க்க பயன்படுகிறது.இந்த  செடியை வீட்டின்வெளிப்புறங்களில் வளர்க்கலாம்.வெப்பநிலை: 18-27 வாரத்திற்கு  இரண்டு முறை தண்ணிர் விட வேண்டும்,வாரம் ஒருமுறை களைஎடுக்கவேண்டும்.இந்த செடி  கொடியாக வளர்வதால் சப்போர்ட் கொடுக்க வேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '100.00', '', 0, 0, 1, '2017-10-04 06:43:44', 0, '0000-00-00 00:00:00'),
(17, 'Verbena', 'வெர்பினா', 2, 0, 1, 4, 3, 2, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"113\" style=\"height:84.75pt\">  <td height=\"113\" class=\"xl70\" align=\"left\" width=\"634\" style=\"height:84.75pt\">Verbena has flower clusters which can be white, pink, purple,  blue, and yellow in different colors. Plants are erect, grow up to 2m height.  Plants are ideally suited for the annual garden, for the perennial flower  bed, for borders and edging, and for containers. Many of the trailing  varieties are excellent in hanging baskets and on garden walls. Verbena can  be planted in masses for a ground cover.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"126\" style=\"height:94.5pt\">  <td height=\"126\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:94.5pt;  width:448pt\">மலர்கள் வட்டவடிவ கொட்டகையில், ஐந்து விதமானவை. நிறங்கள் நீலம்,  இளஞ்சிவப்பு, சிவப்பு, மஞ்சள் மற்றும் வெள்ளை நிறத்தில்உள்ளன.இந்த செடி 2  மீட்டர் உயரம் வரை வளரும். பூங்காக்கள் & தோட்டங்கள், சிறிய தோட்டங்கள்,  மலர் தோட்டம்,பார்டர், தரைக்கழிவு, பால்கன், கொள்கலன் நடவுபிலோவேர் பெட் ஆக  லாண்ட்ஸ்கேப்பில்பயன்படுகிறது.தொங்கும் கூடையில் வீட்டின் முன்புறம் வளர்க்கவும்  பயன்படுகிறது.இந்த செடியை வீட்டின் உள் மற்றும் வெளிப்புறங்களில் வளர்க்கலாம்.  வெப்பநிலை:20-30°C. வாரத்திற்கு ஒரு முறை தண்ணீர் விட வேண்டும்,இரண்டு வாரத்திற்கு  ஒரு முறை களை எடுக்க வேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '100.00', '', 0, 0, 1, '2017-10-04 06:46:36', 1, '2017-10-05 14:26:58'),
(18, 'Sansevieria', 'மருள் செடி (சினேக் பிளான்ட்)', 2, 0, 1, 2, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"105\" style=\"height:78.75pt\">  <td height=\"105\" class=\"xl70\" align=\"left\" width=\"634\" style=\"height:78.75pt\">Sansevieria commonly called the snake plant, because of the  shape of its leaves, has a dense cluster of stiff sword shaped leaves growing  vertically. Mature leaves are dark green with light gray-green cross-banding.  It is grown for the hemp-like fiber in the leaves, which is called bowstring  hemp. They are an attractive plant for growing in pots. They tolerate the low  light conditions and are very drought tolerant.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"105\" style=\"height:78.75pt\">  <td height=\"105\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:78.75pt;  width:448pt\">இலையின் விளிம்புகளில் மஞ்சள் அல்லது வெள்ளி-வெள்ளை நிற கோடுகள்  கொண்ட வண்ணமயமான நிறங்களில் உள்ளன. இந்த செடி அடர்த்தியாக,பசுமையாக 2 உயரம் வரை  வளரும். இந்த செடி காற்றை சுத்தப்படுத்துகிறது. இந்த செடி வீட்டில் வளர்க்கும்  அழகு செடியாக பயன்படுகிறது.<br>    இந்த செடியை வீட்டின் உள் மற்றும்  வெளிப்புறங்களில்வளர்க்கலாம்.வெப்பநிலை:21-32°Cவாரம் ஒருமுறை தண்ணிர் விட  வேண்டும். மாதம் ஒரு முறை களை எடுக்க வேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '2000.00', '', 0, 0, 1, '2017-10-04 06:51:30', 1, '2017-10-05 14:28:09'),
(19, 'Ficus Bonda big size', 'பைக்கஸ் ஸ்பீசஸ்', 3, 0, 1, 2, 0, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"97\" style=\"height:72.75pt\">  <td height=\"97\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:72.75pt;  width:476pt\">Plants are s-curved trunk and has oval, dark green leaves.Plant  erct growing 60 cm height.It is Indoor specimen plant,mainly used for bonsai  plant in indoor &amp; out door.Temperature 15-22°C.Watering once in a  week.Repotting-Repoting is done in winter time,avoid excess growth of the  plants.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"97\" style=\"height:72.75pt\">  <td height=\"97\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:72.75pt;  width:448pt\">ஒரு s- வடிவில் வளைந்த உடற்பகுதியில் வடிவமைக்கப்பட்டு,நீள்வட்ட ,  கரும் பச்சை இலைகள் கொண்டது.இந்த செடி 60 cm உயரம் வரை வளரும்.இந்த செடி  வீட்டில் இண்டூர் ஸ்பேசிமாநக வளர்க்கப்படுகிறது.பொன்சாய் செடியாகவும் அதிகம்  வளர்க்கப்படுகிறது.இந்த செடியை வீட்டின் உள் மற்றும் வெளிப்புறங்களில்  வளர்க்கலாம்.வெப்பநிலை: 15-22°C வாரத்திற்கு ஒருமுறை தண்ணிர் விட  வேண்டும்.ரிபாட்டிங்:அதிக வளர்ச்சியை தடுக்க ரிபாட்டிங் செய்ய  வேண்டும்.ரிபாட்டிங் குளிர் காலத்தில் செய்ய வேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '200.00', '', 0, 0, 1, '2017-10-04 06:54:29', 0, '0000-00-00 00:00:00'),
(20, 'Aglonema', 'அக்லோனேமா கிரிஸ்பம்', 2, 0, 1, 5, 1, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"84\" style=\"height:63.0pt\">  <td height=\"84\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:63.0pt;  width:476pt\">Leaves are varigated attractive foliage. leaves covered in  silver mainly with some small green patches.Indoor air purifying plant.It is  mainly used for indoor foliage plant.Temprature:18-24°C.watering <br>    once in aweek.Weeding once in month.Repoting is done.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"84\" style=\"height:63.0pt\">  <td height=\"84\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:63.0pt;  width:448pt\">இந்த செடி வெள்ளி முனைகளை கொண்ட பளபளப்பான இருண்ட பச்சை இலைகளை  கொண்டிருக்கும். இந்த செடி வீட்டில்காற்றை சுத்தம் செய்கிறது.அழகு செடியாக  வீட்டில் வளர்க்க படுகிறது.வீட்டின் உள்புறங்களில் அதிகம்  வளர்க்கின்றனர்.வெப்பநிலை: 18-24°C வாரம் ஒரு முறை தண்ணிர் விட வேண்டும்,மாதம்  ஒரு முறை களை எடுக்க வேண்டும்.ரிபாட்டிங் செய்ய வேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '100.00', '', 0, 0, 1, '2017-10-04 06:57:09', 0, '0000-00-00 00:00:00'),
(21, 'Hypistrum', 'ஹிப்பேஸ்ட்ரெம் ஸ்பீசஸ்', 2, 0, 1, 5, 1, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"84\" style=\"height:63.0pt\">  <td height=\"84\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:63.0pt;  width:476pt\">cluster of flowers&nbsp; two to  twelve funnel-shaped flowers at their tops.It is a indoor flowering  plant,flowers are used for indoor decoration.It is also used for pot plant in  indoor.Best suitable Temperature: 21°C&amp; partial shade enough for  growing..Watering once in a week.weeding is done once in two week interval.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"84\" style=\"height:63.0pt\">  <td height=\"84\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:63.0pt;  width:448pt\">ஒவ்வொரு செடியும்&nbsp; இரண்டு  முதல் பன்னிரண்டு புல்லர்-வடிவ மலர்களைக் கொண்டிருக்கும்.இந்த செடி  இண்டூர்செடியாக அதிகம் வளர்க்கின்றனர்.இந்த செடியின் பூக்கள்அழகாக உள்ளதால்  உட்புற அலங்காரங்களில் அதிகம் பயன்படுத்துகின்றனர். பகுதியளவு நிழல் இந்த  செடிக்கு தேவைப்படுகிறது.வெப்பநிலை: 21°C வாரம் ஒரு முறை தண்ணிர் விட வேண்டும்.  இரண்டு வாரத்திற்கு ஒரு முறை களை எடுக்கவேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '100.00', '', 0, 0, 1, '2017-10-04 06:59:24', 0, '0000-00-00 00:00:00'),
(22, 'Fern Nephrolepis', 'பாஸ்டன்ஃபெர்ன்', 2, 0, 1, 2, 1, 0, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"84\" style=\"height:63.0pt\">  <td height=\"84\" class=\"xl66\" align=\"left\" width=\"634\" style=\"height:63.0pt;  width:476pt\">Hanging shape light green colour leaves.It is a very  popular house plant, often grown in hanging baskets.It is a  ground cover,specimen plant in the  garden.It can be grown temperature  21°C.Watering weekly twice.weeding is done two week interval.remove dried  leaves and branches.</td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"84\" style=\"height:63.0pt\">  <td height=\"84\" class=\"xl66\" align=\"left\" width=\"597\" style=\"height:63.0pt;  width:448pt\">தொங்கும் அழகிய ஊசி வடிவ இலைகளை உடையது.இந்த செடி தொங்கும்  கூடையில்<br>    வளர்க்கும் செடியாகவும்,வீட்டில்அதிகம் வளர்க்கும் அழகு செடியாகவும்  பயன்படுகிறது.வெப்பநிலை: 21°C வாரம் இரண்டுமுறை தண்ணீர்விட வேண்டும்.  இரண்டுவாரத்திற்கு ஒரு முறை களை எடுக்க வேண்டும்.காய்ந்த இலைகளை அகற்ற வேண்டும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '1200.00', '', 0, 0, 1, '2017-10-04 07:01:44', 1, '2017-10-20 15:31:38'),
(23, 'Thunbergia', 'துன்பேர்ஜியா', 3, 0, 1, 0, 3, 2, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"634\" style=\"width: 476pt;\"><tbody><tr height=\"120\" style=\"height:90.0pt\">  <td height=\"120\" class=\"xl70\" align=\"left\" width=\"634\" style=\"height:90.0pt\">Thunbergia or Bengal Clock Vine is a beautiful flowering vine.  It is a vigorous evergreen vine and native to northern India. From the  rope-like stems, that can reach to the top of large structure or even cover a  good sized tree, emerge the dark green leaves that are leathery and have a  distinctive elongated heart shape, 4-5 inches long and often have a slightly  toothed margin. The beautiful pale blue or white flowers are cup-like with  pale yellow to cream blue striped centers. This plant can be in bloom at  nearly any time of year but will sulk during cold months.<br style=\"height:90.0pt\"><br style=\"height:90.0pt\"><span style=\"height: 90pt;\"><a href=\"https://www.youtube.com/watch?v=kK24dIil--8\" style=\"height: 90pt;\">Care for Thunbergia</a></span></td></tr></tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"597\" style=\"width: 448pt;\"><tbody><tr height=\"120\" style=\"height:90.0pt\">  <td height=\"120\" class=\"xl70\" align=\"left\" width=\"597\" style=\"height:90.0pt;  width:448pt\">துன்பேர்ஜியா படரும் தாவரமாகும்.இதில் நீல நிற மலர்கள்  தோற்றமளிக்கும். 20m வரை படர கூடியது.இது தொட்டிகளில் வளர்க்கப்படுகிறது.இது  வீட்டின் வெளிப்புற பகுதிகளில் வளர்க்கப்படுகிறது.இது 2o mஎன்ற உயரத்தில்  வளரும்.</td></tr></tbody></table>', '', '', '0.00', '', '', '', '0.00', '80.00', '', 0, 0, 1, '2017-10-05 15:36:24', 1, '2017-10-05 16:01:03'),
(24, 'Rose combo plants', 'ரோஜா சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 2, 1, 'Create a romantic ambiance in your garden, balcony or terrace with this combo package. The 10 rose plants that bloom throughout the year gives a great look and fragrance to your household. As a part of this package, you get<p></p><p><span style=\"display: inline !important;\"> 3 Red plants, 2White, 2 Pink and 3 Yellow rose plants</span></p><p></p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">Pots:</b> 10 nos of 10\" black plastic pots</span></p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">Supplements</b><b style=\"display: inline !important;\">:</b> 2 Kg vermicompost, 500 ml Panchagavya and 250 g Rose mixture.</span></p><p></p>', '<p>மாடி தோட்டங்களில் அழகாக காட்சியளிக்க ரோஜா சேர்க்கை தாவரங்கள் உருவாக்கப்படுகிறது.இந்த ரோஜா சேர்க்கை தாவரங்களில் 10 செடிகள் உள்ளன.ரோஜா பூக்கள் பல நிறங்களில் தோற்றமளிக்கும்.</p><p><br></p><p>3 சிவப்பு, மஞ்சள் இளஞ்சிவப்பு மற்றும் வெள்ளை ரோஜா செடிகள்.</p><p><b>தொட்டிகள்</b>: 12\"கருப்பு நிற பிளாஸ்டிக் தொட்டி -10<br></p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் </b>: 3kg மண்புழு உரம்,&nbsp; 500 ml பஞ்ச காவ்யா, 250 g&nbsp;ரோஸ் மிக்ஸ்சேர்&nbsp; தேவைப்படுகிறது.&nbsp;</span><br></p>', '', '', '0.00', 'Red, pink and yellow rose', '', '', '1885.00', '1885.00', '', 0, 0, 1, '2017-10-10 16:12:53', 1, '2017-10-20 17:42:03'),
(25, 'Marigold combo plants', 'செண்டுமல்லி சேர்க்கை தாவரங்கள்', 4, 0, 1, 4, 2, 1, 'Create a beautiful & Fragrance in your Terrace or Balcony.Marigold is very popular for its large and thick flowers that naturally occur in golden, orange and yellow colors. Having these plants adds a lot of colour to your garden and their pungent odour repels mosquitoes and other pests naturally. This combo pack includes,This combo consists of 10 Marigold attractive,beautiful flowers.<p></p><p><b><b>Plants</b>: 5 orange marigold and 5 yellow marigold.</b></p><p><b><b>Pots</b>: 12\" Black,Plastic pot.</b></p><p><b><b>Supplements</b>: 2 kg Vermi compost, 2 Lt Panchakavya and 100ml  Blooming booster.</b></p>', 'செண்டுமல்லி&nbsp; அழகான ஆரஞ்சு மற்றும் மஞ்சள் நிறத்தில் இருக்கும்.உங்கள் தோட்டங்கள் அழகாகவும்,நறுமணம் உள்ளதாகவும் இருக்கும்.இந்த மலரின் மணம், பூச்சிகளை அளிக்க கூடியது.&nbsp;இந்த சேர்க்கை தாவரங்களின் பட்டியலில், 10 செண்டுமல்லி செடிகள் உள்ளன.<p><br></p><p></p><p>5 ஆரஞ்சு மற்றும் 5 மஞ்சள் நிற&nbsp; செண்டு மல்லி செடிகள்&nbsp;<br></p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">தொட்டிகள்</b>: 10\"கருப்பு நிற பிளாஸ்டிக் தொட்டி -10</span><br></p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள்</b> : 3kg மண்புழு உரம்,&nbsp; 3 lt பஞ்ச காவ்யா, 100 ml பிலோமிங் பூஸ்டர் தேவைப்படுகிறது.&nbsp;</span><br></p><p></p>', '', '', '0.00', 'yellow and orange marigold flowers', '', '', '2075.00', '2075.00', '', 0, 0, 1, '2017-10-10 16:23:50', 1, '2017-10-20 17:39:52'),
(26, 'Chrysanthemum combo plants', 'சாமந்தி சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 2, 2, '<p>Chrysanthemum is a herbaceous perennial plant with daisy-like or decorative flowers resembling pompons. In China, yellow or white chrysanthemum flowers are boiled to make a chrysanthemum tea. This Chrysanthemum combo pack includes,</p><p><br></p><p>5 Purple, 3 pink and 2 yellow flower plants</p><p>Pots: 10 nos 10\" Black color plastic pots</p><p>Supplements: 2 kg Vermicompost, and 100ml  Blooming booster</p>', 'சாமந்தி மலர் அழகாக,நறுமணம் கொடுக்க கூடியது. இந்த செடி குட்டையாக வளரும்.இந்த சாமந்தி மலர் பல நிறங்களில் உள்ளது..இது மலர் அலங்காரத்திற்கு பயன்படுகிறது.இந்த சேர்க்கை தாவரங்களில் 10 சாமந்தி&nbsp; செடிகள் உள்ளன.<p><br></p><p><br></p><p></p><p><br></p><p><span style=\"display: inline !important;\">&nbsp; 5 ஊதா&nbsp;,3 இளஞ்சிவப்பு மற்றும் 2&nbsp;</span><span style=\"display: inline !important;\">மஞ்சள்</span><span style=\"display: inline !important;\">&nbsp;&nbsp;நிற&nbsp;&nbsp;</span><span style=\"display: inline !important;\">சாமந்தி&nbsp;&nbsp;</span><span style=\"display: inline !important;\">செடி</span><span style=\"display: inline !important;\">&nbsp; &nbsp; &nbsp; &nbsp;</span></p><p><span style=\"display: inline !important;\">தொட்டிகள்: 10\"கருப்பு நிற பிளாஸ்டிக் தொட்டி -10</span><br></p><p><span style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் : 2 kg மண்புழு உரம், 100 ml&nbsp; பிலோமிங் பூஸ்டர்&nbsp;</span><br></p><p></p>', '', '', '0.00', 'purple, pink and yellow  chrysanthemum flowers', '', '', '2475.00', '2475.00', '', 0, 0, 1, '2017-10-12 16:35:24', 1, '2017-10-20 17:49:04'),
(27, 'Zinnia combo plants', 'ஜின்னியா சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 2, 2, '<p>Zinnias are popular garden flowers that have the ablity to withstand hot summer temperatures. Their ability to attract hummingbirds is seen as useful as a defense against whiteflies, and therefore zinnias are a desirable companion plant, benefiting plants that are inter-cropped with it. The zinnia combo pack includes,</p><p><br></p><p>3 Pink, 3 yellow and 4 orange flower plants</p><p>Pots: 10 nos 10\" Black colour plastic pots</p><p>Supplements: 2 kg Vermicompost, 100 ml Blooming booster</p>', 'ஜின்னியா மலர் பார்ப்பதற்கு அழகாக இருக்கும். இது அதிக வெப்பநிலையில் தாங்கி வளர கூடியது. இந்த மலர் பல நிறங்களில் இருக்கும். இந்த மலர்&nbsp; ஹம்மிங் பறவையால் கவரப்படுகிறது.இதில் 10 ஜின்னியா செடிகள் உள்ளன.<p><br></p><p></p><p><br></p><p>3 சிவப்பு, 3 மஞ்சள் ,மற்றும் 4 ஆரஞ்சு நிற ஜின்னியா செடிகள்&nbsp;</p><p><span style=\"display: inline !important;\">தொட்டிகள்: 10\"கருப்பு நிற பிளாஸ்டிக் தொட்டி -10</span><br></p><p><span style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் : 2 kg மண்புழு உரம், 100 ml&nbsp; பிலோமிங் பூஸ்டர் தேவைப்படுகிறது.&nbsp;</span><br></p><p></p>', '', '', '0.00', 'Romantic, Red, Yellow and orange zinnia flowers', '', '', '2025.00', '2025.00', '', 0, 0, 1, '2017-10-12 17:16:30', 1, '2017-10-20 17:51:38'),
(28, 'Verbena combo plants', 'வெர்பினா சேர்க்கை தாவரங்கள்', 2, 0, 2, 4, 2, 2, '<p>Verbena has flower clusters which can be white, pink, purple, blue, and yellow in different colors. Plants are erect, growing 2m height. Plants are ideally suited for the annual garden, for the perennial flower bed, for borders and edging, and for containers. Many of the trailing varieties are excellent in hanging baskets and on garden walls. Verbena can be planted in masses for a ground cover.</p><p><br></p><p>5 Purple and 5 white flower plants</p><p>pots: 10 nos 5\" brown  colour plastic hanging pots.</p><p>Supplements: 1 kg Vermi compost</p>', 'வெர்பினா மலர் சிறியதாக இருக்கும்.இந்த மலர் பல நிறங்களில் இருக்கும். இது தொங்கும் கூடைகளில் வளர்க்கப்படுகிறது. இது வீட்டின் சுவர்களில் தொங்கும் குடை வைக்கப்படுகிறது.இது மாடி தோட்டங்களில் வளர்க்கப்படுகிறது. இந்த சேர்க்கை தாவரங்களில் 10 வெர்பினா செடிகள் வைக்கப்பட்டுள்ளது. இது கொத்து கொத்தாக பூக்கள் பூக்கும்.<p><br></p><p></p><p><br></p><p><br></p><p> 5 ஊதா, 5 வெள்ளை <span style=\"display: inline !important;\">வெர்பினா</span><span style=\"display: inline !important;\"> செடிகள்.</span></p><p><span style=\"display: inline !important;\">தொட்டிகள்: 5 \" பழுப்பு நிற தொங்கும் கூடை  -10</span><br></p><p><span style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் : 1 kg மண்புழு உரம்,  </span><br></p><p><br></p><p><br></p><p></p>', '', '', '0.00', 'purple and white colour flowers', '', '', '1225.00', '1225.00', '', 0, 0, 1, '2017-10-12 17:54:31', 1, '2017-10-20 17:55:07'),
(29, 'Portulaca combo plants', 'டேபிள்ரோஸ் சேர்க்கை தாவரங்கள்', 2, 0, 2, 4, 3, 2, '<p>Portulaca, Table rose or Moss rose is an annual with semisucculent stems and leaves very common in sunny places in India. The brightly coloured roselike flowers which are about an inch across are a visual treat when hung in baskets. They have a \'flowing out\' look with flowers at the tips of the stems. This Portulaca combo includes,</p><p><br></p><p>3 Pink, 3 red, 2 Yellow and 2 white color flower plants</p><p>Pots: 10 nos 5\" Hanging baskets</p><p>Vermi compost: 1kg Vermi compost</p>', 'டேபிள்ரோஸ் மிகவும் சிறியதாக,  ரோஜா மலரை போல் இருக்கும். இந்த மலர் பல நிறங்களில் தோற்றமளிக்கும். இது தொங்கும் கூடைகளில் வளர்க்கப்படுகிறது. இந்த சேர்க்கை தாவரங்களில் 10 டேபிள் ரோஸ் செடிகள் உள்ளன.<p><br></p><p><br></p><p></p><p>3 சிவப்பு, 2 மஞ்சள், 3  இளஞ்சிவப்பு மற்றும் 2 வெள்ளை <span style=\"display: inline !important;\">டேபிள்ரோஸ்</span><span style=\"display: inline !important;\"> செடிகள்.</span></p><p><span style=\"display: inline !important;\">தொட்டிகள்: 5 \" பழுப்பு நிற தொங்கும் கூடை  -10</span><br></p><p><span style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் : 1 kg மண்புழு உரம்.</span><br></p><p></p>', '', '', '0.00', 'Red, yellow and pink colour flowers', '', '', '1175.00', '1175.00', '', 0, 0, 1, '2017-10-12 18:37:44', 1, '2017-10-20 17:58:58'),
(30, 'Ixora combo plants', 'இட்லி பூ சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 2, 2, '<p>Get a beautiful cheerful blooming in our garden.The large flower clusters come in red, orange, yellow and pink, and it’s also known as jungle flame and flame of the woods.Ixora shrubs are known for their large corymbs of bright florets. The plant has glossy leathery leaves that are oval shaped and stiff. This Ixora combo package includes,</p><p><br></p><p>3  Dark red colour, 3  Yellow colour, 3  Pink colour, 1  White colour</p><p>Pots: 10 nos 8\"inch black colour  plastic pot.</p><p>Supplements: 1 kg Vermicompost </p>', 'இட்லி பூ மிகவும் பார்ப்பதற்கு அழகாக இருக்கும். இந்த பூ அளவில் சிறியதாக இருக்கும். இட்லி போல் இந்த பூ விரிந்திருக்கும். இது மஞ்சள்,சிவப்பு,இளஞ்சிவப்பு&nbsp; ஆரஞ்சு மற்றும் வெள்ளை நிறத்தில் இருக்கும்.இந்த சேர்க்கை தாவரங்களின் பட்டியலில் 10 இட்லி பூ செடிகள் உள்ளன.<p><br></p><p></p><p>3 சிவப்பு, 3 மஞ்சள், 3&nbsp; இளஞ்சிவப்பு மற்றும் 1 வெள்ளை&nbsp;<span style=\"display: inline !important;\">இட்லி பூ</span><span style=\"display: inline !important;\">&nbsp;</span><span style=\"display: inline !important;\">&nbsp;செடிகள்.</span></p><p><span style=\"display: inline !important;\">தொட்டிகள்: 8\" கருப்பு நிற பிளாஸ்டிக் தொட்டிகள்&nbsp; &nbsp;-10</span><br></p><p><span style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் : 1&nbsp; kg மண்புழு உரம்.</span><br></p><p></p>', '', '', '0.00', 'Red, Pink and white ixora', '', '', '1715.00', '1715.00', '', 0, 0, 1, '2017-10-13 14:06:25', 1, '2017-10-20 18:02:14');
INSERT INTO `products` (`pid`, `product_name_english`, `product_name_tamil`, `cid`, `scid`, `supplier_id`, `plant_type`, `plant_placement`, `plant_use`, `description_english`, `description_tamil`, `short_description_english`, `short_description_tamil`, `tax`, `hashtag`, `barcode`, `sku`, `retail_price`, `sale_price`, `shortname`, `status`, `trending`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(31, 'Lantana camara combo plants', 'லண்டனா கமரா சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 3, 2, '<p>Lantana camara has small tubular shaped flowers which each have four petals and are arranged in clusters in terminal areas stems. Flowers come in many different colours including red, yellow, white, pink and orange.The small flowers are held in clusters (called umbels). This Lantana camara combo package includes,</p><p><br></p><p>3 Yellow colour, 3 pink colour, 2 red colour and 2 white colour flowers.</p><p>Pots: 10 nos 8\" black colour plastic pot.</p><p>Supplements: 1 kg Vermi compost </p><p><br></p>', 'லண்டனா கமரா மலர்கள் சிறியதாக இருக்கும்.இந்த மலர்கள் கொத்து கொத்தாய் பூக்கும்.இந்த மலர்கள் ஆரஞ்சு,சிவப்பு, மஞ்சள், இளஞ்சிவப்பு மற்றும் வெள்ளை நிறங்களில் காட்சியளிக்கும். இது மாடி தோட்டங்களில் வளர்க்கப்படுகிறது.இந்த சேர்க்கை தாவரங்களின் பட்டியலில் 10&nbsp; லண்டனா கமரா செடிகள் உள்ளன.<p><br></p><p></p><p><br></p><p>2 சிவப்பு, 3 மஞ்சள், 3&nbsp; இளஞ்சிவப்பு மற்றும் 2 வெள்ளை&nbsp;<span style=\"display: inline !important;\">லண்டனா கமரா</span><span style=\"display: inline !important;\">&nbsp;&nbsp;செடிகள்.&nbsp;</span></p><p><span style=\"display: inline !important;\">தொட்டிகள்: 8 \" கருப்பு நிற பிளாஸ்டிக் தொட்டிகள்&nbsp; &nbsp;-10</span><br></p><p><span style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் : 1 kg&nbsp;மண்புழு உரம்</span><br></p><p></p>', '', '', '0.00', 'Red, Pink and white colour lantana camara plants', '', '', '1715.00', '1715.00', '', 0, 0, 1, '2017-10-13 15:08:19', 1, '2017-10-20 18:04:14'),
(32, 'Euphorbia milli combo plants', 'யூபோர்பியா மில்லி  சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 3, 2, '<p>Euphorbia milli is commonly called as Crown of thorns.The flowers are small, subtended by a pair of conspicuous petal-like bracts, variably red, pink or white colour.The leaves are found mainly on new growth and are obovate. This Euphorbia milli combo package includes,</p><p><br></p><p>4 Red colour, 4 pink colour and 2 white colour flowers.</p><p>Pots: 10 nos 8\" black colour plastic pot.</p><p>Supplements: 1 kg Vermi compost</p><p><br></p>', 'யூபோர்பியா மில்லி மலர்கள் சிவப்பு, இளஞ்சிவப்பு மற்றும் வெள்ளை நிறங்களில் இருக்கும்.இந்த செடியில் முட்கள் இருக்கும். இந்த செடி முட்களின் தாவரம் என்று அழைக்கப்படுகிறது. இந்த சேர்க்கை தாவரங்களின் பட்டியலில், யூபோர்பியா மில்லி செடிகள் உள்ளன.<p><br></p><p></p><p><br></p><p>4சிவப்பு, 4  இளஞ்சிவப்பு மற்றும் 2 வெள்ளை <span style=\"display: inline !important;\">யூபோர்பியா மில்லி</span><span style=\"display: inline !important;\"> செடிகள்.</span></p><p><span style=\"display: inline !important;\">தொட்டிகள்: 8\" கருப்பு நிற பிளாஸ்டிக் தொட்டிகள்   -10</span><br></p><p><span style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் : 1 kg மண்புழு உரம்</span><br></p><p></p>', '', '', '0.00', 'Red, pink colour euphorbia milli flowers', '', '', '1745.00', '1745.00', '', 0, 0, 1, '2017-10-13 15:26:32', 1, '2017-10-20 18:06:18'),
(33, 'Medicinal Tower', 'மருத்துவ சேர்க்கை தாவரங்கள்', 4, 0, 2, 1, 3, 1, '<p>The Health tower package consists of 18 plants of selected 6 species of plants which are proven to be aiding different aspects in maitaining a good health. Using the tower means that growing all these 18 plants uses less than 4 sq.ft of your floor space. The Health tower package includes</p><p><br></p><p>18 plant saplings( 3 Thulasi, 3 Menthal, 3 Karpuravalli, 3 Basil, 3 Vinca rose and 3 aloe vera)</p><p>&nbsp;Pots:4 Feet tall tower</p><p>Supplements: 2 kg Vermi compost,&nbsp;</p>', 'மருத்துவ சேர்க்கை தாவரங்கள் மிகவும் பயனுள்ள தாவரங்கள்.இவைகள் உடலுக்கு நன்மையை ஏற்படுத்துகின்றன.இந்த சேர்க்கை தாவரங்களின் பட்டியலில் மருத்துவ செடிகள் உள்ளன. இந்த வகையான தொட்டிகள், குறைந்த இடத்தை ஆக்கிரமிக்கும்.<p><br></p><p></p><p><br></p><p>18 மருத்துவ தாவரங்கள்: 3 துளசி,3 புதினா, 3 கற்பூரவள்ளி, 3 பேசில், 3 நித்ய கல்யாணி மற்றும் 3 கற்றாழை&nbsp;</p><p><span style=\"display: inline !important;\">தொட்டிகள்: 4 அடி ,அடுக்கு தொட்டிகள் (பிளாஸ்டிக்)&nbsp;</span><br></p><p></p><p></p><p><span style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் : 2 kg மண்புழு உரம்.</span><br></p><p></p>', '', '', '0.00', '', '', '', '2730.00', '2730.00', '', 0, 0, 1, '2017-10-13 16:39:03', 1, '2017-10-20 14:24:08'),
(34, 'Ornamental tower', 'அலங்கார சேர்க்கை தாவரங்கள்', 4, 0, 2, 2, 2, 2, '<p>Get a attractive green foliage tower consists of growing 18 plants having&nbsp;</p><p>6 different foliage plants (3 each plants of different varieties). Using the tower means that growing all these 18 plants uses less than 4 sq.ft of your floor space. The Ornamental tower package consists,</p><p><br></p><p>18 plant ornamental saplings(3 Crotens, 3 Calatheya,&nbsp; 3 Succulents, 3 Acalypha, 3 Coleus, 3 Syngonium)</p><p><b>Pots</b>: 4 Feet tall tower ( 6 stackable pots)</p><p><b>Supplements</b>: 2 kg Vermi compost,&nbsp;</p>', 'அலங்கார சேர்க்கை தாவரங்கள் அழகாகவும்,பசுமையாகவும் உள்ளது. இந்த வகையான தொட்டிகள், குறைந்த இடத்தை ஆக்கிரமிக்கும்.இந்த சேர்க்கை தாவரங்களின் பட்டியலில் 18 அலங்கார செடிகள் உள்ளன.<p><br></p><p><br></p><p>18&nbsp;<span style=\"display: inline !important;\">அலங்கார</span><span style=\"display: inline !important;\">&nbsp;</span><span style=\"outline: 0px; display: inline !important;\">தாவரங்கள்</span><span style=\"display: inline !important;\">&nbsp;:</span><span style=\"display: inline !important;\">&nbsp;3 குரோட்டன்ஸ், 3 கேலத்தியா, 3&nbsp; சதை பற்றுள்ள தாவரம், 3&nbsp; அகாலிபா, 3 கோலியஸ், 3 சிங்கோனியம்&nbsp;</span></p><p></p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">தொட்டிகள்</b></span>: 4அடி அடுக்கு தொட்டிகள்</p><p></p><p><b>வளர்ச்சி ஊக்கிகள்</b> : 2 kg மண்புழு உரம்<br></p><p><br></p>', '', '', '0.00', '', '', '', '2760.00', '2760.00', '', 0, 0, 1, '2017-10-13 17:07:13', 1, '2017-10-24 12:18:55'),
(35, 'Flower tower', 'பூக்களின் சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 2, 2, '<p>Our flower tower gives you the comfort of growing 18 plants having 6 different kinds of flowers [3 each plants of 6 different species]. And all of this fits into less than 4 sqft. of space. The flower tower package includes</p><p><br></p><p>18 plant saplings (3 Lantana camara, 3 Euphorbia milli, 3 Verbena,3 Portulaca, 3 Wedalia , 3 Dwarf ixora, 4 Adenium)</p><p><b>Pots</b>:4 Feet tall tower (6 stackable pots)</p><p><b>Supplements:</b> 2 kg Vermi compost,&nbsp;</p>', 'இந்த பூக்கள் தாவரங்கள் பார்ப்பதற்கு அழகாக உள்ளது.இந்த தொட்டிகளை பார்ப்பதற்கு பூக்கள் கோபுரம் போல் உள்ளது.இதில்&nbsp; 18 அடுக்கு தொட்டிகள் உள்ளன. 6 வகையான பூக்கள் செடிகள் உள்ளன.&nbsp;<p><br></p><p><br></p><p><br></p><p>18 பூக்களின் சேர்க்கை தாவரங்கள்: 3 லண்டனா கமரா, 3&nbsp; யூபோர்பியா மில்லி, 3&nbsp; வெர்பின்னா, 3 டேபிள் ரோஸ், 3 குட்டை இட்லி பூ ,&nbsp; 3அடினியம்&nbsp;<br></p><p></p><p><b>தொட்டிகள்</b>: 4அடி அடுக்கு தொட்டிகள்</p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள் </b>: 2 kg மண்புழு உரம்&nbsp;</span><br></p><p><br></p><p></p>', '', '', '0.00', '', '', '', '2835.00', '2835.00', '', 0, 0, 1, '2017-10-13 18:27:17', 1, '2017-10-20 18:57:02'),
(36, 'Hanging basket combo plants', 'தொங்கும் கூடை சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 3, 2, '<p>The hanging basket combo is a tailored garden for balcony, veranda and small outdoor areas having space constraints. The flowers and foliage in these baskets give a good color and also have a \'falling\' look. The baskets have a plate to collect excess water and can be easily hung using hooks. This hanging baskets combo includes,</p><p><br></p><p>3 Verbena plants, 3 Asparagus and 4 Portulaca plants</p><p><b>Pots</b>:&nbsp; 10 nos 5\" brown hanging baskets</p><p><b>Supplements:&nbsp;</b> 1 kg Vermicompost</p>', 'தொங்கும் கூடை பால்கனி, தாழ்வாரம் மற்றும் வீட்டின் வெளிப்புற பகுதிகளில் தொங்க விடலாம். இதில் அழகான மலர்கள் மற்றும் அழகு தாவரங்களை வளர்க்கலாம். அதிகமான தண்ணீரை வெளியேற்ற பிளாஸ்டிக் தட்டு பயன்படுத்தப்படுகிறது.&nbsp;<p><br></p><p></p><p><br></p><p>3 வெர்பினா, 3 அஸ்பாரகஸ் மற்றும் 4 டேபிள் ரோஜா&nbsp;</p><p>தொட்டிகள்: 5\" பழுப்பு நிற தொங்கும் கூடை&nbsp; &nbsp; -&nbsp; &nbsp;10</p><p>வளர்ச்சி ஊக்கிகள்:&nbsp; 1 kg மண்புழு உரம்&nbsp;</p><p><br></p><p><br></p><p></p>', '', '', '0.00', '', '', '', '1150.00', '1150.00', '', 0, 0, 1, '2017-10-20 13:16:14', 1, '2017-10-20 15:30:15'),
(37, 'Hibiscus combo plants', 'செம்பருத்தி சேர்க்கை தாவரங்கள்', 4, 0, 2, 4, 2, 2, '<p>Hibiscus are large shrubs or small trees that produce huge, colorful, trumpet-shaped flowers over a long season. The flowers are large, conspicuous, , with five or more petals, color from white to pink, red, orange, peach,yellow or purple, and from 4–18 cm broad. This Hibiscus combo includes,</p><p><br></p><p>3 pink, 3 yellow, 2 white and 2 red colour flower hibiscus plants.</p><p><b>Pots: </b>10 nos 12\"  Black colour plastic pots</p><p><b>Supplements:</b>  2 kg Vermicompost, 1 lt Panchakavya.</p><p><br></p>', '<p>செம்பருத்தி மலர் பார்ப்பதற்கு அழகாக இருக்கும். இந்த மலர் அளவில் பெரியதாக இருக்கும். இந்த மலர் வண்ணத்து பூச்சிகளால் கவரப்படுகிறது. இது மரம் போல் வளர கூடியது. இந்த மலர் பலவிதமான நிறங்களில் தோற்றமளிக்கும்.இந்த சேர்க்கை தாவரங்களில் செம்பருத்தி செடிகள் உள்ளன.</p><p><br></p><p><br></p><p>3  இளஞ்சிவப்பு, 3 மஞ்சள், 2 வெள்ளை மற்றும் 2 சிவப்பு,  செம்பருத்தி செடிகள்.</p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">தொட்டிகள்</b>: 12\" கருப்பு நிற பிளாஸ்டிக் தொட்டி -10</span><br></p><p><span style=\"display: inline !important;\"><b style=\"display: inline !important;\">வளர்ச்சி ஊக்கிகள்</b> : 2kg மண்புழு உரம்,  1 lt பஞ்ச காவ்யா,</span><br></p>', '', '', '0.00', 'Romantic, pink, yellow and red colour hibiscus plants', '', '', '0.00', '0.00', '', 0, 0, 1, '2017-10-21 12:27:33', 1, '2017-10-21 16:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `pid` int(11) NOT NULL,
  `image_1` varchar(100) NOT NULL,
  `image_2` varchar(100) NOT NULL,
  `image_3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`pid`, `image_1`, `image_2`, `image_3`) VALUES
(1, 'mychedi_15039025837439059386.jpg', '', ''),
(2, 'mychedi_15070069317593489823.jpg', '', ''),
(3, 'mychedi_15071079135845734104.jpg', 'mychedi_15071079134999292985.JPG', 'mychedi_15071079135835928951.jpg'),
(4, 'mychedi_15071092144350054631.jpg', 'mychedi_15071092147972712482.jpg', ''),
(5, 'mychedi_15071095167766489994.jpg', 'mychedi_15071095163749356612.jpg', 'mychedi_15071095165792281194.jpg'),
(6, 'mychedi_15071097672891249482.jpg', 'mychedi_15071097679636324405.jpg', 'mychedi_15071097679960943582.jpg'),
(7, 'mychedi_15071099368892596816.jpg', 'mychedi_15071099363302113600.jpg', 'mychedi_15071099366654670614.jpg'),
(8, 'mychedi_15071101641758669224.jpg', 'mychedi_15071101641516332986.jpg', 'mychedi_15071101641674095141.jpg'),
(9, 'mychedi_15071104595571426119.jpg', 'mychedi_15071104593892121038.jpg', 'mychedi_15071104598413547202.jpg'),
(10, 'mychedi_15071106064756791603.jpg', 'mychedi_15071106064136548421.jpg', 'mychedi_15071106065111656524.jpg'),
(11, 'mychedi_15071109816595339698.jpg', 'mychedi_15071109815654329344.jpg', 'mychedi_15071109816695341797.jpg'),
(12, 'mychedi_15071111626589286549.jpg', 'mychedi_15071111629801180282.jpg', 'mychedi_15071111628139494361.jpg'),
(13, 'mychedi_15071113405506562341.jpg', 'mychedi_15071113406648627465.jpg', 'mychedi_15071113405905330162.jpg'),
(14, 'mychedi_15071115902960585550.jpg', 'mychedi_15071115909591370932.jpg', 'mychedi_15071115902418863302.jpg'),
(15, 'mychedi_15071887896645519706.jpg', 'mychedi_15071117575867470411.jpg', 'mychedi_15071117577699445071.jpeg'),
(16, 'mychedi_15071120249650081562.jpg', 'mychedi_15071120243809217814.JPG', 'mychedi_15071120245610426443.jpg'),
(17, 'mychedi_15071121966581052256.jpg', 'mychedi_15071121968092259743.jpg', 'mychedi_15071121961108710585.JPG'),
(18, 'mychedi_15071124913986069988.jpg', 'mychedi_15071124914495365346.jpg', 'mychedi_15071124919306792652.jpg'),
(19, 'mychedi_15071126704604032024.jpg', 'mychedi_15071126706664575766.jpg', 'mychedi_15071126705609375871.jpg'),
(20, 'mychedi_15071128298153161517.jpg', 'mychedi_15071128298354736573.jpg', 'mychedi_15071128293366447092.jpg'),
(21, 'mychedi_15071129649184268818.jpg', 'mychedi_15071129644398074679.jpg', 'mychedi_15071129648941412293.jpg'),
(22, 'mychedi_15071131049841751465.jpg', 'mychedi_15071131043970121686.JPG', 'mychedi_15071131044791319637.jpg'),
(23, 'mychedi_15071931172154354244.jpg', 'mychedi_15071931175242083844.jpg', ''),
(24, 'mychedi_15077989443287966107.jpg', 'mychedi_15077989447545615221.jpg', 'mychedi_15077989448272984047.jpg'),
(25, 'mychedi_15077997206183362528.png', 'mychedi_15077997201190037075.jpg', ''),
(26, 'mychedi_15078009248366626441.jpg', 'mychedi_15078009243676518171.jpg', 'mychedi_15078009245680467373.jpg'),
(27, 'mychedi_15078033909265862267.jpg', 'mychedi_15078033903774559158.jpg', 'mychedi_15078033904411538476.jpg'),
(28, 'mychedi_15078056711803370658.jpg', 'mychedi_15078056711110417283.jpg', ''),
(29, 'mychedi_15078082648252880556.jpg', 'mychedi_15078082644723823510.jpg', 'mychedi_15078082656491517509.jpg'),
(30, 'mychedi_15078807596954881490.jpg', 'mychedi_15078807598053294067.jpg', 'mychedi_15078807598068686560.jpg'),
(31, 'mychedi_15078820991422695350.jpg', 'mychedi_15078820999923655219.jpg', 'mychedi_15078820999112086533.JPG'),
(32, 'mychedi_15078831928751661682.jpg', 'mychedi_15078831925037710178.jpg', 'mychedi_15078831926972169449.jpg'),
(33, 'mychedi_15078875434914458501.jpg', 'mychedi_15078875433284029948.jpg', 'mychedi_15078875439118686008.jpg'),
(34, 'mychedi_15078892334225847383.jpeg', 'mychedi_15078892331729225987.jpg', 'mychedi_15078892333681422060.jpg'),
(35, 'mychedi_15078940373937177247.jpg', 'mychedi_15078940373719363508.jpg', 'mychedi_15078940372048013639.png'),
(36, 'mychedi_15084801741863234873.jpg', 'mychedi_15084801746304794792.jpg', 'mychedi_15084801749492150970.jpg'),
(37, 'mychedi_15085636538088159831.jpg', 'mychedi_15085636536512116586.jpg', 'mychedi_15085636532389290763.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_quantity`
--

CREATE TABLE `product_quantity` (
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `supplier` int(11) NOT NULL,
  `type` enum('A','R') NOT NULL COMMENT 'A-Add,R-Remove',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_quantity`
--

INSERT INTO `product_quantity` (`pid`, `quantity`, `purchase_price`, `supplier`, `type`, `createdTime`) VALUES
(1, 100, '80.00', 1, 'A', '2017-08-28 03:13:03'),
(1, 100, '0.00', 1, 'A', '2017-09-08 03:32:29'),
(1, 100, '0.00', 1, 'A', '2017-09-08 03:33:22'),
(1, 1, '0.00', 0, 'R', '2017-09-13 02:07:50'),
(1, 1, '0.00', 0, 'R', '2017-09-15 03:37:36'),
(1, 1, '0.00', 0, 'R', '2017-09-15 06:32:35'),
(2, 100, '0.00', 1, 'A', '2017-10-03 01:32:11'),
(2, 100, '0.00', 1, 'A', '2017-10-03 02:08:07'),
(2, 200, '0.00', 1, 'A', '2017-10-03 02:08:47'),
(3, 100, '0.00', 1, 'A', '2017-10-04 05:35:13'),
(4, 100, '0.00', 1, 'A', '2017-10-04 05:55:23'),
(5, 100, '0.00', 1, 'A', '2017-10-04 06:01:56'),
(6, 100, '0.00', 1, 'A', '2017-10-04 06:06:07'),
(7, 100, '0.00', 1, 'A', '2017-10-04 06:08:56'),
(8, 100, '0.00', 1, 'A', '2017-10-04 06:12:44'),
(9, 100, '0.00', 1, 'A', '2017-10-04 06:17:39'),
(10, 100, '0.00', 1, 'A', '2017-10-04 06:20:06'),
(11, 100, '0.00', 1, 'A', '2017-10-04 06:26:21'),
(12, 100, '0.00', 1, 'A', '2017-10-04 06:29:22'),
(13, 100, '0.00', 1, 'A', '2017-10-04 06:32:20'),
(14, 100, '0.00', 1, 'A', '2017-10-04 06:36:30'),
(15, 100, '0.00', 1, 'A', '2017-10-04 06:39:17'),
(16, 100, '0.00', 1, 'A', '2017-10-04 06:43:44'),
(17, 100, '0.00', 1, 'A', '2017-10-04 06:46:36'),
(18, 5, '0.00', 1, 'A', '2017-10-04 06:51:30'),
(19, 100, '0.00', 1, 'A', '2017-10-04 06:54:30'),
(20, 100, '0.00', 1, 'A', '2017-10-04 06:57:09'),
(21, 100, '0.00', 1, 'A', '2017-10-04 06:59:24'),
(22, 100, '0.00', 1, 'A', '2017-10-04 07:01:44'),
(4, 1, '0.00', 0, 'R', '2017-10-05 14:02:09'),
(8, 1, '0.00', 0, 'R', '2017-10-05 14:02:09'),
(11, 1, '0.00', 0, 'R', '2017-10-05 14:06:37'),
(23, 50, '0.00', 1, 'A', '2017-10-05 15:36:24'),
(24, 50, '0.00', 1, 'A', '2017-10-10 16:12:53'),
(25, 50, '0.00', 1, 'A', '2017-10-10 16:23:50'),
(26, 50, '0.00', 2, 'A', '2017-10-12 16:35:24'),
(27, 50, '0.00', 2, 'A', '2017-10-12 17:16:30'),
(28, 50, '0.00', 2, 'A', '2017-10-12 17:54:31'),
(29, 50, '0.00', 2, 'A', '2017-10-12 18:37:44'),
(30, 50, '0.00', 2, 'A', '2017-10-13 14:06:25'),
(31, 50, '0.00', 2, 'A', '2017-10-13 15:08:19'),
(32, 50, '0.00', 2, 'A', '2017-10-13 15:26:32'),
(33, 50, '0.00', 2, 'A', '2017-10-13 16:39:03'),
(34, 50, '0.00', 2, 'A', '2017-10-13 17:07:13'),
(35, 50, '0.00', 2, 'A', '2017-10-13 18:27:17'),
(36, 50, '0.00', 2, 'A', '2017-10-20 13:16:14'),
(37, 50, '0.00', 2, 'A', '2017-10-21 12:27:33'),
(14, 1, '0.00', 0, 'R', '2017-11-16 12:34:55'),
(3, 1, '0.00', 0, 'R', '2017-11-16 13:09:16'),
(8, 1, '0.00', 0, 'R', '2017-11-16 15:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `scid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subcategory_name_english` varchar(200) CHARACTER SET utf8 NOT NULL,
  `subcategory_name_tamil` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` int(11) NOT NULL DEFAULT '0',
  `modifiedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`scid`, `cid`, `subcategory_name_english`, `subcategory_name_tamil`, `image`, `status`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(1, 1, 'Fruits', 'பழங்கள் ', 'mychedi_15070058764353816635.jpg', 0, 1, '2017-08-28 01:30:07', 1, '2017-10-03 01:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` int(11) NOT NULL DEFAULT '0',
  `modifiedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sid`, `name`, `address`, `city`, `phone`, `status`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(1, 'Addobyte', '', '', '', 0, 1, '2017-08-28 01:51:22', 0, '0000-00-00 00:00:00'),
(2, 'ECR nursery,muttukadu', 'ECR', 'CHENNAI', '', 0, 1, '2017-10-10 16:40:07', 0, '0000-00-00 00:00:00'),
(3, 'ravi', 'anna nagar', 'chennai', '1234567789', 2, 1, '2017-11-06 14:31:33', 1, '2017-11-06 15:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modifiedBy` int(11) NOT NULL DEFAULT '0',
  `modifiedTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `type`, `status`, `createdBy`, `createdTime`, `modifiedBy`, `modifiedTime`) VALUES
(1, 'superadmin', '084e0343a0486ff05530df6c705c8bb4', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `bulksms`
--
ALTER TABLE `bulksms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `delivery_city`
--
ALTER TABLE `delivery_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `delivery_settings`
--
ALTER TABLE `delivery_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_time`
--
ALTER TABLE `delivery_time`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `garden`
--
ALTER TABLE `garden`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `loyalty_settings`
--
ALTER TABLE `loyalty_settings`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `plant_placements`
--
ALTER TABLE `plant_placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant_types`
--
ALTER TABLE `plant_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `plant_use`
--
ALTER TABLE `plant_use`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bulksms`
--
ALTER TABLE `bulksms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `delivery_city`
--
ALTER TABLE `delivery_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `delivery_settings`
--
ALTER TABLE `delivery_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `delivery_time`
--
ALTER TABLE `delivery_time`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `garden`
--
ALTER TABLE `garden`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loyalty_settings`
--
ALTER TABLE `loyalty_settings`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `plant_placements`
--
ALTER TABLE `plant_placements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `plant_types`
--
ALTER TABLE `plant_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `plant_use`
--
ALTER TABLE `plant_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
