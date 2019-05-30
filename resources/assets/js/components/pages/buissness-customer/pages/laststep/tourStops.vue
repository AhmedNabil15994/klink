<template>
  <div class="stops-row-vertical">
    <div class="stops-rows-wrapper">
      <div class="stops-rows-header">{{trans('front.touroffers.stops')}}</div>
      <draggable
        class="stops-rows-container"
        element="div"
        v-model="tour.stops"
        :options="dragOptions"
        @start="drag = true"
        @end="dragEnd"
      >
        <kurier-stop
          :stop="stop"
          :index="index"
          v-for="(stop,index) in tour.stops"
          :key="'stop'+stop.stop_index+stop.id"
          :tour="tour"
        ></kurier-stop>
      </draggable>
    </div>
  </div>
</template>


<script>
import draggable from "vuedraggable";

export default {
  data() {
    return {
      currentShown: 1,
      drag: false
    };
  },
  computed: {
    dragOptions() {
      return {
        animation: 200,
        group: "description",
        disabled: false,
        ghostClass: "ghost",
        scroll: true
      };
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    dragEnd(event) {
      console.log(event.newIndex, event.oldIndex, event);

      this.drag = false;
    }
  },
  components: {
    draggable,
    "kurier-stop": require("./kurierStop.vue")
  },
  created() {
    this.tour.stops = this.tour.stops.sort((a, b) => {
      return a.stop_index - b.stop_index;
    });
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