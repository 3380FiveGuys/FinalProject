<!-- salesbyday.php -->
<?php
  session_start();
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: users.php");
		exit;
	}

  require_once "db.conf";
  $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Connect Error".mysqli_error($link));

  $sql1 = "SELECT sum(total) FROM transaction WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Monday';";
  $sql2 = "SELECT sum(total) FROM transaction WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Tuesday';";
  $sql3 = "SELECT sum(total) FROM transaction WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Wednesday';";
  $sql4 = "SELECT sum(total) FROM transaction WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Thursday';";
  $sql5 = "SELECT sum(total) FROM transaction WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Friday';";
  $sql6 = "SELECT sum(total) FROM transaction WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Saturday';";
  $sql7 = "SELECT sum(total) FROM transaction WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = 'Sunday';";

  $result1 = mysqli_query($link,$sql1);
  $result2 = mysqli_query($link,$sql2);
  $result3 = mysqli_query($link,$sql3);
  $result4 = mysqli_query($link,$sql4);
  $result5 = mysqli_query($link,$sql5);
  $result6 = mysqli_query($link,$sql6);
  $result7 = mysqli_query($link,$sql7);

  $row1 = mysqli_fetch_array($result1);
  $row2 = mysqli_fetch_array($result2);
  $row3 = mysqli_fetch_array($result3);
  $row4 = mysqli_fetch_array($result4);
  $row5 = mysqli_fetch_array($result5);
  $row6 = mysqli_fetch_array($result6);
  $row7 = mysqli_fetch_array($result7);
?>


<!DOCTYPE html>
<html>
  <head>
    <link href='stylesheet.css' type='text/css' rel='stylesheet'>
    <script src="Chart.js"></script>
    <script>

      var monday = "<?php echo $row1[0] ?>";
      var tuesda = "<?php echo $row2[0] ?>";
      var wednes = "<?php echo $row3[0] ?>";
      var thursd = "<?php echo $row4[0] ?>";
      var friday = "<?php echo $row5[0] ?>";
      var saturd = "<?php echo $row6[0] ?>";
      var sunday = "<?php echo $row7[0] ?>";

      window.onload = function(){
        var ctx = document.getElementById("chart").getContext("2d");
        var myBarChart = new Chart(ctx).Bar(data, options);
      }

      var data = {
          labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
          datasets: [
            {
              label: "Total Sales by Day of the Week",
              fillColor: "rgba(255,126,41,0.5)",
              strokeColor: "rgba(255,126,41,0.8)",
              highlightFill: "rgba(255,126,41,0.75)",
              highlightStroke: "rgba(255,126,41,1)",
              data: [monday,tuesda,wednes,thursd,friday,saturd,sunday]
            }
          ]
      };

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
    <div id='content' class='content'>
      <div id=sales1>
        <h4>Total Sales per Day of the Week</h4>
        <canvas id="chart" width="700" height="400"></canvas>
      </div>
    </div>
  </body>
</html>

<?php mysqli_close(); ?>
