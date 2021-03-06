<?php 

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    $errors = array();

    if (isset($_POST['AccountNo'])) {

         /* Get Data */

    	$AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
    	$BankName = mysqli_real_escape_string($conn, $_POST['BankName']);
        $DestinationAccountNo = mysqli_real_escape_string($conn, $_POST['DestinationAccountNo']);
        $Amount = mysqli_real_escape_string($conn, $_POST['Amount']);

        /* Check Fill Required */

       if (empty($BankName)) {
            array_push($errors, "Bank Name is required !");
             $_SESSION['error'] = "Bank Name is required !";
        }

        if (empty($DestinationAccountNo)) {
            array_push($errors, "Destination Account Number is required !");
             $_SESSION['error'] = "Destination Account Number is required !";
        }

        if (empty($Amount)) {
            array_push($errors, "Please, Specify Amount of Money to Transfer !");
             $_SESSION['error'] = "Please, Specify Amount of Money to Transfer !";
        }
        
 	if (count($errors) == 0) {

          /* Destination Money Account Uses Money Account of ATPC Bank */

          if ($BankName == "ATPCBank") {

                /* Check Account Number is Exist, Or Not ? */

          		 $query = "SELECT * FROM accountnoinfo WHERE AccountNo = '$DestinationAccountNo'";
                 $result = mysqli_query($conn, $query);

                 /* Account Number Exist */

                 if (mysqli_num_rows($result) == 1) {

                    /* Transfer Transaction Happen --> Update Client NEW Balance */ 

                	 $updateResult = "UPDATE accountnoinfo SET Balance = Balance + $Amount WHERE AccountNo = '$DestinationAccountNo'";
                 	 mysqli_query($conn, $updateResult);

                	 $updateResult2 = "UPDATE accountnoinfo SET Balance = Balance - $Amount WHERE AccountNo = '$AccountNo'";
                	 mysqli_query($conn, $updateResult2);

                    /* Insert Transfer Transaction History */

                     $updateResult3 = "INSERT INTO transferhistory (AccountNo, BankName, DestinationAccountNo, Amount)
                     VALUES ('$AccountNo', '$BankName', '$DestinationAccountNo' ,'$Amount')";
                     mysqli_query($conn, $updateResult3);

                     $_SESSION['AccountNo'] = $AccountNo;
                     $_SESSION['DestinationAccountNo'] = $DestinationAccountNo;
                     $_SESSION['BankName'] = $BankName;
                     $_SESSION['Amount'] = $Amount;

                    header("location: ../recipe/recipe.php");
  
                 } else { 

                 	 array_push($errors, "Account Number 'NOT' Exist!");
               		 $_SESSION['error'] = "Account Number 'NOT' Exist!";

               		 header("location:  transfer.php");

                 }

          } 

          /* Destination Money Account 'NOT' Uses Money Account of ATPC Bank */

          else {

                 $updateResult4 = "UPDATE accountnoinfo SET Balance = Balance - $Amount WHERE AccountNo = '$AccountNo'";
               	 mysqli_query($conn, $updateResult4);


                $updateResult5 = "INSERT INTO transferhistory (AccountNo, BankName, DestinationAccountNo, Amount)
                 VALUES ('$AccountNo', '$BankName', '$DestinationAccountNo' ,'$Amount')";
                mysqli_query($conn, $updateResult5);

                $_SESSION['AccountNo'] = $AccountNo;
                $_SESSION['DestinationAccountNo'] = $DestinationAccountNo;
                $_SESSION['BankName'] = $BankName;
                $_SESSION['Amount'] = $Amount;

                header("location: ../recipe/recipe.php");
          }
     
        } else {
  
            header("location: transfer.php");
        }
    }

?>