/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : skripsi_cuti

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-07-24 13:49:38
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
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO admin VALUES ('101', null, 'admin', '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', 'dahrul.ulum@gmail.com', '1', '1', '2020-06-25 14:12:55', null, null);
INSERT INTO admin VALUES ('271', null, 'dafa', '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', 'dafapratama.muharam@gmail.com', '2', '1', '2024-06-22 20:24:53', '2024-06-22 20:24:53', null);

-- ----------------------------
-- Table structure for `fppc`
-- ----------------------------
DROP TABLE IF EXISTS `fppc`;
CREATE TABLE `fppc` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `no_fppc` varchar(20) DEFAULT NULL,
  `tgl_fppc` date DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of golongan
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of jeniscuti
-- ----------------------------
INSERT INTO jeniscuti VALUES ('1', 'Cuti Tahunan', '2024-07-24 06:09:05', '2024-07-24 06:12:02', null);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of pangkat
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of pegawai
-- ----------------------------

-- ----------------------------
-- Table structure for `permohonan_cuti`
-- ----------------------------
DROP TABLE IF EXISTS `permohonan_cuti`;
CREATE TABLE `permohonan_cuti` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of permohonan_cuti
-- ----------------------------

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
