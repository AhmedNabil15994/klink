webpackJsonp([4],{

/***/ 649:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(695)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(697)
/* template */
var __vue_template__ = __webpack_require__(708)
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
Component.options.__file = "resources/assets/js/components/pages/mainPage.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0a49a3ac", Component.options)
  } else {
    hotAPI.reload("data-v-0a49a3ac", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


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

/***/ 695:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(696);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("be419506", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0a49a3ac\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./mainPage.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0a49a3ac\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./mainPage.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 696:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 697:
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
            slickOptions: {
                arrows: false,
                autoplay: true
                // Any other options that can be got from plugin documentation
            },
            fromFocused: false,
            toFocused: false,
            loading: false,
            activatedOrder: false,
            activatedOrderId: {},
            activatedOrderIndex: '',
            otherOrders: '',
            from: {
                adress: '',
                marker: {
                    lat: 51.165691,
                    lng: 10.451526
                },
                icon: 'images/home.svg'
            },
            to: {
                adress: '',
                marker: {
                    lat: 51.165691,
                    lng: 10.451526
                },
                icon: 'images/send.svg'
            },
            allOrders: this.$orders.getOrders(),
            isChecked: false,
            tempRouteResult: {}
        };
    },

    components: {
        'app-orders': __webpack_require__(698),
        'app-other-orders': __webpack_require__(703),
        Slick: __WEBPACK_IMPORTED_MODULE_0_vue_slick__["a" /* default */]
    },
    mounted: function mounted() {
        var _this = this;

        $('#FromGeoAdress').focus(function () {
            _this.fromFocused = true;
        });
        $('#FromGeoAdress').blur(function () {

            _this.fromFocused = false;
        });
        $('#ToGeoAdress').focus(function () {
            _this.toFocused = true;
        });
        $('#ToGeoAdress').blur(function () {

            _this.toFocused = false;
        });
        this.$genF.svg();
        $('[data-toggle="tooltip"]').tooltip();
        $('.deleteImage').tooltip();
        $('.fullSize').tooltip();
        $('#FromGeoAdress').change(function () {
            _this.setFromPlace({});
        });
        $('#ToGeoAdress').change(function () {
            _this.setToPlace({});
        });

        this.getOrders();
    },

    computed: {
        isThereLocation: function isThereLocation() {
            if (window.navigator && window.navigator.geolocation) {
                return true;
            }
            return false;
        }
    },

    methods: {
        focused: function focused(type) {
            alert(type);
        },
        slideChange: function slideChange(e) {
            if (this.activatedOrder) {
                this.changeActiveOrder(this.allOrders[e].id);
            }
        },
        getOrders: function getOrders() {
            var _this2 = this;

            this.$http.get('/api/orders/other').then(function (response) {
                if (response.body && response.body[1] === 'adv') {
                    if (!_this2.allOrders || _this2.allOrders.length === 0) {
                        _this2.otherOrders = response.body[0];
                    }
                } else if (response.body && response.body[1] === 'owner') {
                    _this2.allOrders = _this2.allOrders.concat(response.body[0].map(function (e) {
                        e.id = e.encrypted;
                        return e;
                    }));
                }
            });
        },
        isNumeric: function isNumeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        },
        getLocationToFrom: function getLocationToFrom() {
            var _this3 = this;

            navigator.geolocation.getCurrentPosition(function (myposition) {

                _this3.from.marker = {
                    lat: myposition.coords.latitude,
                    lng: myposition.coords.longitude
                };
                var geocoder = new google.maps.Geocoder();
                var latlng = {
                    lat: Number(myposition.coords.latitude),
                    lng: Number(myposition.coords.longitude)
                };

                geocoder.geocode({
                    'location': latlng
                }, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            _this3.from.icon = '';
                            $('#FromGeoAdress').val(results[0].formatted_address);
                            // alert(results[1].formatted_address);
                            _this3.from.adress = results[0].formatted_address;
                            _this3.$nextTick(function () {
                                _this3.from.icon = '/images/checked.svg';
                            });
                            if (_this3.activatedOrder) {
                                _this3.ShowRoute();
                            }
                        } else {
                            alert('No results found');
                        }
                    }
                });
            }, function (error) {

                _this3.$swal({
                    title: error.message,
                    text: error.message,
                    type: "error",
                    confirmButtonText: trans('front.main.ok'),
                    onOpen: function onOpen() {
                        $('.swal2-icon.swal2-error').html('');

                        $('.swal2-icon.swal2-error').html('<img src="/images/warming.svg"/>');
                    }
                });
            }, {
                maximumAge: 600000,
                timeout: 5000,
                enableHighAccuracy: true
            });
        },
        changeActiveOrder: function changeActiveOrder(id) {
            var _this4 = this;

            this.activatedOrder = true;
            this.$orders.getOrder(id).then(function (response) {

                _this4.activatedOrderId = response;
                $('#FromGeoAdress').val(_this4.activatedOrderId.from);
                $('#ToGeoAdress').val(_this4.activatedOrderId.to);
                _this4.from.adress = response.from;
                _this4.to.adress = response.to;

                _this4.from.marker = _this4.getMarker(response.from_map);
                _this4.to.marker = _this4.getMarker(response.to_map);
                var directionsService = new window.google.maps.DirectionsService();
                if (_this4.directionsDisplay) {
                    _this4.directionsDisplay.setDirections({
                        routes: []
                    });
                    _this4.directionsDisplay = null;
                }
                _this4.directionsDisplay = new window.google.maps.DirectionsRenderer({
                    suppressMarkers: true
                });
                _this4.directionsDisplay.setMap(null);
                _this4.directionsDisplay.setMap(_this4.$refs.map.$mapObject);
                _this4.directionsDisplay.setDirections(response.orderRoute);
            });
        },
        getMarker: function getMarker(text) {
            return {
                lat: Number(text.split(',')[0]),
                lng: Number(text.split(',')[1])
            };
        },
        ShowRoute: function ShowRoute() {
            var _this5 = this;

            var directionsService = new window.google.maps.DirectionsService();
            if (this.directionsDisplay) {

                this.directionsDisplay.setDirections({
                    routes: []
                });
                this.directionsDisplay = null;
            }
            this.directionsDisplay = new window.google.maps.DirectionsRenderer({
                suppressMarkers: true
            });
            this.directionsDisplay.setMap(null);

            this.directionsDisplay.setMap(this.$refs.map.$mapObject);

            var start = new window.google.maps.LatLng(this.from.marker.lat, this.from.marker.lng);
            var end = new window.google.maps.LatLng(this.to.marker.lat, this.to.marker.lng);

            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode['DRIVING']
            };

            directionsService.route(request, function (result, status) {
                if (status == 'OK') {
                    _this5.tempRouteResult = result;
                    _this5.activatedOrderId.orderRoute = result;
                    _this5.directionsDisplay.setDirections(result);
                    var data = {
                        from: _this5.from.adress,
                        to: _this5.to.adress,
                        from_map: _this5.from.marker.lat + ',' + _this5.from.marker.lng,
                        to_map: _this5.to.marker.lat + ',' + _this5.to.marker.lng,
                        orderRoute: _this5.tempRouteResult
                    };
                    if (!_this5.activatedOrderIndex || _this5.allOrders[_this5.activatedOrderIndex].id !== _this5.activatedOrderId.id) {
                        _this5.allOrders.map(function (element, index) {
                            if (element.id === _this5.activatedOrderId.id) {
                                _this5.activatedOrderIndex = index;
                            }
                        });
                    }
                    for (var key in data) {
                        _this5.allOrders[_this5.activatedOrderIndex][key] = data[key];
                    }
                    _this5.$orders.updateOrder(_this5.activatedOrderId.id, data);
                }
            });
        },
        check: function check(e) {
            var _this6 = this;

            this.loading = true;
            var data = {
                from: this.from.adress,
                to: this.to.adress,
                from_map: this.from.marker.lat + ',' + this.from.marker.lng,
                to_map: this.to.marker.lat + ',' + this.to.marker.lng,
                userId: this.$orders.OrdersUserId()
            };
            this.orderValidate(data).then(function (response) {
                _this6.gotto();
            }, function (error) {
                _this6.gotto();
                // this.loading = false;
            });

            return true;
        },
        orderValidate: function orderValidate(NewOrder) {
            var result = false;
            if (NewOrder.from && NewOrder.to && NewOrder.from_map && NewOrder.to_map && NewOrder.from_map !== NewOrder.to_map) {
                result = true;
            }
            return new Promise(function (resolve, reject) {
                if (result) {
                    // if (this.$orders.IsFound(NewOrder)) {
                    //     return reject({
                    //         title: trans('front.main.repeatedOrder'),
                    //         text: trans('front.main.repeatedOrderText')
                    //     })
                    // }
                    return resolve(result);
                } else {
                    return reject({
                        title: trans('front.main.wrongData'),
                        text: trans('front.main.wrongDataMessage')
                    });
                }
            });
        },
        validateFromPlace: function validateFromPlace() {
            var _this7 = this;

            if (this.from.marker.lat && this.from.marker.lng && this.from.adress && $('#FromGeoAdress').val()) {
                this.from.icon = '';
                this.$nextTick(function () {
                    _this7.from.icon = '/images/checked.svg';
                });
            } else {
                this.from.icon = '';
                this.$nextTick(function () {
                    _this7.from.icon = '/images/warning.svg';
                });
            }
        },
        validateToPlace: function validateToPlace() {
            var _this8 = this;

            if (this.to.marker.lat && this.to.marker.lng && this.to.adress && $('#ToGeoAdress').val()) {
                this.to.icon = '';
                this.$nextTick(function () {
                    _this8.to.icon = '/images/checked.svg';
                });
            } else {
                this.to.icon = '';
                this.$nextTick(function () {
                    _this8.to.icon = '/images/warning.svg';
                });
            }
        },
        validatePlace: function validatePlace(place) {
            if (!place || !place.address_components) {
                return false;
            }
            var HasStreetArray = place.address_components.some(function (component) {
                return component.types.indexOf('street_number') !== -1;
            });
            if (!HasStreetArray) {
                this.$snotify.warning(trans('front.main.placeError'), trans('front.main.placeErrorHead'), {
                    timeout: 3500,
                    // showProgressBar:false,
                    pauseOnHover: true
                });
            }
            return HasStreetArray;
        },
        setFromPlace: function setFromPlace(place) {
            this.from.adress = place.formatted_address;

            if (!place.geometry || !this.validatePlace(place)) {

                this.from.marker = {
                    lat: '',
                    lng: ''
                };
                this.validateFromPlace();
                return '';
            } else {
                $('#ToGeoAdress').focus();
                this.from.marker = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                };
            }
            if (this.activatedOrder) {
                this.ShowRoute();
            } else if (this.from.adress && this.from.marker && this.to.marker && this.from.marker.lat && this.from.marker.lng && this.to.adress && this.to.marker.lng && this.to.marker.lat) {
                this.check();
            }
            this.validateFromPlace();
        },
        setToPlace: function setToPlace(place) {
            var _this9 = this;

            this.to.adress = place.formatted_address;
            if (!place.geometry || !this.validatePlace(place)) {

                this.to.marker = {
                    lat: '',
                    lng: ''
                };
                this.validateToPlace();
                return '';
            } else {
                $('#SubmitFormButton').focus();
                this.to.marker = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                };
            }
            this.validateToPlace();
            if (this.activatedOrder) {
                this.ShowRoute();
            } else if (this.from.adress && this.from.marker.lat && this.from.marker.lng && this.to.adress && this.to.marker.lng && this.to.marker.lat) {
                this.check();
            }
            this.$nextTick(function () {
                _this9.saveNewOrder();
            });
        },
        setFromPlaceViaMarker: function setFromPlaceViaMarker(event) {
            var _this10 = this;

            this.from.marker = {
                lat: event.latLng.lat(),
                lng: event.latLng.lng()
            };
            var geocoder = new google.maps.Geocoder();
            var latlng = {
                lat: event.latLng.lat(),
                lng: event.latLng.lng()
            };
            geocoder.geocode({
                'location': latlng
            }, function (results, status) {
                if (status === 'OK') {
                    if (results[1]) {
                        $('#FromGeoAdress').val(results[1].formatted_address);
                        // alert(results[1].formatted_address);
                        _this10.from.adress = results[1].formatted_address;
                        if (_this10.activatedOrder) {
                            _this10.ShowRoute();
                        }
                    } else {
                        alert('No results found');
                    }
                }
            });
        },
        setToPlaceViaMarker: function setToPlaceViaMarker(event) {
            var _this11 = this;

            this.to.marker = {
                lat: event.latLng.lat(),
                lng: event.latLng.lng()
                // this.gotto()
            };var geocoder = new google.maps.Geocoder();
            var latlng = {
                lat: event.latLng.lat(),
                lng: event.latLng.lng()
            };
            geocoder.geocode({
                'location': latlng
            }, function (results, status) {
                if (status === 'OK') {
                    if (results[1]) {
                        $('#ToGeoAdress').val(results[1].formatted_address);
                        _this11.to.adress = results[1].formatted_address;
                        if (_this11.activatedOrder) {
                            _this11.ShowRoute();
                        }
                        // alert(results[1].formatted_address);
                    } else {
                        alert('No results found');
                    }
                }
            });
        },
        gotto: function gotto() {
            var _this12 = this;

            var save = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;


            var directionsService = new window.google.maps.DirectionsService();
            if (this.directionsDisplay) {
                this.directionsDisplay.setDirections({
                    routes: []
                });
                this.directionsDisplay = null;
            }
            this.directionsDisplay = new window.google.maps.DirectionsRenderer({
                suppressMarkers: true
            });
            this.directionsDisplay.setMap(null);
            this.directionsDisplay.setMap(this.$refs.map.$mapObject);

            var start = new window.google.maps.LatLng(this.from.marker.lat, this.from.marker.lng);
            var end = new window.google.maps.LatLng(this.to.marker.lat, this.to.marker.lng);

            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode['DRIVING']
            };
            directionsService.route(request, function (result, status) {
                if (status == 'OK') {
                    _this12.tempRouteResult = result;
                    var data = {
                        from: _this12.from.adress,
                        to: _this12.to.adress,
                        from_map: _this12.from.marker.lat + ',' + _this12.from.marker.lng,
                        to_map: _this12.to.marker.lat + ',' + _this12.to.marker.lng,
                        orderRoute: _this12.tempRouteResult
                    };
                    if (save === true) {

                        _this12.$orders.NewOrder(data).then(function (response) {

                            _this12.allOrders = response;

                            _this12.isChecked = true;
                            _this12.tempRouteResult = {};
                            // this.changeActiveOrder(response[response.length - 1].id);
                            _this12.$nextTick(function () {
                                _this12.loading = false;
                                _this12.$router.push('/order/create_order/' + response[response.length - 1].id);
                            });
                        });
                    }

                    _this12.directionsDisplay.setDirections(result);
                    _this12.loading = false;
                }
            });
        },
        saveNewOrder: function saveNewOrder() {
            var _this13 = this;

            this.loading = true;
            var data = {
                from: this.from.adress,
                to: this.to.adress,
                from_map: this.from.marker.lat + ',' + this.from.marker.lng,
                to_map: this.to.marker.lat + ',' + this.to.marker.lng,
                orderRoute: this.tempRouteResult
            };
            this.orderValidate(data).then(function (result) {

                _this13.gotto(true);
            }, function (error) {
                if (!_this13.from.marker || !_this13.from.adress || !_this13.from.marker.lat || !_this13.from.marker.lng) {
                    _this13.from.icon = '';
                    _this13.$nextTick(function () {
                        _this13.from.icon = '/images/warning.svg';
                    });
                }
                if (!_this13.to.marker || !_this13.to.adress || !_this13.to.marker.lat || !_this13.to.marker.lng) {
                    _this13.to.icon = '';
                    _this13.$nextTick(function () {
                        _this13.to.icon = '/images/warning.svg';
                    });
                }

                _this13.loading = false;
            });
        }
    }

});

