/*
 * Ext JS Library 2.1
 * Copyright(c) 2006-2008, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://extjs.com/license
 */

/**
 * Czech Translations
 * Translated by Tomás Korcák (72)
 * 2008/02/08 18:02, Ext-2.0.1
 */

Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">Prosím cekejte...</div>';

if(Ext.View){
   Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
   Ext.grid.Grid.prototype.ddText = "{0} vybran'ych rádku";
}

if(Ext.TabPanelItem){
   Ext.TabPanelItem.prototype.closeText = "Zavrít zálozku";
}

if(Ext.form.Field){
   Ext.form.Field.prototype.invalidText = "Hodnota v tomto poli je neplatná";
}

if(Ext.LoadMask){
    Ext.LoadMask.prototype.msg = "Prosím cekejte...";
}

Date.monthNames = [
   "Leden",
   "'Unor",
   "Brezen",
   "Duben",
   "Květen",
   "Cerven",
   "Cervenec",
   "Srpen",
   "Zárí",
   "Ríjen",
   "Listopad",
   "Prosinec"
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
   "Neděle",
   "Pondělí",
   "'Uter'y",
   "Streda",
   "Ctvrtek",
   "Pátek",
   "Sobota"
];

Date.getShortDayName = function(day) {
  return Date.dayNames[day].substring(0, 3);
};

if(Ext.MessageBox){
   Ext.MessageBox.buttonText = {
      ok     : "OK",
      cancel : "Storno",
      yes    : "Ano",
      no     : "Ne"
   };
}

if(Ext.util.Format){
   Ext.util.Format.date = function(v, format){
      if(!v) return "";
      if(!(v instanceof Date)) v = new Date(Date.parse(v));
      return v.dateFormat(format || "d.m.Y");
   };
}

if(Ext.DatePicker){
   Ext.apply(Ext.DatePicker.prototype, {
      todayText         : "Dnes",
      minText           : "Datum nesmí b'yt starsí nez je minimální",
      maxText           : "Datum nesmí b'yt drívějsí nez je maximální",
      disabledDaysText  : "",
      disabledDatesText : "",
      monthNames	: Date.monthNames,
      dayNames		: Date.dayNames,
      nextText          : 'Následující měsíc (Control+Right)',
      prevText          : 'Predcházející měsíc (Control+Left)',
      monthYearText     : 'Zvolte měsíc (ke změně let pouzijte Control+Up/Down)',
      todayTip          : "{0} (Spacebar)",
      format            : "d.m.Y",
      okText            : "&#160;OK&#160;",
      cancelText        : "Storno",
      startDay          : 1
   });
}

if(Ext.PagingToolbar){
   Ext.apply(Ext.PagingToolbar.prototype, {
      beforePageText : "Strana",
      afterPageText  : "z {0}",
      firstText      : "První strana",
      prevText       : "Precházející strana",
      nextText       : "Následující strana",
      lastText       : "Poslední strana",
      refreshText    : "Aktualizovat",
      displayMsg     : "Zobrazeno {0} - {1} z celkov'ych {2}",
      emptyMsg       : 'Zádné záznamy nebyly nalezeny'
   });
}

if(Ext.form.TextField){
   Ext.apply(Ext.form.TextField.prototype, {
      minLengthText : "Pole nesmí mít méně {0} znaku",
      maxLengthText : "Pole nesmí b'yt delsí nez {0} znaku",
      blankText     : "This field is required",
      regexText     : "",
      emptyText     : null
   });
}

if(Ext.form.NumberField){
   Ext.apply(Ext.form.NumberField.prototype, {
      minText : "Hodnota v tomto poli nesmí b'yt mensí nez {0}",
      maxText : "Hodnota v tomto poli nesmí b'yt větsí nez {0}",
      nanText : "{0} není platné císlo"
   });
}

if(Ext.form.DateField){
   Ext.apply(Ext.form.DateField.prototype, {
      disabledDaysText  : "Neaktivní",
      disabledDatesText : "Neaktivní",
      minText           : "Datum v tomto poli nesmí b'yt starsí nez {0}",
      maxText           : "Datum v tomto poli nesmí b'yt novějsí nez {0}",
      invalidText       : "{0} není platn'ym datem - zkontrolujte zda-li je ve formátu {1}",
      format            : "d.m.Y",
      altFormats        : "d/m/Y|d-m-y|d-m-Y|d/m|d-m|dm|dmy|dmY|d|Y-m-d"
   });
}

