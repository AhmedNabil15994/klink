webpackJsonp([0],{

/***/ 654:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(772)
/* template */
var __vue_template__ = __webpack_require__(845)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/main.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-8ad5fd28", Component.options)
  } else {
    hotAPI.reload("data-v-8ad5fd28", Component.options)
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

/***/ 665:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony default export */ __webpack_exports__["a"] = ([{
    options: {
        text: window.trans('front.accounting.sameDay'),
        value: 0
    },
    every: function every(dayBeforeCondition) {
        return window.moment(dayBeforeCondition, "l");
    }
}, {
    options: {
        text: window.trans('front.accounting.startOfWeek'),
        value: 1
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').startOf('week');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'week');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.endOfWeek'),
        value: 2
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').endOf('week');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'week');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.startOfMonth'),
        value: 3
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').startOf('month');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'month');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.endOfMonth'),
        value: 4
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').endOf('month');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'month');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.halfOfMonth'),
        value: 5
    },
    every: function every(dayBeforeCondition) {
        var expected = window.moment(dayBeforeCondition, "l").set({
            date: 15
        });
        if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
            return window.moment(expected).endOf("month");
        }
        return expected;
    }
}, {
    options: {
        text: window.trans('front.accounting.endOfQuarter'),
        value: 6
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').endOf('quarter');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'quarter');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.halfYear'),
        value: 7
    },
    every: function every(dayBeforeCondition) {
        var expected = window.moment(dayBeforeCondition, "l").endOf("year").subtract(0.5, "year");
        if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
            return window.moment(expected).endOf("year");
        }
        return expected;
    }
}, {
    options: {
        text: window.trans('front.accounting.endOfYear'),
        value: 8
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').endOf('year');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'year');
        }
        return nextDay;
    }
}]);

/***/ }),

/***/ 772:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      tour: {},

      acceptedOffer: {}
    };
  },

  computed: {
    termsAccepted: function termsAccepted() {
      if (!this.tour || !this.tour.tour_details) {
        return false;
      }
      return this.tour.tour_details.terms_accepted;
    },
    offerDisabled: function offerDisabled() {
      var _this = this;

      if (!this.tour || !this.tour.tour_offer) {
        return false;
      }
      var accepted = this.tour.tour_offer.some(function (offer) {
        if (offer.customer_accepted) {
          _this.acceptedOffer = offer;
          return true;
        }
        return false;
      });
      return accepted;
    },
    loginDisabled: function loginDisabled() {
      return this.acceptedOffer && this.acceptedOffer.id > 0 && (this.tour.isAuth < 2 || !this.tour.isAuth);
    }
  },
  props: {},
  watch: {},
  methods: {
    acceptOffer: function acceptOffer(offer) {
      this.acceptedOffer = offer;
      if (this.tour.isAuth === 2) {
        this.$vss.post(this.formData(offer));
      }
    },
    formData: function formData(offer) {
      var _this2 = this;

      var toBeSendOrder = {
        offer: offer.id,
        tour: this.$route.params.tourId
      };

      return {
        url: "/api/tours/accept",
        data: toBeSendOrder,

        successServer: function successServer(response) {

          _this2.tour.tour_offer = response.body.tour_offer;
        },
        failedValidate: function failedValidate(data) {},
        failServer: function failServer(data) {}
      };
    },
    getOffer: function getOffer(data) {
      var _this3 = this;

      this.$http.get("/api/tours/tour/" + this.tour.encrypted + "/offer/" + data.data.offer_id).then(function (response) {
        var found = _this3.tour.tour_offer.some(function (offer) {
          return offer.id === response.data.id;
        });
        if (!found) {
          _this3.tour.tour_offer.push(response.data);
        }
      });
    }
  },
  components: {
    "kurier-offers": __webpack_require__(773),
    "stops-information": __webpack_require__(779),
    "tour-stops": __webpack_require__(788),
    "ship-information": __webpack_require__(799),
    "tour-details": __webpack_require__(802),
    "tour-times": __webpack_require__(805),
    "kurier-login": __webpack_require__(824),
    "kurier-accept": __webpack_require__(836),
    "kurier-payment": __webpack_require__(842)
  },
  created: function created() {
    var _this4 = this;

    this.$http.get("/api/tours/tour/" + this.$route.params.tourId + "?offers=true").then(function (response) {
      if (!response || !response.data || !response.data.calculations) {
        _this4.$router.push("geschaeftskundenportal/tour/" + _this4.$route.params.tourId);
      }
      _this4.tour = response.data;
      window.Echo.channel("offerTour" + _this4.tour.id).listen(".newOffer" + _this4.tour.id, function (e) {
        _this4.getOffer(e);
      });
    });
  },
  mounted: function mounted() {
    $('[data-toggle="tooltip"]').tooltip();
  }
});

/***/ }),

/***/ 773:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(774)
/* template */
var __vue_template__ = __webpack_require__(778)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/kurierOffers.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6196b778", Component.options)
  } else {
    hotAPI.reload("data-v-6196b778", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 774:
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
    return {};
  },

  computed: {},
  props: {
    offerDisabled: {
      required: true
    },
    acceptOffer: {
      required: true
    },
    tour: {
      required: true
    },
    isAuth: {
      required: true
    }
  },
  watch: {},
  methods: {},
  components: {
    "klink-offer": __webpack_require__(775)
  },
  created: function created() {
    // this.$http
    //   .get("/api/tours/islogin/" + this.$route.params.tourId)
    //   .then(response => {
    //     this.isAuth = response.body;
    //   });
    // console.log(this.isAuth);

  },
  mounted: function mounted() {}
});

/***/ }),

/***/ 775:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(776)
/* template */
var __vue_template__ = __webpack_require__(777)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/tourOffer.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-507892c1", Component.options)
  } else {
    hotAPI.reload("data-v-507892c1", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 776:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      shown: false
    };
  },

  computed: {
    vehicle_weight: function vehicle_weight() {
      if (this.offer.tour_vehicle && this.offer.tour_vehicle.weight) {
        return this.offer.tour_vehicle.weight;
      } else if (this.offer.tour_vehicle && this.offer.tour_vehicle.ship && this.offer.tour_vehicle.ship.pay_load_max) {
        return this.offer.tour_vehicle.ship.pay_load_max;
      }
      return 0;
    },
    ship_name: function ship_name() {
      if (this.offer.tour_vehicle && this.offer.tour_vehicle.ship_name) {
        return this.offer.tour_vehicle.ship_name;
      } else if (this.offer.tour_vehicle && this.offer.tour_vehicle.ship && this.offer.tour_vehicle.ship.title) {
        return this.offer.tour_vehicle.ship.title;
      }
      return trans("front.touroffers.noName");
    },
    ship_image: function ship_image() {
      if (this.offer.tour_vehicle && this.offer.tour_vehicle.ship) {
        return this.offer.tour_vehicle.ship.img;
      }
    }
  },
  props: {
    offer: {
      required: true,
      type: Object
    },
    offerDisabled: {
      required: true
    },
    acceptOffer: {
      required: true,
      type: Function
    }
  },
  watch: {},
  methods: {
    showOffer: function showOffer(e) {
      if ($(e.target).hasClass("btn") || $(e.target).parent(".btn").length >= 1) {
        return false;
      }
      this.shown = !this.shown;
    },
    getInCm: function getInCm(width) {
      return (width / 10).toFixed(2);
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {
    $('[data-toggle="tooltip"]').tooltip();
  }
});

/***/ }),

/***/ 777:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "kurier-offer" }, [
    _c(
      "div",
      { staticClass: "klink-offer-head", on: { click: _vm.showOffer } },
      [
        _c(
          "div",
          {
            staticClass: "klink-offer-head-item",
            attrs: {
              title: _vm.trans("front.touroffers.price"),
              "data-toggle": "tooltip"
            }
          },
          [
            _c("img", { attrs: { src: "/images/euro.svg", alt: "euro" } }),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(_vm.offer.company_offer))])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "klink-offer-head-item right add-new-package sm-img" },
          [
            _c(
              "div",
              {
                staticClass: "show-hide",
                attrs: {
                  title: _vm.trans("front.touroffers.showDetails"),
                  "data-toggle": "tooltip"
                }
              },
              [
                _c("img", {
                  class: { down: !_vm.shown, smooth: true },
                  attrs: {
                    src: "/images/key-console.svg",
                    alt: !_vm.shown ? "show" : "hide"
                  }
                })
              ]
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "btn btn-success btn-sm",
                attrs: {
                  title: _vm.trans("front.touroffers.accept"),
                  "data-toggle": "tooltip",
                  disabled: _vm.offerDisabled
                },
                on: {
                  click: function($event) {
                    return _vm.acceptOffer(_vm.offer)
                  }
                }
              },
              [
                _c("img", { attrs: { src: "/images/tick.svg", alt: "check" } }),
                _vm._v(" "),
                _c("span", [
                  _vm._v(_vm._s(_vm.trans("front.touroffers.accept")))
                ])
              ]
            )
          ]
        )
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      { class: { "klink-offer-body": true, active: _vm.shown } },
      [
        _c(
          "transition",
          {
            attrs: {
              name: "slide",
              "enter-active-class": "animated slideInDown",
              "leave-active-class": "animated slideOutUp"
            }
          },
          [
            _c(
              "div",
              {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: _vm.shown,
                    expression: "shown"
                  }
                ],
                staticClass: "vehicle-offer-show"
              },
              [
                _c(
                  "div",
                  {
                    staticClass: "vehicle-name",
                    attrs: {
                      title: _vm.trans("front.touroffers.vehicle"),
                      "data-toggle": "tooltip"
                    }
                  },
                  [_vm._v(_vm._s(_vm.ship_name))]
                ),
                _vm._v(" "),
                _c("div", { staticClass: "vehicle-information" }, [
                  _c("div", { staticClass: "shipping" }, [
                    _c("img", {
                      attrs: {
                        title: _vm.ship_name,
                        "data-toggle": "tooltip",
                        src: "/images/shippings/" + _vm.ship_image,
                        alt: _vm.ship_name
                      }
                    }),
                    _vm._v(" "),
                    _c("div", { staticClass: "shipping-info" }, [
                      _c(
                        "div",
                        {
                          staticClass: "shipping-info-piece",
                          attrs: {
                            title: _vm.trans("front.touroffers.model"),
                            "data-toggle": "tooltip"
                          }
                        },
                        [
                          _c("b", [
                            _vm._v(
                              _vm._s(_vm.trans("front.touroffers.model")) + " :"
                            )
                          ]),
                          _vm._v(
                            "\n                " +
                              _vm._s(_vm.offer.tour_vehicle.model) +
                              "\n              "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "shipping-info-piece",
                          attrs: {
                            title: _vm.trans("front.touroffers.weight"),
                            "data-toggle": "tooltip"
                          }
                        },
                        [
                          _c("b", [
                            _vm._v(
                              _vm._s(_vm.trans("front.touroffers.weight")) +
                                " :"
                            )
                          ]),
                          _vm._v(
                            "\n                " +
                              _vm._s(_vm.vehicle_weight) +
                              "\n              "
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "shipping-info" }, [
                      _c(
                        "div",
                        {
                          staticClass: "shipping-info-piece",
                          attrs: {
                            title:
                              _vm.trans("front.touroffers.width") + " ( CM ) ",
                            "data-toggle": "tooltip"
                          }
                        },
                        [
                          _c("b", [
                            _vm._v(
                              _vm._s(_vm.trans("front.touroffers.width")) + " :"
                            )
                          ]),
                          _vm._v(
                            "\n                " +
                              _vm._s(
                                _vm.getInCm(
                                  _vm.offer.tour_vehicle.ship
                                    ? _vm.offer.tour_vehicle.ship.width
                                    : 0
                                )
                              ) +
                              "\n              "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "shipping-info-piece",
                          attrs: {
                            title:
                              _vm.trans("front.touroffers.length") + " ( CM ) ",
                            "data-toggle": "tooltip"
                          }
                        },
                        [
                          _c("b", [
                            _vm._v(
                              _vm._s(_vm.trans("front.touroffers.length")) +
                                " :"
                            )
                          ]),
                          _vm._v(
                            "\n                " +
                              _vm._s(
                                _vm.getInCm(
                                  _vm.offer.tour_vehicle.ship
                                    ? _vm.offer.tour_vehicle.ship.length
                                    : 0
                                )
                              ) +
                              "\n              "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "shipping-info-piece",
                          attrs: {
                            title:
                              _vm.trans("front.touroffers.height") + " ( CM ) ",
                            "data-toggle": "tooltip"
                          }
                        },
                        [
                          _c("b", [
                            _vm._v(
                              _vm._s(_vm.trans("front.touroffers.height")) +
                                " :"
                            )
                          ]),
                          _vm._v(
                            "\n                " +
                              _vm._s(
                                _vm.getInCm(
                                  _vm.offer.tour_vehicle.ship
                                    ? _vm.offer.tour_vehicle.ship.height
                                    : 0
                                )
                              ) +
                              "\n              "
                          )
                        ]
                      )
                    ])
                  ])
                ])
              ]
            )
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
    require("vue-hot-reload-api")      .rerender("data-v-507892c1", module.exports)
  }
}

/***/ }),

/***/ 778:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "stops-rows-wrapper offers" },
    [
      _c("div", { staticClass: "stops-rows-header" }, [
        _vm._v(_vm._s(_vm.trans("front.touroffers.title")))
      ]),
      _vm._v(" "),
      _c(
        "transition-group",
        {
          staticClass: "stops-rows-container",
          attrs: {
            tag: "div",
            name: "zoom",
            "enter-active-class": "animated zoomIn",
            "leave-active-class": "animated zoomOut"
          }
        },
        _vm._l(_vm.tour.tour_offer, function(offer) {
          return _c("klink-offer", {
            key: "offer" + offer.id,
            attrs: {
              offerDisabled: _vm.offerDisabled,
              acceptOffer: _vm.acceptOffer,
              offer: offer
            }
          })
        }),
        1
      )
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
    require("vue-hot-reload-api")      .rerender("data-v-6196b778", module.exports)
  }
}

/***/ }),

/***/ 779:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(780)
/* template */
var __vue_template__ = __webpack_require__(787)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/stopsInformation.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-9a4bd424", Component.options)
  } else {
    hotAPI.reload("data-v-9a4bd424", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 780:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      tourEndDatee: ""
    };
  },

  computed: {
    endDateInput: function endDateInput() {
      var _this = this;

      return {
        name: "tourEndDate",
        placeholder: this.trans("front.touroffers.endDate"),
        validate: "required",
        id: "tourEndDate",
        type: "timePicker",

        dateOnly: true,
        newclasses: {
          "tour-date-1": true
        },
        editable: {
          img: "/images/endDate.svg",
          // after: "Uhr",
          saveData: function saveData(newval, afterFinish) {
            newval = window.moment(newval, "l");
            if (newval.format("l") === _this.tourEndDatee.format("l")) {
              afterFinish();
              return false;
            }
            newval = newval.format();
            _this.saveMillistones("tour_finish_date", newval, function (response) {
              _this.tour.tour_dates = response.tour_dates;
              afterFinish();
            });
          },
          toBeShown: this.tourEndDate
        }
      };
    },
    tourEndDate: function tourEndDate() {
      if (!this.tour || !this.tour.tour_dates) {
        return false;
      }
      var mydate = window.moment(this.tour.tour_dates.tour_finish_date, "YYYY-MM-DD");
      // console.log(mydate.isValid());
      if (!this.tour.tour_dates.tour_finish_date || mydate.isValid() === false) {
        this.tourEndDatee = window.moment();
        return this.trans("front.touroffers.unlimited");
      }
      this.tourEndDatee = mydate;
      return mydate.format("DD MMM YYYY");
    },
    tourStartDate: function tourStartDate() {
      if (!this.tour || !this.tour.tour_dates) {
        return window.moment();
      }
      return window.moment(this.tour.tour_dates.tour_start_date);
    },
    tourStratTime: function tourStratTime() {
      if (!this.tour || !this.tour.tour_dates) {
        return "";
      }
      return window.moment(this.tour.tour_dates.tour_start_time, "HH:mm:ss").format("hh:mm A");
    }
  },
  props: {
    tour: {
      required: true,
      type: Object
    }
  },
  watch: {},
  methods: {
    saveMillistones: function saveMillistones(millistone, newval, successServerFunction) {
      var mydata = {};
      mydata[millistone] = newval;
      var formdata = {
        url: "/api/tours/edit/" + this.$route.params.tourId + "/tour_details",
        data: mydata,
        validate: this.$validator,

        failedValidate: function failedValidate(data) {},
        successServer: function successServer(response) {
          successServerFunction(response.body);
        },
        failServer: function failServer(error) {
          console.log(error);
        }
      };
      this.$vss.post(formdata);
    }
  },
  components: {
    "week-days-input": __webpack_require__(781),
    "start-time-edit": __webpack_require__(784)
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 781:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(782)
/* template */
var __vue_template__ = __webpack_require__(783)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/weekDaysInput.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-807db808", Component.options)
  } else {
    hotAPI.reload("data-v-807db808", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 782:
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
    return {
      lastTourDates: []
    };
  },

  computed: {
    activeDays: function activeDays() {
      var _this = this;

      return this.days.filter(function (day, index) {
        return _this.hasADay(index);
      });
    },
    inActiveDays: function inActiveDays() {
      var _this2 = this;

      return this.days.filter(function (day, index) {
        return _this2.hasADay(index) === false;
      });
    },
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
    },
    changed: function changed() {
      return JSON.stringify(this.lastTourDates) !== this.tourDates;
    },
    tourDates: function tourDates() {
      var shortCuts = ["Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"];
      if (!this.tour || !this.tour.tour_dates) {
        return [];
      }
      var days = JSON.parse(this.tour.tour_dates.days);
      days = days.map(function (day) {
        return shortCuts.indexOf(day);
      });

      return JSON.stringify(days);
    }
  },
  props: {
    tour: {
      required: true,
      type: Object
    }
  },
  watch: {
    changed: function changed(newval) {
      var _this3 = this;

      if (newval === true) {
        this.$nextTick(function () {
          _this3.saveTourDays();
        });
      }
    },
    tourDates: function tourDates(newval, oldval) {
      this.lastTourDates = JSON.parse(newval);
    },
    activeDays: function activeDays() {
      this.$nextTick(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });
    },
    inActiveDays: function inActiveDays() {
      this.$nextTick(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });
    }
  },
  methods: {
    hasADay: function hasADay(index) {
      return this.lastTourDates.indexOf(index) !== -1;
    },
    selectDay: function selectDay(day) {
      var index = this.days.indexOf(day);
      if (this.hasADay(index)) {
        if (this.lastTourDates.length > 1) {
          this.lastTourDates = this.lastTourDates.filter(function (day) {
            return day !== index;
          });
        } else {
          this.$snotify.warning(trans("front.bystop.dayserror"), trans("front.bystop.dayserrorHead"));
        }
      } else {
        this.lastTourDates.push(index);
      }
    },
    saveTourDays: function saveTourDays() {
      var _this4 = this;

      if (this.lastTourDates.length < 1) {
        this.$snotify.warning(trans("front.bystop.dayserror"), trans("front.bystop.dayserrorHead"));

        return false;
        // return false;
      }
      var formdata = {
        url: "/api/tours/saveTourDays/" + this.$route.params.tourId,
        data: {
          days: this.lastTourDates
        },
        validate: this.$validator,

        failedValidate: function failedValidate(data) {},
        successServer: function successServer(response) {
          _this4.tour.tour_dates.days = response.body.days;
        }
      };
      this.$vss.post(formdata);
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 783:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "stops-rows-container" },
    [
      _c(
        "div",
        { staticClass: "week-days-show" },
        [
          _c(
            "div",
            {
              staticClass: "stops-rows-header",
              staticStyle: { "justify-content": "center", "font-size": "18px" }
            },
            [_vm._v(_vm._s(_vm.trans("front.touroffers.weekDays")))]
          ),
          _vm._v(" "),
          _c(
            "transition-group",
            {
              staticClass: "week-days-show-row",
              attrs: {
                tag: "div",
                name: "zoom",
                "enter-active-class": "animated zoomIn",
                "leave-active-class": "animated zoomOut"
              }
            },
            _vm._l(_vm.activeDays, function(day) {
              return _c(
                "div",
                {
                  key: "kurier-day-" + day.shortCut,
                  class: { "week-day": true, active: true },
                  attrs: { title: day.dayName, "data-toggle": "tooltip" },
                  on: {
                    click: function($event) {
                      return _vm.selectDay(day)
                    }
                  }
                },
                [_vm._v(_vm._s(day.shortCut))]
              )
            }),
            0
          ),
          _vm._v(" "),
          _c(
            "transition-group",
            {
              staticClass: "week-days-show-row",
              attrs: {
                tag: "div",
                name: "zoom",
                "enter-active-class": "animated zoomIn",
                "leave-active-class": "animated zoomOut"
              }
            },
            _vm._l(_vm.inActiveDays, function(day) {
              return _c(
                "div",
                {
                  key: "kurier-day-" + day.shortCut,
                  class: { "week-day": true },
                  attrs: { title: day.dayName, "data-toggle": "tooltip" },
                  on: {
                    click: function($event) {
                      return _vm.selectDay(day)
                    }
                  }
                },
                [_vm._v(_vm._s(day.shortCut))]
              )
            }),
            0
          )
        ],
        1
      ),
      _vm._v(" "),
      _vm._t("besideDaysShow")
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-807db808", module.exports)
  }
}

/***/ }),

/***/ 784:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(785)
/* template */
var __vue_template__ = __webpack_require__(786)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/startTimeEdit.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6810e854", Component.options)
  } else {
    hotAPI.reload("data-v-6810e854", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 785:
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
    return {
      tourStartTimee: "",
      tourEndTimee: ""
    };
  },

  computed: {
    tourStratTime: function tourStratTime() {
      if (!this.tour || !this.tour.tour_dates) {
        return "";
      }
      this.tourStartTimee = window.moment(this.tour.tour_dates.tour_start_time, "HH:mm:ss");

      return window.moment(this.tour.tour_dates.tour_start_time, "HH:mm:ss").format("HH:mm");
    },
    tourEndTime: function tourEndTime() {
      if (!this.tour || !this.tour.tour_dates) {
        return false;
      }
      this.tourEndTimee = window.moment(this.tour.tour_dates.tour_finish_time, "HH:mm:ss");
      return window.moment(this.tour.tour_dates.tour_finish_time, "HH:mm:ss").format("HH:mm");
    },
    endTimeText: function endTimeText() {
      if (window.moment(this.tour.tour_dates.tour_finish_time, "HH:mm:ss").isBefore(window.moment(this.tour.tour_dates.tour_start_time, "HH:mm:ss").add(this.tour.tour_details.tour_total_time, "minutes"))) {
        return trans("front.touroffers.endTimeNexDay");
      }
      return trans("front.buissness.tourEndTime");
    },
    endTimeProps: function endTimeProps() {
      var _this = this;

      return {
        name: "tourEnd",
        placeholder: this.endTimeText,
        validate: "required",
        id: "tourEndTime",
        type: "timePicker",

        timeOnly: true,
        newclasses: {
          "tour-date-1": true
        },
        editable: {
          img: "/images/stopwatch.svg",
          after: "Uhr",
          saveData: function saveData(newval, afterFinish) {
            _this.saveMillistones("tour_finish_time", newval, function (response) {
              _this.tour.tour_dates = response.tour_dates;
              afterFinish();
            });
          },
          toBeShown: this.tourEndTime
        }
      };
    },
    startTimeProps: function startTimeProps() {
      var _this2 = this;

      return {
        name: "TourStart",
        placeholder: trans("front.buissness.tourStartTime"),
        validate: "required",
        id: "tourStartTime",
        type: "timePicker",
        minDate: window.moment(new Date().setHours(0, 0, 0, 0)),
        timeOnly: true,
        newclasses: {
          "tour-date-1": true
        },
        editable: {
          img: "/images/stopwatch.svg",
          after: "Uhr",
          saveData: function saveData(newval, afterFinish) {
            _this2.saveMillistones("tour_start_time", newval, function (response) {
              _this2.tour.tour_dates = response.tour_dates;
              afterFinish();
            });
          },
          toBeShown: this.tourStratTime
        }
      };
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    saveMillistones: function saveMillistones(millistone, newval, successServerFunction) {
      var mydata = {};
      mydata[millistone] = newval;
      var formdata = {
        url: "/api/tours/edit/" + this.$route.params.tourId + "/tour_details",
        data: mydata,
        validate: this.$validator,

        failedValidate: function failedValidate(data) {},
        successServer: function successServer(response) {
          successServerFunction(response.body);
        },
        failServer: function failServer(error) {
          console.log(error);
        }
      };
      this.$vss.post(formdata);
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 786:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "start-end-time-wrapper" }, [
    _c("div", { staticClass: "start-time-div" }, [
      _c("div", { staticClass: "start-time-heading" }, [
        _vm._v(_vm._s(_vm.trans("front.touroffers.startTime")))
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "start-time-content" }, [
        _c("div", { staticClass: "start-time-img" }, [
          _c("img", {
            attrs: {
              src: "/images/stopwatch.svg",
              alt: _vm.trans("front.touroffers.startTime"),
              title: _vm.trans("front.touroffers.startTime"),
              "data-toggle": "tooltip"
            }
          })
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "start-time-val" },
          [
            _c(
              "editable",
              _vm._b(
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.tourStratTime,
                      expression: "tourStratTime"
                    }
                  ],
                  model: {
                    value: _vm.tourStartTimee,
                    callback: function($$v) {
                      _vm.tourStartTimee = $$v
                    },
                    expression: "tourStartTimee"
                  }
                },
                "editable",
                _vm.startTimeProps,
                false
              )
            )
          ],
          1
        )
      ])
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "start-time-div" }, [
      _c("div", { staticClass: "start-time-heading" }, [
        _vm._v(_vm._s(_vm.endTimeText))
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "start-time-content" }, [
        _c("div", { staticClass: "start-time-img" }, [
          _c("img", {
            attrs: {
              src: "/images/stopwatch.svg",
              alt: _vm.endTimeText,
              title: _vm.endTimeText,
              "data-toggle": "tooltip"
            }
          })
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "start-time-val" },
          [
            _c(
              "editable",
              _vm._b(
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.tourEndTime,
                      expression: "tourEndTime"
                    }
                  ],
                  model: {
                    value: _vm.tourEndTimee,
                    callback: function($$v) {
                      _vm.tourEndTimee = $$v
                    },
                    expression: "tourEndTimee"
                  }
                },
                "editable",
                _vm.endTimeProps,
                false
              )
            )
          ],
          1
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
    require("vue-hot-reload-api")      .rerender("data-v-6810e854", module.exports)
  }
}

/***/ }),

/***/ 787:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "stops-row-vertical" }, [
    _c(
      "div",
      { staticClass: "stops-rows-wrapper" },
      [
        _c("div", { staticClass: "stops-rows-header" }, [
          _c(
            "div",
            {
              staticClass: "stops-row-header-half",
              attrs: {
                "data-toggle": "tooltip",
                title: _vm.trans("front.touroffers.startDate")
              }
            },
            [
              _c("div", { staticClass: "svg-with-text" }, [
                _c("img", {
                  attrs: {
                    src: "/images/calendar-day.svg",
                    alt: _vm.trans("front.touroffers.startDate")
                  }
                }),
                _vm._v(" "),
                _c("span", { staticClass: "svg-text" }, [
                  _vm._v(_vm._s(_vm.tourStartDate.date()))
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "month-date" }, [
                _vm._v(_vm._s(_vm.tourStartDate.format("MMM YYYY")))
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "stops-row-header-half" },
            [
              _c(
                "editable",
                _vm._b(
                  {
                    directives: [
                      {
                        name: "show",
                        rawName: "v-show",
                        value: _vm.tourEndDate,
                        expression: "tourEndDate"
                      }
                    ],
                    staticStyle: { "font-size": "16px" },
                    model: {
                      value: _vm.tourEndDatee,
                      callback: function($$v) {
                        _vm.tourEndDatee = $$v
                      },
                      expression: "tourEndDatee"
                    }
                  },
                  "editable",
                  _vm.endDateInput,
                  false
                )
              )
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c(
          "week-days-input",
          { attrs: { tour: _vm.tour } },
          [
            _vm.tour && _vm.tour.tour_dates
              ? _c("start-time-edit", {
                  attrs: { slot: "besideDaysShow", tour: _vm.tour },
                  slot: "besideDaysShow"
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
    require("vue-hot-reload-api")      .rerender("data-v-9a4bd424", module.exports)
  }
}

/***/ }),

/***/ 788:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(789)
/* template */
var __vue_template__ = __webpack_require__(798)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/tourStops.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3ec63e96", Component.options)
  } else {
    hotAPI.reload("data-v-3ec63e96", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 789:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuedraggable__ = __webpack_require__(790);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuedraggable___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vuedraggable__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      currentShown: 1,
      drag: false
    };
  },

  computed: {
    dragOptions: function dragOptions() {
      return {
        animation: 200,
        group: "description",
        disabled: false,
        ghostClass: "ghost",
        scroll: true
      };
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    dragEnd: function dragEnd(event) {
      console.log(event.newIndex, event.oldIndex, event);

      this.drag = false;
    }
  },
  components: {
    draggable: __WEBPACK_IMPORTED_MODULE_0_vuedraggable___default.a,
    "kurier-stop": __webpack_require__(792)
  },
  created: function created() {
    this.tour.stops = this.tour.stops.sort(function (a, b) {
      return a.stop_index - b.stop_index;
    });
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ 790:
/***/ (function(module, exports, __webpack_require__) {

module.exports =
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "fb15");
/******/ })
/************************************************************************/
/******/ ({

/***/ "02f4":
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__("4588");
var defined = __webpack_require__("be13");
// true  -> String#at
// false -> String#codePointAt
module.exports = function (TO_STRING) {
  return function (that, pos) {
    var s = String(defined(that));
    var i = toInteger(pos);
    var l = s.length;
    var a, b;
    if (i < 0 || i >= l) return TO_STRING ? '' : undefined;
    a = s.charCodeAt(i);
    return a < 0xd800 || a > 0xdbff || i + 1 === l || (b = s.charCodeAt(i + 1)) < 0xdc00 || b > 0xdfff
      ? TO_STRING ? s.charAt(i) : a
      : TO_STRING ? s.slice(i, i + 2) : (a - 0xd800 << 10) + (b - 0xdc00) + 0x10000;
  };
};


/***/ }),

/***/ "0390":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var at = __webpack_require__("02f4")(true);

 // `AdvanceStringIndex` abstract operation
// https://tc39.github.io/ecma262/#sec-advancestringindex
module.exports = function (S, index, unicode) {
  return index + (unicode ? at(S, index).length : 1);
};


/***/ }),

/***/ "07e3":
/***/ (function(module, exports) {

var hasOwnProperty = {}.hasOwnProperty;
module.exports = function (it, key) {
  return hasOwnProperty.call(it, key);
};


/***/ }),

/***/ "0bfb":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

// 21.2.5.3 get RegExp.prototype.flags
var anObject = __webpack_require__("cb7c");
module.exports = function () {
  var that = anObject(this);
  var result = '';
  if (that.global) result += 'g';
  if (that.ignoreCase) result += 'i';
  if (that.multiline) result += 'm';
  if (that.unicode) result += 'u';
  if (that.sticky) result += 'y';
  return result;
};


/***/ }),

/***/ "0fc9":
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__("3a38");
var max = Math.max;
var min = Math.min;
module.exports = function (index, length) {
  index = toInteger(index);
  return index < 0 ? max(index + length, 0) : min(index, length);
};


/***/ }),

/***/ "1654":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $at = __webpack_require__("71c1")(true);

// 21.1.3.27 String.prototype[@@iterator]()
__webpack_require__("30f1")(String, 'String', function (iterated) {
  this._t = String(iterated); // target
  this._i = 0;                // next index
// 21.1.5.2.1 %StringIteratorPrototype%.next()
}, function () {
  var O = this._t;
  var index = this._i;
  var point;
  if (index >= O.length) return { value: undefined, done: true };
  point = $at(O, index);
  this._i += point.length;
  return { value: point, done: false };
});


/***/ }),

/***/ "1691":
/***/ (function(module, exports) {

// IE 8- don't enum bug keys
module.exports = (
  'constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf'
).split(',');


/***/ }),

/***/ "1af6":
/***/ (function(module, exports, __webpack_require__) {

// 22.1.2.2 / 15.4.3.2 Array.isArray(arg)
var $export = __webpack_require__("63b6");

$export($export.S, 'Array', { isArray: __webpack_require__("9003") });


/***/ }),

/***/ "1bc3":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.1 ToPrimitive(input [, PreferredType])
var isObject = __webpack_require__("f772");
// instead of the ES6 spec version, we didn't implement @@toPrimitive case
// and the second argument - flag - preferred type is a string
module.exports = function (it, S) {
  if (!isObject(it)) return it;
  var fn, val;
  if (S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  if (typeof (fn = it.valueOf) == 'function' && !isObject(val = fn.call(it))) return val;
  if (!S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  throw TypeError("Can't convert object to primitive value");
};


/***/ }),

/***/ "1ec9":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("f772");
var document = __webpack_require__("e53d").document;
// typeof document.createElement is 'object' in old IE
var is = isObject(document) && isObject(document.createElement);
module.exports = function (it) {
  return is ? document.createElement(it) : {};
};


/***/ }),

/***/ "20fd":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $defineProperty = __webpack_require__("d9f6");
var createDesc = __webpack_require__("aebd");

module.exports = function (object, index, value) {
  if (index in object) $defineProperty.f(object, index, createDesc(0, value));
  else object[index] = value;
};


/***/ }),

/***/ "214f":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

__webpack_require__("b0c5");
var redefine = __webpack_require__("2aba");
var hide = __webpack_require__("32e9");
var fails = __webpack_require__("79e5");
var defined = __webpack_require__("be13");
var wks = __webpack_require__("2b4c");
var regexpExec = __webpack_require__("520a");

var SPECIES = wks('species');

var REPLACE_SUPPORTS_NAMED_GROUPS = !fails(function () {
  // #replace needs built-in support for named groups.
  // #match works fine because it just return the exec results, even if it has
  // a "grops" property.
  var re = /./;
  re.exec = function () {
    var result = [];
    result.groups = { a: '7' };
    return result;
  };
  return ''.replace(re, '$<a>') !== '7';
});

var SPLIT_WORKS_WITH_OVERWRITTEN_EXEC = (function () {
  // Chrome 51 has a buggy "split" implementation when RegExp#exec !== nativeExec
  var re = /(?:)/;
  var originalExec = re.exec;
  re.exec = function () { return originalExec.apply(this, arguments); };
  var result = 'ab'.split(re);
  return result.length === 2 && result[0] === 'a' && result[1] === 'b';
})();

