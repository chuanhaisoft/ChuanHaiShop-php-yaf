Ext.namespace("Ext.om");

Ext.om.PagingLink = function(container, config) {
    Ext.apply(this, config);
    this.cursor = 0;
    this.render(container);
};

Ext.om.PagingLink.prototype = {
    pageSize: 20,
    shownNumbers: 10,

    totalText : null,
    firstText : "First",
    lastText : "Last",
    prevText: "Previous",
    nextText: "Next",
    numberText: "{page}",

    showFirst : false,
    showLast : false,

    render : function(container) {
        this.el = Ext.get(container);

        var ul = this.ul = this.el.createChild({tag: "ul", cls: "x-paging-list"});
        ul.on("click", this.onClick, this);
        ul.on("mouseover", this.onMouseOver, this);
        ul.on("mouseout", this.onMouseOut, this);

        if (this.totalText) {
            this.totalTemplate = new Ext.Template(this.totalText);
            this.totalTemplate.compile();
            this.total = ul.createChild({tag:"li", cls:"x-total-page"});
        }

        this.numberTemplate = new Ext.Template(this.numberText);
        this.numberTemplate.compile();

        if (this.showFirst) {
            this.first = ul.createChild({tag:"li", cls:"x-first-page disabled",
                                        children:{tag:"a", href:"#", html:this.firstText}});
        }

        this.prev = ul.createChild({tag:"li", cls:"x-prev-page disabled",
                                    children:{tag:"a", href:"#", html:this.prevText}});

        this.numbers = new Array();
        for (var i = 0; i < this.shownNumbers; i++) {
            var li = ul.createChild({tag:"li", cls:"x-page-number", children:{tag:"a", href:"#"}});
            li.setDisplayed(false);
            this.numbers[i] = li;
        }

        this.next = ul.createChild({tag:"li", cls:"x-next-page disabled",
                                    children:{tag:"a", href:"#", html:this.nextText}});

        if (this.showLast) {
            this.last = ul.createChild({tag:"li", cls:"x-last-page disabled",
                                        children:{tag:"a", href:"#", html:this.lastText}});
        }
    },

    repaint : function(cursor, total) {
        this.cursor = cursor;
        var sz = this.pageSize;
        var ap = Math.ceil((cursor+sz)/sz);
        var ps = total < sz ? 1 : Math.ceil(total/sz);

        if (this.total) {
            this.totalTemplate.overwrite(this.total, {
                "0": ps, // default parameter
                page: ap,
                pages: ps,
                start: (ap-1)*sz+1,
                end: Math.min(ap*sz, total),
                total: total
            });
        }

        if (ap == 1) {
            this.prev.addClass("disabled");
            this.prev.pageNo = null;
            if (this.first) {
                this.first.addClass("disabled");
                this.first.pageNo = null;
            }
        } else {
            this.prev.removeClass("disabled");
            this.prev.pageNo = ap-1;
            if (this.first) {
                this.first.removeClass("disabled");
                this.first.pageNo = 1;
            }
        }

        if (ap == ps) {
            this.next.addClass("disabled");
            this.next.pageNo = null;
            if (this.last) {
                this.last.addClass("disabled");
                this.last.pageNo = null;
            }
        } else {
            this.next.removeClass("disabled");
            this.next.pageNo = ap+1;
            if (this.last) {
                this.last.removeClass("disabled");
                this.last.pageNo = ps;
            }
        }

        var len = this.shownNumbers;
        if (len > 0) {
            var start = Math.floor(ap - len/2);
            var end = Math.floor(ap + len/2 - 1);
            if (start <= 0) {
                end += 1-start;
                start = 1;
            }
            if (end > ps) {
                if ((start -= (end-ps)) <= 0)
                    start = 1;
                end = ps;
            }

            var r = (start-1)*sz+1;
            for (var i = 0, n = start; n <= end; i++, n++, r += sz) {
                var li = this.numbers[i];
                this.numberTemplate.overwrite(li.child("a"), {
                    "0": n,
                    page: n,
                    start: r,
                    end: Math.min(r+sz-1, total)
                });
                li.pageNo = n;
                li.setDisplayed(true);
                li[n == ap ? "addClass" : "removeClass"]("selected");
            }
            for (; i < len; i++) {
                this.numbers[i].setDisplayed(false);
            }
        }
    },

    onLoad : function(ds, r, o) {
        this.repaint(o.params ? o.params.start : 0, ds.getTotalCount());
    },

    onClick : function(e) {
        var t = e.getTarget("li", this.ul, true);
        if (t && t.pageNo != null) {
            var sz = this.pageSize;
            var start = (t.pageNo-1)*sz;
            this.callback(start, sz);;
            t.blur();
            e.stopEvent();
        }
    },

    onMouseOver : function(e) {
        var t = e.getTarget("li", this.ul, true);
        if (t && t.pageNo != null) {
            t.addClass("hover");
        }
    },

    onMouseOut : function(e) {
        var t = e.getTarget("li", this.ul, true);
        t && t.removeClass("hover");
    },


    bind : function(ds) {
        if (ds) {
            ds.on("load", this.onLoad, this);
        }
    },

    unbind : function(ds){
        if (ds) {
            ds.un("load", this.onLoad, this);
        }
    }
}
