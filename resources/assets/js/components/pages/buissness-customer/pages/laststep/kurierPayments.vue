<template>
  <div class="kurier-payments no-top">
    <div class="kureir-payments-header">
      <span
        :class="{'kurier-payments-header-half':true,'active':shoCase===1}"
        @click="shoCase=1"
      >{{trans('front.tourpayments.payment')}}</span>
      <span
        :class="{'kurier-payments-header-half':true,'active':shoCase===2}"
        @click="shoCase=2"
      >{{trans('front.tourpayments.paymentHistory')}}</span>
    </div>
    <div class="kurier-payments-methods" v-show="shoCase===1">
      <div class="kurier-payment-method">
        <img
          :class="{'disabled':loading}"
          :disabled="loading"
          @click="paywith('paypal')"
          src="/images/paypal.svg"
          alt="paypal"
        >
      </div>
      <div class="kurier-payment-method">
        <img
          :class="{'disabled':loading}"
          :disabled="loading"
          @click="paywith('CCARD')"
          src="/images/visa.svg"
          alt="visa"
        >
      </div>
      <div class="kurier-payment-method">
        <img
          :class="{'disabled':loading}"
          :disabled="loading"
          @click="paywith('CCARD')"
          src="/images/master.svg"
          alt="master"
        >
      </div>
      <div class="kurier-payment-method">
        <img
          :class="{'disabled':loading}"
          :disabled="loading"
          @click="paywith('CCARD')"
          src="/images/maestro.svg"
          alt="maestro"
        >
      </div>
      <div class="kurier-payment-method">
        <img
          :class="{'disabled':loading}"
          :disabled="loading"
          @click="paywith('SOFORTUEBERWEISUNG')"
          src="/images/klarna.svg"
          alt="klarna"
        >
      </div>
      <div class="kurier-payment-method">
        <img
          :class="{'disabled':loading}"
          :disabled="loading"
          @click="paywith('SOFORTUEBERWEISUNG')"
          src="/images/sofort.svg"
          alt="sofort"
        >
      </div>
      <div class="kurier-payment-method">
        <img
          :class="{'disabled':loading}"
          :disabled="loading"
          @click="paywith('sepa')"
          src="/images/sepa.svg"
          alt="sepa"
        >
      </div>
      <div class="kurier-payment-method">
        <img
          :class="{'disabled':loading}"
          :disabled="loading"
          @click="paywith('CCARD')"
          src="/images/vorkasse.svg"
          alt="vorkasse"
        >
      </div>
    </div>
    <div class="kuier-payment-history" v-show="shoCase===2">
      <div
        class="kurier-payment-details"
        :key="'payment'+payment.id"
        v-for="payment in tour.tour_payments"
      >
        <span
          data-toggle="tooltip"
          :title="`${trans('front.tourpayments.paidAt')} (${payment.created_at})`"
          class="amount"
        >{{payment.amount}}</span>
        <img :src="getPaymentImage(payment)"  :alt="payment.method" class="method">
        
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      shoCase: 1,
      paymentAmount: 500,
      loading: false
    };
  },
  computed: {},
  props: {
    tour: {
      required: true
    }
  },
  watch: {
    "tour.accepted_offer": function(oldval, newval) {
      this.detectMinPaymentAmount();
    }
  },
  methods: {
    getPaymentImage(payment) {
      if (payment.method === "paypal") {
        return "/images/paypal.svg";
      } else {
        return "/images/master.svg";
      }
    },
    detectMinPaymentAmount() {
      if (this.tour.tour_payments && this.tour.tour_payments.length !== 0) {
        this.shoCase = 2;
      }
      if (this.tour.accepted_offer) {
        this.paymentAmount = this.tour.accepted_offer.company_offer;
        return this.tour.accepted_offer.company_offer;
      } else {
        return 500;
      }
    },
    paywith(method) {
      if (this.loading) {
        return false;
      }
      this.loading = true;
      var toBeSend = {
        paymentAmount: this.paymentAmount,
        paymentMethod: method
      };
      var formData = {
        url: this.detectPaymentUrl(method),
        data: toBeSend,
        successServer: response => {
          window.location = response.body;
          // window.open(response.body, "_blank");
        },
        failServer: response => {
          this.loading = false;
        }
      };
      this.$vss.post(formData);
    },
    detectPaymentUrl(method) {
      if (method === "sepa" || method === "paypal") {
        return `/api/tours/pay/paypal/${this.$route.params.tourId}`;
      } else {
        return `/api/tours/pay/wirecard/${this.$route.params.tourId}`;
      }
    }
  },
  components: {},

  mounted() {
    this.detectMinPaymentAmount();
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