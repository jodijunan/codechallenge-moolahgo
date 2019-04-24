/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';
import './../sass/_bootstrap.scss';

import Vue from 'vue';
import App from './App.vue';
import CalculatorForm from './components/CalculatorForm.vue';
import RecordList from './components/RecordList.vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('CalculatorForm', CalculatorForm);
Vue.component('RecordList', RecordList);

const app = new Vue({
    el: '#app',
    template : '<app></app>',
    components : { App }
});