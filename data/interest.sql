/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : interest

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2014-10-30 16:29:39
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
INSERT INTO `int_admin_user` VALUES ('1', 'admin', '4e96157c3c8c24f4761a7bc4411a2504', 'admin', 'admin@admin.com', '0', '1414653438', '1', '系统管理员，勿删！', '1');

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
INSERT INTO `int_case` VALUES ('1', 'RMControl', '1', '蓝牙', '移动物联网', 'BLE 4.0 |远程控制|智能调节|手动调节', 'BLE 4.0 |远程控制|智能调节|手动调节', '/uploads/2014/09/25/7cf6a52b9eedafbeb2395a925913831aa8c3d3d9.jpg', '/uploads/2014/10/22/9bf973e9cdb9f108ecbed9941bb10684e260c30c.jpg', '1', '1411612826', '1414118400', '1414114579');
INSERT INTO `int_case` VALUES ('2', 'iTrain', '1', '蓝牙', '移动物联网', 'BLE 4.0|穿戴设备|肌肉训练|闹铃提醒', 'BLE 4.0|穿戴设备|肌肉训练|闹铃提醒', '/uploads/2014/09/25/c4d2bd972d7c9a6388c30245d3ba0627f112d4d0.jpg', '/uploads/2014/10/22/b57960b0f9df1ce93d5d30a977f01e3e72916b77.jpg', '1', '1411619071', '1414403880', '1414114607');
INSERT INTO `int_case` VALUES ('3', '车中有我', '1', '蓝牙车载', '移动物联网', 'BLE 4.0|驾驶记录|空气检测|限行查询', 'BLE 4.0|驾驶记录|空气检测|限行查询', '/uploads/2014/09/25/5860d15f08324f0c684fada5138e3b2a62e02ccc.jpg', '/uploads/2014/10/24/a13f65e5e72caf1205f63fda06a0498e6c4d64f8.jpg', '1', '1411626989', '1411626989', '1414116055');
INSERT INTO `int_case` VALUES ('4', '顺风耳', '1', '音乐', '移动互联网', '主题切换|声音编辑|声音混合|声音分类', '主题切换|声音编辑|声音混合|声音分类', '/uploads/2014/09/25/343ef26e05174f3caca74f7730e74ec47ac56fb6.jpg', '/uploads/2014/10/23/2d539b10cd5be815937616767fe72a922ec1be35.jpg', '0', '1411628672', '1411628672', '1414114622');
INSERT INTO `int_case` VALUES ('5', '润东快递', '1', '物流', '移动互联网', '订单查询|货物出库|货物入库', '订单查询|货物出库|货物入库', '/uploads/2014/09/25/db1f355ba994037c5d87fa1f819cd426d37cd2cb.jpg', '/uploads/2014/10/23/87a23f84a043638bb25a1ae6822487bd97e0e365.jpg', '0', '1411631843', '1411631843', '1414114633');
INSERT INTO `int_case` VALUES ('6', '有啦', '1', 'O2O', '移动互联网', 'O2O|商家分类|个人中心|我的订单', 'O2O|商家分类|个人中心|我的订单', '/uploads/2014/09/25/c41fb5eaa6a2b9475e32fc85559706db2486b308.jpg', '/uploads/2014/10/23/c0143bfcac04a559c42981984fb9416db9f92ced.jpg', '0', '1411634323', '1411634323', '1414114863');
INSERT INTO `int_case` VALUES ('7', '晒娃娃', '1', '社交', '移动互联网', '亲子社交|短视频|图片+语言|交友', '亲子社交|短视频|图片+语言|交友', '/uploads/2014/09/25/dc0a65c0ca66ecd76afcf9f804bbbdd76bcb6438.jpg', '/uploads/2014/10/22/34c4e5ffb5ebf39b23aadab6fbf4f2d7ba983466.jpg', '1', '1411634993', '1411634993', '1414114876');
INSERT INTO `int_case` VALUES ('8', '车联网', '1', '汽车', '移动互联网', '实时路况|周边交通快拍|高速公路查询|语音播报', '实时路况|周边交通快拍|高速公路查询|语音播报', '/uploads/2014/09/25/060b8862376c9921ab8ff98abbf8093bdfa319d1.jpg', '/uploads/2014/10/24/f36ed4a9aebcbb547377fee14c91124793590ecc.jpg', '0', '1411636516', '1411636516', '1414116032');
INSERT INTO `int_case` VALUES ('9', 'EasyBuyBuy', '1', '商城', '移动互联网', '商城APP|国际化语言|购物车|在线支付', '商城APP|国际化语言|购物车|在线支付', '/uploads/2014/09/25/4876d1b4bb6154700b00c7d78d64d6be3f3ff70c.jpg', '/uploads/2014/10/23/3f53436ddb4c6ff5dde9ee0bbc7ee104e282e9c4.jpg', '0', '1411639678', '1411639678', '1414115041');
INSERT INTO `int_case` VALUES ('11', '八段锦', '1', '健身锻炼', '移动互联网', '视频练习|视频下载|断点续传|定点提醒练习', '视频练习|视频下载|断点续传|定点提醒练习', '/uploads/2014/09/28/a7889ced3f954c13dfa2f5de24aae28f02140030.jpg', '/uploads/2014/10/23/bcc2bb8f2303726c70e3c5d9d0a8efd3ecf7e6e8.jpg', '0', '1411897245', '1411897245', '1414115059');
INSERT INTO `int_case` VALUES ('12', '173WIFI', '1', '旅游出行', '移动互联网', '旅游|用户中心|便民信息', '旅游|用户中心|便民信息', '/uploads/2014/09/28/4f8985b5c225e34b392a900c9dad20ab360a6b2d.jpg', '/uploads/2014/10/23/c3d9bd48b0ae37f898d83add17ca661ff146b2aa.jpg', '0', '1411897999', '1411897999', '1414115075');
INSERT INTO `int_case` VALUES ('13', '防丢器', '1', '蓝牙', '移动物联网', 'BLE 4.0 | 双向互寻 | 铃声自定义 | 远程拍照', 'BLE 4.0 | 双向互寻 | 铃声自定义 | 远程拍照', '/uploads/2014/09/28/9bc985e6e2c4a3ded290cf502fc89f7be8db1a00.jpg', '/uploads/2014/10/24/bbeca4a0215c0bd86dfa95b82eafcd6d92bfe5ef.jpg', '0', '1411898822', '1414404420', '1414116724');
INSERT INTO `int_case` VALUES ('14', '平安校园', '1', '校园管理', '移动互联网', '考勤登记|家庭作业|家校互通|远程监控', '考勤登记|家庭作业|家校互通|远程监控', '/uploads/2014/09/28/f0f465e266c73ccff0d51cffed47894b6db15db9.jpg', '/uploads/2014/10/23/da58a3e121d15d0d00a6b82cabe3e7002d329d99.jpg', '1', '1411899771', '1411899771', '1414115095');
INSERT INTO `int_case` VALUES ('15', '奥迪AR', '1', 'AR', '移动互联网', '品牌介绍|功能介绍|测试题练习|增强实现', '品牌介绍|功能介绍|测试题练习|增强实现', '/uploads/2014/10/23/a7631bc881e98703f52746d04274bf0cdee4099d.jpg', '/uploads/2014/10/23/00e207c0883ef4dc62970439383c5c345a974d43.jpg', '1', '1414045759', '1414045759', '1414115113');
INSERT INTO `int_case` VALUES ('16', '智通财经', '1', '财经股票', '移动互联网', 'K线图走势|语音播报|主题切换|远程推送', 'K线图走势|语音播报|主题切换|远程推送', '/uploads/2014/10/23/c6b3b986dc8711a0e998acad073c29d5fcc875ea.jpg', '/uploads/2014/10/23/9253f6532bd84ead69240fc42899493149a6df6e.jpg', '1', '1414051012', '1414396560', '1414115121');
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
  `description` text NOT NULL COMMENT '公司简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='联系方式表';

