/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : localhost:3306
 Source Schema         : apotek

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : 65001

 Date: 19/11/2022 19:50:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for obat
-- ----------------------------
DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat`  (
  `id_obat` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nm_obat` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pembuat_obat` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_obat` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stok_obat` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_kadaluarsa` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_obat`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of obat
-- ----------------------------
INSERT INTO `obat` VALUES ('A001', 'Penisilin', 'Kalbe', '35000', '2000', '2025-11-12');
INSERT INTO `obat` VALUES ('A002', 'Zinc Sulfate', 'Sanbe', '20000', '1000', '2025-11-12');
INSERT INTO `obat` VALUES ('A003', 'Asam Mefenamat', 'Pharos', '19000', '1020', '2025-11-12');
INSERT INTO `obat` VALUES ('A004', 'Dekongestan', 'Sanbe', '28000', '1300', '2025-11-12');
INSERT INTO `obat` VALUES ('A005', 'Antasida', 'Dexa', '32000', '2300', '2025-11-12');
INSERT INTO `obat` VALUES ('A006', 'ibu profen', 'Kalbe', '29000', '3000', '2025-11-12');
INSERT INTO `obat` VALUES ('B001', 'Parasetamol', 'Kimia Farma', '12000', '2000', '2025-11-12');
INSERT INTO `obat` VALUES ('B002', 'Ambroxol', 'Dexa', '17000', '1500', '2025-11-12');
INSERT INTO `obat` VALUES ('B003', 'Hydrocortisone', 'Tempo', '19300', '3000', '2025-11-12');
INSERT INTO `obat` VALUES ('B004', 'Amodia', 'Sanofi', '10000', '2400', '2025-11-12');
INSERT INTO `obat` VALUES ('B005', 'Aspirin', 'Kalbe', '9500', '900', '2025-11-12');
INSERT INTO `obat` VALUES ('C001', 'Glicon', 'kalbe', '12000', '4300', '2025-11-12');
INSERT INTO `obat` VALUES ('C002', 'lasera', 'kalbe', '12000', '4300', '2025-11-12');
INSERT INTO `obat` VALUES ('C003', 'Femina', 'kalbe', '12000', '4300', '2025-11-12');
INSERT INTO `obat` VALUES ('C004', 'Kroe', 'kalbe', '12000', '4300', '2025-11-12');
INSERT INTO `obat` VALUES ('C005', 'Gaale', 'kalbe', '12000', '4300', '2025-11-12');

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien`  (
  `id_pasien` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nama_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir_pasien` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_pasien`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES ('001', 'Eko', '1997-01-08');
INSERT INTO `pasien` VALUES ('002', 'Yudi', '1997-12-30');
INSERT INTO `pasien` VALUES ('003', 'Lesti', '1999-06-26');
INSERT INTO `pasien` VALUES ('004', 'Bilar', '1990-10-30');
INSERT INTO `pasien` VALUES ('005', 'Dedi', '1998-11-27');
INSERT INTO `pasien` VALUES ('006', 'Desi', '1995-03-27');
INSERT INTO `pasien` VALUES ('007', 'Yuni', '2000-01-17');
INSERT INTO `pasien` VALUES ('008', 'Irma', '1993-08-10');
INSERT INTO `pasien` VALUES ('009', 'Sunarto', '1994-05-01');
INSERT INTO `pasien` VALUES ('010', 'Deni', '1990-06-12');
INSERT INTO `pasien` VALUES ('111', 'Heru', '1998-09-01');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_transaksi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `id_pasien` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_obat` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah_transaksi` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE,
  INDEX `fk_transaksi_obat`(`id_obat`) USING BTREE,
  INDEX `fk_transaksi_pasien`(`id_pasien`) USING BTREE,
  CONSTRAINT `fk_transaksi_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_transaksi_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('TU001', '001', 'A001', '7');
INSERT INTO `transaksi` VALUES ('TU002', '002', 'B003', '5');
INSERT INTO `transaksi` VALUES ('TU003', '003', 'B001', '6');
INSERT INTO `transaksi` VALUES ('TU004', '004', 'A002', '6');
INSERT INTO `transaksi` VALUES ('TU005', '005', 'B002', '8');
INSERT INTO `transaksi` VALUES ('TU006', '006', 'A004', '3');
INSERT INTO `transaksi` VALUES ('TU007', '007', 'B005', '4');
INSERT INTO `transaksi` VALUES ('TU008', '008', 'A003', '2');
INSERT INTO `transaksi` VALUES ('TU009', '009', 'B004', '2');
INSERT INTO `transaksi` VALUES ('TU010', '010', 'A005', '1');
INSERT INTO `transaksi` VALUES ('TU011', '004', 'A003', '5');
INSERT INTO `transaksi` VALUES ('TU012', '006', 'A002', '6');
INSERT INTO `transaksi` VALUES ('TU013', '001', 'A004', '3');
INSERT INTO `transaksi` VALUES ('TU014', '007', 'A005', '4');

SET FOREIGN_KEY_CHECKS = 1;
