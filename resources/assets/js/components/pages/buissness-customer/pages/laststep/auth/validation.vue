<template>
  <div class="kurier-authentication-wrapper">
    <div class="kurier-auth-message">
      <img
        src="/images/email.svg"
        alt="email"
        :title="trans('front.touroffers.pleaseVerify')"
        data-toggle="tooltip"
      >
      <p style="font-weight:bold;">{{trans('front.touroffers.pleaseVerify')}}</p>
      <p>{{trans('front.touroffers.verifyMessage')}}</p>
      <div class="buttons-wrapper">
        <div
          class="kurier-auth-btn"
          data-toggle="tooltip"
          :title="trans('front.touroffers.resend')"
          @click="resend"
        >
          <img src="/images/email-resend.svg" v-show="!sending" alt>
          <img src="/images/ajax-loader.svg" v-show="sending" alt>
          <span>{{trans('front.touroffers.resend')}}</span>
        </div>
        <div
          @click="checkFormValiation"
          :disabled="checkcing"
          class="kurier-auth-btn"
          data-toggle="tooltip"
          :title="trans('front.touroffers.activated')"
        >
          <img src="/images/email.svg" alt>
          <span>{{trans('front.touroffers.activated')}}</span>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      checkcing: false,
      sending: false
    };
  },
  computed: {},
  props: {
    tour: {
      requried: true
    }
  },
  watch: {},
  methods: {
    resend() {
      if (this.sending === true) {
        return false;
      }
      this.sending = true;
      var formData = {
        url: "/api/resend/" + this.$route.params.tourId,
        successServer: response => {
          this.sending = false;
        },
        failServer: error => {
          this.sending = false;
        }
      };
      this.$vss.post(formData);
    },
    checkFormValiation() {
      if (this.checkcing) {
        return false;
      }
      this.checkcing = true;
      this.$http.get("/api/tours/tour/" + this.$route.params.tourId).then(
        response => {
          if (response.body.isAuth <= 1) {
            this.$snotify.warning(
              this.trans("front.touroffers.noValidationBody"),
              this.trans("front.touroffers.noValidationTitle"),
              {
                timeOut: 3500
              }
            );
          }else{
            this.tour.isAuth = response.body.isAuth;
            this.tour.userId = response.body.userId;
          }
          setTimeout(() => {
            this.checkcing = false;
          }, 3500);
        },
        error => {
          setTimeout(() => {
            this.checkcing = false;
          }, 3500);
        }
      );
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