-- ----------------------------
-- Records of int_contact
-- ----------------------------
INSERT INTO `int_contact` VALUES ('1', '广州英趣信息科技有限公司', '广州市天河区天河北路615号鸿翔大厦1404', '020-29869409', '黄先生', '<p><span style=\"font-size:14px\">英趣信息科技有限公司致力于移动互联网、移动物联网应用的开发，以专业的技术、负责任的态度，为客户提供优质移动服务。</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:14px\">英趣科技在移动应用开发方面有着丰富的经验。擅长iOS、Android移动平台APP开发。为合作伙伴提供专业一体化移动应用解决方案服务。 公司秉承客户体验的细节要求，为客户提供优质的移动互联网服务，其中包括高质量的代码、体验良好的APP、APP发布及推广。</span></p>');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='版权信息表';

-- ----------------------------
-- Records of int_copyright
-- ----------------------------
INSERT INTO `int_copyright` VALUES ('1', 'Copyright © 2013-2014 广州英趣信息科技有限公司 ALL rights reserved 粤ICP备14077325号');

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
INSERT INTO `int_flash` VALUES ('1', '英趣科技专业APP开发', '广州英趣科技在移动应用开发方面有着丰富的经验。擅长iOS、Android移动平台APP开发。为合作伙伴提供专业一体化移动应用解决方案服务。', '#', '/uploads/2014/10/25/48ff981dc6103cbe5c9d43999754dd9ebc9bd616.jpg', '1411372617', '1414205712');
INSERT INTO `int_flash` VALUES ('2', '我们的宗旨做到最好！', '广州英趣科技秉承客户体验的细节要求，为客户提供优质的移动互联网服务，其中包括高质量的代码、体验良好的APP、APP发布及推广。', '#', '/uploads/2014/10/25/5ef3d79a2f304820ec7842501836e78ea42d6471.jpg', '1411453499', '1414206175');
INSERT INTO `int_flash` VALUES ('3', 'APP定制开发', '广州英趣科技拥有强大的技术团队。为客户提供优质的app定制开发设计方案，我们追求完美的用户体验。不仅服务您，也超越自己！', '#', '/uploads/2014/10/25/80cef484c2cc609a9f96acbd054a5402b45e760a.jpg', '1411454039', '1414205482');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='资讯表';