module.exports = function (KEY, length, exec) {
  var SYMBOL = wks(KEY);

  var DELEGATES_TO_SYMBOL = !fails(function () {
    // String methods call symbol-named RegEp methods
    var O = {};
    O[SYMBOL] = function () { return 7; };
    return ''[KEY](O) != 7;
  });

  var DELEGATES_TO_EXEC = DELEGATES_TO_SYMBOL ? !fails(function () {
    // Symbol-named RegExp methods call .exec
    var execCalled = false;
    var re = /a/;
    re.exec = function () { execCalled = true; return null; };
    if (KEY === 'split') {
      // RegExp[@@split] doesn't call the regex's exec method, but first creates
      // a new one. We need to return the patched regex when creating the new one.
      re.constructor = {};
      re.constructor[SPECIES] = function () { return re; };
    }
    re[SYMBOL]('');
    return !execCalled;
  }) : undefined;

  if (
    !DELEGATES_TO_SYMBOL ||
    !DELEGATES_TO_EXEC ||
    (KEY === 'replace' && !REPLACE_SUPPORTS_NAMED_GROUPS) ||
    (KEY === 'split' && !SPLIT_WORKS_WITH_OVERWRITTEN_EXEC)
  ) {
    var nativeRegExpMethod = /./[SYMBOL];
    var fns = exec(
      defined,
      SYMBOL,
      ''[KEY],
      function maybeCallNative(nativeMethod, regexp, str, arg2, forceStringMethod) {
        if (regexp.exec === regexpExec) {
          if (DELEGATES_TO_SYMBOL && !forceStringMethod) {
            // The native String method already delegates to @@method (this
            // polyfilled function), leasing to infinite recursion.
            // We avoid it by directly calling the native @@method method.
            return { done: true, value: nativeRegExpMethod.call(regexp, str, arg2) };
          }
          return { done: true, value: nativeMethod.call(str, regexp, arg2) };
        }
        return { done: false };
      }
    );
    var strfn = fns[0];
    var rxfn = fns[1];

    redefine(String.prototype, KEY, strfn);
    hide(RegExp.prototype, SYMBOL, length == 2
      // 21.2.5.8 RegExp.prototype[@@replace](string, replaceValue)
      // 21.2.5.11 RegExp.prototype[@@split](string, limit)
      ? function (string, arg) { return rxfn.call(string, this, arg); }
      // 21.2.5.6 RegExp.prototype[@@match](string)
      // 21.2.5.9 RegExp.prototype[@@search](string)
      : function (string) { return rxfn.call(string, this); }
    );
  }
};


/***/ }),

/***/ "230e":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("d3f4");
var document = __webpack_require__("7726").document;
// typeof document.createElement is 'object' in old IE
var is = isObject(document) && isObject(document.createElement);
module.exports = function (it) {
  return is ? document.createElement(it) : {};
};


/***/ }),

/***/ "23c6":
/***/ (function(module, exports, __webpack_require__) {

// getting tag from 19.1.3.6 Object.prototype.toString()
var cof = __webpack_require__("2d95");
var TAG = __webpack_require__("2b4c")('toStringTag');
// ES3 wrong here
var ARG = cof(function () { return arguments; }()) == 'Arguments';

// fallback for IE11 Script Access Denied error
var tryGet = function (it, key) {
  try {
    return it[key];
  } catch (e) { /* empty */ }
};

module.exports = function (it) {
  var O, T, B;
  return it === undefined ? 'Undefined' : it === null ? 'Null'
    // @@toStringTag case
    : typeof (T = tryGet(O = Object(it), TAG)) == 'string' ? T
    // builtinTag case
    : ARG ? cof(O)
    // ES3 arguments fallback
    : (B = cof(O)) == 'Object' && typeof O.callee == 'function' ? 'Arguments' : B;
};


/***/ }),

/***/ "241e":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.13 ToObject(argument)
var defined = __webpack_require__("25eb");
module.exports = function (it) {
  return Object(defined(it));
};


/***/ }),

/***/ "25eb":
/***/ (function(module, exports) {

// 7.2.1 RequireObjectCoercible(argument)
module.exports = function (it) {
  if (it == undefined) throw TypeError("Can't call method on  " + it);
  return it;
};


/***/ }),

/***/ "294c":
/***/ (function(module, exports) {

module.exports = function (exec) {
  try {
    return !!exec();
  } catch (e) {
    return true;
  }
};


/***/ }),

/***/ "2aba":
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__("7726");
var hide = __webpack_require__("32e9");
var has = __webpack_require__("69a8");
var SRC = __webpack_require__("ca5a")('src');
var $toString = __webpack_require__("fa5b");
var TO_STRING = 'toString';
var TPL = ('' + $toString).split(TO_STRING);

__webpack_require__("8378").inspectSource = function (it) {
  return $toString.call(it);
};

(module.exports = function (O, key, val, safe) {
  var isFunction = typeof val == 'function';
  if (isFunction) has(val, 'name') || hide(val, 'name', key);
  if (O[key] === val) return;
  if (isFunction) has(val, SRC) || hide(val, SRC, O[key] ? '' + O[key] : TPL.join(String(key)));
  if (O === global) {
    O[key] = val;
  } else if (!safe) {
    delete O[key];
    hide(O, key, val);
  } else if (O[key]) {
    O[key] = val;
  } else {
    hide(O, key, val);
  }
// add fake Function#toString for correct work wrapped methods / constructors with methods like LoDash isNative
})(Function.prototype, TO_STRING, function toString() {
  return typeof this == 'function' && this[SRC] || $toString.call(this);
});


/***/ }),

/***/ "2b4c":
/***/ (function(module, exports, __webpack_require__) {

var store = __webpack_require__("5537")('wks');
var uid = __webpack_require__("ca5a");
var Symbol = __webpack_require__("7726").Symbol;
var USE_SYMBOL = typeof Symbol == 'function';

var $exports = module.exports = function (name) {
  return store[name] || (store[name] =
    USE_SYMBOL && Symbol[name] || (USE_SYMBOL ? Symbol : uid)('Symbol.' + name));
};

$exports.store = store;


/***/ }),

/***/ "2d00":
/***/ (function(module, exports) {

module.exports = false;


/***/ }),

/***/ "2d95":
/***/ (function(module, exports) {

var toString = {}.toString;

module.exports = function (it) {
  return toString.call(it).slice(8, -1);
};


/***/ }),

/***/ "2fdb":
/***/ (function(module, exports, __webpack_require__) {

"use strict";
// 21.1.3.7 String.prototype.includes(searchString, position = 0)

var $export = __webpack_require__("5ca1");
var context = __webpack_require__("d2c8");
var INCLUDES = 'includes';

$export($export.P + $export.F * __webpack_require__("5147")(INCLUDES), 'String', {
  includes: function includes(searchString /* , position = 0 */) {
    return !!~context(this, searchString, INCLUDES)
      .indexOf(searchString, arguments.length > 1 ? arguments[1] : undefined);
  }
});


/***/ }),

/***/ "30f1":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var LIBRARY = __webpack_require__("b8e3");
var $export = __webpack_require__("63b6");
var redefine = __webpack_require__("9138");
var hide = __webpack_require__("35e8");
var Iterators = __webpack_require__("481b");
var $iterCreate = __webpack_require__("8f60");
var setToStringTag = __webpack_require__("45f2");
var getPrototypeOf = __webpack_require__("53e2");
var ITERATOR = __webpack_require__("5168")('iterator');
var BUGGY = !([].keys && 'next' in [].keys()); // Safari has buggy iterators w/o `next`
var FF_ITERATOR = '@@iterator';
var KEYS = 'keys';
var VALUES = 'values';

var returnThis = function () { return this; };

module.exports = function (Base, NAME, Constructor, next, DEFAULT, IS_SET, FORCED) {
  $iterCreate(Constructor, NAME, next);
  var getMethod = function (kind) {
    if (!BUGGY && kind in proto) return proto[kind];
    switch (kind) {
      case KEYS: return function keys() { return new Constructor(this, kind); };
      case VALUES: return function values() { return new Constructor(this, kind); };
    } return function entries() { return new Constructor(this, kind); };
  };
  var TAG = NAME + ' Iterator';
  var DEF_VALUES = DEFAULT == VALUES;
  var VALUES_BUG = false;
  var proto = Base.prototype;
  var $native = proto[ITERATOR] || proto[FF_ITERATOR] || DEFAULT && proto[DEFAULT];
  var $default = $native || getMethod(DEFAULT);
  var $entries = DEFAULT ? !DEF_VALUES ? $default : getMethod('entries') : undefined;
  var $anyNative = NAME == 'Array' ? proto.entries || $native : $native;
  var methods, key, IteratorPrototype;
  // Fix native
  if ($anyNative) {
    IteratorPrototype = getPrototypeOf($anyNative.call(new Base()));
    if (IteratorPrototype !== Object.prototype && IteratorPrototype.next) {
      // Set @@toStringTag to native iterators
      setToStringTag(IteratorPrototype, TAG, true);
      // fix for some old engines
      if (!LIBRARY && typeof IteratorPrototype[ITERATOR] != 'function') hide(IteratorPrototype, ITERATOR, returnThis);
    }
  }
  // fix Array#{values, @@iterator}.name in V8 / FF
  if (DEF_VALUES && $native && $native.name !== VALUES) {
    VALUES_BUG = true;
    $default = function values() { return $native.call(this); };
  }
  // Define iterator
  if ((!LIBRARY || FORCED) && (BUGGY || VALUES_BUG || !proto[ITERATOR])) {
    hide(proto, ITERATOR, $default);
  }
  // Plug for library
  Iterators[NAME] = $default;
  Iterators[TAG] = returnThis;
  if (DEFAULT) {
    methods = {
      values: DEF_VALUES ? $default : getMethod(VALUES),
      keys: IS_SET ? $default : getMethod(KEYS),
      entries: $entries
    };
    if (FORCED) for (key in methods) {
      if (!(key in proto)) redefine(proto, key, methods[key]);
    } else $export($export.P + $export.F * (BUGGY || VALUES_BUG), NAME, methods);
  }
  return methods;
};


/***/ }),

/***/ "32a6":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.14 Object.keys(O)
var toObject = __webpack_require__("241e");
var $keys = __webpack_require__("c3a1");

__webpack_require__("ce7e")('keys', function () {
  return function keys(it) {
    return $keys(toObject(it));
  };
});


/***/ }),

/***/ "32e9":
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__("86cc");
var createDesc = __webpack_require__("4630");
module.exports = __webpack_require__("9e1e") ? function (object, key, value) {
  return dP.f(object, key, createDesc(1, value));
} : function (object, key, value) {
  object[key] = value;
  return object;
};


/***/ }),

/***/ "32fc":
/***/ (function(module, exports, __webpack_require__) {

var document = __webpack_require__("e53d").document;
module.exports = document && document.documentElement;


/***/ }),

/***/ "335c":
/***/ (function(module, exports, __webpack_require__) {

// fallback for non-array-like ES3 and non-enumerable old V8 strings
var cof = __webpack_require__("6b4c");
// eslint-disable-next-line no-prototype-builtins
module.exports = Object('z').propertyIsEnumerable(0) ? Object : function (it) {
  return cof(it) == 'String' ? it.split('') : Object(it);
};


/***/ }),

/***/ "355d":
/***/ (function(module, exports) {

exports.f = {}.propertyIsEnumerable;


/***/ }),

/***/ "35e8":
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__("d9f6");
var createDesc = __webpack_require__("aebd");
module.exports = __webpack_require__("8e60") ? function (object, key, value) {
  return dP.f(object, key, createDesc(1, value));
} : function (object, key, value) {
  object[key] = value;
  return object;
};


/***/ }),

/***/ "36c3":
/***/ (function(module, exports, __webpack_require__) {

// to indexed object, toObject with fallback for non-array-like ES3 strings
var IObject = __webpack_require__("335c");
var defined = __webpack_require__("25eb");
module.exports = function (it) {
  return IObject(defined(it));
};


/***/ }),

/***/ "3702":
/***/ (function(module, exports, __webpack_require__) {

// check on default Array iterator
var Iterators = __webpack_require__("481b");
var ITERATOR = __webpack_require__("5168")('iterator');
var ArrayProto = Array.prototype;

module.exports = function (it) {
  return it !== undefined && (Iterators.Array === it || ArrayProto[ITERATOR] === it);
};


/***/ }),

/***/ "3a38":
/***/ (function(module, exports) {

// 7.1.4 ToInteger
var ceil = Math.ceil;
var floor = Math.floor;
module.exports = function (it) {
  return isNaN(it = +it) ? 0 : (it > 0 ? floor : ceil)(it);
};


/***/ }),

/***/ "40c3":
/***/ (function(module, exports, __webpack_require__) {

// getting tag from 19.1.3.6 Object.prototype.toString()
var cof = __webpack_require__("6b4c");
var TAG = __webpack_require__("5168")('toStringTag');
// ES3 wrong here
var ARG = cof(function () { return arguments; }()) == 'Arguments';

// fallback for IE11 Script Access Denied error
var tryGet = function (it, key) {
  try {
    return it[key];
  } catch (e) { /* empty */ }
};

module.exports = function (it) {
  var O, T, B;
  return it === undefined ? 'Undefined' : it === null ? 'Null'
    // @@toStringTag case
    : typeof (T = tryGet(O = Object(it), TAG)) == 'string' ? T
    // builtinTag case
    : ARG ? cof(O)
    // ES3 arguments fallback
    : (B = cof(O)) == 'Object' && typeof O.callee == 'function' ? 'Arguments' : B;
};


/***/ }),

/***/ "4588":
/***/ (function(module, exports) {

// 7.1.4 ToInteger
var ceil = Math.ceil;
var floor = Math.floor;
module.exports = function (it) {
  return isNaN(it = +it) ? 0 : (it > 0 ? floor : ceil)(it);
};


/***/ }),

/***/ "45f2":
/***/ (function(module, exports, __webpack_require__) {

var def = __webpack_require__("d9f6").f;
var has = __webpack_require__("07e3");
var TAG = __webpack_require__("5168")('toStringTag');

module.exports = function (it, tag, stat) {
  if (it && !has(it = stat ? it : it.prototype, TAG)) def(it, TAG, { configurable: true, value: tag });
};


/***/ }),

/***/ "4630":
/***/ (function(module, exports) {

module.exports = function (bitmap, value) {
  return {
    enumerable: !(bitmap & 1),
    configurable: !(bitmap & 2),
    writable: !(bitmap & 4),
    value: value
  };
};


/***/ }),

/***/ "469f":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("6c1c");
__webpack_require__("1654");
module.exports = __webpack_require__("7d7b");


/***/ }),

/***/ "481b":
/***/ (function(module, exports) {

module.exports = {};


/***/ }),

/***/ "4aa6":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("dc62");

/***/ }),

/***/ "4bf8":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.13 ToObject(argument)
var defined = __webpack_require__("be13");
module.exports = function (it) {
  return Object(defined(it));
};


/***/ }),

/***/ "4ee1":
/***/ (function(module, exports, __webpack_require__) {

var ITERATOR = __webpack_require__("5168")('iterator');
var SAFE_CLOSING = false;

try {
  var riter = [7][ITERATOR]();
  riter['return'] = function () { SAFE_CLOSING = true; };
  // eslint-disable-next-line no-throw-literal
  Array.from(riter, function () { throw 2; });
} catch (e) { /* empty */ }

module.exports = function (exec, skipClosing) {
  if (!skipClosing && !SAFE_CLOSING) return false;
  var safe = false;
  try {
    var arr = [7];
    var iter = arr[ITERATOR]();
    iter.next = function () { return { done: safe = true }; };
    arr[ITERATOR] = function () { return iter; };
    exec(arr);
  } catch (e) { /* empty */ }
  return safe;
};


/***/ }),

/***/ "50ed":
/***/ (function(module, exports) {

module.exports = function (done, value) {
  return { value: value, done: !!done };
};


/***/ }),

/***/ "5147":
/***/ (function(module, exports, __webpack_require__) {

var MATCH = __webpack_require__("2b4c")('match');
module.exports = function (KEY) {
  var re = /./;
  try {
    '/./'[KEY](re);
  } catch (e) {
    try {
      re[MATCH] = false;
      return !'/./'[KEY](re);
    } catch (f) { /* empty */ }
  } return true;
};


/***/ }),

/***/ "5168":
/***/ (function(module, exports, __webpack_require__) {

var store = __webpack_require__("dbdb")('wks');
var uid = __webpack_require__("62a0");
var Symbol = __webpack_require__("e53d").Symbol;
var USE_SYMBOL = typeof Symbol == 'function';

var $exports = module.exports = function (name) {
  return store[name] || (store[name] =
    USE_SYMBOL && Symbol[name] || (USE_SYMBOL ? Symbol : uid)('Symbol.' + name));
};

$exports.store = store;


/***/ }),

/***/ "5176":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("51b6");

/***/ }),

/***/ "51b6":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("a3c3");
module.exports = __webpack_require__("584a").Object.assign;


/***/ }),

/***/ "520a":
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var regexpFlags = __webpack_require__("0bfb");

var nativeExec = RegExp.prototype.exec;
// This always refers to the native implementation, because the
// String#replace polyfill uses ./fix-regexp-well-known-symbol-logic.js,
// which loads this file before patching the method.
var nativeReplace = String.prototype.replace;

var patchedExec = nativeExec;

var LAST_INDEX = 'lastIndex';

var UPDATES_LAST_INDEX_WRONG = (function () {
  var re1 = /a/,
      re2 = /b*/g;
  nativeExec.call(re1, 'a');
  nativeExec.call(re2, 'a');
  return re1[LAST_INDEX] !== 0 || re2[LAST_INDEX] !== 0;
})();

// nonparticipating capturing group, copied from es5-shim's String#split patch.
var NPCG_INCLUDED = /()??/.exec('')[1] !== undefined;

var PATCH = UPDATES_LAST_INDEX_WRONG || NPCG_INCLUDED;

if (PATCH) {
  patchedExec = function exec(str) {
    var re = this;
    var lastIndex, reCopy, match, i;

    if (NPCG_INCLUDED) {
      reCopy = new RegExp('^' + re.source + '$(?!\\s)', regexpFlags.call(re));
    }
    if (UPDATES_LAST_INDEX_WRONG) lastIndex = re[LAST_INDEX];

    match = nativeExec.call(re, str);

    if (UPDATES_LAST_INDEX_WRONG && match) {
      re[LAST_INDEX] = re.global ? match.index + match[0].length : lastIndex;
    }
    if (NPCG_INCLUDED && match && match.length > 1) {
      // Fix browsers whose `exec` methods don't consistently return `undefined`
      // for NPCG, like IE8. NOTE: This doesn' work for /(.?)?/
      // eslint-disable-next-line no-loop-func
      nativeReplace.call(match[0], reCopy, function () {
        for (i = 1; i < arguments.length - 2; i++) {
          if (arguments[i] === undefined) match[i] = undefined;
        }
      });
    }

    return match;
  };
}

module.exports = patchedExec;


/***/ }),

/***/ "53e2":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.9 / 15.2.3.2 Object.getPrototypeOf(O)
var has = __webpack_require__("07e3");
var toObject = __webpack_require__("241e");
var IE_PROTO = __webpack_require__("5559")('IE_PROTO');
var ObjectProto = Object.prototype;

module.exports = Object.getPrototypeOf || function (O) {
  O = toObject(O);
  if (has(O, IE_PROTO)) return O[IE_PROTO];
  if (typeof O.constructor == 'function' && O instanceof O.constructor) {
    return O.constructor.prototype;
  } return O instanceof Object ? ObjectProto : null;
};


/***/ }),

/***/ "549b":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var ctx = __webpack_require__("d864");
var $export = __webpack_require__("63b6");
var toObject = __webpack_require__("241e");
var call = __webpack_require__("b0dc");
var isArrayIter = __webpack_require__("3702");
var toLength = __webpack_require__("b447");
var createProperty = __webpack_require__("20fd");
var getIterFn = __webpack_require__("7cd6");

$export($export.S + $export.F * !__webpack_require__("4ee1")(function (iter) { Array.from(iter); }), 'Array', {
  // 22.1.2.1 Array.from(arrayLike, mapfn = undefined, thisArg = undefined)
  from: function from(arrayLike /* , mapfn = undefined, thisArg = undefined */) {
    var O = toObject(arrayLike);
    var C = typeof this == 'function' ? this : Array;
    var aLen = arguments.length;
    var mapfn = aLen > 1 ? arguments[1] : undefined;
    var mapping = mapfn !== undefined;
    var index = 0;
    var iterFn = getIterFn(O);
    var length, result, step, iterator;
    if (mapping) mapfn = ctx(mapfn, aLen > 2 ? arguments[2] : undefined, 2);
    // if object isn't iterable or it's array with default iterator - use simple case
    if (iterFn != undefined && !(C == Array && isArrayIter(iterFn))) {
      for (iterator = iterFn.call(O), result = new C(); !(step = iterator.next()).done; index++) {
        createProperty(result, index, mapping ? call(iterator, mapfn, [step.value, index], true) : step.value);
      }
    } else {
      length = toLength(O.length);
      for (result = new C(length); length > index; index++) {
        createProperty(result, index, mapping ? mapfn(O[index], index) : O[index]);
      }
    }
    result.length = index;
    return result;
  }
});


/***/ }),

/***/ "54a1":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("6c1c");
__webpack_require__("1654");
module.exports = __webpack_require__("95d5");


/***/ }),

/***/ "5537":
/***/ (function(module, exports, __webpack_require__) {

var core = __webpack_require__("8378");
var global = __webpack_require__("7726");
var SHARED = '__core-js_shared__';
var store = global[SHARED] || (global[SHARED] = {});

(module.exports = function (key, value) {
  return store[key] || (store[key] = value !== undefined ? value : {});
})('versions', []).push({
  version: core.version,
  mode: __webpack_require__("2d00") ? 'pure' : 'global',
  copyright: '© 2019 Denis Pushkarev (zloirock.ru)'
});


/***/ }),

/***/ "5559":
/***/ (function(module, exports, __webpack_require__) {

var shared = __webpack_require__("dbdb")('keys');
var uid = __webpack_require__("62a0");
module.exports = function (key) {
  return shared[key] || (shared[key] = uid(key));
};


/***/ }),

/***/ "584a":
/***/ (function(module, exports) {

var core = module.exports = { version: '2.6.5' };
if (typeof __e == 'number') __e = core; // eslint-disable-line no-undef


/***/ }),

/***/ "5b4e":
/***/ (function(module, exports, __webpack_require__) {

// false -> Array#indexOf
// true  -> Array#includes
var toIObject = __webpack_require__("36c3");
var toLength = __webpack_require__("b447");
var toAbsoluteIndex = __webpack_require__("0fc9");
module.exports = function (IS_INCLUDES) {
  return function ($this, el, fromIndex) {
    var O = toIObject($this);
    var length = toLength(O.length);
    var index = toAbsoluteIndex(fromIndex, length);
    var value;
    // Array#includes uses SameValueZero equality algorithm
    // eslint-disable-next-line no-self-compare
    if (IS_INCLUDES && el != el) while (length > index) {
      value = O[index++];
      // eslint-disable-next-line no-self-compare
      if (value != value) return true;
    // Array#indexOf ignores holes, Array#includes - not
    } else for (;length > index; index++) if (IS_INCLUDES || index in O) {
      if (O[index] === el) return IS_INCLUDES || index || 0;
    } return !IS_INCLUDES && -1;
  };
};


/***/ }),

/***/ "5ca1":
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__("7726");
var core = __webpack_require__("8378");
var hide = __webpack_require__("32e9");
var redefine = __webpack_require__("2aba");
var ctx = __webpack_require__("9b43");
var PROTOTYPE = 'prototype';

var $export = function (type, name, source) {
  var IS_FORCED = type & $export.F;
  var IS_GLOBAL = type & $export.G;
  var IS_STATIC = type & $export.S;
  var IS_PROTO = type & $export.P;
  var IS_BIND = type & $export.B;
  var target = IS_GLOBAL ? global : IS_STATIC ? global[name] || (global[name] = {}) : (global[name] || {})[PROTOTYPE];
  var exports = IS_GLOBAL ? core : core[name] || (core[name] = {});
  var expProto = exports[PROTOTYPE] || (exports[PROTOTYPE] = {});
  var key, own, out, exp;
  if (IS_GLOBAL) source = name;
  for (key in source) {
    // contains in native
    own = !IS_FORCED && target && target[key] !== undefined;
    // export native or passed
    out = (own ? target : source)[key];
    // bind timers to global for call from export context
    exp = IS_BIND && own ? ctx(out, global) : IS_PROTO && typeof out == 'function' ? ctx(Function.call, out) : out;
    // extend global
    if (target) redefine(target, key, out, type & $export.U);
    // export
    if (exports[key] != out) hide(exports, key, exp);
    if (IS_PROTO && expProto[key] != out) expProto[key] = out;
  }
};
global.core = core;
// type bitmap
$export.F = 1;   // forced
$export.G = 2;   // global
$export.S = 4;   // static
$export.P = 8;   // proto
$export.B = 16;  // bind
$export.W = 32;  // wrap
$export.U = 64;  // safe
$export.R = 128; // real proto method for `library`
module.exports = $export;


/***/ }),

/***/ "5d73":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("469f");

/***/ }),

/***/ "5f1b":
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var classof = __webpack_require__("23c6");
var builtinExec = RegExp.prototype.exec;

 // `RegExpExec` abstract operation
// https://tc39.github.io/ecma262/#sec-regexpexec
module.exports = function (R, S) {
  var exec = R.exec;
  if (typeof exec === 'function') {
    var result = exec.call(R, S);
    if (typeof result !== 'object') {
      throw new TypeError('RegExp exec method returned something other than an Object or null');
    }
    return result;
  }
  if (classof(R) !== 'RegExp') {
    throw new TypeError('RegExp#exec called on incompatible receiver');
  }
  return builtinExec.call(R, S);
};


/***/ }),

/***/ "626a":
/***/ (function(module, exports, __webpack_require__) {

// fallback for non-array-like ES3 and non-enumerable old V8 strings
var cof = __webpack_require__("2d95");
// eslint-disable-next-line no-prototype-builtins
module.exports = Object('z').propertyIsEnumerable(0) ? Object : function (it) {
  return cof(it) == 'String' ? it.split('') : Object(it);
};


/***/ }),

/***/ "62a0":
/***/ (function(module, exports) {

var id = 0;
var px = Math.random();
module.exports = function (key) {
  return 'Symbol('.concat(key === undefined ? '' : key, ')_', (++id + px).toString(36));
};


/***/ }),

/***/ "63b6":
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__("e53d");
var core = __webpack_require__("584a");
var ctx = __webpack_require__("d864");
var hide = __webpack_require__("35e8");
var has = __webpack_require__("07e3");
var PROTOTYPE = 'prototype';

var $export = function (type, name, source) {
  var IS_FORCED = type & $export.F;
  var IS_GLOBAL = type & $export.G;
  var IS_STATIC = type & $export.S;
  var IS_PROTO = type & $export.P;
  var IS_BIND = type & $export.B;
  var IS_WRAP = type & $export.W;
  var exports = IS_GLOBAL ? core : core[name] || (core[name] = {});
  var expProto = exports[PROTOTYPE];
  var target = IS_GLOBAL ? global : IS_STATIC ? global[name] : (global[name] || {})[PROTOTYPE];
  var key, own, out;
  if (IS_GLOBAL) source = name;
  for (key in source) {
    // contains in native
    own = !IS_FORCED && target && target[key] !== undefined;
    if (own && has(exports, key)) continue;
    // export native or passed
    out = own ? target[key] : source[key];
    // prevent global pollution for namespaces
    exports[key] = IS_GLOBAL && typeof target[key] != 'function' ? source[key]
    // bind timers to global for call from export context
    : IS_BIND && own ? ctx(out, global)
    // wrap global constructors for prevent change them in library
    : IS_WRAP && target[key] == out ? (function (C) {
      var F = function (a, b, c) {
        if (this instanceof C) {
          switch (arguments.length) {
            case 0: return new C();
            case 1: return new C(a);
            case 2: return new C(a, b);
          } return new C(a, b, c);
        } return C.apply(this, arguments);
      };
      F[PROTOTYPE] = C[PROTOTYPE];
      return F;
    // make static versions for prototype methods
    })(out) : IS_PROTO && typeof out == 'function' ? ctx(Function.call, out) : out;
    // export proto methods to core.%CONSTRUCTOR%.methods.%NAME%
    if (IS_PROTO) {
      (exports.virtual || (exports.virtual = {}))[key] = out;
      // export proto methods to core.%CONSTRUCTOR%.prototype.%NAME%
      if (type & $export.R && expProto && !expProto[key]) hide(expProto, key, out);
    }
  }
};
// type bitmap
$export.F = 1;   // forced
$export.G = 2;   // global
$export.S = 4;   // static
$export.P = 8;   // proto
$export.B = 16;  // bind
$export.W = 32;  // wrap
$export.U = 64;  // safe
$export.R = 128; // real proto method for `library`
module.exports = $export;


/***/ }),

/***/ "6762":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

// https://github.com/tc39/Array.prototype.includes
var $export = __webpack_require__("5ca1");
var $includes = __webpack_require__("c366")(true);

$export($export.P, 'Array', {
  includes: function includes(el /* , fromIndex = 0 */) {
    return $includes(this, el, arguments.length > 1 ? arguments[1] : undefined);
  }
});

__webpack_require__("9c6c")('includes');


/***/ }),

/***/ "6821":
/***/ (function(module, exports, __webpack_require__) {

// to indexed object, toObject with fallback for non-array-like ES3 strings
var IObject = __webpack_require__("626a");
var defined = __webpack_require__("be13");
module.exports = function (it) {
  return IObject(defined(it));
};


/***/ }),

/***/ "69a8":
/***/ (function(module, exports) {

var hasOwnProperty = {}.hasOwnProperty;
module.exports = function (it, key) {
  return hasOwnProperty.call(it, key);
};


/***/ }),

/***/ "6a99":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.1 ToPrimitive(input [, PreferredType])
var isObject = __webpack_require__("d3f4");
// instead of the ES6 spec version, we didn't implement @@toPrimitive case
// and the second argument - flag - preferred type is a string
module.exports = function (it, S) {
  if (!isObject(it)) return it;
  var fn, val;
  if (S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  if (typeof (fn = it.valueOf) == 'function' && !isObject(val = fn.call(it))) return val;
  if (!S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  throw TypeError("Can't convert object to primitive value");
};


/***/ }),

/***/ "6b4c":
/***/ (function(module, exports) {

var toString = {}.toString;

module.exports = function (it) {
  return toString.call(it).slice(8, -1);
};


/***/ }),

/***/ "6c1c":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("c367");
var global = __webpack_require__("e53d");
var hide = __webpack_require__("35e8");
var Iterators = __webpack_require__("481b");
var TO_STRING_TAG = __webpack_require__("5168")('toStringTag');

var DOMIterables = ('CSSRuleList,CSSStyleDeclaration,CSSValueList,ClientRectList,DOMRectList,DOMStringList,' +
  'DOMTokenList,DataTransferItemList,FileList,HTMLAllCollection,HTMLCollection,HTMLFormElement,HTMLSelectElement,' +
  'MediaList,MimeTypeArray,NamedNodeMap,NodeList,PaintRequestList,Plugin,PluginArray,SVGLengthList,SVGNumberList,' +
  'SVGPathSegList,SVGPointList,SVGStringList,SVGTransformList,SourceBufferList,StyleSheetList,TextTrackCueList,' +
  'TextTrackList,TouchList').split(',');

for (var i = 0; i < DOMIterables.length; i++) {
  var NAME = DOMIterables[i];
  var Collection = global[NAME];
  var proto = Collection && Collection.prototype;
  if (proto && !proto[TO_STRING_TAG]) hide(proto, TO_STRING_TAG, NAME);
  Iterators[NAME] = Iterators.Array;
}


/***/ }),

/***/ "71c1":
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__("3a38");
var defined = __webpack_require__("25eb");
// true  -> String#at
// false -> String#codePointAt
module.exports = function (TO_STRING) {
  return function (that, pos) {
    var s = String(defined(that));
    var i = toInteger(pos);
    var l = s.length;
    var a, b;
    if (i < 0 || i >= l) return TO_STRING ? '' : undefined;
    a = s.charCodeAt(i);
    return a < 0xd800 || a > 0xdbff || i + 1 === l || (b = s.charCodeAt(i + 1)) < 0xdc00 || b > 0xdfff
      ? TO_STRING ? s.charAt(i) : a
      : TO_STRING ? s.slice(i, i + 2) : (a - 0xd800 << 10) + (b - 0xdc00) + 0x10000;
  };
};


/***/ }),

/***/ "7726":
/***/ (function(module, exports) {

// https://github.com/zloirock/core-js/issues/86#issuecomment-115759028
var global = module.exports = typeof window != 'undefined' && window.Math == Math
  ? window : typeof self != 'undefined' && self.Math == Math ? self
  // eslint-disable-next-line no-new-func
  : Function('return this')();
if (typeof __g == 'number') __g = global; // eslint-disable-line no-undef


/***/ }),

/***/ "774e":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("d2d5");

/***/ }),

/***/ "77f1":
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__("4588");
var max = Math.max;
var min = Math.min;
module.exports = function (index, length) {
  index = toInteger(index);
  return index < 0 ? max(index + length, 0) : min(index, length);
};


/***/ }),

