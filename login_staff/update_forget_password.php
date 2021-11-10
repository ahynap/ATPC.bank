<?php
     session_start();
    include('..\server\server.php');


    if(isset($_POST['Password']) && $_POST['Token'] && $_POST['Email'])
    {

      $emailId = $_POST['Email'];
      $token = $_POST['Token'];
      $password = $_POST['Password'];
      $cpassword = $_POST['cPassword'];

      if($password == $cpassword)
      {

        $query = mysqli_query($conn,"SELECT * FROM staffaccount WHERE Token = '$token' and Email ='$emailId'");

        $row = mysqli_num_rows($query);

        if($row){
         mysqli_query($conn,"UPDATE staffaccount set Password ='$password', Token = NULL WHERE Email = '$emailId'");

          header("location: login_staff.php");

          }else{
         
          echo "<p>Something goes wrong. Please try again</p>";

          header("location: reset_password.php");
       }
     }else{

        echo "<p>Password not match, Please click link to reset password in your email again</p>";

     }
   }
  ?>