<?php

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    if(isset($_POST['Password']) && $_POST['Token'] && $_POST['Email'])
    {

      /* Get Data */

      $Email = $_POST['Email'];
      $Token = $_POST['Token'];
      $Password = $_POST['Password'];
      $Cpassword = $_POST['cPassword'];

      /* Password Match */

      if($Password == $Cpassword)
      {

        $query = mysqli_query($conn,"SELECT * FROM account WHERE Token = '$Token' and Email ='$Email'");

        $getresult = mysqli_num_rows($query);

        /* Verify Identity Valid */

        if($getresult){

          /* Update NEW Password */

          mysqli_query($conn,"UPDATE account set Password ='$Password', Token = NULL WHERE Email = '$Email'");

          header("location: login_client.php");

          } 

          /* Verify Identity Invalid */

          else {
         
          echo "<p>Something Wrong ! , Please Try Again</p>";

          header("location: reset_password.php");
       }

     } 

     /* Password NOT Match */

     else {

        echo "<p>Password NOT Match, Please Click Link to Reset Password in Your Email Again</p>";

     }
   } 

  ?>