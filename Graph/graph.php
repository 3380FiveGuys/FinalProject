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
  
    <script type="text/javascript" src="include/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="include/jquery.ui.timepicker.js?v=0.3.3"></script>
    <script type="text/javascript" src="include/d3-3.5.0.min.js"></script>
    <script type="text/javascript" src="include/c3.min.js"></script>
	<script type="text/javascript" src="include/jquery-ui.js"></script>
  
    <link rel="stylesheet" type="text/css" href="include/c3.css" media="screen">
	<link rel="stylesheet" type="text/css" href="include/jquery.ui.timepicker.css?v=0.3.3"/>
    <link rel="stylesheet" type="text/css" href="include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css"/>
	<link rel="stylesheet" type="text/css" href="include/jquery.ui.timepicker.css?v=0.3.3"/>
    <link rel="stylesheet" type="text/css" href="include/stylesheet.css"/>
	
    <!-- Javascript -->
	<script>
	 $(function() {
		$( "#datepicker-1" ).datepicker();
		$( "#datepicker-1" ).datepicker("setDate", "w-14");
	 });
	</script>
	<script>
	 $(function() {
		$( "#datepicker-2" ).datepicker();
		$( "#datepicker-2" ).datepicker("setDate", "w");
	 });
	</script>
	
  </head>
  <body>
	  <div class="container">
            <div class="chart">
                <div id="chart">                    
                </div>				
                <div id="ace-error"></div>
        	</div>
        </div>
        
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
    
    <div>
        <label for="timepicker.[1]">Start: </label>
        <input type="text" style="width: 70px;" id="timepicker.[1]" value="" />
        <script type="text/javascript">
            $(document).ready(function() {
                $('#timepicker\\.\\[1\\]').timepicker( {
                    showAnim: 'blind'
                } );
            });
        </script>
		
		<label for="timepicker.[2]">End: </label>
        <input type="text" style="width: 70px;" id="timepicker.[2]" value="" />
        <script type="text/javascript">
            $(document).ready(function() {
                $('#timepicker\\.\\[2\\]').timepicker( {
                    showAnim: 'blind'
                } );
            });
        </script>
		
        <pre id="script_1" style="display: none" class="code">$('#timepicker').timepicker();</pre>
    </div>
	
	<p>Start Date: <input type="text" id="datepicker-1"></p>
	<p>End Date: <input type="text" id="datepicker-2"></p>
    
  </body>
</html>