/***/ "794b":
/***/ (function(module, exports, __webpack_require__) {

module.exports = !__webpack_require__("8e60") && !__webpack_require__("294c")(function () {
  return Object.defineProperty(__webpack_require__("1ec9")('div'), 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "79aa":
/***/ (function(module, exports) {

module.exports = function (it) {
  if (typeof it != 'function') throw TypeError(it + ' is not a function!');
  return it;
};


/***/ }),

/***/ "79e5":
/***/ (function(module, exports) {

module.exports = function (exec) {
  try {
    return !!exec();
  } catch (e) {
    return true;
  }
};


/***/ }),

/***/ "7cd6":
/***/ (function(module, exports, __webpack_require__) {

var classof = __webpack_require__("40c3");
var ITERATOR = __webpack_require__("5168")('iterator');
var Iterators = __webpack_require__("481b");
module.exports = __webpack_require__("584a").getIteratorMethod = function (it) {
  if (it != undefined) return it[ITERATOR]
    || it['@@iterator']
    || Iterators[classof(it)];
};


/***/ }),

/***/ "7d7b":
/***/ (function(module, exports, __webpack_require__) {

var anObject = __webpack_require__("e4ae");
var get = __webpack_require__("7cd6");
module.exports = __webpack_require__("584a").getIterator = function (it) {
  var iterFn = get(it);
  if (typeof iterFn != 'function') throw TypeError(it + ' is not iterable!');
  return anObject(iterFn.call(it));
};


/***/ }),

/***/ "7e90":
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__("d9f6");
var anObject = __webpack_require__("e4ae");
var getKeys = __webpack_require__("c3a1");

module.exports = __webpack_require__("8e60") ? Object.defineProperties : function defineProperties(O, Properties) {
  anObject(O);
  var keys = getKeys(Properties);
  var length = keys.length;
  var i = 0;
  var P;
  while (length > i) dP.f(O, P = keys[i++], Properties[P]);
  return O;
};


/***/ }),

/***/ "8378":
/***/ (function(module, exports) {

var core = module.exports = { version: '2.6.5' };
if (typeof __e == 'number') __e = core; // eslint-disable-line no-undef


/***/ }),

/***/ "8436":
/***/ (function(module, exports) {

module.exports = function () { /* empty */ };


/***/ }),

/***/ "86cc":
/***/ (function(module, exports, __webpack_require__) {

var anObject = __webpack_require__("cb7c");
var IE8_DOM_DEFINE = __webpack_require__("c69a");
var toPrimitive = __webpack_require__("6a99");
var dP = Object.defineProperty;

exports.f = __webpack_require__("9e1e") ? Object.defineProperty : function defineProperty(O, P, Attributes) {
  anObject(O);
  P = toPrimitive(P, true);
  anObject(Attributes);
  if (IE8_DOM_DEFINE) try {
    return dP(O, P, Attributes);
  } catch (e) { /* empty */ }
  if ('get' in Attributes || 'set' in Attributes) throw TypeError('Accessors not supported!');
  if ('value' in Attributes) O[P] = Attributes.value;
  return O;
};


/***/ }),

/***/ "8aae":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("32a6");
module.exports = __webpack_require__("584a").Object.keys;


/***/ }),

/***/ "8e60":
/***/ (function(module, exports, __webpack_require__) {

// Thank's IE8 for his funny defineProperty
module.exports = !__webpack_require__("294c")(function () {
  return Object.defineProperty({}, 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "8f60":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var create = __webpack_require__("a159");
var descriptor = __webpack_require__("aebd");
var setToStringTag = __webpack_require__("45f2");
var IteratorPrototype = {};

// 25.1.2.1.1 %IteratorPrototype%[@@iterator]()
__webpack_require__("35e8")(IteratorPrototype, __webpack_require__("5168")('iterator'), function () { return this; });

module.exports = function (Constructor, NAME, next) {
  Constructor.prototype = create(IteratorPrototype, { next: descriptor(1, next) });
  setToStringTag(Constructor, NAME + ' Iterator');
};


/***/ }),

/***/ "9003":
/***/ (function(module, exports, __webpack_require__) {

// 7.2.2 IsArray(argument)
var cof = __webpack_require__("6b4c");
module.exports = Array.isArray || function isArray(arg) {
  return cof(arg) == 'Array';
};


/***/ }),

/***/ "9138":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("35e8");


/***/ }),

/***/ "9306":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

// 19.1.2.1 Object.assign(target, source, ...)
var getKeys = __webpack_require__("c3a1");
var gOPS = __webpack_require__("9aa9");
var pIE = __webpack_require__("355d");
var toObject = __webpack_require__("241e");
var IObject = __webpack_require__("335c");
var $assign = Object.assign;

// should work with symbols and should have deterministic property order (V8 bug)
module.exports = !$assign || __webpack_require__("294c")(function () {
  var A = {};
  var B = {};
  // eslint-disable-next-line no-undef
  var S = Symbol();
  var K = 'abcdefghijklmnopqrst';
  A[S] = 7;
  K.split('').forEach(function (k) { B[k] = k; });
  return $assign({}, A)[S] != 7 || Object.keys($assign({}, B)).join('') != K;
}) ? function assign(target, source) { // eslint-disable-line no-unused-vars
  var T = toObject(target);
  var aLen = arguments.length;
  var index = 1;
  var getSymbols = gOPS.f;
  var isEnum = pIE.f;
  while (aLen > index) {
    var S = IObject(arguments[index++]);
    var keys = getSymbols ? getKeys(S).concat(getSymbols(S)) : getKeys(S);
    var length = keys.length;
    var j = 0;
    var key;
    while (length > j) if (isEnum.call(S, key = keys[j++])) T[key] = S[key];
  } return T;
} : $assign;


/***/ }),

/***/ "9427":
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__("63b6");
// 19.1.2.2 / 15.2.3.5 Object.create(O [, Properties])
$export($export.S, 'Object', { create: __webpack_require__("a159") });


/***/ }),

/***/ "95d5":
/***/ (function(module, exports, __webpack_require__) {

var classof = __webpack_require__("40c3");
var ITERATOR = __webpack_require__("5168")('iterator');
var Iterators = __webpack_require__("481b");
module.exports = __webpack_require__("584a").isIterable = function (it) {
  var O = Object(it);
  return O[ITERATOR] !== undefined
    || '@@iterator' in O
    // eslint-disable-next-line no-prototype-builtins
    || Iterators.hasOwnProperty(classof(O));
};


/***/ }),

/***/ "9aa9":
/***/ (function(module, exports) {

exports.f = Object.getOwnPropertySymbols;


/***/ }),

/***/ "9b43":
/***/ (function(module, exports, __webpack_require__) {

// optional / simple context binding
var aFunction = __webpack_require__("d8e8");
module.exports = function (fn, that, length) {
  aFunction(fn);
  if (that === undefined) return fn;
  switch (length) {
    case 1: return function (a) {
      return fn.call(that, a);
    };
    case 2: return function (a, b) {
      return fn.call(that, a, b);
    };
    case 3: return function (a, b, c) {
      return fn.call(that, a, b, c);
    };
  }
  return function (/* ...args */) {
    return fn.apply(that, arguments);
  };
};


/***/ }),

/***/ "9c6c":
/***/ (function(module, exports, __webpack_require__) {

// 22.1.3.31 Array.prototype[@@unscopables]
var UNSCOPABLES = __webpack_require__("2b4c")('unscopables');
var ArrayProto = Array.prototype;
if (ArrayProto[UNSCOPABLES] == undefined) __webpack_require__("32e9")(ArrayProto, UNSCOPABLES, {});
module.exports = function (key) {
  ArrayProto[UNSCOPABLES][key] = true;
};


/***/ }),

/***/ "9def":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.15 ToLength
var toInteger = __webpack_require__("4588");
var min = Math.min;
module.exports = function (it) {
  return it > 0 ? min(toInteger(it), 0x1fffffffffffff) : 0; // pow(2, 53) - 1 == 9007199254740991
};


/***/ }),

/***/ "9e1e":
/***/ (function(module, exports, __webpack_require__) {

// Thank's IE8 for his funny defineProperty
module.exports = !__webpack_require__("79e5")(function () {
  return Object.defineProperty({}, 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "a159":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.2 / 15.2.3.5 Object.create(O [, Properties])
var anObject = __webpack_require__("e4ae");
var dPs = __webpack_require__("7e90");
var enumBugKeys = __webpack_require__("1691");
var IE_PROTO = __webpack_require__("5559")('IE_PROTO');
var Empty = function () { /* empty */ };
var PROTOTYPE = 'prototype';

// Create object with fake `null` prototype: use iframe Object with cleared prototype
var createDict = function () {
  // Thrash, waste and sodomy: IE GC bug
  var iframe = __webpack_require__("1ec9")('iframe');
  var i = enumBugKeys.length;
  var lt = '<';
  var gt = '>';
  var iframeDocument;
  iframe.style.display = 'none';
  __webpack_require__("32fc").appendChild(iframe);
  iframe.src = 'javascript:'; // eslint-disable-line no-script-url
  // createDict = iframe.contentWindow.Object;
  // html.removeChild(iframe);
  iframeDocument = iframe.contentWindow.document;
  iframeDocument.open();
  iframeDocument.write(lt + 'script' + gt + 'document.F=Object' + lt + '/script' + gt);
  iframeDocument.close();
  createDict = iframeDocument.F;
  while (i--) delete createDict[PROTOTYPE][enumBugKeys[i]];
  return createDict();
};

module.exports = Object.create || function create(O, Properties) {
  var result;
  if (O !== null) {
    Empty[PROTOTYPE] = anObject(O);
    result = new Empty();
    Empty[PROTOTYPE] = null;
    // add "__proto__" for Object.getPrototypeOf polyfill
    result[IE_PROTO] = O;
  } else result = createDict();
  return Properties === undefined ? result : dPs(result, Properties);
};


/***/ }),

/***/ "a352":
/***/ (function(module, exports) {

module.exports = __webpack_require__(791);

/***/ }),

/***/ "a3c3":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.3.1 Object.assign(target, source)
var $export = __webpack_require__("63b6");

$export($export.S + $export.F, 'Object', { assign: __webpack_require__("9306") });


/***/ }),

/***/ "a481":
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var anObject = __webpack_require__("cb7c");
var toObject = __webpack_require__("4bf8");
var toLength = __webpack_require__("9def");
var toInteger = __webpack_require__("4588");
var advanceStringIndex = __webpack_require__("0390");
var regExpExec = __webpack_require__("5f1b");
var max = Math.max;
var min = Math.min;
var floor = Math.floor;
var SUBSTITUTION_SYMBOLS = /\$([$&`']|\d\d?|<[^>]*>)/g;
var SUBSTITUTION_SYMBOLS_NO_NAMED = /\$([$&`']|\d\d?)/g;

var maybeToString = function (it) {
  return it === undefined ? it : String(it);
};

// @@replace logic
__webpack_require__("214f")('replace', 2, function (defined, REPLACE, $replace, maybeCallNative) {
  return [
    // `String.prototype.replace` method
    // https://tc39.github.io/ecma262/#sec-string.prototype.replace
    function replace(searchValue, replaceValue) {
      var O = defined(this);
      var fn = searchValue == undefined ? undefined : searchValue[REPLACE];
      return fn !== undefined
        ? fn.call(searchValue, O, replaceValue)
        : $replace.call(String(O), searchValue, replaceValue);
    },
    // `RegExp.prototype[@@replace]` method
    // https://tc39.github.io/ecma262/#sec-regexp.prototype-@@replace
    function (regexp, replaceValue) {
      var res = maybeCallNative($replace, regexp, this, replaceValue);
      if (res.done) return res.value;

      var rx = anObject(regexp);
      var S = String(this);
      var functionalReplace = typeof replaceValue === 'function';
      if (!functionalReplace) replaceValue = String(replaceValue);
      var global = rx.global;
      if (global) {
        var fullUnicode = rx.unicode;
        rx.lastIndex = 0;
      }
      var results = [];
      while (true) {
        var result = regExpExec(rx, S);
        if (result === null) break;
        results.push(result);
        if (!global) break;
        var matchStr = String(result[0]);
        if (matchStr === '') rx.lastIndex = advanceStringIndex(S, toLength(rx.lastIndex), fullUnicode);
      }
      var accumulatedResult = '';
      var nextSourcePosition = 0;
      for (var i = 0; i < results.length; i++) {
        result = results[i];
        var matched = String(result[0]);
        var position = max(min(toInteger(result.index), S.length), 0);
        var captures = [];
        // NOTE: This is equivalent to
        //   captures = result.slice(1).map(maybeToString)
        // but for some reason `nativeSlice.call(result, 1, result.length)` (called in
        // the slice polyfill when slicing native arrays) "doesn't work" in safari 9 and
        // causes a crash (https://pastebin.com/N21QzeQA) when trying to debug it.
        for (var j = 1; j < result.length; j++) captures.push(maybeToString(result[j]));
        var namedCaptures = result.groups;
        if (functionalReplace) {
          var replacerArgs = [matched].concat(captures, position, S);
          if (namedCaptures !== undefined) replacerArgs.push(namedCaptures);
          var replacement = String(replaceValue.apply(undefined, replacerArgs));
        } else {
          replacement = getSubstitution(matched, S, position, captures, namedCaptures, replaceValue);
        }
        if (position >= nextSourcePosition) {
          accumulatedResult += S.slice(nextSourcePosition, position) + replacement;
          nextSourcePosition = position + matched.length;
        }
      }
      return accumulatedResult + S.slice(nextSourcePosition);
    }
  ];

    // https://tc39.github.io/ecma262/#sec-getsubstitution
  function getSubstitution(matched, str, position, captures, namedCaptures, replacement) {
    var tailPos = position + matched.length;
    var m = captures.length;
    var symbols = SUBSTITUTION_SYMBOLS_NO_NAMED;
    if (namedCaptures !== undefined) {
      namedCaptures = toObject(namedCaptures);
      symbols = SUBSTITUTION_SYMBOLS;
    }
    return $replace.call(replacement, symbols, function (match, ch) {
      var capture;
      switch (ch.charAt(0)) {
        case '$': return '$';
        case '&': return matched;
        case '`': return str.slice(0, position);
        case "'": return str.slice(tailPos);
        case '<':
          capture = namedCaptures[ch.slice(1, -1)];
          break;
        default: // \d\d?
          var n = +ch;
          if (n === 0) return match;
          if (n > m) {
            var f = floor(n / 10);
            if (f === 0) return match;
            if (f <= m) return captures[f - 1] === undefined ? ch.charAt(1) : captures[f - 1] + ch.charAt(1);
            return match;
          }
          capture = captures[n - 1];
      }
      return capture === undefined ? '' : capture;
    });
  }
});


/***/ }),

/***/ "a4bb":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("8aae");

/***/ }),

/***/ "a745":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("f410");

/***/ }),

/***/ "aae3":
/***/ (function(module, exports, __webpack_require__) {

// 7.2.8 IsRegExp(argument)
var isObject = __webpack_require__("d3f4");
var cof = __webpack_require__("2d95");
var MATCH = __webpack_require__("2b4c")('match');
module.exports = function (it) {
  var isRegExp;
  return isObject(it) && ((isRegExp = it[MATCH]) !== undefined ? !!isRegExp : cof(it) == 'RegExp');
};


/***/ }),

/***/ "aebd":
/***/ (function(module, exports) {

module.exports = function (bitmap, value) {
  return {
    enumerable: !(bitmap & 1),
    configurable: !(bitmap & 2),
    writable: !(bitmap & 4),
    value: value
  };
};


/***/ }),

/***/ "b0c5":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var regexpExec = __webpack_require__("520a");
__webpack_require__("5ca1")({
  target: 'RegExp',
  proto: true,
  forced: regexpExec !== /./.exec
}, {
  exec: regexpExec
});


/***/ }),

/***/ "b0dc":
/***/ (function(module, exports, __webpack_require__) {

// call something on iterator step with safe closing on error
var anObject = __webpack_require__("e4ae");
module.exports = function (iterator, fn, value, entries) {
  try {
    return entries ? fn(anObject(value)[0], value[1]) : fn(value);
  // 7.4.6 IteratorClose(iterator, completion)
  } catch (e) {
    var ret = iterator['return'];
    if (ret !== undefined) anObject(ret.call(iterator));
    throw e;
  }
};


/***/ }),

/***/ "b447":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.15 ToLength
var toInteger = __webpack_require__("3a38");
var min = Math.min;
module.exports = function (it) {
  return it > 0 ? min(toInteger(it), 0x1fffffffffffff) : 0; // pow(2, 53) - 1 == 9007199254740991
};


/***/ }),

/***/ "b8e3":
/***/ (function(module, exports) {

module.exports = true;


/***/ }),

/***/ "be13":
/***/ (function(module, exports) {

// 7.2.1 RequireObjectCoercible(argument)
module.exports = function (it) {
  if (it == undefined) throw TypeError("Can't call method on  " + it);
  return it;
};


/***/ }),

/***/ "c366":
/***/ (function(module, exports, __webpack_require__) {

// false -> Array#indexOf
// true  -> Array#includes
var toIObject = __webpack_require__("6821");
var toLength = __webpack_require__("9def");
var toAbsoluteIndex = __webpack_require__("77f1");
module.exports = function (IS_INCLUDES) {
  return function ($this, el, fromIndex) {
    var O = toIObject($this);
    var length = toLength(O.length);
    var index = toAbsoluteIndex(fromIndex, length);
    var value;
    // Array#includes uses SameValueZero equality algorithm
    // eslint-disable-next-line no-self-compare
    if (IS_INCLUDES && el != el) while (length > index) {
      value = O[index++];
      // eslint-disable-next-line no-self-compare
      if (value != value) return true;
    // Array#indexOf ignores holes, Array#includes - not
    } else for (;length > index; index++) if (IS_INCLUDES || index in O) {
      if (O[index] === el) return IS_INCLUDES || index || 0;
    } return !IS_INCLUDES && -1;
  };
};


/***/ }),

/***/ "c367":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var addToUnscopables = __webpack_require__("8436");
var step = __webpack_require__("50ed");
var Iterators = __webpack_require__("481b");
var toIObject = __webpack_require__("36c3");

// 22.1.3.4 Array.prototype.entries()
// 22.1.3.13 Array.prototype.keys()
// 22.1.3.29 Array.prototype.values()
// 22.1.3.30 Array.prototype[@@iterator]()
module.exports = __webpack_require__("30f1")(Array, 'Array', function (iterated, kind) {
  this._t = toIObject(iterated); // target
  this._i = 0;                   // next index
  this._k = kind;                // kind
// 22.1.5.2.1 %ArrayIteratorPrototype%.next()
}, function () {
  var O = this._t;
  var kind = this._k;
  var index = this._i++;
  if (!O || index >= O.length) {
    this._t = undefined;
    return step(1);
  }
  if (kind == 'keys') return step(0, index);
  if (kind == 'values') return step(0, O[index]);
  return step(0, [index, O[index]]);
}, 'values');

// argumentsList[@@iterator] is %ArrayProto_values% (9.4.4.6, 9.4.4.7)
Iterators.Arguments = Iterators.Array;

addToUnscopables('keys');
addToUnscopables('values');
addToUnscopables('entries');


/***/ }),

/***/ "c3a1":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.14 / 15.2.3.14 Object.keys(O)
var $keys = __webpack_require__("e6f3");
var enumBugKeys = __webpack_require__("1691");

module.exports = Object.keys || function keys(O) {
  return $keys(O, enumBugKeys);
};


/***/ }),

/***/ "c649":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(global) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return insertNodeAt; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return camelize; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return console; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return removeNode; });
/* harmony import */ var core_js_modules_es6_regexp_replace__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("a481");
/* harmony import */ var core_js_modules_es6_regexp_replace__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es6_regexp_replace__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var C_Users_david_desmaisons_Documents_project_source_Vue_Draggable_node_modules_babel_runtime_corejs2_core_js_object_create__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("4aa6");
/* harmony import */ var C_Users_david_desmaisons_Documents_project_source_Vue_Draggable_node_modules_babel_runtime_corejs2_core_js_object_create__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(C_Users_david_desmaisons_Documents_project_source_Vue_Draggable_node_modules_babel_runtime_corejs2_core_js_object_create__WEBPACK_IMPORTED_MODULE_1__);



function getConsole() {
  if (typeof window !== "undefined") {
    return window.console;
  }

  return global.console;
}

var console = getConsole();

function cached(fn) {
  var cache = C_Users_david_desmaisons_Documents_project_source_Vue_Draggable_node_modules_babel_runtime_corejs2_core_js_object_create__WEBPACK_IMPORTED_MODULE_1___default()(null);

  return function cachedFn(str) {
    var hit = cache[str];
    return hit || (cache[str] = fn(str));
  };
}

var regex = /-(\w)/g;
var camelize = cached(function (str) {
  return str.replace(regex, function (_, c) {
    return c ? c.toUpperCase() : "";
  });
});

function removeNode(node) {
  if (node.parentElement !== null) {
    node.parentElement.removeChild(node);
  }
}

function insertNodeAt(fatherNode, node, position) {
  var refNode = position === 0 ? fatherNode.children[0] : fatherNode.children[position - 1].nextSibling;
  fatherNode.insertBefore(node, refNode);
}


/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__("c8ba")))

/***/ }),

/***/ "c69a":
/***/ (function(module, exports, __webpack_require__) {

module.exports = !__webpack_require__("9e1e") && !__webpack_require__("79e5")(function () {
  return Object.defineProperty(__webpack_require__("230e")('div'), 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "c8ba":
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "c8bb":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("54a1");

/***/ }),

/***/ "ca5a":
/***/ (function(module, exports) {

var id = 0;
var px = Math.random();
module.exports = function (key) {
  return 'Symbol('.concat(key === undefined ? '' : key, ')_', (++id + px).toString(36));
};


/***/ }),

/***/ "cb7c":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("d3f4");
module.exports = function (it) {
  if (!isObject(it)) throw TypeError(it + ' is not an object!');
  return it;
};


/***/ }),

/***/ "ce7e":
/***/ (function(module, exports, __webpack_require__) {

// most Object methods by ES6 should accept primitives
var $export = __webpack_require__("63b6");
var core = __webpack_require__("584a");
var fails = __webpack_require__("294c");
module.exports = function (KEY, exec) {
  var fn = (core.Object || {})[KEY] || Object[KEY];
  var exp = {};
  exp[KEY] = exec(fn);
  $export($export.S + $export.F * fails(function () { fn(1); }), 'Object', exp);
};


/***/ }),

/***/ "d2c8":
/***/ (function(module, exports, __webpack_require__) {

// helper for String#{startsWith, endsWith, includes}
var isRegExp = __webpack_require__("aae3");
var defined = __webpack_require__("be13");

module.exports = function (that, searchString, NAME) {
  if (isRegExp(searchString)) throw TypeError('String#' + NAME + " doesn't accept regex!");
  return String(defined(that));
};


/***/ }),

/***/ "d2d5":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("1654");
__webpack_require__("549b");
module.exports = __webpack_require__("584a").Array.from;


/***/ }),

/***/ "d3f4":
/***/ (function(module, exports) {

module.exports = function (it) {
  return typeof it === 'object' ? it !== null : typeof it === 'function';
};


/***/ }),

/***/ "d864":
/***/ (function(module, exports, __webpack_require__) {

// optional / simple context binding
var aFunction = __webpack_require__("79aa");
module.exports = function (fn, that, length) {
  aFunction(fn);
  if (that === undefined) return fn;
  switch (length) {
    case 1: return function (a) {
      return fn.call(that, a);
    };
    case 2: return function (a, b) {
      return fn.call(that, a, b);
    };
    case 3: return function (a, b, c) {
      return fn.call(that, a, b, c);
    };
  }
  return function (/* ...args */) {
    return fn.apply(that, arguments);
  };
};


/***/ }),

/***/ "d8e8":
/***/ (function(module, exports) {

module.exports = function (it) {
  if (typeof it != 'function') throw TypeError(it + ' is not a function!');
  return it;
};


/***/ }),

/***/ "d9f6":
/***/ (function(module, exports, __webpack_require__) {

var anObject = __webpack_require__("e4ae");
var IE8_DOM_DEFINE = __webpack_require__("794b");
var toPrimitive = __webpack_require__("1bc3");
var dP = Object.defineProperty;

exports.f = __webpack_require__("8e60") ? Object.defineProperty : function defineProperty(O, P, Attributes) {
  anObject(O);
  P = toPrimitive(P, true);
  anObject(Attributes);
  if (IE8_DOM_DEFINE) try {
    return dP(O, P, Attributes);
  } catch (e) { /* empty */ }
  if ('get' in Attributes || 'set' in Attributes) throw TypeError('Accessors not supported!');
  if ('value' in Attributes) O[P] = Attributes.value;
  return O;
};


/***/ }),

/***/ "dbdb":
/***/ (function(module, exports, __webpack_require__) {

var core = __webpack_require__("584a");
var global = __webpack_require__("e53d");
var SHARED = '__core-js_shared__';
var store = global[SHARED] || (global[SHARED] = {});

(module.exports = function (key, value) {
  return store[key] || (store[key] = value !== undefined ? value : {});
})('versions', []).push({
  version: core.version,
  mode: __webpack_require__("b8e3") ? 'pure' : 'global',
  copyright: '© 2019 Denis Pushkarev (zloirock.ru)'
});


/***/ }),

/***/ "dc62":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("9427");
var $Object = __webpack_require__("584a").Object;
module.exports = function create(P, D) {
  return $Object.create(P, D);
};


/***/ }),

/***/ "e4ae":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("f772");
module.exports = function (it) {
  if (!isObject(it)) throw TypeError(it + ' is not an object!');
  return it;
};


/***/ }),

/***/ "e53d":
/***/ (function(module, exports) {

// https://github.com/zloirock/core-js/issues/86#issuecomment-115759028
var global = module.exports = typeof window != 'undefined' && window.Math == Math
  ? window : typeof self != 'undefined' && self.Math == Math ? self
  // eslint-disable-next-line no-new-func
  : Function('return this')();
if (typeof __g == 'number') __g = global; // eslint-disable-line no-undef


/***/ }),

/***/ "e6f3":
/***/ (function(module, exports, __webpack_require__) {

var has = __webpack_require__("07e3");
var toIObject = __webpack_require__("36c3");
var arrayIndexOf = __webpack_require__("5b4e")(false);
var IE_PROTO = __webpack_require__("5559")('IE_PROTO');

module.exports = function (object, names) {
  var O = toIObject(object);
  var i = 0;
  var result = [];
  var key;
  for (key in O) if (key != IE_PROTO) has(O, key) && result.push(key);
  // Don't enum bug & hidden keys
  while (names.length > i) if (has(O, key = names[i++])) {
    ~arrayIndexOf(result, key) || result.push(key);
  }
  return result;
};


/***/ }),

/***/ "f410":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("1af6");
module.exports = __webpack_require__("584a").Array.isArray;


/***/ }),

/***/ "f559":
/***/ (function(module, exports, __webpack_require__) {

"use strict";
// 21.1.3.18 String.prototype.startsWith(searchString [, position ])

var $export = __webpack_require__("5ca1");
var toLength = __webpack_require__("9def");
var context = __webpack_require__("d2c8");
var STARTS_WITH = 'startsWith';
var $startsWith = ''[STARTS_WITH];

$export($export.P + $export.F * __webpack_require__("5147")(STARTS_WITH), 'String', {
  startsWith: function startsWith(searchString /* , position = 0 */) {
    var that = context(this, searchString, STARTS_WITH);
    var index = toLength(Math.min(arguments.length > 1 ? arguments[1] : undefined, that.length));
    var search = String(searchString);
    return $startsWith
      ? $startsWith.call(that, search, index)
      : that.slice(index, index + search.length) === search;
  }
});


/***/ }),

/***/ "f772":
/***/ (function(module, exports) {

module.exports = function (it) {
  return typeof it === 'object' ? it !== null : typeof it === 'function';
};


/***/ }),

/***/ "fa5b":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("5537")('native-function-to-string', Function.toString);


/***/ }),

/***/ "fb15":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/@vue/cli-service/lib/commands/build/setPublicPath.js
// This file is imported into lib/wc client bundles.

if (typeof window !== 'undefined') {
  var setPublicPath_i
  if ((setPublicPath_i = window.document.currentScript) && (setPublicPath_i = setPublicPath_i.src.match(/(.+\/)[^/]+\.js(\?.*)?$/))) {
    __webpack_require__.p = setPublicPath_i[1] // eslint-disable-line
  }
}

// Indicate to webpack that this file can be concatenated
/* harmony default export */ var setPublicPath = (null);

// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/object/assign.js
var object_assign = __webpack_require__("5176");
var assign_default = /*#__PURE__*/__webpack_require__.n(object_assign);

// EXTERNAL MODULE: ./node_modules/core-js/modules/es6.string.starts-with.js
var es6_string_starts_with = __webpack_require__("f559");

// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/object/keys.js
var keys = __webpack_require__("a4bb");
var keys_default = /*#__PURE__*/__webpack_require__.n(keys);

// EXTERNAL MODULE: ./node_modules/core-js/modules/es7.array.includes.js
var es7_array_includes = __webpack_require__("6762");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es6.string.includes.js
var es6_string_includes = __webpack_require__("2fdb");

// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/array/is-array.js
var is_array = __webpack_require__("a745");
var is_array_default = /*#__PURE__*/__webpack_require__.n(is_array);

// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithHoles.js

function _arrayWithHoles(arr) {
  if (is_array_default()(arr)) return arr;
}
// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/get-iterator.js
var get_iterator = __webpack_require__("5d73");
var get_iterator_default = /*#__PURE__*/__webpack_require__.n(get_iterator);

// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArrayLimit.js

function _iterableToArrayLimit(arr, i) {
  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = get_iterator_default()(arr), _s; !(_n = (_s = _i.next()).done); _n = true) {
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
// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableRest.js
function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance");
}
// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/slicedToArray.js



function _slicedToArray(arr, i) {
  return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest();
}
// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithoutHoles.js

function _arrayWithoutHoles(arr) {
  if (is_array_default()(arr)) {
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) {
      arr2[i] = arr[i];
    }

    return arr2;
  }
}
// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/array/from.js
var from = __webpack_require__("774e");
var from_default = /*#__PURE__*/__webpack_require__.n(from);

// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/is-iterable.js
var is_iterable = __webpack_require__("c8bb");
var is_iterable_default = /*#__PURE__*/__webpack_require__.n(is_iterable);

// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArray.js


function _iterableToArray(iter) {
  if (is_iterable_default()(Object(iter)) || Object.prototype.toString.call(iter) === "[object Arguments]") return from_default()(iter);
}
// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableSpread.js
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance");
}
// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/toConsumableArray.js



function _toConsumableArray(arr) {
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread();
}
// EXTERNAL MODULE: external {"commonjs":"sortablejs","commonjs2":"sortablejs","amd":"sortablejs","root":"Sortable"}
var external_commonjs_sortablejs_commonjs2_sortablejs_amd_sortablejs_root_Sortable_ = __webpack_require__("a352");
var external_commonjs_sortablejs_commonjs2_sortablejs_amd_sortablejs_root_Sortable_default = /*#__PURE__*/__webpack_require__.n(external_commonjs_sortablejs_commonjs2_sortablejs_amd_sortablejs_root_Sortable_);

// EXTERNAL MODULE: ./src/util/helper.js
var helper = __webpack_require__("c649");

// CONCATENATED MODULE: ./src/vuedraggable.js










function buildAttribute(object, propName, value) {
  if (value === undefined) {
    return object;
  }

  object = object || {};
  object[propName] = value;
  return object;
}

function computeVmIndex(vnodes, element) {
  return vnodes.map(function (elt) {
    return elt.elm;
  }).indexOf(element);
}

function _computeIndexes(slots, children, isTransition, footerOffset) {
  if (!slots) {
    return [];
  }

  var elmFromNodes = slots.map(function (elt) {
    return elt.elm;
  });
  var footerIndex = children.length - footerOffset;

  var rawIndexes = _toConsumableArray(children).map(function (elt, idx) {
    return idx >= footerIndex ? elmFromNodes.length : elmFromNodes.indexOf(elt);
  });

  return isTransition ? rawIndexes.filter(function (ind) {
    return ind !== -1;
  }) : rawIndexes;
}

function emit(evtName, evtData) {
  var _this = this;

  this.$nextTick(function () {
    return _this.$emit(evtName.toLowerCase(), evtData);
  });
}

function delegateAndEmit(evtName) {
  var _this2 = this;

  return function (evtData) {
    if (_this2.realList !== null) {
      _this2["onDrag" + evtName](evtData);
    }

    emit.call(_this2, evtName, evtData);
  };
}

function vuedraggable_isTransition(slots) {
  if (!slots || slots.length !== 1) {
    return false;
  }

  var _slots = _slicedToArray(slots, 1),
      componentOptions = _slots[0].componentOptions;

  if (!componentOptions) {
    return false;
  }

  return ["transition-group", "TransitionGroup"].includes(componentOptions.tag);
}

function computeChildrenAndOffsets(children, _ref) {
  var header = _ref.header,
      footer = _ref.footer;
  var headerOffset = 0;
  var footerOffset = 0;

  if (header) {
    headerOffset = header.length;
    children = children ? [].concat(_toConsumableArray(header), _toConsumableArray(children)) : _toConsumableArray(header);
  }

  if (footer) {
    footerOffset = footer.length;
    children = children ? [].concat(_toConsumableArray(children), _toConsumableArray(footer)) : _toConsumableArray(footer);
  }

  return {
    children: children,
    headerOffset: headerOffset,
    footerOffset: footerOffset
  };
}

function getComponentAttributes($attrs, componentData) {
  var attributes = null;

  var update = function update(name, value) {
    attributes = buildAttribute(attributes, name, value);
  };

  var attrs = keys_default()($attrs).filter(function (key) {
    return key === "id" || key.startsWith("data-");
  }).reduce(function (res, key) {
    res[key] = $attrs[key];
    return res;
  }, {});

  update("attrs", attrs);

  if (!componentData) {
    return attributes;
  }

  var on = componentData.on,
      props = componentData.props,
      componentDataAttrs = componentData.attrs;
  update("on", on);
  update("props", props);

  assign_default()(attributes.attrs, componentDataAttrs);

  return attributes;
}

