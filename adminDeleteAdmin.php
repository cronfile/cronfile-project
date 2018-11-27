<!DOCTYPE html>
<html>
    <head>
        <title>Lost and Found Admin </title>
        <link href="css/main.css" type="text/css" rel="stylesheet"/>
        <link href="css/admin.css" type="text/css" rel="stylesheet"/>
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
    
    <div id = "message">
        <div id = "messageT1"> Administrators </div>
        <div id = "messageT2"> Delete an Admin from the Admin Username.</div>
        <br>
    </div>
    
    <?php
    require ( 'includes/connect_db.php' ) ;
    require ( 'includes/helpers.php' ) ;
    require( 'adminShowUsers.php' ) ;
    
    #Deletes an Admin from the passed in form
    if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
        
        $emailDelete = $_POST['delAdmin'] ;
        
	    $queryDeleteAdmin = 'DELETE FROM users WHERE email = "'.$emailDelete.'"';

        $resultsDeleteAdmin = mysqli_query($dbc,$queryDeleteAdmin) ;
        check_results($resultsDeleteAdmin) ;
    }
    ?>
    
    <form action="adminDeleteAdmin.php" method="POST" >
    <table align="center">
        <tr> 
            <td width="20">Email:</td>
            <td><input type="text" id="delAdmin" name="delAdmin"></td>
            <td></td>
            <td colspan="2"><input id = "submitbtn" type = "submit" value="Submit"></td>
        </tr>
        
    </table>
    
</body>
</html>