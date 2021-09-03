-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 04:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

--
-- Database: `db_test_inventori`
--

-- --------------------------------------------------------

--
-- Dumping data for table `tabel_inv_category`
--

INSERT INTO `tabel_inv_category` (`id`, `category`, `description`, `date_created`, `date_modified`, `discontinue`) VALUES
(1, 'BUTTER', NULL, '2021-09-01 14:33:06', NULL, '0'),
(2, 'FLOUR', NULL, '2021-09-01 14:33:06', NULL, '0'),
(3, 'Margarine', NULL, '2021-09-01 14:33:40', NULL, '0');

-- --------------------------------------------------------


--
-- Dumping data for table `tabel_inv_products`
--

INSERT INTO `tabel_inv_products` (`id`, `code`, `name`, `category`, `cost`, `price`, `quantity`, `uom`, `description`, `date_created`, `date_modified`, `discontinue`) VALUES
(1, '8710917003033', 'Wijsman Butter 1 Kg\r\n', 1, '0.00', '0.00', '0.00', 1, NULL, '2021-09-01 14:26:05', NULL, '0'),
(4, '8714700522015', 'Honig Maizenaku 1 Kg\r\n', 2, '0.00', '0.00', '0.00', 1, NULL, '2021-09-01 14:27:30', NULL, '0'),
(5, '8719200171435', 'Blue Band Master 2 Kg', 3, '0.00', '0.00', '0.00', 1, NULL, '2021-09-01 14:27:30', NULL, '0');

-- --------------------------------------------------------


--
-- Dumping data for table `tabel_inv_uom`
--

INSERT INTO `tabel_inv_uom` (`id`, `uom`, `description`, `date_created`, `date_modified`, `discontinue`) VALUES
(1, 'PCS', NULL, '2021-09-01 14:30:56', NULL, '0'),
(2, 'CARTON', NULL, '2021-09-01 14:30:56', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_inv_warehouses`
--


INSERT INTO `tabel_inv_warehouses` (`id`, `name`, `address`, `date_created`, `date_modified`, `discontinue`) VALUES
(1, 'Warehouse 1', 'Full Address Warehouse 1', '2021-09-01 14:45:07', NULL, '0'),
(2, 'Warehouse 2', 'Full Address Warehouse 2', '2021-09-01 14:45:18', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_inv_warehouses_products`
--


INSERT INTO `tabel_inv_warehouses_products` (`id`, `warehouse_id`, `product_id`, `quantity`, `date_created`, `date_modified`) VALUES
(1, 1, 1, '0.00', '2021-09-01 14:46:54', NULL),
(2, 1, 3, '0.00', '2021-09-01 14:46:54', NULL),
(3, 2, 1, '0.00', '2021-09-01 14:47:18', NULL),
(4, 2, 3, '0.00', '2021-09-01 14:47:18', NULL);

