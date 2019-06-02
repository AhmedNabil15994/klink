webpackJsonp([0],{

/***/ 189:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(192)
}
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(194)
/* template */
var __vue_template__ = __webpack_require__(220)
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

/***/ 192:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(193);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(4)("f4cacaf8", content, false, {});
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

/***/ 193:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(3)(false);
// imports


// module
exports.push([module.i, "\n.min-height {\n  min-height: 100%;\n  min-height: 100vh;\n}\n", ""]);

// exports


/***/ }),

/***/ 194:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },

    components: {
        'app-header': __webpack_require__(195),
        'app-footer': __webpack_require__(210),
        'app-asside': __webpack_require__(215)
    },
    methods: {
        topFunction: function topFunction() {
            $('html, body').animate({ scrollTop: 0 }, 600);
        }
    }

});

/***/ }),

/***/ 195:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(196)
}
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(198)
/* template */
var __vue_template__ = __webpack_require__(209)
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

/***/ 196:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(197);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(4)("40ea9911", content, false, {});
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

/***/ 197:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(3)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 198:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },

    components: {
        'big-navigation': __webpack_require__(199),
        'small-navigation': __webpack_require__(204)
    }

});

/***/ }),

/***/ 199:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(200)
}
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(202)
/* template */
var __vue_template__ = __webpack_require__(203)
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

/***/ 200:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(201);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(4)("9f12ba4e", content, false, {});
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

/***/ 201:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(3)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 202:
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


/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    }
});

/***/ }),

/***/ 203:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "big-nav container hidden-sm-down" }, [
    _c("img", {
      staticClass: "logo",
      attrs: { src: "/images/logo2.png", alt: "Logo" }
    }),
    _vm._v(" "),
    _c("div", { staticClass: "big-nav-menu" }, [
      _c("div", { staticClass: "big-nav-item" }, [
        _c("a", { attrs: { href: "#" } }, [
          _vm._v(_vm._s(_vm.trans("front.main.startPage")))
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "big-nav-item" }, [
        _c("a", { attrs: { href: "#" } }, [
          _vm._v(_vm._s(_vm.trans("front.main.about")))
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "big-nav-item" }, [
        _c("a", { attrs: { href: "#" } }, [
          _vm._v(_vm._s(_vm.trans("front.main.service")))
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "big-nav-item" }, [
        _c("a", { attrs: { href: "#" } }, [
          _vm._v(_vm._s(_vm.trans("front.main.contact")))
        ])
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
    require("vue-hot-reload-api")      .rerender("data-v-75d9ea01", module.exports)
  }
}

/***/ }),

/***/ 204:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(205)
}
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(207)
/* template */
var __vue_template__ = __webpack_require__(208)
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

/***/ 205:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(206);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(4)("8f50dc8c", content, false, {});
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

/***/ 206:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(3)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 207:
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

/***/ 208:
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
          _c("a", { attrs: { href: "#" } }, [
            _vm._v(_vm._s(_vm.trans("front.main.startPage")))
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "small-nav-item" }, [
          _c("a", { attrs: { href: "#" } }, [
            _vm._v(_vm._s(_vm.trans("front.main.about")))
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "small-nav-item" }, [
          _c("a", { attrs: { href: "#" } }, [
            _vm._v(_vm._s(_vm.trans("front.main.service")))
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "small-nav-item" }, [
          _c("a", { attrs: { href: "#" } }, [
            _vm._v(_vm._s(_vm.trans("front.main.contact")))
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
        attrs: { src: "/images/logo2.png", alt: "LOGO" }
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

/***/ 209:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("header", { staticClass: "app-header" }, [
    _c("div", { staticClass: "sub-navs" }, [
      _c("div", { staticClass: "subs-container container" }, [
        _c("div", { staticClass: "sub-left" }, [
          _c("div", { staticClass: "test" }, [
            _vm._v(
              "\n                    " +
                _vm._s(_vm.trans("front.main.testRight")) +
                "\n                "
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "sub-right" }, [
          _c(
            "div",
            { staticClass: "contact-info" },
            [
              !_vm.$auth.isAuth()
                ? _c(
                    "router-link",
                    { staticClass: "login-head", attrs: { to: "/login" } },
                    [_c("a", [_vm._v(_vm._s(_vm.trans("front.main.login")))])]
                  )
                : _c(
                    "router-link",
                    { staticClass: "login-head", attrs: { to: "/logout" } },
                    [_c("a", [_vm._v(_vm._s(_vm.trans("front.main.logout")))])]
                  ),
              _vm._v(" "),
              _c("div", { staticClass: "contacts" }, [
                _c("span", { staticClass: "phonenum" }, [
                  _vm._v(
                    "\n                             0049(0)15151000558\n                        "
                  )
                ]),
                _vm._v(" "),
                _c("span", { staticClass: "callus" }, [
                  _vm._v(_vm._s(_vm.trans("front.main.callUs")))
                ]),
                _vm._v(" "),
                _c("img", {
                  attrs: { src: "/images/call-answer.svg", alt: "Call us" }
                })
              ])
            ],
            1
          )
        ])
      ])
    ]),
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

/***/ 210:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(211)
}
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(213)
/* template */
var __vue_template__ = __webpack_require__(214)
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

/***/ 211:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(212);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(4)("821e00a2", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-28e2e4ee\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppFooter.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-28e2e4ee\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/sass-loader/lib/loader.js!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./AppFooter.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 212:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(3)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 213:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
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

/***/ 214:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div")
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-28e2e4ee", module.exports)
  }
}

/***/ }),

/***/ 215:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(216)
}
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(218)
/* template */
var __vue_template__ = __webpack_require__(219)
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

/***/ 216:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(217);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(4)("256b485e", content, false, {});
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

/***/ 217:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(3)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 218:
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

/***/ 219:
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

/***/ 220:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "min-height" },
    [
      _c("app-header"),
      _vm._v(" "),
      _c(
        "button",
        {
          attrs: { id: "myBtn", title: "Go to top" },
          on: {
            click: function($event) {
              _vm.topFunction()
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
      _c("app-asside"),
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