-- ----------------------------
-- Records of int_news
-- ----------------------------
INSERT INTO `int_news` VALUES ('1', '2', '移动应用的八个创意突破口', 'APP开发，广州英趣信息科技', '<p><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana; font-size:16px\">&nbsp; &nbsp; &nbsp; &nbsp;<a href=\"http://www.gzinterest.com\">广州APP开发公司</a>，移动互联网/物联网专家<a href=\"http://www.gzinterest.com\">英趣科技</a>为你分析移动APP的八个创意突破口。</span></p>\n\n<p><span style=\"font-size:16px\">&nbsp; &nbsp;&nbsp;</span><span style=\"font-size:14px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">&nbsp; 一、狠抓实用性，多关注用户的生活细节。</span><br />\n<span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　从用户的吃、住、行、玩、用等日常生活细节着手，发现还没有被满足的需求，然后结合产品看能否植入进去。比如针对起床困难户，星巴克推出了一款Early Bird(早起鸟)，当你下载这个APP以后，可以设定时间提醒你起床。用户在设定的起床时间闹铃响起后，只需按提示点击起床按钮，就可得到1颗星，如果能在一小时内走进任一星巴克店，验证这个APP，即可打折买到一杯咖啡!当然这个APP还可以从设置不起床的后果声音，如&ldquo;再不起床，迟到了罚款100元&rdquo;，只需要输入公司相关规定即可。</span></span></p>\n\n<p><br />\n<span style=\"font-size:14px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　二、将产品体验做成互动游戏。</span><br />\n<span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　很多产品都可以将体验形式开发成小游戏，如服装可以试衣服大小和搭配颜色，啤酒瓶可以做作为暴力游戏的道具，饮料可以自己酿造&hellip;&hellip;说说宜家手机APP，可让用户自定义家居布局，用户可以创建并分享自己中意的布局，同时可参与投票选出自己喜欢的布局，宜家还会对这些优秀创作者进行奖励，利用个性化定制营销来达成传播效果，对线下实体店来说，APP往往不是最好的销售工具，但是能弥补线下体验的短板，通过APP能打通会员营销、体验与服务体系。</span></span></p>\n\n<p><br />\n<span style=\"font-size:14px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　三、个性化的产品或服务定制。</span><br />\n<span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　将产品或服务通过APP实现个性化定制，适合容易标准化的生产的产品。比如服装类APP，它的颜色、款式、尺寸等都可选择，当然每个选项可提供多个选择，而不是随心所欲的填写。如21cake推出的一款能帮客户随时随地订购蛋糕，并根据需要送到指定的地方。客户不仅可以根据口味选择蛋糕，还可以根据适用对象来选。即使在客户完全没有主意时，也可以通过&ldquo;摇一摇&rdquo;来选一款&ldquo;缘分蛋糕&rdquo;。</span></span></p>\n\n<p><br />\n<span style=\"font-size:14px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　四、逆向思维，不用该产品会产生什么后果。</span><br />\n<span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　适合避孕套、智力产品、药品、安全产品等容易导致严重后果的产品，将此后果放大，正是传统营销所谓的恐吓式。如不安全用药，会导致什么情况，将此情况用游戏的形式演绎出来，让用户产生必须要用的心理反应。比如杜蕾斯推出了一款APP可以模拟养小孩，就像真小孩一样整天烦你，要喂奶，要逗他玩，还得哄睡觉，哭了要抱，还会更新你的Facebook状态&ldquo;我当爹啦!&rdquo;各种婴儿相关活动的邀请也会随之而来，很烦很烦&hellip;&hellip;而每次当你关闭此程序时都会显示&ldquo;用杜蕾斯&rdquo;的提醒。</span></span></p>\n\n<p><br />\n<span style=\"font-size:14px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　五、将人的欲望放大。</span><br />\n<span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　人的欲望有很多种，如好奇、色情、偷窥、分享、愤怒、健康、懒惰、善良、感性、嫉妒、虚荣等，如果将这些欲望与企业或品牌相关元素融合，则会达到传播润物细无声的效果。适合服装、电子产品、食品等快消品及容易和生活密切相关的行业。举个例子说明一下，如荷兰FB品牌APP：只要你正面评价并分享至Twitter和Facebook，App上女模特儿就会脱衣服，转发、评论越多，衣服脱得就越多，直至脱光为止。虽然推广手段有些恶心，但FB品牌知名度瞬间在网络上引爆。&ldquo;点赞脱衣&rdquo;是由产品与消费者之间的口碑关系挖掘出的，并与色情、偷窥欲结合而成的APP，实现了口碑传播和知名度的提升。</span></span></p>\n\n<p><br />\n<span style=\"font-size:14px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　六、将服务平台用APP呈现并创新。</span><br />\n<span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　适合资讯类、服务类的平台，当然他们本身就具有人气，但适时推出和创新也是必须的。比如易居中国推出的&ldquo;口袋乐居&rdquo;，凭借&ldquo;让不动产动起来&rdquo;的出色表现在上线后的短短几月，先后打破房屋精准估价、移动支付等先河，帮助房企实现营销目标的同时，又为网友提供了一款实用类型的移动应用，一度占领各大房产类应用下载排名的前列。&ldquo;口袋乐居&rdquo;前身是已超百万级下载量的&ldquo;口袋房产&rdquo;，延续以用户体验为设计之本，综合用户各方需求，集信息平台、工具平台、数据平台和交易平台等多项功能于一体，切实贴近消费者生活，提供全方位的服务。此款产品的推出，开拓了房地产互联网产品除&ldquo;房源型&rdquo;、&ldquo;资讯型&rdquo;、&ldquo;交易型&rdquo;后的第四大导向&ldquo;房价型&rdquo;产品。</span></span></p>\n\n<p><br />\n<span style=\"font-size:14px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　七、线上线下联动。</span><br />\n<span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　通过APP的二维码扫描可以实现与线下的活动、广告、促销等形成联动，往往是线下活动、展示，线上抽奖、派送等。可以解决线下活跃度不足的问题。比如可口可乐推出的CHOK，在指定的&ldquo;可口可乐&rdquo;沙滩电视广告播出时开启手机App。当广告画面中出现&ldquo;可口可乐&rdquo;瓶盖，且手机出现震动的同时，挥动手机去抓取电视画面中的瓶盖，每次最多可捕捉到3个，广告结束时，APP中揭晓奖品结果，奖品都是重量级的，如汽车之类的，吸引力很大。</span></span></p>\n\n<p><br />\n<span style=\"font-size:14px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　八、充分利用客户的等待时间。</span><br />\n<span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">　　银行排队等候、机场候机等待、无聊的长途汽车上、吃饭时等号&hellip;&hellip;往往客户等待的时候是最无聊的时候，不能走，只能等，而且是干等。如果能让这个无聊的时刻不无聊，可能会给品牌加分。再看个案例，法国航空曾推出了一款空中音乐APP，安装此App后，在法航的航班上想听音乐，只要你用手机对着天空，搜寻空中随机散布的歌曲，捕到后可直接试听。不同国家空中散布的歌曲也不同。App中还有互动游戏可以赢取优惠机票。让乘客乘飞机不再无聊，让音乐融入空中生活，创造独特的试听体验，形成了良好的口碑传播。当然还有很多方式，这里不再一一列举。其实，一款好的企业APP一定是将注意力聚焦到客户身上，关注他们的日常生活及所思所想，然后再结合产品或品牌能不能有好的创意点融合，不能失了重心。</span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"color:rgb(79, 79, 79); font-family:微软雅黑,tahoma,arial,verdana\">&nbsp; &nbsp; &nbsp; &nbsp;<a href=\"http://www.gzinterest.com\">广州APP开发商英趣科技</a>感谢您的阅读！</span></span></p>', '/uploads/2014/10/30/03d5034c62d8649c880c2bbbc95af25912fd8868.png', '1414648824', '1414657358');
INSERT INTO `int_news` VALUES ('2', '2', '扁平化UI设计指南', '广州APP开发公司，英趣科技，UI设计，扁平化设计', '<p style=\"text-align:justify\"><span style=\"font-size:14px\">如今设计界最炙手可热的明星大概就是扁平化设计了吧，关于它的讨论至今都没有冷却的迹象。诸多设计师分成了泾渭分明的两个阵营，一边努力把扁平化做到极致，一面对其不屑一顾。那么如何设计一个优秀的Flat UI界面呢？今天广州APP开发公司英趣科技的小编为你收集扁平化UI设计指南，帮你轻松打造Flat UI。</span></p>\n\n<p style=\"text-align:justify\"><strong><span style=\"font-size:18px\">一、 优化排版</span></strong></p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/43921414374395111.jpg\" style=\"border:0px; height:250px; vertical-align:middle; width:500px\" title=\"wKioJlGoY2mTgmKEAAA7mtsE0XA664.jpg\" /></p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/91001414374427435.jpg\" style=\"border:0px; height:292px; vertical-align:middle; width:500px\" title=\"wKioOVGoY2rRFjBsAAAzw0l6qzI187.jpg\" /></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">由于扁平化设计的使用特别简单的元素，排版就成了很重要的一环，排版好坏直接影响视觉效果，甚至可能间接影响用户体验。</span></p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">字体是排版中很重要的一部分，和其他元素相辅相成。想想看，一款花体字在扁平化的界面里得有多突兀。上图是一些扁平化网站使用无衬线字体的例子。无 衬线字体家族庞大分之众多，其中有些字体会在特殊的情景下会有意想不到的效果。但注意，过犹不及，不要使用那些极为生僻的字体，因为保不齐它就把你带进坑 里了。</span></p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">如何使用字体也是一门学问，要学会让不同的字体表达不同的概念，通过字体告诉用户这某一设计／功能的含义，努力使字体成为你简化设计的有力武器。</span></p>\n\n<p style=\"text-align:justify\"><strong><span style=\"font-size:18px\">二、拒绝特效</span></strong></p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/41771414374539664.jpg\" style=\"border:0px; height:250px; vertical-align:middle; width:500px\" title=\"wKioJlGoY2mBI-l9AABRD-JqEd0891.jpg\" /></p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/79621414374562100.jpg\" style=\"border:0px; height:376px; vertical-align:middle; width:500px\" title=\"wKioOVGoY2njFx4pAABYv_zjX24211.jpg\" /></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">扁平化这个词来自于这种设计所使用的样式和形状，它完全属于二次元世界，一个简单的形状加没有景深的平面，不叫扁平化都浪费这个词了。</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">这个概念最核心的地方就是放弃一切装饰效果，诸如阴影、透视、纹理、渐变等等能做出3D效果的元素一概不用。所有的元素的边界都干净俐落，没有任何羽化、渐变或者阴影。</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">这一设计趋势极力避免任何拟物化的元素，这导致这一设计风格在其它平台有时候显得突兀，前景图片、按钮、文本和导航栏与背景图片格格不入，各成一派。</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">那么，扁平化的效果如何呢？</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">因为这种设计有着鲜明的视觉效果，它所使用的元素之间有清晰的层次和布局，这使得用户能直观的了解每个元素的作用以及交互方式。如今从网页到手机应 用无不在使用扁平化的设计风格，尤其在手机上，因为屏幕的限制，使得这一风格在用户体验上更有优势，更少的按钮和选项使得界面干净整齐，使用起来格外简单。</span></p>\n\n<p style=\"text-align:justify\"><strong><span style=\"font-size:18px\">三、 界面元素</span></strong></p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/4281414374589524.jpg\" style=\"border:0px; height:376px; vertical-align:middle; width:500px\" title=\"wKioJlGoY2nxHEx8AAA-a9MYa18855.jpg\" /></p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/76351414374605828.jpg\" style=\"border:0px; height:250px; vertical-align:middle; width:500px\" title=\"wKioOVGoY2nRMo6EAAAgKcLfe_o504.jpg\" /></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">扁平化设计通常采用许多简单的用户界面元素，诸如按钮或者图标之类。设计师们通常坚持使用简单的外形（矩形或者圆形），并且尽量突出外形，这些元素一律为直角（极少的一些为圆角）。</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">这些用户界面元素方便用户点击，这能极大的减少用户学习新交互方式的成本，因为用户凭经验就能大概知道每个按钮的作用。</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">此外，扁平化除了简单的形状之外，还包括大胆的配色。但是需要注意的是，扁平化设计不是说简单的搞些形状和颜色搭配起来就行，它和其他设计风格一 样，是由许多的概念与方法组成的，想要学习具体设计方法的朋友可以看看Designmodo，有许多现成的设计实例可以让大家分享。</span></p>\n\n<p style=\"text-align:justify\"><strong><span style=\"font-size:18px\">四 、 最简方案</span></strong></p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/44091414374633520.jpg\" style=\"border:0px; height:333px; vertical-align:middle; width:500px\" title=\"wKioOVGoY2rTOq55AAA-NR4wAYE260.jpg\" /></p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/97481414374651272.jpg\" style=\"border:0px; height:299px; vertical-align:middle; width:500px\" title=\"wKioOVGoY2qQti_GAABSwD_P-S8257.jpg\" /></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">设计师要尽量简化自己的设计方案，避免不必要的元素在设计中出现。简单的颜色和字体就足够了，如果你还想添加点什么，尽量选择简单的图案。</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">扁平化设计尤其对一些做零售的网站帮助巨大，它能很有效的把商品组织起来，以简单但合理方式排列。</span></p>\n\n<p style=\"text-align:justify\"><strong><span style=\"font-size:18px\">五 、 如何配色</span></strong></p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/8111414374843802.jpg\" style=\"border:0px; height:292px; vertical-align:middle; width:500px\" title=\"wKioJlGoY2rQJuitAABvVBIC3dU552.jpg\" /></p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<p style=\"text-align:center\"><img src=\"http://www.appstar.com.cn/ace/upload/ueditor/images/20141027/44671414374864540.jpg\" style=\"border:0px; font-size:13px; height:376px; line-height:1.6; vertical-align:middle; width:500px\" title=\"wKioJlGoY2qxcknxAACsni_4Z70722.jpg\" /></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">扁平化设计中，配色貌似是最重要的一环，扁平化设计通常采用比其他风格更明亮、炫丽的颜色。同时，扁平化设计中的配色还意味着更多的色调。比如，其他设计最多只包含两三种主要颜色，但是扁平化设计中会平均使用六到八种。</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">而且扁平化设计中，往往倾向于使用单色调，尤其是纯色，并且不做任何淡化或柔化处理（最受欢迎的颜色是纯色和二次色）。另外还有一些颜色也挺受欢迎，如复古色（浅橙、紫色、绿色、蓝色等）。</span></p>\n\n<p style=\"text-align:justify\"><a href=\"http://www.gzinterest.com\">广州APP开发公司英趣科技</a>感谢您的阅读！</p>', null, '1414652868', '1414656957');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='资讯分类表';

-- ----------------------------
-- Records of int_news_category
-- ----------------------------
INSERT INTO `int_news_category` VALUES ('2', '行业资讯', '1414648055', '1414648870');
INSERT INTO `int_news_category` VALUES ('3', '公司动态', '1414648069', '1414648878');
INSERT INTO `int_news_category` VALUES ('4', 'APP技术资讯', '1414654243', '1414654291');

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
INSERT INTO `int_right_setting` VALUES ('1', '1944473773', '020-29869409', '/uploads/2014/10/24/dad2a48bb21a69b73c1c2b951f7056f96775a418.jpg');

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
