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
    <link rel='stylesheet' type="text/css" href='stylesheet.css'>
  </head>
  <body>
    <div class='content'>
      <?php echo "<h1>Welcome ".$_SESSION['loggedin']."!</h1>"; ?>
      <p>This is the content of the user web page.</p>
      <form action='logout.php' method='POST'>
        <button type='submit' id='logoutButton' name='button' value='logout'>Log out</button>
      </form>
    </div>
  </body>
</html>
