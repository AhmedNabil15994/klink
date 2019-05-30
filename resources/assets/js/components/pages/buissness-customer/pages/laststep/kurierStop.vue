<template>
  <div class="kurier-offer stop-show">
    <div class="klink-offer-head">
      <div class="klink-offer-head-item">
        <kurier-stop-number
          data-toggle="tooltip"
          :title="trans('front.touroffers.stopindex')"
          style="min-width:30px;"
        >{{index+1}}</kurier-stop-number>
        <span>
          <span style="margin-left:0px;font-weight:bold;" class="stop-name">
            <editable style="margin:0;" v-bind="tourStopNameProps" v-model="stop.name"></editable>
          </span>
        </span>
      </div>
      <div class="klink-offer-head-item text-right">
        <span style="padding-right:5px;">
          <editable v-bind="stopProps" v-model="stop.stop_time"></editable>
        </span>
      </div>
    </div>
    <div :class="{'klink-offer-body':true,'active':true}">
      <transition
        name="slide"
        enter-active-class="animated slideInDown"
        leave-active-class="animated slideOutUp"
      >
        <div v-show="true" class="kurier-stop-body">{{getStopAddress(stop)}}</div>
      </transition>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      ahmed: 0
    };
  },
  computed: {
    tourStopNameProps() {
      return {
        name: "stop" + trans("front.buissness.stopName") + this.stop.id,
        placeholder: trans("front.buissness.stopName"),
        // img: '/images/food-scale-tool.svg',
        validate: "required",
        id: "stopName" + this.stop.id,
        editable: {
          img: "",
          after: "",
          saveData: (newval, afterFinish) => {
            this.saveMillistones("stop_name", newval, response => {
              this.tour.stops = response.stops;

              afterFinish();
            });
          }
        }
      };
    },
    stopProps() {
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
          saveData: (newval, afterFinish) => {
            this.saveMillistones("stop_time", newval, response => {
              this.tour.stops = response.stops;
              this.tour.price = response.price;
              this.tour.tour_details = response.tour_details;
              this.tour.tour_dates = response.tour_dates;
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
    saveMillistones(millistone, newval, successServerFunction) {
      var mydata = {
        stop_id: this.stop.id
      };
      mydata[millistone] = newval;
      var formdata = {
        url: `/api/tours/edit/${this.$route.params.tourId}/tour_details`,
        data: mydata,
        validate: this.$validator,

        failedValidate: data => {},
        successServer: response => {
          successServerFunction(response.body);
        },
        failServer: error => {
          // console.log(error);
        }
      };
      this.$vss.post(formdata);
    },
    getStopAddress(stop) {
      if (!stop || !stop.stop_address) {
        return "";
      }
      var address = stop.stop_address;
      return (
        address.street +
        " " +
        address.home +
        ", " +
        address.city +
        ", " +
        address.region +
        ", " +
        address.country.code
      );
    }
  },
  components: {
    "kurier-stop-number": require("./helpers/kurierNumber.vue")
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