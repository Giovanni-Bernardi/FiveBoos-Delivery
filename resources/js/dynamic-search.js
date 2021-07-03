const { isSet } = require("lodash");

function dynamicSearch() {
    console.log('JS: Connected');

    // -- Vue Class --
    var search = new Vue({
        el: '#appSearch',
        data: {
           categories: [],
           restaurantsList: [],
           filteredRestaurants: [],
           filter: []
        },
        mounted: function(){
            console.log('VUE Connected');
            this.getCategories();
            this.getAllRestaurants();

            // if (thi) {
                
                // }
        },
        computed: function (){
            
        },
        methods:{
            getCategories: function(){

                axios.get('/api/get/categories/',
                ).then(data => {
                    data.data.forEach(element => {
                        this.categories.push({
                            'id': element.id,
                            'name': element.name,
                            'img': element.img
                        });
                    });
                }).catch((error) => {
                    console.log(error);
                });
			},
            getAllRestaurants: function(){
                console.log('PRE FILTRO VUE:' +  this.filter);
                
                axios.get('/api/get/all/restaurants/' + this.filter
                ).then(data => {
                    this.restaurantsList = data.data;

                    if (window.landingFilter == undefined) {
                        this.filteredRestaurants = data.data;
                    }else{
                        this.filter.push(window.landingFilter);
                        this.getFilteredRestaurant();
                    }
                    console.log(this.restaurantsList);
                }).catch((error) => {
                    console.log(error);
                });
			},
            getFilteredRestaurant: function(){
                console.log(this.filter);
                if (this.filter.length < 1) {
                    this.filteredRestaurants = [...this.restaurantsList];
                }else{
                    axios.get('/api/get/filtered/restaurants/' + this.filter
                    ).then(data => {
                        this.filteredRestaurants = [];
                        this.filteredRestaurants = data.data;
                        console.log(this.filteredRestaurants);
                    }).catch((error) => {
                        console.log(error);
                    });
                }
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', dynamicSearch);