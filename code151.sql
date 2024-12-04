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

 Date: 04/12/2024 11:07:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for code_151
-- ----------------------------
DROP TABLE IF EXISTS `code_151`;
CREATE TABLE `code_151`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `match_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `result` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of code_151
-- ----------------------------
INSERT INTO `code_151` VALUES (5, 'Leicester Vs West Ham', 'Leicester Vs West Ham (2024-12-03).png', 'FT 0:1/4 1.51 -1.66 (3 : 1)', 'W', '2024-12-03', '2024-12-03 21:58:05', '2024-12-04 10:31:10');
INSERT INTO `code_151` VALUES (9, 'Grasshoper Vs Zurich', 'Grasshoper Vs Zurich (2024-12-03).png', 'HT 1/4:0 -2.00 1.51 (0 : 1)', 'W', '2024-12-03', '2024-12-03 22:02:57', '2024-12-04 10:38:57');
INSERT INTO `code_151` VALUES (12, 'MTK Budapest Vs Paksi', 'MTK Budapest Vs Paksi (2024-12-03).png', 'HT 0:1/4 2.44 1.51 (3 : 1)', 'W', '2024-12-03', '2024-12-03 23:43:25', '2024-12-04 10:39:01');
INSERT INTO `code_151` VALUES (13, 'Finland W Vs Scotland W', 'Finland W Vs Scotland W (2024-12-03).png', 'HT 0:0 1.51 2.40 (2 : 0)', 'W', '2024-12-03', '2024-12-03 23:43:53', '2024-12-04 10:39:40');
INSERT INTO `code_151` VALUES (15, 'Huddersfield Town Vs Wigan Athletic', 'Huddersfield Town Vs Wigan Athletic (2024-12-03).png', 'HT 0:1/2 2.40 1.56 (1 : 0)', 'W', '2024-12-03', '2024-12-03 23:45:24', '2024-12-04 10:39:09');

SET FOREIGN_KEY_CHECKS = 1;
