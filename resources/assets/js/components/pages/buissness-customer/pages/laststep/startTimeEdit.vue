<template>
  <div class="start-end-time-wrapper">
    <div class="start-time-div">
      <div class="start-time-heading">{{trans('front.touroffers.startTime')}}</div>
      <div class="start-time-content">
        <div class="start-time-img">
          <img
            src="/images/stopwatch.svg"
            :alt="trans('front.touroffers.startTime')"
            :title="trans('front.touroffers.startTime')"
            data-toggle="tooltip"
          >
        </div>
        <div class="start-time-val">
          <editable v-bind="startTimeProps" v-show="tourStratTime" v-model="tourStartTimee"></editable>
        </div>
      </div>
    </div>
    <div class="start-time-div">
      <div class="start-time-heading">{{endTimeText}}</div>
      <div class="start-time-content">
        <div class="start-time-img">
          <img
            src="/images/stopwatch.svg"
            :alt="endTimeText"
            :title="endTimeText"
            data-toggle="tooltip"
          >
        </div>
        <div class="start-time-val">
          <editable v-bind="endTimeProps" v-show="tourEndTime" v-model="tourEndTimee"></editable>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      tourStartTimee: "",
      tourEndTimee: ""
    };
  },
  computed: {
    tourStratTime() {
      if (!this.tour || !this.tour.tour_dates) {
        return "";
      }
      this.tourStartTimee = window.moment(
        this.tour.tour_dates.tour_start_time,
        "HH:mm:ss"
      );

      return window
        .moment(this.tour.tour_dates.tour_start_time, "HH:mm:ss")
        .format("HH:mm");
    },
    tourEndTime() {
      if (!this.tour || !this.tour.tour_dates) {
        return false;
      }
      this.tourEndTimee = window.moment(
        this.tour.tour_dates.tour_finish_time,
        "HH:mm:ss"
      );
      return window
        .moment(this.tour.tour_dates.tour_finish_time, "HH:mm:ss")
        .format("HH:mm");
    },
    endTimeText() {
      if (
        window
          .moment(this.tour.tour_dates.tour_finish_time, "HH:mm:ss")
          .isBefore(
            window
              .moment(this.tour.tour_dates.tour_start_time, "HH:mm:ss")
              .add(this.tour.tour_details.tour_total_time, "minutes")
          )
      ) {
        return trans("front.touroffers.endTimeNexDay");
      }
      return trans("front.buissness.tourEndTime");
    },
    endTimeProps() {
      return {
        name: "tourEnd",
        placeholder: this.endTimeText,
        validate: "required",
        id: "tourEndTime",
        type: "timePicker",

        timeOnly: true,
        newclasses: {
          "tour-date-1": true
        },
        editable: {
          img: "/images/stopwatch.svg",
          after: "Uhr",
          saveData: (newval, afterFinish) => {
            this.saveMillistones("tour_finish_time", newval, response => {
              this.tour.tour_dates = response.tour_dates;
              afterFinish();
            });
          },
          toBeShown: this.tourEndTime
        }
      };
    },
    startTimeProps() {
      return {
        name: "TourStart",
        placeholder: trans("front.buissness.tourStartTime"),
        validate: "required",
        id: "tourStartTime",
        type: "timePicker",
        minDate: window.moment(new Date().setHours(0, 0, 0, 0)),
        timeOnly: true,
        newclasses: {
          "tour-date-1": true
        },
        editable: {
          img: "/images/stopwatch.svg",
          after: "Uhr",
          saveData: (newval, afterFinish) => {
            this.saveMillistones("tour_start_time", newval, response => {
              this.tour.tour_dates = response.tour_dates;
              afterFinish();
            });
          },
          toBeShown: this.tourStratTime
        }
      };
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

        failedValidate: data => {},
        successServer: response => {
          successServerFunction(response.body);
        },
        failServer: error => {
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