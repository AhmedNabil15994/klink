<template>
  <div class="container create-order-container">
    <div class="form-map-container" style="margin-top:20px;">
      <div class="order-form-wrapper" style="padding-bottom: 20px;">
        <div class="package-types-row">
          <div
            v-for="(kpackage,index) in packages"
            :class="getClassesNames(index+1)"
            :key="'kpackage-'+index"
            @click="activate(index+1)"
          >
            <div class="package-type-title">{{kpackage.title}}</div>
            <div class="package-dimentions">
              <div class="packcage-img animated bounceIn zoomIn">
                <div
                  class="width"
                  data-toggle="tooltip"
                  :title="trans('front.package.width')"
                >{{kpackage.dimensions.width}}</div>
                <div
                  class="length"
                  data-toggle="tooltip"
                  :title="trans('front.package.length')"
                >{{kpackage.dimensions.length}}</div>
                <div
                  class="height"
                  data-toggle="tooltip"
                  :title="trans('front.package.height')"
                >{{kpackage.dimensions.height}}</div>
              </div>
            </div>
            <transition
              name="custom-classes-transition"
              enter-active-class="animated tada"
              leave-active-class="animated bounceOutRight"
            >
              <div class="input-parent-wrapper" v-show="activeIndex===index+1||kpackage.count>0">
                <input-parent v-bind="getInput(index+1)" v-model="kpackage.count"></input-parent>
              </div>
            </transition>
            <!-- <div class="package-dimensions-wrapper">
              <div class="width">
                <span>{{trans('front.package.width')}}</span>
                <b>{{kpackage.dimensions.width}}</b>
              </div>
              <div class="length">
                <span>{{trans('front.package.length')}}</span>
                <b>{{kpackage.dimensions.length}}</b>
              </div>
              <div class="height">
                <span>{{trans('front.package.height')}}</span>
                <b>{{kpackage.dimensions.height}}</b>
              </div>
            </div>-->
          </div>
        </div>
      </div>
      <package-side-info></package-side-info>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      activeIndex: 0,
      packages: [
        {
          title: "XS",
          count: 0,
          dimensions: {
            width: 30,
            length: 30,
            height: 30
          }
        },
        {
          title: "SM",
          count: 0,
          dimensions: {
            width: 30,
            length: 30,
            height: 30
          }
        },
        {
          title: "M",
          count: 0,
          dimensions: {
            width: 30,
            length: 30,
            height: 30
          }
        },
        {
          title: "L",
          count: 0,
          dimensions: {
            width: 30,
            length: 30,
            height: 30
          }
        },
        {
          title: "XL",
          count: 0,
          dimensions: {
            width: 30,
            length: 30,
            height: 30
          }
        }
      ]
    };
  },
  computed: {},
  props: {},
  watch: {},
  methods: {
    activate(index) {
      this.activeIndex = index;
    },
    getInput(index) {
      return {
        id: "numbers-of-" + index,
        name: "numbers-of-" + index,
        placeholder: this.trans("front.package.number"),
        newclasses: {
          "input-parent-reverse": true
        }
      };
    },
    getClassesNames(index) {
      var active = this.activeIndex === index;
      var classes = { "package-type": true, active: active };
      classes["package-" + index] = true;
      return classes;
    }
  },
  components: {
    "package-side-info": require("./sideInfo")
  },
  created() {},
  mounted() {
    // $(['data-toggle="tooltip"']).tooltip();
    this.$nextTick(() => {
      this.activate(3);
    });
    $('[data-toggle="tooltip"]').tooltip();
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