<!--  
Last Modified: 12/15/2015

The MIT License (MIT)
Copyright (c) 2015 Carlos Martinez-Villar, Clark Walters, Ryan King, Sijae Brown

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->

<?php
  	require_once "db.conf";
    
	if(isset($_GET['numberOfWeeks'])) {
		$limit = $_GET['numberOfWeeks'];
	} else {
		$limit = 1;
	}
	
	$link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Connect Error".mysqli_error($link));
	
	$sql = "SELECT gratuity FROM transaction WHERE Cashier = 'Rachel Dicke'";
			
    $result = mysqli_query($link,$sql);
    $Rachel = mysqli_fetch_array($result);
	$RachelSales = round(array_sum($Rachel), 2);
	
		
	$sql = "SELECT gratuity FROM transaction WHERE Cashier = 'Kim Burton'";
			
    $result = mysqli_query($link,$sql);
    $Kim = mysqli_fetch_array($result);
	$KimSales = round(array_sum($Kim), 2);
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <script>	
		var lineChartData = {
  			labels : ["Kim","Rachel"],
  			datasets : [
  				{
  					label: "Gratuity",
  					fillColor: "rgba(255,126,41,0.5)",
					strokeColor: "rgba(255,126,41,0.8)",
					highlightFill: "rgba(255,126,41,0.75)",
					highlightStroke: "rgba(255,126,41,1)",
  					data: ["<?PHP echo $KimSales;?>","<?PHP echo $RachelSales;?>"]
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
      
    <div class='content'>
    	<canvas id="canvas" height="600" width="500"></canvas>
    </div>
  </body>
</html>
