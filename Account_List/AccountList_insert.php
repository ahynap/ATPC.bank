<?php 

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    $errors = array();

     /* Use AccountNo Session to Access Data from Database */

    if (isset($_POST['AccountNo'])) {
        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
    	$_SESSION['AccountNo'] = $AccountNo;

        header("location: ..\AccountDetail\AccountDetail.php");

    }

 ?>