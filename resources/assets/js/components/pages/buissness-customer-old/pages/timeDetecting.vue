<template>
  <div class="stops-wrapper">
    <div class="stops-inputs-head fieldset timing-tour">
      <!-- <div class="legend">{{trans('front.accounting.acctountingPeriod')}}</div> -->
      <div class="heading">{{headingText}}</div>
      <div class="stops-inputs-head-main">
        <input-parent
          v-for="input in myinputs"
          :key="input.model"
          v-bind="input.props"
          v-model="dates[input.model]"
        ></input-parent>
        <input-parent v-bind="condition.props" v-model="dates[condition.model]"></input-parent>
      </div>
      <div class="div">{{nextDay.format('l')}}</div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      conditionObject: {
        0: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l");
        },
        1: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l").endOf("week");
        },
        2: dayBeforeCondition => {
          var expected = window
            .moment(dayBeforeCondition, "l")
            .set({ date: 15 });
          if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
            return window.moment(expected).endOf("month");
          }
          return expected;
        },
        3: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l").endOf("month");
        },
        4: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l").endOf("quarter");
        },
        5: dayBeforeCondition => {
          var expected = window
            .moment(dayBeforeCondition, "l")
            .endOf("year")
            .subtract(0.5, "year");
          if (expected.isBefore(window.moment(dayBeforeCondition, "l"))) {
            return window.moment(expected).endOf("year");
          }
          return expected;
        },
        6: dayBeforeCondition => {
          return window.moment(dayBeforeCondition, "l").endOf("year");
        }
      },

      inputs: [
        {
          props: {
            name: "sender" + trans("front.create.time"),
            placeholder: trans("front.create.chargingTime"),
            // img: '/images/food-scale-tool.svg',
            validate: "required",
            id: "sendertime",
            type: "timePicker",
            minDate: window.moment(new Date().setMinutes(0)).add("2", "hours"),
            dateOnly: true,
            newclasses: {
              "same-line": true
            }
          },
          model: "startDate"
        },
        {
          props: {
            name: "every",
            placeholder: "every",
            validate: "required|decimal:3|min_value:1",
            id: "every",
            newclasses: {
              "same-line": true,
              odd: true
            },

            autoFocus: true
          },
          model: "every"
        },
        {
          props: {
            name: "receiver" + trans("front.create.isCompany"),
            placeholder: trans("front.create.isCompany"),
            // img: '/images/food-scale-tool.svg',
            validate: "required",
            id: "receiverisCompany",
            newclasses: {
              "same-line": true
            },
            type: "select",
            options: [
              {
                value: "days",
                text: "day"
              },
              {
                value: "weeks",
                text: "week"
              },
              {
                value: "months",
                text: "month"
              }
            ]
          },
          model: "type"
        }
      ]
    };
  },
  computed: {
    myinputs() {
      return this.inputs.filter(input => {
        return this.options.inputs.indexOf(input.model) !== -1;
      });
    },
    nextDay() {
      return window.moment(
        this.conditionObject[this.dates.condition](this.dayBeforeCondition)
      );
    },
    dayBeforeCondition() {
      var startDate = window.moment(this.dates.startDate, "l");

      return window.moment(startDate).add(this.dates.every, this.dates.type);
    },
    condition() {
      var input = {
        model: "condition",
        props: {
          name: "receiver" + trans("front.create.isCompany"),
          placeholder: trans("front.create.isCompany"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "receiverisCompany",
          options: this.getOptions(),
          newclasses: {
            "same-line": true
          },
          type: "select"
        }
      };

      return input;
    }
  },
  props: {
    tour: {
      required: true
    },
    dates: {
      required: false,
      default() {
        return {
          startDate: window.moment(new Date().setMinutes(0)),
          every: 0,
          type: "months",
          condition: 3
        };
      }
    },
    options: {
      required: false,
      default() {
        return {
          inputs: ["startDate", "every", "type"],
          conditions: [0, 1, 2, 3, 4, 5, 6]
        };
      }
    },
    headingText: {
      required: true,
      default: "Abrechnungszeitraum"
    }
  },
  watch: {},
  methods: {
    getOptions() {
      var options = [
        {
          text: "same day",
          value: 0
        },
        {
          text: "end of week",
          value: 1
        },

        {
          text: "too 15 of the month, or end of the month",
          value: 2
        },
        {
          text: "end of  month",
          value: 3
        },
        {
          text: "end of quarter",
          value: 4
        },
        {
          text: "half year",
          value: 5
        },
        {
          text: "end of year",
          value: 6
        }
      ];
      var myoptions = options.filter(e => {
        return this.options.conditions.indexOf(e.value) !== -1;
      });
      return myoptions;
    }
  },
  components: {},
  created() {
    this.inputs[0].props.minDate = window.moment(
      this.tour.tour_dates.tour_start_date
    );
    this.dates.startDate = window.moment(this.tour.tour_dates.tour_start_date);
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