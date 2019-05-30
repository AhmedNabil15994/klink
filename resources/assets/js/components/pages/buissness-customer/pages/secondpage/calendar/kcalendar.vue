<template>
  <div class="order-info-form">
    <div class="klink-calendar-body">
      <div class="klink-calendar-head">
        <img
          src="/images/chevron-arrow-up.svg"
          class="prev"
          data-toggle="tooltip"
          @click="ChangeCurrent(-1)"
          alt="prev"
        >
        <span>{{currentMonth.format('MMMM-YYYY')}}</span>
        <img
          src="/images/chevron-arrow-up.svg"
          class="next"
          data-toggle="tooltip"
          @click="ChangeCurrent(1)"
          alt="next"
        >
      </div>
      <div class="klink-week header">
        <div class="klink-day" v-for="myDay in weekDays" :key="'head-day'+myDay">{{myDay}}</div>
      </div>
      <div class="klink-week" v-for="week in weeks" :key="'calendar-week-'+week">
        <div
          @click="clickedDate(...arguments,weekDay,weekDayIndex,currentMonth)"
          :class="getClassDay(weekDay,weekDayIndex,currentMonth)"
          :key="'weekDay'+weekDay"
          v-for="(weekDay,weekDayIndex) in getWeekDays(week)"
        >
          <span>{{weekDay.date()}}</span>
          <div class="day-image top">
            <img
              src="/images/delivery-truck.svg"
              alt="has trip"
              data-toggle="tooltip"
              :title="isTest(weekDay,weekDayIndex) ? trans('front.accounting.tripHereWithTest'):trans('front.accounting.tripHere')"
              v-show="hasAtrip(weekDay,weekDayIndex,true)"
            >
            <img
              src="/images/invoice.svg"
              alt="has bill"
              data-toggle="tooltip"
              :title="trans('front.accounting.invoiceHere')"
              v-show="hasInvionce(weekDay,weekDayIndex)"
            >
          </div>
          <div class="day-image bottom">
            <img
              src="/images/EuroCoin.svg"
              alt="has bill"
              data-toggle="tooltip"
              :title="trans('front.accounting.invoiceHere')"
              v-show="hasPayment(weekDay,weekDayIndex)"
            >
          </div>
        </div>
      </div>
      <transition
        name="zoom"
        enter-active-class="animated zoomIn"
        leave-active-class="animated zoomOut"
      >
        <calendar-show v-show="showDayDetails" v-bind="shownDetails"></calendar-show>
      </transition>
    </div>
  </div>
</template>


