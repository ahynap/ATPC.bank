<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "atpc";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_query($conn, 'SET CHARACTER SET UTF8');

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 

?>