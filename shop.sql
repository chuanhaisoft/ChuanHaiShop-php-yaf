/*
Navicat MySQL Data Transfer

Source Server         : --新数据库--
Source Server Version : 50718
Source Host           : sh-cdb-98l8yqn5.sql.tencentcdb.com:63757
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2018-05-09 14:44:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for api_user
-- ----------------------------
DROP TABLE IF EXISTS `api_user`;
CREATE TABLE `api_user` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NAME` bigint(20) DEFAULT '0',
  `PASS` varchar(100) DEFAULT NULL,
  `POWERS` varchar(500) DEFAULT NULL,
  `ADD_TIME` datetime DEFAULT NULL,
  `STATE` tinyint(4) DEFAULT '1',
  `MESS` varchar(20) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT '0',
  `SHOP_AREA_ID` bigint(20) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of api_user
-- ----------------------------
INSERT INTO `api_user` VALUES ('1', '1001', 'Aqk464f8e6086Y48dWfg', ',1,10,', '2015-11-04 23:16:29', '0', '系统内置', '0', '0');

-- ----------------------------
-- Table structure for cai_wu
-- ----------------------------
DROP TABLE IF EXISTS `cai_wu`;
CREATE TABLE `cai_wu` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `MONEY` decimal(20,2) DEFAULT '0.00',
  `STATE` tinyint(4) DEFAULT '0' COMMENT '0:未审核，1：审核成功未操作 2：操作完成(成功) 3：撤销锁定成功 ',
  `ACT_TIME` datetime DEFAULT NULL,
  `MESS` varchar(200) DEFAULT NULL,
  `MODULE_ID` int(11) DEFAULT '0' COMMENT '1:提现 2：充值 3：转账',
  `ACT_USER_ID` bigint(20) unsigned DEFAULT '0',
  `IS_LOCK` tinyint(4) DEFAULT '0',
  `TO_USER` bigint(20) unsigned DEFAULT '0',
  `MESS_ID` bigint(20) unsigned DEFAULT '0' COMMENT '操作的信息ID',
  `ROLE_ID` int(11) DEFAULT '0',
  `MONEY_TRUE` decimal(20,2) DEFAULT '0.00' COMMENT '提现扣除手续费后金额',
  `FEE_1` decimal(20,2) DEFAULT '0.00' COMMENT '提现手续费1%所占的金额',
  `FEE_20` decimal(20,2) DEFAULT '0.00' COMMENT '提现手续费20%所占的金额',
  `DO_TIME` datetime DEFAULT NULL,
  `MESS2` varchar(80) DEFAULT NULL,
  `MONEY_CAN_EDIT` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `STATE` (`STATE`),
  KEY `MODULE_ID` (`MODULE_ID`),
  KEY `ACT_TIME` (`ACT_TIME`),
  KEY `IS_LOCK` (`IS_LOCK`),
  KEY `ROLE_ID` (`ROLE_ID`),
  KEY `MESS_ID` (`MESS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1064425 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cai_wu
-- ----------------------------

-- ----------------------------
-- Table structure for china
-- ----------------------------
DROP TABLE IF EXISTS `china`;
CREATE TABLE `china` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(40) DEFAULT NULL,
  `PID` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FK_CHINA_REFERENCE_CHINA` (`PID`),
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB AUTO_INCREMENT=820202 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of china
-- ----------------------------
INSERT INTO `china` VALUES ('110000', '北京市', '0');
INSERT INTO `china` VALUES ('110100', '北京市', '110000');
INSERT INTO `china` VALUES ('110101', '东城区', '110100');
INSERT INTO `china` VALUES ('110102', '西城区', '110100');
INSERT INTO `china` VALUES ('110105', '朝阳区', '110100');
INSERT INTO `china` VALUES ('110106', '丰台区', '110100');
INSERT INTO `china` VALUES ('110107', '石景山区', '110100');
INSERT INTO `china` VALUES ('110108', '海淀区', '110100');
INSERT INTO `china` VALUES ('110109', '门头沟区', '110100');
INSERT INTO `china` VALUES ('110111', '房山区', '110100');
INSERT INTO `china` VALUES ('110112', '通州区', '110100');
INSERT INTO `china` VALUES ('110113', '顺义区', '110100');
INSERT INTO `china` VALUES ('110114', '昌平区', '110100');
INSERT INTO `china` VALUES ('110115', '大兴区', '110100');
INSERT INTO `china` VALUES ('110116', '怀柔区', '110100');
INSERT INTO `china` VALUES ('110117', '平谷区', '110100');
INSERT INTO `china` VALUES ('110200', '县', '110000');
INSERT INTO `china` VALUES ('110228', '密云县', '110200');
INSERT INTO `china` VALUES ('110229', '延庆县', '110200');
INSERT INTO `china` VALUES ('120000', '天津市', '0');
INSERT INTO `china` VALUES ('120100', '天津市', '120000');
INSERT INTO `china` VALUES ('120101', '和平区', '120100');
INSERT INTO `china` VALUES ('120102', '河东区', '120100');
INSERT INTO `china` VALUES ('120103', '河西区', '120100');
INSERT INTO `china` VALUES ('120104', '南开区', '120100');
INSERT INTO `china` VALUES ('120105', '河北区', '120100');
INSERT INTO `china` VALUES ('120106', '红桥区', '120100');
INSERT INTO `china` VALUES ('120110', '东丽区', '120100');
INSERT INTO `china` VALUES ('120111', '西青区', '120100');
INSERT INTO `china` VALUES ('120112', '津南区', '120100');
INSERT INTO `china` VALUES ('120113', '北辰区', '120100');
INSERT INTO `china` VALUES ('120114', '武清区', '120100');
INSERT INTO `china` VALUES ('120115', '宝坻区', '120100');
INSERT INTO `china` VALUES ('120116', '滨海新区', '120100');
INSERT INTO `china` VALUES ('120117', '宁河区', '120100');
INSERT INTO `china` VALUES ('120118', '静海区', '120100');
INSERT INTO `china` VALUES ('120200', '县', '120000');
INSERT INTO `china` VALUES ('120225', '蓟县', '120200');
INSERT INTO `china` VALUES ('130000', '河北省', '0');
INSERT INTO `china` VALUES ('130100', '石家庄市', '130000');
INSERT INTO `china` VALUES ('130102', '长安区', '130100');
INSERT INTO `china` VALUES ('130104', '桥西区', '130100');
INSERT INTO `china` VALUES ('130105', '新华区', '130100');
INSERT INTO `china` VALUES ('130107', '井陉矿区', '130100');
INSERT INTO `china` VALUES ('130108', '裕华区', '130100');
INSERT INTO `china` VALUES ('130109', '藁城区', '130100');
INSERT INTO `china` VALUES ('130110', '鹿泉区', '130100');
INSERT INTO `china` VALUES ('130111', '栾城区', '130100');
INSERT INTO `china` VALUES ('130121', '井陉县', '130100');
INSERT INTO `china` VALUES ('130123', '正定县', '130100');
INSERT INTO `china` VALUES ('130125', '行唐县', '130100');
INSERT INTO `china` VALUES ('130126', '灵寿县', '130100');
INSERT INTO `china` VALUES ('130127', '高邑县', '130100');
INSERT INTO `china` VALUES ('130128', '深泽县', '130100');
INSERT INTO `china` VALUES ('130129', '赞皇县', '130100');
INSERT INTO `china` VALUES ('130130', '无极县', '130100');
INSERT INTO `china` VALUES ('130131', '平山县', '130100');
INSERT INTO `china` VALUES ('130132', '元氏县', '130100');
INSERT INTO `china` VALUES ('130133', '赵县', '130100');
INSERT INTO `china` VALUES ('130183', '晋州市', '130100');
INSERT INTO `china` VALUES ('130184', '新乐市', '130100');
INSERT INTO `china` VALUES ('130200', '唐山市', '130000');
INSERT INTO `china` VALUES ('130202', '路南区', '130200');
INSERT INTO `china` VALUES ('130203', '路北区', '130200');
INSERT INTO `china` VALUES ('130204', '古冶区', '130200');
INSERT INTO `china` VALUES ('130205', '开平区', '130200');
INSERT INTO `china` VALUES ('130207', '丰南区', '130200');
INSERT INTO `china` VALUES ('130208', '丰润区', '130200');
INSERT INTO `china` VALUES ('130209', '曹妃甸区', '130200');
INSERT INTO `china` VALUES ('130223', '滦县', '130200');
INSERT INTO `china` VALUES ('130224', '滦南县', '130200');
INSERT INTO `china` VALUES ('130225', '乐亭县', '130200');
INSERT INTO `china` VALUES ('130227', '迁西县', '130200');
INSERT INTO `china` VALUES ('130229', '玉田县', '130200');
INSERT INTO `china` VALUES ('130281', '遵化市', '130200');
INSERT INTO `china` VALUES ('130283', '迁安市', '130200');
INSERT INTO `china` VALUES ('130300', '秦皇岛市', '130000');
INSERT INTO `china` VALUES ('130302', '海港区', '130300');
INSERT INTO `china` VALUES ('130303', '山海关区', '130300');
INSERT INTO `china` VALUES ('130304', '北戴河区', '130300');
INSERT INTO `china` VALUES ('130306', '抚宁区', '130300');
INSERT INTO `china` VALUES ('130321', '青龙满族自治县', '130300');
INSERT INTO `china` VALUES ('130322', '昌黎县', '130300');
INSERT INTO `china` VALUES ('130324', '卢龙县', '130300');
INSERT INTO `china` VALUES ('130390', '经济技术开发区', '130300');
INSERT INTO `china` VALUES ('130400', '邯郸市', '130000');
INSERT INTO `china` VALUES ('130402', '邯山区', '130400');
INSERT INTO `china` VALUES ('130403', '丛台区', '130400');
INSERT INTO `china` VALUES ('130404', '复兴区', '130400');
INSERT INTO `china` VALUES ('130406', '峰峰矿区', '130400');
INSERT INTO `china` VALUES ('130421', '邯郸县', '130400');
INSERT INTO `china` VALUES ('130423', '临漳县', '130400');
INSERT INTO `china` VALUES ('130424', '成安县', '130400');
INSERT INTO `china` VALUES ('130425', '大名县', '130400');
INSERT INTO `china` VALUES ('130426', '涉县', '130400');
INSERT INTO `china` VALUES ('130427', '磁县', '130400');
INSERT INTO `china` VALUES ('130428', '肥乡县', '130400');
INSERT INTO `china` VALUES ('130429', '永年县', '130400');
INSERT INTO `china` VALUES ('130430', '邱县', '130400');
INSERT INTO `china` VALUES ('130431', '鸡泽县', '130400');
INSERT INTO `china` VALUES ('130432', '广平县', '130400');
INSERT INTO `china` VALUES ('130433', '馆陶县', '130400');
INSERT INTO `china` VALUES ('130434', '魏县', '130400');
INSERT INTO `china` VALUES ('130435', '曲周县', '130400');
INSERT INTO `china` VALUES ('130481', '武安市', '130400');
INSERT INTO `china` VALUES ('130500', '邢台市', '130000');
INSERT INTO `china` VALUES ('130502', '桥东区', '130500');
INSERT INTO `china` VALUES ('130503', '桥西区', '130500');
INSERT INTO `china` VALUES ('130521', '邢台县', '130500');
INSERT INTO `china` VALUES ('130522', '临城县', '130500');
INSERT INTO `china` VALUES ('130523', '内丘县', '130500');
INSERT INTO `china` VALUES ('130524', '柏乡县', '130500');
INSERT INTO `china` VALUES ('130525', '隆尧县', '130500');
INSERT INTO `china` VALUES ('130526', '任县', '130500');
INSERT INTO `china` VALUES ('130527', '南和县', '130500');
INSERT INTO `china` VALUES ('130528', '宁晋县', '130500');
INSERT INTO `china` VALUES ('130529', '巨鹿县', '130500');
INSERT INTO `china` VALUES ('130530', '新河县', '130500');
INSERT INTO `china` VALUES ('130531', '广宗县', '130500');
INSERT INTO `china` VALUES ('130532', '平乡县', '130500');
INSERT INTO `china` VALUES ('130533', '威县', '130500');
INSERT INTO `china` VALUES ('130534', '清河县', '130500');
INSERT INTO `china` VALUES ('130535', '临西县', '130500');
INSERT INTO `china` VALUES ('130581', '南宫市', '130500');
INSERT INTO `china` VALUES ('130582', '沙河市', '130500');
INSERT INTO `china` VALUES ('130600', '保定市', '130000');
INSERT INTO `china` VALUES ('130602', '竞秀区', '130600');
INSERT INTO `china` VALUES ('130606', '莲池区', '130600');
INSERT INTO `china` VALUES ('130607', '满城区', '130600');
INSERT INTO `china` VALUES ('130608', '清苑区', '130600');
INSERT INTO `china` VALUES ('130609', '徐水区', '130600');
INSERT INTO `china` VALUES ('130623', '涞水县', '130600');
INSERT INTO `china` VALUES ('130624', '阜平县', '130600');
INSERT INTO `china` VALUES ('130626', '定兴县', '130600');
INSERT INTO `china` VALUES ('130627', '唐县', '130600');
INSERT INTO `china` VALUES ('130628', '高阳县', '130600');
INSERT INTO `china` VALUES ('130629', '容城县', '130600');
INSERT INTO `china` VALUES ('130630', '涞源县', '130600');
INSERT INTO `china` VALUES ('130631', '望都县', '130600');
INSERT INTO `china` VALUES ('130632', '安新县', '130600');
INSERT INTO `china` VALUES ('130633', '易县', '130600');
INSERT INTO `china` VALUES ('130634', '曲阳县', '130600');
INSERT INTO `china` VALUES ('130635', '蠡县', '130600');
INSERT INTO `china` VALUES ('130636', '顺平县', '130600');
INSERT INTO `china` VALUES ('130637', '博野县', '130600');
INSERT INTO `china` VALUES ('130638', '雄县', '130600');
INSERT INTO `china` VALUES ('130681', '涿州市', '130600');
INSERT INTO `china` VALUES ('130683', '安国市', '130600');
INSERT INTO `china` VALUES ('130684', '高碑店市', '130600');
INSERT INTO `china` VALUES ('130700', '张家口市', '130000');
INSERT INTO `china` VALUES ('130702', '桥东区', '130700');
INSERT INTO `china` VALUES ('130703', '桥西区', '130700');
INSERT INTO `china` VALUES ('130705', '宣化区', '130700');
INSERT INTO `china` VALUES ('130706', '下花园区', '130700');
INSERT INTO `china` VALUES ('130721', '宣化县', '130700');
INSERT INTO `china` VALUES ('130722', '张北县', '130700');
INSERT INTO `china` VALUES ('130723', '康保县', '130700');
INSERT INTO `china` VALUES ('130724', '沽源县', '130700');
INSERT INTO `china` VALUES ('130725', '尚义县', '130700');
INSERT INTO `china` VALUES ('130726', '蔚县', '130700');
INSERT INTO `china` VALUES ('130727', '阳原县', '130700');
INSERT INTO `china` VALUES ('130728', '怀安县', '130700');
INSERT INTO `china` VALUES ('130729', '万全县', '130700');
INSERT INTO `china` VALUES ('130730', '怀来县', '130700');
INSERT INTO `china` VALUES ('130731', '涿鹿县', '130700');
INSERT INTO `china` VALUES ('130732', '赤城县', '130700');
INSERT INTO `china` VALUES ('130733', '崇礼县', '130700');
INSERT INTO `china` VALUES ('130800', '承德市', '130000');
INSERT INTO `china` VALUES ('130802', '双桥区', '130800');
INSERT INTO `china` VALUES ('130803', '双滦区', '130800');
INSERT INTO `china` VALUES ('130804', '鹰手营子矿区', '130800');
INSERT INTO `china` VALUES ('130821', '承德县', '130800');
INSERT INTO `china` VALUES ('130822', '兴隆县', '130800');
INSERT INTO `china` VALUES ('130823', '平泉县', '130800');
INSERT INTO `china` VALUES ('130824', '滦平县', '130800');
INSERT INTO `china` VALUES ('130825', '隆化县', '130800');
INSERT INTO `china` VALUES ('130826', '丰宁满族自治县', '130800');
INSERT INTO `china` VALUES ('130827', '宽城满族自治县', '130800');
INSERT INTO `china` VALUES ('130828', '围场满族蒙古族自治县', '130800');
INSERT INTO `china` VALUES ('130900', '沧州市', '130000');
INSERT INTO `china` VALUES ('130902', '新华区', '130900');
INSERT INTO `china` VALUES ('130903', '运河区', '130900');
INSERT INTO `china` VALUES ('130921', '沧县', '130900');
INSERT INTO `china` VALUES ('130922', '青县', '130900');
INSERT INTO `china` VALUES ('130923', '东光县', '130900');
INSERT INTO `china` VALUES ('130924', '海兴县', '130900');
INSERT INTO `china` VALUES ('130925', '盐山县', '130900');
INSERT INTO `china` VALUES ('130926', '肃宁县', '130900');
INSERT INTO `china` VALUES ('130927', '南皮县', '130900');
INSERT INTO `china` VALUES ('130928', '吴桥县', '130900');
INSERT INTO `china` VALUES ('130929', '献县', '130900');
INSERT INTO `china` VALUES ('130930', '孟村回族自治县', '130900');
INSERT INTO `china` VALUES ('130981', '泊头市', '130900');
INSERT INTO `china` VALUES ('130982', '任丘市', '130900');
INSERT INTO `china` VALUES ('130983', '黄骅市', '130900');
INSERT INTO `china` VALUES ('130984', '河间市', '130900');
INSERT INTO `china` VALUES ('131000', '廊坊市', '130000');
INSERT INTO `china` VALUES ('131002', '安次区', '131000');
INSERT INTO `china` VALUES ('131003', '广阳区', '131000');
INSERT INTO `china` VALUES ('131022', '固安县', '131000');
INSERT INTO `china` VALUES ('131023', '永清县', '131000');
INSERT INTO `china` VALUES ('131024', '香河县', '131000');
INSERT INTO `china` VALUES ('131025', '大城县', '131000');
INSERT INTO `china` VALUES ('131026', '文安县', '131000');
INSERT INTO `china` VALUES ('131028', '大厂回族自治县', '131000');
INSERT INTO `china` VALUES ('131081', '霸州市', '131000');
INSERT INTO `china` VALUES ('131082', '三河市', '131000');
INSERT INTO `china` VALUES ('131090', '开发区', '131000');
INSERT INTO `china` VALUES ('131091', '燕郊经济技术开发区', '131000');
INSERT INTO `china` VALUES ('131100', '衡水市', '130000');
INSERT INTO `china` VALUES ('131102', '桃城区', '131100');
INSERT INTO `china` VALUES ('131121', '枣强县', '131100');
INSERT INTO `china` VALUES ('131122', '武邑县', '131100');
INSERT INTO `china` VALUES ('131123', '武强县', '131100');
INSERT INTO `china` VALUES ('131124', '饶阳县', '131100');
INSERT INTO `china` VALUES ('131125', '安平县', '131100');
INSERT INTO `china` VALUES ('131126', '故城县', '131100');
INSERT INTO `china` VALUES ('131127', '景县', '131100');
INSERT INTO `china` VALUES ('131128', '阜城县', '131100');
INSERT INTO `china` VALUES ('131181', '冀州市', '131100');
INSERT INTO `china` VALUES ('131182', '深州市', '131100');
INSERT INTO `china` VALUES ('139000', '省直辖县', '130000');
INSERT INTO `china` VALUES ('139001', '定州市', '139000');
INSERT INTO `china` VALUES ('139002', '辛集市', '139000');
INSERT INTO `china` VALUES ('140000', '山西省', '0');
INSERT INTO `china` VALUES ('140100', '太原市', '140000');
INSERT INTO `china` VALUES ('140105', '小店区', '140100');
INSERT INTO `china` VALUES ('140106', '迎泽区', '140100');
INSERT INTO `china` VALUES ('140107', '杏花岭区', '140100');
INSERT INTO `china` VALUES ('140108', '尖草坪区', '140100');
INSERT INTO `china` VALUES ('140109', '万柏林区', '140100');
INSERT INTO `china` VALUES ('140110', '晋源区', '140100');
INSERT INTO `china` VALUES ('140121', '清徐县', '140100');
INSERT INTO `china` VALUES ('140122', '阳曲县', '140100');
INSERT INTO `china` VALUES ('140123', '娄烦县', '140100');
INSERT INTO `china` VALUES ('140181', '古交市', '140100');
INSERT INTO `china` VALUES ('140200', '大同市', '140000');
INSERT INTO `china` VALUES ('140202', '城区', '140200');
INSERT INTO `china` VALUES ('140203', '矿区', '140200');
INSERT INTO `china` VALUES ('140211', '南郊区', '140200');
INSERT INTO `china` VALUES ('140212', '新荣区', '140200');
INSERT INTO `china` VALUES ('140221', '阳高县', '140200');
INSERT INTO `china` VALUES ('140222', '天镇县', '140200');
INSERT INTO `china` VALUES ('140223', '广灵县', '140200');
INSERT INTO `china` VALUES ('140224', '灵丘县', '140200');
INSERT INTO `china` VALUES ('140225', '浑源县', '140200');
INSERT INTO `china` VALUES ('140226', '左云县', '140200');
INSERT INTO `china` VALUES ('140227', '大同县', '140200');
INSERT INTO `china` VALUES ('140300', '阳泉市', '140000');
INSERT INTO `china` VALUES ('140302', '城区', '140300');
INSERT INTO `china` VALUES ('140303', '矿区', '140300');
INSERT INTO `china` VALUES ('140311', '郊区', '140300');
INSERT INTO `china` VALUES ('140321', '平定县', '140300');
INSERT INTO `china` VALUES ('140322', '盂县', '140300');
INSERT INTO `china` VALUES ('140400', '长治市', '140000');
INSERT INTO `china` VALUES ('140402', '城区', '140400');
INSERT INTO `china` VALUES ('140411', '郊区', '140400');
INSERT INTO `china` VALUES ('140421', '长治县', '140400');
INSERT INTO `china` VALUES ('140423', '襄垣县', '140400');
INSERT INTO `china` VALUES ('140424', '屯留县', '140400');
INSERT INTO `china` VALUES ('140425', '平顺县', '140400');
INSERT INTO `china` VALUES ('140426', '黎城县', '140400');
INSERT INTO `china` VALUES ('140427', '壶关县', '140400');
INSERT INTO `china` VALUES ('140428', '长子县', '140400');
INSERT INTO `china` VALUES ('140429', '武乡县', '140400');
INSERT INTO `china` VALUES ('140430', '沁县', '140400');
INSERT INTO `china` VALUES ('140431', '沁源县', '140400');
INSERT INTO `china` VALUES ('140481', '潞城市', '140400');
INSERT INTO `china` VALUES ('140500', '晋城市', '140000');
INSERT INTO `china` VALUES ('140502', '城区', '140500');
INSERT INTO `china` VALUES ('140521', '沁水县', '140500');
INSERT INTO `china` VALUES ('140522', '阳城县', '140500');
INSERT INTO `china` VALUES ('140524', '陵川县', '140500');
INSERT INTO `china` VALUES ('140525', '泽州县', '140500');
INSERT INTO `china` VALUES ('140581', '高平市', '140500');
INSERT INTO `china` VALUES ('140600', '朔州市', '140000');
INSERT INTO `china` VALUES ('140602', '朔城区', '140600');
INSERT INTO `china` VALUES ('140603', '平鲁区', '140600');
INSERT INTO `china` VALUES ('140621', '山阴县', '140600');
INSERT INTO `china` VALUES ('140622', '应县', '140600');
INSERT INTO `china` VALUES ('140623', '右玉县', '140600');
INSERT INTO `china` VALUES ('140624', '怀仁县', '140600');
INSERT INTO `china` VALUES ('140700', '晋中市', '140000');
INSERT INTO `china` VALUES ('140702', '榆次区', '140700');
INSERT INTO `china` VALUES ('140721', '榆社县', '140700');
INSERT INTO `china` VALUES ('140722', '左权县', '140700');
INSERT INTO `china` VALUES ('140723', '和顺县', '140700');
INSERT INTO `china` VALUES ('140724', '昔阳县', '140700');
INSERT INTO `china` VALUES ('140725', '寿阳县', '140700');
INSERT INTO `china` VALUES ('140726', '太谷县', '140700');
INSERT INTO `china` VALUES ('140727', '祁县', '140700');
INSERT INTO `china` VALUES ('140728', '平遥县', '140700');
INSERT INTO `china` VALUES ('140729', '灵石县', '140700');
INSERT INTO `china` VALUES ('140781', '介休市', '140700');
INSERT INTO `china` VALUES ('140800', '运城市', '140000');
INSERT INTO `china` VALUES ('140802', '盐湖区', '140800');
INSERT INTO `china` VALUES ('140821', '临猗县', '140800');
INSERT INTO `china` VALUES ('140822', '万荣县', '140800');
INSERT INTO `china` VALUES ('140823', '闻喜县', '140800');
INSERT INTO `china` VALUES ('140824', '稷山县', '140800');
INSERT INTO `china` VALUES ('140825', '新绛县', '140800');
INSERT INTO `china` VALUES ('140826', '绛县', '140800');
INSERT INTO `china` VALUES ('140827', '垣曲县', '140800');
INSERT INTO `china` VALUES ('140828', '夏县', '140800');
INSERT INTO `china` VALUES ('140829', '平陆县', '140800');
INSERT INTO `china` VALUES ('140830', '芮城县', '140800');
INSERT INTO `china` VALUES ('140881', '永济市', '140800');
INSERT INTO `china` VALUES ('140882', '河津市', '140800');
INSERT INTO `china` VALUES ('140900', '忻州市', '140000');
INSERT INTO `china` VALUES ('140902', '忻府区', '140900');
INSERT INTO `china` VALUES ('140921', '定襄县', '140900');
INSERT INTO `china` VALUES ('140922', '五台县', '140900');
INSERT INTO `china` VALUES ('140923', '代县', '140900');
INSERT INTO `china` VALUES ('140924', '繁峙县', '140900');
INSERT INTO `china` VALUES ('140925', '宁武县', '140900');
INSERT INTO `china` VALUES ('140926', '静乐县', '140900');
INSERT INTO `china` VALUES ('140927', '神池县', '140900');
INSERT INTO `china` VALUES ('140928', '五寨县', '140900');
INSERT INTO `china` VALUES ('140929', '岢岚县', '140900');
INSERT INTO `china` VALUES ('140930', '河曲县', '140900');
INSERT INTO `china` VALUES ('140931', '保德县', '140900');
INSERT INTO `china` VALUES ('140932', '偏关县', '140900');
INSERT INTO `china` VALUES ('140981', '原平市', '140900');
INSERT INTO `china` VALUES ('141000', '临汾市', '140000');
INSERT INTO `china` VALUES ('141002', '尧都区', '141000');
INSERT INTO `china` VALUES ('141021', '曲沃县', '141000');
INSERT INTO `china` VALUES ('141022', '翼城县', '141000');
INSERT INTO `china` VALUES ('141023', '襄汾县', '141000');
INSERT INTO `china` VALUES ('141024', '洪洞县', '141000');
INSERT INTO `china` VALUES ('141025', '古县', '141000');
INSERT INTO `china` VALUES ('141026', '安泽县', '141000');
INSERT INTO `china` VALUES ('141027', '浮山县', '141000');
INSERT INTO `china` VALUES ('141028', '吉县', '141000');
INSERT INTO `china` VALUES ('141029', '乡宁县', '141000');
INSERT INTO `china` VALUES ('141030', '大宁县', '141000');
INSERT INTO `china` VALUES ('141031', '隰县', '141000');
INSERT INTO `china` VALUES ('141032', '永和县', '141000');
INSERT INTO `china` VALUES ('141033', '蒲县', '141000');
INSERT INTO `china` VALUES ('141034', '汾西县', '141000');
INSERT INTO `china` VALUES ('141081', '侯马市', '141000');
INSERT INTO `china` VALUES ('141082', '霍州市', '141000');
INSERT INTO `china` VALUES ('141100', '吕梁市', '140000');
INSERT INTO `china` VALUES ('141102', '离石区', '141100');
INSERT INTO `china` VALUES ('141121', '文水县', '141100');
INSERT INTO `china` VALUES ('141122', '交城县', '141100');
INSERT INTO `china` VALUES ('141123', '兴县', '141100');
INSERT INTO `china` VALUES ('141124', '临县', '141100');
INSERT INTO `china` VALUES ('141125', '柳林县', '141100');
INSERT INTO `china` VALUES ('141126', '石楼县', '141100');
INSERT INTO `china` VALUES ('141127', '岚县', '141100');
INSERT INTO `china` VALUES ('141128', '方山县', '141100');
INSERT INTO `china` VALUES ('141129', '中阳县', '141100');
INSERT INTO `china` VALUES ('141130', '交口县', '141100');
INSERT INTO `china` VALUES ('141181', '孝义市', '141100');
INSERT INTO `china` VALUES ('141182', '汾阳市', '141100');
INSERT INTO `china` VALUES ('150000', '内蒙古自治区', '0');
INSERT INTO `china` VALUES ('150100', '呼和浩特市', '150000');
INSERT INTO `china` VALUES ('150102', '新城区', '150100');
INSERT INTO `china` VALUES ('150103', '回民区', '150100');
INSERT INTO `china` VALUES ('150104', '玉泉区', '150100');
INSERT INTO `china` VALUES ('150105', '赛罕区', '150100');
INSERT INTO `china` VALUES ('150121', '土默特左旗', '150100');
INSERT INTO `china` VALUES ('150122', '托克托县', '150100');
INSERT INTO `china` VALUES ('150123', '和林格尔县', '150100');
INSERT INTO `china` VALUES ('150124', '清水河县', '150100');
INSERT INTO `china` VALUES ('150125', '武川县', '150100');
INSERT INTO `china` VALUES ('150200', '包头市', '150000');
INSERT INTO `china` VALUES ('150202', '东河区', '150200');
INSERT INTO `china` VALUES ('150203', '昆都仑区', '150200');
INSERT INTO `china` VALUES ('150204', '青山区', '150200');
INSERT INTO `china` VALUES ('150205', '石拐区', '150200');
INSERT INTO `china` VALUES ('150206', '白云鄂博矿区', '150200');
INSERT INTO `china` VALUES ('150207', '九原区', '150200');
INSERT INTO `china` VALUES ('150221', '土默特右旗', '150200');
INSERT INTO `china` VALUES ('150222', '固阳县', '150200');
INSERT INTO `china` VALUES ('150223', '达尔罕茂明安联合旗', '150200');
INSERT INTO `china` VALUES ('150300', '乌海市', '150000');
INSERT INTO `china` VALUES ('150302', '海勃湾区', '150300');
INSERT INTO `china` VALUES ('150303', '海南区', '150300');
INSERT INTO `china` VALUES ('150304', '乌达区', '150300');
INSERT INTO `china` VALUES ('150400', '赤峰市', '150000');
INSERT INTO `china` VALUES ('150402', '红山区', '150400');
INSERT INTO `china` VALUES ('150403', '元宝山区', '150400');
INSERT INTO `china` VALUES ('150404', '松山区', '150400');
INSERT INTO `china` VALUES ('150421', '阿鲁科尔沁旗', '150400');
INSERT INTO `china` VALUES ('150422', '巴林左旗', '150400');
INSERT INTO `china` VALUES ('150423', '巴林右旗', '150400');
INSERT INTO `china` VALUES ('150424', '林西县', '150400');
INSERT INTO `china` VALUES ('150425', '克什克腾旗', '150400');
INSERT INTO `china` VALUES ('150426', '翁牛特旗', '150400');
INSERT INTO `china` VALUES ('150428', '喀喇沁旗', '150400');
INSERT INTO `china` VALUES ('150429', '宁城县', '150400');
INSERT INTO `china` VALUES ('150430', '敖汉旗', '150400');
INSERT INTO `china` VALUES ('150500', '通辽市', '150000');
INSERT INTO `china` VALUES ('150502', '科尔沁区', '150500');
INSERT INTO `china` VALUES ('150521', '科尔沁左翼中旗', '150500');
INSERT INTO `china` VALUES ('150522', '科尔沁左翼后旗', '150500');
INSERT INTO `china` VALUES ('150523', '开鲁县', '150500');
INSERT INTO `china` VALUES ('150524', '库伦旗', '150500');
INSERT INTO `china` VALUES ('150525', '奈曼旗', '150500');
INSERT INTO `china` VALUES ('150526', '扎鲁特旗', '150500');
INSERT INTO `china` VALUES ('150581', '霍林郭勒市', '150500');
INSERT INTO `china` VALUES ('150600', '鄂尔多斯市', '150000');
INSERT INTO `china` VALUES ('150602', '东胜区', '150600');
INSERT INTO `china` VALUES ('150621', '达拉特旗', '150600');
INSERT INTO `china` VALUES ('150622', '准格尔旗', '150600');
INSERT INTO `china` VALUES ('150623', '鄂托克前旗', '150600');
INSERT INTO `china` VALUES ('150624', '鄂托克旗', '150600');
INSERT INTO `china` VALUES ('150625', '杭锦旗', '150600');
INSERT INTO `china` VALUES ('150626', '乌审旗', '150600');
INSERT INTO `china` VALUES ('150627', '伊金霍洛旗', '150600');
INSERT INTO `china` VALUES ('150700', '呼伦贝尔市', '150000');
INSERT INTO `china` VALUES ('150702', '海拉尔区', '150700');
INSERT INTO `china` VALUES ('150703', '扎赉诺尔区', '150700');
INSERT INTO `china` VALUES ('150721', '阿荣旗', '150700');
INSERT INTO `china` VALUES ('150722', '莫力达瓦达斡尔族自治旗', '150700');
INSERT INTO `china` VALUES ('150723', '鄂伦春自治旗', '150700');
INSERT INTO `china` VALUES ('150724', '鄂温克族自治旗', '150700');
INSERT INTO `china` VALUES ('150725', '陈巴尔虎旗', '150700');
INSERT INTO `china` VALUES ('150726', '新巴尔虎左旗', '150700');
INSERT INTO `china` VALUES ('150727', '新巴尔虎右旗', '150700');
INSERT INTO `china` VALUES ('150781', '满洲里市', '150700');
INSERT INTO `china` VALUES ('150782', '牙克石市', '150700');
INSERT INTO `china` VALUES ('150783', '扎兰屯市', '150700');
INSERT INTO `china` VALUES ('150784', '额尔古纳市', '150700');
INSERT INTO `china` VALUES ('150785', '根河市', '150700');
INSERT INTO `china` VALUES ('150800', '巴彦淖尔市', '150000');
INSERT INTO `china` VALUES ('150802', '临河区', '150800');
INSERT INTO `china` VALUES ('150821', '五原县', '150800');
INSERT INTO `china` VALUES ('150822', '磴口县', '150800');
INSERT INTO `china` VALUES ('150823', '乌拉特前旗', '150800');
INSERT INTO `china` VALUES ('150824', '乌拉特中旗', '150800');
INSERT INTO `china` VALUES ('150825', '乌拉特后旗', '150800');
INSERT INTO `china` VALUES ('150826', '杭锦后旗', '150800');
INSERT INTO `china` VALUES ('150900', '乌兰察布市', '150000');
INSERT INTO `china` VALUES ('150902', '集宁区', '150900');
INSERT INTO `china` VALUES ('150921', '卓资县', '150900');
INSERT INTO `china` VALUES ('150922', '化德县', '150900');
INSERT INTO `china` VALUES ('150923', '商都县', '150900');
INSERT INTO `china` VALUES ('150924', '兴和县', '150900');
INSERT INTO `china` VALUES ('150925', '凉城县', '150900');
INSERT INTO `china` VALUES ('150926', '察哈尔右翼前旗', '150900');
INSERT INTO `china` VALUES ('150927', '察哈尔右翼中旗', '150900');
INSERT INTO `china` VALUES ('150928', '察哈尔右翼后旗', '150900');
INSERT INTO `china` VALUES ('150929', '四子王旗', '150900');
INSERT INTO `china` VALUES ('150981', '丰镇市', '150900');
INSERT INTO `china` VALUES ('152200', '兴安盟', '150000');
INSERT INTO `china` VALUES ('152201', '乌兰浩特市', '152200');
INSERT INTO `china` VALUES ('152202', '阿尔山市', '152200');
INSERT INTO `china` VALUES ('152221', '科尔沁右翼前旗', '152200');
INSERT INTO `china` VALUES ('152222', '科尔沁右翼中旗', '152200');
INSERT INTO `china` VALUES ('152223', '扎赉特旗', '152200');
INSERT INTO `china` VALUES ('152224', '突泉县', '152200');
INSERT INTO `china` VALUES ('152500', '锡林郭勒盟', '150000');
INSERT INTO `china` VALUES ('152501', '二连浩特市', '152500');
INSERT INTO `china` VALUES ('152502', '锡林浩特市', '152500');
INSERT INTO `china` VALUES ('152522', '阿巴嘎旗', '152500');
INSERT INTO `china` VALUES ('152523', '苏尼特左旗', '152500');
INSERT INTO `china` VALUES ('152524', '苏尼特右旗', '152500');
INSERT INTO `china` VALUES ('152525', '东乌珠穆沁旗', '152500');
INSERT INTO `china` VALUES ('152526', '西乌珠穆沁旗', '152500');
INSERT INTO `china` VALUES ('152527', '太仆寺旗', '152500');
INSERT INTO `china` VALUES ('152528', '镶黄旗', '152500');
INSERT INTO `china` VALUES ('152529', '正镶白旗', '152500');
INSERT INTO `china` VALUES ('152530', '正蓝旗', '152500');
INSERT INTO `china` VALUES ('152531', '多伦县', '152500');
INSERT INTO `china` VALUES ('152900', '阿拉善盟', '150000');
INSERT INTO `china` VALUES ('152921', '阿拉善左旗', '152900');
INSERT INTO `china` VALUES ('152922', '阿拉善右旗', '152900');
INSERT INTO `china` VALUES ('152923', '额济纳旗', '152900');
INSERT INTO `china` VALUES ('210000', '辽宁省', '0');
INSERT INTO `china` VALUES ('210100', '沈阳市', '210000');
INSERT INTO `china` VALUES ('210102', '和平区', '210100');
INSERT INTO `china` VALUES ('210103', '沈河区', '210100');
INSERT INTO `china` VALUES ('210104', '大东区', '210100');
INSERT INTO `china` VALUES ('210105', '皇姑区', '210100');
INSERT INTO `china` VALUES ('210106', '铁西区', '210100');
INSERT INTO `china` VALUES ('210111', '苏家屯区', '210100');
INSERT INTO `china` VALUES ('210112', '浑南区', '210100');
INSERT INTO `china` VALUES ('210113', '沈北新区', '210100');
INSERT INTO `china` VALUES ('210114', '于洪区', '210100');
INSERT INTO `china` VALUES ('210122', '辽中县', '210100');
INSERT INTO `china` VALUES ('210123', '康平县', '210100');
INSERT INTO `china` VALUES ('210124', '法库县', '210100');
INSERT INTO `china` VALUES ('210181', '新民市', '210100');
INSERT INTO `china` VALUES ('210190', '经济技术开发区', '210100');
INSERT INTO `china` VALUES ('210200', '大连市', '210000');
INSERT INTO `china` VALUES ('210202', '中山区', '210200');
INSERT INTO `china` VALUES ('210203', '西岗区', '210200');
INSERT INTO `china` VALUES ('210204', '沙河口区', '210200');
INSERT INTO `china` VALUES ('210211', '甘井子区', '210200');
INSERT INTO `china` VALUES ('210212', '旅顺口区', '210200');
INSERT INTO `china` VALUES ('210213', '金州区', '210200');
INSERT INTO `china` VALUES ('210224', '长海县', '210200');
INSERT INTO `china` VALUES ('210281', '瓦房店市', '210200');
INSERT INTO `china` VALUES ('210282', '普兰店市', '210200');
INSERT INTO `china` VALUES ('210283', '庄河市', '210200');
INSERT INTO `china` VALUES ('210291', '大连经济技术开发区', '210200');
INSERT INTO `china` VALUES ('210292', '大连高新区', '210200');
INSERT INTO `china` VALUES ('210300', '鞍山市', '210000');
INSERT INTO `china` VALUES ('210302', '铁东区', '210300');
INSERT INTO `china` VALUES ('210303', '铁西区', '210300');
INSERT INTO `china` VALUES ('210304', '立山区', '210300');
INSERT INTO `china` VALUES ('210311', '千山区', '210300');
INSERT INTO `china` VALUES ('210321', '台安县', '210300');
INSERT INTO `china` VALUES ('210323', '岫岩满族自治县', '210300');
INSERT INTO `china` VALUES ('210381', '海城市', '210300');
INSERT INTO `china` VALUES ('210390', '高新区', '210300');
INSERT INTO `china` VALUES ('210400', '抚顺市', '210000');
INSERT INTO `china` VALUES ('210402', '新抚区', '210400');
INSERT INTO `china` VALUES ('210403', '东洲区', '210400');
INSERT INTO `china` VALUES ('210404', '望花区', '210400');
INSERT INTO `china` VALUES ('210411', '顺城区', '210400');
INSERT INTO `china` VALUES ('210421', '抚顺县', '210400');
INSERT INTO `china` VALUES ('210422', '新宾满族自治县', '210400');
INSERT INTO `china` VALUES ('210423', '清原满族自治县', '210400');
INSERT INTO `china` VALUES ('210500', '本溪市', '210000');
INSERT INTO `china` VALUES ('210502', '平山区', '210500');
INSERT INTO `china` VALUES ('210503', '溪湖区', '210500');
INSERT INTO `china` VALUES ('210504', '明山区', '210500');
INSERT INTO `china` VALUES ('210505', '南芬区', '210500');
INSERT INTO `china` VALUES ('210521', '本溪满族自治县', '210500');
INSERT INTO `china` VALUES ('210522', '桓仁满族自治县', '210500');
INSERT INTO `china` VALUES ('210600', '丹东市', '210000');
INSERT INTO `china` VALUES ('210602', '元宝区', '210600');
INSERT INTO `china` VALUES ('210603', '振兴区', '210600');
INSERT INTO `china` VALUES ('210604', '振安区', '210600');
INSERT INTO `china` VALUES ('210624', '宽甸满族自治县', '210600');
INSERT INTO `china` VALUES ('210681', '东港市', '210600');
INSERT INTO `china` VALUES ('210682', '凤城市', '210600');
INSERT INTO `china` VALUES ('210700', '锦州市', '210000');
INSERT INTO `china` VALUES ('210702', '古塔区', '210700');
INSERT INTO `china` VALUES ('210703', '凌河区', '210700');
INSERT INTO `china` VALUES ('210711', '太和区', '210700');
INSERT INTO `china` VALUES ('210726', '黑山县', '210700');
INSERT INTO `china` VALUES ('210727', '义县', '210700');
INSERT INTO `china` VALUES ('210781', '凌海市', '210700');
INSERT INTO `china` VALUES ('210782', '北镇市', '210700');
INSERT INTO `china` VALUES ('210793', '经济技术开发区', '210700');
INSERT INTO `china` VALUES ('210800', '营口市', '210000');
INSERT INTO `china` VALUES ('210802', '站前区', '210800');
INSERT INTO `china` VALUES ('210803', '西市区', '210800');
INSERT INTO `china` VALUES ('210804', '鲅鱼圈区', '210800');
INSERT INTO `china` VALUES ('210811', '老边区', '210800');
INSERT INTO `china` VALUES ('210881', '盖州市', '210800');
INSERT INTO `china` VALUES ('210882', '大石桥市', '210800');
INSERT INTO `china` VALUES ('210900', '阜新市', '210000');
INSERT INTO `china` VALUES ('210902', '海州区', '210900');
INSERT INTO `china` VALUES ('210903', '新邱区', '210900');
INSERT INTO `china` VALUES ('210904', '太平区', '210900');
INSERT INTO `china` VALUES ('210905', '清河门区', '210900');
INSERT INTO `china` VALUES ('210911', '细河区', '210900');
INSERT INTO `china` VALUES ('210921', '阜新蒙古族自治县', '210900');
INSERT INTO `china` VALUES ('210922', '彰武县', '210900');
INSERT INTO `china` VALUES ('211000', '辽阳市', '210000');
INSERT INTO `china` VALUES ('211002', '白塔区', '211000');
INSERT INTO `china` VALUES ('211003', '文圣区', '211000');
INSERT INTO `china` VALUES ('211004', '宏伟区', '211000');
INSERT INTO `china` VALUES ('211005', '弓长岭区', '211000');
INSERT INTO `china` VALUES ('211011', '太子河区', '211000');
INSERT INTO `china` VALUES ('211021', '辽阳县', '211000');
INSERT INTO `china` VALUES ('211081', '灯塔市', '211000');
INSERT INTO `china` VALUES ('211100', '盘锦市', '210000');
INSERT INTO `china` VALUES ('211102', '双台子区', '211100');
INSERT INTO `china` VALUES ('211103', '兴隆台区', '211100');
INSERT INTO `china` VALUES ('211121', '大洼县', '211100');
INSERT INTO `china` VALUES ('211122', '盘山县', '211100');
INSERT INTO `china` VALUES ('211200', '铁岭市', '210000');
INSERT INTO `china` VALUES ('211202', '银州区', '211200');
INSERT INTO `china` VALUES ('211204', '清河区', '211200');
INSERT INTO `china` VALUES ('211221', '铁岭县', '211200');
INSERT INTO `china` VALUES ('211223', '西丰县', '211200');
INSERT INTO `china` VALUES ('211224', '昌图县', '211200');
INSERT INTO `china` VALUES ('211281', '调兵山市', '211200');
INSERT INTO `china` VALUES ('211282', '开原市', '211200');
INSERT INTO `china` VALUES ('211300', '朝阳市', '210000');
INSERT INTO `china` VALUES ('211302', '双塔区', '211300');
INSERT INTO `china` VALUES ('211303', '龙城区', '211300');
INSERT INTO `china` VALUES ('211321', '朝阳县', '211300');
INSERT INTO `china` VALUES ('211322', '建平县', '211300');
INSERT INTO `china` VALUES ('211324', '喀喇沁左翼蒙古族自治县', '211300');
INSERT INTO `china` VALUES ('211381', '北票市', '211300');
INSERT INTO `china` VALUES ('211382', '凌源市', '211300');
INSERT INTO `china` VALUES ('211400', '葫芦岛市', '210000');
INSERT INTO `china` VALUES ('211402', '连山区', '211400');
INSERT INTO `china` VALUES ('211403', '龙港区', '211400');
INSERT INTO `china` VALUES ('211404', '南票区', '211400');
INSERT INTO `china` VALUES ('211421', '绥中县', '211400');
INSERT INTO `china` VALUES ('211422', '建昌县', '211400');
INSERT INTO `china` VALUES ('211481', '兴城市', '211400');
INSERT INTO `china` VALUES ('220000', '吉林省', '0');
INSERT INTO `china` VALUES ('220100', '长春市', '220000');
INSERT INTO `china` VALUES ('220102', '南关区', '220100');
INSERT INTO `china` VALUES ('220103', '宽城区', '220100');
INSERT INTO `china` VALUES ('220104', '朝阳区', '220100');
INSERT INTO `china` VALUES ('220105', '二道区', '220100');
INSERT INTO `china` VALUES ('220106', '绿园区', '220100');
INSERT INTO `china` VALUES ('220112', '双阳区', '220100');
INSERT INTO `china` VALUES ('220113', '九台区', '220100');
INSERT INTO `china` VALUES ('220122', '农安县', '220100');
INSERT INTO `china` VALUES ('220182', '榆树市', '220100');
INSERT INTO `china` VALUES ('220183', '德惠市', '220100');
INSERT INTO `china` VALUES ('220190', '高新技术产业开发区', '220100');
INSERT INTO `china` VALUES ('220191', '汽车产业开发区', '220100');
INSERT INTO `china` VALUES ('220192', '经济技术开发区', '220100');
INSERT INTO `china` VALUES ('220200', '吉林市', '220000');
INSERT INTO `china` VALUES ('220202', '昌邑区', '220200');
INSERT INTO `china` VALUES ('220203', '龙潭区', '220200');
INSERT INTO `china` VALUES ('220204', '船营区', '220200');
INSERT INTO `china` VALUES ('220211', '丰满区', '220200');
INSERT INTO `china` VALUES ('220221', '永吉县', '220200');
INSERT INTO `china` VALUES ('220281', '蛟河市', '220200');
INSERT INTO `china` VALUES ('220282', '桦甸市', '220200');
INSERT INTO `china` VALUES ('220283', '舒兰市', '220200');
INSERT INTO `china` VALUES ('220284', '磐石市', '220200');
INSERT INTO `china` VALUES ('220300', '四平市', '220000');
INSERT INTO `china` VALUES ('220302', '铁西区', '220300');
INSERT INTO `china` VALUES ('220303', '铁东区', '220300');
INSERT INTO `china` VALUES ('220322', '梨树县', '220300');
INSERT INTO `china` VALUES ('220323', '伊通满族自治县', '220300');
INSERT INTO `china` VALUES ('220381', '公主岭市', '220300');
INSERT INTO `china` VALUES ('220382', '双辽市', '220300');
INSERT INTO `china` VALUES ('220400', '辽源市', '220000');
INSERT INTO `china` VALUES ('220402', '龙山区', '220400');
INSERT INTO `china` VALUES ('220403', '西安区', '220400');
INSERT INTO `china` VALUES ('220421', '东丰县', '220400');
INSERT INTO `china` VALUES ('220422', '东辽县', '220400');
INSERT INTO `china` VALUES ('220500', '通化市', '220000');
INSERT INTO `china` VALUES ('220502', '东昌区', '220500');
INSERT INTO `china` VALUES ('220503', '二道江区', '220500');
INSERT INTO `china` VALUES ('220521', '通化县', '220500');
INSERT INTO `china` VALUES ('220523', '辉南县', '220500');
INSERT INTO `china` VALUES ('220524', '柳河县', '220500');
INSERT INTO `china` VALUES ('220581', '梅河口市', '220500');
INSERT INTO `china` VALUES ('220582', '集安市', '220500');
INSERT INTO `china` VALUES ('220600', '白山市', '220000');
INSERT INTO `china` VALUES ('220602', '浑江区', '220600');
INSERT INTO `china` VALUES ('220605', '江源区', '220600');
INSERT INTO `china` VALUES ('220621', '抚松县', '220600');
INSERT INTO `china` VALUES ('220622', '靖宇县', '220600');
INSERT INTO `china` VALUES ('220623', '长白朝鲜族自治县', '220600');
INSERT INTO `china` VALUES ('220681', '临江市', '220600');
INSERT INTO `china` VALUES ('220700', '松原市', '220000');
INSERT INTO `china` VALUES ('220702', '宁江区', '220700');
INSERT INTO `china` VALUES ('220721', '前郭尔罗斯蒙古族自治县', '220700');
INSERT INTO `china` VALUES ('220722', '长岭县', '220700');
INSERT INTO `china` VALUES ('220723', '乾安县', '220700');
INSERT INTO `china` VALUES ('220781', '扶余市', '220700');
INSERT INTO `china` VALUES ('220800', '白城市', '220000');
INSERT INTO `china` VALUES ('220802', '洮北区', '220800');
INSERT INTO `china` VALUES ('220821', '镇赉县', '220800');
INSERT INTO `china` VALUES ('220822', '通榆县', '220800');
INSERT INTO `china` VALUES ('220881', '洮南市', '220800');
INSERT INTO `china` VALUES ('220882', '大安市', '220800');
INSERT INTO `china` VALUES ('221090', '工业园区', '221000');
INSERT INTO `china` VALUES ('222400', '延边朝鲜族自治州', '220000');
INSERT INTO `china` VALUES ('222401', '延吉市', '222400');
INSERT INTO `china` VALUES ('222402', '图们市', '222400');
INSERT INTO `china` VALUES ('222403', '敦化市', '222400');
INSERT INTO `china` VALUES ('222404', '珲春市', '222400');
INSERT INTO `china` VALUES ('222405', '龙井市', '222400');
INSERT INTO `china` VALUES ('222406', '和龙市', '222400');
INSERT INTO `china` VALUES ('222424', '汪清县', '222400');
INSERT INTO `china` VALUES ('222426', '安图县', '222400');
INSERT INTO `china` VALUES ('230000', '黑龙江省', '0');
INSERT INTO `china` VALUES ('230100', '哈尔滨市', '230000');
INSERT INTO `china` VALUES ('230102', '道里区', '230100');
INSERT INTO `china` VALUES ('230103', '南岗区', '230100');
INSERT INTO `china` VALUES ('230104', '道外区', '230100');
INSERT INTO `china` VALUES ('230108', '平房区', '230100');
INSERT INTO `china` VALUES ('230109', '松北区', '230100');
INSERT INTO `china` VALUES ('230110', '香坊区', '230100');
INSERT INTO `china` VALUES ('230111', '呼兰区', '230100');
INSERT INTO `china` VALUES ('230112', '阿城区', '230100');
INSERT INTO `china` VALUES ('230113', '双城区', '230100');
INSERT INTO `china` VALUES ('230123', '依兰县', '230100');
INSERT INTO `china` VALUES ('230124', '方正县', '230100');
INSERT INTO `china` VALUES ('230125', '宾县', '230100');
INSERT INTO `china` VALUES ('230126', '巴彦县', '230100');
INSERT INTO `china` VALUES ('230127', '木兰县', '230100');
INSERT INTO `china` VALUES ('230128', '通河县', '230100');
INSERT INTO `china` VALUES ('230129', '延寿县', '230100');
INSERT INTO `china` VALUES ('230183', '尚志市', '230100');
INSERT INTO `china` VALUES ('230184', '五常市', '230100');
INSERT INTO `china` VALUES ('230200', '齐齐哈尔市', '230000');
INSERT INTO `china` VALUES ('230202', '龙沙区', '230200');
INSERT INTO `china` VALUES ('230203', '建华区', '230200');
INSERT INTO `china` VALUES ('230204', '铁锋区', '230200');
INSERT INTO `china` VALUES ('230205', '昂昂溪区', '230200');
INSERT INTO `china` VALUES ('230206', '富拉尔基区', '230200');
INSERT INTO `china` VALUES ('230207', '碾子山区', '230200');
INSERT INTO `china` VALUES ('230208', '梅里斯达斡尔族区', '230200');
INSERT INTO `china` VALUES ('230221', '龙江县', '230200');
INSERT INTO `china` VALUES ('230223', '依安县', '230200');
INSERT INTO `china` VALUES ('230224', '泰来县', '230200');
INSERT INTO `china` VALUES ('230225', '甘南县', '230200');
INSERT INTO `china` VALUES ('230227', '富裕县', '230200');
INSERT INTO `china` VALUES ('230229', '克山县', '230200');
INSERT INTO `china` VALUES ('230230', '克东县', '230200');
INSERT INTO `china` VALUES ('230231', '拜泉县', '230200');
INSERT INTO `china` VALUES ('230281', '讷河市', '230200');
INSERT INTO `china` VALUES ('230300', '鸡西市', '230000');
INSERT INTO `china` VALUES ('230302', '鸡冠区', '230300');
INSERT INTO `china` VALUES ('230303', '恒山区', '230300');
INSERT INTO `china` VALUES ('230304', '滴道区', '230300');
INSERT INTO `china` VALUES ('230305', '梨树区', '230300');
INSERT INTO `china` VALUES ('230306', '城子河区', '230300');
INSERT INTO `china` VALUES ('230307', '麻山区', '230300');
INSERT INTO `china` VALUES ('230321', '鸡东县', '230300');
INSERT INTO `china` VALUES ('230381', '虎林市', '230300');
INSERT INTO `china` VALUES ('230382', '密山市', '230300');
INSERT INTO `china` VALUES ('230400', '鹤岗市', '230000');
INSERT INTO `china` VALUES ('230402', '向阳区', '230400');
INSERT INTO `china` VALUES ('230403', '工农区', '230400');
INSERT INTO `china` VALUES ('230404', '南山区', '230400');
INSERT INTO `china` VALUES ('230405', '兴安区', '230400');
INSERT INTO `china` VALUES ('230406', '东山区', '230400');
INSERT INTO `china` VALUES ('230407', '兴山区', '230400');
INSERT INTO `china` VALUES ('230421', '萝北县', '230400');
INSERT INTO `china` VALUES ('230422', '绥滨县', '230400');
INSERT INTO `china` VALUES ('230500', '双鸭山市', '230000');
INSERT INTO `china` VALUES ('230502', '尖山区', '230500');
INSERT INTO `china` VALUES ('230503', '岭东区', '230500');
INSERT INTO `china` VALUES ('230505', '四方台区', '230500');
INSERT INTO `china` VALUES ('230506', '宝山区', '230500');
INSERT INTO `china` VALUES ('230521', '集贤县', '230500');
INSERT INTO `china` VALUES ('230522', '友谊县', '230500');
INSERT INTO `china` VALUES ('230523', '宝清县', '230500');
INSERT INTO `china` VALUES ('230524', '饶河县', '230500');
INSERT INTO `china` VALUES ('230600', '大庆市', '230000');
INSERT INTO `china` VALUES ('230602', '萨尔图区', '230600');
INSERT INTO `china` VALUES ('230603', '龙凤区', '230600');
INSERT INTO `china` VALUES ('230604', '让胡路区', '230600');
INSERT INTO `china` VALUES ('230605', '红岗区', '230600');
INSERT INTO `china` VALUES ('230606', '大同区', '230600');
INSERT INTO `china` VALUES ('230621', '肇州县', '230600');
INSERT INTO `china` VALUES ('230622', '肇源县', '230600');
INSERT INTO `china` VALUES ('230623', '林甸县', '230600');
INSERT INTO `china` VALUES ('230624', '杜尔伯特蒙古族自治县', '230600');
INSERT INTO `china` VALUES ('230700', '伊春市', '230000');
INSERT INTO `china` VALUES ('230702', '伊春区', '230700');
INSERT INTO `china` VALUES ('230703', '南岔区', '230700');
INSERT INTO `china` VALUES ('230704', '友好区', '230700');
INSERT INTO `china` VALUES ('230705', '西林区', '230700');
INSERT INTO `china` VALUES ('230706', '翠峦区', '230700');
INSERT INTO `china` VALUES ('230707', '新青区', '230700');
INSERT INTO `china` VALUES ('230708', '美溪区', '230700');
INSERT INTO `china` VALUES ('230709', '金山屯区', '230700');
INSERT INTO `china` VALUES ('230710', '五营区', '230700');
INSERT INTO `china` VALUES ('230711', '乌马河区', '230700');
INSERT INTO `china` VALUES ('230712', '汤旺河区', '230700');
INSERT INTO `china` VALUES ('230713', '带岭区', '230700');
INSERT INTO `china` VALUES ('230714', '乌伊岭区', '230700');
INSERT INTO `china` VALUES ('230715', '红星区', '230700');
INSERT INTO `china` VALUES ('230716', '上甘岭区', '230700');
INSERT INTO `china` VALUES ('230722', '嘉荫县', '230700');
INSERT INTO `china` VALUES ('230781', '铁力市', '230700');
INSERT INTO `china` VALUES ('230800', '佳木斯市', '230000');
INSERT INTO `china` VALUES ('230803', '向阳区', '230800');
INSERT INTO `china` VALUES ('230804', '前进区', '230800');
INSERT INTO `china` VALUES ('230805', '东风区', '230800');
INSERT INTO `china` VALUES ('230811', '郊区', '230800');
INSERT INTO `china` VALUES ('230822', '桦南县', '230800');
INSERT INTO `china` VALUES ('230826', '桦川县', '230800');
INSERT INTO `china` VALUES ('230828', '汤原县', '230800');
INSERT INTO `china` VALUES ('230833', '抚远县', '230800');
INSERT INTO `china` VALUES ('230881', '同江市', '230800');
INSERT INTO `china` VALUES ('230882', '富锦市', '230800');
INSERT INTO `china` VALUES ('230900', '七台河市', '230000');
INSERT INTO `china` VALUES ('230902', '新兴区', '230900');
INSERT INTO `china` VALUES ('230903', '桃山区', '230900');
INSERT INTO `china` VALUES ('230904', '茄子河区', '230900');
INSERT INTO `china` VALUES ('230921', '勃利县', '230900');
INSERT INTO `china` VALUES ('231000', '牡丹江市', '230000');
INSERT INTO `china` VALUES ('231002', '东安区', '231000');
INSERT INTO `china` VALUES ('231003', '阳明区', '231000');
INSERT INTO `china` VALUES ('231004', '爱民区', '231000');
INSERT INTO `china` VALUES ('231005', '西安区', '231000');
INSERT INTO `china` VALUES ('231024', '东宁县', '231000');
INSERT INTO `china` VALUES ('231025', '林口县', '231000');
INSERT INTO `china` VALUES ('231081', '绥芬河市', '231000');
INSERT INTO `china` VALUES ('231083', '海林市', '231000');
INSERT INTO `china` VALUES ('231084', '宁安市', '231000');
INSERT INTO `china` VALUES ('231085', '穆棱市', '231000');
INSERT INTO `china` VALUES ('231100', '黑河市', '230000');
INSERT INTO `china` VALUES ('231102', '爱辉区', '231100');
INSERT INTO `china` VALUES ('231121', '嫩江县', '231100');
INSERT INTO `china` VALUES ('231123', '逊克县', '231100');
INSERT INTO `china` VALUES ('231124', '孙吴县', '231100');
INSERT INTO `china` VALUES ('231181', '北安市', '231100');
INSERT INTO `china` VALUES ('231182', '五大连池市', '231100');
INSERT INTO `china` VALUES ('231200', '绥化市', '230000');
INSERT INTO `china` VALUES ('231202', '北林区', '231200');
INSERT INTO `china` VALUES ('231221', '望奎县', '231200');
INSERT INTO `china` VALUES ('231222', '兰西县', '231200');
INSERT INTO `china` VALUES ('231223', '青冈县', '231200');
INSERT INTO `china` VALUES ('231224', '庆安县', '231200');
INSERT INTO `china` VALUES ('231225', '明水县', '231200');
INSERT INTO `china` VALUES ('231226', '绥棱县', '231200');
INSERT INTO `china` VALUES ('231281', '安达市', '231200');
INSERT INTO `china` VALUES ('231282', '肇东市', '231200');
INSERT INTO `china` VALUES ('231283', '海伦市', '231200');
INSERT INTO `china` VALUES ('232700', '大兴安岭地区', '230000');
INSERT INTO `china` VALUES ('232721', '呼玛县', '232700');
INSERT INTO `china` VALUES ('232722', '塔河县', '232700');
INSERT INTO `china` VALUES ('232723', '漠河县', '232700');
INSERT INTO `china` VALUES ('232790', '松岭区', '232700');
INSERT INTO `china` VALUES ('232791', '呼中区', '232700');
INSERT INTO `china` VALUES ('232792', '加格达奇区', '232700');
INSERT INTO `china` VALUES ('232793', '新林区', '232700');
INSERT INTO `china` VALUES ('264290', '威海临港经济技术开发区', '264200');
INSERT INTO `china` VALUES ('310000', '上海市', '0');
INSERT INTO `china` VALUES ('310100', '上海市', '310000');
INSERT INTO `china` VALUES ('310101', '黄浦区', '310100');
INSERT INTO `china` VALUES ('310104', '徐汇区', '310100');
INSERT INTO `china` VALUES ('310105', '长宁区', '310100');
INSERT INTO `china` VALUES ('310106', '静安区', '310100');
INSERT INTO `china` VALUES ('310107', '普陀区', '310100');
INSERT INTO `china` VALUES ('310108', '闸北区', '310100');
INSERT INTO `china` VALUES ('310109', '虹口区', '310100');
INSERT INTO `china` VALUES ('310110', '杨浦区', '310100');
INSERT INTO `china` VALUES ('310112', '闵行区', '310100');
INSERT INTO `china` VALUES ('310113', '宝山区', '310100');
INSERT INTO `china` VALUES ('310114', '嘉定区', '310100');
INSERT INTO `china` VALUES ('310115', '浦东新区', '310100');
INSERT INTO `china` VALUES ('310116', '金山区', '310100');
INSERT INTO `china` VALUES ('310117', '松江区', '310100');
INSERT INTO `china` VALUES ('310118', '青浦区', '310100');
INSERT INTO `china` VALUES ('310120', '奉贤区', '310100');
INSERT INTO `china` VALUES ('310200', '县', '310000');
INSERT INTO `china` VALUES ('310230', '崇明县', '310200');
INSERT INTO `china` VALUES ('320000', '江苏省', '0');
INSERT INTO `china` VALUES ('320100', '南京市', '320000');
INSERT INTO `china` VALUES ('320102', '玄武区', '320100');
INSERT INTO `china` VALUES ('320104', '秦淮区', '320100');
INSERT INTO `china` VALUES ('320105', '建邺区', '320100');
INSERT INTO `china` VALUES ('320106', '鼓楼区', '320100');
INSERT INTO `china` VALUES ('320111', '浦口区', '320100');
INSERT INTO `china` VALUES ('320113', '栖霞区', '320100');
INSERT INTO `china` VALUES ('320114', '雨花台区', '320100');
INSERT INTO `china` VALUES ('320115', '江宁区', '320100');
INSERT INTO `china` VALUES ('320116', '六合区', '320100');
INSERT INTO `china` VALUES ('320117', '溧水区', '320100');
INSERT INTO `china` VALUES ('320118', '高淳区', '320100');
INSERT INTO `china` VALUES ('320200', '无锡市', '320000');
INSERT INTO `china` VALUES ('320202', '崇安区', '320200');
INSERT INTO `china` VALUES ('320203', '南长区', '320200');
INSERT INTO `china` VALUES ('320204', '北塘区', '320200');
INSERT INTO `china` VALUES ('320205', '锡山区', '320200');
INSERT INTO `china` VALUES ('320206', '惠山区', '320200');
INSERT INTO `china` VALUES ('320211', '滨湖区', '320200');
INSERT INTO `china` VALUES ('320281', '江阴市', '320200');
INSERT INTO `china` VALUES ('320282', '宜兴市', '320200');
INSERT INTO `china` VALUES ('320290', '新区', '320200');
INSERT INTO `china` VALUES ('320300', '徐州市', '320000');
INSERT INTO `china` VALUES ('320302', '鼓楼区', '320300');
INSERT INTO `china` VALUES ('320303', '云龙区', '320300');
INSERT INTO `china` VALUES ('320305', '贾汪区', '320300');
INSERT INTO `china` VALUES ('320311', '泉山区', '320300');
INSERT INTO `china` VALUES ('320312', '铜山区', '320300');
INSERT INTO `china` VALUES ('320321', '丰县', '320300');
INSERT INTO `china` VALUES ('320322', '沛县', '320300');
INSERT INTO `china` VALUES ('320324', '睢宁县', '320300');
INSERT INTO `china` VALUES ('320381', '新沂市', '320300');
INSERT INTO `china` VALUES ('320382', '邳州市', '320300');
INSERT INTO `china` VALUES ('320390', '金山桥开发区', '320300');
INSERT INTO `china` VALUES ('320391', '工业园区', '320300');
INSERT INTO `china` VALUES ('320400', '常州市', '320000');
INSERT INTO `china` VALUES ('320402', '天宁区', '320400');
INSERT INTO `china` VALUES ('320404', '钟楼区', '320400');
INSERT INTO `china` VALUES ('320411', '新北区', '320400');
INSERT INTO `china` VALUES ('320412', '武进区', '320400');
INSERT INTO `china` VALUES ('320413', '金坛区', '320400');
INSERT INTO `china` VALUES ('320481', '溧阳市', '320400');
INSERT INTO `china` VALUES ('320500', '苏州市', '320000');
INSERT INTO `china` VALUES ('320505', '虎丘区', '320500');
INSERT INTO `china` VALUES ('320506', '吴中区', '320500');
INSERT INTO `china` VALUES ('320507', '相城区', '320500');
INSERT INTO `china` VALUES ('320508', '姑苏区', '320500');
INSERT INTO `china` VALUES ('320509', '吴江区', '320500');
INSERT INTO `china` VALUES ('320581', '常熟市', '320500');
INSERT INTO `china` VALUES ('320582', '张家港市', '320500');
INSERT INTO `china` VALUES ('320583', '昆山市', '320500');
INSERT INTO `china` VALUES ('320585', '太仓市', '320500');
INSERT INTO `china` VALUES ('320590', '工业园区', '320500');
INSERT INTO `china` VALUES ('320591', '高新区', '320500');
INSERT INTO `china` VALUES ('320600', '南通市', '320000');
INSERT INTO `china` VALUES ('320602', '崇川区', '320600');
INSERT INTO `china` VALUES ('320611', '港闸区', '320600');
INSERT INTO `china` VALUES ('320612', '通州区', '320600');
INSERT INTO `china` VALUES ('320621', '海安县', '320600');
INSERT INTO `china` VALUES ('320623', '如东县', '320600');
INSERT INTO `china` VALUES ('320681', '启东市', '320600');
INSERT INTO `china` VALUES ('320682', '如皋市', '320600');
INSERT INTO `china` VALUES ('320684', '海门市', '320600');
INSERT INTO `china` VALUES ('320690', '南通经济技术开发区', '320600');
INSERT INTO `china` VALUES ('320691', '高新区', '320600');
INSERT INTO `china` VALUES ('320700', '连云港市', '320000');
INSERT INTO `china` VALUES ('320703', '连云区', '320700');
INSERT INTO `china` VALUES ('320706', '海州区', '320700');
INSERT INTO `china` VALUES ('320707', '赣榆区', '320700');
INSERT INTO `china` VALUES ('320722', '东海县', '320700');
INSERT INTO `china` VALUES ('320723', '灌云县', '320700');
INSERT INTO `china` VALUES ('320724', '灌南县', '320700');
INSERT INTO `china` VALUES ('320800', '淮安市', '320000');
INSERT INTO `china` VALUES ('320802', '清河区', '320800');
INSERT INTO `china` VALUES ('320803', '淮安区', '320800');
INSERT INTO `china` VALUES ('320804', '淮阴区', '320800');
INSERT INTO `china` VALUES ('320811', '清浦区', '320800');
INSERT INTO `china` VALUES ('320826', '涟水县', '320800');
INSERT INTO `china` VALUES ('320829', '洪泽县', '320800');
INSERT INTO `china` VALUES ('320830', '盱眙县', '320800');
INSERT INTO `china` VALUES ('320831', '金湖县', '320800');
INSERT INTO `china` VALUES ('320890', '经济开发区', '320800');
INSERT INTO `china` VALUES ('320900', '盐城市', '320000');
INSERT INTO `china` VALUES ('320902', '亭湖区', '320900');
INSERT INTO `china` VALUES ('320903', '盐都区', '320900');
INSERT INTO `china` VALUES ('320904', '大丰区', '320900');
INSERT INTO `china` VALUES ('320921', '响水县', '320900');
INSERT INTO `china` VALUES ('320922', '滨海县', '320900');
INSERT INTO `china` VALUES ('320923', '阜宁县', '320900');
INSERT INTO `china` VALUES ('320924', '射阳县', '320900');
INSERT INTO `china` VALUES ('320925', '建湖县', '320900');
INSERT INTO `china` VALUES ('320981', '东台市', '320900');
INSERT INTO `china` VALUES ('321000', '扬州市', '320000');
INSERT INTO `china` VALUES ('321002', '广陵区', '321000');
INSERT INTO `china` VALUES ('321003', '邗江区', '321000');
INSERT INTO `china` VALUES ('321012', '江都区', '321000');
INSERT INTO `china` VALUES ('321023', '宝应县', '321000');
INSERT INTO `china` VALUES ('321081', '仪征市', '321000');
INSERT INTO `china` VALUES ('321084', '高邮市', '321000');
INSERT INTO `china` VALUES ('321090', '经济开发区', '321000');
INSERT INTO `china` VALUES ('321100', '镇江市', '320000');
INSERT INTO `china` VALUES ('321102', '京口区', '321100');
INSERT INTO `china` VALUES ('321111', '润州区', '321100');
INSERT INTO `china` VALUES ('321112', '丹徒区', '321100');
INSERT INTO `china` VALUES ('321181', '丹阳市', '321100');
INSERT INTO `china` VALUES ('321182', '扬中市', '321100');
INSERT INTO `china` VALUES ('321183', '句容市', '321100');
INSERT INTO `china` VALUES ('321200', '泰州市', '320000');
INSERT INTO `china` VALUES ('321202', '海陵区', '321200');
INSERT INTO `china` VALUES ('321203', '高港区', '321200');
INSERT INTO `china` VALUES ('321204', '姜堰区', '321200');
INSERT INTO `china` VALUES ('321281', '兴化市', '321200');
INSERT INTO `china` VALUES ('321282', '靖江市', '321200');
INSERT INTO `china` VALUES ('321283', '泰兴市', '321200');
INSERT INTO `china` VALUES ('321300', '宿迁市', '320000');
INSERT INTO `china` VALUES ('321302', '宿城区', '321300');
INSERT INTO `china` VALUES ('321311', '宿豫区', '321300');
INSERT INTO `china` VALUES ('321322', '沭阳县', '321300');
INSERT INTO `china` VALUES ('321323', '泗阳县', '321300');
INSERT INTO `china` VALUES ('321324', '泗洪县', '321300');
INSERT INTO `china` VALUES ('321390', '宿迁经济开发区', '321300');
INSERT INTO `china` VALUES ('330000', '浙江省', '0');
INSERT INTO `china` VALUES ('330100', '杭州市', '330000');
INSERT INTO `china` VALUES ('330102', '上城区', '330100');
INSERT INTO `china` VALUES ('330103', '下城区', '330100');
INSERT INTO `china` VALUES ('330104', '江干区', '330100');
INSERT INTO `china` VALUES ('330105', '拱墅区', '330100');
INSERT INTO `china` VALUES ('330106', '西湖区', '330100');
INSERT INTO `china` VALUES ('330108', '滨江区', '330100');
INSERT INTO `china` VALUES ('330109', '萧山区', '330100');
INSERT INTO `china` VALUES ('330110', '余杭区', '330100');
INSERT INTO `china` VALUES ('330111', '富阳区', '330100');
INSERT INTO `china` VALUES ('330122', '桐庐县', '330100');
INSERT INTO `china` VALUES ('330127', '淳安县', '330100');
INSERT INTO `china` VALUES ('330182', '建德市', '330100');
INSERT INTO `china` VALUES ('330185', '临安市', '330100');
INSERT INTO `china` VALUES ('330200', '宁波市', '330000');
INSERT INTO `china` VALUES ('330203', '海曙区', '330200');
INSERT INTO `china` VALUES ('330204', '江东区', '330200');
INSERT INTO `china` VALUES ('330205', '江北区', '330200');
INSERT INTO `china` VALUES ('330206', '北仑区', '330200');
INSERT INTO `china` VALUES ('330211', '镇海区', '330200');
INSERT INTO `china` VALUES ('330212', '鄞州区', '330200');
INSERT INTO `china` VALUES ('330225', '象山县', '330200');
INSERT INTO `china` VALUES ('330226', '宁海县', '330200');
INSERT INTO `china` VALUES ('330281', '余姚市', '330200');
INSERT INTO `china` VALUES ('330282', '慈溪市', '330200');
INSERT INTO `china` VALUES ('330283', '奉化市', '330200');
INSERT INTO `china` VALUES ('330290', '高新科技开发区', '330200');
INSERT INTO `china` VALUES ('330300', '温州市', '330000');
INSERT INTO `china` VALUES ('330302', '鹿城区', '330300');
INSERT INTO `china` VALUES ('330303', '龙湾区', '330300');
INSERT INTO `china` VALUES ('330304', '瓯海区', '330300');
INSERT INTO `china` VALUES ('330305', '洞头区', '330300');
INSERT INTO `china` VALUES ('330324', '永嘉县', '330300');
INSERT INTO `china` VALUES ('330326', '平阳县', '330300');
INSERT INTO `china` VALUES ('330327', '苍南县', '330300');
INSERT INTO `china` VALUES ('330328', '文成县', '330300');
INSERT INTO `china` VALUES ('330329', '泰顺县', '330300');
INSERT INTO `china` VALUES ('330381', '瑞安市', '330300');
INSERT INTO `china` VALUES ('330382', '乐清市', '330300');
INSERT INTO `china` VALUES ('330400', '嘉兴市', '330000');
INSERT INTO `china` VALUES ('330402', '南湖区', '330400');
INSERT INTO `china` VALUES ('330411', '秀洲区', '330400');
INSERT INTO `china` VALUES ('330421', '嘉善县', '330400');
INSERT INTO `china` VALUES ('330424', '海盐县', '330400');
INSERT INTO `china` VALUES ('330481', '海宁市', '330400');
INSERT INTO `china` VALUES ('330482', '平湖市', '330400');
INSERT INTO `china` VALUES ('330483', '桐乡市', '330400');
INSERT INTO `china` VALUES ('330500', '湖州市', '330000');
INSERT INTO `china` VALUES ('330502', '吴兴区', '330500');
INSERT INTO `china` VALUES ('330503', '南浔区', '330500');
INSERT INTO `china` VALUES ('330521', '德清县', '330500');
INSERT INTO `china` VALUES ('330522', '长兴县', '330500');
INSERT INTO `china` VALUES ('330523', '安吉县', '330500');
INSERT INTO `china` VALUES ('330600', '绍兴市', '330000');
INSERT INTO `china` VALUES ('330602', '越城区', '330600');
INSERT INTO `china` VALUES ('330603', '柯桥区', '330600');
INSERT INTO `china` VALUES ('330604', '上虞区', '330600');
INSERT INTO `china` VALUES ('330624', '新昌县', '330600');
INSERT INTO `china` VALUES ('330681', '诸暨市', '330600');
INSERT INTO `china` VALUES ('330683', '嵊州市', '330600');
INSERT INTO `china` VALUES ('330700', '金华市', '330000');
INSERT INTO `china` VALUES ('330702', '婺城区', '330700');
INSERT INTO `china` VALUES ('330703', '金东区', '330700');
INSERT INTO `china` VALUES ('330723', '武义县', '330700');
INSERT INTO `china` VALUES ('330726', '浦江县', '330700');
INSERT INTO `china` VALUES ('330727', '磐安县', '330700');
INSERT INTO `china` VALUES ('330781', '兰溪市', '330700');
INSERT INTO `china` VALUES ('330782', '义乌市', '330700');
INSERT INTO `china` VALUES ('330783', '东阳市', '330700');
INSERT INTO `china` VALUES ('330784', '永康市', '330700');
INSERT INTO `china` VALUES ('330800', '衢州市', '330000');
INSERT INTO `china` VALUES ('330802', '柯城区', '330800');
INSERT INTO `china` VALUES ('330803', '衢江区', '330800');
INSERT INTO `china` VALUES ('330822', '常山县', '330800');
INSERT INTO `china` VALUES ('330824', '开化县', '330800');
INSERT INTO `china` VALUES ('330825', '龙游县', '330800');
INSERT INTO `china` VALUES ('330881', '江山市', '330800');
INSERT INTO `china` VALUES ('330900', '舟山市', '330000');
INSERT INTO `china` VALUES ('330902', '定海区', '330900');
INSERT INTO `china` VALUES ('330903', '普陀区', '330900');
INSERT INTO `china` VALUES ('330921', '岱山县', '330900');
INSERT INTO `china` VALUES ('330922', '嵊泗县', '330900');
INSERT INTO `china` VALUES ('331000', '台州市', '330000');
INSERT INTO `china` VALUES ('331002', '椒江区', '331000');
INSERT INTO `china` VALUES ('331003', '黄岩区', '331000');
INSERT INTO `china` VALUES ('331004', '路桥区', '331000');
INSERT INTO `china` VALUES ('331021', '玉环县', '331000');
INSERT INTO `china` VALUES ('331022', '三门县', '331000');
INSERT INTO `china` VALUES ('331023', '天台县', '331000');
INSERT INTO `china` VALUES ('331024', '仙居县', '331000');
INSERT INTO `china` VALUES ('331081', '温岭市', '331000');
INSERT INTO `china` VALUES ('331082', '临海市', '331000');
INSERT INTO `china` VALUES ('331100', '丽水市', '330000');
INSERT INTO `china` VALUES ('331102', '莲都区', '331100');
INSERT INTO `china` VALUES ('331121', '青田县', '331100');
INSERT INTO `china` VALUES ('331122', '缙云县', '331100');
INSERT INTO `china` VALUES ('331123', '遂昌县', '331100');
INSERT INTO `china` VALUES ('331124', '松阳县', '331100');
INSERT INTO `china` VALUES ('331125', '云和县', '331100');
INSERT INTO `china` VALUES ('331126', '庆元县', '331100');
INSERT INTO `china` VALUES ('331127', '景宁畲族自治县', '331100');
INSERT INTO `china` VALUES ('331181', '龙泉市', '331100');
INSERT INTO `china` VALUES ('340000', '安徽省', '0');
INSERT INTO `china` VALUES ('340100', '合肥市', '340000');
INSERT INTO `china` VALUES ('340102', '瑶海区', '340100');
INSERT INTO `china` VALUES ('340103', '庐阳区', '340100');
INSERT INTO `china` VALUES ('340104', '蜀山区', '340100');
INSERT INTO `china` VALUES ('340111', '包河区', '340100');
INSERT INTO `china` VALUES ('340121', '长丰县', '340100');
INSERT INTO `china` VALUES ('340122', '肥东县', '340100');
INSERT INTO `china` VALUES ('340123', '肥西县', '340100');
INSERT INTO `china` VALUES ('340124', '庐江县', '340100');
INSERT INTO `china` VALUES ('340181', '巢湖市', '340100');
INSERT INTO `china` VALUES ('340190', '高新技术开发区', '340100');
INSERT INTO `china` VALUES ('340191', '经济技术开发区', '340100');
INSERT INTO `china` VALUES ('340192', '北城新区', '340100');
INSERT INTO `china` VALUES ('340193', '政务文化新区', '340100');
INSERT INTO `china` VALUES ('340194', '滨湖新区', '340100');
INSERT INTO `china` VALUES ('340195', '新站高新区', '340100');
INSERT INTO `china` VALUES ('340200', '芜湖市', '340000');
INSERT INTO `china` VALUES ('340202', '镜湖区', '340200');
INSERT INTO `china` VALUES ('340203', '弋江区', '340200');
INSERT INTO `china` VALUES ('340207', '鸠江区', '340200');
INSERT INTO `china` VALUES ('340208', '三山区', '340200');
INSERT INTO `china` VALUES ('340221', '芜湖县', '340200');
INSERT INTO `china` VALUES ('340222', '繁昌县', '340200');
INSERT INTO `china` VALUES ('340223', '南陵县', '340200');
INSERT INTO `china` VALUES ('340225', '无为县', '340200');
INSERT INTO `china` VALUES ('340300', '蚌埠市', '340000');
INSERT INTO `china` VALUES ('340302', '龙子湖区', '340300');
INSERT INTO `china` VALUES ('340303', '蚌山区', '340300');
INSERT INTO `china` VALUES ('340304', '禹会区', '340300');
INSERT INTO `china` VALUES ('340311', '淮上区', '340300');
INSERT INTO `china` VALUES ('340321', '怀远县', '340300');
INSERT INTO `china` VALUES ('340322', '五河县', '340300');
INSERT INTO `china` VALUES ('340323', '固镇县', '340300');
INSERT INTO `china` VALUES ('340400', '淮南市', '340000');
INSERT INTO `china` VALUES ('340402', '大通区', '340400');
INSERT INTO `china` VALUES ('340403', '田家庵区', '340400');
INSERT INTO `china` VALUES ('340404', '谢家集区', '340400');
INSERT INTO `china` VALUES ('340405', '八公山区', '340400');
INSERT INTO `china` VALUES ('340406', '潘集区', '340400');
INSERT INTO `china` VALUES ('340421', '凤台县', '340400');
INSERT INTO `china` VALUES ('340490', '淮南高新技术产业开发区', '340400');
INSERT INTO `china` VALUES ('340500', '马鞍山市', '340000');
INSERT INTO `china` VALUES ('340503', '花山区', '340500');
INSERT INTO `china` VALUES ('340504', '雨山区', '340500');
INSERT INTO `china` VALUES ('340506', '博望区', '340500');
INSERT INTO `china` VALUES ('340521', '当涂县', '340500');
INSERT INTO `china` VALUES ('340522', '含山县', '340500');
INSERT INTO `china` VALUES ('340523', '和县', '340500');
INSERT INTO `china` VALUES ('340600', '淮北市', '340000');
INSERT INTO `china` VALUES ('340602', '杜集区', '340600');
INSERT INTO `china` VALUES ('340603', '相山区', '340600');
INSERT INTO `china` VALUES ('340604', '烈山区', '340600');
INSERT INTO `china` VALUES ('340621', '濉溪县', '340600');
INSERT INTO `china` VALUES ('340700', '铜陵市', '340000');
INSERT INTO `china` VALUES ('340702', '铜官山区', '340700');
INSERT INTO `china` VALUES ('340703', '狮子山区', '340700');
INSERT INTO `china` VALUES ('340711', '郊区', '340700');
INSERT INTO `china` VALUES ('340721', '铜陵县', '340700');
INSERT INTO `china` VALUES ('340800', '安庆市', '340000');
INSERT INTO `china` VALUES ('340802', '迎江区', '340800');
INSERT INTO `china` VALUES ('340803', '大观区', '340800');
INSERT INTO `china` VALUES ('340811', '宜秀区', '340800');
INSERT INTO `china` VALUES ('340822', '怀宁县', '340800');
INSERT INTO `china` VALUES ('340823', '枞阳县', '340800');
INSERT INTO `china` VALUES ('340824', '潜山县', '340800');
INSERT INTO `china` VALUES ('340825', '太湖县', '340800');
INSERT INTO `china` VALUES ('340826', '宿松县', '340800');
INSERT INTO `china` VALUES ('340827', '望江县', '340800');
INSERT INTO `china` VALUES ('340828', '岳西县', '340800');
INSERT INTO `china` VALUES ('340881', '桐城市', '340800');
INSERT INTO `china` VALUES ('340890', '安庆经济技术开发区', '340800');
INSERT INTO `china` VALUES ('341000', '黄山市', '340000');
INSERT INTO `china` VALUES ('341002', '屯溪区', '341000');
INSERT INTO `china` VALUES ('341003', '黄山区', '341000');
INSERT INTO `china` VALUES ('341004', '徽州区', '341000');
INSERT INTO `china` VALUES ('341021', '歙县', '341000');
INSERT INTO `china` VALUES ('341022', '休宁县', '341000');
INSERT INTO `china` VALUES ('341023', '黟县', '341000');
INSERT INTO `china` VALUES ('341024', '祁门县', '341000');
INSERT INTO `china` VALUES ('341100', '滁州市', '340000');
INSERT INTO `china` VALUES ('341102', '琅琊区', '341100');
INSERT INTO `china` VALUES ('341103', '南谯区', '341100');
INSERT INTO `china` VALUES ('341122', '来安县', '341100');
INSERT INTO `china` VALUES ('341124', '全椒县', '341100');
INSERT INTO `china` VALUES ('341125', '定远县', '341100');
INSERT INTO `china` VALUES ('341126', '凤阳县', '341100');
INSERT INTO `china` VALUES ('341181', '天长市', '341100');
INSERT INTO `china` VALUES ('341182', '明光市', '341100');
INSERT INTO `china` VALUES ('341200', '阜阳市', '340000');
INSERT INTO `china` VALUES ('341202', '颍州区', '341200');
INSERT INTO `china` VALUES ('341203', '颍东区', '341200');
INSERT INTO `china` VALUES ('341204', '颍泉区', '341200');
INSERT INTO `china` VALUES ('341221', '临泉县', '341200');
INSERT INTO `china` VALUES ('341222', '太和县', '341200');
INSERT INTO `china` VALUES ('341225', '阜南县', '341200');
INSERT INTO `china` VALUES ('341226', '颍上县', '341200');
INSERT INTO `china` VALUES ('341282', '界首市', '341200');
INSERT INTO `china` VALUES ('341290', '阜阳经济技术开发区', '341200');
INSERT INTO `china` VALUES ('341300', '宿州市', '340000');
INSERT INTO `china` VALUES ('341302', '埇桥区', '341300');
INSERT INTO `china` VALUES ('341321', '砀山县', '341300');
INSERT INTO `china` VALUES ('341322', '萧县', '341300');
INSERT INTO `china` VALUES ('341323', '灵璧县', '341300');
INSERT INTO `china` VALUES ('341324', '泗县', '341300');
INSERT INTO `china` VALUES ('341390', '经济开发区', '341300');
INSERT INTO `china` VALUES ('341500', '六安市', '340000');
INSERT INTO `china` VALUES ('341502', '金安区', '341500');
INSERT INTO `china` VALUES ('341503', '裕安区', '341500');
INSERT INTO `china` VALUES ('341521', '寿县', '341500');
INSERT INTO `china` VALUES ('341522', '霍邱县', '341500');
INSERT INTO `china` VALUES ('341523', '舒城县', '341500');
INSERT INTO `china` VALUES ('341524', '金寨县', '341500');
INSERT INTO `china` VALUES ('341525', '霍山县', '341500');
INSERT INTO `china` VALUES ('341600', '亳州市', '340000');
INSERT INTO `china` VALUES ('341602', '谯城区', '341600');
INSERT INTO `china` VALUES ('341621', '涡阳县', '341600');
INSERT INTO `china` VALUES ('341622', '蒙城县', '341600');
INSERT INTO `china` VALUES ('341623', '利辛县', '341600');
INSERT INTO `china` VALUES ('341700', '池州市', '340000');
INSERT INTO `china` VALUES ('341702', '贵池区', '341700');
INSERT INTO `china` VALUES ('341721', '东至县', '341700');
INSERT INTO `china` VALUES ('341722', '石台县', '341700');
INSERT INTO `china` VALUES ('341723', '青阳县', '341700');
INSERT INTO `china` VALUES ('341800', '宣城市', '340000');
INSERT INTO `china` VALUES ('341802', '宣州区', '341800');
INSERT INTO `china` VALUES ('341821', '郎溪县', '341800');
INSERT INTO `china` VALUES ('341822', '广德县', '341800');
INSERT INTO `china` VALUES ('341823', '泾县', '341800');
INSERT INTO `china` VALUES ('341824', '绩溪县', '341800');
INSERT INTO `china` VALUES ('341825', '旌德县', '341800');
INSERT INTO `china` VALUES ('341881', '宁国市', '341800');
INSERT INTO `china` VALUES ('350000', '福建省', '0');
INSERT INTO `china` VALUES ('350100', '福州市', '350000');
INSERT INTO `china` VALUES ('350102', '鼓楼区', '350100');
INSERT INTO `china` VALUES ('350103', '台江区', '350100');
INSERT INTO `china` VALUES ('350104', '仓山区', '350100');
INSERT INTO `china` VALUES ('350105', '马尾区', '350100');
INSERT INTO `china` VALUES ('350111', '晋安区', '350100');
INSERT INTO `china` VALUES ('350121', '闽侯县', '350100');
INSERT INTO `china` VALUES ('350122', '连江县', '350100');
INSERT INTO `china` VALUES ('350123', '罗源县', '350100');
INSERT INTO `china` VALUES ('350124', '闽清县', '350100');
INSERT INTO `china` VALUES ('350125', '永泰县', '350100');
INSERT INTO `china` VALUES ('350128', '平潭县', '350100');
INSERT INTO `china` VALUES ('350181', '福清市', '350100');
INSERT INTO `china` VALUES ('350182', '长乐市', '350100');
INSERT INTO `china` VALUES ('350200', '厦门市', '350000');
INSERT INTO `china` VALUES ('350203', '思明区', '350200');
INSERT INTO `china` VALUES ('350205', '海沧区', '350200');
INSERT INTO `china` VALUES ('350206', '湖里区', '350200');
INSERT INTO `china` VALUES ('350211', '集美区', '350200');
INSERT INTO `china` VALUES ('350212', '同安区', '350200');
INSERT INTO `china` VALUES ('350213', '翔安区', '350200');
INSERT INTO `china` VALUES ('350300', '莆田市', '350000');
INSERT INTO `china` VALUES ('350302', '城厢区', '350300');
INSERT INTO `china` VALUES ('350303', '涵江区', '350300');
INSERT INTO `china` VALUES ('350304', '荔城区', '350300');
INSERT INTO `china` VALUES ('350305', '秀屿区', '350300');
INSERT INTO `china` VALUES ('350322', '仙游县', '350300');
INSERT INTO `china` VALUES ('350400', '三明市', '350000');
INSERT INTO `china` VALUES ('350402', '梅列区', '350400');
INSERT INTO `china` VALUES ('350403', '三元区', '350400');
INSERT INTO `china` VALUES ('350421', '明溪县', '350400');
INSERT INTO `china` VALUES ('350423', '清流县', '350400');
INSERT INTO `china` VALUES ('350424', '宁化县', '350400');
INSERT INTO `china` VALUES ('350425', '大田县', '350400');
INSERT INTO `china` VALUES ('350426', '尤溪县', '350400');
INSERT INTO `china` VALUES ('350427', '沙县', '350400');
INSERT INTO `china` VALUES ('350428', '将乐县', '350400');
INSERT INTO `china` VALUES ('350429', '泰宁县', '350400');
INSERT INTO `china` VALUES ('350430', '建宁县', '350400');
INSERT INTO `china` VALUES ('350481', '永安市', '350400');
INSERT INTO `china` VALUES ('350500', '泉州市', '350000');
INSERT INTO `china` VALUES ('350502', '鲤城区', '350500');
INSERT INTO `china` VALUES ('350503', '丰泽区', '350500');
INSERT INTO `china` VALUES ('350504', '洛江区', '350500');
INSERT INTO `china` VALUES ('350505', '泉港区', '350500');
INSERT INTO `china` VALUES ('350521', '惠安县', '350500');
INSERT INTO `china` VALUES ('350524', '安溪县', '350500');
INSERT INTO `china` VALUES ('350525', '永春县', '350500');
INSERT INTO `china` VALUES ('350526', '德化县', '350500');
INSERT INTO `china` VALUES ('350527', '金门县', '350500');
INSERT INTO `china` VALUES ('350581', '石狮市', '350500');
INSERT INTO `china` VALUES ('350582', '晋江市', '350500');
INSERT INTO `china` VALUES ('350583', '南安市', '350500');
INSERT INTO `china` VALUES ('350600', '漳州市', '350000');
INSERT INTO `china` VALUES ('350602', '芗城区', '350600');
INSERT INTO `china` VALUES ('350603', '龙文区', '350600');
INSERT INTO `china` VALUES ('350622', '云霄县', '350600');
INSERT INTO `china` VALUES ('350623', '漳浦县', '350600');
INSERT INTO `china` VALUES ('350624', '诏安县', '350600');
INSERT INTO `china` VALUES ('350625', '长泰县', '350600');
INSERT INTO `china` VALUES ('350626', '东山县', '350600');
INSERT INTO `china` VALUES ('350627', '南靖县', '350600');
INSERT INTO `china` VALUES ('350628', '平和县', '350600');
INSERT INTO `china` VALUES ('350629', '华安县', '350600');
INSERT INTO `china` VALUES ('350681', '龙海市', '350600');
INSERT INTO `china` VALUES ('350700', '南平市', '350000');
INSERT INTO `china` VALUES ('350702', '延平区', '350700');
INSERT INTO `china` VALUES ('350703', '建阳区', '350700');
INSERT INTO `china` VALUES ('350721', '顺昌县', '350700');
INSERT INTO `china` VALUES ('350722', '浦城县', '350700');
INSERT INTO `china` VALUES ('350723', '光泽县', '350700');
INSERT INTO `china` VALUES ('350724', '松溪县', '350700');
INSERT INTO `china` VALUES ('350725', '政和县', '350700');
INSERT INTO `china` VALUES ('350781', '邵武市', '350700');
INSERT INTO `china` VALUES ('350782', '武夷山市', '350700');
INSERT INTO `china` VALUES ('350783', '建瓯市', '350700');
INSERT INTO `china` VALUES ('350800', '龙岩市', '350000');
INSERT INTO `china` VALUES ('350802', '新罗区', '350800');
INSERT INTO `china` VALUES ('350803', '永定区', '350800');
INSERT INTO `china` VALUES ('350821', '长汀县', '350800');
INSERT INTO `china` VALUES ('350823', '上杭县', '350800');
INSERT INTO `china` VALUES ('350824', '武平县', '350800');
INSERT INTO `china` VALUES ('350825', '连城县', '350800');
INSERT INTO `china` VALUES ('350881', '漳平市', '350800');
INSERT INTO `china` VALUES ('350900', '宁德市', '350000');
INSERT INTO `china` VALUES ('350902', '蕉城区', '350900');
INSERT INTO `china` VALUES ('350921', '霞浦县', '350900');
INSERT INTO `china` VALUES ('350922', '古田县', '350900');
INSERT INTO `china` VALUES ('350923', '屏南县', '350900');
INSERT INTO `china` VALUES ('350924', '寿宁县', '350900');
INSERT INTO `china` VALUES ('350925', '周宁县', '350900');
INSERT INTO `china` VALUES ('350926', '柘荣县', '350900');
INSERT INTO `china` VALUES ('350981', '福安市', '350900');
INSERT INTO `china` VALUES ('350982', '福鼎市', '350900');
INSERT INTO `china` VALUES ('350990', '东侨开发区', '350900');
INSERT INTO `china` VALUES ('360000', '江西省', '0');
INSERT INTO `china` VALUES ('360100', '南昌市', '360000');
INSERT INTO `china` VALUES ('360102', '东湖区', '360100');
INSERT INTO `china` VALUES ('360103', '西湖区', '360100');
INSERT INTO `china` VALUES ('360104', '青云谱区', '360100');
INSERT INTO `china` VALUES ('360105', '湾里区', '360100');
INSERT INTO `china` VALUES ('360111', '青山湖区', '360100');
INSERT INTO `china` VALUES ('360112', '新建区', '360100');
INSERT INTO `china` VALUES ('360121', '南昌县', '360100');
INSERT INTO `china` VALUES ('360123', '安义县', '360100');
INSERT INTO `china` VALUES ('360124', '进贤县', '360100');
INSERT INTO `china` VALUES ('360190', '经济技术开发区', '360100');
INSERT INTO `china` VALUES ('360191', '红谷滩新区', '360100');
INSERT INTO `china` VALUES ('360192', '高新区', '360100');
INSERT INTO `china` VALUES ('360200', '景德镇市', '360000');
INSERT INTO `china` VALUES ('360202', '昌江区', '360200');
INSERT INTO `china` VALUES ('360203', '珠山区', '360200');
INSERT INTO `china` VALUES ('360222', '浮梁县', '360200');
INSERT INTO `china` VALUES ('360281', '乐平市', '360200');
INSERT INTO `china` VALUES ('360300', '萍乡市', '360000');
INSERT INTO `china` VALUES ('360302', '安源区', '360300');
INSERT INTO `china` VALUES ('360313', '湘东区', '360300');
INSERT INTO `china` VALUES ('360321', '莲花县', '360300');
INSERT INTO `china` VALUES ('360322', '上栗县', '360300');
INSERT INTO `china` VALUES ('360323', '芦溪县', '360300');
INSERT INTO `china` VALUES ('360400', '九江市', '360000');
INSERT INTO `china` VALUES ('360402', '庐山区', '360400');
INSERT INTO `china` VALUES ('360403', '浔阳区', '360400');
INSERT INTO `china` VALUES ('360421', '九江县', '360400');
INSERT INTO `china` VALUES ('360423', '武宁县', '360400');
INSERT INTO `china` VALUES ('360424', '修水县', '360400');
INSERT INTO `china` VALUES ('360425', '永修县', '360400');
INSERT INTO `china` VALUES ('360426', '德安县', '360400');
INSERT INTO `china` VALUES ('360427', '星子县', '360400');
INSERT INTO `china` VALUES ('360428', '都昌县', '360400');
INSERT INTO `china` VALUES ('360429', '湖口县', '360400');
INSERT INTO `china` VALUES ('360430', '彭泽县', '360400');
INSERT INTO `china` VALUES ('360481', '瑞昌市', '360400');
INSERT INTO `china` VALUES ('360482', '共青城市', '360400');
INSERT INTO `china` VALUES ('360490', '经济技术开发区', '360400');
INSERT INTO `china` VALUES ('360491', '八里湖新区', '360400');
INSERT INTO `china` VALUES ('360500', '新余市', '360000');
INSERT INTO `china` VALUES ('360502', '渝水区', '360500');
INSERT INTO `china` VALUES ('360521', '分宜县', '360500');
INSERT INTO `china` VALUES ('360600', '鹰潭市', '360000');
INSERT INTO `china` VALUES ('360602', '月湖区', '360600');
INSERT INTO `china` VALUES ('360622', '余江县', '360600');
INSERT INTO `china` VALUES ('360681', '贵溪市', '360600');
INSERT INTO `china` VALUES ('360700', '赣州市', '360000');
INSERT INTO `china` VALUES ('360702', '章贡区', '360700');
INSERT INTO `china` VALUES ('360703', '南康区', '360700');
INSERT INTO `china` VALUES ('360721', '赣县', '360700');
INSERT INTO `china` VALUES ('360722', '信丰县', '360700');
INSERT INTO `china` VALUES ('360723', '大余县', '360700');
INSERT INTO `china` VALUES ('360724', '上犹县', '360700');
INSERT INTO `china` VALUES ('360725', '崇义县', '360700');
INSERT INTO `china` VALUES ('360726', '安远县', '360700');
INSERT INTO `china` VALUES ('360727', '龙南县', '360700');
INSERT INTO `china` VALUES ('360728', '定南县', '360700');
INSERT INTO `china` VALUES ('360729', '全南县', '360700');
INSERT INTO `china` VALUES ('360730', '宁都县', '360700');
INSERT INTO `china` VALUES ('360731', '于都县', '360700');
INSERT INTO `china` VALUES ('360732', '兴国县', '360700');
INSERT INTO `china` VALUES ('360733', '会昌县', '360700');
INSERT INTO `china` VALUES ('360734', '寻乌县', '360700');
INSERT INTO `china` VALUES ('360735', '石城县', '360700');
INSERT INTO `china` VALUES ('360781', '瑞金市', '360700');
INSERT INTO `china` VALUES ('360800', '吉安市', '360000');
INSERT INTO `china` VALUES ('360802', '吉州区', '360800');
INSERT INTO `china` VALUES ('360803', '青原区', '360800');
INSERT INTO `china` VALUES ('360821', '吉安县', '360800');
INSERT INTO `china` VALUES ('360822', '吉水县', '360800');
INSERT INTO `china` VALUES ('360823', '峡江县', '360800');
INSERT INTO `china` VALUES ('360824', '新干县', '360800');
INSERT INTO `china` VALUES ('360825', '永丰县', '360800');
INSERT INTO `china` VALUES ('360826', '泰和县', '360800');
INSERT INTO `china` VALUES ('360827', '遂川县', '360800');
INSERT INTO `china` VALUES ('360828', '万安县', '360800');
INSERT INTO `china` VALUES ('360829', '安福县', '360800');
INSERT INTO `china` VALUES ('360830', '永新县', '360800');
INSERT INTO `china` VALUES ('360881', '井冈山市', '360800');
INSERT INTO `china` VALUES ('360900', '宜春市', '360000');
INSERT INTO `china` VALUES ('360902', '袁州区', '360900');
INSERT INTO `china` VALUES ('360921', '奉新县', '360900');
INSERT INTO `china` VALUES ('360922', '万载县', '360900');
INSERT INTO `china` VALUES ('360923', '上高县', '360900');
INSERT INTO `china` VALUES ('360924', '宜丰县', '360900');
INSERT INTO `china` VALUES ('360925', '靖安县', '360900');
INSERT INTO `china` VALUES ('360926', '铜鼓县', '360900');
INSERT INTO `china` VALUES ('360981', '丰城市', '360900');
INSERT INTO `china` VALUES ('360982', '樟树市', '360900');
INSERT INTO `china` VALUES ('360983', '高安市', '360900');
INSERT INTO `china` VALUES ('361000', '抚州市', '360000');
INSERT INTO `china` VALUES ('361002', '临川区', '361000');
INSERT INTO `china` VALUES ('361021', '南城县', '361000');
INSERT INTO `china` VALUES ('361022', '黎川县', '361000');
INSERT INTO `china` VALUES ('361023', '南丰县', '361000');
INSERT INTO `china` VALUES ('361024', '崇仁县', '361000');
INSERT INTO `china` VALUES ('361025', '乐安县', '361000');
INSERT INTO `china` VALUES ('361026', '宜黄县', '361000');
INSERT INTO `china` VALUES ('361027', '金溪县', '361000');
INSERT INTO `china` VALUES ('361028', '资溪县', '361000');
INSERT INTO `china` VALUES ('361029', '东乡县', '361000');
INSERT INTO `china` VALUES ('361030', '广昌县', '361000');
INSERT INTO `china` VALUES ('361100', '上饶市', '360000');
INSERT INTO `china` VALUES ('361102', '信州区', '361100');
INSERT INTO `china` VALUES ('361103', '广丰区', '361100');
INSERT INTO `china` VALUES ('361121', '上饶县', '361100');
INSERT INTO `china` VALUES ('361123', '玉山县', '361100');
INSERT INTO `china` VALUES ('361124', '铅山县', '361100');
INSERT INTO `china` VALUES ('361125', '横峰县', '361100');
INSERT INTO `china` VALUES ('361126', '弋阳县', '361100');
INSERT INTO `china` VALUES ('361127', '余干县', '361100');
INSERT INTO `china` VALUES ('361128', '鄱阳县', '361100');
INSERT INTO `china` VALUES ('361129', '万年县', '361100');
INSERT INTO `china` VALUES ('361130', '婺源县', '361100');
INSERT INTO `china` VALUES ('361181', '德兴市', '361100');
INSERT INTO `china` VALUES ('370000', '山东省', '0');
INSERT INTO `china` VALUES ('370100', '济南市', '370000');
INSERT INTO `china` VALUES ('370102', '历下区', '370100');
INSERT INTO `china` VALUES ('370103', '市中区', '370100');
INSERT INTO `china` VALUES ('370104', '槐荫区', '370100');
INSERT INTO `china` VALUES ('370105', '天桥区', '370100');
INSERT INTO `china` VALUES ('370112', '历城区', '370100');
INSERT INTO `china` VALUES ('370113', '长清区', '370100');
INSERT INTO `china` VALUES ('370124', '平阴县', '370100');
INSERT INTO `china` VALUES ('370125', '济阳县', '370100');
INSERT INTO `china` VALUES ('370126', '商河县', '370100');
INSERT INTO `china` VALUES ('370181', '章丘市', '370100');
INSERT INTO `china` VALUES ('370190', '高新区', '370100');
INSERT INTO `china` VALUES ('370200', '青岛市', '370000');
INSERT INTO `china` VALUES ('370202', '市南区', '370200');
INSERT INTO `china` VALUES ('370203', '市北区', '370200');
INSERT INTO `china` VALUES ('370211', '黄岛区', '370200');
INSERT INTO `china` VALUES ('370212', '崂山区', '370200');
INSERT INTO `china` VALUES ('370213', '李沧区', '370200');
INSERT INTO `china` VALUES ('370214', '城阳区', '370200');
INSERT INTO `china` VALUES ('370281', '胶州市', '370200');
INSERT INTO `china` VALUES ('370282', '即墨市', '370200');
INSERT INTO `china` VALUES ('370283', '平度市', '370200');
INSERT INTO `china` VALUES ('370285', '莱西市', '370200');
INSERT INTO `china` VALUES ('370290', '开发区', '370200');
INSERT INTO `china` VALUES ('370300', '淄博市', '370000');
INSERT INTO `china` VALUES ('370302', '淄川区', '370300');
INSERT INTO `china` VALUES ('370303', '张店区', '370300');
INSERT INTO `china` VALUES ('370304', '博山区', '370300');
INSERT INTO `china` VALUES ('370305', '临淄区', '370300');
INSERT INTO `china` VALUES ('370306', '周村区', '370300');
INSERT INTO `china` VALUES ('370321', '桓台县', '370300');
INSERT INTO `china` VALUES ('370322', '高青县', '370300');
INSERT INTO `china` VALUES ('370323', '沂源县', '370300');
INSERT INTO `china` VALUES ('370400', '枣庄市', '370000');
INSERT INTO `china` VALUES ('370402', '市中区', '370400');
INSERT INTO `china` VALUES ('370403', '薛城区', '370400');
INSERT INTO `china` VALUES ('370404', '峄城区', '370400');
INSERT INTO `china` VALUES ('370405', '台儿庄区', '370400');
INSERT INTO `china` VALUES ('370406', '山亭区', '370400');
INSERT INTO `china` VALUES ('370481', '滕州市', '370400');
INSERT INTO `china` VALUES ('370500', '东营市', '370000');
INSERT INTO `china` VALUES ('370502', '东营区', '370500');
INSERT INTO `china` VALUES ('370503', '河口区', '370500');
INSERT INTO `china` VALUES ('370521', '垦利县', '370500');
INSERT INTO `china` VALUES ('370522', '利津县', '370500');
INSERT INTO `china` VALUES ('370523', '广饶县', '370500');
INSERT INTO `china` VALUES ('370600', '烟台市', '370000');
INSERT INTO `china` VALUES ('370602', '芝罘区', '370600');
INSERT INTO `china` VALUES ('370611', '福山区', '370600');
INSERT INTO `china` VALUES ('370612', '牟平区', '370600');
INSERT INTO `china` VALUES ('370613', '莱山区', '370600');
INSERT INTO `china` VALUES ('370634', '长岛县', '370600');
INSERT INTO `china` VALUES ('370681', '龙口市', '370600');
INSERT INTO `china` VALUES ('370682', '莱阳市', '370600');
INSERT INTO `china` VALUES ('370683', '莱州市', '370600');
INSERT INTO `china` VALUES ('370684', '蓬莱市', '370600');
INSERT INTO `china` VALUES ('370685', '招远市', '370600');
INSERT INTO `china` VALUES ('370686', '栖霞市', '370600');
INSERT INTO `china` VALUES ('370687', '海阳市', '370600');
INSERT INTO `china` VALUES ('370690', '开发区', '370600');
INSERT INTO `china` VALUES ('370700', '潍坊市', '370000');
INSERT INTO `china` VALUES ('370702', '潍城区', '370700');
INSERT INTO `china` VALUES ('370703', '寒亭区', '370700');
INSERT INTO `china` VALUES ('370704', '坊子区', '370700');
INSERT INTO `china` VALUES ('370705', '奎文区', '370700');
INSERT INTO `china` VALUES ('370724', '临朐县', '370700');
INSERT INTO `china` VALUES ('370725', '昌乐县', '370700');
INSERT INTO `china` VALUES ('370781', '青州市', '370700');
INSERT INTO `china` VALUES ('370782', '诸城市', '370700');
INSERT INTO `china` VALUES ('370783', '寿光市', '370700');
INSERT INTO `china` VALUES ('370784', '安丘市', '370700');
INSERT INTO `china` VALUES ('370785', '高密市', '370700');
INSERT INTO `china` VALUES ('370786', '昌邑市', '370700');
INSERT INTO `china` VALUES ('370790', '开发区', '370700');
INSERT INTO `china` VALUES ('370791', '高新区', '370700');
INSERT INTO `china` VALUES ('370800', '济宁市', '370000');
INSERT INTO `china` VALUES ('370811', '任城区', '370800');
INSERT INTO `china` VALUES ('370812', '兖州区', '370800');
INSERT INTO `china` VALUES ('370826', '微山县', '370800');
INSERT INTO `china` VALUES ('370827', '鱼台县', '370800');
INSERT INTO `china` VALUES ('370828', '金乡县', '370800');
INSERT INTO `china` VALUES ('370829', '嘉祥县', '370800');
INSERT INTO `china` VALUES ('370830', '汶上县', '370800');
INSERT INTO `china` VALUES ('370831', '泗水县', '370800');
INSERT INTO `china` VALUES ('370832', '梁山县', '370800');
INSERT INTO `china` VALUES ('370881', '曲阜市', '370800');
INSERT INTO `china` VALUES ('370883', '邹城市', '370800');
INSERT INTO `china` VALUES ('370890', '高新区', '370800');
INSERT INTO `china` VALUES ('370900', '泰安市', '370000');
INSERT INTO `china` VALUES ('370902', '泰山区', '370900');
INSERT INTO `china` VALUES ('370911', '岱岳区', '370900');
INSERT INTO `china` VALUES ('370921', '宁阳县', '370900');
INSERT INTO `china` VALUES ('370923', '东平县', '370900');
INSERT INTO `china` VALUES ('370982', '新泰市', '370900');
INSERT INTO `china` VALUES ('370983', '肥城市', '370900');
INSERT INTO `china` VALUES ('371000', '威海市', '370000');
INSERT INTO `china` VALUES ('371002', '环翠区', '371000');
INSERT INTO `china` VALUES ('371003', '文登区', '371000');
INSERT INTO `china` VALUES ('371082', '荣成市', '371000');
INSERT INTO `china` VALUES ('371083', '乳山市', '371000');
INSERT INTO `china` VALUES ('371090', '工业新区', '371000');
INSERT INTO `china` VALUES ('371091', '经济技术开发区', '371000');
INSERT INTO `china` VALUES ('371100', '日照市', '370000');
INSERT INTO `china` VALUES ('371102', '东港区', '371100');
INSERT INTO `china` VALUES ('371103', '岚山区', '371100');
INSERT INTO `china` VALUES ('371121', '五莲县', '371100');
INSERT INTO `china` VALUES ('371122', '莒县', '371100');
INSERT INTO `china` VALUES ('371200', '莱芜市', '370000');
INSERT INTO `china` VALUES ('371202', '莱城区', '371200');
INSERT INTO `china` VALUES ('371203', '钢城区', '371200');
INSERT INTO `china` VALUES ('371300', '临沂市', '370000');
INSERT INTO `china` VALUES ('371302', '兰山区', '371300');
INSERT INTO `china` VALUES ('371311', '罗庄区', '371300');
INSERT INTO `china` VALUES ('371312', '河东区', '371300');
INSERT INTO `china` VALUES ('371321', '沂南县', '371300');
INSERT INTO `china` VALUES ('371322', '郯城县', '371300');
INSERT INTO `china` VALUES ('371323', '沂水县', '371300');
INSERT INTO `china` VALUES ('371324', '兰陵县', '371300');
INSERT INTO `china` VALUES ('371325', '费县', '371300');
INSERT INTO `china` VALUES ('371326', '平邑县', '371300');
INSERT INTO `china` VALUES ('371327', '莒南县', '371300');
INSERT INTO `china` VALUES ('371328', '蒙阴县', '371300');
INSERT INTO `china` VALUES ('371329', '临沭县', '371300');
INSERT INTO `china` VALUES ('371400', '德州市', '370000');
INSERT INTO `china` VALUES ('371402', '德城区', '371400');
INSERT INTO `china` VALUES ('371403', '陵城区', '371400');
INSERT INTO `china` VALUES ('371422', '宁津县', '371400');
INSERT INTO `china` VALUES ('371423', '庆云县', '371400');
INSERT INTO `china` VALUES ('371424', '临邑县', '371400');
INSERT INTO `china` VALUES ('371425', '齐河县', '371400');
INSERT INTO `china` VALUES ('371426', '平原县', '371400');
INSERT INTO `china` VALUES ('371427', '夏津县', '371400');
INSERT INTO `china` VALUES ('371428', '武城县', '371400');
INSERT INTO `china` VALUES ('371481', '乐陵市', '371400');
INSERT INTO `china` VALUES ('371482', '禹城市', '371400');
INSERT INTO `china` VALUES ('371490', '德州经济技术开发区', '371400');
INSERT INTO `china` VALUES ('371500', '聊城市', '370000');
INSERT INTO `china` VALUES ('371502', '东昌府区', '371500');
INSERT INTO `china` VALUES ('371521', '阳谷县', '371500');
INSERT INTO `china` VALUES ('371522', '莘县', '371500');
INSERT INTO `china` VALUES ('371523', '茌平县', '371500');
INSERT INTO `china` VALUES ('371524', '东阿县', '371500');
INSERT INTO `china` VALUES ('371525', '冠县', '371500');
INSERT INTO `china` VALUES ('371526', '高唐县', '371500');
INSERT INTO `china` VALUES ('371581', '临清市', '371500');
INSERT INTO `china` VALUES ('371600', '滨州市', '370000');
INSERT INTO `china` VALUES ('371602', '滨城区', '371600');
INSERT INTO `china` VALUES ('371603', '沾化区', '371600');
INSERT INTO `china` VALUES ('371621', '惠民县', '371600');
INSERT INTO `china` VALUES ('371622', '阳信县', '371600');
INSERT INTO `china` VALUES ('371623', '无棣县', '371600');
INSERT INTO `china` VALUES ('371625', '博兴县', '371600');
INSERT INTO `china` VALUES ('371626', '邹平县', '371600');
INSERT INTO `china` VALUES ('371690', '北海新区', '371600');
INSERT INTO `china` VALUES ('371700', '菏泽市', '370000');
INSERT INTO `china` VALUES ('371702', '牡丹区', '371700');
INSERT INTO `china` VALUES ('371721', '曹县', '371700');
INSERT INTO `china` VALUES ('371722', '单县', '371700');
INSERT INTO `china` VALUES ('371723', '成武县', '371700');
INSERT INTO `china` VALUES ('371724', '巨野县', '371700');
INSERT INTO `china` VALUES ('371725', '郓城县', '371700');
INSERT INTO `china` VALUES ('371726', '鄄城县', '371700');
INSERT INTO `china` VALUES ('371727', '定陶县', '371700');
INSERT INTO `china` VALUES ('371728', '东明县', '371700');
INSERT INTO `china` VALUES ('410000', '河南省', '0');
INSERT INTO `china` VALUES ('410100', '郑州市', '410000');
INSERT INTO `china` VALUES ('410102', '中原区', '410100');
INSERT INTO `china` VALUES ('410103', '二七区', '410100');
INSERT INTO `china` VALUES ('410104', '管城回族区', '410100');
INSERT INTO `china` VALUES ('410105', '金水区', '410100');
INSERT INTO `china` VALUES ('410106', '上街区', '410100');
INSERT INTO `china` VALUES ('410108', '惠济区', '410100');
INSERT INTO `china` VALUES ('410122', '中牟县', '410100');
INSERT INTO `china` VALUES ('410181', '巩义市', '410100');
INSERT INTO `china` VALUES ('410182', '荥阳市', '410100');
INSERT INTO `china` VALUES ('410183', '新密市', '410100');
INSERT INTO `china` VALUES ('410184', '新郑市', '410100');
INSERT INTO `china` VALUES ('410185', '登封市', '410100');
INSERT INTO `china` VALUES ('410190', '高新技术开发区', '410100');
INSERT INTO `china` VALUES ('410191', '经济技术开发区', '410100');
INSERT INTO `china` VALUES ('410192', '郑东新区', '410100');
INSERT INTO `china` VALUES ('410200', '开封市', '410000');
INSERT INTO `china` VALUES ('410202', '龙亭区', '410200');
INSERT INTO `china` VALUES ('410203', '顺河回族区', '410200');
INSERT INTO `china` VALUES ('410204', '鼓楼区', '410200');
INSERT INTO `china` VALUES ('410205', '禹王台区', '410200');
INSERT INTO `china` VALUES ('410211', '金明区', '410200');
INSERT INTO `china` VALUES ('410212', '祥符区', '410200');
INSERT INTO `china` VALUES ('410221', '杞县', '410200');
INSERT INTO `china` VALUES ('410222', '通许县', '410200');
INSERT INTO `china` VALUES ('410223', '尉氏县', '410200');
INSERT INTO `china` VALUES ('410225', '兰考县', '410200');
INSERT INTO `china` VALUES ('410300', '洛阳市', '410000');
INSERT INTO `china` VALUES ('410302', '老城区', '410300');
INSERT INTO `china` VALUES ('410303', '西工区', '410300');
INSERT INTO `china` VALUES ('410304', '瀍河回族区', '410300');
INSERT INTO `china` VALUES ('410305', '涧西区', '410300');
INSERT INTO `china` VALUES ('410306', '吉利区', '410300');
INSERT INTO `china` VALUES ('410311', '洛龙区', '410300');
INSERT INTO `china` VALUES ('410322', '孟津县', '410300');
INSERT INTO `china` VALUES ('410323', '新安县', '410300');
INSERT INTO `china` VALUES ('410324', '栾川县', '410300');
INSERT INTO `china` VALUES ('410325', '嵩县', '410300');
INSERT INTO `china` VALUES ('410326', '汝阳县', '410300');
INSERT INTO `china` VALUES ('410327', '宜阳县', '410300');
INSERT INTO `china` VALUES ('410328', '洛宁县', '410300');
INSERT INTO `china` VALUES ('410329', '伊川县', '410300');
INSERT INTO `china` VALUES ('410381', '偃师市', '410300');
INSERT INTO `china` VALUES ('410390', '伊滨区', '410300');
INSERT INTO `china` VALUES ('410400', '平顶山市', '410000');
INSERT INTO `china` VALUES ('410402', '新华区', '410400');
INSERT INTO `china` VALUES ('410403', '卫东区', '410400');
INSERT INTO `china` VALUES ('410404', '石龙区', '410400');
INSERT INTO `china` VALUES ('410411', '湛河区', '410400');
INSERT INTO `china` VALUES ('410421', '宝丰县', '410400');
INSERT INTO `china` VALUES ('410422', '叶县', '410400');
INSERT INTO `china` VALUES ('410423', '鲁山县', '410400');
INSERT INTO `china` VALUES ('410425', '郏县', '410400');
INSERT INTO `china` VALUES ('410481', '舞钢市', '410400');
INSERT INTO `china` VALUES ('410482', '汝州市', '410400');
INSERT INTO `china` VALUES ('410500', '安阳市', '410000');
INSERT INTO `china` VALUES ('410502', '文峰区', '410500');
INSERT INTO `china` VALUES ('410503', '北关区', '410500');
INSERT INTO `china` VALUES ('410505', '殷都区', '410500');
INSERT INTO `china` VALUES ('410506', '龙安区', '410500');
INSERT INTO `china` VALUES ('410522', '安阳县', '410500');
INSERT INTO `china` VALUES ('410523', '汤阴县', '410500');
INSERT INTO `china` VALUES ('410526', '滑县', '410500');
INSERT INTO `china` VALUES ('410527', '内黄县', '410500');
INSERT INTO `china` VALUES ('410581', '林州市', '410500');
INSERT INTO `china` VALUES ('410590', '开发区', '410500');
INSERT INTO `china` VALUES ('410600', '鹤壁市', '410000');
INSERT INTO `china` VALUES ('410602', '鹤山区', '410600');
INSERT INTO `china` VALUES ('410603', '山城区', '410600');
INSERT INTO `china` VALUES ('410611', '淇滨区', '410600');
INSERT INTO `china` VALUES ('410621', '浚县', '410600');
INSERT INTO `china` VALUES ('410622', '淇县', '410600');
INSERT INTO `china` VALUES ('410700', '新乡市', '410000');
INSERT INTO `china` VALUES ('410702', '红旗区', '410700');
INSERT INTO `china` VALUES ('410703', '卫滨区', '410700');
INSERT INTO `china` VALUES ('410704', '凤泉区', '410700');
INSERT INTO `china` VALUES ('410711', '牧野区', '410700');
INSERT INTO `china` VALUES ('410721', '新乡县', '410700');
INSERT INTO `china` VALUES ('410724', '获嘉县', '410700');
INSERT INTO `china` VALUES ('410725', '原阳县', '410700');
INSERT INTO `china` VALUES ('410726', '延津县', '410700');
INSERT INTO `china` VALUES ('410727', '封丘县', '410700');
INSERT INTO `china` VALUES ('410728', '长垣县', '410700');
INSERT INTO `china` VALUES ('410781', '卫辉市', '410700');
INSERT INTO `china` VALUES ('410782', '辉县市', '410700');
INSERT INTO `china` VALUES ('410800', '焦作市', '410000');
INSERT INTO `china` VALUES ('410802', '解放区', '410800');
INSERT INTO `china` VALUES ('410803', '中站区', '410800');
INSERT INTO `china` VALUES ('410804', '马村区', '410800');
INSERT INTO `china` VALUES ('410811', '山阳区', '410800');
INSERT INTO `china` VALUES ('410821', '修武县', '410800');
INSERT INTO `china` VALUES ('410822', '博爱县', '410800');
INSERT INTO `china` VALUES ('410823', '武陟县', '410800');
INSERT INTO `china` VALUES ('410825', '温县', '410800');
INSERT INTO `china` VALUES ('410882', '沁阳市', '410800');
INSERT INTO `china` VALUES ('410883', '孟州市', '410800');
INSERT INTO `china` VALUES ('410900', '濮阳市', '410000');
INSERT INTO `china` VALUES ('410902', '华龙区', '410900');
INSERT INTO `china` VALUES ('410922', '清丰县', '410900');
INSERT INTO `china` VALUES ('410923', '南乐县', '410900');
INSERT INTO `china` VALUES ('410926', '范县', '410900');
INSERT INTO `china` VALUES ('410927', '台前县', '410900');
INSERT INTO `china` VALUES ('410928', '濮阳县', '410900');
INSERT INTO `china` VALUES ('411000', '许昌市', '410000');
INSERT INTO `china` VALUES ('411002', '魏都区', '411000');
INSERT INTO `china` VALUES ('411023', '许昌县', '411000');
INSERT INTO `china` VALUES ('411024', '鄢陵县', '411000');
INSERT INTO `china` VALUES ('411025', '襄城县', '411000');
INSERT INTO `china` VALUES ('411081', '禹州市', '411000');
INSERT INTO `china` VALUES ('411082', '长葛市', '411000');
INSERT INTO `china` VALUES ('411100', '漯河市', '410000');
INSERT INTO `china` VALUES ('411102', '源汇区', '411100');
INSERT INTO `china` VALUES ('411103', '郾城区', '411100');
INSERT INTO `china` VALUES ('411104', '召陵区', '411100');
INSERT INTO `china` VALUES ('411121', '舞阳县', '411100');
INSERT INTO `china` VALUES ('411122', '临颍县', '411100');
INSERT INTO `china` VALUES ('411200', '三门峡市', '410000');
INSERT INTO `china` VALUES ('411202', '湖滨区', '411200');
INSERT INTO `china` VALUES ('411221', '渑池县', '411200');
INSERT INTO `china` VALUES ('411222', '陕县', '411200');
INSERT INTO `china` VALUES ('411224', '卢氏县', '411200');
INSERT INTO `china` VALUES ('411281', '义马市', '411200');
INSERT INTO `china` VALUES ('411282', '灵宝市', '411200');
INSERT INTO `china` VALUES ('411300', '南阳市', '410000');
INSERT INTO `china` VALUES ('411302', '宛城区', '411300');
INSERT INTO `china` VALUES ('411303', '卧龙区', '411300');
INSERT INTO `china` VALUES ('411321', '南召县', '411300');
INSERT INTO `china` VALUES ('411322', '方城县', '411300');
INSERT INTO `china` VALUES ('411323', '西峡县', '411300');
INSERT INTO `china` VALUES ('411324', '镇平县', '411300');
INSERT INTO `china` VALUES ('411325', '内乡县', '411300');
INSERT INTO `china` VALUES ('411326', '淅川县', '411300');
INSERT INTO `china` VALUES ('411327', '社旗县', '411300');
INSERT INTO `china` VALUES ('411328', '唐河县', '411300');
INSERT INTO `china` VALUES ('411329', '新野县', '411300');
INSERT INTO `china` VALUES ('411330', '桐柏县', '411300');
INSERT INTO `china` VALUES ('411381', '邓州市', '411300');
INSERT INTO `china` VALUES ('411400', '商丘市', '410000');
INSERT INTO `china` VALUES ('411402', '梁园区', '411400');
INSERT INTO `china` VALUES ('411403', '睢阳区', '411400');
INSERT INTO `china` VALUES ('411421', '民权县', '411400');
INSERT INTO `china` VALUES ('411422', '睢县', '411400');
INSERT INTO `china` VALUES ('411423', '宁陵县', '411400');
INSERT INTO `china` VALUES ('411424', '柘城县', '411400');
INSERT INTO `china` VALUES ('411425', '虞城县', '411400');
INSERT INTO `china` VALUES ('411426', '夏邑县', '411400');
INSERT INTO `china` VALUES ('411481', '永城市', '411400');
INSERT INTO `china` VALUES ('411500', '信阳市', '410000');
INSERT INTO `china` VALUES ('411502', '浉河区', '411500');
INSERT INTO `china` VALUES ('411503', '平桥区', '411500');
INSERT INTO `china` VALUES ('411521', '罗山县', '411500');
INSERT INTO `china` VALUES ('411522', '光山县', '411500');
INSERT INTO `china` VALUES ('411523', '新县', '411500');
INSERT INTO `china` VALUES ('411524', '商城县', '411500');
INSERT INTO `china` VALUES ('411525', '固始县', '411500');
INSERT INTO `china` VALUES ('411526', '潢川县', '411500');
INSERT INTO `china` VALUES ('411527', '淮滨县', '411500');
INSERT INTO `china` VALUES ('411528', '息县', '411500');
INSERT INTO `china` VALUES ('411600', '周口市', '410000');
INSERT INTO `china` VALUES ('411602', '川汇区', '411600');
INSERT INTO `china` VALUES ('411621', '扶沟县', '411600');
INSERT INTO `china` VALUES ('411622', '西华县', '411600');
INSERT INTO `china` VALUES ('411623', '商水县', '411600');
INSERT INTO `china` VALUES ('411624', '沈丘县', '411600');
INSERT INTO `china` VALUES ('411625', '郸城县', '411600');
INSERT INTO `china` VALUES ('411626', '淮阳县', '411600');
INSERT INTO `china` VALUES ('411627', '太康县', '411600');
INSERT INTO `china` VALUES ('411628', '鹿邑县', '411600');
INSERT INTO `china` VALUES ('411681', '项城市', '411600');
INSERT INTO `china` VALUES ('411690', '经济开发区', '411600');
INSERT INTO `china` VALUES ('411691', '东新区', '411600');
INSERT INTO `china` VALUES ('411700', '驻马店市', '410000');
INSERT INTO `china` VALUES ('411702', '驿城区', '411700');
INSERT INTO `china` VALUES ('411721', '西平县', '411700');
INSERT INTO `china` VALUES ('411722', '上蔡县', '411700');
INSERT INTO `china` VALUES ('411723', '平舆县', '411700');
INSERT INTO `china` VALUES ('411724', '正阳县', '411700');
INSERT INTO `china` VALUES ('411725', '确山县', '411700');
INSERT INTO `china` VALUES ('411726', '泌阳县', '411700');
INSERT INTO `china` VALUES ('411727', '汝南县', '411700');
INSERT INTO `china` VALUES ('411728', '遂平县', '411700');
INSERT INTO `china` VALUES ('411729', '新蔡县', '411700');
INSERT INTO `china` VALUES ('419000', '省直辖县', '410000');
INSERT INTO `china` VALUES ('419001', '济源市', '419000');
INSERT INTO `china` VALUES ('420000', '湖北省', '0');
INSERT INTO `china` VALUES ('420100', '武汉市', '420000');
INSERT INTO `china` VALUES ('420102', '江岸区', '420100');
INSERT INTO `china` VALUES ('420103', '江汉区', '420100');
INSERT INTO `china` VALUES ('420104', '硚口区', '420100');
INSERT INTO `china` VALUES ('420105', '汉阳区', '420100');
INSERT INTO `china` VALUES ('420106', '武昌区', '420100');
INSERT INTO `china` VALUES ('420107', '青山区', '420100');
INSERT INTO `china` VALUES ('420111', '洪山区', '420100');
INSERT INTO `china` VALUES ('420112', '东西湖区', '420100');
INSERT INTO `china` VALUES ('420113', '汉南区', '420100');
INSERT INTO `china` VALUES ('420114', '蔡甸区', '420100');
INSERT INTO `china` VALUES ('420115', '江夏区', '420100');
INSERT INTO `china` VALUES ('420116', '黄陂区', '420100');
INSERT INTO `china` VALUES ('420117', '新洲区', '420100');
INSERT INTO `china` VALUES ('420190', '武汉经济技术开发区', '420100');
INSERT INTO `china` VALUES ('420200', '黄石市', '420000');
INSERT INTO `china` VALUES ('420202', '黄石港区', '420200');
INSERT INTO `china` VALUES ('420203', '西塞山区', '420200');
INSERT INTO `china` VALUES ('420204', '下陆区', '420200');
INSERT INTO `china` VALUES ('420205', '铁山区', '420200');
INSERT INTO `china` VALUES ('420222', '阳新县', '420200');
INSERT INTO `china` VALUES ('420281', '大冶市', '420200');
INSERT INTO `china` VALUES ('420290', '黄石经济技术开发区', '420200');
INSERT INTO `china` VALUES ('420300', '十堰市', '420000');
INSERT INTO `china` VALUES ('420302', '茅箭区', '420300');
INSERT INTO `china` VALUES ('420303', '张湾区', '420300');
INSERT INTO `china` VALUES ('420304', '郧阳区', '420300');
INSERT INTO `china` VALUES ('420322', '郧西县', '420300');
INSERT INTO `china` VALUES ('420323', '竹山县', '420300');
INSERT INTO `china` VALUES ('420324', '竹溪县', '420300');
INSERT INTO `china` VALUES ('420325', '房县', '420300');
INSERT INTO `china` VALUES ('420381', '丹江口市', '420300');
INSERT INTO `china` VALUES ('420500', '宜昌市', '420000');
INSERT INTO `china` VALUES ('420502', '西陵区', '420500');
INSERT INTO `china` VALUES ('420503', '伍家岗区', '420500');
INSERT INTO `china` VALUES ('420504', '点军区', '420500');
INSERT INTO `china` VALUES ('420505', '猇亭区', '420500');
INSERT INTO `china` VALUES ('420506', '夷陵区', '420500');
INSERT INTO `china` VALUES ('420525', '远安县', '420500');
INSERT INTO `china` VALUES ('420526', '兴山县', '420500');
INSERT INTO `china` VALUES ('420527', '秭归县', '420500');
INSERT INTO `china` VALUES ('420528', '长阳土家族自治县', '420500');
INSERT INTO `china` VALUES ('420529', '五峰土家族自治县', '420500');
INSERT INTO `china` VALUES ('420581', '宜都市', '420500');
INSERT INTO `china` VALUES ('420582', '当阳市', '420500');
INSERT INTO `china` VALUES ('420583', '枝江市', '420500');
INSERT INTO `china` VALUES ('420590', '经济开发区', '420500');
INSERT INTO `china` VALUES ('420600', '襄阳市', '420000');
INSERT INTO `china` VALUES ('420602', '襄城区', '420600');
INSERT INTO `china` VALUES ('420606', '樊城区', '420600');
INSERT INTO `china` VALUES ('420607', '襄州区', '420600');
INSERT INTO `china` VALUES ('420624', '南漳县', '420600');
INSERT INTO `china` VALUES ('420625', '谷城县', '420600');
INSERT INTO `china` VALUES ('420626', '保康县', '420600');
INSERT INTO `china` VALUES ('420682', '老河口市', '420600');
INSERT INTO `china` VALUES ('420683', '枣阳市', '420600');
INSERT INTO `china` VALUES ('420684', '宜城市', '420600');
INSERT INTO `china` VALUES ('420700', '鄂州市', '420000');
INSERT INTO `china` VALUES ('420702', '梁子湖区', '420700');
INSERT INTO `china` VALUES ('420703', '华容区', '420700');
INSERT INTO `china` VALUES ('420704', '鄂城区', '420700');
INSERT INTO `china` VALUES ('420800', '荆门市', '420000');
INSERT INTO `china` VALUES ('420802', '东宝区', '420800');
INSERT INTO `china` VALUES ('420804', '掇刀区', '420800');
INSERT INTO `china` VALUES ('420821', '京山县', '420800');
INSERT INTO `china` VALUES ('420822', '沙洋县', '420800');
INSERT INTO `china` VALUES ('420881', '钟祥市', '420800');
INSERT INTO `china` VALUES ('420900', '孝感市', '420000');
INSERT INTO `china` VALUES ('420902', '孝南区', '420900');
INSERT INTO `china` VALUES ('420921', '孝昌县', '420900');
INSERT INTO `china` VALUES ('420922', '大悟县', '420900');
INSERT INTO `china` VALUES ('420923', '云梦县', '420900');
INSERT INTO `china` VALUES ('420981', '应城市', '420900');
INSERT INTO `china` VALUES ('420982', '安陆市', '420900');
INSERT INTO `china` VALUES ('420984', '汉川市', '420900');
INSERT INTO `china` VALUES ('421000', '荆州市', '420000');
INSERT INTO `china` VALUES ('421002', '沙市区', '421000');
INSERT INTO `china` VALUES ('421003', '荆州区', '421000');
INSERT INTO `china` VALUES ('421022', '公安县', '421000');
INSERT INTO `china` VALUES ('421023', '监利县', '421000');
INSERT INTO `china` VALUES ('421024', '江陵县', '421000');
INSERT INTO `china` VALUES ('421081', '石首市', '421000');
INSERT INTO `china` VALUES ('421083', '洪湖市', '421000');
INSERT INTO `china` VALUES ('421087', '松滋市', '421000');
INSERT INTO `china` VALUES ('421100', '黄冈市', '420000');
INSERT INTO `china` VALUES ('421102', '黄州区', '421100');
INSERT INTO `china` VALUES ('421121', '团风县', '421100');
INSERT INTO `china` VALUES ('421122', '红安县', '421100');
INSERT INTO `china` VALUES ('421123', '罗田县', '421100');
INSERT INTO `china` VALUES ('421124', '英山县', '421100');
INSERT INTO `china` VALUES ('421125', '浠水县', '421100');
INSERT INTO `china` VALUES ('421126', '蕲春县', '421100');
INSERT INTO `china` VALUES ('421127', '黄梅县', '421100');
INSERT INTO `china` VALUES ('421181', '麻城市', '421100');
INSERT INTO `china` VALUES ('421182', '武穴市', '421100');
INSERT INTO `china` VALUES ('421200', '咸宁市', '420000');
INSERT INTO `china` VALUES ('421202', '咸安区', '421200');
INSERT INTO `china` VALUES ('421221', '嘉鱼县', '421200');
INSERT INTO `china` VALUES ('421222', '通城县', '421200');
INSERT INTO `china` VALUES ('421223', '崇阳县', '421200');
INSERT INTO `china` VALUES ('421224', '通山县', '421200');
INSERT INTO `china` VALUES ('421281', '赤壁市', '421200');
INSERT INTO `china` VALUES ('421300', '随州市', '420000');
INSERT INTO `china` VALUES ('421303', '曾都区', '421300');
INSERT INTO `china` VALUES ('421321', '随县', '421300');
INSERT INTO `china` VALUES ('421381', '广水市', '421300');
INSERT INTO `china` VALUES ('422800', '恩施土家族苗族自治州', '420000');
INSERT INTO `china` VALUES ('422801', '恩施市', '422800');
INSERT INTO `china` VALUES ('422802', '利川市', '422800');
INSERT INTO `china` VALUES ('422822', '建始县', '422800');
INSERT INTO `china` VALUES ('422823', '巴东县', '422800');
INSERT INTO `china` VALUES ('422825', '宣恩县', '422800');
INSERT INTO `china` VALUES ('422826', '咸丰县', '422800');
INSERT INTO `china` VALUES ('422827', '来凤县', '422800');
INSERT INTO `china` VALUES ('422828', '鹤峰县', '422800');
INSERT INTO `china` VALUES ('429000', '省直辖县', '420000');
INSERT INTO `china` VALUES ('429004', '仙桃市', '429000');
INSERT INTO `china` VALUES ('429005', '潜江市', '429000');
INSERT INTO `china` VALUES ('429006', '天门市', '429000');
INSERT INTO `china` VALUES ('429021', '神农架林区', '429000');
INSERT INTO `china` VALUES ('430000', '湖南省', '0');
INSERT INTO `china` VALUES ('430100', '长沙市', '430000');
INSERT INTO `china` VALUES ('430102', '芙蓉区', '430100');
INSERT INTO `china` VALUES ('430103', '天心区', '430100');
INSERT INTO `china` VALUES ('430104', '岳麓区', '430100');
INSERT INTO `china` VALUES ('430105', '开福区', '430100');
INSERT INTO `china` VALUES ('430111', '雨花区', '430100');
INSERT INTO `china` VALUES ('430112', '望城区', '430100');
INSERT INTO `china` VALUES ('430121', '长沙县', '430100');
INSERT INTO `china` VALUES ('430124', '宁乡县', '430100');
INSERT INTO `china` VALUES ('430181', '浏阳市', '430100');
INSERT INTO `china` VALUES ('430200', '株洲市', '430000');
INSERT INTO `china` VALUES ('430202', '荷塘区', '430200');
INSERT INTO `china` VALUES ('430203', '芦淞区', '430200');
INSERT INTO `china` VALUES ('430204', '石峰区', '430200');
INSERT INTO `china` VALUES ('430211', '天元区', '430200');
INSERT INTO `china` VALUES ('430221', '株洲县', '430200');
INSERT INTO `china` VALUES ('430223', '攸县', '430200');
INSERT INTO `china` VALUES ('430224', '茶陵县', '430200');
INSERT INTO `china` VALUES ('430225', '炎陵县', '430200');
INSERT INTO `china` VALUES ('430281', '醴陵市', '430200');
INSERT INTO `china` VALUES ('430300', '湘潭市', '430000');
INSERT INTO `china` VALUES ('430302', '雨湖区', '430300');
INSERT INTO `china` VALUES ('430304', '岳塘区', '430300');
INSERT INTO `china` VALUES ('430321', '湘潭县', '430300');
INSERT INTO `china` VALUES ('430381', '湘乡市', '430300');
INSERT INTO `china` VALUES ('430382', '韶山市', '430300');
INSERT INTO `china` VALUES ('430400', '衡阳市', '430000');
INSERT INTO `china` VALUES ('430405', '珠晖区', '430400');
INSERT INTO `china` VALUES ('430406', '雁峰区', '430400');
INSERT INTO `china` VALUES ('430407', '石鼓区', '430400');
INSERT INTO `china` VALUES ('430408', '蒸湘区', '430400');
INSERT INTO `china` VALUES ('430412', '南岳区', '430400');
INSERT INTO `china` VALUES ('430421', '衡阳县', '430400');
INSERT INTO `china` VALUES ('430422', '衡南县', '430400');
INSERT INTO `china` VALUES ('430423', '衡山县', '430400');
INSERT INTO `china` VALUES ('430424', '衡东县', '430400');
INSERT INTO `china` VALUES ('430426', '祁东县', '430400');
INSERT INTO `china` VALUES ('430481', '耒阳市', '430400');
INSERT INTO `china` VALUES ('430482', '常宁市', '430400');
INSERT INTO `china` VALUES ('430500', '邵阳市', '430000');
INSERT INTO `china` VALUES ('430502', '双清区', '430500');
INSERT INTO `china` VALUES ('430503', '大祥区', '430500');
INSERT INTO `china` VALUES ('430511', '北塔区', '430500');
INSERT INTO `china` VALUES ('430521', '邵东县', '430500');
INSERT INTO `china` VALUES ('430522', '新邵县', '430500');
INSERT INTO `china` VALUES ('430523', '邵阳县', '430500');
INSERT INTO `china` VALUES ('430524', '隆回县', '430500');
INSERT INTO `china` VALUES ('430525', '洞口县', '430500');
INSERT INTO `china` VALUES ('430527', '绥宁县', '430500');
INSERT INTO `china` VALUES ('430528', '新宁县', '430500');
INSERT INTO `china` VALUES ('430529', '城步苗族自治县', '430500');
INSERT INTO `china` VALUES ('430581', '武冈市', '430500');
INSERT INTO `china` VALUES ('430600', '岳阳市', '430000');
INSERT INTO `china` VALUES ('430602', '岳阳楼区', '430600');
INSERT INTO `china` VALUES ('430603', '云溪区', '430600');
INSERT INTO `china` VALUES ('430611', '君山区', '430600');
INSERT INTO `china` VALUES ('430621', '岳阳县', '430600');
INSERT INTO `china` VALUES ('430623', '华容县', '430600');
INSERT INTO `china` VALUES ('430624', '湘阴县', '430600');
INSERT INTO `china` VALUES ('430626', '平江县', '430600');
INSERT INTO `china` VALUES ('430681', '汨罗市', '430600');
INSERT INTO `china` VALUES ('430682', '临湘市', '430600');
INSERT INTO `china` VALUES ('430700', '常德市', '430000');
INSERT INTO `china` VALUES ('430702', '武陵区', '430700');
INSERT INTO `china` VALUES ('430703', '鼎城区', '430700');
INSERT INTO `china` VALUES ('430721', '安乡县', '430700');
INSERT INTO `china` VALUES ('430722', '汉寿县', '430700');
INSERT INTO `china` VALUES ('430723', '澧县', '430700');
INSERT INTO `china` VALUES ('430724', '临澧县', '430700');
INSERT INTO `china` VALUES ('430725', '桃源县', '430700');
INSERT INTO `china` VALUES ('430726', '石门县', '430700');
INSERT INTO `china` VALUES ('430781', '津市市', '430700');
INSERT INTO `china` VALUES ('430800', '张家界市', '430000');
INSERT INTO `china` VALUES ('430802', '永定区', '430800');
INSERT INTO `china` VALUES ('430811', '武陵源区', '430800');
INSERT INTO `china` VALUES ('430821', '慈利县', '430800');
INSERT INTO `china` VALUES ('430822', '桑植县', '430800');
INSERT INTO `china` VALUES ('430900', '益阳市', '430000');
INSERT INTO `china` VALUES ('430902', '资阳区', '430900');
INSERT INTO `china` VALUES ('430903', '赫山区', '430900');
INSERT INTO `china` VALUES ('430921', '南县', '430900');
INSERT INTO `china` VALUES ('430922', '桃江县', '430900');
INSERT INTO `china` VALUES ('430923', '安化县', '430900');
INSERT INTO `china` VALUES ('430981', '沅江市', '430900');
INSERT INTO `china` VALUES ('431000', '郴州市', '430000');
INSERT INTO `china` VALUES ('431002', '北湖区', '431000');
INSERT INTO `china` VALUES ('431003', '苏仙区', '431000');
INSERT INTO `china` VALUES ('431021', '桂阳县', '431000');
INSERT INTO `china` VALUES ('431022', '宜章县', '431000');
INSERT INTO `china` VALUES ('431023', '永兴县', '431000');
INSERT INTO `china` VALUES ('431024', '嘉禾县', '431000');
INSERT INTO `china` VALUES ('431025', '临武县', '431000');
INSERT INTO `china` VALUES ('431026', '汝城县', '431000');
INSERT INTO `china` VALUES ('431027', '桂东县', '431000');
INSERT INTO `china` VALUES ('431028', '安仁县', '431000');
INSERT INTO `china` VALUES ('431081', '资兴市', '431000');
INSERT INTO `china` VALUES ('431100', '永州市', '430000');
INSERT INTO `china` VALUES ('431102', '零陵区', '431100');
INSERT INTO `china` VALUES ('431103', '冷水滩区', '431100');
INSERT INTO `china` VALUES ('431121', '祁阳县', '431100');
INSERT INTO `china` VALUES ('431122', '东安县', '431100');
INSERT INTO `china` VALUES ('431123', '双牌县', '431100');
INSERT INTO `china` VALUES ('431124', '道县', '431100');
INSERT INTO `china` VALUES ('431125', '江永县', '431100');
INSERT INTO `china` VALUES ('431126', '宁远县', '431100');
INSERT INTO `china` VALUES ('431127', '蓝山县', '431100');
INSERT INTO `china` VALUES ('431128', '新田县', '431100');
INSERT INTO `china` VALUES ('431129', '江华瑶族自治县', '431100');
INSERT INTO `china` VALUES ('431200', '怀化市', '430000');
INSERT INTO `china` VALUES ('431202', '鹤城区', '431200');
INSERT INTO `china` VALUES ('431221', '中方县', '431200');
INSERT INTO `china` VALUES ('431222', '沅陵县', '431200');
INSERT INTO `china` VALUES ('431223', '辰溪县', '431200');
INSERT INTO `china` VALUES ('431224', '溆浦县', '431200');
INSERT INTO `china` VALUES ('431225', '会同县', '431200');
INSERT INTO `china` VALUES ('431226', '麻阳苗族自治县', '431200');
INSERT INTO `china` VALUES ('431227', '新晃侗族自治县', '431200');
INSERT INTO `china` VALUES ('431228', '芷江侗族自治县', '431200');
INSERT INTO `china` VALUES ('431229', '靖州苗族侗族自治县', '431200');
INSERT INTO `china` VALUES ('431230', '通道侗族自治县', '431200');
INSERT INTO `china` VALUES ('431281', '洪江市', '431200');
INSERT INTO `china` VALUES ('431300', '娄底市', '430000');
INSERT INTO `china` VALUES ('431302', '娄星区', '431300');
INSERT INTO `china` VALUES ('431321', '双峰县', '431300');
INSERT INTO `china` VALUES ('431322', '新化县', '431300');
INSERT INTO `china` VALUES ('431381', '冷水江市', '431300');
INSERT INTO `china` VALUES ('431382', '涟源市', '431300');
INSERT INTO `china` VALUES ('433100', '湘西土家族苗族自治州', '430000');
INSERT INTO `china` VALUES ('433101', '吉首市', '433100');
INSERT INTO `china` VALUES ('433122', '泸溪县', '433100');
INSERT INTO `china` VALUES ('433123', '凤凰县', '433100');
INSERT INTO `china` VALUES ('433124', '花垣县', '433100');
INSERT INTO `china` VALUES ('433125', '保靖县', '433100');
INSERT INTO `china` VALUES ('433126', '古丈县', '433100');
INSERT INTO `china` VALUES ('433127', '永顺县', '433100');
INSERT INTO `china` VALUES ('433130', '龙山县', '433100');
INSERT INTO `china` VALUES ('440000', '广东省', '0');
INSERT INTO `china` VALUES ('440100', '广州市', '440000');
INSERT INTO `china` VALUES ('440103', '荔湾区', '440100');
INSERT INTO `china` VALUES ('440104', '越秀区', '440100');
INSERT INTO `china` VALUES ('440105', '海珠区', '440100');
INSERT INTO `china` VALUES ('440106', '天河区', '440100');
INSERT INTO `china` VALUES ('440111', '白云区', '440100');
INSERT INTO `china` VALUES ('440112', '黄埔区', '440100');
INSERT INTO `china` VALUES ('440113', '番禺区', '440100');
INSERT INTO `china` VALUES ('440114', '花都区', '440100');
INSERT INTO `china` VALUES ('440115', '南沙区', '440100');
INSERT INTO `china` VALUES ('440117', '从化区', '440100');
INSERT INTO `china` VALUES ('440118', '增城区', '440100');
INSERT INTO `china` VALUES ('440200', '韶关市', '440000');
INSERT INTO `china` VALUES ('440203', '武江区', '440200');
INSERT INTO `china` VALUES ('440204', '浈江区', '440200');
INSERT INTO `china` VALUES ('440205', '曲江区', '440200');
INSERT INTO `china` VALUES ('440222', '始兴县', '440200');
INSERT INTO `china` VALUES ('440224', '仁化县', '440200');
INSERT INTO `china` VALUES ('440229', '翁源县', '440200');
INSERT INTO `china` VALUES ('440232', '乳源瑶族自治县', '440200');
INSERT INTO `china` VALUES ('440233', '新丰县', '440200');
INSERT INTO `china` VALUES ('440281', '乐昌市', '440200');
INSERT INTO `china` VALUES ('440282', '南雄市', '440200');
INSERT INTO `china` VALUES ('440300', '深圳市', '440000');
INSERT INTO `china` VALUES ('440303', '罗湖区', '440300');
INSERT INTO `china` VALUES ('440304', '福田区', '440300');
INSERT INTO `china` VALUES ('440305', '南山区', '440300');
INSERT INTO `china` VALUES ('440306', '宝安区', '440300');
INSERT INTO `china` VALUES ('440307', '龙岗区', '440300');
INSERT INTO `china` VALUES ('440308', '盐田区', '440300');
INSERT INTO `china` VALUES ('440390', '坪山新区', '440300');
INSERT INTO `china` VALUES ('440391', '光明新区', '440300');
INSERT INTO `china` VALUES ('440392', '大鹏新区', '440300');
INSERT INTO `china` VALUES ('440393', '龙华新区', '440300');
INSERT INTO `china` VALUES ('440400', '珠海市', '440000');
INSERT INTO `china` VALUES ('440402', '香洲区', '440400');
INSERT INTO `china` VALUES ('440403', '斗门区', '440400');
INSERT INTO `china` VALUES ('440404', '金湾区', '440400');
INSERT INTO `china` VALUES ('440500', '汕头市', '440000');
INSERT INTO `china` VALUES ('440507', '龙湖区', '440500');
INSERT INTO `china` VALUES ('440511', '金平区', '440500');
INSERT INTO `china` VALUES ('440512', '濠江区', '440500');
INSERT INTO `china` VALUES ('440513', '潮阳区', '440500');
INSERT INTO `china` VALUES ('440514', '潮南区', '440500');
INSERT INTO `china` VALUES ('440515', '澄海区', '440500');
INSERT INTO `china` VALUES ('440523', '南澳县', '440500');
INSERT INTO `china` VALUES ('440600', '佛山市', '440000');
INSERT INTO `china` VALUES ('440604', '禅城区', '440600');
INSERT INTO `china` VALUES ('440605', '南海区', '440600');
INSERT INTO `china` VALUES ('440606', '顺德区', '440600');
INSERT INTO `china` VALUES ('440607', '三水区', '440600');
INSERT INTO `china` VALUES ('440608', '高明区', '440600');
INSERT INTO `china` VALUES ('440700', '江门市', '440000');
INSERT INTO `china` VALUES ('440703', '蓬江区', '440700');
INSERT INTO `china` VALUES ('440704', '江海区', '440700');
INSERT INTO `china` VALUES ('440705', '新会区', '440700');
INSERT INTO `china` VALUES ('440781', '台山市', '440700');
INSERT INTO `china` VALUES ('440783', '开平市', '440700');
INSERT INTO `china` VALUES ('440784', '鹤山市', '440700');
INSERT INTO `china` VALUES ('440785', '恩平市', '440700');
INSERT INTO `china` VALUES ('440800', '湛江市', '440000');
INSERT INTO `china` VALUES ('440802', '赤坎区', '440800');
INSERT INTO `china` VALUES ('440803', '霞山区', '440800');
INSERT INTO `china` VALUES ('440804', '坡头区', '440800');
INSERT INTO `china` VALUES ('440811', '麻章区', '440800');
INSERT INTO `china` VALUES ('440823', '遂溪县', '440800');
INSERT INTO `china` VALUES ('440825', '徐闻县', '440800');
INSERT INTO `china` VALUES ('440881', '廉江市', '440800');
INSERT INTO `china` VALUES ('440882', '雷州市', '440800');
INSERT INTO `china` VALUES ('440883', '吴川市', '440800');
INSERT INTO `china` VALUES ('440890', '经济技术开发区', '440800');
INSERT INTO `china` VALUES ('440900', '茂名市', '440000');
INSERT INTO `china` VALUES ('440902', '茂南区', '440900');
INSERT INTO `china` VALUES ('440904', '电白区', '440900');
INSERT INTO `china` VALUES ('440981', '高州市', '440900');
INSERT INTO `china` VALUES ('440982', '化州市', '440900');
INSERT INTO `china` VALUES ('440983', '信宜市', '440900');
INSERT INTO `china` VALUES ('441200', '肇庆市', '440000');
INSERT INTO `china` VALUES ('441202', '端州区', '441200');
INSERT INTO `china` VALUES ('441203', '鼎湖区', '441200');
INSERT INTO `china` VALUES ('441204', '高要区', '441200');
INSERT INTO `china` VALUES ('441223', '广宁县', '441200');
INSERT INTO `china` VALUES ('441224', '怀集县', '441200');
INSERT INTO `china` VALUES ('441225', '封开县', '441200');
INSERT INTO `china` VALUES ('441226', '德庆县', '441200');
INSERT INTO `china` VALUES ('441284', '四会市', '441200');
INSERT INTO `china` VALUES ('441300', '惠州市', '440000');
INSERT INTO `china` VALUES ('441302', '惠城区', '441300');
INSERT INTO `china` VALUES ('441303', '惠阳区', '441300');
INSERT INTO `china` VALUES ('441322', '博罗县', '441300');
INSERT INTO `china` VALUES ('441323', '惠东县', '441300');
INSERT INTO `china` VALUES ('441324', '龙门县', '441300');
INSERT INTO `china` VALUES ('441400', '梅州市', '440000');
INSERT INTO `china` VALUES ('441402', '梅江区', '441400');
INSERT INTO `china` VALUES ('441403', '梅县区', '441400');
INSERT INTO `china` VALUES ('441422', '大埔县', '441400');
INSERT INTO `china` VALUES ('441423', '丰顺县', '441400');
INSERT INTO `china` VALUES ('441424', '五华县', '441400');
INSERT INTO `china` VALUES ('441426', '平远县', '441400');
INSERT INTO `china` VALUES ('441427', '蕉岭县', '441400');
INSERT INTO `china` VALUES ('441481', '兴宁市', '441400');
INSERT INTO `china` VALUES ('441500', '汕尾市', '440000');
INSERT INTO `china` VALUES ('441502', '城区', '441500');
INSERT INTO `china` VALUES ('441521', '海丰县', '441500');
INSERT INTO `china` VALUES ('441523', '陆河县', '441500');
INSERT INTO `china` VALUES ('441581', '陆丰市', '441500');
INSERT INTO `china` VALUES ('441600', '河源市', '440000');
INSERT INTO `china` VALUES ('441602', '源城区', '441600');
INSERT INTO `china` VALUES ('441621', '紫金县', '441600');
INSERT INTO `china` VALUES ('441622', '龙川县', '441600');
INSERT INTO `china` VALUES ('441623', '连平县', '441600');
INSERT INTO `china` VALUES ('441624', '和平县', '441600');
INSERT INTO `china` VALUES ('441625', '东源县', '441600');
INSERT INTO `china` VALUES ('441700', '阳江市', '440000');
INSERT INTO `china` VALUES ('441702', '江城区', '441700');
INSERT INTO `china` VALUES ('441704', '阳东区', '441700');
INSERT INTO `china` VALUES ('441721', '阳西县', '441700');
INSERT INTO `china` VALUES ('441781', '阳春市', '441700');
INSERT INTO `china` VALUES ('441800', '清远市', '440000');
INSERT INTO `china` VALUES ('441802', '清城区', '441800');
INSERT INTO `china` VALUES ('441803', '清新区', '441800');
INSERT INTO `china` VALUES ('441821', '佛冈县', '441800');
INSERT INTO `china` VALUES ('441823', '阳山县', '441800');
INSERT INTO `china` VALUES ('441825', '连山壮族瑶族自治县', '441800');
INSERT INTO `china` VALUES ('441826', '连南瑶族自治县', '441800');
INSERT INTO `china` VALUES ('441881', '英德市', '441800');
INSERT INTO `china` VALUES ('441882', '连州市', '441800');
INSERT INTO `china` VALUES ('441900', '东莞市', '440000');
INSERT INTO `china` VALUES ('441901', '中堂镇', '441900');
INSERT INTO `china` VALUES ('441903', '南城区', '441900');
INSERT INTO `china` VALUES ('441904', '长安镇', '441900');
INSERT INTO `china` VALUES ('441905', '东坑镇', '441900');
INSERT INTO `china` VALUES ('441906', '樟木头镇', '441900');
INSERT INTO `china` VALUES ('441907', '莞城区', '441900');
INSERT INTO `china` VALUES ('441908', '石龙镇', '441900');
INSERT INTO `china` VALUES ('441909', '桥头镇', '441900');
INSERT INTO `china` VALUES ('441910', '万江区', '441900');
INSERT INTO `china` VALUES ('441911', '麻涌镇', '441900');
INSERT INTO `china` VALUES ('441912', '虎门镇', '441900');
INSERT INTO `china` VALUES ('441913', '谢岗镇', '441900');
INSERT INTO `china` VALUES ('441914', '石碣镇', '441900');
INSERT INTO `china` VALUES ('441915', '茶山镇', '441900');
INSERT INTO `china` VALUES ('441916', '东城区', '441900');
INSERT INTO `china` VALUES ('441917', '洪梅镇', '441900');
INSERT INTO `china` VALUES ('441918', '道滘镇', '441900');
INSERT INTO `china` VALUES ('441919', '高埗镇', '441900');
INSERT INTO `china` VALUES ('441920', '企石镇', '441900');
INSERT INTO `china` VALUES ('441921', '凤岗镇', '441900');
INSERT INTO `china` VALUES ('441922', '大岭山镇', '441900');
INSERT INTO `china` VALUES ('441923', '松山湖', '441900');
INSERT INTO `china` VALUES ('441924', '清溪镇', '441900');
INSERT INTO `china` VALUES ('441925', '望牛墩镇', '441900');
INSERT INTO `china` VALUES ('441926', '厚街镇', '441900');
INSERT INTO `china` VALUES ('441927', '常平镇', '441900');
INSERT INTO `china` VALUES ('441928', '寮步镇', '441900');
INSERT INTO `china` VALUES ('441929', '石排镇', '441900');
INSERT INTO `china` VALUES ('441930', '横沥镇', '441900');
INSERT INTO `china` VALUES ('441931', '塘厦镇', '441900');
INSERT INTO `china` VALUES ('441932', '黄江镇', '441900');
INSERT INTO `china` VALUES ('441933', '大朗镇', '441900');
INSERT INTO `china` VALUES ('441990', '沙田镇', '441900');
INSERT INTO `china` VALUES ('442000', '中山市', '440000');
INSERT INTO `china` VALUES ('442001', '南头镇', '442000');
INSERT INTO `china` VALUES ('442002', '神湾镇', '442000');
INSERT INTO `china` VALUES ('442003', '东凤镇', '442000');
INSERT INTO `china` VALUES ('442004', '五桂山镇', '442000');
INSERT INTO `china` VALUES ('442005', '黄圃镇', '442000');
INSERT INTO `china` VALUES ('442006', '小榄镇', '442000');
INSERT INTO `china` VALUES ('442007', '石岐区街道', '442000');
INSERT INTO `china` VALUES ('442008', '横栏镇', '442000');
INSERT INTO `china` VALUES ('442009', '三角镇', '442000');
INSERT INTO `china` VALUES ('442010', '三乡镇', '442000');
INSERT INTO `china` VALUES ('442011', '港口镇', '442000');
INSERT INTO `china` VALUES ('442012', '沙溪镇', '442000');
INSERT INTO `china` VALUES ('442013', '板芙镇', '442000');
INSERT INTO `china` VALUES ('442014', '沙朗镇', '442000');
INSERT INTO `china` VALUES ('442015', '东升镇', '442000');
INSERT INTO `china` VALUES ('442016', '阜沙镇', '442000');
INSERT INTO `china` VALUES ('442017', '民众镇', '442000');
INSERT INTO `china` VALUES ('442018', '东区街道', '442000');
INSERT INTO `china` VALUES ('442019', '火炬开发区', '442000');
INSERT INTO `china` VALUES ('442020', '西区街道', '442000');
INSERT INTO `china` VALUES ('442021', '南区街道', '442000');
INSERT INTO `china` VALUES ('442022', '古镇', '442000');
INSERT INTO `china` VALUES ('442023', '坦洲镇', '442000');
INSERT INTO `china` VALUES ('442024', '大涌镇', '442000');
INSERT INTO `china` VALUES ('442025', '南朗镇', '442000');
INSERT INTO `china` VALUES ('445100', '潮州市', '440000');
INSERT INTO `china` VALUES ('445102', '湘桥区', '445100');
INSERT INTO `china` VALUES ('445103', '潮安区', '445100');
INSERT INTO `china` VALUES ('445122', '饶平县', '445100');
INSERT INTO `china` VALUES ('445190', '枫溪区', '445100');
INSERT INTO `china` VALUES ('445200', '揭阳市', '440000');
INSERT INTO `china` VALUES ('445202', '榕城区', '445200');
INSERT INTO `china` VALUES ('445203', '揭东区', '445200');
INSERT INTO `china` VALUES ('445222', '揭西县', '445200');
INSERT INTO `china` VALUES ('445224', '惠来县', '445200');
INSERT INTO `china` VALUES ('445281', '普宁市', '445200');
INSERT INTO `china` VALUES ('445300', '云浮市', '440000');
INSERT INTO `china` VALUES ('445302', '云城区', '445300');
INSERT INTO `china` VALUES ('445303', '云安区', '445300');
INSERT INTO `china` VALUES ('445321', '新兴县', '445300');
INSERT INTO `china` VALUES ('445322', '郁南县', '445300');
INSERT INTO `china` VALUES ('445381', '罗定市', '445300');
INSERT INTO `china` VALUES ('450000', '广西壮族自治区', '0');
INSERT INTO `china` VALUES ('450100', '南宁市', '450000');
INSERT INTO `china` VALUES ('450102', '兴宁区', '450100');
INSERT INTO `china` VALUES ('450103', '青秀区', '450100');
INSERT INTO `china` VALUES ('450105', '江南区', '450100');
INSERT INTO `china` VALUES ('450107', '西乡塘区', '450100');
INSERT INTO `china` VALUES ('450108', '良庆区', '450100');
INSERT INTO `china` VALUES ('450109', '邕宁区', '450100');
INSERT INTO `china` VALUES ('450110', '武鸣区', '450100');
INSERT INTO `china` VALUES ('450123', '隆安县', '450100');
INSERT INTO `china` VALUES ('450124', '马山县', '450100');
INSERT INTO `china` VALUES ('450125', '上林县', '450100');
INSERT INTO `china` VALUES ('450126', '宾阳县', '450100');
INSERT INTO `china` VALUES ('450127', '横县', '450100');
INSERT INTO `china` VALUES ('450200', '柳州市', '450000');
INSERT INTO `china` VALUES ('450202', '城中区', '450200');
INSERT INTO `china` VALUES ('450203', '鱼峰区', '450200');
INSERT INTO `china` VALUES ('450204', '柳南区', '450200');
INSERT INTO `china` VALUES ('450205', '柳北区', '450200');
INSERT INTO `china` VALUES ('450221', '柳江县', '450200');
INSERT INTO `china` VALUES ('450222', '柳城县', '450200');
INSERT INTO `china` VALUES ('450223', '鹿寨县', '450200');
INSERT INTO `china` VALUES ('450224', '融安县', '450200');
INSERT INTO `china` VALUES ('450225', '融水苗族自治县', '450200');
INSERT INTO `china` VALUES ('450226', '三江侗族自治县', '450200');
INSERT INTO `china` VALUES ('450300', '桂林市', '450000');
INSERT INTO `china` VALUES ('450302', '秀峰区', '450300');
INSERT INTO `china` VALUES ('450303', '叠彩区', '450300');
INSERT INTO `china` VALUES ('450304', '象山区', '450300');
INSERT INTO `china` VALUES ('450305', '七星区', '450300');
INSERT INTO `china` VALUES ('450311', '雁山区', '450300');
INSERT INTO `china` VALUES ('450312', '临桂区', '450300');
INSERT INTO `china` VALUES ('450321', '阳朔县', '450300');
INSERT INTO `china` VALUES ('450323', '灵川县', '450300');
INSERT INTO `china` VALUES ('450324', '全州县', '450300');
INSERT INTO `china` VALUES ('450325', '兴安县', '450300');
INSERT INTO `china` VALUES ('450326', '永福县', '450300');
INSERT INTO `china` VALUES ('450327', '灌阳县', '450300');
INSERT INTO `china` VALUES ('450328', '龙胜各族自治县', '450300');
INSERT INTO `china` VALUES ('450329', '资源县', '450300');
INSERT INTO `china` VALUES ('450330', '平乐县', '450300');
INSERT INTO `china` VALUES ('450331', '荔浦县', '450300');
INSERT INTO `china` VALUES ('450332', '恭城瑶族自治县', '450300');
INSERT INTO `china` VALUES ('450400', '梧州市', '450000');
INSERT INTO `china` VALUES ('450403', '万秀区', '450400');
INSERT INTO `china` VALUES ('450405', '长洲区', '450400');
INSERT INTO `china` VALUES ('450406', '龙圩区', '450400');
INSERT INTO `china` VALUES ('450421', '苍梧县', '450400');
INSERT INTO `china` VALUES ('450422', '藤县', '450400');
INSERT INTO `china` VALUES ('450423', '蒙山县', '450400');
INSERT INTO `china` VALUES ('450481', '岑溪市', '450400');
INSERT INTO `china` VALUES ('450500', '北海市', '450000');
INSERT INTO `china` VALUES ('450502', '海城区', '450500');
INSERT INTO `china` VALUES ('450503', '银海区', '450500');
INSERT INTO `china` VALUES ('450512', '铁山港区', '450500');
INSERT INTO `china` VALUES ('450521', '合浦县', '450500');
INSERT INTO `china` VALUES ('450600', '防城港市', '450000');
INSERT INTO `china` VALUES ('450602', '港口区', '450600');
INSERT INTO `china` VALUES ('450603', '防城区', '450600');
INSERT INTO `china` VALUES ('450621', '上思县', '450600');
INSERT INTO `china` VALUES ('450681', '东兴市', '450600');
INSERT INTO `china` VALUES ('450700', '钦州市', '450000');
INSERT INTO `china` VALUES ('450702', '钦南区', '450700');
INSERT INTO `china` VALUES ('450703', '钦北区', '450700');
INSERT INTO `china` VALUES ('450721', '灵山县', '450700');
INSERT INTO `china` VALUES ('450722', '浦北县', '450700');
INSERT INTO `china` VALUES ('450800', '贵港市', '450000');
INSERT INTO `china` VALUES ('450802', '港北区', '450800');
INSERT INTO `china` VALUES ('450803', '港南区', '450800');
INSERT INTO `china` VALUES ('450804', '覃塘区', '450800');
INSERT INTO `china` VALUES ('450821', '平南县', '450800');
INSERT INTO `china` VALUES ('450881', '桂平市', '450800');
INSERT INTO `china` VALUES ('450900', '玉林市', '450000');
INSERT INTO `china` VALUES ('450902', '玉州区', '450900');
INSERT INTO `china` VALUES ('450903', '福绵区', '450900');
INSERT INTO `china` VALUES ('450921', '容县', '450900');
INSERT INTO `china` VALUES ('450922', '陆川县', '450900');
INSERT INTO `china` VALUES ('450923', '博白县', '450900');
INSERT INTO `china` VALUES ('450924', '兴业县', '450900');
INSERT INTO `china` VALUES ('450981', '北流市', '450900');
INSERT INTO `china` VALUES ('451000', '百色市', '450000');
INSERT INTO `china` VALUES ('451002', '右江区', '451000');
INSERT INTO `china` VALUES ('451021', '田阳县', '451000');
INSERT INTO `china` VALUES ('451022', '田东县', '451000');
INSERT INTO `china` VALUES ('451023', '平果县', '451000');
INSERT INTO `china` VALUES ('451024', '德保县', '451000');
INSERT INTO `china` VALUES ('451026', '那坡县', '451000');
INSERT INTO `china` VALUES ('451027', '凌云县', '451000');
INSERT INTO `china` VALUES ('451028', '乐业县', '451000');
INSERT INTO `china` VALUES ('451029', '田林县', '451000');
INSERT INTO `china` VALUES ('451030', '西林县', '451000');
INSERT INTO `china` VALUES ('451031', '隆林各族自治县', '451000');
INSERT INTO `china` VALUES ('451081', '靖西市', '451000');
INSERT INTO `china` VALUES ('451100', '贺州市', '450000');
INSERT INTO `china` VALUES ('451102', '八步区', '451100');
INSERT INTO `china` VALUES ('451121', '昭平县', '451100');
INSERT INTO `china` VALUES ('451122', '钟山县', '451100');
INSERT INTO `china` VALUES ('451123', '富川瑶族自治县', '451100');
INSERT INTO `china` VALUES ('451200', '河池市', '450000');
INSERT INTO `china` VALUES ('451202', '金城江区', '451200');
INSERT INTO `china` VALUES ('451221', '南丹县', '451200');
INSERT INTO `china` VALUES ('451222', '天峨县', '451200');
INSERT INTO `china` VALUES ('451223', '凤山县', '451200');
INSERT INTO `china` VALUES ('451224', '东兰县', '451200');
INSERT INTO `china` VALUES ('451225', '罗城仫佬族自治县', '451200');
INSERT INTO `china` VALUES ('451226', '环江毛南族自治县', '451200');
INSERT INTO `china` VALUES ('451227', '巴马瑶族自治县', '451200');
INSERT INTO `china` VALUES ('451228', '都安瑶族自治县', '451200');
INSERT INTO `china` VALUES ('451229', '大化瑶族自治县', '451200');
INSERT INTO `china` VALUES ('451281', '宜州市', '451200');
INSERT INTO `china` VALUES ('451300', '来宾市', '450000');
INSERT INTO `china` VALUES ('451302', '兴宾区', '451300');
INSERT INTO `china` VALUES ('451321', '忻城县', '451300');
INSERT INTO `china` VALUES ('451322', '象州县', '451300');
INSERT INTO `china` VALUES ('451323', '武宣县', '451300');
INSERT INTO `china` VALUES ('451324', '金秀瑶族自治县', '451300');
INSERT INTO `china` VALUES ('451381', '合山市', '451300');
INSERT INTO `china` VALUES ('451400', '崇左市', '450000');
INSERT INTO `china` VALUES ('451402', '江州区', '451400');
INSERT INTO `china` VALUES ('451421', '扶绥县', '451400');
INSERT INTO `china` VALUES ('451422', '宁明县', '451400');
INSERT INTO `china` VALUES ('451423', '龙州县', '451400');
INSERT INTO `china` VALUES ('451424', '大新县', '451400');
INSERT INTO `china` VALUES ('451425', '天等县', '451400');
INSERT INTO `china` VALUES ('451481', '凭祥市', '451400');
INSERT INTO `china` VALUES ('460000', '海南省', '0');
INSERT INTO `china` VALUES ('460100', '海口市', '460000');
INSERT INTO `china` VALUES ('460105', '秀英区', '460100');
INSERT INTO `china` VALUES ('460106', '龙华区', '460100');
INSERT INTO `china` VALUES ('460107', '琼山区', '460100');
INSERT INTO `china` VALUES ('460108', '美兰区', '460100');
INSERT INTO `china` VALUES ('460200', '三亚市', '460000');
INSERT INTO `china` VALUES ('460202', '海棠区', '460200');
INSERT INTO `china` VALUES ('460203', '吉阳区', '460200');
INSERT INTO `china` VALUES ('460204', '天涯区', '460200');
INSERT INTO `china` VALUES ('460205', '崖州区', '460200');
INSERT INTO `china` VALUES ('460300', '三沙市', '460000');
INSERT INTO `china` VALUES ('460321', '西沙群岛', '460300');
INSERT INTO `china` VALUES ('460322', '南沙群岛', '460300');
INSERT INTO `china` VALUES ('460323', '中沙群岛的岛礁及其海域', '460300');
INSERT INTO `china` VALUES ('469000', '省直辖县', '460000');
INSERT INTO `china` VALUES ('469001', '五指山市', '469000');
INSERT INTO `china` VALUES ('469002', '琼海市', '469000');
INSERT INTO `china` VALUES ('469003', '儋州市', '469000');
INSERT INTO `china` VALUES ('469005', '文昌市', '469000');
INSERT INTO `china` VALUES ('469006', '万宁市', '469000');
INSERT INTO `china` VALUES ('469007', '东方市', '469000');
INSERT INTO `china` VALUES ('469021', '定安县', '469000');
INSERT INTO `china` VALUES ('469022', '屯昌县', '469000');
INSERT INTO `china` VALUES ('469023', '澄迈县', '469000');
INSERT INTO `china` VALUES ('469024', '临高县', '469000');
INSERT INTO `china` VALUES ('469025', '白沙黎族自治县', '469000');
INSERT INTO `china` VALUES ('469026', '昌江黎族自治县', '469000');
INSERT INTO `china` VALUES ('469027', '乐东黎族自治县', '469000');
INSERT INTO `china` VALUES ('469028', '陵水黎族自治县', '469000');
INSERT INTO `china` VALUES ('469029', '保亭黎族苗族自治县', '469000');
INSERT INTO `china` VALUES ('469030', '琼中黎族苗族自治县', '469000');
INSERT INTO `china` VALUES ('500000', '重庆市', '0');
INSERT INTO `china` VALUES ('500100', '重庆市', '500000');
INSERT INTO `china` VALUES ('500101', '万州区', '500100');
INSERT INTO `china` VALUES ('500102', '涪陵区', '500100');
INSERT INTO `china` VALUES ('500103', '渝中区', '500100');
INSERT INTO `china` VALUES ('500104', '大渡口区', '500100');
INSERT INTO `china` VALUES ('500105', '江北区', '500100');
INSERT INTO `china` VALUES ('500106', '沙坪坝区', '500100');
INSERT INTO `china` VALUES ('500107', '九龙坡区', '500100');
INSERT INTO `china` VALUES ('500108', '南岸区', '500100');
INSERT INTO `china` VALUES ('500109', '北碚区', '500100');
INSERT INTO `china` VALUES ('500110', '綦江区', '500100');
INSERT INTO `china` VALUES ('500111', '大足区', '500100');
INSERT INTO `china` VALUES ('500112', '渝北区', '500100');
INSERT INTO `china` VALUES ('500113', '巴南区', '500100');
INSERT INTO `china` VALUES ('500114', '黔江区', '500100');
INSERT INTO `china` VALUES ('500115', '长寿区', '500100');
INSERT INTO `china` VALUES ('500116', '江津区', '500100');
INSERT INTO `china` VALUES ('500117', '合川区', '500100');
INSERT INTO `china` VALUES ('500118', '永川区', '500100');
INSERT INTO `china` VALUES ('500119', '南川区', '500100');
INSERT INTO `china` VALUES ('500120', '璧山区', '500100');
INSERT INTO `china` VALUES ('500151', '铜梁区', '500100');
INSERT INTO `china` VALUES ('500152', '潼南区', '500100');
INSERT INTO `china` VALUES ('500153', '荣昌区', '500100');
INSERT INTO `china` VALUES ('500200', '县', '500000');
INSERT INTO `china` VALUES ('500228', '梁平县', '500200');
INSERT INTO `china` VALUES ('500229', '城口县', '500200');
INSERT INTO `china` VALUES ('500230', '丰都县', '500200');
INSERT INTO `china` VALUES ('500231', '垫江县', '500200');
INSERT INTO `china` VALUES ('500232', '武隆县', '500200');
INSERT INTO `china` VALUES ('500233', '忠县', '500200');
INSERT INTO `china` VALUES ('500234', '开县', '500200');
INSERT INTO `china` VALUES ('500235', '云阳县', '500200');
INSERT INTO `china` VALUES ('500236', '奉节县', '500200');
INSERT INTO `china` VALUES ('500237', '巫山县', '500200');
INSERT INTO `china` VALUES ('500238', '巫溪县', '500200');
INSERT INTO `china` VALUES ('500240', '石柱土家族自治县', '500200');
INSERT INTO `china` VALUES ('500241', '秀山土家族苗族自治县', '500200');
INSERT INTO `china` VALUES ('500242', '酉阳土家族苗族自治县', '500200');
INSERT INTO `china` VALUES ('500243', '彭水苗族土家族自治县', '500200');
INSERT INTO `china` VALUES ('510000', '四川省', '0');
INSERT INTO `china` VALUES ('510100', '成都市', '510000');
INSERT INTO `china` VALUES ('510104', '锦江区', '510100');
INSERT INTO `china` VALUES ('510105', '青羊区', '510100');
INSERT INTO `china` VALUES ('510106', '金牛区', '510100');
INSERT INTO `china` VALUES ('510107', '武侯区', '510100');
INSERT INTO `china` VALUES ('510108', '成华区', '510100');
INSERT INTO `china` VALUES ('510112', '龙泉驿区', '510100');
INSERT INTO `china` VALUES ('510113', '青白江区', '510100');
INSERT INTO `china` VALUES ('510114', '新都区', '510100');
INSERT INTO `china` VALUES ('510115', '温江区', '510100');
INSERT INTO `china` VALUES ('510121', '金堂县', '510100');
INSERT INTO `china` VALUES ('510122', '双流县', '510100');
INSERT INTO `china` VALUES ('510124', '郫县', '510100');
INSERT INTO `china` VALUES ('510129', '大邑县', '510100');
INSERT INTO `china` VALUES ('510131', '蒲江县', '510100');
INSERT INTO `china` VALUES ('510132', '新津县', '510100');
INSERT INTO `china` VALUES ('510181', '都江堰市', '510100');
INSERT INTO `china` VALUES ('510182', '彭州市', '510100');
INSERT INTO `china` VALUES ('510183', '邛崃市', '510100');
INSERT INTO `china` VALUES ('510184', '崇州市', '510100');
INSERT INTO `china` VALUES ('510190', '高新西区', '510100');
INSERT INTO `china` VALUES ('510191', '高新区', '510100');
INSERT INTO `china` VALUES ('510300', '自贡市', '510000');
INSERT INTO `china` VALUES ('510302', '自流井区', '510300');
INSERT INTO `china` VALUES ('510303', '贡井区', '510300');
INSERT INTO `china` VALUES ('510304', '大安区', '510300');
INSERT INTO `china` VALUES ('510311', '沿滩区', '510300');
INSERT INTO `china` VALUES ('510321', '荣县', '510300');
INSERT INTO `china` VALUES ('510322', '富顺县', '510300');
INSERT INTO `china` VALUES ('510400', '攀枝花市', '510000');
INSERT INTO `china` VALUES ('510402', '东区', '510400');
INSERT INTO `china` VALUES ('510403', '西区', '510400');
INSERT INTO `china` VALUES ('510411', '仁和区', '510400');
INSERT INTO `china` VALUES ('510421', '米易县', '510400');
INSERT INTO `china` VALUES ('510422', '盐边县', '510400');
INSERT INTO `china` VALUES ('510500', '泸州市', '510000');
INSERT INTO `china` VALUES ('510502', '江阳区', '510500');
INSERT INTO `china` VALUES ('510503', '纳溪区', '510500');
INSERT INTO `china` VALUES ('510504', '龙马潭区', '510500');
INSERT INTO `china` VALUES ('510521', '泸县', '510500');
INSERT INTO `china` VALUES ('510522', '合江县', '510500');
INSERT INTO `china` VALUES ('510524', '叙永县', '510500');
INSERT INTO `china` VALUES ('510525', '古蔺县', '510500');
INSERT INTO `china` VALUES ('510600', '德阳市', '510000');
INSERT INTO `china` VALUES ('510603', '旌阳区', '510600');
INSERT INTO `china` VALUES ('510623', '中江县', '510600');
INSERT INTO `china` VALUES ('510626', '罗江县', '510600');
INSERT INTO `china` VALUES ('510681', '广汉市', '510600');
INSERT INTO `china` VALUES ('510682', '什邡市', '510600');
INSERT INTO `china` VALUES ('510683', '绵竹市', '510600');
INSERT INTO `china` VALUES ('510700', '绵阳市', '510000');
INSERT INTO `china` VALUES ('510703', '涪城区', '510700');
INSERT INTO `china` VALUES ('510704', '游仙区', '510700');
INSERT INTO `china` VALUES ('510722', '三台县', '510700');
INSERT INTO `china` VALUES ('510723', '盐亭县', '510700');
INSERT INTO `china` VALUES ('510724', '安县', '510700');
INSERT INTO `china` VALUES ('510725', '梓潼县', '510700');
INSERT INTO `china` VALUES ('510726', '北川羌族自治县', '510700');
INSERT INTO `china` VALUES ('510727', '平武县', '510700');
INSERT INTO `china` VALUES ('510781', '江油市', '510700');
INSERT INTO `china` VALUES ('510790', '经开区', '510700');
INSERT INTO `china` VALUES ('510791', '高新区', '510700');
INSERT INTO `china` VALUES ('510800', '广元市', '510000');
INSERT INTO `china` VALUES ('510802', '利州区', '510800');
INSERT INTO `china` VALUES ('510811', '昭化区', '510800');
INSERT INTO `china` VALUES ('510812', '朝天区', '510800');
INSERT INTO `china` VALUES ('510821', '旺苍县', '510800');
INSERT INTO `china` VALUES ('510822', '青川县', '510800');
INSERT INTO `china` VALUES ('510823', '剑阁县', '510800');
INSERT INTO `china` VALUES ('510824', '苍溪县', '510800');
INSERT INTO `china` VALUES ('510900', '遂宁市', '510000');
INSERT INTO `china` VALUES ('510903', '船山区', '510900');
INSERT INTO `china` VALUES ('510904', '安居区', '510900');
INSERT INTO `china` VALUES ('510921', '蓬溪县', '510900');
INSERT INTO `china` VALUES ('510922', '射洪县', '510900');
INSERT INTO `china` VALUES ('510923', '大英县', '510900');
INSERT INTO `china` VALUES ('511000', '内江市', '510000');
INSERT INTO `china` VALUES ('511002', '市中区', '511000');
INSERT INTO `china` VALUES ('511011', '东兴区', '511000');
INSERT INTO `china` VALUES ('511024', '威远县', '511000');
INSERT INTO `china` VALUES ('511025', '资中县', '511000');
INSERT INTO `china` VALUES ('511028', '隆昌县', '511000');
INSERT INTO `china` VALUES ('511100', '乐山市', '510000');
INSERT INTO `china` VALUES ('511102', '市中区', '511100');
INSERT INTO `china` VALUES ('511111', '沙湾区', '511100');
INSERT INTO `china` VALUES ('511112', '五通桥区', '511100');
INSERT INTO `china` VALUES ('511113', '金口河区', '511100');
INSERT INTO `china` VALUES ('511123', '犍为县', '511100');
INSERT INTO `china` VALUES ('511124', '井研县', '511100');
INSERT INTO `china` VALUES ('511126', '夹江县', '511100');
INSERT INTO `china` VALUES ('511129', '沐川县', '511100');
INSERT INTO `china` VALUES ('511132', '峨边彝族自治县', '511100');
INSERT INTO `china` VALUES ('511133', '马边彝族自治县', '511100');
INSERT INTO `china` VALUES ('511181', '峨眉山市', '511100');
INSERT INTO `china` VALUES ('511300', '南充市', '510000');
INSERT INTO `china` VALUES ('511302', '顺庆区', '511300');
INSERT INTO `china` VALUES ('511303', '高坪区', '511300');
INSERT INTO `china` VALUES ('511304', '嘉陵区', '511300');
INSERT INTO `china` VALUES ('511321', '南部县', '511300');
INSERT INTO `china` VALUES ('511322', '营山县', '511300');
INSERT INTO `china` VALUES ('511323', '蓬安县', '511300');
INSERT INTO `china` VALUES ('511324', '仪陇县', '511300');
INSERT INTO `china` VALUES ('511325', '西充县', '511300');
INSERT INTO `china` VALUES ('511381', '阆中市', '511300');
INSERT INTO `china` VALUES ('511400', '眉山市', '510000');
INSERT INTO `china` VALUES ('511402', '东坡区', '511400');
INSERT INTO `china` VALUES ('511403', '彭山区', '511400');
INSERT INTO `china` VALUES ('511421', '仁寿县', '511400');
INSERT INTO `china` VALUES ('511423', '洪雅县', '511400');
INSERT INTO `china` VALUES ('511424', '丹棱县', '511400');
INSERT INTO `china` VALUES ('511425', '青神县', '511400');
INSERT INTO `china` VALUES ('511500', '宜宾市', '510000');
INSERT INTO `china` VALUES ('511502', '翠屏区', '511500');
INSERT INTO `china` VALUES ('511503', '南溪区', '511500');
INSERT INTO `china` VALUES ('511521', '宜宾县', '511500');
INSERT INTO `china` VALUES ('511523', '江安县', '511500');
INSERT INTO `china` VALUES ('511524', '长宁县', '511500');
INSERT INTO `china` VALUES ('511525', '高县', '511500');
INSERT INTO `china` VALUES ('511526', '珙县', '511500');
INSERT INTO `china` VALUES ('511527', '筠连县', '511500');
INSERT INTO `china` VALUES ('511528', '兴文县', '511500');
INSERT INTO `china` VALUES ('511529', '屏山县', '511500');
INSERT INTO `china` VALUES ('511600', '广安市', '510000');
INSERT INTO `china` VALUES ('511602', '广安区', '511600');
INSERT INTO `china` VALUES ('511603', '前锋区', '511600');
INSERT INTO `china` VALUES ('511621', '岳池县', '511600');
INSERT INTO `china` VALUES ('511622', '武胜县', '511600');
INSERT INTO `china` VALUES ('511623', '邻水县', '511600');
INSERT INTO `china` VALUES ('511681', '华蓥市', '511600');
INSERT INTO `china` VALUES ('511700', '达州市', '510000');
INSERT INTO `china` VALUES ('511702', '通川区', '511700');
INSERT INTO `china` VALUES ('511703', '达川区', '511700');
INSERT INTO `china` VALUES ('511722', '宣汉县', '511700');
INSERT INTO `china` VALUES ('511723', '开江县', '511700');
INSERT INTO `china` VALUES ('511724', '大竹县', '511700');
INSERT INTO `china` VALUES ('511725', '渠县', '511700');
INSERT INTO `china` VALUES ('511781', '万源市', '511700');
INSERT INTO `china` VALUES ('511800', '雅安市', '510000');
INSERT INTO `china` VALUES ('511802', '雨城区', '511800');
INSERT INTO `china` VALUES ('511803', '名山区', '511800');
INSERT INTO `china` VALUES ('511822', '荥经县', '511800');
INSERT INTO `china` VALUES ('511823', '汉源县', '511800');
INSERT INTO `china` VALUES ('511824', '石棉县', '511800');
INSERT INTO `china` VALUES ('511825', '天全县', '511800');
INSERT INTO `china` VALUES ('511826', '芦山县', '511800');
INSERT INTO `china` VALUES ('511827', '宝兴县', '511800');
INSERT INTO `china` VALUES ('511900', '巴中市', '510000');
INSERT INTO `china` VALUES ('511902', '巴州区', '511900');
INSERT INTO `china` VALUES ('511903', '恩阳区', '511900');
INSERT INTO `china` VALUES ('511921', '通江县', '511900');
INSERT INTO `china` VALUES ('511922', '南江县', '511900');
INSERT INTO `china` VALUES ('511923', '平昌县', '511900');
INSERT INTO `china` VALUES ('512000', '资阳市', '510000');
INSERT INTO `china` VALUES ('512002', '雁江区', '512000');
INSERT INTO `china` VALUES ('512021', '安岳县', '512000');
INSERT INTO `china` VALUES ('512022', '乐至县', '512000');
INSERT INTO `china` VALUES ('512081', '简阳市', '512000');
INSERT INTO `china` VALUES ('513200', '阿坝藏族羌族自治州', '510000');
INSERT INTO `china` VALUES ('513221', '汶川县', '513200');
INSERT INTO `china` VALUES ('513222', '理县', '513200');
INSERT INTO `china` VALUES ('513223', '茂县', '513200');
INSERT INTO `china` VALUES ('513224', '松潘县', '513200');
INSERT INTO `china` VALUES ('513225', '九寨沟县', '513200');
INSERT INTO `china` VALUES ('513226', '金川县', '513200');
INSERT INTO `china` VALUES ('513227', '小金县', '513200');
INSERT INTO `china` VALUES ('513228', '黑水县', '513200');
INSERT INTO `china` VALUES ('513229', '马尔康县', '513200');
INSERT INTO `china` VALUES ('513230', '壤塘县', '513200');
INSERT INTO `china` VALUES ('513231', '阿坝县', '513200');
INSERT INTO `china` VALUES ('513232', '若尔盖县', '513200');
INSERT INTO `china` VALUES ('513233', '红原县', '513200');
INSERT INTO `china` VALUES ('513300', '甘孜藏族自治州', '510000');
INSERT INTO `china` VALUES ('513301', '康定市', '513300');
INSERT INTO `china` VALUES ('513322', '泸定县', '513300');
INSERT INTO `china` VALUES ('513323', '丹巴县', '513300');
INSERT INTO `china` VALUES ('513324', '九龙县', '513300');
INSERT INTO `china` VALUES ('513325', '雅江县', '513300');
INSERT INTO `china` VALUES ('513326', '道孚县', '513300');
INSERT INTO `china` VALUES ('513327', '炉霍县', '513300');
INSERT INTO `china` VALUES ('513328', '甘孜县', '513300');
INSERT INTO `china` VALUES ('513329', '新龙县', '513300');
INSERT INTO `china` VALUES ('513330', '德格县', '513300');
INSERT INTO `china` VALUES ('513331', '白玉县', '513300');
INSERT INTO `china` VALUES ('513332', '石渠县', '513300');
INSERT INTO `china` VALUES ('513333', '色达县', '513300');
INSERT INTO `china` VALUES ('513334', '理塘县', '513300');
INSERT INTO `china` VALUES ('513335', '巴塘县', '513300');
INSERT INTO `china` VALUES ('513336', '乡城县', '513300');
INSERT INTO `china` VALUES ('513337', '稻城县', '513300');
INSERT INTO `china` VALUES ('513338', '得荣县', '513300');
INSERT INTO `china` VALUES ('513400', '凉山彝族自治州', '510000');
INSERT INTO `china` VALUES ('513401', '西昌市', '513400');
INSERT INTO `china` VALUES ('513422', '木里藏族自治县', '513400');
INSERT INTO `china` VALUES ('513423', '盐源县', '513400');
INSERT INTO `china` VALUES ('513424', '德昌县', '513400');
INSERT INTO `china` VALUES ('513425', '会理县', '513400');
INSERT INTO `china` VALUES ('513426', '会东县', '513400');
INSERT INTO `china` VALUES ('513427', '宁南县', '513400');
INSERT INTO `china` VALUES ('513428', '普格县', '513400');
INSERT INTO `china` VALUES ('513429', '布拖县', '513400');
INSERT INTO `china` VALUES ('513430', '金阳县', '513400');
INSERT INTO `china` VALUES ('513431', '昭觉县', '513400');
INSERT INTO `china` VALUES ('513432', '喜德县', '513400');
INSERT INTO `china` VALUES ('513433', '冕宁县', '513400');
INSERT INTO `china` VALUES ('513434', '越西县', '513400');
INSERT INTO `china` VALUES ('513435', '甘洛县', '513400');
INSERT INTO `china` VALUES ('513436', '美姑县', '513400');
INSERT INTO `china` VALUES ('513437', '雷波县', '513400');
INSERT INTO `china` VALUES ('520000', '贵州省', '0');
INSERT INTO `china` VALUES ('520100', '贵阳市', '520000');
INSERT INTO `china` VALUES ('520102', '南明区', '520100');
INSERT INTO `china` VALUES ('520103', '云岩区', '520100');
INSERT INTO `china` VALUES ('520111', '花溪区', '520100');
INSERT INTO `china` VALUES ('520112', '乌当区', '520100');
INSERT INTO `china` VALUES ('520113', '白云区', '520100');
INSERT INTO `china` VALUES ('520115', '观山湖区', '520100');
INSERT INTO `china` VALUES ('520121', '开阳县', '520100');
INSERT INTO `china` VALUES ('520122', '息烽县', '520100');
INSERT INTO `china` VALUES ('520123', '修文县', '520100');
INSERT INTO `china` VALUES ('520181', '清镇市', '520100');
INSERT INTO `china` VALUES ('520200', '六盘水市', '520000');
INSERT INTO `china` VALUES ('520201', '钟山区', '520200');
INSERT INTO `china` VALUES ('520203', '六枝特区', '520200');
INSERT INTO `china` VALUES ('520221', '水城县', '520200');
INSERT INTO `china` VALUES ('520222', '盘县', '520200');
INSERT INTO `china` VALUES ('520300', '遵义市', '520000');
INSERT INTO `china` VALUES ('520302', '红花岗区', '520300');
INSERT INTO `china` VALUES ('520303', '汇川区', '520300');
INSERT INTO `china` VALUES ('520321', '遵义县', '520300');
INSERT INTO `china` VALUES ('520322', '桐梓县', '520300');
INSERT INTO `china` VALUES ('520323', '绥阳县', '520300');
INSERT INTO `china` VALUES ('520324', '正安县', '520300');
INSERT INTO `china` VALUES ('520325', '道真仡佬族苗族自治县', '520300');
INSERT INTO `china` VALUES ('520326', '务川仡佬族苗族自治县', '520300');
INSERT INTO `china` VALUES ('520327', '凤冈县', '520300');
INSERT INTO `china` VALUES ('520328', '湄潭县', '520300');
INSERT INTO `china` VALUES ('520329', '余庆县', '520300');
INSERT INTO `china` VALUES ('520330', '习水县', '520300');
INSERT INTO `china` VALUES ('520381', '赤水市', '520300');
INSERT INTO `china` VALUES ('520382', '仁怀市', '520300');
INSERT INTO `china` VALUES ('520400', '安顺市', '520000');
INSERT INTO `china` VALUES ('520402', '西秀区', '520400');
INSERT INTO `china` VALUES ('520403', '平坝区', '520400');
INSERT INTO `china` VALUES ('520422', '普定县', '520400');
INSERT INTO `china` VALUES ('520423', '镇宁布依族苗族自治县', '520400');
INSERT INTO `china` VALUES ('520424', '关岭布依族苗族自治县', '520400');
INSERT INTO `china` VALUES ('520425', '紫云苗族布依族自治县', '520400');
INSERT INTO `china` VALUES ('520500', '毕节市', '520000');
INSERT INTO `china` VALUES ('520502', '七星关区', '520500');
INSERT INTO `china` VALUES ('520521', '大方县', '520500');
INSERT INTO `china` VALUES ('520522', '黔西县', '520500');
INSERT INTO `china` VALUES ('520523', '金沙县', '520500');
INSERT INTO `china` VALUES ('520524', '织金县', '520500');
INSERT INTO `china` VALUES ('520525', '纳雍县', '520500');
INSERT INTO `china` VALUES ('520526', '威宁彝族回族苗族自治县', '520500');
INSERT INTO `china` VALUES ('520527', '赫章县', '520500');
INSERT INTO `china` VALUES ('520600', '铜仁市', '520000');
INSERT INTO `china` VALUES ('520602', '碧江区', '520600');
INSERT INTO `china` VALUES ('520603', '万山区', '520600');
INSERT INTO `china` VALUES ('520621', '江口县', '520600');
INSERT INTO `china` VALUES ('520622', '玉屏侗族自治县', '520600');
INSERT INTO `china` VALUES ('520623', '石阡县', '520600');
INSERT INTO `china` VALUES ('520624', '思南县', '520600');
INSERT INTO `china` VALUES ('520625', '印江土家族苗族自治县', '520600');
INSERT INTO `china` VALUES ('520626', '德江县', '520600');
INSERT INTO `china` VALUES ('520627', '沿河土家族自治县', '520600');
INSERT INTO `china` VALUES ('520628', '松桃苗族自治县', '520600');
INSERT INTO `china` VALUES ('522300', '黔西南布依族苗族自治州', '520000');
INSERT INTO `china` VALUES ('522301', '兴义市', '522300');
INSERT INTO `china` VALUES ('522322', '兴仁县', '522300');
INSERT INTO `china` VALUES ('522323', '普安县', '522300');
INSERT INTO `china` VALUES ('522324', '晴隆县', '522300');
INSERT INTO `china` VALUES ('522325', '贞丰县', '522300');
INSERT INTO `china` VALUES ('522326', '望谟县', '522300');
INSERT INTO `china` VALUES ('522327', '册亨县', '522300');
INSERT INTO `china` VALUES ('522328', '安龙县', '522300');
INSERT INTO `china` VALUES ('522600', '黔东南苗族侗族自治州', '520000');
INSERT INTO `china` VALUES ('522601', '凯里市', '522600');
INSERT INTO `china` VALUES ('522622', '黄平县', '522600');
INSERT INTO `china` VALUES ('522623', '施秉县', '522600');
INSERT INTO `china` VALUES ('522624', '三穗县', '522600');
INSERT INTO `china` VALUES ('522625', '镇远县', '522600');
INSERT INTO `china` VALUES ('522626', '岑巩县', '522600');
INSERT INTO `china` VALUES ('522627', '天柱县', '522600');
INSERT INTO `china` VALUES ('522628', '锦屏县', '522600');
INSERT INTO `china` VALUES ('522629', '剑河县', '522600');
INSERT INTO `china` VALUES ('522630', '台江县', '522600');
INSERT INTO `china` VALUES ('522631', '黎平县', '522600');
INSERT INTO `china` VALUES ('522632', '榕江县', '522600');
INSERT INTO `china` VALUES ('522633', '从江县', '522600');
INSERT INTO `china` VALUES ('522634', '雷山县', '522600');
INSERT INTO `china` VALUES ('522635', '麻江县', '522600');
INSERT INTO `china` VALUES ('522636', '丹寨县', '522600');
INSERT INTO `china` VALUES ('522700', '黔南布依族苗族自治州', '520000');
INSERT INTO `china` VALUES ('522701', '都匀市', '522700');
INSERT INTO `china` VALUES ('522702', '福泉市', '522700');
INSERT INTO `china` VALUES ('522722', '荔波县', '522700');
INSERT INTO `china` VALUES ('522723', '贵定县', '522700');
INSERT INTO `china` VALUES ('522725', '瓮安县', '522700');
INSERT INTO `china` VALUES ('522726', '独山县', '522700');
INSERT INTO `china` VALUES ('522727', '平塘县', '522700');
INSERT INTO `china` VALUES ('522728', '罗甸县', '522700');
INSERT INTO `china` VALUES ('522729', '长顺县', '522700');
INSERT INTO `china` VALUES ('522730', '龙里县', '522700');
INSERT INTO `china` VALUES ('522731', '惠水县', '522700');
INSERT INTO `china` VALUES ('522732', '三都水族自治县', '522700');
INSERT INTO `china` VALUES ('530000', '云南省', '0');
INSERT INTO `china` VALUES ('530100', '昆明市', '530000');
INSERT INTO `china` VALUES ('530102', '五华区', '530100');
INSERT INTO `china` VALUES ('530103', '盘龙区', '530100');
INSERT INTO `china` VALUES ('530111', '官渡区', '530100');
INSERT INTO `china` VALUES ('530112', '西山区', '530100');
INSERT INTO `china` VALUES ('530113', '东川区', '530100');
INSERT INTO `china` VALUES ('530114', '呈贡区', '530100');
INSERT INTO `china` VALUES ('530122', '晋宁县', '530100');
INSERT INTO `china` VALUES ('530124', '富民县', '530100');
INSERT INTO `china` VALUES ('530125', '宜良县', '530100');
INSERT INTO `china` VALUES ('530126', '石林彝族自治县', '530100');
INSERT INTO `china` VALUES ('530127', '嵩明县', '530100');
INSERT INTO `china` VALUES ('530128', '禄劝彝族苗族自治县', '530100');
INSERT INTO `china` VALUES ('530129', '寻甸回族彝族自治县', '530100');
INSERT INTO `china` VALUES ('530181', '安宁市', '530100');
INSERT INTO `china` VALUES ('530300', '曲靖市', '530000');
INSERT INTO `china` VALUES ('530302', '麒麟区', '530300');
INSERT INTO `china` VALUES ('530321', '马龙县', '530300');
INSERT INTO `china` VALUES ('530322', '陆良县', '530300');
INSERT INTO `china` VALUES ('530323', '师宗县', '530300');
INSERT INTO `china` VALUES ('530324', '罗平县', '530300');
INSERT INTO `china` VALUES ('530325', '富源县', '530300');
INSERT INTO `china` VALUES ('530326', '会泽县', '530300');
INSERT INTO `china` VALUES ('530328', '沾益县', '530300');
INSERT INTO `china` VALUES ('530381', '宣威市', '530300');
INSERT INTO `china` VALUES ('530400', '玉溪市', '530000');
INSERT INTO `china` VALUES ('530402', '红塔区', '530400');
INSERT INTO `china` VALUES ('530421', '江川县', '530400');
INSERT INTO `china` VALUES ('530422', '澄江县', '530400');
INSERT INTO `china` VALUES ('530423', '通海县', '530400');
INSERT INTO `china` VALUES ('530424', '华宁县', '530400');
INSERT INTO `china` VALUES ('530425', '易门县', '530400');
INSERT INTO `china` VALUES ('530426', '峨山彝族自治县', '530400');
INSERT INTO `china` VALUES ('530427', '新平彝族傣族自治县', '530400');
INSERT INTO `china` VALUES ('530428', '元江哈尼族彝族傣族自治县', '530400');
INSERT INTO `china` VALUES ('530500', '保山市', '530000');
INSERT INTO `china` VALUES ('530502', '隆阳区', '530500');
INSERT INTO `china` VALUES ('530521', '施甸县', '530500');
INSERT INTO `china` VALUES ('530523', '龙陵县', '530500');
INSERT INTO `china` VALUES ('530524', '昌宁县', '530500');
INSERT INTO `china` VALUES ('530581', '腾冲市', '530500');
INSERT INTO `china` VALUES ('530600', '昭通市', '530000');
INSERT INTO `china` VALUES ('530602', '昭阳区', '530600');
INSERT INTO `china` VALUES ('530621', '鲁甸县', '530600');
INSERT INTO `china` VALUES ('530622', '巧家县', '530600');
INSERT INTO `china` VALUES ('530623', '盐津县', '530600');
INSERT INTO `china` VALUES ('530624', '大关县', '530600');
INSERT INTO `china` VALUES ('530625', '永善县', '530600');
INSERT INTO `china` VALUES ('530626', '绥江县', '530600');
INSERT INTO `china` VALUES ('530627', '镇雄县', '530600');
INSERT INTO `china` VALUES ('530628', '彝良县', '530600');
INSERT INTO `china` VALUES ('530629', '威信县', '530600');
INSERT INTO `china` VALUES ('530630', '水富县', '530600');
INSERT INTO `china` VALUES ('530700', '丽江市', '530000');
INSERT INTO `china` VALUES ('530702', '古城区', '530700');
INSERT INTO `china` VALUES ('530721', '玉龙纳西族自治县', '530700');
INSERT INTO `china` VALUES ('530722', '永胜县', '530700');
INSERT INTO `china` VALUES ('530723', '华坪县', '530700');
INSERT INTO `china` VALUES ('530724', '宁蒗彝族自治县', '530700');
INSERT INTO `china` VALUES ('530800', '普洱市', '530000');
INSERT INTO `china` VALUES ('530802', '思茅区', '530800');
INSERT INTO `china` VALUES ('530821', '宁洱哈尼族彝族自治县', '530800');
INSERT INTO `china` VALUES ('530822', '墨江哈尼族自治县', '530800');
INSERT INTO `china` VALUES ('530823', '景东彝族自治县', '530800');
INSERT INTO `china` VALUES ('530824', '景谷傣族彝族自治县', '530800');
INSERT INTO `china` VALUES ('530825', '镇沅彝族哈尼族拉祜族自治县', '530800');
INSERT INTO `china` VALUES ('530826', '江城哈尼族彝族自治县', '530800');
INSERT INTO `china` VALUES ('530827', '孟连傣族拉祜族佤族自治县', '530800');
INSERT INTO `china` VALUES ('530828', '澜沧拉祜族自治县', '530800');
INSERT INTO `china` VALUES ('530829', '西盟佤族自治县', '530800');
INSERT INTO `china` VALUES ('530900', '临沧市', '530000');
INSERT INTO `china` VALUES ('530902', '临翔区', '530900');
INSERT INTO `china` VALUES ('530921', '凤庆县', '530900');
INSERT INTO `china` VALUES ('530922', '云县', '530900');
INSERT INTO `china` VALUES ('530923', '永德县', '530900');
INSERT INTO `china` VALUES ('530924', '镇康县', '530900');
INSERT INTO `china` VALUES ('530925', '双江拉祜族佤族布朗族傣族自治县', '530900');
INSERT INTO `china` VALUES ('530926', '耿马傣族佤族自治县', '530900');
INSERT INTO `china` VALUES ('530927', '沧源佤族自治县', '530900');
INSERT INTO `china` VALUES ('532300', '楚雄彝族自治州', '530000');
INSERT INTO `china` VALUES ('532301', '楚雄市', '532300');
INSERT INTO `china` VALUES ('532322', '双柏县', '532300');
INSERT INTO `china` VALUES ('532323', '牟定县', '532300');
INSERT INTO `china` VALUES ('532324', '南华县', '532300');
INSERT INTO `china` VALUES ('532325', '姚安县', '532300');
INSERT INTO `china` VALUES ('532326', '大姚县', '532300');
INSERT INTO `china` VALUES ('532327', '永仁县', '532300');
INSERT INTO `china` VALUES ('532328', '元谋县', '532300');
INSERT INTO `china` VALUES ('532329', '武定县', '532300');
INSERT INTO `china` VALUES ('532331', '禄丰县', '532300');
INSERT INTO `china` VALUES ('532500', '红河哈尼族彝族自治州', '530000');
INSERT INTO `china` VALUES ('532501', '个旧市', '532500');
INSERT INTO `china` VALUES ('532502', '开远市', '532500');
INSERT INTO `china` VALUES ('532503', '蒙自市', '532500');
INSERT INTO `china` VALUES ('532504', '弥勒市', '532500');
INSERT INTO `china` VALUES ('532523', '屏边苗族自治县', '532500');
INSERT INTO `china` VALUES ('532524', '建水县', '532500');
INSERT INTO `china` VALUES ('532525', '石屏县', '532500');
INSERT INTO `china` VALUES ('532527', '泸西县', '532500');
INSERT INTO `china` VALUES ('532528', '元阳县', '532500');
INSERT INTO `china` VALUES ('532529', '红河县', '532500');
INSERT INTO `china` VALUES ('532530', '金平苗族瑶族傣族自治县', '532500');
INSERT INTO `china` VALUES ('532531', '绿春县', '532500');
INSERT INTO `china` VALUES ('532532', '河口瑶族自治县', '532500');
INSERT INTO `china` VALUES ('532600', '文山壮族苗族自治州', '530000');
INSERT INTO `china` VALUES ('532601', '文山市', '532600');
INSERT INTO `china` VALUES ('532622', '砚山县', '532600');
INSERT INTO `china` VALUES ('532623', '西畴县', '532600');
INSERT INTO `china` VALUES ('532624', '麻栗坡县', '532600');
INSERT INTO `china` VALUES ('532625', '马关县', '532600');
INSERT INTO `china` VALUES ('532626', '丘北县', '532600');
INSERT INTO `china` VALUES ('532627', '广南县', '532600');
INSERT INTO `china` VALUES ('532628', '富宁县', '532600');
INSERT INTO `china` VALUES ('532800', '西双版纳傣族自治州', '530000');
INSERT INTO `china` VALUES ('532801', '景洪市', '532800');
INSERT INTO `china` VALUES ('532822', '勐海县', '532800');
INSERT INTO `china` VALUES ('532823', '勐腊县', '532800');
INSERT INTO `china` VALUES ('532900', '大理白族自治州', '530000');
INSERT INTO `china` VALUES ('532901', '大理市', '532900');
INSERT INTO `china` VALUES ('532922', '漾濞彝族自治县', '532900');
INSERT INTO `china` VALUES ('532923', '祥云县', '532900');
INSERT INTO `china` VALUES ('532924', '宾川县', '532900');
INSERT INTO `china` VALUES ('532925', '弥渡县', '532900');
INSERT INTO `china` VALUES ('532926', '南涧彝族自治县', '532900');
INSERT INTO `china` VALUES ('532927', '巍山彝族回族自治县', '532900');
INSERT INTO `china` VALUES ('532928', '永平县', '532900');
INSERT INTO `china` VALUES ('532929', '云龙县', '532900');
INSERT INTO `china` VALUES ('532930', '洱源县', '532900');
INSERT INTO `china` VALUES ('532931', '剑川县', '532900');
INSERT INTO `china` VALUES ('532932', '鹤庆县', '532900');
INSERT INTO `china` VALUES ('533100', '德宏傣族景颇族自治州', '530000');
INSERT INTO `china` VALUES ('533102', '瑞丽市', '533100');
INSERT INTO `china` VALUES ('533103', '芒市', '533100');
INSERT INTO `china` VALUES ('533122', '梁河县', '533100');
INSERT INTO `china` VALUES ('533123', '盈江县', '533100');
INSERT INTO `china` VALUES ('533124', '陇川县', '533100');
INSERT INTO `china` VALUES ('533300', '怒江傈僳族自治州', '530000');
INSERT INTO `china` VALUES ('533321', '泸水县', '533300');
INSERT INTO `china` VALUES ('533323', '福贡县', '533300');
INSERT INTO `china` VALUES ('533324', '贡山独龙族怒族自治县', '533300');
INSERT INTO `china` VALUES ('533325', '兰坪白族普米族自治县', '533300');
INSERT INTO `china` VALUES ('533400', '迪庆藏族自治州', '530000');
INSERT INTO `china` VALUES ('533401', '香格里拉市', '533400');
INSERT INTO `china` VALUES ('533422', '德钦县', '533400');
INSERT INTO `china` VALUES ('533423', '维西傈僳族自治县', '533400');
INSERT INTO `china` VALUES ('540000', '西藏自治区', '0');
INSERT INTO `china` VALUES ('540100', '拉萨市', '540000');
INSERT INTO `china` VALUES ('540102', '城关区', '540100');
INSERT INTO `china` VALUES ('540121', '林周县', '540100');
INSERT INTO `china` VALUES ('540122', '当雄县', '540100');
INSERT INTO `china` VALUES ('540123', '尼木县', '540100');
INSERT INTO `china` VALUES ('540124', '曲水县', '540100');
INSERT INTO `china` VALUES ('540125', '堆龙德庆县', '540100');
INSERT INTO `china` VALUES ('540126', '达孜县', '540100');
INSERT INTO `china` VALUES ('540127', '墨竹工卡县', '540100');
INSERT INTO `china` VALUES ('540200', '日喀则市', '540000');
INSERT INTO `china` VALUES ('540202', '桑珠孜区', '540200');
INSERT INTO `china` VALUES ('540221', '南木林县', '540200');
INSERT INTO `china` VALUES ('540222', '江孜县', '540200');
INSERT INTO `china` VALUES ('540223', '定日县', '540200');
INSERT INTO `china` VALUES ('540224', '萨迦县', '540200');
INSERT INTO `china` VALUES ('540225', '拉孜县', '540200');
INSERT INTO `china` VALUES ('540226', '昂仁县', '540200');
INSERT INTO `china` VALUES ('540227', '谢通门县', '540200');
INSERT INTO `china` VALUES ('540228', '白朗县', '540200');
INSERT INTO `china` VALUES ('540229', '仁布县', '540200');
INSERT INTO `china` VALUES ('540230', '康马县', '540200');
INSERT INTO `china` VALUES ('540231', '定结县', '540200');
INSERT INTO `china` VALUES ('540232', '仲巴县', '540200');
INSERT INTO `china` VALUES ('540233', '亚东县', '540200');
INSERT INTO `china` VALUES ('540234', '吉隆县', '540200');
INSERT INTO `china` VALUES ('540235', '聂拉木县', '540200');
INSERT INTO `china` VALUES ('540236', '萨嘎县', '540200');
INSERT INTO `china` VALUES ('540237', '岗巴县', '540200');
INSERT INTO `china` VALUES ('540300', '昌都市', '540000');
INSERT INTO `china` VALUES ('540302', '卡若区', '540300');
INSERT INTO `china` VALUES ('540321', '江达县', '540300');
INSERT INTO `china` VALUES ('540322', '贡觉县', '540300');
INSERT INTO `china` VALUES ('540323', '类乌齐县', '540300');
INSERT INTO `china` VALUES ('540324', '丁青县', '540300');
INSERT INTO `china` VALUES ('540325', '察雅县', '540300');
INSERT INTO `china` VALUES ('540326', '八宿县', '540300');
INSERT INTO `china` VALUES ('540327', '左贡县', '540300');
INSERT INTO `china` VALUES ('540328', '芒康县', '540300');
INSERT INTO `china` VALUES ('540329', '洛隆县', '540300');
INSERT INTO `china` VALUES ('540330', '边坝县', '540300');
INSERT INTO `china` VALUES ('540400', '林芝市', '540000');
INSERT INTO `china` VALUES ('540402', '巴宜区', '540400');
INSERT INTO `china` VALUES ('540421', '工布江达县', '540400');
INSERT INTO `china` VALUES ('540422', '米林县', '540400');
INSERT INTO `china` VALUES ('540423', '墨脱县', '540400');
INSERT INTO `china` VALUES ('540424', '波密县', '540400');
INSERT INTO `china` VALUES ('540425', '察隅县', '540400');
INSERT INTO `china` VALUES ('540426', '朗县', '540400');
INSERT INTO `china` VALUES ('542200', '山南地区', '540000');
INSERT INTO `china` VALUES ('542221', '乃东县', '542200');
INSERT INTO `china` VALUES ('542222', '扎囊县', '542200');
INSERT INTO `china` VALUES ('542223', '贡嘎县', '542200');
INSERT INTO `china` VALUES ('542224', '桑日县', '542200');
INSERT INTO `china` VALUES ('542225', '琼结县', '542200');
INSERT INTO `china` VALUES ('542226', '曲松县', '542200');
INSERT INTO `china` VALUES ('542227', '措美县', '542200');
INSERT INTO `china` VALUES ('542228', '洛扎县', '542200');
INSERT INTO `china` VALUES ('542229', '加查县', '542200');
INSERT INTO `china` VALUES ('542231', '隆子县', '542200');
INSERT INTO `china` VALUES ('542232', '错那县', '542200');
INSERT INTO `china` VALUES ('542233', '浪卡子县', '542200');
INSERT INTO `china` VALUES ('542400', '那曲地区', '540000');
INSERT INTO `china` VALUES ('542421', '那曲县', '542400');
INSERT INTO `china` VALUES ('542422', '嘉黎县', '542400');
INSERT INTO `china` VALUES ('542423', '比如县', '542400');
INSERT INTO `china` VALUES ('542424', '聂荣县', '542400');
INSERT INTO `china` VALUES ('542425', '安多县', '542400');
INSERT INTO `china` VALUES ('542426', '申扎县', '542400');
INSERT INTO `china` VALUES ('542427', '索县', '542400');
INSERT INTO `china` VALUES ('542428', '班戈县', '542400');
INSERT INTO `china` VALUES ('542429', '巴青县', '542400');
INSERT INTO `china` VALUES ('542430', '尼玛县', '542400');
INSERT INTO `china` VALUES ('542431', '双湖县', '542400');
INSERT INTO `china` VALUES ('542500', '阿里地区', '540000');
INSERT INTO `china` VALUES ('542521', '普兰县', '542500');
INSERT INTO `china` VALUES ('542522', '札达县', '542500');
INSERT INTO `china` VALUES ('542523', '噶尔县', '542500');
INSERT INTO `china` VALUES ('542524', '日土县', '542500');
INSERT INTO `china` VALUES ('542525', '革吉县', '542500');
INSERT INTO `china` VALUES ('542526', '改则县', '542500');
INSERT INTO `china` VALUES ('542527', '措勤县', '542500');
INSERT INTO `china` VALUES ('610000', '陕西省', '0');
INSERT INTO `china` VALUES ('610100', '西安市', '610000');
INSERT INTO `china` VALUES ('610102', '新城区', '610100');
INSERT INTO `china` VALUES ('610103', '碑林区', '610100');
INSERT INTO `china` VALUES ('610104', '莲湖区', '610100');
INSERT INTO `china` VALUES ('610111', '灞桥区', '610100');
INSERT INTO `china` VALUES ('610112', '未央区', '610100');
INSERT INTO `china` VALUES ('610113', '雁塔区', '610100');
INSERT INTO `china` VALUES ('610114', '阎良区', '610100');
INSERT INTO `china` VALUES ('610115', '临潼区', '610100');
INSERT INTO `china` VALUES ('610116', '长安区', '610100');
INSERT INTO `china` VALUES ('610117', '高陵区', '610100');
INSERT INTO `china` VALUES ('610122', '蓝田县', '610100');
INSERT INTO `china` VALUES ('610124', '周至县', '610100');
INSERT INTO `china` VALUES ('610125', '户县', '610100');
INSERT INTO `china` VALUES ('610200', '铜川市', '610000');
INSERT INTO `china` VALUES ('610202', '王益区', '610200');
INSERT INTO `china` VALUES ('610203', '印台区', '610200');
INSERT INTO `china` VALUES ('610204', '耀州区', '610200');
INSERT INTO `china` VALUES ('610222', '宜君县', '610200');
INSERT INTO `china` VALUES ('610300', '宝鸡市', '610000');
INSERT INTO `china` VALUES ('610302', '渭滨区', '610300');
INSERT INTO `china` VALUES ('610303', '金台区', '610300');
INSERT INTO `china` VALUES ('610304', '陈仓区', '610300');
INSERT INTO `china` VALUES ('610322', '凤翔县', '610300');
INSERT INTO `china` VALUES ('610323', '岐山县', '610300');
INSERT INTO `china` VALUES ('610324', '扶风县', '610300');
INSERT INTO `china` VALUES ('610326', '眉县', '610300');
INSERT INTO `china` VALUES ('610327', '陇县', '610300');
INSERT INTO `china` VALUES ('610328', '千阳县', '610300');
INSERT INTO `china` VALUES ('610329', '麟游县', '610300');
INSERT INTO `china` VALUES ('610330', '凤县', '610300');
INSERT INTO `china` VALUES ('610331', '太白县', '610300');
INSERT INTO `china` VALUES ('610400', '咸阳市', '610000');
INSERT INTO `china` VALUES ('610402', '秦都区', '610400');
INSERT INTO `china` VALUES ('610403', '杨陵区', '610400');
INSERT INTO `china` VALUES ('610404', '渭城区', '610400');
INSERT INTO `china` VALUES ('610422', '三原县', '610400');
INSERT INTO `china` VALUES ('610423', '泾阳县', '610400');
INSERT INTO `china` VALUES ('610424', '乾县', '610400');
INSERT INTO `china` VALUES ('610425', '礼泉县', '610400');
INSERT INTO `china` VALUES ('610426', '永寿县', '610400');
INSERT INTO `china` VALUES ('610427', '彬县', '610400');
INSERT INTO `china` VALUES ('610428', '长武县', '610400');
INSERT INTO `china` VALUES ('610429', '旬邑县', '610400');
INSERT INTO `china` VALUES ('610430', '淳化县', '610400');
INSERT INTO `china` VALUES ('610431', '武功县', '610400');
INSERT INTO `china` VALUES ('610481', '兴平市', '610400');
INSERT INTO `china` VALUES ('610500', '渭南市', '610000');
INSERT INTO `china` VALUES ('610502', '临渭区', '610500');
INSERT INTO `china` VALUES ('610521', '华县', '610500');
INSERT INTO `china` VALUES ('610522', '潼关县', '610500');
INSERT INTO `china` VALUES ('610523', '大荔县', '610500');
INSERT INTO `china` VALUES ('610524', '合阳县', '610500');
INSERT INTO `china` VALUES ('610525', '澄城县', '610500');
INSERT INTO `china` VALUES ('610526', '蒲城县', '610500');
INSERT INTO `china` VALUES ('610527', '白水县', '610500');
INSERT INTO `china` VALUES ('610528', '富平县', '610500');
INSERT INTO `china` VALUES ('610581', '韩城市', '610500');
INSERT INTO `china` VALUES ('610582', '华阴市', '610500');
INSERT INTO `china` VALUES ('610600', '延安市', '610000');
INSERT INTO `china` VALUES ('610602', '宝塔区', '610600');
INSERT INTO `china` VALUES ('610621', '延长县', '610600');
INSERT INTO `china` VALUES ('610622', '延川县', '610600');
INSERT INTO `china` VALUES ('610623', '子长县', '610600');
INSERT INTO `china` VALUES ('610624', '安塞县', '610600');
INSERT INTO `china` VALUES ('610625', '志丹县', '610600');
INSERT INTO `china` VALUES ('610626', '吴起县', '610600');
INSERT INTO `china` VALUES ('610627', '甘泉县', '610600');
INSERT INTO `china` VALUES ('610628', '富县', '610600');
INSERT INTO `china` VALUES ('610629', '洛川县', '610600');
INSERT INTO `china` VALUES ('610630', '宜川县', '610600');
INSERT INTO `china` VALUES ('610631', '黄龙县', '610600');
INSERT INTO `china` VALUES ('610632', '黄陵县', '610600');
INSERT INTO `china` VALUES ('610700', '汉中市', '610000');
INSERT INTO `china` VALUES ('610702', '汉台区', '610700');
INSERT INTO `china` VALUES ('610721', '南郑县', '610700');
INSERT INTO `china` VALUES ('610722', '城固县', '610700');
INSERT INTO `china` VALUES ('610723', '洋县', '610700');
INSERT INTO `china` VALUES ('610724', '西乡县', '610700');
INSERT INTO `china` VALUES ('610725', '勉县', '610700');
INSERT INTO `china` VALUES ('610726', '宁强县', '610700');
INSERT INTO `china` VALUES ('610727', '略阳县', '610700');
INSERT INTO `china` VALUES ('610728', '镇巴县', '610700');
INSERT INTO `china` VALUES ('610729', '留坝县', '610700');
INSERT INTO `china` VALUES ('610730', '佛坪县', '610700');
INSERT INTO `china` VALUES ('610800', '榆林市', '610000');
INSERT INTO `china` VALUES ('610802', '榆阳区', '610800');
INSERT INTO `china` VALUES ('610821', '神木县', '610800');
INSERT INTO `china` VALUES ('610822', '府谷县', '610800');
INSERT INTO `china` VALUES ('610823', '横山县', '610800');
INSERT INTO `china` VALUES ('610824', '靖边县', '610800');
INSERT INTO `china` VALUES ('610825', '定边县', '610800');
INSERT INTO `china` VALUES ('610826', '绥德县', '610800');
INSERT INTO `china` VALUES ('610827', '米脂县', '610800');
INSERT INTO `china` VALUES ('610828', '佳县', '610800');
INSERT INTO `china` VALUES ('610829', '吴堡县', '610800');
INSERT INTO `china` VALUES ('610830', '清涧县', '610800');
INSERT INTO `china` VALUES ('610831', '子洲县', '610800');
INSERT INTO `china` VALUES ('610900', '安康市', '610000');
INSERT INTO `china` VALUES ('610902', '汉滨区', '610900');
INSERT INTO `china` VALUES ('610921', '汉阴县', '610900');
INSERT INTO `china` VALUES ('610922', '石泉县', '610900');
INSERT INTO `china` VALUES ('610923', '宁陕县', '610900');
INSERT INTO `china` VALUES ('610924', '紫阳县', '610900');
INSERT INTO `china` VALUES ('610925', '岚皋县', '610900');
INSERT INTO `china` VALUES ('610926', '平利县', '610900');
INSERT INTO `china` VALUES ('610927', '镇坪县', '610900');
INSERT INTO `china` VALUES ('610928', '旬阳县', '610900');
INSERT INTO `china` VALUES ('610929', '白河县', '610900');
INSERT INTO `china` VALUES ('611000', '商洛市', '610000');
INSERT INTO `china` VALUES ('611002', '商州区', '611000');
INSERT INTO `china` VALUES ('611021', '洛南县', '611000');
INSERT INTO `china` VALUES ('611022', '丹凤县', '611000');
INSERT INTO `china` VALUES ('611023', '商南县', '611000');
INSERT INTO `china` VALUES ('611024', '山阳县', '611000');
INSERT INTO `china` VALUES ('611025', '镇安县', '611000');
INSERT INTO `china` VALUES ('611026', '柞水县', '611000');
INSERT INTO `china` VALUES ('620000', '甘肃省', '0');
INSERT INTO `china` VALUES ('620100', '兰州市', '620000');
INSERT INTO `china` VALUES ('620102', '城关区', '620100');
INSERT INTO `china` VALUES ('620103', '七里河区', '620100');
INSERT INTO `china` VALUES ('620104', '西固区', '620100');
INSERT INTO `china` VALUES ('620105', '安宁区', '620100');
INSERT INTO `china` VALUES ('620111', '红古区', '620100');
INSERT INTO `china` VALUES ('620121', '永登县', '620100');
INSERT INTO `china` VALUES ('620122', '皋兰县', '620100');
INSERT INTO `china` VALUES ('620123', '榆中县', '620100');
INSERT INTO `china` VALUES ('620200', '嘉峪关市', '620000');
INSERT INTO `china` VALUES ('620201', '市辖区', '620200');
INSERT INTO `china` VALUES ('620290', '雄关区', '620200');
INSERT INTO `china` VALUES ('620291', '长城区', '620200');
INSERT INTO `china` VALUES ('620292', '镜铁区', '620200');
INSERT INTO `china` VALUES ('620293', '新城镇', '620200');
INSERT INTO `china` VALUES ('620294', '峪泉镇', '620200');
INSERT INTO `china` VALUES ('620295', '文殊镇', '620200');
INSERT INTO `china` VALUES ('620300', '金昌市', '620000');
INSERT INTO `china` VALUES ('620302', '金川区', '620300');
INSERT INTO `china` VALUES ('620321', '永昌县', '620300');
INSERT INTO `china` VALUES ('620400', '白银市', '620000');
INSERT INTO `china` VALUES ('620402', '白银区', '620400');
INSERT INTO `china` VALUES ('620403', '平川区', '620400');
INSERT INTO `china` VALUES ('620421', '靖远县', '620400');
INSERT INTO `china` VALUES ('620422', '会宁县', '620400');
INSERT INTO `china` VALUES ('620423', '景泰县', '620400');
INSERT INTO `china` VALUES ('620500', '天水市', '620000');
INSERT INTO `china` VALUES ('620502', '秦州区', '620500');
INSERT INTO `china` VALUES ('620503', '麦积区', '620500');
INSERT INTO `china` VALUES ('620521', '清水县', '620500');
INSERT INTO `china` VALUES ('620522', '秦安县', '620500');
INSERT INTO `china` VALUES ('620523', '甘谷县', '620500');
INSERT INTO `china` VALUES ('620524', '武山县', '620500');
INSERT INTO `china` VALUES ('620525', '张家川回族自治县', '620500');
INSERT INTO `china` VALUES ('620600', '武威市', '620000');
INSERT INTO `china` VALUES ('620602', '凉州区', '620600');
INSERT INTO `china` VALUES ('620621', '民勤县', '620600');
INSERT INTO `china` VALUES ('620622', '古浪县', '620600');
INSERT INTO `china` VALUES ('620623', '天祝藏族自治县', '620600');
INSERT INTO `china` VALUES ('620700', '张掖市', '620000');
INSERT INTO `china` VALUES ('620702', '甘州区', '620700');
INSERT INTO `china` VALUES ('620721', '肃南裕固族自治县', '620700');
INSERT INTO `china` VALUES ('620722', '民乐县', '620700');
INSERT INTO `china` VALUES ('620723', '临泽县', '620700');
INSERT INTO `china` VALUES ('620724', '高台县', '620700');
INSERT INTO `china` VALUES ('620725', '山丹县', '620700');
INSERT INTO `china` VALUES ('620800', '平凉市', '620000');
INSERT INTO `china` VALUES ('620802', '崆峒区', '620800');
INSERT INTO `china` VALUES ('620821', '泾川县', '620800');
INSERT INTO `china` VALUES ('620822', '灵台县', '620800');
INSERT INTO `china` VALUES ('620823', '崇信县', '620800');
INSERT INTO `china` VALUES ('620824', '华亭县', '620800');
INSERT INTO `china` VALUES ('620825', '庄浪县', '620800');
INSERT INTO `china` VALUES ('620826', '静宁县', '620800');
INSERT INTO `china` VALUES ('620900', '酒泉市', '620000');
INSERT INTO `china` VALUES ('620902', '肃州区', '620900');
INSERT INTO `china` VALUES ('620921', '金塔县', '620900');
INSERT INTO `china` VALUES ('620922', '瓜州县', '620900');
INSERT INTO `china` VALUES ('620923', '肃北蒙古族自治县', '620900');
INSERT INTO `china` VALUES ('620924', '阿克塞哈萨克族自治县', '620900');
INSERT INTO `china` VALUES ('620981', '玉门市', '620900');
INSERT INTO `china` VALUES ('620982', '敦煌市', '620900');
INSERT INTO `china` VALUES ('621000', '庆阳市', '620000');
INSERT INTO `china` VALUES ('621002', '西峰区', '621000');
INSERT INTO `china` VALUES ('621021', '庆城县', '621000');
INSERT INTO `china` VALUES ('621022', '环县', '621000');
INSERT INTO `china` VALUES ('621023', '华池县', '621000');
INSERT INTO `china` VALUES ('621024', '合水县', '621000');
INSERT INTO `china` VALUES ('621025', '正宁县', '621000');
INSERT INTO `china` VALUES ('621026', '宁县', '621000');
INSERT INTO `china` VALUES ('621027', '镇原县', '621000');
INSERT INTO `china` VALUES ('621100', '定西市', '620000');
INSERT INTO `china` VALUES ('621102', '安定区', '621100');
INSERT INTO `china` VALUES ('621121', '通渭县', '621100');
INSERT INTO `china` VALUES ('621122', '陇西县', '621100');
INSERT INTO `china` VALUES ('621123', '渭源县', '621100');
INSERT INTO `china` VALUES ('621124', '临洮县', '621100');
INSERT INTO `china` VALUES ('621125', '漳县', '621100');
INSERT INTO `china` VALUES ('621126', '岷县', '621100');
INSERT INTO `china` VALUES ('621200', '陇南市', '620000');
INSERT INTO `china` VALUES ('621202', '武都区', '621200');
INSERT INTO `china` VALUES ('621221', '成县', '621200');
INSERT INTO `china` VALUES ('621222', '文县', '621200');
INSERT INTO `china` VALUES ('621223', '宕昌县', '621200');
INSERT INTO `china` VALUES ('621224', '康县', '621200');
INSERT INTO `china` VALUES ('621225', '西和县', '621200');
INSERT INTO `china` VALUES ('621226', '礼县', '621200');
INSERT INTO `china` VALUES ('621227', '徽县', '621200');
INSERT INTO `china` VALUES ('621228', '两当县', '621200');
INSERT INTO `china` VALUES ('622900', '临夏回族自治州', '620000');
INSERT INTO `china` VALUES ('622901', '临夏市', '622900');
INSERT INTO `china` VALUES ('622921', '临夏县', '622900');
INSERT INTO `china` VALUES ('622922', '康乐县', '622900');
INSERT INTO `china` VALUES ('622923', '永靖县', '622900');
INSERT INTO `china` VALUES ('622924', '广河县', '622900');
INSERT INTO `china` VALUES ('622925', '和政县', '622900');
INSERT INTO `china` VALUES ('622926', '东乡族自治县', '622900');
INSERT INTO `china` VALUES ('622927', '积石山保安族东乡族撒拉族自治县', '622900');
INSERT INTO `china` VALUES ('623000', '甘南藏族自治州', '620000');
INSERT INTO `china` VALUES ('623001', '合作市', '623000');
INSERT INTO `china` VALUES ('623021', '临潭县', '623000');
INSERT INTO `china` VALUES ('623022', '卓尼县', '623000');
INSERT INTO `china` VALUES ('623023', '舟曲县', '623000');
INSERT INTO `china` VALUES ('623024', '迭部县', '623000');
INSERT INTO `china` VALUES ('623025', '玛曲县', '623000');
INSERT INTO `china` VALUES ('623026', '碌曲县', '623000');
INSERT INTO `china` VALUES ('623027', '夏河县', '623000');
INSERT INTO `china` VALUES ('630000', '青海省', '0');
INSERT INTO `china` VALUES ('630100', '西宁市', '630000');
INSERT INTO `china` VALUES ('630102', '城东区', '630100');
INSERT INTO `china` VALUES ('630103', '城中区', '630100');
INSERT INTO `china` VALUES ('630104', '城西区', '630100');
INSERT INTO `china` VALUES ('630105', '城北区', '630100');
INSERT INTO `china` VALUES ('630121', '大通回族土族自治县', '630100');
INSERT INTO `china` VALUES ('630122', '湟中县', '630100');
INSERT INTO `china` VALUES ('630123', '湟源县', '630100');
INSERT INTO `china` VALUES ('630200', '海东市', '630000');
INSERT INTO `china` VALUES ('630202', '乐都区', '630200');
INSERT INTO `china` VALUES ('630203', '平安区', '630200');
INSERT INTO `china` VALUES ('630222', '民和回族土族自治县', '630200');
INSERT INTO `china` VALUES ('630223', '互助土族自治县', '630200');
INSERT INTO `china` VALUES ('630224', '化隆回族自治县', '630200');
INSERT INTO `china` VALUES ('630225', '循化撒拉族自治县', '630200');
INSERT INTO `china` VALUES ('632200', '海北藏族自治州', '630000');
INSERT INTO `china` VALUES ('632221', '门源回族自治县', '632200');
INSERT INTO `china` VALUES ('632222', '祁连县', '632200');
INSERT INTO `china` VALUES ('632223', '海晏县', '632200');
INSERT INTO `china` VALUES ('632224', '刚察县', '632200');
INSERT INTO `china` VALUES ('632300', '黄南藏族自治州', '630000');
INSERT INTO `china` VALUES ('632321', '同仁县', '632300');
INSERT INTO `china` VALUES ('632322', '尖扎县', '632300');
INSERT INTO `china` VALUES ('632323', '泽库县', '632300');
INSERT INTO `china` VALUES ('632324', '河南蒙古族自治县', '632300');
INSERT INTO `china` VALUES ('632500', '海南藏族自治州', '630000');
INSERT INTO `china` VALUES ('632521', '共和县', '632500');
INSERT INTO `china` VALUES ('632522', '同德县', '632500');
INSERT INTO `china` VALUES ('632523', '贵德县', '632500');
INSERT INTO `china` VALUES ('632524', '兴海县', '632500');
INSERT INTO `china` VALUES ('632525', '贵南县', '632500');
INSERT INTO `china` VALUES ('632600', '果洛藏族自治州', '630000');
INSERT INTO `china` VALUES ('632621', '玛沁县', '632600');
INSERT INTO `china` VALUES ('632622', '班玛县', '632600');
INSERT INTO `china` VALUES ('632623', '甘德县', '632600');
INSERT INTO `china` VALUES ('632624', '达日县', '632600');
INSERT INTO `china` VALUES ('632625', '久治县', '632600');
INSERT INTO `china` VALUES ('632626', '玛多县', '632600');
INSERT INTO `china` VALUES ('632700', '玉树藏族自治州', '630000');
INSERT INTO `china` VALUES ('632701', '玉树市', '632700');
INSERT INTO `china` VALUES ('632722', '杂多县', '632700');
INSERT INTO `china` VALUES ('632723', '称多县', '632700');
INSERT INTO `china` VALUES ('632724', '治多县', '632700');
INSERT INTO `china` VALUES ('632725', '囊谦县', '632700');
INSERT INTO `china` VALUES ('632726', '曲麻莱县', '632700');
INSERT INTO `china` VALUES ('632800', '海西蒙古族藏族自治州', '630000');
INSERT INTO `china` VALUES ('632801', '格尔木市', '632800');
INSERT INTO `china` VALUES ('632802', '德令哈市', '632800');
INSERT INTO `china` VALUES ('632821', '乌兰县', '632800');
INSERT INTO `china` VALUES ('632822', '都兰县', '632800');
INSERT INTO `china` VALUES ('632823', '天峻县', '632800');
INSERT INTO `china` VALUES ('640000', '宁夏回族自治区', '0');
INSERT INTO `china` VALUES ('640100', '银川市', '640000');
INSERT INTO `china` VALUES ('640104', '兴庆区', '640100');
INSERT INTO `china` VALUES ('640105', '西夏区', '640100');
INSERT INTO `china` VALUES ('640106', '金凤区', '640100');
INSERT INTO `china` VALUES ('640121', '永宁县', '640100');
INSERT INTO `china` VALUES ('640122', '贺兰县', '640100');
INSERT INTO `china` VALUES ('640181', '灵武市', '640100');
INSERT INTO `china` VALUES ('640200', '石嘴山市', '640000');
INSERT INTO `china` VALUES ('640202', '大武口区', '640200');
INSERT INTO `china` VALUES ('640205', '惠农区', '640200');
INSERT INTO `china` VALUES ('640221', '平罗县', '640200');
INSERT INTO `china` VALUES ('640300', '吴忠市', '640000');
INSERT INTO `china` VALUES ('640302', '利通区', '640300');
INSERT INTO `china` VALUES ('640303', '红寺堡区', '640300');
INSERT INTO `china` VALUES ('640323', '盐池县', '640300');
INSERT INTO `china` VALUES ('640324', '同心县', '640300');
INSERT INTO `china` VALUES ('640381', '青铜峡市', '640300');
INSERT INTO `china` VALUES ('640400', '固原市', '640000');
INSERT INTO `china` VALUES ('640402', '原州区', '640400');
INSERT INTO `china` VALUES ('640422', '西吉县', '640400');
INSERT INTO `china` VALUES ('640423', '隆德县', '640400');
INSERT INTO `china` VALUES ('640424', '泾源县', '640400');
INSERT INTO `china` VALUES ('640425', '彭阳县', '640400');
INSERT INTO `china` VALUES ('640500', '中卫市', '640000');
INSERT INTO `china` VALUES ('640502', '沙坡头区', '640500');
INSERT INTO `china` VALUES ('640521', '中宁县', '640500');
INSERT INTO `china` VALUES ('640522', '海原县', '640500');
INSERT INTO `china` VALUES ('650000', '新疆维吾尔自治区', '0');
INSERT INTO `china` VALUES ('650100', '乌鲁木齐市', '650000');
INSERT INTO `china` VALUES ('650102', '天山区', '650100');
INSERT INTO `china` VALUES ('650103', '沙依巴克区', '650100');
INSERT INTO `china` VALUES ('650104', '新市区', '650100');
INSERT INTO `china` VALUES ('650105', '水磨沟区', '650100');
INSERT INTO `china` VALUES ('650106', '头屯河区', '650100');
INSERT INTO `china` VALUES ('650107', '达坂城区', '650100');
INSERT INTO `china` VALUES ('650109', '米东区', '650100');
INSERT INTO `china` VALUES ('650121', '乌鲁木齐县', '650100');
INSERT INTO `china` VALUES ('650200', '克拉玛依市', '650000');
INSERT INTO `china` VALUES ('650202', '独山子区', '650200');
INSERT INTO `china` VALUES ('650203', '克拉玛依区', '650200');
INSERT INTO `china` VALUES ('650204', '白碱滩区', '650200');
INSERT INTO `china` VALUES ('650205', '乌尔禾区', '650200');
INSERT INTO `china` VALUES ('650400', '吐鲁番市', '650000');
INSERT INTO `china` VALUES ('650402', '高昌区', '650400');
INSERT INTO `china` VALUES ('650421', '鄯善县', '650400');
INSERT INTO `china` VALUES ('650422', '托克逊县', '650400');
INSERT INTO `china` VALUES ('652200', '哈密地区', '650000');
INSERT INTO `china` VALUES ('652201', '哈密市', '652200');
INSERT INTO `china` VALUES ('652222', '巴里坤哈萨克自治县', '652200');
INSERT INTO `china` VALUES ('652223', '伊吾县', '652200');
INSERT INTO `china` VALUES ('652300', '昌吉回族自治州', '650000');
INSERT INTO `china` VALUES ('652301', '昌吉市', '652300');
INSERT INTO `china` VALUES ('652302', '阜康市', '652300');
INSERT INTO `china` VALUES ('652323', '呼图壁县', '652300');
INSERT INTO `china` VALUES ('652324', '玛纳斯县', '652300');
INSERT INTO `china` VALUES ('652325', '奇台县', '652300');
INSERT INTO `china` VALUES ('652327', '吉木萨尔县', '652300');
INSERT INTO `china` VALUES ('652328', '木垒哈萨克自治县', '652300');
INSERT INTO `china` VALUES ('652700', '博尔塔拉蒙古自治州', '650000');
INSERT INTO `china` VALUES ('652701', '博乐市', '652700');
INSERT INTO `china` VALUES ('652702', '阿拉山口市', '652700');
INSERT INTO `china` VALUES ('652722', '精河县', '652700');
INSERT INTO `china` VALUES ('652723', '温泉县', '652700');
INSERT INTO `china` VALUES ('652800', '巴音郭楞蒙古自治州', '650000');
INSERT INTO `china` VALUES ('652801', '库尔勒市', '652800');
INSERT INTO `china` VALUES ('652822', '轮台县', '652800');
INSERT INTO `china` VALUES ('652823', '尉犁县', '652800');
INSERT INTO `china` VALUES ('652824', '若羌县', '652800');
INSERT INTO `china` VALUES ('652825', '且末县', '652800');
INSERT INTO `china` VALUES ('652826', '焉耆回族自治县', '652800');
INSERT INTO `china` VALUES ('652827', '和静县', '652800');
INSERT INTO `china` VALUES ('652828', '和硕县', '652800');
INSERT INTO `china` VALUES ('652829', '博湖县', '652800');
INSERT INTO `china` VALUES ('652900', '阿克苏地区', '650000');
INSERT INTO `china` VALUES ('652901', '阿克苏市', '652900');
INSERT INTO `china` VALUES ('652922', '温宿县', '652900');
INSERT INTO `china` VALUES ('652923', '库车县', '652900');
INSERT INTO `china` VALUES ('652924', '沙雅县', '652900');
INSERT INTO `china` VALUES ('652925', '新和县', '652900');
INSERT INTO `china` VALUES ('652926', '拜城县', '652900');
INSERT INTO `china` VALUES ('652927', '乌什县', '652900');
INSERT INTO `china` VALUES ('652928', '阿瓦提县', '652900');
INSERT INTO `china` VALUES ('652929', '柯坪县', '652900');
INSERT INTO `china` VALUES ('653000', '克孜勒苏柯尔克孜自治州', '650000');
INSERT INTO `china` VALUES ('653001', '阿图什市', '653000');
INSERT INTO `china` VALUES ('653022', '阿克陶县', '653000');
INSERT INTO `china` VALUES ('653023', '阿合奇县', '653000');
INSERT INTO `china` VALUES ('653024', '乌恰县', '653000');
INSERT INTO `china` VALUES ('653100', '喀什地区', '650000');
INSERT INTO `china` VALUES ('653101', '喀什市', '653100');
INSERT INTO `china` VALUES ('653121', '疏附县', '653100');
INSERT INTO `china` VALUES ('653122', '疏勒县', '653100');
INSERT INTO `china` VALUES ('653123', '英吉沙县', '653100');
INSERT INTO `china` VALUES ('653124', '泽普县', '653100');
INSERT INTO `china` VALUES ('653125', '莎车县', '653100');
INSERT INTO `china` VALUES ('653126', '叶城县', '653100');
INSERT INTO `china` VALUES ('653127', '麦盖提县', '653100');
INSERT INTO `china` VALUES ('653128', '岳普湖县', '653100');
INSERT INTO `china` VALUES ('653129', '伽师县', '653100');
INSERT INTO `china` VALUES ('653130', '巴楚县', '653100');
INSERT INTO `china` VALUES ('653131', '塔什库尔干塔吉克自治县', '653100');
INSERT INTO `china` VALUES ('653200', '和田地区', '650000');
INSERT INTO `china` VALUES ('653201', '和田市', '653200');
INSERT INTO `china` VALUES ('653221', '和田县', '653200');
INSERT INTO `china` VALUES ('653222', '墨玉县', '653200');
INSERT INTO `china` VALUES ('653223', '皮山县', '653200');
INSERT INTO `china` VALUES ('653224', '洛浦县', '653200');
INSERT INTO `china` VALUES ('653225', '策勒县', '653200');
INSERT INTO `china` VALUES ('653226', '于田县', '653200');
INSERT INTO `china` VALUES ('653227', '民丰县', '653200');
INSERT INTO `china` VALUES ('654000', '伊犁哈萨克自治州', '650000');
INSERT INTO `china` VALUES ('654002', '伊宁市', '654000');
INSERT INTO `china` VALUES ('654003', '奎屯市', '654000');
INSERT INTO `china` VALUES ('654004', '霍尔果斯市', '654000');
INSERT INTO `china` VALUES ('654021', '伊宁县', '654000');
INSERT INTO `china` VALUES ('654022', '察布查尔锡伯自治县', '654000');
INSERT INTO `china` VALUES ('654023', '霍城县', '654000');
INSERT INTO `china` VALUES ('654024', '巩留县', '654000');
INSERT INTO `china` VALUES ('654025', '新源县', '654000');
INSERT INTO `china` VALUES ('654026', '昭苏县', '654000');
INSERT INTO `china` VALUES ('654027', '特克斯县', '654000');
INSERT INTO `china` VALUES ('654028', '尼勒克县', '654000');
INSERT INTO `china` VALUES ('654200', '塔城地区', '650000');
INSERT INTO `china` VALUES ('654201', '塔城市', '654200');
INSERT INTO `china` VALUES ('654202', '乌苏市', '654200');
INSERT INTO `china` VALUES ('654221', '额敏县', '654200');
INSERT INTO `china` VALUES ('654223', '沙湾县', '654200');
INSERT INTO `china` VALUES ('654224', '托里县', '654200');
INSERT INTO `china` VALUES ('654225', '裕民县', '654200');
INSERT INTO `china` VALUES ('654226', '和布克赛尔蒙古自治县', '654200');
INSERT INTO `china` VALUES ('654300', '阿勒泰地区', '650000');
INSERT INTO `china` VALUES ('654301', '阿勒泰市', '654300');
INSERT INTO `china` VALUES ('654321', '布尔津县', '654300');
INSERT INTO `china` VALUES ('654322', '富蕴县', '654300');
INSERT INTO `china` VALUES ('654323', '福海县', '654300');
INSERT INTO `china` VALUES ('654324', '哈巴河县', '654300');
INSERT INTO `china` VALUES ('654325', '青河县', '654300');
INSERT INTO `china` VALUES ('654326', '吉木乃县', '654300');
INSERT INTO `china` VALUES ('654390', '北屯市', '654300');
INSERT INTO `china` VALUES ('659000', '自治区直辖县级行政区划', '650000');
INSERT INTO `china` VALUES ('659001', '石河子市', '659000');
INSERT INTO `china` VALUES ('659002', '阿拉尔市', '659000');
INSERT INTO `china` VALUES ('659003', '图木舒克市', '659000');
INSERT INTO `china` VALUES ('659004', '五家渠市', '659000');
INSERT INTO `china` VALUES ('710000', '台湾省', '0');
INSERT INTO `china` VALUES ('710100', '台北市', '710000');
INSERT INTO `china` VALUES ('710101', '中正区', '710100');
INSERT INTO `china` VALUES ('710102', '大同区', '710100');
INSERT INTO `china` VALUES ('710103', '中山区', '710100');
INSERT INTO `china` VALUES ('710104', '松山区', '710100');
INSERT INTO `china` VALUES ('710105', '大安区', '710100');
INSERT INTO `china` VALUES ('710106', '万华区', '710100');
INSERT INTO `china` VALUES ('710107', '信义区', '710100');
INSERT INTO `china` VALUES ('710108', '士林区', '710100');
INSERT INTO `china` VALUES ('710109', '北投区', '710100');
INSERT INTO `china` VALUES ('710110', '内湖区', '710100');
INSERT INTO `china` VALUES ('710111', '南港区', '710100');
INSERT INTO `china` VALUES ('710112', '文山区', '710100');
INSERT INTO `china` VALUES ('710199', '其它区', '710100');
INSERT INTO `china` VALUES ('710200', '高雄市', '710000');
INSERT INTO `china` VALUES ('710201', '新兴区', '710200');
INSERT INTO `china` VALUES ('710202', '前金区', '710200');
INSERT INTO `china` VALUES ('710203', '芩雅区', '710200');
INSERT INTO `china` VALUES ('710204', '盐埕区', '710200');
INSERT INTO `china` VALUES ('710205', '鼓山区', '710200');
INSERT INTO `china` VALUES ('710206', '旗津区', '710200');
INSERT INTO `china` VALUES ('710207', '前镇区', '710200');
INSERT INTO `china` VALUES ('710208', '三民区', '710200');
INSERT INTO `china` VALUES ('710209', '左营区', '710200');
INSERT INTO `china` VALUES ('710210', '楠梓区', '710200');
INSERT INTO `china` VALUES ('710211', '小港区', '710200');
INSERT INTO `china` VALUES ('710241', '苓雅区', '710200');
INSERT INTO `china` VALUES ('710242', '仁武区', '710200');
INSERT INTO `china` VALUES ('710243', '大社区', '710200');
INSERT INTO `china` VALUES ('710244', '冈山区', '710200');
INSERT INTO `china` VALUES ('710245', '路竹区', '710200');
INSERT INTO `china` VALUES ('710246', '阿莲区', '710200');
INSERT INTO `china` VALUES ('710247', '田寮区', '710200');
INSERT INTO `china` VALUES ('710248', '燕巢区', '710200');
INSERT INTO `china` VALUES ('710249', '桥头区', '710200');
INSERT INTO `china` VALUES ('710250', '梓官区', '710200');
INSERT INTO `china` VALUES ('710251', '弥陀区', '710200');
INSERT INTO `china` VALUES ('710252', '永安区', '710200');
INSERT INTO `china` VALUES ('710253', '湖内区', '710200');
INSERT INTO `china` VALUES ('710254', '凤山区', '710200');
INSERT INTO `china` VALUES ('710255', '大寮区', '710200');
INSERT INTO `china` VALUES ('710256', '林园区', '710200');
INSERT INTO `china` VALUES ('710257', '鸟松区', '710200');
INSERT INTO `china` VALUES ('710258', '大树区', '710200');
INSERT INTO `china` VALUES ('710259', '旗山区', '710200');
INSERT INTO `china` VALUES ('710260', '美浓区', '710200');
INSERT INTO `china` VALUES ('710261', '六龟区', '710200');
INSERT INTO `china` VALUES ('710262', '内门区', '710200');
INSERT INTO `china` VALUES ('710263', '杉林区', '710200');
INSERT INTO `china` VALUES ('710264', '甲仙区', '710200');
INSERT INTO `china` VALUES ('710265', '桃源区', '710200');
INSERT INTO `china` VALUES ('710266', '那玛夏区', '710200');
INSERT INTO `china` VALUES ('710267', '茂林区', '710200');
INSERT INTO `china` VALUES ('710268', '茄萣区', '710200');
INSERT INTO `china` VALUES ('710299', '其它区', '710200');
INSERT INTO `china` VALUES ('710300', '台南市', '710000');
INSERT INTO `china` VALUES ('710301', '中西区', '710300');
INSERT INTO `china` VALUES ('710302', '东区', '710300');
INSERT INTO `china` VALUES ('710303', '南区', '710300');
INSERT INTO `china` VALUES ('710304', '北区', '710300');
INSERT INTO `china` VALUES ('710305', '安平区', '710300');
INSERT INTO `china` VALUES ('710306', '安南区', '710300');
INSERT INTO `china` VALUES ('710339', '永康区', '710300');
INSERT INTO `china` VALUES ('710340', '归仁区', '710300');
INSERT INTO `china` VALUES ('710341', '新化区', '710300');
INSERT INTO `china` VALUES ('710342', '左镇区', '710300');
INSERT INTO `china` VALUES ('710343', '玉井区', '710300');
INSERT INTO `china` VALUES ('710344', '楠西区', '710300');
INSERT INTO `china` VALUES ('710345', '南化区', '710300');
INSERT INTO `china` VALUES ('710346', '仁德区', '710300');
INSERT INTO `china` VALUES ('710347', '关庙区', '710300');
INSERT INTO `china` VALUES ('710348', '龙崎区', '710300');
INSERT INTO `china` VALUES ('710349', '官田区', '710300');
INSERT INTO `china` VALUES ('710350', '麻豆区', '710300');
INSERT INTO `china` VALUES ('710351', '佳里区', '710300');
INSERT INTO `china` VALUES ('710352', '西港区', '710300');
INSERT INTO `china` VALUES ('710353', '七股区', '710300');
INSERT INTO `china` VALUES ('710354', '将军区', '710300');
INSERT INTO `china` VALUES ('710355', '学甲区', '710300');
INSERT INTO `china` VALUES ('710356', '北门区', '710300');
INSERT INTO `china` VALUES ('710357', '新营区', '710300');
INSERT INTO `china` VALUES ('710358', '后壁区', '710300');
INSERT INTO `china` VALUES ('710359', '白河区', '710300');
INSERT INTO `china` VALUES ('710360', '东山区', '710300');
INSERT INTO `china` VALUES ('710361', '六甲区', '710300');
INSERT INTO `china` VALUES ('710362', '下营区', '710300');
INSERT INTO `china` VALUES ('710363', '柳营区', '710300');
INSERT INTO `china` VALUES ('710364', '盐水区', '710300');
INSERT INTO `china` VALUES ('710365', '善化区', '710300');
INSERT INTO `china` VALUES ('710366', '大内区', '710300');
INSERT INTO `china` VALUES ('710367', '山上区', '710300');
INSERT INTO `china` VALUES ('710368', '新市区', '710300');
INSERT INTO `china` VALUES ('710369', '安定区', '710300');
INSERT INTO `china` VALUES ('710399', '其它区', '710300');
INSERT INTO `china` VALUES ('710400', '台中市', '710000');
INSERT INTO `china` VALUES ('710401', '中区', '710400');
INSERT INTO `china` VALUES ('710402', '东区', '710400');
INSERT INTO `china` VALUES ('710403', '南区', '710400');
INSERT INTO `china` VALUES ('710404', '西区', '710400');
INSERT INTO `china` VALUES ('710405', '北区', '710400');
INSERT INTO `china` VALUES ('710406', '北屯区', '710400');
INSERT INTO `china` VALUES ('710407', '西屯区', '710400');
INSERT INTO `china` VALUES ('710408', '南屯区', '710400');
INSERT INTO `china` VALUES ('710431', '太平区', '710400');
INSERT INTO `china` VALUES ('710432', '大里区', '710400');
INSERT INTO `china` VALUES ('710433', '雾峰区', '710400');
INSERT INTO `china` VALUES ('710434', '乌日区', '710400');
INSERT INTO `china` VALUES ('710435', '丰原区', '710400');
INSERT INTO `china` VALUES ('710436', '后里区', '710400');
INSERT INTO `china` VALUES ('710437', '石冈区', '710400');
INSERT INTO `china` VALUES ('710438', '东势区', '710400');
INSERT INTO `china` VALUES ('710439', '和平区', '710400');
INSERT INTO `china` VALUES ('710440', '新社区', '710400');
INSERT INTO `china` VALUES ('710441', '潭子区', '710400');
INSERT INTO `china` VALUES ('710442', '大雅区', '710400');
INSERT INTO `china` VALUES ('710443', '神冈区', '710400');
INSERT INTO `china` VALUES ('710444', '大肚区', '710400');
INSERT INTO `china` VALUES ('710445', '沙鹿区', '710400');
INSERT INTO `china` VALUES ('710446', '龙井区', '710400');
INSERT INTO `china` VALUES ('710447', '梧栖区', '710400');
INSERT INTO `china` VALUES ('710448', '清水区', '710400');
INSERT INTO `china` VALUES ('710449', '大甲区', '710400');
INSERT INTO `china` VALUES ('710450', '外埔区', '710400');
INSERT INTO `china` VALUES ('710451', '大安区', '710400');
INSERT INTO `china` VALUES ('710499', '其它区', '710400');
INSERT INTO `china` VALUES ('710500', '金门县', '710000');
INSERT INTO `china` VALUES ('710507', '金沙镇', '710500');
INSERT INTO `china` VALUES ('710508', '金湖镇', '710500');
INSERT INTO `china` VALUES ('710509', '金宁乡', '710500');
INSERT INTO `china` VALUES ('710510', '金城镇', '710500');
INSERT INTO `china` VALUES ('710511', '烈屿乡', '710500');
INSERT INTO `china` VALUES ('710512', '乌坵乡', '710500');
INSERT INTO `china` VALUES ('710600', '南投县', '710000');
INSERT INTO `china` VALUES ('710614', '南投市', '710600');
INSERT INTO `china` VALUES ('710615', '中寮乡', '710600');
INSERT INTO `china` VALUES ('710616', '草屯镇', '710600');
INSERT INTO `china` VALUES ('710617', '国姓乡', '710600');
INSERT INTO `china` VALUES ('710618', '埔里镇', '710600');
INSERT INTO `china` VALUES ('710619', '仁爱乡', '710600');
INSERT INTO `china` VALUES ('710620', '名间乡', '710600');
INSERT INTO `china` VALUES ('710621', '集集镇', '710600');
INSERT INTO `china` VALUES ('710622', '水里乡', '710600');
INSERT INTO `china` VALUES ('710623', '鱼池乡', '710600');
INSERT INTO `china` VALUES ('710624', '信义乡', '710600');
INSERT INTO `china` VALUES ('710625', '竹山镇', '710600');
INSERT INTO `china` VALUES ('710626', '鹿谷乡', '710600');
INSERT INTO `china` VALUES ('710700', '基隆市', '710000');
INSERT INTO `china` VALUES ('710701', '仁爱区', '710700');
INSERT INTO `china` VALUES ('710702', '信义区', '710700');
INSERT INTO `china` VALUES ('710703', '中正区', '710700');
INSERT INTO `china` VALUES ('710704', '中山区', '710700');
INSERT INTO `china` VALUES ('710705', '安乐区', '710700');
INSERT INTO `china` VALUES ('710706', '暖暖区', '710700');
INSERT INTO `china` VALUES ('710707', '七堵区', '710700');
INSERT INTO `china` VALUES ('710799', '其它区', '710700');
INSERT INTO `china` VALUES ('710800', '新竹市', '710000');
INSERT INTO `china` VALUES ('710801', '东区', '710800');
INSERT INTO `china` VALUES ('710802', '北区', '710800');
INSERT INTO `china` VALUES ('710803', '香山区', '710800');
INSERT INTO `china` VALUES ('710899', '其它区', '710800');
INSERT INTO `china` VALUES ('710900', '嘉义市', '710000');
INSERT INTO `china` VALUES ('710901', '东区', '710900');
INSERT INTO `china` VALUES ('710902', '西区', '710900');
INSERT INTO `china` VALUES ('710999', '其它区', '710900');
INSERT INTO `china` VALUES ('711100', '新北市', '710000');
INSERT INTO `china` VALUES ('711130', '万里区', '711100');
INSERT INTO `china` VALUES ('711132', '板桥区', '711100');
INSERT INTO `china` VALUES ('711133', '汐止区', '711100');
INSERT INTO `china` VALUES ('711134', '深坑区', '711100');
INSERT INTO `china` VALUES ('711136', '瑞芳区', '711100');
INSERT INTO `china` VALUES ('711137', '平溪区', '711100');
INSERT INTO `china` VALUES ('711138', '双溪区', '711100');
INSERT INTO `china` VALUES ('711140', '新店区', '711100');
INSERT INTO `china` VALUES ('711141', '坪林区', '711100');
INSERT INTO `china` VALUES ('711142', '乌来区', '711100');
INSERT INTO `china` VALUES ('711143', '永和区', '711100');
INSERT INTO `china` VALUES ('711144', '中和区', '711100');
INSERT INTO `china` VALUES ('711145', '土城区', '711100');
INSERT INTO `china` VALUES ('711146', '三峡区', '711100');
INSERT INTO `china` VALUES ('711147', '树林区', '711100');
INSERT INTO `china` VALUES ('711149', '三重区', '711100');
INSERT INTO `china` VALUES ('711150', '新庄区', '711100');
INSERT INTO `china` VALUES ('711151', '泰山区', '711100');
INSERT INTO `china` VALUES ('711152', '林口区', '711100');
INSERT INTO `china` VALUES ('711154', '五股区', '711100');
INSERT INTO `china` VALUES ('711155', '八里区', '711100');
INSERT INTO `china` VALUES ('711156', '淡水区', '711100');
INSERT INTO `china` VALUES ('711157', '三芝区', '711100');
INSERT INTO `china` VALUES ('711200', '宜兰县', '710000');
INSERT INTO `china` VALUES ('711300', '新竹县', '710000');
INSERT INTO `china` VALUES ('711400', '桃园县', '710000');
INSERT INTO `china` VALUES ('711500', '苗栗县', '710000');
INSERT INTO `china` VALUES ('711700', '彰化县', '710000');
INSERT INTO `china` VALUES ('711900', '嘉义县', '710000');
INSERT INTO `china` VALUES ('712100', '云林县', '710000');
INSERT INTO `china` VALUES ('712400', '屏东县', '710000');
INSERT INTO `china` VALUES ('712500', '台东县', '710000');
INSERT INTO `china` VALUES ('712600', '花莲县', '710000');
INSERT INTO `china` VALUES ('712700', '澎湖县', '710000');
INSERT INTO `china` VALUES ('712800', '连江县', '710000');
INSERT INTO `china` VALUES ('810000', '香港特别行政区', '0');
INSERT INTO `china` VALUES ('810100', '香港岛', '810000');
INSERT INTO `china` VALUES ('810101', '中西区', '810100');
INSERT INTO `china` VALUES ('810102', '湾仔', '810100');
INSERT INTO `china` VALUES ('810103', '东区', '810100');
INSERT INTO `china` VALUES ('810104', '南区', '810100');
INSERT INTO `china` VALUES ('810200', '九龙', '810000');
INSERT INTO `china` VALUES ('810201', '九龙城区', '810200');
INSERT INTO `china` VALUES ('810202', '油尖旺区', '810200');
INSERT INTO `china` VALUES ('810203', '深水埗区', '810200');
INSERT INTO `china` VALUES ('810204', '黄大仙区', '810200');
INSERT INTO `china` VALUES ('810205', '观塘区', '810200');
INSERT INTO `china` VALUES ('810300', '新界', '810000');
INSERT INTO `china` VALUES ('810301', '北区', '810300');
INSERT INTO `china` VALUES ('810302', '大埔区', '810300');
INSERT INTO `china` VALUES ('810303', '沙田区', '810300');
INSERT INTO `china` VALUES ('810304', '西贡区', '810300');
INSERT INTO `china` VALUES ('810305', '元朗区', '810300');
INSERT INTO `china` VALUES ('810306', '屯门区', '810300');
INSERT INTO `china` VALUES ('810307', '荃湾区', '810300');
INSERT INTO `china` VALUES ('810308', '葵青区', '810300');
INSERT INTO `china` VALUES ('810309', '离岛区', '810300');
INSERT INTO `china` VALUES ('820000', '澳门特别行政区', '0');
INSERT INTO `china` VALUES ('820100', '澳门半岛', '820000');
INSERT INTO `china` VALUES ('820101', '澳门半岛', '820100');
INSERT INTO `china` VALUES ('820200', '离岛', '820000');
INSERT INTO `china` VALUES ('820201', '离岛', '820200');

-- ----------------------------
-- Table structure for code
-- ----------------------------
DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `TYPE` smallint(6) DEFAULT NULL COMMENT '1:语音验证，2：短信验证',
  `MOBILE` bigint(20) unsigned DEFAULT NULL,
  `CODE` varchar(20) DEFAULT NULL,
  `SHIJIAN` datetime DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL COMMENT '1:商城注册，2：APP注册',
  `MODULE_ID` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `MOBILE` (`MOBILE`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=144799 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of code
-- ----------------------------
INSERT INTO `code` VALUES ('144754', '0', null, '13708954375', '268721', '2017-08-07 11:04:35', null, '1');
INSERT INTO `code` VALUES ('144755', '0', null, '13708954375', '340596', '2017-08-07 11:05:10', null, '1');
INSERT INTO `code` VALUES ('144756', '71', null, '13708954375', '188524', '2017-08-07 11:09:16', null, '1');
INSERT INTO `code` VALUES ('144757', '0', null, '13720886425', '597986', '2017-09-12 17:06:52', null, '1');
INSERT INTO `code` VALUES ('144758', '0', null, '13156483821', '616439', '2017-10-10 17:52:20', null, '1');
INSERT INTO `code` VALUES ('144759', '0', null, '17190840095', '405363', '2017-10-16 12:26:21', null, '1');
INSERT INTO `code` VALUES ('144760', '0', null, '13005409638', '709840', '2017-11-03 14:01:04', null, '1');
INSERT INTO `code` VALUES ('144761', '0', null, '13708954375', '391216', '2017-11-11 22:31:06', null, '1');
INSERT INTO `code` VALUES ('144762', '0', null, '17620608861', '449543', '2017-11-18 07:55:54', null, '1');
INSERT INTO `code` VALUES ('144763', '0', null, '18768846153', '938853', '2017-11-24 16:53:27', null, '1');
INSERT INTO `code` VALUES ('144764', '0', null, '18584563931', '490881', '2017-11-26 20:34:38', null, '1');
INSERT INTO `code` VALUES ('144765', '0', null, '13651087343', '043481', '2017-12-04 14:12:12', null, '1');
INSERT INTO `code` VALUES ('144766', '0', null, '13708954375', '327784', '2017-12-15 10:09:39', null, '1');
INSERT INTO `code` VALUES ('144767', '0', null, '13708954375', '348364', '2017-12-15 10:10:33', null, '1');
INSERT INTO `code` VALUES ('144768', '0', null, '15876244704', '863063', '2017-12-27 14:04:48', null, '1');
INSERT INTO `code` VALUES ('144769', '0', null, '15876244704', '023913', '2017-12-27 14:05:19', null, '1');
INSERT INTO `code` VALUES ('144770', '0', null, '15876244704', '260920', '2017-12-27 14:05:58', null, '1');
INSERT INTO `code` VALUES ('144771', '0', null, '15271212537', '092933', '2017-12-27 14:18:18', null, '1');
INSERT INTO `code` VALUES ('144772', '0', null, '13708954375', '034749', '2017-12-29 10:17:16', null, '1');
INSERT INTO `code` VALUES ('144773', '0', null, '13708954375', '046920', '2017-12-29 10:18:37', null, '1');
INSERT INTO `code` VALUES ('144774', '0', null, '13708954375', '750925', '2017-12-29 10:19:23', null, '1');
INSERT INTO `code` VALUES ('144775', '0', null, '13708954375', '313916', '2017-12-29 10:20:45', null, '1');
INSERT INTO `code` VALUES ('144776', '71', null, '13708954375', '368197', '2017-12-29 10:25:25', null, '1');
INSERT INTO `code` VALUES ('144777', '0', null, '18688793316', '100442', '2017-12-29 17:24:38', null, '1');
INSERT INTO `code` VALUES ('144778', '0', null, '15723141854', '035852', '2018-01-09 20:03:34', null, '1');
INSERT INTO `code` VALUES ('144779', '0', null, '13929329809', '894967', '2018-01-25 00:26:21', null, '1');
INSERT INTO `code` VALUES ('144780', '0', null, '17190840095', '525063', '2018-01-29 17:53:11', null, '1');
INSERT INTO `code` VALUES ('144781', '0', null, '15000000000', '229944', '2018-02-05 17:50:18', null, '1');
INSERT INTO `code` VALUES ('144782', '0', null, '18561849239', '445971', '2018-02-08 13:27:45', null, '1');
INSERT INTO `code` VALUES ('144783', '0', null, '18065048384', '466425', '2018-03-03 19:15:51', null, '1');
INSERT INTO `code` VALUES ('144784', '0', null, '18034113966', '194365', '2018-03-12 21:19:45', null, '1');
INSERT INTO `code` VALUES ('144785', '0', null, '18501308845', '963291', '2018-03-28 11:12:37', null, '1');
INSERT INTO `code` VALUES ('144786', '0', null, '13333333333', '146195', '2018-04-02 16:54:31', null, '1');
INSERT INTO `code` VALUES ('144787', '0', null, '13708954377', '610471', '2018-04-26 14:56:12', null, '1');
INSERT INTO `code` VALUES ('144788', '0', null, '13708954377', '669686', '2018-04-26 15:14:11', null, '1');
INSERT INTO `code` VALUES ('144789', '0', null, '13708954377', '090016', '2018-04-26 15:26:00', null, '1');
INSERT INTO `code` VALUES ('144790', '0', null, '18655256637', '429350', '2018-04-27 11:30:40', null, '1');
INSERT INTO `code` VALUES ('144791', '0', null, '18655256637', '150884', '2018-04-27 11:32:45', null, '1');
INSERT INTO `code` VALUES ('144792', '0', null, '13339083570', '832217', '2018-04-27 18:19:37', null, '1');
INSERT INTO `code` VALUES ('144793', '0', null, '18010694675', '174874', '2018-04-28 00:41:37', null, '1');
INSERT INTO `code` VALUES ('144794', '0', null, '15196823802', '191593', '2018-05-02 15:03:12', null, '1');
INSERT INTO `code` VALUES ('144795', '0', null, '18790878923', '780545', '2018-05-03 16:17:07', null, '1');
INSERT INTO `code` VALUES ('144796', '0', null, '13640332114', '743254', '2018-05-04 14:35:59', null, '1');
INSERT INTO `code` VALUES ('144797', '0', null, '13640332115', '579038', '2018-05-04 14:36:38', null, '1');
INSERT INTO `code` VALUES ('144798', '0', null, '18638933359', '287563', '2018-05-07 02:06:37', null, '1');

-- ----------------------------
-- Table structure for discuss
-- ----------------------------
DROP TABLE IF EXISTS `discuss`;
CREATE TABLE `discuss` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT NULL,
  `MODULE_ID` int(11) DEFAULT '0',
  `MESS_ID` bigint(20) unsigned DEFAULT NULL,
  `MESS` varchar(200) DEFAULT NULL,
  `SEND_TIME` datetime DEFAULT NULL,
  `STATE` tinyint(1) DEFAULT '0',
  `POINT` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `MODULE_ID` (`MODULE_ID`),
  KEY `MESS_ID` (`MESS_ID`),
  KEY `STATE` (`STATE`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of discuss
-- ----------------------------
INSERT INTO `discuss` VALUES ('2', '71', '603', '341', '噢噢噢噢。。。', '2017-05-16 14:50:25', '1', '3');
INSERT INTO `discuss` VALUES ('3', '71', '603', '341', '噢噢噢噢。。。', '2017-05-16 14:50:45', '1', '3');
INSERT INTO `discuss` VALUES ('4', '71', '603', '341', '噢噢噢噢。。。', '2017-05-16 14:52:17', '1', '3');
INSERT INTO `discuss` VALUES ('5', '71', '603', '341', '上放水电费', '2017-05-16 15:12:58', '1', '4');

-- ----------------------------
-- Table structure for keep
-- ----------------------------
DROP TABLE IF EXISTS `keep`;
CREATE TABLE `keep` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT NULL,
  `MODULE_ID` int(11) DEFAULT NULL,
  `MESS_ID` bigint(20) unsigned DEFAULT NULL,
  `ADD_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `MODULE_ID` (`MODULE_ID`),
  KEY `MESS_ID` (`MESS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keep
-- ----------------------------

-- ----------------------------
-- Table structure for mall_attr
-- ----------------------------
DROP TABLE IF EXISTS `mall_attr`;
CREATE TABLE `mall_attr` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PARENT_ID` bigint(20) unsigned DEFAULT '0',
  `NAME` varchar(30) DEFAULT NULL,
  `SORT_ID` bigint(20) DEFAULT '0',
  `STATE` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `SORT_ID` (`SORT_ID`),
  KEY `PARENT_ID` (`PARENT_ID`),
  KEY `STATE` (`STATE`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mall_attr
-- ----------------------------
INSERT INTO `mall_attr` VALUES ('1', '0', '颜色', '168', '1');
INSERT INTO `mall_attr` VALUES ('2', '1', '白色', '0', '1');
INSERT INTO `mall_attr` VALUES ('3', '1', '黑色', '0', '1');
INSERT INTO `mall_attr` VALUES ('4', '0', '尺寸', '168', '1');
INSERT INTO `mall_attr` VALUES ('5', '4', '5寸', '0', '1');
INSERT INTO `mall_attr` VALUES ('6', '4', '6寸', '0', '1');
INSERT INTO `mall_attr` VALUES ('7', '4', '7寸', '0', '1');
INSERT INTO `mall_attr` VALUES ('8', '0', 'cpu型号', '168', '1');
INSERT INTO `mall_attr` VALUES ('9', '8', '1核', '0', '1');
INSERT INTO `mall_attr` VALUES ('10', '1', '2核', '0', '1');

-- ----------------------------
-- Table structure for mall_gui_ge
-- ----------------------------
DROP TABLE IF EXISTS `mall_gui_ge`;
CREATE TABLE `mall_gui_ge` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PARENT_ID` bigint(20) unsigned DEFAULT '0',
  `NAME` varchar(30) DEFAULT NULL,
  `SORT_ID` bigint(20) DEFAULT '0',
  `SORT_ID_PARENT` bigint(20) DEFAULT '0',
  `STATE` tinyint(4) DEFAULT '1',
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `SORT_ID` (`SORT_ID`),
  KEY `PARENT_ID` (`PARENT_ID`),
  KEY `STATE` (`STATE`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30726 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mall_gui_ge
-- ----------------------------
INSERT INTO `mall_gui_ge` VALUES ('1', '0', '颜色', '0', '0', '1', '0', '2018-03-14 11:23:11');
INSERT INTO `mall_gui_ge` VALUES ('2', '1', '白色', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('3', '1', '黑色', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('4', '0', '尺寸', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('5', '4', '5寸', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('6', '4', '6寸', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('7', '4', '7寸', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('8', '0', 'cpu型号', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('9', '8', '1核', '0', '0', '1', '0', '2018-03-15 14:20:04');
INSERT INTO `mall_gui_ge` VALUES ('10', '8', '2核', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('13', '0', '套餐', '0', '0', '1', '0', '2017-06-15 22:25:29');
INSERT INTO `mall_gui_ge` VALUES ('14', '13', '套餐1', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('15', '13', '套餐2', '0', '0', '1', '0', '2018-03-19 20:49:56');
INSERT INTO `mall_gui_ge` VALUES ('16', '13', '套餐3', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('25', '0', '尺寸', '0', '0', '1', '0', '2018-04-05 18:46:54');
INSERT INTO `mall_gui_ge` VALUES ('26', '25', '90*190cm', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('28', '25', '100*190cm', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('29', '25', '120*195cm', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('30', '25', '135*195cm', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('32', '25', '150*195cm', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('34', '25', '180*198cm', '0', '0', '1', '0', '2018-03-19 20:49:50');
INSERT INTO `mall_gui_ge` VALUES ('35', '25', '180*220cm', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('36', '25', '200*220cm', '0', '0', '1', '0', '2018-03-15 22:51:33');
INSERT INTO `mall_gui_ge` VALUES ('37', '25', '250*250cm', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('38', '25', '220*250cm', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('30707', '0', '天天天天02', '0', '354', '1', '0', '2018-03-14 10:20:06');
INSERT INTO `mall_gui_ge` VALUES ('30709', '30707', '谈2', '0', '0', '1', '0', null);
INSERT INTO `mall_gui_ge` VALUES ('30713', '0', '啊啊啊', '663', '651', '1', '0', '2017-06-15 23:50:54');
INSERT INTO `mall_gui_ge` VALUES ('30718', '30713', 'fff', '0', '0', '1', '0', '2017-06-24 22:35:26');

-- ----------------------------
-- Table structure for mall_sort
-- ----------------------------
DROP TABLE IF EXISTS `mall_sort`;
CREATE TABLE `mall_sort` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL DEFAULT '',
  `PARENT_ID` int(10) unsigned NOT NULL DEFAULT '0',
  `STATE` tinyint(4) DEFAULT '1',
  `TABS_SHOW` tinyint(4) DEFAULT '0' COMMENT '是否在首页TAB显示',
  `ORDER_NUM` bigint(20) unsigned DEFAULT '0',
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `PARENT_ID` (`PARENT_ID`),
  KEY `NAME` (`NAME`),
  KEY `ORDER_NUM` (`ORDER_NUM`),
  KEY `TABS_SHOW` (`TABS_SHOW`),
  KEY `STATE` (`STATE`)
) ENGINE=InnoDB AUTO_INCREMENT=1479 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mall_sort
-- ----------------------------
INSERT INTO `mall_sort` VALUES ('287', '生活服务', '0', '1', '0', '11', null);
INSERT INTO `mall_sort` VALUES ('288', '票务', '287', '1', '0', '2880', null);
INSERT INTO `mall_sort` VALUES ('289', '充值产品', '287', '1', '0', '2890', null);
INSERT INTO `mall_sort` VALUES ('311', '汽车用品', '0', '1', '0', '10', null);
INSERT INTO `mall_sort` VALUES ('335', '特殊配方奶粉', '333', '1', '0', '3350', null);
INSERT INTO `mall_sort` VALUES ('337', '妈妈奶粉', '333', '1', '0', '3370', null);
INSERT INTO `mall_sort` VALUES ('339', '婴儿奶粉', '333', '1', '0', '3390', null);
INSERT INTO `mall_sort` VALUES ('343', '洁面产品', '198', '1', '0', '3430', null);
INSERT INTO `mall_sort` VALUES ('344', '爽肤水', '198', '1', '0', '3440', null);
INSERT INTO `mall_sort` VALUES ('348', '服饰鞋包', '0', '1', '0', '9', null);
INSERT INTO `mall_sort` VALUES ('349', '男装', '348', '1', '0', '3490', null);
INSERT INTO `mall_sort` VALUES ('352', '个护美妆', '0', '1', '0', '8', null);
INSERT INTO `mall_sort` VALUES ('354', '母婴用品', '0', '1', '0', '7', null);
INSERT INTO `mall_sort` VALUES ('358', '车载电器', '311', '1', '0', '3580', null);
INSERT INTO `mall_sort` VALUES ('359', '奶粉', '354', '1', '0', '3590', null);
INSERT INTO `mall_sort` VALUES ('362', '美容清洁', '311', '1', '0', '3620', null);
INSERT INTO `mall_sort` VALUES ('363', '面部护理', '352', '1', '0', '3630', null);
INSERT INTO `mall_sort` VALUES ('366', '养护耗材', '311', '1', '0', '3660', null);
INSERT INTO `mall_sort` VALUES ('369', '洁面产品', '363', '1', '0', '3690', null);
INSERT INTO `mall_sort` VALUES ('370', '实用装饰', '311', '1', '0', '3700', null);
INSERT INTO `mall_sort` VALUES ('372', '爽肤水', '363', '1', '0', '3720', null);
INSERT INTO `mall_sort` VALUES ('373', '汽车配件', '311', '1', '0', '3730', null);
INSERT INTO `mall_sort` VALUES ('375', '安全自驾', '311', '1', '0', '3750', null);
INSERT INTO `mall_sort` VALUES ('377', '护肤精华', '363', '1', '0', '3770', null);
INSERT INTO `mall_sort` VALUES ('378', '面膜面贴', '363', '1', '0', '3780', null);
INSERT INTO `mall_sort` VALUES ('379', '汽车整车', '311', '1', '0', '3790', null);
INSERT INTO `mall_sort` VALUES ('380', '营养辅食', '354', '1', '0', '3800', null);
INSERT INTO `mall_sort` VALUES ('381', '洗车设备', '311', '1', '0', '3810', null);
INSERT INTO `mall_sort` VALUES ('382', '尿裤湿巾', '354', '1', '0', '3820', null);
INSERT INTO `mall_sort` VALUES ('383', '眼部护理', '363', '1', '0', '3830', null);
INSERT INTO `mall_sort` VALUES ('384', '喂养用品', '354', '1', '0', '3840', null);
INSERT INTO `mall_sort` VALUES ('386', '婴儿服饰', '354', '1', '0', '3860', null);
INSERT INTO `mall_sort` VALUES ('387', '女鞋', '348', '1', '0', '3870', null);
INSERT INTO `mall_sort` VALUES ('388', '导航仪', '312', '1', '0', '3880', null);
INSERT INTO `mall_sort` VALUES ('390', '洗护用品', '354', '1', '0', '3900', null);
INSERT INTO `mall_sort` VALUES ('391', '护肤套装', '363', '1', '0', '3910', null);
INSERT INTO `mall_sort` VALUES ('392', '充气泵', '312', '1', '0', '3920', null);
INSERT INTO `mall_sort` VALUES ('393', '孕产用品', '354', '1', '0', '3930', null);
INSERT INTO `mall_sort` VALUES ('394', '车载冰箱', '312', '1', '0', '3940', null);
INSERT INTO `mall_sort` VALUES ('395', '防晒隔离', '363', '1', '0', '3950', null);
INSERT INTO `mall_sort` VALUES ('396', '家居安全', '354', '1', '0', '3960', null);
INSERT INTO `mall_sort` VALUES ('397', '其他车载电器', '312', '1', '0', '3970', null);
INSERT INTO `mall_sort` VALUES ('398', '婴儿玩具', '354', '1', '0', '3980', null);
INSERT INTO `mall_sort` VALUES ('399', '乳液面霜', '363', '1', '0', '3990', null);
INSERT INTO `mall_sort` VALUES ('400', '行车记录仪', '312', '1', '0', '4000', null);
INSERT INTO `mall_sort` VALUES ('402', '车载电源', '312', '1', '0', '4020', null);
INSERT INTO `mall_sort` VALUES ('403', '保险产品', '287', '1', '0', '4030', null);
INSERT INTO `mall_sort` VALUES ('405', '胎压监测', '312', '1', '0', '4050', null);
INSERT INTO `mall_sort` VALUES ('408', '身体护理', '352', '1', '0', '4080', null);
INSERT INTO `mall_sort` VALUES ('410', '车载空气净化器', '312', '1', '0', '4100', null);
INSERT INTO `mall_sort` VALUES ('411', '车载转换器', '312', '1', '0', '4110', null);
INSERT INTO `mall_sort` VALUES ('412', '运动户外', '0', '1', '0', '6', null);
INSERT INTO `mall_sort` VALUES ('415', '沐浴产品', '408', '1', '0', '4150', null);
INSERT INTO `mall_sort` VALUES ('416', '女包', '348', '1', '0', '4160', null);
INSERT INTO `mall_sort` VALUES ('418', '安全预警仪', '312', '1', '0', '4180', null);
INSERT INTO `mall_sort` VALUES ('421', '跟踪防盗器', '312', '1', '0', '4210', null);
INSERT INTO `mall_sort` VALUES ('423', '车载蓝牙', '312', '1', '0', '4230', null);
INSERT INTO `mall_sort` VALUES ('426', '车载影音', '312', '1', '0', '4260', null);
INSERT INTO `mall_sort` VALUES ('429', '车载吸尘器', '312', '1', '0', '4290', null);
INSERT INTO `mall_sort` VALUES ('430', '女士手提包', '416', '1', '0', '4300', null);
INSERT INTO `mall_sort` VALUES ('432', '倒车雷达', '312', '1', '0', '4320', null);
INSERT INTO `mall_sort` VALUES ('437', '数码包', '348', '1', '0', '4370', null);
INSERT INTO `mall_sort` VALUES ('438', '车用腰靠', '313', '1', '0', '4380', null);
INSERT INTO `mall_sort` VALUES ('439', '身体乳液', '408', '1', '0', '4390', null);
INSERT INTO `mall_sort` VALUES ('441', '车用香水', '313', '1', '0', '4410', null);
INSERT INTO `mall_sort` VALUES ('443', '车用空气净化器', '313', '1', '0', '4430', null);
INSERT INTO `mall_sort` VALUES ('444', '脱毛产品', '408', '1', '0', '4440', null);
INSERT INTO `mall_sort` VALUES ('446', '手足护理', '408', '1', '0', '4460', null);
INSERT INTO `mall_sort` VALUES ('447', '运动服饰', '412', '1', '0', '4470', null);
INSERT INTO `mall_sort` VALUES ('449', '车用挂件摆件', '313', '1', '0', '4490', null);
INSERT INTO `mall_sort` VALUES ('450', '香体走珠', '408', '1', '0', '4500', null);
INSERT INTO `mall_sort` VALUES ('452', '户外服饰', '412', '1', '0', '4520', null);
INSERT INTO `mall_sort` VALUES ('454', '身体防晒', '408', '1', '0', '4540', null);
INSERT INTO `mall_sort` VALUES ('456', '户外装备', '412', '1', '0', '4560', null);
INSERT INTO `mall_sort` VALUES ('457', '车用布艺软饰', '313', '1', '0', '4570', null);
INSERT INTO `mall_sort` VALUES ('458', '胸部护理', '408', '1', '0', '4580', null);
INSERT INTO `mall_sort` VALUES ('462', '体育项目', '412', '1', '0', '4620', null);
INSERT INTO `mall_sort` VALUES ('464', '车用功能用品', '313', '1', '0', '4640', null);
INSERT INTO `mall_sort` VALUES ('466', '女装', '348', '1', '0', '4660', null);
INSERT INTO `mall_sort` VALUES ('469', '车用坐垫脚垫', '313', '1', '0', '4690', null);
INSERT INTO `mall_sort` VALUES ('473', '女性护理', '352', '1', '0', '4730', null);
INSERT INTO `mall_sort` VALUES ('475', '车衣遮挡', '313', '1', '0', '4750', null);
INSERT INTO `mall_sort` VALUES ('480', '卫生巾', '473', '1', '0', '4800', null);
INSERT INTO `mall_sort` VALUES ('482', '电视', '460', '1', '0', '4820', null);
INSERT INTO `mall_sort` VALUES ('484', '车衣颈枕', '313', '1', '0', '4840', null);
INSERT INTO `mall_sort` VALUES ('485', '童装', '348', '1', '0', '4850', null);
INSERT INTO `mall_sort` VALUES ('486', '空调', '460', '1', '0', '4860', null);
INSERT INTO `mall_sort` VALUES ('488', '冰箱', '460', '1', '0', '4880', null);
INSERT INTO `mall_sort` VALUES ('489', '运动鞋袜', '412', '1', '0', '4890', null);
INSERT INTO `mall_sort` VALUES ('492', '洗衣机', '460', '1', '0', '4920', null);
INSERT INTO `mall_sort` VALUES ('495', '家庭影院', '460', '1', '0', '4950', null);
INSERT INTO `mall_sort` VALUES ('496', '运动器材', '412', '1', '0', '4960', null);
INSERT INTO `mall_sort` VALUES ('498', '烟机灶具', '460', '1', '0', '4980', null);
INSERT INTO `mall_sort` VALUES ('499', '女士洗液', '473', '1', '0', '4990', null);
INSERT INTO `mall_sort` VALUES ('502', '热水器', '460', '1', '0', '5020', null);
INSERT INTO `mall_sort` VALUES ('506', '冷柜', '460', '1', '0', '5060', null);
INSERT INTO `mall_sort` VALUES ('507', '户外鞋袜', '412', '1', '0', '5070', null);
INSERT INTO `mall_sort` VALUES ('508', '大家电配件', '460', '1', '0', '5080', null);
INSERT INTO `mall_sort` VALUES ('509', '卫生湿巾', '473', '1', '0', '5090', null);
INSERT INTO `mall_sort` VALUES ('510', '漆面修复', '314', '1', '0', '5100', null);
INSERT INTO `mall_sort` VALUES ('513', '漆面美容', '314', '1', '0', '5130', null);
INSERT INTO `mall_sort` VALUES ('514', '男包', '348', '1', '0', '5140', null);
INSERT INTO `mall_sort` VALUES ('516', '男士钱包', '514', '1', '0', '5160', null);
INSERT INTO `mall_sort` VALUES ('517', '车内清洁', '314', '1', '0', '5170', null);
INSERT INTO `mall_sort` VALUES ('518', '彩妆产品', '352', '1', '0', '5180', null);
INSERT INTO `mall_sort` VALUES ('519', '剃须除毛', '465', '1', '0', '5190', null);
INSERT INTO `mall_sort` VALUES ('521', '玻璃美容', '314', '1', '0', '5210', null);
INSERT INTO `mall_sort` VALUES ('522', '美容器', '465', '1', '0', '5220', null);
INSERT INTO `mall_sort` VALUES ('523', '男士手包', '514', '1', '0', '5230', null);
INSERT INTO `mall_sort` VALUES ('526', '商务公文包', '514', '1', '0', '5260', null);
INSERT INTO `mall_sort` VALUES ('527', '美发小家电', '465', '1', '0', '5270', null);
INSERT INTO `mall_sort` VALUES ('528', '洗车配件', '314', '1', '0', '5280', null);
INSERT INTO `mall_sort` VALUES ('530', '男士单肩包', '514', '1', '0', '5300', null);
INSERT INTO `mall_sort` VALUES ('533', '按摩保健', '465', '1', '0', '5330', null);
INSERT INTO `mall_sort` VALUES ('534', '卸妆产品', '518', '1', '0', '5340', null);
INSERT INTO `mall_sort` VALUES ('536', '车灯', '315', '1', '0', '5360', null);
INSERT INTO `mall_sort` VALUES ('537', '血压计', '465', '1', '0', '5370', null);
INSERT INTO `mall_sort` VALUES ('540', '电子秤', '465', '1', '0', '5400', null);
INSERT INTO `mall_sort` VALUES ('542', '雨刷雨刮', '315', '1', '0', '5420', null);
INSERT INTO `mall_sort` VALUES ('543', '体温计', '465', '1', '0', '5430', null);
INSERT INTO `mall_sort` VALUES ('545', '美容工具', '518', '1', '0', '5450', null);
INSERT INTO `mall_sort` VALUES ('546', '刹车片', '315', '1', '0', '5460', null);
INSERT INTO `mall_sort` VALUES ('547', '其他健康电器', '465', '1', '0', '5470', null);
INSERT INTO `mall_sort` VALUES ('551', '火花塞', '315', '1', '0', '5510', null);
INSERT INTO `mall_sort` VALUES ('553', '彩妆组合', '518', '1', '0', '5530', null);
INSERT INTO `mall_sort` VALUES ('554', '洁牙用具', '465', '1', '0', '5540', null);
INSERT INTO `mall_sort` VALUES ('557', '眼部彩妆', '518', '1', '0', '5570', null);
INSERT INTO `mall_sort` VALUES ('559', '血糖测量', '465', '1', '0', '5590', null);
INSERT INTO `mall_sort` VALUES ('560', '唇部彩妆', '518', '1', '0', '5600', null);
INSERT INTO `mall_sort` VALUES ('562', '机油滤清器', '315', '1', '0', '5620', null);
INSERT INTO `mall_sort` VALUES ('564', '取暖电器', '467', '1', '0', '5640', null);
INSERT INTO `mall_sort` VALUES ('565', '燃油滤清器', '315', '1', '0', '5650', null);
INSERT INTO `mall_sort` VALUES ('567', '运动配件', '447', '1', '0', '5670', null);
INSERT INTO `mall_sort` VALUES ('568', '电话机', '467', '1', '0', '5680', null);
INSERT INTO `mall_sort` VALUES ('569', '口腔护理', '352', '1', '0', '5690', null);
INSERT INTO `mall_sort` VALUES ('570', '空气滤清器', '315', '1', '0', '5700', null);
INSERT INTO `mall_sort` VALUES ('571', '净水设备', '467', '1', '0', '5710', null);
INSERT INTO `mall_sort` VALUES ('572', '男鞋', '348', '1', '0', '5720', null);
INSERT INTO `mall_sort` VALUES ('576', '汽车贴膜', '315', '1', '0', '5760', null);
INSERT INTO `mall_sort` VALUES ('579', '轮胎', '315', '1', '0', '5790', null);
INSERT INTO `mall_sort` VALUES ('586', '饮水机', '467', '1', '0', '5860', null);
INSERT INTO `mall_sort` VALUES ('588', '电风扇', '467', '1', '0', '5880', null);
INSERT INTO `mall_sort` VALUES ('589', '男士商务鞋', '572', '1', '0', '5890', null);
INSERT INTO `mall_sort` VALUES ('592', '其他生活电器', '467', '1', '0', '5920', null);
INSERT INTO `mall_sort` VALUES ('597', '空气净化器', '467', '1', '0', '5970', null);
INSERT INTO `mall_sort` VALUES ('604', '加湿除湿', '467', '1', '0', '6040', null);
INSERT INTO `mall_sort` VALUES ('607', '吸尘器', '467', '1', '0', '6070', null);
INSERT INTO `mall_sort` VALUES ('609', '服装配饰', '348', '1', '0', '6090', null);
INSERT INTO `mall_sort` VALUES ('613', '熨衣干衣', '467', '1', '0', '6130', null);
INSERT INTO `mall_sort` VALUES ('617', '收音录音', '467', '1', '0', '6170', null);
INSERT INTO `mall_sort` VALUES ('618', '男性护理', '352', '1', '0', '6180', null);
INSERT INTO `mall_sort` VALUES ('619', '皮带', '609', '1', '0', '6190', null);
INSERT INTO `mall_sort` VALUES ('634', '男士洁面乳', '618', '1', '0', '6340', null);
INSERT INTO `mall_sort` VALUES ('638', '功能箱包', '348', '1', '0', '6380', null);
INSERT INTO `mall_sort` VALUES ('639', '男士乳液', '618', '1', '0', '6390', null);
INSERT INTO `mall_sort` VALUES ('650', '眼睛护理', '352', '1', '0', '6500', null);
INSERT INTO `mall_sort` VALUES ('651', '日用百货', '0', '1', '0', '5', '2018-03-15 10:38:05');
INSERT INTO `mall_sort` VALUES ('652', '宠物用品', '651', '1', '0', '6520', null);
INSERT INTO `mall_sort` VALUES ('653', '家居内衣', '348', '1', '0', '6530', null);
INSERT INTO `mall_sort` VALUES ('655', '内衣', '653', '1', '0', '6550', null);
INSERT INTO `mall_sort` VALUES ('660', '厨房用具', '651', '1', '0', '6600', null);
INSERT INTO `mall_sort` VALUES ('661', '生活用品', '651', '1', '0', '6610', null);
INSERT INTO `mall_sort` VALUES ('662', '家居清洁', '651', '1', '0', '6620', null);
INSERT INTO `mall_sort` VALUES ('663', '成人用品', '651', '1', '0', '6630', null);
INSERT INTO `mall_sort` VALUES ('664', '礼品钟表', '651', '1', '0', '6640', null);
INSERT INTO `mall_sort` VALUES ('665', '图书音像', '651', '1', '0', '6650', null);
INSERT INTO `mall_sort` VALUES ('666', '玩模乐器', '651', '1', '0', '6660', null);
INSERT INTO `mall_sort` VALUES ('667', '办公设备', '651', '1', '0', '6670', null);
INSERT INTO `mall_sort` VALUES ('679', '水具酒具', '660', '1', '0', '6790', null);
INSERT INTO `mall_sort` VALUES ('680', '收纳用品', '661', '1', '0', '6800', null);
INSERT INTO `mall_sort` VALUES ('683', '食品饮料', '0', '1', '0', '4', '2018-03-15 20:24:49');
INSERT INTO `mall_sort` VALUES ('685', '保健品', '683', '1', '0', '6850', null);
INSERT INTO `mall_sort` VALUES ('689', '基础健康', '685', '1', '0', '6890', null);
INSERT INTO `mall_sort` VALUES ('693', '滋润调养', '685', '1', '0', '6930', null);
INSERT INTO `mall_sort` VALUES ('696', '综合营养', '685', '1', '0', '6960', null);
INSERT INTO `mall_sort` VALUES ('699', '植物营养素', '685', '1', '0', '6990', null);
INSERT INTO `mall_sort` VALUES ('706', '奶类制品', '683', '1', '0', '7060', null);
INSERT INTO `mall_sort` VALUES ('708', '驱虫用品', '662', '1', '0', '7080', '2018-03-14 10:46:17');
INSERT INTO `mall_sort` VALUES ('722', '美发护理', '352', '1', '0', '7220', null);
INSERT INTO `mall_sort` VALUES ('725', '酒水饮料', '683', '1', '0', '7250', null);
INSERT INTO `mall_sort` VALUES ('727', '茶类', '725', '1', '0', '7270', null);
INSERT INTO `mall_sort` VALUES ('728', '洗发护发', '722', '1', '0', '7280', null);
INSERT INTO `mall_sort` VALUES ('729', '饮料', '725', '1', '0', '7290', null);
INSERT INTO `mall_sort` VALUES ('730', '人体润滑', '663', '1', '0', '7300', null);
INSERT INTO `mall_sort` VALUES ('733', '酒类', '725', '1', '0', '7330', '2018-04-05 18:47:02');
INSERT INTO `mall_sort` VALUES ('734', '染发造型', '722', '1', '0', '7340', null);
INSERT INTO `mall_sort` VALUES ('736', '冲调饮品', '725', '1', '0', '7360', null);
INSERT INTO `mall_sort` VALUES ('737', '美发工具', '722', '1', '0', '7370', null);
INSERT INTO `mall_sort` VALUES ('741', '生鲜食品', '683', '1', '0', '7410', null);
INSERT INTO `mall_sort` VALUES ('745', '水产', '741', '1', '0', '7450', null);
INSERT INTO `mall_sort` VALUES ('746', '果蔬', '741', '1', '0', '7460', null);
INSERT INTO `mall_sort` VALUES ('751', '摩托相关', '311', '1', '0', '7510', null);
INSERT INTO `mall_sort` VALUES ('752', '榨汁机', '472', '1', '0', '7520', null);
INSERT INTO `mall_sort` VALUES ('754', '鲜肉', '741', '1', '0', '7540', '2018-03-15 20:24:56');
INSERT INTO `mall_sort` VALUES ('755', '家居家装', '0', '1', '0', '3', '2018-03-30 14:23:24');
INSERT INTO `mall_sort` VALUES ('757', '豆浆机', '472', '1', '0', '7570', null);
INSERT INTO `mall_sort` VALUES ('760', '电饭煲', '472', '1', '0', '7600', null);
INSERT INTO `mall_sort` VALUES ('762', '电压力锅', '472', '1', '0', '7620', null);
INSERT INTO `mall_sort` VALUES ('763', '面包机', '472', '1', '0', '7630', null);
INSERT INTO `mall_sort` VALUES ('764', '家装主材', '755', '1', '0', '7640', null);
INSERT INTO `mall_sort` VALUES ('765', '玩具', '666', '1', '0', '7650', null);
INSERT INTO `mall_sort` VALUES ('769', '咖啡机', '472', '1', '0', '7690', null);
INSERT INTO `mall_sort` VALUES ('772', '微波炉', '472', '1', '0', '7720', null);
INSERT INTO `mall_sort` VALUES ('776', '电烤箱', '472', '1', '0', '7760', null);
INSERT INTO `mall_sort` VALUES ('777', '电磁炉', '472', '1', '0', '7770', null);
INSERT INTO `mall_sort` VALUES ('778', '粮油调味', '683', '1', '0', '7780', null);
INSERT INTO `mall_sort` VALUES ('781', '智通办公', '667', '1', '0', '7810', null);
INSERT INTO `mall_sort` VALUES ('782', '电饼铛', '472', '1', '0', '7820', null);
INSERT INTO `mall_sort` VALUES ('783', '米面杂粮', '778', '1', '0', '7830', null);
INSERT INTO `mall_sort` VALUES ('786', '食用油', '778', '1', '0', '7860', null);
INSERT INTO `mall_sort` VALUES ('788', '煮蛋器', '472', '1', '0', '7880', null);
INSERT INTO `mall_sort` VALUES ('792', '电水壶', '472', '1', '0', '7920', null);
INSERT INTO `mall_sort` VALUES ('794', '调味品', '778', '1', '0', '7940', null);
INSERT INTO `mall_sort` VALUES ('796', '其他厨房电器', '472', '1', '0', '7960', null);
INSERT INTO `mall_sort` VALUES ('798', '休闲食品', '683', '1', '0', '7980', null);
INSERT INTO `mall_sort` VALUES ('799', '灯具灯饰', '755', '1', '0', '7990', null);
INSERT INTO `mall_sort` VALUES ('800', '电炖锅', '472', '1', '0', '8000', null);
INSERT INTO `mall_sort` VALUES ('802', '消毒柜', '472', '1', '0', '8020', null);
INSERT INTO `mall_sort` VALUES ('805', '电炸锅', '472', '1', '0', '8050', null);
INSERT INTO `mall_sort` VALUES ('806', '蜜饯果铺', '798', '1', '0', '8060', null);
INSERT INTO `mall_sort` VALUES ('809', '洗碗机', '472', '1', '0', '8090', null);
INSERT INTO `mall_sort` VALUES ('813', '酸奶机', '472', '1', '0', '8130', null);
INSERT INTO `mall_sort` VALUES ('814', '休闲零食', '798', '1', '0', '8140', null);
INSERT INTO `mall_sort` VALUES ('817', '冰激凌机', '472', '1', '0', '8170', null);
INSERT INTO `mall_sort` VALUES ('818', '豆芽机', '472', '1', '0', '8180', null);
INSERT INTO `mall_sort` VALUES ('820', '电火锅', '472', '1', '0', '8200', null);
INSERT INTO `mall_sort` VALUES ('822', '面条机', '472', '1', '0', '8220', null);
INSERT INTO `mall_sort` VALUES ('825', '厨师机', '472', '1', '0', '8250', null);
INSERT INTO `mall_sort` VALUES ('837', '五金电工', '755', '1', '0', '8370', '2018-03-15 10:36:55');
INSERT INTO `mall_sort` VALUES ('844', '家纺布艺', '755', '1', '0', '8440', null);
INSERT INTO `mall_sort` VALUES ('846', '床上用品', '844', '1', '0', '8460', null);
INSERT INTO `mall_sort` VALUES ('855', '园艺用品', '755', '1', '0', '8550', null);
INSERT INTO `mall_sort` VALUES ('864', '心率表', '456', '1', '0', '8640', null);
INSERT INTO `mall_sort` VALUES ('887', '住宅家具', '755', '1', '0', '8870', null);
INSERT INTO `mall_sort` VALUES ('907', '家居饰品', '755', '1', '0', '9070', null);
INSERT INTO `mall_sort` VALUES ('928', '智能手机', '872', '1', '0', '9280', null);
INSERT INTO `mall_sort` VALUES ('929', '对讲机', '872', '1', '0', '9290', null);
INSERT INTO `mall_sort` VALUES ('931', '非智能手机', '872', '1', '0', '9310', null);
INSERT INTO `mall_sort` VALUES ('934', '手机耳机', '872', '1', '0', '9340', null);
INSERT INTO `mall_sort` VALUES ('938', '挂牌', '907', '1', '0', '9380', '2018-03-18 21:08:40');
INSERT INTO `mall_sort` VALUES ('940', '套餐及流量卡', '872', '1', '0', '9400', null);
INSERT INTO `mall_sort` VALUES ('941', '合约机', '872', '1', '0', '9410', null);
INSERT INTO `mall_sort` VALUES ('943', '数码相框', '897', '1', '0', '9430', null);
INSERT INTO `mall_sort` VALUES ('945', '专业音频', '897', '1', '0', '9450', null);
INSERT INTO `mall_sort` VALUES ('946', '音箱', '897', '1', '0', '9460', null);
INSERT INTO `mall_sort` VALUES ('949', '耳机', '897', '1', '0', '9490', null);
INSERT INTO `mall_sort` VALUES ('950', '电视盒子', '897', '1', '0', '9500', null);
INSERT INTO `mall_sort` VALUES ('952', '随身播放器', '897', '1', '0', '9520', null);
INSERT INTO `mall_sort` VALUES ('956', '路由器', '900', '1', '0', '9560', null);
INSERT INTO `mall_sort` VALUES ('958', '网卡', '900', '1', '0', '9580', null);
INSERT INTO `mall_sort` VALUES ('960', '交换机', '900', '1', '0', '9600', null);
INSERT INTO `mall_sort` VALUES ('961', '网线', '900', '1', '0', '9610', null);
INSERT INTO `mall_sort` VALUES ('964', '智能手环', '902', '1', '0', '9640', null);
INSERT INTO `mall_sort` VALUES ('965', '智能手表', '902', '1', '0', '9650', null);
INSERT INTO `mall_sort` VALUES ('966', '智能眼镜', '902', '1', '0', '9660', null);
INSERT INTO `mall_sort` VALUES ('969', '其他智能设备', '902', '1', '0', '9690', null);
INSERT INTO `mall_sort` VALUES ('971', '无人机', '902', '1', '0', '9710', null);
INSERT INTO `mall_sort` VALUES ('972', '智能家居', '902', '1', '0', '9720', null);
INSERT INTO `mall_sort` VALUES ('973', 'VR设备', '902', '1', '0', '9730', null);
INSERT INTO `mall_sort` VALUES ('976', '健身器械', '462', '1', '0', '9760', null);
INSERT INTO `mall_sort` VALUES ('1000', '相机', '905', '1', '0', '10000', null);
INSERT INTO `mall_sort` VALUES ('1002', '摄像机', '905', '1', '0', '10020', null);
INSERT INTO `mall_sort` VALUES ('1004', '镜头', '905', '1', '0', '10040', null);
INSERT INTO `mall_sort` VALUES ('1006', '相机配件', '905', '1', '0', '10060', null);
INSERT INTO `mall_sort` VALUES ('1010', '网络存储', '906', '1', '0', '10100', null);
INSERT INTO `mall_sort` VALUES ('1012', '存储卡', '906', '1', '0', '10120', null);
INSERT INTO `mall_sort` VALUES ('1013', 'U盘', '906', '1', '0', '10130', null);
INSERT INTO `mall_sort` VALUES ('1015', '移动硬盘', '906', '1', '0', '10150', null);
INSERT INTO `mall_sort` VALUES ('1017', '磁盘阵列', '906', '1', '0', '10170', null);
INSERT INTO `mall_sort` VALUES ('1019', '存储配件', '906', '1', '0', '10190', null);
INSERT INTO `mall_sort` VALUES ('1035', '摄像头', '909', '1', '0', '10350', null);
INSERT INTO `mall_sort` VALUES ('1036', '数位板', '909', '1', '0', '10360', null);
INSERT INTO `mall_sort` VALUES ('1037', '游戏外设', '909', '1', '0', '10370', null);
INSERT INTO `mall_sort` VALUES ('1038', '耳麦', '909', '1', '0', '10380', null);
INSERT INTO `mall_sort` VALUES ('1039', '键鼠', '909', '1', '0', '10390', null);
INSERT INTO `mall_sort` VALUES ('1040', '游戏机', '909', '1', '0', '10400', null);
INSERT INTO `mall_sort` VALUES ('1041', '线缆', '909', '1', '0', '10410', null);
INSERT INTO `mall_sort` VALUES ('1042', '其他电脑外设', '909', '1', '0', '10420', null);
INSERT INTO `mall_sort` VALUES ('1043', '手写板', '909', '1', '0', '10430', null);
INSERT INTO `mall_sort` VALUES ('1044', '校色仪', '909', '1', '0', '10440', null);
INSERT INTO `mall_sort` VALUES ('1045', '电池', '910', '1', '0', '10450', null);
INSERT INTO `mall_sort` VALUES ('1046', '充电器', '910', '1', '0', '10460', null);
INSERT INTO `mall_sort` VALUES ('1047', '数据线', '910', '1', '0', '10470', null);
INSERT INTO `mall_sort` VALUES ('1048', '贴膜', '910', '1', '0', '10480', null);
INSERT INTO `mall_sort` VALUES ('1049', '读卡器', '910', '1', '0', '10490', null);
INSERT INTO `mall_sort` VALUES ('1050', '移动电源', '910', '1', '0', '10500', null);
INSERT INTO `mall_sort` VALUES ('1051', '保护壳', '910', '1', '0', '10510', null);
INSERT INTO `mall_sort` VALUES ('1052', '电脑支架', '910', '1', '0', '10520', null);
INSERT INTO `mall_sort` VALUES ('1054', 'USB集线器', '910', '1', '0', '10540', null);
INSERT INTO `mall_sort` VALUES ('1055', '保护套', '910', '1', '0', '10550', null);
INSERT INTO `mall_sort` VALUES ('1057', '触控笔', '910', '1', '0', '10570', null);
INSERT INTO `mall_sort` VALUES ('1059', '其他数码配件', '910', '1', '0', '10590', null);
INSERT INTO `mall_sort` VALUES ('1061', '笔记本电脑', '913', '1', '0', '10610', null);
INSERT INTO `mall_sort` VALUES ('1063', '平板电脑', '913', '1', '0', '10630', null);
INSERT INTO `mall_sort` VALUES ('1064', '台式机', '913', '1', '0', '10640', null);
INSERT INTO `mall_sort` VALUES ('1065', '服务器', '913', '1', '0', '10650', null);
INSERT INTO `mall_sort` VALUES ('1066', 'CPU', '914', '1', '0', '10660', null);
INSERT INTO `mall_sort` VALUES ('1067', '主板', '914', '1', '0', '10670', null);
INSERT INTO `mall_sort` VALUES ('1068', '显卡', '914', '1', '0', '10680', null);
INSERT INTO `mall_sort` VALUES ('1070', '硬盘', '914', '1', '0', '10700', null);
INSERT INTO `mall_sort` VALUES ('1071', '内存', '914', '1', '0', '10710', null);
INSERT INTO `mall_sort` VALUES ('1073', '机箱', '914', '1', '0', '10730', null);
INSERT INTO `mall_sort` VALUES ('1074', '电脑电源', '914', '1', '0', '10740', null);
INSERT INTO `mall_sort` VALUES ('1076', '显示器', '914', '1', '0', '10760', null);
INSERT INTO `mall_sort` VALUES ('1077', '刻录机', '914', '1', '0', '10770', null);
INSERT INTO `mall_sort` VALUES ('1079', '散热器', '914', '1', '0', '10790', null);
INSERT INTO `mall_sort` VALUES ('1080', '声卡', '914', '1', '0', '10800', null);
INSERT INTO `mall_sort` VALUES ('1081', 'UPS电源', '914', '1', '0', '10810', null);
INSERT INTO `mall_sort` VALUES ('1082', '光驱', '914', '1', '0', '10820', null);
INSERT INTO `mall_sort` VALUES ('1083', '其他电脑配件', '914', '1', '0', '10830', null);
INSERT INTO `mall_sort` VALUES ('1085', '运动护具', '496', '1', '0', '10850', null);
INSERT INTO `mall_sort` VALUES ('1089', '健身车', '496', '1', '0', '10890', null);
INSERT INTO `mall_sort` VALUES ('1123', '汽车保险', '1118', '1', '0', '11230', null);
INSERT INTO `mall_sort` VALUES ('1124', '意外保险', '1118', '1', '0', '11240', null);
INSERT INTO `mall_sort` VALUES ('1125', '医疗保险', '1118', '1', '0', '11250', null);
INSERT INTO `mall_sort` VALUES ('1126', '妇幼保险', '1118', '1', '0', '11260', null);
INSERT INTO `mall_sort` VALUES ('1127', '旅游保险', '1118', '1', '0', '11270', null);
INSERT INTO `mall_sort` VALUES ('1128', '游戏充值', '1119', '1', '0', '11280', null);
INSERT INTO `mall_sort` VALUES ('1129', '手机充值', '1119', '1', '0', '11290', null);
INSERT INTO `mall_sort` VALUES ('1130', '彩票', '1120', '1', '0', '11300', null);
INSERT INTO `mall_sort` VALUES ('1131', '电影票', '1120', '1', '0', '11310', null);
INSERT INTO `mall_sort` VALUES ('1133', '信用卡', '1121', '1', '0', '11330', null);
INSERT INTO `mall_sort` VALUES ('1134', '智通办公', '1132', '1', '0', '11340', null);
INSERT INTO `mall_sort` VALUES ('1135', '理财产品', '1121', '1', '0', '11350', null);
INSERT INTO `mall_sort` VALUES ('1136', '办公用品', '1132', '1', '0', '11360', null);
INSERT INTO `mall_sort` VALUES ('1137', '学生用品', '1132', '1', '0', '11370', null);
INSERT INTO `mall_sort` VALUES ('1138', '国内旅游', '1122', '1', '0', '11380', null);
INSERT INTO `mall_sort` VALUES ('1139', '海外旅游', '1122', '1', '0', '11390', null);
INSERT INTO `mall_sort` VALUES ('1140', '玩具', '345', '1', '0', '11400', null);
INSERT INTO `mall_sort` VALUES ('1141', '模型', '345', '1', '0', '11410', null);
INSERT INTO `mall_sort` VALUES ('1142', '乐器', '345', '1', '0', '11420', null);
INSERT INTO `mall_sort` VALUES ('1143', '动漫周边', '345', '1', '0', '11430', null);
INSERT INTO `mall_sort` VALUES ('1144', '电子书刊', '342', '1', '0', '11440', null);
INSERT INTO `mall_sort` VALUES ('1145', '音像制品', '342', '1', '0', '11450', null);
INSERT INTO `mall_sort` VALUES ('1146', '软件游戏', '342', '1', '0', '11460', null);
INSERT INTO `mall_sort` VALUES ('1147', '图书杂志', '342', '1', '0', '11470', null);
INSERT INTO `mall_sort` VALUES ('1148', '礼品', '341', '1', '0', '11480', null);
INSERT INTO `mall_sort` VALUES ('1149', '钟表', '341', '1', '0', '11490', null);
INSERT INTO `mall_sort` VALUES ('1150', '珠宝首饰', '341', '1', '0', '11500', null);
INSERT INTO `mall_sort` VALUES ('1151', '安全避孕', '340', '1', '0', '11510', null);
INSERT INTO `mall_sort` VALUES ('1152', '验孕测孕', '340', '1', '0', '11520', null);
INSERT INTO `mall_sort` VALUES ('1153', '情爱玩具', '340', '1', '0', '11530', null);
INSERT INTO `mall_sort` VALUES ('1154', '情趣内衣', '340', '1', '0', '11540', null);
INSERT INTO `mall_sort` VALUES ('1155', '人体润滑', '340', '1', '0', '11550', null);
INSERT INTO `mall_sort` VALUES ('1156', '纸品湿巾', '338', '1', '0', '11560', null);
INSERT INTO `mall_sort` VALUES ('1157', '衣物清洁', '338', '1', '0', '11570', null);
INSERT INTO `mall_sort` VALUES ('1158', '清洁工具', '338', '1', '0', '11580', null);
INSERT INTO `mall_sort` VALUES ('1159', '居室清洁', '338', '1', '0', '11590', null);
INSERT INTO `mall_sort` VALUES ('1160', '驱虫用品', '338', '1', '0', '11600', null);
INSERT INTO `mall_sort` VALUES ('1161', '皮具护理', '338', '1', '0', '11610', null);
INSERT INTO `mall_sort` VALUES ('1162', '收纳用品', '336', '1', '0', '11620', null);
INSERT INTO `mall_sort` VALUES ('1163', '雨伞雨具', '336', '1', '0', '11630', null);
INSERT INTO `mall_sort` VALUES ('1164', '浴室用品', '336', '1', '0', '11640', null);
INSERT INTO `mall_sort` VALUES ('1165', '安全健康', '336', '1', '0', '11650', null);
INSERT INTO `mall_sort` VALUES ('1166', '洗晒用品', '336', '1', '0', '11660', null);
INSERT INTO `mall_sort` VALUES ('1167', '净化除味', '336', '1', '0', '11670', null);
INSERT INTO `mall_sort` VALUES ('1168', '缝纫用品', '336', '1', '0', '11680', null);
INSERT INTO `mall_sort` VALUES ('1169', '宠物主粮', '334', '1', '0', '11690', null);
INSERT INTO `mall_sort` VALUES ('1170', '宠物零食', '334', '1', '0', '11700', null);
INSERT INTO `mall_sort` VALUES ('1171', '宠物营养', '334', '1', '0', '11710', null);
INSERT INTO `mall_sort` VALUES ('1172', '宠物玩具服饰', '334', '1', '0', '11720', null);
INSERT INTO `mall_sort` VALUES ('1173', '宠物出行装备', '334', '1', '0', '11730', null);
INSERT INTO `mall_sort` VALUES ('1174', '宠物医护美容', '334', '1', '0', '11740', null);
INSERT INTO `mall_sort` VALUES ('1175', '宠物家具日用', '334', '1', '0', '11750', null);
INSERT INTO `mall_sort` VALUES ('1181', '金融产品', '287', '1', '0', '11810', null);
INSERT INTO `mall_sort` VALUES ('1182', '旅游', '287', '1', '0', '11820', null);
INSERT INTO `mall_sort` VALUES ('1193', 'CPU', '157', '1', '0', '11930', null);
INSERT INTO `mall_sort` VALUES ('1194', '主板', '157', '1', '0', '11940', null);
INSERT INTO `mall_sort` VALUES ('1195', '显卡', '157', '1', '0', '11950', null);
INSERT INTO `mall_sort` VALUES ('1196', '硬盘', '157', '1', '0', '11960', null);
INSERT INTO `mall_sort` VALUES ('1197', '内存', '157', '1', '0', '11970', null);
INSERT INTO `mall_sort` VALUES ('1198', '机箱', '157', '1', '0', '11980', null);
INSERT INTO `mall_sort` VALUES ('1199', '电脑电源', '157', '1', '0', '11990', null);
INSERT INTO `mall_sort` VALUES ('1200', '显示器', '157', '1', '0', '12000', null);
INSERT INTO `mall_sort` VALUES ('1201', '刻录机', '157', '1', '0', '12010', null);
INSERT INTO `mall_sort` VALUES ('1202', '散热器', '157', '1', '0', '12020', null);
INSERT INTO `mall_sort` VALUES ('1203', '声卡', '157', '1', '0', '12030', null);
INSERT INTO `mall_sort` VALUES ('1204', 'UPS电源', '157', '1', '0', '12040', null);
INSERT INTO `mall_sort` VALUES ('1205', '光驱', '157', '1', '0', '12050', null);
INSERT INTO `mall_sort` VALUES ('1206', '其它电脑配件', '157', '1', '0', '12060', null);
INSERT INTO `mall_sort` VALUES ('1207', '笔记本电脑', '158', '1', '0', '12070', null);
INSERT INTO `mall_sort` VALUES ('1208', '平板电脑', '158', '1', '0', '12080', null);
INSERT INTO `mall_sort` VALUES ('1209', '台式机', '158', '1', '0', '12090', null);
INSERT INTO `mall_sort` VALUES ('1210', '服务器', '158', '1', '0', '12100', null);
INSERT INTO `mall_sort` VALUES ('1211', '摄像头', '176', '1', '0', '12110', null);
INSERT INTO `mall_sort` VALUES ('1212', '数位板', '176', '1', '0', '12120', null);
INSERT INTO `mall_sort` VALUES ('1213', '游戏外设', '176', '1', '0', '12130', null);
INSERT INTO `mall_sort` VALUES ('1214', '耳机', '176', '1', '0', '12140', null);
INSERT INTO `mall_sort` VALUES ('1215', '键鼠', '176', '1', '0', '12150', null);
INSERT INTO `mall_sort` VALUES ('1216', '游戏机', '176', '1', '0', '12160', null);
INSERT INTO `mall_sort` VALUES ('1217', '线缆', '176', '1', '0', '12170', null);
INSERT INTO `mall_sort` VALUES ('1218', '其它电脑外设', '176', '1', '0', '12180', null);
INSERT INTO `mall_sort` VALUES ('1219', '手写板', '176', '1', '0', '12190', null);
INSERT INTO `mall_sort` VALUES ('1220', '校色仪', '176', '1', '0', '12200', null);
INSERT INTO `mall_sort` VALUES ('1221', '网络存储', '177', '1', '0', '12210', null);
INSERT INTO `mall_sort` VALUES ('1222', '存储卡', '177', '1', '0', '12220', null);
INSERT INTO `mall_sort` VALUES ('1223', 'U盘', '177', '1', '0', '12230', null);
INSERT INTO `mall_sort` VALUES ('1224', '移动硬盘', '177', '1', '0', '12240', null);
INSERT INTO `mall_sort` VALUES ('1225', '磁盘阵列', '177', '1', '0', '12250', null);
INSERT INTO `mall_sort` VALUES ('1226', '存储配件', '177', '1', '0', '12260', null);
INSERT INTO `mall_sort` VALUES ('1227', '相机', '178', '1', '0', '12270', null);
INSERT INTO `mall_sort` VALUES ('1228', '摄像机', '178', '1', '0', '12280', null);
INSERT INTO `mall_sort` VALUES ('1229', '镜头', '178', '1', '0', '12290', null);
INSERT INTO `mall_sort` VALUES ('1230', '相机配件', '178', '1', '0', '12300', null);
INSERT INTO `mall_sort` VALUES ('1231', '智能手环', '179', '1', '0', '12310', null);
INSERT INTO `mall_sort` VALUES ('1232', '智能手表', '179', '1', '0', '12320', null);
INSERT INTO `mall_sort` VALUES ('1233', '智能眼睛', '179', '1', '0', '12330', null);
INSERT INTO `mall_sort` VALUES ('1234', '其它智能设备', '179', '1', '0', '12340', null);
INSERT INTO `mall_sort` VALUES ('1235', '无人机', '179', '1', '0', '12350', null);
INSERT INTO `mall_sort` VALUES ('1236', '智能家居', '179', '1', '0', '12360', null);
INSERT INTO `mall_sort` VALUES ('1237', 'VR设备', '179', '1', '0', '12370', null);
INSERT INTO `mall_sort` VALUES ('1238', '路由器', '180', '1', '0', '12380', null);
INSERT INTO `mall_sort` VALUES ('1239', '网卡', '180', '1', '0', '12390', null);
INSERT INTO `mall_sort` VALUES ('1240', '交换机', '180', '1', '0', '12400', null);
INSERT INTO `mall_sort` VALUES ('1241', '网线', '180', '1', '0', '12410', null);
INSERT INTO `mall_sort` VALUES ('1242', '数码相框', '181', '1', '0', '12420', null);
INSERT INTO `mall_sort` VALUES ('1243', '数专业音频', '181', '1', '0', '12430', null);
INSERT INTO `mall_sort` VALUES ('1244', '音箱', '181', '1', '0', '12440', null);
INSERT INTO `mall_sort` VALUES ('1245', '耳机', '181', '1', '0', '12450', null);
INSERT INTO `mall_sort` VALUES ('1246', '电视盒子', '181', '1', '0', '12460', null);
INSERT INTO `mall_sort` VALUES ('1247', '随身播放器', '181', '1', '0', '12470', null);
INSERT INTO `mall_sort` VALUES ('1248', '智能手机', '1191', '1', '0', '12480', null);
INSERT INTO `mall_sort` VALUES ('1249', '对讲机', '1191', '1', '0', '12490', null);
INSERT INTO `mall_sort` VALUES ('1250', '非智能手机', '1191', '1', '0', '12500', null);
INSERT INTO `mall_sort` VALUES ('1251', '手机耳机', '1191', '1', '0', '12510', null);
INSERT INTO `mall_sort` VALUES ('1252', '套餐及流量卡', '1191', '1', '0', '12520', null);
INSERT INTO `mall_sort` VALUES ('1253', '合约机', '1191', '1', '0', '12530', null);
INSERT INTO `mall_sort` VALUES ('1254', '电池', '1192', '1', '0', '12540', null);
INSERT INTO `mall_sort` VALUES ('1255', '充电器', '1192', '1', '0', '12550', null);
INSERT INTO `mall_sort` VALUES ('1256', '数据线', '1192', '1', '0', '12560', null);
INSERT INTO `mall_sort` VALUES ('1257', '贴膜', '1192', '1', '0', '12570', null);
INSERT INTO `mall_sort` VALUES ('1258', '读卡器', '1192', '1', '0', '12580', null);
INSERT INTO `mall_sort` VALUES ('1259', '移动电源', '1192', '1', '0', '12590', null);
INSERT INTO `mall_sort` VALUES ('1260', '保护壳', '1192', '1', '0', '12600', null);
INSERT INTO `mall_sort` VALUES ('1261', '电脑支架', '1192', '1', '0', '12610', null);
INSERT INTO `mall_sort` VALUES ('1262', 'USB集线器', '1192', '1', '0', '12620', null);
INSERT INTO `mall_sort` VALUES ('1263', '保护套', '1192', '1', '0', '12630', null);
INSERT INTO `mall_sort` VALUES ('1264', '触控笔', '1192', '1', '0', '12640', null);
INSERT INTO `mall_sort` VALUES ('1265', '其它数码配件', '1192', '1', '0', '12650', null);
INSERT INTO `mall_sort` VALUES ('1266', '家用电器', '0', '1', '0', '2', '2018-03-14 10:59:14');
INSERT INTO `mall_sort` VALUES ('1267', '大家电', '1266', '1', '0', '12670', null);
INSERT INTO `mall_sort` VALUES ('1268', '生活电器', '1266', '1', '0', '12680', null);
INSERT INTO `mall_sort` VALUES ('1269', '厨房电器', '1266', '1', '0', '12690', null);
INSERT INTO `mall_sort` VALUES ('1270', '个护健康', '1266', '1', '0', '12700', null);
INSERT INTO `mall_sort` VALUES ('1271', '电脑数码', '0', '1', '0', '1', '2018-03-14 10:32:40');
INSERT INTO `mall_sort` VALUES ('1272', '手机通讯', '1271', '1', '0', '12720', null);
INSERT INTO `mall_sort` VALUES ('1273', '数码配件', '1271', '1', '0', '12730', null);
INSERT INTO `mall_sort` VALUES ('1274', '影音播放', '1271', '1', '0', '12740', null);
INSERT INTO `mall_sort` VALUES ('1275', '网络设备', '1271', '1', '0', '12750', null);
INSERT INTO `mall_sort` VALUES ('1276', '智能设备', '1271', '1', '0', '12760', null);
INSERT INTO `mall_sort` VALUES ('1277', '摄影摄像', '1271', '1', '0', '12770', null);
INSERT INTO `mall_sort` VALUES ('1278', '存储设备', '1271', '1', '0', '12780', null);
INSERT INTO `mall_sort` VALUES ('1279', '电脑外设', '1271', '1', '0', '12790', null);
INSERT INTO `mall_sort` VALUES ('1280', '电脑整机', '1271', '1', '0', '12800', null);
INSERT INTO `mall_sort` VALUES ('1281', '电脑配件', '1271', '1', '0', '12810', null);
INSERT INTO `mall_sort` VALUES ('1282', '智能手机', '1272', '1', '0', '12820', null);
INSERT INTO `mall_sort` VALUES ('1306', '路由器', '1275', '1', '0', '13060', null);
INSERT INTO `mall_sort` VALUES ('1310', '智能手环', '1276', '1', '0', '13100', null);
INSERT INTO `mall_sort` VALUES ('1311', '智能手表', '1276', '1', '0', '13110', null);
INSERT INTO `mall_sort` VALUES ('1312', '智能眼睛', '1276', '1', '0', '13120', null);
INSERT INTO `mall_sort` VALUES ('1317', '相机', '1277', '1', '0', '13170', null);
INSERT INTO `mall_sort` VALUES ('1323', 'U盘', '1278', '1', '0', '13230', null);
INSERT INTO `mall_sort` VALUES ('1330', '耳麦', '1279', '1', '0', '13300', null);
INSERT INTO `mall_sort` VALUES ('1335', '手写板', '1279', '1', '0', '13350', null);
INSERT INTO `mall_sort` VALUES ('1339', '台式机', '1280', '1', '0', '13390', null);
INSERT INTO `mall_sort` VALUES ('1369', '电风扇', '1268', '1', '0', '13690', '2018-03-14 16:23:11');
INSERT INTO `mall_sort` VALUES ('1376', '榨汁机', '1269', '1', '0', '13760', null);
INSERT INTO `mall_sort` VALUES ('1402', '按摩保健', '1270', '1', '0', '14020', null);
INSERT INTO `mall_sort` VALUES ('1409', '农用物资', '287', '1', '0', '14090', null);
INSERT INTO `mall_sort` VALUES ('1413', '代金券', '287', '1', '0', '14130', null);
INSERT INTO `mall_sort` VALUES ('1415', '驾校', '311', '1', '0', '14150', null);
INSERT INTO `mall_sort` VALUES ('1419', '首饰挂饰', '348', '1', '0', '14190', null);
INSERT INTO `mall_sort` VALUES ('1420', '首饰', '1419', '1', '0', '14200', null);
INSERT INTO `mall_sort` VALUES ('1421', '挂饰', '1419', '1', '0', '14210', null);
INSERT INTO `mall_sort` VALUES ('1422', '本地服务', '287', '1', '0', '14220', null);
INSERT INTO `mall_sort` VALUES ('1428', '禽蛋', '741', '1', '0', '14280', null);
INSERT INTO `mall_sort` VALUES ('1462', '速食肉类', '798', '1', '0', '14620', null);
INSERT INTO `mall_sort` VALUES ('1463', '果蔬干', '798', '1', '0', '14630', null);
INSERT INTO `mall_sort` VALUES ('1464', '水产干货', '798', '1', '0', '14640', null);
INSERT INTO `mall_sort` VALUES ('1465', '手套', '609', '1', '0', '14650', null);
INSERT INTO `mall_sort` VALUES ('1466', '面条', '778', '1', '0', '14660', null);
INSERT INTO `mall_sort` VALUES ('1467', '厨具套装', '1269', '1', '0', '14670', null);
INSERT INTO `mall_sort` VALUES ('1468', '骑行运动', '412', '1', '0', '14680', null);
INSERT INTO `mall_sort` VALUES ('1469', '电动车', '1468', '1', '0', '14690', null);
INSERT INTO `mall_sort` VALUES ('1474', '测试001', '1422', '1', '0', '14740', '2018-03-14 10:33:31');
INSERT INTO `mall_sort` VALUES ('1475', '测试002', '1422', '1', '0', '14750', '2018-03-14 10:34:02');
INSERT INTO `mall_sort` VALUES ('1476', '测试002001', '1422', '1', '0', '14760', '2018-03-14 10:37:18');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `FROM_ID` bigint(20) unsigned DEFAULT '0',
  `MESS` text,
  `ADD_TIME` datetime DEFAULT NULL,
  `READ_TIME` datetime DEFAULT NULL,
  `STATE` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `STATE` (`STATE`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('6', '71', '0', 'abcddsafsa水电费水电费水电费所发生的,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,', '2017-05-14 10:47:16', '2017-05-22 11:02:51', '1');

-- ----------------------------
-- Table structure for money_log
-- ----------------------------
DROP TABLE IF EXISTS `money_log`;
CREATE TABLE `money_log` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `MONEY` decimal(20,3) DEFAULT NULL,
  `STATE` tinyint(4) DEFAULT '0',
  `ACT_TIME` datetime DEFAULT NULL,
  `MESS` varchar(100) DEFAULT NULL,
  `MODULE_ID` int(11) DEFAULT '0',
  `CAI_WU_ID` bigint(20) unsigned DEFAULT NULL,
  `ACT_USER_ID` bigint(20) unsigned DEFAULT NULL,
  `LEFT_MONEY` decimal(20,3) DEFAULT NULL,
  `RIGHT_MONEY` decimal(20,3) DEFAULT NULL,
  `ROLE_ID` int(11) DEFAULT '0',
  `POINT` decimal(20,3) DEFAULT '0.000',
  `TALK_TIME` bigint(20) DEFAULT '0',
  `MESS_ID` bigint(20) DEFAULT '0',
  `MESSAGE_COUNT` bigint(20) DEFAULT '0',
  `DO_STATE` tinyint(4) DEFAULT '0',
  `SHI` int(11) DEFAULT '0',
  `DO_MESSAGE_COUNT` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `STATE` (`STATE`),
  KEY `MODULE_ID` (`MODULE_ID`),
  KEY `ACT_TIME` (`ACT_TIME`),
  KEY `ROLE_ID` (`ROLE_ID`),
  KEY `DO_STATE` (`DO_STATE`),
  KEY `SHI` (`SHI`)
) ENGINE=InnoDB AUTO_INCREMENT=58177 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of money_log
-- ----------------------------
INSERT INTO `money_log` VALUES ('58145', '71', '-101.000', '0', '2017-08-04 15:48:46', '商城订单编号16940703扣款', '7000', null, null, '500.000', '399.000', '0', '0.000', '0', '16940703', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58146', '71', '0.000', '0', '2017-08-04 16:22:27', '商城订单75667分配积分', '7000', null, null, null, null, '0', '2.000', '0', '75667', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58147', '71', '-88.000', '0', '2017-08-07 09:37:41', '商城订单编号16940702扣款', '7000', null, null, '399.000', '311.000', '0', '0.000', '0', '16940702', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58148', '71', '0.000', '0', '2017-08-07 09:37:41', '商城订单编号16940702扣积分', '7000', null, null, null, null, '0', '-2.000', '0', '16940702', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58149', '71', '-101.000', '0', '2017-08-07 09:50:00', '商城订单编号16940704扣款', '7000', null, null, '311.000', '210.000', '0', '0.000', '0', '16940704', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58150', '71', '0.000', '0', '2017-08-07 09:51:09', '商城订单75668分配积分', '7000', null, null, null, null, '0', '2.000', '0', '75668', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58153', '71', '101.000', '0', '2017-10-23 15:12:23', '商城订单75668 退款:101.00', '7000', null, null, '412.000', '513.000', '0', '0.000', '0', '-1', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58154', '71', '-88.000', '0', '2018-03-15 16:41:03', '商城订单编号16940729扣款', '7000', null, null, '513.000', '425.000', '0', '0.000', '0', '16940729', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58155', '71', '0.000', '0', '2018-03-15 16:41:03', '商城订单编号16940729扣积分', '7000', null, null, null, null, '0', '-2.000', '0', '16940729', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58156', '71', '-101.000', '0', '2018-04-23 17:16:36', '商城订单编号16940778扣款', '7000', null, null, '425.000', '324.000', '0', '0.000', '0', '16940778', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58157', '71', '-101.000', '0', '2018-04-23 17:18:34', '商城订单编号16940779扣款', '7000', null, null, '324.000', '223.000', '0', '0.000', '0', '16940779', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58158', '71', '-101.000', '0', '2018-04-23 17:19:14', '商城订单编号16940780扣款', '7000', null, null, '223.000', '122.000', '0', '0.000', '0', '16940780', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58159', '71', '-101.000', '0', '2018-04-23 17:19:56', '商城订单编号16940781扣款', '7000', null, null, '122.000', '21.000', '0', '0.000', '0', '16940781', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58160', '71', '-101.000', '0', '2018-04-23 21:14:19', '商城订单编号16940789扣款', '7000', null, null, '500.000', '399.000', '0', '0.000', '0', '16940789', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58161', '71', '-101.000', '0', '2018-04-23 21:14:53', '商城订单编号16940790扣款', '7000', null, null, '399.000', '298.000', '0', '0.000', '0', '16940790', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58162', '71', '-101.000', '0', '2018-04-23 21:18:25', '商城订单编号16940791扣款', '7000', null, null, '298.000', '197.000', '0', '0.000', '0', '16940791', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58163', '71', '-101.000', '0', '2018-04-23 21:19:25', '商城订单编号16940792扣款', '7000', null, null, '197.000', '96.000', '0', '0.000', '0', '16940792', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58164', '71', '-90.000', '0', '2018-04-23 21:19:48', '商城订单编号16940793扣款', '7000', null, null, '96.000', '6.000', '0', '0.000', '0', '16940793', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58165', '71', '-90.000', '0', '2018-04-23 21:20:38', '商城订单编号16940796扣款', '7000', null, null, '500.000', '410.000', '0', '0.000', '0', '16940796', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58166', '71', '-90.000', '0', '2018-04-23 21:22:36', '商城订单编号16940797扣款', '7000', null, null, '410.000', '320.000', '0', '0.000', '0', '16940797', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58167', '71', '-90.000', '0', '2018-04-24 10:02:34', '商城订单编号16940798扣款', '7000', null, null, '320.000', '230.000', '0', '0.000', '0', '16940798', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58168', '71', '-180.000', '0', '2018-04-24 15:32:58', '商城订单编号16940852扣款', '7000', null, null, '230.000', '50.000', '0', '0.000', '0', '16940852', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58169', '71', '0.010', '0', '2018-04-24 22:40:00', '商城订单(16940857)充值(1064415)成功，加款:0.01', '3', null, null, '50.000', '50.010', '0', '0.000', '0', '16940857', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58170', '71', '-50.000', '0', '2018-04-24 22:51:27', '商城订单充值(1064416)成功,金额0.01,另商城订单16940858完成扣款', '7000', null, null, '50.000', '0.000', '0', '0.000', '0', '16940858', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58171', '71', '0.000', '0', '2018-04-26 11:59:25', '商城订单75848分配积分', '7000', null, null, null, null, '0', '2.000', '0', '75848', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58172', '71', '-48.000', '0', '2018-04-26 17:32:44', '商城订单充值(1064417)成功,金额0.01,另商城订单16940861完成扣款', '7000', null, null, '48.000', '0.000', '0', '0.000', '0', '16940861', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58173', '71', '0.000', '0', '2018-04-26 17:32:44', '商城订单充值(1064417)成功,金额0.01,另商城订单16940861完成扣积分', '7000', null, null, null, null, '0', '-2.000', '0', '16940861', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58174', '71', '0.000', '0', '2018-04-27 19:55:25', '商城订单充值(1064420)成功,金额0.01,另商城订单16940859完成扣款', '7000', null, null, '0.000', '0.000', '0', '0.000', '0', '16940859', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58175', '71', '0.000', '0', '2018-04-27 19:57:41', '商城订单充值(1064421)成功,金额0.01,另商城订单16940864完成扣款', '7000', null, null, '0.000', '0.000', '0', '0.000', '0', '16940864', '0', '0', '0', '0');
INSERT INTO `money_log` VALUES ('58176', '71', '0.000', '0', '2018-04-28 21:18:23', '商城订单75852分配积分', '7000', null, null, null, null, '0', '1.920', '0', '75852', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(200) DEFAULT NULL,
  `SORT_ID` int(11) DEFAULT '0',
  `SORT2_ID` int(11) DEFAULT NULL,
  `MESS` varchar(20) DEFAULT NULL,
  `PIC1` varchar(200) DEFAULT NULL,
  `PIC2` varchar(200) DEFAULT NULL,
  `PIC3` varchar(200) DEFAULT NULL,
  `COLOR` varchar(20) DEFAULT NULL,
  `URL` varchar(200) DEFAULT NULL,
  `ADD_TIME` datetime DEFAULT NULL,
  `STATE` tinyint(4) DEFAULT '1',
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `SORT_ID` (`SORT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('7', 'VR', '9', null, null, 'upload/lun_bo/bg_002.jpg', null, null, '#010101', '/', '2015-12-17 09:02:20', '1', '2018-03-14 16:15:03');
INSERT INTO `news` VALUES ('10', '协议1', '100000', null, '会员协议0', '', null, null, '', '', '2015-12-17 15:21:43', '1', '2017-07-31 15:50:52');
INSERT INTO `news` VALUES ('11', '协议2', '100000', null, '商家协议0', '', null, null, '', '', '2015-12-17 15:21:43', '1', '2018-03-19 20:51:48');
INSERT INTO `news` VALUES ('12', '协议3', '100000', null, '服务商协议0', '', null, null, '', '', '2015-12-17 15:21:43', '1', '2017-07-31 15:51:13');
INSERT INTO `news` VALUES ('14', '突破', '9', null, null, 'upload/lun_bo/bg_001.jpg', null, null, '#FFFFFF', '', '2016-01-26 17:11:31', '1', null);
INSERT INTO `news` VALUES ('130', '图片1', '10', null, null, 'upload/1.jpg', null, null, '#2A4D17', '#', '2017-05-11 14:42:06', '1', '2017-05-11 14:53:51');
INSERT INTO `news` VALUES ('131', '000123', '10', null, null, 'upload/auto/2017/12/05/14/34/45/92336444251.jpg', null, null, '#2A4D17', '#', '2017-05-11 14:42:23', '1', '2017-12-05 14:34:50');
INSERT INTO `news` VALUES ('132', '测试公告。。。。', '11', null, null, '', null, null, '', '', '2017-05-17 15:30:54', '1', '2018-03-13 14:31:17');
INSERT INTO `news` VALUES ('133', '测试公告2。。。。', '11', null, null, '', null, null, '', '惠', '2017-05-17 15:31:09', '1', '2017-06-07 10:14:21');
INSERT INTO `news` VALUES ('134', 'app', '10', null, null, 'upload/auto/2018/01/08/15/36/59/36615079672.jpg', null, null, '', '', '2018-01-08 15:29:55', '1', '2018-01-08 15:37:00');

-- ----------------------------
-- Table structure for news_info
-- ----------------------------
DROP TABLE IF EXISTS `news_info`;
CREATE TABLE `news_info` (
  `NEWS_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MESS` text,
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`NEWS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_info
-- ----------------------------
INSERT INTO `news_info` VALUES ('10', '<p>协议1</p>', '2017-07-31 15:50:52');
INSERT INTO `news_info` VALUES ('11', '<p>协议2</p>', '2018-03-19 20:51:48');
INSERT INTO `news_info` VALUES ('12', '<p>协议3</p>', '2017-07-31 15:51:13');
INSERT INTO `news_info` VALUES ('121', '<p>&lt;p&gt;商品介绍002&lt;/p&gt;</p>', null);
INSERT INTO `news_info` VALUES ('122', '<p>商品介绍00200000000</p>', '2017-04-07 14:53:29');
INSERT INTO `news_info` VALUES ('123', '<p>商品介绍00200000000</p><p><br/></p><p><br/></p><p>&#39;sdf&nbsp;</p>', '2017-04-07 14:53:54');
INSERT INTO `news_info` VALUES ('124', '<p>001&#39;002</p>', '2017-04-07 14:56:11');
INSERT INTO `news_info` VALUES ('125', '<p>介绍0000</p>', null);
INSERT INTO `news_info` VALUES ('126', '<p>介绍</p>', null);
INSERT INTO `news_info` VALUES ('130', '<p>介绍</p>', '2017-05-11 14:53:51');
INSERT INTO `news_info` VALUES ('131', '<p>介绍</p>', '2017-12-05 14:34:50');
INSERT INTO `news_info` VALUES ('132', '<p>测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。</p>', '2018-03-13 14:31:17');
INSERT INTO `news_info` VALUES ('133', '<p>测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。测试公告。。。。</p>', '2017-06-07 10:14:21');
INSERT INTO `news_info` VALUES ('134', '<p>介绍</p>', '2018-01-08 15:37:00');

-- ----------------------------
-- Table structure for order_mall
-- ----------------------------
DROP TABLE IF EXISTS `order_mall`;
CREATE TABLE `order_mall` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `MONEY_ALL` decimal(20,2) DEFAULT '0.00',
  `MONEY_ALL_PRO` decimal(20,2) DEFAULT '0.00',
  `MONEY_ALL_YUN_FEI` decimal(20,2) DEFAULT '0.00',
  `ADD_TIME` datetime DEFAULT NULL,
  `STATE` decimal(4,1) DEFAULT '0.0' COMMENT '0:已下单 1：已付款',
  `ORDER_NUM` bigint(20) DEFAULT '0',
  `ALL_HUI_DIAN` decimal(20,2) DEFAULT NULL,
  `SHOPPING_ADDRESS_ID` bigint(20) unsigned DEFAULT NULL,
  `SHENG` int(11) DEFAULT '0',
  `SHI` int(11) DEFAULT '0',
  `QU` int(11) DEFAULT '0',
  `XIAN` int(11) DEFAULT '0',
  `ADDRESS` varchar(200) DEFAULT NULL,
  `ADDR_PERSON_NAME` varchar(20) DEFAULT NULL,
  `ADDR_PERSON_TEL` varchar(20) DEFAULT NULL,
  `PAY_HUI_DIAN` decimal(20,2) DEFAULT '0.00',
  `PAY_MONEY` decimal(20,2) DEFAULT NULL,
  `PAY_CHONG_MONEY` decimal(20,2) DEFAULT NULL,
  `PAY_TIME` datetime DEFAULT NULL,
  `PAY_MONEY_ALL` decimal(20,2) DEFAULT '0.00',
  `PAY_CHONG_ZHI_ORDER_NUM` bigint(20) unsigned DEFAULT NULL,
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `ADD_TIME` (`ADD_TIME`),
  KEY `STATE` (`STATE`)
) ENGINE=InnoDB AUTO_INCREMENT=16940867 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_mall
-- ----------------------------
INSERT INTO `order_mall` VALUES ('16940702', '71', '90.00', '90.00', '0.00', '2017-08-04 13:40:05', '1.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '2.00', '88.00', '0.00', '2017-08-07 09:37:41', '0.00', null, '2017-08-07 09:37:41');
INSERT INTO `order_mall` VALUES ('16940703', '71', '101.00', '91.00', '10.00', '2017-08-04 14:16:31', '1.0', '0', '91.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', '101.00', '0.00', '2017-08-04 15:48:46', '0.00', null, '2017-08-04 15:48:46');
INSERT INTO `order_mall` VALUES ('16940704', '71', '101.00', '91.00', '10.00', '2017-08-07 09:49:56', '1.0', '0', '91.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', '101.00', '0.00', '2017-08-07 09:50:00', '0.00', null, '2017-08-07 09:50:00');
INSERT INTO `order_mall` VALUES ('16940705', '71', '101.00', '91.00', '10.00', '2017-09-10 20:23:10', '0.0', '0', '91.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2017-09-10 20:24:53');
INSERT INTO `order_mall` VALUES ('16940706', '76', '101.00', '91.00', '10.00', '2017-09-22 14:05:32', '0.0', '0', '91.00', '64252', '120000', '120300', '0', '0', '河西大街1256号3号楼2单元3356', '王先生', '13700000000', '0.00', null, null, null, '0.00', null, '2017-09-22 14:05:32');
INSERT INTO `order_mall` VALUES ('16940707', '6681499', '270.00', '270.00', '0.00', '2017-11-03 14:02:11', '0.1', '0', '30.00', '64253', '120000', '120200', '0', '0', 'rt53456', '是的撒', '13005409632', '0.00', '0.00', '270.00', null, '0.00', null, '2017-11-03 14:02:36');
INSERT INTO `order_mall` VALUES ('16940708', '6681500', '100.00', '90.00', '10.00', '2017-11-18 07:57:14', '0.1', '0', '10.00', '64254', '120000', '120100', '0', '0', '131', '31231313', '12311121', '0.00', '0.00', '100.00', null, '0.00', null, '2017-11-18 07:57:25');
INSERT INTO `order_mall` VALUES ('16940709', '6681500', '101.00', '91.00', '10.00', '2017-11-18 07:57:38', '0.0', '0', '91.00', '64254', '120000', '120100', '0', '0', '131', '31231313', '12311121', '0.00', null, null, null, '0.00', null, '2017-11-18 07:57:38');
INSERT INTO `order_mall` VALUES ('16940710', '6681502', '90.00', '90.00', '0.00', '2017-11-26 20:37:03', '0.1', '0', '10.00', '64255', '110000', '110500', '0', '0', 'xz', '吴明', '18566664444', '0.00', '0.00', '90.00', null, '0.00', null, '2017-11-26 20:40:05');
INSERT INTO `order_mall` VALUES ('16940711', '6681502', '101.00', '91.00', '10.00', '2017-11-26 20:41:07', '0.0', '0', '91.00', '64255', '110000', '110500', '0', '0', 'xz', '吴明', '18566664444', '0.00', null, null, null, '0.00', null, '2017-11-26 20:41:07');
INSERT INTO `order_mall` VALUES ('16940712', '6681502', '90.00', '90.00', '0.00', '2017-11-26 20:48:01', '0.0', '0', '10.00', '64255', '110000', '110500', '0', '0', 'xz', '吴明', '18566664444', '0.00', null, null, null, '0.00', null, '2017-11-26 20:48:20');
INSERT INTO `order_mall` VALUES ('16940713', '6681502', '180.00', '180.00', '0.00', '2017-11-26 20:57:41', '0.0', '0', '20.00', '64255', '110000', '110500', '0', '0', 'xz', '吴明', '18566664444', '0.00', null, null, null, '0.00', null, '2017-11-26 20:57:41');
INSERT INTO `order_mall` VALUES ('16940720', '6681502', '270.00', '270.00', '0.00', '2017-12-21 19:40:56', '0.1', '0', '20.00', '64256', '360000', '360100', '360102', '0', 'sesdsa', 'sd', '18544446666', '0.00', '0.00', '270.00', null, '0.00', null, '2017-12-21 19:41:12');
INSERT INTO `order_mall` VALUES ('16940721', '6681502', '90.00', '90.00', '0.00', '2017-12-21 19:44:34', '0.1', '0', '10.00', '64256', '360000', '360100', '360102', '0', 'sesdsa', 'sd', '18544446666', '0.00', '0.00', '90.00', null, '0.00', null, '2017-12-21 19:45:08');
INSERT INTO `order_mall` VALUES ('16940722', '6681502', '370.00', '360.00', '10.00', '2017-12-25 14:59:53', '0.1', '0', '40.00', '64256', '360000', '360100', '360102', '0', 'sesdsa', 'sd', '18544446666', '0.00', '0.00', '370.00', null, '0.00', null, '2017-12-25 14:59:55');
INSERT INTO `order_mall` VALUES ('16940728', '6681506', '170.00', '170.00', '0.00', '2018-01-09 20:10:10', '0.1', '0', '2.00', '64260', '230000', '230100', '230102', '0', '庙坝镇庙坝中学', '文香雯', '157231451854', '0.00', '0.00', '170.00', null, '0.00', null, '2018-01-09 21:25:00');
INSERT INTO `order_mall` VALUES ('16940729', '71', '90.00', '90.00', '0.00', '2018-03-15 16:40:57', '1.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '2.00', '88.00', '0.00', '2018-03-15 16:41:03', '0.00', null, '2018-03-15 16:41:03');
INSERT INTO `order_mall` VALUES ('16940730', '71', '101.00', '91.00', '10.00', '2018-03-15 16:51:07', '0.0', '0', '91.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-03-15 16:51:24');
INSERT INTO `order_mall` VALUES ('16940731', '71', '935.00', '910.00', '25.00', '2018-03-15 16:51:40', '0.1', '0', '910.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', '425.00', '510.00', null, '0.00', null, '2018-03-15 16:57:19');
INSERT INTO `order_mall` VALUES ('16940732', '71', '90.00', '90.00', '0.00', '2018-04-12 10:55:06', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 10:55:06');
INSERT INTO `order_mall` VALUES ('16940733', '71', '90.00', '80.00', '10.00', '2018-04-12 13:27:55', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 13:27:55');
INSERT INTO `order_mall` VALUES ('16940734', '71', '101.00', '91.00', '10.00', '2018-04-12 13:28:59', '0.0', '0', '91.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 13:28:59');
INSERT INTO `order_mall` VALUES ('16940735', '71', '101.00', '91.00', '10.00', '2018-04-12 14:17:12', '0.0', '0', '91.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 14:17:12');
INSERT INTO `order_mall` VALUES ('16940736', '71', '90.00', '90.00', '0.00', '2018-04-12 16:44:48', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 16:44:49');
INSERT INTO `order_mall` VALUES ('16940737', '71', '90.00', '90.00', '0.00', '2018-04-12 17:02:36', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:02:38');
INSERT INTO `order_mall` VALUES ('16940738', '71', '90.00', '90.00', '0.00', '2018-04-12 17:04:13', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:04:14');
INSERT INTO `order_mall` VALUES ('16940739', '71', '90.00', '90.00', '0.00', '2018-04-12 17:04:33', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:04:34');
INSERT INTO `order_mall` VALUES ('16940740', '71', '90.00', '90.00', '0.00', '2018-04-12 17:21:04', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:21:05');
INSERT INTO `order_mall` VALUES ('16940741', '71', '90.00', '90.00', '0.00', '2018-04-12 17:21:43', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:21:44');
INSERT INTO `order_mall` VALUES ('16940742', '71', '90.00', '90.00', '0.00', '2018-04-12 17:27:35', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:27:36');
INSERT INTO `order_mall` VALUES ('16940743', '71', '90.00', '90.00', '0.00', '2018-04-12 17:29:45', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:29:47');
INSERT INTO `order_mall` VALUES ('16940744', '71', '90.00', '90.00', '0.00', '2018-04-12 17:30:09', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:30:10');
INSERT INTO `order_mall` VALUES ('16940745', '71', '90.00', '90.00', '0.00', '2018-04-12 17:42:43', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 17:42:44');
INSERT INTO `order_mall` VALUES ('16940746', '71', '90.00', '90.00', '0.00', '2018-04-12 22:14:05', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 22:14:05');
INSERT INTO `order_mall` VALUES ('16940747', '71', '90.00', '90.00', '0.00', '2018-04-12 22:19:54', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 22:19:54');
INSERT INTO `order_mall` VALUES ('16940748', '71', '90.00', '90.00', '0.00', '2018-04-12 22:49:41', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 22:49:41');
INSERT INTO `order_mall` VALUES ('16940749', '71', '910.00', '890.00', '20.00', '2018-04-12 23:23:58', '0.0', '0', '66.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-12 23:23:58');
INSERT INTO `order_mall` VALUES ('16940750', '71', '90.00', '90.00', '0.00', '2018-04-13 10:41:19', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-13 10:41:19');
INSERT INTO `order_mall` VALUES ('16940751', '71', '90.00', '90.00', '0.00', '2018-04-13 10:42:25', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-13 10:42:25');
INSERT INTO `order_mall` VALUES ('16940752', '71', '90.00', '90.00', '0.00', '2018-04-13 10:43:00', '0.0', '0', '10.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-13 10:43:00');
INSERT INTO `order_mall` VALUES ('16940753', '100', '191.00', '181.00', '10.00', '2018-04-19 14:14:15', '0.0', '0', '101.00', '64265', '120000', '120100', '120101', '0', '上放水电费', '大师傅', '13777888888', '0.00', null, null, null, '0.00', null, '2018-04-19 14:14:15');
INSERT INTO `order_mall` VALUES ('16940754', '100', '191.00', '181.00', '10.00', '2018-04-19 16:04:42', '0.0', '0', '101.00', '64265', '120000', '120100', '120111', '0', '上放水电费22', '大师傅2', '13777888822', '0.00', null, null, null, '0.00', null, '2018-04-19 16:04:42');
INSERT INTO `order_mall` VALUES ('16940755', '71', '552.00', '532.00', '20.00', '2018-04-19 16:58:42', '0.0', '0', '198.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-19 16:58:42');
INSERT INTO `order_mall` VALUES ('16940756', '71', '560.00', '550.00', '10.00', '2018-04-19 16:59:02', '0.0', '0', '50.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-19 16:59:03');
INSERT INTO `order_mall` VALUES ('16940757', '71', '101.00', '91.00', '10.00', '2018-04-20 16:28:49', '0.0', '0', '91.00', '64268', '330000', '330300', '330303', '0', '54', '阿搞不成', '13708954375', '0.00', null, null, null, '0.00', null, '2018-04-20 16:28:49');
INSERT INTO `order_mall` VALUES ('16940758', '71', '101.00', '91.00', '10.00', '2018-04-20 20:01:27', '0.0', '0', '91.00', '64251', '320000', '320500', '320506', '0', 'a', 'b', '13000000000', '0.00', null, null, null, '0.00', null, '2018-04-20 20:01:27');
INSERT INTO `order_mall` VALUES ('16940759', '71', '90.00', '80.00', '10.00', '2018-04-21 20:57:10', '0.0', '0', '10.00', '64268', '330000', '330300', '330303', '0', '54', '阿搞不成', '13708954375', '0.00', null, null, null, '0.00', null, '2018-04-21 20:57:10');
INSERT INTO `order_mall` VALUES ('16940760', '71', '101.00', '91.00', '10.00', '2018-04-23 15:03:40', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:03:40');
INSERT INTO `order_mall` VALUES ('16940761', '71', '101.00', '91.00', '10.00', '2018-04-23 15:05:49', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:05:49');
INSERT INTO `order_mall` VALUES ('16940762', '71', '101.00', '91.00', '10.00', '2018-04-23 15:06:59', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:06:59');
INSERT INTO `order_mall` VALUES ('16940763', '71', '101.00', '91.00', '10.00', '2018-04-23 15:11:07', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:11:07');
INSERT INTO `order_mall` VALUES ('16940764', '71', '101.00', '91.00', '10.00', '2018-04-23 15:16:23', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:16:23');
INSERT INTO `order_mall` VALUES ('16940765', '71', '101.00', '91.00', '10.00', '2018-04-23 15:16:49', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:16:49');
INSERT INTO `order_mall` VALUES ('16940766', '71', '101.00', '91.00', '10.00', '2018-04-23 15:19:03', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:19:03');
INSERT INTO `order_mall` VALUES ('16940767', '71', '101.00', '91.00', '10.00', '2018-04-23 15:22:03', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:22:03');
INSERT INTO `order_mall` VALUES ('16940768', '71', '101.00', '91.00', '10.00', '2018-04-23 15:22:18', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:22:18');
INSERT INTO `order_mall` VALUES ('16940769', '71', '101.00', '91.00', '10.00', '2018-04-23 15:31:59', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:31:59');
INSERT INTO `order_mall` VALUES ('16940770', '71', '101.00', '91.00', '10.00', '2018-04-23 15:38:54', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:38:54');
INSERT INTO `order_mall` VALUES ('16940771', '71', '101.00', '91.00', '10.00', '2018-04-23 15:42:54', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 15:42:58');
INSERT INTO `order_mall` VALUES ('16940772', '71', '101.00', '91.00', '10.00', '2018-04-23 16:27:18', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 16:27:18');
INSERT INTO `order_mall` VALUES ('16940773', '71', '101.00', '91.00', '10.00', '2018-04-23 16:29:13', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 16:29:13');
INSERT INTO `order_mall` VALUES ('16940774', '71', '101.00', '91.00', '10.00', '2018-04-23 16:31:40', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 16:31:40');
INSERT INTO `order_mall` VALUES ('16940775', '71', '101.00', '91.00', '10.00', '2018-04-23 16:57:51', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 16:57:51');
INSERT INTO `order_mall` VALUES ('16940776', '71', '101.00', '91.00', '10.00', '2018-04-23 17:06:38', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 17:06:38');
INSERT INTO `order_mall` VALUES ('16940777', '71', '101.00', '91.00', '10.00', '2018-04-23 17:15:06', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 17:15:06');
INSERT INTO `order_mall` VALUES ('16940778', '71', '101.00', '91.00', '10.00', '2018-04-23 17:16:32', '1.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '101.00', '0.00', '2018-04-23 17:16:36', '0.00', null, '2018-04-23 17:16:36');
INSERT INTO `order_mall` VALUES ('16940779', '71', '101.00', '91.00', '10.00', '2018-04-23 17:18:33', '1.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '101.00', '0.00', '2018-04-23 17:18:34', '0.00', null, '2018-04-23 17:18:34');
INSERT INTO `order_mall` VALUES ('16940780', '71', '101.00', '91.00', '10.00', '2018-04-23 17:19:12', '1.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '101.00', '0.00', '2018-04-23 17:19:14', '0.00', null, '2018-04-23 17:19:14');
INSERT INTO `order_mall` VALUES ('16940781', '71', '101.00', '91.00', '10.00', '2018-04-23 17:19:54', '1.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '101.00', '0.00', '2018-04-23 17:19:56', '0.00', null, '2018-04-23 17:19:56');
INSERT INTO `order_mall` VALUES ('16940782', '71', '101.00', '91.00', '10.00', '2018-04-23 17:20:41', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 17:20:41');
INSERT INTO `order_mall` VALUES ('16940783', '71', '101.00', '91.00', '10.00', '2018-04-23 17:21:31', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 17:21:31');
INSERT INTO `order_mall` VALUES ('16940784', '71', '101.00', '91.00', '10.00', '2018-04-23 17:22:32', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 17:22:32');
INSERT INTO `order_mall` VALUES ('16940785', '71', '101.00', '91.00', '10.00', '2018-04-23 17:23:46', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 17:23:46');
INSERT INTO `order_mall` VALUES ('16940786', '71', '101.00', '91.00', '10.00', '2018-04-23 17:26:04', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 17:26:04');
INSERT INTO `order_mall` VALUES ('16940787', '71', '101.00', '91.00', '10.00', '2018-04-23 17:28:01', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 17:28:01');
INSERT INTO `order_mall` VALUES ('16940788', '71', '101.00', '91.00', '10.00', '2018-04-23 17:31:05', '0.1', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '21.00', '80.00', null, '0.00', null, '2018-04-23 17:31:11');
INSERT INTO `order_mall` VALUES ('16940789', '71', '101.00', '91.00', '10.00', '2018-04-23 21:14:12', '1.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '101.00', '0.00', '2018-04-23 21:14:19', '0.00', null, '2018-04-23 21:14:19');
INSERT INTO `order_mall` VALUES ('16940790', '71', '101.00', '91.00', '10.00', '2018-04-23 21:14:47', '1.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '101.00', '0.00', '2018-04-23 21:14:53', '0.00', null, '2018-04-23 21:14:53');
INSERT INTO `order_mall` VALUES ('16940791', '71', '101.00', '91.00', '10.00', '2018-04-23 21:18:24', '1.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '101.00', '0.00', '2018-04-23 21:18:25', '0.00', null, '2018-04-23 21:18:25');
INSERT INTO `order_mall` VALUES ('16940792', '71', '101.00', '91.00', '10.00', '2018-04-23 21:19:24', '1.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '101.00', '0.00', '2018-04-23 21:19:25', '0.00', null, '2018-04-23 21:19:25');
INSERT INTO `order_mall` VALUES ('16940793', '71', '90.00', '90.00', '0.00', '2018-04-23 21:19:47', '1.0', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '90.00', '0.00', '2018-04-23 21:19:48', '0.00', null, '2018-04-23 21:19:48');
INSERT INTO `order_mall` VALUES ('16940794', '71', '90.00', '90.00', '0.00', '2018-04-23 21:19:59', '0.1', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '6.00', '84.00', null, '0.00', null, '2018-04-23 21:20:00');
INSERT INTO `order_mall` VALUES ('16940795', '71', '90.00', '90.00', '0.00', '2018-04-23 21:20:23', '0.0', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-23 21:20:23');
INSERT INTO `order_mall` VALUES ('16940796', '71', '90.00', '90.00', '0.00', '2018-04-23 21:20:32', '1.0', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '90.00', '0.00', '2018-04-23 21:20:38', '0.00', null, '2018-04-23 21:20:38');
INSERT INTO `order_mall` VALUES ('16940797', '71', '90.00', '90.00', '0.00', '2018-04-23 21:22:34', '1.0', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '90.00', '0.00', '2018-04-23 21:22:36', '0.00', null, '2018-04-23 21:22:36');
INSERT INTO `order_mall` VALUES ('16940798', '71', '90.00', '90.00', '0.00', '2018-04-24 10:02:31', '1.0', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '90.00', '0.00', '2018-04-24 10:02:34', '0.00', null, '2018-04-24 10:02:34');
INSERT INTO `order_mall` VALUES ('16940799', '71', '1170.00', '1170.00', '0.00', '2018-04-24 10:40:09', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '940.00', null, '0.00', null, '2018-04-24 10:40:10');
INSERT INTO `order_mall` VALUES ('16940800', '71', '1170.00', '1170.00', '0.00', '2018-04-24 11:05:31', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '940.00', null, '0.00', null, '2018-04-24 11:05:33');
INSERT INTO `order_mall` VALUES ('16940801', '71', '1170.00', '1170.00', '0.00', '2018-04-24 11:06:20', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '940.00', null, '0.00', null, '2018-04-24 11:06:24');
INSERT INTO `order_mall` VALUES ('16940802', '71', '1170.00', '1170.00', '0.00', '2018-04-24 11:10:00', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '940.00', null, '0.00', null, '2018-04-24 11:10:02');
INSERT INTO `order_mall` VALUES ('16940803', '71', '280.00', '270.00', '10.00', '2018-04-24 11:27:02', '0.0', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-24 11:27:02');
INSERT INTO `order_mall` VALUES ('16940804', '71', '280.00', '270.00', '10.00', '2018-04-24 11:27:09', '0.1', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '50.00', null, '0.00', null, '2018-04-24 11:27:28');
INSERT INTO `order_mall` VALUES ('16940805', '71', '540.00', '540.00', '0.00', '2018-04-24 11:29:42', '0.1', '0', '12.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '310.00', null, '0.00', null, '2018-04-24 11:29:44');
INSERT INTO `order_mall` VALUES ('16940806', '71', '270.00', '270.00', '0.00', '2018-04-24 11:38:54', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 11:38:55');
INSERT INTO `order_mall` VALUES ('16940807', '71', '270.00', '270.00', '0.00', '2018-04-24 11:42:57', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 11:43:00');
INSERT INTO `order_mall` VALUES ('16940808', '71', '270.00', '270.00', '0.00', '2018-04-24 11:43:18', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 11:45:01');
INSERT INTO `order_mall` VALUES ('16940809', '71', '450.00', '450.00', '0.00', '2018-04-24 11:50:06', '0.1', '0', '50.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '220.00', null, '0.00', null, '2018-04-24 11:50:08');
INSERT INTO `order_mall` VALUES ('16940810', '71', '540.00', '540.00', '0.00', '2018-04-24 11:53:46', '0.1', '0', '60.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '310.00', null, '0.00', null, '2018-04-24 11:53:47');
INSERT INTO `order_mall` VALUES ('16940811', '71', '450.00', '450.00', '0.00', '2018-04-24 11:55:43', '0.1', '0', '50.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '220.00', null, '0.00', null, '2018-04-24 11:55:44');
INSERT INTO `order_mall` VALUES ('16940812', '71', '450.00', '450.00', '0.00', '2018-04-24 11:58:07', '0.1', '0', '50.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '220.00', null, '0.00', null, '2018-04-24 11:58:08');
INSERT INTO `order_mall` VALUES ('16940813', '71', '450.00', '450.00', '0.00', '2018-04-24 12:03:36', '0.1', '0', '50.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '220.00', null, '0.00', null, '2018-04-24 12:03:37');
INSERT INTO `order_mall` VALUES ('16940814', '71', '450.00', '450.00', '0.00', '2018-04-24 12:14:53', '0.1', '0', '50.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '220.00', null, '0.00', null, '2018-04-24 12:14:55');
INSERT INTO `order_mall` VALUES ('16940815', '71', '450.00', '450.00', '0.00', '2018-04-24 12:19:38', '0.1', '0', '50.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '220.00', null, '0.00', null, '2018-04-24 12:19:40');
INSERT INTO `order_mall` VALUES ('16940816', '71', '320.00', '320.00', '0.00', '2018-04-24 12:49:30', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '90.00', null, '0.00', null, '2018-04-24 12:49:31');
INSERT INTO `order_mall` VALUES ('16940817', '71', '320.00', '320.00', '0.00', '2018-04-24 12:50:14', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '90.00', null, '0.00', null, '2018-04-24 12:50:15');
INSERT INTO `order_mall` VALUES ('16940818', '71', '320.00', '320.00', '0.00', '2018-04-24 12:50:54', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '90.00', null, '0.00', null, '2018-04-24 12:50:57');
INSERT INTO `order_mall` VALUES ('16940819', '71', '270.00', '270.00', '0.00', '2018-04-24 13:00:28', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:00:38');
INSERT INTO `order_mall` VALUES ('16940820', '71', '270.00', '270.00', '0.00', '2018-04-24 13:04:33', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:04:35');
INSERT INTO `order_mall` VALUES ('16940821', '71', '270.00', '270.00', '0.00', '2018-04-24 13:20:42', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:20:43');
INSERT INTO `order_mall` VALUES ('16940822', '71', '270.00', '270.00', '0.00', '2018-04-24 13:21:51', '0.1', '0', '6.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:21:53');
INSERT INTO `order_mall` VALUES ('16940823', '71', '270.00', '270.00', '0.00', '2018-04-24 13:26:30', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:26:31');
INSERT INTO `order_mall` VALUES ('16940824', '71', '270.00', '270.00', '0.00', '2018-04-24 13:27:44', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:27:46');
INSERT INTO `order_mall` VALUES ('16940825', '71', '240.00', '240.00', '0.00', '2018-04-24 13:29:34', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '10.00', null, '0.00', null, '2018-04-24 13:29:35');
INSERT INTO `order_mall` VALUES ('16940826', '71', '240.00', '240.00', '0.00', '2018-04-24 13:34:49', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '10.00', null, '0.00', null, '2018-04-24 13:34:50');
INSERT INTO `order_mall` VALUES ('16940827', '71', '270.00', '270.00', '0.00', '2018-04-24 13:37:47', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:37:49');
INSERT INTO `order_mall` VALUES ('16940828', '71', '270.00', '270.00', '0.00', '2018-04-24 13:38:38', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:38:39');
INSERT INTO `order_mall` VALUES ('16940829', '71', '270.00', '270.00', '0.00', '2018-04-24 13:39:28', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:39:29');
INSERT INTO `order_mall` VALUES ('16940830', '71', '270.00', '270.00', '0.00', '2018-04-24 13:41:14', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:41:15');
INSERT INTO `order_mall` VALUES ('16940831', '71', '270.00', '270.00', '0.00', '2018-04-24 13:41:47', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:41:48');
INSERT INTO `order_mall` VALUES ('16940832', '71', '270.00', '270.00', '0.00', '2018-04-24 13:45:25', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:45:27');
INSERT INTO `order_mall` VALUES ('16940833', '71', '270.00', '270.00', '0.00', '2018-04-24 13:46:59', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:47:00');
INSERT INTO `order_mall` VALUES ('16940834', '71', '240.00', '240.00', '0.00', '2018-04-24 13:47:56', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '10.00', null, '0.00', null, '2018-04-24 13:47:58');
INSERT INTO `order_mall` VALUES ('16940835', '71', '900.00', '900.00', '0.00', '2018-04-24 13:48:47', '0.1', '0', '100.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '670.00', null, '0.00', null, '2018-04-24 13:48:49');
INSERT INTO `order_mall` VALUES ('16940836', '71', '270.00', '270.00', '0.00', '2018-04-24 13:57:13', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 13:57:15');
INSERT INTO `order_mall` VALUES ('16940837', '71', '270.00', '270.00', '0.00', '2018-04-24 14:00:22', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 14:00:23');
INSERT INTO `order_mall` VALUES ('16940838', '71', '270.00', '270.00', '0.00', '2018-04-24 14:03:58', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 14:03:59');
INSERT INTO `order_mall` VALUES ('16940839', '71', '270.00', '270.00', '0.00', '2018-04-24 14:08:13', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 14:08:14');
INSERT INTO `order_mall` VALUES ('16940840', '71', '240.00', '240.00', '0.00', '2018-04-24 14:09:33', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '10.00', null, '0.00', null, '2018-04-24 14:09:35');
INSERT INTO `order_mall` VALUES ('16940841', '71', '240.00', '240.00', '0.00', '2018-04-24 14:12:40', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '10.00', null, '0.00', null, '2018-04-24 14:12:41');
INSERT INTO `order_mall` VALUES ('16940842', '71', '900.00', '900.00', '0.00', '2018-04-24 14:41:22', '0.1', '0', '100.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '670.00', null, '0.00', null, '2018-04-24 14:41:23');
INSERT INTO `order_mall` VALUES ('16940843', '71', '240.00', '240.00', '0.00', '2018-04-24 14:42:01', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '10.00', null, '0.00', null, '2018-04-24 14:42:06');
INSERT INTO `order_mall` VALUES ('16940844', '71', '270.00', '270.00', '0.00', '2018-04-24 14:58:36', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 14:58:38');
INSERT INTO `order_mall` VALUES ('16940845', '71', '270.00', '270.00', '0.00', '2018-04-24 14:59:40', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 14:59:42');
INSERT INTO `order_mall` VALUES ('16940846', '71', '360.00', '360.00', '0.00', '2018-04-24 15:03:28', '0.1', '0', '8.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '130.00', null, '0.00', null, '2018-04-24 15:03:29');
INSERT INTO `order_mall` VALUES ('16940847', '71', '270.00', '270.00', '0.00', '2018-04-24 15:12:04', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 15:12:05');
INSERT INTO `order_mall` VALUES ('16940848', '71', '270.00', '270.00', '0.00', '2018-04-24 15:14:26', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 15:14:27');
INSERT INTO `order_mall` VALUES ('16940849', '71', '270.00', '270.00', '0.00', '2018-04-24 15:14:54', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '0.00', '270.00', null, '0.00', null, '2018-04-26 18:03:21');
INSERT INTO `order_mall` VALUES ('16940850', '71', '270.00', '270.00', '0.00', '2018-04-24 15:22:34', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 15:22:35');
INSERT INTO `order_mall` VALUES ('16940851', '71', '270.00', '270.00', '0.00', '2018-04-24 15:29:43', '0.1', '0', '30.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '230.00', '40.00', null, '0.00', null, '2018-04-24 15:29:44');
INSERT INTO `order_mall` VALUES ('16940852', '71', '180.00', '180.00', '0.00', '2018-04-24 15:32:54', '1.0', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '180.00', '0.00', '2018-04-24 15:32:58', '0.00', null, '2018-04-24 15:32:58');
INSERT INTO `order_mall` VALUES ('16940853', '71', '191.00', '181.00', '10.00', '2018-04-24 15:33:20', '0.0', '0', '101.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-24 15:40:13');
INSERT INTO `order_mall` VALUES ('16940854', '71', '240.00', '240.00', '0.00', '2018-04-24 17:41:18', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '50.00', '190.00', null, '0.00', null, '2018-04-24 17:41:23');
INSERT INTO `order_mall` VALUES ('16940855', '71', '50.01', '50.01', '0.00', '2018-04-24 21:16:38', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '50.00', '0.01', null, '0.00', null, '2018-04-24 21:16:40');
INSERT INTO `order_mall` VALUES ('16940856', '71', '90.00', '90.00', '0.00', '2018-04-24 21:45:33', '0.1', '0', '10.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '50.00', '40.00', null, '0.00', null, '2018-04-24 21:51:26');
INSERT INTO `order_mall` VALUES ('16940857', '71', '50.01', '50.01', '0.00', '2018-04-24 22:39:48', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '50.00', '0.01', null, '0.00', null, '2018-04-24 22:39:50');
INSERT INTO `order_mall` VALUES ('16940858', '71', '50.01', '50.01', '0.00', '2018-04-24 22:51:16', '1.0', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '50.00', '0.01', '2018-04-24 22:51:27', '0.00', '1064416', '2018-04-24 22:51:27');
INSERT INTO `order_mall` VALUES ('16940859', '71', '0.01', '0.01', '0.00', '2018-04-24 23:06:41', '1.0', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '0.00', '0.01', '2018-04-27 19:55:25', '0.00', '1064420', '2018-04-27 19:55:25');
INSERT INTO `order_mall` VALUES ('16940860', '71', '191.00', '181.00', '10.00', '2018-04-25 14:42:14', '0.1', '0', '101.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '10.00', '181.00', null, '0.00', null, '2018-04-26 10:20:19');
INSERT INTO `order_mall` VALUES ('16940861', '71', '50.01', '50.01', '0.00', '2018-04-26 16:52:45', '1.0', '0', '2.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '2.00', '48.00', '0.01', '2018-04-26 17:32:44', '0.00', '1064417', '2018-04-26 17:32:44');
INSERT INTO `order_mall` VALUES ('16940862', '71', '80.00', '80.00', '0.00', '2018-04-26 18:48:08', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '0.00', '80.00', null, '0.00', null, '2018-04-26 18:48:10');
INSERT INTO `order_mall` VALUES ('16940863', '71', '101.00', '91.00', '10.00', '2018-04-27 12:55:07', '0.0', '0', '91.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', null, null, null, '0.00', null, '2018-04-27 12:55:07');
INSERT INTO `order_mall` VALUES ('16940864', '71', '0.01', '0.01', '0.00', '2018-04-27 19:57:17', '1.0', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '0.00', '0.01', '2018-04-27 19:57:41', '0.00', '1064421', '2018-04-27 19:57:41');
INSERT INTO `order_mall` VALUES ('16940865', '6681512', '100.00', '100.00', '0.00', '2018-04-28 00:43:08', '0.1', '0', '10.00', '64270', '110000', '110100', '110102', '0', '京东基督教', '测试', '13500135000', '0.00', '0.00', '100.00', null, '0.00', null, '2018-04-28 00:43:29');
INSERT INTO `order_mall` VALUES ('16940866', '71', '0.01', '0.01', '0.00', '2018-05-08 15:42:22', '0.1', '0', '0.00', '64269', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '0.00', '0.00', '0.01', null, '0.00', null, '2018-05-08 15:42:25');

-- ----------------------------
-- Table structure for order_mall_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_mall_detail`;
CREATE TABLE `order_mall_detail` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ORDER_ID` bigint(20) unsigned DEFAULT '0',
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `SHOP_ID` bigint(20) unsigned DEFAULT '0',
  `PRO_ID` bigint(20) unsigned DEFAULT '0',
  `PRO_TYPE_ID` bigint(20) DEFAULT '0',
  `MONEY_PRO` decimal(20,2) DEFAULT '0.00',
  `MONEY_YUN_FEI` decimal(20,2) DEFAULT '0.00',
  `PRO_COUNT` bigint(20) DEFAULT '1',
  `HUI_DIAN_PRO` decimal(20,2) DEFAULT '0.00' COMMENT '可以抵扣的惠点',
  `HUI_DIAN_USED` decimal(20,2) DEFAULT '0.00' COMMENT '该产品使用的抵扣惠点',
  `PRO_NAME` varchar(60) DEFAULT NULL,
  `PRO_TYPE_NAME` varchar(60) DEFAULT NULL,
  `STATE2` decimal(4,1) DEFAULT '-1.0',
  `KUAI_DI_GONG_SI` int(11) DEFAULT '0',
  `KUAI_DI_DAN_HAO` varchar(30) DEFAULT NULL COMMENT '快递单号',
  `FA_HUO_TIME` datetime DEFAULT NULL,
  `SHOU_HUO_TIME` datetime DEFAULT NULL,
  `PAY_MONEY` decimal(20,2) DEFAULT '0.00' COMMENT '支付的金额',
  `PAY_HUI_DIAN` decimal(20,2) DEFAULT '0.00' COMMENT '支付的惠点',
  `WILL_DO_TIME` datetime DEFAULT NULL COMMENT '计划结单时间',
  `WILL_DO_MONTH` datetime DEFAULT NULL COMMENT '计划结单月份',
  `DO_TIME` datetime DEFAULT NULL COMMENT '执行时间',
  `FEED_BACK` decimal(20,2) DEFAULT '0.00' COMMENT '50%反馈',
  `RECOMMOND_PERSON` decimal(20,2) DEFAULT '0.00',
  `SHOP_RECOMMOND` decimal(20,2) DEFAULT '0.00',
  `SHE_QU` decimal(20,2) DEFAULT '0.00',
  `QU_XIAN` decimal(20,2) DEFAULT '0.00',
  `FEN_GONG_SI` decimal(20,2) DEFAULT '0.00',
  `SHI_CHANG_BU` decimal(20,2) DEFAULT '0.00',
  `RECOMMOND_QU_XIAN` decimal(20,2) DEFAULT '0.00',
  `CAI_WU` decimal(20,2) DEFAULT '0.00',
  `SHENG_YU` decimal(20,2) DEFAULT '0.00',
  `ID_RECOMMOND_PERSON` bigint(20) unsigned DEFAULT '0',
  `ID_SHOP_RECOMMOND` bigint(20) unsigned DEFAULT '0',
  `ID_SHE_QU` bigint(20) unsigned DEFAULT '0',
  `ID_QU_XIAN` bigint(20) unsigned DEFAULT '0',
  `ID_FEN_GONG_SI` bigint(20) unsigned DEFAULT '0',
  `ID_SHI_CHANG_BU` bigint(20) unsigned DEFAULT '0',
  `ID_RECOMMOND_QU_XIAN` bigint(20) unsigned DEFAULT '0',
  `ID_CAI_WU` bigint(20) unsigned DEFAULT '0',
  `DO_STATE` tinyint(4) DEFAULT '0',
  `POINT` decimal(20,2) DEFAULT '0.00',
  `END_SHOU_HUO_TIME` datetime DEFAULT NULL COMMENT '最晚收货时间',
  `TUI_TIME` datetime DEFAULT NULL COMMENT '申请退货时间',
  `TUI_REASON` int(11) DEFAULT '0' COMMENT '退货原因',
  `END_TUI_TIME` datetime DEFAULT NULL,
  `TUI_FAHUO_TIME` datetime DEFAULT NULL,
  `END_TUI_FAHUO_TIME` datetime DEFAULT NULL,
  `TUI_SHOUHUO_TIME` datetime DEFAULT NULL,
  `END_TUI_SHOUHUO_TIME` datetime DEFAULT NULL,
  `TUI_KUAIDI` int(11) DEFAULT '0',
  `TUI_KUAIDI_DANHAO` varchar(30) DEFAULT NULL,
  `IS_PING_JIA` tinyint(4) DEFAULT '0',
  `SHOP_ROLE_ID` int(11) DEFAULT NULL,
  `MESS` varchar(100) DEFAULT NULL,
  `SHOP_RATE` decimal(10,2) DEFAULT '0.00',
  `TYPE_POINT` decimal(20,2) DEFAULT '0.00',
  `SHOP_SET_YUN_FEI` decimal(10,2) DEFAULT '-1.00',
  `STATE26_TIME` datetime DEFAULT NULL,
  `GONG_YING_SHANG_ID` bigint(20) DEFAULT '0',
  `CHENG_BEN_PRICE` decimal(20,2) DEFAULT '0.00',
  `USED_MONEY_ALL` decimal(20,2) DEFAULT '0.00',
  `USED_YU_E` decimal(20,2) DEFAULT '0.00',
  `USED_BANK` decimal(20,2) DEFAULT '0.00',
  `CAN_USE_YU_E` decimal(20,2) DEFAULT '0.00' COMMENT '可使用余额额度',
  `EDIT_TIME` datetime DEFAULT NULL,
  `ADD_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `SHOP_ID` (`SHOP_ID`),
  KEY `PRO_ID` (`PRO_ID`),
  KEY `STATE2` (`STATE2`),
  KEY `FA_HUO_TIME` (`FA_HUO_TIME`),
  KEY `SHOU_HUO_TIME` (`SHOU_HUO_TIME`),
  KEY `END_SHOU_HUO_TIME` (`END_SHOU_HUO_TIME`),
  KEY `SHOP_ROLE_ID` (`SHOP_ROLE_ID`),
  KEY `DO_TIME` (`DO_TIME`),
  KEY `STATE26_TIME` (`STATE26_TIME`),
  KEY `ORDER_ID` (`ORDER_ID`),
  KEY `PRO_NAME` (`PRO_NAME`),
  KEY `ADD_TIME` (`ADD_TIME`)
) ENGINE=InnoDB AUTO_INCREMENT=75858 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_mall_detail
-- ----------------------------
INSERT INTO `order_mall_detail` VALUES ('75666', '16940702', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '2.00', '水电费水电费', '', '2.0', '60', 'abc123', '2017-08-07 09:38:48', '2017-08-07 09:39:07', '88.00', '2.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', '2017-08-07 09:38:48', null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '88.00', '0.00', '-1.00', '2017-08-07 09:39:07', '2017-08-04 13:40:05');
INSERT INTO `order_mall_detail` VALUES ('75667', '16940703', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '四川省广安市协兴镇牌坊村12', '白色,6寸,90*190cm,', '2.0', '1', '23600741000', '2017-08-04 15:49:21', '2017-08-04 16:22:27', '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', '2017-08-14 15:49:21', null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '2.00', '0.00', '101.00', '0.00', '-1.00', '2017-08-04 16:22:27', '2017-08-04 14:16:31');
INSERT INTO `order_mall_detail` VALUES ('75668', '16940704', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '四川省广安市协兴镇牌坊村12', '白色,6寸,90*190cm,', '4.0', '90', 'ttt001', '2017-08-07 09:50:36', '2017-10-23 09:51:09', '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', '2017-08-07 09:50:36', '2017-10-23 15:12:06', '6', '2017-10-26 15:12:06', '2017-10-23 15:00:07', null, '2017-10-23 15:00:14', '2017-11-02 15:00:07', '101', '963852', '0', '1', '', '0.00', '2.00', '-1.00', '2017-10-23 14:59:49', '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2017-10-23 15:12:23', '2017-08-07 09:49:56');
INSERT INTO `order_mall_detail` VALUES ('75669', '16940705', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-09-10 20:24:53', '2017-09-10 20:23:10');
INSERT INTO `order_mall_detail` VALUES ('75670', '16940706', '76', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-09-22 14:05:32', '2017-09-22 14:05:32');
INSERT INTO `order_mall_detail` VALUES ('75671', '16940707', '6681499', '71', '25804', '76418', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-11-03 14:02:30', '2017-11-03 14:02:11');
INSERT INTO `order_mall_detail` VALUES ('75672', '16940708', '6681500', '71', '25806', '76420', '90.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '黑色,5寸,180*198cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-11-18 07:57:25', '2017-11-18 07:57:14');
INSERT INTO `order_mall_detail` VALUES ('75673', '16940709', '6681500', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-11-18 07:57:38', '2017-11-18 07:57:38');
INSERT INTO `order_mall_detail` VALUES ('75674', '16940710', '6681502', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-11-26 20:40:03', '2017-11-26 20:37:03');
INSERT INTO `order_mall_detail` VALUES ('75675', '16940711', '6681502', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-11-26 20:41:07', '2017-11-26 20:41:07');
INSERT INTO `order_mall_detail` VALUES ('75676', '16940712', '6681502', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-11-26 20:48:20', '2017-11-26 20:48:01');
INSERT INTO `order_mall_detail` VALUES ('75677', '16940713', '6681502', '71', '25804', '76418', '90.00', '0.00', '2', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-11-26 20:57:41', '2017-11-26 20:57:41');
INSERT INTO `order_mall_detail` VALUES ('75690', '16940720', '6681502', '71', '25803', '76426', '90.00', '0.00', '1', '0.00', '0.00', '测试产品', '白色,2核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-12-21 19:40:56', '2017-12-21 19:40:56');
INSERT INTO `order_mall_detail` VALUES ('75691', '16940720', '6681502', '71', '25804', '76418', '90.00', '0.00', '2', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-12-21 19:40:56', '2017-12-21 19:40:56');
INSERT INTO `order_mall_detail` VALUES ('75692', '16940721', '6681502', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-12-21 19:44:34', '2017-12-21 19:44:34');
INSERT INTO `order_mall_detail` VALUES ('75693', '16940722', '6681502', '71', '25804', '76418', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-12-25 14:59:53', '2017-12-25 14:59:53');
INSERT INTO `order_mall_detail` VALUES ('75694', '16940722', '6681502', '71', '25806', '76420', '90.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '黑色,5寸,180*198cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2017-12-25 14:59:53', '2017-12-25 14:59:53');
INSERT INTO `order_mall_detail` VALUES ('75700', '16940728', '6681506', '71', '25810', '76429', '80.00', '0.00', '1', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-01-09 21:25:00', '2018-01-09 20:10:10');
INSERT INTO `order_mall_detail` VALUES ('75701', '16940728', '6681506', '71', '25805', '76419', '90.00', '0.00', '1', '2.00', '0.00', '测试产品', '白色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-01-09 21:25:00', '2018-01-09 20:10:10');
INSERT INTO `order_mall_detail` VALUES ('75702', '16940729', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '2.00', '测试产品', '', '2.0', '91', 'abc001', '2018-03-15 16:41:36', '2018-03-15 16:46:39', '88.00', '2.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', '2018-03-25 16:41:36', null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '88.00', '0.00', '-1.00', '2018-03-15 16:46:40', '2018-03-15 16:40:57');
INSERT INTO `order_mall_detail` VALUES ('75703', '16940730', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-03-15 16:51:24', '2018-03-15 16:51:07');
INSERT INTO `order_mall_detail` VALUES ('75704', '16940731', '71', '71', '25806', '76425', '91.00', '25.00', '10', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-03-15 16:57:18', '2018-03-15 16:51:40');
INSERT INTO `order_mall_detail` VALUES ('75705', '16940732', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 10:55:06', '2018-04-12 10:55:06');
INSERT INTO `order_mall_detail` VALUES ('75706', '16940733', '71', '71', '25806', '76422', '80.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '白色,5寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 13:27:55', '2018-04-12 13:27:55');
INSERT INTO `order_mall_detail` VALUES ('75707', '16940734', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 13:28:59', '2018-04-12 13:28:59');
INSERT INTO `order_mall_detail` VALUES ('75708', '16940735', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 14:17:12', '2018-04-12 14:17:12');
INSERT INTO `order_mall_detail` VALUES ('75709', '16940736', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 16:44:49', '2018-04-12 16:44:48');
INSERT INTO `order_mall_detail` VALUES ('75710', '16940737', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:02:38', '2018-04-12 17:02:36');
INSERT INTO `order_mall_detail` VALUES ('75711', '16940738', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:04:14', '2018-04-12 17:04:13');
INSERT INTO `order_mall_detail` VALUES ('75712', '16940739', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:04:34', '2018-04-12 17:04:33');
INSERT INTO `order_mall_detail` VALUES ('75713', '16940740', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:21:05', '2018-04-12 17:21:04');
INSERT INTO `order_mall_detail` VALUES ('75714', '16940741', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:21:44', '2018-04-12 17:21:43');
INSERT INTO `order_mall_detail` VALUES ('75715', '16940742', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:27:36', '2018-04-12 17:27:35');
INSERT INTO `order_mall_detail` VALUES ('75716', '16940743', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:29:47', '2018-04-12 17:29:45');
INSERT INTO `order_mall_detail` VALUES ('75717', '16940744', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:30:10', '2018-04-12 17:30:09');
INSERT INTO `order_mall_detail` VALUES ('75718', '16940745', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 17:42:44', '2018-04-12 17:42:43');
INSERT INTO `order_mall_detail` VALUES ('75719', '16940746', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 22:14:05', '2018-04-12 22:14:05');
INSERT INTO `order_mall_detail` VALUES ('75720', '16940747', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 22:19:54', '2018-04-12 22:19:54');
INSERT INTO `order_mall_detail` VALUES ('75721', '16940748', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 22:49:41', '2018-04-12 22:49:41');
INSERT INTO `order_mall_detail` VALUES ('75722', '16940749', '71', '71', '25805', '76419', '90.00', '0.00', '3', '2.00', '0.00', '测试产品', '白色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 23:23:58', '2018-04-12 23:23:58');
INSERT INTO `order_mall_detail` VALUES ('75723', '16940749', '71', '71', '25806', '76422', '80.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '白色,5寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 23:23:58', '2018-04-12 23:23:58');
INSERT INTO `order_mall_detail` VALUES ('75724', '16940749', '71', '71', '25804', '76418', '90.00', '0.00', '2', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 23:23:58', '2018-04-12 23:23:58');
INSERT INTO `order_mall_detail` VALUES ('75725', '16940749', '71', '71', '25806', '76420', '90.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '黑色,5寸,180*198cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 23:23:58', '2018-04-12 23:23:58');
INSERT INTO `order_mall_detail` VALUES ('75726', '16940749', '71', '71', '25810', '76429', '80.00', '0.00', '1', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 23:23:58', '2018-04-12 23:23:58');
INSERT INTO `order_mall_detail` VALUES ('75727', '16940749', '71', '71', '25803', '76417', '100.00', '0.00', '1', '10.00', '0.00', '测试产品', '黑色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 23:23:58', '2018-04-12 23:23:58');
INSERT INTO `order_mall_detail` VALUES ('75728', '16940749', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-12 23:23:58', '2018-04-12 23:23:58');
INSERT INTO `order_mall_detail` VALUES ('75729', '16940750', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-13 10:41:19', '2018-04-13 10:41:19');
INSERT INTO `order_mall_detail` VALUES ('75730', '16940751', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-13 10:42:25', '2018-04-13 10:42:25');
INSERT INTO `order_mall_detail` VALUES ('75731', '16940752', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-13 10:43:00', '2018-04-13 10:43:00');
INSERT INTO `order_mall_detail` VALUES ('75732', '16940753', '100', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 14:14:15', '2018-04-19 14:14:15');
INSERT INTO `order_mall_detail` VALUES ('75733', '16940753', '100', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 14:14:15', '2018-04-19 14:14:15');
INSERT INTO `order_mall_detail` VALUES ('75734', '16940754', '100', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:04:42', '2018-04-19 16:04:42');
INSERT INTO `order_mall_detail` VALUES ('75735', '16940754', '100', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:04:42', '2018-04-19 16:04:42');
INSERT INTO `order_mall_detail` VALUES ('75736', '16940755', '71', '71', '25805', '76419', '90.00', '0.00', '3', '2.00', '0.00', '测试产品', '白色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:58:42', '2018-04-19 16:58:42');
INSERT INTO `order_mall_detail` VALUES ('75737', '16940755', '71', '71', '25806', '76422', '80.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '白色,5寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:58:42', '2018-04-19 16:58:42');
INSERT INTO `order_mall_detail` VALUES ('75738', '16940755', '71', '71', '25806', '76425', '91.00', '10.00', '2', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:58:42', '2018-04-19 16:58:42');
INSERT INTO `order_mall_detail` VALUES ('75739', '16940756', '71', '71', '25804', '76418', '90.00', '0.00', '2', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:59:03', '2018-04-19 16:59:02');
INSERT INTO `order_mall_detail` VALUES ('75740', '16940756', '71', '71', '25806', '76420', '90.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '黑色,5寸,180*198cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:59:03', '2018-04-19 16:59:02');
INSERT INTO `order_mall_detail` VALUES ('75741', '16940756', '71', '71', '25810', '76429', '80.00', '0.00', '1', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:59:03', '2018-04-19 16:59:02');
INSERT INTO `order_mall_detail` VALUES ('75742', '16940756', '71', '71', '25803', '76417', '100.00', '0.00', '2', '10.00', '0.00', '测试产品', '黑色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-19 16:59:03', '2018-04-19 16:59:02');
INSERT INTO `order_mall_detail` VALUES ('75743', '16940757', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-20 16:28:49', '2018-04-20 16:28:49');
INSERT INTO `order_mall_detail` VALUES ('75744', '16940758', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-20 20:01:27', '2018-04-20 20:01:27');
INSERT INTO `order_mall_detail` VALUES ('75745', '16940759', '71', '71', '25806', '76422', '80.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '白色,5寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-21 20:57:10', '2018-04-21 20:57:10');
INSERT INTO `order_mall_detail` VALUES ('75746', '16940760', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:03:40', '2018-04-23 15:03:40');
INSERT INTO `order_mall_detail` VALUES ('75747', '16940761', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:05:49', '2018-04-23 15:05:49');
INSERT INTO `order_mall_detail` VALUES ('75748', '16940762', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:06:59', '2018-04-23 15:06:59');
INSERT INTO `order_mall_detail` VALUES ('75749', '16940763', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:11:07', '2018-04-23 15:11:07');
INSERT INTO `order_mall_detail` VALUES ('75750', '16940764', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:16:23', '2018-04-23 15:16:23');
INSERT INTO `order_mall_detail` VALUES ('75751', '16940765', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:16:49', '2018-04-23 15:16:49');
INSERT INTO `order_mall_detail` VALUES ('75752', '16940766', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:19:03', '2018-04-23 15:19:03');
INSERT INTO `order_mall_detail` VALUES ('75753', '16940767', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:22:03', '2018-04-23 15:22:03');
INSERT INTO `order_mall_detail` VALUES ('75754', '16940768', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:22:18', '2018-04-23 15:22:18');
INSERT INTO `order_mall_detail` VALUES ('75755', '16940769', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:31:59', '2018-04-23 15:31:59');
INSERT INTO `order_mall_detail` VALUES ('75756', '16940770', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:38:54', '2018-04-23 15:38:54');
INSERT INTO `order_mall_detail` VALUES ('75757', '16940771', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 15:42:58', '2018-04-23 15:42:54');
INSERT INTO `order_mall_detail` VALUES ('75758', '16940772', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 16:27:18', '2018-04-23 16:27:18');
INSERT INTO `order_mall_detail` VALUES ('75759', '16940773', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 16:29:13', '2018-04-23 16:29:13');
INSERT INTO `order_mall_detail` VALUES ('75760', '16940774', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 16:31:40', '2018-04-23 16:31:40');
INSERT INTO `order_mall_detail` VALUES ('75761', '16940775', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 16:57:51', '2018-04-23 16:57:51');
INSERT INTO `order_mall_detail` VALUES ('75762', '16940776', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:06:38', '2018-04-23 17:06:38');
INSERT INTO `order_mall_detail` VALUES ('75763', '16940777', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:15:06', '2018-04-23 17:15:06');
INSERT INTO `order_mall_detail` VALUES ('75764', '16940778', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '0.0', '0', null, null, null, '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2018-04-23 17:16:36', '2018-04-23 17:16:32');
INSERT INTO `order_mall_detail` VALUES ('75765', '16940779', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '0.0', '0', null, null, null, '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2018-04-23 17:18:34', '2018-04-23 17:18:33');
INSERT INTO `order_mall_detail` VALUES ('75766', '16940780', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '0.0', '0', null, null, null, '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2018-04-23 17:19:14', '2018-04-23 17:19:12');
INSERT INTO `order_mall_detail` VALUES ('75767', '16940781', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '0.0', '0', null, null, null, '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2018-04-23 17:19:56', '2018-04-23 17:19:54');
INSERT INTO `order_mall_detail` VALUES ('75768', '16940782', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:20:41', '2018-04-23 17:20:41');
INSERT INTO `order_mall_detail` VALUES ('75769', '16940783', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:21:31', '2018-04-23 17:21:31');
INSERT INTO `order_mall_detail` VALUES ('75770', '16940784', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:22:32', '2018-04-23 17:22:32');
INSERT INTO `order_mall_detail` VALUES ('75771', '16940785', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:23:46', '2018-04-23 17:23:46');
INSERT INTO `order_mall_detail` VALUES ('75772', '16940786', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:26:04', '2018-04-23 17:26:04');
INSERT INTO `order_mall_detail` VALUES ('75773', '16940787', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:28:01', '2018-04-23 17:28:01');
INSERT INTO `order_mall_detail` VALUES ('75774', '16940788', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 17:31:05', '2018-04-23 17:31:05');
INSERT INTO `order_mall_detail` VALUES ('75775', '16940789', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '0.0', '0', null, null, null, '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2018-04-23 21:14:19', '2018-04-23 21:14:12');
INSERT INTO `order_mall_detail` VALUES ('75776', '16940790', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '0.0', '0', null, null, null, '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2018-04-23 21:14:53', '2018-04-23 21:14:47');
INSERT INTO `order_mall_detail` VALUES ('75777', '16940791', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '0.0', '0', null, null, null, '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2018-04-23 21:18:25', '2018-04-23 21:18:24');
INSERT INTO `order_mall_detail` VALUES ('75778', '16940792', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '0.0', '0', null, null, null, '101.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '101.00', '0.00', '-1.00', '2018-04-23 21:19:25', '2018-04-23 21:19:24');
INSERT INTO `order_mall_detail` VALUES ('75779', '16940793', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '0.0', '0', null, null, null, '90.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '90.00', '0.00', '-1.00', '2018-04-23 21:19:48', '2018-04-23 21:19:47');
INSERT INTO `order_mall_detail` VALUES ('75780', '16940794', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 21:19:59', '2018-04-23 21:19:59');
INSERT INTO `order_mall_detail` VALUES ('75781', '16940795', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-23 21:20:23', '2018-04-23 21:20:23');
INSERT INTO `order_mall_detail` VALUES ('75782', '16940796', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '0.0', '0', null, null, null, '90.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '90.00', '0.00', '-1.00', '2018-04-23 21:20:38', '2018-04-23 21:20:32');
INSERT INTO `order_mall_detail` VALUES ('75783', '16940797', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '0.0', '0', null, null, null, '90.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '90.00', '0.00', '-1.00', '2018-04-23 21:22:36', '2018-04-23 21:22:34');
INSERT INTO `order_mall_detail` VALUES ('75784', '16940798', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '0.0', '0', null, null, null, '90.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '90.00', '0.00', '-1.00', '2018-04-24 10:02:34', '2018-04-24 10:02:31');
INSERT INTO `order_mall_detail` VALUES ('75785', '16940799', '71', '71', '25803', '76426', '90.00', '0.00', '13', '0.00', '0.00', '测试产品', '白色,2核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 10:40:09', '2018-04-24 10:40:09');
INSERT INTO `order_mall_detail` VALUES ('75786', '16940800', '71', '71', '25803', '76426', '90.00', '0.00', '13', '0.00', '0.00', '测试产品', '白色,2核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:05:31', '2018-04-24 11:05:31');
INSERT INTO `order_mall_detail` VALUES ('75787', '16940801', '71', '71', '25803', '76426', '90.00', '0.00', '13', '0.00', '0.00', '测试产品', '白色,2核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:06:20', '2018-04-24 11:06:20');
INSERT INTO `order_mall_detail` VALUES ('75788', '16940802', '71', '71', '25803', '76426', '90.00', '0.00', '13', '0.00', '0.00', '测试产品', '白色,2核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:10:00', '2018-04-24 11:10:00');
INSERT INTO `order_mall_detail` VALUES ('75789', '16940803', '71', '71', '25803', '76426', '90.00', '0.00', '2', '0.00', '0.00', '测试产品', '白色,2核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:27:02', '2018-04-24 11:27:02');
INSERT INTO `order_mall_detail` VALUES ('75790', '16940803', '71', '71', '25806', '76420', '90.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '黑色,5寸,180*198cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:27:02', '2018-04-24 11:27:02');
INSERT INTO `order_mall_detail` VALUES ('75791', '16940804', '71', '71', '25803', '76426', '90.00', '0.00', '2', '0.00', '0.00', '测试产品', '白色,2核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:27:09', '2018-04-24 11:27:09');
INSERT INTO `order_mall_detail` VALUES ('75792', '16940804', '71', '71', '25806', '76420', '90.00', '10.00', '1', '10.00', '0.00', '多规格 多组价格', '黑色,5寸,180*198cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '1.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:27:09', '2018-04-24 11:27:09');
INSERT INTO `order_mall_detail` VALUES ('75793', '16940805', '71', '71', '25805', '76419', '90.00', '0.00', '6', '2.00', '0.00', '测试产品', '白色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:29:42', '2018-04-24 11:29:42');
INSERT INTO `order_mall_detail` VALUES ('75794', '16940806', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:38:54', '2018-04-24 11:38:54');
INSERT INTO `order_mall_detail` VALUES ('75795', '16940807', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:42:57', '2018-04-24 11:42:57');
INSERT INTO `order_mall_detail` VALUES ('75796', '16940808', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:43:18', '2018-04-24 11:43:18');
INSERT INTO `order_mall_detail` VALUES ('75797', '16940809', '71', '71', '25807', '76421', '90.00', '0.00', '5', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:50:06', '2018-04-24 11:50:06');
INSERT INTO `order_mall_detail` VALUES ('75798', '16940810', '71', '71', '25807', '76421', '90.00', '0.00', '6', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:53:46', '2018-04-24 11:53:46');
INSERT INTO `order_mall_detail` VALUES ('75799', '16940811', '71', '71', '25807', '76421', '90.00', '0.00', '5', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:55:43', '2018-04-24 11:55:43');
INSERT INTO `order_mall_detail` VALUES ('75800', '16940812', '71', '71', '25807', '76421', '90.00', '0.00', '5', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 11:58:07', '2018-04-24 11:58:07');
INSERT INTO `order_mall_detail` VALUES ('75801', '16940813', '71', '71', '25807', '76421', '90.00', '0.00', '5', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 12:03:36', '2018-04-24 12:03:36');
INSERT INTO `order_mall_detail` VALUES ('75802', '16940814', '71', '71', '25807', '76421', '90.00', '0.00', '5', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 12:14:53', '2018-04-24 12:14:53');
INSERT INTO `order_mall_detail` VALUES ('75803', '16940815', '71', '71', '25807', '76421', '90.00', '0.00', '5', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 12:19:38', '2018-04-24 12:19:38');
INSERT INTO `order_mall_detail` VALUES ('75804', '16940816', '71', '71', '25810', '76429', '80.00', '0.00', '4', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 12:49:30', '2018-04-24 12:49:30');
INSERT INTO `order_mall_detail` VALUES ('75805', '16940817', '71', '71', '25810', '76429', '80.00', '0.00', '4', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 12:50:14', '2018-04-24 12:50:14');
INSERT INTO `order_mall_detail` VALUES ('75806', '16940818', '71', '71', '25810', '76429', '80.00', '0.00', '4', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 12:50:54', '2018-04-24 12:50:54');
INSERT INTO `order_mall_detail` VALUES ('75807', '16940819', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:00:28', '2018-04-24 13:00:28');
INSERT INTO `order_mall_detail` VALUES ('75808', '16940820', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:04:33', '2018-04-24 13:04:33');
INSERT INTO `order_mall_detail` VALUES ('75809', '16940821', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:20:42', '2018-04-24 13:20:42');
INSERT INTO `order_mall_detail` VALUES ('75810', '16940822', '71', '71', '25805', '76419', '90.00', '0.00', '3', '2.00', '0.00', '测试产品', '白色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:21:51', '2018-04-24 13:21:51');
INSERT INTO `order_mall_detail` VALUES ('75811', '16940823', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:26:30', '2018-04-24 13:26:30');
INSERT INTO `order_mall_detail` VALUES ('75812', '16940824', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:27:44', '2018-04-24 13:27:44');
INSERT INTO `order_mall_detail` VALUES ('75813', '16940825', '71', '71', '25810', '76429', '80.00', '0.00', '3', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:29:34', '2018-04-24 13:29:34');
INSERT INTO `order_mall_detail` VALUES ('75814', '16940826', '71', '71', '25810', '76429', '80.00', '0.00', '3', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:34:49', '2018-04-24 13:34:49');
INSERT INTO `order_mall_detail` VALUES ('75815', '16940827', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:37:47', '2018-04-24 13:37:47');
INSERT INTO `order_mall_detail` VALUES ('75816', '16940828', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:38:38', '2018-04-24 13:38:38');
INSERT INTO `order_mall_detail` VALUES ('75817', '16940829', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:39:28', '2018-04-24 13:39:28');
INSERT INTO `order_mall_detail` VALUES ('75818', '16940830', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:41:14', '2018-04-24 13:41:14');
INSERT INTO `order_mall_detail` VALUES ('75819', '16940831', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:41:47', '2018-04-24 13:41:47');
INSERT INTO `order_mall_detail` VALUES ('75820', '16940832', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:45:25', '2018-04-24 13:45:25');
INSERT INTO `order_mall_detail` VALUES ('75821', '16940833', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:46:59', '2018-04-24 13:46:59');
INSERT INTO `order_mall_detail` VALUES ('75822', '16940834', '71', '71', '25810', '76429', '80.00', '0.00', '3', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:47:56', '2018-04-24 13:47:56');
INSERT INTO `order_mall_detail` VALUES ('75823', '16940835', '71', '71', '25804', '76418', '90.00', '0.00', '10', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:48:47', '2018-04-24 13:48:47');
INSERT INTO `order_mall_detail` VALUES ('75824', '16940836', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 13:57:13', '2018-04-24 13:57:13');
INSERT INTO `order_mall_detail` VALUES ('75825', '16940837', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:00:22', '2018-04-24 14:00:22');
INSERT INTO `order_mall_detail` VALUES ('75826', '16940838', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:03:58', '2018-04-24 14:03:58');
INSERT INTO `order_mall_detail` VALUES ('75827', '16940839', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:08:13', '2018-04-24 14:08:13');
INSERT INTO `order_mall_detail` VALUES ('75828', '16940840', '71', '71', '25810', '76429', '80.00', '0.00', '3', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:09:33', '2018-04-24 14:09:33');
INSERT INTO `order_mall_detail` VALUES ('75829', '16940841', '71', '71', '25810', '76429', '80.00', '0.00', '3', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:12:40', '2018-04-24 14:12:40');
INSERT INTO `order_mall_detail` VALUES ('75830', '16940842', '71', '71', '25804', '76418', '90.00', '0.00', '10', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:41:22', '2018-04-24 14:41:22');
INSERT INTO `order_mall_detail` VALUES ('75831', '16940843', '71', '71', '25810', '76429', '80.00', '0.00', '3', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:42:01', '2018-04-24 14:42:01');
INSERT INTO `order_mall_detail` VALUES ('75832', '16940844', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:58:36', '2018-04-24 14:58:36');
INSERT INTO `order_mall_detail` VALUES ('75833', '16940845', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 14:59:40', '2018-04-24 14:59:40');
INSERT INTO `order_mall_detail` VALUES ('75834', '16940846', '71', '71', '25805', '76419', '90.00', '0.00', '4', '2.00', '0.00', '测试产品', '白色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 15:03:28', '2018-04-24 15:03:28');
INSERT INTO `order_mall_detail` VALUES ('75835', '16940847', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 15:12:04', '2018-04-24 15:12:04');
INSERT INTO `order_mall_detail` VALUES ('75836', '16940848', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 15:14:26', '2018-04-24 15:14:26');
INSERT INTO `order_mall_detail` VALUES ('75837', '16940849', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 15:14:54', '2018-04-24 15:14:54');
INSERT INTO `order_mall_detail` VALUES ('75838', '16940850', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 15:22:34', '2018-04-24 15:22:34');
INSERT INTO `order_mall_detail` VALUES ('75839', '16940851', '71', '71', '25807', '76421', '90.00', '0.00', '3', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 15:29:43', '2018-04-24 15:29:43');
INSERT INTO `order_mall_detail` VALUES ('75840', '16940852', '71', '71', '25803', '76426', '90.00', '0.00', '1', '0.00', '0.00', '测试产品', '白色,2核,', '0.0', '0', null, null, null, '90.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '90.00', '0.00', '-1.00', '2018-04-24 15:32:58', '2018-04-24 15:32:54');
INSERT INTO `order_mall_detail` VALUES ('75841', '16940852', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '0.0', '0', null, null, null, '90.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '90.00', '0.00', '-1.00', '2018-04-24 15:32:58', '2018-04-24 15:32:54');
INSERT INTO `order_mall_detail` VALUES ('75842', '16940853', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 15:40:13', '2018-04-24 15:33:20');
INSERT INTO `order_mall_detail` VALUES ('75843', '16940853', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 15:40:13', '2018-04-24 15:33:20');
INSERT INTO `order_mall_detail` VALUES ('75844', '16940854', '71', '71', '25810', '76429', '80.00', '0.00', '3', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 17:41:18', '2018-04-24 17:41:18');
INSERT INTO `order_mall_detail` VALUES ('75845', '16940855', '71', '71', '25803', '76430', '50.01', '0.00', '1', '0.00', '0.00', '测试产品', '白色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 21:16:38', '2018-04-24 21:16:38');
INSERT INTO `order_mall_detail` VALUES ('75846', '16940856', '71', '71', '25804', '76418', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 21:51:21', '2018-04-24 21:45:33');
INSERT INTO `order_mall_detail` VALUES ('75847', '16940857', '71', '71', '25803', '76430', '50.01', '0.00', '1', '0.00', '0.00', '测试产品', '白色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-24 22:39:48', '2018-04-24 22:39:48');
INSERT INTO `order_mall_detail` VALUES ('75848', '16940858', '71', '71', '25803', '76430', '50.01', '0.00', '1', '0.00', '0.00', '测试产品', '白色,1核,', '2.0', '70', 'a12345', '2018-04-26 10:51:33', '2018-04-26 11:59:25', '50.01', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2.00', '2018-05-06 10:51:33', null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '50.00', '0.01', '-1.00', '2018-04-26 11:59:25', '2018-04-24 22:51:16');
INSERT INTO `order_mall_detail` VALUES ('75849', '16940859', '71', '71', '25803', '76431', '0.01', '0.00', '1', '0.00', '0.00', '测试产品', '黑色,2核,', '0.0', '0', null, null, null, '0.01', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.01', '-1.00', '2018-04-27 19:55:25', '2018-04-24 23:06:41');
INSERT INTO `order_mall_detail` VALUES ('75850', '16940860', '71', '71', '25807', '76421', '90.00', '0.00', '1', '10.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-25 14:42:14', '2018-04-25 14:42:14');
INSERT INTO `order_mall_detail` VALUES ('75851', '16940860', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-25 14:42:14', '2018-04-25 14:42:14');
INSERT INTO `order_mall_detail` VALUES ('75852', '16940861', '71', '71', '25803', '76430', '50.01', '0.00', '1', '2.00', '2.00', '测试产品', '白色,1核,', '2.0', '1', 'abcde100', '2018-04-27 10:13:38', '2018-04-28 21:18:23', '48.01', '2.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.92', '2018-05-07 10:13:38', null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '48.00', '0.01', '-1.00', '2018-04-28 21:18:23', '2018-04-26 16:52:45');
INSERT INTO `order_mall_detail` VALUES ('75853', '16940862', '71', '71', '25810', '76429', '80.00', '0.00', '1', '0.00', '0.00', '测试产品', '白色,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-26 18:48:08', '2018-04-26 18:48:08');
INSERT INTO `order_mall_detail` VALUES ('75854', '16940863', '71', '71', '25806', '76425', '91.00', '10.00', '1', '91.00', '0.00', '多规格 多组价格', '白色,6寸,90*190cm,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '2.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-27 12:55:07', '2018-04-27 12:55:07');
INSERT INTO `order_mall_detail` VALUES ('75855', '16940864', '71', '71', '25803', '76431', '0.01', '0.00', '1', '0.00', '0.00', '测试产品', '黑色,2核,', '0.0', '0', null, null, null, '0.01', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.01', '-1.00', '2018-04-27 19:57:41', '2018-04-27 19:57:17');
INSERT INTO `order_mall_detail` VALUES ('75856', '16940865', '6681512', '71', '25803', '76417', '100.00', '0.00', '1', '10.00', '0.00', '测试产品', '黑色,1核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-04-28 00:43:08', '2018-04-28 00:43:08');
INSERT INTO `order_mall_detail` VALUES ('75857', '16940866', '71', '71', '25803', '76431', '0.01', '0.00', '1', '0.00', '0.00', '测试产品', '黑色,2核,', '-1.0', '0', null, null, null, '0.00', '0.00', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00', null, null, '0', null, null, null, null, null, '0', null, '0', '1', '', '0.00', '0.00', '-1.00', null, '0', '0.00', '0.00', '0.00', '0.00', '-1.00', '2018-05-08 15:42:22', '2018-05-08 15:42:22');

-- ----------------------------
-- Table structure for page_auto
-- ----------------------------
DROP TABLE IF EXISTS `page_auto`;
CREATE TABLE `page_auto` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ROLE_IDS` varchar(30) DEFAULT '1',
  `PARENT_ID` bigint(20) DEFAULT '0',
  `TYPE` smallint(6) DEFAULT '1',
  `TABLE_NAME` varchar(30) DEFAULT NULL,
  `TABLE_KEY_FIELD` varchar(30) DEFAULT NULL,
  `SQL_WHERE` varchar(350) DEFAULT NULL,
  `ADD_TIME` datetime DEFAULT NULL,
  `FIELDS` varchar(350) DEFAULT NULL,
  `FIELDS_LIST` varchar(350) DEFAULT NULL,
  `FIELDS_EDIT` varchar(350) DEFAULT NULL,
  `FIELDS_ADD` varchar(350) DEFAULT NULL,
  `PAGE_SIZE` smallint(6) DEFAULT '17',
  `JS` varchar(500) DEFAULT NULL,
  `TITLE` varchar(30) DEFAULT NULL,
  `URL_LIST` varchar(150) DEFAULT NULL,
  `URL_EDIT` varchar(150) DEFAULT NULL,
  `URL_ADD` varchar(150) DEFAULT NULL,
  `ROW_END_TOOL_FIELDS` varchar(400) DEFAULT NULL,
  `FOOTER_TOOL_FIELDS` varchar(400) DEFAULT NULL,
  `LIST_ORDER_BY` varchar(50) DEFAULT NULL,
  `STATE` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of page_auto
-- ----------------------------
INSERT INTO `page_auto` VALUES ('1', '1', '0', '1', 'user', 'ID', 'ROLE_ID=1', '2017-04-26 16:46:18', 'ID,LOGIN_NAME,LOGIN_PASS,NAME,ADD_TIME', '用户名,,LOGIN_NAME;姓名,,NAME;注册时间,,ADD_TIME', null, null, '17', null, '系统管理员', '', '/users/userrole/edit/', '/users/userrole/add/', '操作::编  辑@@page@@EditAddress@@\'ID=\'@@800@@600', '添 加,,/css/js/ext/images/pen.gif,,ActAdd(AddAddress,800,600),,#FF0000;', 'ID desc', '1');
INSERT INTO `page_auto` VALUES ('5', '1', '0', '1', 'user', 'ID', '(ROLE_ID=72)', '2017-04-26 16:46:18', 'ID,LOGIN_NAME,LOGIN_PASS,NAME,ADD_TIME', '用户名,,LOGIN_NAME;姓名,,NAME;注册时间,,ADD_TIME', '', '', '17', '', '会员', '', '/users/service/edit/', '/users/service/add/', '', '', 'ID desc', '1');

-- ----------------------------
-- Table structure for pro
-- ----------------------------
DROP TABLE IF EXISTS `pro`;
CREATE TABLE `pro` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `NAME` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '产品名称',
  `NAME2` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `SORT_ID3` int(11) DEFAULT '0',
  `SORT_ID` int(11) DEFAULT '0' COMMENT '分类',
  `SORT_PARENT_ID` int(11) DEFAULT '0',
  `PRICE` decimal(20,2) DEFAULT '0.00' COMMENT '商城售价',
  `PRICE_SHOP` decimal(20,2) DEFAULT '0.00' COMMENT '商家售价',
  `SHI_CHANG_PRICE` decimal(10,2) DEFAULT NULL,
  `HUI_DIAN` decimal(20,2) DEFAULT '0.00' COMMENT '惠点',
  `HUI_DIAN_SHOP` decimal(20,2) DEFAULT NULL,
  `PIC` varchar(80) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '缩略图',
  `STATE` decimal(6,1) DEFAULT '0.0' COMMENT '状态;-5:库管未审核,0：库管审核通过（下架），-3：库管审核驳回，1：上架',
  `ADD_TIME` datetime DEFAULT NULL,
  `EDIT_TIME` datetime DEFAULT NULL,
  `WU_LIU_ID` bigint(20) unsigned DEFAULT '0' COMMENT '物流费分组主键',
  `POINT` decimal(10,2) DEFAULT '0.00' COMMENT '积分',
  `POINT_FREE` decimal(10,2) DEFAULT '0.00' COMMENT '赠送积分',
  `VIEW_COUNT` bigint(20) DEFAULT '0',
  `XIAO_LIANG` bigint(20) DEFAULT '0',
  `ROLE_ID` int(11) DEFAULT '0',
  `PRO_LEVEL_NUM` bigint(20) DEFAULT '0',
  `SHOP_NAME` varchar(60) DEFAULT NULL,
  `GUI_GE_JSON` varchar(200) DEFAULT NULL,
  `HAO_PING_SHU` bigint(20) DEFAULT '0',
  `CHA_PING_SHU` bigint(20) DEFAULT '0',
  `BEI_ZHU` varchar(50) DEFAULT NULL,
  `SHENG` int(11) DEFAULT NULL,
  `SHI` int(11) DEFAULT NULL,
  `QU` int(11) DEFAULT NULL,
  `XIAN` int(11) DEFAULT NULL,
  `JING_POINT` bigint(20) DEFAULT '0',
  `JING_END_TIME` datetime DEFAULT NULL,
  `JING_DO_POINT` int(20) DEFAULT '0',
  `GONG_YING_SHANG_ID` int(11) DEFAULT '0',
  `CANG_KU_ID` int(11) DEFAULT '0',
  `JING_DO_POINT2` int(11) DEFAULT '0',
  `HUIDIAN_DUI` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `STATE` (`STATE`),
  KEY `SORT_ID` (`SORT_ID`),
  KEY `SORT_PARENT_ID` (`SORT_PARENT_ID`),
  KEY `NAME` (`NAME`),
  KEY `VIEW_COUNT` (`VIEW_COUNT`),
  KEY `XIAO_LIANG` (`XIAO_LIANG`),
  KEY `PRICE` (`PRICE`),
  KEY `ROLE_ID` (`ROLE_ID`),
  KEY `SHENG` (`SHENG`),
  KEY `SHI` (`SHI`),
  KEY `QU` (`QU`),
  KEY `XIAN` (`XIAN`),
  KEY `JING_POINT` (`JING_POINT`),
  KEY `JING_END_TIME` (`JING_END_TIME`),
  KEY `GONG_YING_SHANG_ID` (`GONG_YING_SHANG_ID`),
  KEY `CANG_KU_ID` (`CANG_KU_ID`),
  KEY `HUI_DIAN` (`HUI_DIAN`),
  KEY `PRO_LEVEL_NUM` (`PRO_LEVEL_NUM`) USING BTREE,
  KEY `SORT_ID_2` (`SORT_ID`) USING BTREE,
  KEY `USER_ID_3` (`USER_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25811 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro
-- ----------------------------
INSERT INTO `pro` VALUES ('25803', '71', '测试产品', '水电费', '727', '386', '354', '0.01', '0.00', '900.00', '10.00', null, 'upload/auto/2017/07/28/16/02/52/78840593901.jpg', '1.0', '2017-06-13 16:00:55', '2018-04-27 19:57:41', '1', '0.00', '0.00', '0', '5', '0', '0', null, null, '0', '0', null, '0', '0', '0', '0', '0', null, '0', '0', '0', '0', null);
INSERT INTO `pro` VALUES ('25804', '71', '测试产品', '', '430', '416', '348', '90.00', '0.00', '200.00', '10.00', null, 'upload/auto/2017/07/28/16/04/30/96586051551.jpg', '1.0', '2017-06-13 16:03:45', '2018-04-24 15:32:58', '1', '0.00', '0.00', '0', '6', '0', '0', null, null, '0', '0', null, '0', '0', '0', '0', '0', null, '0', '0', '0', '0', null);
INSERT INTO `pro` VALUES ('25805', '71', '测试产品', '', '727', '725', '683', '90.00', '0.00', '900.00', '2.00', null, 'upload/auto/2017/07/28/16/05/22/65542256910.jpg', '1.0', '2017-06-13 16:04:21', '2018-03-14 15:05:05', '1', '0.00', '0.00', '0', '2', '0', '0', null, null, '0', '0', null, '0', '0', '0', '0', '0', null, '0', '0', '0', '0', null);
INSERT INTO `pro` VALUES ('25806', '71', '多规格 多组价格', '强悍的产品', '430', '416', '348', '80.00', '0.00', '200.00', '10.00', null, 'upload/auto/2017/07/28/15/59/11/70783913157.jpg', '1.0', '2017-06-13 16:04:30', '2018-04-23 21:19:25', '2584', '1.00', '0.00', '0', '19', '0', '2', null, null, '0', '0', null, '110000', '111400', '0', '0', '0', null, '0', '0', '0', '0', null);
INSERT INTO `pro` VALUES ('25807', '71', '测试产品', '', '383', '363', '352', '90.00', '0.00', '200.00', '10.00', null, 'upload/auto/2017/07/28/16/01/56/36491601709.jpg', '1.0', '2017-06-13 16:09:16', '2018-04-24 10:02:34', '1', '0.00', '0.00', '0', '1', '0', '2', null, null, '0', '0', null, '0', '0', '0', '0', '0', null, '0', '0', '0', '0', null);
INSERT INTO `pro` VALUES ('25808', '71', '测试产品', '', '0', '288', '287', '80.00', '0.00', '2000.00', '0.00', null, 'upload/auto/2017/08/04/16/04/42/47154941032.png', '-100.0', '2017-08-04 16:05:14', '2017-08-08 12:15:17', '1', '0.00', '0.00', '0', '0', '0', '2', null, null, '0', '0', null, '0', '0', '0', '0', '0', null, '0', '0', '0', '0', null);
INSERT INTO `pro` VALUES ('25809', '71', '测试产品', '', '0', '288', '287', '80.00', '0.00', '2000.00', '0.00', null, 'upload/auto/2017/08/04/16/04/42/47154941032.png', '0.1', '2017-08-04 16:07:26', '2017-08-04 16:07:26', '1', '0.00', '0.00', '0', '0', '0', '2', null, null, '0', '0', null, '0', '0', '0', '0', '0', null, '0', '0', '0', '0', null);
INSERT INTO `pro` VALUES ('25810', '71', '测试产品', '', '0', '366', '311', '80.00', '0.00', '2000.00', '0.00', null, 'upload/auto/2017/08/16/10/49/18/8128222564.jpg', '1.0', '2017-08-04 16:07:43', '2017-08-30 14:40:54', '1', '0.00', '0.00', '0', '0', '0', '2', null, null, '0', '0', null, '0', '0', '0', '0', '0', null, '0', '0', '0', '0', null);

-- ----------------------------
-- Table structure for pro_mess
-- ----------------------------
DROP TABLE IF EXISTS `pro_mess`;
CREATE TABLE `pro_mess` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MESS` mediumtext,
  `PIC1` varchar(120) DEFAULT NULL,
  `PIC2` varchar(120) DEFAULT NULL,
  `PIC3` varchar(120) DEFAULT NULL,
  `PIC4` varchar(120) DEFAULT NULL,
  `PIC5` varchar(120) DEFAULT NULL,
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25811 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro_mess
-- ----------------------------
INSERT INTO `pro_mess` VALUES ('25803', '<p>&nbsp;盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p><img src=\"/upload/editor/2018_04/09/1523253927980064.jpg\" title=\"1523253927980064.jpg\" alt=\"ChuanHaiIm.jpg\"/></p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><br/></p>', 'upload/auto/2018/04/09/13/41/17/083826.jpg', 'upload/auto/2018/04/09/13/41/25/012194.jpg', '', '', '', '2018-04-26 16:52:23');
INSERT INTO `pro_mess` VALUES ('25804', '<p>商品介绍</p>', '', '', '', '', '', '2017-08-30 14:03:36');
INSERT INTO `pro_mess` VALUES ('25805', '<p>商品介绍</p>', '', '', '', '', '', '2018-03-14 15:05:04');
INSERT INTO `pro_mess` VALUES ('25806', '<p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p><img src=\"/upload/editor/2017_06/21/1498030733.png\" title=\"1498030733.png\" alt=\"538-150515150313c7[1].png\"/></p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p><p>&nbsp; &nbsp; 盐皮蛋起源于四川省广安市协兴镇牌坊村(邓小平出生地‌‌)，传统工艺已有一百多年的历史。邓老太盐皮蛋是小平故里，广安地方饮食文化之瑰宝，被誉为新世纪蛋制品新品种，精选农田自然散养优质鸭蛋秘法精制，一枚鸭蛋，两种口味、口感醇香，回味悠长，是居家、旅游、赠友之佳品。</p>', 'upload/editor/2017_06/21/1498030733.png', '', '', '', '', '2017-08-16 10:50:01');
INSERT INTO `pro_mess` VALUES ('25807', '<p>商品介绍</p>', '', '', '', '', '', '2018-03-19 14:14:40');
INSERT INTO `pro_mess` VALUES ('25808', '<p>商品介绍</p>', 'upload/auto/2017/08/04/16/05/00/51838964081.png', '', '', '', '', null);
INSERT INTO `pro_mess` VALUES ('25809', '<p>商品介绍</p>', 'upload/auto/2017/08/04/16/05/00/51838964081.png', '', '', '', '', null);
INSERT INTO `pro_mess` VALUES ('25810', '<p>商品介绍</p>', '', '', '', '', '', '2017-08-30 14:40:54');

-- ----------------------------
-- Table structure for pro_ping_jia
-- ----------------------------
DROP TABLE IF EXISTS `pro_ping_jia`;
CREATE TABLE `pro_ping_jia` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PRO_ID` bigint(20) unsigned DEFAULT '0',
  `PING_FEN` tinyint(4) DEFAULT '0',
  `MESS` varchar(255) DEFAULT NULL,
  `REPLY` varchar(255) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT '0' COMMENT '评价者主键',
  `SHOP_ID` bigint(20) DEFAULT '0' COMMENT '商铺用户主键',
  `ADD_TIME` datetime DEFAULT NULL,
  `ORDER_DETAIL_ID` bigint(20) NOT NULL,
  `ANONYMOUS` tinyint(4) DEFAULT '0' COMMENT '匿名评价',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3303 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro_ping_jia
-- ----------------------------

-- ----------------------------
-- Table structure for pro_type
-- ----------------------------
DROP TABLE IF EXISTS `pro_type`;
CREATE TABLE `pro_type` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PRO_ID` bigint(20) unsigned DEFAULT '0',
  `NAME` varchar(30) DEFAULT NULL,
  `PIC` varchar(100) DEFAULT NULL,
  `KU_CUN` bigint(20) DEFAULT '0',
  `PRICE` decimal(20,2) DEFAULT '0.00',
  `HUI_DIAN` decimal(20,2) DEFAULT '0.00',
  `POINT` decimal(20,2) DEFAULT '0.00',
  `GUI_GE_JSON` varchar(100) DEFAULT NULL,
  `GUI_GE_1` bigint(20) DEFAULT '0',
  `GUI_GE_2` bigint(20) DEFAULT '0',
  `GUI_GE_3` bigint(20) DEFAULT '0',
  `GUI_GE_4` bigint(20) DEFAULT '0',
  `GUI_GE_5` bigint(20) DEFAULT '0',
  `PRICE_COST` decimal(20,2) DEFAULT '0.00',
  `CAN_USE_YU_E` decimal(20,2) DEFAULT '0.00' COMMENT '可使用余额额度',
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `PRO_ID` (`PRO_ID`),
  KEY `GUI_GE` (`GUI_GE_1`,`GUI_GE_2`,`GUI_GE_3`,`GUI_GE_4`,`GUI_GE_5`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=76432 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro_type
-- ----------------------------
INSERT INTO `pro_type` VALUES ('76417', '25803', '黑色,1核,', '', '9000', '100.00', '10.00', '0.00', '{\"1\":\"3\",\"8\":\"9\"}', '3', '9', '0', '0', '0', '0.00', '-1.00', '2018-04-26 16:52:23');
INSERT INTO `pro_type` VALUES ('76418', '25804', '', '', '798', '90.00', '10.00', '0.00', '', '0', '0', '0', '0', '0', '0.00', '-1.00', '2017-08-30 14:03:36');
INSERT INTO `pro_type` VALUES ('76419', '25805', '白色,1核,', '', '800', '90.00', '2.00', '0.00', '{\"1\":\"2\",\"8\":\"9\"}', '2', '9', '0', '0', '0', '0.00', '-1.00', '2018-03-14 15:05:05');
INSERT INTO `pro_type` VALUES ('76420', '25806', '黑色,5寸,180*198cm,', '', '800', '90.00', '10.00', '1.00', '{\"1\":\"3\",\"4\":\"5\",\"25\":\"34\"}', '3', '5', '34', '0', '0', '0.00', '-1.00', '2017-08-16 10:50:01');
INSERT INTO `pro_type` VALUES ('76421', '25807', '白色,', '', '800', '90.00', '10.00', '0.00', '{\"1\":\"2\"}', '2', '0', '0', '0', '0', '0.00', '-1.00', '2018-03-19 14:14:40');
INSERT INTO `pro_type` VALUES ('76422', '25806', '白色,5寸,90*190cm,', '', '500', '80.00', '10.00', '1.00', '{\"1\":\"2\",\"4\":\"5\",\"25\":\"26\"}', '2', '5', '26', '0', '0', '0.00', '-1.00', '2017-08-16 10:50:01');
INSERT INTO `pro_type` VALUES ('76425', '25806', '白色,6寸,90*190cm,', '', '97', '91.00', '91.00', '2.00', '{\"1\":\"2\",\"4\":\"6\",\"25\":\"26\"}', '2', '6', '26', '0', '0', '0.00', '-1.00', '2017-08-16 10:50:01');
INSERT INTO `pro_type` VALUES ('76426', '25803', '白色,2核,', '', '20', '90.00', '0.00', '0.00', '{\"1\":\"2\",\"8\":\"10\"}', '2', '10', '0', '0', '0', '0.00', '-1.00', '2018-04-26 16:52:23');
INSERT INTO `pro_type` VALUES ('76427', '25808', '白色,', '', '100', '80.00', '0.00', '0.00', '{\"1\":\"2\"}', '2', '0', '0', '0', '0', '0.00', '-1.00', null);
INSERT INTO `pro_type` VALUES ('76428', '25809', '白色,', '', '100', '80.00', '0.00', '0.00', '{\"1\":\"2\"}', '2', '0', '0', '0', '0', '0.00', '-1.00', null);
INSERT INTO `pro_type` VALUES ('76429', '25810', '白色,', '', '100', '80.00', '0.00', '0.00', '{\"1\":\"2\"}', '2', '0', '0', '0', '0', '0.00', '-1.00', '2017-08-30 14:40:54');
INSERT INTO `pro_type` VALUES ('76430', '25803', '白色,1核,', '', '53', '50.01', '2.00', '2.00', '{\"1\":\"2\",\"8\":\"9\"}', '2', '9', '0', '0', '0', '0.00', '-1.00', '2018-04-26 16:52:23');
INSERT INTO `pro_type` VALUES ('76431', '25803', '黑色,2核,', '', '10000', '0.01', '0.00', '0.00', '{\"1\":\"3\",\"8\":\"10\"}', '3', '10', '0', '0', '0', '0.00', '-1.00', '2018-04-26 16:52:23');

-- ----------------------------
-- Table structure for pro_yun_fei
-- ----------------------------
DROP TABLE IF EXISTS `pro_yun_fei`;
CREATE TABLE `pro_yun_fei` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `NAME` varchar(50) DEFAULT NULL,
  `PRICE` decimal(10,2) DEFAULT '0.00' COMMENT '基准价',
  `PRICE_COUNT` int(11) DEFAULT '0',
  `PRICE_NEXT` decimal(10,2) DEFAULT '0.00',
  `NEXT_COUNT` int(11) DEFAULT '0',
  `SHENG` int(11) DEFAULT '0',
  `SHI` int(11) DEFAULT '0',
  `QU` int(11) DEFAULT '0',
  `XIAN` int(11) DEFAULT '0',
  `BAO_YOU_COUNT` int(11) DEFAULT '-1',
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `SHENG` (`SHENG`),
  KEY `SHI` (`SHI`),
  KEY `QU` (`QU`),
  KEY `XIAN` (`XIAN`)
) ENGINE=InnoDB AUTO_INCREMENT=2585 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro_yun_fei
-- ----------------------------
INSERT INTO `pro_yun_fei` VALUES ('1', '0', '包邮', '0.00', '1', '0.00', '1', '0', '0', '0', '0', '-1', null);
INSERT INTO `pro_yun_fei` VALUES ('33', '5001421', '457', '2.00', '1', '2.00', '2', '370000', '370200', '370201', '370211', '-1', null);
INSERT INTO `pro_yun_fei` VALUES ('43', '5001421', 'test2', '11.00', '11', '12.00', '1', '110000', '110100', '0', '0', '-1', null);
INSERT INTO `pro_yun_fei` VALUES ('73', '5401871', '12', '12.00', '1', '0.00', '1', '130000', '130700', '130701', '130703', '3', null);
INSERT INTO `pro_yun_fei` VALUES ('2584', '71', '10元,100件包邮', '10.00', '5', '3.00', '1', '110000', '111400', '0', '0', '100', '2018-04-20 11:54:14');

-- ----------------------------
-- Table structure for pro_yun_fei_detail
-- ----------------------------
DROP TABLE IF EXISTS `pro_yun_fei_detail`;
CREATE TABLE `pro_yun_fei_detail` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `YUN_FEI_ID` bigint(20) unsigned DEFAULT '0',
  `AREA_ID` int(11) DEFAULT '0',
  `PRICE` decimal(10,2) DEFAULT '0.00',
  `PRICE_COUNT` int(11) DEFAULT '0',
  `PRICE_NEXT` decimal(10,2) DEFAULT '0.00',
  `NEXT_COUNT` int(11) DEFAULT '0',
  `BAO_YOU_COUNT` int(11) DEFAULT '-1',
  `EDIT_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `PID` (`YUN_FEI_ID`),
  KEY `AREA_ID` (`AREA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27513 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro_yun_fei_detail
-- ----------------------------
INSERT INTO `pro_yun_fei_detail` VALUES ('27512', '71', '2584', '500000', '10.00', '10', '1.00', '1', '100', '2018-04-27 11:31:31');

-- ----------------------------
-- Table structure for pub
-- ----------------------------
DROP TABLE IF EXISTS `pub`;
CREATE TABLE `pub` (
  `PUB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PUB_NAME` varchar(15) DEFAULT NULL,
  `PUB_VALUE` varchar(512) DEFAULT NULL,
  `ADD_TIME` datetime DEFAULT NULL,
  `IS_EDIT` tinyint(4) DEFAULT '0',
  `TYPE` tinyint(4) DEFAULT '1',
  `GROUP_ID` int(11) DEFAULT '1',
  PRIMARY KEY (`PUB_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=60000008 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pub
-- ----------------------------
INSERT INTO `pub` VALUES ('7', '网络电话用户费率', '0.1', null, '0', '1', '1');
INSERT INTO `pub` VALUES ('8', '直拨透传线费率', '0.1', null, '0', '1', '1');
INSERT INTO `pub` VALUES ('71', '新注册赠送积分', '0', null, '1', '1', '1');
INSERT INTO `pub` VALUES ('72', '新注册赠送通话时间', '0', null, '0', '1', '1');
INSERT INTO `pub` VALUES ('73', '新注册赠送金额', '0', null, '1', '1', '1');
INSERT INTO `pub` VALUES ('100', '微信支付-APPID', '', '2008-12-18 09:15:09', '1', '1', '8');
INSERT INTO `pub` VALUES ('101', '微信支付-MCHID', '', '2008-12-18 09:15:09', '1', '1', '8');
INSERT INTO `pub` VALUES ('102', '微信支付-KEY', '', '2015-11-20 09:15:09', '1', '1', '8');
INSERT INTO `pub` VALUES ('103', '微信公众-SECRET', '', null, '1', '1', '8');
INSERT INTO `pub` VALUES ('200', 'smtp地址', 'smtp.qq.com', null, '1', '1', '50');
INSERT INTO `pub` VALUES ('201', '用户名', 'xxxx@qq.com', null, '1', '1', '50');
INSERT INTO `pub` VALUES ('202', '密码', 'xxxx', null, '1', '1', '50');
INSERT INTO `pub` VALUES ('203', 'smtp端口', '25', null, '1', '1', '50');
INSERT INTO `pub` VALUES ('204', 'stmp账户', 'xxxx@qq.com', null, '1', '1', '50');
INSERT INTO `pub` VALUES ('205', '后台顶部Logo', 'images/logo_title.png', null, '1', '2', '1');
INSERT INTO `pub` VALUES ('7000', 'temp_money_log_', '8863856', null, '0', '1', '1');
INSERT INTO `pub` VALUES ('60000003', 'Code', '{\"access_token\":\"3-42YqGBNkShi1R-W4-1iBiHAuZ447lID41Qf9rtxIPwdRX135R4SpqeCT2cwtEZTx1trQFi3Qvxni1Nog7VU-q-aOs14MQkX0HWkEm6OOLhADACCZ\",\"expires_in\":7200}', null, '0', '1', '9');
INSERT INTO `pub` VALUES ('60000004', 'Code_Time', '2017-06-11 17:03:58', null, '0', '1', '9');
INSERT INTO `pub` VALUES ('60000005', '云话通-Api用户名', '80024', null, '1', '1', '100');
INSERT INTO `pub` VALUES ('60000006', '云话通-Key', 'key', null, '1', '1', '100');
INSERT INTO `pub` VALUES ('60000007', '短信签名', '川海软件', null, '1', '1', '100');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `ROLE_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `PARENT_ID` bigint(20) DEFAULT '0',
  `ROLE_NAME` varchar(100) DEFAULT NULL,
  `POWER_LIST` varchar(400) DEFAULT NULL,
  `CRETE_TIME` datetime DEFAULT NULL,
  `URL` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '0', '系统管理员', ',311,312,313,314,299,300,303,304,305,289,291,351,352,333,296,297,340,341,339,353,346,347,348,354,355,356,357,360,361,362,363,369,370,372,366,373,374,375,384,306,307,308,309,310,386,376,377,378,379,380,381,382,383,387,388,298,302,342,343,344,345,388,390,401,403,407,408,410,412,350,413,421,422,423,424,425,426,427,428,429,433,371,434,435,8,9,109,436,437,438,439,440,441,303,', '2008-04-03 17:20:59', null);
INSERT INTO `role` VALUES ('72', '0', '会员', '', null, null);
INSERT INTO `role` VALUES ('73', '0', '商家', '', null, null);
INSERT INTO `role` VALUES ('74', '0', '服务商', ',8,436,437,438,321,327,326,', null, null);
INSERT INTO `role` VALUES ('75', '0', '财务部', ',374,306,310,', null, null);
INSERT INTO `role` VALUES ('100', '0', '客服部', ',8,436,437,438,', null, null);

-- ----------------------------
-- Table structure for shopping_address
-- ----------------------------
DROP TABLE IF EXISTS `shopping_address`;
CREATE TABLE `shopping_address` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SHENG` int(11) NOT NULL DEFAULT '0',
  `SHI` int(11) NOT NULL DEFAULT '0',
  `QU` int(11) NOT NULL DEFAULT '0',
  `XIAN` int(11) DEFAULT '0',
  `ADDRESS` varchar(180) NOT NULL COMMENT '详细地址',
  `USER_NAME` varchar(60) NOT NULL DEFAULT '' COMMENT '收件人姓名',
  `USER_TEL` varchar(60) NOT NULL COMMENT '收件人手机号',
  `ADD_TIME` datetime NOT NULL,
  `SHENG_NAME` varchar(50) NOT NULL,
  `SHI_NAME` varchar(50) NOT NULL,
  `QU_NAME` varchar(50) NOT NULL,
  `YOU_BIAN` varchar(10) DEFAULT NULL,
  `ISDEFAULT` smallint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `ISDEFAULT` (`ISDEFAULT`)
) ENGINE=InnoDB AUTO_INCREMENT=64271 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopping_address
-- ----------------------------
INSERT INTO `shopping_address` VALUES ('64247', '6681496', '230000', '230400', '230405', '0', 'aaa', 'bb', '123654789', '0000-00-00 00:00:00', '黑龙江省', '鹤岗市', '兴安区', '266000', '0');
INSERT INTO `shopping_address` VALUES ('64248', '6681496', '230000', '230400', '230405', '0', 'aaa', 'bb', '123654789', '0000-00-00 00:00:00', '黑龙江省', '鹤岗市', '兴安区', '266000', '0');
INSERT INTO `shopping_address` VALUES ('64249', '6681496', '130000', '130300', '130304', '0', 'a', 'b', '13705889899', '0000-00-00 00:00:00', '河北省', '秦皇岛市', '北戴河区', '266000', '0');
INSERT INTO `shopping_address` VALUES ('64250', '6681496', '140000', '140400', '140424', '0', 'd', 'd', '123123123', '0000-00-00 00:00:00', '山西省', '长治市', '屯留县', '266000', '1');
INSERT INTO `shopping_address` VALUES ('64252', '76', '120000', '120300', '0', '0', '河西大街1256号3号楼2单元3356', '王先生', '13700000000', '2017-09-22 14:04:00', '天津市', '河西区', '', '266000', '1');
INSERT INTO `shopping_address` VALUES ('64253', '6681499', '120000', '120200', '0', '0', 'rt53456', '是的撒', '13005409632', '2017-11-03 14:02:09', '天津市', '河东区', '', '442500', '1');
INSERT INTO `shopping_address` VALUES ('64254', '6681500', '120000', '120100', '0', '0', '131', '31231313', '12311121', '2017-11-18 07:57:12', '天津市', '和平区', '', '111', '1');
INSERT INTO `shopping_address` VALUES ('64256', '6681502', '360000', '360100', '360102', '0', 'sesdsa', 'sd', '18544446666', '2017-12-21 19:40:19', '江西省', '南昌市', '东湖区', '412632', '1');
INSERT INTO `shopping_address` VALUES ('64257', '6681502', '210000', '210100', '210102', '0', 'red', 'we', '18566664444', '2017-11-26 21:01:02', '辽宁省', '沈阳市', '和平区', '412023', '0');
INSERT INTO `shopping_address` VALUES ('64259', '6681505', '110000', '110100', '0', '0', 'ddff', 'efd', 'sdf', '2017-12-30 14:31:40', '北京市', '东城区', '', 'sdf', '0');
INSERT INTO `shopping_address` VALUES ('64260', '6681506', '230000', '230100', '230102', '0', '庙坝镇庙坝中学', '文香雯', '157231451854', '2018-01-09 20:06:21', '黑龙江省', '哈尔滨市', '道里区', '635102', '1');
INSERT INTO `shopping_address` VALUES ('64265', '100', '120000', '120100', '120111', '0', '上放水电费22', '大师傅2', '13777888822', '2018-04-19 15:32:29', '天津市', '天津市', '西青区', null, '0');
INSERT INTO `shopping_address` VALUES ('64266', '100', '120000', '120100', '120101', '0', '上放水电费', '大师傅', '13777888888', '2018-04-19 16:46:58', '天津市', '天津市', '和平区', null, '1');
INSERT INTO `shopping_address` VALUES ('64267', '100', '140000', '140400', '140402', '0', '是的发顺丰', '啊', '17888888888', '2018-04-19 15:32:08', '山西省', '长治市', '城区', null, '0');
INSERT INTO `shopping_address` VALUES ('64269', '71', '370000', '370200', '370290', '0', 'abc', 'abc', '13711111111', '2018-04-25 21:48:53', '山东省', '青岛市', '开发区', null, '1');
INSERT INTO `shopping_address` VALUES ('64270', '6681512', '110000', '110100', '110102', '0', '京东基督教', '测试', '13500135000', '2018-04-28 00:43:05', '北京市', '北京市', '西城区', null, '1');

-- ----------------------------
-- Table structure for sort
-- ----------------------------
DROP TABLE IF EXISTS `sort`;
CREATE TABLE `sort` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) DEFAULT '0',
  `PARENT_ID` bigint(20) unsigned DEFAULT '0',
  `STATE` tinyint(4) DEFAULT '1',
  `SORT_BIG` bigint(20) DEFAULT '0',
  `PRO_SORT_ID` bigint(20) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `SORT_ID` (`PARENT_ID`),
  KEY `STATE` (`STATE`),
  KEY `SORT_BIG_ID` (`SORT_BIG`)
) ENGINE=InnoDB AUTO_INCREMENT=74747 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sort
-- ----------------------------
INSERT INTO `sort` VALUES ('74709', '夏装', '0', '1', '107', '0');
INSERT INTO `sort` VALUES ('74710', '海鲜', '0', '1', '107', '0');
INSERT INTO `sort` VALUES ('74711', 'T恤', '0', '1', '107', '0');

-- ----------------------------
-- Table structure for sort_big
-- ----------------------------
DROP TABLE IF EXISTS `sort_big`;
CREATE TABLE `sort_big` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sort_big
-- ----------------------------
INSERT INTO `sort_big` VALUES ('107', 'Tag');

-- ----------------------------
-- Table structure for tree
-- ----------------------------
DROP TABLE IF EXISTS `tree`;
CREATE TABLE `tree` (
  `TREE_ID` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `TREE_NAME` varchar(100) DEFAULT NULL,
  `PARENT_NUM` int(11) DEFAULT NULL,
  `NODE_TYPE` int(11) DEFAULT NULL,
  `TREE_GRADE` int(11) DEFAULT NULL,
  `TREE_PIC1` varchar(100) DEFAULT NULL,
  `TREE_PIC2` varchar(100) DEFAULT NULL,
  `TREE_URL` varchar(150) DEFAULT NULL,
  `TREE_STATE` int(11) DEFAULT NULL,
  `ORDER_NUM` int(11) DEFAULT NULL,
  `IN_IFRAME` int(11) DEFAULT NULL,
  `TREE_TYPE` int(11) DEFAULT NULL,
  PRIMARY KEY (`TREE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=442 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tree
-- ----------------------------
INSERT INTO `tree` VALUES ('1', '目录树结构', '-1', '1', '1', '/js/ext/images/home.gif', null, 'http://www.LongTengHost.cn', '1', '0', '1', '1');
INSERT INTO `tree` VALUES ('2', '系统管理', '1', '1', '2', null, null, 'http://www.LongTengHost.cn', '1', '0', '1', '1');
INSERT INTO `tree` VALUES ('3', '角色管理', '2', '0', '3', null, null, 'role.php', '1', '99999995', '0', '1');
INSERT INTO `tree` VALUES ('4', '人员管理', '2', '0', '3', null, null, 'http://localhost:888/page/grid/?pageid=1', '1', '99999990', '1', '1');
INSERT INTO `tree` VALUES ('5', '系统日志', '2', '0', '3', '', null, 'AdminPage/SysLog.aspx', '1', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('6', '类别管理', '2', '0', '3', null, null, 'AdminPage/SortTree.aspx', '1', '99999970', '1', '1');
INSERT INTO `tree` VALUES ('7', '模块管理', '2', '0', '3', null, null, 'AdminPage/MenuTree.aspx', '1', '59999960', '1', '1');
INSERT INTO `tree` VALUES ('8', '信息管理', '1', '1', '2', '/images/account.png', '', '', '1', '79999990', '1', '1');
INSERT INTO `tree` VALUES ('9', '后台管理背景图', '8', '0', '3', '', '', '/mess/news/list.html?sortid=9', '1', '50', '1', '1');
INSERT INTO `tree` VALUES ('11', '类别管理', '-1', '1', '1', null, null, null, '1', '0', '1', '2');
INSERT INTO `tree` VALUES ('34', '新闻类别', '11', '1', '2', '', '', '', '1', '99999990', '0', '2');
INSERT INTO `tree` VALUES ('63', '用户皮肤', '11', '1', '2', '', '', '', '1', '99999980', '0', '2');
INSERT INTO `tree` VALUES ('64', '蓝色风格', '63', '0', '3', '', '', 'ext-all', '1', '99999990', '0', '2');
INSERT INTO `tree` VALUES ('65', '银白风格', '63', '0', '3', '', '', 'xtheme-gray', '1', '99999985', '0', '2');
INSERT INTO `tree` VALUES ('70', '深蓝风格', '63', '0', '3', null, null, 'xtheme-slate', '1', '99999960', '0', '2');
INSERT INTO `tree` VALUES ('77', '话务系统', '1', '1', '2', '', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('84', '话单列表', '77', '0', '3', '', '', '/call/calllog/list/', '1', '99999999', '1', '1');
INSERT INTO `tree` VALUES ('109', '单页信息', '8', '0', '3', '', '', '/mess/news/list.html?sortid=100000', '1', '35', '1', '1');
INSERT INTO `tree` VALUES ('133', '公告通知', '34', '0', '3', '', '', '', '1', '99999950', '0', '2');
INSERT INTO `tree` VALUES ('152', '参数配置', '77', '0', '3', '', '', '/ShopUser/CanShu/', '1', '15', '1', '1');
INSERT INTO `tree` VALUES ('155', '会员类型', '11', '1', '2', '', '', '', '1', '99999975', '0', '2');
INSERT INTO `tree` VALUES ('156', '普通会员', '155', '0', '3', '', '', '', '1', '99999990', '0', '2');
INSERT INTO `tree` VALUES ('157', 'vip会员', '155', '0', '3', '', '', '', '1', '99999985', '0', '2');
INSERT INTO `tree` VALUES ('186', '单页信息', '34', '0', '3', '', '', '', '1', '99999925', '0', '2');
INSERT INTO `tree` VALUES ('231', '图片种类', '11', '1', '2', '', '', '', '1', '99999940', '0', '2');
INSERT INTO `tree` VALUES ('259', '菜单管理', '-1', '1', '1', null, null, null, '1', '0', null, '1');
INSERT INTO `tree` VALUES ('277', '会员列表', '77', '0', '3', '', '', '/user/user/list/', '1', '99999999', '1', '1');
INSERT INTO `tree` VALUES ('278', '卡密管理', '77', '0', '3', '', '', '/call/kami/list/', '1', '99999975', '1', '1');
INSERT INTO `tree` VALUES ('285', '交易查询', '1', '1', '2', '/images/trade.png', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('287', '收支明细', '285', '0', '3', '', '', '/caiwu/log/list.html', '0', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('289', '设置中心', '1', '1', '2', '/images/safe.png', '', '', '1', '19999985', '1', '1');
INSERT INTO `tree` VALUES ('291', '修改密码', '289', '0', '3', '', '', '', '0', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('292', '操作日志', '289', '0', '3', '', '', '', '0', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('293', '帐号管理', '1', '1', '2', '/images/zhanghao.png', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('296', '订单', '1', '1', '2', '/images/xiaofei.png', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('298', '产品', '1', '1', '2', '/images/shangpin.png', '', '', '1', '99999999', '1', '1');
INSERT INTO `tree` VALUES ('299', '账户资产', '1', '1', '2', '/images/caiwu.png', '', '', '0', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('300', '资金', '299', '0', '3', '/images/tree/market/pay.gif', '', '/user/money/index/', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('302', '产品管理', '298', '0', '3', '', '', '/mall/pro/list.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('303', '统计报表', '1', '1', '2', '/images/tongji.png', '', '', '0', '89999985', '1', '1');
INSERT INTO `tree` VALUES ('306', '财务操作', '1', '1', '2', '/images/caiwu.png', '', '', '1', '99999981', '1', '1');
INSERT INTO `tree` VALUES ('307', '用户充值', '306', '0', '3', '/images/tree/user/userpay.gif', '', '/user/money/chong_cai_wu.html', '0', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('309', '充值日志', '306', '0', '3', '/images/tree/user/paylog.gif', '', '/data_caiwu/log/chong_zhi_list.html', '0', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('311', '账号管理', '1', '1', '2', '/images/account.png', '', '', '1', '99999886', '1', '1');
INSERT INTO `tree` VALUES ('312', '会员管理', '311', '0', '3', '/images/tree/market/usermanage.gif', '', '/page/grid/list/?pageid=5', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('315', '订单', '1', '1', '2', '/images/xiaofei.png', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('316', '联盟商订单', '315', '0', '3', '', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('317', '商城订单', '315', '0', '3', '', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('318', '收益表', '299', '0', '3', '', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('319', '充值记录', '285', '0', '3', '', '', '/page/grid/?pageid=1', '0', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('320', '网络电话记录', '285', '0', '3', '/images/tree/user/talk.gif', '', '/call/log/list.html', '0', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('321', '资产管理', '1', '1', '2', '/images/balance.png', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('322', '金额', '321', '0', '3', '/images/tree/user/money.gif', '', '/user/money/index/', '1', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('328', '账户管理', '1', '1', '2', '/images/account.png', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('329', '我的信箱', '328', '0', '3', '/images/tree/user/mail.gif', '', '/user/message/list/', '1', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('331', '我的点评', '328', '0', '3', '/images/tree/user/commont.gif', '', '/page/grid/?pageid=1', '1', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('332', '我的收藏', '328', '0', '3', '/images/tree/user/collect.gif', '', '/page/grid/?pageid=1', '1', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('333', '资料管理', '289', '0', '3', '/images/tree/user/data.gif', '', '/data_shop/user/editshop.html', '0', '99999990', '1', '1');
INSERT INTO `tree` VALUES ('339', '产品订单', '296', '0', '3', '/images/tree/market/shoporder.gif', '', '/mall/Ordershop/detaillist.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('346', '转账', '299', '0', '3', '', '', '/user/money/index/', '0', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('351', '站内信箱', '289', '0', '3', '/images/tree/market/mail.gif', '', '/user/message/list/', '0', '99999990', '1', '1');
INSERT INTO `tree` VALUES ('362', '广告管理', '1', '1', '2', '/images/safe.png', '', '', '0', '29999985', '1', '1');
INSERT INTO `tree` VALUES ('363', '参数设置', '289', '0', '3', '/images/tree/market/canshu.gif', '', '/system/set/index.html', '1', '99999990', '1', '1');
INSERT INTO `tree` VALUES ('365', '话费充值0', '296', '0', '3', '/images/tree/market/conoder.gif', '', '/call/log/hua_fei_list.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('366', '网络电话', '296', '0', '3', '/images/tree/market/conoder.gif', '', '/call/log/list.html', '0', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('367', '商城订单1', '285', '0', '3', '/images/tree/market/shoporder.gif', '', '/mall/order_shop/Order_detail_list.html', '1', '59999985', '1', '1');
INSERT INTO `tree` VALUES ('368', '手机充值记录', '285', '0', '3', '/images/tree/user/talk.gif', '', '/call/log/hua_fei_list.html', '1', '99999980', '1', '1');
INSERT INTO `tree` VALUES ('369', '资产调拨', '306', '0', '3', '/images/tree/market/unit.gif', '', '/caiwu/diaobo/index.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('371', 'api权限管理', '289', '0', '3', '/images/tree/market/adv.gif', '', '/system/api/user.html', '0', '99999990', '1', '1');
INSERT INTO `tree` VALUES ('372', '系统管理员', '311', '0', '3', '/images/tree/market/sermanage.gif', '', '/page/grid/list/?pageid=1', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('373', '云话通', '296', '0', '3', '/images/tree/market/conoder.gif', '', '/chuanhai/Yunhuatong/index.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('374', '金额日志', '306', '0', '3', '/images/tree/market/shopfor.gif', '', '/caiwu/log/list.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('388', '运费管理', '298', '0', '3', '/images/tree/market/shopfor.gif', '', '/mall/yunfei/list.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('389', '商城设置', '1', '1', '2', '/images/balance.png', '', '', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('390', '产品类目', '298', '0', '3', '/images/tree/market/shopfor.gif', '', '/mall/fenlei/list.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('401', '规格管理', '298', '0', '3', '/images/tree/market/shopfor.gif', '', '/mall/guige/list.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('412', '登录日志', '289', '0', '3', '/images/tree/user/data.gif', '', '/system/log/userloglist.html', '0', '99999990', '1', '1');
INSERT INTO `tree` VALUES ('413', '收支查询', '299', '0', '3', '/images/tree/market/pay.gif', '', '/user/money/log_index.html', '1', '99999985', '1', '1');
INSERT INTO `tree` VALUES ('414', '收支明细', '321', '0', '3', '/images/tree/market/pay.gif', '', '/user/money/log_index.html', '1', '99999900', '1', '1');
INSERT INTO `tree` VALUES ('419', '资料修改', '289', '0', '3', null, null, '/new_oa/rz/editinfo.html', '1', '99999990', '1', '1');
INSERT INTO `tree` VALUES ('420', '登录日志', '289', '0', '3', null, null, '/new_oa/rz/log.html', '0', '99999990', '1', '1');
INSERT INTO `tree` VALUES ('431', '供应商列表', '399', '0', '3', '/images/tree/market/groupre.gif', '', '/mall/supplier/list.html?fg=1', '1', '99999900', '1', '1');
INSERT INTO `tree` VALUES ('432', '仓库列表', '399', '0', '3', '/images/tree/market/shopmanage.gif', null, '/mall/warehouse/list.html?fg=1', '1', '99999900', '1', '1');
INSERT INTO `tree` VALUES ('439', '类别信息', '298', '0', '3', '/images/tree/market/shopfor.gif', null, '/mess/sortbig/list.html', '1', '100000', '1', '1');
INSERT INTO `tree` VALUES ('440', '首页视觉轮播', '8', '0', '3', '', '', '/mess/news/list.html?sortid=10', '1', '35', '1', '1');
INSERT INTO `tree` VALUES ('441', '公告管理', '8', '0', '3', '', '', '/mess/news/list.html?sortid=11', '1', '35', '1', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `LOGIN_NAME` varchar(60) DEFAULT NULL,
  `LOGIN_PASS` varchar(60) DEFAULT NULL,
  `LOGIN_TYPE` tinyint(4) DEFAULT '1',
  `ROLE_ID` int(11) unsigned DEFAULT '0' COMMENT '角色',
  `USER_GRADE` bigint(20) DEFAULT '0' COMMENT '等级',
  `CARD_NUM` bigint(20) unsigned DEFAULT NULL,
  `NAME` varchar(60) DEFAULT NULL COMMENT '名称',
  `MOBILE_NUM` bigint(20) DEFAULT NULL COMMENT '手机号码',
  `PAY_PASS` varchar(60) DEFAULT NULL,
  `MONEY` decimal(20,3) DEFAULT '0.000',
  `MONEY_LOCK` decimal(20,3) DEFAULT '0.000',
  `ADD_TIME` datetime DEFAULT NULL,
  `ADDRESS` varchar(80) DEFAULT NULL COMMENT '地址',
  `EMAIL` varchar(60) DEFAULT NULL,
  `CHECK_USER` tinyint(4) DEFAULT '0' COMMENT '身份认证状态',
  `CHECK_MOBILE` tinyint(4) DEFAULT '0' COMMENT '手机认证状态',
  `CHECK_EMAIL` tinyint(4) DEFAULT '0' COMMENT '邮箱认证状态',
  `CHECK_BANK` tinyint(4) DEFAULT '0' COMMENT '银行卡认证',
  `CHECK_BASE` tinyint(4) DEFAULT '0',
  `LAST_LOGIN_TIME` datetime DEFAULT NULL,
  `LAST_LOGIN_IP` varchar(60) DEFAULT NULL,
  `RECOMMEND_ID` bigint(20) DEFAULT '0' COMMENT '推荐人ID',
  `TALK_TIME` int(11) DEFAULT '0' COMMENT '通话时间',
  `BIG_AREA` int(11) DEFAULT '0' COMMENT '大区',
  `PROVINCE` int(11) DEFAULT '0' COMMENT '省',
  `CITY` int(11) DEFAULT '0' COMMENT '市',
  `AREA` int(11) DEFAULT '0' COMMENT '区',
  `STREET` int(11) DEFAULT '0' COMMENT '????',
  `PARTNER_RATE` decimal(10,4) DEFAULT '0.0000' COMMENT '商家合作提成比例',
  `POINT` decimal(20,2) DEFAULT '0.00' COMMENT '积分',
  `ID_CARD_TYPE` tinyint(4) DEFAULT '0' COMMENT '证件类型',
  `ID_CARD` varchar(50) DEFAULT NULL COMMENT '证件号码',
  `BANK` bigint(20) unsigned DEFAULT '0' COMMENT '银行卡',
  `MAP_X` decimal(20,6) DEFAULT '0.000000' COMMENT 'X坐标',
  `MAP_Y` decimal(20,6) DEFAULT '0.000000' COMMENT 'Y坐标',
  `CHANNELID` varchar(30) DEFAULT NULL COMMENT '手机机器码',
  `BIRTHDAY` date DEFAULT NULL COMMENT '生日',
  `SEX` tinyint(4) DEFAULT '0' COMMENT '性别',
  `REG_SOURCE` tinyint(4) DEFAULT '0',
  `STATE` smallint(6) DEFAULT '1' COMMENT '用户状态',
  `PARENT_ID` bigint(20) unsigned DEFAULT '0' COMMENT '服务商专属隶属关系',
  `ADD_USER_ID` bigint(20) unsigned DEFAULT '0' COMMENT '?????',
  `FU_ZE_REN_ID` bigint(20) unsigned DEFAULT '0',
  `QQ` varchar(20) DEFAULT NULL,
  `MESSAGE_COUNT` int(11) DEFAULT '0',
  `EDIT_TIME` varchar(60) DEFAULT NULL,
  `WEI_XIN` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `LOGIN_NAME` (`LOGIN_NAME`) USING BTREE,
  KEY `ROLE_ID` (`ROLE_ID`),
  KEY `MOBILE_NUM` (`MOBILE_NUM`),
  KEY `ADD_TIME` (`ADD_TIME`),
  KEY `STATE` (`STATE`),
  KEY `LOGIN_TYPE` (`LOGIN_TYPE`),
  KEY `CHECK_BASE` (`CHECK_BASE`),
  KEY `CHECK_MOBILE` (`CHECK_MOBILE`),
  KEY `CHECK_EMAIL` (`CHECK_EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=6681516 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('71', 'admin', 'chuanhaisoft', '1', '1', null, '86018661990031', '川海软件', '18661990031', 'e10adc3949ba59abbe56e057f20f883e', '210.000', '0.000', '2017-06-07 07:21:32', '菏泽东明', '', '0', '1', '0', '0', '0', null, null, '6681486', '0', '2', '310000', '310500', '236', '473', '0.0000', '2.00', '0', '372930197310190028', '0', '116.383083', '40.065137', null, '1973-10-19', '-1', '0', '1', '0', '0', '0', '276556803', '9950', '2017-08-07 09:51:09', '456');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `USER_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_PIC` varchar(400) DEFAULT NULL,
  `SHOP_PIC` varchar(200) DEFAULT NULL,
  `YING_YE_ZHI_ZHAO` varchar(200) DEFAULT NULL,
  `SORT1` int(11) DEFAULT '0',
  `SORT2` int(11) DEFAULT '0',
  `ID_CARD_PIC` varchar(200) DEFAULT NULL,
  `FU_JIAN` varchar(200) DEFAULT NULL,
  `CURRENT_LOGIN_ID` bigint(20) unsigned DEFAULT '0' COMMENT '操作员最后切换到的USER_ID',
  `CHECK_TEAM` tinyint(4) DEFAULT '0' COMMENT '判断团体卡',
  `SHOP_YA_JIN` varchar(50) DEFAULT NULL,
  `CHECK_PM` tinyint(4) DEFAULT '0' COMMENT '可否使用余额支付',
  `QJ_URL` varchar(200) DEFAULT NULL,
  `STATE_JI_HUO` smallint(6) DEFAULT '0' COMMENT '是否激活',
  `JI_HUO_TIME` datetime DEFAULT NULL COMMENT '激活时间',
  `CHECK_YG` tinyint(4) DEFAULT '0',
  `TUI_QIAN_SHEN_QING_TIME` datetime DEFAULT NULL,
  `TUI_QIAN_FINISHED_TIME` datetime DEFAULT NULL,
  `CHU_ZHI_KA_MONEY` decimal(20,2) DEFAULT '0.00',
  `CHU_ZHI_KA_MONEY_XIAO_FEI` decimal(20,2) DEFAULT '0.00',
  `SHOP_YA_JIN_CAIWU` decimal(20,2) DEFAULT '0.00',
  `SHOP_YA_JIN_SHICHANG` decimal(20,2) DEFAULT '0.00',
  `SHOP_YA_JIN_QUXIAN` decimal(20,2) DEFAULT '0.00',
  `SHOP_YA_JIN_ALL` decimal(20,2) DEFAULT '0.00',
  `TYPE_LIST` varchar(20) DEFAULT NULL,
  `IS_GONG_YING_SHANG` tinyint(4) DEFAULT '0',
  `ID_CARD_PIC_B` varchar(200) DEFAULT NULL,
  `BANK_CARD_A` varchar(200) DEFAULT NULL,
  `BANK_CARD_B` varchar(200) DEFAULT NULL,
  `EXP_DATE` date DEFAULT NULL COMMENT '有效期',
  `TEAM_ID` bigint(20) unsigned DEFAULT '0',
  `TUI_YA_JIN_ORDER_ID` bigint(20) unsigned DEFAULT '0',
  `SHEN_QING_SHANG_HU` tinyint(4) DEFAULT '0',
  `TOKEN` varchar(520) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `STATE_JI_HUO` (`STATE_JI_HUO`),
  KEY `TUI_QIAN_FINISHED_TIME` (`TUI_QIAN_FINISHED_TIME`),
  KEY `IS_GONG_YING_SHANG` (`IS_GONG_YING_SHANG`)
) ENGINE=InnoDB AUTO_INCREMENT=6681494 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('2', '', '', '', '0', '0', null, null, '2', '0', null, '0', null, '1', '2016-03-25 11:52:40', '0', null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '0', null, null, null, null, '5004388', '0', '0', null);
INSERT INTO `user_info` VALUES ('71', '', 'upload/auto/2017/05/11/10/17/25/81138169455.jpg', null, '0', '0', null, null, '0', '0', null, '0', null, '0', null, '0', null, null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '0', null, null, null, null, '0', '0', '1', null);

-- ----------------------------
-- Table structure for user_log
-- ----------------------------
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` bigint(20) unsigned DEFAULT '0',
  `ACT_TIME` datetime DEFAULT NULL,
  `MODULE_ID` int(11) DEFAULT '0',
  `STATE` tinyint(4) DEFAULT '0' COMMENT '操作状态',
  `ACT_IP` varchar(30) DEFAULT NULL,
  `MESS` varchar(150) DEFAULT NULL,
  `ACT_ID` bigint(20) unsigned DEFAULT '0',
  `MONEY` decimal(20,2) DEFAULT '0.00',
  `POINT` decimal(20,2) DEFAULT '0.00',
  PRIMARY KEY (`ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `MODULE_ID` (`MODULE_ID`),
  KEY `STATE` (`STATE`),
  KEY `ACT_TIME` (`ACT_TIME`)
) ENGINE=InnoDB AUTO_INCREMENT=19419988 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_log
-- ----------------------------
