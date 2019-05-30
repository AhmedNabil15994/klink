<template>
  <div class="container create-order-container">
    <div class="form-map-container" style="margin-top:20px;">
      <div class="order-form-wrapper" style="padding-bottom: 20px;">
        <slider-slick-tour :tour="tour"></slider-slick-tour>

        <tour-type-select :tour="tour"></tour-type-select>

        <!-- v-show="tour.mainType==='stops'" -->
        <by-stop :stops="stops" :stopsGeneral="stopsGeneral" :tour="tour"></by-stop>
      </div>
      <tour-map :tour="tour" :stops="stops" :stopsGeneral="stopsGeneral"></tour-map>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      tour: {
        type: "dynamic",
        mainType: "stops",
        days: [0],

        tourStartTime: window.moment(new Date().setHours(8, 0, 0, 0)),
        tourStartDate: window
          .moment(new Date().setMinutes(0))
          .add("2", "hours"),
        ship_id: 0,
        price: 0
      },
      stops: [],
      stopsGeneral: {
        numberOfPackets: 1,
        totalTimeOfStops: 60,
        timePerStop: 3,
        totalDistanceStops: 6,
        numberOfStops: 2,
        totalWeight: 0
      }
    };
  },
  computed: {},
  props: {},
  watch: {},
  methods: {},
  components: {
    "slider-slick-tour": require("./main/SliderSlickTour.vue"),
    "tour-type-select": require("./main/tourTypeSelect.vue"),
    "by-stop": require("./main/byStop.vue"),
    "tour-map": require("./main/tourMap.vue")
  },
  created() {},
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