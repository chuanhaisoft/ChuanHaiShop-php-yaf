/**
 * Greek translation
 * By thesilentman (utf8 encoding)
 * 22 Sep 2007
 *
 * Changes since previous (first) Version:
 * - HTMLEditor Translation
 * - some minor corrections
 */

Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">Μεταφρτωση δεδομνων...</div>';

if(Ext.View){
   Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
   Ext.grid.Grid.prototype.ddText = "{0} Επιλεγμνε σειρ";
}

if(Ext.TabPanelItem){
   Ext.TabPanelItem.prototype.closeText = "Κλεστε το tab";
}

if(Ext.form.Field){
   Ext.form.Field.prototype.invalidText = "Το περιεχμενο του πεδου δεν εναι αποδεκτ";
}

if(Ext.LoadMask){
    Ext.LoadMask.prototype.msg = "Μεταφρτωση δεδομνων...";
}

Date.monthNames = [
   "Ιανουριο",
   "Φεβρουριο",
   "Μρτιο",
   "Απρλιο",
   "Μιο",
   "Ιονιο",
   "Ιολιο",
   "Αγουστο",
   "Σεπτμβριο",
   "Οκτβριο",
   "Νομβριο",
   "Δεκμβριο"
];

Date.dayNames = [
   "Κυριακ",
   "Δευτρα",
   "Τρτη",
   "Τετρτη",
   "Πμπτη",
   "Παρασκευ",
   "Σββατο"
];

if(Ext.MessageBox){
   Ext.MessageBox.buttonText = {
      ok     : "OK",
      cancel : "κυρο",
      yes    : "Ναι",
      no     : "χι"
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
      todayText         : "Σμερα",
      minText           : "Η Ημερομηνα εναι προγενστερη απ την παλαιτερη αποδεκτ",
      maxText           : "Η Ημερομηνα εναι μεταγενστερη απ την νετερη αποδεκτ",
      disabledDaysText  : "",
      disabledDatesText : "",
      monthNames	: Date.monthNames,
      dayNames		: Date.dayNames,
      nextText          : 'Επμενο Μνα (Control+Δεξ Βλο)',
      prevText          : 'Προηγομενο Μνα (Control + Αριστερ Βλο)',
      monthYearText     : 'Επιλογ Μην (Control + Επνω/Κτω Βλο για μεταβολ ετν)',
      todayTip          : "{0} (ΠΛκτρο Διαστματο)",
      format            : "d/m/y"
   });
}

if(Ext.PagingToolbar){
   Ext.apply(Ext.PagingToolbar.prototype, {
      beforePageText : "Σελδα",
      afterPageText  : "απ {0}",
      firstText      : "Πρτη Σελδα",
      prevText       : "Προηγομενη Σελδα",
      nextText       : "Επμενη Σελδα",
      lastText       : "Τελευταα Σελδα",
      refreshText    : "Ανανωση",
      displayMsg     : "Εμφνιση {0} - {1} απ {2}",
      emptyMsg       : 'Δεν υπρχουν δεδομνα'
   });
}

if(Ext.form.TextField){
   Ext.apply(Ext.form.TextField.prototype, {
      minLengthText : "Το μικρτερο αποδεκτ μκο για το πεδο εναι {0}",
      maxLengthText : "Το μεγαλτερο αποδεκτ μκο για το πεδο εναι {0}",
      blankText     : "Το πεδο εναι υποχρεωτικ",
      regexText     : "",
      emptyText     : null
   });
}

if(Ext.form.NumberField){
   Ext.apply(Ext.form.NumberField.prototype, {
      minText : "Η μικρτερη τιμ του πεδου εναι {0}",
      maxText : "Η μεγαλτερη τιμ του πεδου εναι {0}",
      nanText : "{0} δεν εναι αποδεκτ αριθμ"
   });
}

if(Ext.form.DateField){
   Ext.apply(Ext.form.DateField.prototype, {
      disabledDaysText  : "Ανενεργ",
      disabledDatesText : "Ανενεργ",
      minText           : "Η ημερομηνα αυτο του πεδου πρπει να εναι μετ την {0}",
      maxText           : "Η ημερομηνα αυτο του πεδου πρπει να εναι πριν την {0}",
      invalidText       : "{0} δεν εναι γκυρη ημερομηνα - πρπει να εναι στη μορφ {1}",
      format            : "d/m/y"
   });
}

if(Ext.form.ComboBox){
   Ext.apply(Ext.form.ComboBox.prototype, {
      loadingText       : "Μεταφρτωση δεδομνων...",
      valueNotFoundText : undefined
   });
}

