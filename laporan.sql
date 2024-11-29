/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100316 (10.3.16-MariaDB)
 Source Host           : 127.0.0.1:3306
 Source Schema         : laporan

 Target Server Type    : MySQL
 Target Server Version : 100316 (10.3.16-MariaDB)
 File Encoding         : 65001

 Date: 29/11/2024 10:40:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for deskripsi
-- ----------------------------
DROP TABLE IF EXISTS `deskripsi`;
CREATE TABLE `deskripsi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `deskripsi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_api` int NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for periode
-- ----------------------------
DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` int NOT NULL,
  `bulan` int NOT NULL,
  `tahun` int NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_libur` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 372 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
