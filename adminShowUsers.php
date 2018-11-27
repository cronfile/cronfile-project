<?php  
        # Connect to MySQL server and the database
		require( 'includes/connect_db.php' ) ;
		
		# Create a query to get limbo database info for admin page
		$query = 'SELECT first_name, last_name, email, reg_date
                  FROM   users ';
		
        # Execute the query
		$results = mysqli_query( $dbc , $query ) ;

        function deleteUser($username){
        
            $deleteQuery = 'DELETE FROM users [WHERE email = '.$username.']';
            $deleteResults = mysqli_query( $dbc , $query ) ;
            echo 'User Deleted';
        }
		
		# Show results
		if( $results )
		{
		  #Table Headers
          echo '<TABLE BORDER align = "center">';
		  echo '<TR>';
		  echo '<TH>First Name</TH>';
		  echo '<TH>Last Name</TH>';
		  echo '<TH>Email/Username</TH>';
		  echo '<TH>Registration Date</TH>';
		  echo '</TR>';
		  
          # For each row result, generate a table row
		  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
		  {
			echo '<form method = "POST" action = "adminUsers.php">';
			echo '<TR>' ;
			echo '<TD>' . $row['first_name'] . ' </TD>';
			echo '<TD>' . $row['last_name'] . '</TD>' ;
			echo '<TD>' . $row['email'] . '</TD>' ;
			echo '<TD>' . $row['reg_date'] . '</TD>' ;
			echo '</TR>' ;
			echo '</form>';
		  }
		  # End the table
		  echo '</TABLE>';
		  # Free up the results in memory
		  mysqli_free_result( $results ) ;
		}
?>