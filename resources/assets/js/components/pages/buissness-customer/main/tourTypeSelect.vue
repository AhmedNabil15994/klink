<template>
  <div class="tour-type-row">
    <div
      v-for="tourtype in tourtypes"
      :class="{'tourtype':true,'active':tour.mainType===tourtype.type,'with-other-type':hasOtherRow(tourtype)}"
      :id="'tourtype'+tourtype.type"
      :key="tourtype.type+'tourtype'"
    >
      <span @click="changeTourType(tourtype)">{{trans('front.buissness.tourtype'+tourtype.type)}}</span>

      <div
        v-if="hasOtherRow(tourtype)"
        class="tour-type-child"
        :id="'tourOther'+tourtype.type"
        :ref="'tourtypeOther'"
        :key="tourtype.type+'tourtypeOther'"
      >
        <div
          v-for="othertype in tourtype.otherTypes"
          :class="{ 'tourtype':true,'active':tour.type===othertype.type}"
          :key="'otherTypes'+othertype.type"
        >
          <span
            @click="tour.type=othertype.type"
          >{{trans('front.buissness.tourtype'+othertype.type)}}</span>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      currentHeight: 0,
      tourtypes: [
        {
          type: "stops"
        },
        {
          type: "time",
          otherTypes: [
            {
              type: "minutes"
            },
            {
              type: "hours"
            }
          ]
        },

        {
          type: "dates",
          otherTypes: [
            {
              type: "days"
            },
            {
              type: "week"
            },
            {
              type: "month"
            }
          ]
        },
        {
          type: "packets"
        }
      ]
    };
  },
  computed: {},
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    changeTourType(type) {
      if(type.type==='packets'){
        this.$router.push('/geschaeftskundenportal/package');
        return false;
      }
      this.tour.mainType = type.type;
      this.tour.type = type.otherTypes ? type.otherTypes[0].type : type.type;
    },

    hasOtherRow(tourtype) {
      var myvalue =
        tourtype.type === this.tour.mainType &&
        tourtype.otherTypes &&
        tourtype.otherTypes.length !== 0;
      this.$nextTick(() => {
        if (
          myvalue &&
          this.$refs.tourtypeOther &&
          this.$refs.tourtypeOther[0]
        ) {
          tourtype.currentHeight = this.$refs.tourtypeOther[0].clientHeight;
          $("#tourtype" + tourtype.type).css(
            "margin-bottom",
            tourtype.currentHeight + 10
          );
        } else {
          tourtype.currentHeight = 0;
          $("#tourtype" + tourtype.type).css("margin-bottom", 10);
        }
      });
      return myvalue;
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