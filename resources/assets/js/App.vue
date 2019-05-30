<template>
  <div class="kurier-link-main-container">
    <vue-snotify></vue-snotify>
    <router-view></router-view>
  </div>
</template>


<script>
export default {
  data() {
    return {};
  },
  created() {
    this.$cookies.config("30d");
  },
  computed: {
    isTouchDevice() {
      return true;
    }
  },
  mounted() {
    $(window).click(() => {
      if (this.isTouchDevice === true) {
        $('[data-toggle="tooltip"]').tooltip("hide");
      }
    });
  }
};
</script>

<style lang="scss">
</style>