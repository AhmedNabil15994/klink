webpackJsonp([3],{

/***/ 648:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(666)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(668)
/* template */
var __vue_template__ = __webpack_require__(694)
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
Component.options.__file = "resources/assets/js/components/layout/main.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4d5c9237", Component.options)
  } else {
    hotAPI.reload("data-v-4d5c9237", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 666:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(667);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("f4cacaf8", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4d5c9237\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./main.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4d5c9237\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./main.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 667:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "\n.min-height {\n  min-height: 100%;\n  min-height: 100vh;\n}\n", ""]);

// exports


/***/ }),

/***/ 668:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },

    components: {
        'app-header': __webpack_require__(669),
        'app-footer': __webpack_require__(684),
        'app-asside': __webpack_require__(689)
    },
    methods: {
        topFunction: function topFunction() {
            $('html, body').animate({ scrollTop: 0 }, 600);
        }
    }

});

/***/ }),

/***/ 669:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(670)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(672)
/* template */
var __vue_template__ = __webpack_require__(683)
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
Component.options.__file = "resources/assets/js/components/layout/AppHeader.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4a1548e0", Component.options)
  } else {
    hotAPI.reload("data-v-4a1548e0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 670:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(671);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("40ea9911", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4a1548e0\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppHeader.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4a1548e0\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppHeader.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 671:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 672:
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
        return {};
    },

    components: {
        'big-navigation': __webpack_require__(673),
        'small-navigation': __webpack_require__(678)
    },
    methods: {
        setCookies: function setCookies() {
            this.$cookies.set('accepted-cookies', 'true');
            $('.cookies').slideUp();
        }
    },
    computed: {
        showCookies: function showCookies() {
            if (this.$cookies.get('accepted-cookies') === 'true') {
                return false;
            }
            return true;
        }
    }

});

/***/ }),

/***/ 673:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(674)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(676)
/* template */
var __vue_template__ = __webpack_require__(677)
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
Component.options.__file = "resources/assets/js/components/layout/bigNav.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-75d9ea01", Component.options)
  } else {
    hotAPI.reload("data-v-75d9ea01", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 674:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(675);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("9f12ba4e", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-75d9ea01\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./bigNav.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-75d9ea01\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./bigNav.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 675:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 676:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    }
});

/***/ }),

/***/ 677:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "big-nav container hidden-sm-down" },
    [
      _c("router-link", { attrs: { to: "/" } }, [
        _c("img", {
          staticClass: "logo",
          attrs: { src: "/images/logo3.png", alt: "Logo" }
        })
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "big-nav-menu" }, [
        _c("div", { staticClass: "big-nav-item" }, [
          _c("a", { attrs: { href: "/login" } }, [
            _vm._v(_vm._s(_vm.trans("front.main.login")))
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "big-nav-item" }, [
          _c("a", { attrs: { href: "/geschaeftskundenportal" } }, [
            _vm._v(_vm._s(_vm.trans("backend.customer_business.title")))
          ])
        ])
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-75d9ea01", module.exports)
  }
}

/***/ }),

/***/ 678:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(679)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(681)
/* template */
var __vue_template__ = __webpack_require__(682)
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
Component.options.__file = "resources/assets/js/components/layout/smallNav.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6d4d6a9a", Component.options)
  } else {
    hotAPI.reload("data-v-6d4d6a9a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 679:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(680);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("8f50dc8c", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6d4d6a9a\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./smallNav.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6d4d6a9a\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./smallNav.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 680:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 681:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            isOpen: false
        };
    },

    methods: {
        opennav: function opennav() {
            this.isOpen = this.isOpen ? false : true;
            if (this.isOpen) {
                $('.small-nav').css('min-height', '600px');
                $('.small-nav').css('min-height', '100vh');
                $('#nav-icon2').css('left', '5px');
            } else {
                $('.small-nav').css('min-height', '70px');
                $('.small-nav').css('min-height', '70px');
                $('#nav-icon2').css('left', '0px');
            }
        }
    }

});

/***/ }),