if(Ext.form.VTypes){
   Ext.apply(Ext.form.VTypes, {
      emailText    : 'Το πεδο δχεται μνο διευθνσει Email σε μορφ "user@domain.com"',
      urlText      : 'Το πεδο δχεται μνο URL σε μορφ "http:/'+'/www.domain.com"',
      alphaText    : 'Το πεδο δχεται μνο χαρακτρε και _',
      alphanumText : 'Το πεδο δχεται μνο χαρακτρε, αριθμο και _'
   });
}

if(Ext.form.HtmlEditor){
   Ext.apply(Ext.form.HtmlEditor.prototype, {
	 createLinkText : 'Δστε τη διεθυνση (URL) για το σνδεσμο (link):',
	 buttonTips : {
            bold : {
               title: 'ντονα (Ctrl+B)',
               text: 'Κνετε το προεπιλεγμνο κεμενο ντονο.',
               cls: 'x-html-editor-tip'
            },
            italic : {
               title: 'Πλγια (Ctrl+I)',
               text: 'Κνετε το προεπιλεγμνο κεμενο πλγιο.',
               cls: 'x-html-editor-tip'
            },
            underline : {
               title: 'Υπογρμμιση (Ctrl+U)',
               text: 'Υπογραμμζετε το προεπιλεγμνο κεμενο.',
               cls: 'x-html-editor-tip'
           },
           increasefontsize : {
               title: 'Μεγθυνση κειμνου',
               text: 'Μεγαλνετε τη γραμματοσειρ.',
               cls: 'x-html-editor-tip'
           },
           decreasefontsize : {
               title: 'Σμκρυνση κειμνου',
               text: 'Μικρανετε τη γραμματοσειρ.',
               cls: 'x-html-editor-tip'
           },
           backcolor : {
               title: 'Χρμα Φντου Κειμνου',
               text: 'Αλλζετε το χρμα στο φντο του προεπιλεγμνου κειμνου.',
               cls: 'x-html-editor-tip'
           },
           forecolor : {
               title: 'Χρμα Γραμματοσειρ',
               text: 'Αλλζετε το χρμα στη γραμματοσειρ του προεπιλεγμνου κειμνου.',               
               cls: 'x-html-editor-tip'
           },
           justifyleft : {
               title: 'Αριστερ Στοχιση Κειμνου',
               text: 'Στοιχζετε το κεμενο στα αριστερ.',
               cls: 'x-html-editor-tip'
           },
           justifycenter : {
               title: 'Κεντρρισμα Κειμνου',
               text: 'Στοιχζετε το κεμενο στο κντρο.',
               cls: 'x-html-editor-tip'
           },
           justifyright : {
               title: 'Δεξι Στοχιση Κειμνου',
               text: 'Στοιχζετε το κεμενο στα δεξι.',
               cls: 'x-html-editor-tip'
           },
           insertunorderedlist : {
               title: 'Εισαγωγ Λστα Κουκδων',
               text: 'Ξεκινστε μια λστα με κουκδε.',
               cls: 'x-html-editor-tip'
           },
           insertorderedlist : {
               title: 'Εισαγωγ Λστα Αρθμηση',
               text: 'Ξεκινστε μια λστα με αρθμηση.',
               cls: 'x-html-editor-tip'
           },
           createlink : {
               title: 'Hyperlink',
               text: 'Μετατρπετε το προεπιλεγμνο κεμενο σε Link.',
               cls: 'x-html-editor-tip'
           },
           sourceedit : {
               title: 'Επεξεργασα Κδικα',
               text: 'Μεταβανετε στη λειτουργα επεξεργασα κδικα.',
               cls: 'x-html-editor-tip'
           }
        }
   });
}


if(Ext.grid.GridView){
   Ext.apply(Ext.grid.GridView.prototype, {
      sortAscText  : "Αξουσα ταξινμηση",
      sortDescText : "Φθνουσα ταξινμηση",
      lockText     : "Κλεδωμα στλη",
      unlockText   : "Ξεκλεδωμα στλη",
      columnsText  : "Στλε"
   });
}

if(Ext.grid.PropertyColumnModel){
   Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
      nameText   : "νομα",
      valueText  : "Περιεχμενο",
      dateFormat : "m/d/Y"
   });
}

if(Ext.layout.BorderLayout.SplitRegion){
   Ext.apply(Ext.layout.BorderLayout.SplitRegion.prototype, {
      splitTip            : "Σρετε για αλλαγ μεγθου.",
      collapsibleSplitTip : "Σρετε για αλλαγ μεγθου. Διπλ κλικ για απκρυψη."
   });
}

