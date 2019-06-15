webpackJsonp([2],{

/***/ 652:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(743)
/* template */
var __vue_template__ = __webpack_require__(766)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/main.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-337b9a50", Component.options)
  } else {
    hotAPI.reload("data-v-337b9a50", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 655:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(656)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(658)
/* template */
var __vue_template__ = __webpack_require__(659)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/orders/neworder/vehicleShow.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-a74f6000", Component.options)
  } else {
    hotAPI.reload("data-v-a74f6000", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 656:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(657);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("4e3b115c", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-a74f6000\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./vehicleShow.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-a74f6000\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./vehicleShow.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 657:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 658:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {};
  },
  created: function created() {},
  mounted: function mounted() {},

  computed: {
    selected: function selected() {
      if (this.ship_id === this.price[1].id) {
        return true;
      } else {
        return false;
      }
    }
  },
  props: {
    price: {
      required: true
    },
    ship_id: {
      required: true
    }
  },
  methods: {
    handleSelect: function handleSelect() {
      if (this.selected) {
        return false;
      } else {
        this.$emit("changeVehicle", this.price[1].id);
      }
    }
  }
});

/***/ }),

/***/ 659:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "vehicle-slider" }, [
    _c("div", { staticClass: "vehicle-cost" }, [
      _c("div", { staticClass: "cost-field" }, [
        _c("span", [_vm._v(_vm._s(_vm.price[0].toString().replace(".", ",")))]),
        _vm._v(" "),
        _c("i", { staticClass: "fa fa-euro" })
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "vehicle-image" }, [
      _c("div", { staticClass: "vehicle-images-wrapper" }, [
        _c("li", {
          class: {
            "is-checked": _vm.selected === true,
            checkbox: true,
            check: true
          },
          on: { click: _vm.handleSelect }
        }),
        _vm._v(" "),
        _c("img", {
          attrs: { src: "/images/shippings/" + _vm.price[1].img, alt: "" }
        })
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "vehicle-name" }, [
      _vm._v(_vm._s(_vm.price[1].title))
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "vehicle-dimenstions" }, [
      _c("span", [
        _c("b", [_vm._v(_vm._s(_vm.trans("front.create.width")) + ":")]),
        _vm._v(
          "\n      " + _vm._s((_vm.price[1].width / 10).toFixed(2)) + "\n    "
        )
      ]),
      _vm._v(" "),
      _c("span", [
        _c("b", [_vm._v(_vm._s(_vm.trans("front.create.length")) + ":")]),
        _vm._v(
          "\n      " + _vm._s((_vm.price[1].length / 10).toFixed(2)) + "\n    "
        )
      ]),
      _vm._v(" "),
      _c("span", [
        _c("b", [_vm._v(_vm._s(_vm.trans("front.create.height")) + ":")]),
        _vm._v(
          "\n      " + _vm._s((_vm.price[1].height / 10).toFixed(2)) + "\n    "
        )
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-a74f6000", module.exports)
  }
}

/***/ }),

/***/ 660:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(59);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


//

// Check if the request came from the browser and is not server rendered
if (typeof window !== 'undefined') {
  Promise.resolve().then(function () { return slick$1; });
}

var script = {
  props: {
    options: {
      type: Object,
      default: function() {
        return {};
      },
    },
  },

  mounted: function() {
    this.create();
  },

  destroyed: function() {
    __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('unslick');
  },

  methods: {
    create: function() {
      var $slick = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el);

      $slick.on('afterChange', this.onAfterChange);
      $slick.on('beforeChange', this.onBeforeChange);
      $slick.on('breakpoint', this.onBreakpoint);
      $slick.on('destroy', this.onDestroy);
      $slick.on('edge', this.onEdge);
      $slick.on('init', this.onInit);
      $slick.on('reInit', this.onReInit);
      $slick.on('setPosition', this.onSetPosition);
      $slick.on('swipe', this.onSwipe);
      $slick.on('lazyLoaded', this.onLazyLoaded);
      $slick.on('lazyLoadError', this.onLazyLoadError);

      $slick.slick(this.options);
    },

    destroy: function() {
      var $slick = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el);

      $slick.off('afterChange', this.onAfterChange);
      $slick.off('beforeChange', this.onBeforeChange);
      $slick.off('breakpoint', this.onBreakpoint);
      $slick.off('destroy', this.onDestroy);
      $slick.off('edge', this.onEdge);
      $slick.off('init', this.onInit);
      $slick.off('reInit', this.onReInit);
      $slick.off('setPosition', this.onSetPosition);
      $slick.off('swipe', this.onSwipe);
      $slick.off('lazyLoaded', this.onLazyLoaded);
      $slick.off('lazyLoadError', this.onLazyLoadError);
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('unslick');
    },

    reSlick: function() {
      this.destroy();
      this.create();
    },

    next: function() {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickNext');
    },

    prev: function() {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickPrev');
    },

    pause: function() {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickPause');
    },

    play: function() {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickPlay');
    },

    goTo: function(index, dontAnimate) {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickGoTo', index, dontAnimate);
    },

    currentSlide: function() {
      return __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickCurrentSlide');
    },

    add: function(element, index, addBefore) {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickAdd', element, index, addBefore);
    },

    remove: function(index, removeBefore) {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickRemove', index, removeBefore);
    },

    filter: function(filterData) {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickFilter', filterData);
    },

    unfilter: function() {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickUnfilter');
    },

    getOption: function(option) {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickGetOption', option);
    },

    setOption: function(option, value, refresh) {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('slickSetOption', option, value, refresh);
    },

    setPosition: function() {
      __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this.$el).slick('setPosition');
    },

    // Events
    onAfterChange: function(event, slick, currentSlide) {
      this.$emit('afterChange', event, slick, currentSlide);
    },

    onBeforeChange: function(event, slick, currentSlide, nextSlide) {
      this.$emit('beforeChange', event, slick, currentSlide, nextSlide);
    },

    onBreakpoint: function(event, slick, breakpoint) {
      this.$emit('breakpoint', event, slick, breakpoint);
    },

    onDestroy: function(event, slick) {
      this.$emit('destroy', event, slick);
    },

    onEdge: function(event, slick, direction) {
      this.$emit('edge', event, slick, direction);
    },

    onInit: function(event, slick) {
      this.$emit('init', event, slick);
    },

    onReInit: function(event, slick) {
      this.$emit('reInit', event, slick);
    },

    onSetPosition: function(event, slick) {
      this.$emit('setPosition', event, slick);
    },

    onSwipe: function(event, slick, direction) {
      this.$emit('swipe', event, slick, direction);
    },

    onLazyLoaded: function(event, slick, image, imageSource) {
      this.$emit('lazyLoaded', event, slick, image, imageSource);
    },

    onLazyLoadError: function(event, slick, image, imageSource) {
      this.$emit('lazyLoadError', event, slick, image, imageSource);
    },
  },

};

/* script */
            var __vue_script__ = script;
            
/* template */
var __vue_render__ = function() {
  var _vm = this;
  var _h = _vm.$createElement;
  var _c = _vm._self._c || _h;
  return _c("div", [_vm._t("default")], 2)
};
var __vue_staticRenderFns__ = [];
__vue_render__._withStripped = true;

  /* style */
  var __vue_inject_styles__ = undefined;
  /* scoped */
  var __vue_scope_id__ = undefined;
  /* module identifier */
  var __vue_module_identifier__ = undefined;
  /* functional template */
  var __vue_is_functional_template__ = false;
  /* component normalizer */
  function __vue_normalize__(
    template, style, script$$1,
    scope, functional, moduleIdentifier,
    createInjector, createInjectorSSR
  ) {
    var component = (typeof script$$1 === 'function' ? script$$1.options : script$$1) || {};

    // For security concerns, we use only base name in production mode.
    component.__file = "/Users/staskjs/Projects/vue-slick/src/slickCarousel.vue";

    if (!component.render) {
      component.render = template.render;
      component.staticRenderFns = template.staticRenderFns;
      component._compiled = true;

      if (functional) { component.functional = true; }
    }

    component._scopeId = scope;

    return component
  }
  /* style inject */
  
  /* style inject SSR */
  

  
  var slickCarousel = __vue_normalize__(
    { render: __vue_render__, staticRenderFns: __vue_staticRenderFns__ },
    __vue_inject_styles__,
    __vue_script__,
    __vue_scope_id__,
    __vue_is_functional_template__,
    __vue_module_identifier__,
    undefined,
    undefined
  );

function createCommonjsModule(fn, module) {
	return module = { exports: {} }, fn(module, module.exports), module.exports;
}

var slick = createCommonjsModule(function (module, exports) {
(function(factory) {
    {
        module.exports = factory(__WEBPACK_IMPORTED_MODULE_0_jquery___default.a);
    }

}(function($$$1) {
    var Slick = window.Slick || {};

    Slick = (function() {

        var instanceUid = 0;

        function Slick(element, settings) {

            var _ = this, dataSettings;

            _.defaults = {
                accessibility: true,
                adaptiveHeight: false,
                appendArrows: $$$1(element),
                appendDots: $$$1(element),
                arrows: true,
                asNavFor: null,
                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                autoplay: false,
                autoplaySpeed: 3000,
                centerMode: false,
                centerPadding: '50px',
                cssEase: 'ease',
                customPaging: function(slider, i) {
                    return $$$1('<button type="button" />').text(i + 1);
                },
                dots: false,
                dotsClass: 'slick-dots',
                draggable: true,
                easing: 'linear',
                edgeFriction: 0.35,
                fade: false,
                focusOnSelect: false,
                focusOnChange: false,
                infinite: true,
                initialSlide: 0,
                lazyLoad: 'ondemand',
                mobileFirst: false,
                pauseOnHover: true,
                pauseOnFocus: true,
                pauseOnDotsHover: false,
                respondTo: 'window',
                responsive: null,
                rows: 1,
                rtl: false,
                slide: '',
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: true,
                swipeToSlide: false,
                touchMove: true,
                touchThreshold: 5,
                useCSS: true,
                useTransform: true,
                variableWidth: false,
                vertical: false,
                verticalSwiping: false,
                waitForAnimate: true,
                zIndex: 1000
            };

            _.initials = {
                animating: false,
                dragging: false,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                scrolling: false,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: false,
                slideOffset: 0,
                swipeLeft: null,
                swiping: false,
                $list: null,
                touchObject: {},
                transformsEnabled: false,
                unslicked: false
            };

            $$$1.extend(_, _.initials);

            _.activeBreakpoint = null;
            _.animType = null;
            _.animProp = null;
            _.breakpoints = [];
            _.breakpointSettings = [];
            _.cssTransitions = false;
            _.focussed = false;
            _.interrupted = false;
            _.hidden = 'hidden';
            _.paused = true;
            _.positionProp = null;
            _.respondTo = null;
            _.rowCount = 1;
            _.shouldClick = true;
            _.$slider = $$$1(element);
            _.$slidesCache = null;
            _.transformType = null;
            _.transitionType = null;
            _.visibilityChange = 'visibilitychange';
            _.windowWidth = 0;
            _.windowTimer = null;

            dataSettings = $$$1(element).data('slick') || {};

            _.options = $$$1.extend({}, _.defaults, settings, dataSettings);

            _.currentSlide = _.options.initialSlide;

            _.originalSettings = _.options;

            if (typeof document.mozHidden !== 'undefined') {
                _.hidden = 'mozHidden';
                _.visibilityChange = 'mozvisibilitychange';
            } else if (typeof document.webkitHidden !== 'undefined') {
                _.hidden = 'webkitHidden';
                _.visibilityChange = 'webkitvisibilitychange';
            }

            _.autoPlay = $$$1.proxy(_.autoPlay, _);
            _.autoPlayClear = $$$1.proxy(_.autoPlayClear, _);
            _.autoPlayIterator = $$$1.proxy(_.autoPlayIterator, _);
            _.changeSlide = $$$1.proxy(_.changeSlide, _);
            _.clickHandler = $$$1.proxy(_.clickHandler, _);
            _.selectHandler = $$$1.proxy(_.selectHandler, _);
            _.setPosition = $$$1.proxy(_.setPosition, _);
            _.swipeHandler = $$$1.proxy(_.swipeHandler, _);
            _.dragHandler = $$$1.proxy(_.dragHandler, _);
            _.keyHandler = $$$1.proxy(_.keyHandler, _);

            _.instanceUid = instanceUid++;

            // A simple way to check for HTML strings
            // Strict HTML recognition (must start with <)
            // Extracted from jQuery v1.11 source
            _.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/;


            _.registerBreakpoints();
            _.init(true);

        }

        return Slick;

    }());

    Slick.prototype.activateADA = function() {
        var _ = this;

        _.$slideTrack.find('.slick-active').attr({
            'aria-hidden': 'false'
        }).find('a, input, button, select').attr({
            'tabindex': '0'
        });

    };

    Slick.prototype.addSlide = Slick.prototype.slickAdd = function(markup, index, addBefore) {

        var _ = this;

        if (typeof(index) === 'boolean') {
            addBefore = index;
            index = null;
        } else if (index < 0 || (index >= _.slideCount)) {
            return false;
        }

        _.unload();

        if (typeof(index) === 'number') {
            if (index === 0 && _.$slides.length === 0) {
                $$$1(markup).appendTo(_.$slideTrack);
            } else if (addBefore) {
                $$$1(markup).insertBefore(_.$slides.eq(index));
            } else {
                $$$1(markup).insertAfter(_.$slides.eq(index));
            }
        } else {
            if (addBefore === true) {
                $$$1(markup).prependTo(_.$slideTrack);
            } else {
                $$$1(markup).appendTo(_.$slideTrack);
            }
        }

        _.$slides = _.$slideTrack.children(this.options.slide);

        _.$slideTrack.children(this.options.slide).detach();

        _.$slideTrack.append(_.$slides);

        _.$slides.each(function(index, element) {
            $$$1(element).attr('data-slick-index', index);
        });

        _.$slidesCache = _.$slides;

        _.reinit();

    };

    Slick.prototype.animateHeight = function() {
        var _ = this;
        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.animate({
                height: targetHeight
            }, _.options.speed);
        }
    };

    Slick.prototype.animateSlide = function(targetLeft, callback) {

        var animProps = {},
            _ = this;

        _.animateHeight();

        if (_.options.rtl === true && _.options.vertical === false) {
            targetLeft = -targetLeft;
        }
        if (_.transformsEnabled === false) {
            if (_.options.vertical === false) {
                _.$slideTrack.animate({
                    left: targetLeft
                }, _.options.speed, _.options.easing, callback);
            } else {
                _.$slideTrack.animate({
                    top: targetLeft
                }, _.options.speed, _.options.easing, callback);
            }

        } else {

            if (_.cssTransitions === false) {
                if (_.options.rtl === true) {
                    _.currentLeft = -(_.currentLeft);
                }
                $$$1({
                    animStart: _.currentLeft
                }).animate({
                    animStart: targetLeft
                }, {
                    duration: _.options.speed,
                    easing: _.options.easing,
                    step: function(now) {
                        now = Math.ceil(now);
                        if (_.options.vertical === false) {
                            animProps[_.animType] = 'translate(' +
                                now + 'px, 0px)';
                            _.$slideTrack.css(animProps);
                        } else {
                            animProps[_.animType] = 'translate(0px,' +
                                now + 'px)';
                            _.$slideTrack.css(animProps);
                        }
                    },
                    complete: function() {
                        if (callback) {
                            callback.call();
                        }
                    }
                });

            } else {

                _.applyTransition();
                targetLeft = Math.ceil(targetLeft);

                if (_.options.vertical === false) {
                    animProps[_.animType] = 'translate3d(' + targetLeft + 'px, 0px, 0px)';
                } else {
                    animProps[_.animType] = 'translate3d(0px,' + targetLeft + 'px, 0px)';
                }
                _.$slideTrack.css(animProps);

                if (callback) {
                    setTimeout(function() {

                        _.disableTransition();

                        callback.call();
                    }, _.options.speed);
                }

            }

        }

    };

    Slick.prototype.getNavTarget = function() {

        var _ = this,
            asNavFor = _.options.asNavFor;

        if ( asNavFor && asNavFor !== null ) {
            asNavFor = $$$1(asNavFor).not(_.$slider);
        }

        return asNavFor;

    };

    Slick.prototype.asNavFor = function(index) {

        var _ = this,
            asNavFor = _.getNavTarget();

        if ( asNavFor !== null && typeof asNavFor === 'object' ) {
            asNavFor.each(function() {
                var target = $$$1(this).slick('getSlick');
                if(!target.unslicked) {
                    target.slideHandler(index, true);
                }
            });
        }

    };

    Slick.prototype.applyTransition = function(slide) {

        var _ = this,
            transition = {};

        if (_.options.fade === false) {
            transition[_.transitionType] = _.transformType + ' ' + _.options.speed + 'ms ' + _.options.cssEase;
        } else {
            transition[_.transitionType] = 'opacity ' + _.options.speed + 'ms ' + _.options.cssEase;
        }

        if (_.options.fade === false) {
            _.$slideTrack.css(transition);
        } else {
            _.$slides.eq(slide).css(transition);
        }

    };

    Slick.prototype.autoPlay = function() {

        var _ = this;

        _.autoPlayClear();

        if ( _.slideCount > _.options.slidesToShow ) {
            _.autoPlayTimer = setInterval( _.autoPlayIterator, _.options.autoplaySpeed );
        }

    };

    Slick.prototype.autoPlayClear = function() {

        var _ = this;

        if (_.autoPlayTimer) {
            clearInterval(_.autoPlayTimer);
        }

    };

    Slick.prototype.autoPlayIterator = function() {

        var _ = this,
            slideTo = _.currentSlide + _.options.slidesToScroll;

        if ( !_.paused && !_.interrupted && !_.focussed ) {

            if ( _.options.infinite === false ) {

                if ( _.direction === 1 && ( _.currentSlide + 1 ) === ( _.slideCount - 1 )) {
                    _.direction = 0;
                }

                else if ( _.direction === 0 ) {

                    slideTo = _.currentSlide - _.options.slidesToScroll;

                    if ( _.currentSlide - 1 === 0 ) {
                        _.direction = 1;
                    }

                }

            }

            _.slideHandler( slideTo );

        }

    };

    Slick.prototype.buildArrows = function() {

        var _ = this;

        if (_.options.arrows === true ) {

            _.$prevArrow = $$$1(_.options.prevArrow).addClass('slick-arrow');
            _.$nextArrow = $$$1(_.options.nextArrow).addClass('slick-arrow');

            if( _.slideCount > _.options.slidesToShow ) {

                _.$prevArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');
                _.$nextArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');

                if (_.htmlExpr.test(_.options.prevArrow)) {
                    _.$prevArrow.prependTo(_.options.appendArrows);
                }

                if (_.htmlExpr.test(_.options.nextArrow)) {
                    _.$nextArrow.appendTo(_.options.appendArrows);
                }

                if (_.options.infinite !== true) {
                    _.$prevArrow
                        .addClass('slick-disabled')
                        .attr('aria-disabled', 'true');
                }

            } else {

                _.$prevArrow.add( _.$nextArrow )

                    .addClass('slick-hidden')
                    .attr({
                        'aria-disabled': 'true',
                        'tabindex': '-1'
                    });

            }

        }

    };

    Slick.prototype.buildDots = function() {

        var _ = this,
            i, dot;

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$slider.addClass('slick-dotted');

            dot = $$$1('<ul />').addClass(_.options.dotsClass);

            for (i = 0; i <= _.getDotCount(); i += 1) {
                dot.append($$$1('<li />').append(_.options.customPaging.call(this, _, i)));
            }

            _.$dots = dot.appendTo(_.options.appendDots);

            _.$dots.find('li').first().addClass('slick-active');

        }

    };

    Slick.prototype.buildOut = function() {

        var _ = this;

        _.$slides =
            _.$slider
                .children( _.options.slide + ':not(.slick-cloned)')
                .addClass('slick-slide');

        _.slideCount = _.$slides.length;

        _.$slides.each(function(index, element) {
            $$$1(element)
                .attr('data-slick-index', index)
                .data('originalStyling', $$$1(element).attr('style') || '');
        });

        _.$slider.addClass('slick-slider');

        _.$slideTrack = (_.slideCount === 0) ?
            $$$1('<div class="slick-track"/>').appendTo(_.$slider) :
            _.$slides.wrapAll('<div class="slick-track"/>').parent();

        _.$list = _.$slideTrack.wrap(
            '<div class="slick-list"/>').parent();
        _.$slideTrack.css('opacity', 0);

        if (_.options.centerMode === true || _.options.swipeToSlide === true) {
            _.options.slidesToScroll = 1;
        }

        $$$1('img[data-lazy]', _.$slider).not('[src]').addClass('slick-loading');

        _.setupInfinite();

        _.buildArrows();

        _.buildDots();

        _.updateDots();


        _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

        if (_.options.draggable === true) {
            _.$list.addClass('draggable');
        }

    };

    Slick.prototype.buildRows = function() {

        var _ = this, a, b, c, newSlides, numOfSlides, originalSlides,slidesPerSection;

        newSlides = document.createDocumentFragment();
        originalSlides = _.$slider.children();

        if(_.options.rows > 0) {

            slidesPerSection = _.options.slidesPerRow * _.options.rows;
            numOfSlides = Math.ceil(
                originalSlides.length / slidesPerSection
            );

            for(a = 0; a < numOfSlides; a++){
                var slide = document.createElement('div');
                for(b = 0; b < _.options.rows; b++) {
                    var row = document.createElement('div');
                    for(c = 0; c < _.options.slidesPerRow; c++) {
                        var target = (a * slidesPerSection + ((b * _.options.slidesPerRow) + c));
                        if (originalSlides.get(target)) {
                            row.appendChild(originalSlides.get(target));
                        }
                    }
                    slide.appendChild(row);
                }
                newSlides.appendChild(slide);
            }

            _.$slider.empty().append(newSlides);
            _.$slider.children().children().children()
                .css({
                    'width':(100 / _.options.slidesPerRow) + '%',
                    'display': 'inline-block'
                });

        }

    };

    Slick.prototype.checkResponsive = function(initial, forceUpdate) {

        var _ = this,
            breakpoint, targetBreakpoint, respondToWidth, triggerBreakpoint = false;
        var sliderWidth = _.$slider.width();
        var windowWidth = window.innerWidth || $$$1(window).width();

        if (_.respondTo === 'window') {
            respondToWidth = windowWidth;
        } else if (_.respondTo === 'slider') {
            respondToWidth = sliderWidth;
        } else if (_.respondTo === 'min') {
            respondToWidth = Math.min(windowWidth, sliderWidth);
        }

        if ( _.options.responsive &&
            _.options.responsive.length &&
            _.options.responsive !== null) {

            targetBreakpoint = null;

            for (breakpoint in _.breakpoints) {
                if (_.breakpoints.hasOwnProperty(breakpoint)) {
                    if (_.originalSettings.mobileFirst === false) {
                        if (respondToWidth < _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint];
                        }
                    } else {
                        if (respondToWidth > _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint];
                        }
                    }
                }
            }

            if (targetBreakpoint !== null) {
                if (_.activeBreakpoint !== null) {
                    if (targetBreakpoint !== _.activeBreakpoint || forceUpdate) {
                        _.activeBreakpoint =
                            targetBreakpoint;
                        if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
                            _.unslick(targetBreakpoint);
                        } else {
                            _.options = $$$1.extend({}, _.originalSettings,
                                _.breakpointSettings[
                                    targetBreakpoint]);
                            if (initial === true) {
                                _.currentSlide = _.options.initialSlide;
                            }
                            _.refresh(initial);
                        }
                        triggerBreakpoint = targetBreakpoint;
                    }
                } else {
                    _.activeBreakpoint = targetBreakpoint;
                    if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
                        _.unslick(targetBreakpoint);
                    } else {
                        _.options = $$$1.extend({}, _.originalSettings,
                            _.breakpointSettings[
                                targetBreakpoint]);
                        if (initial === true) {
                            _.currentSlide = _.options.initialSlide;
                        }
                        _.refresh(initial);
                    }
                    triggerBreakpoint = targetBreakpoint;
                }
            } else {
                if (_.activeBreakpoint !== null) {
                    _.activeBreakpoint = null;
                    _.options = _.originalSettings;
                    if (initial === true) {
                        _.currentSlide = _.options.initialSlide;
                    }
                    _.refresh(initial);
                    triggerBreakpoint = targetBreakpoint;
                }
            }

            // only trigger breakpoints during an actual break. not on initialize.
            if( !initial && triggerBreakpoint !== false ) {
                _.$slider.trigger('breakpoint', [_, triggerBreakpoint]);
            }
        }

    };

    Slick.prototype.changeSlide = function(event, dontAnimate) {

        var _ = this,
            $target = $$$1(event.currentTarget),
            indexOffset, slideOffset, unevenOffset;

        // If target is a link, prevent default action.
        if($target.is('a')) {
            event.preventDefault();
        }

        // If target is not the <li> element (ie: a child), find the <li>.
        if(!$target.is('li')) {
            $target = $target.closest('li');
        }

        unevenOffset = (_.slideCount % _.options.slidesToScroll !== 0);
        indexOffset = unevenOffset ? 0 : (_.slideCount - _.currentSlide) % _.options.slidesToScroll;

        switch (event.data.message) {

            case 'previous':
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : _.options.slidesToShow - indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide - slideOffset, false, dontAnimate);
                }
                break;

            case 'next':
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide + slideOffset, false, dontAnimate);
                }
                break;

            case 'index':
                var index = event.data.index === 0 ? 0 :
                    event.data.index || $target.index() * _.options.slidesToScroll;

                _.slideHandler(_.checkNavigable(index), false, dontAnimate);
                $target.children().trigger('focus');
                break;

            default:
                return;
        }

    };

    Slick.prototype.checkNavigable = function(index) {

        var _ = this,
            navigables, prevNavigable;

        navigables = _.getNavigableIndexes();
        prevNavigable = 0;
        if (index > navigables[navigables.length - 1]) {
            index = navigables[navigables.length - 1];
        } else {
            for (var n in navigables) {
                if (index < navigables[n]) {
                    index = prevNavigable;
                    break;
                }
                prevNavigable = navigables[n];
            }
        }

        return index;
    };

    Slick.prototype.cleanUpEvents = function() {

        var _ = this;

        if (_.options.dots && _.$dots !== null) {

            $$$1('li', _.$dots)
                .off('click.slick', _.changeSlide)
                .off('mouseenter.slick', $$$1.proxy(_.interrupt, _, true))
                .off('mouseleave.slick', $$$1.proxy(_.interrupt, _, false));

            if (_.options.accessibility === true) {
                _.$dots.off('keydown.slick', _.keyHandler);
            }
        }

        _.$slider.off('focus.slick blur.slick');

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow && _.$prevArrow.off('click.slick', _.changeSlide);
            _.$nextArrow && _.$nextArrow.off('click.slick', _.changeSlide);

            if (_.options.accessibility === true) {
                _.$prevArrow && _.$prevArrow.off('keydown.slick', _.keyHandler);
                _.$nextArrow && _.$nextArrow.off('keydown.slick', _.keyHandler);
            }
        }

        _.$list.off('touchstart.slick mousedown.slick', _.swipeHandler);
        _.$list.off('touchmove.slick mousemove.slick', _.swipeHandler);
        _.$list.off('touchend.slick mouseup.slick', _.swipeHandler);
        _.$list.off('touchcancel.slick mouseleave.slick', _.swipeHandler);

        _.$list.off('click.slick', _.clickHandler);

        $$$1(document).off(_.visibilityChange, _.visibility);

        _.cleanUpSlideEvents();

        if (_.options.accessibility === true) {
            _.$list.off('keydown.slick', _.keyHandler);
        }

        if (_.options.focusOnSelect === true) {
            $$$1(_.$slideTrack).children().off('click.slick', _.selectHandler);
        }

        $$$1(window).off('orientationchange.slick.slick-' + _.instanceUid, _.orientationChange);

        $$$1(window).off('resize.slick.slick-' + _.instanceUid, _.resize);

        $$$1('[draggable!=true]', _.$slideTrack).off('dragstart', _.preventDefault);

        $$$1(window).off('load.slick.slick-' + _.instanceUid, _.setPosition);

    };

    Slick.prototype.cleanUpSlideEvents = function() {

        var _ = this;

        _.$list.off('mouseenter.slick', $$$1.proxy(_.interrupt, _, true));
        _.$list.off('mouseleave.slick', $$$1.proxy(_.interrupt, _, false));

    };

    Slick.prototype.cleanUpRows = function() {

        var _ = this, originalSlides;

        if(_.options.rows > 0) {
            originalSlides = _.$slides.children().children();
            originalSlides.removeAttr('style');
            _.$slider.empty().append(originalSlides);
        }

    };

    Slick.prototype.clickHandler = function(event) {

        var _ = this;

        if (_.shouldClick === false) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }

    };

    Slick.prototype.destroy = function(refresh) {

        var _ = this;

        _.autoPlayClear();

        _.touchObject = {};

        _.cleanUpEvents();

        $$$1('.slick-cloned', _.$slider).detach();

        if (_.$dots) {
            _.$dots.remove();
        }

        if ( _.$prevArrow && _.$prevArrow.length ) {

            _.$prevArrow
                .removeClass('slick-disabled slick-arrow slick-hidden')
                .removeAttr('aria-hidden aria-disabled tabindex')
                .css('display','');

            if ( _.htmlExpr.test( _.options.prevArrow )) {
                _.$prevArrow.remove();
            }
        }

        if ( _.$nextArrow && _.$nextArrow.length ) {

            _.$nextArrow
                .removeClass('slick-disabled slick-arrow slick-hidden')
                .removeAttr('aria-hidden aria-disabled tabindex')
                .css('display','');

            if ( _.htmlExpr.test( _.options.nextArrow )) {
                _.$nextArrow.remove();
            }
        }


        if (_.$slides) {

            _.$slides
                .removeClass('slick-slide slick-active slick-center slick-visible slick-current')
                .removeAttr('aria-hidden')
                .removeAttr('data-slick-index')
                .each(function(){
                    $$$1(this).attr('style', $$$1(this).data('originalStyling'));
                });

            _.$slideTrack.children(this.options.slide).detach();

            _.$slideTrack.detach();

            _.$list.detach();

            _.$slider.append(_.$slides);
        }

        _.cleanUpRows();

        _.$slider.removeClass('slick-slider');
        _.$slider.removeClass('slick-initialized');
        _.$slider.removeClass('slick-dotted');

        _.unslicked = true;

        if(!refresh) {
            _.$slider.trigger('destroy', [_]);
        }

    };

    Slick.prototype.disableTransition = function(slide) {

        var _ = this,
            transition = {};

        transition[_.transitionType] = '';

        if (_.options.fade === false) {
            _.$slideTrack.css(transition);
        } else {
            _.$slides.eq(slide).css(transition);
        }

    };

    Slick.prototype.fadeSlide = function(slideIndex, callback) {

        var _ = this;

        if (_.cssTransitions === false) {

            _.$slides.eq(slideIndex).css({
                zIndex: _.options.zIndex
            });

            _.$slides.eq(slideIndex).animate({
                opacity: 1
            }, _.options.speed, _.options.easing, callback);

        } else {

            _.applyTransition(slideIndex);

            _.$slides.eq(slideIndex).css({
                opacity: 1,
                zIndex: _.options.zIndex
            });

            if (callback) {
                setTimeout(function() {

                    _.disableTransition(slideIndex);

                    callback.call();
                }, _.options.speed);
            }

        }

    };

    Slick.prototype.fadeSlideOut = function(slideIndex) {

        var _ = this;

        if (_.cssTransitions === false) {

            _.$slides.eq(slideIndex).animate({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            }, _.options.speed, _.options.easing);

        } else {

            _.applyTransition(slideIndex);

            _.$slides.eq(slideIndex).css({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            });

        }

    };

    Slick.prototype.filterSlides = Slick.prototype.slickFilter = function(filter) {

        var _ = this;

        if (filter !== null) {

            _.$slidesCache = _.$slides;

            _.unload();

            _.$slideTrack.children(this.options.slide).detach();

            _.$slidesCache.filter(filter).appendTo(_.$slideTrack);

            _.reinit();

        }

    };

    Slick.prototype.focusHandler = function() {

        var _ = this;

        _.$slider
            .off('focus.slick blur.slick')
            .on('focus.slick blur.slick', '*', function(event) {

            event.stopImmediatePropagation();
            var $sf = $$$1(this);

            setTimeout(function() {

                if( _.options.pauseOnFocus ) {
                    _.focussed = $sf.is(':focus');
                    _.autoPlay();
                }

            }, 0);

        });
    };

    Slick.prototype.getCurrent = Slick.prototype.slickCurrentSlide = function() {

        var _ = this;
        return _.currentSlide;

    };

    Slick.prototype.getDotCount = function() {

        var _ = this;

        var breakPoint = 0;
        var counter = 0;
        var pagerQty = 0;

        if (_.options.infinite === true) {
            if (_.slideCount <= _.options.slidesToShow) {
                 ++pagerQty;
            } else {
                while (breakPoint < _.slideCount) {
                    ++pagerQty;
                    breakPoint = counter + _.options.slidesToScroll;
                    counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
                }
            }
        } else if (_.options.centerMode === true) {
            pagerQty = _.slideCount;
        } else if(!_.options.asNavFor) {
            pagerQty = 1 + Math.ceil((_.slideCount - _.options.slidesToShow) / _.options.slidesToScroll);
        }else {
            while (breakPoint < _.slideCount) {
                ++pagerQty;
                breakPoint = counter + _.options.slidesToScroll;
                counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
            }
        }

        return pagerQty - 1;

    };

    Slick.prototype.getLeft = function(slideIndex) {

        var _ = this,
            targetLeft,
            verticalHeight,
            verticalOffset = 0,
            targetSlide,
            coef;

        _.slideOffset = 0;
        verticalHeight = _.$slides.first().outerHeight(true);

        if (_.options.infinite === true) {
            if (_.slideCount > _.options.slidesToShow) {
                _.slideOffset = (_.slideWidth * _.options.slidesToShow) * -1;
                coef = -1;

                if (_.options.vertical === true && _.options.centerMode === true) {
                    if (_.options.slidesToShow === 2) {
                        coef = -1.5;
                    } else if (_.options.slidesToShow === 1) {
                        coef = -2;
                    }
                }
                verticalOffset = (verticalHeight * _.options.slidesToShow) * coef;
            }
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                if (slideIndex + _.options.slidesToScroll > _.slideCount && _.slideCount > _.options.slidesToShow) {
                    if (slideIndex > _.slideCount) {
                        _.slideOffset = ((_.options.slidesToShow - (slideIndex - _.slideCount)) * _.slideWidth) * -1;
                        verticalOffset = ((_.options.slidesToShow - (slideIndex - _.slideCount)) * verticalHeight) * -1;
                    } else {
                        _.slideOffset = ((_.slideCount % _.options.slidesToScroll) * _.slideWidth) * -1;
                        verticalOffset = ((_.slideCount % _.options.slidesToScroll) * verticalHeight) * -1;
                    }
                }
            }
        } else {
            if (slideIndex + _.options.slidesToShow > _.slideCount) {
                _.slideOffset = ((slideIndex + _.options.slidesToShow) - _.slideCount) * _.slideWidth;
                verticalOffset = ((slideIndex + _.options.slidesToShow) - _.slideCount) * verticalHeight;
            }
        }

        if (_.slideCount <= _.options.slidesToShow) {
            _.slideOffset = 0;
            verticalOffset = 0;
        }

        if (_.options.centerMode === true && _.slideCount <= _.options.slidesToShow) {
            _.slideOffset = ((_.slideWidth * Math.floor(_.options.slidesToShow)) / 2) - ((_.slideWidth * _.slideCount) / 2);
        } else if (_.options.centerMode === true && _.options.infinite === true) {
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2) - _.slideWidth;
        } else if (_.options.centerMode === true) {
            _.slideOffset = 0;
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2);
        }

        if (_.options.vertical === false) {
            targetLeft = ((slideIndex * _.slideWidth) * -1) + _.slideOffset;
        } else {
            targetLeft = ((slideIndex * verticalHeight) * -1) + verticalOffset;
        }

        if (_.options.variableWidth === true) {

            if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
            } else {
                targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow);
            }

            if (_.options.rtl === true) {
                if (targetSlide[0]) {
                    targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
                } else {
                    targetLeft =  0;
                }
            } else {
                targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
            }

            if (_.options.centerMode === true) {
                if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                    targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
                } else {
                    targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow + 1);
                }

                if (_.options.rtl === true) {
                    if (targetSlide[0]) {
                        targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
                    } else {
                        targetLeft =  0;
                    }
                } else {
                    targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
                }

                targetLeft += (_.$list.width() - targetSlide.outerWidth()) / 2;
            }
        }

        return targetLeft;

    };

    Slick.prototype.getOption = Slick.prototype.slickGetOption = function(option) {

        var _ = this;

        return _.options[option];

    };

    Slick.prototype.getNavigableIndexes = function() {

        var _ = this,
            breakPoint = 0,
            counter = 0,
            indexes = [],
            max;

        if (_.options.infinite === false) {
            max = _.slideCount;
        } else {
            breakPoint = _.options.slidesToScroll * -1;
            counter = _.options.slidesToScroll * -1;
            max = _.slideCount * 2;
        }

        while (breakPoint < max) {
            indexes.push(breakPoint);
            breakPoint = counter + _.options.slidesToScroll;
            counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
        }

        return indexes;

    };

    Slick.prototype.getSlick = function() {

        return this;

    };

    Slick.prototype.getSlideCount = function() {

        var _ = this,
            slidesTraversed, swipedSlide, centerOffset;

        centerOffset = _.options.centerMode === true ? _.slideWidth * Math.floor(_.options.slidesToShow / 2) : 0;

        if (_.options.swipeToSlide === true) {
            _.$slideTrack.find('.slick-slide').each(function(index, slide) {
                if (slide.offsetLeft - centerOffset + ($$$1(slide).outerWidth() / 2) > (_.swipeLeft * -1)) {
                    swipedSlide = slide;
                    return false;
                }
            });

            slidesTraversed = Math.abs($$$1(swipedSlide).attr('data-slick-index') - _.currentSlide) || 1;

            return slidesTraversed;

        } else {
            return _.options.slidesToScroll;
        }

    };

    Slick.prototype.goTo = Slick.prototype.slickGoTo = function(slide, dontAnimate) {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'index',
                index: parseInt(slide)
            }
        }, dontAnimate);

    };

    Slick.prototype.init = function(creation) {

        var _ = this;

        if (!$$$1(_.$slider).hasClass('slick-initialized')) {

            $$$1(_.$slider).addClass('slick-initialized');

            _.buildRows();
            _.buildOut();
            _.setProps();
            _.startLoad();
            _.loadSlider();
            _.initializeEvents();
            _.updateArrows();
            _.updateDots();
            _.checkResponsive(true);
            _.focusHandler();

        }

        if (creation) {
            _.$slider.trigger('init', [_]);
        }

        if (_.options.accessibility === true) {
            _.initADA();
        }

        if ( _.options.autoplay ) {

            _.paused = false;
            _.autoPlay();

        }

    };

    Slick.prototype.initADA = function() {
        var _ = this,
                numDotGroups = Math.ceil(_.slideCount / _.options.slidesToShow),
                tabControlIndexes = _.getNavigableIndexes().filter(function(val) {
                    return (val >= 0) && (val < _.slideCount);
                });

        _.$slides.add(_.$slideTrack.find('.slick-cloned')).attr({
            'aria-hidden': 'true',
            'tabindex': '-1'
        }).find('a, input, button, select').attr({
            'tabindex': '-1'
        });

        if (_.$dots !== null) {
            _.$slides.not(_.$slideTrack.find('.slick-cloned')).each(function(i) {
                var slideControlIndex = tabControlIndexes.indexOf(i);

                $$$1(this).attr({
                    'role': 'tabpanel',
                    'id': 'slick-slide' + _.instanceUid + i,
                    'tabindex': -1
                });

                if (slideControlIndex !== -1) {
                   var ariaButtonControl = 'slick-slide-control' + _.instanceUid + slideControlIndex;
                   if ($$$1('#' + ariaButtonControl).length) {
                     $$$1(this).attr({
                         'aria-describedby': ariaButtonControl
                     });
                   }
                }
            });

            _.$dots.attr('role', 'tablist').find('li').each(function(i) {
                var mappedSlideIndex = tabControlIndexes[i];

                $$$1(this).attr({
                    'role': 'presentation'
                });

                $$$1(this).find('button').first().attr({
                    'role': 'tab',
                    'id': 'slick-slide-control' + _.instanceUid + i,
                    'aria-controls': 'slick-slide' + _.instanceUid + mappedSlideIndex,
                    'aria-label': (i + 1) + ' of ' + numDotGroups,
                    'aria-selected': null,
                    'tabindex': '-1'
                });

            }).eq(_.currentSlide).find('button').attr({
                'aria-selected': 'true',
                'tabindex': '0'
            }).end();
        }

        for (var i=_.currentSlide, max=i+_.options.slidesToShow; i < max; i++) {
          if (_.options.focusOnChange) {
            _.$slides.eq(i).attr({'tabindex': '0'});
          } else {
            _.$slides.eq(i).removeAttr('tabindex');
          }
        }

        _.activateADA();

    };

    Slick.prototype.initArrowEvents = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow
               .off('click.slick')
               .on('click.slick', {
                    message: 'previous'
               }, _.changeSlide);
            _.$nextArrow
               .off('click.slick')
               .on('click.slick', {
                    message: 'next'
               }, _.changeSlide);

            if (_.options.accessibility === true) {
                _.$prevArrow.on('keydown.slick', _.keyHandler);
                _.$nextArrow.on('keydown.slick', _.keyHandler);
            }
        }

    };

    Slick.prototype.initDotEvents = function() {

        var _ = this;

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
            $$$1('li', _.$dots).on('click.slick', {
                message: 'index'
            }, _.changeSlide);

            if (_.options.accessibility === true) {
                _.$dots.on('keydown.slick', _.keyHandler);
            }
        }

        if (_.options.dots === true && _.options.pauseOnDotsHover === true && _.slideCount > _.options.slidesToShow) {

            $$$1('li', _.$dots)
                .on('mouseenter.slick', $$$1.proxy(_.interrupt, _, true))
                .on('mouseleave.slick', $$$1.proxy(_.interrupt, _, false));

        }

    };

    Slick.prototype.initSlideEvents = function() {

        var _ = this;

        if ( _.options.pauseOnHover ) {

            _.$list.on('mouseenter.slick', $$$1.proxy(_.interrupt, _, true));
            _.$list.on('mouseleave.slick', $$$1.proxy(_.interrupt, _, false));

        }

    };

    Slick.prototype.initializeEvents = function() {

        var _ = this;

        _.initArrowEvents();

        _.initDotEvents();
        _.initSlideEvents();

        _.$list.on('touchstart.slick mousedown.slick', {
            action: 'start'
        }, _.swipeHandler);
        _.$list.on('touchmove.slick mousemove.slick', {
            action: 'move'
        }, _.swipeHandler);
        _.$list.on('touchend.slick mouseup.slick', {
            action: 'end'
        }, _.swipeHandler);
        _.$list.on('touchcancel.slick mouseleave.slick', {
            action: 'end'
        }, _.swipeHandler);

        _.$list.on('click.slick', _.clickHandler);

        $$$1(document).on(_.visibilityChange, $$$1.proxy(_.visibility, _));

        if (_.options.accessibility === true) {
            _.$list.on('keydown.slick', _.keyHandler);
        }

        if (_.options.focusOnSelect === true) {
            $$$1(_.$slideTrack).children().on('click.slick', _.selectHandler);
        }

        $$$1(window).on('orientationchange.slick.slick-' + _.instanceUid, $$$1.proxy(_.orientationChange, _));

        $$$1(window).on('resize.slick.slick-' + _.instanceUid, $$$1.proxy(_.resize, _));

        $$$1('[draggable!=true]', _.$slideTrack).on('dragstart', _.preventDefault);

        $$$1(window).on('load.slick.slick-' + _.instanceUid, _.setPosition);
        $$$1(_.setPosition);

    };

    Slick.prototype.initUI = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {

            _.$prevArrow.show();
            _.$nextArrow.show();

        }

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$dots.show();

        }

    };

    Slick.prototype.keyHandler = function(event) {

        var _ = this;
         //Dont slide if the cursor is inside the form fields and arrow keys are pressed
        if(!event.target.tagName.match('TEXTAREA|INPUT|SELECT')) {
            if (event.keyCode === 37 && _.options.accessibility === true) {
                _.changeSlide({
                    data: {
                        message: _.options.rtl === true ? 'next' :  'previous'
                    }
                });
            } else if (event.keyCode === 39 && _.options.accessibility === true) {
                _.changeSlide({
                    data: {
                        message: _.options.rtl === true ? 'previous' : 'next'
                    }
                });
            }
        }

    };

    Slick.prototype.lazyLoad = function() {

        var _ = this,
            loadRange, cloneRange, rangeStart, rangeEnd;

        function loadImages(imagesScope) {

            $$$1('img[data-lazy]', imagesScope).each(function() {

                var image = $$$1(this),
                    imageSource = $$$1(this).attr('data-lazy'),
                    imageSrcSet = $$$1(this).attr('data-srcset'),
                    imageSizes  = $$$1(this).attr('data-sizes') || _.$slider.attr('data-sizes'),
                    imageToLoad = document.createElement('img');

                imageToLoad.onload = function() {

                    image
                        .animate({ opacity: 0 }, 100, function() {

                            if (imageSrcSet) {
                                image
                                    .attr('srcset', imageSrcSet );

                                if (imageSizes) {
                                    image
                                        .attr('sizes', imageSizes );
                                }
                            }

                            image
                                .attr('src', imageSource)
                                .animate({ opacity: 1 }, 200, function() {
                                    image
                                        .removeAttr('data-lazy data-srcset data-sizes')
                                        .removeClass('slick-loading');
                                });
                            _.$slider.trigger('lazyLoaded', [_, image, imageSource]);
                        });

                };

                imageToLoad.onerror = function() {

                    image
                        .removeAttr( 'data-lazy' )
                        .removeClass( 'slick-loading' )
                        .addClass( 'slick-lazyload-error' );

                    _.$slider.trigger('lazyLoadError', [ _, image, imageSource ]);

                };

                imageToLoad.src = imageSource;

            });

        }

        if (_.options.centerMode === true) {
            if (_.options.infinite === true) {
                rangeStart = _.currentSlide + (_.options.slidesToShow / 2 + 1);
                rangeEnd = rangeStart + _.options.slidesToShow + 2;
            } else {
                rangeStart = Math.max(0, _.currentSlide - (_.options.slidesToShow / 2 + 1));
                rangeEnd = 2 + (_.options.slidesToShow / 2 + 1) + _.currentSlide;
            }
        } else {
            rangeStart = _.options.infinite ? _.options.slidesToShow + _.currentSlide : _.currentSlide;
            rangeEnd = Math.ceil(rangeStart + _.options.slidesToShow);
            if (_.options.fade === true) {
                if (rangeStart > 0) { rangeStart--; }
                if (rangeEnd <= _.slideCount) { rangeEnd++; }
            }
        }

        loadRange = _.$slider.find('.slick-slide').slice(rangeStart, rangeEnd);

        if (_.options.lazyLoad === 'anticipated') {
            var prevSlide = rangeStart - 1,
                nextSlide = rangeEnd,
                $slides = _.$slider.find('.slick-slide');

            for (var i = 0; i < _.options.slidesToScroll; i++) {
                if (prevSlide < 0) { prevSlide = _.slideCount - 1; }
                loadRange = loadRange.add($slides.eq(prevSlide));
                loadRange = loadRange.add($slides.eq(nextSlide));
                prevSlide--;
                nextSlide++;
            }
        }

        loadImages(loadRange);

        if (_.slideCount <= _.options.slidesToShow) {
            cloneRange = _.$slider.find('.slick-slide');
            loadImages(cloneRange);
        } else
        if (_.currentSlide >= _.slideCount - _.options.slidesToShow) {
            cloneRange = _.$slider.find('.slick-cloned').slice(0, _.options.slidesToShow);
            loadImages(cloneRange);
        } else if (_.currentSlide === 0) {
            cloneRange = _.$slider.find('.slick-cloned').slice(_.options.slidesToShow * -1);
            loadImages(cloneRange);
        }

    };

    Slick.prototype.loadSlider = function() {

        var _ = this;

        _.setPosition();

        _.$slideTrack.css({
            opacity: 1
        });

        _.$slider.removeClass('slick-loading');

        _.initUI();

        if (_.options.lazyLoad === 'progressive') {
            _.progressiveLazyLoad();
        }

    };

    Slick.prototype.next = Slick.prototype.slickNext = function() {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'next'
            }
        });

    };

    Slick.prototype.orientationChange = function() {

        var _ = this;

        _.checkResponsive();
        _.setPosition();

    };

    Slick.prototype.pause = Slick.prototype.slickPause = function() {

        var _ = this;

        _.autoPlayClear();
        _.paused = true;

    };

    Slick.prototype.play = Slick.prototype.slickPlay = function() {

        var _ = this;

        _.autoPlay();
        _.options.autoplay = true;
        _.paused = false;
        _.focussed = false;
        _.interrupted = false;

    };

    Slick.prototype.postSlide = function(index) {

        var _ = this;

        if( !_.unslicked ) {

            _.$slider.trigger('afterChange', [_, index]);

            _.animating = false;

            if (_.slideCount > _.options.slidesToShow) {
                _.setPosition();
            }

            _.swipeLeft = null;

            if ( _.options.autoplay ) {
                _.autoPlay();
            }

            if (_.options.accessibility === true) {
                _.initADA();

                if (_.options.focusOnChange) {
                    var $currentSlide = $$$1(_.$slides.get(_.currentSlide));
                    $currentSlide.attr('tabindex', 0).focus();
                }
            }

        }

    };

    Slick.prototype.prev = Slick.prototype.slickPrev = function() {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'previous'
            }
        });

    };

    Slick.prototype.preventDefault = function(event) {

        event.preventDefault();

    };

    Slick.prototype.progressiveLazyLoad = function( tryCount ) {

        tryCount = tryCount || 1;

        var _ = this,
            $imgsToLoad = $$$1( 'img[data-lazy]', _.$slider ),
            image,
            imageSource,
            imageSrcSet,
            imageSizes,
            imageToLoad;

        if ( $imgsToLoad.length ) {

            image = $imgsToLoad.first();
            imageSource = image.attr('data-lazy');
            imageSrcSet = image.attr('data-srcset');
            imageSizes  = image.attr('data-sizes') || _.$slider.attr('data-sizes');
            imageToLoad = document.createElement('img');

            imageToLoad.onload = function() {

                if (imageSrcSet) {
                    image
                        .attr('srcset', imageSrcSet );

                    if (imageSizes) {
                        image
                            .attr('sizes', imageSizes );
                    }
                }

                image
                    .attr( 'src', imageSource )
                    .removeAttr('data-lazy data-srcset data-sizes')
                    .removeClass('slick-loading');

                if ( _.options.adaptiveHeight === true ) {
                    _.setPosition();
                }

                _.$slider.trigger('lazyLoaded', [ _, image, imageSource ]);
                _.progressiveLazyLoad();

            };

            imageToLoad.onerror = function() {

                if ( tryCount < 3 ) {

                    /**
                     * try to load the image 3 times,
                     * leave a slight delay so we don't get
                     * servers blocking the request.
                     */
                    setTimeout( function() {
                        _.progressiveLazyLoad( tryCount + 1 );
                    }, 500 );

                } else {

                    image
                        .removeAttr( 'data-lazy' )
                        .removeClass( 'slick-loading' )
                        .addClass( 'slick-lazyload-error' );

                    _.$slider.trigger('lazyLoadError', [ _, image, imageSource ]);

                    _.progressiveLazyLoad();

                }

            };

            imageToLoad.src = imageSource;

        } else {

            _.$slider.trigger('allImagesLoaded', [ _ ]);

        }

    };

    Slick.prototype.refresh = function( initializing ) {

        var _ = this, currentSlide, lastVisibleIndex;

        lastVisibleIndex = _.slideCount - _.options.slidesToShow;

        // in non-infinite sliders, we don't want to go past the
        // last visible index.
        if( !_.options.infinite && ( _.currentSlide > lastVisibleIndex )) {
            _.currentSlide = lastVisibleIndex;
        }

        // if less slides than to show, go to start.
        if ( _.slideCount <= _.options.slidesToShow ) {
            _.currentSlide = 0;

        }

        currentSlide = _.currentSlide;

        _.destroy(true);

        $$$1.extend(_, _.initials, { currentSlide: currentSlide });

        _.init();

        if( !initializing ) {

            _.changeSlide({
                data: {
                    message: 'index',
                    index: currentSlide
                }
            }, false);

        }

    };

    Slick.prototype.registerBreakpoints = function() {

        var _ = this, breakpoint, currentBreakpoint, l,
            responsiveSettings = _.options.responsive || null;

        if ( $$$1.type(responsiveSettings) === 'array' && responsiveSettings.length ) {

            _.respondTo = _.options.respondTo || 'window';

            for ( breakpoint in responsiveSettings ) {

                l = _.breakpoints.length-1;

                if (responsiveSettings.hasOwnProperty(breakpoint)) {
                    currentBreakpoint = responsiveSettings[breakpoint].breakpoint;

                    // loop through the breakpoints and cut out any existing
                    // ones with the same breakpoint number, we don't want dupes.
                    while( l >= 0 ) {
                        if( _.breakpoints[l] && _.breakpoints[l] === currentBreakpoint ) {
                            _.breakpoints.splice(l,1);
                        }
                        l--;
                    }

                    _.breakpoints.push(currentBreakpoint);
                    _.breakpointSettings[currentBreakpoint] = responsiveSettings[breakpoint].settings;

                }

            }

            _.breakpoints.sort(function(a, b) {
                return ( _.options.mobileFirst ) ? a-b : b-a;
            });

        }

    };

    Slick.prototype.reinit = function() {

        var _ = this;

        _.$slides =
            _.$slideTrack
                .children(_.options.slide)
                .addClass('slick-slide');

        _.slideCount = _.$slides.length;

        if (_.currentSlide >= _.slideCount && _.currentSlide !== 0) {
            _.currentSlide = _.currentSlide - _.options.slidesToScroll;
        }

        if (_.slideCount <= _.options.slidesToShow) {
            _.currentSlide = 0;
        }

        _.registerBreakpoints();

        _.setProps();
        _.setupInfinite();
        _.buildArrows();
        _.updateArrows();
        _.initArrowEvents();
        _.buildDots();
        _.updateDots();
        _.initDotEvents();
        _.cleanUpSlideEvents();
        _.initSlideEvents();

        _.checkResponsive(false, true);

        if (_.options.focusOnSelect === true) {
            $$$1(_.$slideTrack).children().on('click.slick', _.selectHandler);
        }

        _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

        _.setPosition();
        _.focusHandler();

        _.paused = !_.options.autoplay;
        _.autoPlay();

        _.$slider.trigger('reInit', [_]);

    };

    Slick.prototype.resize = function() {

        var _ = this;

        if ($$$1(window).width() !== _.windowWidth) {
            clearTimeout(_.windowDelay);
            _.windowDelay = window.setTimeout(function() {
                _.windowWidth = $$$1(window).width();
                _.checkResponsive();
                if( !_.unslicked ) { _.setPosition(); }
            }, 50);
        }
    };

    Slick.prototype.removeSlide = Slick.prototype.slickRemove = function(index, removeBefore, removeAll) {

        var _ = this;

        if (typeof(index) === 'boolean') {
            removeBefore = index;
            index = removeBefore === true ? 0 : _.slideCount - 1;
        } else {
            index = removeBefore === true ? --index : index;
        }

        if (_.slideCount < 1 || index < 0 || index > _.slideCount - 1) {
            return false;
        }

        _.unload();

        if (removeAll === true) {
            _.$slideTrack.children().remove();
        } else {
            _.$slideTrack.children(this.options.slide).eq(index).remove();
        }

        _.$slides = _.$slideTrack.children(this.options.slide);

        _.$slideTrack.children(this.options.slide).detach();

        _.$slideTrack.append(_.$slides);

        _.$slidesCache = _.$slides;

        _.reinit();

    };

    Slick.prototype.setCSS = function(position) {

        var _ = this,
            positionProps = {},
            x, y;

        if (_.options.rtl === true) {
            position = -position;
        }
        x = _.positionProp == 'left' ? Math.ceil(position) + 'px' : '0px';
        y = _.positionProp == 'top' ? Math.ceil(position) + 'px' : '0px';

        positionProps[_.positionProp] = position;

        if (_.transformsEnabled === false) {
            _.$slideTrack.css(positionProps);
        } else {
            positionProps = {};
            if (_.cssTransitions === false) {
                positionProps[_.animType] = 'translate(' + x + ', ' + y + ')';
                _.$slideTrack.css(positionProps);
            } else {
                positionProps[_.animType] = 'translate3d(' + x + ', ' + y + ', 0px)';
                _.$slideTrack.css(positionProps);
            }
        }

    };

    Slick.prototype.setDimensions = function() {

        var _ = this;

        if (_.options.vertical === false) {
            if (_.options.centerMode === true) {
                _.$list.css({
                    padding: ('0px ' + _.options.centerPadding)
                });
            }
        } else {
            _.$list.height(_.$slides.first().outerHeight(true) * _.options.slidesToShow);
            if (_.options.centerMode === true) {
                _.$list.css({
                    padding: (_.options.centerPadding + ' 0px')
                });
            }
        }

        _.listWidth = _.$list.width();
        _.listHeight = _.$list.height();


        if (_.options.vertical === false && _.options.variableWidth === false) {
            _.slideWidth = Math.ceil(_.listWidth / _.options.slidesToShow);
            _.$slideTrack.width(Math.ceil((_.slideWidth * _.$slideTrack.children('.slick-slide').length)));

        } else if (_.options.variableWidth === true) {
            _.$slideTrack.width(5000 * _.slideCount);
        } else {
            _.slideWidth = Math.ceil(_.listWidth);
            _.$slideTrack.height(Math.ceil((_.$slides.first().outerHeight(true) * _.$slideTrack.children('.slick-slide').length)));
        }

        var offset = _.$slides.first().outerWidth(true) - _.$slides.first().width();
        if (_.options.variableWidth === false) { _.$slideTrack.children('.slick-slide').width(_.slideWidth - offset); }

    };

    Slick.prototype.setFade = function() {

        var _ = this,
            targetLeft;

        _.$slides.each(function(index, element) {
            targetLeft = (_.slideWidth * index) * -1;
            if (_.options.rtl === true) {
                $$$1(element).css({
                    position: 'relative',
                    right: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                });
            } else {
                $$$1(element).css({
                    position: 'relative',
                    left: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                });
            }
        });

        _.$slides.eq(_.currentSlide).css({
            zIndex: _.options.zIndex - 1,
            opacity: 1
        });

    };

    Slick.prototype.setHeight = function() {

        var _ = this;

        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.css('height', targetHeight);
        }

    };

    Slick.prototype.setOption =
    Slick.prototype.slickSetOption = function() {

        /**
         * accepts arguments in format of:
         *
         *  - for changing a single option's value:
         *     .slick("setOption", option, value, refresh )
         *
         *  - for changing a set of responsive options:
         *     .slick("setOption", 'responsive', [{}, ...], refresh )
         *
         *  - for updating multiple values at once (not responsive)
         *     .slick("setOption", { 'option': value, ... }, refresh )
         */

        var _ = this, l, item, option, value, refresh = false, type;

        if( $$$1.type( arguments[0] ) === 'object' ) {

            option =  arguments[0];
            refresh = arguments[1];
            type = 'multiple';

        } else if ( $$$1.type( arguments[0] ) === 'string' ) {

            option =  arguments[0];
            value = arguments[1];
            refresh = arguments[2];

            if ( arguments[0] === 'responsive' && $$$1.type( arguments[1] ) === 'array' ) {

                type = 'responsive';

            } else if ( typeof arguments[1] !== 'undefined' ) {

                type = 'single';

            }

        }

        if ( type === 'single' ) {

            _.options[option] = value;


        } else if ( type === 'multiple' ) {

            $$$1.each( option , function( opt, val ) {

                _.options[opt] = val;

            });


        } else if ( type === 'responsive' ) {

            for ( item in value ) {

                if( $$$1.type( _.options.responsive ) !== 'array' ) {

                    _.options.responsive = [ value[item] ];

                } else {

                    l = _.options.responsive.length-1;

                    // loop through the responsive object and splice out duplicates.
                    while( l >= 0 ) {

                        if( _.options.responsive[l].breakpoint === value[item].breakpoint ) {

                            _.options.responsive.splice(l,1);

                        }

                        l--;

                    }

                    _.options.responsive.push( value[item] );

                }

            }

        }

        if ( refresh ) {

            _.unload();
            _.reinit();

        }

    };

    Slick.prototype.setPosition = function() {

        var _ = this;

        _.setDimensions();

        _.setHeight();

        if (_.options.fade === false) {
            _.setCSS(_.getLeft(_.currentSlide));
        } else {
            _.setFade();
        }

        _.$slider.trigger('setPosition', [_]);

    };

    Slick.prototype.setProps = function() {

        var _ = this,
            bodyStyle = document.body.style;

        _.positionProp = _.options.vertical === true ? 'top' : 'left';

        if (_.positionProp === 'top') {
            _.$slider.addClass('slick-vertical');
        } else {
            _.$slider.removeClass('slick-vertical');
        }

        if (bodyStyle.WebkitTransition !== undefined ||
            bodyStyle.MozTransition !== undefined ||
            bodyStyle.msTransition !== undefined) {
            if (_.options.useCSS === true) {
                _.cssTransitions = true;
            }
        }

        if ( _.options.fade ) {
            if ( typeof _.options.zIndex === 'number' ) {
                if( _.options.zIndex < 3 ) {
                    _.options.zIndex = 3;
                }
            } else {
                _.options.zIndex = _.defaults.zIndex;
            }
        }

        if (bodyStyle.OTransform !== undefined) {
            _.animType = 'OTransform';
            _.transformType = '-o-transform';
            _.transitionType = 'OTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) { _.animType = false; }
        }
        if (bodyStyle.MozTransform !== undefined) {
            _.animType = 'MozTransform';
            _.transformType = '-moz-transform';
            _.transitionType = 'MozTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.MozPerspective === undefined) { _.animType = false; }
        }
        if (bodyStyle.webkitTransform !== undefined) {
            _.animType = 'webkitTransform';
            _.transformType = '-webkit-transform';
            _.transitionType = 'webkitTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) { _.animType = false; }
        }
        if (bodyStyle.msTransform !== undefined) {
            _.animType = 'msTransform';
            _.transformType = '-ms-transform';
            _.transitionType = 'msTransition';
            if (bodyStyle.msTransform === undefined) { _.animType = false; }
        }
        if (bodyStyle.transform !== undefined && _.animType !== false) {
            _.animType = 'transform';
            _.transformType = 'transform';
            _.transitionType = 'transition';
        }
        _.transformsEnabled = _.options.useTransform && (_.animType !== null && _.animType !== false);
    };


    Slick.prototype.setSlideClasses = function(index) {

        var _ = this,
            centerOffset, allSlides, indexOffset, remainder;

        allSlides = _.$slider
            .find('.slick-slide')
            .removeClass('slick-active slick-center slick-current')
            .attr('aria-hidden', 'true');

        _.$slides
            .eq(index)
            .addClass('slick-current');

        if (_.options.centerMode === true) {

            var evenCoef = _.options.slidesToShow % 2 === 0 ? 1 : 0;

            centerOffset = Math.floor(_.options.slidesToShow / 2);

            if (_.options.infinite === true) {

                if (index >= centerOffset && index <= (_.slideCount - 1) - centerOffset) {
                    _.$slides
                        .slice(index - centerOffset + evenCoef, index + centerOffset + 1)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                } else {

                    indexOffset = _.options.slidesToShow + index;
                    allSlides
                        .slice(indexOffset - centerOffset + 1 + evenCoef, indexOffset + centerOffset + 2)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                }

                if (index === 0) {

                    allSlides
                        .eq(allSlides.length - 1 - _.options.slidesToShow)
                        .addClass('slick-center');

                } else if (index === _.slideCount - 1) {

                    allSlides
                        .eq(_.options.slidesToShow)
                        .addClass('slick-center');

                }

            }

            _.$slides
                .eq(index)
                .addClass('slick-center');

        } else {

            if (index >= 0 && index <= (_.slideCount - _.options.slidesToShow)) {

                _.$slides
                    .slice(index, index + _.options.slidesToShow)
                    .addClass('slick-active')
                    .attr('aria-hidden', 'false');

            } else if (allSlides.length <= _.options.slidesToShow) {

                allSlides
                    .addClass('slick-active')
                    .attr('aria-hidden', 'false');

            } else {

                remainder = _.slideCount % _.options.slidesToShow;
                indexOffset = _.options.infinite === true ? _.options.slidesToShow + index : index;

                if (_.options.slidesToShow == _.options.slidesToScroll && (_.slideCount - index) < _.options.slidesToShow) {

                    allSlides
                        .slice(indexOffset - (_.options.slidesToShow - remainder), indexOffset + remainder)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                } else {

                    allSlides
                        .slice(indexOffset, indexOffset + _.options.slidesToShow)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                }

            }

        }

        if (_.options.lazyLoad === 'ondemand' || _.options.lazyLoad === 'anticipated') {
            _.lazyLoad();
        }
    };

    Slick.prototype.setupInfinite = function() {

        var _ = this,
            i, slideIndex, infiniteCount;

        if (_.options.fade === true) {
            _.options.centerMode = false;
        }

        if (_.options.infinite === true && _.options.fade === false) {

            slideIndex = null;

            if (_.slideCount > _.options.slidesToShow) {

                if (_.options.centerMode === true) {
                    infiniteCount = _.options.slidesToShow + 1;
                } else {
                    infiniteCount = _.options.slidesToShow;
                }

                for (i = _.slideCount; i > (_.slideCount -
                        infiniteCount); i -= 1) {
                    slideIndex = i - 1;
                    $$$1(_.$slides[slideIndex]).clone(true).attr('id', '')
                        .attr('data-slick-index', slideIndex - _.slideCount)
                        .prependTo(_.$slideTrack).addClass('slick-cloned');
                }
                for (i = 0; i < infiniteCount  + _.slideCount; i += 1) {
                    slideIndex = i;
                    $$$1(_.$slides[slideIndex]).clone(true).attr('id', '')
                        .attr('data-slick-index', slideIndex + _.slideCount)
                        .appendTo(_.$slideTrack).addClass('slick-cloned');
                }
                _.$slideTrack.find('.slick-cloned').find('[id]').each(function() {
                    $$$1(this).attr('id', '');
                });

            }

        }

    };

    Slick.prototype.interrupt = function( toggle ) {

        var _ = this;

        if( !toggle ) {
            _.autoPlay();
        }
        _.interrupted = toggle;

    };

    Slick.prototype.selectHandler = function(event) {

        var _ = this;

        var targetElement =
            $$$1(event.target).is('.slick-slide') ?
                $$$1(event.target) :
                $$$1(event.target).parents('.slick-slide');

        var index = parseInt(targetElement.attr('data-slick-index'));

        if (!index) { index = 0; }

        if (_.slideCount <= _.options.slidesToShow) {

            _.slideHandler(index, false, true);
            return;

        }

        _.slideHandler(index);

    };

    Slick.prototype.slideHandler = function(index, sync, dontAnimate) {

        var targetSlide, animSlide, oldSlide, slideLeft, targetLeft = null,
            _ = this, navTarget;

        sync = sync || false;

        if (_.animating === true && _.options.waitForAnimate === true) {
            return;
        }

        if (_.options.fade === true && _.currentSlide === index) {
            return;
        }

        if (sync === false) {
            _.asNavFor(index);
        }

        targetSlide = index;
        targetLeft = _.getLeft(targetSlide);
        slideLeft = _.getLeft(_.currentSlide);

        _.currentLeft = _.swipeLeft === null ? slideLeft : _.swipeLeft;

        if (_.options.infinite === false && _.options.centerMode === false && (index < 0 || index > _.getDotCount() * _.options.slidesToScroll)) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
                    _.animateSlide(slideLeft, function() {
                        _.postSlide(targetSlide);
                    });
                } else {
                    _.postSlide(targetSlide);
                }
            }
            return;
        } else if (_.options.infinite === false && _.options.centerMode === true && (index < 0 || index > (_.slideCount - _.options.slidesToScroll))) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
                    _.animateSlide(slideLeft, function() {
                        _.postSlide(targetSlide);
                    });
                } else {
                    _.postSlide(targetSlide);
                }
            }
            return;
        }

        if ( _.options.autoplay ) {
            clearInterval(_.autoPlayTimer);
        }

        if (targetSlide < 0) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = _.slideCount - (_.slideCount % _.options.slidesToScroll);
            } else {
                animSlide = _.slideCount + targetSlide;
            }
        } else if (targetSlide >= _.slideCount) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = 0;
            } else {
                animSlide = targetSlide - _.slideCount;
            }
        } else {
            animSlide = targetSlide;
        }

        _.animating = true;

        _.$slider.trigger('beforeChange', [_, _.currentSlide, animSlide]);

        oldSlide = _.currentSlide;
        _.currentSlide = animSlide;

        _.setSlideClasses(_.currentSlide);

        if ( _.options.asNavFor ) {

            navTarget = _.getNavTarget();
            navTarget = navTarget.slick('getSlick');

            if ( navTarget.slideCount <= navTarget.options.slidesToShow ) {
                navTarget.setSlideClasses(_.currentSlide);
            }

        }

        _.updateDots();
        _.updateArrows();

        if (_.options.fade === true) {
            if (dontAnimate !== true) {

                _.fadeSlideOut(oldSlide);

                _.fadeSlide(animSlide, function() {
                    _.postSlide(animSlide);
                });

            } else {
                _.postSlide(animSlide);
            }
            _.animateHeight();
            return;
        }

        if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
            _.animateSlide(targetLeft, function() {
                _.postSlide(animSlide);
            });
        } else {
            _.postSlide(animSlide);
        }

    };

    Slick.prototype.startLoad = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {

            _.$prevArrow.hide();
            _.$nextArrow.hide();

        }

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$dots.hide();

        }

        _.$slider.addClass('slick-loading');

    };

    Slick.prototype.swipeDirection = function() {

        var xDist, yDist, r, swipeAngle, _ = this;

        xDist = _.touchObject.startX - _.touchObject.curX;
        yDist = _.touchObject.startY - _.touchObject.curY;
        r = Math.atan2(yDist, xDist);

        swipeAngle = Math.round(r * 180 / Math.PI);
        if (swipeAngle < 0) {
            swipeAngle = 360 - Math.abs(swipeAngle);
        }

        if ((swipeAngle <= 45) && (swipeAngle >= 0)) {
            return (_.options.rtl === false ? 'left' : 'right');
        }
        if ((swipeAngle <= 360) && (swipeAngle >= 315)) {
            return (_.options.rtl === false ? 'left' : 'right');
        }
        if ((swipeAngle >= 135) && (swipeAngle <= 225)) {
            return (_.options.rtl === false ? 'right' : 'left');
        }
        if (_.options.verticalSwiping === true) {
            if ((swipeAngle >= 35) && (swipeAngle <= 135)) {
                return 'down';
            } else {
                return 'up';
            }
        }

        return 'vertical';

    };

    Slick.prototype.swipeEnd = function(event) {

        var _ = this,
            slideCount,
            direction;

        _.dragging = false;
        _.swiping = false;

        if (_.scrolling) {
            _.scrolling = false;
            return false;
        }

        _.interrupted = false;
        _.shouldClick = ( _.touchObject.swipeLength > 10 ) ? false : true;

        if ( _.touchObject.curX === undefined ) {
            return false;
        }

        if ( _.touchObject.edgeHit === true ) {
            _.$slider.trigger('edge', [_, _.swipeDirection() ]);
        }

        if ( _.touchObject.swipeLength >= _.touchObject.minSwipe ) {

            direction = _.swipeDirection();

            switch ( direction ) {

                case 'left':
                case 'down':

                    slideCount =
                        _.options.swipeToSlide ?
                            _.checkNavigable( _.currentSlide + _.getSlideCount() ) :
                            _.currentSlide + _.getSlideCount();

                    _.currentDirection = 0;

                    break;

                case 'right':
                case 'up':

                    slideCount =
                        _.options.swipeToSlide ?
                            _.checkNavigable( _.currentSlide - _.getSlideCount() ) :
                            _.currentSlide - _.getSlideCount();

                    _.currentDirection = 1;

                    break;

                default:


            }

            if( direction != 'vertical' ) {

                _.slideHandler( slideCount );
                _.touchObject = {};
                _.$slider.trigger('swipe', [_, direction ]);

            }

        } else {

            if ( _.touchObject.startX !== _.touchObject.curX ) {

                _.slideHandler( _.currentSlide );
                _.touchObject = {};

            }

        }

    };

    Slick.prototype.swipeHandler = function(event) {

        var _ = this;

        if ((_.options.swipe === false) || ('ontouchend' in document && _.options.swipe === false)) {
            return;
        } else if (_.options.draggable === false && event.type.indexOf('mouse') !== -1) {
            return;
        }

        _.touchObject.fingerCount = event.originalEvent && event.originalEvent.touches !== undefined ?
            event.originalEvent.touches.length : 1;

        _.touchObject.minSwipe = _.listWidth / _.options
            .touchThreshold;

        if (_.options.verticalSwiping === true) {
            _.touchObject.minSwipe = _.listHeight / _.options
                .touchThreshold;
        }

        switch (event.data.action) {

            case 'start':
                _.swipeStart(event);
                break;

            case 'move':
                _.swipeMove(event);
                break;

            case 'end':
                _.swipeEnd(event);
                break;

        }

    };

    Slick.prototype.swipeMove = function(event) {

        var _ = this,
            curLeft, swipeDirection, swipeLength, positionOffset, touches, verticalSwipeLength;

        touches = event.originalEvent !== undefined ? event.originalEvent.touches : null;

        if (!_.dragging || _.scrolling || touches && touches.length !== 1) {
            return false;
        }

        curLeft = _.getLeft(_.currentSlide);

        _.touchObject.curX = touches !== undefined ? touches[0].pageX : event.clientX;
        _.touchObject.curY = touches !== undefined ? touches[0].pageY : event.clientY;

        _.touchObject.swipeLength = Math.round(Math.sqrt(
            Math.pow(_.touchObject.curX - _.touchObject.startX, 2)));

        verticalSwipeLength = Math.round(Math.sqrt(
            Math.pow(_.touchObject.curY - _.touchObject.startY, 2)));

        if (!_.options.verticalSwiping && !_.swiping && verticalSwipeLength > 4) {
            _.scrolling = true;
            return false;
        }

        if (_.options.verticalSwiping === true) {
            _.touchObject.swipeLength = verticalSwipeLength;
        }

        swipeDirection = _.swipeDirection();

        if (event.originalEvent !== undefined && _.touchObject.swipeLength > 4) {
            _.swiping = true;
            event.preventDefault();
        }

        positionOffset = (_.options.rtl === false ? 1 : -1) * (_.touchObject.curX > _.touchObject.startX ? 1 : -1);
        if (_.options.verticalSwiping === true) {
            positionOffset = _.touchObject.curY > _.touchObject.startY ? 1 : -1;
        }


        swipeLength = _.touchObject.swipeLength;

        _.touchObject.edgeHit = false;

        if (_.options.infinite === false) {
            if ((_.currentSlide === 0 && swipeDirection === 'right') || (_.currentSlide >= _.getDotCount() && swipeDirection === 'left')) {
                swipeLength = _.touchObject.swipeLength * _.options.edgeFriction;
                _.touchObject.edgeHit = true;
            }
        }

        if (_.options.vertical === false) {
            _.swipeLeft = curLeft + swipeLength * positionOffset;
        } else {
            _.swipeLeft = curLeft + (swipeLength * (_.$list.height() / _.listWidth)) * positionOffset;
        }
        if (_.options.verticalSwiping === true) {
            _.swipeLeft = curLeft + swipeLength * positionOffset;
        }

        if (_.options.fade === true || _.options.touchMove === false) {
            return false;
        }

        if (_.animating === true) {
            _.swipeLeft = null;
            return false;
        }

        _.setCSS(_.swipeLeft);

    };

    Slick.prototype.swipeStart = function(event) {

        var _ = this,
            touches;

        _.interrupted = true;

        if (_.touchObject.fingerCount !== 1 || _.slideCount <= _.options.slidesToShow) {
            _.touchObject = {};
            return false;
        }

        if (event.originalEvent !== undefined && event.originalEvent.touches !== undefined) {
            touches = event.originalEvent.touches[0];
        }

        _.touchObject.startX = _.touchObject.curX = touches !== undefined ? touches.pageX : event.clientX;
        _.touchObject.startY = _.touchObject.curY = touches !== undefined ? touches.pageY : event.clientY;

        _.dragging = true;

    };

    Slick.prototype.unfilterSlides = Slick.prototype.slickUnfilter = function() {

        var _ = this;

        if (_.$slidesCache !== null) {

            _.unload();

            _.$slideTrack.children(this.options.slide).detach();

            _.$slidesCache.appendTo(_.$slideTrack);

            _.reinit();

        }

    };

    Slick.prototype.unload = function() {

        var _ = this;

        $$$1('.slick-cloned', _.$slider).remove();

        if (_.$dots) {
            _.$dots.remove();
        }

        if (_.$prevArrow && _.htmlExpr.test(_.options.prevArrow)) {
            _.$prevArrow.remove();
        }

        if (_.$nextArrow && _.htmlExpr.test(_.options.nextArrow)) {
            _.$nextArrow.remove();
        }

        _.$slides
            .removeClass('slick-slide slick-active slick-visible slick-current')
            .attr('aria-hidden', 'true')
            .css('width', '');

    };

    Slick.prototype.unslick = function(fromBreakpoint) {

        var _ = this;
        _.$slider.trigger('unslick', [_, fromBreakpoint]);
        _.destroy();

    };

    Slick.prototype.updateArrows = function() {

        var _ = this,
            centerOffset;

        centerOffset = Math.floor(_.options.slidesToShow / 2);

        if ( _.options.arrows === true &&
            _.slideCount > _.options.slidesToShow &&
            !_.options.infinite ) {

            _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
            _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            if (_.currentSlide === 0) {

                _.$prevArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            } else if (_.currentSlide >= _.slideCount - _.options.slidesToShow && _.options.centerMode === false) {

                _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            } else if (_.currentSlide >= _.slideCount - 1 && _.options.centerMode === true) {

                _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            }

        }

    };

    Slick.prototype.updateDots = function() {

        var _ = this;

        if (_.$dots !== null) {

            _.$dots
                .find('li')
                    .removeClass('slick-active')
                    .end();

            _.$dots
                .find('li')
                .eq(Math.floor(_.currentSlide / _.options.slidesToScroll))
                .addClass('slick-active');

        }

    };

    Slick.prototype.visibility = function() {

        var _ = this;

        if ( _.options.autoplay ) {

            if ( document[_.hidden] ) {

                _.interrupted = true;

            } else {

                _.interrupted = false;

            }

        }

    };

    $$$1.fn.slick = function() {
        var _ = this,
            opt = arguments[0],
            args = Array.prototype.slice.call(arguments, 1),
            l = _.length,
            i,
            ret;
        for (i = 0; i < l; i++) {
            if (typeof opt == 'object' || typeof opt == 'undefined')
                { _[i].slick = new Slick(_[i], opt); }
            else
                { ret = _[i].slick[opt].apply(_[i].slick, args); }
            if (typeof ret != 'undefined') { return ret; }
        }
        return _;
    };

}));
});