if(Ext.form.ComboBox){
   Ext.apply(Ext.form.ComboBox.prototype, {
      loadingText       : "Prosím cekejte...",
      valueNotFoundText : undefined
   });
}

if(Ext.form.VTypes){
   Ext.apply(Ext.form.VTypes, {
      emailText    : 'V tomto poli muze b'yt vyplněna pouze emailová adresa ve formátu "uzivatel@doména.cz"',
      urlText      : 'V tomto poli muze b'yt vyplněna pouze URL (adresa internetové stránky) ve formátu "http:/'+'/www.doména.cz"',
      alphaText    : 'Toto pole muze obsahovat pouze písmena abecedy a znak _',
      alphanumText : 'Toto pole muze obsahovat pouze písmena abecedy, císla a znak _'
   });
}

if(Ext.form.HtmlEditor){
  Ext.apply(Ext.form.HtmlEditor.prototype, {
    createLinkText : 'Zadejte URL adresu odkazu:',
    buttonTips : {
      bold : {
        title: 'Tucné (Ctrl+B)',
        text: 'Oznací vybran'y text tucně.',
        cls: 'x-html-editor-tip'
      },
      italic : {
        title: 'Kurzíva (Ctrl+I)',
        text: 'Oznací vybran'y text kurzívou.',
        cls: 'x-html-editor-tip'
      },
      underline : {
        title: 'Podtrzení (Ctrl+U)',
        text: 'Podtrhne vybran'y text.',
        cls: 'x-html-editor-tip'
      },
      increasefontsize : {
        title: 'Zvětsit písmo',
        text: 'Zvětsí velikost písma.',
        cls: 'x-html-editor-tip'
      },
      decreasefontsize : {
        title: 'Zúzit písmo',
        text: 'Zmensí velikost písma.',
        cls: 'x-html-editor-tip'
      },
      backcolor : {
        title: 'Barva zv'yraznění textu',
        text: 'Oznací vybran'y text tak, aby vypadal jako oznacen'y zv'yrazňovacem.',
        cls: 'x-html-editor-tip'
      },
      forecolor : {
        title: 'Barva písma',
        text: 'Změní barvu textu.',
        cls: 'x-html-editor-tip'
      },
      justifyleft : {
        title: 'Zarovnat text vlevo',
        text: 'Zarovná text doleva.',
        cls: 'x-html-editor-tip'
      },
      justifycenter : {
        title: 'Zarovnat na stred',
        text: 'Zarovná text na stred.',
        cls: 'x-html-editor-tip'
      },
      justifyright : {
        title: 'Zarovnat text vpravo',
        text: 'Zarovná text doprava.',
        cls: 'x-html-editor-tip'
      },
      insertunorderedlist : {
        title: 'Odrázky',
        text: 'Zacne seznam s odrázkami.',
        cls: 'x-html-editor-tip'
      },
      insertorderedlist : {
        title: 'Císlování',
        text: 'Zacne císlovan'y seznam.',
        cls: 'x-html-editor-tip'
      },
      createlink : {
        title: 'Internetov'y odkaz',
        text: 'Z vybraného textu vytvorí internetov'y odkaz.',
        cls: 'x-html-editor-tip'
      },
      sourceedit : {
        title: 'Zdrojov'y kód',
        text: 'Prepne do módu úpravy zdrojového kódu.',
        cls: 'x-html-editor-tip'
      }
    }
  });
}

if(Ext.grid.GridView){
   Ext.apply(Ext.grid.GridView.prototype, {
      sortAscText  : "Radit vzestupně",
      sortDescText : "Radit sestupně",
      lockText     : "Ukotvit sloupec",
      unlockText   : "Uvolnit sloupec",
      columnsText  : "Sloupce"
   });
}

if(Ext.grid.GroupingView){
  Ext.apply(Ext.grid.GroupingView.prototype, {
    emptyGroupText : '(Zádná data)',
    groupByText    : 'Seskupit dle tohoto pole',
    showGroupsText : 'Zobrazit ve skupině'
  });
}

if(Ext.grid.PropertyColumnModel){
   Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
      nameText   : "Název",
      valueText  : "Hodnota",
      dateFormat : "j.m.Y"
   });
}

if(Ext.layout.BorderLayout.SplitRegion){
   Ext.apply(Ext.layout.BorderLayout.SplitRegion.prototype, {
      splitTip            : "Tahem změnit velikost.",
      collapsibleSplitTip : "Tahem změnit velikost. Dvojklikem skr'yt."
   });
}
