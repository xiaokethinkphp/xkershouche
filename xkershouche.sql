/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : xkershouche

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 09/05/2018 11:18:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for xk_brand
-- ----------------------------
DROP TABLE IF EXISTS `xk_brand`;
CREATE TABLE `xk_brand`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '品牌主键',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '品牌名称',
  `type` tinyint(255) NOT NULL DEFAULT 0 COMMENT '是否流行，1：流行；0：不流行',
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `initial` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '品牌首字母',
  `order` int(255) NOT NULL DEFAULT 0 COMMENT '排序',
  `pid` int(11) NOT NULL DEFAULT 0 COMMENT '父类id',
  `level` tinyint(255) NOT NULL DEFAULT 1 COMMENT '品牌级别，1：母品牌；2：子品牌；3：车型',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 58 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_brand
-- ----------------------------
INSERT INTO `xk_brand` VALUES (21, '现代', 1, 'm_13.png', 'X', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (20, '斯柯达', 1, 'm_10.png', 'S', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (19, '雪铁龙', 1, 'm_6.png', 'X', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (17, 'JEEP', 1, 'm_4.png', 'J', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (18, '标致', 0, 'm_5.png', 'B', 30, 0, 1);
INSERT INTO `xk_brand` VALUES (16, '奥克斯', 0, 'm_12.png', 'A', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (15, '奥迪', 1, 'm_9.png', 'A', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (14, '丰田', 1, 'm_7.png', 'F', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (13, '宝马', 1, 'm_3.png', 'B', 150, 0, 1);
INSERT INTO `xk_brand` VALUES (12, '奔驰', 1, 'm_2.png', 'B', 100, 0, 1);
INSERT INTO `xk_brand` VALUES (11, '大众', 1, 'm_8.png', 'D', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (22, '比亚迪', 0, 'm_15.png', 'B', 90, 0, 1);
INSERT INTO `xk_brand` VALUES (23, '铃木', 0, 'm_16.png', 'L', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (24, '福特', 1, 'm_17.png', 'F', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (25, '一汽大众', 1, NULL, '', 0, 11, 2);
INSERT INTO `xk_brand` VALUES (26, '马自达', 1, 'm_18.png', 'M', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (27, '沃尔沃', 1, 'm_19.png', 'W', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (28, '长城', 0, 'm_21.png', 'C', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (29, '三菱', 0, 'm_25.png', 'S', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (30, '本田', 1, 'm_26.png', 'B', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (31, '东风', 1, 'm_27.png', 'D', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (32, '起亚', 1, 'm_28.png', 'Q', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (33, '东南', 0, 'm_29.png', 'D', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (34, '尼桑', 1, 'm_30.png', 'N', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (35, '海马', 0, 'm_32.png', 'H', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (36, '吉利', 1, 'm_34.png', 'J', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (37, '江淮', 0, 'm_35.png', 'J', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (38, '陆风', 0, 'm_36.png', 'L', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (39, '江铃', 0, 'm_37.png', 'J', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (40, '金杯', 0, 'm_39.png', 'J', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (41, '菲亚特', 0, 'm_40.png', 'F', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (42, '依维柯', 1, 'm_41.png', 'Y', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (43, '奇瑞', 1, 'm_42.png', 'Q', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (44, '五菱', 1, 'm_48.png', 'W', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (45, '雪佛兰', 1, 'm_49.png', 'X', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (46, '克莱斯勒', 0, 'm_51.png', 'K', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (47, '一汽', 1, 'm_53.png', 'Y', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (48, '北京奔驰', 1, NULL, NULL, 0, 12, 2);
INSERT INTO `xk_brand` VALUES (49, '进口奔驰', 0, NULL, NULL, 200, 12, 2);
INSERT INTO `xk_brand` VALUES (50, '华晨宝马', 1, NULL, NULL, 0, 13, 2);
INSERT INTO `xk_brand` VALUES (51, '进口宝马', 1, NULL, NULL, 0, 13, 2);
INSERT INTO `xk_brand` VALUES (52, '广州本田', 1, NULL, NULL, 0, 30, 2);
INSERT INTO `xk_brand` VALUES (53, '东风本田', 1, NULL, NULL, 0, 30, 2);
INSERT INTO `xk_brand` VALUES (54, '福建奔驰', 1, NULL, NULL, 150, 12, 2);
INSERT INTO `xk_brand` VALUES (55, '宝马3系', 1, NULL, NULL, 0, 50, 3);
INSERT INTO `xk_brand` VALUES (56, '宝马1系', 1, NULL, NULL, 0, 50, 3);
INSERT INTO `xk_brand` VALUES (57, '宝马5系', 1, NULL, NULL, 0, 50, 3);

SET FOREIGN_KEY_CHECKS = 1;