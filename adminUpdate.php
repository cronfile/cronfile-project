<!DOCTYPE html>
<html>
    <head>
        <title>Marist College Lost and Found Admin </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/quicklinks.css" type="text/css" rel="stylesheet"/>
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
        <div id = "messageT1" align= "center" > Admin Controls </div>
        <div id = "messageT2" align= "center" > Update Admin Profile Here </div>
    </div>
    
    <?php
    # Connect to MySQL server and the database
    require( 'includes/connect_db.php' ) ;
    require( 'includes/helpers.php' ) ;
    require( 'adminShowUsers.php' ) ;
    
    #Updates Admins Profile
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        $oldEmail = $_POST['user'] ;
        $newFirst_name = $_POST['UpdateFirst_name'] ;
        $newLast_name = $_POST['UpdateLast_name'] ;
        $newEmail = $_POST['UpdateEmail'] ;

	   $query='UPDATE users SET first_name = "'.$newFirst_name.'", last_name = "'.$newLast_name.'", email = "'.$newEmail.'" WHERE email = "'.$oldEmail.'"' ;

    $results = mysqli_query($dbc,$query) ;
    check_results($results) ;
    }
    
    # Close the connection
	mysqli_close( $dbc ) ;
	
?>  
    
    <form action="adminUpdate.php" method="POST">
    <table align="center">
        <tr><td>Email/Username</td><td><input type="text" name="user"></td></tr>
        <tr><td>NEW First Name:</td><td><input type="text" name="UpdateFirst_name"></td></tr>
        <tr><td>NEW Last Name:</td><td><input type="text" name="UpdateLast_name"></td></tr>
        <tr><td>NEW Email:</td><td><input type="text" name="UpdateEmail"></td></tr>
        <tr><td colspan="2"><input type="submit" id="submitbtn" ></td></tr>
    </table>
    </form>   
    
</body>
</html>
