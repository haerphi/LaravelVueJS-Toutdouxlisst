require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import Home from './components/home.vue';

//import pour login
import Login from './components/login/loginComponent.vue';
import Register from './components/login/registerComponent.vue';

//import pour register
import TodoList from './components/todo/TodoListComponent.vue';
import CreateTodo from './components/todo/CreateTodoComponent.vue';
import EditTodo from './components/todo/EditTodoComponent.vue';

const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    //route pour le login
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },

    //Routes pour la todo list
    {
        name: 'todoList',
        path: '/todoList',
        component: TodoList
    },
    {
        name: 'createTodo',
        path: '/todoCreate',
        component: CreateTodo
    },
    {
        name: 'edittodo',
        path: '/todoEdit/:id',
        component: EditTodo
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});
const app = new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');
