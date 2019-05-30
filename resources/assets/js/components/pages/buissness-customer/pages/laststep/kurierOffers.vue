<template>
  <div class="stops-rows-wrapper offers">
    <div class="stops-rows-header">{{trans('front.touroffers.title')}}</div>

    <transition-group
      tag="div"
      class="stops-rows-container"
      name="zoom"
      enter-active-class="animated zoomIn"
      leave-active-class="animated zoomOut"
    >
      <klink-offer
        :offerDisabled="offerDisabled"
        :acceptOffer="acceptOffer"
        v-for="offer in tour.tour_offer"
        :key="'offer'+offer.id"
        :offer="offer"
      ></klink-offer>
    </transition-group>
  </div>
</template>


<script>
export default {
  data() {
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
    "klink-offer": require("./tourOffer.vue")
  },
  created() {
    // this.$http
    //   .get("/api/tours/islogin/" + this.$route.params.tourId)
    //   .then(response => {
    //     this.isAuth = response.body;
    //   });
    // console.log(this.isAuth);
    
  },
  mounted() {}
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