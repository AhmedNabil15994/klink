webpackJsonp([1],{

/***/ 650:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(709)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(711)
/* template */
var __vue_template__ = __webpack_require__(738)
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
Component.options.__file = "resources/assets/js/components/pages/orders/neworder/neworder.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4661eff2", Component.options)
  } else {
    hotAPI.reload("data-v-4661eff2", Component.options)
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

/***/ 709:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(710);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("b6890e00", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4661eff2\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./neworder.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-4661eff2\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./neworder.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 710:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "\nsvg g text {\n  font-size: 18px !important;\n}\n.vue-rate-it-rating {\n  margin: 0 auto;\n}\n.rating-input-child {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n}\n.rating-input-child > div {\n    display: inline;\n    margin: 0 auto;\n    padding-right: 12px;\n}\n", ""]);

// exports


/***/ }),

/***/ 711:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__inputs__ = __webpack_require__(712);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/**
 * this is the craate order page
 */

/* harmony default export */ __webpack_exports__["default"] = ({
  /**
   * @description
   * @returns {
   *  order : the order wich we gonna deal with
   *  shippings : all the shipping in the site (used to calculate fit ships and the price)
   *  loading : this is a global variable that supposed to show and hide loading
   *  notfound : if the order is not found //Todo : show user all other orders
   *  loadingtime : set to 5 (init loading time and min loading time)
   *  inputs: required from './inputs' thats used to render input-parent components
   *  and used here to render the form
   *
   * }
   *
   */
  data: function data() {
    return {
      order: {
        person: 1
      },
      shippings: [],
      distances: [],

      loading: true,
      notFound: true,
      fixedError: false,
      loadingTime: 5,
      inputs: __WEBPACK_IMPORTED_MODULE_0__inputs__["a" /* default */],
      isStored: false,
      isChanged: false,
      currentShow: "goods"
    };
  },


  /**
   * @description
   * Vue hook created
   * we use this to get the order from orders.js then we make expected
   */
  created: function created() {
    var _this = this;

    this.$http.get("/api/shipping/getAll").then(function (response) {
      _this.shippings = response.body[0];
      _this.distances = response.body[1];
    });
    this.createdFunc(this.$route.params.orderId);
  },
  beforeRouteUpdate: function beforeRouteUpdate(to, from, next) {
    this.createdFunc(to.params.orderId);

    next();
  },


  /**
   * @description
   *
   */
  mounted: function mounted() {
    var _this2 = this;

    setTimeout(function () {
      //render every img with class "svg" to svg element
      _this2.$genF.svg();
    }, 500);
  },

  computed: {
    isDirty: function isDirty() {
      var _this3 = this;

      var dirty = false;
      var inputs = [trans("front.create.width"), trans("front.create.height"), trans("front.create.length")];
      inputs.forEach(function (input) {
        if (_this3.fields[input] && _this3.fields[input].dirty === true) {
          dirty = true;
        }
      });

      return dirty;
    },
    formData: function formData() {
      var _this4 = this;

      this.order.distance = Number(this.order.orderRoute.routes[0].legs[0].distance.value / 1000);
      this.order.duration = Number(this.order.orderRoute.routes[0].legs[0].duration.value / 60) + (Number(this.order.orderRoute.routes[0].legs[0].duration.value % 60) > 30 ? 1 : 0);
      this.order.encryptedId = this.$route.params.orderId;
      var toBeSendOrder = Object.assign({}, this.order);
      toBeSendOrder.orderRoute = {};
      return {
        url: "/api/orders/neworder",
        data: toBeSendOrder,
        validate: this.$validator,
        successServer: function successServer(data) {
          _this4.$orders.removeOrder(_this4.order);
          if (data.body[0].id === _this4.order.id) {
            _this4.currentShow = "senderReceiver";
            return false;
          }
          _this4.$router.push("/order/create_order/" + data.body[1]);
        }
      };
    },

    /**
     * @param  {} {returntrans('front.create.personsPlaceholer'
     * @param  {} .replace('{{time}}'
     * @param  {} this.order.time
     * @param  {} }
     */

    personsPlaceHolder: function personsPlaceHolder() {
      return trans("front.create.personsPlaceholer").replace("{{time}}", this.order.time);
    },


    /**
     * @description
     * @returns {any}
     * passed as prop to the time slider
     * the time slider is an input-parent component
     * please look at './inputs.js'
     */
    loadingTimeText: function loadingTimeText() {
      return this.loadingTime + " min";
    },


    /**
     * @description
     * this is used to show / hide <order-pricing>
     * by detecting if the user input is valid and completed
     * @returns {
     *  true || false
     * }
     */
    NotDisabled: function NotDisabled() {
      if (!this.checkedAndErrors) {
        return false;
      }
      for (var key in this.fields) {
        var field = this.fields[key];

        if (!field.valid) {
          return false;
        }
      }
      return true;
    },
    checkedAndErrors: function checkedAndErrors() {
      if (this.errors.has(trans("front.create.weightName")) || !this.order.weight) {
        return false;
      }

      if (!this.order.orderRoute || !this.order.orderRoute.routes) {
        return false;
      }

      var field = this.fields[trans("front.create.weightName")];

      if (!field) {
        return false;
      }
      if (!this.order.status) {
        if (field.touched === false && field.required === true && field.dirty === false) {
          return false;
        }
      }
      return true;

      // if (!this.order.status) {

      //     for (var key in this.fields) {
      //         var field = this.fields[key]
      //         if (field.touched === false && field.required === true && field.dirty === false) {

      //             return false;
      //         }
      //     }
      // }
      // return true;
    }
  },
  methods: {
    /**
     * @description
     * changes order time from the input
     * @param {any} e
     */
    StepTo: function StepTo(e) {
      if (e === "senderReceiver") {
        if (!this.checkedAndErrors || !this.NotDisabled) {
          return false;
        }
      }
      this.currentShow = e;
    },
    changeTimeInput: function changeTimeInput(e) {
      this.order.time = e;
    },

    /**
     * @description
     *
     * @param {any} e
     */
    getShippings: function getShippings(shippings) {
      this.shippings = shippings;
    },


    /**
     * @description
     * please visit vss.js for more
     * @returns {any}
     */
    acceptAndGo: function acceptAndGo(e) {
      this.$vss.post(this.formData);
    },


    /**
     * @description
     * @param {any} marker
     * @returns {any}
     */
    getMapPosition: function getMapPosition(marker) {
      if (!marker) {
        return {
          lat: "",
          lng: ""
        };
      }
      marker = marker.split(",");
      return {
        lat: Number(marker[0]),
        lng: Number(marker[1])
      };
    },

    /**
     * @description
     */

    createdFunc: function createdFunc(orderId) {
      var _this5 = this;

      this.loading = true;
      this.notFound = true;
      this.isChanged = false;
      this.order = {
        person: 1
      };
      this.$orders.getOrder(orderId).then(function (response) {
        var expected = {
          width: "",
          height: "",
          length: "",
          time: 5,
          person: 1,
          weight: "",
          items: 1,
          cost: "",
          ship_id: 0,
          description: "",
          orderRoute: {},
          bill_to: "sender",
          sender: {
            first_name: "",
            nick_name: "",
            phone: "",
            email: "",
            isCompany: "person"
          },
          receiver: {
            first_name: "",
            nick_name: "",
            phone: "",
            email: "",
            isCompany: "person"
          },
          otherbilling: {
            first_name: "",
            nick_name: "",
            phone: "",
            email: "",
            isCompany: "person"
          },
          dating: {
            load_from: window.moment(new Date().setMinutes(0)).add("2", "hours"),
            load_up: window.moment(new Date().setMinutes(0)).add("8", "hours"),
            delivery_from: window.moment(new Date().setMinutes(0)).add("2", "hours"),
            delivery_until: window.moment(new Date().setMinutes(0)).add("3", "hours")
          }
        };
        if (response.isStored) {
          response.from = response.source;
          response.from_map = response.source_location;
          response.to_map = response.destination_location;
          response.to = response.destination;
          _this5.isStored = response.isStored;
          if (response.isStored) {
            _this5.currentShow = "senderReceiver";
          }
        }

        for (var key in expected) {
          if (!response[key]) {
            response[key] = expected[key];
          }
        }

        if (response["other_billing"] && response["other_billing"]["first_name"]) {
          response["otherbilling"] = response["other_billing"];
        }
        if (response["sender"]["company"]) {
          response["sender"]["isCompany"] = "company";
        } else {
          response["sender"]["isCompany"] = "person";
        }
        if (response["receiver"]["company"]) {
          response["receiver"]["isCompany"] = "company";
        } else {
          response["receiver"]["isCompany"] = "person";
        }
        if (response["otherbilling"]["company"]) {
          response["otherbilling"]["isCompany"] = "company";
        } else {
          response["otherbilling"]["isCompany"] = "person";
        }
        _this5.order = response;

        // this.helpers.weight = '50';
        _this5.loading = false;
        _this5.$nextTick(function () {
          _this5.$genF.svg();
        });
        _this5.notFound = false;
        _this5.$nextTick(function () {
          _this5.$refs.mapWrapper.goto();
        });
      }, function (error) {
        console.log(error);
        _this5.loading = false;
        _this5.$nextTick(function () {
          _this5.$genF.svg();
        });
      });
    }
  },
  watch: {
    currentShow: function currentShow(newval, oldval) {
      this.isChanged = false;
    }
  },
  components: {
    "order-box-wrapper": __webpack_require__(713),
    "order-pricing": __webpack_require__(718),
    "order-info-form": __webpack_require__(723),
    "order-wizard": __webpack_require__(728),
    "order-information": __webpack_require__(733)
  }
});

