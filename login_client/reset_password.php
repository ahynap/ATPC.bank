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

        <title>RESET PASSWORD</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

 <div class="container">
    <div class="card">
       <div class="card-header text-center">
       Reset Password
 </div>

  <div class="card-body">

     <?php

      /* Verify Identity */

       if($_GET['key'] && $_GET['token'])
       {
          $Email = $_GET['key'];
          $Token = $_GET['token'];

          $query = mysqli_query($conn,
          "SELECT * FROM account WHERE Token = '$Token' and Email = '$Email';"
          );

     ?>

    <!-- Reset Password Form --> 

    <form action="update_forget_password.php" method="post">

       <input type="hidden" name="Email" value="<?php echo $Email;?>">
       <input type="hidden" name="Token" value="<?php echo $Token;?>">

          <!-- Fill Password--> 

          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" name='Password' class="form-control">
          </div>              

          <!-- Fill Confirm Password-->  

          <div class="form-group">
             <label for="exampleInputEmail1">Confirm Password</label>
             <input type="password" name='cPassword' class="form-control">
          </div>

       <input type="submit" name="new-password" class="btn btn-primary">

    </form>

<?php
 
 } 
 
?>

</div>
</div>
</div>
</body>
</html>

<?php
    mysqli_close($conn); 
?>











