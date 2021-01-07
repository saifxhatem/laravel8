require('./bootstrap');


window.Vue = require('vue');
import VueRouter from 'vue-router'
import DisplayAddressByID from './components/DisplayAddressByID.vue'
import DisplayAddresses from './components/DisplayAddresses.vue'

Vue.use(VueRouter)



const routes = [
  { name: 'displayAddressByID', path: '/fetchaddr', component: DisplayAddressByID, props: true},
  { name: 'displayAddresses', path: '/list-addresses', component: DisplayAddresses}
]

const router = new VueRouter({
  routes,
  mode: 'history'
})

Vue.component('display-users', require('./components/DisplayUsers.vue').default);
Vue.component('display-addresses', require('./components/DisplayAddresses.vue').default);
Vue.component('insert-address', require('./components/InsertAddressFormComponent.vue').default);
Vue.component('vue-header', require('./components/HeaderComponent.vue').default);
Vue.component('alert-button', require('./components/ButtonComponent.vue').default);


const app = new Vue({
  el: '#app',
  router
}).$mount('#app');
