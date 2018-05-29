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

 Date: 28/05/2018 21:08:58
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
) ENGINE = MyISAM AUTO_INCREMENT = 66 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_brand
-- ----------------------------
INSERT INTO `xk_brand` VALUES (21, '现代', 1, 'm_13.png', 'X', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (20, '斯柯达', 1, 'm_10.png', 'S', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (19, '雪铁龙', 1, 'm_6.png', 'X', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (17, 'JEEP', 1, 'm_4.png', 'J', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (18, '标致', 0, 'm_5.png', 'B', 30, 0, 1);
INSERT INTO `xk_brand` VALUES (16, '奥克斯', 0, 'm_12.png', 'A', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (15, '奥迪', 1, 'm_9.png', 'A', 5, 0, 1);
INSERT INTO `xk_brand` VALUES (14, '丰田', 1, 'm_7.png', 'F', 0, 0, 1);
INSERT INTO `xk_brand` VALUES (13, '宝马', 1, 'm_3.png', 'B', 150, 0, 1);
INSERT INTO `xk_brand` VALUES (12, '奔驰', 1, 'm_2.png', 'B', 200, 0, 1);
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
INSERT INTO `xk_brand` VALUES (55, '宝马3系', 1, NULL, NULL, 1, 50, 3);
INSERT INTO `xk_brand` VALUES (56, '宝马1系', 1, NULL, NULL, 2, 50, 3);
INSERT INTO `xk_brand` VALUES (57, '宝马5系', 1, NULL, NULL, 0, 50, 3);
INSERT INTO `xk_brand` VALUES (58, '宝马1系（进口）', 1, NULL, NULL, 0, 51, 3);
INSERT INTO `xk_brand` VALUES (59, '奔驰C级', 1, NULL, NULL, 0, 48, 3);
INSERT INTO `xk_brand` VALUES (60, '一汽大众奥迪', 1, NULL, NULL, 3, 15, 2);
INSERT INTO `xk_brand` VALUES (61, '进口奥迪', 1, NULL, NULL, 2, 15, 2);
INSERT INTO `xk_brand` VALUES (62, '奥迪A3', 1, NULL, NULL, 0, 60, 3);
INSERT INTO `xk_brand` VALUES (63, '奥迪A4L', 1, NULL, NULL, 0, 60, 3);
INSERT INTO `xk_brand` VALUES (64, '奥迪A6L', 1, NULL, NULL, 0, 60, 3);
INSERT INTO `xk_brand` VALUES (65, '奔驰E级', 1, NULL, NULL, 0, 48, 3);

-- ----------------------------
-- Table structure for xk_carmodel
-- ----------------------------
DROP TABLE IF EXISTS `xk_carmodel`;
CREATE TABLE `xk_carmodel`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `style` int(255) NOT NULL COMMENT '车款',
  `edition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '车版本',
  `carid` int(11) NOT NULL COMMENT '对应的车品牌',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `weiyi`(`style`, `edition`, `carid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_carmodel
-- ----------------------------
INSERT INTO `xk_carmodel` VALUES (1, 2018, '118i 时尚版', 56);
INSERT INTO `xk_carmodel` VALUES (2, 2018, '118i 运动版', 56);
INSERT INTO `xk_carmodel` VALUES (3, 2016, '118i 运动版', 56);
INSERT INTO `xk_carmodel` VALUES (4, 2017, '118i 运动版', 56);
INSERT INTO `xk_carmodel` VALUES (5, 2015, '118i 运动版', 56);
INSERT INTO `xk_carmodel` VALUES (6, 2014, '118i 运动版', 56);
INSERT INTO `xk_carmodel` VALUES (7, 2013, '118i 运动版', 56);
INSERT INTO `xk_carmodel` VALUES (8, 2013, '118i 运动版', 55);
INSERT INTO `xk_carmodel` VALUES (9, 2015, '118i 领先型', 58);
INSERT INTO `xk_carmodel` VALUES (10, 2018, 'C 200 运动版', 59);
INSERT INTO `xk_carmodel` VALUES (11, 2018, 'C 200 成就特别版', 59);
INSERT INTO `xk_carmodel` VALUES (13, 2018, 'TFSI 时尚型', 62);
INSERT INTO `xk_carmodel` VALUES (14, 2018, 'TFSI 风尚型', 62);
INSERT INTO `xk_carmodel` VALUES (15, 2018, 'C 300 运动版', 59);
INSERT INTO `xk_carmodel` VALUES (16, 2018, '180 L 动感型运动版', 59);
INSERT INTO `xk_carmodel` VALUES (17, 2018, '180 L 时尚型运动版', 59);
INSERT INTO `xk_carmodel` VALUES (18, 2016, 'C 200 运动版', 59);

-- ----------------------------
-- Table structure for xk_level
-- ----------------------------
DROP TABLE IF EXISTS `xk_level`;
CREATE TABLE `xk_level`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_level
-- ----------------------------
INSERT INTO `xk_level` VALUES (1, '微型车', '&#xe7b8;', 5);
INSERT INTO `xk_level` VALUES (2, '小型车', '&#xe7b7;', 4);
INSERT INTO `xk_level` VALUES (3, '紧凑型车', '&#xe7b5;', 2);
INSERT INTO `xk_level` VALUES (4, '中型车', '&#xe7ba;', 3);
INSERT INTO `xk_level` VALUES (5, '中大型车', '&#xe7b9;', 8);
INSERT INTO `xk_level` VALUES (6, '大型车', '&#xe7b6;', 7);

SET FOREIGN_KEY_CHECKS = 1;
