<?php 
    session_start();
    include('..\server\server.php');

    $errors = array();

    $Email = $_SESSION['Email'];

    if (isset($_POST['AccountNo'])) {
        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
    	$_SESSION['AccountNo'] = $AccountNo;
 	
 	 header("location: ..\history\history.php");

    }

 ?>