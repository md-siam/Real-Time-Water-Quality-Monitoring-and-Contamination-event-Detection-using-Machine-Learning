<?php
	include_once 'logincheck.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Graph Chart</title>
    <link rel="stylesheet" type="text/css" href="assets/css/chartist.min.css">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">User Panel</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : <?php 
                                    $date = $_SESSION['lastaccessdate'];
                                    $date = date('d F Y', strtotime($date));
                                     echo $date;
                                ?> 
                                &nbsp;
                <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a href="home.php">
                            <i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-bar-chart-o fa-3x"></i> Graph
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="active-menu" href="chart.php">All Graph</a>
                            </li>
                            <li>
                                <a href="tempchart.php">Temperature Graph</a>
                            </li>
                            <li>
                                <a href="phchart.php">pH Graph</a>
                            </li>
                            <li>
                                <a href="turbiditychart.php">Turbidity Graph</a>
                            </li>
                            <li>
                                <a href="ecchart.php">EC Graph</a>
                            </li>
                            <li>
                                <a href="combinedchart.php">Combined Graph</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="prediction.php">
                            <i class="fa fa-sitemap fa-3x"></i> Prediction
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-bolt fa-3x"></i> Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Data Chart</h2>
                        <h5>Welcome, Love to see you back. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12" id="tempDiv">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Temperature Graph
                            </div>
                            <div class="panel-body">
                                <div class="temp-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12" id="phDiv">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                pH Graph
                            </div>
                            <div class="panel-body">
                                <div class="ph-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">

                    <div class="col-md-6 col-sm-12 col-xs-12" id="turbidityDiv">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Turbidity Graph
                            </div>
                            <div class="panel-body">
                                <div class="turbidity-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12" id="ecDiv">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                TDS Graph
                            </div>
                            <div class="panel-body">
                                <div class="ec-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/chartist.js"></script>
    <script src="assets/js/chartist-plugin-axistitle.js"></script>

    <script>

        $(document).ready(function () {
            $('#phDiv').css('cursor', 'pointer');
            $('#phDiv').on('click', function (e) {
                window.location = "phchart.php";
            });

            $('#tempDiv').css('cursor', 'pointer');
            $('#tempDiv').on('click', function (e) {
                window.location = "tempchart.php";
            });

            $('#turbidityDiv').css('cursor', 'pointer');
            $('#turbidityDiv').on('click', function (e) {
                window.location = "turbiditychart.php";
            });

            $('#ecDiv').css('cursor', 'pointer');
            $('#ecDiv').on('click', function (e) {
                window.location = "ecchart.php";
            });

        });

        var phData = sessionStorage.getItem('phDataArray').split(","); //convert string to num array
        var timeData = sessionStorage.getItem('timeDataArray').split(","); //convert string to num array
        var dateData = sessionStorage.getItem('dateDataArray').split(","); //convert string to num array
        var turbidityData = sessionStorage.getItem('turbidityDataArray').split(","); //convert string to num array
        var tempData = sessionStorage.getItem('tempDataArray').split(","); //convert string to num array
        var ecData = sessionStorage.getItem('ecDataArray').split(","); //convert string to num array

        /* will slice array to show only last 8 data in the graph*/
        phData = phData.splice(phData.length - 9);
        timeData = timeData.splice(timeData.length - 9);
        dateData = dateData.splice(dateData.length - 9);
        turbidityData = turbidityData.splice(turbidityData.length - 9);
        tempData = tempData.splice(tempData.length - 9);
        ecData = ecData.splice(ecData.length - 9);

        //  var date = ['15-07-2018', '16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018'];
        //  var pHdata = [4.5, 5.5, 6, 7, 6, 7, 8, 5];
        //  console.log(typeof(data));
        var chart = new Chartist.Line('.ph-chart', {
            labels: timeData,
            series: [phData]
        },

            /*{
                low: 0,
                showArea: true
            },*/
            {
                chartPadding: {
                    top: 10,
                    right: 10,
                    bottom: 10,
                    left: 10
                },
                axisY: {
                    onlyInteger: false
                },
                plugins: [
                    Chartist.plugins.ctAxisTitle({
                        axisX: {
                            axisTitle: 'time (24hrs)',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: 40
                            },
                            textAnchor: 'middle'
                        },
                        axisY: {
                            axisTitle: 'pH',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: 20
                            },
                            textAnchor: 'middle',
                            flipTitle: true
                        }
                    })
                ]
            });

        var chart2 = new Chartist.Bar('.temp-chart', {
            labels: timeData,
            series: [tempData]
        },
            {
                chartPadding: {
                    top: 10,
                    right: 10,
                    bottom: 10,
                    left: 10
                },
                axisY: {
                    onlyInteger: false
                },
                plugins: [
                    Chartist.plugins.ctAxisTitle({
                        axisX: {
                            axisTitle: 'time (24hrs)',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: 40
                            },
                            textAnchor: 'middle'
                        },
                        axisY: {
                            axisTitle: 'Temperature (°C)',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: -5,
                                y: 20
                            },
                            textAnchor: 'middle',
                            flipTitle: true
                        }
                    })
                ]
            });

        var chart3 = new Chartist.Line('.turbidity-chart', {
            labels: timeData,
            series: [turbidityData]
        },
            {
                chartPadding: {
                    top: 10,
                    right: 10,
                    bottom: 10,
                    left: 10
                },
                axisY: {
                    onlyInteger: false
                },
                plugins: [
                    Chartist.plugins.ctAxisTitle({
                        axisX: {
                            axisTitle: 'time (24hrs)',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: 40
                            },
                            textAnchor: 'middle'
                        },
                        axisY: {
                            axisTitle: 'Turbidity (NTU)',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: -5,
                                y: 20
                            },
                            textAnchor: 'middle',
                            flipTitle: true
                        }
                    })
                ]
            });

        var chart3 = new Chartist.Line('.ec-chart', {
            labels: timeData,
            series: [ecData]
        },
            {
                chartPadding: {
                    top: 10,
                    right: 10,
                    bottom: 10,
                    left: 10
                },
                axisY: {
                    onlyInteger: false
                },
                plugins: [
                    Chartist.plugins.ctAxisTitle({
                        axisX: {
                            axisTitle: 'time (24hrs)',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: 40
                            },
                            textAnchor: 'middle'
                        },
                        axisY: {
                            axisTitle: 'TDS (ppm)',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: -5,
                                y: 20
                            },
                            textAnchor: 'middle',
                            flipTitle: true
                        }
                    })
                ]
            });



    </script>
</body>

</html>