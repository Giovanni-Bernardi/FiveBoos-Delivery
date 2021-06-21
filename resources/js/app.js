/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { method, isSet, fromPairs } = require('lodash');

require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import axios from 'axios';
import Vue from 'vue';

document.addEventListener('DOMContentLoaded', function () {

    new Vue({
        el: '#app',
        data: {
            restaurants: [],
            products: [],
            types: [],
            cart: [],
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
                axios.get('/api/products/')
                .then(response =>{
                    this.products = response.data
                    console.log(this.products);
                })
                .catch(error => {
                    console.log(error)
                })
            },
            // getTypes() {
            //     axios.get('/api/types')
            //     .then(response =>{
            //         this.types = response.data
            //         console.log(this.types);
            //     })
            //     .catch(error => {
            //         console.log(error)
            //     })
            // },
            increase(index) {
                this.cart[index].counter++;
                this.totalPrice += (this.cart[index].price)

            },
            decrease(index) {
                if (this.cart[index].counter > 0) {
                    this.cart[index].counter--;
                    this.totalPrice -= (this.cart[index].price)
                }
                else if (this.cart[index].counter < 1) {

                    this.cart.splice(index, 1);
                }

            },
            addToCart(productId, productName, productPrice, counter) {

                var object = {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    counter: counter,
                };

                if (this.cart.length == 0) {
                    this.totalPrice = Number((this.totalPrice + productPrice * counter).toFixed(2));
                    this.cart.push(object);
                }
                else {
                    // se id presente nel cart non deve pushiare piatto
                    for(var i = 0; i <= this.cart.length; i++) {

                        if(this.cart[i].id == object.id) {
                            break;
                        }
                        else if (i == this.cart.length - 1) {
                            this.totalPrice = Number((this.totalPrice + productPrice * counter).toFixed(2));
                            this.cart.push(object);
                        }
                    }
                }
                console.log(object);
                console.log(this.cart);
            },
        },
    });
});



