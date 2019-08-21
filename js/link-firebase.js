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
var item; //counts the total item
firebase.database().ref('/sensor_data').once('value', function (snap) {
    item = 0;
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
        item += 1;
    });
    if (item > 0) { //if item is more than one
            setValue();
        }
        else {
            initializeField();
        }
});