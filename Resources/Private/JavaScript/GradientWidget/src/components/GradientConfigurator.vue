<template>
  <div class="gradient-configurator">
    <table>
      <tr>
        <td>Start Color</td>
        <td>End Color</td>
        <td>Angle</td>
        <td>Preview</td>
      </tr>
      <tr>
        <td>
          <el-color-picker v-model="color1"></el-color-picker>
          <br>
          <input v-model="color1">
        </td>
        <td>
          <el-color-picker v-model="color2"></el-color-picker>
          <br>
          <input v-model="color2">
        </td>
        <td>
          <circle-slider
            v-model="angle"
            :min="0"
            :max="360"
            circle-color="#2980b9"
            progress-color="#2980b9"
            :side="120"
            knob-color="#2c3e50"
            :circle-width="4"
            :progress-width="4"
            :knob-radius="7"
          ></circle-slider>
          <span class="amount">
            <span>
              <input v-model="angle" min="0" max="360" size="3" type="number">
            </span>
            <span>deg</span>
          </span>
        </td>
        <td>
          <div class="preview" contenteditable="true" v-bind:style="style">Some demo text<br />Click to edit</div>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
import Vue from "vue";
import ElementUI from "element-ui";
import locale from "element-ui/lib/locale/lang/en";
import CircleSlider from "vue-circle-slider";
import vueCustomElement from "vue-custom-element";
import "document-register-element/build/document-register-element";

import "element-ui/lib/theme-chalk/color-picker.css";
import "element-ui/lib/theme-chalk/button.css";
import "circle-slider/default.css";

Vue.use(CircleSlider);
Vue.use(ElementUI, { locale });
Vue.use(vueCustomElement);

/* The circular slider has animation that is slow and cant be disabled through the provided options. This method will override the animating method and display the results instantly (withouth animations)
Solution reference: https://stackoverflow.com/questions/43116647/overriding-a-component-method/43121345 (For APPS)
https://jsfiddle.net/wffranco/1zec7xL3/ (For browsers)
Source reference: https://github.com/devstark-com/vue-circle-slider/blob/master/src/components/CircleSlider.vue#L285
*/
const Base = Vue.options.components["circle-slider"];
// eslint-disable-next-line
const circularControl = Base.extend({
  methods: {
    animateSlider(startAngle, endAngle) {
      this.updateAngle(endAngle);
    }
  }
});

export default {
  name: "GradientWidget",
  components: {},
  props: {
    uid: {
      type: String,
      default: ""
    },
    color1: {
      type: String,
      default: "#ffffff"
    },
    color2: {
      type: String,
      default: "#000000"
    },
    angle: {
      type: String,
      default: "45"
    }
  },
  computed: {
    style() {
      return `background-image: linear-gradient(${this.angle}deg,${
        this.color1
      },${this.color2})`;
    }
  },
  methods: {
    change() {
      //   this.$emit("gradient-change", this.color1, this.color2, this.angle);
      this.$emit("gradient-change", {
        color1: this.color1,
        color2: this.color2,
        angle: this.angle
      });
    }
  },
  watch: {
    color1: function() {
      this.change();
    },
    color2: function() {
      this.change();
    },
    angle: function() {
      this.change();
    }
  }
};
</script>
<style>
table {
  width: 100%;
}

@supports (-webkit-text-stroke: thin) {
  .preview {
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 30px;
    display: inline-block;
  }
}
</style>