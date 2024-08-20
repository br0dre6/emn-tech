-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 09:57 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aemail` varchar(255) NOT NULL,
  `adname` varchar(255) DEFAULT NULL,
  `apassword` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `adname`, `apassword`) VALUES
('admin@edoc.com', 'Administrator', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(4, 1, 2, 1, '2023-12-13'),
(3, 1, 3, 1, '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(11) NOT NULL,
  `logo_image` text NOT NULL,
  `header_brand_name` text NOT NULL,
  `homepage_header` text NOT NULL,
  `homepage_subheader` text NOT NULL,
  `optometrist_image` text NOT NULL,
  `optometrist_name` text NOT NULL,
  `optometrist_description` text NOT NULL,
  `about_us` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `objective` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `logo_image`, `header_brand_name`, `homepage_header`, `homepage_subheader`, `optometrist_image`, `optometrist_name`, `optometrist_description`, `about_us`, `mission`, `vision`, `objective`, `address`, `contact`, `email`) VALUES
(1, '50.png', 'Header Brand Name', 'Homepage Header', 'Homepage Sub Header', '195.png', 'Dr. Jane Doe, O.D.', 'Education and Training\r\nDr. Doe earned her Doctor of Optometry (O.D.) degree from the prestigious [Name of University School of Optometry], where she graduated with honors. Her commitment to excellence in eye care led her to pursue advanced training and specialization in various aspects of optometry.\r\n\r\nExpertise\r\nWith over 15 years of clinical experience, Dr. Jane Doe is known for her expertise in a wide range of vision care services, including:\r\n\r\nComprehensive eye examinations for patients of all ages\r\nDiagnosis and management of refractive errors, such as myopia, hyperopia, and astigmatism\r\nTreatment of eye diseases and conditions, including glaucoma, cataracts, and diabetic retinopathy\r\nContact lens fittings, including specialized lenses for astigmatism and multifocal needs\r\nPre- and post-operative care for patients undergoing eye surgery, including LASIK and cataract surgery', 'Welcome to EMN-Tech Optical Clinic! We are dedicated to providing top-quality eye care services to our valued patients. Our experienced team of professionals is committed to your eye health and ensuring you have clear vision and a bright future.\r\n\r\nOur clinic is equipped with state-of-the-art technology to diagnose and treat a wide range of eye conditions. We pride ourselves on patient well-being and look forward to serving you. Schedule your appointment today to experience the difference in eye care.\r\n\r\nOur team is passionate about delivering comprehensive eye care solutions, and we strive to stay at the forefront of medical advancements in the field of ophthalmology.\r\n\r\nAt EMN-Tech Optical Clinic, your comfort and satisfaction are our priorities. We\'re here to address all your eye care needs with a personalized and friendly approach.', 'To provide exceptional eye care services with a strong focus on patient well-being, utilizing the latest advancements in ophthalmology to ensure clear vision and a brighter future for our patients.', 'To become a leading eye care provider, known for our commitment to excellence and innovation in the field of ophthalmology. We aspire to make a positive impact on the lives of our patients and the community we serve.', 'Our objective is to deliver top-quality eye care services, stay at the forefront of medical advancements in ophthalmology, and provide a personalized and friendly approach to address all your eye care needs, ensuring patient satisfaction and comfort as our top priorities.', ' Blk 38 Lot 2 Molino-Paliparan Rd., Brngy. Salawag, Dasmariñas City, Cavite', '(+63)9453523306 | (+63)9176257061', 'emntechoptical@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `docid` int(11) NOT NULL,
  `docemail` varchar(255) DEFAULT NULL,
  `docname` varchar(255) DEFAULT NULL,
  `docpassword` varchar(255) DEFAULT NULL,
  `docnic` varchar(15) DEFAULT NULL,
  `doctel` varchar(15) DEFAULT NULL,
  `specialties` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `docemail`, `docname`, `docpassword`, `docnic`, `doctel`, `specialties`) VALUES
(1, 'doctor@edoc.com', 'Test Doctor', '123', '', '09123456789', 1),
(2, 'rogerdoc@gmail.com', 'roger', '', '', '09123456789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `email_message`
--

CREATE TABLE `email_message` (
  `id` bigint(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_message`
--

INSERT INTO `email_message` (`id`, `name`, `email`, `message`) VALUES
(1, 'where', 'wherearetheyare@gmail.com', 'whereare message'),
(2, 'test2', 'wherearetheyare@gmail.com', 'wherearetheyare'),
(3, 'test name', 'wherearetheyare@gmail.com', 'where message 3');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`) VALUES
(1, 'patient@edoc.com', 'Test Patient', '123', 'Sri Lanka', NULL, '2000-01-01', '09123456789'),
(4, 'drowranger310@yahoo.com.ph', 'drow ranger', 'Abc@1234', 'rome', '', '2023-12-06', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_name` text NOT NULL,
  `product_description` text NOT NULL,
  `shape_type` text NOT NULL,
  `stock` bigint(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_time_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_image`, `product_name`, `product_description`, `shape_type`, `stock`, `is_active`, `date_time_created`, `date_time_updated`) VALUES
(1, '220.jpg', 'product name updated', 'Product Description', 'HEART-AVIATOR', 10, 1, '2023-12-11 05:40:03', NULL),
(2, '234.png', 'product name 2', 'product description 2', 'HEART-AVIATOR', 15, 1, '2023-12-11 05:46:23', '2023-12-11 05:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(1, '1', 'Test Session', '2050-01-01', '18:00:00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_session`
--

CREATE TABLE `schedule_session` (
  `id` bigint(11) NOT NULL,
  `doc_id` bigint(20) DEFAULT NULL,
  `purpose_to_appoint` text NOT NULL,
  `session_date` timestamp NULL DEFAULT NULL,
  `session_time` time DEFAULT NULL,
  `date_time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_time_updated` timestamp NULL DEFAULT NULL,
  `is_archive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_session`
--

INSERT INTO `schedule_session` (`id`, `doc_id`, `purpose_to_appoint`, `session_date`, `session_time`, `date_time_created`, `date_time_updated`, `is_archive`) VALUES
(1, 1, 'my purpose', '2023-12-13 16:00:00', '08:00:00', '2023-12-14 08:54:32', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'optometrist'),
(2, 'optamologist');

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@edoc.com', 'a'),
('doctor@edoc.com', 'd'),
('patient@edoc.com', 'p'),
('rogerdoc@gmail.com', 'd'),
('drowranger310@yahoo.com.ph', 'p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aemail`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `scheduleid` (`scheduleid`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docid`),
  ADD KEY `specialties` (`specialties`);

--
-- Indexes for table `email_message`
--
ALTER TABLE `email_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `docid` (`docid`);

--
-- Indexes for table `schedule_session`
--
ALTER TABLE `schedule_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `docid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_message`
--
ALTER TABLE `email_message`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule_session`
--
ALTER TABLE `schedule_session`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
