import Vue from 'vue'
import vueCustomElement from 'vue-custom-element';

import GradientConfigurator from './components/GradientConfigurator.vue';

Vue.config.ignoredElements = [
  'gradient-configurator'
];

Vue.use(vueCustomElement);

Vue.customElement('gradient-configurator', GradientConfigurator, {
  // Additional Options: https://github.com/karol-f/vue-custom-element#options
});