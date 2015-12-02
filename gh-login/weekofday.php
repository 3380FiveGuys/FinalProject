<!-- dayofweek.php -->
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
      <form action="">
        <input type="radio" name="dayofweek" class="weekOfDayRadio" value="Monday" checked>Monday
        <input type="radio" name="dayofweek" class="weekOfDayRadio" value="Tuesday">Tuesday
        <input type="radio" name="dayofweek" class="weekOfDayRadio" value="Wednesday">Wednesday
        <input type="radio" name="dayofweek" class="weekOfDayRadio" value="Thursday">Thursday
        <input type="radio" name="dayofweek" class="weekOfDayRadio" value="Friday">Friday
        <input type="radio" name="dayofweek" class="weekOfDayRadio" value="Saturday">Saturday
        <input type="radio" name="dayofweek" class="weekOfDayRadio" value="Sunday">Sunday
      </form>
      <p>Here goes a graph</p>
    </div>
  </body>
</html>
