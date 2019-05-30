<template>
  <div v-if="!loading && !notFound" class="container create-order-container">
    <transition name="fade">
      <div class="fixedError" v-if="fixedError">
        <img src="/images/warning.svg" alt="Warming">
        {{trans('front.create.error')}}
      </div>
    </transition>
    <order-box-wrapper :order="order"></order-box-wrapper>
    <div class="form-map-container">
      <div class="order-form-wrapper">
        <order-wizard v-if="isStored===true" @currentShowChange="StepTo" :currentShow="currentShow"></order-wizard>

        <form
          :key="'currentShownGoods'"
          action="#"
          :class="{'shown':currentShow==='goods'}"
          v-show="currentShow==='goods'"
        >
          <div class="goods-descripe" v-if="!loading">
            <input-parent
              v-for="input in inputs"
              :key="input.bind"
              v-bind="input.props"
              v-model="order[input.model]"
              @timeinput="changeTimeInput"
            >
              <small-input
                v-for="small in input.inputs"
                :key="small.bind"
                v-bind="small.props"
                v-model="order[small.model]"
              ></small-input>
            </input-parent>
          </div>
          <order-pricing
            :isDirty="isDirty"
            :NotDisabled="NotDisabled"
            @acceptAndGo="acceptAndGo"
            :shippings="shippings"
            :distances="distances"
            :order="order"
            v-if="checkedAndErrors"
          ></order-pricing>
        </form>
        <order-information
          :class="{'shown':currentShow==='senderReceiver'}"
          :key="'currentShownSenderReceiver'"
          :order="order"
          v-show="currentShow==='senderReceiver'"
        ></order-information>
      </div>
      <order-info-form ref="mapWrapper" :order="order"></order-info-form>
    </div>
  </div>

  <div class="loading-div" v-else-if="loading"></div>
  <div class="notFoundDiv" v-else>
    <img src="/images/searching.svg" alt="Not Found">
    <h3>{{trans('front.create.notFound')}}</h3>
  </div>
</template>


<script>
/**
 * this is the craate order page
 */
