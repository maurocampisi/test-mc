require('./bootstrap');
require('alpinejs');

import Vue from 'vue/dist/vue';
window.Vue = Vue;

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

const getters = {
    isAuthenticated: localStorage.getItem('AccessToken') ? true : false
}

if(getters.isAuthenticated) {
    axios.defaults.headers["Authorization"] = "Bearer " + (localStorage.getItem("AccessToken"));
}

const routes = [
    {path: process.env.MIX_PATH + "login", component: require('./components/Login.vue').default,  name: "login"},
    { 
        
        path: process.env.MIX_PATH + '/', 
        component: require('./components/Dashboard.vue').default,  
        beforeEnter: (to, from, next) => {
            if (!getters.isAuthenticated) next({ name: 'login' })
            else next()
        },
        name: "dashboard"},
];

const router = new VueRouter({
    routes: routes,
    mode: "history"
});

const app = new Vue({
    el: '#app',
    router,
    mounted: function () {
       
    },
    methods: {
        
    }
});