var slick$1 = /*#__PURE__*/Object.freeze({
  default: slick,
  __moduleExports: slick
});

/* harmony default export */ __webpack_exports__["a"] = (slickCarousel);


/***/ }),

/***/ 661:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony default export */ __webpack_exports__["a"] = ([{
    "props": {
        "name": 'numberOfStops',
        "placeholder": trans('front.bystop.numberOfStops'),
        "tooltiptitle": trans('front.bystop.numberOfStopsDesc'),
        "id": 'TournumberOfStops',
        "validate": 'required|numeric|min_value:2',
        "numeric": true
    },
    "model": "numberOfStops"
}, {
    "props": {
        "name": 'totalweight',
        "id": trans('front.bystop.totalweight'),
        "placeholder": trans('front.bystop.totalweight'),
        "tooltiptitle": trans('front.bystop.totalweight'),
        "validate": 'required|decimal:2|min_value:1',
        "numeric": true
    },
    "model": 'totalWeight'
}, {
    "props": {
        "name": 'timePerStop',
        "placeholder": trans('front.bystop.timePerStop'),
        "tooltiptitle": trans('front.bystop.timePerStopDesc'),
        "id": 'tour_average_stop_time',
        "validate": 'required|numeric|min_value:1',
        "numeric": true
    },
    "model": "timePerStop"
}, {
    "props": {
        "name": 'numberofloadedpacket',
        "id": 'tour_total_packets_number',
        "placeholder": trans('front.bystop.numberofloadedpackets'),
        "tooltiptitle": trans('front.bystop.numberofloadedpackets'),
        "validate": 'required|numeric|min_value:1',
        "numeric": true
    },
    "model": 'numberOfPackets'
}, {
    "props": {
        "name": 'totalTimeOfStops',
        "placeholder": trans('front.bystop.totalTimeOfStops'),
        "tooltiptitle": trans('front.bystop.totalTimeOfStopsDesc'),
        "id": trans('front.bystop.totalTimeOfStops'),
        "validate": 'required|decimal|min_value:5',
        "numeric": true
    },
    "if": true,
    "model": "totalTimeOfStops"
}, {
    "props": {
        "name": 'totalDistanceStops',
        "placeholder": trans('front.bystop.totalDistanceStops'),
        "tooltiptitle": trans('front.bystop.totalDistanceStopsDesc'),
        "id": trans('front.bystop.totalDistanceStops'),
        "validate": 'required|decimal|min_value:1',
        "numeric": true
    },
    "if": true,
    "model": "totalDistanceStops"
}]);