/***/ }),

/***/ 712:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var inputs = [{
    props: {
        name: trans('front.create.weightName'),
        placeholder: trans('front.create.weight'),
        img: '/images/food-scale-tool.svg',
        validate: 'required|decimal:3|min_value:1',
        id: 'weightInput',
        newclasses: {
            'half-width': true,
            'odd': true
        },
        numeric: true,
        autoFocus: true

    },
    model: 'weight'
}, {
    props: {
        name: trans('front.create.number'),
        validate: 'required|decimal:3|min_value:1',
        placeholder: trans('front.create.number'),
        id: "NumberOfItems",
        img: "/images/boxes.svg",
        newclasses: {
            'half-width': true,
            'even': true
        },
        numeric: true
    },
    model: 'items'
}, {
    props: {
        mulitiple: true,
        title: trans('front.create.totalSize'),
        id: 'coordinates',
        name: 'coordinates'

    },
    inputs: [{
        props: {
            name: trans('front.create.width'),
            placeholder: trans('front.create.width'),
            validate: 'required|decimal:3|min_value:1'
        },
        model: 'width'
    }, {
        props: {
            name: trans('front.create.length'),
            placeholder: trans('front.create.length'),
            validate: 'required|decimal:3|min_value:1'
        },
        model: 'length'
    }, {
        props: {
            name: trans('front.create.height'),
            placeholder: trans('front.create.height'),
            validate: 'required|decimal:3|min_value:1'
        },
        model: 'height'
    }]
}, {

    props: {
        name: trans('front.create.persons'),
        placeholder: trans('front.create.personsPlaceholer'),
        img: trans('front.create.personstooltip').replace('{{time}}', 5),
        validate: 'required|decimal:3|min_value:1',
        id: 'orderPersons',
        type: 'carrier',
        newclasses: {
            'half-width': true,
            'odd': true
        }

    },
    model: 'person'

}, {

    props: {
        name: trans('front.create.orderTime'),
        placeholder: trans('front.create.orderPlaceHolder'),
        validate: 'required|decimal:3|min_value:1',
        id: 'OrderTime',
        type: 'time',
        newclasses: {
            'half-width': true,
            'even': true
        }

    },
    model: 'time'

}, {
    props: {
        name: 'description',
        placeholder: trans('front.create.desc'),
        id: "description",
        type: 'textArea',
        validate: 'required'

    },
    model: 'description'
}];
/* harmony default export */ __webpack_exports__["a"] = (inputs);

/***/ }),

/***/ 713:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(714)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(716)
/* template */
var __vue_template__ = __webpack_require__(717)
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
Component.options.__file = "resources/assets/js/components/pages/orders/neworder/orderBox.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-da61ab14", Component.options)
  } else {
    hotAPI.reload("data-v-da61ab14", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 714:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(715);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("d7e62368", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-da61ab14\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderBox.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-da61ab14\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderBox.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 715:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 716:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },
    created: function created() {},
    mounted: function mounted() {},

    computed: {},
    props: {
        order: {
            required: true

        }
    },
    watch: {
        'order.cost': function orderCost(newval, oldval) {
            if (newval !== oldval && document.getElementsByClassName('ani-circle')[0]) {
                var _iteratorNormalCompletion = true;
                var _didIteratorError = false;
                var _iteratorError = undefined;

                try {
                    for (var _iterator = document.getElementsByClassName('ani-circle')[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                        var element = _step.value;

                        element.beginElement();
                    }
                } catch (err) {
                    _didIteratorError = true;
                    _iteratorError = err;
                } finally {
                    try {
                        if (!_iteratorNormalCompletion && _iterator.return) {
                            _iterator.return();
                        }
                    } finally {
                        if (_didIteratorError) {
                            throw _iteratorError;
                        }
                    }
                }
            }
        }
    }

});

/***/ }),

