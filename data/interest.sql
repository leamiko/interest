/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : interest

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2014-10-24 18:25:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for int_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `int_admin_user`;
CREATE TABLE `int_admin_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `real_name` varchar(20) NOT NULL COMMENT '管理员真实姓名',
  `email` varchar(255) DEFAULT NULL COMMENT '用户邮箱',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `last_time` int(11) DEFAULT NULL COMMENT '用户上次登录时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '用户状态(1：正常，0：禁用)',
  `desc` varchar(255) DEFAULT NULL COMMENT '管理员描述',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '管理员类型，1为系统管理员，0为普通管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

-- ----------------------------
-- Records of int_admin_user
-- ----------------------------
INSERT INTO `int_admin_user` VALUES ('1', 'admin', '4e96157c3c8c24f4761a7bc4411a2504', 'admin', 'admin@admin.com', '0', '1414114197', '1', '系统管理员，勿删！', '1');

-- ----------------------------
-- Table structure for int_case
-- ----------------------------
DROP TABLE IF EXISTS `int_case`;
CREATE TABLE `int_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT '案例名称',
  `case_type` int(11) NOT NULL COMMENT '服务类型',
  `type` varchar(255) NOT NULL COMMENT '服务类型',
  `cooperation` varchar(255) NOT NULL COMMENT '合作方',
  `functions` text COMMENT '功能',
  `description` text COMMENT '简介',
  `image` varchar(255) NOT NULL COMMENT '简介图片',
  `cover` varchar(255) NOT NULL COMMENT '封面封面',
  `is_selected` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是精选案例（0：否，1：是）',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `order_time` int(10) NOT NULL COMMENT '排序时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='案例表';

