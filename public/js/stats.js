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

/***/ "./resources/js/stats.js":
/*!*******************************!*\
  !*** ./resources/js/stats.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

function statisticsChart() {
  console.log('JS: Connected'); // VUE Standard components
  // const app = new Vue({
  //     el: '#app',
  // });
  // Input invisibile, value = restaurant_id

  var restaurantId = document.getElementById('d_elem').value;
  console.log('Restaurant id: ' + restaurantId);
  var monthsNames12 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; // var myChart;
  // -- Vue Class --

  var chart = new Vue({
    el: '#appChart',
    data: {
      monthsName: [],
      monthsOrders: [],
      year: 0,
      currentYear: new Date().getFullYear(),
      myChart: '',
      ordersNumberList: [] // monthsNames12: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

    },
    mounted: function mounted() {
      console.log('VUE Connected');
      this.get12MonthsData();
    },
    methods: {
      // Funzione di chiamata al controller Statistiche
      get12MonthsData: function get12MonthsData() {
        var _this = this;

        if (!this.year) {
          this.year = this.currentYear;
        }

        console.log('Year selected:' + this.year);
        axios.get('/stats/month/' + restaurantId + '/' + this.year, {
          params: {// Parametri
          }
        }).then(function (data) {
          console.log(data.data); // Contatore mesi con ordini

          var cont = 0;
          var datas = data.data;
          _this.monthsName = datas[0];
          _this.monthsOrders = datas[1];
          console.log(_this.monthsName, 'API Axios 2'); // Assegnamento valori in lista finale

          for (var i = 0; i < monthsNames12.length; i++) {
            var month = monthsNames12[i];

            if (month == _this.monthsName[cont]) {
              _this.ordersNumberList.push(_this.monthsOrders[cont]);

              cont++;
            } else {
              _this.ordersNumberList.push(0);
            }
          }

          console.log(_this.ordersNumberList);
          var newOrdersNumberList = _this.ordersNumberList;

          _this.chart12(newOrdersNumberList);
        })["catch"](function (data) {
          console.log(data);
        });
      },
      apiChartUpdate: function apiChartUpdate() {
        var _this2 = this;

        console.log(this.year, 'api 3 year');
        axios.get('/stats/month/' + restaurantId + '/' + this.year, {
          params: {// Parametri
          }
        }).then(function (data) {
          console.log(data.data, 'API Axios 3'); // Contatore mesi con ordini

          var cont = 0; // Lista finale con numero ordini per mese (12 mesi)

          _this2.ordersNumberList = [];
          var datas = data.data;
          _this2.monthsName = datas[0];
          _this2.monthsOrders = datas[1];
          _this2.ordersNumberList = [];
          monthsNames12 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
          console.log(_this2.monthsName, _this2.monthsOrders, 'API Axios 3'); // Assegnamento valori in lista finale

          for (var i = 0; i < monthsNames12.length; i++) {
            var month = monthsNames12[i];

            if (month == _this2.monthsName[cont]) {
              _this2.ordersNumberList.push(_this2.monthsOrders[cont]);

              cont++;
            } else {
              _this2.ordersNumberList.push(0);
            }
          }

          console.log(_this2.ordersNumberList, 'API Axios 3 - OrdersNumbList');
          console.log(_this2.myChart.data.datasets[0].data);
          _this2.myChart.data.datasets[0].data = _this2.ordersNumberList;
          console.log(_this2.myChart.data.datasets[0].data);

          _this2.myChart.update();
        })["catch"](function (error) {
          console.log(error);
        });
        return 'ciao';
      },
      // Istanza classe - Grafico statistiche n°ordini per 12 mesi
      chart12: function chart12(newOrdersNumberList) {
        var ctx = document.getElementById('myChart');
        this.myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
              label: 'Orders per month',
              data: newOrdersNumberList,
              backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
              borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
              borderWidth: 1,
              fill: {
                target: 'origin',
                above: 'rgba(255, 0, 0, 0.2)',
                // Area will be red above the origin
                below: 'rgb(0, 0, 255)' // And blue below the origin

              }
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            },
            layout: {
              padding: 50
            },
            plugins: {
              legend: {
                labels: {
                  font: {
                    // weight: 'bold',
                    size: 20,
                    weight: 'normal'
                  }
                }
              }
            },
            elements: {
              point: {
                radius: 5,
                hoverRadius: 15
              },
              line: {
                fill: true
              }
            }
          }
        });
      },
      tryIt: function tryIt() {
        console.log(this.year);
      },
      // deleteMonthsChart: function (){
      //     while( this.myChart.data.labels.length > 0){
      //         this.myChart.data.labels.pop();
      //     }
      //     this.myChart.data.datasets.forEach((dataset) => {
      //         dataset.data.pop();
      //     });
      //     this.myChart.update();
      // },
      updateMonthsChart: function updateMonthsChart() {
        var variabile = this.apiChartUpdate(); // console.log(this.ordersNumberList, monthsNames12);

        console.log(variabile); // console.log(this.myChart.data.datasets[0].data);
        // this.myChart.data.datasets.data = this.ordersNumberList;
        // this.myChart.data.labels.push(monthsNames12);
        // this.myChart.data.datasets.forEach((dataset) => {
        //     dataset.data.push(this.ordersNumberList);
        // });
        // this.myChart.update();
      }
    }
  });
}

document.addEventListener('DOMContentLoaded', statisticsChart);

/***/ }),

/***/ 3:
/*!*************************************!*\
  !*** multi ./resources/js/stats.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Boolean\Esercizi Corso\proj-final-delivery\resources\js\stats.js */"./resources/js/stats.js");


/***/ })

/******/ });