import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuelidate from 'vuelidate';
import Vuex from 'vuex';

import App from './App';
import store from './store';
import router from './router';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import '../scss/app.scss';

Vue.use(VueRouter);
Vue.use(Vuelidate);
Vue.use(Vuex);

new Vue({
  render: h => h(App),
  store,
  router,
}).$mount('#app');
