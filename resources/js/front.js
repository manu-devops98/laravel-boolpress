/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import App from './views/App.vue';
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Post from './pages/Post.vue';
import Posts from './pages/Posts.vue';
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/posts/:id',
            name: 'post',
            component: Post
        },
        {
            path: '/posts',
            name: 'posts',
            component: Posts
        },
    ]
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