/***/ 717:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "order-data" }, [
    _c("div", { staticClass: "order-data-box" }, [
      _c("img", { attrs: { src: "/images/distance.svg", alt: "" } }),
      _vm._v(" "),
      _c("div", { staticClass: "order-data-info" }, [
        _c("div", { staticClass: "order-info-head" }, [
          _vm._v(_vm._s(_vm.trans("front.create.distance")))
        ]),
        _vm._v(" "),
        _vm.order.orderRoute && _vm.order.orderRoute.routes
          ? _c("div", { staticClass: "order-info-value" }, [
              _vm._v(
                _vm._s(_vm.order.orderRoute.routes[0].legs[0].distance.text)
              )
            ])
          : _vm.order.distance
          ? _c("div", { staticClass: "order-info-value" }, [
              _vm._v(_vm._s(_vm.order.distance))
            ])
          : _vm._e()
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "order-data-box" }, [
      _c("img", { attrs: { src: "/images/stopwatch.svg", alt: "" } }),
      _vm._v(" "),
      _c("div", { staticClass: "order-data-info" }, [
        _c("div", { staticClass: "order-info-head" }, [
          _vm._v(_vm._s(_vm.trans("front.create.duration")))
        ]),
        _vm._v(" "),
        _vm.order.orderRoute && _vm.order.orderRoute.routes
          ? _c("div", { staticClass: "order-info-value" }, [
              _vm._v(
                _vm._s(_vm.order.orderRoute.routes[0].legs[0].duration.text)
              )
            ])
          : _vm._e()
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "order-data-box" }, [
      _c("img", {
        staticClass: "svg",
        attrs: { src: "/images/euro.svg", alt: "" }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "order-data-info" }, [
        _c("div", { staticClass: "order-info-head" }, [
          _vm._v(_vm._s(_vm.trans("front.create.cost")))
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "order-info-value" }, [
          _vm._v(_vm._s(_vm.order.cost))
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
    require("vue-hot-reload-api")      .rerender("data-v-da61ab14", module.exports)
  }
}

/***/ }),

/***/ 718:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(719)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(721)
/* template */
var __vue_template__ = __webpack_require__(722)
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
Component.options.__file = "resources/assets/js/components/pages/orders/neworder/orderPricing.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0132d571", Component.options)
  } else {
    hotAPI.reload("data-v-0132d571", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 719:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(720);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("36c55093", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0132d571\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderPricing.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-0132d571\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderPricing.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 720:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "\n.letsComplete {\n  padding: 0.215rem 0.75rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 721:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      smallLoading: false,

      carouselChanging: false,
      startIndex: 0
    };
  },
  created: function created() {},
  mounted: function mounted() {
    var _this = this;

    if (!this.$parent.isStored) {
      this.$nextTick(function () {
        _this.animateCarsouel();
      });
    }
  },

  computed: {
    orderVehicles: function orderVehicles() {
      var _this2 = this;

      var distance = Number(this.order.orderRoute.routes[0].legs[0].distance.value / 1000);
      var availableShippingTypes = this.distances.filter(function (distance_type) {
        return distance >= distance_type.min && distance <= distance_type.max;
      });
      var availableShippingType = availableShippingTypes[0];

      var avalilableShips = this.shippings.filter(function (shipping) {
        if (_this2.isDirty) {
          return Number(shipping.pay_load_max) >= Number(_this2.order.weight) && Number(shipping.length) >= Number(_this2.order.length) * 10 && Number(shipping.width) >= Number(_this2.order.width) * 10 && Number(shipping.height) >= Number(_this2.order.height) * 10;
        }
        return Number(shipping.pay_load_max) >= Number(_this2.order.weight)
        // Number(shipping.length) >= Number(this.order.length) *10&&
        // Number(shipping.width) >= Number(this.order.width)*10 &&
        // Number(shipping.height) >= Number(this.order.height)*10
        ;
      });
      if (avalilableShips.length < 1) {
        //Todo : show user error :)
        if (!this.snotified) {
          this.snotified = this.$snotify.warning(trans("front.create.noVehilcles"), trans("front.create.noVehilclesHead"), {
            timeout: 0,
            pauseOnHover: true
          });
        }
        this.order.ship_id = 0;
        return [];
      } else {
        if (this.snotified) {
          this.$snotify.remove(this.snotified.id);
          this.snotified = null;
        }
      }
      avalilableShips = avalilableShips.filter(function (shipping) {
        var shippingHasThisCost = shipping.costs.filter(function (cost) {
          return cost.distance_id === availableShippingType.id;
        });
        return shippingHasThisCost.length >= 1;
      });

      if (this.$parent.isStored && !this.$parent.isChanged) {
        avalilableShips.forEach(function (ship, index) {
          if (_this2.order.ship_id === ship.id) {
            _this2.startIndex = index;
          }
        });
        this.$parent.isChanged = true;
      } else {
        this.startIndex = 0;
        if (!this.isDirty) {
          this.order.width = avalilableShips[0].width / 10;
          this.order.height = avalilableShips[0].height / 10;
          this.order.length = avalilableShips[0].length / 10;
        }
        this.order.ship_id = avalilableShips[0].id;
      }

      return [avalilableShips, availableShippingType.id];
    }
  },
  methods: {
    /**
     * @param  {Array} orderVehicles
     */
    slideChange: function slideChange(e) {
      if (this.orderVehicles[0][e]) {
        if (!this.isDirty) {
          this.order.width = this.orderVehicles[0][e].width / 10;
          this.order.height = this.orderVehicles[0][e].height / 10;
          this.order.length = this.orderVehicles[0][e].length / 10;
        }
        this.order.ship_id = this.orderVehicles[0][e].id;
      }
    },
    acceptAndGo: function acceptAndGo(e) {
      this.$emit("acceptAndGo", e);
    },
    price: function price(orderVehicles) {
      if (this.distances.length) {
        var distance = Number(this.order.orderRoute.routes[0].legs[0].distance.value / 1000);
        var mins = Number(this.order.orderRoute.routes[0].legs[0].duration.value / 60) + (Number(this.order.orderRoute.routes[0].legs[0].duration.value % 60) > 30 ? 1 : 0);
        // var orderVehicles = this.orderVehicles();
        if (!orderVehicles[0] || !orderVehicles[0].length) {
          //Todo : alert user there is no match car

          return [];
        }
        var typeid = orderVehicles[1];
        var orderVehicle = orderVehicles[0];

        var orderCost = orderVehicle.costs.filter(function (cost) {
          return cost.distance_id === typeid;
        });

        var loadTime = this.order.time - orderVehicle.specs.min_load_time;
        var cost_per_unit = loadTime * orderVehicle.specs.cost_per_unit;
        var persons = this.order.person - 1;
        var cost_per_person = persons * (loadTime + mins) * orderVehicle.specs.cost_per_person;
        orderCost = orderCost[0];
        if (orderCost.cost_per_kilo * distance < orderCost.min_cost) {
          var newprice = (orderCost.min_cost + cost_per_unit + cost_per_person).toFixed(2);
          this.changeOrderPrice(newprice, orderVehicle.id);
          return [newprice, orderVehicle];
        } else {
          var newprice = (orderCost.cost_per_kilo * distance + cost_per_unit + cost_per_person).toFixed(2);
          this.changeOrderPrice(newprice, orderVehicle.id);
          return [newprice, orderVehicle];
        }
      }
    },
    vehicleChanged: function vehicleChanged(e) {
      // console.log(e)

      this.order.ship_id = e;
    },
    animateCarsouel: function animateCarsouel() {
      var _this3 = this;

      if (!this.$refs.vehicleCarsouel) {
        return false;
      } else {
        window.ahmedcar = this.$refs.vehicleCarsouel;

        this.$refs.vehicleCarsouel.goNext();

        if (this.$refs.vehicleCarsouel.currentIndex === 0) {
          return false;
        }
        setTimeout(function () {
          _this3.animateCarsouel();
        }, 200);
      }
    },
    changeOrderPrice: function changeOrderPrice(newprice, orderVehicle) {
      if (this.order.ship_id === orderVehicle) {
        this.order.cost = newprice;
      }
    }
  },
  components: {
    "vehicle-show": __webpack_require__(655)
  },
  props: {
    order: {
      required: true
    },
    shippings: {
      required: true
    },
    distances: {
      required: true
    },
    NotDisabled: {
      required: true,
      default: true
    },
    isDirty: {
      required: true,
      default: false
    }
  },
  watch: {
    orderVehicles: function orderVehicles(newval, oldval) {
      var _this4 = this;

      this.carouselChanging = true;
      this.$nextTick(function () {
        _this4.carouselChanging = false;
      });
    }
  }
});

/***/ }),

/***/ 722:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "order-pricing" },
    [
      _vm.orderVehicles[0] &&
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
                width: 300
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
                      ship_id: _vm.order.ship_id,
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
        : _vm._e(),
      _vm._v(" "),
      _c("div", { staticClass: "small-order-cell completeIt" }, [
        _c(
          "button",
          {
            staticClass: "letsComplete btn",
            staticStyle: { "min-height": "40px" },
            attrs: { role: "button" },
            on: {
              click: function($event) {
                $event.preventDefault()
                return _vm.acceptAndGo($event)
              }
            }
          },
          [
            _vm._v(
              "\n      " +
                _vm._s(_vm.trans("front.create.saveOrder")) +
                "\n      "
            ),
            _vm.NotDisabled
              ? _c("img", { attrs: { src: "/images/loading.svg", alt: "" } })
              : _vm._e()
          ]
        )
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
    require("vue-hot-reload-api")      .rerender("data-v-0132d571", module.exports)
  }
}

/***/ }),

/***/ 723:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(724)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(726)
/* template */
var __vue_template__ = __webpack_require__(727)
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
Component.options.__file = "resources/assets/js/components/pages/orders/neworder/orderInfoForm.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6d683712", Component.options)
  } else {
    hotAPI.reload("data-v-6d683712", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 724:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(725);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("55d6ff02", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6d683712\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderInfoForm.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-6d683712\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderInfoForm.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 725:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 726:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            sideMapOptions: {
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                fullscreenControl: false

            },
            mapCenter: {
                lat: 51.165691,
                lng: 10.451526
            },
            mapZoom: 6,
            markerAnimation: 1,
            isFullScreen: false

        };
    },

    computed: {
        fullScreenSource: function fullScreenSource() {
            if (!this.isFullScreen) {

                return '/images/switch-to-full-screen-button.svg';
            }
            return '/images/full-screen-exit.svg';
        }
    },
    props: {
        order: {
            required: true

        }
    },
    methods: {
        setAutoCompleteInFullScreen: function setAutoCompleteInFullScreen() {
            var _this = this;

            if ($(".pac-container").length === 0) {
                setTimeout(function () {
                    _this.setAutoCompleteInFullScreen();
                }, 500);
            } else {
                $(".pac-container").prependTo("#mapMoveHere");
            }
            if ($('.snotify').parent().length !== 0) {
                $('.snotify').parent().prependTo('#mapMoveHere');
            }
        },
        setPlaceViaAutoComplete: function setPlaceViaAutoComplete(place, placeToBeChanged) {

            if (!this.validatePlace(place)) {
                return false;
            }

            if (place && place.geometry) {
                this.order[placeToBeChanged] = place.formatted_address;
                this.order[placeToBeChanged + '_map'] = place.geometry.location.lat() + ',' + place.geometry.location.lng();
                this.goto();
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
        setPlaceViaMarker: function setPlaceViaMarker(event, placeToBeChanged) {
            var _this2 = this;

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
                        // $('#ToGeoAdress').val(results[1].formatted_address)
                        _this2.order[placeToBeChanged] = results[1].formatted_address;
                        $('#Order' + placeToBeChanged + 'GeoAddress').val(_this2.order[placeToBeChanged]);
                        _this2.order[placeToBeChanged + '_map'] = event.latLng.lat() + ',' + event.latLng.lng();
                        _this2.$nextTick(function () {
                            _this2.goto();
                        });
                        // alert(results[1].formatted_address);
                    } else {
                        alert('No results found');
                    }
                }
            });
        },
        changeMapCenter: function changeMapCenter(e) {
            var _this3 = this;

            this.mapCenter = {
                lat: 51.165691,
                lng: 10.451526
            };
            this.mapZoom = 6;
            this.$nextTick(function () {
                _this3.mapCenter = e.latLng;
                _this3.mapZoom = 18;
            });
        },
        changeFullScreenMode: function changeFullScreenMode() {

            if (this.isFullScreen === false) {
                var fullScreenElement = this.$refs.orderInfoForm;

                var fullScren = fullScreenElement.requestFullscreen || fullScreenElement.msRequestFullscreen || fullScreenElement.mozRequestFullScreen || fullScreenElement.webkitRequestFullscreen;

                // console.log(fullScreenElement[fullScren])
                fullScren.call(fullScreenElement);
            } else {
                var exitFull = document.exitFullscreen || document.msExitFullscreen || document.mozExitFullscreen || document.webkitExitFullscreen;
                exitFull.call(document);
            }
        },
        exitHandler: function exitHandler(e) {
            if (document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement !== null) {
                if (this.isFullScreen === false) {

                    $('.kurier-link-main-container').addClass('max-height');
                } else {
                    $('.kurier-link-main-container').removeClass('max-height');
                }
                this.isFullScreen = !this.isFullScreen;
            }
        },
        goto: function goto() {
            var _this4 = this;

            if (!(window.google && window.google.maps && this.$refs.map && this.$refs.map.$mapObject)) {

                setTimeout(function () {

                    return _this4.goto();
                }, 250);
            } else {
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
                this.directionsDisplay.setMap(this.$refs.map.$mapObject);
                var from = this.$parent.getMapPosition(this.order.from_map);
                var to = this.$parent.getMapPosition(this.order.to_map);
                var start = new window.google.maps.LatLng(from.lat, from.lng);
                var end = new window.google.maps.LatLng(to.lat, to.lng);
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode['DRIVING']
                };

                directionsService.route(request, function (result, status) {
                    if (status == 'OK') {
                        _this4.order.orderRoute = {};
                        _this4.$nextTick(function () {

                            _this4.order.orderRoute = result;
                            _this4.$parent.isChanged = false;
                        });

                        _this4.directionsDisplay.setDirections(result);
                        setTimeout(function () {
                            _this4.markerAnimation = 4;
                        }, 7500);
                    }
                });

                return true;
            }
        }
    },
    created: function created() {},
    mounted: function mounted() {
        var _this5 = this;

        this.$nextTick(function () {
            _this5.setAutoCompleteInFullScreen();
        });
        if (document.addEventListener) {
            document.addEventListener('webkitfullscreenchange', this.exitHandler, false);
            document.addEventListener('mozfullscreenchange', this.exitHandler, false);
            document.addEventListener('fullscreenchange', this.exitHandler, false);
            document.addEventListener('MSFullscreenChange', this.exitHandler, false);
        }
    },

    watch: {
        isFullScreen: function isFullScreen(newval) {
            if (newval === true) {
                $('#OrderfromGeoAddress').val(this.order.from);
                $('#OrdertoGeoAddress').val(this.order.to);
                this.setAutoCompleteInFullScreen();
            } else {

                if ($('.snotify').parent().length !== 0) {
                    $('.snotify').parent().prependTo('.kurier-link-main-container');
                }
            }
        }
    }

});