/***/ }),

/***/ 662:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(663)
/* template */
var __vue_template__ = __webpack_require__(664)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/main/byStop/tourPricing.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-52053f7f", Component.options)
  } else {
    hotAPI.reload("data-v-52053f7f", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 663:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      carouselChanging: false
    };
  },

  computed: {
    startIndex: function startIndex() {
      var _this = this;

      if (this.ship !== 0) {
        var isAvailable = this.orderVehicles[0].filter(function (vehicle) {
          return vehicle.id === _this.ship;
        });
        if (isAvailable.length !== 0) {
          this.tour.ship_id = this.ship;
          return this.orderVehicles[0].indexOf(isAvailable[0]);
        }
      }

      return 0;
    },
    orderVehicles: function orderVehicles() {
      var _this2 = this;

      var distance = this.stopsGeneral.totalDistanceStops;
      var avalilableShips = this.shippings.filter(function (shipping) {
        return Number(shipping.pay_load_max) >= Number(_this2.stopsGeneral.totalWeight);
      });
      var availableShippingTypes = this.distances.filter(function (distance_type) {
        return distance >= distance_type.min && distance <= distance_type.max;
      });
      var availableShippingType = availableShippingTypes[0];
      avalilableShips = avalilableShips.filter(function (shipping) {
        var shippingHasThisCost = shipping.costs.filter(function (cost) {
          return cost.distance_id === availableShippingType.id;
        });
        return shippingHasThisCost.length >= 1;
      });
      if (avalilableShips.length < 1) {
        //Todo : show user error :)
        if (!this.snotified) {
          this.snotified = this.$snotify.warning(trans("front.create.noVehilcles"), trans("front.create.noVehilclesHead"), {
            timeout: 0,
            pauseOnHover: true
          });
        }
        this.tour.ship_id = 0;
        return [];
      } else {
        if (this.snotified) {
          this.$snotify.remove(this.snotified.id);
          this.snotified = null;
        }
      }

      this.tour.ship_id = avalilableShips[0].id;

      return [avalilableShips, availableShippingType.id];
    }
  },
  props: {
    shippings: {
      required: true,
      type: Array
    },
    distances: {
      required: true,
      type: Array
    },
    tour: {
      required: true
    },
    stopsGeneral: {
      required: true
    },
    stops: {
      required: true
    },
    ship: {
      required: false,
      default: 0
    },
    loadTime: {
      required: false,
      default: "loadTime"
    }
  },
  watch: {
    orderVehicles: function orderVehicles(newval, oldval) {
      var _this3 = this;

      this.carouselChanging = true;
      this.$nextTick(function () {
        _this3.carouselChanging = false;
      });
    }
  },
  methods: {
    changeTourPrice: function changeTourPrice(newprice, orderVehicle) {
      if (this.tour.ship_id === orderVehicle) {
        this.tour.price = newprice;
      }
    },
    slideChange: function slideChange(e) {
      var _this4 = this;

      if (this.orderVehicles[0][e]) {
        this.tour.ship_id = this.orderVehicles[0][e].id;
        this.$nextTick(function () {
          _this4.$emit("myveichleChanged", _this4.tour.ship_id);
        });
      }
    },
    vehicleChanged: function vehicleChanged(e) {
      this.tour.ship_id = e;
    },
    getLoadTime: function getLoadTime(min_load_time) {
      var _this5 = this;

      if (this.$parent.allowStops === true) {
        var stopsTimes = this.stops.map(function (stop) {
          return stop[_this5.loadTime];
        });
        var summision = stopsTimes.reduce(function (total, stopTime) {
          return total + stopTime;
        }, 0);

        return summision - min_load_time;
      } else {
        return this.stopsGeneral.timePerStop * this.stopsGeneral.numberOfStops - min_load_time;
      }
    },
    price: function price(orderVehicles) {
      var orderDistance = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

      var distance = Number(this.stopsGeneral.totalDistanceStops);
      var mins = Number(this.stopsGeneral.totalTimeOfStops);
      var orderVehicle = orderVehicles[0];
      var typeid = orderVehicles[1];
      if (!orderVehicles[0] || !orderVehicles[0].length) {
        //Todo : alert user there is no match car

        return [];
      }
      var loadTime = this.getLoadTime(orderVehicle.specs.min_load_time);
      var cost_per_unit = loadTime * orderVehicle.specs.cost_per_unit;
      var orderCost = orderVehicle.costs.filter(function (cost) {
        return cost.distance_id === typeid;
      });
      orderCost = orderCost[0];
      if (orderCost.cost_per_kilo * distance < orderCost.min_cost) {
        var newprice = (orderCost.min_cost + cost_per_unit).toFixed(2);
      } else {
        var newprice = (orderCost.cost_per_kilo * distance + cost_per_unit).toFixed(2);
      }
      this.changeTourPrice(newprice, orderVehicle.id);
      return [newprice, orderVehicle];
    },
    animateCarsouel: function animateCarsouel() {
      var _this6 = this;

      if (!this.$refs.vehicleCarsouel) {
        return false;
      } else {
        window.ahmedcars = this.$refs.vehicleCarsouel;
        this.$refs.vehicleCarsouel.goNext();

        if (this.$refs.vehicleCarsouel.currentIndex === 0) {
          return false;
        }
        setTimeout(function () {
          _this6.animateCarsouel();
        }, 200);
      }
    }
  },
  components: {
    "vehicle-show": __webpack_require__(655)
  },
  created: function created() {},
  mounted: function mounted() {
    if (this.ship === 0) {
      this.animateCarsouel();
    }
  }
});

