/*
 * Ext JS Library 2.1
 * Copyright(c) 2006-2008, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://extjs.com/license
 */

/*
 * Ukrainian translation
 * By zlatko (utf-8 encoding)
 * 3 October 2007
 */

Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">Трива завантаження...</div>';

if(Ext.View){
   Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
   Ext.grid.Grid.prototype.ddText = "{0} вибраних стрчок";
}

if(Ext.TabPanelItem){
   Ext.TabPanelItem.prototype.closeText = "Закрити цю вкладку";
}

if(Ext.form.Field){
   Ext.form.Field.prototype.invalidText = "Значення у цьому пол неврне";
}

if(Ext.LoadMask){
   Ext.LoadMask.prototype.msg = "Завантаження...";
}

Date.monthNames = [
   "Счень",
   "Лютий",
   "Березень",
   "Квтень",
   "Травень",
   "Червень",
   "Липень",
   "Серпень",
   "Вересень",
   "Жовтень",
   "Листопад",
   "Грудень"
];

Date.dayNames = [
   "Недля",
   "Понедлок",
   "Ввторок",
   "Середа",
   "Четвер",
   "Пятниця",
   "Субота"
];

if(Ext.MessageBox){
   Ext.MessageBox.buttonText = {
      ok     : "OK",
      cancel : "Вдмна",
      yes    : "Так",
      no     : "Н"
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
      todayText         : "Сьогодн",
      minText           : "Ця дата менше мнмально дати",
      maxText           : "Ця дата бльше максимально дати",
      disabledDaysText  : "",
      disabledDatesText : "",
      monthNames        : Date.monthNames,
      dayNames	        : Date.dayNames,
      nextText          : 'Наступний мсяць (Control+Вправо)',
      prevText          : 'Попереднй мсяць (Control+Влво)',
      monthYearText     : 'Вибр мсяця (Control+Вверх/Вниз для вибору року)',
      todayTip          : "{0} (Пробл)",
      format            : "d.m.y",
      okText            : "&#160;OK&#160;",
      cancelText        : "Вдмна",
      startDay          : 1
   });
}

if(Ext.PagingToolbar){
   Ext.apply(Ext.PagingToolbar.prototype, {
      beforePageText : "Сторнка",
      afterPageText  : "з {0}",
      firstText      : "Перша сторнка",
      prevText       : "Попередня сторнка",
      nextText       : "Наступна сторнка",
      lastText       : "Остання сторнка",
      refreshText    : "Обновити",
      displayMsg     : "Вдображаються записи з {0} по {1}, всього {2}",
      emptyMsg       : 'Дан для вдображення вдсутн'
   });
}

if(Ext.form.TextField){
   Ext.apply(Ext.form.TextField.prototype, {
      minLengthText : "Мнмальна довжина цього поля {0}",
      maxLengthText : "Максимальна довжина цього поля {0}",
      blankText     : "Це поле  обов’язковим для заповнення",
      regexText     : "",
      emptyText     : null
   });
}

if(Ext.form.NumberField){
   Ext.apply(Ext.form.NumberField.prototype, {
      minText : "Значення цього поля не може бути менше {0}",
      maxText : "Значення цього поля не може бути бльше {0}",
      nanText : "{0} не являться числом"
   });
}

if(Ext.form.DateField){
   Ext.apply(Ext.form.DateField.prototype, {
      disabledDaysText  : "Не доступно",
      disabledDatesText : "Не доступно",
      minText           : "Дата в цьому пол повинна бути бльше {0}",
      maxText           : "Дата в цьому пол повинна бути менше {0}",
      invalidText       : "{0} неправильна дата - дата повинна бути вказана у  формат {1}",
      format            : "d.m.y"
   });
}

if(Ext.form.ComboBox){
   Ext.apply(Ext.form.ComboBox.prototype, {
      loadingText       : "Завантаження...",
      valueNotFoundText : undefined
   });
}

