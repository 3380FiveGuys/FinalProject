<!--  
Last Modified: 12/15/2015

The MIT License (MIT)
Copyright (c) 2015 Carlos Martinez-Villar, Clark Walters, Ryan King, Sijae Brown

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->

<?php
  session_start();
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: users.php");
		exit;
	}
	
	$limit = 4;
	
	require_once "db.conf";
    $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Connect Error".mysqli_error($link));
	
	/********************* Monday *********************/
	$sql = "SELECT SUM(total) AS income
			FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Monday'
			AND timedate > DATE_ADD(curdate(), INTERVAL -3 month);";
    $result = mysqli_query($link,$sql);
    $Monday =  mysqli_fetch_array($result);
	$Monday = $Monday[income];
	
	/********************* Tuesday *********************/
	$$sql = "SELECT SUM(total) AS income
			FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Tuesday'
			AND timedate > DATE_ADD(curdate(), INTERVAL -3 month);";
    $result = mysqli_query($link,$sql);
    $Tuesday =  mysqli_fetch_array($result);
	$Tuesday = $Tuesday[income];
	
	/********************* Wednesday *********************/
	$sql = "SELECT SUM(total) AS income
			FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Wednesday'
			AND timedate > DATE_ADD(curdate(), INTERVAL -3 month);";
    $result = mysqli_query($link,$sql);
    $Wednesday =  mysqli_fetch_array($result);
	$Wednesday = $Wednesday[income];
	
	/********************* Thursday *********************/
	$sql = "SELECT SUM(total) AS income
			FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Thursday'
			AND timedate > DATE_ADD(curdate(), INTERVAL -3 month);";
    $result = mysqli_query($link,$sql);
    $Thursday =  mysqli_fetch_array($result);
	$Thursday = $Thursday[income];
	
	/********************* Friday *********************/
	$sql = "SELECT SUM(total) AS income
			FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Friday'
			AND timedate > DATE_ADD(curdate(), INTERVAL -3 month);";
    $result = mysqli_query($link,$sql);
    $Friday =  mysqli_fetch_array($result);
	$Friday = $Friday[income];
	
	/********************* Saturday *********************/
	$sql = "SELECT SUM(total) AS income
			FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Saturday'
			AND timedate > DATE_ADD(curdate(), INTERVAL -3 month);";
    $result = mysqli_query($link,$sql);
    $Saturday =  mysqli_fetch_array($result);
	$Saturday = $Saturday[income];
	
	/********************* Sunday *********************/
	$sql = "SELECT SUM(total) AS income
			FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Sunday'
			AND timedate > DATE_ADD(curdate(), INTERVAL -3 month);";
    $result = mysqli_query($link,$sql);
    $Sunday =  mysqli_fetch_array($result);
	$Sunday = $Sunday[income];
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <script>

  		var lineChartData = {
  			labels : ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
  			datasets : [
  				{
  					label: "Income",
					fillColor: "rgba(255,126,41,0.5)",
					strokeColor: "rgba(255,126,41,0.8)",
					highlightFill: "rgba(255,126,41,0.75)",
					highlightStroke: "rgba(255,126,41,1)",
					
  					
  					data : ["<?PHP echo $Monday;?>","<?PHP echo $Tuesday;?>","<?PHP echo $Wednesday;?>","<?PHP echo $Thursday;?>","<?PHP echo $Friday;?>","<?PHP echo $Monday;?>","<?PHP echo $Sunday;?>"]
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
      <h3>Average Income Over the Last Quarter</h3>      
      <canvas id="canvas" height="600" width="500"></canvas>
	  <p id="legend"></p>
    </div>
  </body>
</html>
