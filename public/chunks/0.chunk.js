webpackJsonp([0],{

/***/ 100:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(101)
}
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(103)
/* template */
var __vue_template__ = __webpack_require__(104)
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

/***/ 101:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(102);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("40ea9911", content, false, {});
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

/***/ 102:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 103:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    }
});

/***/ }),

/***/ 104:
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
    return _c("header", { staticClass: "header" }, [
      _c("div", { staticClass: "navs", attrs: { id: "" } }, [
        _c("div", { staticClass: "sub-nav" }, [
          _c(
            "div",
            { staticClass: "container-fluid padding-zero header-top" },
            [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-sm-4 col-12 sub-right" }, [
                  _c("div", { staticClass: "test" }, [
                    _vm._v(
                      "\n\n                            Test right\n                        "
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-sm-8 col-12 sub-left" }, [
                  _c("div", { staticClass: "contact-info" }, [
                    _c("p", { staticClass: "contacts" }, [
                      _c("i", { staticClass: "fa fa-phone" }),
                      _vm._v(
                        " CALL US Now :\n\n                                "
                      ),
                      _c("span", [
                        _vm._v(
                          "\n                        0049(0)15151000558 \n                        "
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("a", { staticClass: "login" }, [
                      _vm._v(
                        "\n                                LogIn\n                        \n                            "
                      )
                    ])
                  ])
                ])
              ])
            ]
          )
        ]),
        _vm._v(" "),
        _c(
          "nav",
          {
            staticClass:
              "navbar sticky-top navbar-expand-lg navbar-light bg-light",
            attrs: { id: "navbar" }
          },
          [
            _c("div", { staticClass: "container" }, [
              _c(
                "button",
                {
                  staticClass: "navbar-toggler",
                  attrs: {
                    type: "button",
                    "data-toggle": "collapse",
                    "data-target": "#navbarTogglerDemo03",
                    "aria-controls": "navbarTogglerDemo03",
                    "aria-expanded": "false",
                    "aria-label": "Toggle navigation"
                  }
                },
                [_c("span", { staticClass: "navbar-toggler-icon" })]
              ),
              _vm._v(" "),
              _c("a", { staticClass: "navbar-brand", attrs: { href: "#" } }, [
                _c("img", {
                  staticClass: "img-fluid logo",
                  attrs: { src: "images/logo2.png", alt: "Logo" }
                })
              ]),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "collapse navbar-collapse",
                  attrs: { id: "navbarTogglerDemo03" }
                },
                [
                  _c("ul", { staticClass: "navbar-nav mr-auto" }, [
                    _c("li", { staticClass: "nav-item active" }, [
                      _c(
                        "a",
                        { staticClass: "nav-link", attrs: { href: "#" } },
                        [
                          _vm._v(" STARTSEITE  "),
                          _c("span", { staticClass: "sr-only" }, [
                            _vm._v("(current)")
                          ])
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        { staticClass: "nav-link", attrs: { href: "#" } },
                        [_vm._v("ÜBER UNS")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        { staticClass: "nav-link", attrs: { href: "#" } },
                        [_vm._v("SERVICE")]
                      )
                    ]),
                    _vm._v(" "),
                    _c("li", { staticClass: "nav-item" }, [
                      _c(
                        "a",
                        { staticClass: "nav-link", attrs: { href: "#" } },
                        [_vm._v("KONTAKT")]
                      )
                    ])
                  ])
                ]
              )
            ])
          ]
        )
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-4a1548e0", module.exports)
  }
}

/***/ }),

/***/ 105:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(106)
}
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(108)
/* template */
var __vue_template__ = __webpack_require__(109)
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

/***/ 106:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(107);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("821e00a2", content, false, {});
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

/***/ 107:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 108:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    }
});

/***/ }),

