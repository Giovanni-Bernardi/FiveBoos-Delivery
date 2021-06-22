function statisticsChart() {
    console.log('JS: Connected');

    // VUE Standard components
    // const app = new Vue({
    //     el: '#app',
    // });

    // Input invisibile, value = restaurant_id
    let restaurantId = document.getElementById('d_elem').value;
    console.log('Restaurant id: ' + restaurantId);
    var monthsNames12 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    // var myChart;

    // -- Vue Class --
    var chart = new Vue({
        el: '#appChart',
        data: {
            monthsName: [],
            monthsOrders: [],
            year: 0,
            currentYear: new Date().getFullYear(),
            myChart: '',
            ordersNumberList: [],
            // monthsNames12: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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

                axios.get('/stats/month/' + restaurantId + '/' + this.year,
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
                    for (let i = 0; i < monthsNames12.length; i++) {
                        const month = monthsNames12[i];
    
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
            apiChartUpdate: function (){
                console.log(this.year, 'api 3 year');
                axios.get('/stats/month/' + restaurantId + '/' + this.year,
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
                    monthsNames12 = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    console.log(this.monthsName, this.monthsOrders, 'API Axios 3');
    
                    // Assegnamento valori in lista finale
                    for (let i = 0; i < monthsNames12.length; i++) {
                        const month = monthsNames12[i];
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
                    this.myChart.update();
                }).catch((error) => {
                    console.log(error);
                });
                
                return 'ciao';
            },
            // Istanza classe - Grafico statistiche n°ordini per 12 mesi
            chart12: function(newOrdersNumberList){

                let ctx = document.getElementById('myChart');
                this.myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Orders per month',
                            data: newOrdersNumberList,
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
                            y: {
                                beginAtZero: true,
                            },
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
            tryIt: function(){
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
            updateMonthsChart: function (){

                let variabile = this.apiChartUpdate();
                // console.log(this.ordersNumberList, monthsNames12);
            
                console.log(variabile);

                
                // console.log(this.myChart.data.datasets[0].data);

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
