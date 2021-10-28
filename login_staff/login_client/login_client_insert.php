<?php 
    session_start();
    include('..\server\server.php');

    $errors = array();


    if (isset($_POST['login_user'])) {
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        if (empty($Email)) {
            array_push($errors, "Email is required");
        }

        if (empty($Password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM account WHERE Email = '$Email' AND Password = '$Password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {

             $result = "SELECT AccountNo FROM accountno
             JOIN account
             ON accountno.AccountID = account.AccountID
             WHERE account.Email = '$Email'";

             $getresult = mysqli_query($conn, $result);
             $count = mysqli_num_rows($getresult);
            
            $_SESSION['Email'] = $Email;
             if($count == "0"){
                
                 header("location: ..\connect_account\connect_account.php");
           
             }else if($count != "0"){
                
                 header("location: ..\MainAccount\mainAccount.php");
             }

            } else {
                array_push($errors, "Wrong Email or Password");
                $_SESSION['error'] = "Wrong Email or Password! ";
                header("location:  login_client.php");
            }
        } else {
            array_push($errors, "Email & Password is required");
            $_SESSION['error'] = "Email & Password is required";
            header("location: login_client.php");
        }
    }

?>