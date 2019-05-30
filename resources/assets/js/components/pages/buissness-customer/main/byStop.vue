<template>
  <div class="stops-wrapper">
    <div class="stop-tour-wrapper-left">
      <div class="stops-inputs-head fieldset">
        <div class="legend">{{trans('front.bystop.tourInfo')}}</div>
        <div class="head-main-header"></div>

        <div class="stops-inputs-head-main">
          <input-parent
            v-for="input in inputs"
            v-bind="input.props"
            v-model="stopsGeneral[input.model]"
            v-if="(input.if!==true)"
            :key="'input-stop'+input.props.id"
          ></input-parent>
        </div>
      </div>
      <transition name="slide-fade">
        <div class="stops-inputs-head fieldset" v-if="allowStops===false">
          <div class="legend">{{trans('front.bystop.tourDistance')}}</div>
          <div class="head-main-header"></div>

          <div class="stops-inputs-head-main">
            <input-parent
              v-for="input in inputs"
              v-bind="input.props"
              v-model="stopsGeneral[input.model]"
              v-if="(input.if===true&&allowStops===false)"
              :key="'input-stop'+input.props.id"
            ></input-parent>
          </div>
        </div>
      </transition>
    </div>
    <div class="stop-tour-wrapper-right">
      <tour-car
        :tour="tour"
        :stopsGeneral="stopsGeneral"
        v-if="checkedAndErrors"
        :shippings="shippings"
        :distances="distances"
        :stops="stops"
      ></tour-car>
    </div>
    <div class="stops-rows-wrapper">
      <div class="stops-rows-header">
        <checkbox name="terms" v-model="allowStops">{{trans('front.bystop.stopsPermission')}}</checkbox>
      </div>
      <transition-group name="list" tag="div" class="stops-rows-container">
        <stop-row
          v-if="allowStops||index===0"
          v-for=" (stop , index) in stops"
          :key="'stopNumber'+index"
          :index="index"
          :stop="stop"
          @deleteStop="deleteStop"
        ></stop-row>
      </transition-group>
      <div class="add-new-package" v-if="allowStops" style="width:100%;">
        <button class="btn btn-success btn-xs" @click="addNewStop(generateNewStop(), true)">
          <img src="/images/add-new.svg" alt="add new">
          <span>{{trans('front.buissness.addNewStop')}}</span>
        </button>
      </div>
    </div>
    <div class="add-new-package" style="width:100%;display:flex;justify-content:flex-end;">
      <button class="btn btn-success btn-xs" @click="saveTour">
        <img src="/images/arrow-pointing-to-right.svg" :alt="trans('front.bystop.next')">
        <span>{{trans('front.bystop.next')}}</span>
      </button>
    </div>
  </div>
</template>


<script>
import inputs from "./byStop/inputs.js";
export default {
  data() {
    return {
      inputs,
      shippings: [],

      allowStops: true
    };
  },
  computed: {
    checkedAndErrors() {
      if (!this.shippings || this.shippings.length === 0) {
        return false;
      }
      if (this.errors.has("totalweight") || !this.stopsGeneral.totalWeight) {
        return false;
      }
      return true;
    },
    formData() {
      // window.ahmed = this.tour.tourStartTime;
      if (typeof this.tour.tourStartTime === "object") {
        this.tour.tourStartTime = this.tour.tourStartTime.format("hh:mm");
      }
      var toBeSendOrder = {
        tour: this.tour,
        stops: this.allowStops ? this.stops : [this.stops[0]],
        stopsGeneral: this.stopsGeneral,
        allowStops: this.allowStops
      };

      return {
        url: "/api/tours/create/tour",
        data: toBeSendOrder,
        validate: this.$validator,
        successServer: data => {
          this.$router.push(
            "/geschaeftskundenportal/tour/laststep/" + data.body.encrypted
          );
        },
        failedValidate: data => {}
      };
    }
  },
  props: {
    tour: {
      required: true
    },
    stops: { required: true },
    stopsGeneral: { required: true }
  },
  watch: {
    "stopsGeneral.numberOfStops": function(newval, oldval) {
      if (newval < 2) {
        this.$nextTick(() => {
          this.showDeleteWarning();
          this.stopsGeneral.numberOfStops = 2;
        });
        return false;
      } else {
        this.makeStopsGeneral();
      }
    }
  },
  methods: {
    makeStopsGeneral() {
      if (this.stopsGeneral.numberOfStops > this.stops.length) {
        while (this.stops.length < this.stopsGeneral.numberOfStops) {
          this.addNewStop(this.generateNewStop());
        }
      } else {
        this.stops.length = this.stopsGeneral.numberOfStops;
      }
    },
    removeStop(index = false) {
      this.stops.splice(index, 1);
      this.stops;
      this.$nextTick(() => {
        this.stopsGeneral.numberOfStops = this.stops.length;
      });
    },
    showDeleteWarning() {
      this.$snotify.warning(
        this.trans("front.bystop.deleteError"),
        this.trans("front.bystop.deleteErrorHead")
      );
    },
    deleteStop(index) {
      if (this.stops.length <= 2) {
        this.showDeleteWarning();
      } else {
        this.removeStop(index);
      }
    },
    addNewStop(newStop, updateStopsNumber) {
      newStop.stopName = this.trans("front.bystop.stop") + " " + String(this.stops.length + 1);
      this.stops.push(newStop);
      if (updateStopsNumber === true) {
        this.stopsGeneral.numberOfStops = this.stops.length;
      }
    },
    generateNewStop(packageCreatedHere = false, time = "") {
      return {
        location: {
          address: {},
          geometry: {}
        },
        touched: false,
        startTime: window.moment(new Date().setHours(0, 0, 0, 0)),
        loadTime: 3,
        packageType: 0,
        numberOfPackets: 1,
        stopName: "",
        shown: false,
        allowPackages: false
      };
    },
    saveTour() {
      if (this.tour.days.length === 0) {
        this.$snotify.warning(
          trans("front.bystop.dayserror"),
          trans("front.bystop.dayserrorHead")
        );
        return false;
      }
      if (this.allowStops) {
        var notcompletedStops = this.stops.filter(stop => {
          stop.touched = true;
          return !stop.location.address || !stop.location.address.home;
        });
      } else {
        var notcompletedStops =
          this.stops[0].location.address.length === 0 ? [this.stops[0]] : [];
      }
      if (notcompletedStops.length !== 0) {
        this.$validator.validateAll();
        return false;
      }
      this.$vss.post(this.formData);
    }
  },
  components: {
    "stop-row": require("./stopRow.vue"),
    "tour-car": require("./byStop/tourPricing.vue")
  },
  created() {
    this.$http.get("/api/shipping/getAll").then(response => {
      this.shippings = response.body[0];
      this.distances = response.body[1];
    });
  },
  mounted() {
    this.makeStopsGeneral();

    // this.$nextTick(() => {
    //   $(".fieldset").each(function() {
    //     var legendWidth =
    //       $(this)
    //         .children(".legend")
    //         .width() +
    //         20 >
    //       100
    //         ? $(this)
    //             .children(".legend")
    //             .width() + 20
    //         : 100;
    //     $(this).css("min-height", legendWidth);
    //   });
    // });
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