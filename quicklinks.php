<!DOCTYPE html>
<html>
    <head>
        <title>Lost and Found Quicklinks </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/quicklinks.css" type="text/css" rel="stylesheet"/>
   
   
</head>
<body>
    

    
<body>
   <div id = "header">
        <header>  </header>
    </div>
    
   <div class="topnav">
  <a href="limbo-landing.php">Home</a>
  <a href="lost.php">Lost</a>
  <a href="found.php">Found</a>
  <a href="quicklinks.php">Quicklinks</a>
  </div>
    
    <div id = "message">
        <div id = "messageT1" align= "center" > Quick links </div>
        <div id = "messageT2" align= "center" > Click an item to see more about it</div>
    </div>
    
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;
require( 'includes/helpers.php' ) ;
	
	
	show_link_records($dbc);
	
	# Close the connection
	mysqli_close( $dbc ) ;
?>
</body>
</html>