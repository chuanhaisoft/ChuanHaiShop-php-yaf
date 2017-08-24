/*! flypanels - v2.0.5 - 2016-11-08
* https://github.com/SubZane/flyPanels
* Copyright (c) 2016 Andreas Norman; Licensed MIT */
(function (root, factory) {
	if (typeof define === 'function' && define.amd) {
		define([], factory(root));
	} else if (typeof exports === 'object') {
		module.exports = factory(root);
	} else {
		root.flyPanels = factory(root);
	}
})(typeof global !== 'undefined' ? global : this.window || this.global, function (root) {

	'use strict';

	//
	// Variables
	//

	var flyPanels = {}; // Object for public APIs
	var supports = !!document.querySelector && !!root.addEventListener; // Feature test
	var settings, eventTimeout;
	var el;
	var innerHeight = document.documentElement.clientHeight;
	var panelWidth = document.querySelector('.flypanels-left').clientWidth;
	var scrollbarWidth;
	var redrawOnResize = true;
	// Need to get the topbar height in order to later set the correct height of .flypanels-content
	var topBarHeight = document.querySelector('.flypanels-topbar').clientHeight;

	var treeMenu = {
		init: false,
		expandHandler: 'a.expand'
	};

	var search = {
		init: false,
		saveQueryCookie: false,
		searchPanel: document.querySelector('.offcanvas [data-panel="search"]')
	};

	// Default settings
	var defaults = {
		transitiontime: 200,
		container: '.flypanels-container',
		initClass: 'js-flyPanels',
		onInit: function () {},
		onInitTreeMenu: function () {},
		onOpen: function () {},
		onClose: function () {},
		onOpenLeft: function () {},
		onCloseLeft: function () {},
		onOpenRight: function () {},
		onCloseRight: function () {},
		afterWindowResize: function () {},
		OnAttachEvents: function () {},
		onWindowResize: function () {},
		onEmptySearchResult: function () {},
		onSearchError: function () {},
		onSearchSuccess: function () {},
		onInitSearch: function () {},
		onDestroy: function () {}
	};


	//
	// Methods
	//

	var detectScrollbarWidth = function () {
		// Create the measurement node
		var scrollDiv = document.createElement('div');
		scrollDiv.className = 'scrollbar-measure';
		document.body.appendChild(scrollDiv);

		// Get the scrollbar width
		scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
		//console.warn(scrollbarWidth); // Mac:  15

		// Delete the DIV
		document.body.removeChild(scrollDiv);
	};

	var setHeight = function () {
		document.querySelector('.flypanels-left').style.height = (innerHeight + 'px');
		document.querySelector('.flypanels-right').style.height = (innerHeight + 'px');
		var overlay = document.querySelector('.flypanels-overlay');
		if (overlay) {
			overlay.style.height = innerHeight;
		}
	};

	var initTreeMenu = function () {
		var maxHeight = innerHeight - topBarHeight;
		if (isAndroid() || isIOS()) {
			document.querySelector('.flypanels-treemenu').classList.add('touch');
		}

		var expanders = document.querySelectorAll('.flypanels-treemenu li.haschildren ' + settings.treeMenu.expandHandler);
		forEach(expanders, function (expandLink, value) {
			expandLink.addEventListener('click', function (e) {
				this.parentElement.parentElement.classList.toggle('expanded');
				e.preventDefault();
			});
		});
		hook('onInitTreeMenu');
	};

	var close = function () {
		closeLeft();
		closeRight();
		onClose();
	};

	var onCloseLeft = function () {
		document.querySelector('body').classList.remove('flypanels-open');
		document.querySelector('html').classList.remove('flypanels-open');
		hook('onCloseLeft');
	};

	var onCloseRight = function () {
		document.querySelector('body').classList.remove('flypanels-open');
		document.querySelector('html').classList.remove('flypanels-open');
		hook('onCloseRight');
	};

	var onOpenLeft = function () {
		document.querySelector('body').classList.add('flypanels-open');
		document.querySelector('html').classList.add('flypanels-open');
		hook('onOpenLeft');
	};

	var onOpenRight = function () {
		document.querySelector('body').classList.add('flypanels-open');
		document.querySelector('html').classList.add('flypanels-open');
		hook('onOpenRight');
	};

	var onOpen = function () {
		var overlayDiv = document.createElement('div');
		overlayDiv.classList.add('overlay');
		overlayDiv.setAttribute('id', 'flypanels-overlay');
		document.querySelector('.flypanels-content').appendChild(overlayDiv);

		('click touchmove touchend touchleave touchcancel'.split(' ')).forEach(function (event) {
			document.querySelector('#flypanels-overlay').addEventListener(event, function (e) {
				close();
				e.preventDefault();
			});
		});
		hook('onOpen');
	};

	var onClose = function () {
		var overlay = document.querySelector('#flypanels-overlay');
		if (overlay !== null) {
			overlay.classList.add('closing');
			setTimeout(function () {
				if (overlay) {
					overlay.remove();
				}
			}, settings.transitiontime);
		}
		hook('onClose');
	};

	var openRight = function (panel) {
		el.classList.add('openright');
		document.querySelector('.flypanels-right').querySelector('[data-panel="' + panel + '"]').style.display = 'block';
		onOpenRight();
		onOpen();
	};

	var closeRight = function () {
		onClose();
		el.classList.add('closing');
		setTimeout(function () {
			el.classList.remove('openright');
			el.classList.remove('closing');
			var panels = document.querySelectorAll('.flypanels-right .panelcontent');
			forEach(panels, function (panel, value) {
				panel.style.display = 'none';
			});
			onCloseRight();
		}, settings.transitiontime);
	};

	var openLeft = function (panel) {
		el.classList.add('openleft');
		document.querySelector('.flypanels-left').querySelector('[data-panel="' + panel + '"]').style.display = 'block';
		onOpenLeft();
		onOpen();
	};

	var closeLeft = function () {
		onClose();
		el.classList.add('closing');
		setTimeout(function () {
			el.classList.remove('closing');
			el.classList.remove('openleft');
			var panels = document.querySelectorAll('.flypanels-left .panelcontent');
			forEach(panels, function (panel, value) {
				panel.style.display = 'none';
			});
			onCloseLeft();
		}, settings.transitiontime);
	};

	var afterWindowResize = function () {
		innerHeight = window.innerHeight;
		setHeight();
		hook('afterWindowResize');
	};

	var attachEvents = function () {
		// Prevent scroll if content doesn't need scroll.
		var panelcontent_panels = document.querySelectorAll('.panelcontent');
		forEach(panelcontent_panels, function (index, value) {
			index.addEventListener('touchmove', function (e) {
				if (index.scrollHeight <= parseInt(innerHeight, 10)) {
					e.preventDefault();
				}
			});
		});

		document.querySelector('.flypanels-button-left').addEventListener('click', function () {
			var panel = this.getAttribute('data-panel');
			if (hasClass(document.querySelector('.flypanels-container'), 'openleft')) {
				closeLeft();
			} else {
				if (hasClass(document.querySelector('.flypanels-container'), 'openright')) {
					closeRight();
				} else {
					openLeft(panel);
				}
			}
		});

		document.querySelector('.flypanels-button-right').addEventListener('click', function () {
			var panel = this.getAttribute('data-panel');
			if (hasClass(document.querySelector('.flypanels-container'), 'openright')) {
				closeRight();
			} else {
				if (hasClass(document.querySelector('.flypanels-container'), 'openleft')) {
					closeLeft();
				} else {
					openRight(panel);
				}
			}
		});

		if (redrawOnResize === true) {
			window.onresize = onWindowResize;
		}

		// Listen for orientation changes
		window.addEventListener('orientationchange', function () {
			setHeight();
		});
		hook('OnAttachEvents');
	};

	var onWindowResize = function () {
		var resizeTimer;
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(afterWindowResize, 100);
		hook('onWindowResize');
	};

	var hasClass = function (element, classname) {
		if (typeof element.classList !== 'undefined' && element.classList.contains(classname)) {
			return true;
		} else {
			return false;
		}
	};

	var isAndroid = function () {
		if (navigator.userAgent.toLowerCase().indexOf('android') > -1) {
			return true;
		} else {
			return false;
		}
	};

	var isIOS = function () {
		if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/iPod/i))) {
			return true;
		} else {
			return false;
		}
	};

	// Search functions

	var executeSearch = function (query) {
		searchError('hide');
		settings.search.searchPanel.querySelector('.flypanels-searchresult').innerHTML = '';
		settings.search.searchPanel.querySelector('.resultinfo .query').innerHTML = query;
		settings.search.searchPanel.querySelector('.resultinfo .num').innerHTML = 0;
		var jsonURL = settings.search.searchPanel.querySelector('.searchbox').getAttribute('data-searchurl');
		jsonURL = jsonURL + '&q=' + query;

		var request = new XMLHttpRequest();
		request.open('GET', jsonURL, true);

		request.onload = function () {
			if (request.status >= 200 && request.status < 400) {
				// Success!
				var response = parseJSON(request.response);
				if (response !== false) {
					var foundResults = response.Items.length;
					if (foundResults > 0) {
						if (settings.search.saveQueryCookie === true) {
							cookies.set('searchQuery', query, null, '/');
						}
						var output = buildResultsList(response.Items);

						// Render html
						settings.search.searchPanel.querySelector('.resultinfo .query').innerHTML = query;
						settings.search.searchPanel.querySelector('.resultinfo .num').innerHTML = foundResults;
						settings.search.searchPanel.querySelector('.flypanels-searchresult').innerHTML = output;
						searchProgress('hide');
						settings.search.searchPanel.querySelector('.resultinfo').style.display = 'block';
						settings.search.searchPanel.querySelector('.flypanels-searchresult').style.display = 'block';
						hook('onSearchSuccess');
					} else {
						hook('onEmptySearchResult');
						if (settings.search.saveQueryCookie === true) {
							cookies.remove('searchQuery', '/');
						}
						searchProgress('hide');
						searchError('show');
					}
				} else {
					hook('onEmptySearchResult');
					if (settings.search.saveQueryCookie === true) {
						cookies.remove('searchQuery', '/');
					}
					searchProgress('hide');
					searchError('show');
				}
			} else {
				// We reached our target server, but it returned an error
				searchError('show');
				searchProgress('hide');
				hook('onSearchError');
			}
		};
		request.onerror = function () {
			// There was a connection error of some sort
			searchError('show');
		};
		request.send();
	};

	var buildResultsList = function (results) {
		var output = '<ul>';
		for (var i in results) {
			if (results[i].Type === 'Page') {
				output += '<li><a href="' + results[i].LinkUrl + '"><span class="link">' + results[i].Header + '</span>  <span class="type"><i class="fa page"></i></span></a>';
			} else {
				output += '<li><a href="' + results[i].LinkUrl + '"><span class="link">' + results[i].Header + '</span>  <span class="type"><i class="fa doc"></i></span></a>';
			}
		}
		output += '</ul>';
		return output;
	};

	var parseJSON = function (jsonString) {
		try {
			var o = JSON.parse(jsonString);
			// Handle non-exception-throwing cases:
			// Neither JSON.parse(false) or JSON.parse(1234) throw errors, hence the type-checking,
			// but... JSON.parse(null) returns 'null', and typeof null === "object",
			// so we must check for that, too.
			if (o && typeof o === 'object' && o !== null) {
				return o;
			}
		} catch (e) {}
		console.warn('Error parsing JSON file');
		return false;
	};

	var initSearch = function () {
		if (isAndroid() || isIOS()) {
			document.querySelector('.flypanels-searchresult').classList.add('touch');
		}
		settings.search.searchPanel.querySelector('.searchbutton').addEventListener('click', function (event) {
			event.preventDefault();
			searchProgress('show');
			executeSearch(settings.search.searchPanel.querySelector('.searchbox input').value);
		});

		settings.search.searchPanel.querySelector('.searchbox input').addEventListener('keydown', function (event) {
			if (event.which === 13) {
				searchProgress('show');
				executeSearch(this.value);
				this.blur();
			}
		});

		if (cookies.has('searchQuery') === true && settings.search.saveQueryCookie === true) {
			executeSearch(cookies.get('searchQuery'));
		}
		hook('onInitSearch');
	};

	var searchError = function (state) {
		if (state === 'hide') {
			settings.search.searchPanel.querySelector('.errormsg').style.display = 'none';
		} else {
			settings.search.searchPanel.querySelector('.errormsg').style.display = 'block';
		}
	};

	var searchProgress = function (state) {
		if (state === 'hide') {
			settings.search.searchPanel.querySelector('.loading').style.display = 'none';
		} else {
			settings.search.searchPanel.querySelector('.loading').style.display = 'block';
		}
	};

	var cookies = {
		get: function (sKey) {
			if (!sKey) {
				return null;
			}
			return decodeURIComponent(document.cookie.replace(new RegExp('(?:(?:^|.*;)\\s*' + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, '\\$&') + '\\s*\\=\\s*([^;]*).*$)|^.*$'), '$1')) || null;
		},
		set: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
			if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) {
				return false;
			}
			var sExpires = '';
			if (vEnd) {
				switch (vEnd.constructor) {
				case Number:
					sExpires = vEnd === Infinity ? '; expires=Fri, 31 Dec 9999 23:59:59 GMT' : '; max-age=' + vEnd;
					break;
				case String:
					sExpires = '; expires=' + vEnd;
					break;
				case Date:
					sExpires = '; expires=' + vEnd.toUTCString();
					break;
				}
			}
			document.cookie = encodeURIComponent(sKey) + '=' + encodeURIComponent(sValue) + sExpires + (sDomain ? '; domain=' + sDomain : '') + (sPath ? '; path=' + sPath : '') + (bSecure ? '; secure' : '');
			return true;
		},
		remove: function (sKey, sPath, sDomain) {
			if (!this.has(sKey)) {
				return false;
			}
			document.cookie = encodeURIComponent(sKey) + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT' + (sDomain ? '; domain=' + sDomain : '') + (sPath ? '; path=' + sPath : '');
			return true;
		},
		has: function (sKey) {
			if (!sKey) {
				return false;
			}
			return (new RegExp('(?:^|;\\s*)' + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, '\\$&') + '\\s*\\=')).test(document.cookie);
		},
		keys: function () {
			var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, '').split(/\s*(?:\=[^;]*)?;\s*/);
			for (var nLen = aKeys.length, nIdx = 0; nIdx < nLen; nIdx++) {
				aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]);
			}
			return aKeys;
		}
	};

	/**
	 * Callback hooks.
	 * Usage: In the defaults object specify a callback function:
	 * hookName: function() {}
	 * Then somewhere in the plugin trigger the callback:
	 * hook('hookName');
	 */
	var hook = function (hookName) {
		if (settings[hookName] !== undefined) {
			// Call the user defined function.
			// Scope is set to the jQuery element we are operating on.
			settings[hookName].call(el);
		}
	};

	/**
	 * Merge defaults with user options
	 * @private
	 * @param {Object} defaults Default settings
	 * @param {Object} options User options
	 * @returns {Object} Merged values of defaults and options
	 */
	var extend = function (defaults, options) {
		var extended = {};
		forEach(defaults, function (value, prop) {
			extended[prop] = defaults[prop];
		});
		forEach(options, function (value, prop) {
			extended[prop] = options[prop];
		});
		return extended;
	};

	/**
	 * A simple forEach() implementation for Arrays, Objects and NodeLists
	 * @private
	 * @param {Array|Object|NodeList} collection Collection of items to iterate
	 * @param {Function} callback Callback function for each iteration
	 * @param {Array|Object|NodeList} scope Object/NodeList/Array that forEach is iterating over (aka `this`)
	 */
	var forEach = function (collection, callback, scope) {
		if (Object.prototype.toString.call(collection) === '[object Object]') {
			for (var prop in collection) {
				if (Object.prototype.hasOwnProperty.call(collection, prop)) {
					callback.call(scope, collection[prop], prop, collection);
				}
			}
		} else {
			for (var i = 0, len = collection.length; i < len; i++) {
				callback.call(scope, collection[i], i, collection);
			}
		}
	};

	/**
	 * Destroy the current initialization.
	 * @public
	 */
	flyPanels.destroy = function () {

		// If plugin isn't already initialized, stop
		if (!settings) {
			return;
		}

		// Remove init class for conditional CSS
		document.documentElement.classList.remove(settings.initClass);

		// @todo Undo any other init functions...

		// Remove event listeners
		document.removeEventListener('click', eventHandler, false);

		// Reset variables
		settings = null;
		eventTimeout = null;
		hook('onDestroy');
	};

	/**
	 * Initialize Plugin
	 * @public
	 * @param {Object} options User settings
	 */
	flyPanels.init = function (options) {
		// feature test
		if (!supports) {
			return;
		}

		// Destroy any existing initializations
		flyPanels.destroy();
		detectScrollbarWidth();

		options.treeMenu = extend(treeMenu, options.treeMenu || {});
		options.search = extend(search, options.search || {});

		// Merge user options with defaults
		settings = extend(defaults, options || {});

		el = document.querySelector(settings.container);

		setHeight();
		attachEvents();

		if (settings.search.init) {
			initSearch();
		}
		if (settings.treeMenu.init) {
			initTreeMenu();
		}

		// Remove preload class when page has loaded to allow transitions/animations
		el.classList.remove('preload');
		hook('onInit');
	};

	flyPanels.closePanels = function () {
		close();
	};
	//
	// Public APIs
	//

	return flyPanels;
});