/***/ 682:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "small-nav container hidden-md-up",
      staticStyle: { "min-height": "70px" }
    },
    [
      _c("div", { staticClass: "small-nav-menu" }, [
        _c("div", { staticClass: "small-nav-item" }, [
          _c("a", { attrs: { href: "/login" } }, [
            _vm._v(_vm._s(_vm.trans("front.main.login")))
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "small-nav-item" }, [
          _c("a", { attrs: { href: "/geschaeftskundenportal" } }, [
            _vm._v(_vm._s(_vm.trans("backend.customer_business.title")))
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "small-nav-open" }, [
        _c(
          "div",
          {
            class: { open: _vm.isOpen },
            attrs: { id: "nav-icon2" },
            on: { click: _vm.opennav }
          },
          [
            _c("span"),
            _vm._v(" "),
            _c("span"),
            _vm._v(" "),
            _c("span"),
            _vm._v(" "),
            _c("span"),
            _vm._v(" "),
            _c("span"),
            _vm._v(" "),
            _c("span")
          ]
        )
      ]),
      _vm._v(" "),
      _c("img", {
        staticClass: "small-nav-logo",
        attrs: { src: "/images/logo3.png", alt: "LOGO" }
      })
    ]
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-6d4d6a9a", module.exports)
  }
}

/***/ }),

/***/ 683:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("header", { staticClass: "app-header" }, [
    _vm.showCookies
      ? _c("div", { staticClass: "cookies" }, [
          _c("div", { staticClass: "container" }, [
            _c("p", [
              _vm._v(
                "\n                " + _vm._s(_vm.trans("frontend.main.cookie"))
              ),
              _c(
                "span",
                {
                  staticClass: "accept-cookies",
                  on: {
                    click: function($event) {
                      return _vm.setCookies()
                    }
                  }
                },
                [_vm._v(_vm._s(_vm.trans("frontend.main.accept")))]
              )
            ])
          ])
        ])
      : _vm._e(),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "navigation" },
      [_c("big-navigation"), _vm._v(" "), _c("small-navigation")],
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
    require("vue-hot-reload-api")      .rerender("data-v-4a1548e0", module.exports)
  }
}

/***/ }),

