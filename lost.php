<!DOCTYPE html>
<html>
    <head>
        <title>Lost Items </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
         <link href="css/lost.css" type="text/css" rel="stylesheet"/>
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
	
    
    <h2><center><font size=24>Lost Something?</font></center></h2>
    <h3>Create a new request for your lost item, or check database for found items.</h3>

         
    <form action="lost.php" method="POST" >
    <table>
    
        <tr><td>Enter your name:</td><td><input type = "text" placeholder=" Your name" name = "owner" value="<?php if (isset($_POST['owner'])) echo $_POST['owner'];?>"></td></tr><br>
    
        <tr><td>Enter the item:</td><td><input type = "text" placeholder=" Item name" name = "item_name" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name'];?>"></td></tr><br>
    
        <tr><td>Enter description:</td><td><input type = "text" placeholder="Description" name="description" value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name'];?>"></td></tr>
    
        <tr><td>Date item was lost:</td><td><input type="datetime-local" placeholder="Month/Day/Year" name="create_date" value="<?php if (isset($_POST['create_date'])) echo $_POST['create_date'];?>"></td></tr>
        
        <tr><td>Location:</td><td><select name = "location_id" value="<?php if (isset($_POST['location_id'])) echo $_POST['location_id'];?>">
				        <option value="Hancock">Hancock</option>
				        <option value="Marian Hall">Marian Hall</option>
				        <option value="Byrne House">Byrne House</option>
				        <option value="Donnelly Hall">Donnelly Hall</option>
				        <option value="James A. Cannavino Library">James Cannavino Library</option>
				        <option value="Champagnat Hall">Champagnat Hall</option>
				        <option value="Our Lady Seat of Wisdom Chapel">Our Lady Seat of Wisdom Chapel</option>
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
    
        
		
        <tr><td colspan="2"><input id = "submitbtn" type = "submit" value="Submit Lost Item"></td></tr>

    </table>
	</form>
    
<?php
# Connect to MySQL server and the database
require ( 'includes/connect_db.php' ) ;
# Includes these helper functions
require ( 'includes/helpers.php' ) ;
if ($_SERVER [ 'REQUEST_METHOD' ] == 'POST' ){
	
	$owner = $_POST['owner'] ;
	
	$item_name = $_POST['item_name'] ;
	
	$description = $_POST['description'] ;
	
	$location_id = $_POST['location_id'] ;
	
	$create_date = $_POST['create_date'] ;
	
	
	if ( !valid_item_name($item_name) )
		echo '<p style="color:red; font-size:16px;"> Invalid ID </p>' ;
	else if ( !valid_owner($owner) )
		echo '<p style="color:red; font-size:16px;"> Invalid name </p>' ;
	else
		insert_lost_record($dbc, $owner, $item_name, $description, $location_id, $create_date);
}
# Show the records
show_lost_record($dbc);
# Close the connection
mysqli_close( $dbc ) ;
?>    

</body>
</html>