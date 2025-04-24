<?php
function connectToDatabase()
{
    
    // Connect to database
    $mysqli = new mysqli("localhost","2332364","Millymay2005","db2332364");
    
    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }

    return $mysqli;

}

?>