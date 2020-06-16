# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_inv_doni
# Generation Time: 2020-06-16 00:26:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table app_barang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_barang`;

CREATE TABLE `app_barang` (
  `kode_jenis_barang` char(20) NOT NULL DEFAULT '',
  `stok` int(11) DEFAULT NULL,
  `sisa_stok` int(11) DEFAULT NULL,
  `minimum_stok` int(11) DEFAULT NULL,
  `status_barang` int(11) DEFAULT NULL COMMENT '1=ready, 0 = not ready',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_jenis_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_barang` WRITE;
/*!40000 ALTER TABLE `app_barang` DISABLE KEYS */;

INSERT INTO `app_barang` (`kode_jenis_barang`, `stok`, `sisa_stok`, `minimum_stok`, `status_barang`, `created_at`)
VALUES
	('RAB140BB',100,100,27,1,'2020-06-15 21:20:27'),
	('RAB160BB',100,100,29,1,'2020-06-15 21:20:27'),
	('RAB160CL',100,100,10,1,'2020-06-15 21:20:27');

/*!40000 ALTER TABLE `app_barang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_cabang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_cabang`;

CREATE TABLE `app_cabang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_cabang` WRITE;
/*!40000 ALTER TABLE `app_cabang` DISABLE KEYS */;

INSERT INTO `app_cabang` (`id`, `nama_cabang`)
VALUES
	(1,'Bekasi'),
	(2,'Bandung'),
	(3,'Cilacap'),
	(4,'Tegal'),
	(5,'Medan');

/*!40000 ALTER TABLE `app_cabang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_planning_production
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_planning_production`;

CREATE TABLE `app_planning_production` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` char(50) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=ready, 0 = on progress',
  PRIMARY KEY (`id`),
  KEY `master barang` (`kode_barang`),
  KEY `cabang` (`id_cabang`),
  CONSTRAINT `cabang` FOREIGN KEY (`id_cabang`) REFERENCES `app_cabang` (`id`),
  CONSTRAINT `master barang` FOREIGN KEY (`kode_barang`) REFERENCES `app_barang` (`kode_jenis_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table app_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_role`;

CREATE TABLE `app_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_role` WRITE;
/*!40000 ALTER TABLE `app_role` DISABLE KEYS */;

INSERT INTO `app_role` (`id`, `kategori`)
VALUES
	(1,'Admin Gudang'),
	(2,'Produksi'),
	(3,'Manager'),
	(4,'IT Staff');

/*!40000 ALTER TABLE `app_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_users`;

CREATE TABLE `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users_role` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role` (`id_users_role`),
  CONSTRAINT `users_role` FOREIGN KEY (`id_users_role`) REFERENCES `app_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_users` WRITE;
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;

INSERT INTO `app_users` (`id`, `id_users_role`, `nama`, `email`, `password`)
VALUES
	(1,1,'admin','admin@gmail.com','202cb962ac59075b964b07152d234b70'),
	(2,2,'produksi','produksi@gmail.com','202cb962ac59075b964b07152d234b70'),
	(3,3,'manager','manager@gmail.com','202cb962ac59075b964b07152d234b70'),
	(4,4,'staff','staff@gmail.com','202cb962ac59075b964b07152d234b70'),
	(5,1,'admin','admin@gmail.com','202cb962ac59075b964b07152d234b70');

/*!40000 ALTER TABLE `app_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
