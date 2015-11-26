<?php
  session_start();
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <link href='stylesheet.css' type='text/css' rel='stylesheet'>
  </head>
  <body>
    <div class='content'>
      <h1>Welcome admin!</h1>
      <p>This is the content of this admin web page.</p>
      <form action='logout.php' method='POST'>
        <button type='submit' id='logoutButton' name='button' value='logout'>Log out</button>
      </form>
    </div>
  </body>
</html>
