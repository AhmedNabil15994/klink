<template>
  <div class="container create-order-container">
    <div class="form-map-container" style="margin-top:20px;">
      <div class="order-form-wrapper horozintal" style="padding-bottom: 20px;">
        <div class="stops-wrapper offers-wrapper left">
          <stops-information :tour="tour"></stops-information>
          <tour-times :tour="tour" v-if="tour&&tour.calculations&&tour.calculations.length==4"></tour-times>
        </div>
        <div class="stops-wrapper offers-wrapper right">
          <ship-information :tour="tour"></ship-information>
          <tour-details v-if="tour&&tour.tour_details" :tour="tour"></tour-details>
          <tour-stops v-if="tour&&tour.stops" :tour="tour"></tour-stops>
        </div>
      </div>
      <div class="order-info-form tour-info relative">
        <transition
          name="zoomSpecial"
          enter-active-class="animated zoomIn absolute"
          leave-active-class="animated zoomOut absolute"
        >
          <kurier-offers
            :isAuth="tour.isAuth"
            :offerDisabled="offerDisabled"
            :acceptOffer="acceptOffer"
            :tour="tour"
            v-show="loginDisabled===false&&!offerDisabled"
          ></kurier-offers>
        </transition>
        <transition
          name="zoomSpecial"
          enter-active-class="animated zoomIn absolute"
          leave-active-class="animated zoomOut absolute"
        >
          <kurier-login
            :tour="tour"
            :acceptOffer="acceptOffer"
            :acceptedOffer="acceptedOffer"
            v-show="loginDisabled"
          ></kurier-login>
        </transition>
        <transition
          name="zoomSpecial"
          enter-active-class="animated zoomIn absolute"
          leave-active-class="animated zoomOut absolute"
        >
          <kurier-accept
            :tour="tour"
            v-show="this.offerDisabled &&
        !this.loginDisabled&&!termsAccepted"
          ></kurier-accept>
        </transition>
        <transition
          name="zoomSpecial"
          enter-active-class="animated zoomIn absolute"
          leave-active-class="animated zoomOut absolute"
        >
          <kurier-payment
            :tour="tour"
            v-show="this.offerDisabled &&
        !this.loginDisabled&&termsAccepted&&tour.isAuth>1"
          ></kurier-payment>
        </transition>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      tour: {},

      acceptedOffer: {}
    };
  },
  computed: {
    termsAccepted() {
      if (!this.tour || !this.tour.tour_details) {
        return false;
      }
      return this.tour.tour_details.terms_accepted;
    },
    offerDisabled() {
      if (!this.tour || !this.tour.tour_offer) {
        return false;
      }
      var accepted = this.tour.tour_offer.some(offer => {
        if (offer.customer_accepted) {
          this.acceptedOffer = offer;
          return true;
        }
        return false;
      });
      return accepted;
    },
    loginDisabled() {
      return (
        this.acceptedOffer &&
        this.acceptedOffer.id > 0 &&
        (this.tour.isAuth < 2 || !this.tour.isAuth)
      );
    }
  },
  props: {},
  watch: {},
  methods: {
    acceptOffer(offer) {
      this.acceptedOffer = offer;
      if (this.tour.isAuth === 2) {
        this.$vss.post(this.formData(offer));
      }
    },
    formData(offer) {
      var toBeSendOrder = {
        offer: offer.id,
        tour: this.$route.params.tourId
      };

      return {
        url: "/api/tours/accept",
        data: toBeSendOrder,

        successServer: response => {
          
          this.tour.tour_offer = response.body.tour_offer;
        },
        failedValidate: data => {},
        failServer: data => {}
      };
    },
    getOffer(data) {
      this.$http
        .get(
          "/api/tours/tour/" +
            this.tour.encrypted +
            "/offer/" +
            data.data.offer_id
        )
        .then(response => {
          var found = this.tour.tour_offer.some(offer => {
            return offer.id === response.data.id;
          });
          if (!found) {
            this.tour.tour_offer.push(response.data);
          }
        });
    }
  },
  components: {
    "kurier-offers": require("./kurierOffers.vue"),
    "stops-information": require("./stopsInformation.vue"),
    "tour-stops": require("./tourStops.vue"),
    "ship-information": require("./shipInformation.vue"),
    "tour-details": require("./tourDetails.vue"),
    "tour-times": require("./tourTimes.vue"),
    "kurier-login": require("./kurierLogin.vue"),
    "kurier-accept": require("./kurierAcceptTerms.vue"),
    "kurier-payment": require("./kurierPayments.vue")
  },
  created() {
    this.$http
      .get("/api/tours/tour/" + this.$route.params.tourId + "?offers=true")
      .then(response => {
        if (!response || !response.data || !response.data.calculations) {
          this.$router.push(
            "geschaeftskundenportal/tour/" + this.$route.params.tourId
          );
        }
        this.tour = response.data;
        window.Echo.channel("offerTour" + this.tour.id).listen(
          ".newOffer" + this.tour.id,
          e => {
            this.getOffer(e);
          }
        );
      });
  },
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