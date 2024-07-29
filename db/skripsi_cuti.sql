/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : skripsi_cuti

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-07-29 23:51:48
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `id_admin` varchar(3) DEFAULT '',
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` char(1) DEFAULT '',
  `status_aktif` char(1) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO admin VALUES ('101', null, 'admin', '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', 'dahrul.ulum@gmail.com', '1', '1', '2020-06-25 14:12:55', null, null);
INSERT INTO admin VALUES ('271', null, 'dafa', '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', 'dafapratama.muharam@gmail.com', '2', '1', '2024-06-22 20:24:53', '2024-06-22 20:24:53', null);
INSERT INTO admin VALUES ('272', '1', '123456789', '$2y$10$63FA9lXx8BowHpTWr.4rt.TUKA4b6TJYQbMvji3W0i3xYNfJu/jyG', null, '2', '', '2024-07-28 14:15:22', '2024-07-28 14:15:22', null);

-- ----------------------------
-- Table structure for `fppc`
-- ----------------------------
DROP TABLE IF EXISTS `fppc`;
CREATE TABLE `fppc` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `no_fppc` varchar(20) DEFAULT NULL,
  `tgl_fppc` date DEFAULT NULL,
  `no_pc` varchar(10) DEFAULT NULL,
  `catatan_cuti` varchar(50) DEFAULT NULL,
  `atasan_langsung` varchar(20) DEFAULT NULL,
  `catatan_atasan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of fppc
-- ----------------------------

