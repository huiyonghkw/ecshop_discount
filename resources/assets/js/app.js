/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.VueResource = require('vue-resource');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('search-goods', require('./components/SearchGoods.vue'));
// Vue.http.options.root = '/root';
// Vue.http.headers.common['Authorization'] = 'token ea60d37d2d3713568bf1117b2c7e1bfe4c9c8958';
Vue.use(window.VueResource);

const app = new Vue({
    el: '#app'
});
