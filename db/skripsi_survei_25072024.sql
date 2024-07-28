/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : skripsi_survei

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-07-25 14:35:56
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_anggota` varchar(20) DEFAULT '',
  `nama_anggota` varchar(100) DEFAULT '',
  `id_instansi` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` char(1) DEFAULT NULL,
  `daerah` char(2) DEFAULT NULL,
  `kdbidang` varchar(20) DEFAULT '',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status_aktif` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO admins VALUES ('101', '', '', null, 'admin', 'dahrul.ulum@gmail.com', null, '1', null, null, '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', null, null, '2020-06-25 14:12:55', null, '2021-01-10 23:00:55');
INSERT INTO admins VALUES ('271', '1', 'Dafa Pratama Muharam', null, 'Dafa Pratama Muharam', 'dafapratama.muharam@gmail.com', null, '2', null, '', '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', null, '1', '2024-06-22 20:24:53', '2024-06-22 20:24:53', null);
INSERT INTO admins VALUES ('272', '2', 'Danish Azzikri', null, 'Danish Azzikri', 'danish@gmail.com', null, '2', null, '', '$2y$10$3OBlpw5U.I0.PkdRKQE7z.AstNsEo9GTFcaEhKoDxz2K0laaFcj/O', null, '1', '2024-07-05 19:43:40', '2024-07-05 19:43:40', null);
INSERT INTO admins VALUES ('273', '3', 'Dewi Sartika', null, 'Dewi Sartika', 'dewisartika.pkp@gmail.com', null, '2', null, '', '$2y$10$E37Haqs6A6VLB89g4ZrClOjmGDQ5WVJptoW5v6RbIDEEeUG8hQfQO', null, '1', '2024-07-05 19:45:40', '2024-07-05 19:45:40', null);

-- ----------------------------
-- Table structure for `anggota`
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `tempatlahir` varchar(200) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(200) DEFAULT NULL,
  `nohp` varchar(40) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_aktif` char(1) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `verby` varchar(100) DEFAULT NULL,
  `tglver` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO anggota VALUES ('1', '6676c10430c21', 'dafapratama.muharam@gmail.com', null, 'dafapratama.muharam@gmail.com', '$2y$10$51fmfdd7b8t/l0ohivJLP.l5fpRNQmiL7ahO7tyI.khfz3b7OnrSq', 'Dafa Pratama Muharam', '11222', '1', 'Pangkalpinang', '2008-02-03', null, null, '6', null, '<p>asd adads</p>', '1', null, 'dahrul', '2024-06-13', '2024-06-22 19:21:03', '2024-06-22 20:24:53', null);
INSERT INTO anggota VALUES ('2', '6687ea13ed80c', 'danish@gmail.com', null, 'danish@gmail.com', '$2y$10$3OBlpw5U.I0.PkdRKQE7z.AstNsEo9GTFcaEhKoDxz2K0laaFcj/O', 'Danish Azzikri', '19710378010001', '1', 'Pangkalpinang', '1990-06-10', null, null, '3', null, '<p>Jl. Mangga No.21 Bukit Merapin Pangkalpinang</p>', '1', null, 'dahrul', '2024-07-04', '2024-07-05 19:43:22', '2024-07-05 19:43:40', null);
INSERT INTO anggota VALUES ('3', '6687ea84c651d', 'dewisartika.pkp@gmail.com', null, 'dewisartika.pkp@gmail.com', '$2y$10$E37Haqs6A6VLB89g4ZrClOjmGDQ5WVJptoW5v6RbIDEEeUG8hQfQO', 'Dewi Sartika', '1971012076830002', '2', 'Paku', '1983-07-12', null, null, '3', null, '<p>Jl. Mahoni II no.220 Bukit Merapin Pangkalpinang</p>', '1', null, 'dahrul', '2024-07-04', '2024-07-05 19:45:25', '2024-07-05 19:45:40', null);

