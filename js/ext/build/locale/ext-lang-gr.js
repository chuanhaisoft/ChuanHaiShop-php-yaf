/**
 * Greek (Old Version) Translations by Vagelis
 * 03-June-2007
 */

Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">"Oü~n^oùóc...</div>';

if(Ext.View){
   Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
   Ext.grid.Grid.prototype.ddText = "{0} adé"ea~aì'Yíc(aò) ~a~náììTh('Yò)";
}

if(Ext.TabPanelItem){
   Ext.TabPanelItem.prototype.closeText = "^E"eassó^oa á~o^oTh ^ocí êá~n^o'Y"eá";
}

if(Ext.form.Field){
   Ext.form.Field.prototype.invalidText = "C ^oéìTh ó^o"i da"ass"i "aaí assíáé 'Y~aê~o~nc";
}

if(Ext.LoadMask){
    Ext.LoadMask.prototype.msg = ""Oü~n^oùóc...";
}

Date.monthNames = [
   "'Eáí"i~o"U~né"iò",
   ""Oa^a~n"i~o"U~né"iò",
   "`I"U~n^oé"iò",
   "'Ad~nss"eé"iò",
   "`I"Ué"iò",
   "'E"i'yíé"iò",
   "'E"i'y"eé"iò",
   "'A'y~a"i~oó^o"iò",
   "'Oad^o'Yì^a~né"iò",
   ""Iê^oth^a~né"iò",
   "'I"i'Yì^a~né"iò",
   ""Aaê'Yì^a~né"iò"
];

Date.dayNames = [
   "^E~o~néáêTh",
   ""Aa~o^o'Y~ná",
   "^O~nss^oc",
   "^Oa^o"U~n^oc",
   "D'Yìd^oc",
   "Dá~náóêa~oTh",
   "'O"U^a^aá^o"i"
];

if(Ext.MessageBox){
   Ext.MessageBox.buttonText = {
      ok     : "Aí^o"U^iaé",
      cancel : "'Aê'y~nùóc",
      yes    : "'Iáé",
      no     : " 1/4 ÷é"
   };
}

if(Ext.util.Format){
   Ext.util.Format.date = function(v, format){
      if(!v) return "";
      if(!(v instanceof Date)) v = new Date(Date.parse(v));
      return v.dateFormat(format || "ì/c/A");
   };
}

