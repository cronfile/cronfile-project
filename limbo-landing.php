<!DOCTYPE html>
<html>
    <head>
        <title> Marist College Lost and Found </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/limbo-landing.css" type="text/css" rel="stylesheet"/>
    </head>
    
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
        <div id = "messageT1" align= "center" > Welcome to Marist College's Lost and Found </div>
        <div id = "messageT2" align= "center" > If you have lost or found an item, use this service.</div>
    </div>
	
	<?php
	# Connect to MySQL server and the database
	require( 'includes/connect_db.php' ) ;
	
	# Create a query to get the name and price sorted by price
	$query = 'SELECT id, item_name, create_date FROM stuff WHERE create_date <="2018-11-02 00:00:00" ORDER BY create_date ASC' ;
	# Execute the query
	$results = mysqli_query( $dbc, $query ) ;
	# Show results
	if ( $results )
	{
		echo '<H1 align="left">Lost and Found Items</H1>';
		echo '<TABLE align="left" width=60% cellpadding=5px cellspacing=5px border = "1">';
		echo '<TR>';
		echo '<TH>ID</TH>' ;
		echo '<TH>Item Name</TH>';
		echo '<TH>Created</TH>';
		echo '</TR>';
		
		
		while ( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC ) )
		{
		 echo '<TR>' ;
		 echo '<TD>' . $row['id'] . '</TD>' ;
		 $alink = '<A HREF="quicklinks.php"' . $row['item_name'] . '>' . $row['item_name'] . '</A>' ;
		 echo '<TD align="right">' . $alink . '</TD>' ; 
		 echo '<TD align="right">' . $row['create_date'] . '</TD>' ;
		 echo '</TR>' ;
		}
		
		echo '</TABLE>';
		
		mysqli_free_result( $results ) ;
	}
	else
	{
		# If we get here, something has gone wrong
		echo '<p>' . mysqli_error( $dbc ) . '</p>' ;
	}
	
	# Close the connection
	mysqli_close( $dbc ) ;
	?>	

	</body>
</html>