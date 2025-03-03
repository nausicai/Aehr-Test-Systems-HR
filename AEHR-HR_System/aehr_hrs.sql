-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 04:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aehr_hrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `account` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `account`, `password`) VALUES
(1, 'admin', '$2y$10$MXBZqsfP6K3EF8FBiC8r2OQEjD95eO4nVbK2F9b1sk3TR4oh4tbjO');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `months` varchar(20) NOT NULL,
  `day_from` varchar(20) NOT NULL,
  `day_to` varchar(20) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `employee_no` varchar(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `general_field` decimal(5,2) DEFAULT NULL,
  `admin_field` decimal(5,2) DEFAULT NULL,
  `finance_field` decimal(5,2) DEFAULT NULL,
  `design_field` decimal(5,2) DEFAULT NULL,
  `board_repair` decimal(5,2) DEFAULT NULL,
  `pm` decimal(5,2) DEFAULT NULL,
  `tech_support` decimal(5,2) DEFAULT NULL,
  `maint_suport` decimal(5,2) DEFAULT NULL,
  `log_comm` decimal(5,2) DEFAULT NULL,
  `report_meeting` decimal(5,2) DEFAULT NULL,
  `warranty` decimal(5,2) DEFAULT NULL,
  `bill_service` decimal(5,2) DEFAULT NULL,
  `upgrades` decimal(5,2) DEFAULT NULL,
  `presales_supp` decimal(5,2) DEFAULT NULL,
  `special_proj` decimal(5,2) DEFAULT NULL,
  `total_hours` decimal(5,2) DEFAULT NULL,
  `weekends_supp` decimal(5,2) DEFAULT NULL,
  `regholiday_ot` decimal(5,2) DEFAULT NULL,
  `specholiday_ot` decimal(5,2) DEFAULT NULL,
  `reg_ot` decimal(5,2) DEFAULT NULL,
  `night_diff` decimal(5,2) DEFAULT NULL,
  `salary_deduc` decimal(5,2) DEFAULT NULL,
  `vl` decimal(5,2) DEFAULT NULL,
  `sl` decimal(5,2) DEFAULT NULL,
  `sub_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`id`, `year`, `months`, `day_from`, `day_to`, `shift`, `employee_no`, `employee_name`, `general_field`, `admin_field`, `finance_field`, `design_field`, `board_repair`, `pm`, `tech_support`, `maint_suport`, `log_comm`, `report_meeting`, `warranty`, `bill_service`, `upgrades`, `presales_supp`, `special_proj`, `total_hours`, `weekends_supp`, `regholiday_ot`, `specholiday_ot`, `reg_ot`, `night_diff`, `salary_deduc`, `vl`, `sl`, `sub_date`) VALUES
(2, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2025', 'February', '16', '28', 'Shift 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `hrs_account` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `hrs_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_no`, `name`, `email`, `phone`, `department`, `position`, `hrs_account`, `date_of_birth`, `date_hired`, `address`, `hrs_password`) VALUES
(1, 'A001', 'Rovic Balatbat', 'rovic@aehr.com', '123-456-7890', 'IT', 'Intern', 'a1', '2003-09-01', '2025-02-17', 'Sta Ana, Pampanga', '$2y$10$7GNRrFweqHJZtMWHP3/L8ODzjhOGUHMByqw1KY659/TBkb2OU9/6S'),
(3, 'A002', 'Michael Johnson', 'michael.johnson@example.com', '555-123-4567', 'Finance', 'Accountant', 'a2', '1992-07-30', '2022-01-10', '91011 Pine St, City, Country', '$2y$10$PF1kID11T3D/DQYXSlJyROB/A7NgpZNcwIRKzujL75ccP6gIOZlFS'),
(4, 'A003', 'Emily Davis', 'emily.davis@example.com', '666-987-6543', 'Marketing', 'Marketing Specialist', 'a3', '1988-02-19', '2019-06-23', '1213 Birch St, City, Country', '$2y$10$B71aQH2bjvN3.2abuDwQBuH5enxtO3KTjf7l8TqSaWtc76DGkiPuW'),
(5, 'A004', 'David Lee', 'david.lee@example.com', '444-321-7654', 'Sales', 'Sales Executive', 'a4', '1993-09-05', '2021-11-11', '1415 Maple St, City, Country', '$2y$10$B71aQH2bjvN3.2abuDwQBuH5enxtO3KTjf7l8TqSaWtc76DGkiPuW'),
(6, 'A005', 'Daominsy Yabut', 'daominsyyabut6@gmail.com', '09391180462', 'IT', 'Intern', 'a5', '2003-06-06', '2025-12-02', '380-A, Sta Catalina, San Luis, Pampanga, Philippines', '$2y$10$blKfgjVi.X/JJu9lfA1OnOFscyIL.a.KHy2H5n0.FXNSl07sJolJy'),
(9, 'A006', 'Daominsy Yabut', 'daominsyyabut6@gmail.coms', '09391180462', 'IT', 'Intern', 'a6', '0001-01-01', '0001-01-01', 'as', '$2y$10$B71aQH2bjvN3.2abuDwQBuH5enxtO3KTjf7l8TqSaWtc76DGkiPuW'),
(29, 'A007', 'Daominsy Yabut', 'daominsyyabut6@gmail.comsasa', '09391180462', 'IT', 'Intern', 'a7', '2132-03-21', '0121-12-21', 'sdaasd', '$2y$10$B71aQH2bjvN3.2abuDwQBuH5enxtO3KTjf7l8TqSaWtc76DGkiPuW'),
(39, 'A008', 'Daominsy Yabut', 'daominsyyabut6@gmail.comsasasaas', '09391180462', 'IT', 'Intern', 'a8', '0012-02-12', '0012-02-12', '1221', '$2y$10$B71aQH2bjvN3.2abuDwQBuH5enxtO3KTjf7l8TqSaWtc76DGkiPuW'),
(41, 'A009', 'sda', 'daominsyyabut6@gmail.comsasaasd', '09391180462', 'IT', 'Intern', 'a9', '0002-03-21', '0002-03-21', '213', '$2y$10$B71aQH2bjvN3.2abuDwQBuH5enxtO3KTjf7l8TqSaWtc76DGkiPuW'),
(51, 'A010', 'name10', '10@gmail.com', '0087654321', 'HR', 'HR', 'a10', '2025-02-19', '2025-02-11', '213ss', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_bal`
--

CREATE TABLE `leave_bal` (
  `employee_no` varchar(50) NOT NULL,
  `vl_bal` decimal(5,2) DEFAULT NULL,
  `sl_bal` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`account`),
  ADD UNIQUE KEY `account` (`account`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_no` (`employee_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_employee` (`employee_no`),
  ADD KEY `hrs_account` (`hrs_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
