<?php 

     /* Connect Database */

    session_start();
    include('..\server\server.php');

    $errors = array();

    if (isset($_POST['reg_user'])) {

         /* Get Data */

        $StaffID = mysqli_real_escape_string($conn, $_POST['StaffID']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);
        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $SurName = mysqli_real_escape_string($conn, $_POST['SurName']);
    
        /* Check Fill Required */

        if (empty($StaffID)) {
            array_push($errors, "Staff ID is required !");
            $_SESSION['error'] = "Staff ID is required !";
        }

        if (empty($Email)) {
            array_push($errors, "Email is required !");
            $_SESSION['error'] = "Email is required !";
        }

        if (empty($Password)) {
            array_push($errors, "Password is required !");
            $_SESSION['error'] = "Password is required !";
        }

        if (empty($Name)) {
            array_push($errors, "Name is required !");
            $_SESSION['error'] = "Name is required !";
        }

        if (empty($SurName)) {
            array_push($errors, "SurName is required !");
            $_SESSION['error'] = "SurName is required !";
        }

        /* Check Email Usage */

        $check_query = "SELECT * FROM staffaccount WHERE Email = '$Email' LIMIT 1";
        $query = mysqli_query($conn, $check_query);
        $result = mysqli_fetch_assoc($query);

            /* Check If Email Already Exist */

            if ($result['Email'] == $Email) {
                array_push($errors, "Email already exists !");
                $_SESSION['error'] = "Email already exists !";

                header("location: regis_staff.php");
            }

        /* Check Authentication Staff */
   
        $check_staff = "SELECT * FROM staffinfo WHERE StaffID = '$StaffID' AND Name = '$Name' AND SurName = '$SurName'";
        $query2 = mysqli_query($conn, $check_staff);
        $result2 = mysqli_fetch_assoc($query2);

            if ($result2['StaffID'] != $StaffID OR $result2['Name'] != $Name OR $result2['SurName'] != $SurName) {
                array_push($errors, "Staff ID Number not exist ! OR Name / Surname not correct!");
                $_SESSION['error'] = "Staff ID Number not exist ! OR Name / Surname not correct!";

                header("location: regis_staff.php");
            }
      
        /* Insert Staff Account */
        
        if (count($errors) == 0) {
            
            $insert_account = "
            INSERT INTO staffaccount (Name,SurName,Email,Password,StaffID)
            VALUES ('$Name','$SurName','$Email','$Password','$StaffID');
            ";
            mysqli_query($conn, $insert_account);

            $_SESSION['Email'] = $Email;
            
            header('location: ../login_staff/login_staff.php');

        } else {

            header("location: regis_staff.php");
        }
    }

?>