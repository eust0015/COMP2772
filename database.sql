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
  `description` varchar(1000) NOT NULL,
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
-- ('PDT0000001', 'USB to Lightning Cable', '', 'USB to Lightning Cable.png', '45.00', '45.00', 'cable', 'usb, lightning, cable'),
-- ('PDT0000002', '10W Wireless Charging Pad', '', 'Charging Pad.png', '49.95', '49.95', 'charger', '10w, wireless, charging, pad, charger'),
-- ('PDT0000003', '5W USB Power Adapter', '', '5W USB Power Adapter.png', '29.00', '29.00', 'charger', '5w, usb, power, adapter'),
-- ('P000000004', 'Headphones', '', 'Headphones.png', '349.00', '349.00', 'headphone', 'headphone, wireless, audio'),
-- ('PDT0000005', 'Earphones', '', 'Earphones.png', '249.00', '249.00', 'earphone', 'earphone, wireless, audio'),
-- ('P000000006', 'Power Bank', '', 'Power Bank.png', '79.95', '79.95', 'power bank', 'power, bank'),
-- ('PDT0000007', 'Silicone Case', '', 'Silicone Case.png', '29.95', '29.95', 'case', 'silicone, case'),
-- ('PDT0000008', 'Leather Case', '', 'Leather Case.png', '59.00', '59.00', 'case', 'leather, case'),
-- ('PDT0000009', 'Screen Protector', '', 'Screen Protector.png', '35.00', '35.00', 'screen protector', 'screen, protector'),
-- ('PDT0000010', 'Phone Holder', '', 'Phone Holder.png', '49.00', '49.00', 'holder', 'holder'),
-- ('PDT0000011', 'Airpods Pro', '', 'appleairpodsproduct.png', '299.00', '299.00', 'earphone', 'earphone`, `earphone`, `wireless`, `audio`, `apple'),
('PDT0000001', 'BOSE QUIETCOMFORT 45 NOISE CANCELLING HEADPHONES', 'You feel it the minute you put them on. The soft, plush cushions seal you in. Then you flip the switch and whoosh—the world fades away. And the music starts. The original noise cancelling headphones are back, with better world-class quiet (plus the new Aware Mode), shockingly light materials for premium comfort and proprietary acoustic technology for deep, clear audio. Bose QuietComfort® 45 headphones—wireless headphones with the perfect balance of quiet, comfort and sound.', 'qc45.png', '499', '550.00', 'headphones', 'earphone, headphones, wireless, audio, bose'),
('PDT0000002', 'XBOX ELITE WIRELESS CONTROLLER SERIES 2', 'Experience limitless customization with new interchangeable components and exclusive button mapping options in the Xbox Accessories app. Save up to 3 custom profiles on the controller and switch between them on the fly. Swap thumbstick toppers, D-pads, and paddles to tailor your controller to your preferred gaming style. Stay in the game for longer with up to 40 hours of rechargeable battery life and re-engineered components that are built to last. Use Xbox Wireless, Bluetooth, or the included USB-C cable to play across Xbox One and Windows 10 devices.', 'xbox.png', '249', '275.00', 'gaming', 'controller, gaming, wireless, elite, xbox'),
('PDT0000003', 'SONY CYBERSHOT ZV-1 4K VLOG CAMERA (WHITE)', 'No experience is necessary to capture great looking videos. The ZV-1 is designed to capture amazing videos of you and your world, without any tricky setup.The ZV-1 is designed to bring together simplicity and power, opening up creative opportunities as wide as your imagination.There’s no longer a need to compromise your images with your smartphone camera just to share content quickly. The ZV-1 delivers both stunning images and seamless connectivity, for better and easier posting.', 'cameraimage.png', '899', '1049.00', 'cameras', 'digital, camera, white'),
('PDT0000004', 'APPLE IPHONE 12 MINI 128GB (BLACK)', 'iPhone 12 mini. Immerse yourself in the 5.4-inch Super Retina XDR display with brighter brights and lifelike colour.2 In a perfectly small size.iPhone 12 mini. With the advanced dual-camera system you can shoot beautiful, lifelike photos and videos day or night. Like magic.iPhone 12. Thinner and lighter all-screen design. Aerospace-grade aluminium band. In six fresh colours, things are looking bright.', 'mb1.png', '1079', '1079.00', 'mobile-phones', 'iPhone, mobile, phone, wireless, mini'),
('PDT0000005', 'DJI AIR 2S 4K DRONE FLY MORE COMBO', 'Featuring a 1-inch CMOS sensor, powerful autonomous functions, and a compact body weighing less than 600 g, DJI Air 2S is the ultimate drone for aerial photographers on the move. Take this all-in-one aerial powerhouse along anywhere to experience and record your world in stunning detail.', 'djdrone.png', '2099', '3050.00', 'dcgha', 'air, drone, 4k, fly, combo'),
('PDT0000006', 'APPLE TV 4K 32GB [2021] - [DOLBY ATMOS]', 'The new Apple TV 4K brings the best shows, movies, sports, and live TV— together with your favorite Apple devices and services.¹ Now with 4K High Frame Rate HDR for fluid, crisp video.² Watch Apple Originals with Apple TV+.³ Experience more ways to enjoy your TV with Apple Arcade, Apple Fitness+, and Apple Music.³ And use the new Siri Remote with touch-enabled clickpad to control it all.', 'appletv.png', '249', '249.00', 'tvs', 'tv, 4k, 32GB, remote, 2021'),
('PDT0000007', 'APPLE WATCH SERIES 3 38MM SILVER ALUMINIUM CASE GPS', 'Check your heart rate and get notifications for low and high heart rates. Measure your workouts, and track and share your activity. Take calls, send and receive messages, and play your favourite music. Apple Watch Series 3 lets you do it all from your wrist.', 'applewatch.png', '299', '299.00', 'hfw', 'watch, silver, aluminium, health, fitness'),
('PDT0000008', 'MICROSOFT SURFACE LAPTOP 4 I7 512GB/16GB (MATTE BLACK)', 'Stand out on HD video calls with Studio Mics. Capture ideas on the PixelSense™ touchscreen. Do it all with a perfect balance of sleek design, speed, immersive audio, and significantly longer battery life than before1.Do it all with a perfect balance of sleek, ultra-thin design and more speed, now up to 70% faster— with significantly longer battery life than before.', 'MicrosoftGo.png', '2549', '2600.00', 'computers', 'surface, laptop, matte, black, 512GB'),
('PDT0000009', 'THERAGUN MINI WHITE MASSAGE GUN', 'The Theragun mini is your pocket-sized partner, giving you Theragun quality muscle treatment with unparalleled portability. Compact but powerful, Theragun mini is the most agile massage device that goes wherever you do. The Theragun is used by physical therapists, trainers, chiropractors, celebrities, athletes, and over 250 professional sports teams worldwide. Developed by Dr. Jason Wersland, every aspect of the Theragun mini has been thoughtfully designed and adapted from our signature Theragun design for maximum ergonomic comfort and unparalleled portability; quick relief and relaxation that fits conveniently in your purse or backpack.', 'massageegun.png', '349', '400.00', 'hfw', 'mini, white, massage, gun, health, fitness'),
('PDT0000010', 'GOOGLE - NEST LEARNING SMART WIFI THERMOSTAT', 'Nest Thermostat automatically adjusts the temperature when you’re gone, and can turn off your hot water heater if you’re away. It also features OpenTherm technology to modulate your compatible, high‐efficiency condensing boiler. With Farsight, Nest Thermostat spots you across the room and shows you the time and temperature on a big, bright display.', 'googlenest.png', '299', '350.00', 'dcgha', 'nest, thermostat, home, appliances, stainless-steel'),