/***/ }),

/***/ 664:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.orderVehicles[0] &&
    _vm.orderVehicles[0].length !== 0 &&
    !_vm.carouselChanging
    ? _c(
        "carousel-3d",
        {
          ref: "vehicleCarsouel",
          attrs: {
            startIndex: _vm.startIndex,
            perspective: 180,
            display: 1,
            "controls-visible": true,
            height: 200,
            width: 260
          },
          on: { "before-slide-change": _vm.slideChange }
        },
        _vm._l(_vm.orderVehicles[0], function(vehicle, i) {
          return _c(
            "slide",
            { key: "vehicleslide" + i, attrs: { index: i } },
            [
              _c("vehicle-show", {
                attrs: {
                  ship_id: _vm.tour.ship_id,
                  price: _vm.price([vehicle, _vm.orderVehicles[1]])
                },
                on: { changeVehicle: _vm.vehicleChanged }
              })
            ],
            1
          )
        }),
        1
      )
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-52053f7f", module.exports)
  }
}

/***/ }),

/***/ 743:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      tour: {
        type: "dynamic",
        mainType: "stops",
        days: [0],

        tourStartTime: window.moment(new Date().setHours(8, 0, 0, 0)),
        tourStartDate: window.moment(new Date().setMinutes(0)).add("2", "hours"),
        ship_id: 0,
        price: 0
      },
      stops: [],
      stopsGeneral: {
        numberOfPackets: 1,
        totalTimeOfStops: 60,
        timePerStop: 3,
        totalDistanceStops: 6,
        numberOfStops: 2,
        totalWeight: 0
      }
    };
  },

  computed: {},
  props: {},
  watch: {},
  methods: {},
  components: {
    "slider-slick-tour": __webpack_require__(744),
    "tour-type-select": __webpack_require__(752),
    "by-stop": __webpack_require__(755),
    "tour-map": __webpack_require__(763)
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 744:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(745)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(747)
/* template */
var __vue_template__ = __webpack_require__(751)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/main/SliderSlickTour.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-ddd86a50", Component.options)
  } else {
    hotAPI.reload("data-v-ddd86a50", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 745:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(746);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("3a395eec", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-ddd86a50\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./SliderSlickTour.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-ddd86a50\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./SliderSlickTour.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 746:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 747:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue_slick__ = __webpack_require__(660);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      slickOptions: {
        arrows: true,
        autoplay: true,
        dots: true
      }
    };
  },

  computed: {
    inputs: function inputs() {
      return [{
        props: {
          name: "TourStart",
          placeholder: trans("front.buissness.tourstartDate"),
          validate: "required",
          id: "tourStart",
          type: "timePicker",
          minDate: window.moment(new Date().setMinutes(0)).add("2", "hours"),
          dateOnly: true,
          newclasses: {
            "tour-date-2": true
          }
        }
      }, {
        props: {
          name: "TourStart",
          placeholder: trans("front.buissness.tourStartTime"),
          validate: "required",
          id: "tourStartTime",
          type: "timePicker",
          minDate: window.moment(new Date().setHours(0, 0, 0, 0)),
          timeOnly: true,
          newclasses: {
            "tour-date-1": true
          }
        }
      }];
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  methods: {},
  created: function created() {},
  mounted: function mounted() {
    this.$nextTick(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  },

  components: {
    "week-days-input": __webpack_require__(748),
    Slick: __WEBPACK_IMPORTED_MODULE_0_vue_slick__["a" /* default */]
  }
});

/***/ }),

