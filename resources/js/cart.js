
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

                    if (this.cart[index].counter < 1) {
                        this.cart.splice(index, 1);
                    }
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
            popupDetails: function popupDetails(productId) {
              this.btnID = productId;
              console.log(this.btnID, productId);
            },
            closePopup: function(){
                this.btnID = '';
            },
            popupCreate: function() {
                this.btnID = 'create';
            }
        },
    });
})
