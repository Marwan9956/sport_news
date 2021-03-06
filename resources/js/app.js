
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import $ from "jquery";


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app', require('./components/App.vue').default);
Vue.component('notification', require('./components/notification.vue').default);
Vue.component('news-post', require('./components/forms/news-post.vue').default);
Vue.component('headlines', require('./components/forms/headlines.vue').default);
Vue.component('categories', require('./components/forms/categories.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});


$(document).ready(function(){
    var counter = 0;
    var inputHtml = `<input id="headLines${counter}" class="form-control" type="text" name="headLines${counter}" /> 
                     <br/>`;
    //add new head line news input field
    var btnAddHeadLine = $('#addNewHeadLines');  
    btnAddHeadLine.on('click',function(e){
        $(`<input id="headLines${counter}" class="form-control" type="text" name="headLines${counter}" /> 
        <br/>`).insertBefore(this);
        counter++;
        e.preventDefault();
    });
});