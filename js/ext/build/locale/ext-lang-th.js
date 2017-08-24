/**
 * List compiled by KillerNay on the extjs.com forums.
 * Thank you KillerNay!
 *
 * Thailand Translations
 */

Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">!'OA~N§^a"EAZ...</div>';

if(Ext.View){
  Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
  Ext.grid.Grid.prototype.ddText = "{0} àA×'I!áAéC·~Né§"E'AZáPC";
}

if(Ext.TabPanelItem){
  Ext.TabPanelItem.prototype.closeText = ">>^OZá·co^1~Oé";
}

if(Ext.form.Field){
  Ext.form.Field.prototype.invalidText = "EURè`Oc'I§aè'I§^1~Oé"a'AèP`U!ué'I§";
}

if(Ext.LoadMask){
  Ext.LoadMask.prototype.msg = "!'OA~N§^a"EAZ...";
}

Date.monthNames = [
  "'A!~A`OEUR'A",
  "!O'A"Y`O'O"Y~N^1zì",
  "'A~O^1`OEUR'A",
  "à'A'E`O^A^1",
  ""Y"A'E`A`OEUR'A",
  "'A^OPO^1`O^A^1",
  "!"A!`OEUR'A",
  "^E^O§"E`OEUR'A",
  "!~N^1^A`O^A^1",
  "uOA`OEUR'A",
  ""Y"A`Es^O!`O^A^1",
  "z~N^1C`OEUR'A"
];

Date.getShortMonthName = function(month) {
  return Date.monthNames[month].substring(0, 3);
};

Date.monthNumbers = {
  "'AEUR" : 0,
  "!"Y" : 1,
  "'A~OEUR" : 2,
  "à'A^A" : 3,
  ""YEUR" : 4,
  "'A^O^A" : 5,
  "!EUR" : 6,
  "^EEUR" : 7,
  "!^A" : 8,
  "uEUR" : 9,
  ""Y^A" : 10,
  "zEUR" : 11
};

Date.getMonthNumber = function(name) {
  return Date.monthNumbers[name.substring(0, 1).toUpperCase() + name.substring(1, 3).toLowerCase()];
};

Date.dayNames = [
  "'I`O·^Ou^Aì",
  "s~N^1·~Aì",
  "'I~N§EUR`O~A",
  ""YO×z",
  ""Y"A"E~N^EoZ~O",
  "`EO!~Aì",
  "à^E`O~Aì"
];

Date.getShortDayName = function(day) {
  return Date.dayNames[day].substring(0, 3);
};

if(Ext.MessageBox){
  Ext.MessageBox.buttonText = {
    ok     : "u!A§",
    cancel : "^A!àA^O!",
    yes    : "~aaè",
    no     : ""a'Aè~aaè"
  };
}

if(Ext.util.Format){
  Ext.util.Format.date = function(v, format){
    if(!v) return "";
    if(!(v instanceof Date)) v = new Date(Date.parse(v));
    return v.dateFormat(format || "m/d/Y");
  };
}

if(Ext.DatePicker){
  Ext.apply(Ext.DatePicker.prototype, {
    todayText         : "C~N^1^1~Oé",
    minText           : "This date is before the minimum date",
    maxText           : "This date is after the maximum date",
    disabledDaysText  : "",
    disabledDatesText : "",
    monthNames        : Date.monthNames,
    dayNames          : Date.dayNames,
    nextText          : 'àZ×'I^1P~NZ"a>> (Control+Right)',
    prevText          : 'àZ×'I^1!è'I^1"E^1é`O (Control+Left)',
    monthYearText     : 'àA×'I!àZ×'I^1 (Control+Up/Down to move years)',
    todayTip          : "{0} (Spacebar)",
    format            : "m/d/y",
    okText            : "&#160;u!A§&#160;",
    cancelText        : "^A!àA^O!",
    startDay          : 0
  });
}

if(Ext.PagingToolbar){
  Ext.apply(Ext.PagingToolbar.prototype, {
    beforePageText : ""E^1é`O",
    afterPageText  : "of {0}",
    firstText      : ""E^1é`Oá~A!",
    prevText       : "!è'I^1"E^1é`O",
    nextText       : "P~NZ"a>>",
    lastText       : ""E^1é`O^EOZ·é`O^A",
    refreshText    : "~A~Oà?~Aa",
    displayMsg     : "!'OA~N§á^EZ§ {0} - {1} s`O! {2}",
    emptyMsg       : '"a'Aè'A~Océ'I'A`UAá^EZ§'
  });
}

if(Ext.form.TextField){
  Ext.apply(Ext.form.TextField.prototype, {
    minLengthText : "The minimum length for this field is {0}",
    maxLengthText : "The maximum length for this field is {0}",
    blankText     : "This field is required",
    regexText     : "",
    emptyText     : null
  });
}

