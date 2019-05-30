<template>
  <div
    :class="{'editable':true,'active':eidtableShown,'disabled':editable.disabled,'editable-with-error':errors.has(name),'focused':($refs['ref-'+id]&&$refs['ref-'+id].focused)}"
    :id="'editable-'+id"
  >
    <img
      :src="editable.img"
      @click="openClose"
      :alt="placeholder"
      :title="placeholder"
      data-toggle="tooltip"
      :id="'img-'+id"
      v-if="editable.img&&editable.img!==''"
    >
    <div
      class="editable-text"
      @click="openClose"
      :title="tooltiptitle?tooltiptitle:placeholder"
      data-toggle="tooltip"
      :id="'editableText-'+id"
      v-if="type!=='timePicker'"
    >{{value}} {{editable.after}}</div>
    <div
      class="editable-text"
      @click="openClose"
      :title="tooltiptitle?tooltiptitle:placeholder"
      data-toggle="tooltip"
      :id="'editableText-'+id"
      v-else
    >{{editable.toBeShown}} {{editable.after}}</div>

    <transition
      name="zoom"
      enter-active-class="animated zoomIn"
      leave-active-class="animated zoomOut"
      v-if="!editable.disabled"
    >
      <div class="editable-input-parent-wrapper" v-show="eidtableShown">
        <div class="operations">
          <!-- <div class="save-img" @click="saveData">
            <img src="/images/save-file-option.svg" v-show="loading===0" alt="save">
            <img src="/images/loading2.svg" v-show="loading===1" alt="save">
          </div>-->
          <img
            data-toggle="tooltip"
            :title="trans('front.touroffers.saveAndClose')"
            src="/images/close.svg"
            @click="saveData"
            alt="close"
          >
        </div>
        <input-parent
          @keyup="handleKey"
          v-bind="inputParentPropsObject"
          :ref="'ref-'+id"
          v-model="content"
        ></input-parent>
      </div>
    </transition>
  </div>
</template>


<script>
import inputParentProps from "./inputParentProps";
export default {
  data() {
    return {
      content: this.value,
      eidtableShown: false,
      loading: 0
    };
  },
  computed: {
    inputParentPropsObject() {
      return _.omit(this.$props, "editable");
    }
  },
  props: Object.assign(inputParentProps, {
    editable: {
      required: true
    }
  }),
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
    }
  },
  methods: {
    handleKey(e) {
      if (e.keyCode === 13 || e.key === "Enter") {
        if (this.content !== this.value) {
          this.saveData();
        } else {
          this.openClose();
        }
      }
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
    openClose() {
      this.content = this.value;
      $('[data-toggle="tooltip"]').tooltip("hide");
      if (this.editable.disabled === true) {
        if (this.editable.disabledMsg) {
          this.$snotify.warning(
            this.editable.disabledMsg.body,
            this.editable.disabledMsg.head,
            {
              timeout: 2000
            }
          );
        }
        this.eidtableShown = false;
        return false;
      }
      this.loading = 0;
      this.eidtableShown = !this.eidtableShown;
      this.$nextTick(() => {
        if (this.eidtableShown) {
          setTimeout(() => {
            $("#" + this.id).focus();
          }, 500);
          $("#editableText-" + this.id).tooltip("disable");
          $("#img-" + this.id).tooltip("disable");
        } else {
          $("#editableText-" + this.id).tooltip("enable");
          $("#img-" + this.id).tooltip("enable");
        }
      });
    },
    saveData() {
      if (this.loading === 1) {
        return false;
      }
      this.loading = 1;
      this.editable.saveData(this.content, this.openClose);
    }
  },
  components: {},

  mounted() {
    $('[data-toggle="tooltip"]').tooltip();

    $(window).click(event => {
      //Hide the menus if visible
      if ($(event.target).parents("#editable-" + this.id).length !== 0) {
        return false;
      }
      if (this.eidtableShown) {
        if (this.content !== this.value) {
          this.saveData();
        } else {
          this.openClose();
        }
      }
    });

    // $("#editable-" + this.id).click(event => {
    //   console.log(event);
    //   event.stopPropagation();
    // });
  },
  inject: {
    $validator: "$validator"
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