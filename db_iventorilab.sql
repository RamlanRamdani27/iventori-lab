-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 02:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_iventorilab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE IF NOT EXISTS `tbbarang` (
  `kodebarang` varchar(20) NOT NULL,
  `namabarang` varchar(25) NOT NULL,
  `kodemerek` varchar(10) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kodelogin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kodebarang`, `namabarang`, `kodemerek`, `tanggalmasuk`, `jumlah`, `kodelogin`) VALUES
('BR1701000001', 'dfasf', 'k001', '2017-01-24', 1, ''),
('BR1701000002', 'Printer', 'k001', '2017-01-24', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbbarangg`
--

CREATE TABLE IF NOT EXISTS `tbbarangg` (
  `kodebarang` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kodemerek` varchar(14) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `tanggalinput` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kodelogin` int(11) NOT NULL,
  `spesifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarangg`
--

INSERT INTO `tbbarangg` (`kodebarang`, `nama`, `kodemerek`, `gambar`, `tanggalinput`, `kodelogin`, `spesifikasi`) VALUES
('BG1701000001', 'Monitor', 'MK1701000009', 'Monitor122838.jpeg', '2017-01-28 11:28:38', 1, 'Unit'),
('BG1701000002', 'Monitor', 'MK1701000001', '011903.jpg', '2017-01-28 12:19:16', 1, 'Unit'),
('BG1701000003', 'Printer', 'MK1701000005', 'Printer012314.png', '2017-01-30 07:07:01', 1, 'Unit'),
('BG1702000004', 'HDD', 'MK1701000001', 'HDD045032.png', '2017-02-06 15:50:32', 1, 'Gb'),
('BG1702000005', 'Processor', 'MK1701000011', 'Processor045108.jpg', '2017-02-06 15:51:08', 1, 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `tbbarangkeluar`
--

CREATE TABLE IF NOT EXISTS `tbbarangkeluar` (
  `nokeluar` varchar(15) NOT NULL,
  `kodelogin` int(11) NOT NULL,
  `tanggalkeluar` date NOT NULL,
  `totalbarangkeluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarangkeluar`
--

INSERT INTO `tbbarangkeluar` (`nokeluar`, `kodelogin`, `tanggalkeluar`, `totalbarangkeluar`) VALUES
('NK1702000001', 1, '2017-02-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbdetailbarangkeluar`
--

CREATE TABLE IF NOT EXISTS `tbdetailbarangkeluar` (
`id` int(10) NOT NULL,
  `nokeluar` varchar(15) NOT NULL,
  `kodebarang` varchar(14) NOT NULL,
  `koderuangan` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetailbarangkeluar`
--

INSERT INTO `tbdetailbarangkeluar` (`id`, `nokeluar`, `kodebarang`, `koderuangan`, `qty`) VALUES
(6, 'NK1702000001', 'BG1701000001', 'RG1701000002', 1),
(7, 'NK1702000001', 'BG1701000002', 'RG1701000002', 1);

--
-- Triggers `tbdetailbarangkeluar`
--
DELIMITER //
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `tbdetailbarangkeluar`
 FOR EACH ROW BEGIN
 INSERT INTO tbkartustok SET
kodebarang=NEW.kodebarang, qty_out=new.qty, sisa=NEW.qty - sisa
ON DUPLICATE KEY UPDATE qty_out= NEW.qty, sisa=sisa - NEW.qty; 
 END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbdetailmasuk`
--

CREATE TABLE IF NOT EXISTS `tbdetailmasuk` (
`id` int(11) NOT NULL,
  `nomasuk` varchar(14) NOT NULL,
  `kodebarang` varchar(14) NOT NULL,
  `qty` int(10) NOT NULL,
  `hargabeli` int(15) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetailmasuk`
--

INSERT INTO `tbdetailmasuk` (`id`, `nomasuk`, `kodebarang`, `qty`, `hargabeli`, `ket`) VALUES
(11, 'NM1702000001', 'BG1701000001', 3, 300000, 'unit'),
(12, 'NM1702000001', 'BG1701000002', 3, 400000, 'unit'),
(13, 'NM1702000002', 'BG1702000004', 4, 400000, '80 GB');

--
-- Triggers `tbdetailmasuk`
--
DELIMITER //
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `tbdetailmasuk`
 FOR EACH ROW BEGIN
 INSERT INTO tbkartustok SET
kodebarang=NEW.kodebarang, qty_in=new.qty, sisa=sisa + NEW.qty, ket=NEW.ket
ON DUPLICATE KEY UPDATE qty_in=qty_in + NEW.qty, sisa=sisa + NEW.qty;
 END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbkartustok`
--

CREATE TABLE IF NOT EXISTS `tbkartustok` (
  `kodebarang` varchar(15) NOT NULL,
  `qty_in` int(11) NOT NULL,
  `qty_out` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `ket` text NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkartustok`
--

INSERT INTO `tbkartustok` (`kodebarang`, `qty_in`, `qty_out`, `sisa`, `ket`, `tgl`) VALUES
('BG1701000001', 3, -1, 2, 'unit', '2017-02-06 20:15:41'),
('BG1701000002', 3, -1, 2, 'unit', '2017-02-06 20:15:41'),
('BG1702000004', 4, 0, 4, '80 GB', '2017-02-07 00:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE IF NOT EXISTS `tblogin` (
`kodelogin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(20) NOT NULL,
  `namalengkap` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`kodelogin`, `username`, `password`, `level`, `namalengkap`, `gambar`) VALUES
(1, 'ramlan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 'Muhamad Ramlan Ramdani', 'Ramlan.jpg'),
(2, 'hikmatullah@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 'Hikmatullah R', 'hikmat.jpg'),
(4, 'kiandra@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'Kiandra Pratama Ariawan', 'Kiandra_Pratama_Ariawan024446.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbmasuk`
--

CREATE TABLE IF NOT EXISTS `tbmasuk` (
  `nomasuk` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `tglinput` date NOT NULL,
  `kodelogin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmasuk`
--

INSERT INTO `tbmasuk` (`nomasuk`, `tgl`, `tglinput`, `kodelogin`) VALUES
('NM1702000001', '2017-02-04', '2017-02-06', 1),
('NM1702000002', '2017-02-04', '2017-02-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbmerek`
--

CREATE TABLE IF NOT EXISTS `tbmerek` (
  `kodemerek` varchar(20) NOT NULL,
  `namamerek` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmerek`
--

INSERT INTO `tbmerek` (`kodemerek`, `namamerek`) VALUES
('MK1701000001', 'Samsung'),
('MK1701000002', 'Hp'),
('MK1701000003', 'Seagate'),
('MK1701000004', 'Canon'),
('MK1701000005', 'EPSON'),
('MK1701000006', 'LG'),
('MK1701000007', 'Azus'),
('MK1701000008', 'Lenovo'),
('MK1701000009', 'Acer'),
('MK1701000010', 'Dell'),
('MK1701000011', 'intel'),
('MK1701000012', 'Amd');

-- --------------------------------------------------------

--
-- Table structure for table `tbruangan`
--

CREATE TABLE IF NOT EXISTS `tbruangan` (
  `koderuangan` varchar(20) NOT NULL,
  `namaruangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbruangan`
--

INSERT INTO `tbruangan` (`koderuangan`, `namaruangan`) VALUES
('RG1701000001', 'dosen'),
('RG1701000002', 'Lab 1'),
('RG1701000003', 'Lab 2'),
('RG1701000004', 'Lab 3'),
('RG1701000005', 'Lab 4'),
('RG1701000006', 'Lab 5'),
('RG1701000007', 'Server'),
('RG1701000008', 'Pudir 1'),
('RG1701000009', 'Pudir 2'),
('RG1701000010', 'Pudir 3'),
('RG1701000011', 'Baak'),
('RG1701000012', 'Direktur');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_keluar`
--

CREATE TABLE IF NOT EXISTS `tmp_keluar` (
`id` int(11) NOT NULL,
  `kodelogin` int(11) NOT NULL,
  `kodebarang` varchar(15) NOT NULL,
  `koderuangan` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
 ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `tbbarangg`
--
ALTER TABLE `tbbarangg`
 ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `tbbarangkeluar`
--
ALTER TABLE `tbbarangkeluar`
 ADD PRIMARY KEY (`nokeluar`);

--
-- Indexes for table `tbdetailbarangkeluar`
--
ALTER TABLE `tbdetailbarangkeluar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbdetailmasuk`
--
ALTER TABLE `tbdetailmasuk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkartustok`
--
ALTER TABLE `tbkartustok`
 ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
 ADD PRIMARY KEY (`kodelogin`);

--
-- Indexes for table `tbmasuk`
--
ALTER TABLE `tbmasuk`
 ADD PRIMARY KEY (`nomasuk`);

--
-- Indexes for table `tbmerek`
--
ALTER TABLE `tbmerek`
 ADD PRIMARY KEY (`kodemerek`);

--
-- Indexes for table `tbruangan`
--
ALTER TABLE `tbruangan`
 ADD PRIMARY KEY (`koderuangan`);

--
-- Indexes for table `tmp_keluar`
--
ALTER TABLE `tmp_keluar`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetailbarangkeluar`
--
ALTER TABLE `tbdetailbarangkeluar`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbdetailmasuk`
--
ALTER TABLE `tbdetailmasuk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tblogin`
--
ALTER TABLE `tblogin`
MODIFY `kodelogin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tmp_keluar`
--
ALTER TABLE `tmp_keluar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
