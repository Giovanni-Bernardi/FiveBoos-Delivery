require('./bootstrap');

window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import axios from 'axios';
import Vue from 'vue';

document.addEventListener('DOMContentLoaded', function () {

    new Vue({
        el: '#app',
        data: {
            restaurants: [],
            products: [],
            types: [],
            filterRestaurants: [],
            typeSelect: '',
            search: '',
            currentRestaurantId: '',
            totalPrice: 0,
        },
        mounted() {
            this.getRestaurants();
            this.getProducts();
            this.getTypes();
        },
        methods: {
            getRestaurants() {
                axios.get('/api/restaurants')
                .then(response =>{
                    this.restaurants = response.data
                    console.log(this.restaurants);
                })
                .catch(error => {
                    console.log(error)
                })
            },
            getProducts() {
                axios.get('/api/products')
                .then(response =>{
                    this.products = response.data
                    console.log(this.products);
                })
                .catch(error => {
                    console.log(error)
                })
            },
            getTypes() {
                axios.get('/api/types')
                .then(response =>{
                    this.types = response.data
                    console.log(this.types);
                })
                .catch(error => {
                    console.log(error)
                })
            },
        },
    });
});
