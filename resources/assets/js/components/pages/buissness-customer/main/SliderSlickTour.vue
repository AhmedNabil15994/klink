<template>
  <div class="slick-tour-wrapper">
    <div class="slick-tour-side">
      <div class="side-tour-row">
        <input-parent v-bind="inputs[0].props" v-model="tour.tourstartDate"></input-parent>
        <input-parent v-bind="inputs[1].props" v-model="tour.tourStartTime"></input-parent>
      </div>

      <week-days-input v-model="tour.days"></week-days-input>
    </div>
    <div class="tour-slick">
      <slick ref="slick" :options="slickOptions" class="text-slider">
        <img src="/images/stops/stop.png" alt="stopsimage">
        <img src="/images/stops/slick2.png" alt="stopsimage">
      </slick>
    </div>
  </div>
</template>


<script>
import Slick from "vue-slick";
export default {
  data() {
    return {
      slickOptions: {
        arrows: true,
        autoplay: true,
        dots: true
      }
    };
  },
  computed: {
    inputs() {
      return [
        {
          props: {
            name: "TourStart",
            placeholder: trans("front.buissness.tourstartDate"),
            validate: "required",
            id: "tourStart",
            type: "timePicker",
            minDate: window.moment(new Date().setMinutes(0)).add("2", "hours"),
            dateOnly: true,
            newclasses: {
              "tour-date-2": true
            }
          }
        },
        {
          props: {
            name: "TourStart",
            placeholder: trans("front.buissness.tourStartTime"),
            validate: "required",
            id: "tourStartTime",
            type: "timePicker",
            minDate: window.moment(new Date().setHours(0, 0, 0, 0)),
            timeOnly: true,
            newclasses: {
              "tour-date-1": true
            }
          }
        }
      ];
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  methods: {},
  created() {},
  mounted() {
    this.$nextTick(() => {
      $('[data-toggle="tooltip"]').tooltip();
    });
  },
  components: {
    "week-days-input": require("./weekDaysInput.vue"),
    Slick
  }
};
</script>

<style lang="scss">
</style>
/******************* 
*
*
*
*    Ahmed Ali Tahbet
*
*
 ********************/