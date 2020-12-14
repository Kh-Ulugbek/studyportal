/*=========================================================================================
    File Name: card-statistics.js
    Description: Card-statistics page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuesax HTML Admin Template
    Version: 1.1
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on("load", function(){

  var $primary = '#7367F0';
  var $success = '#28C76F';
  var $danger = '#EA5455';
  var $warning = '#FF9F43';
  var $primary_light = '#A9A2F6';
  var $success_light = '#55DD92';
  var $warning_light = '#ffc085';
  
  var subscribe = document.querySelector("#line-area-chart-1").dataset.values.split(",");
  var users = document.querySelector("#line-area-chart-2").dataset.values.split(",");
  var university = document.querySelector("#line-area-chart-3").dataset.values.split(",");
  var country = document.querySelector("#line-area-chart-4").dataset.values.split(",");
  var book = document.querySelector("#line-area-chart-5").dataset.values.split(",");
  var news = document.querySelector("#line-area-chart-6").dataset.values.split(",");
  var post = document.querySelector("#line-area-chart-7").dataset.values.split(",");


    // Subscribed Gained Chart
    // ----------------------------------

    var gainedChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar:{
              show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$primary],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Подписчики',
            data: subscribe
        }],

        xaxis: {
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: { left: 0, right: 0 },
        }],
        tooltip: {
            x: { show: false }
        },
    }

    var gainedChart = new ApexCharts(
        document.querySelector("#line-area-chart-1"),
        gainedChartoptions
    );

    gainedChart.render();



    // Users Generated Chart
    // ----------------------------------

    var revenueChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar:{
              show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$success],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Пользователи',
            data: users
        }],

        xaxis: {
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: { left: 0, right: 0 },
        }],
        tooltip: {
            x: { show: false }
        },
    }

    var revenueChart = new ApexCharts(
        document.querySelector("#line-area-chart-2"),
        revenueChartoptions
    );

    revenueChart.render();


    // University Sales Chart
    // ----------------------------------

    var salesChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar:{
              show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$danger],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Университеты',
            data: university
        }],

        xaxis: {
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: { left: 0, right: 0 },
        }],
        tooltip: {
            x: { show: false }
        },
    }

    var salesChart = new ApexCharts(
        document.querySelector("#line-area-chart-3"),
        salesChartoptions
    );

    salesChart.render();

    // Country Received Chart
    // ----------------------------------

    var orderChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar:{
              show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$warning],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Страны',
            data: country
        }],

        xaxis: {
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: { left: 0, right: 0 },
        }],
        tooltip: {
            x: { show: false }
        },
    }

    var orderChart = new ApexCharts(
        document.querySelector("#line-area-chart-4"),
        orderChartoptions
    );

    orderChart.render();


    // Book Chart
    // ----------------------------------

    var trafficChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar:{
                show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$primary],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Книги',
            data: book
        }],

        xaxis: {
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: { left: 0, right: 0 },
        }],
        tooltip: {
            x: { show: false }
        },
    }

    var trafficChart = new ApexCharts(
        document.querySelector("#line-area-chart-5"),
        trafficChartoptions
    );

    trafficChart.render();


    // News Chart
    // ----------------------------------

    var userChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar:{
                show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$success],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Новости',
            data: news
        }],

        xaxis: {
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: { left: 0, right: 0 },
        }],
        tooltip: {
            x: { show: false }
        },
    }

    var userChart = new ApexCharts(
        document.querySelector("#line-area-chart-6"),
        userChartoptions
    );

    userChart.render();


    // Post Chart
    // ----------------------------------

    var newsletterChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar:{
                show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$warning],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Посты',
            data: post
        }],

        xaxis: {
            labels: {
                show: false,
            },
            axisBorder: {
                show: false,
            }
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: { left: 0, right: 0 },
        }],
        tooltip: {
            x: { show: false }
        },
    }

    var newsletterChart = new ApexCharts(
        document.querySelector("#line-area-chart-7"),
        newsletterChartoptions
    );

    newsletterChart.render();

});
