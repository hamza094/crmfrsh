/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Vue from 'vue';

import VueSlideoutPanel from 'vue2-slideout-panel';

Vue.use(VueSlideoutPanel);

import VModal from 'vue-js-modal'
Vue.use(VModal)

import 'animate.css';

import "cropperjs/dist/cropper.css"


import VueToastify from "vue-toastify";
Vue.use(VueToastify, {
    position:"bottom-left",
    theme:"light",
    successDuration:2050,
      errorDuration:2050,
      canPause:false
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('dynamic-nav', require('./components/DynamicNav.vue').default);
Vue.component('lead-button', require('./components/LeadButton.vue').default);
Vue.component('lead-form', require('./components/LeadForm.vue').default);
Vue.component('single-lead', require('./components/SingleLead.vue').default);
Vue.component('file', require('./components/File.vue').default);
Vue.component('lead-edit', require('./components/LeadEdit.vue').default);
Vue.component('lead-stage', require('./components/Stage.vue').default);

const routes = [
  { path: '/dashboard', component: require('./components/Dashboard.vue').default },
  { path: '/leads', component: require('./components/Lead.vue').default },
  { path: '/contacts', component: require('./components/Contact.vue').default },
  { path: '/accounts', component: require('./components/Account.vue').default },
  { path: '/deals', component: require('./components/Deal.vue').default },
  { path: '*', component:require('./components/Error.vue').default}
]

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
     router
});
