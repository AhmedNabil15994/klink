<template>
  <div class="order-info-form" id="tourMap">
    <div class="map-element fixed">
      
      <gmap-map
        :center="mapCenter"
        :options="sideMapOptions"
        :zoom="mapZoom"
        map-type-id="roadmap"
        style="width:100%; height: 100%"
        ref="tourMap"
      >
        <gmap-marker
          v-for="(stop,index) in stops"
          :icon="'/tour/icon/'+(index+1)"
          :key="'marker'+index"
          v-if="getLocation(stop)"
          :position="getLocation(stop)"
          :animation="0"
        ></gmap-marker>
      </gmap-map>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      sideMapOptions: {
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        fullscreenControl: true,
        lastRequest: {}
      },
      mapCenter: {
        lat: 51.165691,
        lng: 10.451526
      },
      mapZoom: 6,
      myseconds: 0
    };
  },
  computed: {},
  props: {
    tour: {
      required: true
    },
    stops: {
      required: true
    },
    stopsGeneral: {
      required: true
    }
  },
  watch: {
    stops: {
      handler: function(newval, oldval) {
        // newval.forEach((stop, index) => {
        //   console.log(
        //     JSON.stringify(this.getLocation(stop)),
        //     JSON.stringify(this.getLocation(oldval[index])),
        //     "ahmed"
        //   );
        // });
        this.handleStops(newval);
        this.handleStopsTime(newval, this.myseconds);
      },
      deep: true
    },
    myseconds(newval) {
      if (!isNaN(newval)) {
        this.handleStopsTime(this.stops, newval);
      }
    }
  },
  methods: {
    handleStopsTime(stops, seconds) {
      // debugger;
      stops.forEach(stop => {
        seconds += stop.loadTime * 60;
      });

      seconds = seconds / 60;
      this.stopsGeneral.totalTimeOfStops = seconds;
    },
    secondsToHms(d) {
      d = Number(d);
      var h = Math.floor(d / 3600);
      var m = Math.floor((d % 3600) / 60);
      var s = Math.floor((d % 3600) % 60);

      var hDisplay = h > 0 ? h + ": " : "00: ";
      var mDisplay = m > 0 ? m + ": " : "00 ";

      return hDisplay + mDisplay;
    },
    emptyMap() {
      if (this.directionsDisplay) {
        this.directionsDisplay.setDirections({
          routes: []
        });
        this.directionsDisplay = null;
      }
      this.directionsDisplay = new window.google.maps.DirectionsRenderer({
        suppressMarkers: true
      });

      this.directionsDisplay.setMap(this.$refs.tourMap.$mapObject);
    },
    handleStops(stops) {
      if (
        !this.$refs ||
        !this.$refs.tourMap ||
        !this.$refs.tourMap.$mapObject ||
        !window.google
      ) {
        setTimeout(() => {
          this.handleStops(stops);
        }, 300);
        return false;
      }

      var directionsService = new window.google.maps.DirectionsService();

      var from = {};
      var wayPoints = [];
      var to = {};
      stops.forEach((stop, index) => {
        if (index === 0) {
          from = this.getLocation(stop);
        } else {
          var tempLocation = this.getLocation(stop);

          if (tempLocation !== false) {
            if (to !== false && to.lat && to.lng) {
              wayPoints.push({
                location: to,
                stopover: true
              });
            }

            to = tempLocation;
          }
        }
      });
      if (!from || !to || !to.lng || !to.lat) {
        this.emptyMap();
        return false;
      }
      var start = new window.google.maps.LatLng(from.lat, from.lng);
      var end = new window.google.maps.LatLng(to.lat, to.lng);
      var request = {
        origin: start,
        destination: end,
        waypoints: wayPoints,
        travelMode: google.maps.TravelMode["DRIVING"]
      };
      if (JSON.stringify(this.lastRequest) === JSON.stringify(request)) {
        return false;
      } else {
        this.emptyMap();
        this.lastRequest = request;
      }
      directionsService.route(request, (result, status) => {
        if (status == "OK") {
          this.directionsDisplay.setDirections(result);
          var distance = 0;
          var seconds = 0;
          result.routes[0].legs.forEach(leg => {
            distance += leg.distance.value;
            seconds += leg.duration.value;
          });

          this.stopsGeneral.totalDistanceStops = distance / 1000;
          this.myseconds = seconds;
        }
      });

      return true;
    },
    getLocation(stop) {
      var lat = 0;
      var lng = 0;
      if (
        stop.location &&
        stop.location.geometry &&
        stop.location.geometry.lat
      ) {
        lat = stop.location.geometry.lat();
        lng = stop.location.geometry.lng();
        return { lat: lat, lng: lng };
      }
      return false;
    },
    handleScroll(e) {
      var top = window.pageYOffset || document.documentElement.scrollTop;
      var RelativeTop = $(".order-info-form").position().top;

      var toBeMargined = top - RelativeTop > 0 ? top - RelativeTop : 0;
      if (
        toBeMargined + $(".map-element.fixed").height() >
        $(".form-map-container").height()
      ) {
        toBeMargined =
          $(".form-map-container").height() - $(".map-element.fixed").height();
      }
      $(".map-element.fixed").css("margin-top", toBeMargined);
    }
  },
  components: {},
  created() {
    window.addEventListener("scroll", this.handleScroll);
  },
  destroyed() {
    window.removeEventListener("scroll", this.handleScroll);
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