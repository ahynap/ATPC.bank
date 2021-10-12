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
        $accountID = mysqli_real_escape_string($conn, $_POST['accountID']);

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
         if (empty($accountID)) {
            array_push($errors, "accountID is required");
            $_SESSION['error'] = "accountID is required";
        }
        $user_check_query = "SELECT * FROM accountno WHERE accountID = '$accountID' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['accountID'] == $accountID) {
                array_push($errors, "Password is required");
                $_SESSION['error'] = "Password is required";
                header("location: connect_account.php");
            }
        }
        
        if (count($errors) == 0) {
            {
            $sql = "
            INSERT INTO accountno (AccountNo,DepositorName,BranchName,SerialNo,AccountType,accountID)
            VALUES ('$AccountNo','$DepositorName','$BranchName','$SerialNo','$AccountType','$accountID');
            ";
            mysqli_query($conn, $sql);

            }

            $_SESSION['accountID'] = $accountID;
            $_SESSION['success'] = "You are now logged in";
            
            header('location: connect_succes.php');
        } else {
            header("location: connect_account.php");
        }
    }

?>