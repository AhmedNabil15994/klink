<template>
  <div class="stops-wrapper">
    <div class="stops-inputs-head fieldset timing-tour">
      <!-- <div class="legend">{{trans('front.accounting.acctountingPeriod')}}</div> -->
      <div class="stops-inputs-head-main">
        <input-parent
          v-for="input in inputs"
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
      dates: {
        startDate: window.moment(new Date().setMinutes(0)),
        every: 1,
        type: "days",
        condition: ""
      },
      inputs: [
        // {
        //   props: {
        //     name: "sender" + trans("front.create.time"),
        //     placeholder: trans("front.create.chargingTime"),
        //     // img: '/images/food-scale-tool.svg',
        //     validate: "required",
        //     id: "sendertime",
        //     type: "timePicker",
        //     minDate: window.moment(new Date().setMinutes(0)).add("2", "hours"),
        //     dateOnly: true,
        //     newclasses: {
        //       "same-line": true
        //     }
        //   },
        //   model: "startDate"
        // },
        {
          props: {
            name: "every",
            placeholder: "every",
            validate: "required|decimal:3|min_value:1",
            id: "weightInput",
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
                text: "days"
              },
              {
                value: "weeks",
                text: "weeks"
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
    nextDay() {
      var condition = this.dates.condition.split("-");
      var param =
        condition[1].indexOf('{"') === 0
          ? JSON.parse(condition[1])
          : condition[1];

      return window.moment(this.dayBeforeCondition, "l")[condition[0]](param);
    },
    dayBeforeCondition() {
      var startDate = window.moment(this.dates.startDate, "l");
      console.log(startDate.format("l"), "here");
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
          newclasses: {
            "same-line": true
          },
          type: "select"
        }
      };
      if (this.dates.type === "days") {
        input.props.options = this.getDayOptions();
      }
      if (this.dates.type === "weeks") {
        input.props.options = this.getWeeksOptions();
      }
      if (this.dates.type === "months") {
        input.props.options = this.getMonthOptions();
      }
      this.dates.condition = input.props.options[0].value;
      return input;
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    getDayOptions() {
      return [
        {
          text: "same day",
          value: "endOf-day"
        }
      ];
    },
    getWeeksOptions() {
      return [
        {
          text: "same day",
          value: "endOf-day"
        },
        {
          text: "start of week",
          value: "startOf-week"
        },
        {
          text: "end of week",
          value: "endOf-week"
        }
      ];
    },
    getMonthOptions() {
      return [
        {
          text: "same day",
          value: "endOf-day"
        },
        {
          text: "end of month",
          value: "endOf-month"
        },
        {
          text: "start of month",
          value: "startOf-month"
        },
        {
          text: "15th day of the month",
          value: 'set-{"date":15}'
        }
      ];
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