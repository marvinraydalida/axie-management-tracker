
var ctx = document.getElementsByClassName('slp-chart');

for(let i = 0; i < ctx.length; i++){
    console.log(ctx[i]);
    const myChart = new Chart(ctx[i], {
    type: 'line',
    data: {
        labels: slp_x[i],
        datasets: [{
            data: slp_y[i],
            tension: 0.3,
            borderColor: "#1FCB75",
            label: "QUOTA IN LAST SEVEN DAYS"
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    color: "#ebebeb",
                    font: {
                        size: 18
                    }
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: "#ebebeb",
                    maxRotation: 20,
                    minRotation: 20
                }
            },
            y: {
                ticks: {
                    color: "#ebebeb"
                }
            }
        },
    }
});
}


// var myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: slp_x,
//         datasets: [{
//             data: slp_y,
//             tension: 0.3,
//             borderColor: "#1FCB75",
//             label: "QUOTA IN LAST SEVEN DAYS"
//         }],
//     },
//     options: {
//         responsive: true,
//         maintainAspectRatio: false,
//         plugins: {
//             legend: {
//                 labels: {
//                     color: "#ebebeb",
//                     font: {
//                         size: 18
//                     }
//                 }
//             }
//         },
//         scales: {
//             x: {
//                 ticks: {
//                     color: "#ebebeb"
//                 }
//             },
//             y: {
//                 ticks: {
//                     color: "#ebebeb"
//                 }
//             }
//         },
//     }
// });



// var stars = [300, 250, 309, 189, 180];
// var frameworks = ['React', 'Angular', 'Vue', 'Hyperapp', 'Omi'];
// var ctx = document.getElementById('myChart');
// var myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: slp_x,
//         datasets: [{
//             data: slp_y,
//             tension: 0.3,
//             borderColor: "#1FCB75",
//             label: "QUOTA IN LAST SEVEN DAYS"
//         }],
//     },
//     options: {
//         responsive: true,
//         maintainAspectRatio: false,
//         plugins: {
//             legend: {
//                 labels: {
//                     color: "#ebebeb",
//                     font: {
//                         size: 18
//                     }
//                 }
//             }
//         },
//         scales: {
//             x: {
//                 ticks: {
//                     color: "#ebebeb"
//                 }
//             },
//             y: {
//                 ticks: {
//                     color: "#ebebeb"
//                 }
//             }
//         },
//     }
// });

/*var ctx2 = document.getElementById('myChart2');
var myChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: frameworks,
        datasets: [{
            data: stars,
            tension: 0.3,
            borderColor: "#1FCB75",
            label: "QUOTA IN LAST SEVEN DAYS"
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    color: "#ebebeb",
                    font: {
                        size: 18
                    }
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: "#ebebeb"
                }
            },
            y: {
                ticks: {
                    color: "#ebebeb"
                }
            }
        },
    }
});*/