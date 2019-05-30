<template>
  <div
    :class="Object.assign(newclasses,{'input-parent':true,'with-error':(errors.has(name)),'focused':focused })"
    v-if="!mulitiple&&type==='text'"
  >
    <span class="label-span" data-toggle="tooltip" :title="tooltiptitle?tooltiptitle:placeholder">
      <label :for="id">{{myPlaceHolder}}</label>
    </span>
    <div class="input-child">
      <input
        :data-vv-as="placeholder"
        v-validate="validate"
        @focus="focused=true"
        @blur="focused=false"
        @keyup="handleKeyUp"
        :autofocus="autoFocus"
        :type="inputType"
        @input="handleInput"
        v-model="content"
        :placeholder="placeholder"
        :name="name"
        :id="id"
      >
      <img :src="img" v-if="img&&!numeric" class="svg" alt="weight">
      <img
        v-if="numeric"
        @click="updateContent(1)"
        src="/images/chevron-arrow-up.svg"
        class="kurier-arrow up"
        alt="Plus"
      >
      <img
        v-if="numeric"
        @click="updateContent(-1)"
        src="/images/chevron-arrow-up.svg"
        class="kurier-arrow down"
        alt="Minus"
      >
    </div>
    <span class="error" v-if="showError">{{errors.first(trans('front.create.weightName'))}}</span>
  </div>
  <div
    :class="Object.assign(newclasses,{'input-parent':true,'with-error':(errors.has(name)) })"
    v-else-if="!mulitiple&&type==='select'"
  >
    <span class="label-span" data-toggle="tooltip" :title="tooltiptitle?tooltiptitle:placeholder">
      <label :for="id">{{placeholder}}</label>
    </span>
    <div class="input-child">
      <select
        :data-vv-as="placeholder"
        v-validate="validate"
        :autofocus="autoFocus"
        @change="handleInput"
        v-model="content"
        :placeholder="placeholder"
        :name="name"
        :id="id"
      >
        <option
          v-for="option in options"
          :key="'option'+option.value+option.text"
          :value="option.value"
        >{{option.text}}</option>
      </select>
    </div>
    <span class="error" v-if="showError">{{errors.first(trans('front.create.weightName'))}}</span>
  </div>
  <div class="input-parent-triple" v-else-if="mulitiple&&type==='text'">
    <span>{{title}}</span>
    <div class="inputs-wrapper">
      <slot></slot>
    </div>
  </div>
  <div
    :class="Object.assign(newclasses,{'input-parent':true,'with-error':errors.has(name) })"
    v-else-if="type==='textArea'"
  >
    <span class="label-span" data-toggle="tooltip" :title="tooltiptitle?tooltiptitle:placeholder">
      <label :for="id">{{placeholder}}</label>
    </span>
    <div class="input-child">
      <textarea
        v-model="content"
        v-validate="validate"
        :autofocus="autoFocus"
        :name="name"
        @input="handleInput"
        :id="id"
        cols="30"
        rows="10"
      ></textarea>
    </div>
  </div>
  <div
    :class="Object.assign(newclasses,{'input-parent':true,'with-error':errors.has(name) })"
    v-else-if="type==='carrier'"
  >
    <span class="label-span has-max-height">
      <label :for="id">{{placeholder}}</label>
    </span>
    <div class="rating-input-child">
      <image-rating
        :title="img"
        id="personInput"
        ref="personInput"
        data-toggle="tooltip"
        style="width:100%;height:35px;position:relative;"
        src="/images/carrier.svg"
        v-model="content"
        @rating-selected="handleInput"
        :rating="1"
        :max-rating="4"
        :item-size="30"
      ></image-rating>
    </div>
    <span class="error" v-if="showError">{{errors.first(trans('front.create.weightName'))}}</span>
  </div>
  <div
    :class="Object.assign(newclasses,{'input-parent':true,'with-error':errors.has(name) })"
    v-else-if="type==='time'"
  >
    <span class="label-span has-max-height">
      <label>{{placeholder}}</label>
    </span>
    <div class="rating-input-child">
      <circle-slider
        v-if="content"
        knobColor="#F29F1F"
        progressColor="#F29F1F"
        circleColor="#e9ebee"
        :circleWidth="4"
        v-model="content"
        @input="handleInput"
        ref="timeCounter"
        :textValue="textVal"
        :side="75"
        :max="60"
      ></circle-slider>
    </div>
    <span class="error" v-if="showError">{{errors.first(trans('front.create.weightName'))}}</span>
  </div>
  <div
    :class="Object.assign(newclasses,{'input-parent':true,'datetimepicker':true,'with-error':errors.has(name) })"
    v-else-if="type==='timePicker'"
  >
    <span class="label-span" data-toggle="tooltip" :title="tooltiptitle?tooltiptitle:placeholder">
      <label :for="id">{{placeholder}}</label>
    </span>
    <div class="input-child">
      <date-picker
        v-model="content"
        :ref="'dateTimePicker'+id+name"
        v-validate="validate"
        :autofocus="autoFocus"
        :name="name"
        @input="handleInput"
        :id="id"
        :config="timeOptions"
      ></date-picker>
    </div>
    <span class="error" v-if="showError">{{errors.first(trans('front.create.weightName'))}}</span>
  </div>
