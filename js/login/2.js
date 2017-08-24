(function() {
	window.gAdTemplate_lbp = {
		parse: function(oDatas) {
			try {
				var oData = this.getData(oDatas.userProperty, JSON.parse(oDatas.dataContext))
			} catch(e) {
				var oData = this.getData(oDatas.userProperty, eval("(" + oDatas.dataContext + ")"))
			}
			return oData
		}
	}
})(); (function() {
	var d = {
		FlowLimitType: {
			TOTAL_AMOUNT_LIMIT: 1,
			DAILY_AMOUNT_LIMIT: 2,
			TOTAL_EFFECT_LIMIT: 3
		},
		Priority: {
			HIGHEST: 0,
			NONE: 8888,
			LOWEST: 9999
		},
		MailRegTime: {
			IGNORE: -1,
			LATEST_30DAY: 0,
			LATEST__60DAY: 1,
			LATEST_180DAY: 2
		},
		MailLiveness: {
			IGNORE: -1,
			LATEST_7DAY: 0,
			LATEST__14DAY: 1,
			LATEST_30DAY: 2
		},
		WapUserType: {
			IGNORE: -1,
			ALL: "0",
			IPHONE: 1,
			IPAD: 2,
			ANDROID: 3,
			OTHER_MOBILE: 4
		},
		BrowserType: {
			IGNORE: -1,
			HIGH: 0,
			LOW: 1
		},
		Version: {
			JS5: 0,
			JS6: 1
		},
		Sex: {
			IGNORE: -1,
			UNKNOW: 0,
			MALE: 1,
			FEMALE: 2
		}
	};
	function h(o) {
		if (o == null) {
			return true
		}
		return o.mailRegTime == d.MailRegTime.IGNORE && o.mailLiveness == d.MailLiveness.IGNORE && o.wapUserType == "" && o.browserType == d.BrowserType.IGNORE && o.usedProdIds == "" && o.unusedProdIds == "" && o.interest == "" && o.lotteryType == "" && o.game == "" && o.bobo == "" && o.cc == "" && o.sex == "" && o.gameQnyh2 == "" && o.gameWync == "" && o.gameWh == "" && o.gameDtws2 == "" && o.gameTx3 == "" && o.gameYxsg == "" && o.consumeLevel == "" && o.gameXdhxy2 == "" && o.gameDhwzxp == "" && o.gameZgmh == "" && o.gameDhxy3Free == "" && o.gameMhxy == "" && o.gameDhxy3Clsc == "" && o.gameLdxy == "" && o.gameWj2015 == "" && o.industry == "" && o.career == "" && o.loginCompany == "" && o.gameYzr == "" && o.emailUsage == "" && o.nobleMetal == "" && o.gameFootball == "" && o.haitao == "" && o.gameTfqst == "" && o.gameXysmj == "" && o.gameKdzlj == "" && o.gameLmtjl == "" && o.gameQnyhl == "" && o.gameSsqq == "" && o.gameTfmz == "" && o.gameZmq == "" && o.gameMtj == "" && o.yydb == "" && o.gameXsd == "" && o.yq == ""
	}
	var n = 1;
	var c = 1;
	window.gAdTemplate_lbp.getData = function(s, p) {
		var o = {};
		o.ver = c;
		var q = l(s, p._163LbpAdUnitsList, p._163LbpAnchorAdUnitsList, p._126LbpAdUnitsList, p._126LbpAnchorAdUnitsList, p._yeahLbpAdUnitsList, p._yeahLbpAnchorAdUnitsList, p._emailLbpAdUnitsList, p._emailLbpAnchorAdUnitsList);
		if (q == null) {
			return o
		}
		var r = {};
		r.pid = q.pid;
		r.material = b(s.mailVer, s.ver, s.uid, q.data);
		o.lbp = r;
		return o
	};
	function l(A, w, p, r, D, F, o, C, u) {
		var E = {};
		var z = [];
		var y = [];
		var q = "" + A.domain;
		if (q == "163.com") {
			z = w;
			y = p
		} else {
			if (q == "126.com") {
				z = r;
				y = D
			} else {
				if (q == "yeah.net") {
					z = F;
					y = o
				} else {
					if (q == "email.com") {
						z = C;
						y = u
					} else {
						z = w;
						y = p
					}
				}
			}
		}
		var v = e(z, A);
		var s = y;
		if (v.length == 0) {
			if (s.length == 0) {
				return null
			} else {
				E.pid = 0;
				E.data = s
			}
		} else {
			var t = v[0];
			for (var G in z) {
				var B = z[G];
				if (B.taskLogic.number != t.taskLogic.number) {
					s = m(s, B)
				}
			}
			var x = k(s, t);
			E.pid = x.pid;
			E.data = x.data
		}
		return E
	}
	function k(p, q) {
		var s = [];
		var w = false;
		var u = 0;
		var r = q.taskLogic.number;
		var t = 0;
		for (; t < p.length; t++) {
			var v = p[t];
			if (v.taskLogic.number >= r) {
				s.push(q);
				s = s.concat(p.slice(t));
				w = true;
				u = t;
				break
			} else {
				s.push(v)
			}
		}
		if (!w) {
			s.push(q)
		}
		var o = {};
		o.pid = t;
		o.data = s;
		return o
	}
	function m(s, p) {
		var o = false;
		for (var r = 0; r < s.length; r++) {
			if (s[r].taskLogic.number >= p.taskLogic.number) {
				for (var q = s.length; q > r; q--) {
					s[q] = s[q - 1]
				}
				s[r] = p;
				o = true;
				break
			}
		}
		if (!o) {
			s.push(p)
		}
		return s
	}
	function g(q, r) {
		var s = [];
		if (q == null || q.length == 0) {
			return s
		}
		for (var p in q) {
			var o = q[p];
			if (i(o.customConfig.taskCustProductProperty, r)) {
				s.push(o)
			}
		}
		return s
	}
	function e(p, q) {
		var r = [];
		var o = j(p, q);
		if (o == null) {
			return r
		}
		r.push(o);
		return r
	}
	function b(q, t, s, w) {
		var u = [];
		if (w == null || w.length == 0) {
			return u
		}
		for (var v in w) {
			var r = w[v];
			var x = r.ad;
			var p = r.taskLogic;
			var o = {};
			o.uid = "" + s;
			o.openUrl = x.openCountUrl + "&rnd=" + ((new Date()).valueOf());
			if (x.promResType == 4) {
				o.type = 2
			} else {
				if (x.flashTag == 1) {
					o.type = 1
				} else {
					o.type = 0
				}
			}
			o.flag = x.flag;
			o.bgColor = x.bgColor;
			o.bgCnt = x.promPicUrl;
			o.bgSrc = x.bgPicUrl;
			if (x.ursTag == 0) {
				o.needUrs = false
			} else {
				o.needUrs = true
			}
			if (x.clickCountTag == 0) {
				o.bInitLink = true;
				o.bgLink = x.promPicClickUrl
			} else {
				o.bInitLink = false;
				o.bgLink = x.promPicClickCountUrl
			}
			if (x.showCountTag == 0) {
				o.bInitShowLink = true;
				o.showLink = x.thirdpartyShowCountUrl
			} else {
				o.bInitShowLink = false;
				o.showLink = x.openCountUrl
			}
			if (x.bgMusicTag == 1 && x.taskMusic != null) {
				o.musicLink = x.taskMusic.musicUrl
			}
			if (x.flashTag == 1 && x.taskFlash != null) {
				o.video = x.taskFlash.flashUrl;
				o.videoWd = x.taskFlash.width;
				o.videoHt = x.taskFlash.height;
				o.videoTop = x.taskFlash.positionY;
				o.videoLeft = x.taskFlash.positionX
			}
			if (x.promResType == 4) {
				o.iframeUrl = x.iframeUrl
			}
			o.name = x.name;
			u.push(o)
		}
		return u
	}
	function j(w, C) {
		if (w.length == 1) {
			return w[0]
		}
		var o = [];
		var B = [];
		var q = [];
		var s = [];
		var v = [];
		var A = 100;
		for (var z in w) {
			var p = w[z];
			if (p.taskLogic.priority == d.Priority.LOWEST) {
				v.push(p);
				continue
			}
			if (p.taskLogic.priority == d.Priority.NONE) {
				if (!h(p.customConfig.taskCustProductProperty)) {
					q.push(p);
					continue
				} else {
					if (p.taskLogic.flowLimitType == d.FlowLimitType.TOTAL_EFFECT_LIMIT || p.taskLogic.flowLimitType == d.FlowLimitType.TOTAL_AMOUNT_LIMIT) {
						s.push(p);
						continue
					}
					if (p.taskLogic.pvLimit != 0 || p.taskLogic.uvLimit != 0) {
						s.push(p);
						continue
					}
				}
				B.push(p);
				continue
			}
			if (h(p.customConfig.taskCustProductProperty)) {
				if (p.taskLogic.flowLimitType == d.FlowLimitType.TOTAL_EFFECT_LIMIT || p.taskLogic.flowLimitType == d.FlowLimitType.TOTAL_AMOUNT_LIMIT) {
					if (o.length > 0) {
						o.push(p);
						continue
					} else {
						return p
					}
				}
				if (p.taskLogic.pvLimit != 0 || p.taskLogic.uvLimit != 0) {
					if (o.length > 0) {
						o.push(p);
						continue
					} else {
						return p
					}
				}
				if (p.taskLogic.idleFlowPercent > 0) {
					o.push(p);
					continue
				}
				if (o.length > 0) {
					o.push(p);
					continue
				} else {
					var u = Math.max(p.taskLogic.totalFlowPercent, p.taskLogic.idleFlowPercent);
					if (u > 0) {
						if (A <= u) {
							return p
						}
						if (Math.floor(Math.random() * A) < u) {
							return p
						} else {
							A -= u
						}
					}
				}
			} else {
				if (i(p.customConfig.taskCustProductProperty, C)) {
					return p
				}
			}
		}
		if (o.length != 0) {
			for (var z in o) {
				var y = o[z];
				if (y.taskLogic.pvLimit != 0 || y.taskLogic.uvLimit != 0) {
					return y
				}
				var u = Math.max(y.taskLogic.idleFlowPercent, y.taskLogic.totalFlowPercent);
				if (A <= u) {
					return y
				}
				if (Math.floor(Math.random() * A) < u) {
					return y
				} else {
					A -= u
				}
			}
		}
		if (q.length > 0) {
			var t = f(q, s, C);
			if (t != null) {
				return t
			} else {
				B = B.concat(s)
			}
		} else {
			B = B.concat(s)
		}
		if (B.length > 0) {
			var x = a(A, B);
			if (x != null) {
				return x
			}
		}
		var r = v.length;
		if (r == 0) {
			return null
		} else {
			if (r == 1) {
				return v[0]
			} else {
				return v[Math.floor(Math.random() * r)]
			}
		}
		return null
	}
	function f(t, r, v) {
		if (t.length == 0) {
			return null
		}
		var u = false;
		var s = [];
		for (var q in t) {
			var p = t[q];
			if (!h(p.customConfig.taskCustProductProperty)) {
				if (i(p.customConfig.taskCustProductProperty, v)) {
					u = true;
					s.push(p)
				}
			}
		}
		if (u) {
			s = s.concat(r);
			var o = s.length;
			if (o == 1) {
				return s[0]
			}
			if (o > 1) {
				return s[Math.floor(Math.random() * o)]
			}
		} else {}
		return null
	}
	function a(x, u) {
		if (u.length == 0) {
			return null
		}
		var s = [];
		var r = [];
		var t = u.length;
		var q = x / t;
		for (var w in u) {
			var p = u[w];
			if (p.taskLogic.flowLimitType == d.FlowLimitType.TOTAL_EFFECT_LIMIT || p.taskLogic.flowLimitType == d.FlowLimitType.TOTAL_AMOUNT_LIMIT) {
				r.push(p);
				continue
			}
			if (p.taskLogic.totalFlowPercent == 0 && p.taskLogic.idleFlowPercent == 0) {
				r.push(p);
				continue
			}
			if (Math.max(p.taskLogic.totalFlowPercent, p.taskLogic.idleFlowPercent) > q) {
				r.push(p);
				continue
			}
			s.push(p)
		}
		if (s.length != 0) {
			for (var w in s) {
				var o = s[w];
				var v = Math.max(o.taskLogic.totalFlowPercent, o.taskLogic.idleFlowPercent);
				if (v > 0) {
					if (x <= v) {
						return o
					}
					if (Math.floor(Math.random() * x) < v) {
						return o
					} else {
						x -= v
					}
				}
			}
			return a(x, r)
		} else {
			return r[Math.floor(Math.random() * r.length)]
		}
	}
	function i(p, z) {
		if (p.mailRegTime != d.MailRegTime.IGNORE && p.mailRegTime != z.mailRegTime) {
			return false
		}
		if (p.mailLiveness != d.MailLiveness.IGNORE && p.mailLiveness != z.mailLiveness) {
			return false
		}
		if (p.usedProdIds != "") {
			var M = p.usedProdIds.split(",");
			for (var I = 0; I < M.length; ++I) {
				if (z.usedProdIds.indexOf(M[I]) == -1) {
					return false
				}
			}
		}
		if (p.unusedProdIds != "") {
			var M = p.unusedProdIds.split(",");
			for (var I = 0; I < M.length; ++I) {
				if (z.unusedProdIds.indexOf(M[I]) == -1) {
					return false
				}
			}
		}
		if (p.wapType != -1) {
			if ((z.wapUserType & p.wapType) == 0) {
				return false
			}
		}
		if (p.nobleMetal1 != 0) {
			if ((p.nobleMetal1 & z.nobleMetal) == 0) {
				return false
			}
		}
		if (p.browserType != d.BrowserType.IGNORE && p.browserType != z.browserType) {
			return false
		}
		if (p.interest1 != 0 || p.interest2 != 0 || p.interest3 != 0) {
			var t = false;
			if (p.interest1 != 0 && ((p.interest1 & z.interest1) != 0)) {
				t = true
			}
			if (p.interest2 != 0 && ((p.interest2 & z.interest2) != 0)) {
				t = true
			}
			if (p.interest3 != 0 && ((p.interest3 & z.interest3) != 0)) {
				t = true
			}
			if (!t) {
				return false
			}
		}
		if (p.lotteryType != "") {
			if (p.lotteryType.indexOf(z.lotteryType + "") == -1) {
				return false
			}
		}
		if (p.game1 != 0) {
			var K = false;
			if ((p.game1 & z.games) != 0) {
				K = true
			}
			if (!K) {
				return false
			}
		}
		var y = false;
		if (p.bobo1 != 0) {
			if ((p.bobo1 & z.bobos) != 0) {
				y = true
			}
		}
		if (!y) {
			if (p.boboSelf > 0 && (p.boboSelf != z.boboSelf)) {
				y = false
			} else {
				y = true
			}
		}
		if (p.bobo1 != 0 || p.boboSelf > 0) {
			if (!y) {
				return false
			}
		}
		if (p.cc1 != 0) {
			var A = p.cc1 & z.cc;
			if (p.cc1 == (1 << 26) - 1) {
				if ((A >> 2) % 2 != 1 || A == 4) {
					return false
				}
			} else {
				if (A == 0) {
					return false
				}
			}
		}
		if (p.sex != "") {
			if (p.sex.indexOf(z.sex + "") == -1) {
				return false
			}
		}
		if (p.gameQnyh21 != 0) {
			var H = false;

			if ((p.gameQnyh21 & z.gameQnyh2s) != 0) {
				H = true
			}
			if (!H) {
				return false
			}
		}
		if (p.gameWync1 != 0) {
			var r = false;
			if ((p.gameWync1 & z.gameWyncs) != 0) {
				r = true
			}
			if (!r) {
				return false
			}
		}
		if (p.gameWh1 != 0) {
			var C = false;
			if ((p.gameWh1 & z.gameWhs) != 0) {
				C = true
			}
			if (!C) {
				return false
			}
		}
		if (p.gameDtws21 != 0) {
			var o = false;
			if ((p.gameDtws21 & z.gameDtws2s) != 0) {
				o = true
			}
			if (!o) {
				return false
			}
		}
		if (p.gameTx31 != 0 || p.gameTxhd1 != 0) {
			var t = false;
			if (p.gameTx31 != 0 && ((p.gameTx31 & z.gameTx3s) != 0)) {
				t = true
			}
			if (p.gameTxhd1 != 0 && ((p.gameTxhd1 & z.gameTxhds) != 0)) {
				t = true
			}
			if (!t) {
				return false
			}
		}
		if (p.gameYxsg1 != 0) {
			var B = false;
			if ((p.gameYxsg1 & z.gameYxsgs) != 0) {
				B = true
			}
			if (!B) {
				return false
			}
		}
		if (p.consumeLevel != "") {
			var D = "," + p.consumeLevel + ",";
			if (D.indexOf("," + z.consumeLevel + ",") == -1) {
				return false
			}
		}
		if (p.gameXdhxy21 != 0) {
			var J = false;
			if ((p.gameXdhxy21 & z.gameXdhxy2s) != 0) {
				J = true
			}
			if (!J) {
				return false
			}
		}
		if (p.gameDhwzxp1 != 0) {
			var s = false;
			if ((p.gameDhwzxp1 & z.gameDhwzxps) != 0) {
				s = true
			}
			if (!s) {
				return false
			}
		}
		if (p.gameZgmh1 != 0) {
			var L = false;
			if ((p.gameZgmh1 & z.gameZgmhs) != 0) {
				L = true
			}
			if (!L) {
				return false
			}
		}
		if (p.gameDhxy3Free1 != 0) {
			var N = false;
			if ((p.gameDhxy3Free1 & z.gameDhxy3Frees) != 0) {
				N = true
			}
			if (!N) {
				return false
			}
		}
		if (p.gameMhxy1 != 0) {
			var F = false;
			if ((p.gameMhxy1 & z.gameMhxys) != 0) {
				F = true
			}
			if (!F) {
				return false
			}
		}
		if (p.gameDhxy3Clsc1 != 0) {
			var E = false;
			if ((p.gameDhxy3Clsc1 & z.gameDhxy3Clscs) != 0) {
				E = true
			}
			if (!E) {
				return false
			}
		}
		if (p.gameYzr1 != 0) {
			var w = false;
			if ((p.gameYzr1 & z.gameYzrs) != 0) {
				w = true
			}
			if (!w) {
				return false
			}
		}
		if (p.gameLdxy1 != 0) {
			if ((p.gameLdxy1 & z.gameLdxys) == 0) {
				return false
			}
		}
		if (p.gameTfqst1 != 0) {
			if ((p.gameTfqst1 & z.gameTfqsts) == 0) {
				return false
			}
		}
		if (p.gameXysmj1 != 0) {
			if ((p.gameXysmj1 & z.gameXysmjs) == 0) {
				return false
			}
		}
		if (p.gameKdzlj1 != 0) {
			if ((p.gameKdzlj1 & z.gameKdzljs) == 0) {
				return false
			}
		}
		if (p.gameLmtjl1 != 0) {
			if ((p.gameLmtjl1 & z.gameLmtjls) == 0) {
				return false
			}
		}
		if (p.gameQnyhl1 != 0) {
			if ((p.gameQnyhl1 & z.gameQnyhls) == 0) {
				return false
			}
		}
		if (p.gameSsqq1 != 0) {
			if ((p.gameSsqq1 & z.gameSsqqs) == 0) {
				return false
			}
		}
		if (p.gameTfmz1 != 0) {
			if ((p.gameTfmz1 & z.gameTfmzs) == 0) {
				return false
			}
		}
		if (p.gameZmq1 != 0) {
			if ((p.gameZmq1 & z.gameZmqs) == 0) {
				return false
			}
		}
		if (p.gameMtj1 != 0) {
			if ((p.gameMtj1 & z.gameMtjs) == 0) {
				return false
			}
		}
		if (p.gameXsd1 != 0) {
			if ((p.gameXsd1 & z.gameXsds) == 0) {
				return false
			}
		}
		if (p.gameWj20151 != 0) {
			if ((p.gameWj20151 & z.gameWj2015s) == 0) {
				return false
			}
		}
		if (p.industry != "") {
			var u = "," + p.industry + ",";
			if (u.indexOf("," + z.industry + ",") == -1) {
				if (p.loginCompany1 != 0) {
					var q = false;
					if ((p.loginCompany1 & z.loginCompany) != 0) {
						q = true
					}
					if (!q) {
						return false
					}
				} else {
					return false
				}
			}
		}
		if (p.career != "") {
			var G = "," + p.career + ",";
			if (G.indexOf("," + z.career + ",") == -1) {
				return false
			}
		}
		if (p.emailUsage1 != 0) {
			var v = false;
			if ((p.emailUsage1 & z.emailUsages) != 0) {
				v = true
			}
			if (!v) {
				return false
			}
		}
		if (p.gameFootball1 != 0) {
			var x = false;
			if ((p.gameFootball1 & z.gameFootball) != 0) {
				x = true
			}
			if (!x) {
				return false
			}
		}
		if (p.haitao1 != 0) {
			var x = false;
			if ((p.haitao1 & z.haitao) != 0) {
				x = true
			}
			if (!x) {
				return false
			}
		}
		if (p.yydb1 != 0) {
			var x = false;
			if ((p.yydb1 & z.yydb) != 0) {
				x = true
			}
			if (!x) {
				return false
			}
		}
		if (p.yq1 != 0) {
			var x = false;
			if ((p.yq1 & z.yq) != 0) {
				x = true
			}
			if (!x) {
				return false
			}
		}
		return true
	}
})();