/***/ 748:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(749)
/* template */
var __vue_template__ = __webpack_require__(750)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/main/weekDaysInput.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-19c86728", Component.options)
  } else {
    hotAPI.reload("data-v-19c86728", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 749:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      content: this.value
    };
  },

  computed: {
    days: function days() {
      var weekDaysNames = moment.weekdays(true);
      var weekDaysShort = moment.weekdaysMin(true);
      var days = weekDaysNames.map(function (day, index) {
        return {
          dayName: day,
          shortCut: weekDaysShort[index]
        };
      });
      return days;
    }
  },
  props: {
    value: {
      required: true,
      type: Array
    }
  },
  watch: {
    value: function value(newval) {
      if (this.content !== newval) {
        this.content = newval;
      }
    }
  },
  methods: {
    handleInput: function handleInput() {
      this.$emit("input", this.content);
    },
    activateDay: function activateDay(date, index) {
      if (this.content.indexOf(index) !== -1) {
        this.content = this.content.filter(function (day) {
          return day !== index;
        });
        this.content.sort();
      } else {
        this.content.push(index);
        this.content.sort();
      }

      this.handleInput();
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {
    this.$nextTick(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  }
});

/***/ }),

/***/ 750:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "side-tour-row" }, [
    _c(
      "div",
      {
        staticClass: "side-tour-span",
        attrs: {
          "data-toggle": "tooltip",
          title: _vm.trans("front.buissness.tourDays")
        }
      },
      [_vm._v(_vm._s(_vm.trans("front.buissness.tourDays")))]
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "week-days" },
      _vm._l(_vm.days, function(day, index) {
        return index !== 6 && index !== 5
          ? _c(
              "div",
              {
                key: "day" + index,
                class: { day: true, active: _vm.content.indexOf(index) !== -1 },
                attrs: { "data-toggle": "tooltip", title: day.dayName },
                on: {
                  click: function($event) {
                    return _vm.activateDay(day, index)
                  }
                }
              },
              [_vm._v(_vm._s(day.shortCut))]
            )
          : _vm._e()
      }),
      0
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "week-days" },
      _vm._l(_vm.days, function(day, index) {
        return index === 6 || index === 5
          ? _c(
              "div",
              {
                key: "day" + index,
                class: { day: true, active: _vm.content.indexOf(index) !== -1 },
                attrs: { "data-toggle": "tooltip", title: day.dayName },
                on: {
                  click: function($event) {
                    return _vm.activateDay(day, index)
                  }
                }
              },
              [_vm._v(_vm._s(day.shortCut))]
            )
          : _vm._e()
      }),
      0
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-19c86728", module.exports)
  }
}