if(Ext.form.NumberField){
  Ext.apply(Ext.form.NumberField.prototype, {
    minText : "The minimum value for this field is {0}",
    maxText : "The maximum value for this field is {0}",
    nanText : "{0} is not a valid number"
  });
}

if(Ext.form.DateField){
  Ext.apply(Ext.form.DateField.prototype, {
    disabledDaysText  : ">>^OZ",
    disabledDatesText : ">>^OZ",
    minText           : "The date in this field must be after {0}",
    maxText           : "The date in this field must be before {0}",
    invalidText       : "{0} is not a valid date - it must be in the format {1}",
    format            : "m/d/y",
    altFormats        : "m/d/Y|m-d-y|m-d-Y|m/d|m-d|md|mdy|mdY|d|Y-m-d"
  });
}

if(Ext.form.ComboBox){
  Ext.apply(Ext.form.ComboBox.prototype, {
    loadingText       : "!'OA~N§^a"EAZ...",
    valueNotFoundText : undefined
  });
}

if(Ext.form.VTypes){
  Ext.apply(Ext.form.VTypes, {
    emailText    : 'This field should be an e-mail address in the format "user@domain.com"',
    urlText      : 'This field should be a URL in the format "http:/'+'/www.domain.com"',
    alphaText    : 'This field should only contain letters and _',
    alphanumText : 'This field should only contain letters, numbers and _'
  });
}

if(Ext.form.HtmlEditor){
  Ext.apply(Ext.form.HtmlEditor.prototype, {
    createLinkText : 'Please enter the URL for the link:',
    buttonTips : {
      bold : {
        title: 'Bold (Ctrl+B)',
        text: 'Make the selected text bold.',
        cls: 'x-html-editor-tip'
      },
      italic : {
        title: 'Italic (Ctrl+I)',
        text: 'Make the selected text italic.',
        cls: 'x-html-editor-tip'
      },
      underline : {
        title: 'Underline (Ctrl+U)',
        text: 'Underline the selected text.',
        cls: 'x-html-editor-tip'
      },
      increasefontsize : {
        title: 'Grow Text',
        text: 'Increase the font size.',
        cls: 'x-html-editor-tip'
      },
      decreasefontsize : {
        title: 'Shrink Text',
        text: 'Decrease the font size.',
        cls: 'x-html-editor-tip'
      },
      backcolor : {
        title: 'Text Highlight Color',
        text: 'Change the background color of the selected text.',
        cls: 'x-html-editor-tip'
      },
      forecolor : {
        title: 'Font Color',
        text: 'Change the color of the selected text.',
        cls: 'x-html-editor-tip'
      },
      justifyleft : {
        title: 'Align Text Left',
        text: 'Align text to the left.',
        cls: 'x-html-editor-tip'
      },
      justifycenter : {
        title: 'Center Text',
        text: 'Center text in the editor.',
        cls: 'x-html-editor-tip'
      },
      justifyright : {
        title: 'Align Text Right',
        text: 'Align text to the right.',
        cls: 'x-html-editor-tip'
      },
      insertunorderedlist : {
        title: 'Bullet List',
        text: 'Start a bulleted list.',
        cls: 'x-html-editor-tip'
      },
      insertorderedlist : {
        title: 'Numbered List',
        text: 'Start a numbered list.',
        cls: 'x-html-editor-tip'
      },
      createlink : {
        title: 'Hyperlink',
        text: 'Make the selected text a hyperlink.',
        cls: 'x-html-editor-tip'
      },
      sourceedit : {
        title: 'Source Edit',
        text: 'Switch to source editing mode.',
        cls: 'x-html-editor-tip'
      }
    }
  });
}

if(Ext.grid.GridView){
  Ext.apply(Ext.grid.GridView.prototype, {
    sortAscText  : "Sort Ascending",
    sortDescText : "Sort Descending",
    lockText     : "Lock Column",
    unlockText   : "Unlock Column",
    columnsText  : "Columns"
  });
}

if(Ext.grid.GroupingView){
  Ext.apply(Ext.grid.GroupingView.prototype, {
    emptyGroupText : '(None)',
    groupByText    : 'Group By This Field',
    showGroupsText : 'Show in Groups'
  });
}

if(Ext.grid.PropertyColumnModel){
  Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
    nameText   : "Name",
    valueText  : "Value",
    dateFormat : "m/j/Y"
  });
}

if(Ext.layout.BorderLayout.SplitRegion){
  Ext.apply(Ext.layout.BorderLayout.SplitRegion.prototype, {
    splitTip            : "Drag to resize.",
    collapsibleSplitTip : "Drag to resize. Double click to hide."
  });
}