-- ----------------------------
-- Records of int_case
-- ----------------------------
INSERT INTO `int_case` VALUES ('1', 'RMControl', '1', '蓝牙', '移动物联网', 'BLE 4.0 |远程控制|智能调节|手动调节', 'BLE 4.0 |远程控制|智能调节|手动调节', '/uploads/2014/09/25/7cf6a52b9eedafbeb2395a925913831aa8c3d3d9.jpg', '/uploads/2014/10/22/9bf973e9cdb9f108ecbed9941bb10684e260c30c.jpg', '1', '1411612826', '1414165920', '1414114579');
INSERT INTO `int_case` VALUES ('2', 'iTrain', '1', '蓝牙', '移动物联网', 'BLE 4.0|穿戴设备|肌肉训练|闹铃提醒', 'BLE 4.0|穿戴设备|肌肉训练|闹铃提醒', '/uploads/2014/09/25/c4d2bd972d7c9a6388c30245d3ba0627f112d4d0.jpg', '/uploads/2014/10/22/b57960b0f9df1ce93d5d30a977f01e3e72916b77.jpg', '1', '1411619071', '1414124641', '1414114607');
INSERT INTO `int_case` VALUES ('3', '车中有我', '1', '蓝牙车载', '移动物联网', 'BLE 4.0|驾驶记录|空气检测|限行查询', 'BLE 4.0|驾驶记录|空气检测|限行查询', '/uploads/2014/09/25/5860d15f08324f0c684fada5138e3b2a62e02ccc.jpg', '/uploads/2014/10/24/a13f65e5e72caf1205f63fda06a0498e6c4d64f8.jpg', '1', '1411626989', '1414046160', '1414116055');
INSERT INTO `int_case` VALUES ('4', '顺风耳', '1', '音乐', '移动互联网', '主题切换|声音编辑|声音混合|声音分类', '主题切换|声音编辑|声音混合|声音分类', '/uploads/2014/09/25/343ef26e05174f3caca74f7730e74ec47ac56fb6.jpg', '/uploads/2014/10/23/2d539b10cd5be815937616767fe72a922ec1be35.jpg', '0', '1411628672', '1411599840', '1414114622');
INSERT INTO `int_case` VALUES ('5', '润东快递', '1', '物流', '移动互联网', '订单查询|货物出库|货物入库', '订单查询|货物出库|货物入库', '/uploads/2014/09/25/db1f355ba994037c5d87fa1f819cd426d37cd2cb.jpg', '/uploads/2014/10/23/87a23f84a043638bb25a1ae6822487bd97e0e365.jpg', '0', '1411631843', '1411631843', '1414114633');
INSERT INTO `int_case` VALUES ('6', '有啦', '1', 'O2O', '移动互联网', 'O2O|商家分类|个人中心|我的订单', 'O2O|商家分类|个人中心|我的订单', '/uploads/2014/09/25/c41fb5eaa6a2b9475e32fc85559706db2486b308.jpg', '/uploads/2014/10/23/c0143bfcac04a559c42981984fb9416db9f92ced.jpg', '0', '1411634323', '1411634323', '1414114863');
INSERT INTO `int_case` VALUES ('7', '晒娃娃', '1', '社交', '移动互联网', '亲子社交|短视频|图片+语言|交友', '亲子社交|短视频|图片+语言|交友', '/uploads/2014/09/25/dc0a65c0ca66ecd76afcf9f804bbbdd76bcb6438.jpg', '/uploads/2014/10/22/34c4e5ffb5ebf39b23aadab6fbf4f2d7ba983466.jpg', '1', '1411634993', '1411634993', '1414114876');
INSERT INTO `int_case` VALUES ('8', '车联网', '1', '汽车', '移动互联网', '实时路况|周边交通快拍|高速公路查询|语音播报', '实时路况|周边交通快拍|高速公路查询|语音播报', '/uploads/2014/09/25/060b8862376c9921ab8ff98abbf8093bdfa319d1.jpg', '/uploads/2014/10/24/f36ed4a9aebcbb547377fee14c91124793590ecc.jpg', '0', '1411636516', '1411636516', '1414116032');
INSERT INTO `int_case` VALUES ('9', 'EasyBuyBuy', '1', '商城', '移动互联网', '商城APP|国际化语言|购物车|在线支付', '商城APP|国际化语言|购物车|在线支付', '/uploads/2014/09/25/4876d1b4bb6154700b00c7d78d64d6be3f3ff70c.jpg', '/uploads/2014/10/23/3f53436ddb4c6ff5dde9ee0bbc7ee104e282e9c4.jpg', '0', '1411639678', '1411639678', '1414115041');
INSERT INTO `int_case` VALUES ('11', '八段锦', '1', '健身锻炼', '移动互联网', '视频练习|视频下载|断点续传|定点提醒练习', '视频练习|视频下载|断点续传|定点提醒练习', '/uploads/2014/09/28/a7889ced3f954c13dfa2f5de24aae28f02140030.jpg', '/uploads/2014/10/23/bcc2bb8f2303726c70e3c5d9d0a8efd3ecf7e6e8.jpg', '0', '1411897245', '1411897245', '1414115059');
INSERT INTO `int_case` VALUES ('12', '173WIFI', '1', '旅游出行', '移动互联网', '旅游|用户中心|便民信息', '旅游|用户中心|便民信息', '/uploads/2014/09/28/4f8985b5c225e34b392a900c9dad20ab360a6b2d.jpg', '/uploads/2014/10/23/c3d9bd48b0ae37f898d83add17ca661ff146b2aa.jpg', '0', '1411897999', '1411897999', '1414115075');
INSERT INTO `int_case` VALUES ('13', '防丢器', '1', '蓝牙', '移动物联网', 'BLE 4.0 | 双向互寻 | 铃声自定义 | 远程拍照', 'BLE 4.0 | 双向互寻 | 铃声自定义 | 远程拍照', '/uploads/2014/09/28/9bc985e6e2c4a3ded290cf502fc89f7be8db1a00.jpg', '/uploads/2014/10/24/bbeca4a0215c0bd86dfa95b82eafcd6d92bfe5ef.jpg', '0', '1411898822', '1411898822', '1414116724');
INSERT INTO `int_case` VALUES ('14', '平安校园', '1', '校园管理', '移动互联网', '考勤登记|家庭作业|家校互通|远程监控', '考勤登记|家庭作业|家校互通|远程监控', '/uploads/2014/09/28/f0f465e266c73ccff0d51cffed47894b6db15db9.jpg', '/uploads/2014/10/23/da58a3e121d15d0d00a6b82cabe3e7002d329d99.jpg', '1', '1411899771', '1411899771', '1414115095');
INSERT INTO `int_case` VALUES ('15', '奥迪AR', '1', 'AR', '移动互联网', '品牌介绍|功能介绍|测试题练习|增强实现', '品牌介绍|功能介绍|测试题练习|增强实现', '/uploads/2014/10/23/a7631bc881e98703f52746d04274bf0cdee4099d.jpg', '/uploads/2014/10/23/00e207c0883ef4dc62970439383c5c345a974d43.jpg', '1', '1414045759', '1414045759', '1414115113');
INSERT INTO `int_case` VALUES ('16', '智通财经', '1', '财经股票', '移动互联网', 'K线图走势|语音播报|主题切换|远程推送', 'K线图走势|语音播报|主题切换|远程推送', '/uploads/2014/10/23/c6b3b986dc8711a0e998acad073c29d5fcc875ea.jpg', '/uploads/2014/10/23/9253f6532bd84ead69240fc42899493149a6df6e.jpg', '1', '1414051012', '1414051012', '1414115121');
INSERT INTO `int_case` VALUES ('17', '灵通短讯', '1', '资讯', '移动互联网', '贵金属报价|频道订阅|信息缓存|远程推送', '贵金属报价|频道订阅|信息缓存|远程推送', '/uploads/2014/10/23/6d9225a54ba300e924374eb28d0d34bd2ad98237.jpg', '/uploads/2014/10/23/462080b40dea4667366616b7442cf28cdaf46562.jpg', '0', '1414058215', '1414058215', '1414115131');
INSERT INTO `int_case` VALUES ('19', '易茶', '1', '商城', '移动互联网', 'B2C商城|茶叶超市|购物车|在线支付', 'B2C商城|茶叶超市|购物车|在线支付', '/uploads/2014/10/23/51d9ffc7ed5568e0513d3496ad85911d09347978.jpg', '/uploads/2014/10/23/5fb7c6ef2816ff4db98b3029889af0e267711153.jpg', '1', '1414061813', '1414061813', '1414115139');
INSERT INTO `int_case` VALUES ('20', '优乐学', '1', '学习考试', '移动互联网', '考试系统|个人中心|消息提醒', '考试系统|个人中心|消息提醒', '/uploads/2014/10/23/4c5fd4f95500bd13aac061a02506344bdc74dcdb.jpg', '/uploads/2014/10/23/642b85bb3bd80d937be948fe3c9a5c160ffdb5b4.jpg', '0', '1414064543', '1414064543', '1414115149');
INSERT INTO `int_case` VALUES ('21', '为爱珠宝', '1', '商城', '移动互联网', '珠宝查询|二维码|购物车|在线下单', '珠宝查询|二维码|购物车|在线下单', '/uploads/2014/10/23/6d59c2732801c0caddbb5796473835e42679ce6c.jpg', '/uploads/2014/10/23/caa3d0b57a642940f811efb424920a0966ccd7af.jpg', '0', '1414065879', '1414065879', '1414115158');
INSERT INTO `int_case` VALUES ('22', '有间铺子', '1', '商城', '移动互联网', '个人中心|商品搜索|购物车|订单查询', '个人中心|商品搜索|购物车|订单查询', '/uploads/2014/10/23/152ee752c085cbcf33bc3008e871b205f317e177.jpg', '/uploads/2014/10/23/8ec07b7bfb11c4af4133d3c6edd99f10c903fda7.jpg', '0', '1414066115', '1414066115', '1414115166');

