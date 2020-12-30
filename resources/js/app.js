require('./bootstrap');

window.Vue = require('vue');

Vue.component('front-page', require('./components/Front.vue').default);
Vue.component('display-addresses', require('./components/DisplayAddresses.vue').default);
Vue.component('insert-field', require('./components/Insert-Field.vue').default);
Vue.component('vue-header', require('./components/HeaderComponent.vue').default);
Vue.component('alert-button', require('./components/AlertButtonComponent.vue').default);
//Vue.component('success-div', require('./components/Success-Div.vue').default);

const app = new Vue({
  el: '#app',
});