('PDT0000011', 'APPLE AIRPODS PRO [2019] - [Noise Cancellation]', 'Active Noise Cancellation for immersive sound. Transparency mode for hearing and connecting with the world around you. A more customisable fit for all-day comfort. Sweat and water resistance.1 All in an incredibly light in ear headphone that’s easy to set up with all your Apple devices.', 'airpodspro.png', '349', '400.00', 'headphones', 'nest, thermostat, home, appliances, stainless-steel'),
('PDT0000012', 'LG C1 65" OLED 4K ULTRA HD SMART TV', 'Into the wonderful: experience the next evolution of LG OLED TV. Self-lit pixels allow spectacular picture quality, a host of design possibilities and cutting-edge technologies designed to deliver everything you love about TV, elevated in every way.', 'lgoledtv.png', '3495', '3995.00', 'tvs', 'nest, thermostat, home, appliances, stainless-steel'),
('PDT0000013', 'SAMSUNG GALAXY S21 ULTRA 5G 128GB', 'Miss nothing, with Galaxy S21. When capturing your best moments, you no longer have to choose between photo and video. Galaxy S21 captures both, simultaneously, so you’ll never miss a moment. With 108MP camera and 8K video recording, capture the highest quality images and videos on a smartphone. Have the power to last with our toughest display, fastest processor and our most powerful battery yet.', 'samsungphone.png', '999', '999.00', 'mobile-phones', 'nest, thermostat, home, appliances, stainless-steel'),
('PDT0000014', 'SAMSUNG GALAXY WATCH4 44MM', 'Maintain your health and wellbeing with the premium design and functionality of the Samsung Galaxy Watch 4 BT 44mm 11901221779. Using the new Google Wear OS powered by Samsung makes your smartwatch seamlessly connect to the Google ecosystem; delivering access to a wide variety of apps and experiences such as Strava, Calm and Adidas Run. Monitor your exercise and health statistics with the Galaxy Watch 4 Classic; it can measure your current blood pressure, calculate your current BMI and perform an ECG all from your smartwatch. Perform smartphone tasks; play games and music, view your calendar, set alarms and organise your life straight from your wrist.', 'galaxywatch.png', '449', '449.00', 'hfw', 'nest, thermostat, home, appliances, stainless-steel'),
('PDT0000015', 'ECOVACS DEEBOT N8 PRO CLEANING VACUUM', 'Innovative smart cleaning meets cutting edge design in the Ecovacs DEEBOT Ozmo N8 Pro OZMO-N8-PRO advanced robotic vacuum with mop functionality. TrueDetect 3D technology uses structured light and 3D scanning algorithms to instantly detect and avoid obstacles as small as one millimetre high from a distance variation of 4.5cm up to 30cm, enabling this robot vacuum to perform an in-depth cleaning of your home without collision. Dual functionality and simultaneous functionality ensure efficient operation, allowing your Ozmo N8 Pro to vacuum and mop your hard floors simultaneously.', 'robotvacum.png', '799', '850.00', 'dcgha', 'nest, thermostat, home, appliances, stainless-steel'),
('PDT0000016', 'GOPRO HERO10 BLACK ACTION CAMERA', 'Record fast-paced, pulse-pounding video with this GoPro action cameras 1080p HD video resolution. Its 23 MP camera sensor resolution lets you say goodbye to blurry, grainy photos. The GoPro CHDHX-101-RW has a touch screen viewfinder, allowing you to get a sneak peak of the amazing footage and photos. Use the built-in connectivity with its Wi-Fi. The GoPro action camera is compatible with an SD memory card. Its good for ensuring your go-to camera survives extreme activities.', 'goprohero10.png', '699', '799.00', 'cameras', 'nest, thermostat, home, appliances, stainless-steel');





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
('PST0000001', 'Express Delivery', '12.00'),
('PST0000002', 'Standard Delivery', '9.00');

