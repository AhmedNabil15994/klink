<template>
  <div class="kurier-login">
    <div class="operations">
      <img
        @click="close"
        data-toggle="tooltip"
        :title="trans('front.touroffers.close')"
        src="/images/close.svg"
        alt="close"
      >
    </div>
    <transition name="fade">
      <div class="kurier-login-menu" v-show="!notCompleted">
        <div
          @click="loginOrRegister='login'"
          :class="{'kurier-login-item':true,'active':loginOrRegister==='login'}"
        >{{trans('front.touroffers.login')}}</div>
        <div
          @click="loginOrRegister='register'"
          :class="{'kurier-login-item':true,'active':loginOrRegister==='register'}"
        >{{trans('front.touroffers.register')}}</div>
      </div>
    </transition>
    <transition name="fade">
      <div class="kurier-login-body" v-if="!notCompleted">
        <transition
          name="zoomSpecial"
          enter-active-class="animated zoomIn absolute"
          leave-active-class="animated zoomOut absolute"
        >
          <buissness-regsiter :tour="tour" v-show="loginOrRegister==='register'"></buissness-regsiter>
        </transition>
        <transition
          name="zoomSpecial"
          enter-active-class="animated zoomIn absolute"
          leave-active-class="animated zoomOut absolute"
        >
          <buissness-login :tour="tour" v-show="loginOrRegister==='login'"></buissness-login>
        </transition>
      </div>
    </transition>
    <transition name="fade">
      <kurier-validate :tour="tour" v-if="notCompleted"></kurier-validate>
    </transition>
  </div>
</template>


<script>
export default {
  data() {
    return {
      loginOrRegister: "register"
    };
  },
  computed: {
    notCompleted() {
      if (this.tour.isAuth === 1 && this.tour.userId > 1) {
        return true;
      }
      return false;
    }
  },
  props: {
    tour: {
      required: true
    },
    acceptOffer: {
      required: true
    },
    acceptedOffer: {
      required: true
    }
  },
  watch: {
    "tour.isAuth": function(newval, oldval) {
      if (newval === 1) {
        this.$nextTick(() => {
          if (this.tour.userId > 0) {
            console.log(this.tour.userId);
            window.Echo.private(`App.User.${this.tour.userId}`).listen(
              ".emailAuthenticated",
              e => {
                if (e.authenticated_at) {
                  this.tour.isAuth = 2;
                  this.acceptOffer(this.acceptedOffer);
                }
              }
            );
          }
        });
      }
    },
    loginOrRegister(newval) {
      if (newval === "register") {
        this.$nextTick(() => {
          $("#registerfirstName").focus();
        });
      }
    },
    "$parent.loginDisabled": function(newval) {
      if (newval === true && this.loginOrRegister === "register") {
        this.$nextTick(() => {
          $("#registerfirstName").focus();
        });
      }
    }
  },
  methods: {
    close() {
      this.$parent.acceptedOffer = {};
    }
  },
  components: {
    "buissness-regsiter": require("./auth/buissnessRegister.vue"),
    "buissness-login": require("./auth/login.vue"),
    "kurier-validate": require("./auth/validation.vue")
  },
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