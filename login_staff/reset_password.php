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
        <title>Reset Password In PHP MySQL</title>
<!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

     <?php if (isset($_SESSION['error'])) : ?>
                <div class="error">
                    <h3>
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            
 <div class="container">
    <div class="card">
       <div class="card-header text-center">
       Reset Password In PHP MySQL
 </div>

  <div class="card-body">

     <?php

      if($_GET['key'] && $_GET['token'])
      {
          $email = $_GET['key'];
          $token = $_GET['token'];
          $query = mysqli_query($conn,
          "SELECT * FROM staffaccount WHERE Token = '$token' and Email = '$email';"
  );

  ?>

<form action="update_forget_password.php" method="post">

   <input type="hidden" name="Email" value="<?php echo $email;?>">
   <input type="hidden" name="Token" value="<?php echo $token;?>">

<div class="form-group">
   <label for="exampleInputEmail1">Password</label>
   <input type="password" name='Password' class="form-control">
</div>              

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











