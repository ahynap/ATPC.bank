<?php 
	
   /* Connect Database */ 

    session_start();
    include('..\server\server.php');

    $errors = array();

    if (isset($_POST['AccountNo'])) {

        /* Get Data */

        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
    	$_SESSION['AccountNo'] = $AccountNo;

        header("location: ../transfer/transfer2.php");

    }

 ?>