<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink"
    version="1.1"
    id="Capa_1"
    x="0px"
    y="0px"
    viewBox="0 0 455.431 455.431"
    style="enable-background:new 0 0 455.431 455.431;"
    xml:space="preserve"
  >
    <path
      style="fill:#f6ab36;"
      d="M405.493,412.764c-69.689,56.889-287.289,56.889-355.556,0c-69.689-56.889-62.578-300.089,0-364.089  s292.978-64,355.556,0S475.182,355.876,405.493,412.764z"
    ></path>
    <path
      style="fill:#ffde57;"
      d="M229.138,313.209c-62.578,49.778-132.267,75.378-197.689,76.8  c-48.356-82.489-38.4-283.022,18.489-341.333c51.2-52.622,211.911-62.578,304.356-29.867  C377.049,112.676,330.116,232.142,229.138,313.209z"
    ></path>
    <text
      style="text-shadow: 0 0 10px rgba(255,255,255,0.5);font-style:italic;"
      x="50%"
      y="55%"
      :fill="textColor"
      font-size="300"
      dominant-baseline="middle"
      text-anchor="middle"
    >
      <slot></slot>
    </text>
  </svg>
</template>


<script>
export default {
  data() {
    return {};
  },
  computed: {},
  props: {
    textColor: {
      required: false,
      default: "#222222"
    }
  },
  watch: {},
  methods: {},
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