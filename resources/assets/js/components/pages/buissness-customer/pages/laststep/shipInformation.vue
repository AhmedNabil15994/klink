<template>
  <div class="stops-row-vertical">
    <div class="stops-rows-wrapper">
      <div class="stops-rows-header">{{trans('front.touroffers.shipInformation')}}</div>
      <div class="stops-rows-container carsouel-no-margin">
        <tour-pricing
          v-if="checkedAndErrors"
          :tour="mytour"
          :stopsGeneral="stopsGeneral"
          :shippings="shippings"
          :distances="distances"
          :stops="stops"
          :loadTime="'stop_time'"
          :ship="tour.ship_id"
          @myveichleChanged="saveTourShip"
        ></tour-pricing>
      </div>
      <!-- <transition enter-active-class="animated zoomIn" leave-active-class="animated zoomOut">
        <div
          class="add-new-package"
          v-show="isChanged"
          style="width: 100%; display: flex; justify-content: flex-end;"
        >
          <button class="btn btn-success btn-xs" @click="saveTourShip" :disabled="loading">
            <img src="/images/save-file-option.svg" alt="save" v-show="!loading">
            <img
              src="/images/ajax-loader.svg"
              alt="loading"
              style="width:20px;height:20px;"
              v-show="loading"
            >
            <span>{{trans('front.touroffers.save')}}</span>
          </button>
        </div>
      </transition>-->
    </div>
  </div>
</template>


<script>
export default {
  data() {
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
    checkedAndErrors() {
      if (
        this.tour &&
        this.tour.tour_details &&
        this.shippings.length &&
        this.distances.length &&
        this.stopsGeneral.totalWeight
      ) {
        return true;
      }
      return false;
    },
    isChanged() {
      return this.tour.ship_id !== this.mytour.ship_id;
    },
    stops() {
      return this.tour.stops;
    },
    allowStops() {
      if (!this.tour || !this.tour.stops) {
        return false;
      }
      return this.tour.stops.length > 1;
    },
    stopsGeneral() {
      if (!this.tour || !this.tour.tour_details) {
        return {};
      } else {
        var numberOfPackets = Number(
          this.tour.tour_details.tour_total_packets_number
        );
        var totalTimeOfStops = Number(this.tour.tour_details.tour_total_time);
        var totalDistanceStops = Number(
          this.tour.tour_details.tour_total_distance
        );
        var timePerStop = Number(this.tour.tour_details.tour_average_stop_time);
        var numberOfStops = Number(this.tour.tour_details.number_of_stops);
        var totalWeight = Number(this.tour.tour_details.tour_total_weight);
        return {
          numberOfPackets,
          totalTimeOfStops,
          timePerStop,
          totalDistanceStops,
          numberOfStops,
          totalWeight
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
    saveTourShip(e) {
      // console.log(e);
      if (this.loading) {
        return false;
      }
      this.loading = true;
      var formdata = {
        url: `/api/tours/edit/${this.$route.params.tourId}/tour_ship`,
        data: {
          ship_id: this.mytour.ship_id,
          price: this.mytour.price
        },
        validate: this.$validator,
        successTitle: this.trans("front.touroffers.vehicleChangedTitle"),
        successBody: this.trans("front.touroffers.vehicleChanged"),
        failedValidate: data => {},
        successServer: response => {
          this.tour.ship_id = response.body.ship_id;
          this.tour.price = response.body.price;
          this.loading = false;
        },
        failServer: error => {
          this.loading = false;
        }
      };
      this.$vss.post(formdata);
    }
  },
  components: {
    "tour-pricing": require("../../main/byStop/tourPricing.vue")
  },
  created() {
    this.$http.get("/api/shipping/getAll").then(response => {
      this.shippings = response.body[0];
      this.distances = response.body[1];
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