/***/ }),

/***/ 727:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      ref: "orderInfoForm",
      class: { "order-info-form": true, "full-screen-shown": _vm.isFullScreen },
      attrs: { id: "mapMoveHere" }
    },
    [
      _c("div", { staticClass: "show-map" }, [
        _c("img", {
          attrs: { src: "/images/map.svg", alt: "Show Map." },
          on: { click: _vm.changeFullScreenMode }
        })
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "show-map md" }, [
        _c("img", {
          attrs: { src: "/images/edit.svg", alt: "Edit" },
          on: { click: _vm.changeFullScreenMode }
        })
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "from-to-info" }, [
        _c(
          "div",
          { staticClass: "from-info-box" },
          [
            _c("img", {
              staticClass: "svg",
              attrs: { src: "/images/map-marker.svg", alt: "" }
            }),
            _vm._v(" "),
            _c(
              "div",
              {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: !_vm.isFullScreen,
                    expression: "!isFullScreen"
                  }
                ],
                staticClass: "from-info-box-data"
              },
              [
                _vm._v(
                  "\n                " +
                    _vm._s(_vm.order.from) +
                    "\n            "
                )
              ]
            ),
            _vm._v(" "),
            _c("gmap-autocomplete", {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.isFullScreen,
                  expression: "isFullScreen"
                }
              ],
              ref: "fromAdress",
              attrs: {
                placeholder: _vm.trans("front.main.addressPlaceHolder"),
                id: "OrderfromGeoAddress"
              },
              on: {
                place_changed: function($event) {
                  var i = arguments.length,
                    argsArray = Array(i)
                  while (i--) argsArray[i] = arguments[i]
                  return _vm.setPlaceViaAutoComplete.apply(
                    void 0,
                    argsArray.concat(["from"])
                  )
                }
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "from-info-box" },
          [
            _c("img", {
              staticClass: "svg",
              attrs: { src: "/images/slating-flag.svg", alt: "" }
            }),
            _vm._v(" "),
            _c(
              "div",
              {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: !_vm.isFullScreen,
                    expression: "!isFullScreen"
                  }
                ],
                staticClass: "from-info-box-data"
              },
              [
                _vm._v(
                  "\n                " + _vm._s(_vm.order.to) + "\n            "
                )
              ]
            ),
            _vm._v(" "),
            _c("gmap-autocomplete", {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.isFullScreen,
                  expression: "isFullScreen"
                }
              ],
              ref: "toAdress",
              attrs: {
                placeholder: _vm.trans("front.main.addressPlaceHolder"),
                id: "OrdertoGeoAddress"
              },
              on: {
                place_changed: function($event) {
                  var i = arguments.length,
                    argsArray = Array(i)
                  while (i--) argsArray[i] = arguments[i]
                  return _vm.setPlaceViaAutoComplete.apply(
                    void 0,
                    argsArray.concat(["to"])
                  )
                }
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.isFullScreen,
                expression: "isFullScreen"
              }
            ],
            staticClass: "order-pricing-full-screen",
            attrs: {
              "data-toggle": "tooltip",
              title: _vm.trans("front.create.cost")
            }
          },
          [
            _c("img", {
              staticClass: "svg",
              attrs: { src: "/images/euro.svg", alt: "" }
            }),
            _vm._v(" " + _vm._s(this.order.cost) + "\n        ")
          ]
        )
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "map-element" },
        [
          _c("img", {
            staticClass: "full-screen",
            attrs: { role: "button", src: _vm.fullScreenSource, alt: "" },
            on: { click: _vm.changeFullScreenMode }
          }),
          _vm._v(" "),
          _c(
            "gmap-map",
            {
              ref: "map",
              staticStyle: { width: "100%", height: "100%" },
              attrs: {
                center: _vm.mapCenter,
                options: _vm.sideMapOptions,
                zoom: _vm.mapZoom,
                "map-type-id": "roadmap"
              }
            },
            [
              _c("gmap-marker", {
                attrs: {
                  "data-toggle": "tooltip",
                  icon: "/images/map-marker-red.svg",
                  position: _vm.$parent.getMapPosition(_vm.order.from_map),
                  title: "from",
                  animation: _vm.markerAnimation,
                  clickable: true,
                  draggable: true
                },
                on: {
                  click: _vm.changeMapCenter,
                  dragend: function($event) {
                    var i = arguments.length,
                      argsArray = Array(i)
                    while (i--) argsArray[i] = arguments[i]
                    return _vm.setPlaceViaMarker.apply(
                      void 0,
                      argsArray.concat(["from"])
                    )
                  }
                }
              }),
              _vm._v(" "),
              _c("gmap-marker", {
                attrs: {
                  "data-toggle": "tooltip",
                  icon: "/images/slating-flag-map.svg",
                  position: _vm.$parent.getMapPosition(_vm.order.to_map),
                  title: "to",
                  animation: _vm.markerAnimation,
                  clickable: true,
                  draggable: true
                },
                on: {
                  click: _vm.changeMapCenter,
                  dragend: function($event) {
                    var i = arguments.length,
                      argsArray = Array(i)
                    while (i--) argsArray[i] = arguments[i]
                    return _vm.setPlaceViaMarker.apply(
                      void 0,
                      argsArray.concat(["to"])
                    )
                  }
                }
              })
            ],
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
    require("vue-hot-reload-api")      .rerender("data-v-6d683712", module.exports)
  }
}

/***/ }),

/***/ 728:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(729)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(731)
/* template */
var __vue_template__ = __webpack_require__(732)
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
Component.options.__file = "resources/assets/js/components/pages/orders/neworder/orderWizard.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3c4fe610", Component.options)
  } else {
    hotAPI.reload("data-v-3c4fe610", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 729:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(730);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("27156422", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-3c4fe610\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderWizard.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-3c4fe610\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderWizard.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 730:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 731:
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
        return {};
    },

    computed: {},
    props: {
        currentShow: {
            required: true,
            default: 'goods'
        }

    },
    methods: {
        changeCurrentShow: function changeCurrentShow(currentShow) {
            this.$emit('currentShowChange', currentShow);
        }
    },
    created: function created() {},
    mounted: function mounted() {}
});

/***/ }),

