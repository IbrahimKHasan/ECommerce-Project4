-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 02:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL,
  `admin_date_create` date DEFAULT NULL,
  `admin_last_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_date_create`, `admin_last_login`) VALUES
(10, 'haneen omar ayasrah', 'haneen.alayasrah@gmail.com', '159357', NULL, '2021-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `cat_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`) VALUES
(1, 'COVID Testing Kits', '7154corona.jpg'),
(2, 'Quit Smoking', '2260smoking.jpg'),
(3, 'Face Coverings & Masks', '1829mask.jpg'),
(4, 'children Health', '3947kids.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_statment` varchar(255) DEFAULT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(60) NOT NULL,
  `coupon_percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `history_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `user_id`, `item_id`, `history_date`) VALUES
(1, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_image` text DEFAULT NULL,
  `item_title` varchar(50) DEFAULT NULL,
  `item_desc` varchar(1000) DEFAULT NULL,
  `item_price` varchar(50) DEFAULT NULL,
  `cat_id` varchar(50) DEFAULT NULL,
  `item_rate` varchar(50) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_date` date NOT NULL,
  `price_offer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_image`, `item_title`, `item_desc`, `item_price`, `cat_id`, `item_rate`, `comment_id`, `user_id`, `item_date`, `price_offer`) VALUES
(1, 'BinaxNOW', 'IMG-1413binax.jpeg', 'BinaxNOW COVID‐19 Antigen Self Test (2 Count)', 'Product details\r\n\r\nBinaxNOW COVID-19 Antigen Self Test (2 Tests): A simple solution for COVID-19 infection detection, with rapid results in the convenience of your home. This test has received FDA Emergency Use Authorization for self-testing without the need to ship samples to a lab or for a prescription from your healthcare provider. This 15-minute test can be completed anytime, anywhere. This test does NOT meet the CDC testing requirements to enter the U.S. when returning from a trip abroad.', '14', '1', NULL, NULL, NULL, '2021-12-03', 10),
(2, 'OraSure', 'IMG-1340orasure.jpeg', 'InteliSwab™ COVID-19 Rapid Antigen Test, For resul', 'Meet InteliSwab, the COVID-19 rapid antigen test that makes self-testing remarkably simple. It’s so user-friendly, it can be used anytime and anywhere, and requires less than one minute of hands-on time. InteliSwab has received FDA Emergency Use Authorization* for self-testing. You do not need to ship samples to a lab or get a prescription from your healthcare provider. This easy to use self-test requires just 3 key steps: Swab, Swirl and See your result in 30 minutes. There is no assembly required. InteliSwab makes testing so easy, you’ll know you did it right.', '14', '1', NULL, NULL, NULL, '2021-12-03', 10),
(3, 'ELLUME', 'IMG-1351ellume.jpeg', 'Ellume COVID Test Kit, At Home COVID-19 Home Test ', 'TESTS FOR CURRENT AND NEW COVID VARIANTS. The Ellume COVID-19 Home Test targets a protein deep in the virus (the nucleocapsid protein), which remains largely unchanged in the latest SARS-CoV-2 virus variants. Ellume has an ongoing program to test new variants as they appear.', '26', '1', NULL, NULL, NULL, '2021-12-03', 20),
(4, 'myLab', 'IMG-1482mylab.jpeg', 'COVID-19 At-Home Test Kit, Saliva Sample, EXPRESS ', 'Your test kit(s) will be delivered after you complete the health screening survey and account set up to receive a lab order on the myLAB Box website. Your test kit(s) will be shipped next day for all accounts completed by 11:00 AM CST Monday - Thursday (AK and HI are second day shipping where Next Day is not available). Accounts completed after 11:00 AM CST on Friday or Saturday, will deliver on Monday. Accounts completed after 11:00 AM CST on Sunday, will deliver Tuesday.', '177', '1', NULL, NULL, NULL, '2021-12-03', 160),
(5, 'DxTerity', 'IMG-1752dx.jpeg', 'DxTerity SARS-CoV-2 RT PCR CE Test - COVID-19 Sali', 'This test was developed, its performance characteristics determined, and testing performed by DxTerity Diagnostics Inc. located at 19500 S. Rancho Way, Suite 116, Rancho Dominguez, CA 90220, regulated under the Clinical Laboratory Improvement Amendments of 1988 (CLIA), 42U.S.C. as qualified to perform high complexity clinical testing. This test has not been FDA cleared or approved. This test has been authorized by FDA under an Emergency Use Authorization (EUA) for use by DxTerity Diagnostics, Inc. This test has been authorized only for the qualitative detection of nucleic acid from SARS-CoV-2 virus that causes COVID-19, not for any other viruses or pathogens. This test is only authorized for the duration of the declaration that circumstances exist justifying the authorization of emergency use of in vitro diagnostics for detection and/or diagnosis of COVID-19 under Section 564(b)(1) of the Act, 21 U.S.C. § 360bbb-3(b)(1), unless the authorization is terminated or revoked sooner. Results', '100', '1', NULL, NULL, NULL, '2021-12-03', 80),
(6, 'Zarbee\'s', 'IMG-1369zarbees.jpeg', 'Zarbees Naturals Childrens Sleep Gummies with Mela', 'Zarbe\'s Naturals Childrens Sleep Gummies help safely and effectively remedy your childs occasional sleeplessness without next day grogginess. This drug-free, alcohol-free gummy features melatonin, which is non-habit forming. Check out our whole line of products made of handpicked wholesome ingredients, and without any drugs, alcohol, or artificial flavors. *These statements have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure, or prevent any disease.', '10', '4', NULL, NULL, NULL, '2021-12-04', 0),
(7, 'Zarbee\'s', 'IMG-1668zarbes.jpeg', 'Zarbee\'s Naturals Children\'s Sleep with Melatonin,', 'Zarbee\'s Naturals Children\'s Melatonin 1mg is a drug-free, alcohol-free supplement for occasional sleeplessness in children ages 3 and up. Our natural kids supplement helps promote restful sleep* without next day grogginess. Melatonin is a hormone the brain produces to help regulate sleep & wake cycles. Safe for occasional sleeplessness in children, Melatonin is non-habit forming and will help gently guide your child to sleep. We’ll BEE there! Check out our whole line of products made of handpicked wholesome ingredients. *These statements have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure, or prevent any disease.', '7', '4', NULL, NULL, NULL, '2021-12-04', 0),
(8, 'Pepto', 'IMG-1495pepto.jpeg', 'Pepto Kid\'s Chewable Tablets for Upset Stomach Bub', 'Pepto Kid\'s Antacid. When your child has stomach troubles, Pepto Kid\'s relieves heartburn, acid indigestion, sour stomach and upset stomach. Need big relief for your kids\' little tummies? Reach for Kid\'s Antacid Chewable Tablets Easy to take with a great bubblegum taste.', '5', '4', NULL, NULL, NULL, '2021-12-04', 0),
(9, 'Spring Valley', 'IMG-1074spring.jpeg', 'Spring Valley Kids\' Probiotic + Prebiotic Vegetari', 'Spring Valley Kids\' Probiotic + Prebiotic Vegetarian Gummies, 60 Count are the simplest, best-tasting way to promote your little one’s digestive health and support a healthy immune system. With flavors like peach, strawberry, and mixed berry. Our delicious and easy to chew gummies make taking your daily probiotic a joy', '8', '4', NULL, NULL, NULL, '2021-12-04', 0),
(10, 'Equate', 'IMG-1996equate.jpeg', 'Equate Children\'s Cold and Cough, Red Grape Flavor', 'Compare to Children\'s Dimetapp Cold and Cough active ingredients. Equate Children\'s Cold and Cough, red grape flavor, relieves cold and allergy symptoms such as nasal congestion, runny nose, sneezing, coughing and itchy, watery eyes; calm allergy symptoms and temporarily restores freer breathing through the nose', '8', '4', NULL, NULL, NULL, '2021-12-04', 0),
(11, 'Necano', 'IMG-1544maskitem.png', '100Pcs black Disposable Face Mask(General Use)', '3-layers of Protection: Made with three layers of soft non-woven polypropylenes that prevent the inhalation or exhalation of respiratory droplets. 3-layers of Protection: Made with three layers of soft non-woven polypropylenes that prevent the inhalation or exhalation of respiratory droplets. ', '18', '3', NULL, NULL, NULL, '2021-12-04', 14),
(12, 'McSimon', 'IMG-1041mc.png', '150 Disposable Face Masks, 3-ply Breathable Masks,', 'Multi-layer 3-ply disposable procedural face mask. Pleated Pliable nose piece for best fit.100% Fiberglass free 3 PLY Non woven material Latex FreeShips from the US', '20', '3', NULL, NULL, NULL, '2021-12-04', 14),
(13, 'Kingfa', 'IMG-1836kingfa.jpeg', 'KN 95 Face Mask 5 Ply, 20 ct', 'These disposable 5 Ply Face Masks feature five layers that include PP spun-bonded and cotton non-woven fabric and melt-blown non-woven fabric. Breathable and comfortable to wear, the face masks have an adjustable nose clip for a secure fit and high strength elasticity ear loops that won’t irritate the ears', '15', '3', NULL, NULL, NULL, '2021-12-04', 0),
(14, 'Purian', 'IMG-1630purlan.jpeg', 'Neck Gaiter Half Face Mask Non Slip Ultra Breathab', 'Purian neck gaiters are manufactured in North America using a 92% Modal 8% Spandex blend. We chose premium Modal fabric due to it\'s durability and comfort in hot and warmer summer weather. It is also thick enough to be used in cold weather for those that like to ski or snowboard', '9', '3', NULL, NULL, NULL, '2021-12-04', 0),
(15, 'Necano', 'IMG-1344nekano.jpeg', 'Disposable face masks (General use) 50ct', 'These masks should be disposed of after each use.Keep the blue-side outside and the nose clip on the upper side.3-ply, with a melt-blown layer.Made in China', '10', '3', NULL, NULL, NULL, '2021-12-04', 6),
(16, 'Nicorette', 'IMG-1553nicrotte.jpeg', 'Nicorette Nicotine Gum Fruit Chill Flavor, 2 Mg, 1', 'Stop Smoking Aids With A Delicious Fruit Flavor. Nicorette Nicotine Gum to Stop Smoking is a nicotine replacement therapy that soothes cigarette cravings throughout the day. Each piece of this smoking cessation gum is formulated with therapeutic nicotine that is slowly absorbed by the body, helping you keep track of your daily nicotine intake while easing the cravings, anxiety, frustration, irritability and restlessness associated with quitting smoking.', '60', '2', NULL, NULL, NULL, '2021-12-04', 50),
(17, 'Nicorette', 'IMG-1103nicrotte2.jpeg', 'Nicorette Nicotine Lozenges to Stop Smoking, Mint ', 'Nicorette Nicotine Lozenges to Stop Smoking help you manage the triggers that link cigarettes to your daily activities. These smoking cessation lozenges release therapeutic nicotine that works to curb cravings and reduce anxiety, frustration, irritability and restlessness associated with quitting', '12', '2', NULL, NULL, NULL, '2021-12-04', 0),
(18, 'Equate', 'IMG-1804equatesm.jpeg', 'Equate Nicotine Transdermal System Clear Patches, ', 'What is the nicotine patch and how is it used?\r\nThe nicotine patch is a small, nicotine-containing patch. When you put on a nicotine patch, nicotine passes through the skin and into your body. The nicotine patch is very thin and uses special material to control how fast nicotine passes through the skin.', '16', '2', NULL, NULL, NULL, '2021-12-04', 0),
(19, 'TheraBreath', 'IMG-1131thera.jpeg', 'Thera Breath Dentist Formulated Dry Mouth Mandarin', 'TheraBreath Dentist Formulated Dry Mouth Mandarin Mint Wrapped Sugar Free Lozenges, 100 Ea.', '15', '2', NULL, NULL, NULL, '2021-12-04', 0),
(20, 'NicoDerm CQ', 'IMG-1948derm.jpeg', 'NicoDerm CQ Step 1 Extended Release Nicotine Patch', 'Step 1 NicoDerm CQ Nicotine Patches to Stop Smoking offer a low-maintenance option to help you adjust to life as a non-smoker. Made with Extended Release SmartControl Technology, these smoking cessation patches are nicotine replacement products that release a steady flow of therapeutic nicotine for 16 to 24 hours, preventing the urge to smoke and relieving the anxiety, frustration.', '40', '2', NULL, NULL, NULL, '2021-12-04', 33);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_date_create` date DEFAULT NULL,
  `user_last_login` date DEFAULT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_date_create`, `user_last_login`, `user_phone`, `user_city`) VALUES
(11, 'haneen', 'user@gmail.com', 'Aa@12345', '2021-12-04', '2021-12-05', '777758329', 'amman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
