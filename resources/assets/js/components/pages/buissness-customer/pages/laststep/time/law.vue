<template>
  <div class="stops-inputs-head-main">
    <div class="operation-div">
      <img src="/images/close.svg" @click="$parent.close" alt="close">
    </div>
    <div class="heading-text">{{headingText}}</div>
    <div class="inputs-wrapper">
      <input-parent
        v-for="input in myinputs"
        :key="input.model"
        v-bind="input.props"
        v-model="dates[input.model]"
      ></input-parent>
      <input-parent v-bind="condition.props" v-model="dates[condition.model]"></input-parent>
    </div>
  </div>
</template>


<script>
import conditionObject from "../conditionObject.js";

export default {
  data() {
    return {
      conditionObject
    };
  },
  computed: {
    minDate() {
      return window.moment.duration(this.mins.days, "days").humanize();
    },
    myinputs() {
      return this.inputs.map(input => {
        if (input.model === "every") {
          input.props.validate =
            "required|numeric|min_value:" +
            this.getMinValue(this.dates.type) +
            "|max_value:" +
            this.getMaxValue(this.dates.type);
        }
        return input;
      });
    },
    condition() {
      var input = {
        model: "condition",
        props: {
          name: "select" + this.$parent.headingText,
          placeholder: trans("front.create.isCompany"),
          // img: '/images/food-scale-tool.svg',
          validate: "required",
          id: "receiverisCompany",
          newclasses: {
            "large-input": true
          },
          type: "select"
        }
      };
      input.props.options = this.getCondtions();
      var FoundOption = input.props.options.some(option => {
        return option.value === this.dates.condition;
      });
      if (!FoundOption) {
        this.dates.condition = input.props.options[0].value;
      }

      return input;
    }
  },
  watch: {},
  methods: {
    getMaxValue(type) {
      var maxes = this.maxes;
      this.maxChanges(maxes[type]);
      return maxes[type];
    },
    getMinValue(type) {
      return this.mins[type];
    },
    getCondtions() {
      var conditionOptions = this.conditionObject;
      var conditions = conditionOptions.map(e => {
        return e.options;
      });
      return conditions;
    }
  },
  components: {},
  created() {},
  mounted() {},
  props: {
    headingText: {
      required: true
    },
    inputs: {
      required: true,
      type: Array
    },
    currentMonth: {
      required: true
    },
    dates: {
      required: true,
      type: Object
    },
    maxes: {
      required: false,
      type: Object,
      default: () => {
        return {
          days: window.moment
            .duration(10, "years")
            .as("days")
            .toFixed(),
          weeks: window.moment
            .duration(10, "years")
            .as("weeks")
            .toFixed(),
          months: window.moment
            .duration(10, "years")
            .as("months")
            .toFixed()
        };
      }
    },
    mins: {
      required: false,
      type: Object,
      default: () => {
        return {
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
        };
      }
    },
    maxChanges: {
      required: false,
      type: Function,
      default: anything => {
        return null;
      }
    }
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