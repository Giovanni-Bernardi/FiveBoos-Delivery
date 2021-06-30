function statisticsChart() {
    console.log('JS: Connected');

    // VUE Standard components
    // const app = new Vue({
    //     el: '#app',
    // });

    // Input invisibile, value = restaurant_id
    let restaurantId = document.getElementById('d_elem').value;
    console.log('Restaurant id: ' + restaurantId);
    // var monthsNames12 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    // var myChart;

    // -- Vue Class --
    var chart = new Vue({
        el: '#appChart',
        data: {
            monthsName: [],
            monthsOrders: [],
            title: '',
            year: 0,
            type: 0,
            currentYear: new Date().getFullYear(),
            myChart: '',
            ordersNumberList: [],
            monthsNames12: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            btnID: '',
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

                this.title = "Ordini mensili - Anno " + this.year;

                axios.get('/stats/month/' + restaurantId + '/' + this.year + '/' + this.type,
                {
                    params:{
                        // Parametri
                    }
                }).then(data => {
                    console.log(data.data);
    
                    // Contatore mesi con ordini
                    let cont = 0;
    
                    let datas = data.data;
                    this.monthsName = datas[0];
                    this.monthsOrders = datas[1];
    
                    console.log(this.monthsName, 'API Axios 2');
    
                    // Assegnamento valori in lista finale
                    for (let i = 0; i < this.monthsNames12.length; i++) {
                        const month = this.monthsNames12[i];
    
                        if(month == this.monthsName[cont]){
                            this.ordersNumberList.push(this.monthsOrders[cont]);
                            cont ++;
                        }else{
                            this.ordersNumberList.push(0);
                        }
                    }
    
                    console.log(this.ordersNumberList);
                    let newOrdersNumberList = this.ordersNumberList;
                    this.chart12(newOrdersNumberList);
                }).catch((data) => {
                    console.log(data);
                });
			},
            // Update chart anno e tipologia (order number/sum)
            apiChartUpdate: function (){
                console.log(this.year, 'api 3 year');
                axios.get('/stats/month/' + restaurantId + '/' + this.year + '/' + this.type,
                {
                    params:{
                        // Parametri
                    }
                }).then(data => {
                    console.log(data.data, 'API Axios 3');
                    
                    // Contatore mesi con ordini
                    let cont = 0;
                    // Lista finale con numero ordini per mese (12 mesi)
                    this.ordersNumberList = [];
    
                    let datas = data.data;
                    this.monthsName = datas[0];
                    this.monthsOrders = datas[1];
                    this.ordersNumberList = [];
                    console.log(this.monthsName, this.monthsOrders, 'API Axios 3');
    
                    // Assegnamento valori in lista finale
                    for (let i = 0; i < this.monthsNames12.length; i++) {
                        const month = this.monthsNames12[i];
                        if(month == this.monthsName[cont]){
                            this.ordersNumberList.push(this.monthsOrders[cont]);
                            cont ++;
                        }else{
                            this.ordersNumberList.push(0);
                        }
                    }
                    
                    console.log(this.ordersNumberList, 'API Axios 3 - OrdersNumbList');
                    console.log(this.myChart.data.datasets[0].data);
                    this.myChart.data.datasets[0].data = this.ordersNumberList;
                    console.log(this.myChart.data.datasets[0].data);
                    this.myChart.data.datasets[0].label = this.title;
                    this.myChart.update();
                }).catch((error) => {
                    console.log(error);
                });
            },
            // Istanza classe - Grafico statistiche n°ordini per 12 mesi
            chart12: function(newOrdersNumberList){

                let ctx = document.getElementById('myChart');
                this.myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: this.monthsNames12,
                        datasets: [{
                            label: this.title,
                            data: newOrdersNumberList,
                            backgroundColor: [
                                // 'rgba(0, 0, 0, 0.1)',
                                'rgba(220, 20, 60, 0.2)'
                                // 'rgba(255, 99, 132, 0.2)',
                                // 'rgba(54, 162, 235, 0.2)',
                                // 'rgba(255, 206, 86, 0.2)',
                                // 'rgba(75, 192, 192, 0.2)',
                                // 'rgba(153, 102, 255, 0.2)',
                                // 'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(0, 0, 0, 0.6)',
                                // 'rgba(220, 20, 60, 0.2)'
                                // 'rgba(255, 99, 132, 1)',
                                // 'rgba(54, 162, 235, 1)',
                                // 'rgba(255, 206, 86, 1)',
                                // 'rgba(75, 192, 192, 1)',
                                // 'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1,
                            fill: {
                                target: 'origin',
                                above: 'rgba(255, 194, 68, 0.5)',
                                // above: 'rgba(255, 0, 0, 0.2)',   // Area will be red above the origin
                                // below: 'rgb(0, 0, 255)',    // And blue below the origin
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
                            padding: 0,
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
            updateMonthsChart: function (){
                if (this.type == 0) {
                    this.title = 'Ordini mensili - Anno ' + this.year;
                }else{
                    this.title = 'Saldo mensile - Anno ' + this.year;
                }

                this.apiChartUpdate();
            },
            popupDetails: function popupDetails(productId) {
                this.btnID = productId;
                console.log(this.btnID, productId);
              },
              closePopup: function(){
                  this.btnID = '';
              }
        }
    });
}

document.addEventListener('DOMContentLoaded', statisticsChart);