<template>
  <div class="stops-row-vertical">
    <div class="stops-rows-wrapper">
      <div class="stops-rows-header">
        <div
          class="stops-row-header-half"
          data-toggle="tooltip"
          :title="trans('front.touroffers.startDate')"
        >
          <div class="svg-with-text">
            <img src="/images/calendar-day.svg" :alt="trans('front.touroffers.startDate')">
            <span class="svg-text">{{tourStartDate.date()}}</span>
          </div>
          <div class="month-date">{{tourStartDate.format('MMM YYYY')}}</div>
        </div>
        <div class="stops-row-header-half">
          <editable
            style="font-size:16px;"
            v-bind="endDateInput"
            v-show="tourEndDate"
            v-model="tourEndDatee"
          ></editable>
        </div>
        <!-- <div
          class="stops-row-header-half"
          data-toggle="tooltip"
          :title="trans('front.touroffers.startTime')"
        >
          <div class="svg-with-text">
            <img src="/images/stopwatch.svg" :alt="trans('front.touroffers.startTime')">
          </div>
          <div class="month-date">{{tourStratTime}}</div>
        </div>-->
      </div>
      <week-days-input :tour="tour">
        <start-time-edit slot="besideDaysShow" v-if="tour&&tour.tour_dates" :tour="tour"></start-time-edit>
      </week-days-input>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      tourEndDatee: ""
    };
  },
  computed: {
    endDateInput() {
      return {
        name: "tourEndDate",
        placeholder: this.trans("front.touroffers.endDate"),
        validate: "required",
        id: "tourEndDate",
        type: "timePicker",

        dateOnly: true,
        newclasses: {
          "tour-date-1": true
        },
        editable: {
          img: "/images/endDate.svg",
          // after: "Uhr",
          saveData: (newval, afterFinish) => {
            newval = window.moment(newval, "l");
            if (newval.format("l") === this.tourEndDatee.format("l")) {
              afterFinish();
              return false;
            }
            newval = newval.format();
            this.saveMillistones("tour_finish_date", newval, response => {
              this.tour.tour_dates = response.tour_dates;
              afterFinish();
            });
          },
          toBeShown: this.tourEndDate
        }
      };
    },
    tourEndDate() {
      if (!this.tour || !this.tour.tour_dates) {
        return false;
      }
      var mydate = window.moment(
        this.tour.tour_dates.tour_finish_date,
        "YYYY-MM-DD"
      );
      // console.log(mydate.isValid());
      if (
        !this.tour.tour_dates.tour_finish_date ||
        mydate.isValid() === false
      ) {
        this.tourEndDatee = window.moment();
        return this.trans("front.touroffers.unlimited");
      }
      this.tourEndDatee = mydate;
      return mydate.format("DD MMM YYYY");
    },
    tourStartDate() {
      if (!this.tour || !this.tour.tour_dates) {
        return window.moment();
      }
      return window.moment(this.tour.tour_dates.tour_start_date);
    },
    tourStratTime() {
      if (!this.tour || !this.tour.tour_dates) {
        return "";
      }
      return window
        .moment(this.tour.tour_dates.tour_start_time, "HH:mm:ss")
        .format("hh:mm A");
    }
  },
  props: {
    tour: {
      required: true,
      type: Object
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
  components: {
    "week-days-input": require("./weekDaysInput.vue"),
    "start-time-edit": require("./startTimeEdit.vue")
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