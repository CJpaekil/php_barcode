/*
 Navicat Premium Data Transfer

 Source Server         : qw
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : print_barcode

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 03/09/2021 22:40:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_sku` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_qty` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_date` datetime(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, '564654', 'SS8765', 'Black T-Shirt', '1', '2021-08-10 10:23:04.000000');
INSERT INTO `product` VALUES (7, '564654', 'SS8734', 'Grey Pants', '2', NULL);
INSERT INTO `product` VALUES (11, '54-98-7887', 'NG9273', 'Black Book', '1', NULL);
INSERT INTO `product` VALUES (12, '476372', 'NP4536', 'White Skirt', '4', NULL);

SET FOREIGN_KEY_CHECKS = 1;