-- ----------------------------
-- Table structure for `detail_jawaban`
-- ----------------------------
DROP TABLE IF EXISTS `detail_jawaban`;
CREATE TABLE `detail_jawaban` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_survei` int(10) DEFAULT NULL,
  `id_soal` int(10) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `no_jawaban` int(10) DEFAULT NULL,
  `nama_jawaban` varchar(100) DEFAULT NULL,
  `nilai_jawaban` int(10) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of detail_jawaban
-- ----------------------------
INSERT INTO detail_jawaban VALUES ('1', '1', '1', 'pil_6687f69b2da75', '1', 'Tidak Mudahs', null, null, '2024-07-16 16:57:59', '2024-07-16 16:57:59', null);
INSERT INTO detail_jawaban VALUES ('2', '1', '1', 'pil_6687f69b2da75', '2', 'Kurang Mudah', null, null, '2024-07-16 16:57:59', '2024-07-16 16:57:59', null);
INSERT INTO detail_jawaban VALUES ('3', '1', '1', 'pil_6687f69b2da75', '3', 'Mudah', null, null, '2024-07-16 16:58:00', '2024-07-16 16:58:00', null);
INSERT INTO detail_jawaban VALUES ('4', '1', '1', 'pil_6687f69b2da75', '4', 'Sangat Mudah', null, null, '2024-07-16 16:58:00', '2024-07-16 16:58:00', null);
INSERT INTO detail_jawaban VALUES ('5', '1', '2', 'pil_6687f6ca56842', '1', 'Tidak Cepat', null, null, '2024-07-05 20:36:10', '2024-07-05 20:36:10', null);
INSERT INTO detail_jawaban VALUES ('6', '1', '2', 'pil_6687f6ca56842', '2', 'Kurang Cepat', null, null, '2024-07-05 20:36:10', '2024-07-05 20:36:10', null);
INSERT INTO detail_jawaban VALUES ('7', '1', '2', 'pil_6687f6ca56842', '3', 'Cepat', null, null, '2024-07-05 20:36:10', '2024-07-05 20:36:10', null);
INSERT INTO detail_jawaban VALUES ('8', '1', '2', 'pil_6687f6ca56842', '4', 'Sangat Cepat', null, null, '2024-07-05 20:36:10', '2024-07-05 20:36:10', null);
INSERT INTO detail_jawaban VALUES ('9', '1', '3', 'pil_6687f7919fab5', '1', 'Tidak Mudah', null, null, '2024-07-05 20:39:29', '2024-07-05 20:39:29', null);
INSERT INTO detail_jawaban VALUES ('10', '1', '3', 'pil_6687f7919fab5', '2', 'Kurang Mudah', null, null, '2024-07-05 20:39:29', '2024-07-05 20:39:29', null);
INSERT INTO detail_jawaban VALUES ('11', '1', '3', 'pil_6687f7919fab5', '3', 'Mudah', null, null, '2024-07-05 20:39:29', '2024-07-05 20:39:29', null);
INSERT INTO detail_jawaban VALUES ('12', '1', '3', 'pil_6687f7919fab5', '4', 'Sangat Mudah', null, null, '2024-07-05 20:39:29', '2024-07-05 20:39:29', null);
INSERT INTO detail_jawaban VALUES ('13', '1', '4', 'pil_6687f7abd78aa', '1', 'Tidak Cepat', null, null, '2024-07-05 20:39:55', '2024-07-05 20:39:55', null);
INSERT INTO detail_jawaban VALUES ('14', '1', '4', 'pil_6687f7abd78aa', '2', 'Kurang Cepat', null, null, '2024-07-05 20:39:55', '2024-07-05 20:39:55', null);
INSERT INTO detail_jawaban VALUES ('15', '1', '4', 'pil_6687f7abd78aa', '3', 'Cepat', null, null, '2024-07-05 20:39:55', '2024-07-05 20:39:55', null);
INSERT INTO detail_jawaban VALUES ('16', '1', '4', 'pil_6687f7abd78aa', '4', 'Sangat Cepat', null, null, '2024-07-05 20:39:56', '2024-07-05 20:39:56', null);
INSERT INTO detail_jawaban VALUES ('17', '1', '5', 'pil_6687f7b62d8cb', '1', 'Tidak Mudah', null, null, '2024-07-05 20:40:06', '2024-07-05 20:40:06', null);
INSERT INTO detail_jawaban VALUES ('18', '1', '5', 'pil_6687f7b62d8cb', '2', 'Kurang Mudah', null, null, '2024-07-05 20:40:06', '2024-07-05 20:40:06', null);
INSERT INTO detail_jawaban VALUES ('19', '1', '5', 'pil_6687f7b62d8cb', '3', 'Mudah', null, null, '2024-07-05 20:40:06', '2024-07-05 20:40:06', null);
INSERT INTO detail_jawaban VALUES ('20', '1', '5', 'pil_6687f7b62d8cb', '4', 'Sangat Mudah', null, null, '2024-07-05 20:40:06', '2024-07-05 20:40:06', null);
INSERT INTO detail_jawaban VALUES ('21', '1', '6', 'pil_6687f7fadfa95', '1', 'Tidak Cepat', null, null, '2024-07-05 20:41:14', '2024-07-05 20:41:14', null);
INSERT INTO detail_jawaban VALUES ('22', '1', '6', 'pil_6687f7fadfa95', '2', 'Kurang Cepat', null, null, '2024-07-05 20:41:14', '2024-07-05 20:41:14', null);
INSERT INTO detail_jawaban VALUES ('23', '1', '6', 'pil_6687f7fadfa95', '3', 'Cepat', null, null, '2024-07-05 20:41:15', '2024-07-05 20:41:15', null);
INSERT INTO detail_jawaban VALUES ('24', '1', '6', 'pil_6687f7fadfa95', '4', 'Sangat Cepat', null, null, '2024-07-05 20:41:15', '2024-07-05 20:41:15', null);
INSERT INTO detail_jawaban VALUES ('25', '1', '7', 'pil_6687f806694d3', '1', 'Tidak Mudah', null, null, '2024-07-05 20:41:26', '2024-07-05 20:41:26', null);
INSERT INTO detail_jawaban VALUES ('26', '1', '7', 'pil_6687f806694d3', '2', 'Kurang Mudah', null, null, '2024-07-05 20:41:26', '2024-07-05 20:41:26', null);
INSERT INTO detail_jawaban VALUES ('27', '1', '7', 'pil_6687f806694d3', '3', 'Mudah', null, null, '2024-07-05 20:41:26', '2024-07-05 20:41:26', null);
INSERT INTO detail_jawaban VALUES ('28', '1', '7', 'pil_6687f806694d3', '4', 'Sangat Mudah', null, null, '2024-07-05 20:41:26', '2024-07-05 20:41:26', null);
INSERT INTO detail_jawaban VALUES ('29', '1', '8', 'pil_6687f81456708', '1', 'Tidak Cepat', null, null, '2024-07-05 20:41:40', '2024-07-05 20:41:40', null);
INSERT INTO detail_jawaban VALUES ('30', '1', '8', 'pil_6687f81456708', '2', 'Kurang Cepat', null, null, '2024-07-05 20:41:40', '2024-07-05 20:41:40', null);
INSERT INTO detail_jawaban VALUES ('31', '1', '8', 'pil_6687f81456708', '3', 'Cepat', null, null, '2024-07-05 20:41:40', '2024-07-05 20:41:40', null);
INSERT INTO detail_jawaban VALUES ('32', '1', '8', 'pil_6687f81456708', '4', 'Sangat Cepat', null, null, '2024-07-05 20:41:40', '2024-07-05 20:41:40', null);
INSERT INTO detail_jawaban VALUES ('33', '1', '9', 'pil_6687f81e6d494', '1', 'Tidak Mudah', null, null, '2024-07-05 20:41:50', '2024-07-05 20:41:50', null);
INSERT INTO detail_jawaban VALUES ('34', '1', '9', 'pil_6687f81e6d494', '2', 'Kurang Mudah', null, null, '2024-07-05 20:41:50', '2024-07-05 20:41:50', null);
INSERT INTO detail_jawaban VALUES ('35', '1', '9', 'pil_6687f81e6d494', '3', 'Mudah', null, null, '2024-07-05 20:41:50', '2024-07-05 20:41:50', null);
INSERT INTO detail_jawaban VALUES ('36', '1', '9', 'pil_6687f81e6d494', '4', 'Sangat Mudah', null, null, '2024-07-05 20:41:50', '2024-07-05 20:41:50', null);
INSERT INTO detail_jawaban VALUES ('37', '2', '10', 'pil_6696465d477f8', '1', 'Tidak Mudahs', null, null, '2024-07-16 17:08:23', '2024-07-16 17:08:23', null);
INSERT INTO detail_jawaban VALUES ('38', '2', '10', 'pil_6696465d477f8', '2', 'Kurang Mudah', null, null, '2024-07-16 17:08:23', '2024-07-16 17:08:23', null);
INSERT INTO detail_jawaban VALUES ('39', '2', '10', 'pil_6696465d477f8', '3', 'Mudah', null, null, '2024-07-16 17:08:23', '2024-07-16 17:08:23', null);
INSERT INTO detail_jawaban VALUES ('40', '2', '10', 'pil_6696465d477f8', '4', 'Sangat Mudah', null, null, '2024-07-16 17:08:23', '2024-07-16 17:08:23', null);
INSERT INTO detail_jawaban VALUES ('41', '2', '11', 'pil_66964689878a4', '1', 'Tidak Mudah', null, null, '2024-07-16 17:08:09', '2024-07-16 17:08:09', null);
INSERT INTO detail_jawaban VALUES ('42', '2', '11', 'pil_66964689878a4', '2', 'Kurang Mudah', null, null, '2024-07-16 17:08:09', '2024-07-16 17:08:09', null);
INSERT INTO detail_jawaban VALUES ('43', '2', '11', 'pil_66964689878a4', '3', 'Mudah', null, null, '2024-07-16 17:08:09', '2024-07-16 17:08:09', null);
INSERT INTO detail_jawaban VALUES ('44', '2', '11', 'pil_66964689878a4', '4', 'Sangat Mudah', null, null, '2024-07-16 17:08:09', '2024-07-16 17:08:09', null);
INSERT INTO detail_jawaban VALUES ('45', '2', '12', 'pil_6696477b4d1a2', '1', 'Tidak Cepat', null, null, '2024-07-16 17:12:11', '2024-07-16 17:12:11', null);
INSERT INTO detail_jawaban VALUES ('46', '2', '12', 'pil_6696477b4d1a2', '2', 'Kurang Cepat', null, null, '2024-07-16 17:12:11', '2024-07-16 17:12:11', null);
INSERT INTO detail_jawaban VALUES ('47', '2', '12', 'pil_6696477b4d1a2', '3', 'Cepat', null, null, '2024-07-16 17:12:11', '2024-07-16 17:12:11', null);
INSERT INTO detail_jawaban VALUES ('48', '2', '12', 'pil_6696477b4d1a2', '4', 'Sangat Cepat', null, null, '2024-07-16 17:12:11', '2024-07-16 17:12:11', null);

-- ----------------------------
-- Table structure for `hasil_survei`
-- ----------------------------
DROP TABLE IF EXISTS `hasil_survei`;
CREATE TABLE `hasil_survei` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `alias` varchar(40) DEFAULT NULL,
  `id_anggota` int(10) DEFAULT NULL,
  `id_survei` varchar(40) DEFAULT NULL,
  `tglawal` date DEFAULT NULL,
  `tglakhir` date DEFAULT NULL,
  `unitkerja` varchar(200) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_layanan` varchar(200) DEFAULT NULL,
  `judul_survei` varchar(200) DEFAULT NULL,
  `nama_ttd` varchar(200) DEFAULT NULL,
  `jabatan_ttd` varchar(200) DEFAULT NULL,
  `nip_ttd` varchar(100) DEFAULT NULL,
  `pangkat_ttd` varchar(200) DEFAULT NULL,
  `ucapan` text DEFAULT NULL,
  `bobot` varchar(10) DEFAULT NULL,
  `skor` varchar(10) DEFAULT NULL,
  `nilai_ikm` varchar(10) DEFAULT NULL,
  `nilai_mutu` varchar(10) DEFAULT NULL,
  `label_mutu` varchar(40) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of hasil_survei