/***/ 109:
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
    return _c("div", [
      _c("footer", [
        _c("div", { staticClass: "back" }, [
          _c("div", { staticClass: "container" }, [
            _c("div", { staticClass: "row all" }, [
              _c("div", { staticClass: "col-sm-4 col-12 footer-item" }, [
                _c("h3", { staticClass: "title" }, [
                  _vm._v(
                    "\n                            Discover\n                        "
                  )
                ]),
                _vm._v(" "),
                _c("ul", { staticClass: "links" }, [
                  _c("li", [
                    _c("a", { attrs: { href: "#" } }, [_vm._v("Link 1")])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("a", { attrs: { href: "#" } }, [_vm._v("Link 1")])
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _c("a", { attrs: { href: "#" } }, [_vm._v("Link 1")])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4 col-12 footer-item" }, [
                _c("h3", { staticClass: "title" }, [
                  _vm._v(
                    "\n                            Do You need help?\n                        "
                  )
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "contact col-12" }, [
                  _c("i", { staticClass: "fa fa-phone" }),
                  _vm._v(" CALL US Now :\n\n                            "),
                  _c("span", [
                    _vm._v(
                      "\n                    0049(0)15151000558 \n                    "
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "contact col-12" }, [
                  _c("i", { staticClass: "fa fa-cog" }),
                  _vm._v(" service@fast-wheel.de\n                        ")
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-sm-4 col-12 footer-item" }, [
                _c("h3", { staticClass: "title" }, [
                  _vm._v(
                    "\n                            get in touch\n                        "
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "textwidget" }, [
                  _c("div", { staticClass: "ts-social-width" }, [
                    _c(
                      "a",
                      {
                        staticClass: "social-blocks",
                        attrs: { href: "#", target: "Facebook" }
                      },
                      [_c("i", { staticClass: "fa fa-facebook-f" })]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "ts-social-width" }, [
                    _c(
                      "a",
                      {
                        staticClass: "social-blocks",
                        attrs: { href: "#", target: "Twitter" }
                      },
                      [_c("i", { staticClass: "fa fa-twitter" })]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "ts-social-width" }, [
                    _c(
                      "a",
                      {
                        staticClass: "social-blocks",
                        attrs: { href: "#", target: "googleplus" }
                      },
                      [_c("i", { staticClass: "fa fa-google-plus" })]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "ts-social-width" }, [
                    _c(
                      "a",
                      {
                        staticClass: "social-blocks",
                        attrs: { href: "#", target: "linkedin" }
                      },
                      [_c("i", { staticClass: "fa fa-linkedin" })]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "footer-widget" }, [
                  _c("div", { staticClass: "textwidget" }, [
                    _c("p", [
                      _c("img", {
                        staticClass: "img-fluid",
                        attrs: {
                          src:
                            "http://event-theme.com/themes/gocourierwp/wp-content/uploads/2016/05/payment-1.png",
                          alt: "payment"
                        }
                      })
                    ])
                  ])
                ])
              ])
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "copyrights" }, [
        _c("div", { staticClass: "container" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-sm-6 col-12 rights" }, [
              _c("p", { staticClass: "copyright-text" }, [
                _c("span", [_vm._v("Courier")]),
                _vm._v(" © 2018. All Rights Reserved ")
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-sm-6 col-12  rights" }, [
              _c("p", { staticClass: "copyright-text terms" }, [
                _c("a", { attrs: { href: "#" } }, [_vm._v("Terms of Use")]),
                _vm._v(" and\n                        "),
                _c("a", { attrs: { href: "#" } }, [_vm._v("Privacy Policy")])
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

/***/ 110:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(111)
}
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(113)
/* template */
var __vue_template__ = __webpack_require__(114)
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

/***/ 111:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(112);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("256b485e", content, false, {});
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

/***/ 112:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 113:
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

/***/ 114:
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

/***/ 115:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
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

/***/ }),

/***/ 96:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(97)
}
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(99)
/* template */
var __vue_template__ = __webpack_require__(115)
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

/***/ 97:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(98);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("f4cacaf8", content, false, {});
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

/***/ 98:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 99:
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
        'app-header': __webpack_require__(100),
        'app-footer': __webpack_require__(105),
        'app-asside': __webpack_require__(110)
    },
    methods: {
        topFunction: function topFunction() {
            $('html, body').animate({ scrollTop: 0 }, 600);
        }
    }

});

/***/ })

});