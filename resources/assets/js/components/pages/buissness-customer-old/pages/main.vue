<template>
  <div class="container create-order-container">
    <div class="form-map-container" style="margin-top:20px;">
      <div class="order-form-wrapper" style="padding-bottom: 20px;">
        <time-detect-every
          :tour="tour"
          :options="accountingOptions"
          :dates="accountingDates"
          :headingText="trans('front.accounting.acctountingPeriod')"
          v-if="tour&&tour!=={}&&tour.tour_dates"
        ></time-detect-every>
        <time-detect
          :tour="tour"
          :options="paymentOptions"
          :dates="paymentDates"
          :headingText="trans('front.accounting.payment')"
          v-if="tour&&tour!=={}&&tour.tour_dates"
        ></time-detect>
        <time-detect
          :tour="tour"
          :options="testingOptions"
          :dates="testingDates"
          :headingText="trans('front.accounting.testing')"
          v-if="tour&&tour!=={}&&tour.tour_dates"
        ></time-detect>
        <time-detect
          :tour="tour"
          :options="canceltionOptions"
          :dates="canceltionDates"
          :headingText="trans('front.accounting.cancellation')"
          v-if="tour&&tour!=={}&&tour.tour_dates"
        ></time-detect>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      tour: {},
      accountingOptions: {
        inputs: ["type"],
        conditions: [0, 1, 2, 3]
      },
      accountingDates: {
        startDate: window.moment(new Date().setMinutes(0)),
        every: 0,
        type: "months",
        condition: 3
      },
      paymentOptions: {
        inputs: ["every", "type"],
        conditions: [0, 1, 2, 3]
      },
      paymentDates: {
        startDate: window.moment(new Date().setMinutes(0)),
        every: 1,
        type: "months",
        condition: 2
      },
      testingOptions: {
        inputs: ["every", "type"],
        conditions: [0, 1, 2, 3]
      },
      testingDates: {
        startDate: window.moment(new Date().setMinutes(0)),
        every: 2,
        type: "weeks",
        condition: 1
      },
      canceltionOptions: {
        inputs: ["startDate", "every", "type"],
        conditions: [0, 1, 2, 3, 4, 5, 6]
      },
      canceltionDates: {
        startDate: window.moment(new Date().setMinutes(0)),
        every: 2,
        type: "months",
        condition: 3
      }
    };
  },
  computed: {},
  props: {},
  watch: {},
  methods: {},
  components: {
    "time-detect": require("./timeDetecting.vue"),
    "time-detect-every": require("./timeDetectingEvery.vue")
  },
  created() {
    this.$http
      .get("/api/tours/tour/" + this.$route.params.tourId)
      .then(response => {
        this.tour = response.data;
      });
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
 