if(Ext.form.VTypes){
   Ext.apply(Ext.form.VTypes, {
      emailText    : 'Це поле повинно мстити адресу електронно почти у формат "user@domain.com"',
      urlText      : 'Це поле повинно мстити URL у формат "http:/'+'/www.domain.com"',
      alphaText    : 'Це поле повинно мстити виключно латинськ лтери та символ пдкреслення "_"',
      alphanumText : 'Це поле повинно мстити виключно латинськ лтери, цифри та символ пдкреслення "_"'
   });
}

if(Ext.form.HtmlEditor){
   Ext.apply(Ext.form.HtmlEditor.prototype, {
     createLinkText : 'Будь-ласка введть адресу:',
     buttonTips : {
            bold : {
               title: 'Напвжирний (Ctrl+B)',
               text: 'Застосування напвжирного до видленого тексту.',
               cls: 'x-html-editor-tip'
            },
            italic : {
               title: 'Курсив (Ctrl+I)',
               text: ' Застосування курсиву до видленого тексту.',
               cls: 'x-html-editor-tip'
            },
            underline : {
               title: 'Пдкреслений (Ctrl+U)',
               text: ' Застосування пдкреслення до видленного тексту.',
               cls: 'x-html-editor-tip'
           },
           increasefontsize : {
               title: 'Збльшити розмр',
               text: 'Збльшення розмру шрифта.',
               cls: 'x-html-editor-tip'
           },
           decreasefontsize : {
               title: 'Зменшити розмр',
               text: 'Зменшення розмру шрифта.',
               cls: 'x-html-editor-tip'
           },
           backcolor : {
               title: 'Заливка',
               text: 'Змна кольору фону для видленого тексту або абзацу.',
               cls: 'x-html-editor-tip'
           },
           forecolor : {
               title: 'Колр тексту',
               text: 'Змна кольору тексту.',
               cls: 'x-html-editor-tip'
           },
           justifyleft : {
               title: 'Вирвняти текст по лвй границ',
               text: 'Вирвнювання тексту по лвй границ.',
               cls: 'x-html-editor-tip'
           },
           justifycenter : {
               title: 'Вирвняти текст по центру',
               text: 'Вирвнювання тексту по центру.',
               cls: 'x-html-editor-tip'
           },
           justifyright : {
               title: 'Вирвняти текст по правй границ',
               text: 'Вирвнювання тексту по правй границ.',
               cls: 'x-html-editor-tip'
           },
           insertunorderedlist : {
               title: 'Маркери',
               text: 'Почати маркований список.',
               cls: 'x-html-editor-tip'
           },
           insertorderedlist : {
               title: 'Нумераця',
               text: 'Почати нумернований список.',
               cls: 'x-html-editor-tip'
           },
           createlink : {
               title: 'Вставити гперпосилання',
               text: 'Створення посилання з видленого тексту.',
               cls: 'x-html-editor-tip'
           },
           sourceedit : {
               title: 'Вихдний код',
               text: 'Переключитись на вихдний код.',
               cls: 'x-html-editor-tip'
           }
        }
   });
}

if(Ext.grid.GridView){
   Ext.apply(Ext.grid.GridView.prototype, {
      sortAscText  : "Сортувати по зростанню",
      sortDescText : "Сортувати по спаданню",
      lockText     : "Закрпити колонку",
      unlockText   : "Зняти закрплення колонки",
      columnsText  : "Колонки"
   });
}

if(Ext.grid.PropertyColumnModel){
   Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
      nameText   : "Назва",
      valueText  : "Значення",
      dateFormat : "j.m.Y"
   });
}

if(Ext.layout.BorderLayout.SplitRegion){
   Ext.apply(Ext.layout.BorderLayout.SplitRegion.prototype, {
      splitTip            : "Тягнть для змни розмру.",
      collapsibleSplitTip : "Тягнть для змни розмру. Подвйний клк схова панель."
   });
}

