$.extend($.validator, {
	messages: {
		required: "必选字段",
		remote: "请修正该字段",
		email: "请输入正确格式的电子邮件",
		url: "请输入正确的网址",
		date: "请输入正确的日期",
		dateISO: "请输入正确的日期 (ISO).",
		number: "请输入正确的数字",
		digits: "只能输入整数",
		creditcard: "请输入正确的信用卡号",
		equalTo: "请再次输入相同的值",
		accept: "请输入拥有正确后缀名的字符串",
		maxlength: $.format("请输入一个长度最多是 {0} 的字符串"),
		minlength: $.format("请输入一个长度最少是 {0} 的字符串"),
		rangelength: $.format("请输入一个长度介于 {0} 和 {1} 之间的字符串"),
		range: $.format("请输入一个介于 {0} 和 {1} 之间的值"),
		max: $.format("请输入一个最大为 {0} 的值"),
		min: $.format("请输入一个最小为 {0} 的值")
	}
});