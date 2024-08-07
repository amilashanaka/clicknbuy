-- ----------------------------
-- Table structure for admin_types
-- ----------------------------
DROP TABLE IF EXISTS `admin_types`;

CREATE TABLE `admin_types` (
    `at_id` int NOT NULL AUTO_INCREMENT,
    `at_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `at_level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    PRIMARY KEY (`at_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin_types
-- ----------------------------
INSERT INTO `admin_types` VALUES (1, 'supermaster', '1');

INSERT INTO `admin_types` VALUES (2, 'Admin', '2');

INSERT INTO `admin_types` VALUES (3, 'Distributor', '3');

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
    `id` int NOT NULL AUTO_INCREMENT,
    `f1` int NULL DEFAULT 0,
    `f2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f5` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f6` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f7` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f8` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f9` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f10` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
    `f11` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f12` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f13` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f14` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f15` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f16` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `img1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `register_by` int NULL DEFAULT NULL,
    `register_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
    `updated_by` int NULL DEFAULT NULL,
    `updated_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
    `status` int NULL DEFAULT 1,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 35 AVG_ROW_LENGTH = 162 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO
    `admins` (
        `id`,
        `f1`,
        `f2`,
        `f3`,
        `f4`,
        `f5`,
        `f6`,
        `f7`,
        `f8`,
        `f9`,
        `f10`,
        `f11`,
        `f12`,
        `f13`,
        `f14`,
        `f15`,
        `f16`,
        `img1`,
        `register_by`,
        `register_date`,
        `updated_by`,
        `updated_date`,
        `status`
    )
VALUES (
        1,
        1,
        'superadmin',
        '$2y$10$MCq3kqg5TpP5rvviemVayuO4Hvfxh3/JJ4mylf6IsX7rhT3gagTee',
        NULL,
        NULL,
        'Super Admin',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '2024-05-16 05:44:34',
        NULL,
        '2024-05-16 05:46:09',
        1
    )
    -- ----------------------------
    -- Table structure for client_meds
    -- ----------------------------
DROP TABLE IF EXISTS `client_meds`;

CREATE TABLE `client_meds` (
    `id` int NOT NULL AUTO_INCREMENT,
    `user` int NOT NULL,
    `f1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `f2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f4` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `created_by` int NOT NULL,
    `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
    `updated_by` int NULL DEFAULT NULL,
    `updated_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
    `status` int NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of client_meds
-- ----------------------------

-- ----------------------------
-- Table structure for documents
-- ----------------------------
DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
    `id` int NOT NULL AUTO_INCREMENT,
    `user` int NOT NULL,
    `f1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `f2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f4` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `created_by` int NOT NULL,
    `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
    `updated_by` int NULL DEFAULT NULL,
    `updated_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
    `status` int NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of documents
-- ----------------------------

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
    `id` int NOT NULL AUTO_INCREMENT,
    `user` int NULL DEFAULT 0,
    `staff` int NULL DEFAULT 0,
    `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
    `created_by` int NOT NULL,
    `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
    `updated_by` int NULL DEFAULT NULL,
    `updated_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
    `status` int NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of logs
-- ----------------------------

-- ----------------------------
-- Table structure for medication
-- ----------------------------
DROP TABLE IF EXISTS `medication`;

CREATE TABLE `medication` (
    `id` int NOT NULL AUTO_INCREMENT,
    `f1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `f2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f4` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f5` datetime(0) DEFAULT NULL,
    `f6` datetime(0) DEFAULT NULL,
    `created_by` int NOT NULL,
    `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
    `updated_by` int NULL DEFAULT NULL,
    `updated_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
    `status` int NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of medication
-- ----------------------------

-- ----------------------------
-- Table structure for myclients
-- ----------------------------
DROP TABLE IF EXISTS `myclients`;

CREATE TABLE `myclients` (
    `id` int NOT NULL AUTO_INCREMENT,
    `user` int NULL DEFAULT 0,
    `admin` int NULL DEFAULT 0,
    `created_by` int NOT NULL,
    `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
    `updated_by` int NULL DEFAULT NULL,
    `updated_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
    `status` int NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for todos
-- ----------------------------
DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
    `id` int NOT NULL AUTO_INCREMENT,
    `f1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `f2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f4` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `created_by` int NOT NULL,
    `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
    `updated_by` int NULL DEFAULT NULL,
    `updated_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
    `status` int NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of todos
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f5` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f6` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f7` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f8` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f9` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f10` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
    `f11` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f12` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f13` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f14` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f15` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `f16` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `img1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
    `register_by` int NULL DEFAULT NULL,
    `register_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
    `updated_by` int NULL DEFAULT NULL,
    `updated_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
    `status` int NULL DEFAULT 1,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 33 AVG_ROW_LENGTH = 162 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
DROP TABLE IF EXISTS `todo_categories`;

CREATE TABLE IF NOT EXISTS `todo_categories` (
    `id` int NOT NULL AUTO_INCREMENT,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f5` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '1',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `todo_items`;

CREATE TABLE IF NOT EXISTS `todo_items` (
    `id` int NOT NULL AUTO_INCREMENT,
    `todo_categories` int NOT NULL,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f5` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '1',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `todos`;

CREATE TABLE IF NOT EXISTS `todos` (
    `id` int NOT NULL AUTO_INCREMENT,
    `todo_categories` int NOT NULL,
    `todo_items` int NOT NULL,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f5` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f6` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f7` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f8` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f9` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f10` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f11` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f12` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '1',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `todo_participants`;

CREATE TABLE IF NOT EXISTS `todo_participants` (
    `id` int NOT NULL AUTO_INCREMENT,
    `todos` int NOT NULL,
    `admins` int NOT NULL,
    `users` int NOT NULL,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '1',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE IF NOT EXISTS `notifications` (
    `id` int NOT NULL AUTO_INCREMENT,
    `admins` int NOT NULL,
    `users` int NOT NULL,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    /* notification type: header table like todos, ...*/
    `f2` int NOT NULL,
    /* notification relation: id of the header table like 16 -todos*/
    `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    /* message  */
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f5` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '0',
    /* 0- pending, 1 -for clicked*/
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `todos`;

CREATE TABLE IF NOT EXISTS `todos` (
    `id` int NOT NULL AUTO_INCREMENT,
    `todo_categories` int NOT NULL,
    `todo_items` int NOT NULL,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f5` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f6` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f7` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f8` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f9` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f10` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f11` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f12` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '1',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `todo_participants`;

CREATE TABLE IF NOT EXISTS `todo_participants` (
    `id` int NOT NULL AUTO_INCREMENT,
    `todos` int NOT NULL,
    `admins` int NOT NULL,
    `users` int NOT NULL,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '1',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE IF NOT EXISTS `notifications` (
    `id` int NOT NULL AUTO_INCREMENT,
    `todos` int NOT NULL,
    `admins` int NOT NULL,
    `users` int NOT NULL,
    `f1` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    /* notification type: header table like todos, ...*/ `f2` int NOT NULL,
    /* notification relation: id of the header table like 16 -todos*/ `f3` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    /* message  */ `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f5` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '0',
    /* 0- pending, 1 -for clicked*/ PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

DROP TABLE IF EXISTS `todo_tasks`;

CREATE TABLE IF NOT EXISTS `todo_tasks` (
    `id` int NOT NULL AUTO_INCREMENT,
    `todos` int NOT NULL,
    `admins` int NOT NULL,
    `users` int NOT NULL,
    `f1` int DEFAULT '0',
    `f2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
    `created_by` int DEFAULT NULL,
    `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_by` int DEFAULT NULL,
    `updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `status` int DEFAULT '1',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AVG_ROW_LENGTH = 162 DEFAULT CHARSET = latin1 ROW_FORMAT = DYNAMIC;

-- alagies
DROP TABLE IF EXISTS allergy;


CREATE TABLE allergy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    f1 VARCHAR(50) NOT NULL,
    created_by int NULL DEFAULT NULL,
    updated_by int NULL DEFAULT NULL, 
    created_date datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0), 
    updated_date datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),  
    status  int NOT NULL DEFAULT 1,
    UNIQUE (f1)
);


DROP TABLE IF EXISTS `client_allergies`;


CREATE TABLE client_allergies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user int NOT NULL,
    allergy int NOT NULL,
    created_by int NULL DEFAULT NULL,
    updated_by int NULL DEFAULT NULL, 
    created_date datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0), 
    updated_date datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),  
    status  int NOT NULL DEFAULT 1
);


CREATE TABLE doctor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    f1 VARCHAR(50) NOT NULL,
    created_by int NULL DEFAULT NULL,
    updated_by int NULL DEFAULT NULL, 
    created_date datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0), 
    updated_date datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),  
    status  int NOT NULL DEFAULT 1,
    UNIQUE (f1)
);


CREATE TABLE dentist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    f1 VARCHAR(50) NOT NULL,
    created_by int NULL DEFAULT NULL,
    updated_by int NULL DEFAULT NULL, 
    created_date datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0), 
    updated_date datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),  
    status  int NOT NULL DEFAULT 1,
    UNIQUE (f1)
);

