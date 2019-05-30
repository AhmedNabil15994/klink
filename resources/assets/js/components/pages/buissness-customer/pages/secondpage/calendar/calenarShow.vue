<template>
  <div class="klink-calendar-object" id="calendar-show">
    <h3 class="heading">
      <img src="/images/calendar-with-spring-binder-and-date-blocks.svg">
      <img
        src="/images/close.svg"
        class="close"
        data-toggle="tooltip"
        :title="trans('front.accounting.close')"
        @click="closeCalendarObject"
      >
      <span>{{currentDay}}</span>
    </h3>
  </div>
</template>


<script>
export default {
  data() {
    return {};
  },
  computed: {},
  props: {
    currentDay: {
      required: false,
      default: ""
    },
    active: {
      required: false,
      default: false
    },
    disabled: {
      required: false,
      default: false
    },
    tourDate: {
      required: false,
      default: false
    },
    testDate: {
      required: false,
      default: false
    },
    endOfTest: {
      required: false,
      default: false
    },
    cancelationDate: {
      required: false,
      default: false
    }
  },
  watch: {},
  methods: {
    closeCalendarObject() {
      this.$parent.showDayDetails = false;
    }
  },
  components: {},
  created() {},
  mounted() {
    $(window).click(e => {
      if (this.$parent.showDayDetails) {
        var isHere =
          $(e.target).parents("#calendar-show").length === 1 ||
          (e.target.id && e.target.id === "calendar-show");
        if (!isHere) {
          this.closeCalendarObject();
        }
      }
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