<?php
  session_start();
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: users.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <link href='stylesheet.css' type='text/css' rel='stylesheet'>
    <script src="Chart.js"></script>
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
      <h1>Welcome admin!</h1>
      <p>This is the content of your admin web page.</p>
      <a href='weekofday.php'>Report by day of week</a><br>
      <a href='employee.php'>Employee performance<a><br>
      <a href='salesbyday.php'>Sales By Day</a><br>
    </div>
  </body>
</html>
