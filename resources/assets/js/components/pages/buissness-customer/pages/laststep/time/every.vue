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
    myinputs() {
      return this.inputs.map(input => {
        if (input.model === "every") {
          input.props.validate =
            "required|numeric|min_value:0|max_value:" +
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
      if (this.dates.type === "days") {
        input.props.options = this.getCondtions([0]);
      }
      if (this.dates.type === "weeks") {
        input.props.options = this.getCondtions([1, 2]);
      }
      if (this.dates.type === "months") {
        input.props.options = this.getCondtions([3, 5, 4]);
      }
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
    getCondtions(options = [0]) {
      var conditionOptions = this.conditionObject.filter((e, index) => {
        return options.indexOf(index) !== -1;
      });
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
      default: () => {
        return {
          days: window.moment
            .duration(60, "days")
            .as("days")
            .toFixed(),
          weeks: window.moment
            .duration(60, "days")
            .as("weeks")
            .toFixed(),
          months: window.moment
            .duration(60, "days")
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
    },
    headingText: {
      required: true
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