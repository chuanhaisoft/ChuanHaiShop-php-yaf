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
/*
 * Hungarian translation
 * By amon  <amon@theba.hu> (utf-8 encoded)
 * 09 February 2008
 */
 
Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">Bet"oltés...</div>';

if(Ext.View){
  Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
  Ext.grid.Grid.prototype.ddText = "{0} kiválasztott sor";
}

if(Ext.TabPanelItem){
  Ext.TabPanelItem.prototype.closeText = "Fül bezárása";
}

if(Ext.form.Field){
  Ext.form.Field.prototype.invalidText = "A mez"oben lév"o adat nem megfelel"o";
}

if(Ext.LoadMask){
  Ext.LoadMask.prototype.msg = "Bet"oltés...";
}

Date.monthNames = [
  "Január",
  "Február",
  "Március",
  "'Aprilis",
  "Május",
  "Június",
  "Július",
  "Augusztus",
  "Szeptember",
  "Október",
  "November",
  "December"
];

Date.getShortMonthName = function(month) {
  return Date.monthNames[month].substring(0, 3);
};

Date.monthNumbers = {
  Jan : 0,
  Feb : 1,
  Mar : 2,
  Apr : 3,
  May : 4,
  Jun : 5,
  Jul : 6,
  Aug : 7,
  Sep : 8,
  Oct : 9,
  Nov : 10,
  Dec : 11
};

Date.getMonthNumber = function(name) {
  return Date.monthNumbers[name.substring(0, 1).toUpperCase() + name.substring(1, 3).toLowerCase()];
};

Date.dayNames = [
  "Vasárnap",
  "Hétf"o",
  "Kedd",
  "Szerda",
  "Csüt"ort"ok",
  "Péntek",
  "Szombat"
];

Date.getShortDayName = function(day) {
  return Date.dayNames[day].substring(0, 3);
};

if(Ext.MessageBox){
  Ext.MessageBox.buttonText = {
    ok     : "OK",
    cancel : "Mégsem",
    yes    : "Igen",
    no     : "Nem"
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
    todayText         : "Mai nap",
    minText           : "A dátum korábbi a megengedettnél",
    maxText           : "A dárum kés"obbi a megengedettnél",
    disabledDaysText  : "",
    disabledDatesText : "",
    monthNames        : Date.monthNames,
    dayNames          : Date.dayNames,
    nextText          : 'K"ov. hónap (Ctrl+Jobbra)',
    prevText          : 'El"oz"o hónap (Ctrl+Balra)',
    monthYearText     : 'Válassz hónapot ('Evválasztás: Ctrl+Fel/Le)',
    todayTip          : "{0} (Szók"oz)",
    format            : "Y-m-d",
    okText            : "&#160;OK&#160;",
    cancelText        : "Mégsem",
    startDay          : 1
  });
}

if(Ext.PagingToolbar){
  Ext.apply(Ext.PagingToolbar.prototype, {
    beforePageText : "Oldal",
    afterPageText  : "a {0}-ból/b"ol",
    firstText      : "Els"o oldal",
    prevText       : "El"oz"o oldal",
    nextText       : "K"ovetkez"o oldal",
    lastText       : "Utolsó oldal",
    refreshText    : "Frissít",
    displayMsg     : "{0} - {1} sorok láthatók a {2}-ból/b"ol",
    emptyMsg       : 'Nincs megjeleníthet"o adat'
  });
}

if(Ext.form.TextField){
  Ext.apply(Ext.form.TextField.prototype, {
    minLengthText : "A mez"o tartalma legalább {0} hosszú kell legyen",
    maxLengthText : "A mez"o tartalma nem lehet hosszabb {0}-nál/nél",
    blankText     : "K"otelez"oen kit"oltend"o mez"o",
    regexText     : "",
    emptyText     : null
  });
}

if(Ext.form.NumberField){
  Ext.apply(Ext.form.NumberField.prototype, {
    minText : "A mez"o tartalma nem lehet kissebb, mint {0}",
    maxText : "A mez"o tartalma nem lehet nagyobb, mint {0}",
    nanText : "{0} nem szám"
  });
}

if(Ext.form.DateField){
  Ext.apply(Ext.form.DateField.prototype, {
    disabledDaysText  : "Nem választható",
    disabledDatesText : "Nem választható",
    minText           : "A dátum nem lehet korábbi, mint {0}",
    maxText           : "A dátum nem lehet kés"obbi, mint {0}",
    invalidText       : "{0} nem megfelel"o dátum - a megfelel"o formátum {1}",
    format            : "y-m-d",
    altFormats        : "y m d|y. m. d.|m d|m-d|md|ymd|Ymd|d|Y-m-d"
  });
}

