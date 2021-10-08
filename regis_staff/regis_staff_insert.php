<?php 
    session_start();
    include('..\server\server.php');

    $errors = array();

    if (isset($_POST['reg_user'])) {
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);
        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $SurName = mysqli_real_escape_string($conn, $_POST['SurName']);
        $StaffPin = mysqli_real_escape_string($conn, $_POST['StaffPin']);
        $StaffID = mysqli_real_escape_string($conn, $_POST['StaffID']);

        if (empty($Email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }

        if (empty($Password)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }

        if (empty($Name)) {
            array_push($errors, "Name is required");
            $_SESSION['error'] = "Name is required";
        }

        if (empty($SurName)) {
            array_push($errors, "SurName is required");
            $_SESSION['error'] = "SurName is required";
        }

        if (empty($StaffPin)) {
            array_push($errors, "StaffPin is required");
            $_SESSION['error'] = "StaffPin is required";
        }
        if (empty($StaffID)) {
            array_push($errors, "StaffID is required");
            $_SESSION['error'] = "StaffID is required";
        }
        $user_check_query = "SELECT * FROM staffaccount WHERE Email = '$Email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['Email'] == $Email) {
                array_push($errors, "Email already exists");
                $_SESSION['error'] = "Email already exists";
                header("location: regis_staff.php");
            }
        }
        
        if (count($errors) == 0) {
            {
            $sql = "
            INSERT INTO staffaccount (Name,Surname,StaffPin,Email,Password,StaffID)
            VALUES ('$Name','$Surname','$StaffPin','$Email','$Password','$StaffID');
            ";
            mysqli_query($conn, $sql);

            }

            $_SESSION['Email'] = $Email;
            $_SESSION['success'] = "You are now logged in";
            
            header('location: regis_succes.php');
        } else {
            header("location: regis_staff.php");
        }
    }

?>