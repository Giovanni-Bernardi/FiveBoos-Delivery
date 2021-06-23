// require('./bootstrap');
//
// window.Vue = require('vue');
//
// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//
// import axios from 'axios';
// import Vue from 'vue';

document.addEventListener('DOMContentLoaded', function () {

    new Vue({
        el: '#app',
        data: {
            restaurants: [],
            products: [],
            cart: [],
            numberProduct: [],
            filterRestaurants: [],
            typeSelect: '',
            search: '',
            currentRestaurantId: '',
            visibility: false,
            quantity: 1,
            totalPrice: 0,
        },
        mounted() {
            this.currentRestaurantId = window.id;
            this.getProducts();
            // this.getRestaurants();
            // this.getTypes();
            console.log(this.currentRestaurantId);
        },
        methods: {
            // getRestaurants() {
            //     axios.get('/api/restaurants')
            //     .then(response =>{
            //         this.restaurants = response.data
            //         console.log(this.restaurants);
            //     })
            //     .catch(error => {
            //         console.log(error)
            //     })
            // },
            getProducts() {
                axios.get('/api/products/' + this.currentRestaurantId)
                .then(response =>{
                    this.products = response.data
                    console.log(this.products);
                })
                .catch(error => {
                    console.log(error)
                })
            },
            increase(platesId, index) {
                this.cart[index].counter++;
                this.totalPrice += (this.cart[index].price);
                let product = {
                    id: platesId,
                };
                this.numberProduct.push(platesId);
                console.log(this.numberProduct);
            },
            decrease(platesId, index) {
                if (this.cart[index].counter > 0) {
                    this.cart[index].counter--;
                    this.totalPrice -= (this.cart[index].price);
                    let product = {
                        id: platesId,
                    };
                    this.numberProduct.splice(index, 1);
                }
                else if (this.cart[index].counter < 1) {

                    this.cart.splice(index, 1);
                }

            },
            addToCart(productId, productName, productPrice, counter) {

                let object = {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    counter: counter,
                };

                if (this.cart.length == 0) {
                    this.totalPrice = Number((this.totalPrice + productPrice * counter).toFixed(2));
                    this.cart.push(object);
                    this.numberProduct.push(productId);
                    console.log(this.numberProduct);
                }
                else {
                    // se id presente nel cart non deve pushiare piatto
                    for(let i = 0; i <= this.cart.length; i++) {

                        if(this.cart[i].id == object.id) {
                            break;
                        }
                        else if (i == this.cart.length - 1) {
                            this.totalPrice = Number((this.totalPrice + productPrice * counter).toFixed(2));
                            this.cart.push(object);
                            this.numberProduct.push(productId);
                        }
                    }
                }
            },
        },
    });
})
