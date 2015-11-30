<!-- login.php -->
<?php
  session_start();

  //CHECK IF USER IS ALREADY LOGGED IN
  $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
  if($loggedIn){
    if($_SESSION['admin'] == 1){
      header("Location: adminpage.php");
    }else{
      header("Location: userpage.php");
    }
    exit;
  }

  //HANDLE BUTTON SELECTION
  $button = empty($_POST['button']) ? '' : $_POST['button'];
  switch($button){
    case '':
      handle_startpage();
      break;
    case 'logout':
      handle_startpage();
      break;
    case 'login':
      handle_login();
      break;
  }

  //LOGIN
  function handle_login(){
    $username = empty($_POST['username']) ? '' : $_POST['username'];
    $password = empty($_POST['password']) ? '' : $_POST['password'];
    if($password == '' || $username==''){ //EMPTY USERNAME OR PASSWORD - PRINT ERROR
      $error = "Incorrect username or password.";
      require "index.php";
    }else{ //ELSE LOOK UP USERNAME AND VERIFY PASSWORD
      require_once("db.conf"); //MySQL CONNECTION
      $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Connect Error".mysqli_error($link));
      $sql = "SELECT * FROM user WHERE username='".$_POST['username']."';";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result);
      if($row['username']==''){ //USERNAME NOT FOUND
        mysqli_close();
        $error = "Username not found.";
        require "index.php";
      }else{ //USER FOUND, VERIFY PASSWORD
        $salt = $row['salt'];
        $hash = $row['hashed_password'];
        $admin = $row['admin'];
        if(password_verify($salt.$_POST['password'],$hash)){ //LOGIN SUCCESSFUL
          $_SESSION['loggedin'] = $username;
          $_SESSION['admin'] = $admin;
          mysqli_close();
          if($admin==1){ //REDIRECT USER OR ADMIN
            header("Location: adminpage.php");
            exit;
          }else{
            header("Location: userpage.php");
            exit;
          }
        }else{ //ELSE INCORRECT PASSWORD - PRINT ERROR
          mysqli_close();
          $error = "Incorrect password.";
          require "index.php";
        }
      }
    }
  }

  //FAILED LOGIN - RETURN TO LOGIN PAGE
  function handle_startpage(){
    $username = "";
    $password = "";
    require "index.php";
  }

?>
