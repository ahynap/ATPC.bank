<?php 

    /* Connect Database */ 

    session_start();
    include('..\server\server.php');

    $errors = array();

    $Email = $_SESSION['Email'];

    if (isset($_POST['old_password'])) {

         /* Get Data */

        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        /* Check Fill Required */

        if (empty($Password)) {
            array_push($errors, "Old password is required");
             $_SESSION['error'] = "Old password is required";
        }

        /* Authentication Old Password --> If Valid, Client Can Change Password */

     if (count($errors) == 0) {
           
            $query = "SELECT * FROM account WHERE Email = '$Email' AND Password = '$Password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
        
            header("location: new_password.php");
  
        } else {

             array_push($errors, "Old password not Correct!");
             $_SESSION['error'] = "Old password not Correct!";
             header("location: old_password.php");
        }
    }
}


?>