import inputs from "./inputs";
export default {
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
  data() {
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
      inputs: inputs,
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
  created() {
    this.$http.get("/api/shipping/getAll").then(response => {
      this.shippings = response.body[0];
      this.distances = response.body[1];
    });
    this.createdFunc(this.$route.params.orderId);
  },
  beforeRouteUpdate(to, from, next) {
    this.createdFunc(to.params.orderId);

    next();
  },

  /**
   * @description
   *
   */
  mounted() {
    setTimeout(() => {
      //render every img with class "svg" to svg element
      this.$genF.svg();
    }, 500);
  },
  computed: {
    isDirty() {
      var dirty = false;
      var inputs = [
        trans("front.create.width"),
        trans("front.create.height"),
        trans("front.create.length")
      ];
      inputs.forEach(input => {
        if (this.fields[input] && this.fields[input].dirty === true) {
          dirty = true;
        }
      });

      return dirty;
    },
    formData() {
      this.order.distance = Number(
        this.order.orderRoute.routes[0].legs[0].distance.value / 1000
      );
      this.order.duration =
        Number(this.order.orderRoute.routes[0].legs[0].duration.value / 60) +
        (Number(this.order.orderRoute.routes[0].legs[0].duration.value % 60) >
        30
          ? 1
          : 0);
      this.order.encryptedId = this.$route.params.orderId;
      var toBeSendOrder = Object.assign({}, this.order);
      toBeSendOrder.orderRoute = {};
      return {
        url: "/api/orders/neworder",
        data: toBeSendOrder,
        validate: this.$validator,
        successServer: data => {
          this.$orders.removeOrder(this.order);
          if (data.body[0].id === this.order.id) {
            this.currentShow = "senderReceiver";
            return false;
          }
          this.$router.push("/order/create_order/" + data.body[1]);
        }
      };
    },
    /**
     * @param  {} {returntrans('front.create.personsPlaceholer'
     * @param  {} .replace('{{time}}'
     * @param  {} this.order.time
     * @param  {} }
     */

    personsPlaceHolder() {
      return trans("front.create.personsPlaceholer").replace(
        "{{time}}",
        this.order.time
      );
    },

    /**
     * @description
     * @returns {any}
     * passed as prop to the time slider
     * the time slider is an input-parent component
     * please look at './inputs.js'
     */
    loadingTimeText() {
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
    NotDisabled() {
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
    checkedAndErrors() {
      if (
        this.errors.has(trans("front.create.weightName")) ||
        !this.order.weight
      ) {
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
        if (
          field.touched === false &&
          field.required === true &&
          field.dirty === false
        ) {
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
    StepTo(e) {
      if (e === "senderReceiver") {
        if (!this.checkedAndErrors || !this.NotDisabled) {
          return false;
        }
      }
      this.currentShow = e;
    },
    changeTimeInput(e) {
      this.order.time = e;
    },
    /**
     * @description
     *
     * @param {any} e
     */
    getShippings(shippings) {
      this.shippings = shippings;
    },

    /**
     * @description
     * please visit vss.js for more
     * @returns {any}
     */
    acceptAndGo(e) {
      this.$vss.post(this.formData);
    },

    /**
     * @description
     * @param {any} marker
     * @returns {any}
     */
    getMapPosition(marker) {
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

    createdFunc(orderId) {
      this.loading = true;
      this.notFound = true;
      this.isChanged = false;
      this.order = {
        person: 1
      };
      this.$orders.getOrder(orderId).then(
        response => {
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
              load_from: window
                .moment(new Date().setMinutes(0))
                .add("2", "hours"),
              load_up: window
                .moment(new Date().setMinutes(0))
                .add("8", "hours"),
              delivery_from: window
                .moment(new Date().setMinutes(0))
                .add("2", "hours"),
              delivery_until: window
                .moment(new Date().setMinutes(0))
                .add("3", "hours")
            }
          };
          if (response.isStored) {
            response.from = response.source;
            response.from_map = response.source_location;
            response.to_map = response.destination_location;
            response.to = response.destination;
            this.isStored = response.isStored;
            if (response.isStored) {
              this.currentShow = "senderReceiver";
            }
          }

          for (var key in expected) {
            if (!response[key]) {
              response[key] = expected[key];
            }
          }

          if (
            response["other_billing"] &&
            response["other_billing"]["first_name"]
          ) {
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
          this.order = response;

          // this.helpers.weight = '50';
          this.loading = false;
          this.$nextTick(() => {
            this.$genF.svg();
          });
          this.notFound = false;
          this.$nextTick(() => {
            this.$refs.mapWrapper.goto();
          });
        },
        error => {
          console.log(error);
          this.loading = false;
          this.$nextTick(() => {
            this.$genF.svg();
          });
        }
      );
    }
  },
  watch: {
    currentShow(newval, oldval) {
      this.isChanged = false;
    }
  },
  components: {
    "order-box-wrapper": require("./orderBox.vue"),
    "order-pricing": require("./orderPricing.vue"),
    "order-info-form": require("./orderInfoForm.vue"),
    "order-wizard": require("./orderWizard.vue"),
    "order-information": require("./orderInformation.vue")
  }
};
</script>

<style lang="scss">
svg g text {
  font-size: 18px !important;
}

.vue-rate-it-rating {
  margin: 0 auto;
}

.rating-input-child {
  display: flex;
  > div {
    display: inline;
    margin: 0 auto;
    padding-right: 12px;
  }
}
</style>
/***********************
 ***********************
 ***********************
 ** Ahmed Ali Thabet ***
 **** Sohag, Egypt *****
 ***** 01158977205 *****
 ***********************
 ***********************
 ***********************
 ***********************
************************/