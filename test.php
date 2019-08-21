<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chartist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/chartist.min.css">
    <style>
        #ph-chart{
            height: 530px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div style="text-align: center; font-size: 18px; color: rgb(130, 255, 6); margin: 20px;">
        <h3>pH chart</h3>
    </div>
    <div class="ct-chart ph-chart" id="ph-chart"></div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/chartist.js"></script>
    <script src="js/chartist-plugin-axistitle.js"></script>

    <script>
        $(document).ready(function() { 
            var phData = sessionStorage.getItem('phDataArray').split(","); //convert string to num array
            var timeData = sessionStorage.getItem('timeDataArray').split(","); //convert string to num array
            //sessionStorage.clear();

       // var date = ['15-07-2018', '16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018'];
        //var data = [4.5, 5.5, 6, 7, 6, 7, 8, 5];
      //  console.log(typeof(data));
        var chart = new Chartist.Line('.ph-chart', {
            labels: timeData,
            series: [phData]
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
                            axisTitle: 'Date (d-m-Y)',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: 40
                            },
                            textAnchor: 'middle'
                        },
                        axisY: {
                            axisTitle: 'PH',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: 0
                            },
                            textAnchor: 'middle',
                            flipTitle: false
                        }
                    })
                ]
            });
        });
    </script>
</body>

</html>