/***/ }),

/***/ 698:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(699)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(701)
/* template */
var __vue_template__ = __webpack_require__(702)
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
Component.options.__file = "resources/assets/js/components/pages/main/AppOrders.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0386ae32", Component.options)
  } else {
    hotAPI.reload("data-v-0386ae32", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 699:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(700);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("092ab20b", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0386ae32\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppOrders.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0386ae32\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppOrders.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 700:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 701:
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
        return {
            loading: false,
            ordeers: this.orders
        };
    },

    computed: {
        userId: function userId() {
            if (this.$auth.isAuth) {
                return 'user';
            } else {
                if (localStorage.getItem('tempid')) {
                    return localStorage.getItem('tempid');
                } else {
                    return 'new';
                }
            }
        }
    },
    mounted: function mounted() {
        this.$genF.svg();
    },

    props: ['orders'],
    watch: {
        'orders': function orders(newval) {
            var _this = this;

            this.loading = true;
            this.$nextTick(function () {

                _this.loading = false;
                _this.ordeers = _this.orders;
                _this.$nextTick(function () {
                    if (_this.$refs.carsouel) {

                        _this.$refs.carsouel.goSlide(newval.length - 1);

                        _this.$genF.svg();
                    }
                });
            });
        }
    },
    methods: {
        slideChange: function slideChange(e) {
            this.$emit('slide-change', e);
        },
        activateOrder: function activateOrder(slide) {
            this.$orders.setActiveOrder(slide.id);
            this.$emit('activateOrder', slide.id);
        },
        deleteOrder: function deleteOrder(order) {
            var _this2 = this;

            var vm = this;
            $('.deleteImage').tooltip('hide');
            Vue.orders.removeOrder(order).then(function (response) {
                // Vue.orders = response;
                $('.deleteImage').tooltip('hide');
                _this2.loading = true;
                _this2.ordeers = response;

                _this2.$nextTick(function () {
                    $('.deleteImage').tooltip('hide');
                    _this2.loading = false;
                });
            });
            // this.$swal({
            //     type: 'question',
            //     title: '',
            //     text: trans('front.main.deleteConfirm'),
            //     showCancelButton: true,
            //     cancelButtonColor: '#d33',
            //     cancelButtonText: trans('front.main.cancel'),
            //     confirmButtonText: trans('front.main.deleteIt'),
            //     onOpen() {
            //         $('.swal2-icon.swal2-question').html('<img src="/images/question.svg"/>');
            //     }

            // }).then(result => {
            //     if (result.value === true) {
            //         this.$swal({
            //             text: trans('front.main.deleting'),
            //             onOpen() {
            //                 Vue.swal.showLoading();

            //             }
            //         })
            //     }
            // })
        }
    }

});

