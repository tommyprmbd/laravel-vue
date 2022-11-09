/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : apotek

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2022-11-09 22:12:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `obat`
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `id_obat` varchar(30) NOT NULL DEFAULT '',
  `nm_obat` varchar(20) DEFAULT NULL,
  `pembuat_obat` varchar(20) DEFAULT NULL,
  `stok_obat` varchar(10) DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of obat
-- ----------------------------

-- ----------------------------
-- Table structure for `pasien`
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `id_pasien` varchar(30) NOT NULL DEFAULT '',
  `nama_pasien` varchar(20) DEFAULT NULL,
  `tgl_lahir_pasien` date DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pasien
-- ----------------------------

-- ----------------------------
-- Table structure for `transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL DEFAULT '',
  `id_pasien` varchar(20) DEFAULT NULL,
  `id_obat` varchar(30) DEFAULT NULL,
  `jumlah_transaksi` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `fk_transaksi_obat` (`id_obat`),
  KEY `fk_transaksi_pasien` (`id_pasien`),
  CONSTRAINT `fk_transaksi_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE,
  CONSTRAINT `fk_transaksi_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
