<?php 

     /* Connect Database */ 

    session_start();
    include('..\server\server.php');

    $errors = array();

    $Email = $_SESSION['Email'];

    if (isset($_POST['user_detail'])) {

        /* Get Data */

        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $SurName = mysqli_real_escape_string($conn, $_POST['SurName']);

        /* Check Fill Required */

        if (empty($Name)) {
            array_push($errors, "Name is required !");
             $_SESSION['error'] = "Name is required !";
        }

        if (empty($SurName)) {
            array_push($errors, "Surname is required !");
             $_SESSION['error'] = "Surname is required !";
        }

        /* Update Profile */

        if (count($errors) == 0) {

          $updateResult = "UPDATE account SET Name = '$Name' WHERE Email = '$Email'";
          mysqli_query($conn, $updateResult);

          $updateResult2 = "UPDATE account SET SurName = '$SurName' WHERE Email = '$Email'";
          mysqli_query($conn, $updateResult2);

          header("location: success.php");
  
        } else {
  
            header("location: user_detail.php");
        }
    }

?>