/***/ }),

/***/ 751:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "slick-tour-wrapper" }, [
    _c(
      "div",
      { staticClass: "slick-tour-side" },
      [
        _c(
          "div",
          { staticClass: "side-tour-row" },
          [
            _c(
              "input-parent",
              _vm._b(
                {
                  model: {
                    value: _vm.tour.tourstartDate,
                    callback: function($$v) {
                      _vm.$set(_vm.tour, "tourstartDate", $$v)
                    },
                    expression: "tour.tourstartDate"
                  }
                },
                "input-parent",
                _vm.inputs[0].props,
                false
              )
            ),
            _vm._v(" "),
            _c(
              "input-parent",
              _vm._b(
                {
                  model: {
                    value: _vm.tour.tourStartTime,
                    callback: function($$v) {
                      _vm.$set(_vm.tour, "tourStartTime", $$v)
                    },
                    expression: "tour.tourStartTime"
                  }
                },
                "input-parent",
                _vm.inputs[1].props,
                false
              )
            )
          ],
          1
        ),
        _vm._v(" "),
        _c("week-days-input", {
          model: {
            value: _vm.tour.days,
            callback: function($$v) {
              _vm.$set(_vm.tour, "days", $$v)
            },
            expression: "tour.days"
          }
        })
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "tour-slick" },
      [
        _c(
          "slick",
          {
            ref: "slick",
            staticClass: "text-slider",
            attrs: { options: _vm.slickOptions }
          },
          [
            _c("img", {
              attrs: { src: "/images/stops/stop.png", alt: "stopsimage" }
            }),
            _vm._v(" "),
            _c("img", {
              attrs: { src: "/images/stops/slick2.png", alt: "stopsimage" }
            })
          ]
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-ddd86a50", module.exports)
  }
}

/***/ }),

