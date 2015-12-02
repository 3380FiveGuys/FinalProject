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
    <div id='menu'>
      <a id="homeButton" href="adminpage.php">HOME</a>
      <a id="usersButton" href="register.php">USERS</a>
      <form action='logout.php' method='POST'>
        <button type='submit' id='logoutButton' name='button' value='logout'>Log out</button>
      </form>
    </div>
    <div id='content' class='content'>
      <h1>Welcome admin!</h1>
      <p>This is the content of your admin web page.</p>
      <a href='weekofday.php'>Report by day of week</a>
      <a href='employee.php'>Employee performance<a>
      <a href='salesbyday.php'>Sales By Day</a>
    </div>
  </body>
</html>
