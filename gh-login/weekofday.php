<!-- dayofweek.php -->
<?php
  session_start();
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: users.php");
		exit;
	}

	if(isset($_GET['numberOfWeeks'])) {
		$limit = $_GET['numberOfWeeks'];
	} else {
		$limit = 1;
	}

	require_once "db.conf";
    $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Connect Error".mysqli_error($link));

	$sql = "SELECT total FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Monday'
  	        ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Monday'
  	        LIMIT $limit";
    $result = mysqli_query($link,$sql);
    $Monday = mysqli_fetch_array($result);
	$count = 0;

	for ($x = 0; $x <= $limit; $x++) {
		$count = $count + $Monday[$x];
	}
	$Monday = round($count/$limit, 2);

	$sql = "SELECT total FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Tuesday'
  	        ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Tuesday'
  	        LIMIT $limit";
    $result = mysqli_query($link,$sql);
    $Tuesday = mysqli_fetch_array($result);
	$count = 0;

	for ($x = 0; $x <= $limit; $x++) {
		$count = $count + $Tuesday[$x];
	}
	$Tuesday = round($count/$limit, 2);

	$sql = "SELECT total FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Wednesday'
  	        ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Wednesday'
  	        LIMIT $limit";
    $result = mysqli_query($link,$sql);
    $Wednesday = mysqli_fetch_array($result);
	$count = 0;

	for ($x = 0; $x <= $limit; $x++) {
		$count = $count + $Wednesday[$x];
	}
	$Wednesday = round($count/$limit, 2);

	$sql = "SELECT total FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Thursday'
  	        ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Thursday'
  	        LIMIT $limit";
    $result = mysqli_query($link,$sql);
    $Thursday = mysqli_fetch_array($result);
	$count = 0;

	for ($x = 0; $x <= $limit; $x++) {
		$count = $count + $Thursday[$x];
	}
	$Thursday = round($count/$limit, 2);

	$sql = "SELECT total FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Friday'
  	        ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Friday'
  	        LIMIT $limit";
    $result = mysqli_query($link,$sql);
    $Friday = mysqli_fetch_array($result);
	$count = 0;

	for ($x = 0; $x <= $limit; $x++) {
		$count = $count + $Friday[$x];
	}
	$Friday = round($count/$limit, 2);

	$sql = "SELECT total FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Saturday'
  	        ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Saturday'
  	        LIMIT $limit";
    $result = mysqli_query($link,$sql);
    $Saturday = mysqli_fetch_array($result);
	$count = 0;

	for ($x = 0; $x <= $limit; $x++) {
		$count = $count + $Saturday[$x];
	}
	$Saturday = round($count/$limit, 2);

	$sql = "SELECT total FROM transaction
  	        WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Sunday'
			GROUP BY DATE_FORMAT(CAST(timedate AS date), '%W') = 'Saturday'
			LIMIT $limit";
    $result = mysqli_query($link,$sql);
    $Sunday = mysqli_fetch_array($result);
	$count = 0;

	for ($x = 0; $x <= $limit; $x++) {
		$count = $count + $Sunday[$x];
	}
	$Sunday = round($count/$limit, 2);
	
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
  					fillColor: "rgba(151,187,205,0.2)",
  					strokeColor: "rgba(151,187,205,1)",
  					pointColor: "rgba(151,187,205,1)",
  					pointStrokeColor: "#fff",
  					pointHighlightFill: "#fff",
  					pointHighlightStroke: "rgba(151,187,205,1)",
  					data : ["<?PHP echo $Monday;?>","<?PHP echo $Tuesday;?>","<?PHP echo $Wednesday;?>","<?PHP echo $Thursday;?>","<?PHP echo $Friday;?>","<?PHP echo $Monday;?>","<?PHP echo $Sunday;?>"]
  				}
    		]
    	}

    	window.onload = function(){
    		var ctx = document.getElementById("canvas").getContext("2d");
    		window.myLine = new Chart(ctx).Line(lineChartData);
    	}
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
      <h3>Average Income per Day of the Week</h3>
      <form action="weekofday.php">
        <p>Number of weeks to go back:</p>
		<input type="number" name="numberOfWeeks" min="1" max="52" value="<?PHP echo $limit; ?>">
        <input type="submit">
      </form>
	
      <canvas id="canvas" height="300" width="500"></canvas>
    </div>
  </body>
</html>
