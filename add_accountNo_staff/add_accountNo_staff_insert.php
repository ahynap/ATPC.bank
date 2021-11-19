<?php 

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    $errors = array();

    $Email = $_SESSION['Email'];

    if (isset($_POST['add_account'])) {
	
        /* Get Data */

        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $SurName = mysqli_real_escape_string($conn, $_POST['SurName']);
        $BankName = mysqli_real_escape_string($conn, $_POST['BankName']);
        $Balance = mysqli_real_escape_string($conn, $_POST['Balance']);
        $AccountType = mysqli_real_escape_string($conn, $_POST['AccountType']);


         /* Check Fill Required */

        if (empty($AccountNo)) {
            array_push($errors, "Account Number is required");
            $_SESSION['error'] = "Account Number is required";
        }

        if (empty($Name)) {
            array_push($errors, "Depositor Name is required");
            $_SESSION['error'] = "Depositor Name is required";
        }

        if (empty($SurName)) {
            array_push($errors, "Depositor Surname is required");
            $_SESSION['error'] = "Depositor Surname is required";
        }

        if (empty($BankName)) {
            array_push($errors, "Bank Name is required");
            $_SESSION['error'] = "Bank Name is required";
        }

        if (empty($Balance)) {
            array_push($errors, "Balance is required");
            $_SESSION['error'] = "Balance is required";
        }

        if (empty($AccountType)) {
            array_push($errors, "Account type is required");
            $_SESSION['error'] = "Account type is required";
        }


        /* Check Account Number */

        $user_check_query01 = "SELECT * FROM accountnoinfo WHERE AccountNo = '$AccountNo'";
        $query01 = mysqli_query($conn, $user_check_query01);
        $result01 = mysqli_fetch_assoc($query01);
       
            if ($result01['AccountNo'] == $AccountNo) {
                array_push($errors, "Account Number duplicate");
                $_SESSION['error'] = "Account Number duplicate";
                header("location: add_accountNo_staff.php");    
        }

	     /* Insert Client Money Account */
    
            if (count($errors) == 0)  {
                 $sql = "
                 INSERT INTO accountnoinfo (AccountNo,Name,SurName,BankName,Balance,AccountType)
                 VALUES ('$AccountNo','$Name','$SurName','$BankName','$Balance','$AccountType');
            ";
                 mysqli_query($conn, $sql);

                 $Email = $_SESSION['Email'];
                 
                 header("location: ..\mode_staff\mode_staff.php"); 
            
        } else {

            header("location: add_accountNo_staff.php");
        }
    }

?>
