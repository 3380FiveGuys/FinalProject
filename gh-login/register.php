<!-- register.php -->

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
    <div id='topbar'>
      <img src='logo.png' height=72 width=250 alt='Günter Hans Login'>
      <ul>
        <li><a id="homeButton" href="adminpage.php">HOME</a></li>
        <li><a id="usersButton" href="register.php">SIGN UP</a></li>
        <li><a id="logoutButton" href="logout.php">LOGOUT</a></li>
      </ul>
    </div>
    <div id='content' class='content'>
      <form id='textForm' action='users.php' method='POST'>
        <p>Enter a username and password to register a user</p>
        <input type=hidden name='requestFromRegister' value=true>
        <div id='inputTextDiv'>
          <input type='text' id='user' name='username' placeholder='username'><br>
          <input type='password' id='pass' name='password' placeholder='password'><br>
        </div>
        <div id='inputButtonDiv'>
          <button type='submit' id='formButton' name='button' value='register'>Register</button>
        </div>
        <?php
          if($error != ''){
            echo "<p>".$error."</p>";
          }
          if($success != ''){
            echo "<p>".$success."</p>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
