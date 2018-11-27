<?php
# Includes these helper functions
require( 'includes/helpers.php' ) ;


# Validates the username and password
#returns true if user input is valid

function validate($username = '', $password = '') {
    global $dbc;
    
    if(empty($username))
      return false ;
    
    if(empty($password))
      return false ;
    
    $invalidChars = array ("-", ";","/","*","!");
    $safeInput = true;
    
    foreach ( $invalidChars as $value) {
        if( strpos( $username , $value) )
            $safeInput = false;
    }
    
    foreach ( $invalidChars as $value) {
        if( strpos( $password , $value) )
            $safeInput = false;
    }
    
    # Make the query
    $query = "SELECT email, pass FROM users WHERE email='" . $username . "' AND pass='".$password."' " ;
    
    # Execute the query
    if ($safeInput) {
        $results = mysqli_query( $dbc, $query ) ;
        check_results($results);
    
        # If we get no rows, the login failed
        if (mysqli_num_rows( $results ) > 0 )
        return true ;
        else {
            return false ;
        }
    } 
}
?>