//
// function statisticsChart() {
//     console.log('JS: Connected');
//
//     // VUE Standard components
//     // const app = new Vue({
//     //     el: '#app',
//     // });
//
//     // Input invisibile, value = restaurant_id
//     var restaurantId = document.getElementById('d_elem').value;
//     console.log('Restaurant id: ' + restaurantId);
//
//     // Lista 12 mesi per grafico
//     let monthsNames12 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
//
//     // -- Vue Class --
//     let chart = new Vue({
//         el: '#appChart',
//         data: {
//             monthsName: [],
//             monthsOrders: [],
//             year: 0,
//             currentYear: new Date().getFullYear(),
//             myChart: ''
//         },
//         mounted: function(){
//             console.log('VUE Connected');
//             this.get12MonthsData();
//
//         },
//         methods:{
//             // Funzione di chiamata al controller Statistiche
//             get12MonthsData: function(){
//
//                 if(!this.year){
//                     this.year = this.currentYear
//                 }
//                 console.log('Year selected:' + this.year);
//
//                 axios.get('/stats/month/' + restaurantId + '/' + this.year,
//                 {
//                     params:{
//                         // Parametri
//                     }
//                 }).then(data => {
//                     console.log(data.data);
//
//                     // Contatore mesi con ordini
//                     let cont = 0;
//                     // Lista finale con numero ordini per mese (12 mesi)
//                     let ordersNumberList = [];
//
//                     let datas = data.data;
//                     monthsName = datas[0];
//                     monthsOrders = datas[1];
//                     console.log(monthsName, 'API Axios 2');
//
//                     // Assegnamento valori in lista finale
//                     for (let i = 0; i < monthsNames12.length; i++) {
//                         const month = monthsNames12[i];
//
//                         if(month == monthsName[cont]){
//                             ordersNumberList.push(monthsOrders[cont]);
//                             cont ++;
//                         }else{
//                             ordersNumberList.push(0);
//                         }
//                     }
//
//                     console.log(ordersNumberList);
//                     this.chart12(ordersNumberList);
//                 }).catch(() => {
//                     console.log('Error');
//                 });
// 			},
//             // Istanza classe - Grafico statistiche n°ordini per 12 mesi
//             chart12: function(ordersNumberList){
//
//                 let ctx = document.getElementById('myChart');
//                 myChart = new Chart(ctx, {
//                     type: 'line',
//                     data: {
//                         labels: monthsNames12,
//                         datasets: [{
//                             label: 'Orders per month',
//                             data: ordersNumberList,
//                             backgroundColor: [
//                                 'rgba(255, 99, 132, 0.2)',
//                                 'rgba(54, 162, 235, 0.2)',
//                                 'rgba(255, 206, 86, 0.2)',
//                                 'rgba(75, 192, 192, 0.2)',
//                                 'rgba(153, 102, 255, 0.2)',
//                                 'rgba(255, 159, 64, 0.2)'
//                             ],
//                             borderColor: [
//                                 'rgba(255, 99, 132, 1)',
//                                 'rgba(54, 162, 235, 1)',
//                                 'rgba(255, 206, 86, 1)',
//                                 'rgba(75, 192, 192, 1)',
//                                 'rgba(153, 102, 255, 1)',
//                                 'rgba(255, 159, 64, 1)'
//                             ],
//                             borderWidth: 1,
//                             fill: {
//                                 target: 'origin',
//                                 above: 'rgba(255, 0, 0, 0.2)',   // Area will be red above the origin
//                                 below: 'rgb(0, 0, 255)',    // And blue below the origin
//                               }
//                         }],
//
//                     },
//                     options: {
//                         scales: {
//                             y: {
//                                 beginAtZero: true,
//                             },
//                         },
//                         layout:{
//                             padding: 50,
//                         },
//                         plugins: {
//                             legend:{
//                                 labels:{
//                                     font:{
//                                         // weight: 'bold',
//                                         size: 20,
//                                         weight: 'normal',
//                                     },
//                                 }
//                             }
//                         },
//                         elements:{
//                             point:{
//                                 radius: 5,
//                                 hoverRadius: 15,
//                             },
//                             line:{
//                                 fill: true
//                             },
//                         }
//                     }
//                 });
//             },
//             deleteMonthsChart: function (){
//                 this.myChart.data.labels.pop();
//                 this.myChart.data.datasets.forEach((dataset) => {
//                     dataset.data.pop();
//                 });
//                 this.myChart.update();
//             },
//             updateMonthsChart: function (){
//                 this.myChart.data.labels.push(label);
//                 this.myChart.data.datasets.forEach((dataset) => {
//                 dataset.data.push(data);
//                 });
//                 this.myChart.update();
//             }
//         }
//     });
// }
//
// document.addEventListener('DOMContentLoaded', init);

    // VUE Standard components
    // const app = new Vue({
    //     el: '#app',
    // });

    // Input invisibile, value = restaurant_id
    var restaurantId = document.getElementById('d_elem').value;
    console.log('Restaurant id: ' + restaurantId);

    // Lista 12 mesi per grafico 
    let monthsNames12 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

    // -- Vue Class --
    let chart = new Vue({
        el: '#appChart',
        data: {
            monthsName: [],
            monthsOrders: [],
            year: 0,
            currentYear: new Date().getFullYear(),
            myChart: ''
        },
        mounted: function(){
            console.log('VUE Connected');
            this.get12MonthsData();

        },
        methods:{
            // Funzione di chiamata al controller Statistiche
            get12MonthsData: function(){

                if(!this.year){
                    this.year = this.currentYear
                }
                console.log('Year selected:' + this.year);

                axios.get('/stats/month/' + restaurantId + '/' + this.year,
                {
                    params:{
                        // Parametri
                    }
                }).then(data => {
                    console.log(data.data);

                    // Contatore mesi con ordini
                    let cont = 0;
                    // Lista finale con numero ordini per mese (12 mesi)
                    let ordersNumberList = [];

                    let datas = data.data;
                    monthsName = datas[0];
                    monthsOrders = datas[1];
                    console.log(monthsName, 'API Axios 2');

                    // Assegnamento valori in lista finale
                    for (let i = 0; i < monthsNames12.length; i++) {
                        const month = monthsNames12[i];

                        if(month == monthsName[cont]){
                            ordersNumberList.push(monthsOrders[cont]);
                            cont ++;
                        }else{
                            ordersNumberList.push(0);
                        }
                    }
                    
                    console.log(ordersNumberList);
                    this.chart12(ordersNumberList);
                }).catch(() => {
                    console.log('Error');
                });
			},
            // Istanza classe - Grafico statistiche n°ordini per 12 mesi 
            chart12: function(ordersNumberList){

                let ctx = document.getElementById('myChart');
                myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: monthsNames12,
                        datasets: [{
                            label: 'Orders per month',
                            data: ordersNumberList,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1,
                            fill: {
                                target: 'origin',
                                above: 'rgba(255, 0, 0, 0.2)',   // Area will be red above the origin
                                below: 'rgb(0, 0, 255)',    // And blue below the origin
                              }
                        }],
            
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                            },
                        },
                        layout:{
                            padding: 50,
                        },
                        plugins: {
                            legend:{
                                labels:{
                                    font:{
                                        // weight: 'bold',
                                        size: 20,
                                        weight: 'normal',
                                    },
                                }
                            }
                        },
                        elements:{
                            point:{
                                radius: 5,
                                hoverRadius: 15,
                            },
                            line:{
                                fill: true
                            },
                        }
                    }
                });
            },
            deleteMonthsChart: function (){
                this.myChart.data.labels.pop();
                this.myChart.data.datasets.forEach((dataset) => {
                    dataset.data.pop();
                });
                this.myChart.update();
            },
            updateMonthsChart: function (){
                this.myChart.data.labels.push(label);
                this.myChart.data.datasets.forEach((dataset) => {
                dataset.data.push(data);
                });
                this.myChart.update();
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', init);


//mouse follow
var cursorFollow = document.querySelectorAll('.popup-note');

document.addEventListener('mousemove', fn, false);

function fn(e) {
  for (var i = cursorFollow.length; i--;) {
    cursorFollow[i].style.left = e.pageX + 'px';
    cursorFollow[i].style.top = e.pageY + 'px';
  }
}