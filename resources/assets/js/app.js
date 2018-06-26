import {ServerTable, ClientTable, Event} from 'vue-tables-2';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.use(ClientTable, [], false, 'bootstrap4', 'default');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('accounts', require('./components/account/AccountComponent.vue'));
Vue.component('transactions', require('./components/transaction/TransactionComponent.vue'));

const app = new Vue({
    el: '#app'
});
