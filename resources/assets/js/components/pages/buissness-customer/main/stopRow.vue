<template>
  <div class="stops-inputs-head fieldset">
    <div class="legend">{{stop.stopName?stop.stopName:stopName(index)}}</div>
    <div class="stop-inputs-setting">
      <div class="add-new-package">
        <button class="btn btn-danger btn-xs" @click="deleteMe(index)">
          <img src="/images/rubbish-bin-delete-button.svg" :alt="trans('front.bystop.delete')">
          <span>{{trans('front.bystop.delete')}}</span>
        </button>
      </div>
    </div>
    <div class="stops-inputs-head-main">
      <div
        :class="{'input-parent':true, 'location':true, 'with-error':(stop.touched===true&&(!stop.location.address||!stop.location.address.home))}"
      >
        <span class="label-span">
          <label :for="'stopLocation'+index">{{trans('front.buissness.stopLocation')}}</label>
        </span>
        <div class="input-child">
          <gmap-autocomplete
            :placeholder="trans('front.main.addressPlaceHolder')"
            @place_changed="setStopPlace"
            :id="'stopLocation'+index"
            autofocus
          ></gmap-autocomplete>
        </div>
      </div>
      <input-parent v-bind="inputs[0].props" v-model="stop.stopName"></input-parent>

      <input-parent v-bind="inputs[2].props" v-model="stop.loadTime"></input-parent>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {};
  },
  computed: {
    inputs() {
      var index = this.index;
      return [
        {
          props: {
            name: "stop" + trans("front.buissness.stopName") + index,
            placeholder: trans("front.buissness.stopName"),
            // img: '/images/food-scale-tool.svg',
            validate: "required",
            id: "stopName" + index
          }
        },
        {
          props: {
            name: "stop" + trans("front.buissness.numberOfItems") + index,
            placeholder: trans("front.buissness.numberOfItems"),
            // img: '/images/food-scale-tool.svg',
            validate: "required",
            id: "numberOfItems" + index,
            numeric: true
          }
        },
        {
          props: {
            name: trans("front.buissness.StopTime") + index,
            placeholder: trans("front.buissness.StopTime"),
            newclasses: {
              stopTime: true
            },
            validate: "required|decimal:3|min_value:1",
            id: "StopsTime" + index,

            numeric: true
          }
        }
      ];
    }
  },
  props: {
    stop: {
      required: true
    },
    index: {
      required: true
    }
  },
  methods: {
    deleteMe(e) {
      this.$emit("deleteStop", e);
    },
    stopName(index) {
      return this.trans("front.bystop.stop") + " " + String(index + 1);
    },
    validatePlace(place) {
      if (!place || !place.address_components) {
        return false;
      }
      var HasStreetArray = place.address_components.some(component => {
        return component.types.indexOf("street_number") !== -1;
      });
      if (!HasStreetArray) {
        this.$snotify.warning(
          trans("front.main.placeError"),
          trans("front.main.placeErrorHead"),
          {
            timeout: 3500,
            // showProgressBar:false,
            pauseOnHover: true
          }
        );
      }
      return HasStreetArray;
    },
    setStopPlace(place) {
      if (!this.validatePlace(place)) {
        this.stop.location.address = {};
        this.stop.location.geometry = {};
        return false;
      }
      this.stop.location.formatted_address = place.formatted_address;
      this.stop.location.address = this.getAddressObject(
        place.address_components
      );
      this.stop.location.geometry = place.geometry.location;

      this.$emit("stopChangedLocation", this.stop, this.index);
    },
    getAddressObject(address_components) {
      var ShouldBeComponent = {
        home: ["street_number"],
        postal_code: ["postal_code"],
        street: ["street_address", "route"],
        region: [
          "administrative_area_level_1",
          "administrative_area_level_2",
          "administrative_area_level_3",
          "administrative_area_level_4",
          "administrative_area_level_5"
        ],
        city: [
          "locality",
          "sublocality",
          "sublocality_level_1",
          "sublocality_level_2",
          "sublocality_level_3",
          "sublocality_level_4"
        ],
        country: ["country"]
      };

      var address = {
        home: "",
        postal_code: "",
        street: "",
        region: "",
        city: "",
        country: ""
      };
      address_components.forEach(component => {
        for (var shouldBe in ShouldBeComponent) {
          if (ShouldBeComponent[shouldBe].indexOf(component.types[0]) !== -1) {
            if (shouldBe === "country") {
              address[shouldBe] = component.short_name;
            } else {
              address[shouldBe] = component.long_name;
            }
          }
        }
      });
      return address;
    }
  },
  created() {},
  mounted() {
    $("#stopLocation" + this.index).change(e => {
      this.stop.location.formatted_address = $(
        "#stopLocation" + this.index
      ).val();
      this.stop.touched = true;
    });
    $("#stopLocation" + this.index).val(this.stop.location.formatted_address);
  },
  watch: {
    stop(newval) {
      this.$nextTick(() => {
        $("#stopLocation" + this.index).val(newval.location.formatted_address);
        this.$validator.reset();
      });
    }
  },
  components: {},
  inject: {
    $validator: "$validator"
  }
};
</script>

<style lang="scss">
</style>
/******************* 
*
*
*
*    Ahmed Ali Tahbet
*
*
 ********************/