/*
 * Ext JS Library 2.1
 * Copyright(c) 2006-2008, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://extjs.com/license
 */

/**
 * Swedish translation (utf8-encoding)
 * By Erik Andersson, Monator Technologies
 * 24 April 2007
 * Changed by Cariad, 29 July 2007
 */

Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">Laddar...</div>';

if(Ext.View){
   Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
   Ext.grid.Grid.prototype.ddText = "{0} markerade rad(er)";
}

if(Ext.TabPanelItem){
   Ext.TabPanelItem.prototype.closeText = "St"ang denna flik";
}

if(Ext.form.Field){
   Ext.form.Field.prototype.invalidText = "V"ardet i detta f"alt "ar inte tillatet";
}

if(Ext.LoadMask){
   Ext.LoadMask.prototype.msg = "Laddar...";
}

Date.monthNames = [
   "januari",
   "februari",
   "mars",
   "april",
   "maj",
   "juni",
   "juli",
   "augusti",
   "september",
   "oktober",
   "november",
   "december"
];

Date.dayNames = [
   "s"ondag",
   "mandag",
   "tisdag",
   "onsdag",
   "torsdag",
   "fredag",
   "l"ordag"
];

if(Ext.MessageBox){
   Ext.MessageBox.buttonText = {
      ok     : "OK",
      cancel : "Avbryt",
      yes    : "Ja",
      no     : "Nej"
   };
}

if(Ext.util.Format){
   Ext.util.Format.date = function(v, format){
      if(!v) return "";
      if(!(v instanceof Date)) v = new Date(Date.parse(v));
      return v.dateFormat(format || "Y-m-d");
   };
}

if(Ext.DatePicker){
   Ext.apply(Ext.DatePicker.prototype, {
      todayText         : "Idag",
      minText           : "Detta datum intr"affar f"ore det tidigast tillatna",
      maxText           : "Detta datum intr"affar efter det senast tillatna",
      disabledDaysText  : "",
      disabledDatesText : "",
      monthNames	: Date.monthNames,
      dayNames		: Date.dayNames,
      nextText          : 'N"asta manad (Ctrl + h"ogerpil)',
      prevText          : 'F"oregaende manad (Ctrl + v"ansterpil)',
      monthYearText     : 'V"alj en manad (Ctrl + uppatpil/neratpil f"or att "andra artal)',
      todayTip          : "{0} (mellanslag)",
      format            : "Y-m-d",
      startDay          : 1
   });
}

if(Ext.PagingToolbar){
   Ext.apply(Ext.PagingToolbar.prototype, {
      beforePageText : "Sida",
      afterPageText  : "av {0}",
      firstText      : "F"orsta sidan",
      prevText       : "F"oregaende sida",
      nextText       : "N"asta sida",
      lastText       : "Sista sidan",
      refreshText    : "Uppdatera",
      displayMsg     : "Visar {0} - {1} av {2}",
      emptyMsg       : 'Det finns ingen data att visa'
   });
}

if(Ext.form.TextField){
   Ext.apply(Ext.form.TextField.prototype, {
      minLengthText : "Minsta tillatna l"angd f"or detta f"alt "ar {0}",
      maxLengthText : "St"orsta tillatna l"angd f"or detta f"alt "ar {0}",
      blankText     : "Detta f"alt "ar obligatoriskt",
      regexText     : "",
      emptyText     : null
   });
}

if(Ext.form.NumberField){
   Ext.apply(Ext.form.NumberField.prototype, {
      minText : "Minsta tillatna v"arde f"or detta f"alt "ar {0}",
      maxText : "St"orsta tillatna v"arde f"or detta f"alt "ar {0}",
      nanText : "{0} "ar inte ett tillatet nummer"
   });
}

if(Ext.form.DateField){
   Ext.apply(Ext.form.DateField.prototype, {
      disabledDaysText  : "Inaktiverad",
      disabledDatesText : "Inaktiverad",
      minText           : "Datumet i detta f"alt maste intr"affa efter {0}",
      maxText           : "Datumet i detta f"alt maste intr"affa f"ore {0}",
      invalidText       : "{0} "ar inte ett tillatet datum - datum ska anges i formatet {1}",
      format            : "Y-m-d"
   });
}

if(Ext.form.ComboBox){
   Ext.apply(Ext.form.ComboBox.prototype, {
      loadingText       : "Laddar...",
      valueNotFoundText : undefined
   });
}

if(Ext.form.VTypes){
   Ext.apply(Ext.form.VTypes, {
      emailText    : 'Detta f"alt ska innehalla en e-post adress i formatet "anv"andare@dom"an.se"',
      urlText      : 'Detta f"alt ska innehalla en l"ank (URL) i formatet "http:/'+'/www.dom"an.se"',
      alphaText    : 'Detta f"alt far bara innehalla bokst"aver och "_"',
      alphanumText : 'Detta f"alt far bara innehalla bokst"aver, nummer och "_"'
   });
}

if(Ext.grid.GridView){
   Ext.apply(Ext.grid.GridView.prototype, {
      sortAscText  : "Sortera stigande",
      sortDescText : "Sortera fallande",
      lockText     : "Las kolumn",
      unlockText   : "Las upp kolumn",
      columnsText  : "Kolumner"
   });
}

if(Ext.grid.PropertyColumnModel){
   Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
      nameText   : "Namn",
      valueText  : "V"arde",
      dateFormat : "Y-m-d"
   });
}

if(Ext.layout.BorderLayout.SplitRegion){
   Ext.apply(Ext.layout.BorderLayout.SplitRegion.prototype, {
      splitTip            : "Dra f"or att "andra storleken.",
      collapsibleSplitTip : "Dra f"or att "andra storleken. Dubbelklicka f"or att g"omma."
   });
}
