/*
 * Ext JS Library 2.1
 * Copyright(c) 2006-2008, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://extjs.com/license
 */

/**
 * List compiled by mystix on the extjs.com forums.
 * Thank you Mystix!
 */

/**
 * Vietnamese translation
 * By bpmtri
 * 12-April-2007 04:06PM
 */

Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">Dang ti...</div>';

if(Ext.View){
   Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
   Ext.grid.Grid.prototype.ddText = "{0} dòng dc chn";
}

if(Ext.TabPanelItem){
   Ext.TabPanelItem.prototype.closeText = "Dóng th này";
}

if(Ext.form.Field){
   Ext.form.Field.prototype.invalidText = "Giá tr ca ^o này kh^ong hp l.";
}

if(Ext.LoadMask){
    Ext.LoadMask.prototype.msg = "Dang ti...";
}

Date.monthNames = [
   "Tháng 1",
   "Tháng 2",
   "Tháng 3",
   "Tháng 4",
   "Tháng 5",
   "Tháng 6",
   "Tháng 7",
   "Tháng 8",
   "Tháng 9",
   "Tháng 10",
   "Tháng 11",
   "Tháng 12"
];

Date.dayNames = [
   "Ch nht",
   "Th hai",
   "Th ba",
   "Th t",
   "Th nam",
   "Th sáu",
   "Th by"
];

if(Ext.MessageBox){
   Ext.MessageBox.buttonText = {
      ok     : "Dng 'y",
      cancel : "Hy b",
      yes    : "Có",
      no     : "Kh^ong"
   };
}

if(Ext.util.Format){
   Ext.util.Format.date = function(v, format){
      if(!v) return "";
      if(!(v instanceof Date)) v = new Date(Date.parse(v));
      return v.dateFormat(format || "d/m/Y");
   };
}

if(Ext.DatePicker){
   Ext.apply(Ext.DatePicker.prototype, {
      todayText         : "H^om nay",
      minText           : "Ngày này nh hn ngày nh nht",
      maxText           : "Ngày này ln hn ngày ln nht",
      disabledDaysText  : "",
      disabledDatesText : "",
      monthNames	: Date.monthNames,
      dayNames		: Date.dayNames,
      nextText          : 'Tháng sau (Control+Right)',
      prevText          : 'Tháng trc (Control+Left)',
      monthYearText     : 'Chn mt tháng (Control+Up/Down d thay di nam)',
      todayTip          : "{0} (Spacebar - Phím trng)",
      format            : "d/m/y"
   });
}

if(Ext.PagingToolbar){
   Ext.apply(Ext.PagingToolbar.prototype, {
      beforePageText : "Trang",
      afterPageText  : "of {0}",
      firstText      : "Trang du",
      prevText       : "Trang trc",
      nextText       : "Trang sau",
      lastText       : "Trang cui",
      refreshText    : "Ti li",
      displayMsg     : "Hin th {0} - {1} ca {2}",
      emptyMsg       : 'Kh^ong có d liu d hin th'
   });
}

if(Ext.form.TextField){
   Ext.apply(Ext.form.TextField.prototype, {
      minLengthText : "Chiu dài ti thiu ca ^o này là {0}",
      maxLengthText : "Chiu dài ti da ca ^o này là {0}",
      blankText     : "^O này cn phi nhp giá tr",
      regexText     : "",
      emptyText     : null
   });
}

if(Ext.form.NumberField){
   Ext.apply(Ext.form.NumberField.prototype, {
      minText : "Giá tr nh nht ca ^o này là {0}",
      maxText : "Giá tr ln nht ca ^o này là  {0}",
      nanText : "{0} h^ong phi là mt s hp l"
   });
}

if(Ext.form.DateField){
   Ext.apply(Ext.form.DateField.prototype, {
      disabledDaysText  : "V^o hiu",
      disabledDatesText : "V^o hiu",
      minText           : "Ngày nhp trong ^o này phi sau ngày {0}",
      maxText           : "Ngày nhp trong ^o này phi trc ngày {0}",
      invalidText       : "{0} kh^ong phi là mt ngày hp l - phi có dng {1}",
      format            : "d/m/y"
   });
}

if(Ext.form.ComboBox){
   Ext.apply(Ext.form.ComboBox.prototype, {
      loadingText       : "Dang ti...",
      valueNotFoundText : undefined
   });
}

if(Ext.form.VTypes){
   Ext.apply(Ext.form.VTypes, {
      emailText    : 'Giá tr ca ^o này phi là mt da ch email có dng nh "ten@abc.com"',
      urlText      : 'Giá tr ca ^o này phi là mt da ch web(URL) hp l, có dng nh "http:/'+'/www.domain.com"',
      alphaText    : '^O này ch dc nhp các kí t và gch di(_)',
      alphanumText : '^O này ch dc nhp các kí t, s và gch di(_)'
   });
}

if(Ext.grid.GridView){
   Ext.apply(Ext.grid.GridView.prototype, {
      sortAscText  : "Tang dn",
      sortDescText : "Gim dn",
      lockText     : "Khóa ct",
      unlockText   : "B khóa ct",
      columnsText  : "Các ct"
   });
}

if(Ext.grid.PropertyColumnModel){
   Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
      nameText   : "Tên",
      valueText  : "Giá tr",
      dateFormat : "j/m/Y"
   });
}

if(Ext.layout.BorderLayout.SplitRegion){
   Ext.apply(Ext.layout.BorderLayout.SplitRegion.prototype, {
      splitTip            : "Kéo gi chut d thay di kích thc.",
      collapsibleSplitTip : "Kéo gi chut d thay di kích thc. Nhp dúp d n di."
   });
}