/***/ 752:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(753)
/* template */
var __vue_template__ = __webpack_require__(754)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/main/tourTypeSelect.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-380d49d6", Component.options)
  } else {
    hotAPI.reload("data-v-380d49d6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 753:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      currentHeight: 0,
      tourtypes: [{
        type: "stops"
      }, {
        type: "time",
        otherTypes: [{
          type: "minutes"
        }, {
          type: "hours"
        }]
      }, {
        type: "dates",
        otherTypes: [{
          type: "days"
        }, {
          type: "week"
        }, {
          type: "month"
        }]
      }, {
        type: "packets"
      }]
    };
  },

  computed: {},
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    changeTourType: function changeTourType(type) {
      if (type.type === 'packets') {
        this.$router.push('/geschaeftskundenportal/package');
        return false;
      }
      this.tour.mainType = type.type;
      this.tour.type = type.otherTypes ? type.otherTypes[0].type : type.type;
    },
    hasOtherRow: function hasOtherRow(tourtype) {
      var _this = this;

      var myvalue = tourtype.type === this.tour.mainType && tourtype.otherTypes && tourtype.otherTypes.length !== 0;
      this.$nextTick(function () {
        if (myvalue && _this.$refs.tourtypeOther && _this.$refs.tourtypeOther[0]) {
          tourtype.currentHeight = _this.$refs.tourtypeOther[0].clientHeight;
          $("#tourtype" + tourtype.type).css("margin-bottom", tourtype.currentHeight + 10);
        } else {
          tourtype.currentHeight = 0;
          $("#tourtype" + tourtype.type).css("margin-bottom", 10);
        }
      });
      return myvalue;
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 754:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "tour-type-row" },
    _vm._l(_vm.tourtypes, function(tourtype) {
      return _c(
        "div",
        {
          key: tourtype.type + "tourtype",
          class: {
            tourtype: true,
            active: _vm.tour.mainType === tourtype.type,
            "with-other-type": _vm.hasOtherRow(tourtype)
          },
          attrs: { id: "tourtype" + tourtype.type }
        },
        [
          _c(
            "span",
            {
              on: {
                click: function($event) {
                  return _vm.changeTourType(tourtype)
                }
              }
            },
            [
              _vm._v(
                _vm._s(_vm.trans("front.buissness.tourtype" + tourtype.type))
              )
            ]
          ),
          _vm._v(" "),
          _vm.hasOtherRow(tourtype)
            ? _c(
                "div",
                {
                  key: tourtype.type + "tourtypeOther",
                  ref: "tourtypeOther",
                  refInFor: true,
                  staticClass: "tour-type-child",
                  attrs: { id: "tourOther" + tourtype.type }
                },
                _vm._l(tourtype.otherTypes, function(othertype) {
                  return _c(
                    "div",
                    {
                      key: "otherTypes" + othertype.type,
                      class: {
                        tourtype: true,
                        active: _vm.tour.type === othertype.type
                      }
                    },
                    [
                      _c(
                        "span",
                        {
                          on: {
                            click: function($event) {
                              _vm.tour.type = othertype.type
                            }
                          }
                        },
                        [
                          _vm._v(
                            _vm._s(
                              _vm.trans(
                                "front.buissness.tourtype" + othertype.type
                              )
                            )
                          )
                        ]
                      )
                    ]
                  )
                }),
                0
              )
            : _vm._e()
        ]
      )
    }),
    0
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-380d49d6", module.exports)
  }
}

/***/ }),

/***/ 755:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(756)
/* template */
var __vue_template__ = __webpack_require__(762)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/main/byStop.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6abcc780", Component.options)
  } else {
    hotAPI.reload("data-v-6abcc780", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 756:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__byStop_inputs_js__ = __webpack_require__(661);
var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      inputs: __WEBPACK_IMPORTED_MODULE_0__byStop_inputs_js__["a" /* default */],
      shippings: [],

      allowStops: true
    };
  },

  computed: {
    checkedAndErrors: function checkedAndErrors() {
      if (!this.shippings || this.shippings.length === 0) {
        return false;
      }
      if (this.errors.has("totalweight") || !this.stopsGeneral.totalWeight) {
        return false;
      }
      return true;
    },
    formData: function formData() {
      var _this = this;

      // window.ahmed = this.tour.tourStartTime;
      if (_typeof(this.tour.tourStartTime) === "object") {
        this.tour.tourStartTime = this.tour.tourStartTime.format("hh:mm");
      }
      var toBeSendOrder = {
        tour: this.tour,
        stops: this.allowStops ? this.stops : [this.stops[0]],
        stopsGeneral: this.stopsGeneral,
        allowStops: this.allowStops
      };

      return {
        url: "/api/tours/create/tour",
        data: toBeSendOrder,
        validate: this.$validator,
        successServer: function successServer(data) {
          _this.$router.push("/geschaeftskundenportal/tour/laststep/" + data.body.encrypted);
        },
        failedValidate: function failedValidate(data) {}
      };
    }
  },
  props: {
    tour: {
      required: true
    },
    stops: { required: true },
    stopsGeneral: { required: true }
  },
  watch: {
    "stopsGeneral.numberOfStops": function stopsGeneralNumberOfStops(newval, oldval) {
      var _this2 = this;

      if (newval < 2) {
        this.$nextTick(function () {
          _this2.showDeleteWarning();
          _this2.stopsGeneral.numberOfStops = 2;
        });
        return false;
      } else {
        this.makeStopsGeneral();
      }
    }
  },
  methods: {
    makeStopsGeneral: function makeStopsGeneral() {
      if (this.stopsGeneral.numberOfStops > this.stops.length) {
        while (this.stops.length < this.stopsGeneral.numberOfStops) {
          this.addNewStop(this.generateNewStop());
        }
      } else {
        this.stops.length = this.stopsGeneral.numberOfStops;
      }
    },
    removeStop: function removeStop() {
      var _this3 = this;

      var index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

      this.stops.splice(index, 1);
      this.stops;
      this.$nextTick(function () {
        _this3.stopsGeneral.numberOfStops = _this3.stops.length;
      });
    },
    showDeleteWarning: function showDeleteWarning() {
      this.$snotify.warning(this.trans("front.bystop.deleteError"), this.trans("front.bystop.deleteErrorHead"));
    },
    deleteStop: function deleteStop(index) {
      if (this.stops.length <= 2) {
        this.showDeleteWarning();
      } else {
        this.removeStop(index);
      }
    },
    addNewStop: function addNewStop(newStop, updateStopsNumber) {
      newStop.stopName = this.trans("front.bystop.stop") + " " + String(this.stops.length + 1);
      this.stops.push(newStop);
      if (updateStopsNumber === true) {
        this.stopsGeneral.numberOfStops = this.stops.length;
      }
    },
    generateNewStop: function generateNewStop() {
      var packageCreatedHere = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      var time = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";

      return {
        location: {
          address: {},
          geometry: {}
        },
        touched: false,
        startTime: window.moment(new Date().setHours(0, 0, 0, 0)),
        loadTime: 3,
        packageType: 0,
        numberOfPackets: 1,
        stopName: "",
        shown: false,
        allowPackages: false
      };
    },
    saveTour: function saveTour() {
      if (this.tour.days.length === 0) {
        this.$snotify.warning(trans("front.bystop.dayserror"), trans("front.bystop.dayserrorHead"));
        return false;
      }
      if (this.allowStops) {
        var notcompletedStops = this.stops.filter(function (stop) {
          stop.touched = true;
          return !stop.location.address || !stop.location.address.home;
        });
      } else {
        var notcompletedStops = this.stops[0].location.address.length === 0 ? [this.stops[0]] : [];
      }
      if (notcompletedStops.length !== 0) {
        this.$validator.validateAll();
        return false;
      }
      this.$vss.post(this.formData);
    }
  },
  components: {
    "stop-row": __webpack_require__(757),
    "tour-car": __webpack_require__(662)
  },
  created: function created() {
    var _this4 = this;

    this.$http.get("/api/shipping/getAll").then(function (response) {
      _this4.shippings = response.body[0];
      _this4.distances = response.body[1];
    });
  },
  mounted: function mounted() {
    this.makeStopsGeneral();

    // this.$nextTick(() => {
    //   $(".fieldset").each(function() {
    //     var legendWidth =
    //       $(this)
    //         .children(".legend")
    //         .width() +
    //         20 >
    //       100
    //         ? $(this)
    //             .children(".legend")
    //             .width() + 20
    //         : 100;
    //     $(this).css("min-height", legendWidth);
    //   });
    // });
  }
});

/***/ }),

/***/ 757:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(758)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(760)
/* template */
var __vue_template__ = __webpack_require__(761)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/main/stopRow.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-436475c1", Component.options)
  } else {
    hotAPI.reload("data-v-436475c1", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 758:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(759);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("9e217406", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-436475c1\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./stopRow.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-436475c1\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./stopRow.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 759:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 760:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {};
  },

  computed: {
    inputs: function inputs() {
      var index = this.index;
      return [{
        props: {
          name: "stop" + trans("front.buissness.stopName") + index,
          placeholder: trans("front.buissness.stopName"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "stopName" + index
        }
      }, {
        props: {
          name: "stop" + trans("front.buissness.numberOfItems") + index,
          placeholder: trans("front.buissness.numberOfItems"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "numberOfItems" + index,
          numeric: true
        }
      }, {
        props: {
          name: trans("front.buissness.StopTime") + index,
          placeholder: trans("front.buissness.StopTime"),
          newclasses: {
            stopTime: true
          },
          validate: "required|decimal:3|min_value:1",
          id: "StopsTime" + index,

          numeric: true
        }
      }];
    }
  },
  props: {
    stop: {
      required: true
    },
    index: {
      required: true
    }
  },
  methods: {
    deleteMe: function deleteMe(e) {
      this.$emit("deleteStop", e);
    },
    stopName: function stopName(index) {
      return this.trans("front.bystop.stop") + " " + String(index + 1);
    },
    validatePlace: function validatePlace(place) {
      if (!place || !place.address_components) {
        return false;
      }
      var HasStreetArray = place.address_components.some(function (component) {
        return component.types.indexOf("street_number") !== -1;
      });
      if (!HasStreetArray) {
        this.$snotify.warning(trans("front.main.placeError"), trans("front.main.placeErrorHead"), {
          timeout: 3500,
          // showProgressBar:false,
          pauseOnHover: true
        });
      }
      return HasStreetArray;
    },
    setStopPlace: function setStopPlace(place) {
      if (!this.validatePlace(place)) {
        this.stop.location.address = {};
        this.stop.location.geometry = {};
        return false;
      }
      this.stop.location.formatted_address = place.formatted_address;
      this.stop.location.address = this.getAddressObject(place.address_components);
      this.stop.location.geometry = place.geometry.location;

      this.$emit("stopChangedLocation", this.stop, this.index);
    },
    getAddressObject: function getAddressObject(address_components) {
      var ShouldBeComponent = {
        home: ["street_number"],
        postal_code: ["postal_code"],
        street: ["street_address", "route"],
        region: ["administrative_area_level_1", "administrative_area_level_2", "administrative_area_level_3", "administrative_area_level_4", "administrative_area_level_5"],
        city: ["locality", "sublocality", "sublocality_level_1", "sublocality_level_2", "sublocality_level_3", "sublocality_level_4"],
        country: ["country"]
      };

      var address = {
        home: "",
        postal_code: "",
        street: "",
        region: "",
        city: "",
        country: ""
      };
      address_components.forEach(function (component) {
        for (var shouldBe in ShouldBeComponent) {
          if (ShouldBeComponent[shouldBe].indexOf(component.types[0]) !== -1) {
            if (shouldBe === "country") {
              address[shouldBe] = component.short_name;
            } else {
              address[shouldBe] = component.long_name;
            }
          }
        }
      });
      return address;
    }
  },
  created: function created() {},
  mounted: function mounted() {
    var _this = this;

    $("#stopLocation" + this.index).change(function (e) {
      _this.stop.location.formatted_address = $("#stopLocation" + _this.index).val();
      _this.stop.touched = true;
    });
    $("#stopLocation" + this.index).val(this.stop.location.formatted_address);
  },

  watch: {
    stop: function stop(newval) {
      var _this2 = this;

      this.$nextTick(function () {
        $("#stopLocation" + _this2.index).val(newval.location.formatted_address);
        _this2.$validator.reset();
      });
    }
  },
  components: {},
  inject: {
    $validator: "$validator"
  }
});

/***/ }),