-- ----------------------------
-- Table structure for int_case_type
-- ----------------------------
DROP TABLE IF EXISTS `int_case_type`;
CREATE TABLE `int_case_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT '分类名',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='案例分类表';

-- ----------------------------
-- Records of int_case_type
-- ----------------------------
INSERT INTO `int_case_type` VALUES ('1', '我们的APP', '1411612202', '1411616026');

-- ----------------------------
-- Table structure for int_contact
-- ----------------------------
DROP TABLE IF EXISTS `int_contact`;
CREATE TABLE `int_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `company` text NOT NULL COMMENT '公司名',
  `address` text NOT NULL COMMENT '联系地址',
  `phone` varchar(30) NOT NULL COMMENT '联系电话',
  `contact` varchar(30) NOT NULL COMMENT '联系人',
  `map` varchar(255) NOT NULL COMMENT '地图',
  `description` text NOT NULL COMMENT '公司简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='联系方式表';

-- ----------------------------
-- Records of int_contact
-- ----------------------------
INSERT INTO `int_contact` VALUES ('1', '广州英趣信息科技有限公司', '广州市天河区棠安路288-299号天盈建博汇2054', '020-29869409', '黄先生', '/uploads/2014/09/22/44eaeb6e6bda1ebf0eb3adaac9f92ec9e3d25d83.jpeg', '<p><span style=\"font-size:14px\">英趣信息科技有限公司致力于移动互联网、移动物联网应用的开发，以专业的技术、负责任的态度，为客户提供优质移动服务。</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:14px\">英趣科技在移动应用开发方面有着丰富的经验。擅长iOS、Android移动平台APP开发。为合作伙伴提供专业一体化移动应用解决方案服务。 公司秉承客户体验的细节要求，为客户提供优质的移动互联网服务，其中包括高质量的代码、体验良好的APP、APP发布及推广。</span></p>');

