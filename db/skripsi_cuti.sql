/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : skripsi_cuti

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-07-04 21:23:27
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(40) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` char(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status_aktif` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO admin VALUES ('101', 'admin', null, null, 'dahrul.ulum@gmail.com', null, '1', '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', null, null, '2020-06-25 14:12:55', null, '2021-01-10 23:00:55');
INSERT INTO admin VALUES ('271', 'dafa', null, null, 'dafapratama.muharam@gmail.com', null, '2', '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', null, '1', '2024-06-22 20:24:53', '2024-06-22 20:24:53', null);

-- ----------------------------
-- Table structure for `admin_old`
-- ----------------------------
DROP TABLE IF EXISTS `admin_old`;
CREATE TABLE `admin_old` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT '',
  `level` char(1) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of admin_old
-- ----------------------------
INSERT INTO admin_old VALUES ('1', 'admin', '$2y$10$K9o5RXw.2qeujixYtl17ROaQch6w3mydLdXkbFLW68AgXEMGzDs0y', '1', null, null, null);

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
  `nama_jabatan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of jabatan
-- ----------------------------

-- ----------------------------
-- Table structure for `jeniscuti`
-- ----------------------------
DROP TABLE IF EXISTS `jeniscuti`;
CREATE TABLE `jeniscuti` (
  `kd_jenis_cuti` int(3) NOT NULL AUTO_INCREMENT,
  `nm_jenis_cuti` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_jenis_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of jeniscuti
-- ----------------------------

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
  `nama_pegawai` varchar(40) DEFAULT NULL,
  `masa_kerja` text DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
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
  `kd_unit_kerja` int(3) DEFAULT NULL,
  `nm_unit_kerja` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of unitkerja
-- ----------------------------
