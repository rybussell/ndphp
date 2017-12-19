<?php

    $dbhost = "localhost";   //set MySQL host here, USUALLY localhost
    $dbuser = "";            //username with permissions to the database
    $dbpass = "";            //password for user with permissions to db
    $dbname = "";            //name of the database that will store the data
    
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname); //assuming default mysqli port.. If you use a different port, I expect you know how to modify this line..
    
    //We're gonna check if the database connects or not.. I comment this out when I verify the connection but that's up to you
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    
    
    
    ?>
