/*
 Navicat MySQL Data Transfer

 Source Server         : user
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : blog

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 07/05/2020 08:19:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` int(25) NOT NULL,
  `create_time` int(255) NOT NULL,
  `update_time` int(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'ADA', '123', 123, 0, 0);
INSERT INTO `admin` VALUES (17, 'HKLI', '1233', 777, 0, 0);
INSERT INTO `admin` VALUES (13, 'ISNVB', '456', 456, 0, 0);
INSERT INTO `admin` VALUES (14, 'cccgg', '999', 999, 0, 0);
INSERT INTO `admin` VALUES (16, 'GVVD', '1233', 111, 0, 0);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `classid` int(10) NOT NULL,
  `create_time` int(255) NOT NULL,
  `update_time` int(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '家电', 1, 0, 0);
INSERT INTO `category` VALUES (6, '出行', 2, 0, 0);
INSERT INTO `category` VALUES (3, '手机', 3, 0, 0);
INSERT INTO `category` VALUES (4, '智能', 4, 0, 0);
INSERT INTO `category` VALUES (5, '鞋', 5, 0, 0);

-- ----------------------------
-- Table structure for commodity
-- ----------------------------
DROP TABLE IF EXISTS `commodity`;
CREATE TABLE `commodity`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `number` int(10) NOT NULL,
  `cid` int(5) NOT NULL,
  `create_time` int(255) NOT NULL,
  `update_time` int(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of commodity
-- ----------------------------
INSERT INTO `commodity` VALUES (1, '121', 3.00, 13, 3, 0, 0);
INSERT INTO `commodity` VALUES (2, '1311', 10.50, 1313, 2, 0, 0);
INSERT INTO `commodity` VALUES (3, '999', 19.00, 277, 1, 0, 0);
INSERT INTO `commodity` VALUES (4, '356', 121.00, 113, 4, 0, 0);

SET FOREIGN_KEY_CHECKS = 1;
