<!-- dayofweek.php -->
<?php
  session_start();
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: users.php");
		exit;
	}
	
	require_once "db.conf";
    $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Connect Error".mysqli_error($link));
    
	$sql = "SELECT sum(total) FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Sunday'
  	        ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Sunday'
  	        LIMIT 3;";
    $result = mysqli_query($link,$sql);
    $Sunday = mysqli_fetch_array($result);
	
	$sql = "SELECT sum(total) FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Saturday'
  	        ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Saturday'
  	        LIMIT 3;";
    $result = mysqli_query($link,$sql);
    $Saturday = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="Chart.js"></script>  
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
  </head>
  
  <body>
    <div id='menu'>
      <a id="homeButton" href="adminpage.php">HOME</a>
      <a id="usersButton" href="register.php">USERS</a>
      <form action='logout.php' method='POST'>
        <button type='submit' id='logoutButton' name='button' value='logout'>Log out</button>
      </form>
    </div>
    <div id='content' class='content'>
      <h3>Summary of sales by day of the week</h3>
      <form action="weekofday.php">
        <input type="number" name="numberOfWeeks" min="1" max="52">
        <input type="submit">
      </form>
      <p>Here goes a graph</p>
    </div>
    
    <div class="graph">
        <div>
            <canvas id="canvas" height="450" width="600"></canvas>
        </div>
    </div>


	<script>
		
		var lineChartData = {
			labels : ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
			datasets : [
				{
					label: "Income",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [1,2,3,4,5,"<?PHP echo $Saturday[0];?>","<?PHP echo $Sunday[0];?>"]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
	</script>
    
  </body>
</html>
