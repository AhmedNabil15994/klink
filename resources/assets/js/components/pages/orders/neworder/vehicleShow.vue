<template>
  <div class="vehicle-slider">
    <div class="vehicle-cost">
      <div class="cost-field">
        <span>{{price[0].toString().replace('.',',')}}</span>
        <i class="fa fa-euro"></i>
      </div>
    </div>
    <div class="vehicle-image">
      <div class="vehicle-images-wrapper">
        <li
          @click="handleSelect"
          :class="{'is-checked':selected===true,'checkbox':true,'check':true}"
        ></li>
        <!-- <img src="/images/checked.svg" class="check" v-if="selected" alt=""> -->
        <img :src="'/images/shippings/'+price[1].img" alt>
      </div>
    </div>
    <div class="vehicle-name">{{price[1].title}}</div>
    <div class="vehicle-dimenstions">
      <span>
        <b>{{trans('front.create.width')}}:</b>
        {{(price[1].width/10).toFixed(2)}}
      </span>
      <span>
        <b>{{trans('front.create.length')}}:</b>
        {{(price[1].length/10).toFixed(2)}}
      </span>
      <span>
        <b>{{trans('front.create.height')}}:</b>
        {{(price[1].height/10).toFixed(2)}}
      </span>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {};
  },
  created() {},
  mounted() {},
  computed: {
    selected() {
      if (this.ship_id === this.price[1].id) {
        return true;
      } else {
        return false;
      }
    }
  },
  props: {
    price: {
      required: true
    },
    ship_id: {
      required: true
    }
  },
  methods: {
    handleSelect() {
      if (this.selected) {
        return false;
      } else {
        this.$emit("changeVehicle", this.price[1].id);
      }
    }
  }
};
</script>

<style lang="scss">
</style>
// Ahmed Ali Thabet