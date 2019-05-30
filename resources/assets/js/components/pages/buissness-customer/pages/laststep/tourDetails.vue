<template>
  <div class="stops-row-vertical" v-if="tour&&tour.tour_details">
    <div class="stops-rows-wrapper">
      <editable v-bind="weightProps" v-model="tour.tour_details.tour_total_weight"></editable>
      <editable v-bind="packetsProps" v-model="tour.tour_details.tour_total_packets_number"></editable>
      <editable v-bind="averageStopTimeProps" v-model="tour.tour_details.tour_average_stop_time"></editable>
      <editable v-bind="tourTotalTimeProps" v-model="tour.tour_details.tour_total_time"></editable>
      <editable v-bind="tourNumberOfStopsProps" v-model="tour.tour_details.number_of_stops"></editable>
    </div>
  </div>
</template>


<script>
import inputs from "../../main/byStop/inputs.js";
export default {
  data() {
    return {
      inputs
    };
  },
  computed: {
    isDynamic() {
      if (this.tour.stops && this.tour.stops.length > 1) {
        return true;
      }
      return false;
    },
    minTotalTime() {
      return (
        this.tour.tour_details.number_of_stops *
        this.tour.tour_details.tour_average_stop_time
      );
    },
    tourNumberOfStopsProps() {
      return Object.assign(this.inputs[0].props, {
        editable: {
          img: "/images/threemarkers.svg",
          after: "",
          saveData: (newval, afterFinish) => {
            this.saveMillistones("number_of_stops", newval, response => {
              this.tour.tour_details = response.tour_details;
              // this.tour.price = response.price;
              afterFinish();
            });
          },
          disabled: this.isDynamic,
          disabledMsg: {
            head: trans("front.touroffers.disabledMsgHead"),
            body: trans("front.touroffers.disabledMsgBody")
          }
        }
      });
    },
    tourTotalTimeProps() {
      return Object.assign(this.inputs[4].props, {
        validate: "required|decimal|min_value:" + this.minTotalTime,
        editable: {
          img: "/images/stopwatch.svg",
          after: "(min)",
          saveData: (newval, afterFinish) => {
            this.saveMillistones("tour_total_time", newval, response => {
              this.tour.tour_details = response.tour_details;
              // this.tour.price = response.price;
              afterFinish();
            });
          },
          disabled: this.isDynamic,
          disabledMsg: {
            head: trans("front.touroffers.disabledMsgHead"),
            body: trans("front.touroffers.disabledMsgBody")
          }
        }
      });
    },
    averageStopTimeProps() {
      return Object.assign(this.inputs[2].props, {
        editable: {
          img: "/images/watingOrder.svg",
          after: "(min)",
          saveData: (newval, afterFinish) => {
            this.saveMillistones("tour_average_stop_time", newval, response => {
              this.tour.tour_details = response.tour_details;
              this.tour.price = response.price;
              afterFinish();
            });
          }
        }
      });
    },
    packetsProps() {
      return Object.assign(this.inputs[3].props, {
        editable: {
          img: "/images/boxes2.svg",
          after: "",
          saveData: (newval, afterFinish) => {
            this.saveMillistones(
              "tour_total_packets_number",
              newval,
              response => {
                this.tour.tour_details = response.tour_details;
                afterFinish();
              }
            );
          }
        }
      });
    },
    weightProps() {
      return Object.assign(this.inputs[1].props, {
        editable: {
          img: "/images/weight-tool.svg",
          after: "(KG)",
          saveData: (newval, afterFinish) => {
            return this.saveMillistones(
              "tour_total_weight",
              newval,
              response => {
                this.tour.ship_id = response.ship_id;
                this.tour.tour_ship = response.tour_ship;
                this.tour.tour_details = response.tour_details;
                afterFinish();
              }
            );
          }
        }
      });
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    saveMillistones(millistone, newval, successServerFunction) {
      var mydata = {};
      mydata[millistone] = newval;
      var formdata = {
        url: `/api/tours/edit/${this.$route.params.tourId}/tour_details`,
        data: mydata,
        validate: this.$validator,

        failedValidate: data => {
          successServerFunction(this.tour);
        },
        successServer: response => {
          successServerFunction(response.body);
        },
        failServer: error => {
          successServerFunction(this.tour);
          console.log(error);
        }
      };
      this.$vss.post(formdata);
    }
  },
  components: {},
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