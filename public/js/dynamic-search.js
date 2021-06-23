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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dynamic-search.js":
/*!****************************************!*\
  !*** ./resources/js/dynamic-search.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function dynamicSearch() {
  console.log('JS: Connected'); // Input invisibile, value = restaurant_id
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
    mounted: function mounted() {
      console.log('VUE Connected');
      this.getCategories();
      this.getAllRestaurants();
    },
    methods: {
      // Funzione di chiamata al controller Statistiche
      getCategories: function getCategories() {
        var _this = this;

        axios.get('/api/get/categories/', {
          params: {// Parametri
          }
        }).then(function (data) {
          // this.categories = data.data;
          data.data.forEach(function (element) {
            _this.categories.push({
              'id': element.id,
              'name': element.name
            });
          });
          console.log(_this.categories);
        })["catch"](function (error) {
          console.log(error);
        });
      },
      getAllRestaurants: function getAllRestaurants() {
        var _this2 = this;

        axios.get('/api/get/all/restaurants', {
          params: {// Parametri
          }
        }).then(function (data) {
          _this2.restaurantsList = data.data[0];
          _this2.category_restaurant = data.data[1];
          console.log(_this2.restaurantsList, _this2.category_restaurant);

          _this2.giveGenres();
        })["catch"](function (error) {
          console.log(error);
        });
      },
      giveGenres: function giveGenres() {
        for (var i = 0; i < this.restaurantsList.length; i++) {
          // console.log(this.restaurantsList[i].id);
          this.restaurantsList[i].categories = [];

          for (var j = 0; j < this.category_restaurant[i].length; j++) {
            // console.log(this.category_restaurant[i][j]);
            this.restaurantsList[i].categories.push({
              'id': this.category_restaurant[i][j].id,
              'name': this.category_restaurant[i][j].name
            }); // console.log(this.restaurantsList[i].categories);
          }
        }

        console.log(this.restaurantsList);
      },
      getFilteredRestaurant: function getFilteredRestaurant() {
        var _this3 = this;

        this.filteredRestaurants = [];
        console.log(this.filteredRestaurants, 'emptyyy');
        this.restaurantsList.forEach(function (element) {
          var push = false; // console.log( 'RISTORANTE'. element.id);

          element.categories.forEach(function (element) {
            console.log(element.name, element.id, 'CATEGORIA');
            console.log(_this3.filter, 'FILTRO');

            for (var i = 0; i < _this3.filter.length; i++) {
              if (element.id == _this3.filter[i]) {
                push = true;
              }
            }
          });

          if (push) {
            _this3.filteredRestaurants.push(element);

            console.log(element.business_name, 'PUSHATOOOO');
          } else {
            console.log('NOOOOOOOOOOOOOOOOOOOOOOO');
          }
        });
      }
    }
  });
}

document.addEventListener('DOMContentLoaded', dynamicSearch);

/***/ }),

/***/ 3:
/*!**********************************************!*\
  !*** multi ./resources/js/dynamic-search.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Boolean\Esercizi Corso\proj-final-delivery\resources\js\dynamic-search.js */"./resources/js/dynamic-search.js");


/***/ })

/******/ });