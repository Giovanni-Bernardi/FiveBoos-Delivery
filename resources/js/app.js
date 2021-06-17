require('./bootstrap');

window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

document.addEventListener('DOMContentLoaded', () => {

    const app = new Vue({
        el: '#app',
        // data: {
        //     url: 'http://127.0.0.1:8000',
        //     restaurants: [],
        //     filterRestaurants: [],
        //     types: [],
        //     typeSelect: '',
        //     products: [],
        //     search: '',
        //     currentRestaurantId: '',
        //     totalPrice: 0,
        // },
        // methods: {
        //     mounted: function () {
        //         axios.get("http://localhost:8000/index")
        //
        //         .then((data) => {
        //             this.restaurants = data.data.results;
        //             console.log(this.restaurants);
        //         })
        //         .catch(function (e) {
        //             this.error = e;
        //         });
        //         console.log('hello');
        //     },
        // },
    });
});