-- ----------------------------
-- Table structure for `golongan`
-- ----------------------------
DROP TABLE IF EXISTS `golongan`;
CREATE TABLE `golongan` (
  `kd_golongan` int(3) NOT NULL AUTO_INCREMENT,
  `nm_golongan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_golongan`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of golongan
-- ----------------------------
INSERT INTO golongan VALUES ('1', 'I/A', '2024-07-28 14:11:36', '2024-07-28 14:11:36', null);
INSERT INTO golongan VALUES ('2', 'I/B', '2024-07-28 14:11:43', '2024-07-28 14:11:43', null);
INSERT INTO golongan VALUES ('3', 'I/C', '2024-07-28 14:11:49', '2024-07-28 14:11:49', null);
INSERT INTO golongan VALUES ('4', 'I/D', '2024-07-28 14:11:55', '2024-07-28 14:11:55', null);
INSERT INTO golongan VALUES ('5', 'II/A', '2024-07-28 14:12:00', '2024-07-28 14:12:00', null);
INSERT INTO golongan VALUES ('6', 'II/B', '2024-07-28 14:12:06', '2024-07-28 14:12:06', null);
INSERT INTO golongan VALUES ('7', 'II/C', '2024-07-28 14:12:13', '2024-07-28 14:12:13', null);
INSERT INTO golongan VALUES ('8', 'II/D', '2024-07-28 14:12:18', '2024-07-28 14:12:18', null);
INSERT INTO golongan VALUES ('9', 'III/A', '2024-07-28 14:12:25', '2024-07-28 14:12:25', null);
INSERT INTO golongan VALUES ('10', 'III/B', '2024-07-28 14:12:30', '2024-07-28 14:12:30', null);
INSERT INTO golongan VALUES ('11', 'III/C', '2024-07-28 14:12:36', '2024-07-28 14:12:36', null);
INSERT INTO golongan VALUES ('12', 'III/D', '2024-07-28 14:12:42', '2024-07-28 14:12:42', null);
INSERT INTO golongan VALUES ('13', 'IV/A', '2024-07-28 14:12:48', '2024-07-28 14:12:48', null);
INSERT INTO golongan VALUES ('14', 'IV/B', '2024-07-28 14:12:54', '2024-07-28 14:12:54', null);
INSERT INTO golongan VALUES ('15', 'IV/C', '2024-07-28 14:13:00', '2024-07-28 14:13:00', null);
INSERT INTO golongan VALUES ('16', 'IV/D', '2024-07-28 14:13:05', '2024-07-28 14:13:05', null);
INSERT INTO golongan VALUES ('17', 'IV/E', '2024-07-28 14:13:10', '2024-07-28 14:13:10', null);

-- ----------------------------
-- Table structure for `jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `kd_jabatan` int(3) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(100) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO jabatan VALUES ('1', 'Sekretaris', '2024-07-24 05:59:18', '2024-07-24 05:59:18', null);

-- ----------------------------
-- Table structure for `jeniscuti`
-- ----------------------------
DROP TABLE IF EXISTS `jeniscuti`;
CREATE TABLE `jeniscuti` (
  `kd_jenis_cuti` int(3) NOT NULL AUTO_INCREMENT,
  `nm_jenis_cuti` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_jenis_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of jeniscuti
-- ----------------------------
INSERT INTO jeniscuti VALUES ('1', 'Cuti Tahunan', '2024-07-24 06:09:05', '2024-07-24 06:12:02', null);
INSERT INTO jeniscuti VALUES ('2', 'Cuti Sakit', '2024-07-28 14:13:56', '2024-07-28 14:13:56', null);
INSERT INTO jeniscuti VALUES ('3', 'Cuti Alasan Penting', '2024-07-28 14:14:09', '2024-07-28 14:14:09', null);
INSERT INTO jeniscuti VALUES ('4', 'Cuti Besar', '2024-07-28 14:14:18', '2024-07-28 14:14:18', null);
INSERT INTO jeniscuti VALUES ('5', 'Cuti Melahirkan', '2024-07-28 14:14:27', '2024-07-28 14:14:27', null);
INSERT INTO jeniscuti VALUES ('6', 'Cuti diluar Tanggungan Negara', '2024-07-28 14:14:42', '2024-07-28 14:14:42', null);

-- ----------------------------
-- Table structure for `pangkat`
-- ----------------------------
DROP TABLE IF EXISTS `pangkat`;
CREATE TABLE `pangkat` (
  `kd_pangkat` int(3) NOT NULL AUTO_INCREMENT,
  `nm_pangkat` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_pangkat`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of pangkat
-- ----------------------------
INSERT INTO pangkat VALUES ('1', 'Juru Muda', '2024-07-28 14:08:32', '2024-07-28 14:08:32', null);
INSERT INTO pangkat VALUES ('2', 'Juru Muda Tingkat I', '2024-07-28 14:08:43', '2024-07-28 14:08:43', null);
INSERT INTO pangkat VALUES ('3', 'Juru', '2024-07-28 14:08:50', '2024-07-28 14:08:50', null);
INSERT INTO pangkat VALUES ('4', 'Juru Tingka I', '2024-07-28 14:08:59', '2024-07-28 14:08:59', null);
INSERT INTO pangkat VALUES ('5', 'Pengatur Muda', '2024-07-28 14:09:35', '2024-07-28 14:09:35', null);
INSERT INTO pangkat VALUES ('6', 'Pengatur Muda Tingkat I', '2024-07-28 14:09:49', '2024-07-28 14:09:49', null);
INSERT INTO pangkat VALUES ('7', 'Pengatur', '2024-07-28 14:09:58', '2024-07-28 14:09:58', null);
INSERT INTO pangkat VALUES ('8', 'Pengatur Tingkat I', '2024-07-28 14:10:07', '2024-07-28 14:10:07', null);
INSERT INTO pangkat VALUES ('9', 'Pembina', '2024-07-28 14:10:28', '2024-07-28 14:10:28', null);
INSERT INTO pangkat VALUES ('10', 'Pembina Tingkat I', '2024-07-28 14:10:37', '2024-07-28 14:10:37', null);
INSERT INTO pangkat VALUES ('11', 'Pembina Muda', '2024-07-28 14:10:44', '2024-07-28 14:10:44', null);
INSERT INTO pangkat VALUES ('12', 'Pembina Madya', '2024-07-28 14:11:14', '2024-07-28 14:11:14', null);
INSERT INTO pangkat VALUES ('13', 'Pembina Utama', '2024-07-28 14:11:24', '2024-07-28 14:11:24', null);

-- ----------------------------
-- Table structure for `pegawai`
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` int(3) NOT NULL AUTO_INCREMENT,
  `nip` varchar(15) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT '',
  `masa_kerja` text DEFAULT NULL,
  `jenkel` char(1) DEFAULT '',
  `alamat` text DEFAULT NULL,
  `nohp` varchar(15) DEFAULT '',
  `username` varchar(100) DEFAULT '',
  `password` varchar(100) DEFAULT NULL,
  `kd_pangkat` varchar(10) DEFAULT NULL,
  `kd_jabatan` varchar(10) DEFAULT NULL,
  `kd_golongan` varchar(10) DEFAULT NULL,
  `kd_unitkerja` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO pegawai VALUES ('1', '123456789', 'Herlinas', '10 tahun', null, 'Jl. Gaparman 1A  Pangkalpinang', '0812345646', 'herlina', '$2y$10$XLCiYWYO4uZLMfDNJfCu2.jvj6Mqu8CWnQgSbQEgrGcCoA4tx9cvS', '7', '1', '11', '1', '2024-07-28 14:15:22', '2024-07-28 14:29:52', null);

-- ----------------------------
-- Table structure for `permohonan_cuti`
-- ----------------------------
DROP TABLE IF EXISTS `permohonan_cuti`;
CREATE TABLE `permohonan_cuti` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(10) DEFAULT NULL,
  `jenis_cuti` char(2) DEFAULT NULL,
  `no_pc` varchar(20) DEFAULT NULL,
  `tgl_pc` date DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `lama_cuti` varchar(20) DEFAULT NULL,
  `alasan` varchar(200) DEFAULT NULL,
  `file_pc` varchar(100) DEFAULT NULL,
  `alamat_cuti` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of permohonan_cuti
-- ----------------------------
INSERT INTO permohonan_cuti VALUES ('1', '1', '3', '1', '2024-07-03', '66a667e2b84ef', '2024-07-04', '2024-07-08', '2', 'urusan keluarga', null, 'di bandung', '2024-07-28 15:46:42', '2024-07-28 15:46:42', null);

-- ----------------------------
-- Table structure for `unitkerja`
-- ----------------------------
DROP TABLE IF EXISTS `unitkerja`;
CREATE TABLE `unitkerja` (
  `kd_unitkerja` int(3) NOT NULL AUTO_INCREMENT,
  `nm_unitkerja` varchar(100) DEFAULT '',
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_unitkerja`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of unitkerja
-- ----------------------------
INSERT INTO unitkerja VALUES ('1', 'Bidang Sekretariat', '<p>Jl. Leparpongok No.222</p>', '2024-07-24 04:25:07', '2024-07-24 04:28:51', null);
