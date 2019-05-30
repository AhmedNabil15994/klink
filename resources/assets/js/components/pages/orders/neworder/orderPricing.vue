<template>
  <div class="order-pricing">
    <carousel-3d
      :startIndex="startIndex"
      @before-slide-change="slideChange"
      :perspective="180"
      :display="1"
      v-if="orderVehicles[0]&&orderVehicles[0].length!==0&&!carouselChanging"
      :controls-visible="true"
      ref="vehicleCarsouel"
      :height="200"
      :width="300"
    >
      <slide v-for="(vehicle, i) in orderVehicles[0]" :index="i" :key="'vehicleslide'+i">
        <vehicle-show
          @changeVehicle="vehicleChanged"
          :ship_id="order.ship_id"
          :price="price([vehicle,orderVehicles[1]])"
        ></vehicle-show>
      </slide>
    </carousel-3d>
    <div class="small-order-cell completeIt">
      <button
        class="letsComplete btn"
        style="min-height:40px;"
        role="button"
        @click.prevent="acceptAndGo"
      >
        {{trans('front.create.saveOrder')}}
        <img v-if="NotDisabled" src="/images/loading.svg" alt>
      </button>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      smallLoading: false,

      carouselChanging: false,
      startIndex: 0
    };
  },
  created() {},
  mounted() {
    if (!this.$parent.isStored) {
      this.$nextTick(() => {
        this.animateCarsouel();
      });
    }
  },
  computed: {
    orderVehicles() {
      var distance = Number(
        this.order.orderRoute.routes[0].legs[0].distance.value / 1000
      );
      var availableShippingTypes = this.distances.filter(distance_type => {
        return distance >= distance_type.min && distance <= distance_type.max;
      });
      var availableShippingType = availableShippingTypes[0];

      var avalilableShips = this.shippings.filter(shipping => {
        if (this.isDirty) {
          return (
            Number(shipping.pay_load_max) >= Number(this.order.weight) &&
            Number(shipping.length) >= Number(this.order.length) * 10 &&
            Number(shipping.width) >= Number(this.order.width) * 10 &&
            Number(shipping.height) >= Number(this.order.height) * 10
          );
        }
        return (
          Number(shipping.pay_load_max) >= Number(this.order.weight)
          // Number(shipping.length) >= Number(this.order.length) *10&&
          // Number(shipping.width) >= Number(this.order.width)*10 &&
          // Number(shipping.height) >= Number(this.order.height)*10
        );
      });
      if (avalilableShips.length < 1) {
        //Todo : show user error :)
        if (!this.snotified) {
          this.snotified = this.$snotify.warning(
            trans("front.create.noVehilcles"),
            trans("front.create.noVehilclesHead"),
            {
              timeout: 0,
              pauseOnHover: true
            }
          );
        }
        this.order.ship_id = 0;
        return [];
      } else {
        if (this.snotified) {
          this.$snotify.remove(this.snotified.id);
          this.snotified = null;
        }
      }
      avalilableShips = avalilableShips.filter(shipping => {
        var shippingHasThisCost = shipping.costs.filter(cost => {
          return cost.distance_id === availableShippingType.id;
        });
        return shippingHasThisCost.length >= 1;
      });

      if (this.$parent.isStored && !this.$parent.isChanged) {
        avalilableShips.forEach((ship, index) => {
          if (this.order.ship_id === ship.id) {
            this.startIndex = index;
          }
        });
        this.$parent.isChanged = true;
      } else {
        this.startIndex = 0;
        if (!this.isDirty) {
          this.order.width = avalilableShips[0].width / 10;
          this.order.height = avalilableShips[0].height / 10;
          this.order.length = avalilableShips[0].length / 10;
        }
        this.order.ship_id = avalilableShips[0].id;
      }

      return [avalilableShips, availableShippingType.id];
    }
  },
  methods: {
    /**
     * @param  {Array} orderVehicles
     */
    slideChange(e) {
      if (this.orderVehicles[0][e]) {
        if (!this.isDirty) {
          this.order.width = this.orderVehicles[0][e].width / 10;
          this.order.height = this.orderVehicles[0][e].height / 10;
          this.order.length = this.orderVehicles[0][e].length / 10;
        }
        this.order.ship_id = this.orderVehicles[0][e].id;
      }
    },
    acceptAndGo(e) {
      this.$emit("acceptAndGo", e);
    },
    price(orderVehicles) {
      if (this.distances.length) {
        var distance = Number(
          this.order.orderRoute.routes[0].legs[0].distance.value / 1000
        );
        var mins =
          Number(this.order.orderRoute.routes[0].legs[0].duration.value / 60) +
          (Number(this.order.orderRoute.routes[0].legs[0].duration.value % 60) >
          30
            ? 1
            : 0);
        // var orderVehicles = this.orderVehicles();
        if (!orderVehicles[0] || !orderVehicles[0].length) {
          //Todo : alert user there is no match car

          return [];
        }
        var typeid = orderVehicles[1];
        var orderVehicle = orderVehicles[0];

        var orderCost = orderVehicle.costs.filter(cost => {
          return cost.distance_id === typeid;
        });

        var loadTime = this.order.time - orderVehicle.specs.min_load_time;
        var cost_per_unit = loadTime * orderVehicle.specs.cost_per_unit;
        var persons = this.order.person - 1;
        var cost_per_person =
          persons * (loadTime + mins) * orderVehicle.specs.cost_per_person;
        orderCost = orderCost[0];
        if (orderCost.cost_per_kilo * distance < orderCost.min_cost) {
          var newprice = (
            orderCost.min_cost +
            cost_per_unit +
            cost_per_person
          ).toFixed(2);
          this.changeOrderPrice(newprice, orderVehicle.id);
          return [newprice, orderVehicle];
        } else {
          var newprice = (
            orderCost.cost_per_kilo * distance +
            cost_per_unit +
            cost_per_person
          ).toFixed(2);
          this.changeOrderPrice(newprice, orderVehicle.id);
          return [newprice, orderVehicle];
        }
      }
    },
    vehicleChanged(e) {
      // console.log(e)

      this.order.ship_id = e;
    },
    animateCarsouel() {
      if (!this.$refs.vehicleCarsouel) {
        return false;
      } else {
        window.ahmedcar = this.$refs.vehicleCarsouel;

        this.$refs.vehicleCarsouel.goNext();

        if (this.$refs.vehicleCarsouel.currentIndex === 0) {
          return false;
        }
        setTimeout(() => {
          this.animateCarsouel();
        }, 200);
      }
    },
    changeOrderPrice(newprice, orderVehicle) {
      if (this.order.ship_id === orderVehicle) {
        this.order.cost = newprice;
      }
    }
  },
  components: {
    "vehicle-show": require("./vehicleShow.vue")
  },
  props: {
    order: {
      required: true
    },
    shippings: {
      required: true
    },
    distances: {
      required: true
    },
    NotDisabled: {
      required: true,
      default: true
    },
    isDirty: {
      required: true,
      default: false
    }
  },
  watch: {
    orderVehicles(newval, oldval) {
      this.carouselChanging = true;
      this.$nextTick(() => {
        this.carouselChanging = false;
      });
    }
  }
};
</script>

<style lang="scss" scope>
.letsComplete {
  padding: 0.215rem 0.75rem;
}
</style>
// Ahmed Ali Thabet