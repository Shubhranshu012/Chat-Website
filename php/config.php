<?php
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $conn = mysqli_connect("localhost","root","","chat");

    // Check for connection success or not
    if(!$conn){
        echo ("connection to this database failed due to" . mysqli_connect_error());
    }
?>