/***/ }),

/***/ 702:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("transition", { attrs: { name: "fade" } }, [
    !_vm.loading
      ? _c(
          "div",
          { staticClass: "orders-small-wrapper" },
          [
            _c(
              "carousel-3d",
              {
                ref: "carsouel",
                attrs: { "controls-visible": true, height: 200, width: 300 },
                on: { "before-slide-change": _vm.slideChange }
              },
              _vm._l(_vm.ordeers, function(slide, i) {
                return _c("slide", { key: "slide" + i, attrs: { index: i } }, [
                  _c("div", { staticClass: "small-order" }, [
                    _c("img", {
                      staticClass: "deleteImage",
                      attrs: {
                        src: "/images/delete-order.svg",
                        title: _vm.trans("front.main.delete"),
                        alt: _vm.trans("front.main.delete")
                      },
                      on: {
                        click: function($event) {
                          return _vm.deleteOrder(slide)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("img", {
                      staticClass: "fullSize",
                      attrs: {
                        src: "/images/full-size.svg",
                        title: _vm.trans("front.main.fullSize"),
                        alt: _vm.trans("front.main.fullSize")
                      },
                      on: {
                        click: function($event) {
                          return _vm.activateOrder(slide)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("div", { staticClass: "small-order-cell order-from" }, [
                      _c("img", {
                        staticClass: "svg",
                        attrs: {
                          src: "/images/home.svg",
                          alt: "From",
                          title: _vm.trans("front.main.from"),
                          "data-toggle": "tooltip"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "small-order-cell-adress" }, [
                        _c("b", [_vm._v(_vm._s(_vm.trans("front.main.from")))]),
                        _c("span", [_vm._v(" : " + _vm._s(slide.from))])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "small-order-cell order-to" }, [
                      _c("img", {
                        staticClass: "svg",
                        attrs: {
                          src: "/images/send.svg",
                          alt: _vm.trans("front.main.to"),
                          title: _vm.trans("front.main.to"),
                          "data-toggle": "tooltip"
                        }
                      }),
                      _vm._v(" "),
                      _c("span", { staticClass: "small-order-cell-adress" }, [
                        _c("b", [_vm._v(_vm._s(_vm.trans("front.main.to")))]),
                        _c("span", [_vm._v(" : " + _vm._s(slide.to))])
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "small-order-cell completeIt" },
                      [
                        _c(
                          "router-link",
                          {
                            staticClass: "letsComplete btn",
                            attrs: {
                              tag: "button",
                              to: _vm.$auth.isAuth()
                                ? "/order/create_order/" + slide.id
                                : "/order/create_order/" + slide.id
                            }
                          },
                          [_vm._v(_vm._s(_vm.trans("front.main.letsComplete")))]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("img", {
                      staticClass: "warning-order",
                      attrs: { src: "/images/warning.svg", alt: "warning" }
                    })
                  ])
                ])
              }),
              1
            )
          ],
          1
        )
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-0386ae32", module.exports)
  }
}

/***/ }),

/***/ 703:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(704)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(706)
/* template */
var __vue_template__ = __webpack_require__(707)
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
Component.options.__file = "resources/assets/js/components/pages/main/AppOtherOrders.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-f269efd0", Component.options)
  } else {
    hotAPI.reload("data-v-f269efd0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 704:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(705);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("7e120ab7", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-f269efd0\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppOtherOrders.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-f269efd0\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppOtherOrders.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 705:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 706:
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
            loading: false,
            ordeers: this.orders
        };
    },

    computed: {},
    props: {
        'orders': {
            required: true
        }
    },
    methods: {},
    created: function created() {},
    mounted: function mounted() {
        var _this = this;

        this.$nextTick(function () {

            _this.$genF.svg();
        });
    },

    watch: {
        'orders': function orders(newval) {
            var _this2 = this;

            this.loading = true;
            this.$nextTick(function () {

                _this2.loading = false;
                _this2.ordeers = _this2.orders;
                console.log(_this2.ordeers);
                _this2.$nextTick(function () {
                    if (_this2.$refs.othercarsouel) {

                        _this2.$genF.svg();
                        _this2.$refs.othercarsouel.goSlide(newval.length - 1);
                    }
                });
            });
        }
    }

});

/***/ }),

/***/ 707:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("transition", { attrs: { name: "fade" } }, [
    !_vm.loading
      ? _c(
          "div",
          { staticClass: "orders-small-wrapper" },
          [
            _c(
              "carousel-3d",
              {
                ref: "othercarsouel",
                attrs: {
                  autoplay: true,
                  dir: "ltr",
                  "autoplay-timeout": 5000,
                  "controls-visible": true,
                  height: 200,
                  width: 300
                }
              },
              _vm._l(_vm.ordeers, function(slide, i) {
                return _c("slide", { key: "slide" + i, attrs: { index: i } }, [
                  _c("div", { staticClass: "small-order" }, [
                    _c("div", { staticClass: "advertise-order" }, [
                      _c("div", { staticClass: "advertise-row" }, [
                        _c("div", { staticClass: "advertise-address" }, [
                          _c(
                            "div",
                            { staticClass: "small-order-cell order-from" },
                            [
                              _c("img", {
                                staticClass: "svg",
                                attrs: {
                                  src: "/images/home.svg",
                                  alt: "From",
                                  title: _vm.trans("front.main.from"),
                                  "data-toggle": "tooltip"
                                }
                              }),
                              _vm._v(" "),
                              _c(
                                "span",
                                { staticClass: "small-order-cell-adress" },
                                [_c("span", [_vm._v(_vm._s(slide.from))])]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "small-order-cell order-to" },
                            [
                              _c("img", {
                                staticClass: "svg",
                                attrs: {
                                  src: "/images/send.svg",
                                  alt: _vm.trans("front.main.to"),
                                  title: _vm.trans("front.main.to"),
                                  "data-toggle": "tooltip"
                                }
                              }),
                              _vm._v(" "),
                              _c(
                                "span",
                                { staticClass: "small-order-cell-adress" },
                                [_c("span", [_vm._v(_vm._s(slide.to))])]
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "advertise-pricing" }, [
                          _c("img", {
                            attrs: {
                              src:
                                "/api/orders/images/icon?price=" +
                                slide.price +
                                "&distance=" +
                                slide.distance,
                              alt: ""
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "advertise-row" }, [
                        slide.ship
                          ? _c(
                              "div",
                              { staticClass: "advertise-address shipping" },
                              [
                                _c("img", {
                                  attrs: {
                                    src: "/images/shippings/" + slide.ship.img,
                                    alt: slide.ship.title
                                  }
                                }),
                                _vm._v(" "),
                                _c("span", { staticStyle: { width: "100%" } }, [
                                  _vm._v(_vm._s(slide.ship.title))
                                ])
                              ]
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "advertise-pricing" })
                      ])
                    ])
                  ])
                ])
              }),
              1
            )
          ],
          1
        )
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-f269efd0", module.exports)
  }
}

/***/ }),

/***/ 708:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "main-page-div" }, [
    _c(
      "div",
      { class: { "main-page-overlay": true, checked: false } },
      [
        _c(
          "form",
          {
            ref: "newOrderForm",
            staticClass: "main-page-form",
            attrs: { action: "#" },
            on: {
              submit: function($event) {
                $event.preventDefault()
                return _vm.saveNewOrder($event)
              }
            }
          },
          [
            _c(
              "div",
              { staticClass: "form-head" },
              [
                _c("h1", [_vm._v(_vm._s(_vm.trans("frontend.main.make")))]),
                _vm._v(" "),
                _c(
                  "slick",
                  {
                    ref: "slick",
                    staticClass: "text-slider",
                    attrs: { options: _vm.slickOptions }
                  },
                  [
                    _c("div", [_vm._v(_vm._s(_vm.trans("frontend.main.p1")))]),
                    _vm._v(" "),
                    _c("div", [_vm._v(_vm._s(_vm.trans("frontend.main.p2")))]),
                    _vm._v(" "),
                    _c("div", [_vm._v(_vm._s(_vm.trans("frontend.main.p3")))]),
                    _vm._v(" "),
                    _c("div", [_vm._v(_vm._s(_vm.trans("frontend.main.p4")))])
                  ]
                )
              ],
              1
            ),
            _vm._v(" "),
            _c("div", { staticClass: "form-container" }, [
              _c(
                "div",
                {
                  class: { "main-form-input": true, focused: _vm.fromFocused }
                },
                [
                  _c("div", { staticClass: "main-from-span" }, [
                    _vm.from.icon
                      ? _c("span", { staticClass: "icon" }, [
                          _c("img", {
                            staticClass: "svg",
                            attrs: {
                              src: _vm.from.icon,
                              alt: _vm.trans("from.main.from")
                            }
                          })
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("label", { attrs: { for: "FromGeoAdress" } }, [
                      _vm._v(_vm._s(_vm.trans("front.main.senderAdress")))
                    ])
                  ]),
                  _vm._v(" "),
                  _c("gmap-autocomplete", {
                    ref: "fromAdress",
                    staticStyle: { "padding-right": "61.5px" },
                    attrs: {
                      placeholder: _vm.trans("front.main.addressPlaceHolder"),
                      id: "FromGeoAdress",
                      autofocus: ""
                    },
                    on: { place_changed: _vm.setFromPlace }
                  }),
                  _vm._v(" "),
                  _c("div", { staticClass: "icons-wrapper" }, [
                    _c(
                      "span",
                      {
                        attrs: {
                          "data-placement": "right",
                          "data-toggle": "tooltip",
                          role: "button"
                        }
                      },
                      [
                        _c("label", { attrs: { for: "FromGeoAdress" } }, [
                          _c("img", {
                            staticClass: "right-image svg",
                            attrs: {
                              src: "/images/search.svg",
                              alt: _vm.trans("front.main.gpsusage")
                            }
                          })
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      {
                        attrs: {
                          "data-placement": "right",
                          "data-toggle": "tooltip",
                          role: "button",
                          title: _vm.trans("front.main.gpsusage")
                        },
                        on: { click: _vm.getLocationToFrom }
                      },
                      [
                        _vm.isThereLocation
                          ? _c("img", {
                              staticClass: "right-image svg",
                              attrs: {
                                src: "/images/gps-fixed-indicator.svg",
                                alt: _vm.trans("front.main.gpsusage")
                              }
                            })
                          : _vm._e()
                      ]
                    )
                  ])
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { class: { "main-form-input": true, focused: _vm.toFocused } },
                [
                  _c("div", { staticClass: "main-from-span" }, [
                    _vm.to.icon
                      ? _c("span", { staticClass: "icon" }, [
                          _c("img", {
                            staticClass: "svg",
                            attrs: {
                              src: _vm.to.icon,
                              alt: _vm.trans("from.main.to")
                            }
                          })
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("label", { attrs: { for: "ToGeoAdress" } }, [
                      _vm._v(_vm._s(_vm.trans("front.main.receiverAdress")))
                    ])
                  ]),
                  _vm._v(" "),
                  _c("gmap-autocomplete", {
                    ref: "ToAdress",
                    staticStyle: { "padding-right": "30px" },
                    attrs: {
                      placeholder: _vm.trans("front.main.addressPlaceHolder"),
                      id: "ToGeoAdress"
                    },
                    on: { place_changed: _vm.setToPlace }
                  }),
                  _vm._v(" "),
                  _c("div", { staticClass: "icons-wrapper" }, [
                    _c(
                      "span",
                      {
                        attrs: {
                          "data-placement": "right",
                          "data-toggle": "tooltip",
                          role: "button"
                        }
                      },
                      [
                        _c("label", { attrs: { for: "ToGeoAdress" } }, [
                          _c("img", {
                            staticClass: "right-image svg",
                            attrs: {
                              src: "/images/search.svg",
                              alt: _vm.trans("front.main.gpsusage")
                            }
                          })
                        ])
                      ]
                    )
                  ])
                ],
                1
              )
            ])
          ]
        ),
        _vm._v(" "),
        _vm.allOrders && _vm.allOrders.length !== 0
          ? _c("app-orders", {
              attrs: { orders: _vm.allOrders },
              on: {
                "slide-change": _vm.slideChange,
                activateOrder: _vm.changeActiveOrder
              }
            })
          : _c("app-other-orders", { attrs: { orders: _vm.otherOrders } })
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "main-page-maps" },
      [
        _c(
          "gmap-map",
          {
            ref: "map",
            staticStyle: { width: "100%", height: "100%" },
            attrs: {
              center: { lat: 51.165691, lng: 10.451526 },
              zoom: 6,
              "map-type-id": "roadmap"
            }
          },
          [
            _vm.isNumeric(_vm.to.marker.lng) && _vm.isNumeric(_vm.to.marker.lat)
              ? _c("gmap-marker", {
                  attrs: {
                    "data-toggle": "tooltip",
                    icon: "/images/marker-to.svg",
                    position: _vm.to.marker,
                    title: "to",
                    animation: 2,
                    draggable: true
                  },
                  on: { dragend: _vm.setToPlaceViaMarker }
                })
              : _vm._e(),
            _vm._v(" "),
            _vm.isNumeric(_vm.from.marker.lng) &&
            _vm.isNumeric(_vm.from.marker.lat)
              ? _c("gmap-marker", {
                  attrs: {
                    "data-toggle": "tooltip",
                    icon: "/images/home-marker.svg",
                    position: _vm.from.marker,
                    title: "from",
                    animation: 2,
                    draggable: true
                  },
                  on: { dragend: _vm.setFromPlaceViaMarker }
                })
              : _vm._e()
          ],
          1
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
    require("vue-hot-reload-api")      .rerender("data-v-0a49a3ac", module.exports)
  }
}

/***/ })

});