-- ----------------------------
INSERT INTO hasil_survei VALUES ('1', '1804730608316649', '1', '1', '2024-07-01', '2024-07-31', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes', '11212121', 'tes', 'sads asdasd', '25.000', '3.1111', '77.78', 'B', 'Baik', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei VALUES ('2', '1805532085855638', '1', '1', '2024-07-01', '2024-07-31', '-', '-', '-', 'Publikasi tes', '-', '-', '02', '-', '-', '25.000', '3.0000', '75.00', 'C', 'Kurang Baik', null, '2024-07-25 13:39:37', '2024-07-25 13:39:37', null);

-- ----------------------------
-- Table structure for `hasil_survei_detail`
-- ----------------------------
DROP TABLE IF EXISTS `hasil_survei_detail`;
CREATE TABLE `hasil_survei_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_survei` varchar(40) DEFAULT NULL,
  `id_hasil` varchar(40) DEFAULT NULL,
  `alias` varchar(40) DEFAULT NULL,
  `id_jenis` int(4) DEFAULT NULL COMMENT 'id referensi umum',
  `jenis` varchar(80) DEFAULT NULL COMMENT 'jenis referensi umum : umur, jenkel, pendidikan, pekerjaan',
  `id_label` int(4) DEFAULT NULL COMMENT 'kode referensi umum',
  `label` varchar(100) DEFAULT NULL COMMENT 'nama referensi umum',
  `nilai` int(10) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of hasil_survei_detail
-- ----------------------------
INSERT INTO hasil_survei_detail VALUES ('1', '1', '1804730608316649', '1804730608316649', '1', 'umur', '1', 'umur1', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('2', '1', '1804730608316649', '1804730608316649', '2', 'umur', '2', 'umur2', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('3', '1', '1804730608316649', '1804730608316649', '3', 'umur', '3', 'umur3', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('4', '1', '1804730608316649', '1804730608316649', '4', 'umur', '4', 'umur4', '1', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('5', '1', '1804730608316649', '1804730608316649', '1', 'jenkel', '1', 'jenkel1', '1', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('6', '1', '1804730608316649', '1804730608316649', '2', 'jenkel', '2', 'jenkel2', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('7', '1', '1804730608316649', '1804730608316649', '1', 'pendidikan', '1', 'pendidikan1', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('8', '1', '1804730608316649', '1804730608316649', '2', 'pendidikan', '2', 'pendidikan2', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('9', '1', '1804730608316649', '1804730608316649', '3', 'pendidikan', '3', 'pendidikan3', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('10', '1', '1804730608316649', '1804730608316649', '4', 'pendidikan', '4', 'pendidikan4', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('11', '1', '1804730608316649', '1804730608316649', '5', 'pendidikan', '5', 'pendidikan5', '1', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('12', '1', '1804730608316649', '1804730608316649', '6', 'pendidikan', '6', 'pendidikan6', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('13', '1', '1804730608316649', '1804730608316649', '1', 'pekerjaan', '1', 'pekerjaan1', '0', null, '2024-07-16 17:20:29', '2024-07-16 17:20:29', null);
INSERT INTO hasil_survei_detail VALUES ('14', '1', '1804730608316649', '1804730608316649', '2', 'pekerjaan', '2', 'pekerjaan2', '0', null, '2024-07-16 17:20:30', '2024-07-16 17:20:30', null);
INSERT INTO hasil_survei_detail VALUES ('15', '1', '1804730608316649', '1804730608316649', '3', 'pekerjaan', '3', 'pekerjaan3', '1', null, '2024-07-16 17:20:30', '2024-07-16 17:20:30', null);
INSERT INTO hasil_survei_detail VALUES ('16', '1', '1804730608316649', '1804730608316649', '4', 'pekerjaan', '4', 'pekerjaan4', '0', null, '2024-07-16 17:20:30', '2024-07-16 17:20:30', null);
INSERT INTO hasil_survei_detail VALUES ('17', '1', '1804730608316649', '1804730608316649', '5', 'pekerjaan', '5', 'pekerjaan5', '0', null, '2024-07-16 17:20:30', '2024-07-16 17:20:30', null);
INSERT INTO hasil_survei_detail VALUES ('18', '1', '1804730608316649', '1804730608316649', '6', 'pekerjaan', '6', 'pekerjaan6', '0', null, '2024-07-16 17:20:30', '2024-07-16 17:20:30', null);
INSERT INTO hasil_survei_detail VALUES ('19', '1', '1805532085855638', '1805532085855638', '1', 'umur', '1', 'umur1', '0', null, '2024-07-25 13:39:37', '2024-07-25 13:39:37', null);
INSERT INTO hasil_survei_detail VALUES ('20', '1', '1805532085855638', '1805532085855638', '2', 'umur', '2', 'umur2', '1', null, '2024-07-25 13:39:37', '2024-07-25 13:39:37', null);
INSERT INTO hasil_survei_detail VALUES ('21', '1', '1805532085855638', '1805532085855638', '3', 'umur', '3', 'umur3', '0', null, '2024-07-25 13:39:37', '2024-07-25 13:39:37', null);
INSERT INTO hasil_survei_detail VALUES ('22', '1', '1805532085855638', '1805532085855638', '4', 'umur', '4', 'umur4', '1', null, '2024-07-25 13:39:37', '2024-07-25 13:39:37', null);
INSERT INTO hasil_survei_detail VALUES ('23', '1', '1805532085855638', '1805532085855638', '1', 'jenkel', '1', 'jenkel1', '1', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('24', '1', '1805532085855638', '1805532085855638', '2', 'jenkel', '2', 'jenkel2', '1', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('25', '1', '1805532085855638', '1805532085855638', '1', 'pendidikan', '1', 'pendidikan1', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('26', '1', '1805532085855638', '1805532085855638', '2', 'pendidikan', '2', 'pendidikan2', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('27', '1', '1805532085855638', '1805532085855638', '3', 'pendidikan', '3', 'pendidikan3', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('28', '1', '1805532085855638', '1805532085855638', '4', 'pendidikan', '4', 'pendidikan4', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('29', '1', '1805532085855638', '1805532085855638', '5', 'pendidikan', '5', 'pendidikan5', '2', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('30', '1', '1805532085855638', '1805532085855638', '6', 'pendidikan', '6', 'pendidikan6', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('31', '1', '1805532085855638', '1805532085855638', '1', 'pekerjaan', '1', 'pekerjaan1', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('32', '1', '1805532085855638', '1805532085855638', '2', 'pekerjaan', '2', 'pekerjaan2', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('33', '1', '1805532085855638', '1805532085855638', '3', 'pekerjaan', '3', 'pekerjaan3', '1', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('34', '1', '1805532085855638', '1805532085855638', '4', 'pekerjaan', '4', 'pekerjaan4', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('35', '1', '1805532085855638', '1805532085855638', '5', 'pekerjaan', '5', 'pekerjaan5', '1', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);
INSERT INTO hasil_survei_detail VALUES ('36', '1', '1805532085855638', '1805532085855638', '6', 'pekerjaan', '6', 'pekerjaan6', '0', null, '2024-07-25 13:39:38', '2024-07-25 13:39:38', null);

-- ----------------------------
-- Table structure for `jawabansoalsurvei`
-- ----------------------------
DROP TABLE IF EXISTS `jawabansoalsurvei`;
CREATE TABLE `jawabansoalsurvei` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_survei` varchar(100) DEFAULT NULL,
  `id_responden` varchar(80) DEFAULT NULL,
  `id_soal` varchar(40) DEFAULT NULL,
  `no_soal` int(10) DEFAULT NULL,
  `jawaban` int(10) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `tglinput` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of jawabansoalsurvei
-- ----------------------------
INSERT INTO jawabansoalsurvei VALUES ('1', '1', 'SKM2407050838-240705090112', null, '1', '3', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:03', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('2', '1', 'SKM2407050838-240705090112', null, '2', '3', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:03', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('3', '1', 'SKM2407050838-240705090112', null, '3', '2', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:03', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('4', '1', 'SKM2407050838-240705090112', null, '4', '3', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:03', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('5', '1', 'SKM2407050838-240705090112', null, '5', '4', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:03', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('6', '1', 'SKM2407050838-240705090112', null, '6', '3', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:03', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('7', '1', 'SKM2407050838-240705090112', null, '7', '4', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:04', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('8', '1', 'SKM2407050838-240705090112', null, '8', '3', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:04', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('9', '1', 'SKM2407050838-240705090112', null, '9', '3', '1', '2024-07-05 16:46:48', '2024-07-05 21:02:04', '2024-07-16 16:46:48', null);
INSERT INTO jawabansoalsurvei VALUES ('10', '1', 'SKM2407050838-240725012914', null, '1', '3', '1', '2024-07-25 13:33:08', '2024-07-25 13:33:08', '2024-07-25 13:33:08', null);
INSERT INTO jawabansoalsurvei VALUES ('11', '1', 'SKM2407050838-240725012914', null, '2', '3', '1', '2024-07-25 13:33:08', '2024-07-25 13:33:08', '2024-07-25 13:33:08', null);
INSERT INTO jawabansoalsurvei VALUES ('12', '1', 'SKM2407050838-240725012914', null, '3', '4', '1', '2024-07-25 13:33:08', '2024-07-25 13:33:08', '2024-07-25 13:33:08', null);
INSERT INTO jawabansoalsurvei VALUES ('13', '1', 'SKM2407050838-240725012914', null, '4', '3', '1', '2024-07-25 13:33:08', '2024-07-25 13:33:08', '2024-07-25 13:33:08', null);
INSERT INTO jawabansoalsurvei VALUES ('14', '1', 'SKM2407050838-240725012914', null, '5', '2', '1', '2024-07-25 13:33:08', '2024-07-25 13:33:08', '2024-07-25 13:33:08', null);
INSERT INTO jawabansoalsurvei VALUES ('15', '1', 'SKM2407050838-240725012914', null, '6', '3', '1', '2024-07-25 13:33:09', '2024-07-25 13:33:09', '2024-07-25 13:33:09', null);
INSERT INTO jawabansoalsurvei VALUES ('16', '1', 'SKM2407050838-240725012914', null, '7', '3', '1', '2024-07-25 13:33:09', '2024-07-25 13:33:09', '2024-07-25 13:33:09', null);
INSERT INTO jawabansoalsurvei VALUES ('17', '1', 'SKM2407050838-240725012914', null, '8', '3', '1', '2024-07-25 13:33:09', '2024-07-25 13:33:09', '2024-07-25 13:33:09', null);
INSERT INTO jawabansoalsurvei VALUES ('18', '1', 'SKM2407050838-240725012914', null, '9', '2', '1', '2024-07-25 13:33:09', '2024-07-25 13:33:09', '2024-07-25 13:33:09', null);

-- ----------------------------
-- Table structure for `jawabansurvei`
-- ----------------------------
DROP TABLE IF EXISTS `jawabansurvei`;
CREATE TABLE `jawabansurvei` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) DEFAULT NULL,
  `id_survei` varchar(100) DEFAULT NULL,
  `jenis_survei` char(1) DEFAULT NULL,
  `id_responden` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `umur` varchar(20) DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `status_saran` char(1) DEFAULT '0',
  `jenis_layanan` text DEFAULT NULL,
  `tglinput` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of jawabansurvei
-- ----------------------------
INSERT INTO jawabansurvei VALUES ('1', 'SKM2407050838-240705090112', '1', '1', 'SKM2407050838-240705090112', 'ask.pruden@gmail.com', '4', '1', '5', '3', '1', 'asdasd asdasd', 'asdasd asdasd', '0', '', '2024-07-05 16:46:48', '2024-07-05 21:02:03', '2024-07-16 16:46:48', null);
INSERT INTO jawabansurvei VALUES ('2', 'SKM2407050838-240725012914', '1', '1', 'SKM2407050838-240725012914', 'vionars@gmail.com', '2', '2', '5', '5', '1', 'asd asdasda', 'asd asdasda', '0', null, '2024-07-25 13:33:08', '2024-07-25 13:33:08', '2024-07-25 13:33:08', null);

-- ----------------------------
-- Table structure for `referensi_umum`
-- ----------------------------
DROP TABLE IF EXISTS `referensi_umum`;
CREATE TABLE `referensi_umum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  `kelompok` varchar(20) NOT NULL,
  `tipe` char(1) NOT NULL,
  `namatipe` varchar(100) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of referensi_umum
-- ----------------------------
INSERT INTO referensi_umum VALUES ('8', 'agama', '', '', '', '1', 'Islam', 'islam', '1', '');
INSERT INTO referensi_umum VALUES ('9', 'agama', '', '', '', '2', 'Kristen', 'kristen', '1', '');
INSERT INTO referensi_umum VALUES ('10', 'agama', '', '', '', '3', 'Khatolik', 'khatolik', '1', '');
INSERT INTO referensi_umum VALUES ('11', 'agama', '', '', '', '4', 'Hindu', 'hindu', '1', '');
INSERT INTO referensi_umum VALUES ('12', 'agama', '', '', '', '5', 'Budha', 'budha', '1', '');
INSERT INTO referensi_umum VALUES ('13', 'agama', '', '', '', '6', 'Lainnya', 'lainnya', '1', '');
INSERT INTO referensi_umum VALUES ('14', 'jenkel', '', '', 'M', '1', 'Laki-laki', 'L', '1', '');
INSERT INTO referensi_umum VALUES ('15', 'jenkel', '', '', 'F', '2', 'Perempuan', 'P', '1', '');
INSERT INTO referensi_umum VALUES ('16', 'jenis_pendidikan', 'umum', '', '', '1', 'Umum', 'umum', '1', 'SD,SMP,SMA,SMK');
INSERT INTO referensi_umum VALUES ('17', 'jenis_pendidikan', 'khusus', '', '', '2', 'Khusus', 'khusus', '1', 'DI,DII,DIII,DIV, dst');
INSERT INTO referensi_umum VALUES ('18', 'tingkat_pendidikan', '1', '', '', '1', 'SD', 'sd', '1', 'Kelompok 1 = Jenis Pendidikan UMUM');
INSERT INTO referensi_umum VALUES ('19', 'tingkat_pendidikan', '1', '', '', '2', 'SLTP', 'smp', '1', 'Kelompok 1 = Jenis Pendidikan UMUM');
INSERT INTO referensi_umum VALUES ('20', 'tingkat_pendidikan', '1', '', '', '3', 'SLTA Sederajat', 'sma', '1', 'Kelompok 1 = Jenis Pendidikan UMUM');
INSERT INTO referensi_umum VALUES ('21', 'tingkat_pendidikan', '1', '', '', '4', 'Diploma (D1, D2, D3)', 'smk', '1', 'Kelompok 1 = Jenis Pendidikan UMUM');
INSERT INTO referensi_umum VALUES ('22', 'tingkat_pendidikan', '2', '', '', '5', 'Sarjana (S1)', 'd-1', '1', 'Kelompok 2 = Jenis Pendidikan KHUSUS');
INSERT INTO referensi_umum VALUES ('23', 'tingkat_pendidikan', '2', '', '', '6', 'Pasca Sarjana (S2/S3)', 'd-2', '1', 'Kelompok 2 = Jenis Pendidikan KHUSUS');
INSERT INTO referensi_umum VALUES ('29', 'marital', '', '', '', '1', 'Belum Kawin', 'bk', '1', 'Status Kawin');
INSERT INTO referensi_umum VALUES ('30', 'marital', '', '', '', '2', 'Kawin', 'k', '1', 'Status Kawin');
INSERT INTO referensi_umum VALUES ('31', 'marital', '', '', '', '3', 'Cerai Hidup', 'ch', '1', 'Status Kawin');
INSERT INTO referensi_umum VALUES ('32', 'marital', '', '', '', '4', 'Cerai Mati', 'cm', '1', 'Status Kawin');
INSERT INTO referensi_umum VALUES ('40', 'satuan', '', '', '', '4', 'Minggu', '', '', '');
INSERT INTO referensi_umum VALUES ('39', 'satuan', '', '', '', '3', 'Hari', '', '', '');
INSERT INTO referensi_umum VALUES ('38', 'satuan', '', '', '', '2', 'Jam', '', '', '');
INSERT INTO referensi_umum VALUES ('37', 'satuan', '', '', '', '1', 'Menit', '', '', '');
INSERT INTO referensi_umum VALUES ('41', 'satuan', '', '', '', '5', 'Bulan', '', '', '');
INSERT INTO referensi_umum VALUES ('42', 'satuan', '', '', '', '6', 'Tahun', '', '', '');
INSERT INTO referensi_umum VALUES ('90', 'tipe_soal', '', '', '', '1', 'Pilihan Ganda', '', '1', '');
INSERT INTO referensi_umum VALUES ('91', 'tipe_soal', '', '', '', '2', 'Checkbox', '', '1', '');
INSERT INTO referensi_umum VALUES ('92', 'tipe_soal', '', '', '', '3', 'Text', '', '1', '');
INSERT INTO referensi_umum VALUES ('93', 'tipe_responden', '', '', '', '1', 'Pilihan Ganda', '', '', '');
INSERT INTO referensi_umum VALUES ('94', 'tipe_responden', '', '', '', '2', 'Text', '', '', '');
INSERT INTO referensi_umum VALUES ('95', 'umur', '', '', '', '1', '<= 20 Tahun', '', '', '');
INSERT INTO referensi_umum VALUES ('96', 'umur', '', '', '', '2', '> 20 Tahun s.d 30 Tahun', '', '', '');
INSERT INTO referensi_umum VALUES ('97', 'umur', '', '', '', '3', '> 30 Tahun s.d 40 Tahun', '', '', '');
INSERT INTO referensi_umum VALUES ('98', 'umur', '', '', '', '4', '> 40 Tahun', '', '', '');
INSERT INTO referensi_umum VALUES ('99', 'pekerjaan', '', '', '', '1', 'PNS/TNI/POLRI', '', '', '');
INSERT INTO referensi_umum VALUES ('100', 'pekerjaan', '', '', '', '2', 'Karyawan/BUMN', '', '', '');
INSERT INTO referensi_umum VALUES ('101', 'pekerjaan', '', '', '', '3', 'Karyawan Swasta', '', '', '');
INSERT INTO referensi_umum VALUES ('102', 'pekerjaan', '', '', '', '4', 'Pelajar/Mahasiswa', '', '', '');
INSERT INTO referensi_umum VALUES ('103', 'pekerjaan', '', '', '', '5', 'Wiraswasta/Pengusaha', '', '', '');
INSERT INTO referensi_umum VALUES ('104', 'pekerjaan', '', '', '', '6', 'Lainnya', '', '', '');

-- ----------------------------
-- Table structure for `responden`
-- ----------------------------
DROP TABLE IF EXISTS `responden`;
CREATE TABLE `responden` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_survei` int(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT '',
  `email` varchar(100) DEFAULT '',
  `umur` char(2) DEFAULT '',
  `pendidikan` char(1) DEFAULT '',
  `pekerjaan` char(1) DEFAULT '',
  `ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of responden
-- ----------------------------

-- ----------------------------
-- Table structure for `soalsurvei`
-- ----------------------------
DROP TABLE IF EXISTS `soalsurvei`;
CREATE TABLE `soalsurvei` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_survei` int(10) DEFAULT NULL,
  `jenis_survei` char(1) DEFAULT NULL,
  `section_survei` int(4) DEFAULT NULL,
  `tipe_soal` char(1) DEFAULT NULL,
  `jml_soal` int(4) DEFAULT NULL,
  `jml_jawaban` int(4) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `no_soal` int(4) DEFAULT NULL,
  `nama_soal` varchar(200) DEFAULT NULL,
  `pil_a` varchar(200) DEFAULT NULL,
  `pil_b` varchar(200) DEFAULT NULL,
  `pil_c` varchar(200) DEFAULT NULL,
  `pil_d` varchar(200) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of soalsurvei
-- ----------------------------
INSERT INTO soalsurvei VALUES ('1', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '1', 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan informasi di Pangkalpinang ?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('2', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '2', 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan Informasi di Pangkalpinang ?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('3', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '3', 'Bagaimana pendapat Saudara tentang kecepatan waktu  dalam memberikan pelayanan informasi publik?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('4', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '4', 'Bagaimana pendapat saudara tentang kewajaran biaya/tarif dalam pelayanan informasi ?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('5', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '5', 'Bagaimana pendapat saudara tentang kewajaran biaya/tarif dalam pelayanan informasi  ?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('6', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '6', 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('7', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '7', 'Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan dalam memberikan layanan informasi publik?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('8', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '8', 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana layanan informasi publik di Pangkalpinang?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('9', '1', null, null, '1', '9', '4', 'soal_skm_6687F55246C3B', '9', 'Bagaimana pendapat Saudara tentang penanganan pengaduan penggunaan layanan informasi di Pangkalpinang?', null, null, null, null, null, '2024-07-05 20:29:54', '2024-07-16 16:54:55', null);
INSERT INTO soalsurvei VALUES ('10', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '1', 'Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);
INSERT INTO soalsurvei VALUES ('11', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '2', 'Bagaimana pemahaman saudara tentang kemudahan prosedur pelayanan di unit ini', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);
INSERT INTO soalsurvei VALUES ('12', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '3', 'Bagaimana pendapat saudara  tentang kecepatan waktu dalan memberikan layanan', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);
INSERT INTO soalsurvei VALUES ('13', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '4', 'Bagaimana pendapat Saudara tentang kewajaran tarif/biaya dalam pelayanan.', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);
INSERT INTO soalsurvei VALUES ('14', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '5', 'Bagaimana pendapat Saudara  tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);
INSERT INTO soalsurvei VALUES ('15', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '6', 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);
INSERT INTO soalsurvei VALUES ('16', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '7', 'Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);
INSERT INTO soalsurvei VALUES ('17', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '8', 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);
INSERT INTO soalsurvei VALUES ('18', '2', null, null, '1', '9', '4', 'soal_skm_6696453A0EA67', '9', 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan', null, null, null, null, null, '2024-07-16 17:02:34', '2024-07-16 17:02:34', null);

-- ----------------------------
-- Table structure for `survei`
-- ----------------------------
DROP TABLE IF EXISTS `survei`;
CREATE TABLE `survei` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(10) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tglsurvei` date DEFAULT NULL,
  `ket` text DEFAULT '',
  `status` char(1) DEFAULT NULL,
  `inputby` varchar(100) DEFAULT NULL,
  `status_publish` char(1) DEFAULT NULL,
  `tglpublish` date DEFAULT NULL,
  `url_publish` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- ----------------------------
-- Records of survei
-- ----------------------------
INSERT INTO survei VALUES ('1', '1', 'SKM2407050838', 'Survei testing 1', '2024-07-02', 'keterangan survei 1', '1', 'admin', '1', '2024-07-03', 'https://survei.beltim.go.id/view/SKM2407050838', '2024-07-05 20:09:00', '2024-07-05 20:42:32', null);
INSERT INTO survei VALUES ('2', '2', 'SKM2407111856', 'Survei Kepuasan Masyarakat Tentang Pemilukada 2024', '2024-07-10', 'asdasd', '1', 'admin', '1', '2024-07-25', 'https://survei.beltim.go.id/view/SKM2407111856', '2024-07-11 13:19:34', '2024-07-16 16:43:18', null);
