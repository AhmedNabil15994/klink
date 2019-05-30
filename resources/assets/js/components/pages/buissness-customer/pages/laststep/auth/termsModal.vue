<template>
  <div
    class="modal fade"
    id="termsModal"
    role="dialog"
    aria-labelledby="termsModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termsModalLabel">{{trans('front.touroffers.readTerms')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body relative" v-if="tourTerms"></div>
        <transition-group
          tag="div"
          class="modal-body relative terms-body"
          style="height:550px;overflow-x:hidden;overflow-y:auto;"
          name="zoomSpecial"
          enter-active-class="animated zoomIn absolute"
          leave-active-class="animated zoomOut absolute"
        >
          <div
            class="sinature"
            :key="'kureir-terms-list'+tourTerms.length"
            v-show="currentIndex===tourTerms.length"
          >
            <h5 class="signature-title">{{trans('front.touroffers.signatureMessage')}}</h5>
            <div class="terms-signature">
              <vueSignature
                ref="signature"
                :sigOption="sigOptions"
                :w="'100%'"
                :h="'400px'"
                :disabled="false"
                v-if="currentIndex===tourTerms.length"
              ></vueSignature>
              <div class="signature-buttons">
                <div class="signature-button" @click="clear">
                  <img src="/images/delete.svg">
                  <span>{{trans('front.touroffers.clear')}}</span>
                </div>
                <div class="signature-button" @click="undo">
                  <img src="/images/back-drawn-arrow.svg">
                  <span>{{trans('front.touroffers.undo')}}</span>
                </div>
              </div>
            </div>
          </div>
          <div
            class="kurier-terms-list"
            v-for="(mineterms,mycurrentindex) in tourTerms"
            :key="'kureir-terms-list'+mycurrentindex"
            v-show="mycurrentindex===currentIndex"
          >
            <div
              :class="linetext.class"
              v-for="linetext in getTerms(mineterms,mycurrentindex>0)"
              :key="linetext.text"
            >
              <img
                src="/images/checked.svg"
                data-toogle="tooltip"
                :title="trans('front.touroffers.accepted')"
                alt="accept"
                v-if="accept[mycurrentindex] && linetext.class==='kurier-term'"
              >
              <img
                src="/images/close.svg"
                data-toogle="tooltip"
                :title="trans('front.touroffers.notYet')"
                alt="accept"
                v-else-if="linetext.class==='kurier-term'"
              >
              <span v-html="linetext.text"></span>
            </div>
            <checkbox
              class="accept-special"
              name="terms"
              v-model="accept[mycurrentindex]"
            >{{trans('front.touroffers.acceptTitle')}}</checkbox>
          </div>
        </transition-group>
        <div class="terms-dot" :key="'terms-dot'">
          <div
            @click="activate(index-1)"
            :class="{'dot':true,'active':currentIndex===index-1}"
            v-for="index in (tourTerms.length + 1 )"
            :key="'term-dot'+index"
            :title="trans('front.touroffers.page')+' '+index"
            data-toggle="tooltip"
          ></div>
        </div>

        <div class="modal-footer terms-footer">
          <div class="modal-footer-buttons-wrapper">
            <div
              class="modal-footer-button close"
              data-toggle="tooltip"
              :title="trans('front.touroffers.close')"
              @click="close"
            >{{trans('front.touroffers.close')}}</div>
            <div
              class="modal-footer-button next"
              data-toggle="tooltip"
              :title="trans('front.touroffers.next')"
              @click="next"
              v-if="currentIndex<(tourTerms.length)"
            >{{trans('front.touroffers.next')}}</div>
            <div
              class="modal-footer-button accept"
              data-toggle="tooltip"
              :title="trans('front.touroffers.acceptTitle')"
              @click="next"
              v-else
            >{{trans('front.touroffers.accept')}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      accept: [],
      currentIndex: 0,
      currentReadingTime: 0,
      term: "",
      sigOptions: {
        penColor: "rgb(0, 0, 0)",
        backgroundColor: "rgb(255,255,255)"
      }
    };
  },
  computed: {
    readingTime() {
      var text = this.terms.join("");
      const wordsPerMinute = 550;
      const noOfWords = text.split(/\s/g).length;
      const minutes = noOfWords / wordsPerMinute;
      const readTime = Math.ceil(minutes);
      this.currentReadingTime = readTime * 60;
      return readTime * 60;
    },
    tourTerms() {
      if (!this.tour || !this.tour.terms) {
        return "";
      }
      window.terms = this.tour.terms.layout;
      // console.log(this.tour.terms.layout.split("Anlage"));
      return this.tour.terms.layout.split("Anlage");
    },
    terms() {
      var temporal = [];
      var originalterms = this.trans("front.termsAndContidion");
      var counter = 0;
      var termsArray = [];
      for (var term in originalterms) {
        if (termsArray.length === 6) {
          temporal.push(termsArray);
          termsArray = [];
        }

        termsArray.push(originalterms[term]);
      }
      if (termsArray.length !== 0) {
        temporal.push(termsArray);
      }
      this.accept = new Array(temporal.length).fill(0);
      this.$nextTick(() => {
        $('[data-toggle="tooltip"]').tooltip();
      });
      return temporal;
    }
  },
  props: {
    tour: {
      required: true
    },
    acceptTerms: {
      required: true
    }
  },
  watch: {
    currentIndex(newval) {
      this.accept[newval] = 1;
    }
  },
  methods: {
    saveSignature() {
      var _this = this;

      var svg = _this.$refs.signature.save("image/svg+xml");
      this.acceptTerms(svg);

      // console.log(svg);
    },
    clear() {
      var _this = this;
      _this.$refs.signature.clear();
    },
    undo() {
      var _this = this;
      _this.$refs.signature.undo();
    },
    getTerms(terms, anlage = false) {
      if (anlage) {
        terms = "Anlage " + terms;
      }
      //  v-if="/^([0-9][.][0-9])/.test(linetext) || /^([0-9][.][ ])/.test(linetext)"
      var myterms = terms.replace(/&nbsp;/gi, "");
      myterms = myterms.split(/\r\n|\r|\n/);
      var returnTerms = [
        {
          class: "title",
          text: ""
        }
      ];
      var i = 0;
      while (i < myterms.length - 1) {
        if (
          /^([0-9][.][0-9])/.test(myterms[i]) ||
          /^([0-9][.])/.test(myterms[i])
        ) {
          var termsDots = myterms[i].split(/^([0-9][.][0-9])/);
          if (termsDots[1] && /^([0-9][.][0-9])/.test(termsDots[1])) {
            termsDots[1] = "<b>" + termsDots[1] + "</b> ";
          } else {
            var termsDots = myterms[i].split(/^([0-9][.])/);
            if (termsDots[1] && /^([0-9][.])/.test(termsDots[1])) {
              termsDots[1] = "<b>" + termsDots[1] + "</b> ";
            }
          }
          termsDots = termsDots.join(" ");
          returnTerms.push({
            class: "kurier-term",
            text: termsDots
          });
        } else {
          returnTerms[returnTerms.length - 1].text += " " + myterms[i];
        }
        if (i === 0) {
          returnTerms.push({
            class: "only-text",
            text: ""
          });
        }
        i += 1;
      }

      return returnTerms;
      // return terms.split(/\r\n|\r|\n/);
    },
    warning() {
      this.$snotify.warning(
        this.trans("front.touroffers.mustAccept"),
        this.trans("front.touroffers.mustAcceptTitle"),
        {
          timeOut: 3000
        }
      );
    },
    activate(index) {
      if (!this.accept[this.currentIndex] && index > this.currentIndex) {
        this.warning();
        return false;
      }
      if (index < this.tourTerms.length + 1) {
        this.currentIndex = index;
      }
    },
    close() {
      $("#termsModal").modal("hide");
    },
    next() {
      if (!this.accept[this.currentIndex]) {
        this.warning();
        return false;
      }
      if (this.currentIndex === this.tourTerms.length) {
        console.log("here");
        var notAccepted = this.accept.some(element => {
          return !element;
        });
        if (notAccepted) {
          this.warning();
          return false;
        }
        this.saveSignature();
        
        return false;
      }
      this.currentIndex += 1;
    }
  },
  components: {},
  created() {
    // this.$http
    //   .get("/api/tours/tour/terms/" + this.$route.params.tourId)
    //   .then(response => {
    //     this.term = response.body.layout;
    //     console.log(this.term.split(/\r\n|\r|\n/));
    //   });
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