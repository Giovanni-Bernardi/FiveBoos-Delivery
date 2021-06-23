function dynamicSearch() {
    console.log('JS: Connected');


    // Input invisibile, value = restaurant_id
    // let restaurantId = document.getElementById('d_elem').value;


    // -- Vue Class --
    var search = new Vue({
        el: '#appSearch',
        data: {
           categories: [],
           restaurantsList: [],
           category_restaurant: [],
           filteredRestaurants: [],
           filter: []
        },
        mounted: function(){
            console.log('VUE Connected');
            this.getCategories();
            this.getAllRestaurants();
        },
        methods:{
            // Funzione di chiamata al controller Statistiche
            getCategories: function(){

                axios.get('/api/get/categories/',
                {
                    params:{
                        // Parametri
                    }
                }).then(data => {
                    // this.categories = data.data;

                    data.data.forEach(element => {
                        this.categories.push({
                            'id': element.id,
                            'name': element.name
                        });
                    });
                    console.log(this.categories);
                   
                }).catch((error) => {
                    console.log(error);
                });
			},
            getAllRestaurants: function(){

                axios.get('/api/get/all/restaurants',
                {
                    params:{
                        // Parametri
                    }
                }).then(data => {
                    this.restaurantsList = data.data[0];
                    this.category_restaurant = data.data[1];
                    console.log(this.restaurantsList, this.category_restaurant);
                    this.giveGenres();
                }).catch((error) => {
                    console.log(error);
                });
			},
            giveGenres: function (){
                for (let i = 0; i < this.restaurantsList.length; i++) {
                    // console.log(this.restaurantsList[i].id);
                    this.restaurantsList[i].categories = [];
                    for (let j = 0; j < this.category_restaurant[i].length; j++) {
                        // console.log(this.category_restaurant[i][j]);
                        this.restaurantsList[i].categories.push({
                            'id': this.category_restaurant[i][j].id, 
                            'name': this.category_restaurant[i][j].name
                        });
                        // console.log(this.restaurantsList[i].categories);
                    }
                }
                console.log(this.restaurantsList);
            },
            getFilteredRestaurant: function(){
                this.filteredRestaurants = [];
                console.log(this.filteredRestaurants, 'emptyyy');
                this.restaurantsList.forEach(element => {
                    let push = false;
                    // console.log( 'RISTORANTE'. element.id);
                    element.categories.forEach(element => {
                        console.log(element.name, element.id, 'CATEGORIA');
                        console.log(this.filter , 'FILTRO');
                        for (let i = 0; i < this.filter.length; i++) {
                            if(element.id == this.filter[i]){
                                push = true;
                            }
                        }
                    });
                    if (push) {
                        this.filteredRestaurants.push(element);
                        console.log(element.business_name,'PUSHATOOOO');
                    }else{
                        console.log('NOOOOOOOOOOOOOOOOOOOOOOO');
                    }
                });
                
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', dynamicSearch);
