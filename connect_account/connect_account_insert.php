<?php 
    session_start();
    include('..\server\server.php');

    $errors = array();

    if (isset($_POST['connect_user'])) {
        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);
        $DepositorName = mysqli_real_escape_string($conn, $_POST['DepositorName']);
        $BranchName = mysqli_real_escape_string($conn, $_POST['BranchName']);
        $SerialNo = mysqli_real_escape_string($conn, $_POST['SerialNo']);
        $AccountType = mysqli_real_escape_string($conn, $_POST['AccountType']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        if (empty($AccountNo)) {
            array_push($errors, "AccountNo is required");
            $_SESSION['error'] = "AccountNo is required";
        }

        if (empty($DepositorName)) {
            array_push($errors, "DepositorName is required");
            $_SESSION['error'] = "DepositorName is required";
        }

        if (empty($BranchName)) {
            array_push($errors, "BranchName is required");
            $_SESSION['error'] = "BranchName is required";
        }

        if (empty($SerialNo)) {
            array_push($errors, "SerialNumber is required");
            $_SESSION['error'] = "SerialNumber is required";
        }

        if (empty($AccountType)) {
            array_push($errors, "AccountType is required");
            $_SESSION['error'] = "AccountType is required";
        }

        if (empty($Email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }

        if (empty($Password)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }


        /* Check Account Number */

        $user_check_query = "SELECT * FROM accountnoinfo WHERE AccountNo = '$AccountNo'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        $user_check_query01 = "SELECT * FROM accountno WHERE AccountNo = '$AccountNo'";
        $query01 = mysqli_query($conn, $user_check_query01);
        $result01 = mysqli_fetch_assoc($query01);
       
            if ($result['AccountNo'] != $AccountNo OR $result01['AccountNo'] == $AccountNo) {
                array_push($errors, "Account Number not exist OR Account Number duplicate");
                $_SESSION['error'] = "Account Number not exist OR Account Number duplicate";
                header("location: connect_account.php");    
        }
        

        /* Check Authentication */

        $user_check_query2 = "SELECT * FROM account WHERE Email = '$Email' AND Password = '$Password'";
        $query2 = mysqli_query($conn, $user_check_query2);
        $result2 = mysqli_fetch_assoc($query2);

            if ($result2['Email'] != $Email OR $result2['Password'] != $Password) {
                array_push($errors, "Email OR Password not exist");
                $_SESSION['error'] = "Email OR Password not exist";
                header("location: connect_account.php");
            }


        /* Connect Account (Add Account) */
                
        if (count($errors) == 0) {
            
            $sql = "
            INSERT INTO accountno (AccountNo, DepositorName, BranchName, SerialNo, AccountType, AccountID)
            VALUES ('$AccountNo','$DepositorName','$BranchName','$SerialNo','$AccountType', (SELECT AccountID FROM account WHERE Password = '$Password'));
            ";
            mysqli_query($conn, $sql);

             header('location: connect_succes.php');
        } else {
            header("location: connect_account.php");
        }
    }

?>