/***/ 684:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(685)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(687)
/* template */
var __vue_template__ = __webpack_require__(688)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-28e2e4ee"
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
Component.options.__file = "resources/assets/js/components/layout/AppFooter.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-28e2e4ee", Component.options)
  } else {
    hotAPI.reload("data-v-28e2e4ee", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 685:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(686);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("0db39baa", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-28e2e4ee\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppFooter.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-28e2e4ee\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppFooter.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 686:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "/*abstracts*/\n/*footer section*/\n.footer[data-v-28e2e4ee] {\n  padding-top: 10px;\n  padding-bottom: 10px;\n  background: #272727 !important;\n  color: #a9a9a9;\n  margin: auto 0 0 0;\n  min-height: 160px;\n  font-size: 14px;\n  /*footer info*/\n  /*footer special*/\n  /*footer map*/\n  /*footer subscribe*/\n}\n.footer *[data-v-28e2e4ee] {\n    font-size: 14px;\n}\n@media (max-width: 991px) {\n.footer[data-v-28e2e4ee] {\n    padding-bottom: 50px;\n}\n}\n.footer__info .footer-logo[data-v-28e2e4ee] {\n  width: 150px;\n  margin-bottom: 25px;\n}\n.footer__info .footer-logo img[data-v-28e2e4ee] {\n  max-width: 100%;\n}\n.footer__info p[data-v-28e2e4ee] {\n  line-height: 150%;\n  font-weight: 600;\n  font-size: 16px;\n}\n.footer__info a#link[data-v-28e2e4ee] {\n  text-decoration: none !important;\n  color: #fff !important;\n  margin-bottom: 10px !important;\n  display: block !important;\n}\n.footer__info a[data-v-28e2e4ee]:focus,\na[data-v-28e2e4ee]:hover {\n  text-decoration: none !important;\n}\n.footer__info a#link span[data-v-28e2e4ee] {\n  color: #3b5998;\n}\n@media (max-media: 767px) {\n.footer__company[data-v-28e2e4ee] {\n    padding-left: 25px;\n}\n}\n.footer__company .company__list[data-v-28e2e4ee] {\n  list-style: none;\n  padding-left: 0;\n}\n.footer__company .company__list--item[data-v-28e2e4ee]:not(:last-of-type) {\n  margin-bottom: 0;\n}\n.footer__company .company__list--link[data-v-28e2e4ee] {\n  text-decoration: none;\n  color: #a9a9a9;\n  -webkit-transition: all 0.5s ease-in-out;\n  transition: all 0.5s ease-in-out;\n  font-weight: 600;\n  font-size: 14px;\n}\n.footer__company .company__list--link[data-v-28e2e4ee]:hover {\n  color: #f6ab36;\n}\n@media (max-media: 767px) {\n.footer__map[data-v-28e2e4ee] {\n    padding-left: 25px;\n}\n}\n.footer__map .map__list[data-v-28e2e4ee] {\n  list-style: none;\n  padding-left: 0;\n}\n.footer__map .map__list--item[data-v-28e2e4ee]:not(:last-of-type) {\n  margin-bottom: 0;\n}\n.footer__map .map__list--link[data-v-28e2e4ee] {\n  text-decoration: none;\n  color: #a9a9a9;\n  -webkit-transition: all 0.5s ease-in-out;\n  transition: all 0.5s ease-in-out;\n  font-size: 14px;\n  font-weight: 600;\n}\n.footer__map .map__list--link[data-v-28e2e4ee]:hover {\n  color: #f6ab36;\n}\n.footer__heading[data-v-28e2e4ee] {\n  color: #fff;\n  font-size: 14px !important;\n  letter-spacing: 1px;\n  cursor: pointer;\n}\n.footer__subscribe[data-v-28e2e4ee] {\n  /*subscribe form*/\n}\n@media (max-media: 767px) {\n.footer__subscribe[data-v-28e2e4ee] {\n    padding-left: 25px;\n}\n}\n.footer__subscribe .social__list[data-v-28e2e4ee] {\n  padding-left: 0;\n  list-style: none;\n}\n.footer__subscribe .social__list--item[data-v-28e2e4ee] {\n  float: left;\n  cursor: pointer;\n}\n.footer__subscribe .social__list--item2 img[data-v-28e2e4ee] {\n  width: 60px;\n  float: left;\n  margin-right: 15px;\n  cursor: pointer;\n}\n.footer__subscribe .social__list--item2[data-v-28e2e4ee]:last-of-type {\n  background: #f7f7f8;\n}\n.footer__subscribe .social__list--item[data-v-28e2e4ee]:not(:last-of-type) {\n  margin-right: 10px;\n}\n.footer__subscribe .social__list--link[data-v-28e2e4ee] {\n  text-decoration: none;\n  color: #a9a9a9;\n  font-size: 25px;\n  -webkit-transition: all 0.5s ease-in-out;\n  transition: all 0.5s ease-in-out;\n}\n.footer__subscribe .social__list--link[data-v-28e2e4ee]:hover {\n  color: #f6ab36;\n}\n.subscribe__form[data-v-28e2e4ee] {\n  width: 100%;\n}\n.footer__subscribe .subscribe__form .sub-form[data-v-28e2e4ee] {\n  background: #1b1b1b;\n  border: 1px solid transparent;\n  border-radius: 5px;\n  position: relative;\n  width: 90%;\n}\n.footer__subscribe .subscribe__form .sub-form input[data-v-28e2e4ee] {\n  padding: 10px 15px;\n  border: none;\n  background: transparent;\n  width: 80%;\n}\n.footer__subscribe .subscribe__form .sub-form input[data-v-28e2e4ee]:focus {\n  outline: none;\n}\n@media (max-width: 400px) {\n.footer__subscribe .subscribe__form .sub-form input[data-v-28e2e4ee] {\n    font-size: 16px;\n}\n}\n.footer__subscribe .subscribe__form .sub-form button[data-v-28e2e4ee] {\n  position: absolute;\n  bottom: -1px;\n  top: -1px;\n  right: -10px;\n  background: #f6ab36;\n  border: none;\n  width: 25%;\n  border-radius: 5px;\n  border-top-left-radius: 0;\n  border-bottom-left-radius: 0;\n  color: #fff;\n  font-size: 20px;\n}\n\n/*footer section*/\n/*base*/\n/*start animation*/\n@-webkit-keyframes pulse-data-v-28e2e4ee {\n0% {\n    -webkit-transform: scale(1);\n            transform: scale(1);\n}\n50% {\n    -webkit-transform: scale(1.1);\n            transform: scale(1.1);\n}\n100% {\n    -webkit-transform: scale(1);\n            transform: scale(1);\n}\n}\n@keyframes pulse-data-v-28e2e4ee {\n0% {\n    -webkit-transform: scale(1);\n            transform: scale(1);\n}\n50% {\n    -webkit-transform: scale(1.1);\n            transform: scale(1.1);\n}\n100% {\n    -webkit-transform: scale(1);\n            transform: scale(1);\n}\n}\n\n/*start animation*/\n/*typography*/\nhtml[data-v-28e2e4ee] {\n  font-size: 60.25%;\n}\n.lato[data-v-28e2e4ee] {\n  font-family: \"Lato\", sans-serif;\n}\n.rale[data-v-28e2e4ee] {\n  font-family: \"Raleway\", sans-serif;\n}\n\n/*typography*/\n.main-heading[data-v-28e2e4ee] {\n  font-size: 32px;\n  margin-bottom: 25px;\n  color: #42474c;\n  position: relative;\n  margin: auto;\n  text-align: center;\n  margin-bottom: 50px;\n  padding-bottom: 25px;\n}\n.main-heading[data-v-28e2e4ee]::after {\n  content: \"\";\n  display: block;\n  width: 100px;\n  height: 1px;\n  background: #afafaf;\n  position: absolute;\n  left: 50%;\n  top: 80%;\n  -webkit-transform: translate(-50%, -50%);\n          transform: translate(-50%, -50%);\n}\n.paragraph[data-v-28e2e4ee] {\n  font-size: 18px;\n  line-height: 150%;\n  color: #a9a9a9;\n}\n\n/*classess*/\n.custom-padding[data-v-28e2e4ee] {\n  padding-left: 15px;\n  padding-right: 15px;\n}\n\n/*classess*/\n.footer__subscribe .subscribe__form .sub-form input[data-v-28e2e4ee]::-webkit-input-placeholder {\n  /* Chrome/Opera/Safari */\n  font-size: 16px;\n}\n.footer__subscribe .subscribe__form .sub-form input[data-v-28e2e4ee]::-moz-placeholder {\n  /* Firefox 19+ */\n  font-size: 16px;\n}\n.footer__subscribe .subscribe__form .sub-form input[data-v-28e2e4ee]::-ms-input-placeholder {\n  /* IE 10+ */\n  font-size: 16px;\n}\n.footer__subscribe .subscribe__form .sub-form input[data-v-28e2e4ee]::-moz-placeholder {\n  /* Firefox 18- */\n  font-size: 16px;\n}\n.custom-margin[data-v-28e2e4ee] {\n  margin-top: 10px;\n}\n.custom-margin2[data-v-28e2e4ee] {\n  margin-top: -10px !important;\n  border-radius: 5px !important;\n}\n.social__list--item2[data-v-28e2e4ee] {\n  margin-bottom: 10px;\n}\n", ""]);

// exports


/***/ }),

