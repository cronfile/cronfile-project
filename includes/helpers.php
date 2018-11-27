<?php
$debug = true;

# Shows the records in limbo
function show_lost_record($dbc) {
	#Create a query to get the id, item name, and status
	$query = 'SELECT owner, item_name, create_date FROM stuff WHERE status="lost"' ;
	
	#Execute the query
	$results = mysqli_query( $dbc, $query ) ;
	check_results($results);
	
	#Show results
	if( $results ) {
	#Initializes the table before executing the query.
	echo '<TABLE border = "1" float="left" cellpadding="5px" cellspacing=5px border = "1">' ;
	echo '<TR>' ;
	echo '<TH>Owner</TH>' ;
	echo '<TH>Item Name</TH>' ;
	echo '<TH>Created</TH>' ;
	echo '</TR>' ;
	
	#For each row result, generate a table row
	while ( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC ) ) {
		echo '<TR>' ;
		echo '<TD>' . $row['owner'] . '</TD>' ;
	    echo '<TD>' . $row['item_name'] . '</TD>' ;
		echo '<TD>' . $row['create_date'] . '</TD>' ;
        echo '</TR>' ;
	}
	#End the table
	echo '</TABLE>' ;
	
	#Free up the results in memory
	mysqli_free_result ( $results ) ;
	}
}

# Shows the records in limbo
function show_found_records($dbc) {
	#Create a query to get the id, item name, and status
	$query = 'SELECT finder, item_name, create_date FROM stuff WHERE status="found"' ;
	
	#Execute the query
	$results = mysqli_query( $dbc, $query ) ;
	check_results($results);
	
	#Show results
	if( $results ) {
	#Initializes the table before executing the query.
	echo '<TABLE border = "1" float="left" cellpadding=5px cellspacing=5px border = "1">' ;
	echo '<TR>' ;
	echo '<TH>Finder</TH>' ;
	echo '<TH>Item Name</TH>' ;
	echo '<TH>Created</TH>' ;
	echo '</TR>' ;
	
	#For each row result, generate a table row
	while ( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC ) ) {
		echo '<TR>' ;
		echo '<TD>' . $row['finder'] . '</TD>' ;
	    echo '<TD>' . $row['item_name'] . '</TD>' ;
		echo '<TD>' . $row['create_date'] . '</TD>' ;
        echo '</TR>' ;
	}
	#End the table
	echo '</TABLE>' ;
	
	#Free up the results in memory
	mysqli_free_result ( $results ) ;
	}
}

function show_all_records($dbc) {
        # Create a query to get the name and price sorted by price
        $query = 'SELECT id, item_name, create_date, status FROM stuff' ;

        # Execute the query
        $results = mysqli_query( $dbc , $query ) ;
        check_results($results);
    
        # Show results
        if ( $results )
		{
		# Initializes the table before executing the query
		echo '<H1 align="center"></H1>';
		echo '<TABLE align="center" cellpadding=5px cellspacing=5px border = "1">';
		echo '<TR>';
		echo '<TH>ID</TH>' ;
		echo '<TH>Item Name</TH>';
		echo '<TH>Created</TH>';
		echo '<TH>Updated</TH>';
		echo '<TH>Status</TH>';
		echo '<TH>Update Status</TH>';
		echo '<TH>Submit Changes</TH>';
		echo '</TR>';
		
		# For each row result, generate a table row
		while ( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC ) )
		{
		 echo '<form method = "POST" action = "admin.php">';
		 echo '<TR>' ;
		 echo '<TD>' . $row['id'] . '</TD>' ;
		 $alink = '<A HREF=adminLogInCheck.php?id='. $row['id'] . '>' . $row['item_name'] . '</A>' ;
		 echo '<TD align="right">' . $alink . '</TD>' ;
		 echo '<TD>' . $row['create_date'] . '</TD>' ;
		 echo '<TD>' . $row['status'] . '</TD>' ;
		 echo '<TD class = "select">
					<select name = "Status">
						<option value = "lost">Lost</option>
						<option value = "found">Found</option>
					</select>
				  </TD>' ;
			echo '<TD> <input type = "submit" value = "Submit"> </TD>';
			echo '</TR>' ;
			echo '</form>';
		 echo '</TR>' ;
		}
        # End the table
        echo '</TABLE>';

        # Free up the results in memory
        mysqli_free_result( $results ) ;
        }
}

# Inserts a record into the table
function insert_lost_record($dbc, $owner, $item_name, $description, $location_id, $create_date) {
	$query = 'INSERT INTO stuff(owner, item_name, description, location_id, create_date, status) VALUES ("'.$owner.'" ,"'.$item_name.'", "'.$description.'", "'.$location_id.'", "'.$create_date.'", "lost")' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
  
  echo '<p> Your submission was successful!</p>' ;
}

# Inserts a record into the table
function insert_found_record($dbc, $finder, $item_name, $description, $location_id, $create_date) {
	$query = 'INSERT INTO stuff(finder, item_name, description, location_id, create_date, status) VALUES ("'.$finder.'" ,"'.$item_name.'", "'.$description.'", "'.$location_id.'", "'.$create_date.'", "found")' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
  
  echo '<p> Your submission was successful!</p>' ;
}

