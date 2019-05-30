<template>
  <div class="container create-order-container with-calendar">
    <div class="form-map-container" style="margin-top:20px;">
      <div class="order-form-wrapper" style="padding-bottom: 20px;">
        <div class="stops-wrapper" v-if="tour&&tour.tour_dates">
          <time-detect
            v-for="(mytime,index) in mytimes"
            :tour="tour"
            :currentMonth="currentMonth"
            v-bind="mytime.props"
            :key="'time-detecting'+index"
          ></time-detect>
          <div class="add-new-package" style="width:100%;display:flex;justify-content:flex-end;">
            <button class="btn btn-success btn-xs" @click="saveTour">
              <img src="/images/arrow-pointing-to-right.svg" :alt="trans('front.bystop.next')">
              <span>{{trans('front.bystop.next')}}</span>
            </button>
          </div>
        </div>
      </div>
      <my-calendar
        v-if="validatedDates"
        :tour="tour"
        :currentMonthTour="currentMonth"
        :accountingDates="mytimes[0].props.dates"
        :paymentDates="mytimes[1].props.dates"
        :testDates="mytimes[2].props.dates"
        :cancelationDates="mytimes[3].props.dates"
      ></my-calendar>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      currentMonth: window.moment().month(),
      tour: {},
      fromServer: false,
      mytimes: [
        {
          props: {
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
            type: "every",
            options: {
              inputs: ["every", "type"],
              conditions: [0, 1, 2, 3, 4]
            },
            dates: {
              startDate: window.moment(new Date().setMinutes(0)),
              every: 1,
              type: "months",
              condition: 5
            },
            headingText: trans("front.accounting.payment")
          }
        },
        {
          props: {
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
              condition: 5
            },
            headingText: trans("front.accounting.test")
          }
        },
        {
          props: {
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
              condition: 4
            },
            headingText: trans("front.accounting.cancelation")
          }
        }
      ]
    };
  },
  computed: {
    validatedDates() {
      if (this.errors && this.errors.items.length > 0) {
        return false;
      }
      return true;
    },
    formData() {
      var toBeSendOrder = {
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
        successServer: data => {
          this.$router.push(
            "/geschaeftskundenportal/tour/laststep/" + this.$route.params.tourId
          );
        }
      };
    },
    accountingDates() {
      return this.mytimes[0].props.dates;
    }
  },
  props: {},
  watch: {
    accountingDates: {
      handler: function(newval, oldval) {
        // if (!this.fromServer) {
        //   this.mytimes[1].props.dates.every = newval.every;
        //   this.mytimes[1].props.dates.type = newval.type;
        //   this.mytimes[1].props.dates.condition = newval.condition;
        // }
      },
      deep: true
    }
  },
  methods: {
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
    },
    saveTour() {
      this.$vss.post(this.formData);
    }
  },
  components: {
    "time-detect": require("./timeDetecting.vue"),
    "my-calendar": require("./calendar/kcalendar.vue")
  },
  created() {
    this.$http
      .get("/api/tours/tour/" + this.$route.params.tourId)
      .then(response => {
        response.data.tour_dates.days = JSON.parse(
          response.data.tour_dates.days
        );
        this.tour = response.data;
        this.setTourCalculations();
      });
  },
  mounted() {
    
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
 