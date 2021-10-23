<?php 
    session_start();
    include('..\server\server.php');

    $errors = array();


    if (isset($_POST['AccountNo'])) {
    	$AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
    	$BankName = mysqli_real_escape_string($conn, $_POST['BankName']);
        $DestinationAccountNo = mysqli_real_escape_string($conn, $_POST['DestinationAccountNo']);
        $Amount = mysqli_real_escape_string($conn, $_POST['Amount']);


        if (empty($BankName)) {
            array_push($errors, "Bank is required");
             $_SESSION['error'] = "Bank is required";
        }


        if (empty($DestinationAccountNo)) {
            array_push($errors, "Destination Account Number is required");
             $_SESSION['error'] = "Destination Account Number is required";
        }

        if (empty($Amount)) {
            array_push($errors, "Please! Specify Amount of Aoney to Transfer");
             $_SESSION['error'] = "Please! Specify Amount of Aoney to Transfer";
        }
    	
 	if (count($errors) == 0) {

          if ($BankName == "ATPCBank") {

          		 $query = "SELECT * FROM accountnoinfo WHERE AccountNo = '$DestinationAccountNo'";
                 $result = mysqli_query($conn, $query);

                 if (mysqli_num_rows($result) == 1) {

                	 $updateResult = "UPDATE accountnoinfo SET Balance = Balance + $Amount WHERE AccountNo = '$DestinationAccountNo'";
                 	 mysqli_query($conn, $updateResult);

                	 $updateResult2 = "UPDATE accountnoinfo SET Balance = Balance - $Amount WHERE AccountNo = '$AccountNo'";
                	 mysqli_query($conn, $updateResult2);

                     $updateResult3 = "INSERT INTO transferhistory (AccountNo, BankName, DestinationAccountNo, Amount)
                 VALUES ('$AccountNo', '$BankName', '$DestinationAccountNo' ,'$Amount')";
                     mysqli_query($conn, $updateResult3);
  
                 } else { 

                 	 array_push($errors, "Account Number 'NOT' Exist!");
               		 $_SESSION['error'] = "Account Number 'NOT' Exist!";
               		 header("location:  transfer.php");

                 }

          } else {

                 $updateResult4 = "UPDATE accountnoinfo SET Balance = Balance - $Amount WHERE AccountNo = '$AccountNo'";
               	 mysqli_query($conn, $updateResult4);


                $updateResult5 = "INSERT INTO transferhistory (AccountNo, BankName, DestinationAccountNo, Amount)
                 VALUES ('$AccountNo', '$BankName', '$DestinationAccountNo' ,'$Amount')";
                mysqli_query($conn, $updateResult5);
          }
     
        } else {
  
            header("location: transfer.php");
        }
    }

?>