<template>
  <div class="side-tour-row">
    <div
      class="side-tour-span"
      data-toggle="tooltip"
      :title="trans('front.buissness.tourDays')"
    >{{trans('front.buissness.tourDays')}}</div>
    <div class="week-days">
      <div
        v-for="(day,index) in days"
        v-if="index!==6&&index!==5"
        data-toggle="tooltip"
        :title="day.dayName"
        @click="activateDay(day,index)"
        :class="{'day':true,'active':content.indexOf(index)!==-1}"
        :key="'day'+index"
      >{{day.shortCut}}</div>
    </div>
    <div class="week-days">
      <div
        v-for="(day,index) in days"
        v-if="index===6||index===5"
        data-toggle="tooltip"
        :title="day.dayName"
        @click="activateDay(day,index)"
        :class="{'day':true,'active':content.indexOf(index)!==-1}"
        :key="'day'+index"
      >{{day.shortCut}}</div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      content: this.value
    };
  },
  computed: {
    days() {
      var weekDaysNames = moment.weekdays(true);
      var weekDaysShort = moment.weekdaysMin(true);
      var days = weekDaysNames.map((day, index) => {
        return {
          dayName: day,
          shortCut: weekDaysShort[index]
        };
      });
      return days;
    }
  },
  props: {
    value: {
      required: true,
      type: Array
    }
  },
  watch: {
    value(newval) {
      if (this.content !== newval) {
        this.content = newval;
      }
    }
  },
  methods: {
    handleInput() {
      this.$emit("input", this.content);
    },
    activateDay(date, index) {
      if (this.content.indexOf(index) !== -1) {
        this.content = this.content.filter(day => {
          return day !== index;
        });
        this.content.sort();
      } else {
        this.content.push(index);
        this.content.sort();
      }

      this.handleInput();
    }
  },
  components: {},
  created() {},
  mounted() {
    this.$nextTick(() => {
      $('[data-toggle="tooltip"]').tooltip();
    });
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