/***/ 761:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "stops-inputs-head fieldset" }, [
    _c("div", { staticClass: "legend" }, [
      _vm._v(
        _vm._s(_vm.stop.stopName ? _vm.stop.stopName : _vm.stopName(_vm.index))
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "stop-inputs-setting" }, [
      _c("div", { staticClass: "add-new-package" }, [
        _c(
          "button",
          {
            staticClass: "btn btn-danger btn-xs",
            on: {
              click: function($event) {
                return _vm.deleteMe(_vm.index)
              }
            }
          },
          [
            _c("img", {
              attrs: {
                src: "/images/rubbish-bin-delete-button.svg",
                alt: _vm.trans("front.bystop.delete")
              }
            }),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(_vm.trans("front.bystop.delete")))])
          ]
        )
      ])
    ]),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "stops-inputs-head-main" },
      [
        _c(
          "div",
          {
            class: {
              "input-parent": true,
              location: true,
              "with-error":
                _vm.stop.touched === true &&
                (!_vm.stop.location.address || !_vm.stop.location.address.home)
            }
          },
          [
            _c("span", { staticClass: "label-span" }, [
              _c("label", { attrs: { for: "stopLocation" + _vm.index } }, [
                _vm._v(_vm._s(_vm.trans("front.buissness.stopLocation")))
              ])
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "input-child" },
              [
                _c("gmap-autocomplete", {
                  attrs: {
                    placeholder: _vm.trans("front.main.addressPlaceHolder"),
                    id: "stopLocation" + _vm.index,
                    autofocus: ""
                  },
                  on: { place_changed: _vm.setStopPlace }
                })
              ],
              1
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "input-parent",
          _vm._b(
            {
              model: {
                value: _vm.stop.stopName,
                callback: function($$v) {
                  _vm.$set(_vm.stop, "stopName", $$v)
                },
                expression: "stop.stopName"
              }
            },
            "input-parent",
            _vm.inputs[0].props,
            false
          )
        ),
        _vm._v(" "),
        _c(
          "input-parent",
          _vm._b(
            {
              model: {
                value: _vm.stop.loadTime,
                callback: function($$v) {
                  _vm.$set(_vm.stop, "loadTime", $$v)
                },
                expression: "stop.loadTime"
              }
            },
            "input-parent",
            _vm.inputs[2].props,
            false
          )
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-436475c1", module.exports)
  }
}

/***/ }),

/***/ 762:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "stops-wrapper" }, [
    _c(
      "div",
      { staticClass: "stop-tour-wrapper-left" },
      [
        _c("div", { staticClass: "stops-inputs-head fieldset" }, [
          _c("div", { staticClass: "legend" }, [
            _vm._v(_vm._s(_vm.trans("front.bystop.tourInfo")))
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "head-main-header" }),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "stops-inputs-head-main" },
            _vm._l(_vm.inputs, function(input) {
              return input.if !== true
                ? _c(
                    "input-parent",
                    _vm._b(
                      {
                        key: "input-stop" + input.props.id,
                        model: {
                          value: _vm.stopsGeneral[input.model],
                          callback: function($$v) {
                            _vm.$set(_vm.stopsGeneral, input.model, $$v)
                          },
                          expression: "stopsGeneral[input.model]"
                        }
                      },
                      "input-parent",
                      input.props,
                      false
                    )
                  )
                : _vm._e()
            }),
            1
          )
        ]),
        _vm._v(" "),
        _c("transition", { attrs: { name: "slide-fade" } }, [
          _vm.allowStops === false
            ? _c("div", { staticClass: "stops-inputs-head fieldset" }, [
                _c("div", { staticClass: "legend" }, [
                  _vm._v(_vm._s(_vm.trans("front.bystop.tourDistance")))
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "head-main-header" }),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "stops-inputs-head-main" },
                  _vm._l(_vm.inputs, function(input) {
                    return input.if === true && _vm.allowStops === false
                      ? _c(
                          "input-parent",
                          _vm._b(
                            {
                              key: "input-stop" + input.props.id,
                              model: {
                                value: _vm.stopsGeneral[input.model],
                                callback: function($$v) {
                                  _vm.$set(_vm.stopsGeneral, input.model, $$v)
                                },
                                expression: "stopsGeneral[input.model]"
                              }
                            },
                            "input-parent",
                            input.props,
                            false
                          )
                        )
                      : _vm._e()
                  }),
                  1
                )
              ])
            : _vm._e()
        ])
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "stop-tour-wrapper-right" },
      [
        _vm.checkedAndErrors
          ? _c("tour-car", {
              attrs: {
                tour: _vm.tour,
                stopsGeneral: _vm.stopsGeneral,
                shippings: _vm.shippings,
                distances: _vm.distances,
                stops: _vm.stops
              }
            })
          : _vm._e()
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "stops-rows-wrapper" },
      [
        _c(
          "div",
          { staticClass: "stops-rows-header" },
          [
            _c(
              "checkbox",
              {
                attrs: { name: "terms" },
                model: {
                  value: _vm.allowStops,
                  callback: function($$v) {
                    _vm.allowStops = $$v
                  },
                  expression: "allowStops"
                }
              },
              [_vm._v(_vm._s(_vm.trans("front.bystop.stopsPermission")))]
            )
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "transition-group",
          {
            staticClass: "stops-rows-container",
            attrs: { name: "list", tag: "div" }
          },
          _vm._l(_vm.stops, function(stop, index) {
            return _vm.allowStops || index === 0
              ? _c("stop-row", {
                  key: "stopNumber" + index,
                  attrs: { index: index, stop: stop },
                  on: { deleteStop: _vm.deleteStop }
                })
              : _vm._e()
          }),
          1
        ),
        _vm._v(" "),
        _vm.allowStops
          ? _c(
              "div",
              {
                staticClass: "add-new-package",
                staticStyle: { width: "100%" }
              },
              [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-success btn-xs",
                    on: {
                      click: function($event) {
                        _vm.addNewStop(_vm.generateNewStop(), true)
                      }
                    }
                  },
                  [
                    _c("img", {
                      attrs: { src: "/images/add-new.svg", alt: "add new" }
                    }),
                    _vm._v(" "),
                    _c("span", [
                      _vm._v(_vm._s(_vm.trans("front.buissness.addNewStop")))
                    ])
                  ]
                )
              ]
            )
          : _vm._e()
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "add-new-package",
        staticStyle: {
          width: "100%",
          display: "flex",
          "justify-content": "flex-end"
        }
      },
      [
        _c(
          "button",
          {
            staticClass: "btn btn-success btn-xs",
            on: { click: _vm.saveTour }
          },
          [
            _c("img", {
              attrs: {
                src: "/images/arrow-pointing-to-right.svg",
                alt: _vm.trans("front.bystop.next")
              }
            }),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(_vm.trans("front.bystop.next")))])
          ]
        )
      ]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-6abcc780", module.exports)
  }
}

/***/ }),

/***/ 763:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(764)
/* template */
var __vue_template__ = __webpack_require__(765)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/main/tourMap.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3b71412d", Component.options)
  } else {
    hotAPI.reload("data-v-3b71412d", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 764:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      sideMapOptions: {
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        fullscreenControl: true,
        lastRequest: {}
      },
      mapCenter: {
        lat: 51.165691,
        lng: 10.451526
      },
      mapZoom: 6,
      myseconds: 0
    };
  },

  computed: {},
  props: {
    tour: {
      required: true
    },
    stops: {
      required: true
    },
    stopsGeneral: {
      required: true
    }
  },
  watch: {
    stops: {
      handler: function handler(newval, oldval) {
        // newval.forEach((stop, index) => {
        //   console.log(
        //     JSON.stringify(this.getLocation(stop)),
        //     JSON.stringify(this.getLocation(oldval[index])),
        //     "ahmed"
        //   );
        // });
        this.handleStops(newval);
        this.handleStopsTime(newval, this.myseconds);
      },
      deep: true
    },
    myseconds: function myseconds(newval) {
      if (!isNaN(newval)) {
        this.handleStopsTime(this.stops, newval);
      }
    }
  },
  methods: {
    handleStopsTime: function handleStopsTime(stops, seconds) {
      // debugger;
      stops.forEach(function (stop) {
        seconds += stop.loadTime * 60;
      });

      seconds = seconds / 60;
      this.stopsGeneral.totalTimeOfStops = seconds;
    },
    secondsToHms: function secondsToHms(d) {
      d = Number(d);
      var h = Math.floor(d / 3600);
      var m = Math.floor(d % 3600 / 60);
      var s = Math.floor(d % 3600 % 60);

      var hDisplay = h > 0 ? h + ": " : "00: ";
      var mDisplay = m > 0 ? m + ": " : "00 ";

      return hDisplay + mDisplay;
    },
    emptyMap: function emptyMap() {
      if (this.directionsDisplay) {
        this.directionsDisplay.setDirections({
          routes: []
        });
        this.directionsDisplay = null;
      }
      this.directionsDisplay = new window.google.maps.DirectionsRenderer({
        suppressMarkers: true
      });

      this.directionsDisplay.setMap(this.$refs.tourMap.$mapObject);
    },
    handleStops: function handleStops(stops) {
      var _this = this;

      if (!this.$refs || !this.$refs.tourMap || !this.$refs.tourMap.$mapObject || !window.google) {
        setTimeout(function () {
          _this.handleStops(stops);
        }, 300);
        return false;
      }

      var directionsService = new window.google.maps.DirectionsService();

      var from = {};
      var wayPoints = [];
      var to = {};
      stops.forEach(function (stop, index) {
        if (index === 0) {
          from = _this.getLocation(stop);
        } else {
          var tempLocation = _this.getLocation(stop);

          if (tempLocation !== false) {
            if (to !== false && to.lat && to.lng) {
              wayPoints.push({
                location: to,
                stopover: true
              });
            }

            to = tempLocation;
          }
        }
      });
      if (!from || !to || !to.lng || !to.lat) {
        this.emptyMap();
        return false;
      }
      var start = new window.google.maps.LatLng(from.lat, from.lng);
      var end = new window.google.maps.LatLng(to.lat, to.lng);
      var request = {
        origin: start,
        destination: end,
        waypoints: wayPoints,
        travelMode: google.maps.TravelMode["DRIVING"]
      };
      if (JSON.stringify(this.lastRequest) === JSON.stringify(request)) {
        return false;
      } else {
        this.emptyMap();
        this.lastRequest = request;
      }
      directionsService.route(request, function (result, status) {
        if (status == "OK") {
          _this.directionsDisplay.setDirections(result);
          var distance = 0;
          var seconds = 0;
          result.routes[0].legs.forEach(function (leg) {
            distance += leg.distance.value;
            seconds += leg.duration.value;
          });

          _this.stopsGeneral.totalDistanceStops = distance / 1000;
          _this.myseconds = seconds;
        }
      });

      return true;
    },
    getLocation: function getLocation(stop) {
      var lat = 0;
      var lng = 0;
      if (stop.location && stop.location.geometry && stop.location.geometry.lat) {
        lat = stop.location.geometry.lat();
        lng = stop.location.geometry.lng();
        return { lat: lat, lng: lng };
      }
      return false;
    },
    handleScroll: function handleScroll(e) {
      var top = window.pageYOffset || document.documentElement.scrollTop;
      var RelativeTop = $(".order-info-form").position().top;

      var toBeMargined = top - RelativeTop > 0 ? top - RelativeTop : 0;
      if (toBeMargined + $(".map-element.fixed").height() > $(".form-map-container").height()) {
        toBeMargined = $(".form-map-container").height() - $(".map-element.fixed").height();
      }
      $(".map-element.fixed").css("margin-top", toBeMargined);
    }
  },
  components: {},
  created: function created() {
    window.addEventListener("scroll", this.handleScroll);
  },
  destroyed: function destroyed() {
    window.removeEventListener("scroll", this.handleScroll);
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ 765:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "order-info-form", attrs: { id: "tourMap" } },
    [
      _c(
        "div",
        { staticClass: "map-element fixed" },
        [
          _c(
            "gmap-map",
            {
              ref: "tourMap",
              staticStyle: { width: "100%", height: "100%" },
              attrs: {
                center: _vm.mapCenter,
                options: _vm.sideMapOptions,
                zoom: _vm.mapZoom,
                "map-type-id": "roadmap"
              }
            },
            _vm._l(_vm.stops, function(stop, index) {
              return _vm.getLocation(stop)
                ? _c("gmap-marker", {
                    key: "marker" + index,
                    attrs: {
                      icon: "/tour/icon/" + (index + 1),
                      position: _vm.getLocation(stop),
                      animation: 0
                    }
                  })
                : _vm._e()
            }),
            1
          )
        ],
        1
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-3b71412d", module.exports)
  }
}

/***/ }),

/***/ 766:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container create-order-container" }, [
    _c(
      "div",
      {
        staticClass: "form-map-container",
        staticStyle: { "margin-top": "20px" }
      },
      [
        _c(
          "div",
          {
            staticClass: "order-form-wrapper",
            staticStyle: { "padding-bottom": "20px" }
          },
          [
            _c("slider-slick-tour", { attrs: { tour: _vm.tour } }),
            _vm._v(" "),
            _c("tour-type-select", { attrs: { tour: _vm.tour } }),
            _vm._v(" "),
            _c("by-stop", {
              attrs: {
                stops: _vm.stops,
                stopsGeneral: _vm.stopsGeneral,
                tour: _vm.tour
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c("tour-map", {
          attrs: {
            tour: _vm.tour,
            stops: _vm.stops,
            stopsGeneral: _vm.stopsGeneral
          }
        })
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-337b9a50", module.exports)
  }
}

/***/ })

});