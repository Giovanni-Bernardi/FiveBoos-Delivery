/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/cart.js":
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
      btnID: ''
    },
    mounted: function mounted() {
      this.currentRestaurantId = window.id;
      this.getProducts();
      console.log(this.currentRestaurantId);
    },
    methods: {
      getProducts: function getProducts() {
        var _this = this;

        axios.get('/api/products/' + this.currentRestaurantId).then(function (response) {
          _this.products = response.data;
          console.log(_this.products);
        })["catch"](function (error) {
          console.log(error);
        });
      },
      increase: function increase(platesId, index) {
        this.cart[index].counter++;
        this.totalPrice += this.cart[index].price;
        var product = {
          id: platesId
        };
        this.numberProduct.push(platesId);
        console.log(this.numberProduct);
      },
      decrease: function decrease(platesId, index) {
        if (this.cart[index].counter > 0) {
          this.cart[index].counter--;
          this.totalPrice -= this.cart[index].price;
          var product = {
            id: platesId
          };
          this.numberProduct.splice(index, 1);
        } else if (this.cart[index].counter < 1) {
          this.cart.splice(index, 1);
        }
      },
      addToCart: function addToCart(productId, productName, productPrice, counter) {
        var object = {
          id: productId,
          name: productName,
          price: productPrice,
          counter: counter
        };

        if (this.cart.length == 0) {
          this.totalPrice = Number((this.totalPrice + productPrice * counter).toFixed(2));
          this.cart.push(object);
          this.numberProduct.push(productId);
          console.log(this.numberProduct);
        } else {
          // se id presente nel cart non deve pushiare piatto
          for (var i = 0; i <= this.cart.length; i++) {
            if (this.cart[i].id == object.id) {
              break;
            } else if (i == this.cart.length - 1) {
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
      closePopup: function closePopup() {
        this.btnID = '';
      }
    }
  });
});

/***/ }),

/***/ 2:
/*!************************************!*\
  !*** multi ./resources/js/cart.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Boolean\Corso\EserciziGit\proj-final-delivery\resources\js\cart.js */"./resources/js/cart.js");


/***/ })

/******/ });