# Inserts a record into the table
function update_record($dbc, $id, $item_name, $description, $location_id, $owner, $finder, $status) {
	$query = 'UPDATE stuff set id = '.$id.', set item_name = '.$item_name.', set description = '.$description.', set location_id = '.$location_id.', set create_date= '.$create_date.' ,  set owner= '.$owner.', set finder = '.$finder.', set status = '.$status.')' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

function update_status ($dbc, $status){
	$query = 'UPDATE stuff SET status = '.$status.'';
	show_query($query);
	
	 $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
	
}

# Inserts a record into the table
function insert_admin_record($dbc, $finder, $item_name, $description, $location_id, $create_date) {
	$query = 'INSERT INTO stuff(finder, item_name, description, location_id, create_date, status) VALUES ("'.$finder.'" ,"'.$item_name.'", "'.$description.'", "'.$location_id.'", "'.$create_date.'", "found")' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
  
  echo '<p> Your submission was successful!</p>' ;
}

function show_link_records($dbc) {
        # Create a query to get the name and price sorted by price
        $query = 'SELECT id, item_name, create_date, status FROM stuff' ;

        # Execute the query
        $results = mysqli_query( $dbc , $query ) ;
        check_results($results);
    
        # Show results
        if ( $results )
		{
		# Initializes the table before executing the query
		echo '<H1 align="center"></H1>';
		echo '<TABLE align="center" cellpadding=10px cellspacing=5px border = "2">';
		echo '<TR>';
		echo '<TH>ID</TH>' ;
		echo '<TH>Item Name</TH>';
		echo '<TH>Created</TH>';
		echo '<TH>Updated</TH>';
		echo '<TH>Status</TH>';
		echo '</TR>';
		
		# For each row result, generate a table row
		while ( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC ) )
		{
		 echo '<TR>' ;
		 echo '<TD>' . $row['id'] . '</TD>' ;
		 $alink = '<A HREF=quickdetail.php?id='. $row['id'] . '>' . $row['item_name'] . '</A>' ;
		 echo '<TD align="right">' . $alink . '</TD>' ;
		 echo '<TD>' . $row['create_date'] . '</TD>' ;
		 echo '<TD>' . $row['status'] . '</TD>' ;
		 echo '</TR>' ;
		}
        # End the table
        echo '</TABLE>';

        # Free up the results in memory
        mysqli_free_result( $results ) ;
        }
}

function show_record($dbc, $id){
	# Create  query to get all details on an item
	$query = 'SELECT * FROM stuff WHERE id = ' . $id . '';
	
	# Execute the query
	$results = mysqli_query( $dbc, $query ) ;
	check_results($results) ;
	$row = mysqli_fetch_array( $results, MYSQLI_ASSOC) ;
	
	
	# Show results
	if ( $results ) {
		# Initilizes the table before executing query.
        echo '<DIV>' ;
		echo '<TABLE border = "1" align= "center" cellpadding="5px" cellspacing=5px border = "1" >';
        echo '<TR class="id">';
        echo '<TD>ID:</TD>';
		echo '<TD>'.$row['id'].'</TD>';
		echo '<TR></TR>';
		echo '<TR>';
        echo '<TD>Item Name:</TD>';
		echo '<TD>'.$row['item_name'].'</TD>';
		echo '</TR>';
		echo '<TR>';
        echo '<TD>Location:</TD>' ;
		echo '<TD>'.$row['location_id'].'</TD>';
		echo '</TR>';
		echo '<TR>';
        echo '<TD>Description</TD>';
		echo '<TD>'.$row['description'].'</TD>';
		echo '</TR>';
		echo '<TR>';
		echo '<TD>Created</TD>';
		echo '<TD>'.$row['create_date'].'</TD>';
		echo '</TR>' ;
		echo '<TR>' ;
		echo '<TD>Owner</TD>';
		echo '<TD>'.$row['owner'].'</TD>';
		echo '</TR>' ;
		echo '<TR>' ;
        echo '<TD>Finder</TD>';
		echo '<TD>'.$row['finder'].'</TD>';
		echo '</TR>' ;
		echo '<TR>' ;
        echo '<TD>Status</TD>';
		echo '<TD>'.$row['status'].'</TD>';
		echo '</TR>' ;
		echo '</TABLE>';
		echo '</DIV>';
		
		
        # For each row result, generate a table row
        while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) ) {
			echo '<TR class="id">' ;
            echo '<TD>' . $row['id'] . '</TD>' ;
	        echo '<TD>' . $row['item_name'] . '</TD>' ;
            echo '</TR>' ;
        }
        # End the table
        echo '</TABLE>';

        # Free up the results in memory
        mysqli_free_result( $results ) ;
        }
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the inputed number for validity.
function valid_item_name ($item_name) {
        if ( empty($item_name) )
            return false;
        else 
            return true;	
}
#Checks the 
function valid_owner ($owner) {
        if ( empty($owner) )
            return false;
        else 
            return true;	
}

#Checks the 
function valid_finder ($finder) {
        if ( empty($finder) )
            return false;
        else 
            return true;	
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}

?>