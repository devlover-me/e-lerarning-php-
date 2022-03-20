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


window.onload = function() {
    var lCid = document.getElementById("chartLine").getContext("2d");
    window.myLine = new Chart(lCid, lineChartData);
};