<?php

    $user_servername = "localhost" ; 
    $username = "root" ; 
    $password = "" ; 
    $dbname = "audio_shop" ; 

    // Create Connection
    $conn = mysqli_connect($user_servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 

?>