/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




function statisticsChart() {
    // const app = new Vue({
    //     el: '#app',
    // });

    new Vue({
        el: '#app',
    });

    console.log('JS Connected');
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Number of orders',
                data: [10, 19, 3, 5, 2, 3],
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
                // x:{
                //     // type: 'time',
                //     display: true,
                // //     title: {
                // //         display: true,
                // //         text: 'Date'
                // //     }
                // },
                y: {
                    beginAtZero: true,
                //     // display: true,
                //     // title: {
                //     //   display: true,
                //     //   text: 'value'
                //     // }
                },
                // grid:{
                    
                // }
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
                            weight: 'bold'
                        },
                    }
                }
            },
            elements:{
                point:{
                    radius: 10,
                    hoverRadius: 15,
                },
                line:{
                    fill: true
                },
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', statisticsChart);
