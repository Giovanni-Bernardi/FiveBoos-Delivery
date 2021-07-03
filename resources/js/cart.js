
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
            btnID: '',
        },
        mounted() {
            this.currentRestaurantId = window.id;
            this.getProducts();
            console.log(this.currentRestaurantId);
        },
        methods: {
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
                
                this.numberProduct.push(platesId);
                console.log(this.numberProduct, this.cart, index , 'increase');
            },
            decrease(platesId, index) {
                console.log(platesId ,index, 'indiceee');
                if (this.cart[index].counter > 0) {
                    this.cart[index].counter--;
                    this.totalPrice -= (this.cart[index].price);

                    for (let i = 0; i < this.numberProduct.length; i++) {
                        if (this.cart[index].id == this.numberProduct[i]) {
                            console.log(this.numberProduct[i], i, 'tolto');
                            this.numberProduct.splice(i, 1);
                            break;
                        }
                    }

                    if (this.cart[index].counter < 1) {
                        this.cart.splice(index, 1);
                    }
                    console.log(this.numberProduct, this.cart, index, 'Decrese');
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
                    console.log(this.numberProduct,this.cart, 'ADD');
                }
                else {
                    // se id presente nel cart non deve pushare piatto
                    for(let i = 0; i <= this.cart.length; i++) {

                        if(this.cart[i].id == object.id) {
                            break;
                        }
                        else if (i == this.cart.length - 1) {
                            this.totalPrice = Number((this.totalPrice + productPrice * counter).toFixed(2));
                            this.cart.push(object);
                            this.numberProduct.push(productId);
                            console.log(this.numberProduct,this.cart, 'ADD');
                        }

                    }
                }
            },
            popupDetails: function popupDetails(productId) {
                this.btnID = productId;
                let restaurantBox = document.getElementsByClassName('dish-element');
                console.log(restaurantBox);
                for (let i = 0; i < restaurantBox.length; i++) {
                    restaurantBox[i].classList.add('no-opacity');
                }
            },
            closePopup: function(){
                this.btnID = '';
                let restaurantBox = document.getElementsByClassName('dish-element');
                console.log(restaurantBox);
                for (let i = 0; i < restaurantBox.length; i++) {
                    restaurantBox[i].classList.remove('no-opacity');
                }
            },
            popupCreate: function() {
                this.btnID = 'create';
            }
        },
    });
})
