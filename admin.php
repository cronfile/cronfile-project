<!DOCTYPE html>
<html>
    <head>
        <title>Marist College Lost and Found Admin </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/admin.css" type="text/css" rel="stylesheet"/>
    </head>
    
<body>
    <div id = "header">
        <header> Marist College Lost and Found Admin</header>
    </div>
    
   <div class="topnav">
  <a href="limbo-landing.php">Home</a>
  <a href="lost.php">Lost</a>
  <a href="found.php">Found</a>
  <a href="quicklinks.php">Quicklinks</a>
  </div>
       <div id = "message">
        <div id = "messageT1"> Administrators Control Panel </div>
        <div id = "messageT2"> Select what you would like to use your admin powers for!</div>
        <br>
    </div>
    
    <ul>
       <li><a href="adminAddAdmin.php">Add an Admin</a></li>
       <li><a href="adminDeleteAdmin.php">Delete an Admin</a></li>
       <li><a href="adminEditItems.php">Delete Item/Change Item Status</a></li>
       <li><a href="adminUpdate.php">Update Admin Profile</a></li>
       <li><a href="adminChangePassword.php">Change Admin Password</a></li>
   </ul>
    
    
    
    
    <?php
    # Connect to MySQL server and the database
    require( 'includes/connect_db.php' ) ;
    require( 'includes/helpers.php' ) ;
	
    show_link_records($dbc);
    echo '<br>';
    require('adminShowUsers.php');
	
	# Close the connection
	mysqli_close( $dbc ) ;
    
    ?>
    
</body>
</html>