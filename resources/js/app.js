/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//window.$ = window.jQuery = require('jquery');
//global.$ = global.jQuery = require('@/assets/js/jquery.min.js');

window.Vue = require('vue');
/*require('@/assets/js/jquery.min.js');
require('@/assets/js/popper.min.js');
require('@/assets/js/bootstrap.min.js');
require('@/assets/plugins/simplebar/js/simplebar.js');
require('@/assets/js/waves.js');
require('@/assets/js/sidebar-menu.js');
require('@/assets/js/app-script.js');
require('@/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js');
require('@/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js');
require('@/assets/plugins/Chart.js/Chart.min.js');
require('@/assets/plugins/Chart.js/Chart.extension.js');
require('@/assets/js/index.js');*/



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-component', require('./components/Home.vue').default);
Vue.component('agents-component', require('./components/Addagents.vue').default);
Vue.component('estimates-component', require('./components/Estimates.vue').default);
Vue.component('update-estimates-component', require('./components/UpdateEstimates.vue').default);
Vue.component('monthly-report', require('./components/MonthlyReport.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#wrapper',
});


