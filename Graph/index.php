<!-- index.php -->
<?php
  if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']){ //REDIRECT TO HTTPS
    $$url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header('Location: '.$url);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link href='stylesheet.css' type='text/css' rel='stylesheet'>
    <title>GH Login</title>
  </head>
  <body>
    <h3 id='title'>G&uuml;nter Hans - Login</h3>
    <div class='content'>
      <form id='loginForm' action='login.php' method='POST'>
        <h3>Login</h3>
        <div id='inputTextDiv'>
          <input type='text' id='user' name='username' placeholder='username'><br>
          <input type='password' id='pass' name='password' placeholder='password'><br>
        </div>
        <div id='inputButtonDiv'>
          <button type='submit' id='formButton' name='button' value='login'>Log in</button>
        </div>
        <?php
          if($error != ''){
            echo "<p>".$error."</p>";
          }
        ?>
      </form>
    </div>
    <br>
    <p>Admin page: admin admin</p>
  </body>
</html>
