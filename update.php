<!DOCTYPE html>
<html>
    <head>
        <title>Lost and Found Item Update </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
         <link href="css/lost.css" type="text/css" rel="stylesheet"/>
    </head>
    
<body>
<div id = "header">
        <header> Marist College Lost and Found</header>
    </div>
    
    <div class="topnav">
  <a href="limbo-landing.php">Home</a>
  <a href="lost.php">Lost</a>
  <a href="found.php">Found</a>
  <a href="quicklinks.php">Quicklinks</a>
  </div>
	
   <h2>Update Items Here</h2>

<?php
# Connect to MySQL server and the database
require ( 'includes/connect_db.php' ) ;
# Includes these helper functions
require ( 'includes/helpers.php' ) ;
# Create a query to get the name and price sorted by price
	$query = 'SELECT id, item_name, status FROM stuff ORDER BY create_date ASC' ;
	# Execute the query
	$results = mysqli_query( $dbc, $query ) ;
	# Show results
	if ( $results )
	{
		echo '<H1 align="center">Lost and Found Items</H1>';
		echo '<TABLE align="center" width=50% cellpadding=5px cellspacing=5px border = "1">';
		echo '<TR>';
		echo '<TH>ID</TH>' ;
		echo '<TH>Item Name</TH>';
		echo '<TH>Status</TH>';
		echo '</TR>';
		
		# For each row result, generate a table row
		while ( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC ) )
		{
		 echo '<TR>' ;
		 echo '<TD>' . $row['id'] . '</TD>' ;
		 $alink = '<A HREF="quicklinks.php"' . $row['item_name'] . '>' . $row['item_name'] . '</A>' ;
		 echo '<TD align="right">' . $alink . '</TD>' ; 
		 echo '<TD align="right">' . $row['status'] . '</TD>' ;
		 echo '</TR>' ;
		}
		
		# End the table
		echo '</TABLE>';
		
		# Free up the results in memory
		mysqli_free_result( $results ) ;
	}
	else
	{
		# If we get here, something has gone wrong
		echo '<p>' . mysqli_error( $dbc ) . '</p>' ;
	}
	
#Change Item Status by the passed in Item ID number
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	   $id = $_POST['id'];
	   $item_name = $_POST['item_name'];
	   $description = $_POST['description'];
	   $location_id = $_POST['location_id'];
	   $owner = $_POST['owner'];
	   $finder = $_POST['finder'];
	   $status = $_POST['status'];
	
	   $updateItem = 'UPDATE stuff SET item_name = "'.$item_name.'", description = "'.$description.'", location_id = "'.$location_id.'", owner = "'.$owner.'", finder = "'.$finder.'", status = "'.$status.'" WHERE id = "'.$id.'"';
	
       $updateResult = mysqli_query($dbc, $updateItem);
	   check_results($updateResult);
    }
    
# Close the connection
mysqli_close( $dbc ) ;
?>    
     
    <form action="lost.php" method="POST" >
    <table>
    
        <tr><td>Enter the item ID here:</td><td><input type = "text" name = "id" value="<?php if (isset($_POST['id'])) echo $_POST['id'];?>"></td></tr><br>
        
		<tr><td>Enter the item name here:</td><td><input type = "text" name = "item_name" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name'];?>"></td></tr><br>
    
        <tr><td>Enter description here:</td><td><input type = "text" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description'];?>"></td></tr>
        
         <tr><td>Enter the owner name here:</td><td><input type = "text" name = "owner" value="<?php if (isset($_POST['owner'])) echo $_POST['owner'];?>"></td></tr><br>
		 
		 <tr><td>Enter the finder name here:</td><td><input type = "text" name = "finder" value="<?php if (isset($_POST['finder'])) echo $_POST['finder'];?>"></td></tr><br>
    
         <tr><td>Status:</td><td><select name="status">
				<option value="lost">Lost</option>
				<option value="found">Found</option>
			</select></td></tr>
        
        <tr><td>Location:</td><td><select name = "location_id" value="<?php if (isset($_POST['location_id'])) echo $_POST['location_id'];?>">
				        <option value="Hancock">Hancock</option>
				        <option value="Marian Hall">Marian Hall</option>
				        <option value="Byrne House">Byrne House</option>
				        <option value="Donnelly Hall">Donnelly Hall</option>
				        <option value="James A. Cannavino Library">James A. Cannavino Library</option>
				        <option value="Champagnat Hall">Champagnat Hall</option>
				        <option value="Our Lady Seat of Wisdom Chapel">Chapel</option>
				        <option value="Cornell Boat House">Cornell Boat House</option>
				        <option value="Margaret M. and Charles H. Dyson Center">Dyson</option>
				        <option value="Fern Tor">Fern Tor</option>
				        <option value="Fontaine Annex">Fontaine Annex</option>
				        <option value="Fontaine Hall">Fontaine Hall</option>
				        <option value="Foy Townhouses">Foy Townhouses</option>
				        <option value="Fulton Street Townhouses">Fulton Street Townhouses</option>
				        <option value="Lower Fulton Townhouses">Lower Fulton Townhouses</option>
				        <option value="Gartland Apartments">Gartland Apartments</option>
				        <option value="Greystone Hall">Greystone Hall</option>
				        <option value="Kieran Gatehouse">Kirk House</option>
				        <option value="Leo Hall">Leo Hall</option>
				        <option value="Longview Park">Longview Park</option>
				        <option value="Lowell Thomas Communications Center">Lowell Thomas</option>
				        <option value="Marist Boathouse">Marist Boathouse</option>
				        <option value="James J. McCann Recreational Center">McCann Center</option>
				        <option value="Mid-Rise Hall">Mid-Rise Hall</option>
				        <option value="St. Ann's Hermitage">St. Ann's Hermitage</option>
				        <option value="St. Peter's">St. Peter's</option>
				        <option value="Sheahan Hall">Sheahan Hall</option>
				        <option value="Steel Plant Art Studios and Gallery">Steel Plant</option>
				        <option value="Student Center/Rotunda">Student Center/Rotunda</option>
				        <option value="Tennis Pavillion">Tennis Pavillion</option>
				        <option value="Tenney Stadium">Tenney Stadium</option>
				        <option value="Lower Townhouses">Lower Townhouses</option>
				        <option value="Lower West Cedar Townhouses">Lower West Cedar Townhouses</option>
				        <option value="Upper West Cedar Townhouses">Upper West Cedar Townhouses</option>
				    </select></td></tr>
    
		
		
		 
		 <tr><td>Status:</td><td><select name="status">
				<option value="lost">Lost</option>
				<option value="found">Found</option>
			</select></td></tr>
			
        <tr><td colspan="2"><input id = "submitbtn" type = "submit" value="Submit"></td></tr>
    </table>
	</form>
</body>
</html>