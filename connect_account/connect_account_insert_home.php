<?php 
    session_start();
    include('..\server\server.php');

    $errors = array();

    if (isset($_POST['connect_user'])) {
        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
        $DepositorName = mysqli_real_escape_string($conn, $_POST['DepositorName']);
        $DepositorSurName = mysqli_real_escape_string($conn, $_POST['DepositorSurName']);
        $BranchName = mysqli_real_escape_string($conn, $_POST['BranchName']);
        $SerialNo = mysqli_real_escape_string($conn, $_POST['SerialNo']);
        $AccountType = mysqli_real_escape_string($conn, $_POST['AccountType']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    

        if (empty($AccountNo)) {
            array_push($errors, "Account Number is required");
            $_SESSION['error'] = "Account Number is required";
        }

        if (empty($DepositorName)) {
            array_push($errors, "Depositor Name is required");
            $_SESSION['error'] = "Depositor Name is required";
        }


        if (empty($DepositorSurName)) {
            array_push($errors, "Depositor Surname is required");
            $_SESSION['error'] = "Depositor Surname is required";
        }

        if (empty($BranchName)) {
            array_push($errors, "Branch Name is required");
            $_SESSION['error'] = "Branch Name is required";
        }

        if (empty($SerialNo)) {
            array_push($errors, "Serial Number is required");
            $_SESSION['error'] = "Serial Number is required";
        }

        if (empty($AccountType)) {
            array_push($errors, "Account Type is required");
            $_SESSION['error'] = "Account Type is required";
        }

        if (empty($Email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }


        /* Check Account Number */

         $user_check_query01 = "SELECT * FROM accountno WHERE AccountNo = '$AccountNo'";
        $query01 = mysqli_query($conn, $user_check_query01);
        $result01 = mysqli_fetch_assoc($query01);
       
            if ($result01['AccountNo'] == $AccountNo) {
                array_push($errors, "Account Number duplicate");
                $_SESSION['error'] = "Account Number duplicate";
                header("location: connect_account.php");    
        }
        

        /* Check Authentication */

        $user_check_query2 = "SELECT * FROM account WHERE Email = '$Email'";
        $query2 = mysqli_query($conn, $user_check_query2);
        $result2 = mysqli_fetch_assoc($query2);

            if ($result2['Email'] != $Email) {
                array_push($errors, "Email not exist");
                $_SESSION['error'] = "Email not exist";
                header("location: connect_account_home.php");
            }

       $user_check_query3 = "SELECT * FROM accountnoinfo WHERE AccountNo = '$AccountNo' AND Name = '$DepositorName' AND SurName = '$DepositorSurName' ";
        $query3 = mysqli_query($conn, $user_check_query3);
        $result3 = mysqli_fetch_assoc($query3);

            if ($result3['Name'] != $DepositorName OR $result3['SurName'] != $DepositorSurName) {
                array_push($errors, "Account Number not exist! OR Name / Surname not correct!");
                $_SESSION['error'] = "Account Number not exist! OR Name / Surname not correct!";
                header("location: connect_account.php");
            }



        /* Connect Account (Add Account) */
                
        if (count($errors) == 0) {

        /* Specify Main Account */

             $result3 = "SELECT AccountNo FROM accountno
             JOIN account
             ON accountno.AccountID = account.AccountID
             WHERE account.Email = '$Email'";

             $getresult3 = mysqli_query($conn, $result3);
             $count = mysqli_num_rows($getresult3);
             echo $count;


             if ($count == "0") {

                 $sql = "
                 INSERT INTO accountno (AccountNo, BranchName, SerialNo, AccountType, AccountID, MainAccount)
                 VALUES ('$AccountNo','$BranchName','$SerialNo','$AccountType', (SELECT AccountID FROM account WHERE Email = '$Email'), 'Main Account');
            ";
            mysqli_query($conn, $sql);
            $_SESSION['Email'] = $Email;
        
        
            } else if ($count != "0")  {

                 $sql = "
                 INSERT INTO accountno (AccountNo, BranchName, SerialNo, AccountType, AccountID, MainAccount)
                 VALUES ('$AccountNo','$BranchName','$SerialNo','$AccountType', (SELECT AccountID FROM account WHERE Email = '$Email'), NULL);
            ";
                 mysqli_query($conn, $sql);
                 $_SESSION['Email'] = $Email;
            }

            header("location: ..\MainAccount\mainAccount.php"); 
            
        } else {
            header("location: connect_account_home.php");
        }
    }

?>