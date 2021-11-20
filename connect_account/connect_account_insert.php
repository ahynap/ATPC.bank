<?php 

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    $errors = array();

    if (isset($_POST['connect_user'])) {

        /* Get Data */

        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
        $DepositorName = mysqli_real_escape_string($conn, $_POST['DepositorName']);
        $DepositorSurName = mysqli_real_escape_string($conn, $_POST['DepositorSurName']); 
        $BranchName = mysqli_real_escape_string($conn, $_POST['BranchName']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    
         /* Check Fill Required */

        if (empty($AccountNo)) {
            array_push($errors, "Account Number is required !");
            $_SESSION['error'] = "Account Number is required !";
        }

        if (empty($DepositorName)) {
            array_push($errors, "Depositor Name is required !");
            $_SESSION['error'] = "Depositor Name is required !";
        }

        if (empty($DepositorSurName)) {
            array_push($errors, "Depositor Surname is required !");
            $_SESSION['error'] = "Depositor Surname is required !";
        }
        if (empty($BranchName)) {
            array_push($errors, "Branch Name is required !");
            $_SESSION['error'] = "Branch Name is required !";
        }

        if (empty($Email)) {
            array_push($errors, "Email is required !");
            $_SESSION['error'] = "Email is required !";
        }

        /* Check Account Number */

        $check_query1 = "SELECT * FROM accountno WHERE AccountNo = '$AccountNo'";
        $query1 = mysqli_query($conn, $check_query1);
        $result1 = mysqli_fetch_assoc($query1);
       
            if ($result1['AccountNo'] == $AccountNo) {
                array_push($errors, "Account Number Duplicate !");
                $_SESSION['error'] = "Account Number Duplicate !";

                header("location: connect_account.php");    
            }
        

        /* Check Authentication */

        $check_query2 = "SELECT * FROM account WHERE Email = '$Email'";
        $query2 = mysqli_query($conn, $check_query2);
        $result2 = mysqli_fetch_assoc($query2);

            if ($result2['Email'] != $Email) {
                array_push($errors, "Email not exist");
                $_SESSION['error'] = "Email not exist";

                header("location: connect_account.php");
            }


        $check_query3 = "SELECT * FROM accountnoinfo WHERE AccountNo = '$AccountNo' AND Name = '$DepositorName' AND SurName = '$DepositorSurName' ";
        $query3 = mysqli_query($conn, $check_query3);
        $result3 = mysqli_fetch_assoc($query3);

            if ($result3['Name'] != $DepositorName OR $result3['SurName'] != $DepositorSurName) {
                array_push($errors, "Account Number not exist! OR Name / Surname not correct!");
                $_SESSION['error'] = "Account Number not exist! OR Name / Surname not correct!";
                header("location: connect_account.php");
            }

        /* Check Add 1st Money Account Should be Type Savings Only ! */

        $check_query4 = "SELECT * FROM accountnoinfo WHERE AccountNo = '$AccountNo'";
        $query4 = mysqli_query($conn, $check_query4);
        $result4 = mysqli_fetch_assoc($query4);

            if ($result4['AccountType'] != "Savings") {
                array_push($errors, "Your first account should be 'Savings'");
                $_SESSION['error'] = "Your first account should be 'Savings'";
                header("location: connect_account.php");
            }

        /* Connect Account (Add Money Account 1st time) */
                
        if (count($errors) == 0) {

        /* Specify Main Account */

             $result3 = "SELECT AccountNo FROM accountno
             JOIN account
             ON accountno.AccountID = account.AccountID
             WHERE account.Email = '$Email'";

             $getresult3 = mysqli_query($conn, $result3);
             $count = mysqli_num_rows($getresult3);
             echo $count;

             /* Case 1 : Connect 1st Money Account Number */

            if ($count == "0") {

                 $insert_moneyaccount = "
                 INSERT INTO accountno (AccountNo, BranchName, AccountID, MainAccount)
                 VALUES ('$AccountNo','$BranchName', (SELECT AccountID FROM account WHERE Email = '$Email'), 'Main Account');
            ";
            mysqli_query($conn, $insert_moneyaccount);
            $_SESSION['Email'] = $Email;
        
             /* Case 2 : Connect next Money Account Number */
        
            } else if ($count != "0")  {

                 $sql = "
                 INSERT INTO accountno (AccountNo, BranchName, AccountID, MainAccount)
                 VALUES ('$AccountNo','$BranchName', (SELECT AccountID FROM account WHERE Email = '$Email'), NULL);
            ";
                 mysqli_query($conn, $sql);

                 $_SESSION['Email'] = $Email;
            }

            header("location: ..\MainAccount\mainAccount.php"); 
            
        } else {

            header("location: connect_account.php");
        }
    }

?>