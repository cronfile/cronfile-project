<!DOCTYPE html>
<html>
    <head>
        <title>Lost and Found Quicklinks </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/quicklinks.css" type="text/css" rel="stylesheet"/>
    </head>
    
<body>
    <div id = "header">
        <header> Marist College Lost and Found</header>
    </div>
    
   <ul>
       <li><a href="limbo-landing.php">Home</a></li>
       <li><a href="lost.php">Lost</a></li>
       <li><a href="found.php">Found</a></li>
       <li><a href="quicklinks.php">Quicklinks</a></li>
       <li style="float:right"><a href="admin.php">Admin</a></li>
   </ul>
    
    <div id = "message">
        <div id = "messageT1" align = "center" > Quicklinks </div>
        <div id = "messageT2" align= "center" > Item Descriptions</div>
    </div>
    
<?php
# Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;
	
	require( 'includes/helpers.php' ) ;
	
	if ($_SERVER[ 'REQUEST_METHOD']=='GET'){
		if(isset($_GET['id'])){
			show_record($dbc,$_GET['id']);}}
			
			
	# Close the connection
	mysqli_close( $dbc ) ;

?>
</body>
</html>