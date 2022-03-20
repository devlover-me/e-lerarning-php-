// Bar Chart Init
var barChartData = {
    type: 'bar',
    data: {
        labels: ["A", "B", "C", "D", "E", "F", "G"],
        datasets: [{
            type: 'bar',
            label: '',
            backgroundColor: "rgba(180,183,200,0.8)",
            data: [4.5,7.5,1, 2.3, 3.8, 2.5, 5.8],
            borderColor: 'white',
            borderWidth: 2        
        }, {
            type: 'bar',
            label: '',
            backgroundColor: "rgba(87,173,230,0.8)",
            data: [3.5, 4, 0.4, 1.8, 3, 6.5, 0.5]
        },  {
            type: 'line',
            label: '',
            backgroundColor: "rgba(254,206,90,0.5)",
            pointBackgroundColor: "#fff",
            data: [9, 4.1, 0.8, 3, 3.75, 8.5, 9.75],
            borderColor: '#ffcd56',
            borderWidth: 1
        }]
    },
    options: {
            responsive: true,
            title: {
                display: false
            },
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines : {
                        zeroLineColor: "rgba(0, 0, 0, 0.1)"
                    },
                }],
                yAxes: [{
                    ticks : {
                        display: false
                    },
                    gridLines : {
                        zeroLineColor: "rgba(0, 0, 0, 0.1)"
                    },
                }]
            }
        }
};

//  Line Chart Init
var lineChartData = {
    type: 'line',
    data: {
        labels: ["A", "B", "C", "D", "E", "F", "G"],
        datasets: [{
            data: [70,50,45,81,32,93, 10],
            fill: false,
            borderDash: [5, 5],
            backgroundColor : '#46c2ca',
            borderColor : '#46c2ca',
            pointBorderColor : '#46c2ca',
            pointBackgroundColor : '#46c2ca',
            pointBorderWidth : 1
        }, {
            data: [55, 21, 35, 85, 65, 15, 90],
            fill: false,
            borderDash: [5, 5],
            backgroundColor : '#f15b72',
            borderColor : '#f15b72',
            pointBorderColor : '#f15b72',
            pointBackgroundColor : '#f15b72',
            pointBorderWidth : 1
        }, {
            data: [50, 50, 50, 50, 50, 50, 50],
            lineTension: 0,
            fill: false,
            backgroundColor : '#ebebeb',
            borderColor : '#ebebeb',
            pointBorderColor : '#ebebeb',
            pointBackgroundColor : '#ebebeb',
            pointBorderWidth : 1
        }, {
            data: [30, 60, 55, 31, 77, 25, 80],
            fill: false,
            backgroundColor : '#314861',
            borderColor : '#314861',
            pointBorderColor : '#314861',
            pointBackgroundColor : '#314861',
            pointBorderWidth : 1
        }]
    },
    options: {
        responsive: true,
        ltitle: {
                display: false
        },
        legend: {
            display: false
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true
                }
            }]
        }
    }
};

// Pie Chart Init
var pieChartInit = {
    type: 'pie',
        data: {
            datasets: [{
                data: [28, 15, 23, 30, 50],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C"
                ],
            }, {
                data: [54, 21, 9, 85, 30],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C"
                ],
            }, {
                data: [21, 9, 45, 60, 30],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C"
                ],
            }]
        },
        options: {
            responsive: true,
            title: {
                display: false
            },
            legend: {
                display: false
            }
        }
};

window.onload = function() {
    var bCid = document.getElementById("chart1").getContext("2d");
    window.myBar = new Chart(bCid, barChartData);

    var lCid = document.getElementById("chartLine").getContext("2d");
    window.myLine = new Chart(lCid, lineChartData);
};