if(Ext.DatePicker){
   Ext.apply(Ext.DatePicker.prototype, {
      todayText         : "'OThìa~ná",
      minText           : "C cìa~n"iìcíssá á~o^oTh assíáé d~néí ^ocí ìéê~nü^oa~nc cìa~n"iìcíssá",
      maxText           : "C cìa~n"iìcíssá á~o^oTh assíáé ìa^o"U ^ocí ìa~aá"e'y^oa~nc cìa~n"iìcíssá",
      disabledDaysText  : "",
      disabledDatesText : "",
      monthNames	: Date.monthNames,
      dayNames		: Date.dayNames,
      nextText          : 'Adüìaí"iò `IThíáò (Control+Right)',
      prevText          : 'D~n"ic~a"i'yìaí"iò `IThíáò (Control+Left)',
      monthYearText     : 'Adé"e'Y^i^oa `IThíá (Control+Up/Down ~aéá ìa^oáêssícóc ó^oá 'Y^oc)',
      todayTip          : "{0} (Spacebar)",
      format            : "ì/c/A"
   });
}

if(Ext.PagingToolbar){
   Ext.apply(Ext.PagingToolbar.prototype, {
      beforePageText : "'Oa"ess"aá",
      afterPageText  : "ádü {0}",
      firstText      : "D~nth^oc óa"ess"aá",
      prevText       : "D~n"ic~a"i'yìaíc óa"ess"aá",
      nextText       : "Adüìaíc óa"ess"aá",
      lastText       : "^Oa"ea~o^oássá óa"ess"aá",
      refreshText    : "'Aíáí'Yùóc",
      displayMsg     : "Aì"o"Uíéóc {0} - {1} ádü {2}",
      emptyMsg       : '"Aaí ^a~n'Yècêáí a~a~a~ná"o'Yò ~aéá aì"o"Uíéóc'
   });
}

if(Ext.form.TextField){
   Ext.apply(Ext.form.TextField.prototype, {
      minLengthText : "^O"i a"e"U÷éó^o"i ì'Y~aaè"iò ~aéá á~o^oü ^o"i da"ass"i assíáé {0}",
      maxLengthText : "^O"i ì'Y~aéó^o"i ì'Y~aaè"iò ~aéá á~o^oü ^o"i da"ass"i assíáé {0}",
      blankText     : "^O"i da"ass"i á~o^oü assíáé ~od"i÷~naù^o"iêü",
      regexText     : "",
      emptyText     : null
   });
}

if(Ext.form.NumberField){
   Ext.apply(Ext.form.NumberField.prototype, {
      minText : "C a"e"U÷éó^oc ^oéìTh ~aéá á~o^oü ^o"i da"ass"i assíáé {0}",
      maxText : "C ì'Y~aéó^oc ^oéìTh ~aéá á~o^oü ^o"i da"ass"i assíáé {0}",
      nanText : "{0} "aaí assíáé 'Y~aê~o~n"iò á~néèìüò"
   });
}

if(Ext.form.DateField){
   Ext.apply(Ext.form.DateField.prototype, {
      disabledDaysText  : "'Adaía~n~a"id"iécì'Yí"i",
      disabledDatesText : "'Adaía~n~a"id"iécì'Yí"i",
      minText           : "C cìa~n"iìcíssá ó' á~o^oü ^o"i da"ass"i d~n'Ydaé íá assíáé ìa^o"U ádü {0}",
      maxText           : "C cìa~n"iìcíssá ó' á~o^oü ^o"i da"ass"i d~n'Ydaé íá assíáé d~néí ádü {0}",
      invalidText       : "{0} "aaí assíáé 'Y~aê~o~nc cìa~n"iìcíssá - d~n'Ydaé íá assíáé ^ocò ì"i~n"oThò {1}",
      format            : "ì/c/A"
   });
}

if(Ext.form.ComboBox){
   Ext.apply(Ext.form.ComboBox.prototype, {
      loadingText       : ""Oü~n^oùóc...",
      valueNotFoundText : undefined
   });
}

if(Ext.form.VTypes){
   Ext.apply(Ext.form.VTypes, {
      emailText    : ''A~o^oü ^o"i da"ass"i d~n'Ydaé íá assíáé e-mail address ^ocò ì"i~n"oThò "user@domain.com"',
      urlText      : ''A~o^oü ^o"i da"ass"i d~n'Ydaé íá assíáé ìéá "aéa'yè~oíóc URL ^ocò ì"i~n"oThò "http:/'+'/www.domain.com"',
      alphaText    : ''A~o^oü ^o"i da"ass"i d~n'Ydaé íá da~né'Y÷aé ~a~n"Uììá^oá êáé _',
      alphanumText : ''A~o^oü ^o"i da"ass"i d~n'Ydaé íá da~né'Y÷aé ~a~n"Uììá^oá, á~néèì"i'yò êáé _'
   });
}

if(Ext.grid.GridView){
   Ext.apply(Ext.grid.GridView.prototype, {
      sortAscText  : "'A'y^i"i~oóá ^Oá^iéíüìcóc",
      sortDescText : ""Oèssí"i~oóá ^Oá^iéíüìcóc",
      lockText     : "^E"eass"aùìá ó^oTh"ecò",
      unlockText   : "^Iaê"eass"aùìá ó^oTh"ecò",
      columnsText  : "'O^oTh"eaò"
   });
}

if(Ext.grid.PropertyColumnModel){
   Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
      nameText   : " 1/4 í"iìá",
      valueText  : "^OéìTh",
      dateFormat : "ì/c/A"
   });
}

if(Ext.layout.BorderLayout.SplitRegion){
   Ext.apply(Ext.layout.BorderLayout.SplitRegion.prototype, {
      splitTip            : "'O'y~na^oa ~aéá á"e"eá~aTh ìa~a'Yè"i~oò.",
      collapsibleSplitTip : "'O'y~na^oa ~aéá á"e"eá~aTh ìa~a'Yè"i~oò. Double click ~aéá ádüê~n~ooc."
   });
}