-- ----------------------------
-- Table structure for int_cooperation
-- ----------------------------
DROP TABLE IF EXISTS `int_cooperation`;
CREATE TABLE `int_cooperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `contact` varchar(30) NOT NULL COMMENT '联系人',
  `phone` varchar(30) NOT NULL COMMENT '联系电话',
  `email` varchar(255) DEFAULT NULL COMMENT 'email',
  `address` text COMMENT '联系地址',
  `service` int(11) NOT NULL COMMENT '合作业务（服务类型）',
  `content` text COMMENT '内容',
  `add_time` int(10) NOT NULL COMMENT '申请合作时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='申请合作表';

-- ----------------------------
-- Records of int_cooperation
-- ----------------------------
INSERT INTO `int_cooperation` VALUES ('1', '黄晓琪', '15018755273', 'chuang@gzinterest.com', '广州', '1', 'APP定制开发', '1411868472');
INSERT INTO `int_cooperation` VALUES ('2', '屈生', '15814507337', '383959278@qq.com', '广州市番禺区南村镇文明路16-18号', '2', '软件开发', '1413878379');

-- ----------------------------
-- Table structure for int_copyright
-- ----------------------------
DROP TABLE IF EXISTS `int_copyright`;
CREATE TABLE `int_copyright` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='版权信息表';

-- ----------------------------
-- Records of int_copyright
-- ----------------------------

-- ----------------------------
-- Table structure for int_flash
-- ----------------------------
DROP TABLE IF EXISTS `int_flash`;
CREATE TABLE `int_flash` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(80) NOT NULL COMMENT '广告标题',
  `description` varchar(255) NOT NULL COMMENT '广告简介',
  `url` varchar(255) NOT NULL COMMENT '广告URL',
  `image` varchar(255) NOT NULL COMMENT '广告图片',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='flash焦点图广告表';

-- ----------------------------
-- Records of int_flash
-- ----------------------------
INSERT INTO `int_flash` VALUES ('1', '英趣科技专业APP开发', '广州英趣科技在移动应用开发方面有着丰富的经验。擅长iOS、Android移动平台APP开发。为合作伙伴提供专业一体化移动应用解决方案服务。', '#', '/uploads/2014/10/23/211bdd8e14a77cdc2fae932807aef13a3b4c105b.jpg', '1411372617', '1414074424');
INSERT INTO `int_flash` VALUES ('2', '我们的宗旨做到最好！', '广州英趣科技秉承客户体验的细节要求，为客户提供优质的移动互联网服务，其中包括高质量的代码、体验良好的APP、APP发布及推广。', '#', '/uploads/2014/09/23/b9ba8d77731e2d301d9434c754a4b2bcc3bcfe66.jpg', '1411453499', '1411868388');
INSERT INTO `int_flash` VALUES ('3', 'APP定制开发', '广州英趣科技拥有强大的技术团队。为客户提供优质的app定制开发设计方案，我们追求完美的用户体验。不仅服务您，也超越自己！', '#', '/uploads/2014/09/23/158592f0fa37aae3de300395909979656d078b7a.jpg', '1411454039', '1411868395');

-- ----------------------------
-- Table structure for int_news
-- ----------------------------
DROP TABLE IF EXISTS `int_news`;
CREATE TABLE `int_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `category_id` int(11) NOT NULL COMMENT '分类ID',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `content` text NOT NULL COMMENT '内容',
  `image` varchar(255) DEFAULT NULL COMMENT '首图',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='资讯表';

-- ----------------------------
-- Records of int_news
-- ----------------------------

