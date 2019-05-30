<template>
  <div class="stops-rows-container">
    <div class="week-days-show">
      <div
        class="stops-rows-header"
        style="justify-content:center;font-size:18px;"
      >{{trans('front.touroffers.weekDays')}}</div>
      <transition-group
        tag="div"
        class="week-days-show-row"
        name="zoom"
        enter-active-class="animated zoomIn"
        leave-active-class="animated zoomOut"
      >
        <div
          v-for="(day) in activeDays"
          :class="{'week-day':true,'active':true}"
          :title="day.dayName"
          data-toggle="tooltip"
          :key="'kurier-day-'+day.shortCut"
          @click="selectDay(day)"
        >{{day.shortCut}}</div>
      </transition-group>
      <transition-group
        tag="div"
        class="week-days-show-row"
        name="zoom"
        enter-active-class="animated zoomIn"
        leave-active-class="animated zoomOut"
      >
        <div
          v-for="(day) in inActiveDays"
          :class="{'week-day':true}"
          :title="day.dayName"
          data-toggle="tooltip"
          :key="'kurier-day-'+day.shortCut"
          @click="selectDay(day)"
        >{{day.shortCut}}</div>
      </transition-group>
      <!-- <div
        class="add-new-package"
        v-show="changed"
        style="width: 100%; display: flex; justify-content: flex-end;"
      >
        <button class="btn btn-success btn-xs" @click="saveTourDays">
          <img src="/images/save-file-option.svg" alt="save">
          <span>{{trans('front.touroffers.save')}}</span>
        </button>
      </div>-->
    </div>
    <slot name="besideDaysShow"></slot>
  </div>
</template>


<script>
export default {
  data() {
    return {
      lastTourDates: []
    };
  },
  computed: {
    activeDays() {
      return this.days.filter((day, index) => {
        return this.hasADay(index);
      });
    },
    inActiveDays() {
      return this.days.filter((day, index) => {
        return this.hasADay(index) === false;
      });
    },
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
    },
    changed() {
      return JSON.stringify(this.lastTourDates) !== this.tourDates;
    },
    tourDates() {
      var shortCuts = ["Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"];
      if (!this.tour || !this.tour.tour_dates) {
        return [];
      }
      var days = JSON.parse(this.tour.tour_dates.days);
      days = days.map(day => {
        return shortCuts.indexOf(day);
      });

      return JSON.stringify(days);
    }
  },
  props: {
    tour: {
      required: true,
      type: Object
    }
  },
  watch: {
    changed(newval) {
      if (newval === true) {
        this.$nextTick(() => {
          this.saveTourDays();
        });
      }
    },
    tourDates(newval, oldval) {
      this.lastTourDates = JSON.parse(newval);
    },
    activeDays() {
      this.$nextTick(() => {
        $('[data-toggle="tooltip"]').tooltip();
      });
    },
    inActiveDays() {
      this.$nextTick(() => {
        $('[data-toggle="tooltip"]').tooltip();
      });
    }
  },
  methods: {
    hasADay(index) {
      return this.lastTourDates.indexOf(index) !== -1;
    },
    selectDay(day) {
      var index = this.days.indexOf(day);
      if (this.hasADay(index)) {
        if (this.lastTourDates.length > 1) {
          this.lastTourDates = this.lastTourDates.filter(day => {
            return day !== index;
          });
        } else {
          this.$snotify.warning(
            trans("front.bystop.dayserror"),
            trans("front.bystop.dayserrorHead")
          );
        }
      } else {
        this.lastTourDates.push(index);
      }
    },
    saveTourDays() {
      if (this.lastTourDates.length < 1) {
        this.$snotify.warning(
          trans("front.bystop.dayserror"),
          trans("front.bystop.dayserrorHead")
        );

        return false;
        // return false;
      }
      var formdata = {
        url: "/api/tours/saveTourDays/" + this.$route.params.tourId,
        data: {
          days: this.lastTourDates
        },
        validate: this.$validator,

        failedValidate: data => {},
        successServer: response => {
          this.tour.tour_dates.days = response.body.days;
        }
      };
      this.$vss.post(formdata);
    }
  },
  components: {},
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