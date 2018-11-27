<?php  
        # Connect to MySQL server and the database
		require( 'includes/connect_db.php' ) ;
		
	function show_all_records	
		# Create a query to get limbo database info for admin page
		$query = 'SELECT stuff.id, owner, finder, item_name, status 
                  FROM   stuff, locations 
                  WHERE  stuff.location_id = locations.id' ;
		
        # Execute the query
		$results = mysqli_query( $dbc , $query ) ;
		check_results($results);
		
		# Show results
		if( $results )
		{
		  #Table Headers
          echo '<TABLE BORDER align = "center">';
		  echo '<TR>';
		  echo '<TH>ItemID</TH>';
		  echo '<TH>Owner</TH>';
		  echo '<TH>Finder</TH>';
		  echo '<TH>Description</TH>';
		  echo '<TH>Location</TH>';
		  echo '<TH>Status</TH>';
		  echo '</TR>';
		  
          # For each row result, generate a table row
		  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
		  {
			echo '<form method = "POST" action = "adminUpdateStatus.php">';
			echo '<TR>' ;
			echo '<TD name = "ID" value = '.$row['id'].'>'. $row['id'] .'</TD>';
			echo '<TD>' . $row['owner'] . '</TD>' ;
			echo '<TD>' . $row['finder'] . '</TD>';
			echo '<TD>' . $row['description'] . '</TD>' ;
			echo '<TD>' . $row['item_name'] . '</TD>' ;
			echo '<TD class = "select">
					<select name = "Status">
						<option value = "lost">Lost</option>
						<option value = "found">Found</option>
					</select>
				  </TD>' ;
			echo '<TD> <input type = "submit" value = "Submit"> </TD>';
			echo '</TR>' ;
			echo '</form>';
		  }
		  # End the table
		  echo '</TABLE>';
		  # Free up the results in memory
		  mysqli_free_result( $results ) ;
		}
?>