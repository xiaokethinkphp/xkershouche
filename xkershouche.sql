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

 Date: 19/06/2018 11:33:05
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
INSERT INTO `xk_carmodel` VALUES (2, 2010, '118i 运动版', 56);
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
-- Table structure for xk_cars
-- ----------------------------
DROP TABLE IF EXISTS `xk_cars`;
CREATE TABLE `xk_cars`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `county_id` int(11) NULL DEFAULT NULL,
  `brand_level1` int(255) NULL DEFAULT NULL COMMENT '母品牌',
  `brand_level2` int(255) NULL DEFAULT NULL COMMENT '子品牌',
  `brand_level3` int(255) NULL DEFAULT NULL COMMENT '车品牌',
  `carmodel` int(255) NULL DEFAULT NULL COMMENT '车型',
  `level` int(255) NULL DEFAULT NULL,
  `price` float(10, 2) NULL DEFAULT NULL COMMENT '售价',
  `new_price` float(10, 2) NULL DEFAULT NULL COMMENT '新车售价',
  `tax` float(255, 0) NULL DEFAULT NULL COMMENT '购置税',
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '颜色',
  `gas` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '排量',
  `transmission` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `plate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kilometer` float(255, 0) NULL DEFAULT NULL COMMENT '里程',
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否国产',
  `emission` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '排放标准',
  `insurance` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '交强险时间',
  `inspect` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '年检时间',
  `listtime` int(255) NULL DEFAULT NULL COMMENT '上架时间',
  `status` int(255) NOT NULL DEFAULT 2 COMMENT '1：上架0：下架-1：已售2:未审核',
  `member_id` int(11) NULL DEFAULT NULL,
  `details` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '补充描述',
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `clicks` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_cars
-- ----------------------------
INSERT INTO `xk_cars` VALUES (16, 120000, 120100, 120101, 13, 51, 58, 9, 1, 12.80, 20.00, 1, '白色', '1.0L', '手动', '1527782400', 13, '国产', '国一', '1527782400', '1527782400', 1528857148, 2, 12, '111', '宝马 进口宝马 宝马1系（进口） 2015款 118i 领先型', 12);
INSERT INTO `xk_cars` VALUES (17, 110000, 110100, 110101, 13, 50, 55, 8, 1, 16.00, 0.00, 0, '白色', '1.0L', '手动', '1527782400', 0, '国产', '国一', '1527782400', '1527782400', 1528857195, 1, 12, '', '宝马 华晨宝马 宝马3系 2013款 118i 运动版', 0);
INSERT INTO `xk_cars` VALUES (18, 120000, 120100, 120101, 13, 50, 55, 8, 1, 12.00, 13.00, 1, '黑色', '3.5L', '手动', '1528300800', 12, '国产', '国一', '1529942400', '1528300800', 1529119637, 2, 1, '昨天买的今天卖', '宝马 华晨宝马 宝马3系 2013款 118i 运动版', 0);

