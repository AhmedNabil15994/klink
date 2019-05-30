<template>
  <div class="kurier-login-body-wrapper">
    <input-parent
      v-for="input in inputs"
      :key="'sender'+input.model"
      v-bind="input.props"
      v-model="user[input.model]"
    ></input-parent>
    <div class="small-order-cell completeIt">
      <div
        style="display:flex;align-items:center;"
        class="letsComplete btn"
        @click="registerNewUser"
      >
        {{trans('front.touroffers.register')}}
        <img
          style="max-width:20px;max-height:20px;"
          src="/images/loading.svg"
          v-show="validatedAndErros"
          alt
        >
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      user: {
        first_name: "",
        nick_name: "",
        phone: "",
        email: "",
        password: ""
      },
      inputs: [
        {
          props: {
            name: "register" + trans("front.create.firstName"),
            placeholder: trans("front.create.firstName"),
            // img: '/images/food-scale-tool.svg',
            validate: "required|max:255",
            id: "registerfirstName",
            newclasses: {
              "half-width": true,
              odd: true
            },
            autoFocus: true
          },
          model: "first_name"
        },
        {
          props: {
            name: "register" + trans("front.create.lastName"),
            placeholder: trans("front.create.lastName"),
            // img: '/images/food-scale-tool.svg',
            validate: "required|max:255",
            id: "registerlastName",
            newclasses: {
              "half-width": true
            }
          },
          model: "nick_name"
        },
        {
          props: {
            name: "register" + trans("front.create.phone"),
            placeholder: trans("front.create.phone"),
            // img: '/images/food-scale-tool.svg',
            validate: "required|phone|max:255",
            id: "registerphone",
            newclasses: {}
          },
          model: "phone"
        },

        {
          props: {
            name: "register" + trans("front.create.email"),
            placeholder: trans("front.create.email"),
            // img: '/images/food-scale-tool.svg',
            validate: "required|email|max:255",
            id: "registeremail"
          },
          model: "email"
        },
        {
          props: {
            name: "register" + trans("front.touroffers.password"),
            placeholder: trans("front.touroffers.password"),
            // img: '/images/food-scale-tool.svg',
            validate: "required|min:6|max:255",
            id: "registerPassword",
            inputType: "password"
          },
          model: "password"
        }
      ]
    };
  },
  computed: {
    validatedAndErros() {
      if (this.errors && this.errors.items.length !== 0) {
        return false;
      }
      for (var field in this.fields) {
        if (this.fields[field]["valid"] === false) {
          return false;
        }
      }
      return true;
    },
    formData() {
      return {
        url: "/api/register/" + this.$route.params.tourId,
        data: this.user,
        validate: this.$validator,
        failedValidate: data => {},
        failServer: error => {
          if (error.body.errors) {
            for (var key in error.body.errors) {
              error.body.errors[key].forEach(element => {
                this.$snotify.warning(element, key, {
                  timeOut: 3500
                });
              });
            }
          }
        },
        successServer: response => {
          this.tour.isAuth = response.body.isAuth;
          this.tour.userId = response.body.userId;
          console.log(this.tour.isAuth);
        }
      };
    }
  },
  props: {
    tour: {
      required: true
    }
  },
  watch: {},
  methods: {
    registerNewUser() {
      // console.log(this.errors);
      this.$vss.post(this.formData);
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