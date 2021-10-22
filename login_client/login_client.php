<?php
    session_start();
    include('..\server\server.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATPC login</title>
    <link rel="stylesheet" href="login_client.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>

    <form action="..\login_client\login_client_insert.php" method="post">
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

    <!-- - Login form --> 

        <!--logo ATPC bank --> 
        <div class="logo">
            <img src="logo_blue.png" width=242>
        </div>

        <!-- get login input --> 
        <div class="SubmitForLogin">
            <input type="text" placeholder="Email" name="Email">
            <input type="password" placeholder="Password" name="Password">
            <input type="text" placeholder="Phone" name="Phone">
            
            <br>
            <a href="default.asp" target="_blank" class="txt_link_left"> forget password? </a>
            <a href="../login_staff/login_staff.php" target="_blank" class="txt_link_right"> as a staff? </a>
            <br>
            <button type="submit" class="btn" name="login_user"> LOG IN </button>
        </div>
   
            <!-- Don’t have an account? --> 
        <span class="Text-with-line"> Don’t have an account? </span>
    </form>
  
        <!-- SIGN UP FOR ATPC ACCOUNT button \\--> 
        <div class="GoToSignIn">
            <button class="btn" onclick="window.location.href='../regis_role_choose/regis_role.php'"> SIGN UP FOR ATPC ACCOUNT </button>

        </div>

</body>


</html>

<?php
    mysqli_close($conn); 
?>