var eventsListened = ["Start", "Add", "Remove", "Update", "End"];
var eventsToEmit = ["Choose", "Sort", "Filter", "Clone"];
var readonlyProperties = ["Move"].concat(eventsListened, eventsToEmit).map(function (evt) {
  return "on" + evt;
});
var draggingElement = null;
var vuedraggable_props = {
  options: Object,
  list: {
    type: Array,
    required: false,
    default: null
  },
  value: {
    type: Array,
    required: false,
    default: null
  },
  noTransitionOnDrag: {
    type: Boolean,
    default: false
  },
  clone: {
    type: Function,
    default: function _default(original) {
      return original;
    }
  },
  element: {
    type: String,
    default: "div"
  },
  tag: {
    type: String,
    default: null
  },
  move: {
    type: Function,
    default: null
  },
  componentData: {
    type: Object,
    required: false,
    default: null
  }
};
var draggableComponent = {
  name: "draggable",
  inheritAttrs: false,
  props: vuedraggable_props,
  data: function data() {
    return {
      transitionMode: false,
      noneFunctionalComponentMode: false,
      init: false
    };
  },
  render: function render(h) {
    var slots = this.$slots.default;
    this.transitionMode = vuedraggable_isTransition(slots);

    var _computeChildrenAndOf = computeChildrenAndOffsets(slots, this.$slots),
        children = _computeChildrenAndOf.children,
        headerOffset = _computeChildrenAndOf.headerOffset,
        footerOffset = _computeChildrenAndOf.footerOffset;

    this.headerOffset = headerOffset;
    this.footerOffset = footerOffset;
    var attributes = getComponentAttributes(this.$attrs, this.componentData);
    return h(this.getTag(), attributes, children);
  },
  created: function created() {
    if (this.list !== null && this.value !== null) {
      helper["b" /* console */].error("Value and list props are mutually exclusive! Please set one or another.");
    }

    if (this.element !== "div") {
      helper["b" /* console */].warn("Element props is deprecated please use tag props instead. See https://github.com/SortableJS/Vue.Draggable/blob/master/documentation/migrate.md#element-props");
    }

    if (this.options !== undefined) {
      helper["b" /* console */].warn("Options props is deprecated, add sortable options directly as vue.draggable item, or use v-bind. See https://github.com/SortableJS/Vue.Draggable/blob/master/documentation/migrate.md#options-props");
    }
  },
  mounted: function mounted() {
    var _this3 = this;

    this.noneFunctionalComponentMode = this.getTag().toLowerCase() !== this.$el.nodeName.toLowerCase();

    if (this.noneFunctionalComponentMode && this.transitionMode) {
      throw new Error("Transition-group inside component is not supported. Please alter tag value or remove transition-group. Current tag value: ".concat(this.getTag()));
    }

    var optionsAdded = {};
    eventsListened.forEach(function (elt) {
      optionsAdded["on" + elt] = delegateAndEmit.call(_this3, elt);
    });
    eventsToEmit.forEach(function (elt) {
      optionsAdded["on" + elt] = emit.bind(_this3, elt);
    });

    var attributes = keys_default()(this.$attrs).reduce(function (res, key) {
      res[Object(helper["a" /* camelize */])(key)] = _this3.$attrs[key];
      return res;
    }, {});

    var options = assign_default()({}, this.options, attributes, optionsAdded, {
      onMove: function onMove(evt, originalEvent) {
        return _this3.onDragMove(evt, originalEvent);
      }
    });

    !("draggable" in options) && (options.draggable = ">*");
    this._sortable = new external_commonjs_sortablejs_commonjs2_sortablejs_amd_sortablejs_root_Sortable_default.a(this.rootContainer, options);
    this.computeIndexes();
  },
  beforeDestroy: function beforeDestroy() {
    if (this._sortable !== undefined) this._sortable.destroy();
  },
  computed: {
    rootContainer: function rootContainer() {
      return this.transitionMode ? this.$el.children[0] : this.$el;
    },
    realList: function realList() {
      return this.list ? this.list : this.value;
    }
  },
  watch: {
    options: {
      handler: function handler(newOptionValue) {
        this.updateOptions(newOptionValue);
      },
      deep: true
    },
    $attrs: {
      handler: function handler(newOptionValue) {
        this.updateOptions(newOptionValue);
      },
      deep: true
    },
    realList: function realList() {
      this.computeIndexes();
    }
  },
  methods: {
    getTag: function getTag() {
      return this.tag || this.element;
    },
    updateOptions: function updateOptions(newOptionValue) {
      for (var property in newOptionValue) {
        var value = Object(helper["a" /* camelize */])(property);

        if (readonlyProperties.indexOf(value) === -1) {
          this._sortable.option(value, newOptionValue[property]);
        }
      }
    },
    getChildrenNodes: function getChildrenNodes() {
      if (!this.init) {
        this.noneFunctionalComponentMode = this.noneFunctionalComponentMode && this.$children.length === 1;
        this.init = true;
      }

      if (this.noneFunctionalComponentMode) {
        return this.$children[0].$slots.default;
      }

      var rawNodes = this.$slots.default;
      return this.transitionMode ? rawNodes[0].child.$slots.default : rawNodes;
    },
    computeIndexes: function computeIndexes() {
      var _this4 = this;

      this.$nextTick(function () {
        _this4.visibleIndexes = _computeIndexes(_this4.getChildrenNodes(), _this4.rootContainer.children, _this4.transitionMode, _this4.footerOffset);
      });
    },
    getUnderlyingVm: function getUnderlyingVm(htmlElt) {
      var index = computeVmIndex(this.getChildrenNodes() || [], htmlElt);

      if (index === -1) {
        //Edge case during move callback: related element might be
        //an element different from collection
        return null;
      }

      var element = this.realList[index];
      return {
        index: index,
        element: element
      };
    },
    getUnderlyingPotencialDraggableComponent: function getUnderlyingPotencialDraggableComponent(_ref2) {
      var __vue__ = _ref2.__vue__;

      if (!__vue__ || !__vue__.$options || __vue__.$options._componentTag !== "transition-group") {
        return __vue__;
      }

      return __vue__.$parent;
    },
    emitChanges: function emitChanges(evt) {
      var _this5 = this;

      this.$nextTick(function () {
        _this5.$emit("change", evt);
      });
    },
    alterList: function alterList(onList) {
      if (this.list) {
        onList(this.list);
        return;
      }

      var newList = _toConsumableArray(this.value);

      onList(newList);
      this.$emit("input", newList);
    },
    spliceList: function spliceList() {
      var _arguments = arguments;

      var spliceList = function spliceList(list) {
        return list.splice.apply(list, _toConsumableArray(_arguments));
      };

      this.alterList(spliceList);
    },
    updatePosition: function updatePosition(oldIndex, newIndex) {
      var updatePosition = function updatePosition(list) {
        return list.splice(newIndex, 0, list.splice(oldIndex, 1)[0]);
      };

      this.alterList(updatePosition);
    },
    getRelatedContextFromMoveEvent: function getRelatedContextFromMoveEvent(_ref3) {
      var to = _ref3.to,
          related = _ref3.related;
      var component = this.getUnderlyingPotencialDraggableComponent(to);

      if (!component) {
        return {
          component: component
        };
      }

      var list = component.realList;
      var context = {
        list: list,
        component: component
      };

      if (to !== related && list && component.getUnderlyingVm) {
        var destination = component.getUnderlyingVm(related);

        if (destination) {
          return assign_default()(destination, context);
        }
      }

      return context;
    },
    getVmIndex: function getVmIndex(domIndex) {
      var indexes = this.visibleIndexes;
      var numberIndexes = indexes.length;
      return domIndex > numberIndexes - 1 ? numberIndexes : indexes[domIndex];
    },
    getComponent: function getComponent() {
      return this.$slots.default[0].componentInstance;
    },
    resetTransitionData: function resetTransitionData(index) {
      if (!this.noTransitionOnDrag || !this.transitionMode) {
        return;
      }

      var nodes = this.getChildrenNodes();
      nodes[index].data = null;
      var transitionContainer = this.getComponent();
      transitionContainer.children = [];
      transitionContainer.kept = undefined;
    },
    onDragStart: function onDragStart(evt) {
      this.context = this.getUnderlyingVm(evt.item);
      evt.item._underlying_vm_ = this.clone(this.context.element);
      draggingElement = evt.item;
    },
    onDragAdd: function onDragAdd(evt) {
      var element = evt.item._underlying_vm_;

      if (element === undefined) {
        return;
      }

      Object(helper["d" /* removeNode */])(evt.item);
      var newIndex = this.getVmIndex(evt.newIndex);
      this.spliceList(newIndex, 0, element);
      this.computeIndexes();
      var added = {
        element: element,
        newIndex: newIndex
      };
      this.emitChanges({
        added: added
      });
    },
    onDragRemove: function onDragRemove(evt) {
      Object(helper["c" /* insertNodeAt */])(this.rootContainer, evt.item, evt.oldIndex);

      if (evt.pullMode === "clone") {
        Object(helper["d" /* removeNode */])(evt.clone);
        return;
      }

      var oldIndex = this.context.index;
      this.spliceList(oldIndex, 1);
      var removed = {
        element: this.context.element,
        oldIndex: oldIndex
      };
      this.resetTransitionData(oldIndex);
      this.emitChanges({
        removed: removed
      });
    },
    onDragUpdate: function onDragUpdate(evt) {
      Object(helper["d" /* removeNode */])(evt.item);
      Object(helper["c" /* insertNodeAt */])(evt.from, evt.item, evt.oldIndex);
      var oldIndex = this.context.index;
      var newIndex = this.getVmIndex(evt.newIndex);
      this.updatePosition(oldIndex, newIndex);
      var moved = {
        element: this.context.element,
        oldIndex: oldIndex,
        newIndex: newIndex
      };
      this.emitChanges({
        moved: moved
      });
    },
    updateProperty: function updateProperty(evt, propertyName) {
      evt.hasOwnProperty(propertyName) && (evt[propertyName] += this.headerOffset);
    },
    computeFutureIndex: function computeFutureIndex(relatedContext, evt) {
      if (!relatedContext.element) {
        return 0;
      }

      var domChildren = _toConsumableArray(evt.to.children).filter(function (el) {
        return el.style["display"] !== "none";
      });

      var currentDOMIndex = domChildren.indexOf(evt.related);
      var currentIndex = relatedContext.component.getVmIndex(currentDOMIndex);
      var draggedInList = domChildren.indexOf(draggingElement) !== -1;
      return draggedInList || !evt.willInsertAfter ? currentIndex : currentIndex + 1;
    },
    onDragMove: function onDragMove(evt, originalEvent) {
      var onMove = this.move;

      if (!onMove || !this.realList) {
        return true;
      }

      var relatedContext = this.getRelatedContextFromMoveEvent(evt);
      var draggedContext = this.context;
      var futureIndex = this.computeFutureIndex(relatedContext, evt);

      assign_default()(draggedContext, {
        futureIndex: futureIndex
      });

      var sendEvt = assign_default()({}, evt, {
        relatedContext: relatedContext,
        draggedContext: draggedContext
      });

      return onMove(sendEvt, originalEvent);
    },
    onDragEnd: function onDragEnd() {
      this.computeIndexes();
      draggingElement = null;
    }
  }
};

if (typeof window !== "undefined" && "Vue" in window) {
  window.Vue.component("draggable", draggableComponent);
}

/* harmony default export */ var vuedraggable = (draggableComponent);
// CONCATENATED MODULE: ./node_modules/@vue/cli-service/lib/commands/build/entry-lib.js


/* harmony default export */ var entry_lib = __webpack_exports__["default"] = (vuedraggable);



/***/ })

/******/ })["default"];
//# sourceMappingURL=vuedraggable.common.js.map

/***/ }),

/***/ 791:
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;/**!
 * Sortable
 * @author	RubaXa   <trash@rubaxa.org>
 * @author	owenm    <owen23355@gmail.com>
 * @license MIT
 */

