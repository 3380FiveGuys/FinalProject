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
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: users.php");
		exit;
	}

	require_once "db.conf";
    $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Connect Error".mysqli_error($link));

	$sql = "SELECT SUM(total) FROM transaction WHERE timedate >= DATE_ADD(curdate(), INTERVAL -1 year)";
  $result = mysqli_query($link,$sql);
	$trans = mysqli_fetch_array($result);
	$trans = $trans[0];

	$sql = "SELECT SUM(gratuity) FROM transaction WHERE timedate >= DATE_ADD(curdate(), INTERVAL -1 year)";
  $result = mysqli_query($link,$sql);
	$gratuity = mysqli_fetch_array($result);
	$gratuity = $gratuity[0];

	$sql = "SELECT SUM(discount) FROM transaction WHERE timedate >= DATE_ADD(curdate(), INTERVAL -1 year)";
    $result = mysqli_query($link,$sql);
	$discount = mysqli_fetch_array($result);
	$discount = $discount[0];
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <script>
		var lineChartData = {
  			labels : ["Sales","Gratuity","Discounts"],
  			datasets : [
  				{
  					label: "Sales",
  					fillColor: "rgba(255,126,41,0.5)",
  					strokeColor: "rgba(255,126,41,0.8)",
  					highlightFill: "rgba(255,126,41,0.75)",
  					highlightStroke: "rgba(255,126,41,1)",
  					data: ["<?PHP echo $trans;?>","<?PHP echo $gratuity;?>","<?PHP echo $discount;?>"]
  				}
    		]
    	}

    	window.onload = function(){
    		var ctx = document.getElementById("canvas").getContext("2d");
    		window.myLine = new Chart(ctx).Bar(lineChartData);
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
      <h3>Last Years Report</h3>
      <canvas id="canvas" height="400" width="600"></canvas>
	  <p id="legend"></p>
    </div>
  </body>
</html>
