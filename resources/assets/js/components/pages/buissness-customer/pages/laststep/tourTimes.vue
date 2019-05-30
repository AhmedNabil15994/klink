<template>
  <div class="stops-row-vertical">
    <div class="stops-rows-wrapper times-row-wrapper">
      <my-calendar
        v-if="validatedDates&&!changingDates"
        :tour="tour"
        :currentMonthTour="currentMonth"
        :accountingDates="mytimes[0].props.dates"
        :paymentDates="mytimes[1].props.dates"
        :testDates="mytimes[2].props.dates"
        :cancelationDates="mytimes[3].props.dates"
      ></my-calendar>
    </div>
    <div style="background:#f5f6f7;" class="stops-rows-wrapper times-row-wrapper">
      <div class="times-rows">
        <time-detect
          v-for="(mytime,index) in mytimes"
          :tour="tour"
          :currentMonth="currentMonth"
          v-bind="mytime.props"
          :key="'time-detecting'+index"
        ></time-detect>
      </div>
    </div>
    <!-- <div>{{timesWatcher}}</div> -->
  </div>
</template>


<script>
export default {
  data() {
    return {
      changingDates: false,
      activeIndex: 0,
      currentMonth: window.moment().month(),
      mytimes: [
        {
          props: {
            index: 0,
            type: "every",
            options: {
              inputs: ["type"],
              conditions: [0, 1, 2, 3]
            },
            dates: {
              startDate: window.moment(new Date().setMinutes(0)),
              every: 0,
              type: "months",
              condition: 4,
              nextDay: null
            },
            headingText: trans("front.accounting.acctountingPeriod")
          }
        },
        {
          props: {
            index: 1,
            type: "every",
            options: {
              inputs: ["every", "type"],
              conditions: [0, 1, 2, 3, 4]
            },
            dates: {
              startDate: window.moment(new Date().setMinutes(0)),
              every: 1,
              type: "months",
              condition: 5,
              nextDay: null
            },
            headingText: trans("front.accounting.payment")
          }
        },
        {
          props: {
            index: 2,
            type: "law",
            options: {
              inputs: ["every", "type"],
              maxes: {
                days: window.moment
                  .duration(3, "months")
                  .as("days")
                  .toFixed(),
                weeks: window.moment
                  .duration(3, "months")
                  .as("weeks")
                  .toFixed(),
                months: window.moment
                  .duration(3, "months")
                  .as("months")
                  .toFixed()
              },
              mins: {
                days: 0,
                weeks: 0,
                months: 0
              },
              conditions: [0, 1, 2, 3, 4, 5, 6]
            },
            dates: {
              startDate: window.moment(new Date().setMinutes(0)),
              every: 2,
              type: "weeks",
              condition: 5,
              nextDay: null
            },
            headingText: trans("front.accounting.test")
          }
        },
        {
          props: {
            index: 3,
            type: "law",
            options: {
              inputs: ["every", "type"],
              conditions: [0, 1, 2, 3, 4, 5, 6],
              mins: {
                days: 0,
                weeks: 0,
                months: 0
              }
            },
            dates: {
              startDate: window.moment(new Date().setMinutes(0)),
              every: 4,
              type: "weeks",
              condition: 4,
              nextDay: null
            },
            headingText: trans("front.accounting.cancelation")
          }
        }
      ]
    };
  },
  computed: {
    // timesWatcher() {
    //   return [
    //     this.mytimes[0].props.dates.nextDay,
    //     this.mytimes[1].props.dates.nextDay,
    //     this.mytimes[2].props.dates.nextDay,
    //     this.mytimes[3].props.dates.nextDay
    //   ];
    // },
    formData() {
      var toBeSendOrder = {
        formula: true,
        accounting: {
          key: 0,
          values: this.mytimes[0].props.dates
        },
        payment: {
          key: 1,
          values: this.mytimes[1].props.dates
        },
        test: {
          key: 2,
          values: this.mytimes[2].props.dates
        },
        cancelation: {
          key: 3,
          values: this.mytimes[3].props.dates
        }
      };

      return {
        url: "/api/tours/save/dates/" + this.$route.params.tourId,
        data: toBeSendOrder,
        validate: this.$validator,

        failedValidate: data => {},
        successServer: response => {
          this.tour.calculations = response.body.calculations;
          this.setTourCalculations();
        }
      };
    },
    validatedDates() {
      if (!this.tour || !this.tour.calculations) {
        return false;
      }
      for (var field in this.fields) {
        if (this.fields[field]["valid"] === false) {
          return false;
        }
      }
      return true;
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {
    // "tour.tour_dates": {
    //   handler: function(newval) {
    //     this.changingDates = true;
    //     this.$nextTick(() => {
    //       this.changingDates = false;
    //     });
    //   },
    //   deep: true
    // }
    // timesWatcher: {
    //   handler: function(newval, oldval) {
    //     console.log(newval, oldval);
    //     if (oldval[0] && oldval[0] !== null) {
    //       this.$nextTick(() => {
    //         var changed = this.timesWatcher.some((val, index) => {
    //           return val !== newval[index];
    //         });
    //         console.log(changed);
    //         this.saveTour();
    //       });
    //     }
    //   },
    //   deep: true
    // }
  },
  methods: {
    saveTour() {
      var types = ["days", "weeks", "months"];
      var isChanged = this.tour.calculations.some(calc => {
        return (
          this.mytimes[calc.type].props.dates.every !== calc.every ||
          this.mytimes[calc.type].props.dates.type !== types[calc.time] ||
          this.mytimes[calc.type].props.dates.condition !== calc.period
        );
      });
      if (isChanged) {
        this.$vss.post(this.formData);
      }
    },
    setTourCalculations() {
      if (
        this.tour &&
        this.tour.calculations &&
        this.tour.calculations.length === 4
      ) {
        var types = ["days", "weeks", "months"];
        this.fromServer = true;
        this.tour.calculations.map(calc => {
          this.mytimes[calc.type].props.dates.every = calc.every;
          this.mytimes[calc.type].props.dates.type = types[calc.time];
          this.mytimes[calc.type].props.dates.condition = calc.period;
        });
        this.$nextTick(() => {
          this.fromServer = false;
        });
      }
    }
  },
  components: {
    "my-calendar": require("../secondpage/calendar/kcalendar.vue"),
    "time-detect": require("./timeDetecting.vue")
  },
  created() {
    this.setTourCalculations();
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