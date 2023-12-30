-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for stockbarang
CREATE DATABASE IF NOT EXISTS `stockbarang` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stockbarang`;

-- Dumping structure for table stockbarang.keluar
CREATE TABLE IF NOT EXISTS `keluar` (
  `idkeluar` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penerima` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` text NOT NULL,
  PRIMARY KEY (`idkeluar`),
  KEY `barang1` (`idbarang`),
  CONSTRAINT `barang1` FOREIGN KEY (`idbarang`) REFERENCES `stock` (`idbarang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table stockbarang.keluar: ~5 rows (approximately)
/*!40000 ALTER TABLE `keluar` DISABLE KEYS */;
REPLACE INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`, `satuan`) VALUES
	(22, 15, '2023-10-03 01:05:39', 'Alfat (MPS)', 100, 'pcs'),
	(23, 15, '2023-10-20 06:01:13', 'Alfat (MPS)', 91, 'pcs'),
	(25, 15, '2023-10-20 09:28:47', 'asj', 3, 'pcs'),
	(26, 15, '2023-10-20 09:33:15', 'dsa', 3, 'pcs'),
	(27, 15, '2023-10-23 14:22:11', 'Alfat (MPS)', 10, 'pcs');
/*!40000 ALTER TABLE `keluar` ENABLE KEYS */;

-- Dumping structure for table stockbarang.login
CREATE TABLE IF NOT EXISTS `login` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table stockbarang.login: ~3 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
REPLACE INTO `login` (`iduser`, `nama`, `email`, `password`, `jk`, `nohp`, `jabatan`) VALUES
	(2, 'Ratna Juwita', 'ratna@gmail.com', '123123', 'Perempuan', '082290987078', 'Sekretaris'),
	(3, 'dila', 'dila@gmail.com', '121212', 'Perempuan', '098625673832', 'Magang\r\n\r\n\r\n'),
	(4, 'Bambang', 'bambang123@gmail.com', '12345', 'Pria', '082361040175', 'SSGA');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table stockbarang.masuk
CREATE TABLE IF NOT EXISTS `masuk` (
  `idmasuk` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penerima` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` text NOT NULL,
  PRIMARY KEY (`idmasuk`),
  KEY `barang` (`idbarang`),
  CONSTRAINT `idbarang` FOREIGN KEY (`idbarang`) REFERENCES `stock` (`idbarang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table stockbarang.masuk: ~2 rows (approximately)
/*!40000 ALTER TABLE `masuk` DISABLE KEYS */;
REPLACE INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `penerima`, `qty`, `satuan`) VALUES
	(33, 15, '2023-10-01 09:44:22', 'sad', 1, '1'),
	(35, 19, '2023-10-23 14:30:19', 'Alfat (MPS)', 9, 'pcs');
/*!40000 ALTER TABLE `masuk` ENABLE KEYS */;

-- Dumping structure for table stockbarang.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(50) NOT NULL,
  `stock` text NOT NULL,
  `satuan` text NOT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table stockbarang.stock: ~7 rows (approximately)
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
REPLACE INTO `stock` (`idbarang`, `namabarang`, `stock`, `satuan`) VALUES
	(15, 'Kertas Sertifikat', '221', 'pcs'),
	(16, 'Spidol', '90', 'pcs'),
	(17, 'Kertas A4', '554', 'dus'),
	(18, 'Map Batik', '90', 'pcs'),
	(19, 'pulpen', '40', 'pcs'),
	(20, 'rol', '5', 'pcs'),
	(21, 'pulpen', '9', 'pcs');
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
