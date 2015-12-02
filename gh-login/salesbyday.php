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
        window.myBarChart = new Chart(ctx).Bar(data);
      }

      var data = {
          labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
          datasets: [
            {
              label: "Total Sales by Day of the Week",
              fillColor: "rgba(151,187,205,0.5)",
              strokeColor: "rgba(151,187,205,0.8)",
              highlightFill: "rgba(151,187,205,0.75)",
              highlightStroke: "rgba(151,187,205,1)",
              data: [monday,tuesda,wednes,thursd,friday,saturd,sunday]
            }
          ]
      };

    </script>
  </head>
  <body>
    <div id='menu'>
      <a id="homeButton" href="adminpage.php">HOME</a>
      <form action='logout.php' method='POST'>
        <button type='submit' id='logoutButton' name='button' value='logout'>Log out</button>
      </form>
    </div>
    <div id='content' class='content'>
      <div id=sales1>
        <canvas id="chart" width="1000" height="500"></canvas><br>
      </div>
    </div>
  </body>
</html>

<?php mysqli_close(); ?>
