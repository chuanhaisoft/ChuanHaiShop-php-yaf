/// <reference path='../../../common/vswd-ext.js' />

/*
* allows for downloading of grid data (store) directly into excel
* Method: extracts data of gridPanel store, uses columnModel to construct XML excel document,
* converts to Base64, then loads everything into a data URL link.
*
* @author        Animal        <extjs support team>
*
*/

/**
* base64 encode / decode
* 
* @location     http://www.webtoolkit.info/
*
*/

var Base64 = {

    // private property
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

    // public method for encoding
    encode: function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;

        input = Base64._utf8_encode(input);

        while (i < input.length) {

            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }

            output = output +
            this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
            this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

        }

        return output;
    },

    // public method for decoding
    decode: function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

        while (i < input.length) {

            enc1 = this._keyStr.indexOf(input.charAt(i++));
            enc2 = this._keyStr.indexOf(input.charAt(i++));
            enc3 = this._keyStr.indexOf(input.charAt(i++));
            enc4 = this._keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            output = output + String.fromCharCode(chr1);

            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }

        }

        output = Base64._utf8_decode(output);

        return output;

    },

    // private method for UTF-8 encoding
    _utf8_encode: function (string) {
        string = string.replace(/\r\n/g, "\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if ((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    // private method for UTF-8 decoding
    _utf8_decode: function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while (i < utftext.length) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if ((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i + 1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i + 1);
                c3 = utftext.charCodeAt(i + 2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}

Ext.override(Ext.grid.GridPanel, {
    getExcelXml: function (includeHidden, config) {
        var worksheet = this.createWorksheet(includeHidden, config);
        var totalWidth = this.getColumnModel().getTotalWidth(includeHidden);
        var innertitle = '';

        if (config && config.title) {
            innertitle = config.title;
        } else {
            innertitle = this.title;
        }
        return '<xml version="1.0" encoding="utf-8">' +
            '<ss:Workbook xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns:o="urn:schemas-microsoft-com:office:office">' +
            '<o:DocumentProperties><o:Title>' + innertitle + '</o:Title></o:DocumentProperties>' +
            '<ss:ExcelWorkbook>' +
                '<ss:WindowHeight>' + worksheet.height + '</ss:WindowHeight>' +
                '<ss:WindowWidth>' + worksheet.width + '</ss:WindowWidth>' +
                '<ss:ProtectStructure>False</ss:ProtectStructure>' +
                '<ss:ProtectWindows>False</ss:ProtectWindows>' +
            '</ss:ExcelWorkbook>' +
            '<ss:Styles>' +
                '<ss:Style ss:ID="Default">' +
                    '<ss:Alignment ss:Vertical="Top" ss:WrapText="1" />' +
                    '<ss:Font ss:FontName="arial" ss:Size="10" />' +
                    '<ss:Borders>' +
                        '<ss:Border ss:Color="#e4e4e4" ss:Weight="1" ss:LineStyle="Continuous" ss:Position="Top" />' +
                        '<ss:Border ss:Color="#e4e4e4" ss:Weight="1" ss:LineStyle="Continuous" ss:Position="Bottom" />' +
                        '<ss:Border ss:Color="#e4e4e4" ss:Weight="1" ss:LineStyle="Continuous" ss:Position="Left" />' +
                        '<ss:Border ss:Color="#e4e4e4" ss:Weight="1" ss:LineStyle="Continuous" ss:Position="Right" />' +
                    '</ss:Borders>' +
                    '<ss:Interior />' +
                    '<ss:NumberFormat />' +
                    '<ss:Protection />' +
                '</ss:Style>' +
                '<ss:Style ss:ID="title">' +
                    '<ss:Borders />' +
                    '<ss:Font />' +
                    '<ss:Alignment ss:WrapText="1" ss:Vertical="Center" ss:Horizontal="Center" />' +
                    '<ss:NumberFormat ss:Format="@" />' +
                '</ss:Style>' +
                '<ss:Style ss:ID="headercell">' +
                    '<ss:Font ss:Bold="1" ss:Size="10" />' +
                    '<ss:Alignment ss:WrapText="1" ss:Horizontal="Center" />' +
                    '<ss:Interior ss:Pattern="Solid" ss:Color="#A3C9F1" />' +
                '</ss:Style>' +
                '<ss:Style ss:ID="even">' +
                    '<ss:Interior ss:Pattern="Solid" ss:Color="#CCFFFF" />' +
                '</ss:Style>' +
                '<ss:Style ss:Parent="even" ss:ID="evendate">' +
        //                    '<ss:NumberFormat ss:Format="[ENG][$-409]dd\-mmm\-yyyy;@" />' +
                    '<ss:NumberFormat ss:Format="yyyy\-m\-d;@" />' +
                '</ss:Style>' +
                '<ss:Style ss:Parent="even" ss:ID="evenint">' +
                    '<ss:NumberFormat ss:Format="0" />' +
                '</ss:Style>' +
                '<ss:Style ss:Parent="even" ss:ID="evenfloat">' +
                    '<ss:NumberFormat ss:Format="0.00" />' +
                '</ss:Style>' +
                '<ss:Style ss:ID="odd">' +
                    '<ss:Interior ss:Pattern="Solid" ss:Color="#CCCCFF" />' +
                '</ss:Style>' +
                '<ss:Style ss:Parent="odd" ss:ID="odddate">' +
                    '<ss:NumberFormat ss:Format="[ENG][$-409]dd\-mmm\-yyyy;@" />' +
                '</ss:Style>' +
                '<ss:Style ss:Parent="odd" ss:ID="oddint">' +
                    '<ss:NumberFormat ss:Format="0" />' +
                '</ss:Style>' +
                '<ss:Style ss:Parent="odd" ss:ID="oddfloat">' +
                    '<ss:NumberFormat ss:Format="0.00" />' +
                '</ss:Style>' +
            '</ss:Styles>' +
            worksheet.xml +
            '</ss:Workbook>';
    },

    createWorksheet: function (includeHidden, config) {
        // Calculate cell data types and extra class names which affect formatting
        var cellType = [];
        var cellTypeClass = [];
        var cm = this.getColumnModel();
        var totalWidthInPixels = 0;
        var colXml = '';
        var headerXml = '';
        var visibleColumnCountReduction = 0;
        var innertitle = '';
        var innerstore = null;

        if (config && config.title) {
            innertitle = config.title;
        } else {
            innertitle = this.title;
        }
        if (!innertitle || innertitle == '') {
            innertitle = 'Main Title';
        }

        if (config && config.store) {
            innerstore = config.store;
        } else {
            innerstore = this.store;
        }
        for (var i = 0; i < cm.getColumnCount(); i++) {
            if (includeHidden || !cm.isHidden(i)) {
                //debugger;
                var w = cm.getColumnWidth(i)
                totalWidthInPixels += w;
                if ((cm.getColumnHeader(i) === "") || (cm.getColumnId(i) === "checker") || ((cm.getColumnId(i) === "actions") && (cm.getColumnHeader(i) === "Actions"))) {
                    cellType.push("None");
                    cellTypeClass.push("");
                    ++visibleColumnCountReduction;
                }
                else {
                    colXml += '<ss:Column ss:AutoFitWidth="1" ss:Width="' + w + '" />';
                    headerXml += '<ss:Cell ss:StyleID="headercell">' +
                        '<ss:Data ss:Type="String">' + cm.getColumnHeader(i) + '</ss:Data>' +
                        '<ss:NamedCell ss:Name="Print_Titles" /></ss:Cell>';
                    var fld = innerstore.recordType.prototype.fields.get(cm.getDataIndex(i));
                    switch (fld.type) {
                        case "int":
                            cellType.push("Number");
                            cellTypeClass.push("int");
                            break;
                        case "float":
                            cellType.push("Number");
                            cellTypeClass.push("float");
                            break;
                        case "bool":
                        case "boolean":
                            cellType.push("String");
                            cellTypeClass.push("");
                            break;
                        case "date":
                            cellType.push("DateTime");
                            cellTypeClass.push("date");
                            break;
                        default:
                            cellType.push("String");
                            cellTypeClass.push("");
                            break;
                    }
                }
            }
        }
        var visibleColumnCount = cellType.length - visibleColumnCountReduction;

        var result = {
            height: 9000,
            width: Math.floor(totalWidthInPixels * 30) + 50
        };

        // Generate worksheet header details.
        var t = '<ss:Worksheet ss:Name="' + innertitle + '">' +
            '<ss:Names>' +
                '<ss:NamedRange ss:Name="Print_Titles" ss:RefersTo="=\'' + innertitle + '\'!R1:R2" />' +
            '</ss:Names>' +
            '<ss:Table x:FullRows="1" x:FullColumns="1"' +
                ' ss:ExpandedColumnCount="' + (visibleColumnCount) +
                '" ss:ExpandedRowCount="' + (innerstore.getCount() + 2) + '">' +
                colXml +
                '<ss:Row ss:Height="38">' +
                    '<ss:Cell ss:StyleID="title" ss:MergeAcross="' + (visibleColumnCount - 1) + '">' +
                      '<ss:Data xmlns:html="http://www.w3.org/TR/REC-html40" ss:Type="String">' +
                        '<html:B>' + innertitle + '</html:B></ss:Data><ss:NamedCell ss:Name="Print_Titles" />' +
                    '</ss:Cell>' +
                '</ss:Row>' +
                '<ss:Row ss:AutoFitHeight="1">' +
                headerXml +
                '</ss:Row>';

        // Generate the data rows from the data in the Store
        for (var i = 0, it = innerstore.data.items, l = it.length; i < l; i++) {
            t += '<ss:Row>';
            var cellClass = (i & 1) ? 'odd' : 'even';
            r = it[i].data;
            var k = 0;
            for (var j = 0; j < cm.getColumnCount(); j++) {
                if (includeHidden || !cm.isHidden(j)) {
                    //debugger;
                    var v = r[cm.getDataIndex(j)];
                    if (typeof cm.config[j].renderer == 'function' && cellType[k] != 'DateTime') {
                        var m = {};
                        v = cm.config[j].renderer(v, m, it[i], i, j, innerstore);
                        var re = /<[^>]+>/g;
                        if (v) {
                            v = v.toString().replace(re, '');
                        } else {
                            v = '';
                        }
                    }
                    if (cellType[k] !== "None") {

                        if (!v) {
                            t += '<ss:Cell ss:StyleID="' + cellClass + '"></ss:Cell>';
                        } else {
                            t += '<ss:Cell ss:StyleID="' + cellClass + cellTypeClass[k] + '"><ss:Data ss:Type="' + cellType[k] + '">';
                            if (cellType[k] == 'DateTime') {
                                t += v.format('Y-m-d\\TH:i:s.000'); // no space betwen  i: s
                            } else {
                                v = EncodeValue(v);

                                t += v;
                            }
                            t += '</ss:Data></ss:Cell>';
                        }
                    }
                    k++;
                }
            }
            t += '</ss:Row>';
        }

        result.xml = t + '</ss:Table>' +
            '<x:WorksheetOptions>' +
                '<x:PageSetup>' +
                    '<x:Layout x:CenterHorizontal="1" x:Orientation="Landscape" />' +
                    '<x:Footer x:Data="Page &amp;P of &amp;N" x:Margin="0.5" />' +
                    '<x:PageMargins x:Top="0.5" x:Right="0.5" x:Left="0.5" x:Bottom="0.8" />' +
                '</x:PageSetup>' +
                '<x:FitToPage />' +
                '<x:Print>' +
                    '<x:PrintErrors>Blank</x:PrintErrors>' +
                    '<x:FitWidth>1</x:FitWidth>' +
                    '<x:FitHeight>32767</x:FitHeight>' +
                    '<x:ValidPrinterInfo />' +
                    '<x:VerticalResolution>600</x:VerticalResolution>' +
                '</x:Print>' +
                '<x:Selected />' +
                '<x:DoNotDisplayGridlines />' +
                '<x:ProtectObjects>False</x:ProtectObjects>' +
                '<x:ProtectScenarios>False</x:ProtectScenarios>' +
            '</x:WorksheetOptions>' +
        '</ss:Worksheet>';

        //Add function to encode value,2009-4-21
        function EncodeValue(v) {
            var re = /[\r|\n]/g; //Handler enter key
            v = v.toString().replace(re, '&#10;');

            return v;
        };

        return result;
    }
});


Ext.ux.clone = function (obj) {
    if (obj == null || typeof (obj) != 'object')
        return obj;
    if (Ext.isDate(obj))
        return obj.clone();
    var cloneArray = function (arr) {
        var len = arr.length;
        var out = [];
        if (len > 0) {
            for (var i = 0; i < len; ++i)
                out[i] = Ext.ux.clone(arr[i]);
        }
        return out;
    };
    var c = new obj.constructor();
    for (var prop in obj) {
        var p = obj[prop];
        if (Ext.isArray(p))
            c[prop] = cloneArray(p);
        else if (typeof p == 'object')
            c[prop] = Ext.ux.clone(p);
        else
            c[prop] = p;
    }
    return c;
};