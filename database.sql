-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 01:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp2772`
--

DROP DATABASE IF EXISTS comp2772;
CREATE DATABASE comp2772;

USE comp2772;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `recommendedRetailPrice` decimal(7,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `keyWord` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `price`, `recommendedRetailPrice`, `category`, `keyWord`) VALUES
-- ('P000000001', 'USB to Lightning Cable', '', 'USB to Lightning Cable.png', '45.00', '45.00', 'cable', 'usb, lightning, cable'),
-- ('P000000002', '10W Wireless Charging Pad', '', 'Charging Pad.png', '49.95', '49.95', 'charger', '10w, wireless, charging, pad, charger'),
-- ('P000000003', '5W USB Power Adapter', '', '5W USB Power Adapter.png', '29.00', '29.00', 'charger', '5w, usb, power, adapter'),
-- ('P000000004', 'Headphones', '', 'Headphones.png', '349.00', '349.00', 'headphone', 'headphone, wireless, audio'),
-- ('P000000005', 'Earphones', '', 'Earphones.png', '249.00', '249.00', 'earphone', 'earphone, wireless, audio'),
-- ('P000000006', 'Power Bank', '', 'Power Bank.png', '79.95', '79.95', 'power bank', 'power, bank'),
-- ('P000000007', 'Silicone Case', '', 'Silicone Case.png', '29.95', '29.95', 'case', 'silicone, case'),
-- ('P000000008', 'Leather Case', '', 'Leather Case.png', '59.00', '59.00', 'case', 'leather, case'),
-- ('P000000009', 'Screen Protector', '', 'Screen Protector.png', '35.00', '35.00', 'screen protector', 'screen, protector'),
-- ('P000000010', 'Phone Holder', '', 'Phone Holder.png', '49.00', '49.00', 'holder', 'holder'),
-- ('P000000011', 'Airpods Pro', '', 'appleairpodsproduct.png', '299.00', '299.00', 'earphone', 'earphone`, `earphone`, `wireless`, `audio`, `apple'),
('P000000001', 'Bose QuietComfort 45 Wireless Noise Cancelling Headphones', '', 'qc45.png', '499', '550.00', 'headphones', 'earphone`, `headphones`, `wireless`, `audio`, `bose'),
('P000000002', 'Xbox Elite Wireless Controller Series 2', '', 'xbox.png', '249', '275.00', 'gaming', 'controller`, `gaming`, `wireless`, `elite'),
('P000000003', 'Sony CyberShot ZV-1 4K Vlog Camera (White)', '', 'cameraimage.png', '899', '1049.00', 'cameras', 'digital`, `camera`, `white'),
('P000000004', 'Apple iPhone 12 mini 128GB (Black)', '', 'mb1.png', '1079', '1079.00', 'mobile-phones', 'iPhone`, `mobile`, `phone`, `wireless`, `mini'),
('P000000005', 'DJI Air 2S 4K Drone Fly More Combo', '', 'djdrone.png', '2099', '3050.00', 'dcgha', 'air`, `drone`, `4k`, `fly`, `combo'),
('P000000006', 'Apple TV 4K 32GB [2021] - [Dolby Atmos]', '', 'appletv.png', '249', '249.00', 'tvs', 'tv`, `4k`, `32GB`, `remote`, `2021'),
('P000000007', 'Apple Watch Series 3 38mm Silver Aluminium Case GPS', '', 'applewatch.png', '299', '299.00', 'hfw', 'watch`, `silver`, `aluminium`, `health`, `fitness'),
('P000000008', 'Microsoft Surface Laptop 4 13.5" i7 512GB/16GB (Matte Black)', '', 'MicrosoftGo.png', '2549', '2600.00', 'computers', 'surface`, `laptop`, `matte`, `black`, `512GB'),
('P000000009', 'Theragun Mini White Massage Gun', '', 'massageegun.png', '349', '400.00', 'hfw', 'mini`, `white`, `massage`, `gun`, `health`, `fitness'),
('P000000010', 'Google - Nest Learning Smart Wifi Thermostat - Stainless Steel', '', 'googlenest.png', '299', '350.00', 'dcgha', 'nest`, `thermostat`, `home`, `appliances`, `stainless-steel');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `postage` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `postage` (`id`, `name`, `cost`) VALUES
('POST001', 'Express Delivery', '12.00'),
('POST002', 'Standard Delivery', '9.00');

CREATE TABLE `creditCard` (
  `id` varchar(10) NOT NULL,
  `nameOnCard` varchar(255) NOT NULL,
  `cardNumber` varchar(255) NOT NULL,
  `expirationMonth` int NOT NULL,
  `expirationYear` int NOT NULL,
  `cvc` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `address` (
  `id` varchar(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `streetAddress` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `account` (
  `id` varchar(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL, 
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL, 
  `billingAddressId` varchar(10) NOT NULL,
  `deliveryAddressId` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (billingAddressId) REFERENCES address(id),
  FOREIGN KEY (deliveryAddressId) REFERENCES address(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `orders` (
  `id` varchar(10) NOT NULL,
  `accountId` varchar(10) NULL,
  `creditCardId` varchar(10) NOT NULL,
  `billingAddressId` varchar(10) NOT NULL,
  `deliveryAddressId` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (accountID) REFERENCES account(id),
  FOREIGN KEY (creditCardId) REFERENCES creditCard(id),
  FOREIGN KEY (billingAddressId) REFERENCES address(id),
  FOREIGN KEY (deliveryAddressId) REFERENCES address(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `orderProduct` (
  `orderId` varchar(10) NOT NULL,
  `productId` varchar(10) NOT NULL,
  `quanity` int NOT NULL,
  `quotedProductCost` decimal(7,2) NOT NULL,
  PRIMARY KEY (`orderId`, `productId`),
  FOREIGN KEY (productId) REFERENCES product(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Add User
--

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON comp2772.product TO dbadmin@localhost;
GRANT all privileges ON comp2772.postage TO dbadmin@localhost;
GRANT all privileges ON comp2772.creditCard TO dbadmin@localhost;
GRANT all privileges ON comp2772.address TO dbadmin@localhost;
GRANT all privileges ON comp2772.account TO dbadmin@localhost;
GRANT all privileges ON comp2772.orders TO dbadmin@localhost;
GRANT all privileges ON comp2772.orderProduct TO dbadmin@localhost;
