/*!
 * ApexCharts v3.44.0
 * (c) 2018-2023 ApexCharts
 * Released under the MIT License.
 */
(function (global, factory) {
	typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
		typeof define === 'function' && define.amd ? define(factory) :
			(global = typeof globalThis !== 'undefined' ? globalThis : global || self, global.ApexCharts = factory());
})(this, (function () {
	'use strict';

	function ownKeys(object, enumerableOnly) {
		var keys = Object.keys(object);

		if (Object.getOwnPropertySymbols) {
			var symbols = Object.getOwnPropertySymbols(object);

			if (enumerableOnly) {
				symbols = symbols.filter(function (sym) {
					return Object.getOwnPropertyDescriptor(object, sym).enumerable;
				});
			}

			keys.push.apply(keys, symbols);
		}

		return keys;
	}

	function _objectSpread2(target) {
		for (var i = 1; i < arguments.length; i++) {
			var source = arguments[i] != null ? arguments[i] : {};

			if (i % 2) {
				ownKeys(Object(source), true).forEach(function (key) {
					_defineProperty(target, key, source[key]);
				});
			} else if (Object.getOwnPropertyDescriptors) {
				Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
			} else {
				ownKeys(Object(source)).forEach(function (key) {
					Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
				});
			}
		}

		return target;
	}

	function _typeof(obj) {
		"@babel/helpers - typeof";

		if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
			_typeof = function (obj) {
				return typeof obj;
			};
		} else {
			_typeof = function (obj) {
				return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
			};
		}

		return _typeof(obj);
	}

	function _classCallCheck(instance, Constructor) {
		if (!(instance instanceof Constructor)) {
			throw new TypeError("Cannot call a class as a function");
		}
	}

	function _defineProperties(target, props) {
		for (var i = 0; i < props.length; i++) {
			var descriptor = props[i];
			descriptor.enumerable = descriptor.enumerable || false;
			descriptor.configurable = true;
			if ("value" in descriptor) descriptor.writable = true;
			Object.defineProperty(target, descriptor.key, descriptor);
		}
	}

	function _createClass(Constructor, protoProps, staticProps) {
		if (protoProps) _defineProperties(Constructor.prototype, protoProps);
		if (staticProps) _defineProperties(Constructor, staticProps);
		return Constructor;
	}

	function _defineProperty(obj, key, value) {
		if (key in obj) {
			Object.defineProperty(obj, key, {
				value: value,
				enumerable: true,
				configurable: true,
				writable: true
			});
		} else {
			obj[key] = value;
		}

		return obj;
	}

	function _inherits(subClass, superClass) {
		if (typeof superClass !== "function" && superClass !== null) {
			throw new TypeError("Super expression must either be null or a function");
		}

		subClass.prototype = Object.create(superClass && superClass.prototype, {
			constructor: {
				value: subClass,
				writable: true,
				configurable: true
			}
		});
		if (superClass) _setPrototypeOf(subClass, superClass);
	}

	function _getPrototypeOf(o) {
		_getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
			return o.__proto__ || Object.getPrototypeOf(o);
		};
		return _getPrototypeOf(o);
	}

	function _setPrototypeOf(o, p) {
		_setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
			o.__proto__ = p;
			return o;
		};

		return _setPrototypeOf(o, p);
	}

	function _isNativeReflectConstruct() {
		if (typeof Reflect === "undefined" || !Reflect.construct) return false;
		if (Reflect.construct.sham) return false;
		if (typeof Proxy === "function") return true;

		try {
			Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () { }));
			return true;
		} catch (e) {
			return false;
		}
	}

	function _assertThisInitialized(self) {
		if (self === void 0) {
			throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
		}

		return self;
	}

	function _possibleConstructorReturn(self, call) {
		if (call && (typeof call === "object" || typeof call === "function")) {
			return call;
		} else if (call !== void 0) {
			throw new TypeError("Derived constructors may only return object or undefined");
		}

		return _assertThisInitialized(self);
	}

	function _createSuper(Derived) {
		var hasNativeReflectConstruct = _isNativeReflectConstruct();

		return function _createSuperInternal() {
			var Super = _getPrototypeOf(Derived),
				result;

			if (hasNativeReflectConstruct) {
				var NewTarget = _getPrototypeOf(this).constructor;

				result = Reflect.construct(Super, arguments, NewTarget);
			} else {
				result = Super.apply(this, arguments);
			}

			return _possibleConstructorReturn(this, result);
		};
	}

	function _slicedToArray(arr, i) {
		return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest();
	}

	function _toConsumableArray(arr) {
		return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
	}

	function _arrayWithoutHoles(arr) {
		if (Array.isArray(arr)) return _arrayLikeToArray(arr);
	}

	function _arrayWithHoles(arr) {
		if (Array.isArray(arr)) return arr;
	}

	function _iterableToArray(iter) {
		if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
	}

	function _iterableToArrayLimit(arr, i) {
		var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"];

		if (_i == null) return;
		var _arr = [];
		var _n = true;
		var _d = false;

		var _s, _e;

		try {
			for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) {
				_arr.push(_s.value);

				if (i && _arr.length === i) break;
			}
		} catch (err) {
			_d = true;
			_e = err;
		} finally {
			try {
				if (!_n && _i["return"] != null) _i["return"]();
			} finally {
				if (_d) throw _e;
			}
		}

		return _arr;
	}

	function _unsupportedIterableToArray(o, minLen) {
		if (!o) return;
		if (typeof o === "string") return _arrayLikeToArray(o, minLen);
		var n = Object.prototype.toString.call(o).slice(8, -1);
		if (n === "Object" && o.constructor) n = o.constructor.name;
		if (n === "Map" || n === "Set") return Array.from(o);
		if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
	}

	function _arrayLikeToArray(arr, len) {
		if (len == null || len > arr.length) len = arr.length;

		for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];

		return arr2;
	}

	function _nonIterableSpread() {
		throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
	}

	function _nonIterableRest() {
		throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
	}

	/*
	 ** Generic functions which are not dependent on ApexCharts
	 */
	var Utils$1 = /*#__PURE__*/function () {
		function Utils() {
			_classCallCheck(this, Utils);
		}

		_createClass(Utils, [{
			key: "shadeRGBColor",
			value: function shadeRGBColor(percent, color) {
				var f = color.split(','),
					t = percent < 0 ? 0 : 255,
					p = percent < 0 ? percent * -1 : percent,
					R = parseInt(f[0].slice(4), 10),
					G = parseInt(f[1], 10),
					B = parseInt(f[2], 10);
				return 'rgb(' + (Math.round((t - R) * p) + R) + ',' + (Math.round((t - G) * p) + G) + ',' + (Math.round((t - B) * p) + B) + ')';
			}
		}, {
			key: "shadeHexColor",
			value: function shadeHexColor(percent, color) {
				var f = parseInt(color.slice(1), 16),
					t = percent < 0 ? 0 : 255,
					p = percent < 0 ? percent * -1 : percent,
					R = f >> 16,
					G = f >> 8 & 0x00ff,
					B = f & 0x0000ff;
				return '#' + (0x1000000 + (Math.round((t - R) * p) + R) * 0x10000 + (Math.round((t - G) * p) + G) * 0x100 + (Math.round((t - B) * p) + B)).toString(16).slice(1);
			} // beautiful color shading blending code
			// http://stackoverflow.com/questions/5560248/programmatically-lighten-or-darken-a-hex-color-or-rgb-and-blend-colors

		}, {
			key: "shadeColor",
			value: function shadeColor(p, color) {
				if (Utils.isColorHex(color)) {
					return this.shadeHexColor(p, color);
				} else {
					return this.shadeRGBColor(p, color);
				}
			}
		}], [{
			key: "bind",
			value: function bind(fn, me) {
				return function () {
					return fn.apply(me, arguments);
				};
			}
		}, {
			key: "isObject",
			value: function isObject(item) {
				return item && _typeof(item) === 'object' && !Array.isArray(item) && item != null;
			} // Type checking that works across different window objects

		}, {
			key: "is",
			value: function is(type, val) {
				return Object.prototype.toString.call(val) === '[object ' + type + ']';
			}
		}, {
			key: "listToArray",
			value: function listToArray(list) {
				var i,
					array = [];

				for (i = 0; i < list.length; i++) {
					array[i] = list[i];
				}

				return array;
			} // to extend defaults with user options
			// credit: http://stackoverflow.com/questions/27936772/deep-object-merging-in-es6-es7#answer-34749873

		}, {
			key: "extend",
			value: function extend(target, source) {
				var _this = this;

				if (typeof Object.assign !== 'function') {

					(function () {
						Object.assign = function (target) {

							if (target === undefined || target === null) {
								throw new TypeError('Cannot convert undefined or null to object');
							}

							var output = Object(target);

							for (var index = 1; index < arguments.length; index++) {
								var _source = arguments[index];

								if (_source !== undefined && _source !== null) {
									for (var nextKey in _source) {
										if (_source.hasOwnProperty(nextKey)) {
											output[nextKey] = _source[nextKey];
										}
									}
								}
							}

							return output;
						};
					})();
				}

				var output = Object.assign({}, target);

				if (this.isObject(target) && this.isObject(source)) {
					Object.keys(source).forEach(function (key) {
						if (_this.isObject(source[key])) {
							if (!(key in target)) {
								Object.assign(output, _defineProperty({}, key, source[key]));
							} else {
								output[key] = _this.extend(target[key], source[key]);
							}
						} else {
							Object.assign(output, _defineProperty({}, key, source[key]));
						}
					});
				}

				return output;
			}
		}, {
			key: "extendArray",
			value: function extendArray(arrToExtend, resultArr) {
				var extendedArr = [];
				arrToExtend.map(function (item) {
					extendedArr.push(Utils.extend(resultArr, item));
				});
				arrToExtend = extendedArr;
				return arrToExtend;
			} // If month counter exceeds 12, it starts again from 1

		}, {
			key: "monthMod",
			value: function monthMod(month) {
				return month % 12;
			}
		}, {
			key: "clone",
			value: function clone(source) {
				if (Utils.is('Array', source)) {
					var cloneResult = [];

					for (var i = 0; i < source.length; i++) {
						cloneResult[i] = this.clone(source[i]);
					}

					return cloneResult;
				} else if (Utils.is('Null', source)) {
					// fixes an issue where null values were converted to {}
					return null;
				} else if (Utils.is('Date', source)) {
					return source;
				} else if (_typeof(source) === 'object') {
					var _cloneResult = {};

					for (var prop in source) {
						if (source.hasOwnProperty(prop)) {
							_cloneResult[prop] = this.clone(source[prop]);
						}
					}

					return _cloneResult;
				} else {
					return source;
				}
			}
		}, {
			key: "log10",
			value: function log10(x) {
				return Math.log(x) / Math.LN10;
			}
		}, {
			key: "roundToBase10",
			value: function roundToBase10(x) {
				return Math.pow(10, Math.floor(Math.log10(x)));
			}
		}, {
			key: "roundToBase",
			value: function roundToBase(x, base) {
				return Math.pow(base, Math.floor(Math.log(x) / Math.log(base)));
			}
		}, {
			key: "parseNumber",
			value: function parseNumber(val) {
				if (val === null) return val;
				return parseFloat(val);
			}
		}, {
			key: "stripNumber",
			value: function stripNumber(num) {
				var precision = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 2;
				return Number.isInteger(num) ? num : parseFloat(num.toPrecision(precision));
			}
		}, {
			key: "randomId",
			value: function randomId() {
				return (Math.random() + 1).toString(36).substring(4);
			}
		}, {
			key: "noExponents",
			value: function noExponents(val) {
				var data = String(val).split(/[eE]/);
				if (data.length === 1) return data[0];
				var z = '',
					sign = val < 0 ? '-' : '',
					str = data[0].replace('.', ''),
					mag = Number(data[1]) + 1;

				if (mag < 0) {
					z = sign + '0.';

					while (mag++) {
						z += '0';
					}

					return z + str.replace(/^-/, '');
				}

				mag -= str.length;

				while (mag--) {
					z += '0';
				}

				return str + z;
			}
		}, {
			key: "getDimensions",
			value: function getDimensions(el) {
				var computedStyle = getComputedStyle(el, null);
				var elementHeight = el.clientHeight;
				var elementWidth = el.clientWidth;
				elementHeight -= parseFloat(computedStyle.paddingTop) + parseFloat(computedStyle.paddingBottom);
				elementWidth -= parseFloat(computedStyle.paddingLeft) + parseFloat(computedStyle.paddingRight);
				return [elementWidth, elementHeight];
			}
		}, {
			key: "getBoundingClientRect",
			value: function getBoundingClientRect(element) {
				var rect = element.getBoundingClientRect();
				return {
					top: rect.top,
					right: rect.right,
					bottom: rect.bottom,
					left: rect.left,
					width: element.clientWidth,
					height: element.clientHeight,
					x: rect.left,
					y: rect.top
				};
			}
		}, {
			key: "getLargestStringFromArr",
			value: function getLargestStringFromArr(arr) {
				return arr.reduce(function (a, b) {
					if (Array.isArray(b)) {
						b = b.reduce(function (aa, bb) {
							return aa.length > bb.length ? aa : bb;
						});
					}

					return a.length > b.length ? a : b;
				}, 0);
			} // http://stackoverflow.com/questions/5623838/rgb-to-hex-and-hex-to-rgb#answer-12342275

		}, {
			key: "hexToRgba",
			value: function hexToRgba() {
				var hex = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '#999999';
				var opacity = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0.6;

				if (hex.substring(0, 1) !== '#') {
					hex = '#999999';
				}

				var h = hex.replace('#', '');
				h = h.match(new RegExp('(.{' + h.length / 3 + '})', 'g'));

				for (var i = 0; i < h.length; i++) {
					h[i] = parseInt(h[i].length === 1 ? h[i] + h[i] : h[i], 16);
				}

				if (typeof opacity !== 'undefined') h.push(opacity);
				return 'rgba(' + h.join(',') + ')';
			}
		}, {
			key: "getOpacityFromRGBA",
			value: function getOpacityFromRGBA(rgba) {
				return parseFloat(rgba.replace(/^.*,(.+)\)/, '$1'));
			}
		}, {
			key: "rgb2hex",
			value: function rgb2hex(rgb) {
				rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
				return rgb && rgb.length === 4 ? '#' + ('0' + parseInt(rgb[1], 10).toString(16)).slice(-2) + ('0' + parseInt(rgb[2], 10).toString(16)).slice(-2) + ('0' + parseInt(rgb[3], 10).toString(16)).slice(-2) : '';
			}
		}, {
			key: "isColorHex",
			value: function isColorHex(color) {
				return /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)|(^#[0-9A-F]{8}$)/i.test(color);
			}
		}, {
			key: "getPolygonPos",
			value: function getPolygonPos(size, dataPointsLen) {
				var dotsArray = [];
				var angle = Math.PI * 2 / dataPointsLen;

				for (var i = 0; i < dataPointsLen; i++) {
					var curPos = {};
					curPos.x = size * Math.sin(i * angle);
					curPos.y = -size * Math.cos(i * angle);
					dotsArray.push(curPos);
				}

				return dotsArray;
			}
		}, {
			key: "polarToCartesian",
			value: function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
				var angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;
				return {
					x: centerX + radius * Math.cos(angleInRadians),
					y: centerY + radius * Math.sin(angleInRadians)
				};
			}
		}, {
			key: "escapeString",
			value: function escapeString(str) {
				var escapeWith = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'x';
				var newStr = str.toString().slice();
				newStr = newStr.replace(/[` ~!@#$%^&*()|+\=?;:'",.<>{}[\]\\/]/gi, escapeWith);
				return newStr;
			}
		}, {
			key: "negToZero",
			value: function negToZero(val) {
				return val < 0 ? 0 : val;
			}
		}, {
			key: "moveIndexInArray",
			value: function moveIndexInArray(arr, old_index, new_index) {
				if (new_index >= arr.length) {
					var k = new_index - arr.length + 1;

					while (k--) {
						arr.push(undefined);
					}
				}

				arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
				return arr;
			}
		}, {
			key: "extractNumber",
			value: function extractNumber(s) {
				return parseFloat(s.replace(/[^\d.]*/g, ''));
			}
		}, {
			key: "findAncestor",
			value: function findAncestor(el, cls) {
				while ((el = el.parentElement) && !el.classList.contains(cls)) {
				}

				return el;
			}
		}, {
			key: "setELstyles",
			value: function setELstyles(el, styles) {
				for (var key in styles) {
					if (styles.hasOwnProperty(key)) {
						el.style.key = styles[key];
					}
				}
			}
		}, {
			key: "isNumber",
			value: function isNumber(value) {
				return !isNaN(value) && parseFloat(Number(value)) === value && !isNaN(parseInt(value, 10));
			}
		}, {
			key: "isFloat",
			value: function isFloat(n) {
				return Number(n) === n && n % 1 !== 0;
			}
		}, {
			key: "isSafari",
			value: function isSafari() {
				return /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
			}
		}, {
			key: "isFirefox",
			value: function isFirefox() {
				return navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
			}
		}, {
			key: "isIE11",
			value: function isIE11() {
				if (window.navigator.userAgent.indexOf('MSIE') !== -1 || window.navigator.appVersion.indexOf('Trident/') > -1) {
					return true;
				}
			}
		}, {
			key: "isIE",
			value: function isIE() {
				var ua = window.navigator.userAgent;
				var msie = ua.indexOf('MSIE ');

				if (msie > 0) {
					// IE 10 or older => return version number
					return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
				}

				var trident = ua.indexOf('Trident/');

				if (trident > 0) {
					// IE 11 => return version number
					var rv = ua.indexOf('rv:');
					return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
				}

				var edge = ua.indexOf('Edge/');

				if (edge > 0) {
					// Edge (IE 12+) => return version number
					return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
				} // other browser


				return false;
			}
		}]);

		return Utils;
	}();

	/**
	 * ApexCharts Animation Class.
	 *
	 * @module Animations
	 **/

	var Animations = /*#__PURE__*/function () {
		function Animations(ctx) {
			_classCallCheck(this, Animations);

			this.ctx = ctx;
			this.w = ctx.w;
			this.setEasingFunctions();
		}

		_createClass(Animations, [{
			key: "setEasingFunctions",
			value: function setEasingFunctions() {
				var easing;
				if (this.w.globals.easing) return;
				var userDefinedEasing = this.w.config.chart.animations.easing;

				switch (userDefinedEasing) {
					case 'linear':
						{
							easing = '-';
							break;
						}

					case 'easein':
						{
							easing = '<';
							break;
						}

					case 'easeout':
						{
							easing = '>';
							break;
						}

					case 'easeinout':
						{
							easing = '<>';
							break;
						}

					case 'swing':
						{
							easing = function easing(pos) {
								var s = 1.70158;
								var ret = (pos -= 1) * pos * ((s + 1) * pos + s) + 1;
								return ret;
							};

							break;
						}

					case 'bounce':
						{
							easing = function easing(pos) {
								var ret = '';

								if (pos < 1 / 2.75) {
									ret = 7.5625 * pos * pos;
								} else if (pos < 2 / 2.75) {
									ret = 7.5625 * (pos -= 1.5 / 2.75) * pos + 0.75;
								} else if (pos < 2.5 / 2.75) {
									ret = 7.5625 * (pos -= 2.25 / 2.75) * pos + 0.9375;
								} else {
									ret = 7.5625 * (pos -= 2.625 / 2.75) * pos + 0.984375;
								}

								return ret;
							};

							break;
						}

					case 'elastic':
						{
							easing = function easing(pos) {
								if (pos === !!pos) return pos;
								return Math.pow(2, -10 * pos) * Math.sin((pos - 0.075) * (2 * Math.PI) / 0.3) + 1;
							};

							break;
						}

					default:
						{
							easing = '<>';
						}
				}

				this.w.globals.easing = easing;
			}
		}, {
			key: "animateLine",
			value: function animateLine(el, from, to, speed) {
				el.attr(from).animate(speed).attr(to);
			}
			/*
			 ** Animate radius of a circle element
			 */

		}, {
			key: "animateMarker",
			value: function animateMarker(el, from, to, speed, easing, cb) {
				if (!from) from = 0;
				el.attr({
					r: from,
					width: from,
					height: from
				}).animate(speed, easing).attr({
					r: to,
					width: to.width,
					height: to.height
				}).afterAll(function () {
					cb();
				});
			}
			/*
			 ** Animate radius and position of a circle element
			 */

		}, {
			key: "animateCircle",
			value: function animateCircle(el, from, to, speed, easing) {
				el.attr({
					r: from.r,
					cx: from.cx,
					cy: from.cy
				}).animate(speed, easing).attr({
					r: to.r,
					cx: to.cx,
					cy: to.cy
				});
			}
			/*
			 ** Animate rect properties
			 */

		}, {
			key: "animateRect",
			value: function animateRect(el, from, to, speed, fn) {
				el.attr(from).animate(speed).attr(to).afterAll(function () {
					return fn();
				});
			}
		}, {
			key: "animatePathsGradually",
			value: function animatePathsGradually(params) {
				var el = params.el,
					realIndex = params.realIndex,
					j = params.j,
					fill = params.fill,
					pathFrom = params.pathFrom,
					pathTo = params.pathTo,
					speed = params.speed,
					delay = params.delay;
				var me = this;
				var w = this.w;
				var delayFactor = 0;

				if (w.config.chart.animations.animateGradually.enabled) {
					delayFactor = w.config.chart.animations.animateGradually.delay;
				}

				if (w.config.chart.animations.dynamicAnimation.enabled && w.globals.dataChanged && w.config.chart.type !== 'bar') {
					// disabled due to this bug - https://github.com/apexcharts/vue-apexcharts/issues/75
					delayFactor = 0;
				}

				me.morphSVG(el, realIndex, j, w.config.chart.type === 'line' && !w.globals.comboCharts ? 'stroke' : fill, pathFrom, pathTo, speed, delay * delayFactor);
			}
		}, {
			key: "showDelayedElements",
			value: function showDelayedElements() {
				this.w.globals.delayedElements.forEach(function (d) {
					var ele = d.el;
					ele.classList.remove('apexcharts-element-hidden');
					ele.classList.add('apexcharts-hidden-element-shown');
				});
			}
		}, {
			key: "animationCompleted",
			value: function animationCompleted(el) {
				var w = this.w;
				if (w.globals.animationEnded) return;
				w.globals.animationEnded = true;
				this.showDelayedElements();

				if (typeof w.config.chart.events.animationEnd === 'function') {
					w.config.chart.events.animationEnd(this.ctx, {
						el: el,
						w: w
					});
				}
			} // SVG.js animation for morphing one path to another

		}, {
			key: "morphSVG",
			value: function morphSVG(el, realIndex, j, fill, pathFrom, pathTo, speed, delay) {
				var _this = this;

				var w = this.w;

				if (!pathFrom) {
					pathFrom = el.attr('pathFrom');
				}

				if (!pathTo) {
					pathTo = el.attr('pathTo');
				}

				var disableAnimationForCorrupPath = function disableAnimationForCorrupPath(path) {
					if (w.config.chart.type === 'radar') {
						// radar chart drops the path to bottom and hence a corrup path looks ugly
						// therefore, disable animation for such a case
						speed = 1;
					}

					return "M 0 ".concat(w.globals.gridHeight);
				};

				if (!pathFrom || pathFrom.indexOf('undefined') > -1 || pathFrom.indexOf('NaN') > -1) {
					pathFrom = disableAnimationForCorrupPath();
				}

				if (!pathTo || pathTo.indexOf('undefined') > -1 || pathTo.indexOf('NaN') > -1) {
					pathTo = disableAnimationForCorrupPath();
				}

				if (!w.globals.shouldAnimate) {
					speed = 1;
				}

				el.plot(pathFrom).animate(1, w.globals.easing, delay).plot(pathFrom).animate(speed, w.globals.easing, delay).plot(pathTo).afterAll(function () {
					// a flag to indicate that the original mount function can return true now as animation finished here
					if (Utils$1.isNumber(j)) {
						if (j === w.globals.series[w.globals.maxValsInArrayIndex].length - 2 && w.globals.shouldAnimate) {
							_this.animationCompleted(el);
						}
					} else if (fill !== 'none' && w.globals.shouldAnimate) {
						if (!w.globals.comboCharts && realIndex === w.globals.series.length - 1 || w.globals.comboCharts) {
							_this.animationCompleted(el);
						}
					}

					_this.showDelayedElements();
				});
			}
		}]);

		return Animations;
	}();

	/**
	 * ApexCharts Filters Class for setting hover/active states on the paths.
	 *
	 * @module Formatters
	 **/

	var Filters = /*#__PURE__*/function () {
		function Filters(ctx) {
			_classCallCheck(this, Filters);

			this.ctx = ctx;
			this.w = ctx.w;
		} // create a re-usable filter which can be appended other filter effects and applied to multiple elements


		_createClass(Filters, [{
			key: "getDefaultFilter",
			value: function getDefaultFilter(el, i) {
				var w = this.w;
				el.unfilter(true);
				var filter = new window.SVG.Filter();
				filter.size('120%', '180%', '-5%', '-40%');

				if (w.config.states.normal.filter !== 'none') {
					this.applyFilter(el, i, w.config.states.normal.filter.type, w.config.states.normal.filter.value);
				} else {
					if (w.config.chart.dropShadow.enabled) {
						this.dropShadow(el, w.config.chart.dropShadow, i);
					}
				}
			}
		}, {
			key: "addNormalFilter",
			value: function addNormalFilter(el, i) {
				var w = this.w; // revert shadow if it was there
				// but, ignore marker as marker don't have dropshadow yet

				if (w.config.chart.dropShadow.enabled && !el.node.classList.contains('apexcharts-marker')) {
					this.dropShadow(el, w.config.chart.dropShadow, i);
				}
			} // appends dropShadow to the filter object which can be chained with other filter effects

		}, {
			key: "addLightenFilter",
			value: function addLightenFilter(el, i, attrs) {
				var _this = this;

				var w = this.w;
				var intensity = attrs.intensity;
				el.unfilter(true);
				var filter = new window.SVG.Filter();
				el.filter(function (add) {
					var shadowAttr = w.config.chart.dropShadow;

					if (shadowAttr.enabled) {
						filter = _this.addShadow(add, i, shadowAttr);
					} else {
						filter = add;
					}

					filter.componentTransfer({
						rgb: {
							type: 'linear',
							slope: 1.5,
							intercept: intensity
						}
					});
				});
				el.filterer.node.setAttribute('filterUnits', 'userSpaceOnUse');

				this._scaleFilterSize(el.filterer.node);
			} // appends dropShadow to the filter object which can be chained with other filter effects

		}, {
			key: "addDarkenFilter",
			value: function addDarkenFilter(el, i, attrs) {
				var _this2 = this;

				var w = this.w;
				var intensity = attrs.intensity;
				el.unfilter(true);
				var filter = new window.SVG.Filter();
				el.filter(function (add) {
					var shadowAttr = w.config.chart.dropShadow;

					if (shadowAttr.enabled) {
						filter = _this2.addShadow(add, i, shadowAttr);
					} else {
						filter = add;
					}

					filter.componentTransfer({
						rgb: {
							type: 'linear',
							slope: intensity
						}
					});
				});
				el.filterer.node.setAttribute('filterUnits', 'userSpaceOnUse');

				this._scaleFilterSize(el.filterer.node);
			}
		}, {
			key: "applyFilter",
			value: function applyFilter(el, i, filter) {
				var intensity = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 0.5;

				switch (filter) {
					case 'none':
						{
							this.addNormalFilter(el, i);
							break;
						}

					case 'lighten':
						{
							this.addLightenFilter(el, i, {
								intensity: intensity
							});
							break;
						}

					case 'darken':
						{
							this.addDarkenFilter(el, i, {
								intensity: intensity
							});
							break;
						}
				}
			} // appends dropShadow to the filter object which can be chained with other filter effects

		}, {
			key: "addShadow",
			value: function addShadow(add, i, attrs) {
				var blur = attrs.blur,
					top = attrs.top,
					left = attrs.left,
					color = attrs.color,
					opacity = attrs.opacity;
				var shadowBlur = add.flood(Array.isArray(color) ? color[i] : color, opacity).composite(add.sourceAlpha, 'in').offset(left, top).gaussianBlur(blur).merge(add.source);
				return add.blend(add.source, shadowBlur);
			} // directly adds dropShadow to the element and returns the same element.
			// the only way it is different from the addShadow() function is that addShadow is chainable to other filters, while this function discards all filters and add dropShadow

		}, {
			key: "dropShadow",
			value: function dropShadow(el, attrs) {
				var i = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
				var top = attrs.top,
					left = attrs.left,
					blur = attrs.blur,
					color = attrs.color,
					opacity = attrs.opacity,
					noUserSpaceOnUse = attrs.noUserSpaceOnUse;
				var w = this.w;
				el.unfilter(true);

				if (Utils$1.isIE() && w.config.chart.type === 'radialBar') {
					// in radialbar charts, dropshadow is clipping actual drawing in IE
					return el;
				}

				color = Array.isArray(color) ? color[i] : color;
				el.filter(function (add) {
					var shadowBlur = null;

					if (Utils$1.isSafari() || Utils$1.isFirefox() || Utils$1.isIE()) {
						// safari/firefox/IE have some alternative way to use this filter
						shadowBlur = add.flood(color, opacity).composite(add.sourceAlpha, 'in').offset(left, top).gaussianBlur(blur);
					} else {
						shadowBlur = add.flood(color, opacity).composite(add.sourceAlpha, 'in').offset(left, top).gaussianBlur(blur).merge(add.source);
					}

					add.blend(add.source, shadowBlur);
				});

				if (!noUserSpaceOnUse) {
					el.filterer.node.setAttribute('filterUnits', 'userSpaceOnUse');
				}

				this._scaleFilterSize(el.filterer.node);

				return el;
			}
		}, {
			key: "setSelectionFilter",
			value: function setSelectionFilter(el, realIndex, dataPointIndex) {
				var w = this.w;

				if (typeof w.globals.selectedDataPoints[realIndex] !== 'undefined') {
					if (w.globals.selectedDataPoints[realIndex].indexOf(dataPointIndex) > -1) {
						el.node.setAttribute('selected', true);
						var activeFilter = w.config.states.active.filter;

						if (activeFilter !== 'none') {
							this.applyFilter(el, realIndex, activeFilter.type, activeFilter.value);
						}
					}
				}
			}
		}, {
			key: "_scaleFilterSize",
			value: function _scaleFilterSize(el) {
				var setAttributes = function setAttributes(attrs) {
					for (var key in attrs) {
						if (attrs.hasOwnProperty(key)) {
							el.setAttribute(key, attrs[key]);
						}
					}
				};

				setAttributes({
					width: '200%',
					height: '200%',
					x: '-50%',
					y: '-50%'
				});
			}
		}]);

		return Filters;
	}();

	/**
	 * ApexCharts Graphics Class for all drawing operations.
	 *
	 * @module Graphics
	 **/

	var Graphics = /*#__PURE__*/function () {
		function Graphics(ctx) {
			_classCallCheck(this, Graphics);

			this.ctx = ctx;
			this.w = ctx.w;
		}
		/*****************************************************************************
		 *                                                                            *
		 *  SVG Path Rounding Function                                                *
		 *  Copyright (C) 2014 Yona Appletree                                         *
		 *                                                                            *
		 *  Licensed under the Apache License, Version 2.0 (the "License");           *
		 *  you may not use this file except in compliance with the License.          *
		 *  You may obtain a copy of the License at                                   *
		 *                                                                            *
		 *      http://www.apache.org/licenses/LICENSE-2.0                            *
		 *                                                                            *
		 *  Unless required by applicable law or agreed to in writing, software       *
		 *  distributed under the License is distributed on an "AS IS" BASIS,         *
		 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  *
		 *  See the License for the specific language governing permissions and       *
		 *  limitations under the License.                                            *
		 *                                                                            *
		 *****************************************************************************/

		/**
		 * SVG Path rounding function. Takes an input path string and outputs a path
		 * string where all line-line corners have been rounded. Only supports absolute
		 * commands at the moment.
		 *
		 * @param pathString The SVG input path
		 * @param radius The amount to round the corners, either a value in the SVG
		 *               coordinate space, or, if useFractionalRadius is true, a value
		 *               from 0 to 1.
		 * @returns A new SVG path string with the rounding
		 */


		_createClass(Graphics, [{
			key: "roundPathCorners",
			value: function roundPathCorners(pathString, radius) {
				if (pathString.indexOf('NaN') > -1) pathString = '';

				function moveTowardsLength(movingPoint, targetPoint, amount) {
					var width = targetPoint.x - movingPoint.x;
					var height = targetPoint.y - movingPoint.y;
					var distance = Math.sqrt(width * width + height * height);
					return moveTowardsFractional(movingPoint, targetPoint, Math.min(1, amount / distance));
				}

				function moveTowardsFractional(movingPoint, targetPoint, fraction) {
					return {
						x: movingPoint.x + (targetPoint.x - movingPoint.x) * fraction,
						y: movingPoint.y + (targetPoint.y - movingPoint.y) * fraction
					};
				} // Adjusts the ending position of a command


				function adjustCommand(cmd, newPoint) {
					if (cmd.length > 2) {
						cmd[cmd.length - 2] = newPoint.x;
						cmd[cmd.length - 1] = newPoint.y;
					}
				} // Gives an {x, y} object for a command's ending position


				function pointForCommand(cmd) {
					return {
						x: parseFloat(cmd[cmd.length - 2]),
						y: parseFloat(cmd[cmd.length - 1])
					};
				} // Split apart the path, handing concatonated letters and numbers


				var pathParts = pathString.split(/[,\s]/).reduce(function (parts, part) {
					var match = part.match('([a-zA-Z])(.+)');

					if (match) {
						parts.push(match[1]);
						parts.push(match[2]);
					} else {
						parts.push(part);
					}

					return parts;
				}, []); // Group the commands with their arguments for easier handling

				var commands = pathParts.reduce(function (commands, part) {
					if (parseFloat(part) == part && commands.length) {
						commands[commands.length - 1].push(part);
					} else {
						commands.push([part]);
					}

					return commands;
				}, []); // The resulting commands, also grouped

				var resultCommands = [];

				if (commands.length > 1) {
					var startPoint = pointForCommand(commands[0]); // Handle the close path case with a "virtual" closing line

					var virtualCloseLine = null;

					if (commands[commands.length - 1][0] == 'Z' && commands[0].length > 2) {
						virtualCloseLine = ['L', startPoint.x, startPoint.y];
						commands[commands.length - 1] = virtualCloseLine;
					} // We always use the first command (but it may be mutated)


					resultCommands.push(commands[0]);

					for (var cmdIndex = 1; cmdIndex < commands.length; cmdIndex++) {
						var prevCmd = resultCommands[resultCommands.length - 1];
						var curCmd = commands[cmdIndex]; // Handle closing case

						var nextCmd = curCmd == virtualCloseLine ? commands[1] : commands[cmdIndex + 1]; // Nasty logic to decide if this path is a candidite.

						if (nextCmd && prevCmd && prevCmd.length > 2 && curCmd[0] == 'L' && nextCmd.length > 2 && nextCmd[0] == 'L') {
							// Calc the points we're dealing with
							var prevPoint = pointForCommand(prevCmd);
							var curPoint = pointForCommand(curCmd);
							var nextPoint = pointForCommand(nextCmd); // The start and end of the cuve are just our point moved towards the previous and next points, respectivly

							var curveStart, curveEnd;
							curveStart = moveTowardsLength(curPoint, prevPoint, radius);
							curveEnd = moveTowardsLength(curPoint, nextPoint, radius); // Adjust the current command and add it

							adjustCommand(curCmd, curveStart);
							curCmd.origPoint = curPoint;
							resultCommands.push(curCmd); // The curve control points are halfway between the start/end of the curve and
							// the original point

							var startControl = moveTowardsFractional(curveStart, curPoint, 0.5);
							var endControl = moveTowardsFractional(curPoint, curveEnd, 0.5); // Create the curve

							var curveCmd = ['C', startControl.x, startControl.y, endControl.x, endControl.y, curveEnd.x, curveEnd.y]; // Save the original point for fractional calculations

							curveCmd.origPoint = curPoint;
							resultCommands.push(curveCmd);
						} else {
							// Pass through commands that don't qualify
							resultCommands.push(curCmd);
						}
					} // Fix up the starting point and restore the close path if the path was orignally closed


					if (virtualCloseLine) {
						var newStartPoint = pointForCommand(resultCommands[resultCommands.length - 1]);
						resultCommands.push(['Z']);
						adjustCommand(resultCommands[0], newStartPoint);
					}
				} else {
					resultCommands = commands;
				}

				return resultCommands.reduce(function (str, c) {
					return str + c.join(' ') + ' ';
				}, '');
			}
		}, {
			key: "drawLine",
			value: function drawLine(x1, y1, x2, y2) {
				var lineColor = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : '#a8a8a8';
				var dashArray = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : 0;
				var strokeWidth = arguments.length > 6 && arguments[6] !== undefined ? arguments[6] : null;
				var strokeLineCap = arguments.length > 7 && arguments[7] !== undefined ? arguments[7] : 'butt';
				var w = this.w;
				var line = w.globals.dom.Paper.line().attr({
					x1: x1,
					y1: y1,
					x2: x2,
					y2: y2,
					stroke: lineColor,
					'stroke-dasharray': dashArray,
					'stroke-width': strokeWidth,
					'stroke-linecap': strokeLineCap
				});
				return line;
			}
		}, {
			key: "drawRect",
			value: function drawRect() {
				var x1 = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
				var y1 = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
				var x2 = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
				var y2 = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 0;
				var radius = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 0;
				var color = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : '#fefefe';
				var opacity = arguments.length > 6 && arguments[6] !== undefined ? arguments[6] : 1;
				var strokeWidth = arguments.length > 7 && arguments[7] !== undefined ? arguments[7] : null;
				var strokeColor = arguments.length > 8 && arguments[8] !== undefined ? arguments[8] : null;
				var strokeDashArray = arguments.length > 9 && arguments[9] !== undefined ? arguments[9] : 0;
				var w = this.w;
				var rect = w.globals.dom.Paper.rect();
				rect.attr({
					x: x1,
					y: y1,
					width: x2 > 0 ? x2 : 0,
					height: y2 > 0 ? y2 : 0,
					rx: radius,
					ry: radius,
					opacity: opacity,
					'stroke-width': strokeWidth !== null ? strokeWidth : 0,
					stroke: strokeColor !== null ? strokeColor : 'none',
					'stroke-dasharray': strokeDashArray
				}); // fix apexcharts.js#1410

				rect.node.setAttribute('fill', color);
				return rect;
			}
		}, {
			key: "drawPolygon",
			value: function drawPolygon(polygonString) {
				var stroke = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '#e1e1e1';
				var strokeWidth = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 1;
				var fill = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 'none';
				var w = this.w;
				var polygon = w.globals.dom.Paper.polygon(polygonString).attr({
					fill: fill,
					stroke: stroke,
					'stroke-width': strokeWidth
				});
				return polygon;
			}
		}, {
			key: "drawCircle",
			value: function drawCircle(radius) {
				var attrs = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
				var w = this.w;
				if (radius < 0) radius = 0;
				var c = w.globals.dom.Paper.circle(radius * 2);

				if (attrs !== null) {
					c.attr(attrs);
				}

				return c;
			}
		}, {
			key: "drawPath",
			value: function drawPath(_ref) {
				var _ref$d = _ref.d,
					d = _ref$d === void 0 ? '' : _ref$d,
					_ref$stroke = _ref.stroke,
					stroke = _ref$stroke === void 0 ? '#a8a8a8' : _ref$stroke,
					_ref$strokeWidth = _ref.strokeWidth,
					strokeWidth = _ref$strokeWidth === void 0 ? 1 : _ref$strokeWidth,
					fill = _ref.fill,
					_ref$fillOpacity = _ref.fillOpacity,
					fillOpacity = _ref$fillOpacity === void 0 ? 1 : _ref$fillOpacity,
					_ref$strokeOpacity = _ref.strokeOpacity,
					strokeOpacity = _ref$strokeOpacity === void 0 ? 1 : _ref$strokeOpacity,
					classes = _ref.classes,
					_ref$strokeLinecap = _ref.strokeLinecap,
					strokeLinecap = _ref$strokeLinecap === void 0 ? null : _ref$strokeLinecap,
					_ref$strokeDashArray = _ref.strokeDashArray,
					strokeDashArray = _ref$strokeDashArray === void 0 ? 0 : _ref$strokeDashArray;
				var w = this.w;

				if (strokeLinecap === null) {
					strokeLinecap = w.config.stroke.lineCap;
				}

				if (d.indexOf('undefined') > -1 || d.indexOf('NaN') > -1) {
					d = "M 0 ".concat(w.globals.gridHeight);
				}

				var p = w.globals.dom.Paper.path(d).attr({
					fill: fill,
					'fill-opacity': fillOpacity,
					stroke: stroke,
					'stroke-opacity': strokeOpacity,
					'stroke-linecap': strokeLinecap,
					'stroke-width': strokeWidth,
					'stroke-dasharray': strokeDashArray,
					class: classes
				});
				return p;
			}
		}, {
			key: "group",
			value: function group() {
				var attrs = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
				var w = this.w;
				var g = w.globals.dom.Paper.group();

				if (attrs !== null) {
					g.attr(attrs);
				}

				return g;
			}
		}, {
			key: "move",
			value: function move(x, y) {
				var move = ['M', x, y].join(' ');
				return move;
			}
		}, {
			key: "line",
			value: function line(x, y) {
				var hORv = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
				var line = null;

				if (hORv === null) {
					line = [' L', x, y].join(' ');
				} else if (hORv === 'H') {
					line = [' H', x].join(' ');
				} else if (hORv === 'V') {
					line = [' V', y].join(' ');
				}

				return line;
			}
		}, {
			key: "curve",
			value: function curve(x1, y1, x2, y2, x, y) {
				var curve = ['C', x1, y1, x2, y2, x, y].join(' ');
				return curve;
			}
		}, {
			key: "quadraticCurve",
			value: function quadraticCurve(x1, y1, x, y) {
				var curve = ['Q', x1, y1, x, y].join(' ');
				return curve;
			}
		}, {
			key: "arc",
			value: function arc(rx, ry, axisRotation, largeArcFlag, sweepFlag, x, y) {
				var relative = arguments.length > 7 && arguments[7] !== undefined ? arguments[7] : false;
				var coord = 'A';
				if (relative) coord = 'a';
				var arc = [coord, rx, ry, axisRotation, largeArcFlag, sweepFlag, x, y].join(' ');
				return arc;
			}
			/**
			 * @memberof Graphics
			 * @param {object}
			 *  i = series's index
			 *  realIndex = realIndex is series's actual index when it was drawn time. After several redraws, the iterating "i" may change in loops, but realIndex doesn't
			 *  pathFrom = existing pathFrom to animateTo
			 *  pathTo = new Path to which d attr will be animated from pathFrom to pathTo
			 *  stroke = line Color
			 *  strokeWidth = width of path Line
			 *  fill = it can be gradient, single color, pattern or image
			 *  animationDelay = how much to delay when starting animation (in milliseconds)
			 *  dataChangeSpeed = for dynamic animations, when data changes
			 *  className = class attribute to add
			 * @return {object} svg.js path object
			 **/

		}, {
			key: "renderPaths",
			value: function renderPaths(_ref2) {
				var j = _ref2.j,
					realIndex = _ref2.realIndex,
					pathFrom = _ref2.pathFrom,
					pathTo = _ref2.pathTo,
					stroke = _ref2.stroke,
					strokeWidth = _ref2.strokeWidth,
					strokeLinecap = _ref2.strokeLinecap,
					fill = _ref2.fill,
					animationDelay = _ref2.animationDelay,
					initialSpeed = _ref2.initialSpeed,
					dataChangeSpeed = _ref2.dataChangeSpeed,
					className = _ref2.className,
					_ref2$shouldClipToGri = _ref2.shouldClipToGrid,
					shouldClipToGrid = _ref2$shouldClipToGri === void 0 ? true : _ref2$shouldClipToGri,
					_ref2$bindEventsOnPat = _ref2.bindEventsOnPaths,
					bindEventsOnPaths = _ref2$bindEventsOnPat === void 0 ? true : _ref2$bindEventsOnPat,
					_ref2$drawShadow = _ref2.drawShadow,
					drawShadow = _ref2$drawShadow === void 0 ? true : _ref2$drawShadow;
				var w = this.w;
				var filters = new Filters(this.ctx);
				var anim = new Animations(this.ctx);
				var initialAnim = this.w.config.chart.animations.enabled;
				var dynamicAnim = initialAnim && this.w.config.chart.animations.dynamicAnimation.enabled;
				var d;
				var shouldAnimate = !!(initialAnim && !w.globals.resized || dynamicAnim && w.globals.dataChanged && w.globals.shouldAnimate);

				if (shouldAnimate) {
					d = pathFrom;
				} else {
					d = pathTo;
					w.globals.animationEnded = true;
				}

				var strokeDashArrayOpt = w.config.stroke.dashArray;
				var strokeDashArray = 0;

				if (Array.isArray(strokeDashArrayOpt)) {
					strokeDashArray = strokeDashArrayOpt[realIndex];
				} else {
					strokeDashArray = w.config.stroke.dashArray;
				}

				var el = this.drawPath({
					d: d,
					stroke: stroke,
					strokeWidth: strokeWidth,
					fill: fill,
					fillOpacity: 1,
					classes: className,
					strokeLinecap: strokeLinecap,
					strokeDashArray: strokeDashArray
				});
				el.attr('index', realIndex);

				if (shouldClipToGrid) {
					el.attr({
						'clip-path': "url(#gridRectMask".concat(w.globals.cuid, ")")
					});
				} // const defaultFilter = el.filterer


				if (w.config.states.normal.filter.type !== 'none') {
					filters.getDefaultFilter(el, realIndex);
				} else {
					if (w.config.chart.dropShadow.enabled && drawShadow) {
						if (!w.config.chart.dropShadow.enabledOnSeries || w.config.chart.dropShadow.enabledOnSeries && w.config.chart.dropShadow.enabledOnSeries.indexOf(realIndex) !== -1) {
							var shadow = w.config.chart.dropShadow;
							filters.dropShadow(el, shadow, realIndex);
						}
					}
				}

				if (bindEventsOnPaths) {
					el.node.addEventListener('mouseenter', this.pathMouseEnter.bind(this, el));
					el.node.addEventListener('mouseleave', this.pathMouseLeave.bind(this, el));
					el.node.addEventListener('mousedown', this.pathMouseDown.bind(this, el));
				}

				el.attr({
					pathTo: pathTo,
					pathFrom: pathFrom
				});
				var defaultAnimateOpts = {
					el: el,
					j: j,
					realIndex: realIndex,
					pathFrom: pathFrom,
					pathTo: pathTo,
					fill: fill,
					strokeWidth: strokeWidth,
					delay: animationDelay
				};

				if (initialAnim && !w.globals.resized && !w.globals.dataChanged) {
					anim.animatePathsGradually(_objectSpread2(_objectSpread2({}, defaultAnimateOpts), {}, {
						speed: initialSpeed
					}));
				} else {
					if (w.globals.resized || !w.globals.dataChanged) {
						anim.showDelayedElements();
					}
				}

				if (w.globals.dataChanged && dynamicAnim && shouldAnimate) {
					anim.animatePathsGradually(_objectSpread2(_objectSpread2({}, defaultAnimateOpts), {}, {
						speed: dataChangeSpeed
					}));
				}

				return el;
			}
		}, {
			key: "drawPattern",
			value: function drawPattern(style, width, height) {
				var stroke = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '#a8a8a8';
				var strokeWidth = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 0;
				var w = this.w;
				var p = w.globals.dom.Paper.pattern(width, height, function (add) {
					if (style === 'horizontalLines') {
						add.line(0, 0, height, 0).stroke({
							color: stroke,
							width: strokeWidth + 1
						});
					} else if (style === 'verticalLines') {
						add.line(0, 0, 0, width).stroke({
							color: stroke,
							width: strokeWidth + 1
						});
					} else if (style === 'slantedLines') {
						add.line(0, 0, width, height).stroke({
							color: stroke,
							width: strokeWidth
						});
					} else if (style === 'squares') {
						add.rect(width, height).fill('none').stroke({
							color: stroke,
							width: strokeWidth
						});
					} else if (style === 'circles') {
						add.circle(width).fill('none').stroke({
							color: stroke,
							width: strokeWidth
						});
					}
				});
				return p;
			}
		}, {
			key: "drawGradient",
			value: function drawGradient(style, gfrom, gto, opacityFrom, opacityTo) {
				var size = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : null;
				var stops = arguments.length > 6 && arguments[6] !== undefined ? arguments[6] : null;
				var colorStops = arguments.length > 7 && arguments[7] !== undefined ? arguments[7] : null;
				var i = arguments.length > 8 && arguments[8] !== undefined ? arguments[8] : 0;
				var w = this.w;
				var g;

				if (gfrom.length < 9 && gfrom.indexOf('#') === 0) {
					// if the hex contains alpha and is of 9 digit, skip the opacity
					gfrom = Utils$1.hexToRgba(gfrom, opacityFrom);
				}

				if (gto.length < 9 && gto.indexOf('#') === 0) {
					gto = Utils$1.hexToRgba(gto, opacityTo);
				}

				var stop1 = 0;
				var stop2 = 1;
				var stop3 = 1;
				var stop4 = null;

				if (stops !== null) {
					stop1 = typeof stops[0] !== 'undefined' ? stops[0] / 100 : 0;
					stop2 = typeof stops[1] !== 'undefined' ? stops[1] / 100 : 1;
					stop3 = typeof stops[2] !== 'undefined' ? stops[2] / 100 : 1;
					stop4 = typeof stops[3] !== 'undefined' ? stops[3] / 100 : null;
				}

				var radial = !!(w.config.chart.type === 'donut' || w.config.chart.type === 'pie' || w.config.chart.type === 'polarArea' || w.config.chart.type === 'bubble');

				if (colorStops === null || colorStops.length === 0) {
					g = w.globals.dom.Paper.gradient(radial ? 'radial' : 'linear', function (stop) {
						stop.at(stop1, gfrom, opacityFrom);
						stop.at(stop2, gto, opacityTo);
						stop.at(stop3, gto, opacityTo);

						if (stop4 !== null) {
							stop.at(stop4, gfrom, opacityFrom);
						}
					});
				} else {
					g = w.globals.dom.Paper.gradient(radial ? 'radial' : 'linear', function (stop) {
						var gradientStops = Array.isArray(colorStops[i]) ? colorStops[i] : colorStops;
						gradientStops.forEach(function (s) {
							stop.at(s.offset / 100, s.color, s.opacity);
						});
					});
				}

				if (!radial) {
					if (style === 'vertical') {
						g.from(0, 0).to(0, 1);
					} else if (style === 'diagonal') {
						g.from(0, 0).to(1, 1);
					} else if (style === 'horizontal') {
						g.from(0, 1).to(1, 1);
					} else if (style === 'diagonal2') {
						g.from(1, 0).to(0, 1);
					}
				} else {
					var offx = w.globals.gridWidth / 2;
					var offy = w.globals.gridHeight / 2;

					if (w.config.chart.type !== 'bubble') {
						g.attr({
							gradientUnits: 'userSpaceOnUse',
							cx: offx,
							cy: offy,
							r: size
						});
					} else {
						g.attr({
							cx: 0.5,
							cy: 0.5,
							r: 0.8,
							fx: 0.2,
							fy: 0.2
						});
					}
				}

				return g;
			}
		}, {
			key: "getTextBasedOnMaxWidth",
			value: function getTextBasedOnMaxWidth(_ref3) {
				var text = _ref3.text,
					maxWidth = _ref3.maxWidth,
					fontSize = _ref3.fontSize,
					fontFamily = _ref3.fontFamily;
				var tRects = this.getTextRects(text, fontSize, fontFamily);
				var wordWidth = tRects.width / text.length;
				var wordsBasedOnWidth = Math.floor(maxWidth / wordWidth);

				if (maxWidth < tRects.width) {
					return text.slice(0, wordsBasedOnWidth - 3) + '...';
				}

				return text;
			}
		}, {
			key: "drawText",
			value: function drawText(_ref4) {
				var _this = this;

				var x = _ref4.x,
					y = _ref4.y,
					text = _ref4.text,
					textAnchor = _ref4.textAnchor,
					fontSize = _ref4.fontSize,
					fontFamily = _ref4.fontFamily,
					fontWeight = _ref4.fontWeight,
					foreColor = _ref4.foreColor,
					opacity = _ref4.opacity,
					maxWidth = _ref4.maxWidth,
					_ref4$cssClass = _ref4.cssClass,
					cssClass = _ref4$cssClass === void 0 ? '' : _ref4$cssClass,
					_ref4$isPlainText = _ref4.isPlainText,
					isPlainText = _ref4$isPlainText === void 0 ? true : _ref4$isPlainText;
				var w = this.w;
				if (typeof text === 'undefined') text = '';
				var truncatedText = text;

				if (!textAnchor) {
					textAnchor = 'start';
				}

				if (!foreColor || !foreColor.length) {
					foreColor = w.config.chart.foreColor;
				}

				fontFamily = fontFamily || w.config.chart.fontFamily;
				fontSize = fontSize || '11px';
				fontWeight = fontWeight || 'regular';
				var commonProps = {
					maxWidth: maxWidth,
					fontSize: fontSize,
					fontFamily: fontFamily
				};
				var elText;

				if (Array.isArray(text)) {
					elText = w.globals.dom.Paper.text(function (add) {
						for (var i = 0; i < text.length; i++) {
							truncatedText = text[i];

							if (maxWidth) {
								truncatedText = _this.getTextBasedOnMaxWidth(_objectSpread2({
									text: text[i]
								}, commonProps));
							}

							i === 0 ? add.tspan(truncatedText) : add.tspan(truncatedText).newLine();
						}
					});
				} else {
					if (maxWidth) {
						truncatedText = this.getTextBasedOnMaxWidth(_objectSpread2({
							text: text
						}, commonProps));
					}

					elText = isPlainText ? w.globals.dom.Paper.plain(text) : w.globals.dom.Paper.text(function (add) {
						return add.tspan(truncatedText);
					});
				}

				elText.attr({
					x: x,
					y: y,
					'text-anchor': textAnchor,
					'dominant-baseline': 'auto',
					'font-size': fontSize,
					'font-family': fontFamily,
					'font-weight': fontWeight,
					fill: foreColor,
					class: 'apexcharts-text ' + cssClass
				});
				elText.node.style.fontFamily = fontFamily;
				elText.node.style.opacity = opacity;
				return elText;
			}
		}, {
			key: "drawMarker",
			value: function drawMarker(x, y, opts) {
				x = x || 0;
				var size = opts.pSize || 0;
				var elPoint = null;

				if (opts.shape === 'square' || opts.shape === 'rect') {
					var radius = opts.pRadius === undefined ? size / 2 : opts.pRadius;

					if (y === null || !size) {
						size = 0;
						radius = 0;
					}

					var nSize = size * 1.2 + radius;
					var p = this.drawRect(nSize, nSize, nSize, nSize, radius);
					p.attr({
						x: x - nSize / 2,
						y: y - nSize / 2,
						cx: x,
						cy: y,
						class: opts.class ? opts.class : '',
						fill: opts.pointFillColor,
						'fill-opacity': opts.pointFillOpacity ? opts.pointFillOpacity : 1,
						stroke: opts.pointStrokeColor,
						'stroke-width': opts.pointStrokeWidth ? opts.pointStrokeWidth : 0,
						'stroke-opacity': opts.pointStrokeOpacity ? opts.pointStrokeOpacity : 1
					});
					elPoint = p;
				} else if (opts.shape === 'circle' || !opts.shape) {
					if (!Utils$1.isNumber(y)) {
						size = 0;
						y = 0;
					} // let nSize = size - opts.pRadius / 2 < 0 ? 0 : size - opts.pRadius / 2


					elPoint = this.drawCircle(size, {
						cx: x,
						cy: y,
						class: opts.class ? opts.class : '',
						stroke: opts.pointStrokeColor,
						fill: opts.pointFillColor,
						'fill-opacity': opts.pointFillOpacity ? opts.pointFillOpacity : 1,
						'stroke-width': opts.pointStrokeWidth ? opts.pointStrokeWidth : 0,
						'stroke-opacity': opts.pointStrokeOpacity ? opts.pointStrokeOpacity : 1
					});
				}

				return elPoint;
			}
		}, {
			key: "pathMouseEnter",
			value: function pathMouseEnter(path, e) {
				var w = this.w;
				var filters = new Filters(this.ctx);
				var i = parseInt(path.node.getAttribute('index'), 10);
				var j = parseInt(path.node.getAttribute('j'), 10);

				if (typeof w.config.chart.events.dataPointMouseEnter === 'function') {
					w.config.chart.events.dataPointMouseEnter(e, this.ctx, {
						seriesIndex: i,
						dataPointIndex: j,
						w: w
					});
				}

				this.ctx.events.fireEvent('dataPointMouseEnter', [e, this.ctx, {
					seriesIndex: i,
					dataPointIndex: j,
					w: w
				}]);

				if (w.config.states.active.filter.type !== 'none') {
					if (path.node.getAttribute('selected') === 'true') {
						return;
					}
				}

				if (w.config.states.hover.filter.type !== 'none') {
					if (!w.globals.isTouchDevice) {
						var hoverFilter = w.config.states.hover.filter;
						filters.applyFilter(path, i, hoverFilter.type, hoverFilter.value);
					}
				}
			}
		}, {
			key: "pathMouseLeave",
			value: function pathMouseLeave(path, e) {
				var w = this.w;
				var filters = new Filters(this.ctx);
				var i = parseInt(path.node.getAttribute('index'), 10);
				var j = parseInt(path.node.getAttribute('j'), 10);

				if (typeof w.config.chart.events.dataPointMouseLeave === 'function') {
					w.config.chart.events.dataPointMouseLeave(e, this.ctx, {
						seriesIndex: i,
						dataPointIndex: j,
						w: w
					});
				}

				this.ctx.events.fireEvent('dataPointMouseLeave', [e, this.ctx, {
					seriesIndex: i,
					dataPointIndex: j,
					w: w
				}]);

				if (w.config.states.active.filter.type !== 'none') {
					if (path.node.getAttribute('selected') === 'true') {
						return;
					}
				}

				if (w.config.states.hover.filter.type !== 'none') {
					filters.getDefaultFilter(path, i);
				}
			}
		}, {
			key: "pathMouseDown",
			value: function pathMouseDown(path, e) {
				var w = this.w;
				var filters = new Filters(this.ctx);
				var i = parseInt(path.node.getAttribute('index'), 10);
				var j = parseInt(path.node.getAttribute('j'), 10);
				var selected = 'false';

				if (path.node.getAttribute('selected') === 'true') {
					path.node.setAttribute('selected', 'false');

					if (w.globals.selectedDataPoints[i].indexOf(j) > -1) {
						var index = w.globals.selectedDataPoints[i].indexOf(j);
						w.globals.selectedDataPoints[i].splice(index, 1);
					}
				} else {
					if (!w.config.states.active.allowMultipleDataPointsSelection && w.globals.selectedDataPoints.length > 0) {
						w.globals.selectedDataPoints = [];
						var elPaths = w.globals.dom.Paper.select('.apexcharts-series path').members;
						var elCircles = w.globals.dom.Paper.select('.apexcharts-series circle, .apexcharts-series rect').members;

						var deSelect = function deSelect(els) {
							Array.prototype.forEach.call(els, function (el) {
								el.node.setAttribute('selected', 'false');
								filters.getDefaultFilter(el, i);
							});
						};

						deSelect(elPaths);
						deSelect(elCircles);
					}

					path.node.setAttribute('selected', 'true');
					selected = 'true';

					if (typeof w.globals.selectedDataPoints[i] === 'undefined') {
						w.globals.selectedDataPoints[i] = [];
					}

					w.globals.selectedDataPoints[i].push(j);
				}

				if (selected === 'true') {
					var activeFilter = w.config.states.active.filter;

					if (activeFilter !== 'none') {
						filters.applyFilter(path, i, activeFilter.type, activeFilter.value);
					} else {
						// Reapply the hover filter in case it was removed by `deselect`when there is no active filter and it is not a touch device
						if (w.config.states.hover.filter !== 'none') {
							if (!w.globals.isTouchDevice) {
								var hoverFilter = w.config.states.hover.filter;
								filters.applyFilter(path, i, hoverFilter.type, hoverFilter.value);
							}
						}
					}
				} else {
					// If the item was deselected, apply hover state filter if it is not a touch device
					if (w.config.states.active.filter.type !== 'none') {
						if (w.config.states.hover.filter.type !== 'none' && !w.globals.isTouchDevice) {
							var hoverFilter = w.config.states.hover.filter;
							filters.applyFilter(path, i, hoverFilter.type, hoverFilter.value);
						} else {
							filters.getDefaultFilter(path, i);
						}
					}
				}

				if (typeof w.config.chart.events.dataPointSelection === 'function') {
					w.config.chart.events.dataPointSelection(e, this.ctx, {
						selectedDataPoints: w.globals.selectedDataPoints,
						seriesIndex: i,
						dataPointIndex: j,
						w: w
					});
				}

				if (e) {
					this.ctx.events.fireEvent('dataPointSelection', [e, this.ctx, {
						selectedDataPoints: w.globals.selectedDataPoints,
						seriesIndex: i,
						dataPointIndex: j,
						w: w
					}]);
				}
			}
		}, {
			key: "rotateAroundCenter",
			value: function rotateAroundCenter(el) {
				var coord = {};

				if (el && typeof el.getBBox === 'function') {
					coord = el.getBBox();
				}

				var x = coord.x + coord.width / 2;
				var y = coord.y + coord.height / 2;
				return {
					x: x,
					y: y
				};
			}
		}, {
			key: "getTextRects",
			value: function getTextRects(text, fontSize, fontFamily, transform) {
				var useBBox = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : true;
				var w = this.w;
				var virtualText = this.drawText({
					x: -200,
					y: -200,
					text: text,
					textAnchor: 'start',
					fontSize: fontSize,
					fontFamily: fontFamily,
					foreColor: '#fff',
					opacity: 0
				});

				if (transform) {
					virtualText.attr('transform', transform);
				}

				w.globals.dom.Paper.add(virtualText);
				var rect = virtualText.bbox();

				if (!useBBox) {
					rect = virtualText.node.getBoundingClientRect();
				}

				virtualText.remove();
				return {
					width: rect.width,
					height: rect.height
				};
			}
			/**
			 * append ... to long text
			 * http://stackoverflow.com/questions/9241315/trimming-text-to-a-given-pixel-width-in-svg
			 * @memberof Graphics
			 **/

		}, {
			key: "placeTextWithEllipsis",
			value: function placeTextWithEllipsis(textObj, textString, width) {
				if (typeof textObj.getComputedTextLength !== 'function') return;
				textObj.textContent = textString;

				if (textString.length > 0) {
					// ellipsis is needed
					if (textObj.getComputedTextLength() >= width / 1.1) {
						for (var x = textString.length - 3; x > 0; x -= 3) {
							if (textObj.getSubStringLength(0, x) <= width / 1.1) {
								textObj.textContent = textString.substring(0, x) + '...';
								return;
							}
						}

						textObj.textContent = '.'; // can't place at all
					}
				}
			}
		}], [{
			key: "setAttrs",
			value: function setAttrs(el, attrs) {
				for (var key in attrs) {
					if (attrs.hasOwnProperty(key)) {
						el.setAttribute(key, attrs[key]);
					}
				}
			}
		}]);

		return Graphics;
	}();

	/*
	 ** Util functions which are dependent on ApexCharts instance
	 */
	var CoreUtils = /*#__PURE__*/function () {
		function CoreUtils(ctx) {
			_classCallCheck(this, CoreUtils);

			this.ctx = ctx;
			this.w = ctx.w;
		}

		_createClass(CoreUtils, [{
			key: "getStackedSeriesTotals",
			value:
				/**
				 * @memberof CoreUtils
				 * returns the sum of all individual values in a multiple stacked series
				 * Eg. w.globals.series = [[32,33,43,12], [2,3,5,1]]
				 *  @return [34,36,48,13]
				 **/
				function getStackedSeriesTotals() {
					var excludedSeriesIndices = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
					var w = this.w;
					var total = [];
					if (w.globals.series.length === 0) return total;

					for (var i = 0; i < w.globals.series[w.globals.maxValsInArrayIndex].length; i++) {
						var t = 0;

						for (var j = 0; j < w.globals.series.length; j++) {
							if (typeof w.globals.series[j][i] !== 'undefined' && excludedSeriesIndices.indexOf(j) === -1) {
								t += w.globals.series[j][i];
							}
						}

						total.push(t);
					}

					return total;
				} // get total of the all values inside all series

		}, {
			key: "getSeriesTotalByIndex",
			value: function getSeriesTotalByIndex() {
				var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

				if (index === null) {
					// non-plot chart types - pie / donut / circle
					return this.w.config.series.reduce(function (acc, cur) {
						return acc + cur;
					}, 0);
				} else {
					// axis charts - supporting multiple series
					return this.w.globals.series[index].reduce(function (acc, cur) {
						return acc + cur;
					}, 0);
				}
			}
		}, {
			key: "isSeriesNull",
			value: function isSeriesNull() {
				var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
				var r = [];

				if (index === null) {
					// non-plot chart types - pie / donut / circle
					r = this.w.config.series.filter(function (d) {
						return d !== null;
					});
				} else {
					// axis charts - supporting multiple series
					r = this.w.config.series[index].data.filter(function (d) {
						return d !== null;
					});
				}

				return r.length === 0;
			}
		}, {
			key: "seriesHaveSameValues",
			value: function seriesHaveSameValues(index) {
				return this.w.globals.series[index].every(function (val, i, arr) {
					return val === arr[0];
				});
			}
		}, {
			key: "getCategoryLabels",
			value: function getCategoryLabels(labels) {
				var w = this.w;
				var catLabels = labels.slice();

				if (w.config.xaxis.convertedCatToNumeric) {
					catLabels = labels.map(function (i, li) {
						return w.config.xaxis.labels.formatter(i - w.globals.minX + 1);
					});
				}

				return catLabels;
			} // maxValsInArrayIndex is the index of series[] which has the largest number of items

		}, {
			key: "getLargestSeries",
			value: function getLargestSeries() {
				var w = this.w;
				w.globals.maxValsInArrayIndex = w.globals.series.map(function (a) {
					return a.length;
				}).indexOf(Math.max.apply(Math, w.globals.series.map(function (a) {
					return a.length;
				})));
			}
		}, {
			key: "getLargestMarkerSize",
			value: function getLargestMarkerSize() {
				var w = this.w;
				var size = 0;
				w.globals.markers.size.forEach(function (m) {
					size = Math.max(size, m);
				});

				if (w.config.markers.discrete && w.config.markers.discrete.length) {
					w.config.markers.discrete.forEach(function (m) {
						size = Math.max(size, m.size);
					});
				}

				if (size > 0) {
					size += w.config.markers.hover.sizeOffset + 1;
				}

				w.globals.markers.largestSize = size;
				return size;
			}
			/**
			 * @memberof Core
			 * returns the sum of all values in a series
			 * Eg. w.globals.series = [[32,33,43,12], [2,3,5,1]]
			 *  @return [120, 11]
			 **/

		}, {
			key: "getSeriesTotals",
			value: function getSeriesTotals() {
				var w = this.w;
				w.globals.seriesTotals = w.globals.series.map(function (ser, index) {
					var total = 0;

					if (Array.isArray(ser)) {
						for (var j = 0; j < ser.length; j++) {
							total += ser[j];
						}
					} else {
						// for pie/donuts/gauges
						total += ser;
					}

					return total;
				});
			}
		}, {
			key: "getSeriesTotalsXRange",
			value: function getSeriesTotalsXRange(minX, maxX) {
				var w = this.w;
				var seriesTotalsXRange = w.globals.series.map(function (ser, index) {
					var total = 0;

					for (var j = 0; j < ser.length; j++) {
						if (w.globals.seriesX[index][j] > minX && w.globals.seriesX[index][j] < maxX) {
							total += ser[j];
						}
					}

					return total;
				});
				return seriesTotalsXRange;
			}
			/**
			 * @memberof CoreUtils
			 * returns the percentage value of all individual values which can be used in a 100% stacked series
			 * Eg. w.globals.series = [[32, 33, 43, 12], [2, 3, 5, 1]]
			 *  @return [[94.11, 91.66, 89.58, 92.30], [5.88, 8.33, 10.41, 7.7]]
			 **/

		}, {
			key: "getPercentSeries",
			value: function getPercentSeries() {
				var w = this.w;
				w.globals.seriesPercent = w.globals.series.map(function (ser, index) {
					var seriesPercent = [];

					if (Array.isArray(ser)) {
						for (var j = 0; j < ser.length; j++) {
							var total = w.globals.stackedSeriesTotals[j];
							var percent = 0;

							if (total) {
								percent = 100 * ser[j] / total;
							}

							seriesPercent.push(percent);
						}
					} else {
						var _total = w.globals.seriesTotals.reduce(function (acc, val) {
							return acc + val;
						}, 0);

						var _percent = 100 * ser / _total;

						seriesPercent.push(_percent);
					}

					return seriesPercent;
				});
			}
		}, {
			key: "getCalculatedRatios",
			value: function getCalculatedRatios() {
				var gl = this.w.globals;
				var yRatio = [];
				var invertedYRatio = 0;
				var xRatio = 0;
				var initialXRatio = 0;
				var invertedXRatio = 0;
				var zRatio = 0;
				var baseLineY = [];
				var baseLineInvertedY = 0.1;
				var baseLineX = 0;
				gl.yRange = [];

				if (gl.isMultipleYAxis) {
					for (var i = 0; i < gl.minYArr.length; i++) {
						gl.yRange.push(Math.abs(gl.minYArr[i] - gl.maxYArr[i]));
						baseLineY.push(0);
					}
				} else {
					gl.yRange.push(Math.abs(gl.minY - gl.maxY));
				}

				gl.xRange = Math.abs(gl.maxX - gl.minX);
				gl.zRange = Math.abs(gl.maxZ - gl.minZ); // multiple y axis

				for (var _i = 0; _i < gl.yRange.length; _i++) {
					yRatio.push(gl.yRange[_i] / gl.gridHeight);
				}

				xRatio = gl.xRange / gl.gridWidth;
				initialXRatio = Math.abs(gl.initialMaxX - gl.initialMinX) / gl.gridWidth;
				invertedYRatio = gl.yRange / gl.gridWidth;
				invertedXRatio = gl.xRange / gl.gridHeight;
				zRatio = gl.zRange / gl.gridHeight * 16;

				if (!zRatio) {
					zRatio = 1;
				}

				if (gl.minY !== Number.MIN_VALUE && Math.abs(gl.minY) !== 0) {
					// Negative numbers present in series
					gl.hasNegs = true;
				}

				if (gl.isMultipleYAxis) {
					baseLineY = []; // baseline variables is the 0 of the yaxis which will be needed when there are negatives

					for (var _i2 = 0; _i2 < yRatio.length; _i2++) {
						baseLineY.push(-gl.minYArr[_i2] / yRatio[_i2]);
					}
				} else {
					baseLineY.push(-gl.minY / yRatio[0]);

					if (gl.minY !== Number.MIN_VALUE && Math.abs(gl.minY) !== 0) {
						baseLineInvertedY = -gl.minY / invertedYRatio; // this is for bar chart

						baseLineX = gl.minX / xRatio;
					}
				}

				return {
					yRatio: yRatio,
					invertedYRatio: invertedYRatio,
					zRatio: zRatio,
					xRatio: xRatio,
					initialXRatio: initialXRatio,
					invertedXRatio: invertedXRatio,
					baseLineInvertedY: baseLineInvertedY,
					baseLineY: baseLineY,
					baseLineX: baseLineX
				};
			}
		}, {
			key: "getLogSeries",
			value: function getLogSeries(series) {
				var _this = this;

				var w = this.w;
				w.globals.seriesLog = series.map(function (s, i) {
					if (w.config.yaxis[i] && w.config.yaxis[i].logarithmic) {
						return s.map(function (d) {
							if (d === null) return null;
							return _this.getLogVal(w.config.yaxis[i].logBase, d, i);
						});
					} else {
						return s;
					}
				});
				return w.globals.invalidLogScale ? series : w.globals.seriesLog;
			}
		}, {
			key: "getBaseLog",
			value: function getBaseLog(base, value) {
				return Math.log(value) / Math.log(base);
			}
		}, {
			key: "getLogVal",
			value: function getLogVal(b, d, yIndex) {
				if (d === 0) {
					return 0;
				}

				var w = this.w;
				var min_log_val = w.globals.minYArr[yIndex] === 0 ? -1 // make sure we dont calculate log of 0
					: this.getBaseLog(b, w.globals.minYArr[yIndex]);
				var max_log_val = w.globals.maxYArr[yIndex] === 0 ? 0 // make sure we dont calculate log of 0
					: this.getBaseLog(b, w.globals.maxYArr[yIndex]);
				var number_of_height_levels = max_log_val - min_log_val;
				if (d < 1) return d / number_of_height_levels;
				var log_height_value = this.getBaseLog(b, d) - min_log_val;
				return log_height_value / number_of_height_levels;
			}
		}, {
			key: "getLogYRatios",
			value: function getLogYRatios(yRatio) {
				var _this2 = this;

				var w = this.w;
				var gl = this.w.globals;
				gl.yLogRatio = yRatio.slice();
				gl.logYRange = gl.yRange.map(function (yRange, i) {
					if (w.config.yaxis[i] && _this2.w.config.yaxis[i].logarithmic) {
						var maxY = -Number.MAX_VALUE;
						var minY = Number.MIN_VALUE;
						var range = 1;
						gl.seriesLog.forEach(function (s, si) {
							s.forEach(function (v) {
								if (w.config.yaxis[si] && w.config.yaxis[si].logarithmic) {
									maxY = Math.max(v, maxY);
									minY = Math.min(v, minY);
								}
							});
						});
						range = Math.pow(gl.yRange[i], Math.abs(minY - maxY) / gl.yRange[i]);
						gl.yLogRatio[i] = range / gl.gridHeight;
						return range;
					}
				});
				return gl.invalidLogScale ? yRatio.slice() : gl.yLogRatio;
			} // Some config objects can be array - and we need to extend them correctly

		}], [{
			key: "checkComboSeries",
			value: function checkComboSeries(series) {
				var comboCharts = false;
				var comboBarCount = 0;
				var comboCount = 0; // if user specified a type in series too, turn on comboCharts flag

				if (series.length && typeof series[0].type !== 'undefined') {
					series.forEach(function (s) {
						if (s.type === 'bar' || s.type === 'column' || s.type === 'candlestick' || s.type === 'boxPlot') {
							comboBarCount++;
						}

						if (typeof s.type !== 'undefined') {
							comboCount++;
						}
					});
				}

				if (comboCount > 0) {
					comboCharts = true;
				}

				return {
					comboBarCount: comboBarCount,
					comboCharts: comboCharts
				};
			}
		}, {
			key: "extendArrayProps",
			value: function extendArrayProps(configInstance, options, w) {
				if (options.yaxis) {
					options = configInstance.extendYAxis(options, w);
				}

				if (options.annotations) {
					if (options.annotations.yaxis) {
						options = configInstance.extendYAxisAnnotations(options);
					}

					if (options.annotations.xaxis) {
						options = configInstance.extendXAxisAnnotations(options);
					}

					if (options.annotations.points) {
						options = configInstance.extendPointAnnotations(options);
					}
				}

				return options;
			}
		}]);

		return CoreUtils;
	}();

	var Helpers$4 = /*#__PURE__*/function () {
		function Helpers(annoCtx) {
			_classCallCheck(this, Helpers);

			this.w = annoCtx.w;
			this.annoCtx = annoCtx;
		}

		_createClass(Helpers, [{
			key: "setOrientations",
			value: function setOrientations(anno) {
				var annoIndex = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
				var w = this.w;

				if (anno.label.orientation === 'vertical') {
					var i = annoIndex !== null ? annoIndex : 0;
					var xAnno = w.globals.dom.baseEl.querySelector(".apexcharts-xaxis-annotations .apexcharts-xaxis-annotation-label[rel='".concat(i, "']"));

					if (xAnno !== null) {
						var xAnnoCoord = xAnno.getBoundingClientRect();
						xAnno.setAttribute('x', parseFloat(xAnno.getAttribute('x')) - xAnnoCoord.height + 4);

						if (anno.label.position === 'top') {
							xAnno.setAttribute('y', parseFloat(xAnno.getAttribute('y')) + xAnnoCoord.width);
						} else {
							xAnno.setAttribute('y', parseFloat(xAnno.getAttribute('y')) - xAnnoCoord.width);
						}

						var annoRotatingCenter = this.annoCtx.graphics.rotateAroundCenter(xAnno);
						var x = annoRotatingCenter.x;
						var y = annoRotatingCenter.y;
						xAnno.setAttribute('transform', "rotate(-90 ".concat(x, " ").concat(y, ")"));
					}
				}
			}
		}, {
			key: "addBackgroundToAnno",
			value: function addBackgroundToAnno(annoEl, anno) {
				var w = this.w;
				if (!annoEl || typeof anno.label.text === 'undefined' || typeof anno.label.text !== 'undefined' && !String(anno.label.text).trim()) return null;
				var elGridRect = w.globals.dom.baseEl.querySelector('.apexcharts-grid').getBoundingClientRect();
				var coords = annoEl.getBoundingClientRect();
				var pleft = anno.label.style.padding.left;
				var pright = anno.label.style.padding.right;
				var ptop = anno.label.style.padding.top;
				var pbottom = anno.label.style.padding.bottom;

				if (anno.label.orientation === 'vertical') {
					ptop = anno.label.style.padding.left;
					pbottom = anno.label.style.padding.right;
					pleft = anno.label.style.padding.top;
					pright = anno.label.style.padding.bottom;
				}

				var x1 = coords.left - elGridRect.left - pleft;
				var y1 = coords.top - elGridRect.top - ptop;
				var elRect = this.annoCtx.graphics.drawRect(x1 - w.globals.barPadForNumericAxis, y1, coords.width + pleft + pright, coords.height + ptop + pbottom, anno.label.borderRadius, anno.label.style.background, 1, anno.label.borderWidth, anno.label.borderColor, 0);

				if (anno.id) {
					// don't escapeString for this ID as it causes duplicate rects
					elRect.node.classList.add(anno.id);
				}

				return elRect;
			}
		}, {
			key: "annotationsBackground",
			value: function annotationsBackground() {
				var _this = this;

				var w = this.w;

				var add = function add(anno, i, type) {
					var annoLabel = w.globals.dom.baseEl.querySelector(".apexcharts-".concat(type, "-annotations .apexcharts-").concat(type, "-annotation-label[rel='").concat(i, "']"));

					if (annoLabel) {
						var parent = annoLabel.parentNode;

						var elRect = _this.addBackgroundToAnno(annoLabel, anno);

						if (elRect) {
							parent.insertBefore(elRect.node, annoLabel);

							if (anno.label.mouseEnter) {
								elRect.node.addEventListener('mouseenter', anno.label.mouseEnter.bind(_this, anno));
							}

							if (anno.label.mouseLeave) {
								elRect.node.addEventListener('mouseleave', anno.label.mouseLeave.bind(_this, anno));
							}

							if (anno.label.click) {
								elRect.node.addEventListener('click', anno.label.click.bind(_this, anno));
							}
						}
					}
				};

				w.config.annotations.xaxis.map(function (anno, i) {
					add(anno, i, 'xaxis');
				});
				w.config.annotations.yaxis.map(function (anno, i) {
					add(anno, i, 'yaxis');
				});
				w.config.annotations.points.map(function (anno, i) {
					add(anno, i, 'point');
				});
			}
		}, {
			key: "getY1Y2",
			value: function getY1Y2(type, anno) {
				var y = type === 'y1' ? anno.y : anno.y2;
				var yP;
				var w = this.w;

				if (this.annoCtx.invertAxis) {
					var catIndex = w.globals.labels.indexOf(y);

					if (w.config.xaxis.convertedCatToNumeric) {
						catIndex = w.globals.categoryLabels.indexOf(y);
					}

					var xLabel = w.globals.dom.baseEl.querySelector('.apexcharts-yaxis-texts-g text:nth-child(' + (catIndex + 1) + ')');

					if (xLabel) {
						yP = parseFloat(xLabel.getAttribute('y'));
					}
				} else {
					var yPos;

					if (w.config.yaxis[anno.yAxisIndex].logarithmic) {
						var coreUtils = new CoreUtils(this.annoCtx.ctx);
						y = coreUtils.getLogVal(y, anno.yAxisIndex);
						yPos = y / w.globals.yLogRatio[anno.yAxisIndex];
					} else {
						yPos = (y - w.globals.minYArr[anno.yAxisIndex]) / (w.globals.yRange[anno.yAxisIndex] / w.globals.gridHeight);
					}

					yP = w.globals.gridHeight - yPos;

					if (anno.marker && (anno.y === undefined || anno.y === null)) {
						// point annotation
						yP = 0;
					}

					if (w.config.yaxis[anno.yAxisIndex] && w.config.yaxis[anno.yAxisIndex].reversed) {
						yP = yPos;
					}
				}

				if (typeof y === 'string' && y.indexOf('px') > -1) {
					yP = parseFloat(y);
				}

				return yP;
			}
		}, {
			key: "getX1X2",
			value: function getX1X2(type, anno) {
				var w = this.w;
				var min = this.annoCtx.invertAxis ? w.globals.minY : w.globals.minX;
				var max = this.annoCtx.invertAxis ? w.globals.maxY : w.globals.maxX;
				var range = this.annoCtx.invertAxis ? w.globals.yRange[0] : w.globals.xRange;
				var x1 = (anno.x - min) / (range / w.globals.gridWidth);

				if (this.annoCtx.inversedReversedAxis) {
					x1 = (max - anno.x) / (range / w.globals.gridWidth);
				}

				if ((w.config.xaxis.type === 'category' || w.config.xaxis.convertedCatToNumeric) && !this.annoCtx.invertAxis && !w.globals.dataFormatXNumeric) {
					x1 = this.getStringX(anno.x);
				}

				var x2 = (anno.x2 - min) / (range / w.globals.gridWidth);

				if (this.annoCtx.inversedReversedAxis) {
					x2 = (max - anno.x2) / (range / w.globals.gridWidth);
				}

				if ((w.config.xaxis.type === 'category' || w.config.xaxis.convertedCatToNumeric) && !this.annoCtx.invertAxis && !w.globals.dataFormatXNumeric) {
					x2 = this.getStringX(anno.x2);
				}

				if ((anno.x === undefined || anno.x === null) && anno.marker) {
					// point annotation in a horizontal chart
					x1 = w.globals.gridWidth;
				}

				if (type === 'x1' && typeof anno.x === 'string' && anno.x.indexOf('px') > -1) {
					x1 = parseFloat(anno.x);
				}

				if (type === 'x2' && typeof anno.x2 === 'string' && anno.x2.indexOf('px') > -1) {
					x2 = parseFloat(anno.x2);
				}

				return type === 'x1' ? x1 : x2;
			}
		}, {
			key: "getStringX",
			value: function getStringX(x) {
				var w = this.w;
				var rX = x;

				if (w.config.xaxis.convertedCatToNumeric && w.globals.categoryLabels.length) {
					x = w.globals.categoryLabels.indexOf(x) + 1;
				}

				var catIndex = w.globals.labels.indexOf(x);
				var xLabel = w.globals.dom.baseEl.querySelector('.apexcharts-xaxis-texts-g text:nth-child(' + (catIndex + 1) + ')');

				if (xLabel) {
					rX = parseFloat(xLabel.getAttribute('x'));
				}

				return rX;
			}
		}]);

		return Helpers;
	}();

	var XAnnotations = /*#__PURE__*/function () {
		function XAnnotations(annoCtx) {
			_classCallCheck(this, XAnnotations);

			this.w = annoCtx.w;
			this.annoCtx = annoCtx;
			this.invertAxis = this.annoCtx.invertAxis;
			this.helpers = new Helpers$4(this.annoCtx);
		}

		_createClass(XAnnotations, [{
			key: "addXaxisAnnotation",
			value: function addXaxisAnnotation(anno, parent, index) {
				var w = this.w;
				var x1 = this.helpers.getX1X2('x1', anno);
				var x2;
				var text = anno.label.text;
				var strokeDashArray = anno.strokeDashArray;
				if (!Utils$1.isNumber(x1)) return;

				if (anno.x2 === null || typeof anno.x2 === 'undefined') {
					var line = this.annoCtx.graphics.drawLine(x1 + anno.offsetX, // x1
						0 + anno.offsetY, // y1
						x1 + anno.offsetX, // x2
						w.globals.gridHeight + anno.offsetY, // y2
						anno.borderColor, // lineColor
						strokeDashArray, //dashArray
						anno.borderWidth);
					parent.appendChild(line.node);

					if (anno.id) {
						line.node.classList.add(anno.id);
					}
				} else {
					x2 = this.helpers.getX1X2('x2', anno);

					if (x2 < x1) {
						var temp = x1;
						x1 = x2;
						x2 = temp;
					}

					var rect = this.annoCtx.graphics.drawRect(x1 + anno.offsetX, // x1
						0 + anno.offsetY, // y1
						x2 - x1, // x2
						w.globals.gridHeight + anno.offsetY, // y2
						0, // radius
						anno.fillColor, // color
						anno.opacity, // opacity,
						1, // strokeWidth
						anno.borderColor, // strokeColor
						strokeDashArray // stokeDashArray
					);
					rect.node.classList.add('apexcharts-annotation-rect');
					rect.attr('clip-path', "url(#gridRectMask".concat(w.globals.cuid, ")"));
					parent.appendChild(rect.node);

					if (anno.id) {
						rect.node.classList.add(anno.id);
					}
				}

				var textRects = this.annoCtx.graphics.getTextRects(text, parseFloat(anno.label.style.fontSize));
				var textY = anno.label.position === 'top' ? 4 : anno.label.position === 'center' ? w.globals.gridHeight / 2 + (anno.label.orientation === 'vertical' ? textRects.width / 2 : 0) : w.globals.gridHeight;
				var elText = this.annoCtx.graphics.drawText({
					x: x1 + anno.label.offsetX,
					y: textY + anno.label.offsetY - (anno.label.orientation === 'vertical' ? anno.label.position === 'top' ? textRects.width / 2 - 12 : -textRects.width / 2 : 0),
					text: text,
					textAnchor: anno.label.textAnchor,
					fontSize: anno.label.style.fontSize,
					fontFamily: anno.label.style.fontFamily,
					fontWeight: anno.label.style.fontWeight,
					foreColor: anno.label.style.color,
					cssClass: "apexcharts-xaxis-annotation-label ".concat(anno.label.style.cssClass, " ").concat(anno.id ? anno.id : '')
				});
				elText.attr({
					rel: index
				});
				parent.appendChild(elText.node); // after placing the annotations on svg, set any vertically placed annotations

				this.annoCtx.helpers.setOrientations(anno, index);
			}
		}, {
			key: "drawXAxisAnnotations",
			value: function drawXAxisAnnotations() {
				var _this = this;

				var w = this.w;
				var elg = this.annoCtx.graphics.group({
					class: 'apexcharts-xaxis-annotations'
				});
				w.config.annotations.xaxis.map(function (anno, index) {
					_this.addXaxisAnnotation(anno, elg.node, index);
				});
				return elg;
			}
		}]);

		return XAnnotations;
	}();

	var YAnnotations = /*#__PURE__*/function () {
		function YAnnotations(annoCtx) {
			_classCallCheck(this, YAnnotations);

			this.w = annoCtx.w;
			this.annoCtx = annoCtx;
			this.helpers = new Helpers$4(this.annoCtx);
		}

		_createClass(YAnnotations, [{
			key: "addYaxisAnnotation",
			value: function addYaxisAnnotation(anno, parent, index) {
				var w = this.w;
				var strokeDashArray = anno.strokeDashArray;
				var y1 = this.helpers.getY1Y2('y1', anno);
				var y2;
				var text = anno.label.text;

				if (anno.y2 === null || typeof anno.y2 === 'undefined') {
					var line = this.annoCtx.graphics.drawLine(0 + anno.offsetX, // x1
						y1 + anno.offsetY, // y1
						this._getYAxisAnnotationWidth(anno), // x2
						y1 + anno.offsetY, // y2
						anno.borderColor, // lineColor
						strokeDashArray, // dashArray
						anno.borderWidth);
					parent.appendChild(line.node);

					if (anno.id) {
						line.node.classList.add(anno.id);
					}
				} else {
					y2 = this.helpers.getY1Y2('y2', anno);

					if (y2 > y1) {
						var temp = y1;
						y1 = y2;
						y2 = temp;
					}

					var rect = this.annoCtx.graphics.drawRect(0 + anno.offsetX, // x1
						y2 + anno.offsetY, // y1
						this._getYAxisAnnotationWidth(anno), // x2
						y1 - y2, // y2
						0, // radius
						anno.fillColor, // color
						anno.opacity, // opacity,
						1, // strokeWidth
						anno.borderColor, // strokeColor
						strokeDashArray // stokeDashArray
					);
					rect.node.classList.add('apexcharts-annotation-rect');
					rect.attr('clip-path', "url(#gridRectMask".concat(w.globals.cuid, ")"));
					parent.appendChild(rect.node);

					if (anno.id) {
						rect.node.classList.add(anno.id);
					}
				}

				var textX = anno.label.position === 'right' ? w.globals.gridWidth : anno.label.position === 'center' ? w.globals.gridWidth / 2 : 0;
				var elText = this.annoCtx.graphics.drawText({
					x: textX + anno.label.offsetX,
					y: (y2 != null ? y2 : y1) + anno.label.offsetY - 3,
					text: text,
					textAnchor: anno.label.textAnchor,
					fontSize: anno.label.style.fontSize,
					fontFamily: anno.label.style.fontFamily,
					fontWeight: anno.label.style.fontWeight,
					foreColor: anno.label.style.color,
					cssClass: "apexcharts-yaxis-annotation-label ".concat(anno.label.style.cssClass, " ").concat(anno.id ? anno.id : '')
				});
				elText.attr({
					rel: index
				});
				parent.appendChild(elText.node);
			}
		}, {
			key: "_getYAxisAnnotationWidth",
			value: function _getYAxisAnnotationWidth(anno) {
				// issue apexcharts.js#2009
				var w = this.w;
				var width = w.globals.gridWidth;

				if (anno.width.indexOf('%') > -1) {
					width = w.globals.gridWidth * parseInt(anno.width, 10) / 100;
				} else {
					width = parseInt(anno.width, 10);
				}

				return width + anno.offsetX;
			}
		}, {
			key: "drawYAxisAnnotations",
			value: function drawYAxisAnnotations() {
				var _this = this;

				var w = this.w;
				var elg = this.annoCtx.graphics.group({
					class: 'apexcharts-yaxis-annotations'
				});
				w.config.annotations.yaxis.map(function (anno, index) {
					_this.addYaxisAnnotation(anno, elg.node, index);
				});
				return elg;
			}
		}]);

		return YAnnotations;
	}();

	var PointAnnotations = /*#__PURE__*/function () {
		function PointAnnotations(annoCtx) {
			_classCallCheck(this, PointAnnotations);

			this.w = annoCtx.w;
			this.annoCtx = annoCtx;
			this.helpers = new Helpers$4(this.annoCtx);
		}

		_createClass(PointAnnotations, [{
			key: "addPointAnnotation",
			value: function addPointAnnotation(anno, parent, index) {
				this.w;
				var x = this.helpers.getX1X2('x1', anno);
				var y = this.helpers.getY1Y2('y1', anno);
				if (!Utils$1.isNumber(x)) return;
				var optsPoints = {
					pSize: anno.marker.size,
					pointStrokeWidth: anno.marker.strokeWidth,
					pointFillColor: anno.marker.fillColor,
					pointStrokeColor: anno.marker.strokeColor,
					shape: anno.marker.shape,
					pRadius: anno.marker.radius,
					class: "apexcharts-point-annotation-marker ".concat(anno.marker.cssClass, " ").concat(anno.id ? anno.id : '')
				};
				var point = this.annoCtx.graphics.drawMarker(x + anno.marker.offsetX, y + anno.marker.offsetY, optsPoints);
				parent.appendChild(point.node);
				var text = anno.label.text ? anno.label.text : '';
				var elText = this.annoCtx.graphics.drawText({
					x: x + anno.label.offsetX,
					y: y + anno.label.offsetY - anno.marker.size - parseFloat(anno.label.style.fontSize) / 1.6,
					text: text,
					textAnchor: anno.label.textAnchor,
					fontSize: anno.label.style.fontSize,
					fontFamily: anno.label.style.fontFamily,
					fontWeight: anno.label.style.fontWeight,
					foreColor: anno.label.style.color,
					cssClass: "apexcharts-point-annotation-label ".concat(anno.label.style.cssClass, " ").concat(anno.id ? anno.id : '')
				});
				elText.attr({
					rel: index
				});
				parent.appendChild(elText.node); // TODO: deprecate this as we will use custom

				if (anno.customSVG.SVG) {
					var g = this.annoCtx.graphics.group({
						class: 'apexcharts-point-annotations-custom-svg ' + anno.customSVG.cssClass
					});
					g.attr({
						transform: "translate(".concat(x + anno.customSVG.offsetX, ", ").concat(y + anno.customSVG.offsetY, ")")
					});
					g.node.innerHTML = anno.customSVG.SVG;
					parent.appendChild(g.node);
				}

				if (anno.image.path) {
					var imgWidth = anno.image.width ? anno.image.width : 20;
					var imgHeight = anno.image.height ? anno.image.height : 20;
					point = this.annoCtx.addImage({
						x: x + anno.image.offsetX - imgWidth / 2,
						y: y + anno.image.offsetY - imgHeight / 2,
						width: imgWidth,
						height: imgHeight,
						path: anno.image.path,
						appendTo: '.apexcharts-point-annotations'
					});
				}

				if (anno.mouseEnter) {
					point.node.addEventListener('mouseenter', anno.mouseEnter.bind(this, anno));
				}

				if (anno.mouseLeave) {
					point.node.addEventListener('mouseleave', anno.mouseLeave.bind(this, anno));
				}

				if (anno.click) {
					point.node.addEventListener('click', anno.click.bind(this, anno));
				}
			}
		}, {
			key: "drawPointAnnotations",
			value: function drawPointAnnotations() {
				var _this = this;

				var w = this.w;
				var elg = this.annoCtx.graphics.group({
					class: 'apexcharts-point-annotations'
				});
				w.config.annotations.points.map(function (anno, index) {
					_this.addPointAnnotation(anno, elg.node, index);
				});
				return elg;
			}
		}]);

		return PointAnnotations;
	}();

	const name = "en";
	const options = {
		months: [
			"January",
			"February",
			"March",
			"April",
			"May",
			"June",
			"July",
			"August",
			"September",
			"October",
			"November",
			"December"
		],
		shortMonths: [
			"Jan",
			"Feb",
			"Mar",
			"Apr",
			"May",
			"Jun",
			"Jul",
			"Aug",
			"Sep",
			"Oct",
			"Nov",
			"Dec"
		],
		days: [
			"Sunday",
			"Monday",
			"Tuesday",
			"Wednesday",
			"Thursday",
			"Friday",
			"Saturday"
		],
		shortDays: [
			"Sun",
			"Mon",
			"Tue",
			"Wed",
			"Thu",
			"Fri",
			"Sat"
		],
		toolbar: {
			exportToSVG: "Download SVG",
			exportToPNG: "Download PNG",
			exportToCSV: "Download CSV",
			menu: "Menu",
			selection: "Selection",
			selectionZoom: "Selection Zoom",
			zoomIn: "Zoom In",
			zoomOut: "Zoom Out",
			pan: "Panning",
			reset: "Reset Zoom"
		}
	};
	var en = {
		name: name,
		options: options
	};

	var Options = /*#__PURE__*/function () {
		function Options() {
			_classCallCheck(this, Options);

			this.yAxis = {
				show: true,
				showAlways: false,
				showForNullSeries: true,
				seriesName: undefined,
				opposite: false,
				reversed: false,
				logarithmic: false,
				logBase: 10,
				tickAmount: undefined,
				forceNiceScale: false,
				max: undefined,
				min: undefined,
				floating: false,
				decimalsInFloat: undefined,
				labels: {
					show: true,
					minWidth: 0,
					maxWidth: 160,
					offsetX: 0,
					offsetY: 0,
					align: undefined,
					rotate: 0,
					padding: 20,
					style: {
						colors: [],
						fontSize: '11px',
						fontWeight: 400,
						fontFamily: undefined,
						cssClass: ''
					},
					formatter: undefined
				},
				axisBorder: {
					show: false,
					color: '#e0e0e0',
					width: 1,
					offsetX: 0,
					offsetY: 0
				},
				axisTicks: {
					show: false,
					color: '#e0e0e0',
					width: 6,
					offsetX: 0,
					offsetY: 0
				},
				title: {
					text: undefined,
					rotate: -90,
					offsetY: 0,
					offsetX: 0,
					style: {
						color: undefined,
						fontSize: '11px',
						fontWeight: 900,
						fontFamily: undefined,
						cssClass: ''
					}
				},
				tooltip: {
					enabled: false,
					offsetX: 0
				},
				crosshairs: {
					show: true,
					position: 'front',
					stroke: {
						color: '#b6b6b6',
						width: 1,
						dashArray: 0
					}
				}
			};
			this.pointAnnotation = {
				id: undefined,
				x: 0,
				y: null,
				yAxisIndex: 0,
				seriesIndex: 0,
				mouseEnter: undefined,
				mouseLeave: undefined,
				click: undefined,
				marker: {
					size: 4,
					fillColor: '#fff',
					strokeWidth: 2,
					strokeColor: '#333',
					shape: 'circle',
					offsetX: 0,
					offsetY: 0,
					radius: 2,
					cssClass: ''
				},
				label: {
					borderColor: '#c2c2c2',
					borderWidth: 1,
					borderRadius: 2,
					text: undefined,
					textAnchor: 'middle',
					offsetX: 0,
					offsetY: 0,
					mouseEnter: undefined,
					mouseLeave: undefined,
					click: undefined,
					style: {
						background: '#fff',
						color: undefined,
						fontSize: '11px',
						fontFamily: undefined,
						fontWeight: 400,
						cssClass: '',
						padding: {
							left: 5,
							right: 5,
							top: 2,
							bottom: 2
						}
					}
				},
				customSVG: {
					// this will be deprecated in the next major version as it is going to be replaced with a better alternative below
					SVG: undefined,
					cssClass: undefined,
					offsetX: 0,
					offsetY: 0
				},
				image: {
					path: undefined,
					width: 20,
					height: 20,
					offsetX: 0,
					offsetY: 0
				}
			};
			this.yAxisAnnotation = {
				id: undefined,
				y: 0,
				y2: null,
				strokeDashArray: 1,
				fillColor: '#c2c2c2',
				borderColor: '#c2c2c2',
				borderWidth: 1,
				opacity: 0.3,
				offsetX: 0,
				offsetY: 0,
				width: '100%',
				yAxisIndex: 0,
				label: {
					borderColor: '#c2c2c2',
					borderWidth: 1,
					borderRadius: 2,
					text: undefined,
					textAnchor: 'end',
					position: 'right',
					offsetX: 0,
					offsetY: -3,
					mouseEnter: undefined,
					mouseLeave: undefined,
					click: undefined,
					style: {
						background: '#fff',
						color: undefined,
						fontSize: '11px',
						fontFamily: undefined,
						fontWeight: 400,
						cssClass: '',
						padding: {
							left: 5,
							right: 5,
							top: 2,
							bottom: 2
						}
					}
				}
			};
			this.xAxisAnnotation = {
				id: undefined,
				x: 0,
				x2: null,
				strokeDashArray: 1,
				fillColor: '#c2c2c2',
				borderColor: '#c2c2c2',
				borderWidth: 1,
				opacity: 0.3,
				offsetX: 0,
				offsetY: 0,
				label: {
					borderColor: '#c2c2c2',
					borderWidth: 1,
					borderRadius: 2,
					text: undefined,
					textAnchor: 'middle',
					orientation: 'vertical',
					position: 'top',
					offsetX: 0,
					offsetY: 0,
					mouseEnter: undefined,
					mouseLeave: undefined,
					click: undefined,
					style: {
						background: '#fff',
						color: undefined,
						fontSize: '11px',
						fontFamily: undefined,
						fontWeight: 400,
						cssClass: '',
						padding: {
							left: 5,
							right: 5,
							top: 2,
							bottom: 2
						}
					}
				}
			};
			this.text = {
				x: 0,
				y: 0,
				text: '',
				textAnchor: 'start',
				foreColor: undefined,
				fontSize: '13px',
				fontFamily: undefined,
				fontWeight: 400,
				appendTo: '.apexcharts-annotations',
				backgroundColor: 'transparent',
				borderColor: '#c2c2c2',
				borderRadius: 0,
				borderWidth: 0,
				paddingLeft: 4,
				paddingRight: 4,
				paddingTop: 2,
				paddingBottom: 2
			};
		}

		_createClass(Options, [{
			key: "init",
			value: function init() {
				return {
					annotations: {
						yaxis: [this.yAxisAnnotation],
						xaxis: [this.xAxisAnnotation],
						points: [this.pointAnnotation],
						texts: [],
						images: [],
						shapes: []
					},
					chart: {
						animations: {
							enabled: true,
							easing: 'easeinout',
							// linear, easeout, easein, easeinout, swing, bounce, elastic
							speed: 800,
							animateGradually: {
								delay: 150,
								enabled: true
							},
							dynamicAnimation: {
								enabled: true,
								speed: 350
							}
						},
						background: 'transparent',
						locales: [en],
						defaultLocale: 'en',
						dropShadow: {
							enabled: false,
							enabledOnSeries: undefined,
							top: 2,
							left: 2,
							blur: 4,
							color: '#000',
							opacity: 0.35
						},
						events: {
							animationEnd: undefined,
							beforeMount: undefined,
							mounted: undefined,
							updated: undefined,
							click: undefined,
							mouseMove: undefined,
							mouseLeave: undefined,
							xAxisLabelClick: undefined,
							legendClick: undefined,
							markerClick: undefined,
							selection: undefined,
							dataPointSelection: undefined,
							dataPointMouseEnter: undefined,
							dataPointMouseLeave: undefined,
							beforeZoom: undefined,
							beforeResetZoom: undefined,
							zoomed: undefined,
							scrolled: undefined,
							brushScrolled: undefined
						},
						foreColor: '#373d3f',
						fontFamily: 'Helvetica, Arial, sans-serif',
						height: 'auto',
						parentHeightOffset: 15,
						redrawOnParentResize: true,
						redrawOnWindowResize: true,
						id: undefined,
						group: undefined,
						offsetX: 0,
						offsetY: 0,
						selection: {
							enabled: false,
							type: 'x',
							// selectedPoints: undefined, // default datapoints that should be selected automatically
							fill: {
								color: '#24292e',
								opacity: 0.1
							},
							stroke: {
								width: 1,
								color: '#24292e',
								opacity: 0.4,
								dashArray: 3
							},
							xaxis: {
								min: undefined,
								max: undefined
							},
							yaxis: {
								min: undefined,
								max: undefined
							}
						},
						sparkline: {
							enabled: false
						},
						brush: {
							enabled: false,
							autoScaleYaxis: true,
							target: undefined,
							targets: undefined
						},
						stacked: false,
						stackType: 'normal',
						toolbar: {
							show: true,
							offsetX: 0,
							offsetY: 0,
							tools: {
								download: true,
								selection: true,
								zoom: true,
								zoomin: true,
								zoomout: true,
								pan: true,
								reset: true,
								customIcons: []
							},
							export: {
								csv: {
									filename: undefined,
									columnDelimiter: ',',
									headerCategory: 'category',
									headerValue: 'value',
									dateFormatter: function dateFormatter(timestamp) {
										return new Date(timestamp).toDateString();
									}
								},
								png: {
									filename: undefined
								},
								svg: {
									filename: undefined
								}
							},
							autoSelected: 'zoom' // accepts -> zoom, pan, selection

						},
						type: 'line',
						width: '100%',
						zoom: {
							enabled: true,
							type: 'x',
							autoScaleYaxis: false,
							zoomedArea: {
								fill: {
									color: '#90CAF9',
									opacity: 0.4
								},
								stroke: {
									color: '#0D47A1',
									opacity: 0.4,
									width: 1
								}
							}
						}
					},
					plotOptions: {
						area: {
							fillTo: 'origin'
						},
						bar: {
							horizontal: false,
							columnWidth: '70%',
							// should be in percent 0 - 100
							barHeight: '70%',
							// should be in percent 0 - 100
							distributed: false,
							borderRadius: 0,
							borderRadiusApplication: 'around',
							// [around, end]
							borderRadiusWhenStacked: 'last',
							// [all, last]
							rangeBarOverlap: true,
							rangeBarGroupRows: false,
							hideZeroBarsWhenGrouped: false,
							isDumbbell: false,
							dumbbellColors: undefined,
							isFunnel: false,
							isFunnel3d: true,
							colors: {
								ranges: [],
								backgroundBarColors: [],
								backgroundBarOpacity: 1,
								backgroundBarRadius: 0
							},
							dataLabels: {
								position: 'top',
								// top, center, bottom
								maxItems: 100,
								hideOverflowingLabels: true,
								orientation: 'horizontal',
								total: {
									enabled: false,
									formatter: undefined,
									offsetX: 0,
									offsetY: 0,
									style: {
										color: '#373d3f',
										fontSize: '12px',
										fontFamily: undefined,
										fontWeight: 600
									}
								}
							}
						},
						bubble: {
							zScaling: true,
							minBubbleRadius: undefined,
							maxBubbleRadius: undefined
						},
						candlestick: {
							colors: {
								upward: '#00B746',
								downward: '#EF403C'
							},
							wick: {
								useFillColor: true
							}
						},
						boxPlot: {
							colors: {
								upper: '#00E396',
								lower: '#008FFB'
							}
						},
						heatmap: {
							radius: 2,
							enableShades: true,
							shadeIntensity: 0.5,
							reverseNegativeShade: false,
							distributed: false,
							useFillColorAsStroke: false,
							colorScale: {
								inverse: false,
								ranges: [],
								min: undefined,
								max: undefined
							}
						},
						treemap: {
							enableShades: true,
							shadeIntensity: 0.5,
							distributed: false,
							reverseNegativeShade: false,
							useFillColorAsStroke: false,
							dataLabels: {
								format: 'scale' // scale | truncate

							},
							colorScale: {
								inverse: false,
								ranges: [],
								min: undefined,
								max: undefined
							}
						},
						radialBar: {
							inverseOrder: false,
							startAngle: 0,
							endAngle: 360,
							offsetX: 0,
							offsetY: 0,
							hollow: {
								margin: 5,
								size: '50%',
								background: 'transparent',
								image: undefined,
								imageWidth: 150,
								imageHeight: 150,
								imageOffsetX: 0,
								imageOffsetY: 0,
								imageClipped: true,
								position: 'front',
								dropShadow: {
									enabled: false,
									top: 0,
									left: 0,
									blur: 3,
									color: '#000',
									opacity: 0.5
								}
							},
							track: {
								show: true,
								startAngle: undefined,
								endAngle: undefined,
								background: '#f2f2f2',
								strokeWidth: '97%',
								opacity: 1,
								margin: 5,
								// margin is in pixels
								dropShadow: {
									enabled: false,
									top: 0,
									left: 0,
									blur: 3,
									color: '#000',
									opacity: 0.5
								}
							},
							dataLabels: {
								show: true,
								name: {
									show: true,
									fontSize: '16px',
									fontFamily: undefined,
									fontWeight: 600,
									color: undefined,
									offsetY: 0,
									formatter: function formatter(val) {
										return val;
									}
								},
								value: {
									show: true,
									fontSize: '14px',
									fontFamily: undefined,
									fontWeight: 400,
									color: undefined,
									offsetY: 16,
									formatter: function formatter(val) {
										return val + '%';
									}
								},
								total: {
									show: false,
									label: 'Total',
									fontSize: '16px',
									fontWeight: 600,
									fontFamily: undefined,
									color: undefined,
									formatter: function formatter(w) {
										return w.globals.seriesTotals.reduce(function (a, b) {
											return a + b;
										}, 0) / w.globals.series.length + '%';
									}
								}
							}
						},
						pie: {
							customScale: 1,
							offsetX: 0,
							offsetY: 0,
							startAngle: 0,
							endAngle: 360,
							expandOnClick: true,
							dataLabels: {
								// These are the percentage values which are displayed on slice
								offset: 0,
								// offset by which labels will move outside
								minAngleToShowLabel: 10
							},
							donut: {
								size: '65%',
								background: 'transparent',
								labels: {
									// These are the inner labels appearing inside donut
									show: false,
									name: {
										show: true,
										fontSize: '16px',
										fontFamily: undefined,
										fontWeight: 600,
										color: undefined,
										offsetY: -10,
										formatter: function formatter(val) {
											return val;
										}
									},
									value: {
										show: true,
										fontSize: '20px',
										fontFamily: undefined,
										fontWeight: 400,
										color: undefined,
										offsetY: 10,
										formatter: function formatter(val) {
											return val;
										}
									},
									total: {
										show: false,
										showAlways: false,
										label: 'Total',
										fontSize: '16px',
										fontWeight: 400,
										fontFamily: undefined,
										color: undefined,
										formatter: function formatter(w) {
											return w.globals.seriesTotals.reduce(function (a, b) {
												return a + b;
											}, 0);
										}
									}
								}
							}
						},
						polarArea: {
							rings: {
								strokeWidth: 1,
								strokeColor: '#e8e8e8'
							},
							spokes: {
								strokeWidth: 1,
								connectorColors: '#e8e8e8'
							}
						},
						radar: {
							size: undefined,
							offsetX: 0,
							offsetY: 0,
							polygons: {
								// strokeColor: '#e8e8e8', // should be deprecated in the minor version i.e 3.2
								strokeWidth: 1,
								strokeColors: '#e8e8e8',
								connectorColors: '#e8e8e8',
								fill: {
									colors: undefined
								}
							}
						}
					},
					colors: undefined,
					dataLabels: {
						enabled: true,
						enabledOnSeries: undefined,
						formatter: function formatter(val) {
							return val !== null ? val : '';
						},
						textAnchor: 'middle',
						distributed: false,
						offsetX: 0,
						offsetY: 0,
						style: {
							fontSize: '12px',
							fontFamily: undefined,
							fontWeight: 600,
							colors: undefined
						},
						background: {
							enabled: true,
							foreColor: '#fff',
							borderRadius: 2,
							padding: 4,
							opacity: 0.9,
							borderWidth: 1,
							borderColor: '#fff',
							dropShadow: {
								enabled: false,
								top: 1,
								left: 1,
								blur: 1,
								color: '#000',
								opacity: 0.45
							}
						},
						dropShadow: {
							enabled: false,
							top: 1,
							left: 1,
							blur: 1,
							color: '#000',
							opacity: 0.45
						}
					},
					fill: {
						type: 'solid',
						colors: undefined,
						// array of colors
						opacity: 0.85,
						gradient: {
							shade: 'dark',
							type: 'horizontal',
							shadeIntensity: 0.5,
							gradientToColors: undefined,
							inverseColors: true,
							opacityFrom: 1,
							opacityTo: 1,
							stops: [0, 50, 100],
							colorStops: []
						},
						image: {
							src: [],
							width: undefined,
							// optional
							height: undefined // optional

						},
						pattern: {
							style: 'squares',
							// String | Array of Strings
							width: 6,
							height: 6,
							strokeWidth: 2
						}
					},
					forecastDataPoints: {
						count: 0,
						fillOpacity: 0.5,
						strokeWidth: undefined,
						dashArray: 4
					},
					grid: {
						show: true,
						borderColor: '#e0e0e0',
						strokeDashArray: 0,
						position: 'back',
						xaxis: {
							lines: {
								show: false
							}
						},
						yaxis: {
							lines: {
								show: true
							}
						},
						row: {
							colors: undefined,
							// takes as array which will be repeated on rows
							opacity: 0.5
						},
						column: {
							colors: undefined,
							// takes an array which will be repeated on columns
							opacity: 0.5
						},
						padding: {
							top: 0,
							right: 10,
							bottom: 0,
							left: 12
						}
					},
					labels: [],
					legend: {
						show: true,
						showForSingleSeries: false,
						showForNullSeries: true,
						showForZeroSeries: true,
						floating: false,
						position: 'bottom',
						// whether to position legends in 1 of 4
						// direction - top, bottom, left, right
						horizontalAlign: 'center',
						// when position top/bottom, you can specify whether to align legends left, right or center
						inverseOrder: false,
						fontSize: '12px',
						fontFamily: undefined,
						fontWeight: 400,
						width: undefined,
						height: undefined,
						formatter: undefined,
						tooltipHoverFormatter: undefined,
						offsetX: -20,
						offsetY: 4,
						customLegendItems: [],
						labels: {
							colors: undefined,
							useSeriesColors: false
						},
						markers: {
							width: 12,
							height: 12,
							strokeWidth: 0,
							fillColors: undefined,
							strokeColor: '#fff',
							radius: 12,
							customHTML: undefined,
							offsetX: 0,
							offsetY: 0,
							onClick: undefined
						},
						itemMargin: {
							horizontal: 5,
							vertical: 2
						},
						onItemClick: {
							toggleDataSeries: true
						},
						onItemHover: {
							highlightDataSeries: true
						}
					},
					markers: {
						discrete: [],
						size: 0,
						colors: undefined,
						//strokeColor: '#fff', // TODO: deprecate in major version 4.0
						strokeColors: '#fff',
						strokeWidth: 2,
						strokeOpacity: 0.9,
						strokeDashArray: 0,
						fillOpacity: 1,
						shape: 'circle',
						width: 8,
						// only applicable when shape is rect/square
						height: 8,
						// only applicable when shape is rect/square
						radius: 2,
						offsetX: 0,
						offsetY: 0,
						onClick: undefined,
						onDblClick: undefined,
						showNullDataPoints: true,
						hover: {
							size: undefined,
							sizeOffset: 3
						}
					},
					noData: {
						text: undefined,
						align: 'center',
						verticalAlign: 'middle',
						offsetX: 0,
						offsetY: 0,
						style: {
							color: undefined,
							fontSize: '14px',
							fontFamily: undefined
						}
					},
					responsive: [],
					// breakpoints should follow ascending order 400, then 700, then 1000
					series: undefined,
					states: {
						normal: {
							filter: {
								type: 'none',
								value: 0
							}
						},
						hover: {
							filter: {
								type: 'lighten',
								value: 0.1
							}
						},
						active: {
							allowMultipleDataPointsSelection: false,
							filter: {
								type: 'darken',
								value: 0.5
							}
						}
					},
					title: {
						text: undefined,
						align: 'left',
						margin: 5,
						offsetX: 0,
						offsetY: 0,
						floating: false,
						style: {
							fontSize: '14px',
							fontWeight: 900,
							fontFamily: undefined,
							color: undefined
						}
					},
					subtitle: {
						text: undefined,
						align: 'left',
						margin: 5,
						offsetX: 0,
						offsetY: 30,
						floating: false,
						style: {
							fontSize: '12px',
							fontWeight: 400,
							fontFamily: undefined,
							color: undefined
						}
					},
					stroke: {
						show: true,
						curve: 'smooth',
						// "smooth" / "straight" / "monotoneCubic" / "stepline"
						lineCap: 'butt',
						// round, butt , square
						width: 2,
						colors: undefined,
						// array of colors
						dashArray: 0,
						// single value or array of values
						fill: {
							type: 'solid',
							colors: undefined,
							// array of colors
							opacity: 0.85,
							gradient: {
								shade: 'dark',
								type: 'horizontal',
								shadeIntensity: 0.5,
								gradientToColors: undefined,
								inverseColors: true,
								opacityFrom: 1,
								opacityTo: 1,
								stops: [0, 50, 100],
								colorStops: []
							}
						}
					},
					tooltip: {
						enabled: true,
						enabledOnSeries: undefined,
						shared: true,
						followCursor: false,
						// when disabled, the tooltip will show on top of the series instead of mouse position
						intersect: false,
						// when enabled, tooltip will only show when user directly hovers over point
						inverseOrder: false,
						custom: undefined,
						fillSeriesColor: false,
						theme: 'light',
						cssClass: '',
						style: {
							fontSize: '12px',
							fontFamily: undefined
						},
						onDatasetHover: {
							highlightDataSeries: false
						},
						x: {
							// x value
							show: true,
							format: 'dd MMM',
							// dd/MM, dd MMM yy, dd MMM yyyy
							formatter: undefined // a custom user supplied formatter function

						},
						y: {
							formatter: undefined,
							title: {
								formatter: function formatter(seriesName) {
									return seriesName ? seriesName + ': ' : '';
								}
							}
						},
						z: {
							formatter: undefined,
							title: 'Size: '
						},
						marker: {
							show: true,
							fillColors: undefined
						},
						items: {
							display: 'flex'
						},
						fixed: {
							enabled: false,
							position: 'topRight',
							// topRight, topLeft, bottomRight, bottomLeft
							offsetX: 0,
							offsetY: 0
						}
					},
					xaxis: {
						type: 'category',
						categories: [],
						convertedCatToNumeric: false,
						// internal property which should not be altered outside
						offsetX: 0,
						offsetY: 0,
						overwriteCategories: undefined,
						labels: {
							show: true,
							rotate: -45,
							rotateAlways: false,
							hideOverlappingLabels: true,
							trim: false,
							minHeight: undefined,
							maxHeight: 120,
							showDuplicates: true,
							style: {
								colors: [],
								fontSize: '12px',
								fontWeight: 400,
								fontFamily: undefined,
								cssClass: ''
							},
							offsetX: 0,
							offsetY: 0,
							format: undefined,
							formatter: undefined,
							// custom formatter function which will override format
							datetimeUTC: true,
							datetimeFormatter: {
								year: 'yyyy',
								month: "MMM 'yy",
								day: 'dd MMM',
								hour: 'HH:mm',
								minute: 'HH:mm:ss',
								second: 'HH:mm:ss'
							}
						},
						group: {
							groups: [],
							style: {
								colors: [],
								fontSize: '12px',
								fontWeight: 400,
								fontFamily: undefined,
								cssClass: ''
							}
						},
						axisBorder: {
							show: true,
							color: '#e0e0e0',
							width: '100%',
							height: 1,
							offsetX: 0,
							offsetY: 0
						},
						axisTicks: {
							show: true,
							color: '#e0e0e0',
							height: 6,
							offsetX: 0,
							offsetY: 0
						},
						tickAmount: undefined,
						tickPlacement: 'on',
						min: undefined,
						max: undefined,
						range: undefined,
						floating: false,
						decimalsInFloat: undefined,
						position: 'bottom',
						title: {
							text: undefined,
							offsetX: 0,
							offsetY: 0,
							style: {
								color: undefined,
								fontSize: '12px',
								fontWeight: 900,
								fontFamily: undefined,
								cssClass: ''
							}
						},
						crosshairs: {
							show: true,
							width: 1,
							// tickWidth/barWidth or an integer
							position: 'back',
							opacity: 0.9,
							stroke: {
								color: '#b6b6b6',
								width: 1,
								dashArray: 3
							},
							fill: {
								type: 'solid',
								// solid, gradient
								color: '#B1B9C4',
								gradient: {
									colorFrom: '#D8E3F0',
									colorTo: '#BED1E6',
									stops: [0, 100],
									opacityFrom: 0.4,
									opacityTo: 0.5
								}
							},
							dropShadow: {
								enabled: false,
								left: 0,
								top: 0,
								blur: 1,
								opacity: 0.4
							}
						},
						tooltip: {
							enabled: true,
							offsetY: 0,
							formatter: undefined,
							style: {
								fontSize: '12px',
								fontFamily: undefined
							}
						}
					},
					yaxis: this.yAxis,
					theme: {
						mode: 'light',
						palette: 'palette1',
						// If defined, it will overwrite globals.colors variable
						monochrome: {
							// monochrome allows you to select just 1 color and fill out the rest with light/dark shade (intensity can be selected)
							enabled: false,
							color: '#008FFB',
							shadeTo: 'light',
							shadeIntensity: 0.65
						}
					}
				};
			}
		}]);

		return Options;
	}();

	/**
	 * ApexCharts Annotations Class for drawing lines/rects on both xaxis and yaxis.
	 *
	 * @module Annotations
	 **/

	var Annotations = /*#__PURE__*/function () {
		function Annotations(ctx) {
			_classCallCheck(this, Annotations);

			this.ctx = ctx;
			this.w = ctx.w;
			this.graphics = new Graphics(this.ctx);

			if (this.w.globals.isBarHorizontal) {
				this.invertAxis = true;
			}

			this.helpers = new Helpers$4(this);
			this.xAxisAnnotations = new XAnnotations(this);
			this.yAxisAnnotations = new YAnnotations(this);
			this.pointsAnnotations = new PointAnnotations(this);

			if (this.w.globals.isBarHorizontal && this.w.config.yaxis[0].reversed) {
				this.inversedReversedAxis = true;
			}

			this.xDivision = this.w.globals.gridWidth / this.w.globals.dataPoints;
		}

		_createClass(Annotations, [{
			key: "drawAxesAnnotations",
			value: function drawAxesAnnotations() {
				var w = this.w;

				if (w.globals.axisCharts) {
					var yAnnotations = this.yAxisAnnotations.drawYAxisAnnotations();
					var xAnnotations = this.xAxisAnnotations.drawXAxisAnnotations();
					var pointAnnotations = this.pointsAnnotations.drawPointAnnotations();
					var initialAnim = w.config.chart.animations.enabled;
					var annoArray = [yAnnotations, xAnnotations, pointAnnotations];
					var annoElArray = [xAnnotations.node, yAnnotations.node, pointAnnotations.node];

					for (var i = 0; i < 3; i++) {
						w.globals.dom.elGraphical.add(annoArray[i]);

						if (initialAnim && !w.globals.resized && !w.globals.dataChanged) {
							// fixes apexcharts/apexcharts.js#685
							if (w.config.chart.type !== 'scatter' && w.config.chart.type !== 'bubble' && w.globals.dataPoints > 1) {
								annoElArray[i].classList.add('apexcharts-element-hidden');
							}
						}

						w.globals.delayedElements.push({
							el: annoElArray[i],
							index: 0
						});
					} // background sizes needs to be calculated after text is drawn, so calling them last


					this.helpers.annotationsBackground();
				}
			}
		}, {
			key: "drawImageAnnos",
			value: function drawImageAnnos() {
				var _this = this;

				var w = this.w;
				w.config.annotations.images.map(function (s, index) {
					_this.addImage(s, index);
				});
			}
		}, {
			key: "drawTextAnnos",
			value: function drawTextAnnos() {
				var _this2 = this;

				var w = this.w;
				w.config.annotations.texts.map(function (t, index) {
					_this2.addText(t, index);
				});
			}
		}, {
			key: "addXaxisAnnotation",
			value: function addXaxisAnnotation(anno, parent, index) {
				this.xAxisAnnotations.addXaxisAnnotation(anno, parent, index);
			}
		}, {
			key: "addYaxisAnnotation",
			value: function addYaxisAnnotation(anno, parent, index) {
				this.yAxisAnnotations.addYaxisAnnotation(anno, parent, index);
			}
		}, {
			key: "addPointAnnotation",
			value: function addPointAnnotation(anno, parent, index) {
				this.pointsAnnotations.addPointAnnotation(anno, parent, index);
			}
		}, {
			key: "addText",
			value: function addText(params, index) {
				var x = params.x,
					y = params.y,
					text = params.text,
					textAnchor = params.textAnchor,
					foreColor = params.foreColor,
					fontSize = params.fontSize,
					fontFamily = params.fontFamily,
					fontWeight = params.fontWeight,
					cssClass = params.cssClass,
					backgroundColor = params.backgroundColor,
					borderWidth = params.borderWidth,
					strokeDashArray = params.strokeDashArray,
					borderRadius = params.borderRadius,
					borderColor = params.borderColor,
					_params$appendTo = params.appendTo,
					appendTo = _params$appendTo === void 0 ? '.apexcharts-annotations' : _params$appendTo,
					_params$paddingLeft = params.paddingLeft,
					paddingLeft = _params$paddingLeft === void 0 ? 4 : _params$paddingLeft,
					_params$paddingRight = params.paddingRight,
					paddingRight = _params$paddingRight === void 0 ? 4 : _params$paddingRight,
					_params$paddingBottom = params.paddingBottom,
					paddingBottom = _params$paddingBottom === void 0 ? 2 : _params$paddingBottom,
					_params$paddingTop = params.paddingTop,
					paddingTop = _params$paddingTop === void 0 ? 2 : _params$paddingTop;
				var w = this.w;
				var elText = this.graphics.drawText({
					x: x,
					y: y,
					text: text,
					textAnchor: textAnchor || 'start',
					fontSize: fontSize || '12px',
					fontWeight: fontWeight || 'regular',
					fontFamily: fontFamily || w.config.chart.fontFamily,
					foreColor: foreColor || w.config.chart.foreColor,
					cssClass: 'apexcharts-text ' + cssClass ? cssClass : ''
				});
				var parent = w.globals.dom.baseEl.querySelector(appendTo);

				if (parent) {
					parent.appendChild(elText.node);
				}

				var textRect = elText.bbox();

				if (text) {
					var elRect = this.graphics.drawRect(textRect.x - paddingLeft, textRect.y - paddingTop, textRect.width + paddingLeft + paddingRight, textRect.height + paddingBottom + paddingTop, borderRadius, backgroundColor ? backgroundColor : 'transparent', 1, borderWidth, borderColor, strokeDashArray);
					parent.insertBefore(elRect.node, elText.node);
				}
			}
		}, {
			key: "addImage",
			value: function addImage(params, index) {
				var w = this.w;
				var path = params.path,
					_params$x = params.x,
					x = _params$x === void 0 ? 0 : _params$x,
					_params$y = params.y,
					y = _params$y === void 0 ? 0 : _params$y,
					_params$width = params.width,
					width = _params$width === void 0 ? 20 : _params$width,
					_params$height = params.height,
					height = _params$height === void 0 ? 20 : _params$height,
					_params$appendTo2 = params.appendTo,
					appendTo = _params$appendTo2 === void 0 ? '.apexcharts-annotations' : _params$appendTo2;
				var img = w.globals.dom.Paper.image(path);
				img.size(width, height).move(x, y);
				var parent = w.globals.dom.baseEl.querySelector(appendTo);

				if (parent) {
					parent.appendChild(img.node);
				}

				return img;
			} // The addXaxisAnnotation method requires a parent class, and user calling this method externally on the chart instance may not specify parent, hence a different method

		}, {
			key: "addXaxisAnnotationExternal",
			value: function addXaxisAnnotationExternal(params, pushToMemory, context) {
				this.addAnnotationExternal({
					params: params,
					pushToMemory: pushToMemory,
					context: context,
					type: 'xaxis',
					contextMethod: context.addXaxisAnnotation
				});
				return context;
			}
		}, {
			key: "addYaxisAnnotationExternal",
			value: function addYaxisAnnotationExternal(params, pushToMemory, context) {
				this.addAnnotationExternal({
					params: params,
					pushToMemory: pushToMemory,
					context: context,
					type: 'yaxis',
					contextMethod: context.addYaxisAnnotation
				});
				return context;
			}
		}, {
			key: "addPointAnnotationExternal",
			value: function addPointAnnotationExternal(params, pushToMemory, context) {
				if (typeof this.invertAxis === 'undefined') {
					this.invertAxis = context.w.globals.isBarHorizontal;
				}

				this.addAnnotationExternal({
					params: params,
					pushToMemory: pushToMemory,
					context: context,
					type: 'point',
					contextMethod: context.addPointAnnotation
				});
				return context;
			}
		}, {
			key: "addAnnotationExternal",
			value: function addAnnotationExternal(_ref) {
				var params = _ref.params,
					pushToMemory = _ref.pushToMemory,
					context = _ref.context,
					type = _ref.type,
					contextMethod = _ref.contextMethod;
				var me = context;
				var w = me.w;
				var parent = w.globals.dom.baseEl.querySelector(".apexcharts-".concat(type, "-annotations"));
				var index = parent.childNodes.length + 1;
				var options = new Options();
				var axesAnno = Object.assign({}, type === 'xaxis' ? options.xAxisAnnotation : type === 'yaxis' ? options.yAxisAnnotation : options.pointAnnotation);
				var anno = Utils$1.extend(axesAnno, params);

				switch (type) {
					case 'xaxis':
						this.addXaxisAnnotation(anno, parent, index);
						break;

					case 'yaxis':
						this.addYaxisAnnotation(anno, parent, index);
						break;

					case 'point':
						this.addPointAnnotation(anno, parent, index);
						break;
				} // add background


				var axesAnnoLabel = w.globals.dom.baseEl.querySelector(".apexcharts-".concat(type, "-annotations .apexcharts-").concat(type, "-annotation-label[rel='").concat(index, "']"));
				var elRect = this.helpers.addBackgroundToAnno(axesAnnoLabel, anno);

				if (elRect) {
					parent.insertBefore(elRect.node, axesAnnoLabel);
				}

				if (pushToMemory) {
					w.globals.memory.methodsToExec.push({
						context: me,
						id: anno.id ? anno.id : Utils$1.randomId(),
						method: contextMethod,
						label: 'addAnnotation',
						params: params
					});
				}

				return context;
			}
		}, {
			key: "clearAnnotations",
			value: function clearAnnotations(ctx) {
				var w = ctx.w;
				var annos = w.globals.dom.baseEl.querySelectorAll('.apexcharts-yaxis-annotations, .apexcharts-xaxis-annotations, .apexcharts-point-annotations'); // annotations added externally should be cleared out too

				w.globals.memory.methodsToExec.map(function (m, i) {
					if (m.label === 'addText' || m.label === 'addAnnotation') {
						w.globals.memory.methodsToExec.splice(i, 1);
					}
				});
				annos = Utils$1.listToArray(annos); // delete the DOM elements

				Array.prototype.forEach.call(annos, function (a) {
					while (a.firstChild) {
						a.removeChild(a.firstChild);
					}
				});
			}
		}, {
			key: "removeAnnotation",
			value: function removeAnnotation(ctx, id) {
				var w = ctx.w;
				var annos = w.globals.dom.baseEl.querySelectorAll(".".concat(id));

				if (annos) {
					w.globals.memory.methodsToExec.map(function (m, i) {
						if (m.id === id) {
							w.globals.memory.methodsToExec.splice(i, 1);
						}
					});
					Array.prototype.forEach.call(annos, function (a) {
						a.parentElement.removeChild(a);
					});
				}
			}
		}]);

		return Annotations;
	}();

	/**
	 * DateTime Class to manipulate datetime values.
	 *
	 * @module DateTime
	 **/

	var DateTime = /*#__PURE__*/function () {
		function DateTime(ctx) {
			_classCallCheck(this, DateTime);

			this.ctx = ctx;
			this.w = ctx.w;
			this.months31 = [1, 3, 5, 7, 8, 10, 12];
			this.months30 = [2, 4, 6, 9, 11];
			this.daysCntOfYear = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334];
		}

		_createClass(DateTime, [{
			key: "isValidDate",
			value: function isValidDate(date) {
				return !isNaN(this.parseDate(date));
			}
		}, {
			key: "getTimeStamp",
			value: function getTimeStamp(dateStr) {
				if (!Date.parse(dateStr)) {
					return dateStr;
				}

				var utc = this.w.config.xaxis.labels.datetimeUTC;
				return !utc ? new Date(dateStr).getTime() : new Date(new Date(dateStr).toISOString().substr(0, 25)).getTime();
			}
		}, {
			key: "getDate",
			value: function getDate(timestamp) {
				var utc = this.w.config.xaxis.labels.datetimeUTC;
				return utc ? new Date(new Date(timestamp).toUTCString()) : new Date(timestamp);
			}
		}, {
			key: "parseDate",
			value: function parseDate(dateStr) {
				var parsed = Date.parse(dateStr);

				if (!isNaN(parsed)) {
					return this.getTimeStamp(dateStr);
				}

				var output = Date.parse(dateStr.replace(/-/g, '/').replace(/[a-z]+/gi, ' '));
				output = this.getTimeStamp(output);
				return output;
			} // This fixes the difference of x-axis labels between chrome/safari
			// Fixes #1726, #1544, #1485, #1255

		}, {
			key: "parseDateWithTimezone",
			value: function parseDateWithTimezone(dateStr) {
				return Date.parse(dateStr.replace(/-/g, '/').replace(/[a-z]+/gi, ' '));
			} // http://stackoverflow.com/questions/14638018/current-time-formatting-with-javascript#answer-14638191

		}, {
			key: "formatDate",
			value: function formatDate(date, format) {
				var locale = this.w.globals.locale;
				var utc = this.w.config.xaxis.labels.datetimeUTC;
				var MMMM = ['\x00'].concat(_toConsumableArray(locale.months));
				var MMM = ['\x01'].concat(_toConsumableArray(locale.shortMonths));
				var dddd = ['\x02'].concat(_toConsumableArray(locale.days));
				var ddd = ['\x03'].concat(_toConsumableArray(locale.shortDays));

				function ii(i, len) {
					var s = i + '';
					len = len || 2;

					while (s.length < len) {
						s = '0' + s;
					}

					return s;
				}

				var y = utc ? date.getUTCFullYear() : date.getFullYear();
				format = format.replace(/(^|[^\\])yyyy+/g, '$1' + y);
				format = format.replace(/(^|[^\\])yy/g, '$1' + y.toString().substr(2, 2));
				format = format.replace(/(^|[^\\])y/g, '$1' + y);
				var M = (utc ? date.getUTCMonth() : date.getMonth()) + 1;
				format = format.replace(/(^|[^\\])MMMM+/g, '$1' + MMMM[0]);
				format = format.replace(/(^|[^\\])MMM/g, '$1' + MMM[0]);
				format = format.replace(/(^|[^\\])MM/g, '$1' + ii(M));
				format = format.replace(/(^|[^\\])M/g, '$1' + M);
				var d = utc ? date.getUTCDate() : date.getDate();
				format = format.replace(/(^|[^\\])dddd+/g, '$1' + dddd[0]);
				format = format.replace(/(^|[^\\])ddd/g, '$1' + ddd[0]);
				format = format.replace(/(^|[^\\])dd/g, '$1' + ii(d));
				format = format.replace(/(^|[^\\])d/g, '$1' + d);
				var H = utc ? date.getUTCHours() : date.getHours();
				format = format.replace(/(^|[^\\])HH+/g, '$1' + ii(H));
				format = format.replace(/(^|[^\\])H/g, '$1' + H);
				var h = H > 12 ? H - 12 : H === 0 ? 12 : H;
				format = format.replace(/(^|[^\\])hh+/g, '$1' + ii(h));
				format = format.replace(/(^|[^\\])h/g, '$1' + h);
				var m = utc ? date.getUTCMinutes() : date.getMinutes();
				format = format.replace(/(^|[^\\])mm+/g, '$1' + ii(m));
				format = format.replace(/(^|[^\\])m/g, '$1' + m);
				var s = utc ? date.getUTCSeconds() : date.getSeconds();
				format = format.replace(/(^|[^\\])ss+/g, '$1' + ii(s));
				format = format.replace(/(^|[^\\])s/g, '$1' + s);
				var f = utc ? date.getUTCMilliseconds() : date.getMilliseconds();
				format = format.replace(/(^|[^\\])fff+/g, '$1' + ii(f, 3));
				f = Math.round(f / 10);
				format = format.replace(/(^|[^\\])ff/g, '$1' + ii(f));
				f = Math.round(f / 10);
				format = format.replace(/(^|[^\\])f/g, '$1' + f);
				var T = H < 12 ? 'AM' : 'PM';
				format = format.replace(/(^|[^\\])TT+/g, '$1' + T);
				format = format.replace(/(^|[^\\])T/g, '$1' + T.charAt(0));
				var t = T.toLowerCase();
				format = format.replace(/(^|[^\\])tt+/g, '$1' + t);
				format = format.replace(/(^|[^\\])t/g, '$1' + t.charAt(0));
				var tz = -date.getTimezoneOffset();
				var K = utc || !tz ? 'Z' : tz > 0 ? '+' : '-';

				if (!utc) {
					tz = Math.abs(tz);
					var tzHrs = Math.floor(tz / 60);
					var tzMin = tz % 60;
					K += ii(tzHrs) + ':' + ii(tzMin);
				}

				format = format.replace(/(^|[^\\])K/g, '$1' + K);
				var day = (utc ? date.getUTCDay() : date.getDay()) + 1;
				format = format.replace(new RegExp(dddd[0], 'g'), dddd[day]);
				format = format.replace(new RegExp(ddd[0], 'g'), ddd[day]);
				format = format.replace(new RegExp(MMMM[0], 'g'), MMMM[M]);
				format = format.replace(new RegExp(MMM[0], 'g'), MMM[M]);
				format = format.replace(/\\(.)/g, '$1');
				return format;
			}
		}, {
			key: "getTimeUnitsfromTimestamp",
			value: function getTimeUnitsfromTimestamp(minX, maxX, utc) {
				var w = this.w;

				if (w.config.xaxis.min !== undefined) {
					minX = w.config.xaxis.min;
				}

				if (w.config.xaxis.max !== undefined) {
					maxX = w.config.xaxis.max;
				}

				var tsMin = this.getDate(minX);
				var tsMax = this.getDate(maxX);
				var minD = this.formatDate(tsMin, 'yyyy MM dd HH mm ss fff').split(' ');
				var maxD = this.formatDate(tsMax, 'yyyy MM dd HH mm ss fff').split(' ');
				return {
					minMillisecond: parseInt(minD[6], 10),
					maxMillisecond: parseInt(maxD[6], 10),
					minSecond: parseInt(minD[5], 10),
					maxSecond: parseInt(maxD[5], 10),
					minMinute: parseInt(minD[4], 10),
					maxMinute: parseInt(maxD[4], 10),
					minHour: parseInt(minD[3], 10),
					maxHour: parseInt(maxD[3], 10),
					minDate: parseInt(minD[2], 10),
					maxDate: parseInt(maxD[2], 10),
					minMonth: parseInt(minD[1], 10) - 1,
					maxMonth: parseInt(maxD[1], 10) - 1,
					minYear: parseInt(minD[0], 10),
					maxYear: parseInt(maxD[0], 10)
				};
			}
		}, {
			key: "isLeapYear",
			value: function isLeapYear(year) {
				return year % 4 === 0 && year % 100 !== 0 || year % 400 === 0;
			}
		}, {
			key: "calculcateLastDaysOfMonth",
			value: function calculcateLastDaysOfMonth(month, year, subtract) {
				var days = this.determineDaysOfMonths(month, year); // whatever days we get, subtract the number of days asked

				return days - subtract;
			}
		}, {
			key: "determineDaysOfYear",
			value: function determineDaysOfYear(year) {
				var days = 365;

				if (this.isLeapYear(year)) {
					days = 366;
				}

				return days;
			}
		}, {
			key: "determineRemainingDaysOfYear",
			value: function determineRemainingDaysOfYear(year, month, date) {
				var dayOfYear = this.daysCntOfYear[month] + date;
				if (month > 1 && this.isLeapYear()) dayOfYear++;
				return dayOfYear;
			}
		}, {
			key: "determineDaysOfMonths",
			value: function determineDaysOfMonths(month, year) {
				var days = 30;
				month = Utils$1.monthMod(month);

				switch (true) {
					case this.months30.indexOf(month) > -1:
						if (month === 2) {
							if (this.isLeapYear(year)) {
								days = 29;
							} else {
								days = 28;
							}
						}

						break;

					case this.months31.indexOf(month) > -1:
						days = 31;
						break;

					default:
						days = 31;
						break;
				}

				return days;
			}
		}]);

		return DateTime;
	}();

	/**
	 * ApexCharts Formatter Class for setting value formatters for axes as well as tooltips.
	 *
	 * @module Formatters
	 **/

	var Formatters = /*#__PURE__*/function () {
		function Formatters(ctx) {
			_classCallCheck(this, Formatters);

			this.ctx = ctx;
			this.w = ctx.w;
			this.tooltipKeyFormat = 'dd MMM';
		}

		_createClass(Formatters, [{
			key: "xLabelFormat",
			value: function xLabelFormat(fn, val, timestamp, opts) {
				var w = this.w;

				if (w.config.xaxis.type === 'datetime') {
					if (w.config.xaxis.labels.formatter === undefined) {
						// if user has not specified a custom formatter, use the default tooltip.x.format
						if (w.config.tooltip.x.formatter === undefined) {
							var datetimeObj = new DateTime(this.ctx);
							return datetimeObj.formatDate(datetimeObj.getDate(val), w.config.tooltip.x.format);
						}
					}
				}

				return fn(val, timestamp, opts);
			}
		}, {
			key: "defaultGeneralFormatter",
			value: function defaultGeneralFormatter(val) {
				if (Array.isArray(val)) {
					return val.map(function (v) {
						return v;
					});
				} else {
					return val;
				}
			}
		}, {
			key: "defaultYFormatter",
			value: function defaultYFormatter(v, yaxe, i) {
				var w = this.w;

				if (Utils$1.isNumber(v)) {
					if (w.globals.yValueDecimal !== 0) {
						v = v.toFixed(yaxe.decimalsInFloat !== undefined ? yaxe.decimalsInFloat : w.globals.yValueDecimal);
					} else if (w.globals.maxYArr[i] - w.globals.minYArr[i] < 5) {
						v = v.toFixed(1);
					} else {
						v = v.toFixed(0);
					}
				}

				return v;
			}
		}, {
			key: "setLabelFormatters",
			value: function setLabelFormatters() {
				var _this = this;

				var w = this.w;

				w.globals.xaxisTooltipFormatter = function (val) {
					return _this.defaultGeneralFormatter(val);
				};

				w.globals.ttKeyFormatter = function (val) {
					return _this.defaultGeneralFormatter(val);
				};

				w.globals.ttZFormatter = function (val) {
					return val;
				};

				w.globals.legendFormatter = function (val) {
					return _this.defaultGeneralFormatter(val);
				}; // formatter function will always overwrite format property


				if (w.config.xaxis.labels.formatter !== undefined) {
					w.globals.xLabelFormatter = w.config.xaxis.labels.formatter;
				} else {
					w.globals.xLabelFormatter = function (val) {
						if (Utils$1.isNumber(val)) {
							if (!w.config.xaxis.convertedCatToNumeric && w.config.xaxis.type === 'numeric') {
								if (Utils$1.isNumber(w.config.xaxis.decimalsInFloat)) {
									return val.toFixed(w.config.xaxis.decimalsInFloat);
								} else {
									var diff = w.globals.maxX - w.globals.minX;

									if (diff > 0 && diff < 100) {
										return val.toFixed(1);
									}

									return val.toFixed(0);
								}
							}

							if (w.globals.isBarHorizontal) {
								var range = w.globals.maxY - w.globals.minYArr;

								if (range < 4) {
									return val.toFixed(1);
								}
							}

							return val.toFixed(0);
						}

						return val;
					};
				}

				if (typeof w.config.tooltip.x.formatter === 'function') {
					w.globals.ttKeyFormatter = w.config.tooltip.x.formatter;
				} else {
					w.globals.ttKeyFormatter = w.globals.xLabelFormatter;
				}

				if (typeof w.config.xaxis.tooltip.formatter === 'function') {
					w.globals.xaxisTooltipFormatter = w.config.xaxis.tooltip.formatter;
				}

				if (Array.isArray(w.config.tooltip.y)) {
					w.globals.ttVal = w.config.tooltip.y;
				} else {
					if (w.config.tooltip.y.formatter !== undefined) {
						w.globals.ttVal = w.config.tooltip.y;
					}
				}

				if (w.config.tooltip.z.formatter !== undefined) {
					w.globals.ttZFormatter = w.config.tooltip.z.formatter;
				} // legend formatter - if user wants to append any global values of series to legend text


				if (w.config.legend.formatter !== undefined) {
					w.globals.legendFormatter = w.config.legend.formatter;
				} // formatter function will always overwrite format property


				w.config.yaxis.forEach(function (yaxe, i) {
					if (yaxe.labels.formatter !== undefined) {
						w.globals.yLabelFormatters[i] = yaxe.labels.formatter;
					} else {
						w.globals.yLabelFormatters[i] = function (val) {
							if (!w.globals.xyCharts) return val;

							if (Array.isArray(val)) {
								return val.map(function (v) {
									return _this.defaultYFormatter(v, yaxe, i);
								});
							} else {
								return _this.defaultYFormatter(val, yaxe, i);
							}
						};
					}
				});
				return w.globals;
			}
		}, {
			key: "heatmapLabelFormatters",
			value: function heatmapLabelFormatters() {
				var w = this.w;

				if (w.config.chart.type === 'heatmap') {
					w.globals.yAxisScale[0].result = w.globals.seriesNames.slice(); //  get the longest string from the labels array and also apply label formatter to it

					var longest = w.globals.seriesNames.reduce(function (a, b) {
						return a.length > b.length ? a : b;
					}, 0);
					w.globals.yAxisScale[0].niceMax = longest;
					w.globals.yAxisScale[0].niceMin = longest;
				}
			}
		}]);

		return Formatters;
	}();

	/**
	 * ApexCharts Default Class for setting default options for all chart types.
	 *
	 * @module Defaults
	 **/

	var getRangeValues = function getRangeValues(_ref) {
		var _w$config$series$seri;

		var isTimeline = _ref.isTimeline,
			ctx = _ref.ctx,
			seriesIndex = _ref.seriesIndex,
			dataPointIndex = _ref.dataPointIndex,
			y1 = _ref.y1,
			y2 = _ref.y2,
			w = _ref.w;
		var start = w.globals.seriesRangeStart[seriesIndex][dataPointIndex];
		var end = w.globals.seriesRangeEnd[seriesIndex][dataPointIndex];
		var ylabel = w.globals.labels[dataPointIndex];
		var seriesName = w.config.series[seriesIndex].name ? w.config.series[seriesIndex].name : '';
		var yLbFormatter = w.globals.ttKeyFormatter;
		var yLbTitleFormatter = w.config.tooltip.y.title.formatter;
		var opts = {
			w: w,
			seriesIndex: seriesIndex,
			dataPointIndex: dataPointIndex,
			start: start,
			end: end
		};

		if (typeof yLbTitleFormatter === 'function') {
			seriesName = yLbTitleFormatter(seriesName, opts);
		}

		if ((_w$config$series$seri = w.config.series[seriesIndex].data[dataPointIndex]) !== null && _w$config$series$seri !== void 0 && _w$config$series$seri.x) {
			ylabel = w.config.series[seriesIndex].data[dataPointIndex].x;
		}

		if (!isTimeline) {
			if (w.config.xaxis.type === 'datetime') {
				var xFormat = new Formatters(ctx);
				ylabel = xFormat.xLabelFormat(w.globals.ttKeyFormatter, ylabel, ylabel, {
					i: undefined,
					dateFormatter: new DateTime(ctx).formatDate,
					w: w
				});
			}
		}

		if (typeof yLbFormatter === 'function') {
			ylabel = yLbFormatter(ylabel, opts);
		}

		if (Number.isFinite(y1) && Number.isFinite(y2)) {
			start = y1;
			end = y2;
		}

		var startVal = '';
		var endVal = '';
		var color = w.globals.colors[seriesIndex];

		if (w.config.tooltip.x.formatter === undefined) {
			if (w.config.xaxis.type === 'datetime') {
				var datetimeObj = new DateTime(ctx);
				startVal = datetimeObj.formatDate(datetimeObj.getDate(start), w.config.tooltip.x.format);
				endVal = datetimeObj.formatDate(datetimeObj.getDate(end), w.config.tooltip.x.format);
			} else {
				startVal = start;
				endVal = end;
			}
		} else {
			startVal = w.config.tooltip.x.formatter(start);
			endVal = w.config.tooltip.x.formatter(end);
		}

		return {
			start: start,
			end: end,
			startVal: startVal,
			endVal: endVal,
			ylabel: ylabel,
			color: color,
			seriesName: seriesName
		};
	};

	var buildRangeTooltipHTML = function buildRangeTooltipHTML(opts) {
		var color = opts.color,
			seriesName = opts.seriesName,
			ylabel = opts.ylabel,
			start = opts.start,
			end = opts.end,
			seriesIndex = opts.seriesIndex,
			dataPointIndex = opts.dataPointIndex;
		var formatter = opts.ctx.tooltip.tooltipLabels.getFormatters(seriesIndex);
		start = formatter.yLbFormatter(start);
		end = formatter.yLbFormatter(end);
		var val = formatter.yLbFormatter(opts.w.globals.series[seriesIndex][dataPointIndex]);
		var valueHTML = '';
		var rangeValues = "<span class=\"value start-value\">\n  ".concat(start, "\n  </span> <span class=\"separator\">-</span> <span class=\"value end-value\">\n  ").concat(end, "\n  </span>");

		if (opts.w.globals.comboCharts) {
			if (opts.w.config.series[seriesIndex].type === 'rangeArea' || opts.w.config.series[seriesIndex].type === 'rangeBar') {
				valueHTML = rangeValues;
			} else {
				valueHTML = "<span>".concat(val, "</span>");
			}
		} else {
			valueHTML = rangeValues;
		}

		return '<div class="apexcharts-tooltip-rangebar">' + '<div> <span class="series-name" style="color: ' + color + '">' + (seriesName ? seriesName : '') + '</span></div>' + '<div> <span class="category">' + ylabel + ': </span> ' + valueHTML + ' </div>' + '</div>';
	};

	var Defaults = /*#__PURE__*/function () {
		function Defaults(opts) {
			_classCallCheck(this, Defaults);

			this.opts = opts;
		}

		_createClass(Defaults, [{
			key: "hideYAxis",
			value: function hideYAxis() {
				this.opts.yaxis[0].show = false;
				this.opts.yaxis[0].title.text = '';
				this.opts.yaxis[0].axisBorder.show = false;
				this.opts.yaxis[0].axisTicks.show = false;
				this.opts.yaxis[0].floating = true;
			}
		}, {
			key: "line",
			value: function line() {
				return {
					chart: {
						animations: {
							easing: 'swing'
						}
					},
					dataLabels: {
						enabled: false
					},
					stroke: {
						width: 5,
						curve: 'straight'
					},
					markers: {
						size: 0,
						hover: {
							sizeOffset: 6
						}
					},
					xaxis: {
						crosshairs: {
							width: 1
						}
					}
				};
			}
		}, {
			key: "sparkline",
			value: function sparkline(defaults) {
				this.hideYAxis();
				var ret = {
					grid: {
						show: false,
						padding: {
							left: 0,
							right: 0,
							top: 0,
							bottom: 0
						}
					},
					legend: {
						show: false
					},
					xaxis: {
						labels: {
							show: false
						},
						tooltip: {
							enabled: false
						},
						axisBorder: {
							show: false
						},
						axisTicks: {
							show: false
						}
					},
					chart: {
						toolbar: {
							show: false
						},
						zoom: {
							enabled: false
						}
					},
					dataLabels: {
						enabled: false
					}
				};
				return Utils$1.extend(defaults, ret);
			}
		}, {
			key: "bar",
			value: function bar() {
				return {
					chart: {
						stacked: false,
						animations: {
							easing: 'swing'
						}
					},
					plotOptions: {
						bar: {
							dataLabels: {
								position: 'center'
							}
						}
					},
					dataLabels: {
						style: {
							colors: ['#fff']
						},
						background: {
							enabled: false
						}
					},
					stroke: {
						width: 0,
						lineCap: 'round'
					},
					fill: {
						opacity: 0.85
					},
					legend: {
						markers: {
							shape: 'square',
							radius: 2,
							size: 8
						}
					},
					tooltip: {
						shared: false,
						intersect: true
					},
					xaxis: {
						tooltip: {
							enabled: false
						},
						tickPlacement: 'between',
						crosshairs: {
							width: 'barWidth',
							position: 'back',
							fill: {
								type: 'gradient'
							},
							dropShadow: {
								enabled: false
							},
							stroke: {
								width: 0
							}
						}
					}
				};
			}
		}, {
			key: "funnel",
			value: function funnel() {
				this.hideYAxis();
				return _objectSpread2(_objectSpread2({}, this.bar()), {}, {
					chart: {
						animations: {
							easing: 'linear',
							speed: 800,
							animateGradually: {
								enabled: false
							}
						}
					},
					plotOptions: {
						bar: {
							horizontal: true,
							borderRadiusApplication: 'around',
							borderRadius: 0,
							dataLabels: {
								position: 'center'
							}
						}
					},
					grid: {
						show: false,
						padding: {
							left: 0,
							right: 0
						}
					},
					xaxis: {
						labels: {
							show: false
						},
						tooltip: {
							enabled: false
						},
						axisBorder: {
							show: false
						},
						axisTicks: {
							show: false
						}
					}
				});
			}
		}, {
			key: "candlestick",
			value: function candlestick() {
				var _this = this;

				return {
					stroke: {
						width: 1,
						colors: ['#333']
					},
					fill: {
						opacity: 1
					},
					dataLabels: {
						enabled: false
					},
					tooltip: {
						shared: true,
						custom: function custom(_ref2) {
							var seriesIndex = _ref2.seriesIndex,
								dataPointIndex = _ref2.dataPointIndex,
								w = _ref2.w;
							return _this._getBoxTooltip(w, seriesIndex, dataPointIndex, ['Open', 'High', '', 'Low', 'Close'], 'candlestick');
						}
					},
					states: {
						active: {
							filter: {
								type: 'none'
							}
						}
					},
					xaxis: {
						crosshairs: {
							width: 1
						}
					}
				};
			}
		}, {
			key: "boxPlot",
			value: function boxPlot() {
				var _this2 = this;

				return {
					chart: {
						animations: {
							dynamicAnimation: {
								enabled: false
							}
						}
					},
					stroke: {
						width: 1,
						colors: ['#24292e']
					},
					dataLabels: {
						enabled: false
					},
					tooltip: {
						shared: true,
						custom: function custom(_ref3) {
							var seriesIndex = _ref3.seriesIndex,
								dataPointIndex = _ref3.dataPointIndex,
								w = _ref3.w;
							return _this2._getBoxTooltip(w, seriesIndex, dataPointIndex, ['Minimum', 'Q1', 'Median', 'Q3', 'Maximum'], 'boxPlot');
						}
					},
					markers: {
						size: 5,
						strokeWidth: 1,
						strokeColors: '#111'
					},
					xaxis: {
						crosshairs: {
							width: 1
						}
					}
				};
			}
		}, {
			key: "rangeBar",
			value: function rangeBar() {
				var handleTimelineTooltip = function handleTimelineTooltip(opts) {
					var _getRangeValues = getRangeValues(_objectSpread2(_objectSpread2({}, opts), {}, {
						isTimeline: true
					})),
						color = _getRangeValues.color,
						seriesName = _getRangeValues.seriesName,
						ylabel = _getRangeValues.ylabel,
						startVal = _getRangeValues.startVal,
						endVal = _getRangeValues.endVal;

					return buildRangeTooltipHTML(_objectSpread2(_objectSpread2({}, opts), {}, {
						color: color,
						seriesName: seriesName,
						ylabel: ylabel,
						start: startVal,
						end: endVal
					}));
				};

				var handleRangeColumnTooltip = function handleRangeColumnTooltip(opts) {
					var _getRangeValues2 = getRangeValues(opts),
						color = _getRangeValues2.color,
						seriesName = _getRangeValues2.seriesName,
						ylabel = _getRangeValues2.ylabel,
						start = _getRangeValues2.start,
						end = _getRangeValues2.end;

					return buildRangeTooltipHTML(_objectSpread2(_objectSpread2({}, opts), {}, {
						color: color,
						seriesName: seriesName,
						ylabel: ylabel,
						start: start,
						end: end
					}));
				};

				return {
					chart: {
						animations: {
							animateGradually: false
						}
					},
					stroke: {
						width: 0,
						lineCap: 'square'
					},
					plotOptions: {
						bar: {
							borderRadius: 0,
							dataLabels: {
								position: 'center'
							}
						}
					},
					dataLabels: {
						enabled: false,
						formatter: function formatter(val, _ref4) {
							_ref4.ctx;
							var seriesIndex = _ref4.seriesIndex,
								dataPointIndex = _ref4.dataPointIndex,
								w = _ref4.w;

							var getVal = function getVal() {
								var start = w.globals.seriesRangeStart[seriesIndex][dataPointIndex];
								var end = w.globals.seriesRangeEnd[seriesIndex][dataPointIndex];
								return end - start;
							};

							if (w.globals.comboCharts) {
								if (w.config.series[seriesIndex].type === 'rangeBar' || w.config.series[seriesIndex].type === 'rangeArea') {
									return getVal();
								} else {
									return val;
								}
							} else {
								return getVal();
							}
						},
						background: {
							enabled: false
						},
						style: {
							colors: ['#fff']
						}
					},
					markers: {
						size: 10
					},
					tooltip: {
						shared: false,
						followCursor: true,
						custom: function custom(opts) {
							if (opts.w.config.plotOptions && opts.w.config.plotOptions.bar && opts.w.config.plotOptions.bar.horizontal) {
								return handleTimelineTooltip(opts);
							} else {
								return handleRangeColumnTooltip(opts);
							}
						}
					},
					xaxis: {
						tickPlacement: 'between',
						tooltip: {
							enabled: false
						},
						crosshairs: {
							stroke: {
								width: 0
							}
						}
					}
				};
			}
		}, {
			key: "dumbbell",
			value: function dumbbell(opts) {
				var _opts$plotOptions$bar, _opts$plotOptions$bar2;

				if (!((_opts$plotOptions$bar = opts.plotOptions.bar) !== null && _opts$plotOptions$bar !== void 0 && _opts$plotOptions$bar.barHeight)) {
					opts.plotOptions.bar.barHeight = 2;
				}

				if (!((_opts$plotOptions$bar2 = opts.plotOptions.bar) !== null && _opts$plotOptions$bar2 !== void 0 && _opts$plotOptions$bar2.columnWidth)) {
					opts.plotOptions.bar.columnWidth = 2;
				}

				return opts;
			}
		}, {
			key: "area",
			value: function area() {
				return {
					stroke: {
						width: 4,
						fill: {
							type: 'solid',
							gradient: {
								inverseColors: false,
								shade: 'light',
								type: 'vertical',
								opacityFrom: 0.65,
								opacityTo: 0.5,
								stops: [0, 100, 100]
							}
						}
					},
					fill: {
						type: 'gradient',
						gradient: {
							inverseColors: false,
							shade: 'light',
							type: 'vertical',
							opacityFrom: 0.65,
							opacityTo: 0.5,
							stops: [0, 100, 100]
						}
					},
					markers: {
						size: 0,
						hover: {
							sizeOffset: 6
						}
					},
					tooltip: {
						followCursor: false
					}
				};
			}
		}, {
			key: "rangeArea",
			value: function rangeArea() {
				var handleRangeAreaTooltip = function handleRangeAreaTooltip(opts) {
					var _getRangeValues3 = getRangeValues(opts),
						color = _getRangeValues3.color,
						seriesName = _getRangeValues3.seriesName,
						ylabel = _getRangeValues3.ylabel,
						start = _getRangeValues3.start,
						end = _getRangeValues3.end;

					return buildRangeTooltipHTML(_objectSpread2(_objectSpread2({}, opts), {}, {
						color: color,
						seriesName: seriesName,
						ylabel: ylabel,
						start: start,
						end: end
					}));
				};

				return {
					stroke: {
						curve: 'straight',
						width: 0
					},
					fill: {
						type: 'solid',
						opacity: 0.6
					},
					markers: {
						size: 0
					},
					states: {
						hover: {
							filter: {
								type: 'none'
							}
						},
						active: {
							filter: {
								type: 'none'
							}
						}
					},
					tooltip: {
						intersect: false,
						shared: true,
						followCursor: true,
						custom: function custom(opts) {
							return handleRangeAreaTooltip(opts);
						}
					}
				};
			}
		}, {
			key: "brush",
			value: function brush(defaults) {
				var ret = {
					chart: {
						toolbar: {
							autoSelected: 'selection',
							show: false
						},
						zoom: {
							enabled: false
						}
					},
					dataLabels: {
						enabled: false
					},
					stroke: {
						width: 1
					},
					tooltip: {
						enabled: false
					},
					xaxis: {
						tooltip: {
							enabled: false
						}
					}
				};
				return Utils$1.extend(defaults, ret);
			}
		}, {
			key: "stacked100",
			value: function stacked100(opts) {
				opts.dataLabels = opts.dataLabels || {};
				opts.dataLabels.formatter = opts.dataLabels.formatter || undefined;
				var existingDataLabelFormatter = opts.dataLabels.formatter;
				opts.yaxis.forEach(function (yaxe, index) {
					opts.yaxis[index].min = 0;
					opts.yaxis[index].max = 100;
				});
				var isBar = opts.chart.type === 'bar';

				if (isBar) {
					opts.dataLabels.formatter = existingDataLabelFormatter || function (val) {
						if (typeof val === 'number') {
							return val ? val.toFixed(0) + '%' : val;
						}

						return val;
					};
				}

				return opts;
			}
		}, {
			key: "stackedBars",
			value: function stackedBars() {
				var barDefaults = this.bar();
				return _objectSpread2(_objectSpread2({}, barDefaults), {}, {
					plotOptions: _objectSpread2(_objectSpread2({}, barDefaults.plotOptions), {}, {
						bar: _objectSpread2(_objectSpread2({}, barDefaults.plotOptions.bar), {}, {
							borderRadiusApplication: 'end',
							borderRadiusWhenStacked: 'last'
						})
					})
				});
			} // This function removes the left and right spacing in chart for line/area/scatter if xaxis type = category for those charts by converting xaxis = numeric. Numeric/Datetime xaxis prevents the unnecessary spacing in the left/right of the chart area

		}, {
			key: "convertCatToNumeric",
			value: function convertCatToNumeric(opts) {
				opts.xaxis.convertedCatToNumeric = true;
				return opts;
			}
		}, {
			key: "convertCatToNumericXaxis",
			value: function convertCatToNumericXaxis(opts, ctx, cats) {
				opts.xaxis.type = 'numeric';
				opts.xaxis.labels = opts.xaxis.labels || {};

				opts.xaxis.labels.formatter = opts.xaxis.labels.formatter || function (val) {
					return Utils$1.isNumber(val) ? Math.floor(val) : val;
				};

				var defaultFormatter = opts.xaxis.labels.formatter;
				var labels = opts.xaxis.categories && opts.xaxis.categories.length ? opts.xaxis.categories : opts.labels;

				if (cats && cats.length) {
					labels = cats.map(function (c) {
						return Array.isArray(c) ? c : String(c);
					});
				}

				if (labels && labels.length) {
					opts.xaxis.labels.formatter = function (val) {
						return Utils$1.isNumber(val) ? defaultFormatter(labels[Math.floor(val) - 1]) : defaultFormatter(val);
					};
				}

				opts.xaxis.categories = [];
				opts.labels = [];
				opts.xaxis.tickAmount = opts.xaxis.tickAmount || 'dataPoints';
				return opts;
			}
		}, {
			key: "bubble",
			value: function bubble() {
				return {
					dataLabels: {
						style: {
							colors: ['#fff']
						}
					},
					tooltip: {
						shared: false,
						intersect: true
					},
					xaxis: {
						crosshairs: {
							width: 0
						}
					},
					fill: {
						type: 'solid',
						gradient: {
							shade: 'light',
							inverse: true,
							shadeIntensity: 0.55,
							opacityFrom: 0.4,
							opacityTo: 0.8
						}
					}
				};
			}
		}, {
			key: "scatter",
			value: function scatter() {
				return {
					dataLabels: {
						enabled: false
					},
					tooltip: {
						shared: false,
						intersect: true
					},
					markers: {
						size: 6,
						strokeWidth: 1,
						hover: {
							sizeOffset: 2
						}
					}
				};
			}
		}, {
			key: "heatmap",
			value: function heatmap() {
				return {
					chart: {
						stacked: false
					},
					fill: {
						opacity: 1
					},
					dataLabels: {
						style: {
							colors: ['#fff']
						}
					},
					stroke: {
						colors: ['#fff']
					},
					tooltip: {
						followCursor: true,
						marker: {
							show: false
						},
						x: {
							show: false
						}
					},
					legend: {
						position: 'top',
						markers: {
							shape: 'square',
							size: 10,
							offsetY: 2
						}
					},
					grid: {
						padding: {
							right: 20
						}
					}
				};
			}
		}, {
			key: "treemap",
			value: function treemap() {
				return {
					chart: {
						zoom: {
							enabled: false
						}
					},
					dataLabels: {
						style: {
							fontSize: 14,
							fontWeight: 600,
							colors: ['#fff']
						}
					},
					stroke: {
						show: true,
						width: 2,
						colors: ['#fff']
					},
					legend: {
						show: false
					},
					fill: {
						gradient: {
							stops: [0, 100]
						}
					},
					tooltip: {
						followCursor: true,
						x: {
							show: false
						}
					},
					grid: {
						padding: {
							left: 0,
							right: 0
						}
					},
					xaxis: {
						crosshairs: {
							show: false
						},
						tooltip: {
							enabled: false
						}
					}
				};
			}
		}, {
			key: "pie",
			value: function pie() {
				return {
					chart: {
						toolbar: {
							show: false
						}
					},
					plotOptions: {
						pie: {
							donut: {
								labels: {
									show: false
								}
							}
						}
					},
					dataLabels: {
						formatter: function formatter(val) {
							return val.toFixed(1) + '%';
						},
						style: {
							colors: ['#fff']
						},
						background: {
							enabled: false
						},
						dropShadow: {
							enabled: true
						}
					},
					stroke: {
						colors: ['#fff']
					},
					fill: {
						opacity: 1,
						gradient: {
							shade: 'light',
							stops: [0, 100]
						}
					},
					tooltip: {
						theme: 'dark',
						fillSeriesColor: true
					},
					legend: {
						position: 'right'
					}
				};
			}
		}, {
			key: "donut",
			value: function donut() {
				return {
					chart: {
						toolbar: {
							show: false
						}
					},
					dataLabels: {
						formatter: function formatter(val) {
							return val.toFixed(1) + '%';
						},
						style: {
							colors: ['#fff']
						},
						background: {
							enabled: false
						},
						dropShadow: {
							enabled: true
						}
					},
					stroke: {
						colors: ['#fff']
					},
					fill: {
						opacity: 1,
						gradient: {
							shade: 'light',
							shadeIntensity: 0.35,
							stops: [80, 100],
							opacityFrom: 1,
							opacityTo: 1
						}
					},
					tooltip: {
						theme: 'dark',
						fillSeriesColor: true
					},
					legend: {
						position: 'right'
					}
				};
			}
		}, {
			key: "polarArea",
			value: function polarArea() {
				this.opts.yaxis[0].tickAmount = this.opts.yaxis[0].tickAmount ? this.opts.yaxis[0].tickAmount : 6;
				return {
					chart: {
						toolbar: {
							show: false
						}
					},
					dataLabels: {
						formatter: function formatter(val) {
							return val.toFixed(1) + '%';
						},
						enabled: false
					},
					stroke: {
						show: true,
						width: 2
					},
					fill: {
						opacity: 0.7
					},
					tooltip: {
						theme: 'dark',
						fillSeriesColor: true
					},
					legend: {
						position: 'right'
					}
				};
			}
		}, {
			key: "radar",
			value: function radar() {
				this.opts.yaxis[0].labels.offsetY = this.opts.yaxis[0].labels.offsetY ? this.opts.yaxis[0].labels.offsetY : 6;
				return {
					dataLabels: {
						enabled: false,
						style: {
							fontSize: '11px'
						}
					},
					stroke: {
						width: 2
					},
					markers: {
						size: 3,
						strokeWidth: 1,
						strokeOpacity: 1
					},
					fill: {
						opacity: 0.2
					},
					tooltip: {
						shared: false,
						intersect: true,
						followCursor: true
					},
					grid: {
						show: false
					},
					xaxis: {
						labels: {
							formatter: function formatter(val) {
								return val;
							},
							style: {
								colors: ['#a8a8a8'],
								fontSize: '11px'
							}
						},
						tooltip: {
							enabled: false
						},
						crosshairs: {
							show: false
						}
					}
				};
			}
		}, {
			key: "radialBar",
			value: function radialBar() {
				return {
					chart: {
						animations: {
							dynamicAnimation: {
								enabled: true,
								speed: 800
							}
						},
						toolbar: {
							show: false
						}
					},
					fill: {
						gradient: {
							shade: 'dark',
							shadeIntensity: 0.4,
							inverseColors: false,
							type: 'diagonal2',
							opacityFrom: 1,
							opacityTo: 1,
							stops: [70, 98, 100]
						}
					},
					legend: {
						show: false,
						position: 'right'
					},
					tooltip: {
						enabled: false,
						fillSeriesColor: true
					}
				};
			}
		}, {
			key: "_getBoxTooltip",
			value: function _getBoxTooltip(w, seriesIndex, dataPointIndex, labels, chartType) {
				var o = w.globals.seriesCandleO[seriesIndex][dataPointIndex];
				var h = w.globals.seriesCandleH[seriesIndex][dataPointIndex];
				var m = w.globals.seriesCandleM[seriesIndex][dataPointIndex];
				var l = w.globals.seriesCandleL[seriesIndex][dataPointIndex];
				var c = w.globals.seriesCandleC[seriesIndex][dataPointIndex];

				if (w.config.series[seriesIndex].type && w.config.series[seriesIndex].type !== chartType) {
					return "<div class=\"apexcharts-custom-tooltip\">\n          ".concat(w.config.series[seriesIndex].name ? w.config.series[seriesIndex].name : 'series-' + (seriesIndex + 1), ": <strong>").concat(w.globals.series[seriesIndex][dataPointIndex], "</strong>\n        </div>");
				} else {
					return "<div class=\"apexcharts-tooltip-box apexcharts-tooltip-".concat(w.config.chart.type, "\">") + "<div>".concat(labels[0], ": <span class=\"value\">") + o + '</span></div>' + "<div>".concat(labels[1], ": <span class=\"value\">") + h + '</span></div>' + (m ? "<div>".concat(labels[2], ": <span class=\"value\">") + m + '</span></div>' : '') + "<div>".concat(labels[3], ": <span class=\"value\">") + l + '</span></div>' + "<div>".concat(labels[4], ": <span class=\"value\">") + c + '</span></div>' + '</div>';
				}
			}
		}]);

		return Defaults;
	}();

	/**
	 * ApexCharts Config Class for extending user options with pre-defined ApexCharts config.
	 *
	 * @module Config
	 **/

	var Config = /*#__PURE__*/function () {
		function Config(opts) {
			_classCallCheck(this, Config);

			this.opts = opts;
		}

		_createClass(Config, [{
			key: "init",
			value: function init(_ref) {
				var responsiveOverride = _ref.responsiveOverride;
				var opts = this.opts;
				var options = new Options();
				var defaults = new Defaults(opts);
				this.chartType = opts.chart.type;
				opts = this.extendYAxis(opts);
				opts = this.extendAnnotations(opts);
				var config = options.init();
				var newDefaults = {};

				if (opts && _typeof(opts) === 'object') {
					var _opts$plotOptions, _opts$plotOptions$bar, _opts$chart$brush, _opts$plotOptions2, _opts$plotOptions2$ba, _opts, _opts$stroke, _opts$chart$sparkline, _window$Apex$chart, _window$Apex$chart$sp;

					var chartDefaults = {};
					var chartTypes = ['line', 'area', 'bar', 'candlestick', 'boxPlot', 'rangeBar', 'rangeArea', 'bubble', 'scatter', 'heatmap', 'treemap', 'pie', 'polarArea', 'donut', 'radar', 'radialBar'];

					if (chartTypes.indexOf(opts.chart.type) !== -1) {
						chartDefaults = defaults[opts.chart.type]();
					} else {
						chartDefaults = defaults.line();
					}

					if ((_opts$plotOptions = opts.plotOptions) !== null && _opts$plotOptions !== void 0 && (_opts$plotOptions$bar = _opts$plotOptions.bar) !== null && _opts$plotOptions$bar !== void 0 && _opts$plotOptions$bar.isFunnel) {
						chartDefaults = defaults.funnel();
					}

					if (opts.chart.stacked && opts.chart.type === 'bar') {
						chartDefaults = defaults.stackedBars();
					}

					if ((_opts$chart$brush = opts.chart.brush) !== null && _opts$chart$brush !== void 0 && _opts$chart$brush.enabled) {
						chartDefaults = defaults.brush(chartDefaults);
					}

					if (opts.chart.stacked && opts.chart.stackType === '100%') {
						opts = defaults.stacked100(opts);
					}

					if ((_opts$plotOptions2 = opts.plotOptions) !== null && _opts$plotOptions2 !== void 0 && (_opts$plotOptions2$ba = _opts$plotOptions2.bar) !== null && _opts$plotOptions2$ba !== void 0 && _opts$plotOptions2$ba.isDumbbell) {
						opts = defaults.dumbbell(opts);
					}

					if (((_opts = opts) === null || _opts === void 0 ? void 0 : (_opts$stroke = _opts.stroke) === null || _opts$stroke === void 0 ? void 0 : _opts$stroke.curve) === 'monotoneCubic') {
						opts.stroke.curve = 'smooth';
					} // If user has specified a dark theme, make the tooltip dark too


					this.checkForDarkTheme(window.Apex); // check global window Apex options

					this.checkForDarkTheme(opts); // check locally passed options

					opts.xaxis = opts.xaxis || window.Apex.xaxis || {}; // an important boolean needs to be set here
					// otherwise all the charts will have this flag set to true window.Apex.xaxis is set globally

					if (!responsiveOverride) {
						opts.xaxis.convertedCatToNumeric = false;
					}

					opts = this.checkForCatToNumericXAxis(this.chartType, chartDefaults, opts);

					if ((_opts$chart$sparkline = opts.chart.sparkline) !== null && _opts$chart$sparkline !== void 0 && _opts$chart$sparkline.enabled || (_window$Apex$chart = window.Apex.chart) !== null && _window$Apex$chart !== void 0 && (_window$Apex$chart$sp = _window$Apex$chart.sparkline) !== null && _window$Apex$chart$sp !== void 0 && _window$Apex$chart$sp.enabled) {
						chartDefaults = defaults.sparkline(chartDefaults);
					}

					newDefaults = Utils$1.extend(config, chartDefaults);
				} // config should cascade in this fashion
				// default-config < global-apex-variable-config < user-defined-config
				// get GLOBALLY defined options and merge with the default config


				var mergedWithDefaultConfig = Utils$1.extend(newDefaults, window.Apex); // get the merged config and extend with user defined config

				config = Utils$1.extend(mergedWithDefaultConfig, opts); // some features are not supported. those mismatches should be handled

				config = this.handleUserInputErrors(config);
				return config;
			}
		}, {
			key: "checkForCatToNumericXAxis",
			value: function checkForCatToNumericXAxis(chartType, chartDefaults, opts) {
				var _opts$plotOptions3, _opts$plotOptions3$ba;

				var defaults = new Defaults(opts);
				var isBarHorizontal = (chartType === 'bar' || chartType === 'boxPlot') && ((_opts$plotOptions3 = opts.plotOptions) === null || _opts$plotOptions3 === void 0 ? void 0 : (_opts$plotOptions3$ba = _opts$plotOptions3.bar) === null || _opts$plotOptions3$ba === void 0 ? void 0 : _opts$plotOptions3$ba.horizontal);
				var unsupportedZoom = chartType === 'pie' || chartType === 'polarArea' || chartType === 'donut' || chartType === 'radar' || chartType === 'radialBar' || chartType === 'heatmap';
				var notNumericXAxis = opts.xaxis.type !== 'datetime' && opts.xaxis.type !== 'numeric';
				var tickPlacement = opts.xaxis.tickPlacement ? opts.xaxis.tickPlacement : chartDefaults.xaxis && chartDefaults.xaxis.tickPlacement;

				if (!isBarHorizontal && !unsupportedZoom && notNumericXAxis && tickPlacement !== 'between') {
					opts = defaults.convertCatToNumeric(opts);
				}

				return opts;
			}
		}, {
			key: "extendYAxis",
			value: function extendYAxis(opts, w) {
				var options = new Options();

				if (typeof opts.yaxis === 'undefined' || !opts.yaxis || Array.isArray(opts.yaxis) && opts.yaxis.length === 0) {
					opts.yaxis = {};
				} // extend global yaxis config (only if object is provided / not an array)


				if (opts.yaxis.constructor !== Array && window.Apex.yaxis && window.Apex.yaxis.constructor !== Array) {
					opts.yaxis = Utils$1.extend(opts.yaxis, window.Apex.yaxis);
				} // as we can't extend nested object's array with extend, we need to do it first
				// user can provide either an array or object in yaxis config


				if (opts.yaxis.constructor !== Array) {
					// convert the yaxis to array if user supplied object
					opts.yaxis = [Utils$1.extend(options.yAxis, opts.yaxis)];
				} else {
					opts.yaxis = Utils$1.extendArray(opts.yaxis, options.yAxis);
				}

				var isLogY = false;
				opts.yaxis.forEach(function (y) {
					if (y.logarithmic) {
						isLogY = true;
					}
				});
				var series = opts.series;

				if (w && !series) {
					series = w.config.series;
				} // A logarithmic chart works correctly when each series has a corresponding y-axis
				// If this is not the case, we manually create yaxis for multi-series log chart


				if (isLogY && series.length !== opts.yaxis.length && series.length) {
					opts.yaxis = series.map(function (s, i) {
						if (!s.name) {
							series[i].name = "series-".concat(i + 1);
						}

						if (opts.yaxis[i]) {
							opts.yaxis[i].seriesName = series[i].name;
							return opts.yaxis[i];
						} else {
							var newYaxis = Utils$1.extend(options.yAxis, opts.yaxis[0]);
							newYaxis.show = false;
							return newYaxis;
						}
					});
				}

				if (isLogY && series.length > 1 && series.length !== opts.yaxis.length) {
					console.warn('A multi-series logarithmic chart should have equal number of series and y-axes');
				}

				return opts;
			} // annotations also accepts array, so we need to extend them manually

		}, {
			key: "extendAnnotations",
			value: function extendAnnotations(opts) {
				if (typeof opts.annotations === 'undefined') {
					opts.annotations = {};
					opts.annotations.yaxis = [];
					opts.annotations.xaxis = [];
					opts.annotations.points = [];
				}

				opts = this.extendYAxisAnnotations(opts);
				opts = this.extendXAxisAnnotations(opts);
				opts = this.extendPointAnnotations(opts);
				return opts;
			}
		}, {
			key: "extendYAxisAnnotations",
			value: function extendYAxisAnnotations(opts) {
				var options = new Options();
				opts.annotations.yaxis = Utils$1.extendArray(typeof opts.annotations.yaxis !== 'undefined' ? opts.annotations.yaxis : [], options.yAxisAnnotation);
				return opts;
			}
		}, {
			key: "extendXAxisAnnotations",
			value: function extendXAxisAnnotations(opts) {
				var options = new Options();
				opts.annotations.xaxis = Utils$1.extendArray(typeof opts.annotations.xaxis !== 'undefined' ? opts.annotations.xaxis : [], options.xAxisAnnotation);
				return opts;
			}
		}, {
			key: "extendPointAnnotations",
			value: function extendPointAnnotations(opts) {
				var options = new Options();
				opts.annotations.points = Utils$1.extendArray(typeof opts.annotations.points !== 'undefined' ? opts.annotations.points : [], options.pointAnnotation);
				return opts;
			}
		}, {
			key: "checkForDarkTheme",
			value: function checkForDarkTheme(opts) {
				if (opts.theme && opts.theme.mode === 'dark') {
					if (!opts.tooltip) {
						opts.tooltip = {};
					}

					if (opts.tooltip.theme !== 'light') {
						opts.tooltip.theme = 'dark';
					}

					if (!opts.chart.foreColor) {
						opts.chart.foreColor = '#f6f7f8';
					}

					if (!opts.chart.background) {
						opts.chart.background = '#424242';
					}

					if (!opts.theme.palette) {
						opts.theme.palette = 'palette4';
					}
				}
			}
		}, {
			key: "handleUserInputErrors",
			value: function handleUserInputErrors(opts) {
				var config = opts; // conflicting tooltip option. intersect makes sure to focus on 1 point at a time. Shared cannot be used along with it

				if (config.tooltip.shared && config.tooltip.intersect) {
					throw new Error('tooltip.shared cannot be enabled when tooltip.intersect is true. Turn off any other option by setting it to false.');
				}

				if (config.chart.type === 'bar' && config.plotOptions.bar.horizontal) {
					// No multiple yaxis for bars
					if (config.yaxis.length > 1) {
						throw new Error('Multiple Y Axis for bars are not supported. Switch to column chart by setting plotOptions.bar.horizontal=false');
					} // if yaxis is reversed in horizontal bar chart, you should draw the y-axis on right side


					if (config.yaxis[0].reversed) {
						config.yaxis[0].opposite = true;
					}

					config.xaxis.tooltip.enabled = false; // no xaxis tooltip for horizontal bar

					config.yaxis[0].tooltip.enabled = false; // no xaxis tooltip for horizontal bar

					config.chart.zoom.enabled = false; // no zooming for horz bars
				}

				if (config.chart.type === 'bar' || config.chart.type === 'rangeBar') {
					if (config.tooltip.shared) {
						if (config.xaxis.crosshairs.width === 'barWidth' && config.series.length > 1) {
							config.xaxis.crosshairs.width = 'tickWidth';
						}
					}
				}

				if (config.chart.type === 'candlestick' || config.chart.type === 'boxPlot') {
					if (config.yaxis[0].reversed) {
						console.warn("Reversed y-axis in ".concat(config.chart.type, " chart is not supported."));
						config.yaxis[0].reversed = false;
					}
				}

				return config;
			}
		}]);

		return Config;
	}();

	var Globals = /*#__PURE__*/function () {
		function Globals() {
			_classCallCheck(this, Globals);
		}

		_createClass(Globals, [{
			key: "initGlobalVars",
			value: function initGlobalVars(gl) {
				gl.series = []; // the MAIN series array (y values)

				gl.seriesCandleO = [];
				gl.seriesCandleH = [];
				gl.seriesCandleM = [];
				gl.seriesCandleL = [];
				gl.seriesCandleC = [];
				gl.seriesRangeStart = [];
				gl.seriesRangeEnd = [];
				gl.seriesRange = [];
				gl.seriesPercent = [];
				gl.seriesGoals = [];
				gl.seriesX = [];
				gl.seriesZ = [];
				gl.seriesNames = [];
				gl.seriesTotals = [];
				gl.seriesLog = [];
				gl.seriesColors = [];
				gl.stackedSeriesTotals = [];
				gl.seriesXvalues = []; // we will need this in tooltip (it's x position)
				// when we will have unequal x values, we will need
				// some way to get x value depending on mouse pointer

				gl.seriesYvalues = []; // we will need this when deciding which series
				// user hovered on

				gl.labels = [];
				gl.hasXaxisGroups = false;
				gl.groups = [];
				gl.hasSeriesGroups = false;
				gl.seriesGroups = [];
				gl.categoryLabels = [];
				gl.timescaleLabels = [];
				gl.noLabelsProvided = false;
				gl.resizeTimer = null;
				gl.selectionResizeTimer = null;
				gl.delayedElements = [];
				gl.pointsArray = [];
				gl.dataLabelsRects = [];
				gl.isXNumeric = false;
				gl.skipLastTimelinelabel = false;
				gl.skipFirstTimelinelabel = false;
				gl.isDataXYZ = false;
				gl.isMultiLineX = false;
				gl.isMultipleYAxis = false;
				gl.maxY = -Number.MAX_VALUE;
				gl.minY = Number.MIN_VALUE;
				gl.minYArr = [];
				gl.maxYArr = [];
				gl.maxX = -Number.MAX_VALUE;
				gl.minX = Number.MAX_VALUE;
				gl.initialMaxX = -Number.MAX_VALUE;
				gl.initialMinX = Number.MAX_VALUE;
				gl.maxDate = 0;
				gl.minDate = Number.MAX_VALUE;
				gl.minZ = Number.MAX_VALUE;
				gl.maxZ = -Number.MAX_VALUE;
				gl.minXDiff = Number.MAX_VALUE;
				gl.yAxisScale = [];
				gl.xAxisScale = null;
				gl.xAxisTicksPositions = [];
				gl.yLabelsCoords = [];
				gl.yTitleCoords = [];
				gl.barPadForNumericAxis = 0;
				gl.padHorizontal = 0;
				gl.xRange = 0;
				gl.yRange = [];
				gl.zRange = 0;
				gl.dataPoints = 0;
				gl.xTickAmount = 0;
			}
		}, {
			key: "globalVars",
			value: function globalVars(config) {
				return {
					chartID: null,
					// chart ID - apexcharts-cuid
					cuid: null,
					// chart ID - random numbers excluding "apexcharts" part
					events: {
						beforeMount: [],
						mounted: [],
						updated: [],
						clicked: [],
						selection: [],
						dataPointSelection: [],
						zoomed: [],
						scrolled: []
					},
					colors: [],
					clientX: null,
					clientY: null,
					fill: {
						colors: []
					},
					stroke: {
						colors: []
					},
					dataLabels: {
						style: {
							colors: []
						}
					},
					radarPolygons: {
						fill: {
							colors: []
						}
					},
					markers: {
						colors: [],
						size: config.markers.size,
						largestSize: 0
					},
					animationEnded: false,
					isTouchDevice: 'ontouchstart' in window || navigator.msMaxTouchPoints,
					isDirty: false,
					// chart has been updated after the initial render. This is different than dataChanged property. isDirty means user manually called some method to update
					isExecCalled: false,
					// whether user updated the chart through the exec method
					initialConfig: null,
					// we will store the first config user has set to go back when user finishes interactions like zooming and come out of it
					initialSeries: [],
					lastXAxis: [],
					lastYAxis: [],
					columnSeries: null,
					labels: [],
					// store the text to draw on x axis
					// Don't mutate the labels, many things including tooltips depends on it!
					timescaleLabels: [],
					// store the timescaleLabels Labels in another variable
					noLabelsProvided: false,
					// if user didn't provide any categories/labels or x values, fallback to 1,2,3,4...
					allSeriesCollapsed: false,
					collapsedSeries: [],
					// when user collapses a series, it goes into this array
					collapsedSeriesIndices: [],
					// this stores the index of the collapsedSeries instead of whole object for quick access
					ancillaryCollapsedSeries: [],
					// when user collapses an "alwaysVisible" series, it goes into this array
					ancillaryCollapsedSeriesIndices: [],
					// this stores the index of the ancillaryCollapsedSeries whose y-axis is always visible
					risingSeries: [],
					// when user re-opens a collapsed series, it goes here
					dataFormatXNumeric: false,
					// boolean value to indicate user has passed numeric x values
					capturedSeriesIndex: -1,
					capturedDataPointIndex: -1,
					selectedDataPoints: [],
					goldenPadding: 35,
					// this value is used at a lot of places for spacing purpose
					invalidLogScale: false,
					// if a user enabled log scale but the data provided is not valid to generate a log scale, turn on this flag
					ignoreYAxisIndexes: [],
					// when series are being collapsed in multiple y axes, ignore certain index
					yAxisSameScaleIndices: [],
					maxValsInArrayIndex: 0,
					radialSize: 0,
					selection: undefined,
					zoomEnabled: config.chart.toolbar.autoSelected === 'zoom' && config.chart.toolbar.tools.zoom && config.chart.zoom.enabled,
					panEnabled: config.chart.toolbar.autoSelected === 'pan' && config.chart.toolbar.tools.pan,
					selectionEnabled: config.chart.toolbar.autoSelected === 'selection' && config.chart.toolbar.tools.selection,
					yaxis: null,
					mousedown: false,
					lastClientPosition: {},
					// don't reset this variable this the chart is destroyed. It is used to detect right or left mousemove in panning
					visibleXRange: undefined,
					yValueDecimal: 0,
					// are there floating numbers in the series. If yes, this represent the len of the decimals
					total: 0,
					SVGNS: 'http://www.w3.org/2000/svg',
					// svg namespace
					svgWidth: 0,
					// the whole svg width
					svgHeight: 0,
					// the whole svg height
					noData: false,
					// whether there is any data to display or not
					locale: {},
					// the current locale values will be preserved here for global access
					dom: {},
					// for storing all dom nodes in this particular property
					memory: {
						methodsToExec: []
					},
					shouldAnimate: true,
					skipLastTimelinelabel: false,
					// when last label is cropped, skip drawing it
					skipFirstTimelinelabel: false,
					// when first label is cropped, skip drawing it
					delayedElements: [],
					// element which appear after animation has finished
					axisCharts: true,
					// chart type = line or area or bar
					// (refer them also as plot charts in the code)
					isDataXYZ: false,
					// bool: data was provided in a {[x,y,z]} pattern
					resized: false,
					// bool: user has resized
					resizeTimer: null,
					// timeout function to make a small delay before
					// drawing when user resized
					comboCharts: false,
					// bool: whether it's a combination of line/column
					dataChanged: false,
					// bool: has data changed dynamically
					previousPaths: [],
					// array: when data is changed, it will animate from
					// previous paths
					allSeriesHasEqualX: true,
					pointsArray: [],
					// store the points positions here to draw later on hover
					// format is - [[x,y],[x,y]... [x,y]]
					dataLabelsRects: [],
					// store the positions of datalabels to prevent collision
					lastDrawnDataLabelsIndexes: [],
					hasNullValues: false,
					// bool: whether series contains null values
					easing: null,
					// function: animation effect to apply
					zoomed: false,
					// whether user has zoomed or not
					gridWidth: 0,
					// drawable width of actual graphs (series paths)
					gridHeight: 0,
					// drawable height of actual graphs (series paths)
					rotateXLabels: false,
					defaultLabels: false,
					xLabelFormatter: undefined,
					// formatter for x axis labels
					yLabelFormatters: [],
					xaxisTooltipFormatter: undefined,
					// formatter for x axis tooltip
					ttKeyFormatter: undefined,
					ttVal: undefined,
					ttZFormatter: undefined,
					LINE_HEIGHT_RATIO: 1.618,
					xAxisLabelsHeight: 0,
					xAxisGroupLabelsHeight: 0,
					xAxisLabelsWidth: 0,
					yAxisLabelsWidth: 0,
					scaleX: 1,
					scaleY: 1,
					translateX: 0,
					translateY: 0,
					translateYAxisX: [],
					yAxisWidths: [],
					translateXAxisY: 0,
					translateXAxisX: 0,
					tooltip: null
				};
			}
		}, {
			key: "init",
			value: function init(config) {
				var globals = this.globalVars(config);
				this.initGlobalVars(globals);
				globals.initialConfig = Utils$1.extend({}, config);
				globals.initialSeries = Utils$1.clone(config.series);
				globals.lastXAxis = Utils$1.clone(globals.initialConfig.xaxis);
				globals.lastYAxis = Utils$1.clone(globals.initialConfig.yaxis);
				return globals;
			}
		}]);

		return Globals;
	}();

	/**
	 * ApexCharts Base Class for extending user options with pre-defined ApexCharts config.
	 *
	 * @module Base
	 **/

	var Base = /*#__PURE__*/function () {
		function Base(opts) {
			_classCallCheck(this, Base);

			this.opts = opts;
		}

		_createClass(Base, [{
			key: "init",
			value: function init() {
				var config = new Config(this.opts).init({
					responsiveOverride: false
				});
				var globals = new Globals().init(config);
				var w = {
					config: config,
					globals: globals
				};
				return w;
			}
		}]);

		return Base;
	}();

	/**
	 * ApexCharts Fill Class for setting fill options of the paths.
	 *
	 * @module Fill
	 **/

	var Fill = /*#__PURE__*/function () {
		function Fill(ctx) {
			_classCallCheck(this, Fill);

			this.ctx = ctx;
			this.w = ctx.w;
			this.opts = null;
			this.seriesIndex = 0;
		}

		_createClass(Fill, [{
			key: "clippedImgArea",
			value: function clippedImgArea(params) {
				var w = this.w;
				var cnf = w.config;
				var svgW = parseInt(w.globals.gridWidth, 10);
				var svgH = parseInt(w.globals.gridHeight, 10);
				var size = svgW > svgH ? svgW : svgH;
				var fillImg = params.image;
				var imgWidth = 0;
				var imgHeight = 0;

				if (typeof params.width === 'undefined' && typeof params.height === 'undefined') {
					if (cnf.fill.image.width !== undefined && cnf.fill.image.height !== undefined) {
						imgWidth = cnf.fill.image.width + 1;
						imgHeight = cnf.fill.image.height;
					} else {
						imgWidth = size + 1;
						imgHeight = size;
					}
				} else {
					imgWidth = params.width;
					imgHeight = params.height;
				}

				var elPattern = document.createElementNS(w.globals.SVGNS, 'pattern');
				Graphics.setAttrs(elPattern, {
					id: params.patternID,
					patternUnits: params.patternUnits ? params.patternUnits : 'userSpaceOnUse',
					width: imgWidth + 'px',
					height: imgHeight + 'px'
				});
				var elImage = document.createElementNS(w.globals.SVGNS, 'image');
				elPattern.appendChild(elImage);
				elImage.setAttributeNS(window.SVG.xlink, 'href', fillImg);
				Graphics.setAttrs(elImage, {
					x: 0,
					y: 0,
					preserveAspectRatio: 'none',
					width: imgWidth + 'px',
					height: imgHeight + 'px'
				});
				elImage.style.opacity = params.opacity;
				w.globals.dom.elDefs.node.appendChild(elPattern);
			}
		}, {
			key: "getSeriesIndex",
			value: function getSeriesIndex(opts) {
				var w = this.w;
				var cType = w.config.chart.type;

				if ((cType === 'bar' || cType === 'rangeBar') && w.config.plotOptions.bar.distributed || cType === 'heatmap' || cType === 'treemap') {
					this.seriesIndex = opts.seriesNumber;
				} else {
					this.seriesIndex = opts.seriesNumber % w.globals.series.length;
				}

				return this.seriesIndex;
			}
		}, {
			key: "fillPath",
			value: function fillPath(opts) {
				var w = this.w;
				this.opts = opts;
				var cnf = this.w.config;
				var pathFill;
				var patternFill, gradientFill;
				this.seriesIndex = this.getSeriesIndex(opts);
				var fillColors = this.getFillColors();
				var fillColor = fillColors[this.seriesIndex]; //override fillcolor if user inputted color with data

				if (w.globals.seriesColors[this.seriesIndex] !== undefined) {
					fillColor = w.globals.seriesColors[this.seriesIndex];
				}

				if (typeof fillColor === 'function') {
					fillColor = fillColor({
						seriesIndex: this.seriesIndex,
						dataPointIndex: opts.dataPointIndex,
						value: opts.value,
						w: w
					});
				}

				var fillType = opts.fillType ? opts.fillType : this.getFillType(this.seriesIndex);
				var fillOpacity = Array.isArray(cnf.fill.opacity) ? cnf.fill.opacity[this.seriesIndex] : cnf.fill.opacity;

				if (opts.color) {
					fillColor = opts.color;
				} // in case a color is undefined, fallback to white color to prevent runtime error


				if (!fillColor) {
					fillColor = '#fff';
					console.warn('undefined color - ApexCharts');
				}

				var defaultColor = fillColor;

				if (fillColor.indexOf('rgb') === -1) {
					if (fillColor.length < 9) {
						// if the hex contains alpha and is of 9 digit, skip the opacity
						defaultColor = Utils$1.hexToRgba(fillColor, fillOpacity);
					}
				} else {
					if (fillColor.indexOf('rgba') > -1) {
						fillOpacity = Utils$1.getOpacityFromRGBA(fillColor);
					}
				}

				if (opts.opacity) fillOpacity = opts.opacity;

				if (fillType === 'pattern') {
					patternFill = this.handlePatternFill({
						fillConfig: opts.fillConfig,
						patternFill: patternFill,
						fillColor: fillColor,
						fillOpacity: fillOpacity,
						defaultColor: defaultColor
					});
				}

				if (fillType === 'gradient') {
					gradientFill = this.handleGradientFill({
						fillConfig: opts.fillConfig,
						fillColor: fillColor,
						fillOpacity: fillOpacity,
						i: this.seriesIndex
					});
				}

				if (fillType === 'image') {
					var imgSrc = cnf.fill.image.src;
					var patternID = opts.patternID ? opts.patternID : '';
					this.clippedImgArea({
						opacity: fillOpacity,
						image: Array.isArray(imgSrc) ? opts.seriesNumber < imgSrc.length ? imgSrc[opts.seriesNumber] : imgSrc[0] : imgSrc,
						width: opts.width ? opts.width : undefined,
						height: opts.height ? opts.height : undefined,
						patternUnits: opts.patternUnits,
						patternID: "pattern".concat(w.globals.cuid).concat(opts.seriesNumber + 1).concat(patternID)
					});
					pathFill = "url(#pattern".concat(w.globals.cuid).concat(opts.seriesNumber + 1).concat(patternID, ")");
				} else if (fillType === 'gradient') {
					pathFill = gradientFill;
				} else if (fillType === 'pattern') {
					pathFill = patternFill;
				} else {
					pathFill = defaultColor;
				} // override pattern/gradient if opts.solid is true


				if (opts.solid) {
					pathFill = defaultColor;
				}

				return pathFill;
			}
		}, {
			key: "getFillType",
			value: function getFillType(seriesIndex) {
				var w = this.w;

				if (Array.isArray(w.config.fill.type)) {
					return w.config.fill.type[seriesIndex];
				} else {
					return w.config.fill.type;
				}
			}
		}, {
			key: "getFillColors",
			value: function getFillColors() {
				var w = this.w;
				var cnf = w.config;
				var opts = this.opts;
				var fillColors = [];

				if (w.globals.comboCharts) {
					if (w.config.series[this.seriesIndex].type === 'line') {
						if (Array.isArray(w.globals.stroke.colors)) {
							fillColors = w.globals.stroke.colors;
						} else {
							fillColors.push(w.globals.stroke.colors);
						}
					} else {
						if (Array.isArray(w.globals.fill.colors)) {
							fillColors = w.globals.fill.colors;
						} else {
							fillColors.push(w.globals.fill.colors);
						}
					}
				} else {
					if (cnf.chart.type === 'line') {
						if (Array.isArray(w.globals.stroke.colors)) {
							fillColors = w.globals.stroke.colors;
						} else {
							fillColors.push(w.globals.stroke.colors);
						}
					} else {
						if (Array.isArray(w.globals.fill.colors)) {
							fillColors = w.globals.fill.colors;
						} else {
							fillColors.push(w.globals.fill.colors);
						}
					}
				} // colors passed in arguments


				if (typeof opts.fillColors !== 'undefined') {
					fillColors = [];

					if (Array.isArray(opts.fillColors)) {
						fillColors = opts.fillColors.slice();
					} else {
						fillColors.push(opts.fillColors);
					}
				}

				return fillColors;
			}
		}, {
			key: "handlePatternFill",
			value: function handlePatternFill(_ref) {
				var fillConfig = _ref.fillConfig,
					patternFill = _ref.patternFill,
					fillColor = _ref.fillColor,
					fillOpacity = _ref.fillOpacity,
					defaultColor = _ref.defaultColor;
				var fillCnf = this.w.config.fill;

				if (fillConfig) {
					fillCnf = fillConfig;
				}

				var opts = this.opts;
				var graphics = new Graphics(this.ctx);
				var patternStrokeWidth = Array.isArray(fillCnf.pattern.strokeWidth) ? fillCnf.pattern.strokeWidth[this.seriesIndex] : fillCnf.pattern.strokeWidth;
				var patternLineColor = fillColor;

				if (Array.isArray(fillCnf.pattern.style)) {
					if (typeof fillCnf.pattern.style[opts.seriesNumber] !== 'undefined') {
						var pf = graphics.drawPattern(fillCnf.pattern.style[opts.seriesNumber], fillCnf.pattern.width, fillCnf.pattern.height, patternLineColor, patternStrokeWidth, fillOpacity);
						patternFill = pf;
					} else {
						patternFill = defaultColor;
					}
				} else {
					patternFill = graphics.drawPattern(fillCnf.pattern.style, fillCnf.pattern.width, fillCnf.pattern.height, patternLineColor, patternStrokeWidth, fillOpacity);
				}

				return patternFill;
			}
		}, {
			key: "handleGradientFill",
			value: function handleGradientFill(_ref2) {
				var fillColor = _ref2.fillColor,
					fillOpacity = _ref2.fillOpacity,
					fillConfig = _ref2.fillConfig,
					i = _ref2.i;
				var fillCnf = this.w.config.fill;

				if (fillConfig) {
					fillCnf = _objectSpread2(_objectSpread2({}, fillCnf), fillConfig);
				}

				var opts = this.opts;
				var graphics = new Graphics(this.ctx);
				var utils = new Utils$1();
				var type = fillCnf.gradient.type;
				var gradientFrom = fillColor;
				var gradientTo;
				var opacityFrom = fillCnf.gradient.opacityFrom === undefined ? fillOpacity : Array.isArray(fillCnf.gradient.opacityFrom) ? fillCnf.gradient.opacityFrom[i] : fillCnf.gradient.opacityFrom;

				if (gradientFrom.indexOf('rgba') > -1) {
					opacityFrom = Utils$1.getOpacityFromRGBA(gradientFrom);
				}

				var opacityTo = fillCnf.gradient.opacityTo === undefined ? fillOpacity : Array.isArray(fillCnf.gradient.opacityTo) ? fillCnf.gradient.opacityTo[i] : fillCnf.gradient.opacityTo;

				if (fillCnf.gradient.gradientToColors === undefined || fillCnf.gradient.gradientToColors.length === 0) {
					if (fillCnf.gradient.shade === 'dark') {
						gradientTo = utils.shadeColor(parseFloat(fillCnf.gradient.shadeIntensity) * -1, fillColor.indexOf('rgb') > -1 ? Utils$1.rgb2hex(fillColor) : fillColor);
					} else {
						gradientTo = utils.shadeColor(parseFloat(fillCnf.gradient.shadeIntensity), fillColor.indexOf('rgb') > -1 ? Utils$1.rgb2hex(fillColor) : fillColor);
					}
				} else {
					if (fillCnf.gradient.gradientToColors[opts.seriesNumber]) {
						var gToColor = fillCnf.gradient.gradientToColors[opts.seriesNumber];
						gradientTo = gToColor;

						if (gToColor.indexOf('rgba') > -1) {
							opacityTo = Utils$1.getOpacityFromRGBA(gToColor);
						}
					} else {
						gradientTo = fillColor;
					}
				}

				if (fillCnf.gradient.gradientFrom) {
					gradientFrom = fillCnf.gradient.gradientFrom;
				}

				if (fillCnf.gradient.gradientTo) {
					gradientTo = fillCnf.gradient.gradientTo;
				}

				if (fillCnf.gradient.inverseColors) {
					var t = gradientFrom;
					gradientFrom = gradientTo;
					gradientTo = t;
				}

				if (gradientFrom.indexOf('rgb') > -1) {
					gradientFrom = Utils$1.rgb2hex(gradientFrom);
				}

				if (gradientTo.indexOf('rgb') > -1) {
					gradientTo = Utils$1.rgb2hex(gradientTo);
				}

				return graphics.drawGradient(type, gradientFrom, gradientTo, opacityFrom, opacityTo, opts.size, fillCnf.gradient.stops, fillCnf.gradient.colorStops, i);
			}
		}]);

		return Fill;
	}();

	/**
	 * ApexCharts Markers Class for drawing points on y values in axes charts.
	 *
	 * @module Markers
	 **/

	var Markers = /*#__PURE__*/function () {
		function Markers(ctx, opts) {
			_classCallCheck(this, Markers);

			this.ctx = ctx;
			this.w = ctx.w;
		}

		_createClass(Markers, [{
			key: "setGlobalMarkerSize",
			value: function setGlobalMarkerSize() {
				var w = this.w;
				w.globals.markers.size = Array.isArray(w.config.markers.size) ? w.config.markers.size : [w.config.markers.size];

				if (w.globals.markers.size.length > 0) {
					if (w.globals.markers.size.length < w.globals.series.length + 1) {
						for (var i = 0; i <= w.globals.series.length; i++) {
							if (typeof w.globals.markers.size[i] === 'undefined') {
								w.globals.markers.size.push(w.globals.markers.size[0]);
							}
						}
					}
				} else {
					w.globals.markers.size = w.config.series.map(function (s) {
						return w.config.markers.size;
					});
				}
			}
		}, {
			key: "plotChartMarkers",
			value: function plotChartMarkers(pointsPos, seriesIndex, j, pSize) {
				var alwaysDrawMarker = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : false;
				var w = this.w;
				var i = seriesIndex;
				var p = pointsPos;
				var elPointsWrap = null;
				var graphics = new Graphics(this.ctx);
				var point;
				var hasDiscreteMarkers = w.config.markers.discrete && w.config.markers.discrete.length;

				if (w.globals.markers.size[seriesIndex] > 0 || alwaysDrawMarker || hasDiscreteMarkers) {
					elPointsWrap = graphics.group({
						class: alwaysDrawMarker || hasDiscreteMarkers ? '' : 'apexcharts-series-markers'
					});
					elPointsWrap.attr('clip-path', "url(#gridRectMarkerMask".concat(w.globals.cuid, ")"));
				}

				if (Array.isArray(p.x)) {
					for (var q = 0; q < p.x.length; q++) {
						var dataPointIndex = j; // a small hack as we have 2 points for the first val to connect it

						if (j === 1 && q === 0) dataPointIndex = 0;
						if (j === 1 && q === 1) dataPointIndex = 1;
						var PointClasses = 'apexcharts-marker';

						if ((w.config.chart.type === 'line' || w.config.chart.type === 'area') && !w.globals.comboCharts && !w.config.tooltip.intersect) {
							PointClasses += ' no-pointer-events';
						}

						var shouldMarkerDraw = Array.isArray(w.config.markers.size) ? w.globals.markers.size[seriesIndex] > 0 : w.config.markers.size > 0;

						if (shouldMarkerDraw || alwaysDrawMarker || hasDiscreteMarkers) {
							if (Utils$1.isNumber(p.y[q])) {
								PointClasses += " w".concat(Utils$1.randomId());
							} else {
								PointClasses = 'apexcharts-nullpoint';
							}

							var opts = this.getMarkerConfig({
								cssClass: PointClasses,
								seriesIndex: seriesIndex,
								dataPointIndex: dataPointIndex
							});

							if (w.config.series[i].data[dataPointIndex]) {
								if (w.config.series[i].data[dataPointIndex].fillColor) {
									opts.pointFillColor = w.config.series[i].data[dataPointIndex].fillColor;
								}

								if (w.config.series[i].data[dataPointIndex].strokeColor) {
									opts.pointStrokeColor = w.config.series[i].data[dataPointIndex].strokeColor;
								}
							}

							if (pSize) {
								opts.pSize = pSize;
							}

							if (p.x[q] < 0 || p.x[q] > w.globals.gridWidth || p.y[q] < -w.globals.markers.largestSize || p.y[q] > w.globals.gridHeight + w.globals.markers.largestSize) {
								opts.pSize = 0;
							}

							point = graphics.drawMarker(p.x[q], p.y[q], opts);
							point.attr('rel', dataPointIndex);
							point.attr('j', dataPointIndex);
							point.attr('index', seriesIndex);
							point.node.setAttribute('default-marker-size', opts.pSize);
							var filters = new Filters(this.ctx);
							filters.setSelectionFilter(point, seriesIndex, dataPointIndex);
							this.addEvents(point);

							if (elPointsWrap) {
								elPointsWrap.add(point);
							}
						} else {
							// dynamic array creation - multidimensional
							if (typeof w.globals.pointsArray[seriesIndex] === 'undefined') w.globals.pointsArray[seriesIndex] = [];
							w.globals.pointsArray[seriesIndex].push([p.x[q], p.y[q]]);
						}
					}
				}

				return elPointsWrap;
			}
		}, {
			key: "getMarkerConfig",
			value: function getMarkerConfig(_ref) {
				var cssClass = _ref.cssClass,
					seriesIndex = _ref.seriesIndex,
					_ref$dataPointIndex = _ref.dataPointIndex,
					dataPointIndex = _ref$dataPointIndex === void 0 ? null : _ref$dataPointIndex,
					_ref$finishRadius = _ref.finishRadius,
					finishRadius = _ref$finishRadius === void 0 ? null : _ref$finishRadius;
				var w = this.w;
				var pStyle = this.getMarkerStyle(seriesIndex);
				var pSize = w.globals.markers.size[seriesIndex];
				var m = w.config.markers; // discrete markers is an option where user can specify a particular marker with different shape, size and color

				if (dataPointIndex !== null && m.discrete.length) {
					m.discrete.map(function (marker) {
						if (marker.seriesIndex === seriesIndex && marker.dataPointIndex === dataPointIndex) {
							pStyle.pointStrokeColor = marker.strokeColor;
							pStyle.pointFillColor = marker.fillColor;
							pSize = marker.size;
							pStyle.pointShape = marker.shape;
						}
					});
				}

				return {
					pSize: finishRadius === null ? pSize : finishRadius,
					pRadius: m.radius,
					width: Array.isArray(m.width) ? m.width[seriesIndex] : m.width,
					height: Array.isArray(m.height) ? m.height[seriesIndex] : m.height,
					pointStrokeWidth: Array.isArray(m.strokeWidth) ? m.strokeWidth[seriesIndex] : m.strokeWidth,
					pointStrokeColor: pStyle.pointStrokeColor,
					pointFillColor: pStyle.pointFillColor,
					shape: pStyle.pointShape || (Array.isArray(m.shape) ? m.shape[seriesIndex] : m.shape),
					class: cssClass,
					pointStrokeOpacity: Array.isArray(m.strokeOpacity) ? m.strokeOpacity[seriesIndex] : m.strokeOpacity,
					pointStrokeDashArray: Array.isArray(m.strokeDashArray) ? m.strokeDashArray[seriesIndex] : m.strokeDashArray,
					pointFillOpacity: Array.isArray(m.fillOpacity) ? m.fillOpacity[seriesIndex] : m.fillOpacity,
					seriesIndex: seriesIndex
				};
			}
		}, {
			key: "addEvents",
			value: function addEvents(circle) {
				var w = this.w;
				var graphics = new Graphics(this.ctx);
				circle.node.addEventListener('mouseenter', graphics.pathMouseEnter.bind(this.ctx, circle));
				circle.node.addEventListener('mouseleave', graphics.pathMouseLeave.bind(this.ctx, circle));
				circle.node.addEventListener('mousedown', graphics.pathMouseDown.bind(this.ctx, circle));
				circle.node.addEventListener('click', w.config.markers.onClick);
				circle.node.addEventListener('dblclick', w.config.markers.onDblClick);
				circle.node.addEventListener('touchstart', graphics.pathMouseDown.bind(this.ctx, circle), {
					passive: 