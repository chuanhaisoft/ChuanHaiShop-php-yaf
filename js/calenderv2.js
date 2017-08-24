var calenderV2 = function(e, options) {
    options = options || {};

    this.abroad = options.abroad || false;
    this.cityName = options.cityName || '目的地';
    this.timeZone = options.timeZone || '+08:00';
    this.optionToday = options.today;

    this.classWeek   = options.classWeek || 'calendar-week';
    this.classTitle   = options.classTitle || 'calendar-title';
    this.classMonth   = options.classMonth || 'calendar-month';
    this.classDay   = options.classDay || 'calendar-day';
    this.classDayBase   = options.classDayBase || 'line2';
    this.classDaySelect = options.classDaySelect || 'cal_select';
    this.classDayPass = options.classDayPass || 'old';
    this.checkedday = options.checkedday || 'checkedday';
    this.class   = options.class || '';
    this.class   = options.class || '';
    this.prependHtml   = options.prependHtml || '';
    this.today   = options.today || this.getDate();

    this.fillDayInfo = options.fillDayInfo || null;
    this.getDayInfo  = options.getDayInfo || null;

    this.checkState = 0;
    this.doColor = false;

    this.checkIn      = options.checkIn || null;
    this.checkOut     = options.checkOut || null;
    this.checkDayChange = options.checkDayChange || function(){};
    this.dateArray      = [];
    this.monthArray     = [];
    this.calenderHTML   = '';
    this.totalMohth     = 6;
    this.firstGray = false;
    this.markAsGray = false;

    if(this.abroad && this.checkIn && this.getYmd(this.checkIn) < this.getYmd(this.today)){
        this.checkIn = this.today;
        this.checkDayChange();
        if(this.getYmd(this.checkIn) == this.getYmd(this.checkOut)){
            this.checkIn      = null;
            this.checkOut     = null;
        }
    }

    this.e = typeof(e) == 'object' ? e : $(e);

    this.init();

    return(this);
}
calenderV2.prototype.init = function() {
    this.setDay = this.getDate();
    this.today   = this.optionToday || this.getDate();
    this.dateArray      = [];
    this.monthArray     = [];
    this.calenderHTML   = '';
    this.checkState = 0;
    this.gengerateCalArray().gengerateCalHtml().fillCalender();
    this.bindEvent();
    return(this);
}
calenderV2.prototype.setYmd = function(y,m,d, isDisplay) {
    var cdate = this.getDate();
    m = isDisplay ? m - 1 : m;
    cdate.setDate(1);
    cdate.setMonth(m);
    cdate.setFullYear(y);
    cdate.setDate(d);
    return cdate;
}
calenderV2.prototype.getYmd = function(s) {
    //return s.getFullYear() + '-' + (s.getMonth() + 1) + '-' + s.getDate();// + '  ' + s.getDay();
    return s.getFullYear() + '-' + numToStr(2,s.getMonth() + 1) + '-' + numToStr(2,s.getDate());// + '  ' + s.getDay();
}

calenderV2.prototype.gengerateCalArray = function() {
    //this.dateArray = [];
    for (var i = 0; i <= this.totalMohth; i++) {
        var toMonth = this.setDay.getMonth();
        for (var j = 1; j <= 37; j++) {
            this.setDay.setDate(j);
            if (this.setDay.getMonth() != toMonth){
                break;
            }
            this.dateArray.push({y:this.setDay.getFullYear(),m:this.setDay.getMonth(),d:this.setDay.getDate(),w:this.setDay.getDay()});
        };
    };
    this.firstDate = this.dateArray[0];
    this.lastDate  = this.dateArray[this.dateArray.length -1];
    return(this);
}

calenderV2.prototype.gengerateCalHtml = function() {
    this.calenderHTML = '';
    this.monthArray = [];
    var m = -1;
    var len = this.dateArray.length - 1;
    for (var i = 0; i <= len; i++) {
        var day = this.dateArray[i];
        var cc = this.setYmd(day.y,day.m,day.d,false);
        if (m == -1) m = day.m;
        if (m != day.m) {
            this.calenderHTML += this.genMonth();
            this.monthArray = [];
            m = day.m;
        }
        this.monthArray.push(day);
    };
    return(this);
}

calenderV2.prototype.genDate = function(day) {
    var writeDay = this.setYmd(day.y,day.m,day.d,false);
    var old = '';
    var checkDay = '';
    var isToday = this.getYmd(writeDay) == this.getYmd(this.today) ? 1 : 0;
    var dayText = isToday && !this.abroad ? '今天' : day.d;
    if (writeDay < this.today) old = this.classDayPass;
    if (    (this.checkIn && writeDay <= this.checkOut && writeDay > this.checkIn) || 
            (this.checkOut && this.getYmd(writeDay) == this.getYmd(this.checkOut))  
        ) {
        checkDay = this.classDaySelect + ' ' + this.checkedday;
    } 
    if (this.checkIn && this.getYmd(writeDay) == this.getYmd(this.checkIn)) dayText = '入住';
    if (this.checkOut && this.getYmd(writeDay) == this.getYmd(this.checkOut)) dayText = '离开';

    var li_classes = [this.classDayBase, old, checkDay];
    var li_html =  '<li class="'+ li_classes.join(' ') +'" d="'+day.d+'" m="'+day.m+'" y="'+day.y+'" w="'+day.w+'" today="'+isToday+'" ymd="'+this.getYmd(writeDay)+'" ><span>'+ dayText +'</span></li>';
    var new_html = '';
    if ( this.fillDayInfo) new_html = this.fillDayInfo(li_html);
    return new_html == '' ? li_html : new_html;
}

