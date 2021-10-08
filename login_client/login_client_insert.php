<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        if (empty($UserName)) {
            array_push($errors, "Email is required");
        }

        if (empty($Password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM account WHERE UserName = '$UserName' AND Password = '$Password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['UserName'] = $UserName;
                $_SESSION['success'] = "Your are now logged in";
                header("location: login_succes.php");
            } else {
                array_push($errors, "Wrong Email or Password");
                $_SESSION['error'] = "Wrong Email or Password!";
                header("location:  login_client.php");
            }
        } else {
            array_push($errors, "Email & Password is required");
            $_SESSION['error'] = "Email & Password is required";
            header("location: login_client.php");
        }
    }

?>