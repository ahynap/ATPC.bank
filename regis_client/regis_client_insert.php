<?php 
    include('..\server\server.php');

    session_start();
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $SurName = mysqli_real_escape_string($conn, $_POST['SurName']);
        $Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        if (empty($Name)) {
            array_push($errors, "name is required");
            $_SESSION['error'] = "name is required";
        }
        if (empty($SurName)) {
            array_push($errors, "surname is required");
            $_SESSION['error'] = "surname is required";
        }
        if (empty($Email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($Password)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if (empty($Phone)) {
            array_push($errors, "phone is required");
            $_SESSION['error'] = "phone is required";
        }
    
        $user_check_query = "SELECT * FROM account WHERE Email = '$Email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

         if ($result) { 
            if ($result['Email'] == $Email) {
                array_push($errors, "Email already exists");
                $_SESSION['error'] = "Email already exists";
                header("location: regis_client.php");
            }
        }
            
         if (count($errors) == 0) {
            $sql = "
            INSERT INTO account (Name, SurName, Email, Password, Phone)
            VALUES ('$Name','$SurName','$Email','$Password','$Phone');
            ";
            mysqli_query($conn, $sql);
            
            header('location: ..\login_client\login_client.php');
            
            }else {
            header("location: regis_client.php");
        }
     }

?>