calenderV2.prototype.genMonth = function() {
   var dayHtml = '';
    var len = this.monthArray.length - 1;
    for (var i = 0; i <= len ; i++) {
        var day = this.monthArray[i];
        if (i==0) dayHtml+=this.genEmptyDay(day.w);
        var dayHtml = dayHtml + this.genDate(day);
    };
    dayHtml+=this.genEmptyDay(6 - day.w);
    var preHtml = 
    '<div class="'+this.classMonth+'">'+
        '<div class="'+this.classTitle+'">'+
            '<h2 cury="'+day.y+'" curm="'+(day.m + 1)+'">'+day.y+'年'+(day.m + 1)+'月</h2>'+
        '</div>'+
        '<ul class="'+this.classWeek+'">'+
            '<li>日</li>' +
            '<li>一</li>' +
            '<li>二</li>' +
            '<li>三</li>' +
            '<li>四</li>' +
            '<li>五</li>' +
            '<li>六</li>' +
        '</ul>';
    var afterHtml = '</div>';
    return preHtml + '<ul class="'+this.classDay+'">'+dayHtml+'</ul>' + afterHtml;
}

calenderV2.prototype.genEmptyDay = function(num) {
    var emptyday = '';
    for (var i = 1; i<= num; i++) {
        emptyday+='<li class="'+this.classDayPass+' '+this.classDayBase+'"></li>';
    }
    return emptyday;
}

calenderV2.prototype.fillCalender = function() {
    this.e.html(this.prependHtml + this.calenderHTML);
    return(this);
}
calenderV2.prototype.clearSelect = function() {
    var _this = this;
    this.e.find('.' + _this.checkedday + ',' + '.' + this.classDaySelect).each(function(){
        //$(this).find('span').html($(this).attr('d'));
        if ($(this).attr('today') == '1' && !_this.abroad) {
            $(this).find('span').html('今天');
        } else {
            $(this).find('span').html($(this).attr('d'));
        }
        if (_this.fillDayInfo) _this.fillDayInfo($(this));
    })
    .removeClass(_this.checkedday);
    this.e.find('.' + this.classDaySelect).removeClass(this.classDaySelect);
    this.checkOut = null;
    this.checkIn  = null;
    this.firstGray = false;
    this.markAsGray = false;
    return(this);
}

calenderV2.prototype.bindEvent = function() {
    var _this = this;

    this.e.find('.' + this.classDayBase).on(EVENT_TAP, function(){
        if ($(this).hasClass(_this.classDayPass)) return false;
        if ($(this).hasClass('cal_noRoom')) return false;
        var thisday = $(this).find('span');
        var me = $(this);
        if (me.hasClass(_this.checkedday)) {
            _this.clearSelect();

            if (_this.checkIn && !_this.checkOut) {
            } else {
            _this.refreshCheckState();
            return false;
            }
        }
        if (!_this.checkIn && !_this.checkOut) {
            $('.' + _this.checkedday).removeClass(_this.checkedday);
            $(this).addClass(_this.checkedday);
        } else if (_this.checkIn && !_this.checkOut) {
            $(this).addClass(_this.checkedday);
        } else if (_this.checkIn && _this.checkOut) {
            _this.clearSelect();
            $(this).addClass(_this.checkedday);
        } else if (!_this.checkIn && _this.checkOut) {
            alert('出错了,请刷新页面');
        }
        $(this).toggleClass(_this.classDaySelect);
        _this.refreshCheckState();
    })
    return(this);
}
calenderV2.prototype.refreshCheckState = function() {
    _this = this;
    var checkedday = this.e.find('.' + _this.checkedday);
    var checkFirst = checkedday.first();
    var checkLast = checkedday.last();
    
    checkLast.find('span').html('离开');
    checkFirst.find('span').html('入住');
    if (_this.fillDayInfo) {
        this.fillDayInfo(checkLast);
        this.fillDayInfo(checkFirst);
    }

    var leaveday = checkLast.attr('ymd');
    var enterday = checkFirst.attr('ymd');
    this.doColor = leaveday == enterday ? false : true;

    doColorState = false;

    if (checkFirst.length) {
        this.checkIn = this.setYmd(checkFirst.attr('y'),checkFirst.attr('m'),checkFirst.attr('d'));
    }
    if(leaveday != enterday) {
        this.checkOut = this.setYmd(checkLast.attr('y'),checkLast.attr('m'),checkLast.attr('d'));
    }
    this.e.find('.' + this.classDayBase).not('.old').each(function(){
        var liYmd = $(this).attr('ymd');
        liYmd = liYmd.replace(/-/g, "/");
        if (_this.doColor) {
            if ($(this).hasClass(_this.classDaySelect)) doColorState = !doColorState;
            if (doColorState){
                $(this).addClass(_this.classDaySelect);
                $(this).addClass(_this.checkedday);
                if (_this.getDayInfo) _this.getDayInfo($(this));
            } 
        }
        if (_this.fillDayInfo) _this.fillDayInfo($(this));
    })
    this.checkDayChange();
    return(this);
}
calenderV2.prototype.getDate = function(ymd){
    var d = new Date();
    if(ymd){
        d = new Date(ymd);
    }
    if(this.timeZone){
        var timeZone = this.timeZone.split(':')[0];
        var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
        d   = new Date(utc + (3600000*timeZone));
    }
    return d;
}
