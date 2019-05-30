<template>
  <carousel-3d
    v-if="orderVehicles[0]&&orderVehicles[0].length!==0&&!carouselChanging"
    :startIndex="startIndex"
    @before-slide-change="slideChange"
    :perspective="180"
    :display="1"
    :controls-visible="true"
    ref="vehicleCarsouel"
    :height="200"
    :width="260"
  >
    <slide v-for="(vehicle, i) in orderVehicles[0]" :index="i" :key="'vehicleslide'+i">
      <vehicle-show
        @changeVehicle="vehicleChanged"
        :ship_id="tour.ship_id"
        :price="price([vehicle,orderVehicles[1]])"
      ></vehicle-show>
    </slide>
  </carousel-3d>
</template>


<script>
export default {
  data() {
    return {
      carouselChanging: false
    };
  },
  computed: {
    startIndex() {
      if (this.ship !== 0) {
        var isAvailable = this.orderVehicles[0].filter(vehicle => {
          return vehicle.id === this.ship;
        });
        if (isAvailable.length !== 0) {
          this.tour.ship_id = this.ship;
          return this.orderVehicles[0].indexOf(isAvailable[0]);
        }
      }

      return 0;
    },
    orderVehicles() {
      var distance = this.stopsGeneral.totalDistanceStops;
      var avalilableShips = this.shippings.filter(shipping => {
        return (
          Number(shipping.pay_load_max) >= Number(this.stopsGeneral.totalWeight)
        );
      });
      var availableShippingTypes = this.distances.filter(distance_type => {
        return distance >= distance_type.min && distance <= distance_type.max;
      });
      var availableShippingType = availableShippingTypes[0];
      avalilableShips = avalilableShips.filter(shipping => {
        var shippingHasThisCost = shipping.costs.filter(cost => {
          return cost.distance_id === availableShippingType.id;
        });
        return shippingHasThisCost.length >= 1;
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
        this.tour.ship_id = 0;
        return [];
      } else {
        if (this.snotified) {
          this.$snotify.remove(this.snotified.id);
          this.snotified = null;
        }
      }

      this.tour.ship_id = avalilableShips[0].id;

      return [avalilableShips, availableShippingType.id];
    }
  },
  props: {
    shippings: {
      required: true,
      type: Array
    },
    distances: {
      required: true,
      type: Array
    },
    tour: {
      required: true
    },
    stopsGeneral: {
      required: true
    },
    stops: {
      required: true
    },
    ship: {
      required: false,
      default: 0
    },
    loadTime: {
      required: false,
      default: "loadTime"
    }
  },
  watch: {
    orderVehicles(newval, oldval) {
      this.carouselChanging = true;
      this.$nextTick(() => {
        this.carouselChanging = false;
      });
    }
  },
  methods: {
    changeTourPrice(newprice, orderVehicle) {
      if (this.tour.ship_id === orderVehicle) {
        this.tour.price = newprice;
      }
    },
    slideChange(e) {
      if (this.orderVehicles[0][e]) {
        this.tour.ship_id = this.orderVehicles[0][e].id;
        this.$nextTick(() => {
          this.$emit("myveichleChanged", this.tour.ship_id);
        });
      }
    },
    vehicleChanged(e) {
      this.tour.ship_id = e;
    },
    getLoadTime(min_load_time) {
      if (this.$parent.allowStops === true) {
        var stopsTimes = this.stops.map(stop => {
          return stop[this.loadTime];
        });
        var summision = stopsTimes.reduce((total, stopTime) => {
          return total + stopTime;
        }, 0);

        return summision - min_load_time;
      } else {
        return (
          this.stopsGeneral.timePerStop * this.stopsGeneral.numberOfStops -
          min_load_time
        );
      }
    },
    price(orderVehicles, orderDistance = false) {
      var distance = Number(this.stopsGeneral.totalDistanceStops);
      var mins = Number(this.stopsGeneral.totalTimeOfStops);
      var orderVehicle = orderVehicles[0];
      var typeid = orderVehicles[1];
      if (!orderVehicles[0] || !orderVehicles[0].length) {
        //Todo : alert user there is no match car

        return [];
      }
      var loadTime = this.getLoadTime(orderVehicle.specs.min_load_time);
      var cost_per_unit = loadTime * orderVehicle.specs.cost_per_unit;
      var orderCost = orderVehicle.costs.filter(cost => {
        return cost.distance_id === typeid;
      });
      orderCost = orderCost[0];
      if (orderCost.cost_per_kilo * distance < orderCost.min_cost) {
        var newprice = (orderCost.min_cost + cost_per_unit).toFixed(2);
      } else {
        var newprice = (
          orderCost.cost_per_kilo * distance +
          cost_per_unit
        ).toFixed(2);
      }
      this.changeTourPrice(newprice, orderVehicle.id);
      return [newprice, orderVehicle];
    },
    animateCarsouel() {
      if (!this.$refs.vehicleCarsouel) {
        return false;
      } else {
        window.ahmedcars = this.$refs.vehicleCarsouel;
        this.$refs.vehicleCarsouel.goNext();

        if (this.$refs.vehicleCarsouel.currentIndex === 0) {
          return false;
        }
        setTimeout(() => {
          this.animateCarsouel();
        }, 200);
      }
    }
  },
  components: {
    "vehicle-show": require("../../../orders/neworder/vehicleShow.vue")
  },
  created() {},
  mounted() {
    if (this.ship === 0) {
      this.animateCarsouel();
    }
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