(function sortableModule(factory) {
	"use strict";

	if (true) {
		!(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	}
	else if (typeof module != "undefined" && typeof module.exports != "undefined") {
		module.exports = factory();
	}
	else {
		/* jshint sub:true */
		window["Sortable"] = factory();
	}
})(function sortableFactory() {
	"use strict";

	if (typeof window === "undefined" || !window.document) {
		return function sortableError() {
			throw new Error("Sortable.js requires a window with a document");
		};
	}

	var dragEl,
		parentEl,
		ghostEl,
		cloneEl,
		rootEl,
		nextEl,
		lastDownEl,

		scrollEl,
		scrollParentEl,
		scrollCustomFn,

		oldIndex,
		newIndex,
		oldDraggableIndex,
		newDraggableIndex,

		activeGroup,
		putSortable,

		autoScrolls = [],
		scrolling = false,

		awaitingDragStarted = false,
		ignoreNextClick = false,
		sortables = [],

		pointerElemChangedInterval,
		lastPointerElemX,
		lastPointerElemY,

		tapEvt,
		touchEvt,

		moved,


		lastTarget,
		lastDirection,
		pastFirstInvertThresh = false,
		isCircumstantialInvert = false,
		lastMode, // 'swap' or 'insert'

		targetMoveDistance,

		// For positioning ghost absolutely
		ghostRelativeParent,
		ghostRelativeParentInitialScroll = [], // (left, top)

		realDragElRect, // dragEl rect after current animation

		/** @const */
		R_SPACE = /\s+/g,

		expando = 'Sortable' + (new Date).getTime(),

		win = window,
		document = win.document,
		parseInt = win.parseInt,
		setTimeout = win.setTimeout,

		$ = win.jQuery || win.Zepto,
		Polymer = win.Polymer,

		captureMode = {
			capture: false,
			passive: false
		},

		IE11OrLess = !!navigator.userAgent.match(/(?:Trident.*rv[ :]?11\.|msie|iemobile)/i),
		Edge = !!navigator.userAgent.match(/Edge/i),
		FireFox = !!navigator.userAgent.match(/firefox/i),
		Safari = !!(navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && !navigator.userAgent.match(/android/i)),
		IOS = !!(navigator.userAgent.match(/iP(ad|od|hone)/i)),

		PositionGhostAbsolutely = IOS,

		CSSFloatProperty = Edge || IE11OrLess ? 'cssFloat' : 'float',

		// This will not pass for IE9, because IE9 DnD only works on anchors
		supportDraggable = ('draggable' in document.createElement('div')),

		supportCssPointerEvents = (function() {
			// false when <= IE11
			if (IE11OrLess) {
				return false;
			}
			var el = document.createElement('x');
			el.style.cssText = 'pointer-events:auto';
			return el.style.pointerEvents === 'auto';
		})(),

		_silent = false,
		_alignedSilent = false,

		abs = Math.abs,
		min = Math.min,
		max = Math.max,

		savedInputChecked = [],

		_detectDirection = function(el, options) {
			var elCSS = _css(el),
				elWidth = parseInt(elCSS.width)
					- parseInt(elCSS.paddingLeft)
					- parseInt(elCSS.paddingRight)
					- parseInt(elCSS.borderLeftWidth)
					- parseInt(elCSS.borderRightWidth),
				child1 = _getChild(el, 0, options),
				child2 = _getChild(el, 1, options),
				firstChildCSS = child1 && _css(child1),
				secondChildCSS = child2 && _css(child2),
				firstChildWidth = firstChildCSS && parseInt(firstChildCSS.marginLeft) + parseInt(firstChildCSS.marginRight) + _getRect(child1).width,
				secondChildWidth = secondChildCSS && parseInt(secondChildCSS.marginLeft) + parseInt(secondChildCSS.marginRight) + _getRect(child2).width;

			if (elCSS.display === 'flex') {
				return elCSS.flexDirection === 'column' || elCSS.flexDirection === 'column-reverse'
				? 'vertical' : 'horizontal';
			}

			if (elCSS.display === 'grid') {
				return elCSS.gridTemplateColumns.split(' ').length <= 1 ? 'vertical' : 'horizontal';
			}

			if (child1 && firstChildCSS.float !== 'none') {
				var touchingSideChild2 = firstChildCSS.float === 'left' ? 'left' : 'right';

				return child2 && (secondChildCSS.clear === 'both' || secondChildCSS.clear === touchingSideChild2) ?
					'vertical' : 'horizontal';
			}

			return (child1 &&
				(
					firstChildCSS.display === 'block' ||
					firstChildCSS.display === 'flex' ||
					firstChildCSS.display === 'table' ||
					firstChildCSS.display === 'grid' ||
					firstChildWidth >= elWidth &&
					elCSS[CSSFloatProperty] === 'none' ||
					child2 &&
					elCSS[CSSFloatProperty] === 'none' &&
					firstChildWidth + secondChildWidth > elWidth
				) ?
				'vertical' : 'horizontal'
			);
		},

		/**
		 * Detects first nearest empty sortable to X and Y position using emptyInsertThreshold.
		 * @param  {Number} x      X position
		 * @param  {Number} y      Y position
		 * @return {HTMLElement}   Element of the first found nearest Sortable
		 */
		_detectNearestEmptySortable = function(x, y) {
			for (var i = 0; i < sortables.length; i++) {
				if (_lastChild(sortables[i])) continue;

				var rect = _getRect(sortables[i]),
					threshold = sortables[i][expando].options.emptyInsertThreshold,
					insideHorizontally = x >= (rect.left - threshold) && x <= (rect.right + threshold),
					insideVertically = y >= (rect.top - threshold) && y <= (rect.bottom + threshold);

				if (threshold && insideHorizontally && insideVertically) {
					return sortables[i];
				}
			}
		},

		_isClientInRowColumn = function(x, y, el, axis, options) {
			var targetRect = _getRect(el),
				targetS1Opp = axis === 'vertical' ? targetRect.left : targetRect.top,
				targetS2Opp = axis === 'vertical' ? targetRect.right : targetRect.bottom,
				mouseOnOppAxis = axis === 'vertical' ? x : y;

			return targetS1Opp < mouseOnOppAxis && mouseOnOppAxis < targetS2Opp;
		},

		_isElInRowColumn = function(el1, el2, axis) {
			var el1Rect = el1 === dragEl && realDragElRect || _getRect(el1),
				el2Rect = el2 === dragEl && realDragElRect || _getRect(el2),
				el1S1Opp = axis === 'vertical' ? el1Rect.left : el1Rect.top,
				el1S2Opp = axis === 'vertical' ? el1Rect.right : el1Rect.bottom,
				el1OppLength = axis === 'vertical' ? el1Rect.width : el1Rect.height,
				el2S1Opp = axis === 'vertical' ? el2Rect.left : el2Rect.top,
				el2S2Opp = axis === 'vertical' ? el2Rect.right : el2Rect.bottom,
				el2OppLength = axis === 'vertical' ? el2Rect.width : el2Rect.height;

			return (
				el1S1Opp === el2S1Opp ||
				el1S2Opp === el2S2Opp ||
				(el1S1Opp + el1OppLength / 2) === (el2S1Opp + el2OppLength / 2)
			);
		},

		_getParentAutoScrollElement = function(el, includeSelf) {
			// skip to window
			if (!el || !el.getBoundingClientRect) return _getWindowScrollingElement();

			var elem = el;
			var gotSelf = false;
			do {
				// we don't need to get elem css if it isn't even overflowing in the first place (performance)
				if (elem.clientWidth < elem.scrollWidth || elem.clientHeight < elem.scrollHeight) {
					var elemCSS = _css(elem);
					if (
						elem.clientWidth < elem.scrollWidth && (elemCSS.overflowX == 'auto' || elemCSS.overflowX == 'scroll') ||
						elem.clientHeight < elem.scrollHeight && (elemCSS.overflowY == 'auto' || elemCSS.overflowY == 'scroll')
					) {
						if (!elem || !elem.getBoundingClientRect || elem === document.body) return _getWindowScrollingElement();

						if (gotSelf || includeSelf) return elem;
						gotSelf = true;
					}
				}
			/* jshint boss:true */
			} while (elem = elem.parentNode);

			return _getWindowScrollingElement();
		},

		_getWindowScrollingElement = function() {
			if (IE11OrLess) {
				return document.documentElement;
			} else {
				return document.scrollingElement;
			}
		},

		_scrollBy = function(el, x, y) {
			el.scrollLeft += x;
			el.scrollTop += y;
		},

		_autoScroll = _throttle(function (/**Event*/evt, /**Object*/options, /**HTMLElement*/rootEl, /**Boolean*/isFallback) {
			// Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=505521
			if (options.scroll) {
				var _this = rootEl ? rootEl[expando] : window,
					sens = options.scrollSensitivity,
					speed = options.scrollSpeed,

					x = evt.clientX,
					y = evt.clientY,

					winScroller = _getWindowScrollingElement(),

					scrollThisInstance = false;

				// Detect scrollEl
				if (scrollParentEl !== rootEl) {
					_clearAutoScrolls();

					scrollEl = options.scroll;
					scrollCustomFn = options.scrollFn;

					if (scrollEl === true) {
						scrollEl = _getParentAutoScrollElement(rootEl, true);
						scrollParentEl = scrollEl;
					}
				}


				var layersOut = 0;
				var currentParent = scrollEl;
				do {
					var	el = currentParent,
						rect = _getRect(el),

						top = rect.top,
						bottom = rect.bottom,
						left = rect.left,
						right = rect.right,

						width = rect.width,
						height = rect.height,

						scrollWidth,
						scrollHeight,

						css,

						vx,
						vy,

						canScrollX,
						canScrollY,

						scrollPosX,
						scrollPosY;


					scrollWidth = el.scrollWidth;
					scrollHeight = el.scrollHeight;

					css = _css(el);

					scrollPosX = el.scrollLeft;
					scrollPosY = el.scrollTop;

					if (el === winScroller) {
						canScrollX = width < scrollWidth && (css.overflowX === 'auto' || css.overflowX === 'scroll' || css.overflowX === 'visible');
						canScrollY = height < scrollHeight && (css.overflowY === 'auto' || css.overflowY === 'scroll' || css.overflowY === 'visible');
					} else {
						canScrollX = width < scrollWidth && (css.overflowX === 'auto' || css.overflowX === 'scroll');
						canScrollY = height < scrollHeight && (css.overflowY === 'auto' || css.overflowY === 'scroll');
					}

					vx = canScrollX && (abs(right - x) <= sens && (scrollPosX + width) < scrollWidth) - (abs(left - x) <= sens && !!scrollPosX);

					vy = canScrollY && (abs(bottom - y) <= sens && (scrollPosY + height) < scrollHeight) - (abs(top - y) <= sens && !!scrollPosY);


					if (!autoScrolls[layersOut]) {
						for (var i = 0; i <= layersOut; i++) {
							if (!autoScrolls[i]) {
								autoScrolls[i] = {};
							}
						}
					}

					if (autoScrolls[layersOut].vx != vx || autoScrolls[layersOut].vy != vy || autoScrolls[layersOut].el !== el) {
						autoScrolls[layersOut].el = el;
						autoScrolls[layersOut].vx = vx;
						autoScrolls[layersOut].vy = vy;

						clearInterval(autoScrolls[layersOut].pid);

						if (el && (vx != 0 || vy != 0)) {
							scrollThisInstance = true;
							/* jshint loopfunc:true */
							autoScrolls[layersOut].pid = setInterval((function () {
								// emulate drag over during autoscroll (fallback), emulating native DnD behaviour
								if (isFallback && this.layer === 0) {
									Sortable.active._emulateDragOver(true);
									Sortable.active._onTouchMove(touchEvt, true);
								}
								var scrollOffsetY = autoScrolls[this.layer].vy ? autoScrolls[this.layer].vy * speed : 0;
								var scrollOffsetX = autoScrolls[this.layer].vx ? autoScrolls[this.layer].vx * speed : 0;

								if ('function' === typeof(scrollCustomFn)) {
									if (scrollCustomFn.call(_this, scrollOffsetX, scrollOffsetY, evt, touchEvt, autoScrolls[this.layer].el) !== 'continue') {
										return;
									}
								}

								_scrollBy(autoScrolls[this.layer].el, scrollOffsetX, scrollOffsetY);
							}).bind({layer: layersOut}), 24);
						}
					}
					layersOut++;
				} while (options.bubbleScroll && currentParent !== winScroller && (currentParent = _getParentAutoScrollElement(currentParent, false)));
				scrolling = scrollThisInstance; // in case another function catches scrolling as false in between when it is not
			}
		}, 30),

		_clearAutoScrolls = function () {
			autoScrolls.forEach(function(autoScroll) {
				clearInterval(autoScroll.pid);
			});
			autoScrolls = [];
		},

		_prepareGroup = function (options) {
			function toFn(value, pull) {
				return function(to, from, dragEl, evt) {
					var sameGroup = to.options.group.name &&
									from.options.group.name &&
									to.options.group.name === from.options.group.name;

					if (value == null && (pull || sameGroup)) {
						// Default pull value
						// Default pull and put value if same group
						return true;
					} else if (value == null || value === false) {
						return false;
					} else if (pull && value === 'clone') {
						return value;
					} else if (typeof value === 'function') {
						return toFn(value(to, from, dragEl, evt), pull)(to, from, dragEl, evt);
					} else {
						var otherGroup = (pull ? to : from).options.group.name;

						return (value === true ||
						(typeof value === 'string' && value === otherGroup) ||
						(value.join && value.indexOf(otherGroup) > -1));
					}
				};
			}

			var group = {};
			var originalGroup = options.group;

			if (!originalGroup || typeof originalGroup != 'object') {
				originalGroup = {name: originalGroup};
			}

			group.name = originalGroup.name;
			group.checkPull = toFn(originalGroup.pull, true);
			group.checkPut = toFn(originalGroup.put);
			group.revertClone = originalGroup.revertClone;

			options.group = group;
		},

		_checkAlignment = function(evt) {
			if (!dragEl || !dragEl.parentNode) return;
			dragEl.parentNode[expando] && dragEl.parentNode[expando]._computeIsAligned(evt);
		},

		_hideGhostForTarget = function() {
			if (!supportCssPointerEvents && ghostEl) {
				_css(ghostEl, 'display', 'none');
			}
		},

		_unhideGhostForTarget = function() {
			if (!supportCssPointerEvents && ghostEl) {
				_css(ghostEl, 'display', '');
			}
		};


	// #1184 fix - Prevent click event on fallback if dragged but item not changed position
	document.addEventListener('click', function(evt) {
		if (ignoreNextClick) {
			evt.preventDefault();
			evt.stopPropagation && evt.stopPropagation();
			evt.stopImmediatePropagation && evt.stopImmediatePropagation();
			ignoreNextClick = false;
			return false;
		}
	}, true);

	var nearestEmptyInsertDetectEvent = function(evt) {
		if (dragEl) {
			evt = evt.touches ? evt.touches[0] : evt;
			var nearest = _detectNearestEmptySortable(evt.clientX, evt.clientY);

			if (nearest) {
				// Create imitation event
				var event = {};
				for (var i in evt) {
					event[i] = evt[i];
				}
				event.target = event.rootEl = nearest;
				event.preventDefault = void 0;
				event.stopPropagation = void 0;
				nearest[expando]._onDragOver(event);
			}
		}
	};

	/**
	 * @class  Sortable
	 * @param  {HTMLElement}  el
	 * @param  {Object}       [options]
	 */
	function Sortable(el, options) {
		if (!(el && el.nodeType && el.nodeType === 1)) {
			throw 'Sortable: `el` must be HTMLElement, not ' + {}.toString.call(el);
		}

		this.el = el; // root element
		this.options = options = _extend({}, options);


		// Export instance
		el[expando] = this;

		// Default options
		var defaults = {
			group: null,
			sort: true,
			disabled: false,
			store: null,
			handle: null,
			scroll: true,
			scrollSensitivity: 30,
			scrollSpeed: 10,
			bubbleScroll: true,
			draggable: /[uo]l/i.test(el.nodeName) ? '>li' : '>*',
			swapThreshold: 1, // percentage; 0 <= x <= 1
			invertSwap: false, // invert always
			invertedSwapThreshold: null, // will be set to same as swapThreshold if default
			removeCloneOnHide: true,
			direction: function() {
				return _detectDirection(el, this.options);
			},
			ghostClass: 'sortable-ghost',
			chosenClass: 'sortable-chosen',
			dragClass: 'sortable-drag',
			ignore: 'a, img',
			filter: null,
			preventOnFilter: true,
			animation: 0,
			easing: null,
			setData: function (dataTransfer, dragEl) {
				dataTransfer.setData('Text', dragEl.textContent);
			},
			dropBubble: false,
			dragoverBubble: false,
			dataIdAttr: 'data-id',
			delay: 0,
			delayOnTouchOnly: false,
			touchStartThreshold: parseInt(window.devicePixelRatio, 10) || 1,
			forceFallback: false,
			fallbackClass: 'sortable-fallback',
			fallbackOnBody: false,
			fallbackTolerance: 0,
			fallbackOffset: {x: 0, y: 0},
			supportPointer: Sortable.supportPointer !== false && ('PointerEvent' in window),
			emptyInsertThreshold: 5
		};


		// Set default options
		for (var name in defaults) {
			!(name in options) && (options[name] = defaults[name]);
		}

		_prepareGroup(options);

		// Bind all private methods
		for (var fn in this) {
			if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
				this[fn] = this[fn].bind(this);
			}
		}

		// Setup drag mode
		this.nativeDraggable = options.forceFallback ? false : supportDraggable;

		if (this.nativeDraggable) {
			// Touch start threshold cannot be greater than the native dragstart threshold
			this.options.touchStartThreshold = 1;
		}

		// Bind events
		if (options.supportPointer) {
			_on(el, 'pointerdown', this._onTapStart);
		} else {
			_on(el, 'mousedown', this._onTapStart);
			_on(el, 'touchstart', this._onTapStart);
		}

		if (this.nativeDraggable) {
			_on(el, 'dragover', this);
			_on(el, 'dragenter', this);
		}

		sortables.push(this.el);

		// Restore sorting
		options.store && options.store.get && this.sort(options.store.get(this) || []);
	}

	Sortable.prototype = /** @lends Sortable.prototype */ {
		constructor: Sortable,

		_computeIsAligned: function(evt) {
			var target;

			if (ghostEl && !supportCssPointerEvents) {
				_hideGhostForTarget();
				target = document.elementFromPoint(evt.clientX, evt.clientY);
				_unhideGhostForTarget();
			} else {
				target = evt.target;
			}

			target = _closest(target, this.options.draggable, this.el, false);
			if (_alignedSilent) return;
			if (!dragEl || dragEl.parentNode !== this.el) return;

			var children = this.el.children;
			for (var i = 0; i < children.length; i++) {
				// Don't change for target in case it is changed to aligned before onDragOver is fired
				if (_closest(children[i], this.options.draggable, this.el, false) && children[i] !== target) {
					children[i].sortableMouseAligned = _isClientInRowColumn(evt.clientX, evt.clientY, children[i], this._getDirection(evt, null), this.options);
				}
			}
			// Used for nulling last target when not in element, nothing to do with checking if aligned
			if (!_closest(target, this.options.draggable, this.el, true)) {
				lastTarget = null;
			}

			_alignedSilent = true;
			setTimeout(function() {
				_alignedSilent = false;
			}, 30);

		},

		_getDirection: function(evt, target) {
			return (typeof this.options.direction === 'function') ? this.options.direction.call(this, evt, target, dragEl) : this.options.direction;
		},

		_onTapStart: function (/** Event|TouchEvent */evt) {
			if (!evt.cancelable) return;
			var _this = this,
				el = this.el,
				options = this.options,
				preventOnFilter = options.preventOnFilter,
				type = evt.type,
				touch = evt.touches && evt.touches[0],
				target = (touch || evt).target,
				originalTarget = evt.target.shadowRoot && ((evt.path && evt.path[0]) || (evt.composedPath && evt.composedPath()[0])) || target,
				filter = options.filter,
				startIndex,
				startDraggableIndex;

			_saveInputCheckedState(el);

			// Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.
			if (dragEl) {
				return;
			}

			if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
				return; // only left button and enabled
			}

			// cancel dnd if original target is content editable
			if (originalTarget.isContentEditable) {
				return;
			}

			target = _closest(target, options.draggable, el, false);


			if (lastDownEl === target) {
				// Ignoring duplicate `down`
				return;
			}

			// Get the index of the dragged element within its parent
			startIndex = _index(target);
			startDraggableIndex = _index(target, options.draggable);

			// Check filter
			if (typeof filter === 'function') {
				if (filter.call(this, evt, target, this)) {
					_dispatchEvent(_this, originalTarget, 'filter', target, el, el, startIndex, undefined, startDraggableIndex);
					preventOnFilter && evt.cancelable && evt.preventDefault();
					return; // cancel dnd
				}
			}
			else if (filter) {
				filter = filter.split(',').some(function (criteria) {
					criteria = _closest(originalTarget, criteria.trim(), el, false);

					if (criteria) {
						_dispatchEvent(_this, criteria, 'filter', target, el, el, startIndex, undefined, startDraggableIndex);
						return true;
					}
				});

				if (filter) {
					preventOnFilter && evt.cancelable && evt.preventDefault();
					return; // cancel dnd
				}
			}

			if (options.handle && !_closest(originalTarget, options.handle, el, false)) {
				return;
			}

			// Prepare `dragstart`
			this._prepareDragStart(evt, touch, target, startIndex, startDraggableIndex);
		},


		_handleAutoScroll: function(evt, fallback) {
			if (!dragEl || !this.options.scroll) return;
			var x = evt.clientX,
				y = evt.clientY,

				elem = document.elementFromPoint(x, y),
				_this = this;

			// IE does not seem to have native autoscroll,
			// Edge's autoscroll seems too conditional,
			// MACOS Safari does not have autoscroll,
			// Firefox and Chrome are good
			if (fallback || Edge || IE11OrLess || Safari) {
				_autoScroll(evt, _this.options, elem, fallback);

				// Listener for pointer element change
				var ogElemScroller = _getParentAutoScrollElement(elem, true);
				if (
					scrolling &&
					(
						!pointerElemChangedInterval ||
						x !== lastPointerElemX ||
						y !== lastPointerElemY
					)
				) {

					pointerElemChangedInterval && clearInterval(pointerElemChangedInterval);
					// Detect for pointer elem change, emulating native DnD behaviour
					pointerElemChangedInterval = setInterval(function() {
						if (!dragEl) return;
						// could also check if scroll direction on newElem changes due to parent autoscrolling
						var newElem = _getParentAutoScrollElement(document.elementFromPoint(x, y), true);
						if (newElem !== ogElemScroller) {
							ogElemScroller = newElem;
							_clearAutoScrolls();
							_autoScroll(evt, _this.options, ogElemScroller, fallback);
						}
					}, 10);
					lastPointerElemX = x;
					lastPointerElemY = y;
				}

			} else {
				// if DnD is enabled (and browser has good autoscrolling), first autoscroll will already scroll, so get parent autoscroll of first autoscroll
				if (!_this.options.bubbleScroll || _getParentAutoScrollElement(elem, true) === _getWindowScrollingElement()) {
					_clearAutoScrolls();
					return;
				}
				_autoScroll(evt, _this.options, _getParentAutoScrollElement(elem, false), false);
			}
		},

		_prepareDragStart: function (/** Event */evt, /** Touch */touch, /** HTMLElement */target, /** Number */startIndex, /** Number */startDraggableIndex) {
			var _this = this,
				el = _this.el,
				options = _this.options,
				ownerDocument = el.ownerDocument,
				dragStartFn;

			if (target && !dragEl && (target.parentNode === el)) {
				rootEl = el;
				dragEl = target;
				parentEl = dragEl.parentNode;
				nextEl = dragEl.nextSibling;
				lastDownEl = target;
				activeGroup = options.group;
				oldIndex = startIndex;
				oldDraggableIndex = startDraggableIndex;

				tapEvt = {
					target: dragEl,
					clientX: (touch || evt).clientX,
					clientY: (touch || evt).clientY
				};

				this._lastX = (touch || evt).clientX;
				this._lastY = (touch || evt).clientY;

				dragEl.style['will-change'] = 'all';
				// undo animation if needed
				dragEl.style.transition = '';
				dragEl.style.transform = '';

				dragStartFn = function () {
					// Delayed drag has been triggered
					// we can re-enable the events: touchmove/mousemove
					_this._disableDelayedDragEvents();

					if (!FireFox && _this.nativeDraggable) {
						dragEl.draggable = true;
					}

					// Bind the events: dragstart/dragend
					_this._triggerDragStart(evt, touch);

					// Drag start event
					_dispatchEvent(_this, rootEl, 'choose', dragEl, rootEl, rootEl, oldIndex, undefined, oldDraggableIndex);

					// Chosen item
					_toggleClass(dragEl, options.chosenClass, true);
				};

				// Disable "draggable"
				options.ignore.split(',').forEach(function (criteria) {
					_find(dragEl, criteria.trim(), _disableDraggable);
				});

				_on(ownerDocument, 'dragover', nearestEmptyInsertDetectEvent);
				_on(ownerDocument, 'mousemove', nearestEmptyInsertDetectEvent);
				_on(ownerDocument, 'touchmove', nearestEmptyInsertDetectEvent);

				_on(ownerDocument, 'mouseup', _this._onDrop);
				_on(ownerDocument, 'touchend', _this._onDrop);
				_on(ownerDocument, 'touchcancel', _this._onDrop);

				// Make dragEl draggable (must be before delay for FireFox)
				if (FireFox && this.nativeDraggable) {
					this.options.touchStartThreshold = 4;
					dragEl.draggable = true;
				}

				// Delay is impossible for native DnD in Edge or IE
				if (options.delay && (options.delayOnTouchOnly ? touch : true) && (!this.nativeDraggable || !(Edge || IE11OrLess))) {
					// If the user moves the pointer or let go the click or touch
					// before the delay has been reached:
					// disable the delayed drag
					_on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
					_on(ownerDocument, 'touchend', _this._disableDelayedDrag);
					_on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
					_on(ownerDocument, 'mousemove', _this._delayedDragTouchMoveHandler);
					_on(ownerDocument, 'touchmove', _this._delayedDragTouchMoveHandler);
					options.supportPointer && _on(ownerDocument, 'pointermove', _this._delayedDragTouchMoveHandler);

					_this._dragStartTimer = setTimeout(dragStartFn, options.delay);
				} else {
					dragStartFn();
				}
			}
		},

		_delayedDragTouchMoveHandler: function (/** TouchEvent|PointerEvent **/e) {
			var touch = e.touches ? e.touches[0] : e;
			if (max(abs(touch.clientX - this._lastX), abs(touch.clientY - this._lastY))
					>= Math.floor(this.options.touchStartThreshold / (this.nativeDraggable && window.devicePixelRatio || 1))
			) {
				this._disableDelayedDrag();
			}
		},

		_disableDelayedDrag: function () {
			dragEl && _disableDraggable(dragEl);
			clearTimeout(this._dragStartTimer);

			this._disableDelayedDragEvents();
		},

		_disableDelayedDragEvents: function () {
			var ownerDocument = this.el.ownerDocument;
			_off(ownerDocument, 'mouseup', this._disableDelayedDrag);
			_off(ownerDocument, 'touchend', this._disableDelayedDrag);
			_off(ownerDocument, 'touchcancel', this._disableDelayedDrag);
			_off(ownerDocument, 'mousemove', this._delayedDragTouchMoveHandler);
			_off(ownerDocument, 'touchmove', this._delayedDragTouchMoveHandler);
			_off(ownerDocument, 'pointermove', this._delayedDragTouchMoveHandler);
		},

		_triggerDragStart: function (/** Event */evt, /** Touch */touch) {
			touch = touch || (evt.pointerType == 'touch' ? evt : null);

			if (!this.nativeDraggable || touch) {
				if (this.options.supportPointer) {
					_on(document, 'pointermove', this._onTouchMove);
				} else if (touch) {
					_on(document, 'touchmove', this._onTouchMove);
				} else {
					_on(document, 'mousemove', this._onTouchMove);
				}
			} else {
				_on(dragEl, 'dragend', this);
				_on(rootEl, 'dragstart', this._onDragStart);
			}

			try {
				if (document.selection) {
					// Timeout neccessary for IE9
					_nextTick(function () {
						document.selection.empty();
					});
				} else {
					window.getSelection().removeAllRanges();
				}
			} catch (err) {
			}
		},

		_dragStarted: function (fallback, evt) {
			awaitingDragStarted = false;
			if (rootEl && dragEl) {
				if (this.nativeDraggable) {
					_on(document, 'dragover', this._handleAutoScroll);
					_on(document, 'dragover', _checkAlignment);
				}
				var options = this.options;

				// Apply effect
				!fallback && _toggleClass(dragEl, options.dragClass, false);
				_toggleClass(dragEl, options.ghostClass, true);

				// In case dragging an animated element
				_css(dragEl, 'transform', '');

				Sortable.active = this;

				fallback && this._appendGhost();

				// Drag start event
				_dispatchEvent(this, rootEl, 'start', dragEl, rootEl, rootEl, oldIndex, undefined, oldDraggableIndex, undefined, evt);
			} else {
				this._nulling();
			}
		},

		_emulateDragOver: function (forAutoScroll) {
			if (touchEvt) {
				if (this._lastX === touchEvt.clientX && this._lastY === touchEvt.clientY && !forAutoScroll) {
					return;
				}
				this._lastX = touchEvt.clientX;
				this._lastY = touchEvt.clientY;

				_hideGhostForTarget();

				var target = document.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
				var parent = target;

				while (target && target.shadowRoot) {
					target = target.shadowRoot.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
					if (target === parent) break;
					parent = target;
				}

				if (parent) {
					do {
						if (parent[expando]) {
							var inserted;

							inserted = parent[expando]._onDragOver({
								clientX: touchEvt.clientX,
								clientY: touchEvt.clientY,
								target: target,
								rootEl: parent
							});

							if (inserted && !this.options.dragoverBubble) {
								break;
							}
						}

						target = parent; // store last element
					}
					/* jshint boss:true */
					while (parent = parent.parentNode);
				}
				dragEl.parentNode[expando]._computeIsAligned(touchEvt);

				_unhideGhostForTarget();
			}
		},


		_onTouchMove: function (/**TouchEvent*/evt, forAutoScroll) {
			if (tapEvt) {
				var	options = this.options,
					fallbackTolerance = options.fallbackTolerance,
					fallbackOffset = options.fallbackOffset,
					touch = evt.touches ? evt.touches[0] : evt,
					matrix = ghostEl && _matrix(ghostEl),
					scaleX = ghostEl && matrix && matrix.a,
					scaleY = ghostEl && matrix && matrix.d,
					relativeScrollOffset = PositionGhostAbsolutely && ghostRelativeParent && _getRelativeScrollOffset(ghostRelativeParent),
					dx = ((touch.clientX - tapEvt.clientX)
							+ fallbackOffset.x) / (scaleX || 1)
							+ (relativeScrollOffset ? (relativeScrollOffset[0] - ghostRelativeParentInitialScroll[0]) : 0) / (scaleX || 1),
					dy = ((touch.clientY - tapEvt.clientY)
							+ fallbackOffset.y) / (scaleY || 1)
							+ (relativeScrollOffset ? (relativeScrollOffset[1] - ghostRelativeParentInitialScroll[1]) : 0) / (scaleY || 1),
					translate3d = evt.touches ? 'translate3d(' + dx + 'px,' + dy + 'px,0)' : 'translate(' + dx + 'px,' + dy + 'px)';

				// only set the status to dragging, when we are actually dragging
				if (!Sortable.active && !awaitingDragStarted) {
					if (fallbackTolerance &&
						min(abs(touch.clientX - this._lastX), abs(touch.clientY - this._lastY)) < fallbackTolerance
					) {
						return;
					}
					this._onDragStart(evt, true);
				}

				!forAutoScroll && this._handleAutoScroll(touch, true);

				moved = true;
				touchEvt = touch;

				_css(ghostEl, 'webkitTransform', translate3d);
				_css(ghostEl, 'mozTransform', translate3d);
				_css(ghostEl, 'msTransform', translate3d);
				_css(ghostEl, 'transform', translate3d);

				evt.cancelable && evt.preventDefault();
			}
		},

		_appendGhost: function () {
			// Bug if using scale(): https://stackoverflow.com/questions/2637058
			// Not being adjusted for
			if (!ghostEl) {
				var container = this.options.fallbackOnBody ? document.body : rootEl,
					rect = _getRect(dragEl, true, container, !PositionGhostAbsolutely),
					css = _css(dragEl),
					options = this.options;

				// Position absolutely
				if (PositionGhostAbsolutely) {
					// Get relatively positioned parent
					ghostRelativeParent = container;

					while (
						_css(ghostRelativeParent, 'position') === 'static' &&
						_css(ghostRelativeParent, 'transform') === 'none' &&
						ghostRelativeParent !== document
					) {
						ghostRelativeParent = ghostRelativeParent.parentNode;
					}

					if (ghostRelativeParent !== document) {
						var ghostRelativeParentRect = _getRect(ghostRelativeParent, true);

						rect.top -= ghostRelativeParentRect.top;
						rect.left -= ghostRelativeParentRect.left;
					}

					if (ghostRelativeParent !== document.body && ghostRelativeParent !== document.documentElement) {
						if (ghostRelativeParent === document) ghostRelativeParent = _getWindowScrollingElement();

						rect.top += ghostRelativeParent.scrollTop;
						rect.left += ghostRelativeParent.scrollLeft;
					} else {
						ghostRelativeParent = _getWindowScrollingElement();
					}
					ghostRelativeParentInitialScroll = _getRelativeScrollOffset(ghostRelativeParent);
				}


				ghostEl = dragEl.cloneNode(true);

				_toggleClass(ghostEl, options.ghostClass, false);
				_toggleClass(ghostEl, options.fallbackClass, true);
				_toggleClass(ghostEl, options.dragClass, true);

				_css(ghostEl, 'box-sizing', 'border-box');
				_css(ghostEl, 'margin', 0);
				_css(ghostEl, 'top', rect.top);
				_css(ghostEl, 'left', rect.left);
				_css(ghostEl, 'width', rect.width);
				_css(ghostEl, 'height', rect.height);
				_css(ghostEl, 'opacity', '0.8');
				_css(ghostEl, 'position', (PositionGhostAbsolutely ? 'absolute' : 'fixed'));
				_css(ghostEl, 'zIndex', '100000');
				_css(ghostEl, 'pointerEvents', 'none');

				container.appendChild(ghostEl);
			}
		},

		_onDragStart: function (/**Event*/evt, /**boolean*/fallback) {
			var _this = this;
			var dataTransfer = evt.dataTransfer;
			var options = _this.options;

			// Setup clone
			cloneEl = _clone(dragEl);

			cloneEl.draggable = false;
			cloneEl.style['will-change'] = '';

			this._hideClone();

			_toggleClass(cloneEl, _this.options.chosenClass, false);


			// #1143: IFrame support workaround
			_this._cloneId = _nextTick(function () {
				if (!_this.options.removeCloneOnHide) {
					rootEl.insertBefore(cloneEl, dragEl);
				}
				_dispatchEvent(_this, rootEl, 'clone', dragEl);
			});


			!fallback && _toggleClass(dragEl, options.dragClass, true);

			// Set proper drop events
			if (fallback) {
				ignoreNextClick = true;
				_this._loopId = setInterval(_this._emulateDragOver, 50);
			} else {
				// Undo what was set in _prepareDragStart before drag started
				_off(document, 'mouseup', _this._onDrop);
				_off(document, 'touchend', _this._onDrop);
				_off(document, 'touchcancel', _this._onDrop);

				if (dataTransfer) {
					dataTransfer.effectAllowed = 'move';
					options.setData && options.setData.call(_this, dataTransfer, dragEl);
				}

				_on(document, 'drop', _this);

				// #1276 fix:
				_css(dragEl, 'transform', 'translateZ(0)');
			}

			awaitingDragStarted = true;

			_this._dragStartId = _nextTick(_this._dragStarted.bind(_this, fallback, evt));
			_on(document, 'selectstart', _this);
			if (Safari) {
				_css(document.body, 'user-select', 'none');
			}
		},


		// Returns true - if no further action is needed (either inserted or another condition)
		_onDragOver: function (/**Event*/evt) {
			var el = this.el,
				target = evt.target,
				dragRect,
				targetRect,
				revert,
				options = this.options,
				group = options.group,
				activeSortable = Sortable.active,
				isOwner = (activeGroup === group),
				canSort = options.sort,
				_this = this;

			if (_silent) return;

			// Return invocation when dragEl is inserted (or completed)
			function completed(insertion) {
				if (insertion) {
					if (isOwner) {
						activeSortable._hideClone();
					} else {
						activeSortable._showClone(_this);
					}

					if (activeSortable) {
						// Set ghost class to new sortable's ghost class
						_toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : activeSortable.options.ghostClass, false);
						_toggleClass(dragEl, options.ghostClass, true);
					}

					if (putSortable !== _this && _this !== Sortable.active) {
						putSortable = _this;
					} else if (_this === Sortable.active) {
						putSortable = null;
					}

					// Animation
					dragRect && _this._animate(dragRect, dragEl);
					target && targetRect && _this._animate(targetRect, target);
				}


				// Null lastTarget if it is not inside a previously swapped element
				if ((target === dragEl && !dragEl.animated) || (target === el && !target.animated)) {
					lastTarget = null;
				}

				// no bubbling and not fallback
				if (!options.dragoverBubble && !evt.rootEl && target !== document) {
					_this._handleAutoScroll(evt);
					dragEl.parentNode[expando]._computeIsAligned(evt);

					// Do not detect for empty insert if already inserted
					!insertion && nearestEmptyInsertDetectEvent(evt);
				}

				!options.dragoverBubble && evt.stopPropagation && evt.stopPropagation();

				return true;
			}

			// Call when dragEl has been inserted
			function changed() {
				_dispatchEvent(_this, rootEl, 'change', target, el, rootEl, oldIndex, _index(dragEl), oldDraggableIndex, _index(dragEl, options.draggable), evt);
			}


			if (evt.preventDefault !== void 0) {
				evt.cancelable && evt.preventDefault();
			}


			moved = true;

			target = _closest(target, options.draggable, el, true);

			// target is dragEl or target is animated
			if (dragEl.contains(evt.target) || target.animated) {
				return completed(false);
			}

			if (target !== dragEl) {
				ignoreNextClick = false;
			}

			if (activeSortable && !options.disabled &&
				(isOwner
					? canSort || (revert = !rootEl.contains(dragEl)) // Reverting item into the original list
					: (
						putSortable === this ||
						(
							(this.lastPutMode = activeGroup.checkPull(this, activeSortable, dragEl, evt)) &&
							group.checkPut(this, activeSortable, dragEl, evt)
						)
					)
				)
			) {
				var axis = this._getDirection(evt, target);

				dragRect = _getRect(dragEl);

				if (revert) {
					this._hideClone();
					parentEl = rootEl; // actualization

					if (nextEl) {
						rootEl.insertBefore(dragEl, nextEl);
					} else {
						rootEl.appendChild(dragEl);
					}

					return completed(true);
				}

				var elLastChild = _lastChild(el);

				if (!elLastChild || _ghostIsLast(evt, axis, el) && !elLastChild.animated) {
					// assign target only if condition is true
					if (elLastChild && el === evt.target) {
						target = elLastChild;
					}

					if (target) {
						targetRect = _getRect(target);
					}

					if (isOwner) {
						activeSortable._hideClone();
					} else {
						activeSortable._showClone(this);
					}

					if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, !!target) !== false) {
						el.appendChild(dragEl);
						parentEl = el; // actualization
						realDragElRect = null;

						changed();
						return completed(true);
					}
				}
				else if (target && target !== dragEl && target.parentNode === el) {
					var direction = 0,
						targetBeforeFirstSwap,
						aligned = target.sortableMouseAligned,
						differentLevel = dragEl.parentNode !== el,
						side1 = axis === 'vertical' ? 'top' : 'left',
						scrolledPastTop = _isScrolledPast(target, 'top') || _isScrolledPast(dragEl, 'top'),
						scrollBefore = scrolledPastTop ? scrolledPastTop.scrollTop : void 0;


					if (lastTarget !== target) {
						lastMode = null;
						targetBeforeFirstSwap = _getRect(target)[side1];
						pastFirstInvertThresh = false;
					}

					// Reference: https://www.lucidchart.com/documents/view/10fa0e93-e362-4126-aca2-b709ee56bd8b/0
					if (
						_isElInRowColumn(dragEl, target, axis) && aligned ||
						differentLevel ||
						scrolledPastTop ||
						options.invertSwap ||
						lastMode === 'insert' ||
						// Needed, in the case that we are inside target and inserted because not aligned... aligned will stay false while inside
						// and lastMode will change to 'insert', but we must swap
						lastMode === 'swap'
					) {
						// New target that we will be inside
						if (lastMode !== 'swap') {
							isCircumstantialInvert = options.invertSwap || differentLevel;
						}

						direction = _getSwapDirection(evt, target, axis,
							options.swapThreshold, options.invertedSwapThreshold == null ? options.swapThreshold : options.invertedSwapThreshold,
							isCircumstantialInvert,
							lastTarget === target);
						lastMode = 'swap';
					} else {
						// Insert at position
						direction = _getInsertDirection(target);
						lastMode = 'insert';
					}
					if (direction === 0) return completed(false);

					realDragElRect = null;
					lastTarget = target;

					lastDirection = direction;

					targetRect = _getRect(target);

					var nextSibling = target.nextElementSibling,
						after = false;

					after = direction === 1;

					var moveVector = _onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, after);

					if (moveVector !== false) {
						if (moveVector === 1 || moveVector === -1) {
							after = (moveVector === 1);
						}

						_silent = true;
						setTimeout(_unsilent, 30);

						if (isOwner) {
							activeSortable._hideClone();
						} else {
							activeSortable._showClone(this);
						}

						if (after && !nextSibling) {
							el.appendChild(dragEl);
						} else {
							target.parentNode.insertBefore(dragEl, after ? nextSibling : target);
						}

						// Undo chrome's scroll adjustment
						if (scrolledPastTop) {
							_scrollBy(scrolledPastTop, 0, scrollBefore - scrolledPastTop.scrollTop);
						}

						parentEl = dragEl.parentNode; // actualization

						// must be done before animation
						if (targetBeforeFirstSwap !== undefined && !isCircumstantialInvert) {
							targetMoveDistance = abs(targetBeforeFirstSwap - _getRect(target)[side1]);
						}
						changed();

						return completed(true);
					}
				}

				if (el.contains(dragEl)) {
					return completed(false);
				}
			}

			return false;
		},

		_animate: function (prevRect, target) {
			var ms = this.options.animation;

			if (ms) {
				var currentRect = _getRect(target);

				if (target === dragEl) {
					realDragElRect = currentRect;
				}

				if (prevRect.nodeType === 1) {
					prevRect = _getRect(prevRect);
				}

				// Check if actually moving position
				if ((prevRect.left + prevRect.width / 2) !== (currentRect.left + currentRect.width / 2)
					|| (prevRect.top + prevRect.height / 2) !== (currentRect.top + currentRect.height / 2)
				) {
					var matrix = _matrix(this.el),
						scaleX = matrix && matrix.a,
						scaleY = matrix && matrix.d;

					_css(target, 'transition', 'none');
					_css(target, 'transform', 'translate3d('
						+ (prevRect.left - currentRect.left) / (scaleX ? scaleX : 1) + 'px,'
						+ (prevRect.top - currentRect.top) / (scaleY ? scaleY : 1) + 'px,0)'
					);

					this._repaint(target);
					_css(target, 'transition', 'transform ' + ms + 'ms' + (this.options.easing ? ' ' + this.options.easing : ''));
					_css(target, 'transform', 'translate3d(0,0,0)');
				}

				(typeof target.animated === 'number') && clearTimeout(target.animated);
				target.animated = setTimeout(function () {
					_css(target, 'transition', '');
					_css(target, 'transform', '');
					target.animated = false;
				}, ms);
			}
		},

		_repaint: function(target) {
			return target.offsetWidth;
		},

		_offMoveEvents: function() {
			_off(document, 'touchmove', this._onTouchMove);
			_off(document, 'pointermove', this._onTouchMove);
			_off(document, 'dragover', nearestEmptyInsertDetectEvent);
			_off(document, 'mousemove', nearestEmptyInsertDetectEvent);
			_off(document, 'touchmove', nearestEmptyInsertDetectEvent);
		},

		_offUpEvents: function () {
			var ownerDocument = this.el.ownerDocument;

			_off(ownerDocument, 'mouseup', this._onDrop);
			_off(ownerDocument, 'touchend', this._onDrop);
			_off(ownerDocument, 'pointerup', this._onDrop);
			_off(ownerDocument, 'touchcancel', this._onDrop);
			_off(document, 'selectstart', this);
		},

		_onDrop: function (/**Event*/evt) {
			var el = this.el,
				options = this.options;
			awaitingDragStarted = false;
			scrolling = false;
			isCircumstantialInvert = false;
			pastFirstInvertThresh = false;

			clearInterval(this._loopId);

			clearInterval(pointerElemChangedInterval);
			_clearAutoScrolls();
			_cancelThrottle();

			clearTimeout(this._dragStartTimer);

			_cancelNextTick(this._cloneId);
			_cancelNextTick(this._dragStartId);

			// Unbind events
			_off(document, 'mousemove', this._onTouchMove);


			if (this.nativeDraggable) {
				_off(document, 'drop', this);
				_off(el, 'dragstart', this._onDragStart);
				_off(document, 'dragover', this._handleAutoScroll);
				_off(document, 'dragover', _checkAlignment);
			}

			if (Safari) {
				_css(document.body, 'user-select', '');
			}

			this._offMoveEvents();
			this._offUpEvents();

			if (evt) {
				if (moved) {
					evt.cancelable && evt.preventDefault();
					!options.dropBubble && evt.stopPropagation();
				}

				ghostEl && ghostEl.parentNode && ghostEl.parentNode.removeChild(ghostEl);

				if (rootEl === parentEl || (putSortable && putSortable.lastPutMode !== 'clone')) {
					// Remove clone
					cloneEl && cloneEl.parentNode && cloneEl.parentNode.removeChild(cloneEl);
				}

				if (dragEl) {
					if (this.nativeDraggable) {
						_off(dragEl, 'dragend', this);
					}

					_disableDraggable(dragEl);
					dragEl.style['will-change'] = '';

					// Remove class's
					_toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : this.options.ghostClass, false);
					_toggleClass(dragEl, this.options.chosenClass, false);

					// Drag stop event
					_dispatchEvent(this, rootEl, 'unchoose', dragEl, parentEl, rootEl, oldIndex, null, oldDraggableIndex, null, evt);

					if (rootEl !== parentEl) {
						newIndex = _index(dragEl);
						newDraggableIndex = _index(dragEl, options.draggable);

						if (newIndex >= 0) {
							// Add event
							_dispatchEvent(null, parentEl, 'add', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);

							// Remove event
							_dispatchEvent(this, rootEl, 'remove', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);

							// drag from one list and drop into another
							_dispatchEvent(null, parentEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);
							_dispatchEvent(this, rootEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);
						}

						putSortable && putSortable.save();
					}
					else {
						if (dragEl.nextSibling !== nextEl) {
							// Get the index of the dragged element within its parent
							newIndex = _index(dragEl);
							newDraggableIndex = _index(dragEl, options.draggable);

							if (newIndex >= 0) {
								// drag & drop within the same list
								_dispatchEvent(this, rootEl, 'update', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);
								_dispatchEvent(this, rootEl, 'sort', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);
							}
						}
					}

					if (Sortable.active) {
						/* jshint eqnull:true */
						if (newIndex == null || newIndex === -1) {
							newIndex = oldIndex;
							newDraggableIndex = oldDraggableIndex;
						}
						_dispatchEvent(this, rootEl, 'end', dragEl, parentEl, rootEl, oldIndex, newIndex, oldDraggableIndex, newDraggableIndex, evt);

						// Save sorting
						this.save();
					}
				}

			}
			this._nulling();
		},

		_nulling: function() {
			rootEl =
			dragEl =
			parentEl =
			ghostEl =
			nextEl =
			cloneEl =
			lastDownEl =

			scrollEl =
			scrollParentEl =
			autoScrolls.length =

			pointerElemChangedInterval =
			lastPointerElemX =
			lastPointerElemY =

			tapEvt =
			touchEvt =

			moved =
			newIndex =
			oldIndex =

			lastTarget =
			lastDirection =

			realDragElRect =

			putSortable =
			activeGroup =
			Sortable.active = null;

			savedInputChecked.forEach(function (el) {
				el.checked = true;
			});

			savedInputChecked.length = 0;
		},

		handleEvent: function (/**Event*/evt) {
			switch (evt.type) {
				case 'drop':
				case 'dragend':
					this._onDrop(evt);
					break;

				case 'dragenter':
				case 'dragover':
					if (dragEl) {
						this._onDragOver(evt);
						_globalDragOver(evt);
					}
					break;

				case 'selectstart':
					evt.preventDefault();
					break;
			}
		},


		/**
		 * Serializes the item into an array of string.
		 * @returns {String[]}
		 */
		toArray: function () {
			var order = [],
				el,
				children = this.el.children,
				i = 0,
				n = children.length,
				options = this.options;

			for (; i < n; i++) {
				el = children[i];
				if (_closest(el, options.draggable, this.el, false)) {
					order.push(el.getAttribute(options.dataIdAttr) || _generateId(el));
				}
			}

			return order;
		},


		/**
		 * Sorts the elements according to the array.
		 * @param  {String[]}  order  order of the items
		 */
		sort: function (order) {
			var items = {}, rootEl = this.el;

			this.toArray().forEach(function (id, i) {
				var el = rootEl.children[i];

				if (_closest(el, this.options.draggable, rootEl, false)) {
					items[id] = el;
				}
			}, this);

			order.forEach(function (id) {
				if (items[id]) {
					rootEl.removeChild(items[id]);
					rootEl.appendChild(items[id]);
				}
			});
		},


		/**
		 * Save the current sorting
		 */
		save: function () {
			var store = this.options.store;
			store && store.set && store.set(this);
		},


		/**
		 * For each element in the set, get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
		 * @param   {HTMLElement}  el
		 * @param   {String}       [selector]  default: `options.draggable`
		 * @returns {HTMLElement|null}
		 */
		closest: function (el, selector) {
			return _closest(el, selector || this.options.draggable, this.el, false);
		},


		/**
		 * Set/get option
		 * @param   {string} name
		 * @param   {*}      [value]
		 * @returns {*}
		 */
		option: function (name, value) {
			var options = this.options;

			if (value === void 0) {
				return options[name];
			} else {
				options[name] = value;

				if (name === 'group') {
					_prepareGroup(options);
				}
			}
		},


		/**
		 * Destroy
		 */
		destroy: function () {
			var el = this.el;

			el[expando] = null;

			_off(el, 'mousedown', this._onTapStart);
			_off(el, 'touchstart', this._onTapStart);
			_off(el, 'pointerdown', this._onTapStart);

			if (this.nativeDraggable) {
				_off(el, 'dragover', this);
				_off(el, 'dragenter', this);
			}
			// Remove draggable attributes
			Array.prototype.forEach.call(el.querySelectorAll('[draggable]'), function (el) {
				el.removeAttribute('draggable');
			});

			this._onDrop();

			sortables.splice(sortables.indexOf(this.el), 1);

			this.el = el = null;
		},

		_hideClone: function() {
			if (!cloneEl.cloneHidden) {
				_css(cloneEl, 'display', 'none');
				cloneEl.cloneHidden = true;
				if (cloneEl.parentNode && this.options.removeCloneOnHide) {
					cloneEl.parentNode.removeChild(cloneEl);
				}
			}
		},

		_showClone: function(putSortable) {
			if (putSortable.lastPutMode !== 'clone') {
				this._hideClone();
				return;
			}

			if (cloneEl.cloneHidden) {
				// show clone at dragEl or original position
				if (rootEl.contains(dragEl) && !this.options.group.revertClone) {
					rootEl.insertBefore(cloneEl, dragEl);
				} else if (nextEl) {
					rootEl.insertBefore(cloneEl, nextEl);
				} else {
					rootEl.appendChild(cloneEl);
				}

				if (this.options.group.revertClone) {
					this._animate(dragEl, cloneEl);
				}
				_css(cloneEl, 'display', '');
				cloneEl.cloneHidden = false;
			}
		}
	};

	function _closest(/**HTMLElement*/el, /**String*/selector, /**HTMLElement*/ctx, includeCTX) {
		if (el) {
			ctx = ctx || document;

			do {
				if (
					selector != null &&
					(
						selector[0] === '>' ?
						el.parentNode === ctx && _matches(el, selector) :
						_matches(el, selector)
					) ||
					includeCTX && el === ctx
				) {
					return el;
				}

				if (el === ctx) break;
				/* jshint boss:true */
			} while (el = _getParentOrHost(el));
		}

		return null;
	}


	function _getParentOrHost(el) {
		return (el.host && el !== document && el.host.nodeType)
			? el.host
			: el.parentNode;
	}


	function _globalDragOver(/**Event*/evt) {
		if (evt.dataTransfer) {
			evt.dataTransfer.dropEffect = 'move';
		}
		evt.cancelable && evt.preventDefault();
	}


	function _on(el, event, fn) {
		el.addEventListener(event, fn, IE11OrLess ? false : captureMode);
	}


	function _off(el, event, fn) {
		el.removeEventListener(event, fn, IE11OrLess ? false : captureMode);
	}


	function _toggleClass(el, name, state) {
		if (el && name) {
			if (el.classList) {
				el.classList[state ? 'add' : 'remove'](name);
			}
			else {
				var className = (' ' + el.className + ' ').replace(R_SPACE, ' ').replace(' ' + name + ' ', ' ');
				el.className = (className + (state ? ' ' + name : '')).replace(R_SPACE, ' ');
			}
		}
	}


	function _css(el, prop, val) {
		var style = el && el.style;

		if (style) {
			if (val === void 0) {
				if (document.defaultView && document.defaultView.getComputedStyle) {
					val = document.defaultView.getComputedStyle(el, '');
				}
				else if (el.currentStyle) {
					val = el.currentStyle;
				}

				return prop === void 0 ? val : val[prop];
			}
			else {
				if (!(prop in style) && prop.indexOf('webkit') === -1) {
					prop = '-webkit-' + prop;
				}

				style[prop] = val + (typeof val === 'string' ? '' : 'px');
			}
		}
	}

	function _matrix(el) {
		var appliedTransforms = '';
		do {
			var transform = _css(el, 'transform');

			if (transform && transform !== 'none') {
				appliedTransforms = transform + ' ' + appliedTransforms;
			}
			/* jshint boss:true */
		} while (el = el.parentNode);

		if (window.DOMMatrix) {
			return new DOMMatrix(appliedTransforms);
		} else if (window.WebKitCSSMatrix) {
			return new WebKitCSSMatrix(appliedTransforms);
		} else if (window.CSSMatrix) {
			return new CSSMatrix(appliedTransforms);
		}
	}


	function _find(ctx, tagName, iterator) {
		if (ctx) {
			var list = ctx.getElementsByTagName(tagName), i = 0, n = list.length;

			if (iterator) {
				for (; i < n; i++) {
					iterator(list[i], i);
				}
			}

			return list;
		}

		return [];
	}



	function _dispatchEvent(
		sortable, rootEl, name,
		targetEl, toEl, fromEl,
		startIndex, newIndex,
		startDraggableIndex, newDraggableIndex,
		originalEvt
	) {
		sortable = (sortable || rootEl[expando]);
		var evt,
			options = sortable.options,
			onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1);
		// Support for new CustomEvent feature
		if (window.CustomEvent && !IE11OrLess && !Edge) {
			evt = new CustomEvent(name, {
				bubbles: true,
				cancelable: true
			});
		} else {
			evt = document.createEvent('Event');
			evt.initEvent(name, true, true);
		}

		evt.to = toEl || rootEl;
		evt.from = fromEl || rootEl;
		evt.item = targetEl || rootEl;
		evt.clone = cloneEl;

		evt.oldIndex = startIndex;
		evt.newIndex = newIndex;

		evt.oldDraggableIndex = startDraggableIndex;
		evt.newDraggableIndex = newDraggableIndex;

		evt.originalEvent = originalEvt;
		evt.pullMode = putSortable ? putSortable.lastPutMode : undefined;

		if (rootEl) {
			rootEl.dispatchEvent(evt);
		}

		if (options[onName]) {
			options[onName].call(sortable, evt);
		}
	}


	function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvt, willInsertAfter) {
		var evt,
			sortable = fromEl[expando],
			onMoveFn = sortable.options.onMove,
			retVal;
		// Support for new CustomEvent feature
		if (window.CustomEvent && !IE11OrLess && !Edge) {
			evt = new CustomEvent('move', {
				bubbles: true,
				cancelable: true
			});
		} else {
			evt = document.createEvent('Event');
			evt.initEvent('move', true, true);
		}

		evt.to = toEl;
		evt.from = fromEl;
		evt.dragged = dragEl;
		evt.draggedRect = dragRect;
		evt.related = targetEl || toEl;
		evt.relatedRect = targetRect || _getRect(toEl);
		evt.willInsertAfter = willInsertAfter;

		evt.originalEvent = originalEvt;

		fromEl.dispatchEvent(evt);

		if (onMoveFn) {
			retVal = onMoveFn.call(sortable, evt, originalEvt);
		}

		return retVal;
	}

	function _disableDraggable(el) {
		el.draggable = false;
	}

	function _unsilent() {
		_silent = false;
	}

	/**
	 * Gets nth child of el, ignoring hidden children, sortable's elements (does not ignore clone if it's visible)
	 * and non-draggable elements
	 * @param  {HTMLElement} el       The parent element
	 * @param  {Number} childNum      The index of the child
	 * @param  {Object} options       Parent Sortable's options
	 * @return {HTMLElement}          The child at index childNum, or null if not found
	 */
	function _getChild(el, childNum, options) {
		var currentChild = 0,
			i = 0,
			children = el.children;

		while (i < children.length) {
			if (
				children[i].style.display !== 'none' &&
				children[i] !== ghostEl &&
				children[i] !== dragEl &&
				_closest(children[i], options.draggable, el, false)
			) {
				if (currentChild === childNum) {
					return children[i];
				}
				currentChild++;
			}

			i++;
		}
		return null;
	}

	/**
	 * Gets the last child in the el, ignoring ghostEl or invisible elements (clones)
	 * @param  {HTMLElement} el       Parent element
	 * @return {HTMLElement}          The last child, ignoring ghostEl
	 */
	function _lastChild(el) {
		var last = el.lastElementChild;

		while (last && (last === ghostEl || _css(last, 'display') === 'none')) {
			last = last.previousElementSibling;
		}

		return last || null;
	}

	function _ghostIsLast(evt, axis, el) {
		var elRect = _getRect(_lastChild(el)),
			mouseOnAxis = axis === 'vertical' ? evt.clientY : evt.clientX,
			mouseOnOppAxis = axis === 'vertical' ? evt.clientX : evt.clientY,
			targetS2 = axis === 'vertical' ? elRect.bottom : elRect.right,
			targetS1Opp = axis === 'vertical' ? elRect.left : elRect.top,
			targetS2Opp = axis === 'vertical' ? elRect.right : elRect.bottom,
			spacer = 10;

		return (
			axis === 'vertical' ?
				(mouseOnOppAxis > targetS2Opp + spacer || mouseOnOppAxis <= targetS2Opp && mouseOnAxis > targetS2 && mouseOnOppAxis >= targetS1Opp) :
				(mouseOnAxis > targetS2 && mouseOnOppAxis > targetS1Opp || mouseOnAxis <= targetS2 && mouseOnOppAxis > targetS2Opp + spacer)
		);
	}

	function _getSwapDirection(evt, target, axis, swapThreshold, invertedSwapThreshold, invertSwap, isLastTarget) {
		var targetRect = _getRect(target),
			mouseOnAxis = axis === 'vertical' ? evt.clientY : evt.clientX,
			targetLength = axis === 'vertical' ? targetRect.height : targetRect.width,
			targetS1 = axis === 'vertical' ? targetRect.top : targetRect.left,
			targetS2 = axis === 'vertical' ? targetRect.bottom : targetRect.right,
			dragRect = _getRect(dragEl),
			invert = false;


		if (!invertSwap) {
			// Never invert or create dragEl shadow when target movemenet causes mouse to move past the end of regular swapThreshold
			if (isLastTarget && targetMoveDistance < targetLength * swapThreshold) { // multiplied only by swapThreshold because mouse will already be inside target by (1 - threshold) * targetLength / 2
				// check if past first invert threshold on side opposite of lastDirection
				if (!pastFirstInvertThresh &&
					(lastDirection === 1 ?
						(
							mouseOnAxis > targetS1 + targetLength * invertedSwapThreshold / 2
						) :
						(
							mouseOnAxis < targetS2 - targetLength * invertedSwapThreshold / 2
						)
					)
				)
				{
					// past first invert threshold, do not restrict inverted threshold to dragEl shadow
					pastFirstInvertThresh = true;
				}

				if (!pastFirstInvertThresh) {
					var dragS1 = axis === 'vertical' ? dragRect.top : dragRect.left,
						dragS2 = axis === 'vertical' ? dragRect.bottom : dragRect.right;
					// dragEl shadow (target move distance shadow)
					if (
						lastDirection === 1 ?
						(
							mouseOnAxis < targetS1 + targetMoveDistance // over dragEl shadow
						) :
						(
							mouseOnAxis > targetS2 - targetMoveDistance
						)
					)
					{
						return lastDirection * -1;
					}
				} else {
					invert = true;
				}
			} else {
				// Regular
				if (
					mouseOnAxis > targetS1 + (targetLength * (1 - swapThreshold) / 2) &&
					mouseOnAxis < targetS2 - (targetLength * (1 - swapThreshold) / 2)
				) {
					return _getInsertDirection(target);
				}
			}
		}

		invert = invert || invertSwap;

		if (invert) {
			// Invert of regular
			if (
				mouseOnAxis < targetS1 + (targetLength * invertedSwapThreshold / 2) ||
				mouseOnAxis > targetS2 - (targetLength * invertedSwapThreshold / 2)
			)
			{
				return ((mouseOnAxis > targetS1 + targetLength / 2) ? 1 : -1);
			}
		}

		return 0;
	}

	/**
	 * Gets the direction dragEl must be swapped relative to target in order to make it
	 * seem that dragEl has been "inserted" into that element's position
	 * @param  {HTMLElement} target       The target whose position dragEl is being inserted at
	 * @return {Number}                   Direction dragEl must be swapped
	 */
	function _getInsertDirection(target) {
		var dragElIndex = _index(dragEl),
			targetIndex = _index(target);

		if (dragElIndex < targetIndex) {
			return 1;
		} else {
			return -1;
		}
	}


	/**
	 * Generate id
	 * @param   {HTMLElement} el
	 * @returns {String}
	 * @private
	 */
	function _generateId(el) {
		var str = el.tagName + el.className + el.src + el.href + el.textContent,
			i = str.length,
			sum = 0;

		while (i--) {
			sum += str.charCodeAt(i);
		}

		return sum.toString(36);
	}

	/**
	 * Returns the index of an element within its parent for a selected set of
	 * elements
	 * @param  {HTMLElement} el
	 * @param  {selector} selector
	 * @return {number}
	 */
	function _index(el, selector) {
		var index = 0;

		if (!el || !el.parentNode) {
			return -1;
		}

		while (el && (el = el.previousElementSibling)) {
			if ((el.nodeName.toUpperCase() !== 'TEMPLATE') && el !== cloneEl && (!selector || _matches(el, selector))) {
				index++;
			}
		}

		return index;
	}

	function _matches(/**HTMLElement*/el, /**String*/selector) {
		if (!selector) return;

		selector[0] === '>' && (selector = selector.substring(1));

		if (el) {
			try {
				if (el.matches) {
					return el.matches(selector);
				} else if (el.msMatchesSelector) {
					return el.msMatchesSelector(selector);
				} else if (el.webkitMatchesSelector) {
					return el.webkitMatchesSelector(selector);
				}
			} catch(_) {
				return false;
			}
		}

		return false;
	}

	var _throttleTimeout;
	function _throttle(callback, ms) {
		return function () {
			if (!_throttleTimeout) {
				var args = arguments,
					_this = this;

				_throttleTimeout = setTimeout(function () {
					if (args.length === 1) {
						callback.call(_this, args[0]);
					} else {
						callback.apply(_this, args);
					}

					_throttleTimeout = void 0;
				}, ms);
			}
		};
	}

	function _cancelThrottle() {
		clearTimeout(_throttleTimeout);
		_throttleTimeout = void 0;
	}

	function _extend(dst, src) {
		if (dst && src) {
			for (var key in src) {
				if (src.hasOwnProperty(key)) {
					dst[key] = src[key];
				}
			}
		}

		return dst;
	}

	function _clone(el) {
		if (Polymer && Polymer.dom) {
			return Polymer.dom(el).cloneNode(true);
		}
		else if ($) {
			return $(el).clone(true)[0];
		}
		else {
			return el.cloneNode(true);
		}
	}

	function _saveInputCheckedState(root) {
		savedInputChecked.length = 0;

		var inputs = root.getElementsByTagName('input');
		var idx = inputs.length;

		while (idx--) {
			var el = inputs[idx];
			el.checked && savedInputChecked.push(el);
		}
	}

	function _nextTick(fn) {
		return setTimeout(fn, 0);
	}

	function _cancelNextTick(id) {
		return clearTimeout(id);
	}


	/**
	 * Returns the "bounding client rect" of given element
	 * @param  {HTMLElement} el                The element whose boundingClientRect is wanted
	 * @param  {[HTMLElement]} container       the parent the element will be placed in
	 * @param  {[Boolean]} adjustForTransform  Whether the rect should compensate for parent's transform
	 * @return {Object}                        The boundingClientRect of el
	 */
	function _getRect(el, adjustForTransform, container, adjustForFixed) {
		if (!el.getBoundingClientRect && el !== win) return;

		var elRect,
			top,
			left,
			bottom,
			right,
			height,
			width;

		if (el !== win && el !== _getWindowScrollingElement()) {
			elRect = el.getBoundingClientRect();
			top = elRect.top;
			left = elRect.left;
			bottom = elRect.bottom;
			right = elRect.right;
			height = elRect.height;
			width = elRect.width;
		} else {
			top = 0;
			left = 0;
			bottom = window.innerHeight;
			right = window.innerWidth;
			height = window.innerHeight;
			width = window.innerWidth;
		}

		if (adjustForFixed && el !== win) {
			// Adjust for translate()
			container = container || el.parentNode;

			// solves #1123 (see: https://stackoverflow.com/a/37953806/6088312)
			// Not needed on <= IE11
			if (!IE11OrLess) {
				do {
					if (container && container.getBoundingClientRect && _css(container, 'transform') !== 'none') {
						var containerRect = container.getBoundingClientRect();

						// Set relative to edges of padding box of container
						top -= containerRect.top + parseInt(_css(container, 'border-top-width'));
						left -= containerRect.left + parseInt(_css(container, 'border-left-width'));
						bottom = top + elRect.height;
						right = left + elRect.width;

						break;
					}
					/* jshint boss:true */
				} while (container = container.parentNode);
			}
		}

		if (adjustForTransform && el !== win) {
			// Adjust for scale()
			var matrix = _matrix(container || el),
				scaleX = matrix && matrix.a,
				scaleY = matrix && matrix.d;

			if (matrix) {
				top /= scaleY;
				left /= scaleX;

				width /= scaleX;
				height /= scaleY;

				bottom = top + height;
				right = left + width;
			}
		}

		return {
			top: top,
			left: left,
			bottom: bottom,
			right: right,
			width: width,
			height: height
		};
	}


	/**
	 * Checks if a side of an element is scrolled past a side of it's parents
	 * @param  {HTMLElement}  el       The element who's side being scrolled out of view is in question
	 * @param  {String}       side     Side of the element in question ('top', 'left', 'right', 'bottom')
	 * @return {HTMLElement}           The parent scroll element that the el's side is scrolled past, or null if there is no such element
	 */
	function _isScrolledPast(el, side) {
		var parent = _getParentAutoScrollElement(el, true),
			elSide = _getRect(el)[side];

		/* jshint boss:true */
		while (parent) {
			var parentSide = _getRect(parent)[side],
				visible;

			if (side === 'top' || side === 'left') {
				visible = elSide >= parentSide;
			} else {
				visible = elSide <= parentSide;
			}

			if (!visible) return parent;

			if (parent === _getWindowScrollingElement()) break;

			parent = _getParentAutoScrollElement(parent, false);
		}

		return false;
	}

	/**
	 * Returns the scroll offset of the given element, added with all the scroll offsets of parent elements.
	 * The value is returned in real pixels.
	 * @param  {HTMLElement} el
	 * @return {Array}             Offsets in the format of [left, top]
	 */
	function _getRelativeScrollOffset(el) {
		var offsetLeft = 0,
			offsetTop = 0,
			winScroller = _getWindowScrollingElement();

		if (el) {
			do {
				var matrix = _matrix(el),
					scaleX = matrix.a,
					scaleY = matrix.d;

				offsetLeft += el.scrollLeft * scaleX;
				offsetTop += el.scrollTop * scaleY;
			} while (el !== winScroller && (el = el.parentNode));
		}

		return [offsetLeft, offsetTop];
	}

	// Fixed #973:
	_on(document, 'touchmove', function(evt) {
		if ((Sortable.active || awaitingDragStarted) && evt.cancelable) {
			evt.preventDefault();
		}
	});


	// Export utils
	Sortable.utils = {
		on: _on,
		off: _off,
		css: _css,
		find: _find,
		is: function (el, selector) {
			return !!_closest(el, selector, el, false);
		},
		extend: _extend,
		throttle: _throttle,
		closest: _closest,
		toggleClass: _toggleClass,
		clone: _clone,
		index: _index,
		nextTick: _nextTick,
		cancelNextTick: _cancelNextTick,
		detectDirection: _detectDirection,
		getChild: _getChild
	};


	/**
	 * Create sortable instance
	 * @param {HTMLElement}  el
	 * @param {Object}      [options]
	 */
	Sortable.create = function (el, options) {
		return new Sortable(el, options);
	};


	// Export
	Sortable.version = '1.9.0';
	return Sortable;
});


