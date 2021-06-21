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
            cart: [],
            typeSelect: '',
            search: '',
            currentRestaurantId: '',
            visibility: false,
            quantity: 0,
            totalPrice: 0,
        },
        mounted() {
            this.currentRestaurantId = window.id;
            this.getProducts();
            this.getRestaurants();
            this.getTypes();
            console.log(this.currentRestaurantId);
        },
        methods: {
            getRestaurants() {
                axios.get('/api/restaurants')
                .then(response =>{
                    this.restaurants = response.data
                    // console.log(this.restaurants);
                })
                .catch(error => {
                    console.log(error)
                })
            },
            getProducts() {
                axios.get('/api/products/')
                .then(response =>{
                    this.products = response.data
                    // console.log(this.products);
                })
                .catch(error => {
                    console.log(error)
                })
            },
            getTypes() {
                axios.get('/api/types')
                .then(response =>{
                    this.types = response.data
                    // console.log(this.types);
                })
                .catch(error => {
                    console.log(error)
                })
            },
            increase(index) {
                this.cart[index].counter++;
            },
            decrease(index) {
                this.cart[index].counter--;
            },
            addToCart(productId, productName, productPrice) {

                var object = {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    counter: 1,
                };

                // for(var i= 0; i < this.cart.length; i++) {
                //     // se id presente nel cart non deve pushiare piatto ma per adesso non funziona
                //     if(this.cart[i].id == productId) {
                //         break;
                //     }
                //     else {
                //         this.totalPrice = Number((this.totalPrice + productPrice).toFixed(2));
                //         this.cart.push(object);
                //     }
                // }

                this.totalPrice = Number((this.totalPrice + productPrice * 1).toFixed(2));
                this.cart.push(object);
                console.log(object);
                console.log(this.cart);
            },
        },
    });
});
