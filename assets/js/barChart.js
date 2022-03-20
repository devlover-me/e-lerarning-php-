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

window.onload = function() {
    var bCid = document.getElementById("chart1").getContext("2d");
    window.myBar = new Chart(bCid, barChartData);
};