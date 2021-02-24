/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50711
 Source Host           : localhost:3306
 Source Schema         : sample

 Target Server Type    : MySQL
 Target Server Version : 50711
 File Encoding         : 65001

 Date: 18/11/2020 15:07:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_category
-- ----------------------------
DROP TABLE IF EXISTS `m_category`;
CREATE TABLE `m_category`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `category_name` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `new_tag` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_category
-- ----------------------------
INSERT INTO `m_category` VALUES (38, 'CAT/0000001', 'Sample1', '1', 'admin', '2020-11-17 14:34:33');

-- ----------------------------
-- Table structure for m_sub_category
-- ----------------------------
DROP TABLE IF EXISTS `m_sub_category`;
CREATE TABLE `m_sub_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `REF` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category_ref` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `new_tag` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_sub_category
-- ----------------------------
INSERT INTO `m_sub_category` VALUES (1, 'SUCAT/0000001', 'CAT/0000001', 'Simple', '1', '2020-11-18 10:52:09', 'admin');

-- ----------------------------
-- Table structure for sys_entry
-- ----------------------------
DROP TABLE IF EXISTS `sys_entry`;
CREATE TABLE `sys_entry`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `des` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `super` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `main` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class_1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class_2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `block` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of sys_entry
-- ----------------------------
INSERT INTO `sys_entry` VALUES (23, 'Create User', 'new_user', NULL, 'Main', NULL, 'Administration', NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (24, 'Change Password', 'change_password', NULL, 'Main', NULL, 'Administration', NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (25, 'Manage Permission', 'user_p', NULL, 'Main', NULL, 'Administration', NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (48, 'System Infomation', 'system_info', NULL, 'Main', NULL, 'Administration', NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (57, 'Category', 'category', NULL, 'Main', NULL, 'Operation', NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (58, 'Sub Category', 'sub_category', NULL, 'Main', NULL, 'Operation', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for sys_info
-- ----------------------------
DROP TABLE IF EXISTS `sys_info`;
CREATE TABLE `sys_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `COM_NAME` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_EMAIL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_ADD1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_ADD2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_TEL1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_TEL2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_FAX` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_TAX` decimal(15, 2) NULL DEFAULT NULL,
  `user_ref` int(15) NULL DEFAULT NULL,
  `category_ref` int(15) NULL DEFAULT NULL,
  `sub_category_ref` int(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of sys_info
-- ----------------------------
INSERT INTO `sys_info` VALUES (1, 'Loyalty', 'Email', 'Address 1', 'Address 2', 'Contact 1', 'Contact 2', 'FAX', 1200.00, 1, 2, 2);

-- ----------------------------
-- Table structure for sys_log
-- ----------------------------
DROP TABLE IF EXISTS `sys_log`;
CREATE TABLE `sys_log`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `entry` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `operation` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ip` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of sys_log
-- ----------------------------
INSERT INTO `sys_log` VALUES (4, 'CAT/0000001', 'entry', 'SAVE', '2020-11-17 14:34:33', 'admin', 'ip');
INSERT INTO `sys_log` VALUES (5, 'CAT/0000001', 'entry', 'SAVE', '2020-11-18 10:52:09', 'admin', 'ip');

-- ----------------------------
-- Table structure for user_mast
-- ----------------------------
DROP TABLE IF EXISTS `user_mast`;
CREATE TABLE `user_mast`  (
  `user_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_type` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_depart` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `U_email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `R_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_level` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `dev` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0'
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user_mast
-- ----------------------------
INSERT INTO `user_mast` VALUES ('admin', '1234', 'Admin', NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('akila', '1234', '', NULL, '', '', '0', '0');
INSERT INTO `user_mast` VALUES ('nethadun', '1234', '', NULL, '', '', '0', '0');

-- ----------------------------
-- Table structure for userpermission
-- ----------------------------
DROP TABLE IF EXISTS `userpermission`;
CREATE TABLE `userpermission`  (
  `id` bigint(20) NULL DEFAULT NULL,
  `username` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `userpass` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `docid` bigint(20) NULL DEFAULT 0,
  `doc_view` smallint(11) NULL DEFAULT 0,
  `doc_feed` smallint(1) NULL DEFAULT 0,
  `doc_mod` smallint(1) NULL DEFAULT 0,
  `price_edit` smallint(1) NULL DEFAULT 0,
  `admin` smallint(1) NULL DEFAULT 0,
  `dev` smallint(1) NULL DEFAULT 0,
  `doc_print` smallint(1) NULL DEFAULT 0,
  `comcode` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `comname` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `sal_ex` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logdate` date NULL DEFAULT NULL,
  INDEX `userpermission`(`username`, `grp`, `docid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of userpermission
-- ----------------------------
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Administration', 23, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Administration', 24, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Administration', 25, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Allocation', 56, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Allocation', 58, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Allocation', 59, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Main', 53, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Main', 54, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Main', 55, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'Main', 57, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'nethadun', '1234', 'System', 48, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Administration', 23, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Administration', 24, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Administration', 25, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Allocation', 56, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Allocation', 58, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Allocation', 59, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Main', 53, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Main', 54, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Main', 55, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'Main', 57, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'akila', '123', 'System', 48, 0, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'admin', '1234', 'Administration', 23, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'admin', '1234', 'Administration', 24, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'admin', '1234', 'Administration', 25, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'admin', '1234', 'Administration', 48, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'admin', '1234', 'Operation', 57, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);
INSERT INTO `userpermission` VALUES (NULL, 'admin', '1234', 'Operation', 58, 1, 0, 0, 0, 0, 0, 0, '0', '0', NULL, NULL);

-- ----------------------------
-- View structure for view_menu
-- ----------------------------
DROP VIEW IF EXISTS `view_menu`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_menu` AS select `sys_entry`.`id` AS `id`,`sys_entry`.`entry` AS `entry`,`sys_entry`.`url` AS `name`,`sys_entry`.`sub` AS `grp`,`userpermission`.`username` AS `username`,`userpermission`.`doc_view` AS `doc_view`,`userpermission`.`doc_feed` AS `doc_feed`,`userpermission`.`doc_mod` AS `doc_mod`,`userpermission`.`price_edit` AS `price_edit`,`userpermission`.`admin` AS `admin`,`userpermission`.`doc_print` AS `doc_print` from (`sys_entry` join `userpermission` on((`sys_entry`.`id` = `userpermission`.`docid`)));

SET FOREIGN_KEY_CHECKS = 1;