/***/ 732:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "wizard-wrapper" }, [
    _c(
      "div",
      {
        class: { "wizard-box": true, active: _vm.currentShow === "goods" },
        on: {
          click: function($event) {
            return _vm.changeCurrentShow("goods")
          }
        }
      },
      [
        _vm._m(0),
        _vm._v(" "),
        _c("span", [_vm._v(_vm._s(_vm.trans("front.create.orderInformation")))])
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        class: {
          "wizard-box": true,
          active: _vm.currentShow === "senderReceiver"
        },
        on: {
          click: function($event) {
            return _vm.changeCurrentShow("senderReceiver")
          }
        }
      },
      [
        _vm._m(1),
        _vm._v(" "),
        _c("span", [
          _vm._v(_vm._s(_vm.trans("front.create.senderReceiverInfromation")))
        ])
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "wizard-image" }, [
      _c("img", { attrs: { src: "/images/pickup.svg" } })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "wizard-image" }, [
      _c("img", { attrs: { src: "/images/customer-service.svg" } })
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-3c4fe610", module.exports)
  }
}

/***/ }),

/***/ 733:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(734)
}
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(736)
/* template */
var __vue_template__ = __webpack_require__(737)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-2ea77352"
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
Component.options.__file = "resources/assets/js/components/pages/orders/neworder/orderInformation.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2ea77352", Component.options)
  } else {
    hotAPI.reload("data-v-2ea77352", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 734:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(735);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(647)("4cad064d", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-2ea77352\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderInformation.vue", function() {
     var newContent = require("!!../../../../../../../node_modules/css-loader/index.js!../../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-2ea77352\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./orderInformation.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 735:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(75)(false);
// imports


// module
exports.push([module.i, "\n.create-order-container .form-map-container .order-form-wrapper form[data-v-2ea77352] {\n  -webkit-box-align: start;\n      -ms-flex-align: start;\n          align-items: flex-start;\n}\n.create-order-container .form-map-container .order-form-wrapper form .goods-descripe[data-v-2ea77352] {\n    max-width: 49%;\n    max-width: calc(50% - 5px);\n}\n.create-order-container .form-map-container .order-form-wrapper form .goods-descripe.goods-wizard[data-v-2ea77352] {\n      max-width: 100%;\n}\n@media screen and (max-width: 776px) {\n.create-order-container .form-map-container .order-form-wrapper form .goods-descripe[data-v-2ea77352] {\n        max-width: 100%;\n        margin: 0;\n}\n}\n.create-order-container .form-map-container .order-form-wrapper form .goods-descripe[data-v-2ea77352]:last-child {\n      margin-left: 5px;\n}\n", ""]);

// exports


/***/ }),

/***/ 736:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            senderOrReceiver: 'sender',
            sameAsReceiver: false,
            watchingErrors: false,
            senderErrors: 0,
            receivererrors: 0,
            otherBillingErrors: 0,
            SenderInputs: [{
                props: {
                    name: 'sender' + trans('front.create.firstName'),
                    placeholder: trans('front.create.firstName'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'senderfirstName',
                    newclasses: {
                        'half-width': true,
                        'odd': true
                    },
                    autoFocus: true

                },
                model: 'first_name'
            }, {
                props: {
                    name: 'sender' + trans('front.create.lastName'),
                    placeholder: trans('front.create.lastName'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'senderlastName',
                    newclasses: {
                        'half-width': true

                    }

                },
                model: 'nick_name'
            }, {
                props: {
                    name: 'sender' + trans('front.create.phone'),
                    placeholder: trans('front.create.phone'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required|phone',
                    id: 'senderphone',
                    newclasses: {
                        'half-width': true,
                        'odd': true

                    }

                },
                model: 'phone'
            }, {
                props: {
                    name: 'sender' + trans('front.create.isCompany'),
                    placeholder: trans('front.create.isCompany'),
                    id: 'senderisCompany',
                    type: 'select',
                    newclasses: {
                        'half-width': true,
                        'odd': true

                    },

                    options: [{
                        value: 'person',
                        text: trans('front.create.person')

                    }, {
                        value: 'company',
                        text: trans('front.create.company')
                    }]

                },

                model: 'isCompany'
            }, {
                props: {
                    name: 'sender' + trans('front.create.company'),
                    placeholder: trans('front.create.company'),
                    // img: '/images/food-scale-tool.svg',
                    validate: '',
                    id: 'sendercompany'

                },
                showif: false,
                model: 'company'
            }, {
                props: {
                    name: 'sender' + trans('front.create.email'),
                    placeholder: trans('front.create.email'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'email',
                    id: 'senderemail'

                },
                model: 'email'
            }],
            BillitgSelector: {

                props: {
                    name: 'paymentfor',
                    placeholder: trans('front.create.bill_to'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'paymentfor',
                    type: 'select',
                    options: [{
                        value: 'sender',
                        text: trans('front.create.sender')

                    }, {
                        value: 'receiver',
                        text: trans('front.create.receiver')
                    }, {
                        value: 'other',
                        text: trans('front.create.otherbilling')
                    }]

                },
                model: 'bill_to'

            },
            senderTimes: [{
                props: {
                    name: 'sender' + trans('front.create.time'),
                    placeholder: trans('front.create.chargingTime'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'sendertime',
                    type: 'timePicker',
                    minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours')

                },
                model: 'load_from'
            }, {
                props: {
                    name: 'sender' + trans('front.create.from'),
                    placeholder: trans('front.create.to'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'senderLoadTill',
                    type: 'timePicker',
                    minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours')

                },
                model: 'load_up'
            }],
            receiverTimes: [{
                props: {
                    name: 'receiver' + trans('front.create.from'),
                    placeholder: trans('front.create.from'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'receivertime',
                    type: 'timePicker',
                    minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours')

                },
                model: 'delivery_from'
            }, {
                props: {
                    name: 'receiver' + trans('front.create.to'),
                    placeholder: trans('front.create.to'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'receiverLoadTill',
                    type: 'timePicker',
                    minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours')

                },
                model: 'delivery_until'
            }],
            receiverInputs: [{
                props: {
                    name: 'receiver' + trans('front.create.firstName'),
                    placeholder: trans('front.create.firstName'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'receiverfirstName',
                    newclasses: {
                        'half-width': true,
                        'odd': true
                    }

                },
                model: 'first_name'
            }, {
                props: {
                    name: 'receiver' + trans('front.create.lastName'),
                    placeholder: trans('front.create.lastName'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'receiverlastName',
                    newclasses: {
                        'half-width': true

                    }

                },
                model: 'nick_name'
            }, {
                props: {
                    name: 'receiver' + trans('front.create.phone'),
                    placeholder: trans('front.create.phone'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required|phone',
                    id: 'receiverphone',
                    newclasses: {
                        'half-width': true,
                        'odd': true

                    }

                },
                model: 'phone'
            }, {
                props: {
                    name: 'receiver' + trans('front.create.isCompany'),
                    placeholder: trans('front.create.isCompany'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'receiverisCompany',
                    newclasses: {
                        'half-width': true

                    },
                    type: 'select',
                    options: [{
                        value: 'person',
                        text: trans('front.create.person')

                    }, {
                        value: 'company',
                        text: trans('front.create.company')
                    }]

                },
                model: 'isCompany'
            }, {
                props: {
                    name: 'receiver' + trans('front.create.company'),
                    placeholder: trans('front.create.company'),
                    // img: '/images/food-scale-tool.svg',
                    validate: '',
                    id: 'sendercompany'

                },
                showif: false,
                model: 'company'
            }, {
                props: {
                    name: 'receiver' + trans('front.create.email'),
                    placeholder: trans('front.create.email'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'email',
                    id: 'receiveremail'

                },
                model: 'email'
            }],
            otherBillingInputs: [{
                props: {
                    name: 'otherbilling' + trans('front.create.firstName'),
                    placeholder: trans('front.create.firstName'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'otherbillingfirstName',
                    newclasses: {
                        'half-width': true,
                        'odd': true
                    }

                },
                model: 'first_name'
            }, {
                props: {
                    name: 'otherbilling' + trans('front.create.lastName'),
                    placeholder: trans('front.create.lastName'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'otherbillinglastName',
                    newclasses: {
                        'half-width': true

                    }

                },

                model: 'nick_name'
            }, {
                props: {
                    name: 'otherbilling' + trans('front.create.phone'),
                    placeholder: trans('front.create.phone'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required|phone',
                    id: 'otherbillingphone',
                    newclasses: {
                        'half-width': true,
                        'odd': true

                    }

                },
                model: 'phone'
            }, {
                props: {
                    name: 'receiver' + trans('front.create.isCompany'),
                    placeholder: trans('front.create.isCompany'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'required',
                    id: 'receiverisCompany',
                    newclasses: {
                        'half-width': true

                    },
                    type: 'select',
                    options: [{
                        value: 'person',
                        text: trans('front.create.person')

                    }, {
                        value: 'company',
                        text: trans('front.create.company')
                    }]

                },
                model: 'isCompany'
            }, {
                props: {
                    name: 'otherbilling' + trans('front.create.company'),
                    placeholder: trans('front.create.company'),
                    // img: '/images/food-scale-tool.svg',
                    validate: '',
                    id: 'otherbillingcompany'

                },
                showif: false,
                model: 'company'
            }, {
                props: {
                    name: 'otherbilling' + trans('front.create.email'),
                    placeholder: trans('front.create.email'),
                    // img: '/images/food-scale-tool.svg',
                    validate: 'email',
                    id: 'otherbillingemail'

                },
                model: 'email'
            }]
        };
    },

    computed: {
        formData: function formData() {
            var _this = this;

            this.order.distance = Number(this.order.orderRoute.routes[0].legs[0].distance.value / 1000);
            this.order.duration = Number(this.order.orderRoute.routes[0].legs[0].duration.value / 60) + (Number(this.order.orderRoute.routes[0].legs[0].duration.value % 60) > 30 ? 1 : 0);
            this.order.encryptedId = this.$route.params.orderId;
            var toBeSendOrder = Object.assign({}, this.order);

            toBeSendOrder.orderRoute = {};
            //this belongs to old code variables please delete it when you handlening new database

            return {
                'url': '/api/orders/saveInformation',
                'data': toBeSendOrder,
                'validate': this.$validator,
                'successServer': function successServer(data) {
                    setTimeout(function () {
                        window.location.href = '/order/lastSteps/' + _this.order.encryptedId;
                    }, 1000);
                },
                'failedValidate': function failedValidate(data) {
                    _this.validationErrors();

                    _this.$snotify.warning(trans('front.create.fakeValidateMessage'), trans('front.create.inputError'), {
                        showProgressBar: false
                    });
                }
            };
        }
    },
    props: {
        order: {
            required: true,
            default: function _default() {
                return {
                    sender: {},
                    receiver: {},
                    dating: {},
                    otherbilling: {}
                };
            }
        }
    },
    methods: {
        getTempAdressess: function getTempAdressess() {
            var _this2 = this;

            if (!window.google || !google) {
                setTimeout(function () {
                    _this2.getTempAdressess();
                }, 100);
                return {};
            }
            var addresess = {};

            var geocoder = new google.maps.Geocoder();
            var order = this.order;
            var latlng = {
                lat: Number(order.from_map.split(',')[0]),
                lng: Number(order.from_map.split(',')[1])
            };
            geocoder.geocode({
                'location': latlng
            }, function (results, status) {
                if (status === 'OK') {

                    if (results[0]) {
                        // $('#ToGeoAdress').val(results[1].formatted_address)

                        addresess.from = _this2.oldFormats(results[0]);

                        // alert(results[1].formatted_address);
                    }
                }
            });
            var latlng2 = {
                lat: Number(order.to_map.split(',')[0]),
                lng: Number(order.to_map.split(',')[1])
            };
            geocoder.geocode({
                'location': latlng2
            }, function (results, status) {

                if (status === 'OK') {
                    if (results[0]) {
                        // $('#ToGeoAdress').val(results[1].formatted_address)

                        addresess.to = _this2.oldFormats(results[0]);

                        // alert(results[1].formatted_address);
                    }
                }
            });

            this.order.FromAndTo = addresess;
        },
        oldFormats: function oldFormats(results) {
            var myres = {};
            results.address_components.map(function (e) {

                if (e.types.indexOf('street_number') !== -1) {
                    myres.home = e.short_name;
                }
                if (e.types.indexOf('route') !== -1) {
                    myres.street = e.short_name;
                }
                if (e.types.indexOf('country') !== -1) {
                    myres.country = e.short_name;
                }
                if (e.types.indexOf('sublocality_level_1') !== -1) {
                    myres.town = e.short_name;
                }
                if (e.types.indexOf('postal_code') !== -1) {
                    myres.postal_code = e.short_name;
                }
            });
            return myres;
        },
        checkStatus: function checkStatus(newval, type) {
            var _this3 = this;

            var types = {
                'sender': 'SenderInputs',
                'receiver': 'receiverInputs',
                'otherbilling': 'otherBillingInputs'
            };

            this[types[type]].forEach(function (e) {
                if (e.model === 'company') {
                    if (newval === 'company') {
                        e.props.validate = 'required';
                        e.showif = true;
                    } else {
                        _this3.order[type].company = '';
                        e.showif = false;
                        e.props.validate = '';
                    }
                }
            });
        },
        validated: function validated(toBeValidated) {
            for (var input in this.fields) {
                if (input.indexOf(toBeValidated) === 0) {
                    if (this.fields[input].invalid === true) {
                        return false;
                    }
                }
            }
            return true;
        },
        acceptAndGo: function acceptAndGo(e) {
            if (this.millistones) {

                this.saveMillistone();
            } else {

                this.$vss.post(this.formData);
            }
        },
        validationErrors: function validationErrors() {
            var _this4 = this;

            console.log('ahmed');
            this.stopWatching();
            this.$nextTick(function () {
                var newvalInputs = {
                    'sender': ['SenderInputs', 'senderErrors', 0],
                    'receiver': ['receiverInputs', 'receivererrors', 1],
                    'otherbilling': ['otherBillingInputs', 'otherBillingErrors', 2]
                };
                for (var input in newvalInputs) {
                    if (_this4[newvalInputs[input][1]] !== 0) {
                        _this4.senderOrReceiver = input;
                        return false;
                    }
                }
            });
        },
        validateGroup: function validateGroup(group) {
            var _this5 = this;

            var results = Promise.all(group.map(function (e) {
                return _this5.$validator.validate(e);
            }));

            return results;
        },
        stopWatching: function stopWatching() {
            var _this6 = this;

            this.watchingErrors = true;

            this.$nextTick(function () {
                _this6.watchingErrors = false;
                _this6.$nextTick(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            });
        },
        changeSenderOrReceiver: function changeSenderOrReceiver(newval) {
            var _this7 = this;

            $('[data-toggle="tooltip"]').tooltip("hide");
            this.watchingErrors = true;

            var newvalInputs = {
                'sender': ['SenderInputs', 'senderErrors', 0],
                'receiver': ['receiverInputs', 'receivererrors', 1],
                'otherbilling': ['otherBillingInputs', 'otherBillingErrors', 2]
            };

            if (this[newvalInputs[this.senderOrReceiver][0]]) {
                var toBeValidated = this[newvalInputs[this.senderOrReceiver][0]].map(function (input) {
                    return input.props.name;
                });
                this.validateGroup(toBeValidated).then(function (response) {

                    if (newvalInputs[newval][2] < newvalInputs[_this7.senderOrReceiver][2]) {

                        _this7.senderOrReceiver = newval;
                        _this7.stopWatching();
                        return false;
                    }
                    if (response.every(function (e) {
                        return e === true;
                    }) === false) {
                        _this7.stopWatching();
                        return false;
                    }

                    _this7.senderOrReceiver = newval;
                });
            }
            this.stopWatching();
        }
    },
    created: function created() {},
    mounted: function mounted() {
        var _this8 = this;

        this.checkStatus(this.order.sender.isCompany, 'sender');
        this.checkStatus(this.order.receiver.isCompany, 'receiver');
        this.checkStatus(this.order.otherbilling.isCompany, 'otherbilling');
        this.receiverTimes[0].props.minDate = window.moment(this.order.dating.load_from).add(this.order.duration, 'minutes').add(this.order.time, 'minutes');
        this.receiverTimes[1].props.minDate = window.moment(this.order.dating.load_from).add(this.order.duration, 'minutes').add(this.order.time, 'minutes');
        this.$nextTick(function () {
            _this8.getTempAdressess();
        });
    },

    watch: {
        'order.from_map': function orderFrom_map(newval, oldval) {
            this.getTempAdressess();
        },
        'order.to_map': function orderTo_map(newval, oldval) {
            this.getTempAdressess();
        },
        'order.sender.isCompany': function orderSenderIsCompany(newval, oldval) {

            this.checkStatus(newval, 'sender');
        },
        'order.receiver.isCompany': function orderReceiverIsCompany(newval, oldval) {

            this.checkStatus(newval, 'receiver');
        },
        'order.otherbilling.isCompany': function orderOtherbillingIsCompany(newval, oldval) {

            this.checkStatus(newval, 'otherbilling');
        },
        sameAsReceiver: function sameAsReceiver(newval, oldval) {
            if (newval === true) {
                var sender = Object.assign({}, this.order.sender);
                this.order.receiver = sender;
            }
        },

        'order.sender': {
            handler: function handler(newval, oldval) {

                if (this.sameAsReceiver === true) {
                    this.order.receiver = Object.assign({}, newval);
                }
            },
            deep: true
        },
        'order.receiver': {
            handler: function handler(newval, oldval) {
                if (this.sameAsReceiver === true) {
                    for (var key in newval) {
                        if (newval[key] !== this.order.sender[key]) {
                            this.sameAsReceiver = false;
                        }
                    }
                }
            },
            deep: true
        },
        'order.dating.load_from': function orderDatingLoad_from(newval, oldval) {

            this.senderTimes[1].props.minDate = window.moment(newval);

            this.receiverTimes[0].props.minDate = window.moment(newval).add(this.order.duration, 'minutes').add(this.order.time, 'minutes');
            this.order.dating.load_up = window.moment(newval).add('6', 'hours').format();
        },

        'order.duration': function orderDuration(newval, oldval) {

            this.receiverTimes[0].props.minDate = window.moment(this.order.dating.load_from).add(newval, 'minutes').add(this.order.time, 'minutes');
        },
        'order.time': function orderTime(newval, oldval) {
            this.receiverTimes[0].props.minDate = window.moment(this.order.dating.load_from).add(this.order.duration, 'minutes').add(newval, 'minutes');
        },
        'order.dating.delivery_from': function orderDatingDelivery_from(newval, oldval) {
            console.log(newval);
            this.receiverTimes[1].props.minDate = window.moment(newval).add('10', 'minutes');
        },
        'errors': {
            handler: function handler(newval, oldval) {
                var _this9 = this;

                this.senderErrors = 0;
                this.receivererrors = 0;
                this.otherBillingErrors = 0;
                if (newval && newval.items && newval.items.length !== 0) {

                    newval.items.forEach(function (e) {
                        if (e.field.indexOf('sender') === 0) {

                            _this9.senderErrors += 1;
                        } else if (e.field.indexOf('receiver') === 0) {
                            _this9.receivererrors += 1;
                        } else if (e.field.indexOf('otherbilling') === 0) {
                            _this9.otherBillingErrors += 1;
                        }
                    });
                }
            },
            deep: true
        }

    }

});

/***/ }),

/***/ 737:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("form", { attrs: { action: "#" } }, [
    _c("div", { staticClass: "goods-descripe goods-wizard" }, [
      _c(
        "div",
        {
          class: {
            "with-error": _vm.senderErrors !== 0,
            "goods-wizard-child": true,
            active: _vm.senderOrReceiver === "sender"
          },
          on: {
            click: function($event) {
              return _vm.changeSenderOrReceiver("sender")
            }
          }
        },
        [
          _vm._v(
            "\n            " +
              _vm._s(_vm.trans("front.create.sender")) +
              "\n            "
          ),
          this.senderErrors !== 0 && _vm.watchingErrors === false
            ? _c(
                "span",
                {
                  staticClass: "error-counter badge badge-danger",
                  attrs: {
                    "data-toggle": "tooltip",
                    title: _vm.trans("front.create.fakeValidateMessage")
                  }
                },
                [_vm._v(_vm._s(this.senderErrors))]
              )
            : _vm.validated("sender")
            ? _c("i", { staticClass: "fa fa-check-circle" })
            : _vm._e()
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          class: {
            "with-error": _vm.receivererrors !== 0,
            "goods-wizard-child": true,
            active: _vm.senderOrReceiver === "receiver"
          },
          on: {
            click: function($event) {
              return _vm.changeSenderOrReceiver("receiver")
            }
          }
        },
        [
          _vm._v(
            "\n            " +
              _vm._s(_vm.trans("front.create.receiver")) +
              "\n            "
          ),
          this.receivererrors !== 0 && _vm.watchingErrors === false
            ? _c(
                "span",
                {
                  staticClass: "error-counter badge badge-danger",
                  attrs: {
                    "data-toggle": "tooltip",
                    title: _vm.trans("front.create.fakeValidateMessage")
                  }
                },
                [_vm._v(_vm._s(this.receivererrors))]
              )
            : _vm.validated("receiver")
            ? _c("i", { staticClass: "fa fa-check-circle" })
            : _vm._e()
        ]
      ),
      _vm._v(" "),
      _vm.order.bill_to === "other"
        ? _c(
            "div",
            {
              class: {
                "with-error": _vm.otherBillingErrors !== 0,
                "goods-wizard-child": true,
                active: _vm.senderOrReceiver === "otherbilling"
              },
              on: {
                click: function($event) {
                  return _vm.changeSenderOrReceiver("otherbilling")
                }
              }
            },
            [
              _vm._v(
                "\n            " +
                  _vm._s(_vm.trans("front.create.otherbilling")) +
                  "\n            "
              ),
              this.otherBillingErrors !== 0 && _vm.watchingErrors === false
                ? _c(
                    "span",
                    {
                      staticClass: "error-counter badge badge-danger",
                      attrs: {
                        "data-toggle": "tooltip",
                        title: _vm.trans("front.create.fakeValidateMessage")
                      }
                    },
                    [_vm._v(_vm._s(this.otherBillingErrors))]
                  )
                : _vm.validated("otherbilling")
                ? _c("i", { staticClass: "fa fa-check-circle" })
                : _vm._e()
            ]
          )
        : _vm._e()
    ]),
    _vm._v(" "),
    !_vm.$parent.loading && _vm.order.sender
      ? _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.senderOrReceiver === "sender",
                expression: "senderOrReceiver==='sender'"
              }
            ],
            staticClass: "goods-descripe"
          },
          [
            _c("h3", { staticClass: "goods-descripe-head" }, [
              _vm._v(
                "\n            " +
                  _vm._s(_vm.trans("front.create.sender")) +
                  "\n        "
              )
            ]),
            _vm._v(" "),
            _vm._l(_vm.SenderInputs, function(input) {
              return _c(
                "input-parent",
                _vm._b(
                  {
                    directives: [
                      {
                        name: "show",
                        rawName: "v-show",
                        value: !("showif" in input) || input.showif === true,
                        expression:
                          "!('showif' in input) || input.showif===true"
                      }
                    ],
                    key: "sender" + input.model,
                    model: {
                      value: _vm.order["sender"][input.model],
                      callback: function($$v) {
                        _vm.$set(_vm.order["sender"], input.model, $$v)
                      },
                      expression: "order['sender'][input.model]"
                    }
                  },
                  "input-parent",
                  input.props,
                  false
                ),
                _vm._l(input.inputs, function(small) {
                  return _c(
                    "small-input",
                    _vm._b(
                      {
                        key: small.bind,
                        model: {
                          value: _vm.order[small.model],
                          callback: function($$v) {
                            _vm.$set(_vm.order, small.model, $$v)
                          },
                          expression: "order[small.model]"
                        }
                      },
                      "small-input",
                      small.props,
                      false
                    )
                  )
                }),
                1
              )
            })
          ],
          2
        )
      : _vm._e(),
    _vm._v(" "),
    !_vm.$parent.loading
      ? _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.senderOrReceiver === "receiver",
                expression: "senderOrReceiver==='receiver'"
              }
            ],
            staticClass: "goods-descripe"
          },
          [
            _c("h3", { staticClass: "goods-descripe-head" }, [
              _vm._v(
                "\n            " +
                  _vm._s(_vm.trans("front.create.receiverQuestion")) +
                  "\n\n            "
              ),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.sameAsReceiver,
                    expression: "sameAsReceiver"
                  }
                ],
                staticClass: "kurier-check",
                attrs: { type: "checkbox", id: "sameAsSender" },
                domProps: {
                  checked: Array.isArray(_vm.sameAsReceiver)
                    ? _vm._i(_vm.sameAsReceiver, null) > -1
                    : _vm.sameAsReceiver
                },
                on: {
                  change: function($event) {
                    var $$a = _vm.sameAsReceiver,
                      $$el = $event.target,
                      $$c = $$el.checked ? true : false
                    if (Array.isArray($$a)) {
                      var $$v = null,
                        $$i = _vm._i($$a, $$v)
                      if ($$el.checked) {
                        $$i < 0 && (_vm.sameAsReceiver = $$a.concat([$$v]))
                      } else {
                        $$i > -1 &&
                          (_vm.sameAsReceiver = $$a
                            .slice(0, $$i)
                            .concat($$a.slice($$i + 1)))
                      }
                    } else {
                      _vm.sameAsReceiver = $$c
                    }
                  }
                }
              }),
              _vm._v(" "),
              _c("label", {
                attrs: {
                  for: "sameAsSender",
                  "data-toggle": "tooltip",
                  title: _vm.trans("front.create.sameAsReceiver")
                }
              })
            ]),
            _vm._v(" "),
            _vm._l(_vm.receiverInputs, function(input) {
              return _c(
                "input-parent",
                _vm._b(
                  {
                    directives: [
                      {
                        name: "show",
                        rawName: "v-show",
                        value: !("showif" in input) || input.showif === true,
                        expression:
                          "!('showif' in input) || input.showif===true"
                      }
                    ],
                    key: "sender" + input.model,
                    model: {
                      value: _vm.order["receiver"][input.model],
                      callback: function($$v) {
                        _vm.$set(_vm.order["receiver"], input.model, $$v)
                      },
                      expression: "order['receiver'][input.model]"
                    }
                  },
                  "input-parent",
                  input.props,
                  false
                ),
                _vm._l(input.inputs, function(small) {
                  return _c(
                    "small-input",
                    _vm._b(
                      {
                        key: small.bind,
                        model: {
                          value: _vm.order[small.model],
                          callback: function($$v) {
                            _vm.$set(_vm.order, small.model, $$v)
                          },
                          expression: "order[small.model]"
                        }
                      },
                      "small-input",
                      small.props,
                      false
                    )
                  )
                }),
                1
              )
            })
          ],
          2
        )
      : _vm._e(),
    _vm._v(" "),
    !_vm.$parent.loading && _vm.order && _vm.order.bill_to === "other"
      ? _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.senderOrReceiver === "otherbilling",
                expression: "senderOrReceiver==='otherbilling'"
              }
            ],
            staticClass: "goods-descripe"
          },
          [
            _c("h3", { staticClass: "goods-descripe-head" }, [
              _vm._v(
                "\n            " +
                  _vm._s(_vm.trans("front.create.otherbilling")) +
                  "\n        "
              )
            ]),
            _vm._v(" "),
            _vm._l(_vm.otherBillingInputs, function(input) {
              return _c(
                "input-parent",
                _vm._b(
                  {
                    directives: [
                      {
                        name: "show",
                        rawName: "v-show",
                        value: !("showif" in input) || input.showif === true,
                        expression:
                          "!('showif' in input) || input.showif===true"
                      }
                    ],
                    key: "other" + input.model,
                    model: {
                      value: _vm.order["otherbilling"][input.model],
                      callback: function($$v) {
                        _vm.$set(_vm.order["otherbilling"], input.model, $$v)
                      },
                      expression: "order['otherbilling'][input.model]"
                    }
                  },
                  "input-parent",
                  input.props,
                  false
                )
              )
            })
          ],
          2
        )
      : _vm._e(),
    _vm._v(" "),
    _vm.senderOrReceiver === "sender"
      ? _c(
          "div",
          {
            staticClass: "goods-descripe",
            staticStyle: { "margin-left": "5px" }
          },
          [
            _c("h3", { staticClass: "goods-descripe-head" }, [
              _vm._v(_vm._s(_vm.trans("front.create.pickUpTime")))
            ]),
            _vm._v(" "),
            _vm._l(_vm.senderTimes, function(input) {
              return _c(
                "input-parent",
                _vm._b(
                  {
                    key: "sender" + input.model,
                    model: {
                      value: _vm.order["dating"][input.model],
                      callback: function($$v) {
                        _vm.$set(_vm.order["dating"], input.model, $$v)
                      },
                      expression: "order['dating'][input.model]"
                    }
                  },
                  "input-parent",
                  input.props,
                  false
                ),
                _vm._l(input.inputs, function(small) {
                  return _c(
                    "small-input",
                    _vm._b(
                      {
                        key: small.bind,
                        model: {
                          value: _vm.order[small.model],
                          callback: function($$v) {
                            _vm.$set(_vm.order, small.model, $$v)
                          },
                          expression: "order[small.model]"
                        }
                      },
                      "small-input",
                      small.props,
                      false
                    )
                  )
                }),
                1
              )
            }),
            _vm._v(" "),
            _c(
              "input-parent",
              _vm._b(
                {
                  key: "bill_to",
                  model: {
                    value: _vm.order.bill_to,
                    callback: function($$v) {
                      _vm.$set(_vm.order, "bill_to", $$v)
                    },
                    expression: "order.bill_to"
                  }
                },
                "input-parent",
                _vm.BillitgSelector.props,
                false
              )
            )
          ],
          2
        )
      : _vm._e(),
    _vm._v(" "),
    _vm.senderOrReceiver === "receiver"
      ? _c(
          "div",
          {
            staticClass: "goods-descripe",
            staticStyle: { "margin-left": "5px" }
          },
          [
            _c("h3", { staticClass: "goods-descripe-head" }, [
              _vm._v(_vm._s(_vm.trans("front.create.deliveryTime")))
            ]),
            _vm._v(" "),
            _vm._l(_vm.receiverTimes, function(input) {
              return _c(
                "input-parent",
                _vm._b(
                  {
                    key: "sender" + input.model,
                    model: {
                      value: _vm.order["dating"][input.model],
                      callback: function($$v) {
                        _vm.$set(_vm.order["dating"], input.model, $$v)
                      },
                      expression: "order['dating'][input.model]"
                    }
                  },
                  "input-parent",
                  input.props,
                  false
                ),
                _vm._l(input.inputs, function(small) {
                  return _c(
                    "small-input",
                    _vm._b(
                      {
                        key: small.bind,
                        model: {
                          value: _vm.order[small.model],
                          callback: function($$v) {
                            _vm.$set(_vm.order, small.model, $$v)
                          },
                          expression: "order[small.model]"
                        }
                      },
                      "small-input",
                      small.props,
                      false
                    )
                  )
                }),
                1
              )
            })
          ],
          2
        )
      : _vm._e(),
    _vm._v(" "),
    _c("div", { staticClass: "small-order-cell completeIt" }, [
      _c(
        "div",
        { staticClass: "letsComplete btn", on: { click: _vm.acceptAndGo } },
        [
          _vm._v(
            "\n            " + _vm._s(_vm.trans("front.create.saveOrder")) + " "
          ),
          _c("img", { attrs: { src: "/images/loading.svg", alt: "" } })
        ]
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-2ea77352", module.exports)
  }
}

/***/ }),

