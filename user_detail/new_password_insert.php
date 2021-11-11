<?php 

     /* Connect Database */ 

    session_start();
    include('..\server\server.php');

    $errors = array();

    $Email = $_SESSION['Email'];

    if (isset($_POST['new_password'])) {

          /* Get Data */

          $Password = mysqli_real_escape_string($conn, $_POST['Password']);

          /* Check Fill Required */

          if (empty($Password)) {
            array_push($errors, "New password is required");
             $_SESSION['error'] = "New password is required";
        }

        /* Update NEW Password */

    if (count($errors) == 0) {

          $updateResult = "UPDATE account SET Password = '$Password' WHERE Email = '$Email'";
          mysqli_query($conn, $updateResult);

          header("location: success.php");
  
        } else {
  
            header("location: new_password.php");
        }
    }

?>