/***/ }),

/***/ 792:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(793)
/* template */
var __vue_template__ = __webpack_require__(797)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/kurierStop.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-656f7ea3", Component.options)
  } else {
    hotAPI.reload("data-v-656f7ea3", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 793:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      ahmed: 0
    };
  },

  computed: {
    tourStopNameProps: function tourStopNameProps() {
      var _this = this;

      return {
        name: "stop" + trans("front.buissness.stopName") + this.stop.id,
        placeholder: trans("front.buissness.stopName"),
        // img: '/images/food-scale-tool.svg',
        validate: "required",
        id: "stopName" + this.stop.id,
        editable: {
          img: "",
          after: "",
          saveData: function saveData(newval, afterFinish) {
            _this.saveMillistones("stop_name", newval, function (response) {
              _this.tour.stops = response.stops;

              afterFinish();
            });
          }
        }
      };
    },
    stopProps: function stopProps() {
      var _this2 = this;

      return {
        name: trans("front.buissness.StopTime") + this.stop.id,
        placeholder: trans("front.buissness.StopTime"),
        newclasses: {
          stopTime: true
        },
        validate: "required|decimal:3|min_value:1",
        id: "StopsTime" + this.stop.id,
        editable: {
          img: "/images/watingOrder.svg",
          after: "(MIN).",
          saveData: function saveData(newval, afterFinish) {
            _this2.saveMillistones("stop_time", newval, function (response) {
              _this2.tour.stops = response.stops;
              _this2.tour.price = response.price;
              _this2.tour.tour_details = response.tour_details;
              _this2.tour.tour_dates = response.tour_dates;
              afterFinish();
            });
          }
        },
        numeric: true
      };
    }
  },
  props: {
    stop: {
      required: true
    },
    index: {
      required: true
    },
    tour: {
      requried: true
    }
  },
  watch: {},
  methods: {
    saveMillistones: function saveMillistones(millistone, newval, successServerFunction) {
      var mydata = {
        stop_id: this.stop.id
      };
      mydata[millistone] = newval;
      var formdata = {
        url: "/api/tours/edit/" + this.$route.params.tourId + "/tour_details",
        data: mydata,
        validate: this.$validator,

        failedValidate: function failedValidate(data) {},
        successServer: function successServer(response) {
          successServerFunction(response.body);
        },
        failServer: function failServer(error) {
          // console.log(error);
        }
      };
      this.$vss.post(formdata);
    },
    getStopAddress: function getStopAddress(stop) {
      if (!stop || !stop.stop_address) {
        return "";
      }
      var address = stop.stop_address;
      return address.street + " " + address.home + ", " + address.city + ", " + address.region + ", " + address.country.code;
    }
  },
  components: {
    "kurier-stop-number": __webpack_require__(794)
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 794:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(795)
/* template */
var __vue_template__ = __webpack_require__(796)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/helpers/kurierNumber.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-03d08374", Component.options)
  } else {
    hotAPI.reload("data-v-03d08374", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 795:
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

  computed: {},
  props: {
    textColor: {
      required: false,
      default: "#222222"
    }
  },
  watch: {},
  methods: {},
  components: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 796:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "svg",
    {
      staticStyle: { "enable-background": "new 0 0 455.431 455.431" },
      attrs: {
        xmlns: "http://www.w3.org/2000/svg",
        "xmlns:xlink": "http://www.w3.org/1999/xlink",
        version: "1.1",
        id: "Capa_1",
        x: "0px",
        y: "0px",
        viewBox: "0 0 455.431 455.431",
        "xml:space": "preserve"
      }
    },
    [
      _c("path", {
        staticStyle: { fill: "#f6ab36" },
        attrs: {
          d:
            "M405.493,412.764c-69.689,56.889-287.289,56.889-355.556,0c-69.689-56.889-62.578-300.089,0-364.089  s292.978-64,355.556,0S475.182,355.876,405.493,412.764z"
        }
      }),
      _vm._v(" "),
      _c("path", {
        staticStyle: { fill: "#ffde57" },
        attrs: {
          d:
            "M229.138,313.209c-62.578,49.778-132.267,75.378-197.689,76.8  c-48.356-82.489-38.4-283.022,18.489-341.333c51.2-52.622,211.911-62.578,304.356-29.867  C377.049,112.676,330.116,232.142,229.138,313.209z"
        }
      }),
      _vm._v(" "),
      _c(
        "text",
        {
          staticStyle: {
            "text-shadow": "0 0 10px rgba(255,255,255,0.5)",
            "font-style": "italic"
          },
          attrs: {
            x: "50%",
            y: "55%",
            fill: _vm.textColor,
            "font-size": "300",
            "dominant-baseline": "middle",
            "text-anchor": "middle"
          }
        },
        [_vm._t("default")],
        2
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
    require("vue-hot-reload-api")      .rerender("data-v-03d08374", module.exports)
  }
}

/***/ }),

/***/ 797:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "kurier-offer stop-show" }, [
    _c("div", { staticClass: "klink-offer-head" }, [
      _c(
        "div",
        { staticClass: "klink-offer-head-item" },
        [
          _c(
            "kurier-stop-number",
            {
              staticStyle: { "min-width": "30px" },
              attrs: {
                "data-toggle": "tooltip",
                title: _vm.trans("front.touroffers.stopindex")
              }
            },
            [_vm._v(_vm._s(_vm.index + 1))]
          ),
          _vm._v(" "),
          _c("span", [
            _c(
              "span",
              {
                staticClass: "stop-name",
                staticStyle: { "margin-left": "0px", "font-weight": "bold" }
              },
              [
                _c(
                  "editable",
                  _vm._b(
                    {
                      staticStyle: { margin: "0" },
                      model: {
                        value: _vm.stop.name,
                        callback: function($$v) {
                          _vm.$set(_vm.stop, "name", $$v)
                        },
                        expression: "stop.name"
                      }
                    },
                    "editable",
                    _vm.tourStopNameProps,
                    false
                  )
                )
              ],
              1
            )
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c("div", { staticClass: "klink-offer-head-item text-right" }, [
        _c(
          "span",
          { staticStyle: { "padding-right": "5px" } },
          [
            _c(
              "editable",
              _vm._b(
                {
                  model: {
                    value: _vm.stop.stop_time,
                    callback: function($$v) {
                      _vm.$set(_vm.stop, "stop_time", $$v)
                    },
                    expression: "stop.stop_time"
                  }
                },
                "editable",
                _vm.stopProps,
                false
              )
            )
          ],
          1
        )
      ])
    ]),
    _vm._v(" "),
    _c(
      "div",
      { class: { "klink-offer-body": true, active: true } },
      [
        _c(
          "transition",
          {
            attrs: {
              name: "slide",
              "enter-active-class": "animated slideInDown",
              "leave-active-class": "animated slideOutUp"
            }
          },
          [
            _c(
              "div",
              {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: true,
                    expression: "true"
                  }
                ],
                staticClass: "kurier-stop-body"
              },
              [_vm._v(_vm._s(_vm.getStopAddress(_vm.stop)))]
            )
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
    require("vue-hot-reload-api")      .rerender("data-v-656f7ea3", module.exports)
  }
}

/***/ }),

/***/ 798:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "stops-row-vertical" }, [
    _c(
      "div",
      { staticClass: "stops-rows-wrapper" },
      [
        _c("div", { staticClass: "stops-rows-header" }, [
          _vm._v(_vm._s(_vm.trans("front.touroffers.stops")))
        ]),
        _vm._v(" "),
        _c(
          "draggable",
          {
            staticClass: "stops-rows-container",
            attrs: { element: "div", options: _vm.dragOptions },
            on: {
              start: function($event) {
                _vm.drag = true
              },
              end: _vm.dragEnd
            },
            model: {
              value: _vm.tour.stops,
              callback: function($$v) {
                _vm.$set(_vm.tour, "stops", $$v)
              },
              expression: "tour.stops"
            }
          },
          _vm._l(_vm.tour.stops, function(stop, index) {
            return _c("kurier-stop", {
              key: "stop" + stop.stop_index + stop.id,
              attrs: { stop: stop, index: index, tour: _vm.tour }
            })
          }),
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
    require("vue-hot-reload-api")      .rerender("data-v-3ec63e96", module.exports)
  }
}

/***/ }),

/***/ 799:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(800)
/* template */
var __vue_template__ = __webpack_require__(801)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/shipInformation.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1ceaf926", Component.options)
  } else {
    hotAPI.reload("data-v-1ceaf926", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 800:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      shippings: [],
      distances: [],
      loading: false,
      mytour: {
        price: 0,
        ship_id: 0
      }
    };
  },

  computed: {
    checkedAndErrors: function checkedAndErrors() {
      if (this.tour && this.tour.tour_details && this.shippings.length && this.distances.length && this.stopsGeneral.totalWeight) {
        return true;
      }
      return false;
    },
    isChanged: function isChanged() {
      return this.tour.ship_id !== this.mytour.ship_id;
    },
    stops: function stops() {
      return this.tour.stops;
    },
    allowStops: function allowStops() {
      if (!this.tour || !this.tour.stops) {
        return false;
      }
      return this.tour.stops.length > 1;
    },
    stopsGeneral: function stopsGeneral() {
      if (!this.tour || !this.tour.tour_details) {
        return {};
      } else {
        var numberOfPackets = Number(this.tour.tour_details.tour_total_packets_number);
        var totalTimeOfStops = Number(this.tour.tour_details.tour_total_time);
        var totalDistanceStops = Number(this.tour.tour_details.tour_total_distance);
        var timePerStop = Number(this.tour.tour_details.tour_average_stop_time);
        var numberOfStops = Number(this.tour.tour_details.number_of_stops);
        var totalWeight = Number(this.tour.tour_details.tour_total_weight);
        return {
          numberOfPackets: numberOfPackets,
          totalTimeOfStops: totalTimeOfStops,
          timePerStop: timePerStop,
          totalDistanceStops: totalDistanceStops,
          numberOfStops: numberOfStops,
          totalWeight: totalWeight
        };
      }
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    saveTourShip: function saveTourShip(e) {
      var _this = this;

      // console.log(e);
      if (this.loading) {
        return false;
      }
      this.loading = true;
      var formdata = {
        url: "/api/tours/edit/" + this.$route.params.tourId + "/tour_ship",
        data: {
          ship_id: this.mytour.ship_id,
          price: this.mytour.price
        },
        validate: this.$validator,
        successTitle: this.trans("front.touroffers.vehicleChangedTitle"),
        successBody: this.trans("front.touroffers.vehicleChanged"),
        failedValidate: function failedValidate(data) {},
        successServer: function successServer(response) {
          _this.tour.ship_id = response.body.ship_id;
          _this.tour.price = response.body.price;
          _this.loading = false;
        },
        failServer: function failServer(error) {
          _this.loading = false;
        }
      };
      this.$vss.post(formdata);
    }
  },
  components: {
    "tour-pricing": __webpack_require__(662)
  },
  created: function created() {
    var _this2 = this;

    this.$http.get("/api/shipping/getAll").then(function (response) {
      _this2.shippings = response.body[0];
      _this2.distances = response.body[1];
    });
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ 801:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "stops-row-vertical" }, [
    _c("div", { staticClass: "stops-rows-wrapper" }, [
      _c("div", { staticClass: "stops-rows-header" }, [
        _vm._v(_vm._s(_vm.trans("front.touroffers.shipInformation")))
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "stops-rows-container carsouel-no-margin" },
        [
          _vm.checkedAndErrors
            ? _c("tour-pricing", {
                attrs: {
                  tour: _vm.mytour,
                  stopsGeneral: _vm.stopsGeneral,
                  shippings: _vm.shippings,
                  distances: _vm.distances,
                  stops: _vm.stops,
                  loadTime: "stop_time",
                  ship: _vm.tour.ship_id
                },
                on: { myveichleChanged: _vm.saveTourShip }
              })
            : _vm._e()
        ],
        1
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
    require("vue-hot-reload-api")      .rerender("data-v-1ceaf926", module.exports)
  }
}

/***/ }),

/***/ 802:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(803)
/* template */
var __vue_template__ = __webpack_require__(804)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/tourDetails.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-77b56f32", Component.options)
  } else {
    hotAPI.reload("data-v-77b56f32", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 803:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__main_byStop_inputs_js__ = __webpack_require__(661);
//
//
//
//
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
      inputs: __WEBPACK_IMPORTED_MODULE_0__main_byStop_inputs_js__["a" /* default */]
    };
  },

  computed: {
    isDynamic: function isDynamic() {
      if (this.tour.stops && this.tour.stops.length > 1) {
        return true;
      }
      return false;
    },
    minTotalTime: function minTotalTime() {
      return this.tour.tour_details.number_of_stops * this.tour.tour_details.tour_average_stop_time;
    },
    tourNumberOfStopsProps: function tourNumberOfStopsProps() {
      var _this = this;

      return Object.assign(this.inputs[0].props, {
        editable: {
          img: "/images/threemarkers.svg",
          after: "",
          saveData: function saveData(newval, afterFinish) {
            _this.saveMillistones("number_of_stops", newval, function (response) {
              _this.tour.tour_details = response.tour_details;
              // this.tour.price = response.price;
              afterFinish();
            });
          },
          disabled: this.isDynamic,
          disabledMsg: {
            head: trans("front.touroffers.disabledMsgHead"),
            body: trans("front.touroffers.disabledMsgBody")
          }
        }
      });
    },
    tourTotalTimeProps: function tourTotalTimeProps() {
      var _this2 = this;

      return Object.assign(this.inputs[4].props, {
        validate: "required|decimal|min_value:" + this.minTotalTime,
        editable: {
          img: "/images/stopwatch.svg",
          after: "(min)",
          saveData: function saveData(newval, afterFinish) {
            _this2.saveMillistones("tour_total_time", newval, function (response) {
              _this2.tour.tour_details = response.tour_details;
              // this.tour.price = response.price;
              afterFinish();
            });
          },
          disabled: this.isDynamic,
          disabledMsg: {
            head: trans("front.touroffers.disabledMsgHead"),
            body: trans("front.touroffers.disabledMsgBody")
          }
        }
      });
    },
    averageStopTimeProps: function averageStopTimeProps() {
      var _this3 = this;

      return Object.assign(this.inputs[2].props, {
        editable: {
          img: "/images/watingOrder.svg",
          after: "(min)",
          saveData: function saveData(newval, afterFinish) {
            _this3.saveMillistones("tour_average_stop_time", newval, function (response) {
              _this3.tour.tour_details = response.tour_details;
              _this3.tour.price = response.price;
              afterFinish();
            });
          }
        }
      });
    },
    packetsProps: function packetsProps() {
      var _this4 = this;

      return Object.assign(this.inputs[3].props, {
        editable: {
          img: "/images/boxes2.svg",
          after: "",
          saveData: function saveData(newval, afterFinish) {
            _this4.saveMillistones("tour_total_packets_number", newval, function (response) {
              _this4.tour.tour_details = response.tour_details;
              afterFinish();
            });
          }
        }
      });
    },
    weightProps: function weightProps() {
      var _this5 = this;

      return Object.assign(this.inputs[1].props, {
        editable: {
          img: "/images/weight-tool.svg",
          after: "(KG)",
          saveData: function saveData(newval, afterFinish) {
            return _this5.saveMillistones("tour_total_weight", newval, function (response) {
              _this5.tour.ship_id = response.ship_id;
              _this5.tour.tour_ship = response.tour_ship;
              _this5.tour.tour_details = response.tour_details;
              afterFinish();
            });
          }
        }
      });
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    saveMillistones: function saveMillistones(millistone, newval, successServerFunction) {
      var _this6 = this;

      var mydata = {};
      mydata[millistone] = newval;
      var formdata = {
        url: "/api/tours/edit/" + this.$route.params.tourId + "/tour_details",
        data: mydata,
        validate: this.$validator,

        failedValidate: function failedValidate(data) {
          successServerFunction(_this6.tour);
        },
        successServer: function successServer(response) {
          successServerFunction(response.body);
        },
        failServer: function failServer(error) {
          successServerFunction(_this6.tour);
          console.log(error);
        }
      };
      this.$vss.post(formdata);
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 804:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.tour && _vm.tour.tour_details
    ? _c("div", { staticClass: "stops-row-vertical" }, [
        _c(
          "div",
          { staticClass: "stops-rows-wrapper" },
          [
            _c(
              "editable",
              _vm._b(
                {
                  model: {
                    value: _vm.tour.tour_details.tour_total_weight,
                    callback: function($$v) {
                      _vm.$set(_vm.tour.tour_details, "tour_total_weight", $$v)
                    },
                    expression: "tour.tour_details.tour_total_weight"
                  }
                },
                "editable",
                _vm.weightProps,
                false
              )
            ),
            _vm._v(" "),
            _c(
              "editable",
              _vm._b(
                {
                  model: {
                    value: _vm.tour.tour_details.tour_total_packets_number,
                    callback: function($$v) {
                      _vm.$set(
                        _vm.tour.tour_details,
                        "tour_total_packets_number",
                        $$v
                      )
                    },
                    expression: "tour.tour_details.tour_total_packets_number"
                  }
                },
                "editable",
                _vm.packetsProps,
                false
              )
            ),
            _vm._v(" "),
            _c(
              "editable",
              _vm._b(
                {
                  model: {
                    value: _vm.tour.tour_details.tour_average_stop_time,
                    callback: function($$v) {
                      _vm.$set(
                        _vm.tour.tour_details,
                        "tour_average_stop_time",
                        $$v
                      )
                    },
                    expression: "tour.tour_details.tour_average_stop_time"
                  }
                },
                "editable",
                _vm.averageStopTimeProps,
                false
              )
            ),
            _vm._v(" "),
            _c(
              "editable",
              _vm._b(
                {
                  model: {
                    value: _vm.tour.tour_details.tour_total_time,
                    callback: function($$v) {
                      _vm.$set(_vm.tour.tour_details, "tour_total_time", $$v)
                    },
                    expression: "tour.tour_details.tour_total_time"
                  }
                },
                "editable",
                _vm.tourTotalTimeProps,
                false
              )
            ),
            _vm._v(" "),
            _c(
              "editable",
              _vm._b(
                {
                  model: {
                    value: _vm.tour.tour_details.number_of_stops,
                    callback: function($$v) {
                      _vm.$set(_vm.tour.tour_details, "number_of_stops", $$v)
                    },
                    expression: "tour.tour_details.number_of_stops"
                  }
                },
                "editable",
                _vm.tourNumberOfStopsProps,
                false
              )
            )
          ],
          1
        )
      ])
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-77b56f32", module.exports)
  }
}

/***/ }),