/***/ 738:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return !_vm.loading && !_vm.notFound
    ? _c(
        "div",
        { staticClass: "container create-order-container" },
        [
          _c("transition", { attrs: { name: "fade" } }, [
            _vm.fixedError
              ? _c("div", { staticClass: "fixedError" }, [
                  _c("img", {
                    attrs: { src: "/images/warning.svg", alt: "Warming" }
                  }),
                  _vm._v(
                    "\n      " +
                      _vm._s(_vm.trans("front.create.error")) +
                      "\n    "
                  )
                ])
              : _vm._e()
          ]),
          _vm._v(" "),
          _c("order-box-wrapper", { attrs: { order: _vm.order } }),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "form-map-container" },
            [
              _c(
                "div",
                { staticClass: "order-form-wrapper" },
                [
                  _vm.isStored === true
                    ? _c("order-wizard", {
                        attrs: { currentShow: _vm.currentShow },
                        on: { currentShowChange: _vm.StepTo }
                      })
                    : _vm._e(),
                  _vm._v(" "),
                  _c(
                    "form",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.currentShow === "goods",
                          expression: "currentShow==='goods'"
                        }
                      ],
                      key: "currentShownGoods",
                      class: { shown: _vm.currentShow === "goods" },
                      attrs: { action: "#" }
                    },
                    [
                      !_vm.loading
                        ? _c(
                            "div",
                            { staticClass: "goods-descripe" },
                            _vm._l(_vm.inputs, function(input) {
                              return _c(
                                "input-parent",
                                _vm._b(
                                  {
                                    key: input.bind,
                                    on: { timeinput: _vm.changeTimeInput },
                                    model: {
                                      value: _vm.order[input.model],
                                      callback: function($$v) {
                                        _vm.$set(_vm.order, input.model, $$v)
                                      },
                                      expression: "order[input.model]"
                                    }
                                  },
                                  "input-parent",
                                  input.props,
                                  false
                                ),
                                _vm._l(input.inputs, function(small) {
                                  return _c(
                                    "small-input",
                                    _vm._b(
                                      {
                                        key: small.bind,
                                        model: {
                                          value: _vm.order[small.model],
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.order,
                                              small.model,
                                              $$v
                                            )
                                          },
                                          expression: "order[small.model]"
                                        }
                                      },
                                      "small-input",
                                      small.props,
                                      false
                                    )
                                  )
                                }),
                                1
                              )
                            }),
                            1
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.checkedAndErrors
                        ? _c("order-pricing", {
                            attrs: {
                              isDirty: _vm.isDirty,
                              NotDisabled: _vm.NotDisabled,
                              shippings: _vm.shippings,
                              distances: _vm.distances,
                              order: _vm.order
                            },
                            on: { acceptAndGo: _vm.acceptAndGo }
                          })
                        : _vm._e()
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("order-information", {
                    directives: [
                      {
                        name: "show",
                        rawName: "v-show",
                        value: _vm.currentShow === "senderReceiver",
                        expression: "currentShow==='senderReceiver'"
                      }
                    ],
                    key: "currentShownSenderReceiver",
                    class: { shown: _vm.currentShow === "senderReceiver" },
                    attrs: { order: _vm.order }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c("order-info-form", {
                ref: "mapWrapper",
                attrs: { order: _vm.order }
              })
            ],
            1
          )
        ],
        1
      )
    : _vm.loading
    ? _c("div", { staticClass: "loading-div" })
    : _c("div", { staticClass: "notFoundDiv" }, [
        _c("img", {
          attrs: { src: "/images/searching.svg", alt: "Not Found" }
        }),
        _vm._v(" "),
        _c("h3", [_vm._v(_vm._s(_vm.trans("front.create.notFound")))])
      ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-4661eff2", module.exports)
  }
}

/***/ })

});