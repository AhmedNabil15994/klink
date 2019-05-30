<template>
  <div :id="'timeDetectingParent'+index" :class="{'timing-row':true,'active':activeInputs}">
    <!-- <div class="legend">{{trans('front.accounting.acctountingPeriod')}}</div> -->
    <div :class="{'heading':true,'active':activeInputs}">
      <div class="heading-text">{{headingText}}</div>
      <div class="heading-body">
        <span class="date-value" @click="activateIndex">{{nextDay.format('LL')}}</span>
        <span
          data-toggle="tooltip"
          :title="trans('front.touroffers.soOnTitle')"
          v-if="type==='every'"
        >{{trans('front.touroffers.soOn')}}</span>
      </div>
    </div>
    <transition
      name="zoom"
      enter-active-class="animated zoomIn"
      leave-active-class="animated zoomOut"
      v-if="type==='every'"
    >
      <time-every
        :currentMonth="currentMonth"
        v-show="activeInputs"
        :inputs="myinputs"
        :dates="dates"
        :maxes="options.maxes"
        :maxChanges="maxChanges"
        :headingText="headingText"
      ></time-every>
    </transition>
    <transition
      name="zoom"
      enter-active-class="animated zoomIn"
      leave-active-class="animated zoomOut"
      v-else-if="type==='law'"
    >
      <time-law
        :currentMonth="currentMonth"
        v-show="activeInputs"
        :inputs="myinputs"
        :dates="dates"
        :maxes="options.maxes"
        :mins="options.mins"
        :maxChanges="maxChanges"
        :headingText="headingText"
      ></time-law>
    </transition>
    <div
      v-if="ShowError==='min_every'"
    >{{trans('front.accounting.min_date_validation').replace(':attribute',headingText)}}</div>

    <div
      v-else-if="ShowError==='max_every'"
    >{{trans('front.accounting.max_date_validation').replace(':attribute',headingText).replace(':period',maxText)}}</div>
    <div v-else-if="ShowError==='true'">{{errors.first('every'+headingText)}}</div>
  </div>
</template>


<script>
import conditionObject from "./conditionObject.js";
export default {
  data() {
    return {
      conditionObject,
      maxText: "",
      isShown: false,
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
              "same-line": true,
              "every-small": true
            }
          },
          model: "startDate"
        },
        {
          props: {
            name: "every",
            placeholder: "every",
            validate: "required|decimal:3",
            id: "every",
            newclasses: {
              "same-line": true,
              "every-small": true
            },

            autoFocus: true
          },
          model: "every"
        },
        {
          props: {
            name: "period",
            placeholder: trans("front.accounting.period"),
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
    maxDate() {},
    activeInputs() {
      return this.isShown && this.$parent.activeIndex === this.index;
    },
    ShowError() {
      if (this.errors.has("every" + this.headingText)) {
        var error = this.errors.items.filter(myerror => {
          return myerror.field === "every" + this.headingText;
        });
        if (error.length < 1) {
          return "";
        }
        error = error[0];
        if (error.rule === "min_value") {
          return "min_every";
        } else if (error.rule === "max_value") {
          return "max_every";
        } else {
          return "true";
        }
      }
      return "";
    },
    myinputs() {
      var inputs = this.inputs.filter(input => {
        return this.options.inputs.indexOf(input.model) !== -1;
      });
      inputs = inputs.map(input => {
        input.props.name = input.props.name + this.headingText.replace(" ", "");
        input.props.id = input.props.id + this.headingText.replace(" ", "");

        return input;
      });
      return inputs;
    },
    nextDay() {
      var nextDay = window.moment(
        this.conditionObject[this.dates.condition]["every"](
          this.dayBeforeCondition
        )
      );
      this.dates.nextDay = nextDay.format("l");
      return nextDay;
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
    type: {
      required: false,
      default: "law"
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
    },
    currentMonth: {
      required: true
    },
    index: {
      required: true
    }
  },
  watch: {},
  methods: {
    activateIndex() {
      this.isShown = true;
      this.$parent.activeIndex = this.index;
    },
    close() {
      this.isShown = false;
      this.$parent.saveTour();
    },
    maxChanges(newduration) {
      this.maxText = window.moment
        .duration(Number(newduration), this.dates.type)
        .humanize();
    },
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
  components: {
    "time-every": require("./time/every.vue"),
    "time-law": require("./time/law.vue")
  },
  created() {
    this.inputs[0].props.minDate = window.moment(
      this.tour.tour_dates.tour_start_date
    );
    var days = this.tour.tour_dates.days;
    if (typeof days === "string") {
      days = JSON.parse(days);
    }
    this.dates.startDate = window
      .moment(this.tour.tour_dates.tour_start_date)
      .day(days);
  },
  mounted() {
    $(window).click(e => {
      if (this.activeInputs) {
        if (
          $(e.target).parents("#timeDetectingParent" + this.index).length ===
            0 &&
          e.target.id !== "timeDetectingParent"
        ) {
          this.close();
        }
      }
    });
  },
  inject: {
    $validator: "$validator"
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