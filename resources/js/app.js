require('./bootstrap');

window.Vue = require('vue');

Vue.component('display-users', require('./components/DisplayUsers.vue').default);
Vue.component('display-addresses', require('./components/DisplayAddresses.vue').default);
Vue.component('insert-address', require('./components/InsertAddressFormComponent.vue').default);
Vue.component('vue-header', require('./components/HeaderComponent.vue').default);
Vue.component('alert-button', require('./components/ButtonComponent.vue').default);

const app = new Vue({
  el: '#app',
});
