/*
Navicat MySQL Data Transfer

Source Server         : MySqlDivusi
Source Server Version : 100116
Source Host           : localhost:3306
Source Database       : save-sos

Target Server Type    : MYSQL
Target Server Version : 100116
File Encoding         : 65001

Date: 2017-08-04 18:19:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_11_082234_create_blog_post_table', '2');
INSERT INTO `migrations` VALUES ('2017_07_11_082310_create_users_table', '2');
INSERT INTO `migrations` VALUES ('2017_07_13_082310_create_users_table', '3');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameRule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin');
INSERT INTO `roles` VALUES ('2', 'user');

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
INSERT INTO `tbl_guru` VALUES ('0', '12345', 'Edi Kusnadi', 'L', 'edi', null, '2017-08-02 09:40:57', '2017-08-02 09:40:57');

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
-- Table structure for tbl_menu
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `is_aktif` enum('1','0') DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `is_main_menu` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_menu
-- ----------------------------
INSERT INTO `tbl_menu` VALUES ('1', 'Master', 'fa fa-bar-chart-o', '1', '#', null, '2', '2017-07-11 10:13:57', '2017-07-18 15:16:08');
INSERT INTO `tbl_menu` VALUES ('2', 'Mata Pelajaran', 'fa fa-book', '1', 'mapel', '1', null, '2017-07-11 10:24:47', '2017-07-11 10:19:33');
INSERT INTO `tbl_menu` VALUES ('3', 'Ruangan Kelas', 'fa fa-building', '1', 'ruang', '1', null, '2017-07-11 10:25:24', '2017-07-11 10:28:22');
INSERT INTO `tbl_menu` VALUES ('4', 'Program Studi', 'fa fa-th-large', '1', 'prodi', '1', null, '2017-07-11 10:26:36', '2017-07-11 10:26:36');
INSERT INTO `tbl_menu` VALUES ('5', 'Database Siswa', 'fa fa-graduation-cap', '1', 'siswa', null, null, '2017-07-11 10:27:32', '2017-07-11 10:28:14');
INSERT INTO `tbl_menu` VALUES ('6', 'Konfigurasi Akademik', 'fa fa-graduation-cap', '1', '#', null, null, '2017-07-18 14:23:46', '2017-07-18 14:30:27');
INSERT INTO `tbl_menu` VALUES ('7', 'Tahun Akademik', null, '1', 'tahun_akademik', '6', null, '2017-07-18 14:25:16', '2017-07-18 14:30:23');
INSERT INTO `tbl_menu` VALUES ('8', 'Kurikulum', null, '1', 'kurikulum', '6', null, '2017-07-18 14:30:22', '2017-07-18 14:30:22');

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
-- Table structure for tbl_s_data_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_s_data_siswa`;
CREATE TABLE `tbl_s_data_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rombel` varchar(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `kode_agama` varchar(5) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `warga_negara` enum('WNI','WNA') DEFAULT NULL,
  `anak_ke` int(3) DEFAULT NULL,
  `saudara_kandung` int(3) DEFAULT NULL,
  `saudara_tiri` int(3) DEFAULT NULL,
  `saudara_angkat` int(3) DEFAULT NULL,
  `status_anak` enum('AK','AT','AA') DEFAULT NULL,
  `bahasa` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nisn` varchar(11) DEFAULT NULL,
  `status_aktif` enum('Aktif','Keluar','Pindah','Lulus') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_s_data_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('1', 'Asep Cahyudin', 'savefaaizuun@gmail.com', '$2y$10$CzGMWLk1XQz.dzstZ//dE.m7tKHIcCOpuKxepyLtjfmtBsUGiatc.', '9h8KcF5xNhdNlQYRIrJ4VWxDdLeUgeg6V4WDSFESRiygZWyY6TMp4qOKXbiGsavefaaizuun@gmail.com', '1', '9hNpRUOnCLR4OzUHyTEG6tHRlvZV5ZvAzLe4SsMyoovgwQj9xuRuoixsXdXu', '2017-07-12 10:20:38', '2017-07-13 03:11:15');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roles_id` int(10) unsigned DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_roles_id_foreign` (`roles_id`),
  CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'admin', 'admin', 'admin@gmail.com', '$2y$10$wgFsqoGnYUKmwF52Z7/ZD.Bv2ko2pKdDr86Wx0F.PnZTXJWk.fsTi', 'h5UbQZtv8aLaDZptLbYtXWTfswNlGBFuKNdvhFTIjWHEaykeWK4Sk0wgpPL1', '2017-07-17 04:30:33', '2017-07-17 10:18:48');
INSERT INTO `users` VALUES ('2', '2', 'asep.cahyudin', 'Asep Cahyudin', 'savefaaizuun@gmail.com', '$2y$10$lQ7lQxo0xwLjSUsWZaejLedoxCRxeNw.j0paG6Eu3ClheS0CHeum2', '3dAbQP4N7vKeAOOsn6FT0uSVFMk4zVFIqAbdu3EsfzbUk2vwdZ5JQ0blpimf', '2017-07-17 04:31:09', '2017-07-17 09:17:42');