-- ----------------------------
-- Table structure for xk_cars_selfattribute
-- ----------------------------
DROP TABLE IF EXISTS `xk_cars_selfattribute`;
CREATE TABLE `xk_cars_selfattribute`  (
  `cars_id` int(10) NOT NULL,
  `selfattribute_id` int(11) NOT NULL,
  `selfattribute_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  INDEX `cars_id1`(`cars_id`) USING BTREE,
  CONSTRAINT `cars_id1` FOREIGN KEY (`cars_id`) REFERENCES `xk_cars` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_cars_selfattribute
-- ----------------------------
INSERT INTO `xk_cars_selfattribute` VALUES (16, 28, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 22, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 1, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 2, '运营');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 3, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 5, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 6, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 7, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 8, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 9, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 10, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 11, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 12, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 13, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 14, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 15, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 16, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 17, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 18, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 19, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 20, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 23, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 24, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 25, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 26, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 27, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (16, 29, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 28, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 22, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 1, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 2, '运营');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 3, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 5, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 6, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 7, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 8, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 9, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 10, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 11, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 12, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 13, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 14, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 15, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 16, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 17, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 18, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 19, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 20, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 23, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 24, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 25, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 26, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 27, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (17, 29, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 28, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 22, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 1, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 2, '运营');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 3, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 5, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 6, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 7, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 8, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 9, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 10, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 11, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 12, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 13, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 14, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 15, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 16, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 17, '有');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 18, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 19, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 20, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 23, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 24, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 25, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 26, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 27, '是');
INSERT INTO `xk_cars_selfattribute` VALUES (18, 29, '有');

-- ----------------------------
-- Table structure for xk_carsimg
-- ----------------------------
DROP TABLE IF EXISTS `xk_carsimg`;
CREATE TABLE `xk_carsimg`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cars_id` int(10) NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cars_id`(`cars_id`) USING BTREE,
  CONSTRAINT `cars_id` FOREIGN KEY (`cars_id`) REFERENCES `xk_cars` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_carsimg
-- ----------------------------
INSERT INTO `xk_carsimg` VALUES (34, 16, 'cars/20180613/c9bea0ce75c426e619813ba492abaaf1.jpg');
INSERT INTO `xk_carsimg` VALUES (35, 16, 'cars/20180613/6c31678ed26282863d5eb7daed84620d.jpg');
INSERT INTO `xk_carsimg` VALUES (36, 16, 'cars/20180613/7c37795f221cd8708ba1d78be1e06056.jpg');
INSERT INTO `xk_carsimg` VALUES (37, 16, 'cars/20180613/a22eddfc4e31cdf1b540e3ea3d80d047.jpg');
INSERT INTO `xk_carsimg` VALUES (38, 16, 'cars/20180613/cecd8a570d06b022bf8eb2b5ada4e84b.jpg');
INSERT INTO `xk_carsimg` VALUES (39, 16, 'cars/20180613/62cd2ca6cbcf67303f60c3b2495a39f5.jpg');
INSERT INTO `xk_carsimg` VALUES (40, 16, 'cars/20180613/7dd4aa01754d60380c044d71f09467f3.jpg');
INSERT INTO `xk_carsimg` VALUES (41, 16, 'cars/20180613/78c684a2aa050b3d2403b07b3e832c43.jpg');
INSERT INTO `xk_carsimg` VALUES (42, 17, 'cars/20180613/4ffa8116ad102beb803c02701d3105e9.jpg');
INSERT INTO `xk_carsimg` VALUES (43, 17, 'cars/20180613/fd221c086c3437641e3c4b71ec2f2a0b.jpg');
INSERT INTO `xk_carsimg` VALUES (44, 17, 'cars/20180613/4b56b74bf3750062c474ca26f053edf6.jpg');
INSERT INTO `xk_carsimg` VALUES (45, 17, 'cars/20180613/0bf1ccc86b95fb94cd424a5cfadbcad7.jpg');
INSERT INTO `xk_carsimg` VALUES (46, 17, 'cars/20180613/dd0888f46a1da061ffe4d709c5df23f8.jpg');
INSERT INTO `xk_carsimg` VALUES (47, 17, 'cars/20180613/a4f3ab3712859ddf1ab54d803624ea35.jpg');
INSERT INTO `xk_carsimg` VALUES (48, 18, 'cars/20180616/1e647e967c93fd04044a925705c3af49.jpg');
INSERT INTO `xk_carsimg` VALUES (49, 18, 'cars/20180616/d38da95b7e9ccf046db164d0d080424b.jpg');
INSERT INTO `xk_carsimg` VALUES (50, 18, 'cars/20180616/532117216bb8709d0f1f468f3c0030bb.jpg');
INSERT INTO `xk_carsimg` VALUES (51, 18, 'cars/20180616/3d1a8d5d0464ebcc9d2b3e3bb52bc673.jpg');
INSERT INTO `xk_carsimg` VALUES (52, 18, 'cars/20180616/877a60e0107b23c28713ef3cc97c32d2.jpg');
INSERT INTO `xk_carsimg` VALUES (53, 18, 'cars/20180616/52f0f6f7efa18654788543d075c15c17.jpg');

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
INSERT INTO `xk_level` VALUES (6, '大型车', '&#xe7b6;', 7);

-- ----------------------------
-- Table structure for xk_member
-- ----------------------------
DROP TABLE IF EXISTS `xk_member`;
CREATE TABLE `xk_member`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名称',
  `member_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户密码',
  `mobile_number` float(20, 0) NOT NULL COMMENT '用户手机',
  `province_id` int(11) NOT NULL COMMENT '用户省',
  `city_id` int(11) NOT NULL COMMENT '用户市',
  `county_id` int(11) NOT NULL COMMENT '用户县',
  `register_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `member_name`(`member_name`) USING BTREE,
  UNIQUE INDEX `mobile_number`(`mobile_number`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_member
-- ----------------------------
INSERT INTO `xk_member` VALUES (1, '11', 'e10adc3949ba59abbe56e057f20f883e', 13344445440, 1, 1, 1, 1527782400);
INSERT INTO `xk_member` VALUES (12, '1123', 'e10adc3949ba59abbe56e057f20f883e', 15040360448, 120000, 120100, 120102, 1527782400);

-- ----------------------------
-- Table structure for xk_selfattribute
-- ----------------------------
DROP TABLE IF EXISTS `xk_selfattribute`;
CREATE TABLE `xk_selfattribute`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isshow` tinyint(1) NOT NULL DEFAULT 0,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order` int(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_selfattribute
-- ----------------------------
INSERT INTO `xk_selfattribute` VALUES (1, '4S店定期保养', 1, '是|否', 6);
INSERT INTO `xk_selfattribute` VALUES (2, '车辆用途', 1, '运营|非运营|营转非|租赁', 5);
INSERT INTO `xk_selfattribute` VALUES (3, 'DVD', 1, '有|无', 3);
INSERT INTO `xk_selfattribute` VALUES (4, '电子稳定', 0, '有|无', 2);
INSERT INTO `xk_selfattribute` VALUES (5, '倒车雷达', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (6, '自动空调', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (7, '四轮驱动', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (8, 'GPS导航', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (9, '座椅加热', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (10, '蓝牙电话', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (11, '外接音源', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (12, '大灯随动', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (13, '空气悬挂', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (14, '自动大灯', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (15, '电动车窗', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (16, '全景天窗', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (17, '后座出风', 1, '有|无', 0);
INSERT INTO `xk_selfattribute` VALUES (18, '倒车影像', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (19, '电动后备箱', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (20, '涡轮增压', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (22, '侧气囊帘', 1, '是|否', 9);
INSERT INTO `xk_selfattribute` VALUES (23, '电动座椅', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (24, '氙气大灯', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (25, '一键启动', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (26, '自动泊车入位', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (27, '中控台彩屏', 1, '是|否', 0);
INSERT INTO `xk_selfattribute` VALUES (28, '电动后视镜', 1, '是|否', 12);
INSERT INTO `xk_selfattribute` VALUES (29, '真皮座椅', 1, '有|无', 0);

SET FOREIGN_KEY_CHECKS = 1;