/***/ 805:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(806)
/* template */
var __vue_template__ = __webpack_require__(823)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/tourTimes.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-40680aaa", Component.options)
  } else {
    hotAPI.reload("data-v-40680aaa", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 806:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      changingDates: false,
      activeIndex: 0,
      currentMonth: window.moment().month(),
      mytimes: [{
        props: {
          index: 0,
          type: "every",
          options: {
            inputs: ["type"],
            conditions: [0, 1, 2, 3]
          },
          dates: {
            startDate: window.moment(new Date().setMinutes(0)),
            every: 0,
            type: "months",
            condition: 4,
            nextDay: null
          },
          headingText: trans("front.accounting.acctountingPeriod")
        }
      }, {
        props: {
          index: 1,
          type: "every",
          options: {
            inputs: ["every", "type"],
            conditions: [0, 1, 2, 3, 4]
          },
          dates: {
            startDate: window.moment(new Date().setMinutes(0)),
            every: 1,
            type: "months",
            condition: 5,
            nextDay: null
          },
          headingText: trans("front.accounting.payment")
        }
      }, {
        props: {
          index: 2,
          type: "law",
          options: {
            inputs: ["every", "type"],
            maxes: {
              days: window.moment.duration(3, "months").as("days").toFixed(),
              weeks: window.moment.duration(3, "months").as("weeks").toFixed(),
              months: window.moment.duration(3, "months").as("months").toFixed()
            },
            mins: {
              days: 0,
              weeks: 0,
              months: 0
            },
            conditions: [0, 1, 2, 3, 4, 5, 6]
          },
          dates: {
            startDate: window.moment(new Date().setMinutes(0)),
            every: 2,
            type: "weeks",
            condition: 5,
            nextDay: null
          },
          headingText: trans("front.accounting.test")
        }
      }, {
        props: {
          index: 3,
          type: "law",
          options: {
            inputs: ["every", "type"],
            conditions: [0, 1, 2, 3, 4, 5, 6],
            mins: {
              days: 0,
              weeks: 0,
              months: 0
            }
          },
          dates: {
            startDate: window.moment(new Date().setMinutes(0)),
            every: 4,
            type: "weeks",
            condition: 4,
            nextDay: null
          },
          headingText: trans("front.accounting.cancelation")
        }
      }]
    };
  },

  computed: {
    // timesWatcher() {
    //   return [
    //     this.mytimes[0].props.dates.nextDay,
    //     this.mytimes[1].props.dates.nextDay,
    //     this.mytimes[2].props.dates.nextDay,
    //     this.mytimes[3].props.dates.nextDay
    //   ];
    // },
    formData: function formData() {
      var _this = this;

      var toBeSendOrder = {
        formula: true,
        accounting: {
          key: 0,
          values: this.mytimes[0].props.dates
        },
        payment: {
          key: 1,
          values: this.mytimes[1].props.dates
        },
        test: {
          key: 2,
          values: this.mytimes[2].props.dates
        },
        cancelation: {
          key: 3,
          values: this.mytimes[3].props.dates
        }
      };

      return {
        url: "/api/tours/save/dates/" + this.$route.params.tourId,
        data: toBeSendOrder,
        validate: this.$validator,

        failedValidate: function failedValidate(data) {},
        successServer: function successServer(response) {
          _this.tour.calculations = response.body.calculations;
          _this.setTourCalculations();
        }
      };
    },
    validatedDates: function validatedDates() {
      if (!this.tour || !this.tour.calculations) {
        return false;
      }
      for (var field in this.fields) {
        if (this.fields[field]["valid"] === false) {
          return false;
        }
      }
      return true;
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {
    // "tour.tour_dates": {
    //   handler: function(newval) {
    //     this.changingDates = true;
    //     this.$nextTick(() => {
    //       this.changingDates = false;
    //     });
    //   },
    //   deep: true
    // }
    // timesWatcher: {
    //   handler: function(newval, oldval) {
    //     console.log(newval, oldval);
    //     if (oldval[0] && oldval[0] !== null) {
    //       this.$nextTick(() => {
    //         var changed = this.timesWatcher.some((val, index) => {
    //           return val !== newval[index];
    //         });
    //         console.log(changed);
    //         this.saveTour();
    //       });
    //     }
    //   },
    //   deep: true
    // }
  },
  methods: {
    saveTour: function saveTour() {
      var _this2 = this;

      var types = ["days", "weeks", "months"];
      var isChanged = this.tour.calculations.some(function (calc) {
        return _this2.mytimes[calc.type].props.dates.every !== calc.every || _this2.mytimes[calc.type].props.dates.type !== types[calc.time] || _this2.mytimes[calc.type].props.dates.condition !== calc.period;
      });
      if (isChanged) {
        this.$vss.post(this.formData);
      }
    },
    setTourCalculations: function setTourCalculations() {
      var _this3 = this;

      if (this.tour && this.tour.calculations && this.tour.calculations.length === 4) {
        var types = ["days", "weeks", "months"];
        this.fromServer = true;
        this.tour.calculations.map(function (calc) {
          _this3.mytimes[calc.type].props.dates.every = calc.every;
          _this3.mytimes[calc.type].props.dates.type = types[calc.time];
          _this3.mytimes[calc.type].props.dates.condition = calc.period;
        });
        this.$nextTick(function () {
          _this3.fromServer = false;
        });
      }
    }
  },
  components: {
    "my-calendar": __webpack_require__(807),
    "time-detect": __webpack_require__(814)
  },
  created: function created() {
    this.setTourCalculations();
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ 807:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(808)
/* template */
var __vue_template__ = __webpack_require__(813)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/secondpage/calendar/kcalendar.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-727fd4ca", Component.options)
  } else {
    hotAPI.reload("data-v-727fd4ca", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 808:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__conditionObject__ = __webpack_require__(809);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      conditionObject: __WEBPACK_IMPORTED_MODULE_0__conditionObject__["a" /* default */],
      showDayDetails: false,
      currentMonth: window.moment(),
      weekDays: moment.weekdaysMin(true),
      calculatingAccounting: true,
      calculatingTests: false,
      calculatingCancelation: false,
      activatedDay: "",
      currentShownDay: false,
      lastTrip: "",
      lastInvionce: ""
    };
  },

  computed: {
    endDate: function endDate() {
      if (!this.tour || !this.tour.tour_dates || !this.tour.tour_dates.tour_finish_date) {
        return false;
      }
      var tourEndDate = window.moment(this.tour.tour_dates.tour_finish_date, "YYYY-MM-DD");
      if (!tourEndDate.isValid()) {
        return false;
      }
      this.lastTrip = "";
      return tourEndDate;
    },
    shownDetails: function shownDetails() {
      if (!this.currentShownDay) {
        return null;
      }
      return this.currentShownDay;
    },
    assumedPayments: function assumedPayments() {
      var accountingArray = [];

      if (this.calculatingAccounting) {
        return [];
      }
      if (this.paymentDates && this.paymentDates.nextDay && this.paymentDates.nextDay !== null) {
        var nextDay = window.moment(this.paymentDates.nextDay, "l");
        accountingArray.push(nextDay);
        while (accountingArray[accountingArray.length - 1].isBefore(window.moment(this.currentMonth, "l").add(2, "month"), "month")) {
          accountingArray.push(this.addPaymentDate(accountingArray[accountingArray.length - 1]));
        }
      }

      return accountingArray.map(function (date) {
        return date.format("l");
      });
    },
    accounting_dates: function accounting_dates() {
      var _this = this;

      this.calculatingAccounting = true;
      var accountingArray = [];

      if (this.accountingDates.nextDay && this.accountingDates.nextDay !== null) {
        var nextDay = window.moment(this.accountingDates.nextDay, "l");
        accountingArray.push(nextDay);
        while (accountingArray[accountingArray.length - 1].isBefore(window.moment(this.currentMonth, "l").add(2, "month"), "month")) {
          if (this.endDate && this.endDate.isValid() && accountingArray[accountingArray.length - 1].isAfter(this.endDate)) {
            break;
          }
          accountingArray.push(this.addAcountingDate(accountingArray[accountingArray.length - 1]));
        }
      }
      this.$nextTick(function () {
        _this.calculatingAccounting = false;
      });
      return accountingArray.map(function (date) {
        return date.format("l");
      });
    },
    mypaymentDates: function mypaymentDates() {
      var accounting_dates = this.accounting_dates.map(function (e) {
        return window.moment(e, "l");
      });

      var assumedDates = this.assumedPayments.filter(function (day) {
        var momentDay = window.moment(day, "l");
        if (accounting_dates.length !== 0 && accounting_dates[0].isSameOrBefore(momentDay)) {
          while (accounting_dates.length !== 0 && accounting_dates[0].isSameOrBefore(momentDay)) {
            accounting_dates.splice(0, 1);
          }
          return true;
        }
        return false;
      });
      return assumedDates;
    },
    weeks: function weeks() {
      //visit https://en.wikipedia.org/wiki/ISO_week_date#Last_week

      var startWeek = window.moment(this.currentMonth, "l").startOf("month").week();
      startWeek = startWeek >= 52 ? 0 : startWeek;
      var endWeek = window.moment(this.currentMonth, "l").endOf("month").week();
      endWeek = endWeek > startWeek ? endWeek : 53;
      var nextWeeks = [];
      for (var i = startWeek; i <= endWeek; i += 1) {
        nextWeeks.push(i);
      }

      return nextWeeks;
    },
    tourDates: function tourDates() {
      var days = ["Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"];
      var mydays = [];
      if (!this.tour || !this.tour.tour_dates) {
        return mydays;
      } else {
        var tourDays = this.tour.tour_dates.days;
        if (typeof tourDays === "string") {
          tourDays = JSON.parse(tourDays);
        }
        tourDays.forEach(function (day) {
          mydays.push(days.indexOf(day));
        });
      }
      this.lastTrip = '';
      return mydays;
    }
  },
  props: {
    tour: {
      required: true,
      type: Object
    },
    accountingDates: {
      required: true
    },
    paymentDates: {
      required: true
    },
    currentMonthTour: {
      required: true
    },
    testDates: {
      required: true
    },
    cancelationDates: {
      required: true
    }
  },
  watch: {
    paymentDates: {
      handler: function handler(newval) {
        var _this2 = this;

        this.calculatingAccounting = true;
        this.$nextTick(function () {
          _this2.calculatingAccounting = false;
        });
      },
      deep: true
    },
    testDates: {
      handler: function handler(newval) {
        var _this3 = this;

        this.calculatingTests = true;
        this.$nextTick(function () {
          _this3.calculatingTests = false;
        });
      },
      deep: true
    },
    cancelationDates: {
      handler: function handler(newval) {
        var _this4 = this;

        this.calculatingCancelation = true;
        this.$nextTick(function () {
          _this4.calculatingCancelation = false;
        });
      },
      deep: true
    }
  },
  methods: {
    getClassDay: function getClassDay(weekDay, weekDayIndex, currentMonth) {
      return {
        active: this.activatedDay === "weekDay" + weekDay.format("l") && this.showDayDetails,
        "klink-day": true,
        disabled: weekDay.month() !== currentMonth.month(),
        tourDate: this.hasAtrip(weekDay, weekDayIndex),
        testDate: this.isTest(weekDay, weekDayIndex),
        endOfTest: this.isEndOfTest(weekDay, weekDayIndex),
        cancelationDate: this.isCancelation(weekDay, weekDayIndex)
      };
    },
    clickedDate: function clickedDate(e, weekDay, weekDayIndex, currentMonth) {
      var _this5 = this;

      // return false;
      this.showDayDetails = false;
      this.currentShownDay = Object.assign(this.getClassDay(weekDay, weekDayIndex, currentMonth), { currentDay: weekDay.format("l") });
      this.activatedDay = "weekDay" + weekDay.format("l");
      var rect = e.target;

      if (!$(e.target).hasClass("klink-day")) {
        if (!$(e.target).parents(".klink-day") || !$(e.target).parents(".klink-day")[0]) {
          return false;
        }
        rect = $(e.target).parents(".klink-day")[0];
      }

      var left = rect.offsetLeft - $("#calendar-show").width();
      if ($(rect).parents(".times-row-wrapper").length !== 0) {
        left = rect.offsetWidth + rect.offsetLeft + 30;
      }
      $("#calendar-show").css({
        left: left - 15,
        top: 0,
        bottom: 0
      });

      this.$nextTick(function () {
        _this5.showDayDetails = true;
        setTimeout(function () {
          var expectedScroll = $("#calendar-show").offset().top;
          $("html, body").animate({
            scrollTop: expectedScroll > 15 ? expectedScroll - 15 : expectedScroll
          }, 600);
        }, 300);
      });
    },
    hasPayment: function hasPayment(weekDay, weekDayIndex) {
      var paymentIndex = this.mypaymentDates.indexOf(weekDay.format("l"));
      if (this.endDate && window.moment(weekDay, "l").isAfter(this.endDate) && paymentIndex !== -1 && paymentIndex !== 0) {

        return true;
      }
      if (this.accountingDates.type === "days" && this.paymentDates.type === "days") {
        return this.hasAtrip(weekDay, weekDayIndex) && this.mypaymentDates.indexOf(weekDay.format("l")) !== -1;
      }
      return this.mypaymentDates.indexOf(weekDay.format("l")) !== -1;
    },
    hasInvionce: function hasInvionce(weekDay, weekDayIndex) {
      // console.log(weekDay.format('l'))

      if (this.calculatingAccounting) {
        return false;
      }
      var inVionceIndex = this.accounting_dates.indexOf(weekDay.format("l"));
      if (this.endDate && this.endDate.isValid() && inVionceIndex !== -1 && inVionceIndex !== 0 && weekDay.isAfter(this.endDate)) {

        if (this.lastTrip.isAfter(window.moment(this.accounting_dates[inVionceIndex - 1], "l"))) {
          return true;
        } else {
          return false;
        }
      }
      if (this.accountingDates.type === "days") {
        var hasAnInvince = this.hasAtrip(weekDay, weekDayIndex) && inVionceIndex !== -1;

        return hasAnInvince;
      }
      var hasAnInvince = inVionceIndex !== -1;

      return hasAnInvince;
    },
    addAcountingDate: function addAcountingDate(lastOne) {
      var expectedDate = window.moment(lastOne, "l").add(this.accountingDates.every + 1, this.accountingDates.type);

      expectedDate = this.conditionObject[this.accountingDates["condition"]].every(expectedDate);

      this.lastInvionce = expectedDate;
      return expectedDate;
    },
    addPaymentDate: function addPaymentDate(lastOne) {
      var addition = this.paymentDates.every;
      if (!addition || addition < 1) {
        addition = 1;
      }
      var expectedDate = window.moment(lastOne, "l").add(addition, this.paymentDates.type);
      expectedDate = this.conditionObject[this.paymentDates["condition"]].every(expectedDate);
      return expectedDate;
    },
    getWeekDays: function getWeekDays(week) {
      var _this6 = this;

      return Array(7).fill(0).map(function (day, index) {
        return moment(_this6.currentMonth, "l").week(week).startOf("week").clone().add(day + index, "day");
      });
    },
    hasAtrip: function hasAtrip(weekDay, weekDayIndex) {
      var fromDom = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

      if (this.endDate && this.endDate.isValid() && weekDay.isAfter(this.endDate)) {
        return false;
      }
      var hasAtrip = this.tourDates.indexOf(weekDayIndex) !== -1 && window.moment(weekDay, "l").isAfter(window.moment(this.tour.tour_dates.tour_start_date), "date");
      if (!this.lastTrip) {
        this.lastTrip = weekDay;
      }
      if (hasAtrip && this.lastTrip.isBefore(weekDay)) {
        this.lastTrip = weekDay;
      }
      return hasAtrip;
    },
    isTest: function isTest(weekDay, weekDayIndex) {
      if (this.endDate && this.endDate.isValid() && weekDay.isAfter(this.endDate)) {
        return false;
      }
      if (this.calculatingTests) {
        return false;
      }
      if (this.hasAtrip(weekDay, weekDayIndex)) {
        return window.moment(this.testDates.nextDay, "l").isSameOrAfter(window.moment(weekDay, "l"));
      }
      return false;
    },
    isEndOfTest: function isEndOfTest(weekDay, weekDayIndex) {
      // if (
      //   this.calculatingCancelation ||
      //   window
      //     .moment(weekDay, "l")
      //     .isAfter(window.moment(this.cancelationDates.nextDay, "l"))
      // ) {
      //   return false;
      // }
      return window.moment(weekDay, "l").isSame(window.moment(this.testDates.nextDay, "l"), "day") && !this.calculatingTests;
    },
    isCancelation: function isCancelation(weekDay, weekDayIndex) {
      return window.moment(weekDay, "l").isSame(window.moment(this.cancelationDates.nextDay, "l"), "day") && !this.calculatingCancelation;
    },
    ChangeCurrent: function ChangeCurrent(index) {
      this.currentMonth = window.moment(this.currentMonth, "l").add(index, "month");
    }
  },
  components: {
    "calendar-show": __webpack_require__(810)
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 809:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony default export */ __webpack_exports__["a"] = ([{
    options: {
        text: window.trans('front.accounting.sameDay'),
        value: 0
    },
    every: function every(dayBeforeCondition) {
        return window.moment(dayBeforeCondition, "l");
    }
}, {
    options: {
        text: window.trans('front.accounting.startOfWeek'),
        value: 1
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').startOf('week');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'week');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.endOfWeek'),
        value: 2
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').endOf('week');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'week');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.startOfMonth'),
        value: 3
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').startOf('month');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'month');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.endOfMonth'),
        value: 4
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').endOf('month');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'month');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.halfOfMonth'),
        value: 5
    },
    every: function every(dayBeforeCondition) {
        var expected = window.moment(dayBeforeCondition, "l").set({
            date: 15
        });
        if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
            return window.moment(expected).endOf("month");
        }
        return expected;
    }
}, {
    options: {
        text: window.trans('front.accounting.endOfQuarter'),
        value: 6
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').endOf('quarter');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'quarter');
        }
        return nextDay;
    }
}, {
    options: {
        text: window.trans('front.accounting.halfYear'),
        value: 7
    },
    every: function every(dayBeforeCondition) {
        var expected = window.moment(dayBeforeCondition, "l").endOf("year").subtract(0.5, "year");
        if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
            return window.moment(expected).endOf("year");
        }
        return expected;
    }
}, {
    options: {
        text: window.trans('front.accounting.endOfYear'),
        value: 8
    },
    every: function every(dayBeforeCondition) {
        var nextDay = window.moment(dayBeforeCondition, 'l').endOf('year');
        if (nextDay.isBefore(window.moment(dayBeforeCondition, 'l'))) {
            return window.moment(nextDay, 'l').add(1, 'year');
        }
        return nextDay;
    }
}]);

/***/ }),

/***/ 810:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(811)
/* template */
var __vue_template__ = __webpack_require__(812)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/secondpage/calendar/calenarShow.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2eb6c334", Component.options)
  } else {
    hotAPI.reload("data-v-2eb6c334", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 811:
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

  computed: {},
  props: {
    currentDay: {
      required: false,
      default: ""
    },
    active: {
      required: false,
      default: false
    },
    disabled: {
      required: false,
      default: false
    },
    tourDate: {
      required: false,
      default: false
    },
    testDate: {
      required: false,
      default: false
    },
    endOfTest: {
      required: false,
      default: false
    },
    cancelationDate: {
      required: false,
      default: false
    }
  },
  watch: {},
  methods: {
    closeCalendarObject: function closeCalendarObject() {
      this.$parent.showDayDetails = false;
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {
    var _this = this;

    $(window).click(function (e) {
      if (_this.$parent.showDayDetails) {
        var isHere = $(e.target).parents("#calendar-show").length === 1 || e.target.id && e.target.id === "calendar-show";
        if (!isHere) {
          _this.closeCalendarObject();
        }
      }
    });
  }
});

/***/ }),

/***/ 812:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "klink-calendar-object", attrs: { id: "calendar-show" } },
    [
      _c("h3", { staticClass: "heading" }, [
        _c("img", {
          attrs: {
            src: "/images/calendar-with-spring-binder-and-date-blocks.svg"
          }
        }),
        _vm._v(" "),
        _c("img", {
          staticClass: "close",
          attrs: {
            src: "/images/close.svg",
            "data-toggle": "tooltip",
            title: _vm.trans("front.accounting.close")
          },
          on: { click: _vm.closeCalendarObject }
        }),
        _vm._v(" "),
        _c("span", [_vm._v(_vm._s(_vm.currentDay))])
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-2eb6c334", module.exports)
  }
}

/***/ }),

/***/ 813:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "order-info-form" }, [
    _c(
      "div",
      { staticClass: "klink-calendar-body" },
      [
        _c("div", { staticClass: "klink-calendar-head" }, [
          _c("img", {
            staticClass: "prev",
            attrs: {
              src: "/images/chevron-arrow-up.svg",
              "data-toggle": "tooltip",
              alt: "prev"
            },
            on: {
              click: function($event) {
                return _vm.ChangeCurrent(-1)
              }
            }
          }),
          _vm._v(" "),
          _c("span", [_vm._v(_vm._s(_vm.currentMonth.format("MMMM-YYYY")))]),
          _vm._v(" "),
          _c("img", {
            staticClass: "next",
            attrs: {
              src: "/images/chevron-arrow-up.svg",
              "data-toggle": "tooltip",
              alt: "next"
            },
            on: {
              click: function($event) {
                return _vm.ChangeCurrent(1)
              }
            }
          })
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "klink-week header" },
          _vm._l(_vm.weekDays, function(myDay) {
            return _c(
              "div",
              { key: "head-day" + myDay, staticClass: "klink-day" },
              [_vm._v(_vm._s(myDay))]
            )
          }),
          0
        ),
        _vm._v(" "),
        _vm._l(_vm.weeks, function(week) {
          return _c(
            "div",
            { key: "calendar-week-" + week, staticClass: "klink-week" },
            _vm._l(_vm.getWeekDays(week), function(weekDay, weekDayIndex) {
              return _c(
                "div",
                {
                  key: "weekDay" + weekDay,
                  class: _vm.getClassDay(
                    weekDay,
                    weekDayIndex,
                    _vm.currentMonth
                  ),
                  on: {
                    click: function($event) {
                      var i = arguments.length,
                        argsArray = Array(i)
                      while (i--) argsArray[i] = arguments[i]
                      return _vm.clickedDate.apply(
                        void 0,
                        argsArray.concat(
                          [weekDay],
                          [weekDayIndex],
                          [_vm.currentMonth]
                        )
                      )
                    }
                  }
                },
                [
                  _c("span", [_vm._v(_vm._s(weekDay.date()))]),
                  _vm._v(" "),
                  _c("div", { staticClass: "day-image top" }, [
                    _c("img", {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.hasAtrip(weekDay, weekDayIndex, true),
                          expression: "hasAtrip(weekDay,weekDayIndex,true)"
                        }
                      ],
                      attrs: {
                        src: "/images/delivery-truck.svg",
                        alt: "has trip",
                        "data-toggle": "tooltip",
                        title: _vm.isTest(weekDay, weekDayIndex)
                          ? _vm.trans("front.accounting.tripHereWithTest")
                          : _vm.trans("front.accounting.tripHere")
                      }
                    }),
                    _vm._v(" "),
                    _c("img", {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.hasInvionce(weekDay, weekDayIndex),
                          expression: "hasInvionce(weekDay,weekDayIndex)"
                        }
                      ],
                      attrs: {
                        src: "/images/invoice.svg",
                        alt: "has bill",
                        "data-toggle": "tooltip",
                        title: _vm.trans("front.accounting.invoiceHere")
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "day-image bottom" }, [
                    _c("img", {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.hasPayment(weekDay, weekDayIndex),
                          expression: "hasPayment(weekDay,weekDayIndex)"
                        }
                      ],
                      attrs: {
                        src: "/images/EuroCoin.svg",
                        alt: "has bill",
                        "data-toggle": "tooltip",
                        title: _vm.trans("front.accounting.invoiceHere")
                      }
                    })
                  ])
                ]
              )
            }),
            0
          )
        }),
        _vm._v(" "),
        _c(
          "transition",
          {
            attrs: {
              name: "zoom",
              "enter-active-class": "animated zoomIn",
              "leave-active-class": "animated zoomOut"
            }
          },
          [
            _c(
              "calendar-show",
              _vm._b(
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.showDayDetails,
                      expression: "showDayDetails"
                    }
                  ]
                },
                "calendar-show",
                _vm.shownDetails,
                false
              )
            )
          ],
          1
        )
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-727fd4ca", module.exports)
  }
}

/***/ }),

/***/ 814:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(815)
/* template */
var __vue_template__ = __webpack_require__(822)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/timeDetecting.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-9d77cf22", Component.options)
  } else {
    hotAPI.reload("data-v-9d77cf22", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 815:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__conditionObject_js__ = __webpack_require__(665);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      conditionObject: __WEBPACK_IMPORTED_MODULE_0__conditionObject_js__["a" /* default */],
      maxText: "",
      isShown: false,
      inputs: [{
        props: {
          name: "sender" + trans("front.create.time"),
          placeholder: trans("front.create.chargingTime"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "sendertime",
          type: "timePicker",
          minDate: window.moment(new Date().setMinutes(0)).add("2", "hours"),
          dateOnly: true,
          newclasses: {
            "same-line": true,
            "every-small": true
          }
        },
        model: "startDate"
      }, {
        props: {
          name: "every",
          placeholder: "every",
          validate: "required|decimal:3",
          id: "every",
          newclasses: {
            "same-line": true,
            "every-small": true
          },

          autoFocus: true
        },
        model: "every"
      }, {
        props: {
          name: "period",
          placeholder: trans("front.accounting.period"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "receiverisCompany",
          newclasses: {
            "same-line": true
          },
          type: "select",
          options: [{
            value: "days",
            text: "day"
          }, {
            value: "weeks",
            text: "week"
          }, {
            value: "months",
            text: "month"
          }]
        },
        model: "type"
      }]
    };
  },

  computed: {
    maxDate: function maxDate() {},
    activeInputs: function activeInputs() {
      return this.isShown && this.$parent.activeIndex === this.index;
    },
    ShowError: function ShowError() {
      var _this = this;

      if (this.errors.has("every" + this.headingText)) {
        var error = this.errors.items.filter(function (myerror) {
          return myerror.field === "every" + _this.headingText;
        });
        if (error.length < 1) {
          return "";
        }
        error = error[0];
        if (error.rule === "min_value") {
          return "min_every";
        } else if (error.rule === "max_value") {
          return "max_every";
        } else {
          return "true";
        }
      }
      return "";
    },
    myinputs: function myinputs() {
      var _this2 = this;

      var inputs = this.inputs.filter(function (input) {
        return _this2.options.inputs.indexOf(input.model) !== -1;
      });
      inputs = inputs.map(function (input) {
        input.props.name = input.props.name + _this2.headingText.replace(" ", "");
        input.props.id = input.props.id + _this2.headingText.replace(" ", "");

        return input;
      });
      return inputs;
    },
    nextDay: function nextDay() {
      var nextDay = window.moment(this.conditionObject[this.dates.condition]["every"](this.dayBeforeCondition));
      this.dates.nextDay = nextDay.format("l");
      return nextDay;
    },
    dayBeforeCondition: function dayBeforeCondition() {
      var startDate = window.moment(this.dates.startDate, "l");

      return window.moment(startDate).add(this.dates.every, this.dates.type);
    },
    condition: function condition() {
      var input = {
        model: "condition",
        props: {
          name: "receiver" + trans("front.create.isCompany"),
          placeholder: trans("front.create.isCompany"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "receiverisCompany",
          options: this.getOptions(),
          newclasses: {
            "same-line": true
          },
          type: "select"
        }
      };

      return input;
    }
  },
  props: {
    tour: {
      required: true
    },
    type: {
      required: false,
      default: "law"
    },
    dates: {
      required: false,
      default: function _default() {
        return {
          startDate: window.moment(new Date().setMinutes(0)),
          every: 0,
          type: "months",
          condition: 3
        };
      }
    },
    options: {
      required: false,
      default: function _default() {
        return {
          inputs: ["startDate", "every", "type"],
          conditions: [0, 1, 2, 3, 4, 5, 6]
        };
      }
    },
    headingText: {
      required: true,
      default: "Abrechnungszeitraum"
    },
    currentMonth: {
      required: true
    },
    index: {
      required: true
    }
  },
  watch: {},
  methods: {
    activateIndex: function activateIndex() {
      this.isShown = true;
      this.$parent.activeIndex = this.index;
    },
    close: function close() {
      this.isShown = false;
      this.$parent.saveTour();
    },
    maxChanges: function maxChanges(newduration) {
      this.maxText = window.moment.duration(Number(newduration), this.dates.type).humanize();
    },
    getOptions: function getOptions() {
      var _this3 = this;

      var options = [{
        text: "same day",
        value: 0
      }, {
        text: "end of week",
        value: 1
      }, {
        text: "too 15 of the month, or end of the month",
        value: 2
      }, {
        text: "end of  month",
        value: 3
      }, {
        text: "end of quarter",
        value: 4
      }, {
        text: "half year",
        value: 5
      }, {
        text: "end of year",
        value: 6
      }];
      var myoptions = options.filter(function (e) {
        return _this3.options.conditions.indexOf(e.value) !== -1;
      });
      return myoptions;
    }
  },
  components: {
    "time-every": __webpack_require__(816),
    "time-law": __webpack_require__(819)
  },
  created: function created() {
    this.inputs[0].props.minDate = window.moment(this.tour.tour_dates.tour_start_date);
    var days = this.tour.tour_dates.days;
    if (typeof days === "string") {
      days = JSON.parse(days);
    }
    this.dates.startDate = window.moment(this.tour.tour_dates.tour_start_date).day(days);
  },
  mounted: function mounted() {
    var _this4 = this;

    $(window).click(function (e) {
      if (_this4.activeInputs) {
        if ($(e.target).parents("#timeDetectingParent" + _this4.index).length === 0 && e.target.id !== "timeDetectingParent") {
          _this4.close();
        }
      }
    });
  },

  inject: {
    $validator: "$validator"
  }
});

/***/ }),

/***/ 816:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(817)
/* template */
var __vue_template__ = __webpack_require__(818)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/time/every.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-82046e68", Component.options)
  } else {
    hotAPI.reload("data-v-82046e68", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 817:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__conditionObject_js__ = __webpack_require__(665);
//
//
//
//
//
//
//
//
//
//
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
      conditionObject: __WEBPACK_IMPORTED_MODULE_0__conditionObject_js__["a" /* default */]
    };
  },

  computed: {
    myinputs: function myinputs() {
      var _this = this;

      return this.inputs.map(function (input) {
        if (input.model === "every") {
          input.props.validate = "required|numeric|min_value:0|max_value:" + _this.getMaxValue(_this.dates.type);
        }
        return input;
      });
    },
    condition: function condition() {
      var _this2 = this;

      var input = {
        model: "condition",
        props: {
          name: "select" + this.$parent.headingText,
          placeholder: trans("front.create.isCompany"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "receiverisCompany",
          newclasses: {
            "large-input": true
          },
          type: "select"
        }
      };
      if (this.dates.type === "days") {
        input.props.options = this.getCondtions([0]);
      }
      if (this.dates.type === "weeks") {
        input.props.options = this.getCondtions([1, 2]);
      }
      if (this.dates.type === "months") {
        input.props.options = this.getCondtions([3, 5, 4]);
      }
      var FoundOption = input.props.options.some(function (option) {
        return option.value === _this2.dates.condition;
      });

      if (!FoundOption) {
        this.dates.condition = input.props.options[0].value;
      }
      return input;
    }
  },
  watch: {},
  methods: {
    getMaxValue: function getMaxValue(type) {
      var maxes = this.maxes;
      this.maxChanges(maxes[type]);
      return maxes[type];
    },
    getCondtions: function getCondtions() {
      var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [0];

      var conditionOptions = this.conditionObject.filter(function (e, index) {
        return options.indexOf(index) !== -1;
      });
      var conditions = conditionOptions.map(function (e) {
        return e.options;
      });
      return conditions;
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {},

  props: {
    inputs: {
      required: true,
      type: Array
    },
    currentMonth: {
      required: true
    },
    dates: {
      required: true,
      type: Object
    },
    maxes: {
      required: false,
      default: function _default() {
        return {
          days: window.moment.duration(60, "days").as("days").toFixed(),
          weeks: window.moment.duration(60, "days").as("weeks").toFixed(),
          months: window.moment.duration(60, "days").as("months").toFixed()
        };
      }
    },
    maxChanges: {
      required: false,
      type: Function,
      default: function _default(anything) {
        return null;
      }
    },
    headingText: {
      required: true
    }
  },
  inject: {
    $validator: "$validator"
  }
});

/***/ }),

/***/ 818:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "stops-inputs-head-main" }, [
    _c("div", { staticClass: "operation-div" }, [
      _c("img", {
        attrs: { src: "/images/close.svg", alt: "close" },
        on: { click: _vm.$parent.close }
      })
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "heading-text" }, [
      _vm._v(_vm._s(_vm.headingText))
    ]),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "inputs-wrapper" },
      [
        _vm._l(_vm.myinputs, function(input) {
          return _c(
            "input-parent",
            _vm._b(
              {
                key: input.model,
                model: {
                  value: _vm.dates[input.model],
                  callback: function($$v) {
                    _vm.$set(_vm.dates, input.model, $$v)
                  },
                  expression: "dates[input.model]"
                }
              },
              "input-parent",
              input.props,
              false
            )
          )
        }),
        _vm._v(" "),
        _c(
          "input-parent",
          _vm._b(
            {
              model: {
                value: _vm.dates[_vm.condition.model],
                callback: function($$v) {
                  _vm.$set(_vm.dates, _vm.condition.model, $$v)
                },
                expression: "dates[condition.model]"
              }
            },
            "input-parent",
            _vm.condition.props,
            false
          )
        )
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-82046e68", module.exports)
  }
}

/***/ }),

/***/ 819:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(820)
/* template */
var __vue_template__ = __webpack_require__(821)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/time/law.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-29b3ae13", Component.options)
  } else {
    hotAPI.reload("data-v-29b3ae13", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 820:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__conditionObject_js__ = __webpack_require__(665);
//
//
//
//
//
//
//
//
//
//
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
      conditionObject: __WEBPACK_IMPORTED_MODULE_0__conditionObject_js__["a" /* default */]
    };
  },

  computed: {
    minDate: function minDate() {
      return window.moment.duration(this.mins.days, "days").humanize();
    },
    myinputs: function myinputs() {
      var _this = this;

      return this.inputs.map(function (input) {
        if (input.model === "every") {
          input.props.validate = "required|numeric|min_value:" + _this.getMinValue(_this.dates.type) + "|max_value:" + _this.getMaxValue(_this.dates.type);
        }
        return input;
      });
    },
    condition: function condition() {
      var _this2 = this;

      var input = {
        model: "condition",
        props: {
          name: "select" + this.$parent.headingText,
          placeholder: trans("front.create.isCompany"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "receiverisCompany",
          newclasses: {
            "large-input": true
          },
          type: "select"
        }
      };
      input.props.options = this.getCondtions();
      var FoundOption = input.props.options.some(function (option) {
        return option.value === _this2.dates.condition;
      });
      if (!FoundOption) {
        this.dates.condition = input.props.options[0].value;
      }

      return input;
    }
  },
  watch: {},
  methods: {
    getMaxValue: function getMaxValue(type) {
      var maxes = this.maxes;
      this.maxChanges(maxes[type]);
      return maxes[type];
    },
    getMinValue: function getMinValue(type) {
      return this.mins[type];
    },
    getCondtions: function getCondtions() {
      var conditionOptions = this.conditionObject;
      var conditions = conditionOptions.map(function (e) {
        return e.options;
      });
      return conditions;
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {},

  props: {
    headingText: {
      required: true
    },
    inputs: {
      required: true,
      type: Array
    },
    currentMonth: {
      required: true
    },
    dates: {
      required: true,
      type: Object
    },
    maxes: {
      required: false,
      type: Object,
      default: function _default() {
        return {
          days: window.moment.duration(10, "years").as("days").toFixed(),
          weeks: window.moment.duration(10, "years").as("weeks").toFixed(),
          months: window.moment.duration(10, "years").as("months").toFixed()
        };
      }
    },
    mins: {
      required: false,
      type: Object,
      default: function _default() {
        return {
          days: window.moment.duration(3, "months").as("days").toFixed(),
          weeks: window.moment.duration(3, "months").as("weeks").toFixed(),
          months: window.moment.duration(3, "months").as("months").toFixed()
        };
      }
    },
    maxChanges: {
      required: false,
      type: Function,
      default: function _default(anything) {
        return null;
      }
    }
  },
  inject: {
    $validator: "$validator"
  }
});

/***/ }),

/***/ 821:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "stops-inputs-head-main" }, [
    _c("div", { staticClass: "operation-div" }, [
      _c("img", {
        attrs: { src: "/images/close.svg", alt: "close" },
        on: { click: _vm.$parent.close }
      })
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "heading-text" }, [
      _vm._v(_vm._s(_vm.headingText))
    ]),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "inputs-wrapper" },
      [
        _vm._l(_vm.myinputs, function(input) {
          return _c(
            "input-parent",
            _vm._b(
              {
                key: input.model,
                model: {
                  value: _vm.dates[input.model],
                  callback: function($$v) {
                    _vm.$set(_vm.dates, input.model, $$v)
                  },
                  expression: "dates[input.model]"
                }
              },
              "input-parent",
              input.props,
              false
            )
          )
        }),
        _vm._v(" "),
        _c(
          "input-parent",
          _vm._b(
            {
              model: {
                value: _vm.dates[_vm.condition.model],
                callback: function($$v) {
                  _vm.$set(_vm.dates, _vm.condition.model, $$v)
                },
                expression: "dates[condition.model]"
              }
            },
            "input-parent",
            _vm.condition.props,
            false
          )
        )
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-29b3ae13", module.exports)
  }
}

/***/ }),

/***/ 822:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      class: { "timing-row": true, active: _vm.activeInputs },
      attrs: { id: "timeDetectingParent" + _vm.index }
    },
    [
      _c("div", { class: { heading: true, active: _vm.activeInputs } }, [
        _c("div", { staticClass: "heading-text" }, [
          _vm._v(_vm._s(_vm.headingText))
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "heading-body" }, [
          _c(
            "span",
            { staticClass: "date-value", on: { click: _vm.activateIndex } },
            [_vm._v(_vm._s(_vm.nextDay.format("LL")))]
          ),
          _vm._v(" "),
          _vm.type === "every"
            ? _c(
                "span",
                {
                  attrs: {
                    "data-toggle": "tooltip",
                    title: _vm.trans("front.touroffers.soOnTitle")
                  }
                },
                [_vm._v(_vm._s(_vm.trans("front.touroffers.soOn")))]
              )
            : _vm._e()
        ])
      ]),
      _vm._v(" "),
      _vm.type === "every"
        ? _c(
            "transition",
            {
              attrs: {
                name: "zoom",
                "enter-active-class": "animated zoomIn",
                "leave-active-class": "animated zoomOut"
              }
            },
            [
              _c("time-every", {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: _vm.activeInputs,
                    expression: "activeInputs"
                  }
                ],
                attrs: {
                  currentMonth: _vm.currentMonth,
                  inputs: _vm.myinputs,
                  dates: _vm.dates,
                  maxes: _vm.options.maxes,
                  maxChanges: _vm.maxChanges,
                  headingText: _vm.headingText
                }
              })
            ],
            1
          )
        : _vm.type === "law"
        ? _c(
            "transition",
            {
              attrs: {
                name: "zoom",
                "enter-active-class": "animated zoomIn",
                "leave-active-class": "animated zoomOut"
              }
            },
            [
              _c("time-law", {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: _vm.activeInputs,
                    expression: "activeInputs"
                  }
                ],
                attrs: {
                  currentMonth: _vm.currentMonth,
                  inputs: _vm.myinputs,
                  dates: _vm.dates,
                  maxes: _vm.options.maxes,
                  mins: _vm.options.mins,
                  maxChanges: _vm.maxChanges,
                  headingText: _vm.headingText
                }
              })
            ],
            1
          )
        : _vm._e(),
      _vm._v(" "),
      _vm.ShowError === "min_every"
        ? _c("div", [
            _vm._v(
              _vm._s(
                _vm
                  .trans("front.accounting.min_date_validation")
                  .replace(":attribute", _vm.headingText)
              )
            )
          ])
        : _vm.ShowError === "max_every"
        ? _c("div", [
            _vm._v(
              _vm._s(
                _vm
                  .trans("front.accounting.max_date_validation")
                  .replace(":attribute", _vm.headingText)
                  .replace(":period", _vm.maxText)
              )
            )
          ])
        : _vm.ShowError === "true"
        ? _c("div", [
            _vm._v(_vm._s(_vm.errors.first("every" + _vm.headingText)))
          ])
        : _vm._e()
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
    require("vue-hot-reload-api")      .rerender("data-v-9d77cf22", module.exports)
  }
}

/***/ }),

/***/ 823:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "stops-row-vertical" }, [
    _c(
      "div",
      { staticClass: "stops-rows-wrapper times-row-wrapper" },
      [
        _vm.validatedDates && !_vm.changingDates
          ? _c("my-calendar", {
              attrs: {
                tour: _vm.tour,
                currentMonthTour: _vm.currentMonth,
                accountingDates: _vm.mytimes[0].props.dates,
                paymentDates: _vm.mytimes[1].props.dates,
                testDates: _vm.mytimes[2].props.dates,
                cancelationDates: _vm.mytimes[3].props.dates
              }
            })
          : _vm._e()
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "stops-rows-wrapper times-row-wrapper",
        staticStyle: { background: "#f5f6f7" }
      },
      [
        _c(
          "div",
          { staticClass: "times-rows" },
          _vm._l(_vm.mytimes, function(mytime, index) {
            return _c(
              "time-detect",
              _vm._b(
                {
                  key: "time-detecting" + index,
                  attrs: { tour: _vm.tour, currentMonth: _vm.currentMonth }
                },
                "time-detect",
                mytime.props,
                false
              )
            )
          }),
          1
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
    require("vue-hot-reload-api")      .rerender("data-v-40680aaa", module.exports)
  }
}

/***/ }),

