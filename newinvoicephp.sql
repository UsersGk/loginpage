-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 11:27 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newinvoicephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(6) NOT NULL,
  `sno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Bankname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Accountno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Balance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `sno`, `date`, `customer`, `Bankname`, `Accountno`, `Balance`) VALUES
(2, '2080', '2023-07-03', 'Ganesh Khatri', 'nepal bank', '0987655678', '416'),
(11, '2080', '2023-07-31', 'Ganesh Khatri', 'NIC', '2343234543', '446');

-- --------------------------------------------------------

--
-- Table structure for table `contra`
--

CREATE TABLE `contra` (
  `id` int(6) NOT NULL,
  `Sno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entriestype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bankname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Accountno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Balance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Narration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contra`
--

INSERT INTO `contra` (`id`, `Sno`, `Date`, `customer`, `entriestype`, `Bankname`, `Accountno`, `Balance`, `Narration`) VALUES
(4, '2019', '2023-07-31', 'Ganesh Khatrii', 'Deposit', 'NIC', '0987655678', '346', 'being');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `invoiceno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CompanyName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Discountper` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Netamount` double DEFAULT NULL,
  `Narration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saleledger` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `invoiceno`, `Dates`, `CompanyName`, `Address`, `subtotal`, `Discountper`, `Netamount`, `Narration`, `saleledger`) VALUES
(88, '1343', '2023-08-11', 'har har mahadev', 'chandraut', '800', '10', 813.6, 'being good sales on cash', 'sales'),
(89, '13', '', 'har har mahadev', 'nayabasti', '1000', '10', 1322.1, 'being good sales on credit', 'SundryDebtor'),
(90, '12', '', 'har har mahadev', 'chandrauta', '1000', '10', 1322.1, 'being good sales on credit', 'SundryDebtor'),
(91, '11', '', 'har har mahadev', 'chandrauta', '1300', '10', 1322.1, 'being good sales on credit', 'SundryDebtor'),
(92, '10', '', 'har har mahadev', 'chandrauta', '1500', '10', 1525.5, 'being good sales on credit', 'SundryDebtor'),
(93, '111', '', 'har har mahadev', 'chandrauta', '1000', '10', 1322.1, 'being good sales on credit', 'SundryDebtor');

-- --------------------------------------------------------

--
-- Table structure for table `invoiceitem`
--

CREATE TABLE `invoiceitem` (
  `id` int(11) NOT NULL,
  `invoiceno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sno` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `itemName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Qty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoiceitem`
--

INSERT INTO `invoiceitem` (`id`, `invoiceno`, `sno`, `itemName`, `Qty`, `price`, `total`) VALUES
(178, '1349', '1', 'lenovo7', '10', '100', '1000'),
(179, '1349', '2', 'lenovo1', '3', '100', '300'),
(222, '134243', '1', 'lenovo8.0', '10', '100', '1000'),
(223, '134243', '2', 'lenovo34', '10', '100', '1000'),
(224, '8989', '1', 'lenovo8.0', '10', '100', '1000'),
(225, '8989', '2', 'lenovo34', '10', '100', '1000'),
(226, '13425', '1', 'lenovo8.0', '10', '100', '1000'),
(227, '13425', '2', 'lenovo34', '10', '100', '1000'),
(230, '13421', '1', 'lenovo8.0', '10', '100', '1000'),
(231, '13421', '2', 'lenovo34', '10', '100', '1000'),
(232, '1341', '1', 'lenovo8.0', '10', '100', '1000'),
(233, '1341', '2', 'lenovo34', '10', '100', '1000'),
(234, '134', '1', 'lenovo8.0', '10', '100', '1000'),
(235, '134', '2', 'lenovo34', '10', '100', '1000'),
(250, '13', '1', 'lenovo7', '10', '100', '1000'),
(255, '1343', '1', 'lenovo7', '5', '100', '500'),
(256, '1343', '2', 'lenovo1', '3', '100', '300'),
(257, '12', '1', 'lenovo7', '10', '100', '1000'),
(258, '11', '1', 'lenovo7', '10', '100', '1000'),
(259, '11', '2', 'lenovo1', '3', '100', '300'),
(260, '10', '1', 'lenovo7', '10', '100', '1000'),
(261, '10', '2', 'lenovo34', '5', '100', '500'),
(262, '111', '1', 'lenovo7', '10', '100', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `code`, `username`, `email`, `password`) VALUES
(7, 'Ga723', 'UserGK', ' ganeshkhatri00000@gmail.com', 'ganesh723');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `Sno` int(20) NOT NULL,
  `Dates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paymentmethod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `narration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Sno`, `Dates`, `customer`, `paymentmethod`, `amount`, `narration`) VALUES
(4, 20802, '2023-06-26', 'har har mahadev', 'Rentpaid', 2000, 'being eee'),
(6, 2010, '2023-08-07', 'Ganesh Khatri', 'salarypaid', 346, 'being'),
(7, 2019, '2023-08-07', 'Ganesh Khatri5', 'salarypaid', 111, 'being');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinvoice`
--

CREATE TABLE `purchaseinvoice` (
  `id` int(10) NOT NULL,
  `invoiceno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sno` int(10) NOT NULL,
  `itemName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchaseinvoice`
--

INSERT INTO `purchaseinvoice` (`id`, `invoiceno`, `sno`, `itemName`, `Qty`, `price`, `total`) VALUES
(1, '12345', 1, 'lenovo1', '10', '100', '1000'),
(2, '12345', 2, 'slepping', '10', '200', '2000'),
(3, '12345', 3, 'lenovo', '2', '20', '40'),
(4, '12341', 1, 'lenovo1', '10', '100', '1000'),
(5, '12341', 2, 'slepping', '20', '100', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `purchasevendor`
--

CREATE TABLE `purchasevendor` (
  `id` int(10) NOT NULL,
  `invoiceno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Dates` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CompanyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` double NOT NULL,
  `Discountper` double NOT NULL,
  `Netamount` double NOT NULL,
  `Narration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Purchaseledger` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchasevendor`
--

INSERT INTO `purchasevendor` (`id`, `invoiceno`, `Dates`, `CompanyName`, `Address`, `subtotal`, `Discountper`, `Netamount`, `Narration`, `Purchaseledger`) VALUES
(2, '12345', '2023-08-02', 'Ganesh Khatri', 'chandraut\r\n', 3040, 4, 3297.7920000000004, 'being good purchase by cash', 'SundryCreditor'),
(3, '12341', '', 'Ganesh Khatri', 'chandrauta', 3000, 4, 3254.4, 'being good purchase by cash', 'SundryCreditor');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `Sno` int(20) NOT NULL,
  `Dates` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paymentmethod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accountno` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `narration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `Sno`, `Dates`, `customer`, `paymentmethod`, `bankname`, `accountno`, `amount`, `narration`) VALUES
(2, 2080, '2023-07-05', 'Ganesh Khatri', 'Interestreceived', '0', 0, 1000, 'being har har mahadev');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contra`
--
ALTER TABLE `contra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoiceitem`
--
ALTER TABLE `invoiceitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseinvoice`
--
ALTER TABLE `purchaseinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasevendor`
--
ALTER TABLE `purchasevendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contra`
--
ALTER TABLE `contra`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `invoiceitem`
--
ALTER TABLE `invoiceitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchaseinvoice`
--
ALTER TABLE `purchaseinvoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchasevendor`
--
ALTER TABLE `purchasevendor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
