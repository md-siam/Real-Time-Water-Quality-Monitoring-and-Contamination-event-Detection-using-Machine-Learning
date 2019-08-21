<?php
	include_once 'logincheck.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Turbidity Graph</title>
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
    <style>
        #turbidity-chart {
            height: 320px;
            padding: 10px;
        }
    </style>
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
                        <ul class="nav nav-second-level" id="graph-nav">
                            <li>
                                <a href="chart.php">All Graph</a>
                            </li>
                            <li>
                                <a href="tempchart.php">Temperature Graph</a>
                            </li>
                            <li>
                                <a href="phchart.php">pH Graph</a>
                            </li>
                            <li>
                                <a class="active-menu" href="turbiditychart.php">Turbidity Graph</a>
                            </li>
                            <li>
                                <a href="ecchart.php">TDS Graph</a>
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
                        <h2>Graph - Turbidity</h2>
                        <h5>Welcome, Love to see you back. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Turbidity Graph
                            </div>
                            <div class="panel-body">
                                <div class="turbidity-chart" id="turbidity-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/chartist.js"></script>
    <script src="assets/js/chartist-plugin-axistitle.js"></script>

    <script>

        var timeData = sessionStorage.getItem('timeDataArray').split(","); //convert string to num array
        var turbidityData = sessionStorage.getItem('turbidityDataArray').split(","); //convert string to num array

        /* will slice array to show only last 8 data in the graph*/
         timeData = timeData.splice(timeData.length - 15);
         turbidityData = turbidityData.splice(turbidityData.length - 15);

        var chart = new Chartist.Line('.turbidity-chart', {
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
                                y: 15
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