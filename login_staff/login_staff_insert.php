<?php 

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {

        /* Get Data */

        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

         /* Check Fill Required */

        if (empty($Email)) {
            array_push($errors, "Email is required !");
            $_SESSION['error'] = "Email is required !";
        }

        if (empty($Password)) {
            array_push($errors, "Password is required !");
            $_SESSION['error'] = "Password is required !";
        }

        /* Check Authentication */

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM staffaccount WHERE Email = '$Email' AND Password = '$Password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {

                $_SESSION['Email'] = $Email;
                header("location: ../mode_staff/mode_staff.php");
                
            } else {
                array_push($errors, "Wrong Email or Password");
                $_SESSION['error'] = "Wrong Email or Password!";
                header("location:  login_staff.php");
            }
            
        } else {
            array_push($errors, "Email & Password is required");
            $_SESSION['error'] = "Email & Password is required";
            header("location: login_staff.php");
        }
    }

?>