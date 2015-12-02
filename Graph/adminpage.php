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
	<link href="c3.css" media="screen" rel="stylesheet" type="text/css">
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
	  
	  <div class="container">
            <div class="chart">
                <div id="chart">                    
                </div>				
                <div id="ace-error"></div>
        	</div>
        </div>
        
        <script src="d3-3.5.0.min.js" type="text/javascript"></script>
        <script src="c3.min.js" type="text/javascript"></script>
        
        <script>
      var chart = c3.generate({
        bindto: '#chart',
        data: {
          x : 'x',
          xFormat : '%Y%m%d',
          columns: [
            ['x', new Date('2013-01-01T00:00:00Z'), new Date('2013-01-02T00:00:00Z'), new Date('2013-01-03T00:00:00Z'), new Date('2013-01-04T00:00:00Z'), new Date('2013-01-05T00:00:00Z'), new Date('2013-01-06T00:00:00Z')],
            ['Income', 300, 500, 1000, 400, 100, 250],
            ['Discount', 13, 10, 200, 45, 25, 50]
          ]
        },
        axis : {
          x : {
            type : 'timeseries',
            tick : {
//              format : "%m/%d" // https://github.com/mbostock/d3/wiki/Time-Formatting#wiki-format
              format : "%a %b %e, %Y" // https://github.com/mbostock/d3/wiki/Time-Formatting#wiki-format
            }
          },
		  y : {
				tick: {
					format: d3.format("$,")
	//                format: function (d) { return "$" + d; }
				}
			}
        }
      });
    </script> 
	  
    </div>
  </body>
</html>
