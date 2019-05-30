<template>
  <div class="kurier-login">
    <div class="kurier-authentication-wrapper">
      <div class="kurier-auth-message">
        <p style="font-weight:bold;">{{trans('front.touroffers.readTermsHead')}}</p>
        <img
          src="/images/box.svg"
          alt="email"
          :title="trans('front.touroffers.readTermsHead')"
          data-toggle="tooltip"
        >
        <p>{{trans('front.touroffers.readTermsBody')}}</p>
        <div class="buttons-wrapper">
          <div
            class="kurier-auth-btn"
            data-toggle="tooltip"
            :title="trans('front.touroffers.readTermsBody')"
            style="justify-content:center;"
            @click="showTerms"
          >
            <img src="/images/list.svg" style="margin-right:5px;" alt>
            <span>{{trans('front.touroffers.readTerms')}}</span>
          </div>
        </div>
      </div>
    </div>
    <kurier-terms :tour="tour" :acceptTerms="acceptTerms"></kurier-terms>
  </div>
</template>


<script>
export default {
  data() {
    return {};
  },
  computed: {},
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    dataURItoBlob(dataURI) {
      // convert base64/URLEncoded data component to raw binary data held in a string
      var byteString;
      if (dataURI.split(",")[0].indexOf("base64") >= 0)
        byteString = atob(dataURI.split(",")[1]);
      else byteString = unescape(dataURI.split(",")[1]);

      // separate out the mime component
      var mimeString = dataURI
        .split(",")[0]
        .split(":")[1]
        .split(";")[0];

      // write the bytes of the string to a typed array
      var ia = new Uint8Array(byteString.length);
      for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
      }

      return new Blob([ia], { type: mimeString });
    },
    acceptTerms(svg) {
      svg = this.dataURItoBlob(svg);
      var myData = new FormData();
      myData.append("avatars[]", svg, "signature.svg");

      console.log(myData);
      var formData = {
        url: "/api/tours/accept/terms/" + this.$route.params.tourId,
        data: myData,
        successServer: response => {
          this.tour.tour_details = response.body.tour_details;
          $("#termsModal").modal("hide");
        }
      };
      this.$vss.post(formData);
    },
    showTerms() {
      $("#termsModal").modal("show");
    }
  },
  components: {
    "kurier-terms": require("./auth/termsModal")
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