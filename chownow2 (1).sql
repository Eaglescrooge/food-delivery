-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 11:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chownow2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `secured_password` char(32) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`, `secured_password`) VALUES
(1, 'd_jerry', 'hanky', '6f4d6a22068cc00e3aeaef907413f23f');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(35) DEFAULT NULL,
  `portion` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cart_two`
--

CREATE TABLE IF NOT EXISTS `cart_two` (
  `foodID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foodName` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `plates` int(11) DEFAULT NULL,
  `payment_type` varchar(25) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  PRIMARY KEY (`foodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(35) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `description`) VALUES
(1, 'Rice', 'Here you can see all the different types of rice we have, from fried rice, white rice, Jollof rice (this is our heritage), Designer rice (Not the Panda guy) and more. All our rice dishes have been carefully tested on various levels to ensure an awesome meal at all times. '),
(2, 'Swallow', 'We have curated our list of Nigerian Local dishes and they are great like that (I promise). Our local dishes are made with fresh veggies cos we know your body needs this and we have the best chef (awaiting his award to showcase) preparing this. Our varieties are not limited to Pounded yam, Amala, Tuwo kinchafa... Just look through and get ready to dig in.'),
(3, 'Spaghetti', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_firstname` varchar(35) NOT NULL,
  `customer_lastname` varchar(35) NOT NULL,
  `email_address` varchar(25) NOT NULL,
  `password` char(32) NOT NULL,
  `phone_number` char(11) NOT NULL,
  `billing_address` varchar(70) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_firstname`, `customer_lastname`, `email_address`, `password`, `phone_number`, `billing_address`, `city`, `state`) VALUES
(1, 'Nnamdi', 'Obiesie', 'nnamdy@yahoo.com', '1d1a3a1a2b22d1c50c516b19dbf41af0', '08062675204', '    7th Avenue, R close', 'Festac', 'Lagos'),
(2, 'Wole', 'Oguna', 'wole@yahoo.com', '7e4f3f998fc5bccdf27dff00f46a0fde', '08054565204', ' shedrak street', 'Ikota', 'Lagos'),
(3, 'Nneka', 'obi', 'nneka@yahoo.com', '6f4d6a22068cc00e3aeaef907413f23f', '08062675234', '    7th Avenue', 'Festac', 'Lagos'),
(4, 'Shedrak', 'Obingo', 'shedrak@gmailcom', '527bd5b5d689e2c32ae974c6229ff785', '08054565222', '  7th Avenue F close', 'Festac', 'Lagos');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_alias` varchar(50) NOT NULL,
  `quantity_plate` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `cat_id`, `food_name`, `food_alias`, `quantity_plate`, `price`) VALUES
(1, 1, 'White Rice', 'White Rice', 14, 250.00),
(2, 1, 'Fried Rice', 'Fried rice', 20, 250.00),
(3, 1, 'Shrimp Rice', 'Shrimp Rice', 20, 250.00),
(4, 1, 'Ofada Rice', 'Ofada Rice', 20, 250.00),
(5, 1, 'Jollof Rice', 'Jollof Rice', 20, 250.00),
(6, 2, 'Eba and Okro Soup With Titus Fish a', 'Eba & Okro', 18, 500.00),
(7, 2, 'SEMO and Nsala Soup with Goatmeat', 'swallow7', 20, 500.00),
(8, 2, 'Pounded Yam and Okro Soup With fres', 'swallow8', 20, 500.00),
(9, 3, 'Spaghetti Bolognese', 'spaghetti9', 20, 300.00),
(10, 3, 'Fried Spaghetti and lamb chops', 'spaghetti10', 20, 500.00),
(11, 3, 'Chinese Spaghetti and Drum sticks', 'spaghetti11', 20, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
  `transaction_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `Customer Name` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `Payment Type` varchar(15) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `Delivery Address` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_id`, `date_time`, `Customer Name`, `customer_id`, `food_name`, `Payment Type`, `total_amount`, `Delivery Address`) VALUES
(1, '2017-11-14 11:03:12', 'Shedrak Obingo', 4, 'White Rice', 'Webpay', 2250, ' zsdgrhrth'),
(2, '2017-11-14 11:15:33', 'Shedrak Obingo', 4, 'Eba and Okro Soup With Titus Fish a', 'Webpay', 2000, ' srysrthtrjh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
