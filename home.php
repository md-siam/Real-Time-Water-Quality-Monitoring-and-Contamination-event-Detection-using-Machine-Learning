<?php
	include_once 'logincheck.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
                        <a class="active-menu" href="home.php">
                            <i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-bar-chart-o fa-3x"></i> Graph
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
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
                                <a href="turbiditychart.php">Turbidity Graph</a>
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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>User Dashboard</h2>
                        <h5>Welcome, Love to see you back. </h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="no-boder text-center header">
                    Current Status
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-red set-icon">
                                <i class="fa fa-cloud"></i>
                            </span>
                            <div class="text-box">
                                <p class="main-text">Temperature:
                                    <span class="value-field">
                                        <span id="tempValue">loading...</span> &nbsp
                                        <span class="text-muted" id="tempValueWarning"></span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-back noti-box">
                            <img class="icon-box  set-icon" src="assets/img/ph.png" alt="ph icon">
                            <div class="text-box">
                                <p class="main-text">PH Level:
                                    <span class="value-field">
                                        <span id="phValue">loading...</span> &nbsp
                                        <span class="text-muted" id="phValueWarning"></span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-back noti-box">
                            <img class="icon-box  set-icon" src="assets/img/turbidity.png" alt="turbidity icon">
                            <div class="text-box">
                                <p class="main-text">Turbidity:
                                    <span class="value-field">
                                        <span id="turbidityValue">loading...</span> &nbsp
                                        <span class="text-muted" id="turbidityValueWarning"></span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-back noti-box">
                            <img class="icon-box  set-icon" src="assets/img/conductivity.png" alt="conductivity icon">
                            <div class="text-box">
                                <p class="main-text">TDS Value:
                                    <span class="value-field">
                                        <span id="ecValue">loading...</span> &nbsp
                                        <span class="text-muted" id="ecValueWarning"></span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="no-boder text-center header">
                    Sensor' Life Span
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-red set-icon">
                                <i class="fa fa-cloud"></i>
                            </span>
                            <div class="text-box">
                                <p class="main-text">Temperature Sensor:
                                    <span class="value-field">
                                        <span class="text-muted normal">350 days remaining</span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-back noti-box">
                            <img class="icon-box  set-icon" src="assets/img/ph.png" alt="ph icon">
                            <div class="text-box">
                                <p class="main-text">PH Sensor:
                                    <span class="value-field">
                                        <span class="text-muted normal">360 days remaining</span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-back noti-box">
                            <img class="icon-box  set-icon" src="assets/img/turbidity.png" alt="turbidity icon">
                            <div class="text-box">
                                <p class="main-text">Turbidity Sensor:
                                    <span class="value-field">
                                        <span class="text-muted low-high">100 days remaining</span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-back noti-box">
                            <img class="icon-box  set-icon" src="assets/img/conductivity.png" alt="conductivity icon">
                            <div class="text-box">
                                <p class="main-text">TDS Sensor:
                                    <span class="value-field">
                                        <span class="text-muted low-high">20 days remaining</span>
                                    </span>
                                </p>
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
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>

    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <!-- Firebase App is always required and must be first -->
    <script src="https://www.gstatic.com/firebasejs/5.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.2.0/firebase-database.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyBtipBRc7gCEt2N9pw5mpuRuLaYrkb2tHQ",
            authDomain: "iot499-a034d.firebaseapp.com",
            databaseURL: "https://iot499-a034d.firebaseio.com",
            projectId: "iot499-a034d",
            storageBucket: "iot499-a034d.appspot.com",
            messagingSenderId: "1097089352110"
        };

        var phData = new Array(); //for graph
        var timeData = new Array();
        var tempData = new Array();
        var dateData = new Array();
        var ecData = new Array();
        var turbidityData = new Array();
        firebase.initializeApp(config);
        var i; //counts the total item
        firebase.database().ref('/sensor_data').once('value', function (snap) {
            i = 0;
            snap.forEach(function (obj) {
                var date = obj.val().date;
                var time = obj.val().time;
                var ph = obj.val().ph;
                var temp = obj.val().temp;
                var turbidity = obj.val().turbidity;
                var ec = obj.val().ec;
                phData.push(ph);
                timeData.push(time);
                tempData.push(temp);
                dateData.push(date);
                turbidityData.push(turbidity);
                ecData.push(ec);
                i += 1;
            });
            if (i > 0) { //if item is more than one
                sessionStorage.setItem('phDataArray', phData);
                sessionStorage.setItem('timeDataArray', timeData);
                sessionStorage.setItem('tempDataArray', tempData);
                sessionStorage.setItem('dateDataArray', dateData);
                sessionStorage.setItem('turbidityDataArray', turbidityData);
                sessionStorage.setItem('ecDataArray', ecData);
                setValue();
            }
            else {
                initializeField();
            }
        });

        function initializeField() {
            $('#tempValue').text('loading...');
            $('#phValue').text('loading...');  //.toFixed(2); to set 2 decimal place
            $('#ecValue').text('loading...');
            $('#turbidityValue').text('loading...');
        }

        function valueChecker(data, lowValue, highValue, lowMsg, hiMsg, elementid) {
            if (data < lowValue) {
                $('#' + elementid).addClass('low-high');
                $('#' + elementid).text('(' + lowMsg + ')');
            }
            else if (data > highValue) {
                $('#' + elementid).addClass("low-high");
                $('#' + elementid).text('(' + hiMsg + ')');
            }
            else {
                if (elementid == 'turbidityValueWarning') {
                    $('#' + elementid).text('(Clean)');
                }
                else {
                    $('#' + elementid).text('(Normal)');
                }
                $('#' + elementid).addClass("normal");
            }
        }
        function setValue() {
            var currentPh = phData[phData.length - 1];
            var currentTemperature = tempData[tempData.length - 1];
            var currentTurbidity = turbidityData[turbidityData.length - 1];
            var currentEC = ecData[ecData.length - 1];

            $('#tempValue').text(currentTemperature.toFixed(0) + '°C');
            valueChecker(currentTemperature, 15, 45, 'Hot', 'Cold', 'tempValueWarning');
            $('#phValue').text(currentPh.toFixed(2));  //.toFixed(2); to set 2 decimal place
            valueChecker(currentPh, 6.0, 8.5, 'Low', 'High', 'phValueWarning');
            $('#ecValue').text(currentEC.toFixed(3));
            valueChecker(currentEC, 0, 1.5, 'Invalid', 'High', 'ecValueWarning');
            $('#turbidityValue').text(currentTurbidity.toFixed(2));
            valueChecker(currentTurbidity, 8, 11, 'Dirty', 'Clean', 'turbidityValueWarning');
        }
    </script>
</body>

</html>