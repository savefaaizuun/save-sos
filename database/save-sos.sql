/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50621
Source Host           : localhost:3307
Source Database       : save-sos

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2017-07-06 15:00:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_guru
-- ----------------------------
DROP TABLE IF EXISTS `tbl_guru`;
CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `nuptk` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_guru
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jadwal`;
CREATE TABLE `tbl_jadwal` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_rombel` int(11) DEFAULT NULL,
  `id_tahun_akademik` int(11) DEFAULT NULL,
  `kode_mapel` varchar(10) DEFAULT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `kode_ruang` varchar(10) DEFAULT NULL,
  `semseter` varchar(10) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jadwal
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_konfigurasi_tahun_akademik
-- ----------------------------
DROP TABLE IF EXISTS `tbl_konfigurasi_tahun_akademik`;
CREATE TABLE `tbl_konfigurasi_tahun_akademik` (
  `id` int(11) NOT NULL,
  `tahun_akademik` varchar(100) DEFAULT NULL,
  `semester_aktif` varchar(10) DEFAULT NULL,
  `is_aktif` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_konfigurasi_tahun_akademik
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_kurikulum
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kurikulum`;
CREATE TABLE `tbl_kurikulum` (
  `id` int(11) NOT NULL,
  `nama_kurikulum` varchar(100) DEFAULT NULL,
  `is_aktif` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kurikulum
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_mapel
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mapel`;
CREATE TABLE `tbl_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(10) DEFAULT NULL,
  `nama_mapel` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_mapel
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_prodi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_prodi`;
CREATE TABLE `tbl_prodi` (
  `id` int(11) NOT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `nama_prodi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_prodi
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_rincian_kurikulum
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rincian_kurikulum`;
CREATE TABLE `tbl_rincian_kurikulum` (
  `id` int(11) NOT NULL,
  `id_kurikulum` int(11) DEFAULT NULL,
  `kode_mapel` varchar(10) DEFAULT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_rincian_kurikulum
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_rombel
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rombel`;
CREATE TABLE `tbl_rombel` (
  `id` int(11) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `nama_rombel` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_rombel
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_ruang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ruang`;
CREATE TABLE `tbl_ruang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ruang` varchar(11) DEFAULT NULL,
  `nama_ruang` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updaed_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_ruang
-- ----------------------------
INSERT INTO `tbl_ruang` VALUES ('1', 'RPL', 'R1', null, '2017-06-29 12:52:58');

-- ----------------------------
-- Table structure for tbl_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa`;
CREATE TABLE `tbl_siswa` (
  `id` int(11) NOT NULL,
  `id_rombel` varchar(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `kode_agama` varchar(5) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_siswa
-- ----------------------------