if(Ext.form.ComboBox){
  Ext.apply(Ext.form.ComboBox.prototype, {
    loadingText       : "Bet"oltés...",
    valueNotFoundText : undefined
  });
}

if(Ext.form.VTypes){
  Ext.apply(Ext.form.VTypes, {
    emailText    : 'A mez"obe e-mail címet kell írni ebben a formátumban: "felhasználó@szerver.hu"',
    urlText      : 'A mez"obe webcímet kell írni ebben a formátumban: "http:/'+'/www.weboldal.hu"',
    alphaText    : 'A mez"o csak bet"uket és aláhúzást (_) tartalmazhat',
    alphanumText : 'A mez"o csak bet"uket, számokat és aláhúzást (_) tartalmazhat'
  });
}

if(Ext.form.HtmlEditor){
  Ext.apply(Ext.form.HtmlEditor.prototype, {
    createLinkText : 'Kérlek add meg a webcímet:',
    buttonTips : {
      bold : {
        title: 'Félk"ovér (Ctrl+B)',
        text: 'Félk"ovérré teszi a sz"oveget.',
        cls: 'x-html-editor-tip'
      },
      italic : {
        title: 'D"olt (Ctrl+I)',
        text: 'D"oltté teszi a sz"oveget.',
        cls: 'x-html-editor-tip'
      },
      underline : {
        title: 'Aláhúzás (Ctrl+U)',
        text: 'Aláhúzza a sz"oveget.',
        cls: 'x-html-editor-tip'
      },
      increasefontsize : {
        title: 'Bet"uméret n"ovlés',
        text: 'N"oveli a sz"oveg bet"uméretét.',
        cls: 'x-html-editor-tip'
      },
      decreasefontsize : {
        title: 'Bet"uméret cs"okkentés',
        text: 'Cs"okkenti a sz"oveg bet"uméretét.',
        cls: 'x-html-editor-tip'
      },
      backcolor : {
        title: 'Háttérszín',
        text: 'A kijel"olt sz"oveg háttérszínét változtatja meg.',
        cls: 'x-html-editor-tip'
      },
      forecolor : {
        title: 'Bet"uszín',
        text: 'A kijel"olt sz"oveg bet"uszínét változtatja meg.',
        cls: 'x-html-editor-tip'
      },
      justifyleft : {
        title: 'Balra igazít',
        text: 'A sz"oveget balra igazítja.',
        cls: 'x-html-editor-tip'
      },
      justifycenter : {
        title: 'K"ozépre igazít',
        text: 'A sz"oveget k"ozépre igazítja.',
        cls: 'x-html-editor-tip'
      },
      justifyright : {
        title: 'Jobbra igazít',
        text: 'A sz"oveget jobbra igazítja.',
        cls: 'x-html-editor-tip'
      },
      insertunorderedlist : {
        title: 'Felsorolás',
        text: 'Felsorolást nyit.',
        cls: 'x-html-editor-tip'
      },
      insertorderedlist : {
        title: 'Számozott lista',
        text: 'Számozott listát nyit.',
        cls: 'x-html-editor-tip'
      },
      createlink : {
        title: 'Hiperlink',
        text: 'Hiperlinkké teszi a kijel"olt sz"oveget.',
        cls: 'x-html-editor-tip'
      },
      sourceedit : {
        title: 'Forráskód',
        text: 'Forráskód üzemmódba vált.',
        cls: 'x-html-editor-tip'
      }
    }
  });
}

if(Ext.grid.GridView){
  Ext.apply(Ext.grid.GridView.prototype, {
    sortAscText  : "N"ovekv"o rendezés",
    sortDescText : "Cs"okken"o rendezés",
    lockText     : "Oszlop zárolása",
    unlockText   : "Oszlop felengedése",
    columnsText  : "Oszlopok"
  });
}

if(Ext.grid.GroupingView){
  Ext.apply(Ext.grid.GroupingView.prototype, {
    emptyGroupText : '(nincs)',
    groupByText    : 'Mez"o szerint csoportosít',
    showGroupsText : 'Csoportosított megjelenítés'
  });
}

if(Ext.grid.PropertyColumnModel){
  Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
    nameText   : "Név",
    valueText  : "'Erték",
    dateFormat : "Y j m"
  });
}

if(Ext.layout.BorderLayout.SplitRegion){
  Ext.apply(Ext.layout.BorderLayout.SplitRegion.prototype, {
    splitTip            : "'Atméretezés húzásra.",
    collapsibleSplitTip : "'Atméretezés húzásra. Eltüntetés duplaklikk."
  });
}