</template>


<script>
import datePicker from "vue-bootstrap-datetimepicker";
import "pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css";
import inputParentProps from "./inputParentProps";
export default {
  data() {
    return {
      focused: false,
      content: this.value,
      timeOptions: {
        sideBySide: true,
        minDate: this.minDate,
        // debug: true,
        maxDate: this.maxDate,
        keyBinds: {}
      }
    };
  },
  created() {
    if (this.type === "timePicker") {
      this.content = window.moment(this.content);
    }
  },
  mounted() {
    $(this.$el)
      .children(".label-span")
      .tooltip();
    setTimeout(() => {
      $('[data-toggle="tooltip"]').tooltip();
    }, 300);
    this.$nextTick(() => {
      if (this.type === "carrier") {
        this.$refs.personInput.$children[0].src = "/images/driver-icon.svg";
      }
      if (this.type === "timePicker" && this.timeOnly === true) {
        this.timeOptions.format = "LT";
        if (
          this.type === "timePicker" &&
          this.$refs["dateTimePicker" + this.id + this.name]
        ) {
          this.$refs["dateTimePicker" + this.id + this.name].dp.options({
            format: "LT"
          });
        }
      }
      if (this.type === "timePicker" && this.dateOnly === true) {
        this.timeOptions.format = "LT";
        if (
          this.type === "timePicker" &&
          this.$refs["dateTimePicker" + this.id + this.name]
        ) {
          this.$refs["dateTimePicker" + this.id + this.name].dp.options({
            format: "L"
          });
        }
      }
    });
  },
  methods: {
    handleKeyUp(e) {
      this.$emit("keyup", e);
    },
    handleInput(e) {
      if (this.type !== "time") {
        this.$emit("input", this.content);
      } else {
        if (this.content >= 5) {
          this.$emit("timeinput", this.content);
        }
      }
    },
    updateContent(NewAddition) {
      if (
        isNaN(this.content) ||
        Number(this.content) + Number(NewAddition) < 0
      ) {
        return false;
      }
      this.content = Number(this.content) + Number(NewAddition);
      this.handleInput(this.content);
    }
  },
  computed: {
    myPlaceHolder() {
      if (
        this.validate.indexOf("required") !== -1 &&
        this.placeholder.indexOf("*") === -1
      ) {
        return this.placeholder + " * ";
      }
      return this.placeholder;
    },
    textVal() {
      if (this.type === "time") {
        return this.content + " min";
      }
      return "";
    }
  },
  props: inputParentProps,

  inject: {
    $validator: "$validator"
  },
  components: {
    datePicker
  },
  watch: {
    value(newval, oldval) {
      if (this.type === "select") {
        if (this.content !== newval) {
          this.content = newval;
        }
        return false;
      }
      if (this.content !== newval) {
        if (this.type === "timePicker") {
          this.$nextTick(() => {
            this.content = window.moment(newval);
          });

          // this.$refs['dateTimePicker' + this.id + this.name].dp.date(window.moment(newval))
        } else {
          this.content = newval;
        }
      }
    },
    img(newval, oldval) {
      if (this.type === "carrier") {
        $("#personInput").attr("data-original-title", newval);
        $('[data-toggle="tooltip"]').tooltip();
      }
    },
    minDate(newval, oldval) {
      if (
        this.type === "timePicker" &&
        this.$refs["dateTimePicker" + this.id + this.name]
      ) {
        this.$refs["dateTimePicker" + this.id + this.name].dp.options({
          minDate: newval
        });
      }
    },
    maxDate(newval, oldval) {
      if (
        this.type === "timePicker" &&
        this.$refs["dateTimePicker" + this.id + this.name]
      ) {
        this.$refs["dateTimePicker" + this.id + this.name].dp.options({
          maxDate: newval
        });
      }
    },
    content(newval) {
      if (this.type === "time") {
        this.$nextTick(() => {
          if (newval < 5) {
            this.content = 5;
          }
        });
      }
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
// Ahmed Ali Thabet
