<?php 
    session_start();
    include('..\server\server.php');

    $errors = array();


    if (isset($_POST['AccountNo'])) {
        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
    	$_SESSION['AccountNo'] = $AccountNo;

        header("location: ..\AccountDetail\AccountDetail.php");

    }

 ?>