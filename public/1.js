webpackJsonp([1],{

/***/ 190:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(221)
}
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(223)
/* template */
var __vue_template__ = __webpack_require__(224)
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

/***/ 221:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(222);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(4)("be419506", content, false, {});
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

/***/ 222:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(3)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 223:
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
            from: {
                adress: '',
                marker: {
                    lat: 51.165691,
                    lng: 10.451526
                }
            },
            to: {
                adress: '',
                marker: {
                    lat: 51.165691,
                    lng: 10.451526
                }
            }
        };
    },

    methods: {
        check: function check(e) {

            this.gotto();
            // alert('sdfasdf')
            $('#overlay').removeClass('overlay');
            $('#myform').addClass('box2');
            $('.form-group').removeClass('col-md-4');
            $('.newContent').addClass('overlay3 col-md-3 col-7');
            $('.info').addClass('hidden');

            $('#myform').append('<p id="done" class="alert alert-success" role="alert"> done </p>').delay(1000);
            $('#done').fadeOut(3000);

            $('#myform').append('<a  class="alert calc" href="/order"> Calc weight  </a>');

            // MakeMarker("30.768989399999997", "31.093306499999997");

            return true;
        },
        setFromPlace: function setFromPlace(place) {
            if (!place.geometry) {

                this.from.marker = {
                    lat: '',
                    lng: ''
                };
                return '';
            } else {
                $('#ToGeoAdress').focus();
                this.from.marker = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                };
            }
        },
        setToPlace: function setToPlace(place) {
            if (!place.geometry) {

                this.to.marker = {
                    lat: '',
                    lng: ''
                };
                return '';
            } else {
                $('#SubmitFormButton').focus();
                this.to.marker = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                };
            }
        },
        setFromPlaceViaMarker: function setFromPlaceViaMarker(event) {
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
                    } else {
                        alert('No results found');
                    }
                }
            });
        },
        setToPlaceViaMarker: function setToPlaceViaMarker(event) {
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

                        // alert(results[1].formatted_address);
                    } else {
                        alert('No results found');
                    }
                }
            });
        },
        gotto: function gotto() {
            var _this = this;

            // alert(window.navigator.geolocation.getCurrentPosition)

            var directionsService = new window.google.maps.DirectionsService();
            if (this.directionsDisplay) {
                this.directionsDisplay.setDirections({
                    routes: []
                });
                // this.directionsDisplay.setMap(null);
                this.directionsDisplay = null;
            }
            this.directionsDisplay = new window.google.maps.DirectionsRenderer({
                suppressMarkers: true
            });
            // this.directionsDisplay.setPanel(document.getElementById('ahmed'));
            this.directionsDisplay.setMap(null);
            this.directionsDisplay.setMap(this.$refs.map.$mapObject);

            var start = new window.google.maps.LatLng(this.from.marker.lat, this.from.marker.lng);
            var end = new window.google.maps.LatLng(this.to.marker.lat, this.to.marker.lng);
            // this.position = position.coords
            // start = new window.google.maps.LatLng(this.position.latitude, this.position.longitude);
            // console.log(start,end)
            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode['DRIVING']
            };
            directionsService.route(request, function (result, status) {
                if (status == 'OK') {
                    _this.directionsDisplay.setDirections(result);
                    // console.log(result)

                }
            });
        }
    }

});

/***/ }),

/***/ 224:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "main-page-div" }, [
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
            _c("gmap-marker", {
              attrs: {
                "data-toggle": "tooltip",
                position: _vm.to.marker,
                title: "to",
                animation: 2,
                draggable: true
              },
              on: { dragend: _vm.setToPlaceViaMarker }
            }),
            _vm._v(" "),
            _c("gmap-marker", {
              attrs: {
                "data-toggle": "tooltip",
                position: _vm.from.marker,
                title: "from",
                animation: 2,
                draggable: true
              },
              on: { dragend: _vm.setFromPlaceViaMarker }
            })
          ],
          1
        )
      ],
      1
    ),
    _vm._v(" "),
    _c("div", { staticClass: "main-page-overlay" }, [
      _c(
        "form",
        {
          staticClass: "main-page-form",
          attrs: { action: "#" },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.check($event)
            }
          }
        },
        [
          _c("div", { staticClass: "form-head" }, [
            _vm._v(
              "\n                " +
                _vm._s(_vm.trans("front.main.track")) +
                "\n                "
            ),
            _c("span", [_vm._v(_vm._s(_vm.trans("front.main.trackSide")))])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "form-container" }, [
            _c(
              "div",
              { staticClass: "main-form-input" },
              [
                _c("gmap-autocomplete", {
                  ref: "fromAdress",
                  attrs: {
                    placeholder: _vm.trans("front.main.from"),
                    id: "FromGeoAdress"
                  },
                  on: { place_changed: _vm.setFromPlace }
                }),
                _vm._v(" "),
                _c("span", { staticClass: "icon" }, [
                  _c("img", {
                    attrs: {
                      src: "/images/home.svg",
                      alt: _vm.trans("from.main.from")
                    }
                  })
                ])
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "main-form-input" },
              [
                _c("gmap-autocomplete", {
                  ref: "ToAdress",
                  attrs: {
                    placeholder: _vm.trans("front.main.to"),
                    id: "ToGeoAdress"
                  },
                  on: { place_changed: _vm.setToPlace }
                }),
                _vm._v(" "),
                _c("span", { staticClass: "icon" }, [
                  _c("img", {
                    attrs: {
                      src: "/images/send.svg",
                      alt: _vm.trans("from.main.to")
                    }
                  })
                ])
              ],
              1
            ),
            _vm._v(" "),
            _c("div", { staticClass: "main-form-input" }, [
              _c("input", {
                staticClass: "submit",
                attrs: { type: "submit", id: "SubmitFormButton" },
                domProps: { value: _vm.trans("front.main.submit") }
              })
            ])
          ])
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
    require("vue-hot-reload-api")      .rerender("data-v-0a49a3ac", module.exports)
  }
}

/***/ })

});