<?php 

     /* Connect Database */

    include('..\server\server.php');

    session_start();
    $errors = array();

    if (isset($_POST['reg_user'])) {

        /* Get Data */

        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $SurName = mysqli_real_escape_string($conn, $_POST['SurName']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);
        $Phone = mysqli_real_escape_string($conn, $_POST['Phone']);

        /* Check Fill Required */

        if (empty($Name)) {
            array_push($errors, "Name is required !");
            $_SESSION['error'] = "Name is required !";
        }

        if (empty($SurName)) {
            array_push($errors, "Surname is required !");
            $_SESSION['error'] = "Surname is required !";
        }

        if (empty($Email)) {
            array_push($errors, "Email is required !");
            $_SESSION['error'] = "Email is required !";
        }

        if (empty($Password)) {
            array_push($errors, "Password is required !");
            $_SESSION['error'] = "Password is required !";
        }

        if (empty($Phone)) {
            array_push($errors, "Phone is required !");
            $_SESSION['error'] = "Phone is required !";
        }

        /* Check Email Usage */
    
        $check_query = "SELECT * FROM account WHERE Email = '$Email' LIMIT 1";
        $query = mysqli_query($conn, $check_query);
        $result = mysqli_fetch_assoc($query);

            /* Check If Email Already Exist */

                if ($result['Email'] == $Email) {
                    array_push($errors, "Email already exists !");
                    $_SESSION['error'] = "Email already exists !";
             
                    header("location: regis_client.php");
                }
          
        /* Insert Client Account */

         if (count($errors) == 0) {

            $insert_account = "
            INSERT INTO account (Name, SurName, Email, Password, Phone)
            VALUES ('$Name','$SurName','$Email','$Password','$Phone');
            ";
            mysqli_query($conn, $insert_account);
            
            header('location: ..\login_client\login_client.php');
            
            } else {

            header("location: regis_client.php");
        }
     }

?>