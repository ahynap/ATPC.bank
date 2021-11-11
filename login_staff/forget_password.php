<?php

     /* Connect Database */

    session_start();
    include('..\server\server.php'); 
?>

<!doctype html>
<html lang="en">

   <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
      <title>FORGET PASSWORD</title>
   
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   </head>

   <body>

      <div class="container">
          <div class="card">
            <div class="card-header text-center">
              Send Reset Password 
            </div>

            <div class="card-body">

              <!-- Forget Password Form --> 
            	
              <form action="forget_password_insert.php" method="post">

                <div class="form-group">

                  <!-- Fill Email --> 

                  <label for="exampleInputEmail1">Email :</label>

                  <input type="email" name="Email" class="form-control" id="email" aria-describedby="emailHelp">

                </div>

                <input type="submit" name="password-reset-token" class="btn btn-primary">

              </form>

            </div>
          </div>
      </div>
 
   </body>

</html>

<?php
    mysqli_close($conn); 
?>