CREATE TABLE `creditCard` (
  `id` varchar(10) NOT NULL,
  `nameOnCard` varchar(255) NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `expirationMonth` varchar(2) NOT NULL,
  `expirationYear` varchar(4) NOT NULL,
  `cvc` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `creditCard` VALUES
('ccd0000001', 'Sam Sample', '0000000000000000', '01', '2100', '000');

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

INSERT INTO `address` VALUES
('add0000001', 'Sam', 'Sample', '0000000000', 'sam@sample.com', '1 Sam Street', 'SAMPLE', 'SA', '5000');

CREATE TABLE `account` (
  `id` varchar(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL, 
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL, 
  `billingAddressId` varchar(10) NULL,
  `shippingAddressId` varchar(10) NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (billingAddressId) REFERENCES address(id),
  FOREIGN KEY (shippingAddressId) REFERENCES address(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `account` VALUES
('acc0000001', 'Sam', 'Sample', 'sam@sample.com', 'password', 'add0000001', 'add0000001');

CREATE TABLE `orders` (
  `id` varchar(10) NOT NULL,
  `creditCardId` varchar(10) NOT NULL,
  `postageId` varchar(10) NOT NULL,
  `quotedPostageCost` decimal(7,2) NOT NULL,
  `billingAddressId` varchar(10) NOT NULL,
  `shippingAddressId` varchar(10) NOT NULL,
  `accountId` varchar(10) NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (creditCardId) REFERENCES creditCard(id),
  FOREIGN KEY (postageId) REFERENCES postage(id),
  FOREIGN KEY (billingAddressId) REFERENCES address(id),
  FOREIGN KEY (shippingAddressId) REFERENCES address(id),
  FOREIGN KEY (accountID) REFERENCES account(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` VALUES
('ord0000001', 'ccd0000001', 'PST0000001', 12.00, 'add0000001', 'add0000001', 'acc0000001');

CREATE TABLE `orderProduct` (
  `orderId` varchar(10) NOT NULL,
  `productId` varchar(10) NOT NULL,
  `quanity` int NOT NULL,
  `quotedProductCost` decimal(7,2) NOT NULL,
  PRIMARY KEY (`orderId`, `productId`),
  FOREIGN KEY (productId) REFERENCES product(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orderProduct` VALUES
('ord0000001', 'PDT0000001', 1, 499.00);

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
