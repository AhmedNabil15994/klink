<template>
  <div class="kurier-offer">
    <div class="klink-offer-head" @click="showOffer">
      <div
        class="klink-offer-head-item"
        :title="trans('front.touroffers.price')"
        data-toggle="tooltip"
      >
        <img src="/images/euro.svg" alt="euro">
        <span>{{offer.company_offer}}</span>
      </div>
      <div class="klink-offer-head-item right add-new-package sm-img">
        <div class="show-hide" :title="trans('front.touroffers.showDetails')" data-toggle="tooltip">
          <img
            src="/images/key-console.svg"
            :class="{'down':!shown,'smooth':true}"
            :alt="!shown?'show':'hide'"
          >
        </div>
        <button
          class="btn btn-success btn-sm"
          :title="trans('front.touroffers.accept')"
          data-toggle="tooltip"
          :disabled="offerDisabled"
          @click="acceptOffer(offer)"
        >
          <img src="/images/tick.svg" alt="check">
          <span>{{trans('front.touroffers.accept')}}</span>
        </button>
      </div>
    </div>
    <div :class="{'klink-offer-body':true,'active':shown}">
      <transition
        name="slide"
        enter-active-class="animated slideInDown"
        leave-active-class="animated slideOutUp"
      >
        <div class="vehicle-offer-show" v-show="shown">
          <div
            class="vehicle-name"
            :title="trans('front.touroffers.vehicle')"
            data-toggle="tooltip"
          >{{ship_name}}</div>

          <div class="vehicle-information">
            <div class="shipping">
              <img
                :title="ship_name"
                data-toggle="tooltip"
                :src="'/images/shippings/'+ship_image"
                :alt="ship_name"
              >
              <div class="shipping-info">
                <div
                  :title="trans('front.touroffers.model')"
                  data-toggle="tooltip"
                  class="shipping-info-piece"
                >
                  <b>{{trans('front.touroffers.model')}} :</b>
                  {{offer.tour_vehicle.model}}
                </div>
                <div
                  :title="trans('front.touroffers.weight')"
                  data-toggle="tooltip"
                  class="shipping-info-piece"
                >
                  <b>{{trans('front.touroffers.weight')}} :</b>
                  {{vehicle_weight}}
                </div>
              </div>
              <div class="shipping-info">
                <div
                  :title="trans('front.touroffers.width')+' ( CM ) '"
                  data-toggle="tooltip"
                  class="shipping-info-piece"
                >
                  <b>{{trans('front.touroffers.width')}} :</b>
                  {{getInCm(offer.tour_vehicle.ship ? offer.tour_vehicle.ship.width:0)}}
                </div>
                <div
                  :title="trans('front.touroffers.length')+' ( CM ) '"
                  data-toggle="tooltip"
                  class="shipping-info-piece"
                >
                  <b>{{trans('front.touroffers.length')}} :</b>
                  {{getInCm(offer.tour_vehicle.ship ? offer.tour_vehicle.ship.length:0)}}
                </div>
                <div
                  :title="trans('front.touroffers.height')+' ( CM ) '"
                  data-toggle="tooltip"
                  class="shipping-info-piece"
                >
                  <b>{{trans('front.touroffers.height')}} :</b>
                  {{getInCm(offer.tour_vehicle.ship ? offer.tour_vehicle.ship.height:0)}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      shown: false
    };
  },
  computed: {
    vehicle_weight() {
      if (this.offer.tour_vehicle && this.offer.tour_vehicle.weight) {
        return this.offer.tour_vehicle.weight;
      } else if (
        this.offer.tour_vehicle &&
        this.offer.tour_vehicle.ship &&
        this.offer.tour_vehicle.ship.pay_load_max
      ) {
        return this.offer.tour_vehicle.ship.pay_load_max;
      }
      return 0;
    },
    ship_name() {
      if (this.offer.tour_vehicle && this.offer.tour_vehicle.ship_name) {
        return this.offer.tour_vehicle.ship_name;
      } else if (
        this.offer.tour_vehicle &&
        this.offer.tour_vehicle.ship &&
        this.offer.tour_vehicle.ship.title
      ) {
        return this.offer.tour_vehicle.ship.title;
      }
      return trans("front.touroffers.noName");
    },
    ship_image() {
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
    showOffer(e) {
      if (
        $(e.target).hasClass("btn") ||
        $(e.target).parent(".btn").length >= 1
      ) {
        return false;
      }
      this.shown = !this.shown;
    },
    getInCm(width) {
      return (width / 10).toFixed(2);
    }
  },
  components: {},
  created() {},
  mounted() {
    $('[data-toggle="tooltip"]').tooltip();
  }
};
</script>


/******************* 
*
*
*
*    Ahmed Ali Tahbet
*
*
 ********************/