/***/ 687:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  }
});

/***/ }),

/***/ 688:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("section", { staticClass: "footer rale" }, [
      _c("div", { staticClass: "container" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-3 col-sm-4" }, [
            _c("div", { staticClass: "footer__info" }, [
              _c("div", { staticClass: "footer-logo" }, [
                _c("img", {
                  attrs: {
                    src: "/images/logoFooter.png",
                    alt: "mylogo",
                    draggable: "false"
                  }
                })
              ]),
              _vm._v(" "),
              _c(
                "a",
                {
                  attrs: {
                    href: "https://www.facebook.com/kurierlink",
                    target: "_blank",
                    id: "link"
                  }
                },
                [
                  _vm._v("\n            Follow us on\n            "),
                  _c("span", { staticClass: "fa fa-facebook-f" }),
                  _vm._v("acebook\n          ")
                ]
              ),
              _vm._v(" "),
              _c("p", [_vm._v("© 2018 Kurier link, Alle Rechte vorbehalten.")])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-2 col-sm-4" }, [
            _c("div", { staticClass: "footer__company" }, [
              _c("h4", { staticClass: "footer__heading" }, [
                _vm._v("Unternehmen")
              ]),
              _vm._v(" "),
              _c("ul", { staticClass: "company__list" }, [
                _c("li", { staticClass: "company__list--item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "company__list--link",
                      attrs: { href: "/" }
                    },
                    [_vm._v("Home")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "company__list--item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "company__list--link",
                      attrs: { href: "/register" }
                    },
                    [_vm._v("Registrieren")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "company__list--item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "company__list--link",
                      attrs: { href: "/register/aboutUs" }
                    },
                    [_vm._v("Über uns")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "company__list--item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "company__list--link",
                      attrs: { href: "/service" }
                    },
                    [_vm._v("Dienstleistung")]
                  )
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-2 col-sm-4" }, [
            _c("div", { staticClass: "footer__map" }, [
              _c("h4", { staticClass: "footer__heading" }, [
                _vm._v("Unterstützung")
              ]),
              _vm._v(" "),
              _c("ul", { staticClass: "map__list" }, [
                _c("li", { staticClass: "map__list--item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "map__list--link",
                      attrs: { href: "/contact" }
                    },
                    [_vm._v("Kontakt")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "map__list--item" }, [
                  _c(
                    "a",
                    { staticClass: "map__list--link", attrs: { href: "/faq" } },
                    [_vm._v("FAQ")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "map__list--item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "map__list--link",
                      attrs: { href: "/terms" }
                    },
                    [_vm._v("Nutzungsbedingungen")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "map__list--item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "map__list--link",
                      attrs: { href: "/terms" }
                    },
                    [_vm._v("Datenschutzbestimmungen")]
                  )
                ]),
                _vm._v(" "),
                _c("li", { staticClass: "map__list--item" }, [
                  _c(
                    "a",
                    {
                      staticClass: "map__list--link",
                      attrs: { href: "/impressum" }
                    },
                    [_vm._v("Impressum")]
                  )
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-5 col-sm-4" }, [
            _c("div", { staticClass: "footer__subscribe container-fluid" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "social" }, [
                  _c("h4", { staticClass: "footer__heading" }, [
                    _vm._v("zahlungsarten :")
                  ]),
                  _vm._v(" "),
                  _c(
                    "ul",
                    {
                      staticClass: "social__list clearfix",
                      staticStyle: {
                        display: "flex",
                        "flex-wrap": "wrap",
                        "align-items": "center"
                      }
                    },
                    [
                      _c("li", { staticClass: "social__list--item2" }, [
                        _c("img", {
                          attrs: { src: "/images/visa.svg", alt: "visa" }
                        })
                      ]),
                      _vm._v(" "),
                      _c("li", { staticClass: "social__list--item2" }, [
                        _c("img", {
                          attrs: { src: "/images/master.svg", alt: "master" }
                        })
                      ]),
                      _vm._v(" "),
                      _c("li", { staticClass: "social__list--item2" }, [
                        _c("img", {
                          staticClass: "custom-margin",
                          attrs: { src: "/images/pay.png", alt: "pay" }
                        })
                      ]),
                      _vm._v(" "),
                      _c("li", { staticClass: "social__list--item2" }, [
                        _c("img", {
                          attrs: { src: "/images/paypal.svg", alt: "paypal" }
                        })
                      ]),
                      _vm._v(" "),
                      _c("li", { staticClass: "social__list--item2" }, [
                        _c("img", {
                          attrs: { src: "/images/sepa.svg", alt: "paypal" }
                        })
                      ]),
                      _vm._v(" "),
                      _c("li", { staticClass: "social__list--item2" }, [
                        _c("img", {
                          staticStyle: {
                            height: "35px",
                            "margin-top": "0 !important"
                          },
                          attrs: { src: "/images/vorkasse.svg", alt: "paypal" }
                        })
                      ])
                    ]
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "subscribe__form" }, [
                  _c(
                    "form",
                    { staticClass: "sub-form", attrs: { action: "" } },
                    [
                      _c("input", {
                        attrs: {
                          type: "email",
                          placeholder:
                            "Geben Sie E-Mail ein, um Nachrichten zu erhalten",
                          required: ""
                        }
                      }),
                      _vm._v(" "),
                      _c("button", { staticClass: "subscribe-button" }, [
                        _c("span", { staticClass: "fab fa-telegram-plane" })
                      ])
                    ]
                  )
                ])
              ])
            ])
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-28e2e4ee", module.exports)
  }
}

/***/ }),

/***/ 689:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(690)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(692)
/* template */
var __vue_template__ = __webpack_require__(693)
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
Component.options.__file = "resources/assets/js/components/layout/AppAsside.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0bb988dc", Component.options)
  } else {
    hotAPI.reload("data-v-0bb988dc", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 690:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(691);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("256b485e", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0bb988dc\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppAsside.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0bb988dc\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppAsside.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 691:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 692:
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
//
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
    mounted: function mounted() {
        var _this = this;

        $('#toolbox').click(function () {
            $('.option-template-menu').toggleClass('right');
        });
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            _this.scrollFunction();
        };
        $('.color-list li a').click(function () {
            // console.log( $('link[href="main.css"]')); 

            $("link[data-type=themes]").attr({
                href: $(this).attr('themes')
            });
        });
    },

    methods: {
        scrollFunction: function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.getElementById("myBtn").classList.add('showbtn');
            } else {
                document.getElementById("myBtn").classList.remove('showbtn');
            }
        }
    }
});

/***/ }),

/***/ 693:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("aside", { staticClass: "option-template-menu" }, [
      _c(
        "span",
        { staticClass: "option-template-menu-open", attrs: { id: "toolbox" } },
        [_c("i", { staticClass: "fa fa-cog" })]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "menu-content" }, [
        _c("div", { staticClass: "apps-option-group" }, [
          _c("h5", [_vm._v(" Gradient Colors ")]),
          _vm._v(" "),
          _c("p", [
            _vm._v(
              "\n                choose one of our awesome gradient colors\n            "
            )
          ]),
          _vm._v(" "),
          _c("ul", { staticClass: "list-unstyled color-list" }, [
            _c("li", {}, [
              _c("a", { attrs: { themes: "css/theme_color_1.css" } })
            ]),
            _vm._v(" "),
            _c("li", {}, [
              _c("a", { attrs: { themes: "css/main_Color.css" } })
            ]),
            _vm._v(" "),
            _c("li", {}, [
              _c("a", { attrs: { themes: "css/theme_color_2.css" } })
            ]),
            _vm._v(" "),
            _c("li", {}, [
              _c("a", {
                attrs: { href: "css/gradient_colors/theme_color_4.css" }
              })
            ]),
            _vm._v(" "),
            _c("li", { staticClass: "active" }, [
              _c("a", {
                attrs: { href: "css/gradient_colors/theme_color_5.css" }
              })
            ]),
            _vm._v(" "),
            _c("li", {}, [
              _c("a", {
                attrs: { href: "css/gradient_colors/theme_color_6.css" }
              })
            ]),
            _vm._v(" "),
            _c("li", {}, [
              _c("a", {
                attrs: { href: "css/gradient_colors/theme_color_7.css" }
              })
            ]),
            _vm._v(" "),
            _c("li", {}, [
              _c("a", {
                attrs: { href: "css/gradient_colors/theme_color_8.css" }
              })
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "apps-option-group" }, [
          _c("h5", [_vm._v(" Custom Colors ")]),
          _vm._v(" "),
          _c("p", [
            _vm._v(
              "\n                You can also create your own color scheme in a minute.\n            "
            )
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-0bb988dc", module.exports)
  }
}

/***/ }),

/***/ 694:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticStyle: {
        "min-height": "100vh",
        display: "flex",
        "flex-direction": "column"
      }
    },
    [
      _c("app-header"),
      _vm._v(" "),
      _c(
        "button",
        {
          attrs: { id: "myBtn", title: "Go to top" },
          on: {
            click: function($event) {
              return _vm.topFunction()
            }
          }
        },
        [
          _c("i", {
            staticClass: "fa fa-angle-up animated",
            attrs: { id: "arrow" }
          })
        ]
      ),
      _vm._v(" "),
      _c("router-view"),
      _vm._v(" "),
      _c("app-footer")
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-4d5c9237", module.exports)
  }
}

/***/ })

});