/***/ 824:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(825)
/* template */
var __vue_template__ = __webpack_require__(835)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/kurierLogin.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-f9065cd0", Component.options)
  } else {
    hotAPI.reload("data-v-f9065cd0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 825:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      loginOrRegister: "register"
    };
  },

  computed: {
    notCompleted: function notCompleted() {
      if (this.tour.isAuth === 1 && this.tour.userId > 1) {
        return true;
      }
      return false;
    }
  },
  props: {
    tour: {
      required: true
    },
    acceptOffer: {
      required: true
    },
    acceptedOffer: {
      required: true
    }
  },
  watch: {
    "tour.isAuth": function tourIsAuth(newval, oldval) {
      var _this = this;

      if (newval === 1) {
        this.$nextTick(function () {
          if (_this.tour.userId > 0) {
            console.log(_this.tour.userId);
            window.Echo.private("App.User." + _this.tour.userId).listen(".emailAuthenticated", function (e) {
              if (e.authenticated_at) {
                _this.tour.isAuth = 2;
                _this.acceptOffer(_this.acceptedOffer);
              }
            });
          }
        });
      }
    },
    loginOrRegister: function loginOrRegister(newval) {
      if (newval === "register") {
        this.$nextTick(function () {
          $("#registerfirstName").focus();
        });
      }
    },

    "$parent.loginDisabled": function $parentLoginDisabled(newval) {
      if (newval === true && this.loginOrRegister === "register") {
        this.$nextTick(function () {
          $("#registerfirstName").focus();
        });
      }
    }
  },
  methods: {
    close: function close() {
      this.$parent.acceptedOffer = {};
    }
  },
  components: {
    "buissness-regsiter": __webpack_require__(826),
    "buissness-login": __webpack_require__(829),
    "kurier-validate": __webpack_require__(832)
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 826:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(827)
/* template */
var __vue_template__ = __webpack_require__(828)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/auth/buissnessRegister.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-66561288", Component.options)
  } else {
    hotAPI.reload("data-v-66561288", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 827:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      user: {
        first_name: "",
        nick_name: "",
        phone: "",
        email: "",
        password: ""
      },
      inputs: [{
        props: {
          name: "register" + trans("front.create.firstName"),
          placeholder: trans("front.create.firstName"),
          // img: '/images/food-scale-tool.svg',
          validate: "required|max:255",
          id: "registerfirstName",
          newclasses: {
            "half-width": true,
            odd: true
          },
          autoFocus: true
        },
        model: "first_name"
      }, {
        props: {
          name: "register" + trans("front.create.lastName"),
          placeholder: trans("front.create.lastName"),
          // img: '/images/food-scale-tool.svg',
          validate: "required|max:255",
          id: "registerlastName",
          newclasses: {
            "half-width": true
          }
        },
        model: "nick_name"
      }, {
        props: {
          name: "register" + trans("front.create.phone"),
          placeholder: trans("front.create.phone"),
          // img: '/images/food-scale-tool.svg',
          validate: "required|phone|max:255",
          id: "registerphone",
          newclasses: {}
        },
        model: "phone"
      }, {
        props: {
          name: "register" + trans("front.create.email"),
          placeholder: trans("front.create.email"),
          // img: '/images/food-scale-tool.svg',
          validate: "required|email|max:255",
          id: "registeremail"
        },
        model: "email"
      }, {
        props: {
          name: "register" + trans("front.touroffers.password"),
          placeholder: trans("front.touroffers.password"),
          // img: '/images/food-scale-tool.svg',
          validate: "required|min:6|max:255",
          id: "registerPassword",
          inputType: "password"
        },
        model: "password"
      }]
    };
  },

  computed: {
    validatedAndErros: function validatedAndErros() {
      if (this.errors && this.errors.items.length !== 0) {
        return false;
      }
      for (var field in this.fields) {
        if (this.fields[field]["valid"] === false) {
          return false;
        }
      }
      return true;
    },
    formData: function formData() {
      var _this = this;

      return {
        url: "/api/register/" + this.$route.params.tourId,
        data: this.user,
        validate: this.$validator,
        failedValidate: function failedValidate(data) {},
        failServer: function failServer(error) {
          if (error.body.errors) {
            for (var key in error.body.errors) {
              error.body.errors[key].forEach(function (element) {
                _this.$snotify.warning(element, key, {
                  timeOut: 3500
                });
              });
            }
          }
        },
        successServer: function successServer(response) {
          _this.tour.isAuth = response.body.isAuth;
          _this.tour.userId = response.body.userId;
          console.log(_this.tour.isAuth);
        }
      };
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    registerNewUser: function registerNewUser() {
      // console.log(this.errors);
      this.$vss.post(this.formData);
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 828:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "kurier-login-body-wrapper" },
    [
      _vm._l(_vm.inputs, function(input) {
        return _c(
          "input-parent",
          _vm._b(
            {
              key: "sender" + input.model,
              model: {
                value: _vm.user[input.model],
                callback: function($$v) {
                  _vm.$set(_vm.user, input.model, $$v)
                },
                expression: "user[input.model]"
              }
            },
            "input-parent",
            input.props,
            false
          )
        )
      }),
      _vm._v(" "),
      _c("div", { staticClass: "small-order-cell completeIt" }, [
        _c(
          "div",
          {
            staticClass: "letsComplete btn",
            staticStyle: { display: "flex", "align-items": "center" },
            on: { click: _vm.registerNewUser }
          },
          [
            _vm._v(
              "\n      " +
                _vm._s(_vm.trans("front.touroffers.register")) +
                "\n      "
            ),
            _c("img", {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.validatedAndErros,
                  expression: "validatedAndErros"
                }
              ],
              staticStyle: { "max-width": "20px", "max-height": "20px" },
              attrs: { src: "/images/loading.svg", alt: "" }
            })
          ]
        )
      ])
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-66561288", module.exports)
  }
}

/***/ }),

/***/ 829:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(830)
/* template */
var __vue_template__ = __webpack_require__(831)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/auth/login.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-a27b3996", Component.options)
  } else {
    hotAPI.reload("data-v-a27b3996", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 830:
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
  },

  computed: {},
  props: {},
  watch: {},
  methods: {},
  components: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 831:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "kurier-login-body-wrapper" }, [
    _vm._v("login")
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-a27b3996", module.exports)
  }
}

/***/ }),

/***/ 832:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(833)
/* template */
var __vue_template__ = __webpack_require__(834)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/auth/validation.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3e17e95d", Component.options)
  } else {
    hotAPI.reload("data-v-3e17e95d", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 833:
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
    return {
      checkcing: false,
      sending: false
    };
  },

  computed: {},
  props: {
    tour: {
      requried: true
    }
  },
  watch: {},
  methods: {
    resend: function resend() {
      var _this = this;

      if (this.sending === true) {
        return false;
      }
      this.sending = true;
      var formData = {
        url: "/api/resend/" + this.$route.params.tourId,
        successServer: function successServer(response) {
          _this.sending = false;
        },
        failServer: function failServer(error) {
          _this.sending = false;
        }
      };
      this.$vss.post(formData);
    },
    checkFormValiation: function checkFormValiation() {
      var _this2 = this;

      if (this.checkcing) {
        return false;
      }
      this.checkcing = true;
      this.$http.get("/api/tours/tour/" + this.$route.params.tourId).then(function (response) {
        if (response.body.isAuth <= 1) {
          _this2.$snotify.warning(_this2.trans("front.touroffers.noValidationBody"), _this2.trans("front.touroffers.noValidationTitle"), {
            timeOut: 3500
          });
        } else {
          _this2.tour.isAuth = response.body.isAuth;
          _this2.tour.userId = response.body.userId;
        }
        setTimeout(function () {
          _this2.checkcing = false;
        }, 3500);
      }, function (error) {
        setTimeout(function () {
          _this2.checkcing = false;
        }, 3500);
      });
    }
  },
  components: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 834:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "kurier-authentication-wrapper" }, [
    _c("div", { staticClass: "kurier-auth-message" }, [
      _c("img", {
        attrs: {
          src: "/images/email.svg",
          alt: "email",
          title: _vm.trans("front.touroffers.pleaseVerify"),
          "data-toggle": "tooltip"
        }
      }),
      _vm._v(" "),
      _c("p", { staticStyle: { "font-weight": "bold" } }, [
        _vm._v(_vm._s(_vm.trans("front.touroffers.pleaseVerify")))
      ]),
      _vm._v(" "),
      _c("p", [_vm._v(_vm._s(_vm.trans("front.touroffers.verifyMessage")))]),
      _vm._v(" "),
      _c("div", { staticClass: "buttons-wrapper" }, [
        _c(
          "div",
          {
            staticClass: "kurier-auth-btn",
            attrs: {
              "data-toggle": "tooltip",
              title: _vm.trans("front.touroffers.resend")
            },
            on: { click: _vm.resend }
          },
          [
            _c("img", {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: !_vm.sending,
                  expression: "!sending"
                }
              ],
              attrs: { src: "/images/email-resend.svg", alt: "" }
            }),
            _vm._v(" "),
            _c("img", {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.sending,
                  expression: "sending"
                }
              ],
              attrs: { src: "/images/ajax-loader.svg", alt: "" }
            }),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(_vm.trans("front.touroffers.resend")))])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "kurier-auth-btn",
            attrs: {
              disabled: _vm.checkcing,
              "data-toggle": "tooltip",
              title: _vm.trans("front.touroffers.activated")
            },
            on: { click: _vm.checkFormValiation }
          },
          [
            _c("img", { attrs: { src: "/images/email.svg", alt: "" } }),
            _vm._v(" "),
            _c("span", [
              _vm._v(_vm._s(_vm.trans("front.touroffers.activated")))
            ])
          ]
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
    require("vue-hot-reload-api")      .rerender("data-v-3e17e95d", module.exports)
  }
}

/***/ }),

/***/ 835:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "kurier-login" },
    [
      _c("div", { staticClass: "operations" }, [
        _c("img", {
          attrs: {
            "data-toggle": "tooltip",
            title: _vm.trans("front.touroffers.close"),
            src: "/images/close.svg",
            alt: "close"
          },
          on: { click: _vm.close }
        })
      ]),
      _vm._v(" "),
      _c("transition", { attrs: { name: "fade" } }, [
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: !_vm.notCompleted,
                expression: "!notCompleted"
              }
            ],
            staticClass: "kurier-login-menu"
          },
          [
            _c(
              "div",
              {
                class: {
                  "kurier-login-item": true,
                  active: _vm.loginOrRegister === "login"
                },
                on: {
                  click: function($event) {
                    _vm.loginOrRegister = "login"
                  }
                }
              },
              [_vm._v(_vm._s(_vm.trans("front.touroffers.login")))]
            ),
            _vm._v(" "),
            _c(
              "div",
              {
                class: {
                  "kurier-login-item": true,
                  active: _vm.loginOrRegister === "register"
                },
                on: {
                  click: function($event) {
                    _vm.loginOrRegister = "register"
                  }
                }
              },
              [_vm._v(_vm._s(_vm.trans("front.touroffers.register")))]
            )
          ]
        )
      ]),
      _vm._v(" "),
      _c("transition", { attrs: { name: "fade" } }, [
        !_vm.notCompleted
          ? _c(
              "div",
              { staticClass: "kurier-login-body" },
              [
                _c(
                  "transition",
                  {
                    attrs: {
                      name: "zoomSpecial",
                      "enter-active-class": "animated zoomIn absolute",
                      "leave-active-class": "animated zoomOut absolute"
                    }
                  },
                  [
                    _c("buissness-regsiter", {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.loginOrRegister === "register",
                          expression: "loginOrRegister==='register'"
                        }
                      ],
                      attrs: { tour: _vm.tour }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "transition",
                  {
                    attrs: {
                      name: "zoomSpecial",
                      "enter-active-class": "animated zoomIn absolute",
                      "leave-active-class": "animated zoomOut absolute"
                    }
                  },
                  [
                    _c("buissness-login", {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: _vm.loginOrRegister === "login",
                          expression: "loginOrRegister==='login'"
                        }
                      ],
                      attrs: { tour: _vm.tour }
                    })
                  ],
                  1
                )
              ],
              1
            )
          : _vm._e()
      ]),
      _vm._v(" "),
      _c(
        "transition",
        { attrs: { name: "fade" } },
        [
          _vm.notCompleted
            ? _c("kurier-validate", { attrs: { tour: _vm.tour } })
            : _vm._e()
        ],
        1
      )
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
    require("vue-hot-reload-api")      .rerender("data-v-f9065cd0", module.exports)
  }
}

/***/ }),

/***/ 836:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(837)
/* template */
var __vue_template__ = __webpack_require__(841)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/kurierAcceptTerms.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-40bad34e", Component.options)
  } else {
    hotAPI.reload("data-v-40bad34e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 837:
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

  computed: {},
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    dataURItoBlob: function dataURItoBlob(dataURI) {
      // convert base64/URLEncoded data component to raw binary data held in a string
      var byteString;
      if (dataURI.split(",")[0].indexOf("base64") >= 0) byteString = atob(dataURI.split(",")[1]);else byteString = unescape(dataURI.split(",")[1]);

      // separate out the mime component
      var mimeString = dataURI.split(",")[0].split(":")[1].split(";")[0];

      // write the bytes of the string to a typed array
      var ia = new Uint8Array(byteString.length);
      for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
      }

      return new Blob([ia], { type: mimeString });
    },
    acceptTerms: function acceptTerms(svg) {
      var _this = this;

      svg = this.dataURItoBlob(svg);
      var myData = new FormData();
      myData.append("avatars[]", svg, "signature.svg");

      console.log(myData);
      var formData = {
        url: "/api/tours/accept/terms/" + this.$route.params.tourId,
        data: myData,
        successServer: function successServer(response) {
          _this.tour.tour_details = response.body.tour_details;
          $("#termsModal").modal("hide");
        }
      };
      this.$vss.post(formData);
    },
    showTerms: function showTerms() {
      $("#termsModal").modal("show");
    }
  },
  components: {
    "kurier-terms": __webpack_require__(838)
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ 838:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(839)
/* template */
var __vue_template__ = __webpack_require__(840)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/auth/termsModal.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4934ffca", Component.options)
  } else {
    hotAPI.reload("data-v-4934ffca", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 839:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      accept: [],
      currentIndex: 0,
      currentReadingTime: 0,
      term: "",
      sigOptions: {
        penColor: "rgb(0, 0, 0)",
        backgroundColor: "rgb(255,255,255)"
      }
    };
  },

  computed: {
    readingTime: function readingTime() {
      var text = this.terms.join("");
      var wordsPerMinute = 550;
      var noOfWords = text.split(/\s/g).length;
      var minutes = noOfWords / wordsPerMinute;
      var readTime = Math.ceil(minutes);
      this.currentReadingTime = readTime * 60;
      return readTime * 60;
    },
    tourTerms: function tourTerms() {
      if (!this.tour || !this.tour.terms) {
        return "";
      }
      window.terms = this.tour.terms.layout;
      // console.log(this.tour.terms.layout.split("Anlage"));
      return this.tour.terms.layout.split("Anlage");
    },
    terms: function terms() {
      var temporal = [];
      var originalterms = this.trans("front.termsAndContidion");
      var counter = 0;
      var termsArray = [];
      for (var term in originalterms) {
        if (termsArray.length === 6) {
          temporal.push(termsArray);
          termsArray = [];
        }

        termsArray.push(originalterms[term]);
      }
      if (termsArray.length !== 0) {
        temporal.push(termsArray);
      }
      this.accept = new Array(temporal.length).fill(0);
      this.$nextTick(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });
      return temporal;
    }
  },
  props: {
    tour: {
      required: true
    },
    acceptTerms: {
      required: true
    }
  },
  watch: {
    currentIndex: function currentIndex(newval) {
      this.accept[newval] = 1;
    }
  },
  methods: {
    saveSignature: function saveSignature() {
      var _this = this;

      var svg = _this.$refs.signature.save("image/svg+xml");
      this.acceptTerms(svg);

      // console.log(svg);
    },
    clear: function clear() {
      var _this = this;
      _this.$refs.signature.clear();
    },
    undo: function undo() {
      var _this = this;
      _this.$refs.signature.undo();
    },
    getTerms: function getTerms(terms) {
      var anlage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

      if (anlage) {
        terms = "Anlage " + terms;
      }
      //  v-if="/^([0-9][.][0-9])/.test(linetext) || /^([0-9][.][ ])/.test(linetext)"
      var myterms = terms.replace(/&nbsp;/gi, "");
      myterms = myterms.split(/\r\n|\r|\n/);
      var returnTerms = [{
        class: "title",
        text: ""
      }];
      var i = 0;
      while (i < myterms.length - 1) {
        if (/^([0-9][.][0-9])/.test(myterms[i]) || /^([0-9][.])/.test(myterms[i])) {
          var termsDots = myterms[i].split(/^([0-9][.][0-9])/);
          if (termsDots[1] && /^([0-9][.][0-9])/.test(termsDots[1])) {
            termsDots[1] = "<b>" + termsDots[1] + "</b> ";
          } else {
            var termsDots = myterms[i].split(/^([0-9][.])/);
            if (termsDots[1] && /^([0-9][.])/.test(termsDots[1])) {
              termsDots[1] = "<b>" + termsDots[1] + "</b> ";
            }
          }
          termsDots = termsDots.join(" ");
          returnTerms.push({
            class: "kurier-term",
            text: termsDots
          });
        } else {
          returnTerms[returnTerms.length - 1].text += " " + myterms[i];
        }
        if (i === 0) {
          returnTerms.push({
            class: "only-text",
            text: ""
          });
        }
        i += 1;
      }

      return returnTerms;
      // return terms.split(/\r\n|\r|\n/);
    },
    warning: function warning() {
      this.$snotify.warning(this.trans("front.touroffers.mustAccept"), this.trans("front.touroffers.mustAcceptTitle"), {
        timeOut: 3000
      });
    },
    activate: function activate(index) {
      if (!this.accept[this.currentIndex] && index > this.currentIndex) {
        this.warning();
        return false;
      }
      if (index < this.tourTerms.length + 1) {
        this.currentIndex = index;
      }
    },
    close: function close() {
      $("#termsModal").modal("hide");
    },
    next: function next() {
      if (!this.accept[this.currentIndex]) {
        this.warning();
        return false;
      }
      if (this.currentIndex === this.tourTerms.length) {
        console.log("here");
        var notAccepted = this.accept.some(function (element) {
          return !element;
        });
        if (notAccepted) {
          this.warning();
          return false;
        }
        this.saveSignature();

        return false;
      }
      this.currentIndex += 1;
    }
  },
  components: {},
  created: function created() {
    // this.$http
    //   .get("/api/tours/tour/terms/" + this.$route.params.tourId)
    //   .then(response => {
    //     this.term = response.body.layout;
    //     console.log(this.term.split(/\r\n|\r|\n/));
    //   });
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ 840:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "modal fade",
      attrs: {
        id: "termsModal",
        role: "dialog",
        "aria-labelledby": "termsModalLabel",
        "aria-hidden": "true"
      }
    },
    [
      _c("div", { staticClass: "modal-dialog", attrs: { role: "document" } }, [
        _c(
          "div",
          { staticClass: "modal-content" },
          [
            _c("div", { staticClass: "modal-header" }, [
              _c(
                "h5",
                {
                  staticClass: "modal-title",
                  attrs: { id: "termsModalLabel" }
                },
                [_vm._v(_vm._s(_vm.trans("front.touroffers.readTerms")))]
              ),
              _vm._v(" "),
              _vm._m(0)
            ]),
            _vm._v(" "),
            _vm.tourTerms
              ? _c("div", { staticClass: "modal-body relative" })
              : _vm._e(),
            _vm._v(" "),
            _c(
              "transition-group",
              {
                staticClass: "modal-body relative terms-body",
                staticStyle: {
                  height: "550px",
                  "overflow-x": "hidden",
                  "overflow-y": "auto"
                },
                attrs: {
                  tag: "div",
                  name: "zoomSpecial",
                  "enter-active-class": "animated zoomIn absolute",
                  "leave-active-class": "animated zoomOut absolute"
                }
              },
              [
                _c(
                  "div",
                  {
                    directives: [
                      {
                        name: "show",
                        rawName: "v-show",
                        value: _vm.currentIndex === _vm.tourTerms.length,
                        expression: "currentIndex===tourTerms.length"
                      }
                    ],
                    key: "kureir-terms-list" + _vm.tourTerms.length,
                    staticClass: "sinature"
                  },
                  [
                    _c("h5", { staticClass: "signature-title" }, [
                      _vm._v(
                        _vm._s(_vm.trans("front.touroffers.signatureMessage"))
                      )
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "terms-signature" },
                      [
                        _vm.currentIndex === _vm.tourTerms.length
                          ? _c("vueSignature", {
                              ref: "signature",
                              attrs: {
                                sigOption: _vm.sigOptions,
                                w: "100%",
                                h: "400px",
                                disabled: false
                              }
                            })
                          : _vm._e(),
                        _vm._v(" "),
                        _c("div", { staticClass: "signature-buttons" }, [
                          _c(
                            "div",
                            {
                              staticClass: "signature-button",
                              on: { click: _vm.clear }
                            },
                            [
                              _c("img", {
                                attrs: { src: "/images/delete.svg" }
                              }),
                              _vm._v(" "),
                              _c("span", [
                                _vm._v(
                                  _vm._s(_vm.trans("front.touroffers.clear"))
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "signature-button",
                              on: { click: _vm.undo }
                            },
                            [
                              _c("img", {
                                attrs: { src: "/images/back-drawn-arrow.svg" }
                              }),
                              _vm._v(" "),
                              _c("span", [
                                _vm._v(
                                  _vm._s(_vm.trans("front.touroffers.undo"))
                                )
                              ])
                            ]
                          )
                        ])
                      ],
                      1
                    )
                  ]
                ),
                _vm._v(" "),
                _vm._l(_vm.tourTerms, function(mineterms, mycurrentindex) {
                  return _c(
                    "div",
                    {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: mycurrentindex === _vm.currentIndex,
                          expression: "mycurrentindex===currentIndex"
                        }
                      ],
                      key: "kureir-terms-list" + mycurrentindex,
                      staticClass: "kurier-terms-list"
                    },
                    [
                      _vm._l(
                        _vm.getTerms(mineterms, mycurrentindex > 0),
                        function(linetext) {
                          return _c(
                            "div",
                            { key: linetext.text, class: linetext.class },
                            [
                              _vm.accept[mycurrentindex] &&
                              linetext.class === "kurier-term"
                                ? _c("img", {
                                    attrs: {
                                      src: "/images/checked.svg",
                                      "data-toogle": "tooltip",
                                      title: _vm.trans(
                                        "front.touroffers.accepted"
                                      ),
                                      alt: "accept"
                                    }
                                  })
                                : linetext.class === "kurier-term"
                                ? _c("img", {
                                    attrs: {
                                      src: "/images/close.svg",
                                      "data-toogle": "tooltip",
                                      title: _vm.trans(
                                        "front.touroffers.notYet"
                                      ),
                                      alt: "accept"
                                    }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _c("span", {
                                domProps: { innerHTML: _vm._s(linetext.text) }
                              })
                            ]
                          )
                        }
                      ),
                      _vm._v(" "),
                      _c(
                        "checkbox",
                        {
                          staticClass: "accept-special",
                          attrs: { name: "terms" },
                          model: {
                            value: _vm.accept[mycurrentindex],
                            callback: function($$v) {
                              _vm.$set(_vm.accept, mycurrentindex, $$v)
                            },
                            expression: "accept[mycurrentindex]"
                          }
                        },
                        [
                          _vm._v(
                            _vm._s(_vm.trans("front.touroffers.acceptTitle"))
                          )
                        ]
                      )
                    ],
                    2
                  )
                })
              ],
              2
            ),
            _vm._v(" "),
            _c(
              "div",
              { key: "terms-dot", staticClass: "terms-dot" },
              _vm._l(_vm.tourTerms.length + 1, function(index) {
                return _c("div", {
                  key: "term-dot" + index,
                  class: { dot: true, active: _vm.currentIndex === index - 1 },
                  attrs: {
                    title: _vm.trans("front.touroffers.page") + " " + index,
                    "data-toggle": "tooltip"
                  },
                  on: {
                    click: function($event) {
                      return _vm.activate(index - 1)
                    }
                  }
                })
              }),
              0
            ),
            _vm._v(" "),
            _c("div", { staticClass: "modal-footer terms-footer" }, [
              _c("div", { staticClass: "modal-footer-buttons-wrapper" }, [
                _c(
                  "div",
                  {
                    staticClass: "modal-footer-button close",
                    attrs: {
                      "data-toggle": "tooltip",
                      title: _vm.trans("front.touroffers.close")
                    },
                    on: { click: _vm.close }
                  },
                  [_vm._v(_vm._s(_vm.trans("front.touroffers.close")))]
                ),
                _vm._v(" "),
                _vm.currentIndex < _vm.tourTerms.length
                  ? _c(
                      "div",
                      {
                        staticClass: "modal-footer-button next",
                        attrs: {
                          "data-toggle": "tooltip",
                          title: _vm.trans("front.touroffers.next")
                        },
                        on: { click: _vm.next }
                      },
                      [_vm._v(_vm._s(_vm.trans("front.touroffers.next")))]
                    )
                  : _c(
                      "div",
                      {
                        staticClass: "modal-footer-button accept",
                        attrs: {
                          "data-toggle": "tooltip",
                          title: _vm.trans("front.touroffers.acceptTitle")
                        },
                        on: { click: _vm.next }
                      },
                      [_vm._v(_vm._s(_vm.trans("front.touroffers.accept")))]
                    )
              ])
            ])
          ],
          1
        )
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: {
          type: "button",
          "data-dismiss": "modal",
          "aria-label": "Close"
        }
      },
      [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
    )
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-4934ffca", module.exports)
  }
}

/***/ }),

/***/ 841:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "kurier-login" },
    [
      _c("div", { staticClass: "kurier-authentication-wrapper" }, [
        _c("div", { staticClass: "kurier-auth-message" }, [
          _c("p", { staticStyle: { "font-weight": "bold" } }, [
            _vm._v(_vm._s(_vm.trans("front.touroffers.readTermsHead")))
          ]),
          _vm._v(" "),
          _c("img", {
            attrs: {
              src: "/images/box.svg",
              alt: "email",
              title: _vm.trans("front.touroffers.readTermsHead"),
              "data-toggle": "tooltip"
            }
          }),
          _vm._v(" "),
          _c("p", [
            _vm._v(_vm._s(_vm.trans("front.touroffers.readTermsBody")))
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "buttons-wrapper" }, [
            _c(
              "div",
              {
                staticClass: "kurier-auth-btn",
                staticStyle: { "justify-content": "center" },
                attrs: {
                  "data-toggle": "tooltip",
                  title: _vm.trans("front.touroffers.readTermsBody")
                },
                on: { click: _vm.showTerms }
              },
              [
                _c("img", {
                  staticStyle: { "margin-right": "5px" },
                  attrs: { src: "/images/list.svg", alt: "" }
                }),
                _vm._v(" "),
                _c("span", [
                  _vm._v(_vm._s(_vm.trans("front.touroffers.readTerms")))
                ])
              ]
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _c("kurier-terms", {
        attrs: { tour: _vm.tour, acceptTerms: _vm.acceptTerms }
      })
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
    require("vue-hot-reload-api")      .rerender("data-v-40bad34e", module.exports)
  }
}

/***/ }),

/***/ 842:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(843)
/* template */
var __vue_template__ = __webpack_require__(844)
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
Component.options.__file = "resources/assets/js/components/pages/buissness-customer/pages/laststep/kurierPayments.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-61d24bce", Component.options)
  } else {
    hotAPI.reload("data-v-61d24bce", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 843:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      shoCase: 1,
      paymentAmount: 500,
      loading: false
    };
  },

  computed: {},
  props: {
    tour: {
      required: true
    }
  },
  watch: {
    "tour.accepted_offer": function tourAccepted_offer(oldval, newval) {
      this.detectMinPaymentAmount();
    }
  },
  methods: {
    getPaymentImage: function getPaymentImage(payment) {
      if (payment.method === "paypal") {
        return "/images/paypal.svg";
      } else {
        return "/images/master.svg";
      }
    },
    detectMinPaymentAmount: function detectMinPaymentAmount() {
      if (this.tour.tour_payments && this.tour.tour_payments.length !== 0) {
        this.shoCase = 2;
      }
      if (this.tour.accepted_offer) {
        this.paymentAmount = this.tour.accepted_offer.company_offer;
        return this.tour.accepted_offer.company_offer;
      } else {
        return 500;
      }
    },
    paywith: function paywith(method) {
      var _this = this;

      if (this.loading) {
        return false;
      }
      this.loading = true;
      var toBeSend = {
        paymentAmount: this.paymentAmount,
        paymentMethod: method
      };
      var formData = {
        url: this.detectPaymentUrl(method),
        data: toBeSend,
        successServer: function successServer(response) {
          window.location = response.body;
          // window.open(response.body, "_blank");
        },
        failServer: function failServer(response) {
          _this.loading = false;
        }
      };
      this.$vss.post(formData);
    },
    detectPaymentUrl: function detectPaymentUrl(method) {
      if (method === "sepa" || method === "paypal") {
        return "/api/tours/pay/paypal/" + this.$route.params.tourId;
      } else {
        return "/api/tours/pay/wirecard/" + this.$route.params.tourId;
      }
    }
  },
  components: {},

  mounted: function mounted() {
    this.detectMinPaymentAmount();
  }
});

/***/ }),

/***/ 844:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "kurier-payments no-top" }, [
    _c("div", { staticClass: "kureir-payments-header" }, [
      _c(
        "span",
        {
          class: {
            "kurier-payments-header-half": true,
            active: _vm.shoCase === 1
          },
          on: {
            click: function($event) {
              _vm.shoCase = 1
            }
          }
        },
        [_vm._v(_vm._s(_vm.trans("front.tourpayments.payment")))]
      ),
      _vm._v(" "),
      _c(
        "span",
        {
          class: {
            "kurier-payments-header-half": true,
            active: _vm.shoCase === 2
          },
          on: {
            click: function($event) {
              _vm.shoCase = 2
            }
          }
        },
        [_vm._v(_vm._s(_vm.trans("front.tourpayments.paymentHistory")))]
      )
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.shoCase === 1,
            expression: "shoCase===1"
          }
        ],
        staticClass: "kurier-payments-methods"
      },
      [
        _c("div", { staticClass: "kurier-payment-method" }, [
          _c("img", {
            class: { disabled: _vm.loading },
            attrs: {
              disabled: _vm.loading,
              src: "/images/paypal.svg",
              alt: "paypal"
            },
            on: {
              click: function($event) {
                return _vm.paywith("paypal")
              }
            }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "kurier-payment-method" }, [
          _c("img", {
            class: { disabled: _vm.loading },
            attrs: {
              disabled: _vm.loading,
              src: "/images/visa.svg",
              alt: "visa"
            },
            on: {
              click: function($event) {
                return _vm.paywith("CCARD")
              }
            }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "kurier-payment-method" }, [
          _c("img", {
            class: { disabled: _vm.loading },
            attrs: {
              disabled: _vm.loading,
              src: "/images/master.svg",
              alt: "master"
            },
            on: {
              click: function($event) {
                return _vm.paywith("CCARD")
              }
            }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "kurier-payment-method" }, [
          _c("img", {
            class: { disabled: _vm.loading },
            attrs: {
              disabled: _vm.loading,
              src: "/images/maestro.svg",
              alt: "maestro"
            },
            on: {
              click: function($event) {
                return _vm.paywith("CCARD")
              }
            }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "kurier-payment-method" }, [
          _c("img", {
            class: { disabled: _vm.loading },
            attrs: {
              disabled: _vm.loading,
              src: "/images/klarna.svg",
              alt: "klarna"
            },
            on: {
              click: function($event) {
                return _vm.paywith("SOFORTUEBERWEISUNG")
              }
            }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "kurier-payment-method" }, [
          _c("img", {
            class: { disabled: _vm.loading },
            attrs: {
              disabled: _vm.loading,
              src: "/images/sofort.svg",
              alt: "sofort"
            },
            on: {
              click: function($event) {
                return _vm.paywith("SOFORTUEBERWEISUNG")
              }
            }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "kurier-payment-method" }, [
          _c("img", {
            class: { disabled: _vm.loading },
            attrs: {
              disabled: _vm.loading,
              src: "/images/sepa.svg",
              alt: "sepa"
            },
            on: {
              click: function($event) {
                return _vm.paywith("sepa")
              }
            }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "kurier-payment-method" }, [
          _c("img", {
            class: { disabled: _vm.loading },
            attrs: {
              disabled: _vm.loading,
              src: "/images/vorkasse.svg",
              alt: "vorkasse"
            },
            on: {
              click: function($event) {
                return _vm.paywith("CCARD")
              }
            }
          })
        ])
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.shoCase === 2,
            expression: "shoCase===2"
          }
        ],
        staticClass: "kuier-payment-history"
      },
      _vm._l(_vm.tour.tour_payments, function(payment) {
        return _c(
          "div",
          {
            key: "payment" + payment.id,
            staticClass: "kurier-payment-details"
          },
          [
            _c(
              "span",
              {
                staticClass: "amount",
                attrs: {
                  "data-toggle": "tooltip",
                  title:
                    _vm.trans("front.tourpayments.paidAt") +
                    " (" +
                    payment.created_at +
                    ")"
                }
              },
              [_vm._v(_vm._s(payment.amount))]
            ),
            _vm._v(" "),
            _c("img", {
              staticClass: "method",
              attrs: { src: _vm.getPaymentImage(payment), alt: payment.method }
            })
          ]
        )
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
    require("vue-hot-reload-api")      .rerender("data-v-61d24bce", module.exports)
  }
}

/***/ }),

/***/ 845:
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
            staticClass: "order-form-wrapper horozintal",
            staticStyle: { "padding-bottom": "20px" }
          },
          [
            _c(
              "div",
              { staticClass: "stops-wrapper offers-wrapper left" },
              [
                _c("stops-information", { attrs: { tour: _vm.tour } }),
                _vm._v(" "),
                _vm.tour &&
                _vm.tour.calculations &&
                _vm.tour.calculations.length == 4
                  ? _c("tour-times", { attrs: { tour: _vm.tour } })
                  : _vm._e()
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "stops-wrapper offers-wrapper right" },
              [
                _c("ship-information", { attrs: { tour: _vm.tour } }),
                _vm._v(" "),
                _vm.tour && _vm.tour.tour_details
                  ? _c("tour-details", { attrs: { tour: _vm.tour } })
                  : _vm._e(),
                _vm._v(" "),
                _vm.tour && _vm.tour.stops
                  ? _c("tour-stops", { attrs: { tour: _vm.tour } })
                  : _vm._e()
              ],
              1
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "order-info-form tour-info relative" },
          [
            _c(
              "transition",
              {
                attrs: {
                  name: "zoomSpecial",
                  "enter-active-class": "animated zoomIn absolute",
                  "leave-active-class": "animated zoomOut absolute"
                }
              },
              [
                _c("kurier-offers", {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.loginDisabled === false && !_vm.offerDisabled,
                      expression: "loginDisabled===false&&!offerDisabled"
                    }
                  ],
                  attrs: {
                    isAuth: _vm.tour.isAuth,
                    offerDisabled: _vm.offerDisabled,
                    acceptOffer: _vm.acceptOffer,
                    tour: _vm.tour
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "transition",
              {
                attrs: {
                  name: "zoomSpecial",
                  "enter-active-class": "animated zoomIn absolute",
                  "leave-active-class": "animated zoomOut absolute"
                }
              },
              [
                _c("kurier-login", {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.loginDisabled,
                      expression: "loginDisabled"
                    }
                  ],
                  attrs: {
                    tour: _vm.tour,
                    acceptOffer: _vm.acceptOffer,
                    acceptedOffer: _vm.acceptedOffer
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "transition",
              {
                attrs: {
                  name: "zoomSpecial",
                  "enter-active-class": "animated zoomIn absolute",
                  "leave-active-class": "animated zoomOut absolute"
                }
              },
              [
                _c("kurier-accept", {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value:
                        this.offerDisabled &&
                        !this.loginDisabled &&
                        !_vm.termsAccepted,
                      expression:
                        "this.offerDisabled &&\n      !this.loginDisabled&&!termsAccepted"
                    }
                  ],
                  attrs: { tour: _vm.tour }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "transition",
              {
                attrs: {
                  name: "zoomSpecial",
                  "enter-active-class": "animated zoomIn absolute",
                  "leave-active-class": "animated zoomOut absolute"
                }
              },
              [
                _c("kurier-payment", {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value:
                        this.offerDisabled &&
                        !this.loginDisabled &&
                        _vm.termsAccepted &&
                        _vm.tour.isAuth > 1,
                      expression:
                        "this.offerDisabled &&\n      !this.loginDisabled&&termsAccepted&&tour.isAuth>1"
                    }
                  ],
                  attrs: { tour: _vm.tour }
                })
              ],
              1
            )
          ],
          1
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
    require("vue-hot-reload-api")      .rerender("data-v-8ad5fd28", module.exports)
  }
}

/***/ })

});