<script>
import conditionObject from "../conditionObject";
export default {
  data() {
    return {
      conditionObject,
      showDayDetails: false,
      currentMonth: window.moment(),
      weekDays: moment.weekdaysMin(true),
      calculatingAccounting: true,
      calculatingTests: false,
      calculatingCancelation: false,
      activatedDay: "",
      currentShownDay: false,
      lastTrip: "",
      lastInvionce: ""
    };
  },
  computed: {
    endDate() {
      if (
        !this.tour ||
        !this.tour.tour_dates ||
        !this.tour.tour_dates.tour_finish_date
      ) {
        return false;
      }
      var tourEndDate = window.moment(
        this.tour.tour_dates.tour_finish_date,
        "YYYY-MM-DD"
      );
      if (!tourEndDate.isValid()) {
        return false;
      }
      this.lastTrip = "";
      return tourEndDate;
    },
    shownDetails() {
      if (!this.currentShownDay) {
        return null;
      }
      return this.currentShownDay;
    },
    assumedPayments() {
      var accountingArray = [];

      if (this.calculatingAccounting) {
        return [];
      }
      if (
        this.paymentDates &&
        this.paymentDates.nextDay &&
        this.paymentDates.nextDay !== null
      ) {
        var nextDay = window.moment(this.paymentDates.nextDay, "l");
        accountingArray.push(nextDay);
        while (
          accountingArray[accountingArray.length - 1].isBefore(
            window.moment(this.currentMonth, "l").add(2, "month"),
            "month"
          )
        ) {
          accountingArray.push(
            this.addPaymentDate(accountingArray[accountingArray.length - 1])
          );
        }
      }

      return accountingArray.map(date => {
        return date.format("l");
      });
    },
    accounting_dates() {
      this.calculatingAccounting = true;
      var accountingArray = [];

      if (
        this.accountingDates.nextDay &&
        this.accountingDates.nextDay !== null
      ) {
        var nextDay = window.moment(this.accountingDates.nextDay, "l");
        accountingArray.push(nextDay);
        while (
          accountingArray[accountingArray.length - 1].isBefore(
            window.moment(this.currentMonth, "l").add(2, "month"),
            "month"
          )
        ) {
          if (
            this.endDate &&
            this.endDate.isValid() &&
            accountingArray[accountingArray.length - 1].isAfter(this.endDate)
          ) {
            break;
          }
          accountingArray.push(
            this.addAcountingDate(accountingArray[accountingArray.length - 1])
          );
        }
      }
      this.$nextTick(() => {
        this.calculatingAccounting = false;
      });
      return accountingArray.map(date => {
        return date.format("l");
      });
    },
    mypaymentDates() {
      var accounting_dates = this.accounting_dates.map(e => {
        return window.moment(e, "l");
      });

      var assumedDates = this.assumedPayments.filter(day => {
        var momentDay = window.moment(day, "l");
        if (
          accounting_dates.length !== 0 &&
          accounting_dates[0].isSameOrBefore(momentDay)
        ) {
          while (
            accounting_dates.length !== 0 &&
            accounting_dates[0].isSameOrBefore(momentDay)
          ) {
            accounting_dates.splice(0, 1);
          }
          return true;
        }
        return false;
      });
      return assumedDates;
    },
    weeks() {
      //visit https://en.wikipedia.org/wiki/ISO_week_date#Last_week

      var startWeek = window
        .moment(this.currentMonth, "l")
        .startOf("month")
        .week();
      startWeek = startWeek >= 52 ? 0 : startWeek;
      var endWeek = window
        .moment(this.currentMonth, "l")
        .endOf("month")
        .week();
      endWeek = endWeek > startWeek ? endWeek : 53;
      var nextWeeks = [];
      for (var i = startWeek; i <= endWeek; i += 1) {
        nextWeeks.push(i);
      }

      return nextWeeks;
    },

    tourDates() {
      var days = ["Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"];
      var mydays = [];
      if (!this.tour || !this.tour.tour_dates) {
        return mydays;
      } else {
        var tourDays = this.tour.tour_dates.days;
        if (typeof tourDays === "string") {
          tourDays = JSON.parse(tourDays);
        }
        tourDays.forEach(day => {
          mydays.push(days.indexOf(day));
        });
      }
      this.lastTrip ='';
      return mydays;
    }
  },
  props: {
    tour: {
      required: true,
      type: Object
    },
    accountingDates: {
      required: true
    },
    paymentDates: {
      required: true
    },
    currentMonthTour: {
      required: true
    },
    testDates: {
      required: true
    },
    cancelationDates: {
      required: true
    }
  },
  watch: {
    paymentDates: {
      handler: function(newval) {
        this.calculatingAccounting = true;
        this.$nextTick(() => {
          this.calculatingAccounting = false;
        });
      },
      deep: true
    },
    testDates: {
      handler: function(newval) {
        this.calculatingTests = true;
        this.$nextTick(() => {
          this.calculatingTests = false;
        });
      },
      deep: true
    },
    cancelationDates: {
      handler: function(newval) {
        this.calculatingCancelation = true;
        this.$nextTick(() => {
          this.calculatingCancelation = false;
        });
      },
      deep: true
    }
  },
  methods: {
    getClassDay(weekDay, weekDayIndex, currentMonth) {
      return {
        active:
          this.activatedDay === "weekDay" + weekDay.format("l") &&
          this.showDayDetails,
        "klink-day": true,
        disabled: weekDay.month() !== currentMonth.month(),
        tourDate: this.hasAtrip(weekDay, weekDayIndex),
        testDate: this.isTest(weekDay, weekDayIndex),
        endOfTest: this.isEndOfTest(weekDay, weekDayIndex),
        cancelationDate: this.isCancelation(weekDay, weekDayIndex)
      };
    },
    clickedDate(e, weekDay, weekDayIndex, currentMonth) {
      // return false;
      this.showDayDetails = false;
      this.currentShownDay = Object.assign(
        this.getClassDay(weekDay, weekDayIndex, currentMonth),
        { currentDay: weekDay.format("l") }
      );
      this.activatedDay = "weekDay" + weekDay.format("l");
      var rect = e.target;

      if (!$(e.target).hasClass("klink-day")) {
        if (
          !$(e.target).parents(".klink-day") ||
          !$(e.target).parents(".klink-day")[0]
        ) {
          return false;
        }
        rect = $(e.target).parents(".klink-day")[0];
      }

      var left = rect.offsetLeft - $("#calendar-show").width();
      if ($(rect).parents(".times-row-wrapper").length !== 0) {
        left = rect.offsetWidth + rect.offsetLeft + 30;
      }
      $("#calendar-show").css({
        left: left - 15,
        top: 0,
        bottom: 0
      });

      this.$nextTick(() => {
        this.showDayDetails = true;
        setTimeout(() => {
          var expectedScroll = $("#calendar-show").offset().top;
          $("html, body").animate(
            {
              scrollTop:
                expectedScroll > 15 ? expectedScroll - 15 : expectedScroll
            },
            600
          );
        }, 300);
      });
    },
    hasPayment(weekDay, weekDayIndex) {
      var paymentIndex = this.mypaymentDates.indexOf(weekDay.format("l"));
      if (this.endDate && window.moment(weekDay, "l").isAfter(this.endDate)&&paymentIndex!==-1&&paymentIndex!==0) {
       
        return true;
      }
      if (
        this.accountingDates.type === "days" &&
        this.paymentDates.type === "days"
      ) {
        return (
          this.hasAtrip(weekDay, weekDayIndex) &&
          this.mypaymentDates.indexOf(weekDay.format("l")) !== -1
        );
      }
      return this.mypaymentDates.indexOf(weekDay.format("l")) !== -1;
    },

    hasInvionce(weekDay, weekDayIndex) {
      // console.log(weekDay.format('l'))

      if (this.calculatingAccounting) {
        return false;
      }
      var inVionceIndex = this.accounting_dates.indexOf(weekDay.format("l"));
      if (
        this.endDate &&
        this.endDate.isValid() &&
        inVionceIndex !== -1 &&
        inVionceIndex !== 0 &&
        weekDay.isAfter(this.endDate)
      ) {
       
        if (
          this.lastTrip.isAfter(
            window.moment(
              this.accounting_dates[inVionceIndex - 1],
              "l"
            )
          )
        ) {
          return true;
        } else {
          return false;
        }
      }
      if (this.accountingDates.type === "days") {
        var hasAnInvince =
          this.hasAtrip(weekDay, weekDayIndex) && inVionceIndex !== -1;

        return hasAnInvince;
      }
      var hasAnInvince = inVionceIndex !== -1;

      return hasAnInvince;
    },
    addAcountingDate(lastOne) {
      var expectedDate = window
        .moment(lastOne, "l")
        .add(this.accountingDates.every + 1, this.accountingDates.type);

      expectedDate = this.conditionObject[
        this.accountingDates["condition"]
      ].every(expectedDate);

      this.lastInvionce = expectedDate;
      return expectedDate;
    },
    addPaymentDate(lastOne) {
      var addition = this.paymentDates.every;
      if (!addition || addition < 1) {
        addition = 1;
      }
      var expectedDate = window
        .moment(lastOne, "l")
        .add(addition, this.paymentDates.type);
      expectedDate = this.conditionObject[this.paymentDates["condition"]].every(
        expectedDate
      );
      return expectedDate;
    },
    getWeekDays(week) {
      return Array(7)
        .fill(0)
        .map((day, index) => {
          return moment(this.currentMonth, "l")
            .week(week)
            .startOf("week")
            .clone()
            .add(day + index, "day");
        });
    },
    hasAtrip(weekDay, weekDayIndex, fromDom = false) {
      if (
        this.endDate &&
        this.endDate.isValid() &&
        weekDay.isAfter(this.endDate)
      ) {
        return false;
      }
      var hasAtrip =
        this.tourDates.indexOf(weekDayIndex) !== -1 &&
        window
          .moment(weekDay, "l")
          .isAfter(window.moment(this.tour.tour_dates.tour_start_date), "date");
      if (!this.lastTrip) {
        this.lastTrip = weekDay;
      }
      if (hasAtrip && this.lastTrip.isBefore(weekDay)) {
        this.lastTrip = weekDay;
      }
      return hasAtrip;
    },
    isTest(weekDay, weekDayIndex) {
      if (
        this.endDate &&
        this.endDate.isValid() &&
        weekDay.isAfter(this.endDate)
      ) {
        return false;
      }
      if (this.calculatingTests) {
        return false;
      }
      if (this.hasAtrip(weekDay, weekDayIndex)) {
        return window
          .moment(this.testDates.nextDay, "l")
          .isSameOrAfter(window.moment(weekDay, "l"));
      }
      return false;
    },
    isEndOfTest(weekDay, weekDayIndex) {
      // if (
      //   this.calculatingCancelation ||
      //   window
      //     .moment(weekDay, "l")
      //     .isAfter(window.moment(this.cancelationDates.nextDay, "l"))
      // ) {
      //   return false;
      // }
      return (
        window
          .moment(weekDay, "l")
          .isSame(window.moment(this.testDates.nextDay, "l"), "day") &&
        !this.calculatingTests
      );
    },
    isCancelation(weekDay, weekDayIndex) {
      return (
        window
          .moment(weekDay, "l")
          .isSame(window.moment(this.cancelationDates.nextDay, "l"), "day") &&
        !this.calculatingCancelation
      );
    },
    ChangeCurrent(index) {
      this.currentMonth = window
        .moment(this.currentMonth, "l")
        .add(index, "month");
    }
  },
  components: {
    "calendar-show": require("./calenarShow.vue")
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