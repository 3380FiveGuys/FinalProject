<!--
Last Modified: 12/15/2015

The MIT License (MIT)
Copyright (c) 2015 Carlos Martinez-Villar, Clark Walters, Ryan King, Sijae Brown

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to use,
 copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
 Software, and to permit persons to whom the Software is furnished to do so,
 subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
DEALINGS IN THE SOFTWARE.
-->

<?php
	session_start();
	require_once "db.conf";

	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: users.php");
		exit;
	}

	$link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Connect Error".mysqli_error($link));

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 00";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time00 = $time[0];


	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 01";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time01 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 02";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time02 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 03";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time03 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 04";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time04 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 05";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time05 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 06";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time06 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 07";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time07 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 08";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time08 = $time[0];
	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 09";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time09 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 10";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time10 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 11";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time11 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 12";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time12 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 13";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time13 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 14";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time14 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 15";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time15 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 16";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time16 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 17";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time17 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 18";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time18 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 19";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time19 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 20";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time20 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 21";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time21 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 22";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time22 = $time[0];

	$sql = "SELECT COUNT(timedate) FROM transaction WHERE DATE_FORMAT(timedate, '%H') = 23";
	$result = mysqli_query($link,$sql);
	$time = mysqli_fetch_array($result);
	$time23 = $time[0];

?>

<!DOCTYPE html>
<html>
  <head>
    <script src="Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>

    <script>
  		var lineChartData = {
  			labels : [
					"00:00",
					"01:00",
					"02:00",
					"03:00",
					"04:00",
					"05:00",
					"06:00",
					"07:00",
					"08:00",
					"09:00",
					"10:00",
					"11:00",
					"12:00",
					"13:00",
					"14:00",
					"15:00",
					"16:00",
					"17:00",
					"18:00",
					"19:00",
					"20:00",
					"21:00",
					"22:00",
					"23:00"],
  			datasets : [
  				{
  					label: "Income",
						fillColor: "rgba(255,126,41,0.5)",
						strokeColor: "rgba(255,126,41,0.8)",
						highlightFill: "rgba(255,126,41,0.75)",
						highlightStroke: "rgba(255,126,41,1)",
  					data : [
							"<?PHP echo $time00;?>",
							"<?PHP echo $time01;?>",
							"<?PHP echo $time02;?>",
							"<?PHP echo $time03;?>",
							"<?PHP echo $time04;?>",
							"<?PHP echo $time05;?>",
							"<?PHP echo $time06;?>",
							"<?PHP echo $time07;?>",
							"<?PHP echo $time08;?>",
							"<?PHP echo $time09;?>",
							"<?PHP echo $time10;?>",
							"<?PHP echo $time11;?>",
							"<?PHP echo $time12;?>",
							"<?PHP echo $time13;?>",
							"<?PHP echo $time14;?>",
							"<?PHP echo $time15;?>",
							"<?PHP echo $time16;?>",
							"<?PHP echo $time17;?>",
							"<?PHP echo $time18;?>",
							"<?PHP echo $time19;?>",
							"<?PHP echo $time20;?>",
							"<?PHP echo $time21;?>",
							"<?PHP echo $time22;?>",
							"<?PHP echo $time23;?>"
						]
  				}
    		]
    	}

    	window.onload = function(){
    		var ctx = document.getElementById("canvas").getContext("2d");
    		window.myLine = new Chart(ctx).Line(lineChartData);
			//then you just need to generate the legend
		}
		var options =  {
			scaleShowGridLines : true,
			scaleGridLineColor : "rgba(28,28,28,0.5)",
			scaleGridLineWidth : 1,
			scaleShowHorizontalLines: true,
			scaleShowVerticalLines: false,
		};

    </script>
  </head>

  <body>
    <div id='topbar'>
      <img src='logo.png' height=72 width=250 alt='Günter Hans Login'>
      <ul>
        <li><a id="homeButton" href="adminpage.php">HOME</a></li>
        <li><a id="usersButton" href="register.php">SIGN UP</a></li>
        <li><a id="logoutButton" href="logout.php">LOGOUT</a></li>
      </ul>
    </div>
    <div class='content'>
      <h3>Sales by time</h3>
      <canvas id="canvas" height="600" width="600"></canvas>
	  <p id="legend"></p>
    </div>
  </body>
</html>
