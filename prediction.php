<?php
    include_once 'logincheck.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prediction</title>
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
                <a href="index.php" class="btn btn-danger square-btn-adjust">Logout</a>
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
                        <a  href="home.php">
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
                        <a class="active-menu" href="prediction.php">
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
                        <h2>Prediction Next Data</h2>
                        <h5>Welcome, Love to see you back. </h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="no-boder text-center header">
                    Predicted Data
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
        function insert(str, index, value) {
            return str.substr(0, index) + value + str.substr(index);
        }

        function dateFormater(data) {
            if (data[data.indexOf("/") + 2] == "/") {
                data = insert(data, data.indexOf("/") + 1, "0");
            }
            var day = data.substr(0, data.indexOf("/"));
            var month = data.substr(data.indexOf("/") + 1, 2);
            var year = (data.substr(data.lastIndexOf("/") + 1));
            //return year + month + day;
            return day;
        }
        
        

        function predictNext(x, y, n) { //x = dateArray, y data array, n = current date
            var i, a = 0.0, b = 0.0, alpha = 0.01, iter = 50, k;
            n = parseInt(n);
            for(var j=0; j<y.length; j++){
                y[j] = parseFloat(y[j]);
            }
            for (k = 0; k < iter; k++) {
                for (i = 0; i < x.length; i++) {
                    var tmp = a + b * x[i];
                    var error = tmp - y[i];
                    a = a - alpha * error;
                    b = b - alpha * error * x[i];
                }
            }
            var s = 0;
            var m = 0;
            for (var i in y) {
                s =  s + y[i];
            }
            m = s / y.length;
            var pred = a + b * x[n % x.length];
            return m;
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
            var dateObj = new Date();
            var month = dateObj.getUTCMonth() + 1; //months from 1-12
            var day = dateObj.getUTCDate();
            var year = dateObj.getUTCFullYear();
            var today = day + "/" + month + "/" + year;
            
            var dateData = sessionStorage.getItem('dateDataArray').split(","); //convert string to num array
            for (var z=0; z<dateData.length; z++){
                dateData[z] = parseInt(dateFormater(dateData[z])); 
            }
            var phData = sessionStorage.getItem('phDataArray').split(","); //convert string to num array
            var timeData = sessionStorage.getItem('timeDataArray').split(","); //convert string to num array
            var turbidityData = sessionStorage.getItem('turbidityDataArray').split(","); //convert string to num array
            var tempData = sessionStorage.getItem('tempDataArray').split(","); //convert string to num array
            var ecData = sessionStorage.getItem('ecDataArray').split(","); //convert string to num array

            var predictedPh = predictNext(dateData, phData, day);
            var predictedTemperature = predictNext(dateData, tempData, day);
            var predictedTurbidity = predictNext(dateData, turbidityData, day);
            var predictedEC = predictNext(dateData, ecData, day);

            $('#tempValue').text((predictedTemperature * 1).toFixed(0) + '°C');
            valueChecker(predictedTemperature, 15, 45, 'Cold', 'Hot', 'tempValueWarning');
            $('#phValue').text((predictedPh * 1).toFixed(2));  //.toFixed(2); to set 2 decimal place
            valueChecker(predictedPh, 6.0, 8.5, 'Low', 'High', 'phValueWarning');
            $('#ecValue').text((predictedEC * 1).toFixed(3));
            valueChecker(predictedEC, 0, 1.5, 'Invalid', 'High', 'ecValueWarning');
            $('#turbidityValue').text((predictedTurbidity * 1).toFixed(2));
            valueChecker(predictedTurbidity, 8, 11, 'Dirty', 'Clean', 'turbidityValueWarning');
        }
        
        setValue();

    </script>
</body>

</html>