-- ----------------------------
-- Table structure for int_news_category
-- ----------------------------
DROP TABLE IF EXISTS `int_news_category`;
CREATE TABLE `int_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT '分类名',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='资讯分类表';

-- ----------------------------
-- Records of int_news_category
-- ----------------------------

-- ----------------------------
-- Table structure for int_right_setting
-- ----------------------------
DROP TABLE IF EXISTS `int_right_setting`;
CREATE TABLE `int_right_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` varchar(12) NOT NULL COMMENT '客服QQ',
  `phone` varchar(30) NOT NULL COMMENT '客服电话',
  `qr_code` varchar(255) NOT NULL COMMENT '二维码图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='右边悬浮窗设置表';

-- ----------------------------
-- Records of int_right_setting
-- ----------------------------
INSERT INTO `int_right_setting` VALUES ('1', '1944473773', '020-29869409', '/uploads/2014/10/24/cc451089b3eefcf9afd0a289e9868c93fa2cfa3f.jpg');

-- ----------------------------
-- Table structure for int_service
-- ----------------------------
DROP TABLE IF EXISTS `int_service`;
CREATE TABLE `int_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(50) NOT NULL COMMENT '服务标题',
  `description` text NOT NULL COMMENT '服务简介',
  `introduction` varchar(255) NOT NULL COMMENT '首页介绍',
  `image` varchar(255) NOT NULL COMMENT '服务图标',
  `icon` varchar(255) NOT NULL COMMENT '首页ICON',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='服务类型表';

-- ----------------------------
-- Records of int_service
-- ----------------------------
INSERT INTO `int_service` VALUES ('1', 'iOS', '卓越的交互体验设计,强大的技术实力,专业的人才,基于丰富的经验开发苹果客户端APP、IPAD客户端、App Store发布。', '卓越的交互体验设计,强大的技术实力,基于丰富的经验开发苹果客户端APP、IPAD客户端、App Store发布。', '/uploads/2014/09/25/074e1e4cd4ef73fc785c50e9503f741813dd2f92.jpg', '/uploads/2014/09/25/bffde379c797360efc8db412d6fb581c2a7c06c2.png', '1411637849', '1413963480');
INSERT INTO `int_service` VALUES ('2', 'Android', '专业定制开发android客户端、平板客户端、安卓手机软件开发，应用最新的技术，已上线多款应用软件。', '专业定制开发android客户端、平板客户端、安卓手机软件开发，应用最新的技术，已上线多款应用软件。', '/uploads/2014/09/25/f416b7deffb77bf3b1b8875a1498efe63c208acd.jpg', '/uploads/2014/09/25/32a4fa427e4fc98f2c8f34dcabee7329235c17ca.png', '1411638748', '1413963257');
INSERT INTO `int_service` VALUES ('3', 'Wechat', '一流微信App研发团队，擅长微信App设计与研发，涉足新闻，阅读，产品展示，信息发布，导航，医疗，移动办公等。', '一流微信App研发团队，擅长微信App设计与研发，涉足新闻，阅读，产品展示，信息发布，导航，医疗，移动办公等。', '/uploads/2014/09/25/5c2695aad26c83dfb2649172428616af512d57a3.jpg', '/uploads/2014/09/25/f4547ea8d8f2c39b2387206682f00bf23f5049ec.png', '1411638800', '1413963174');

-- ----------------------------
-- Table structure for int_tdk
-- ----------------------------
DROP TABLE IF EXISTS `int_tdk`;
CREATE TABLE `int_tdk` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `page` tinyint(1) NOT NULL COMMENT '页面',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `description` varchar(180) NOT NULL COMMENT '描述',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `add_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='标题、描述、关键词表';

-- ----------------------------
-- Records of int_tdk
-- ----------------------------

-- ----------------------------
-- Table structure for int_to_customer
-- ----------------------------
DROP TABLE IF EXISTS `int_to_customer`;
CREATE TABLE `int_to_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `greeting` varchar(255) NOT NULL COMMENT '问候',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='致客户表';

-- ----------------------------
-- Records of int_to_customer
-- ----------------------------
INSERT INTO `int_to_customer` VALUES ('1', '欢迎来访！', '英趣科技感谢您的信任！我们将用最专业的能力与最专注的态度做到让您满意。\n祝您生活愉快！');
