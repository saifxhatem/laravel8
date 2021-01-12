require('./bootstrap');


window.Vue = require('vue');
import VueRouter from 'vue-router'

//import views
import Login from './views/Login.vue'
import Register from './views/Register.vue'
import Addresses from './views/Addresses.vue'
import Governorates from './views/Governorates.vue'
import Home from './views/Home.vue'
import AddAddress from './views/AddAddress.vue'
import AddGovernorate from './views/AddGovernorate.vue'
import AddArea from './views/AddArea.vue'


Vue.use(VueRouter)



const routes = [
//  { name: 'displayAddressByID', path: '/fetchaddr', component: DisplayAddressByID, props: true},
//  { name: 'displayAddresses', path: '/list-addresses', component: DisplayAddresses},
  { name: 'login', path: '/login', component: Login},
  { name: 'register', path: '/register', component: Register},
  { name: 'home', path: '/home/:user_id', component: Home},
  { name: 'addresses', path: '/addresses/:user_id', component: Addresses},
  { name: 'governorates', path: '/governorates/:user_id', component: Governorates},
  { name: 'add-address', path: '/add-address/:user_id', component: AddAddress},
  { name: 'add-gov', path: '/add-governorate', component: AddGovernorate},
  { name: 'add-area', path: '/add-area/:gov_id', component: AddArea},
  
]

const router = new VueRouter({
  routes,
  //mode: 'history'
})

Vue.component('display-users', require('./components/DisplayUsers.vue').default);
Vue.component('display-addresses', require('./components/DisplayAddresses.vue').default);
Vue.component('vue-header', require('./components/HeaderComponent.vue').default);
Vue.component('alert-button', require('./components/ButtonComponent.vue').default);
Vue.component('registration-form', require('./components/RegistrationFormComponent.vue').default);
Vue.component('login-form', require('./components/LoginFormComponent.vue').default);
Vue.component('display-addresses-paginated', require('./components/DisplayAddressesPaginated.vue').default);
Vue.component('display-governorates-paginated', require('./components/DisplayGovernoratesPaginated.vue').default);
Vue.component('back-button', require('./components/GoBackButton.vue').default);
Vue.component('error-alert', require('./components/ErrorAlertComponent.vue').default);
Vue.component('success-alert', require('./components/SuccessAlertComponent.vue').default);
Vue.component('add-address-form', require('./components/AddAddressFormComponent.vue').default);
Vue.component('add-governorate-form', require('./components/AddGovernorateFormComponent.vue').default);
Vue.component('add-area-form', require('./components/AddAreaFormComponent.vue').default);



const app = new Vue({
  el: '#app',
  router
}).$mount('#app');
