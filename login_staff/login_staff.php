<?php

    /* Connect Database */
    
    session_start();
    include('..\server\server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ATPC staff login</title>
        <link rel="stylesheet" href="login.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <!--- Login form ---> 
        <form action="login_staff_insert.php" method="post">
            
        <!------- Error Alert -------> 
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

            <!--logo ATPC bank --> 
            <div class="logo">
                <img src="logo_blue.png" width=242>
            </div>

            <!-- ----- get login input ----- --> 
            <div class="SubmitForLogin">
                <input type="text" placeholder="Email" name="Email">
                <input type="password" placeholder="Password" name="Password">
                
                <br>
                <a href="forget_password.php" target="_blank" class="txt_link_left"> forget password? </a>
                <a href="../login_client/login_client.php" target="_blank" class="txt_link_right"> as a client? </a>
                <br>
                <button type="submit" class="btn" name="login_user"> LOG IN AS STAFF </button>
            </div>
    
            <!-- ----- Don’t have an account? ----- --> 
            <span class="Text-with-line"> Don’t have an account? </span>
        </form>

        <!-- SIGN UP FOR ATPC ACCOUNT --> 
        <div class="GoToSignIn">
            <button class="btn" onclick="window.location.href='../regis_role_choose/regis_role.php'"> SIGN UP FOR ATPC ACCOUNT </button>
        </div>
    </body>
</html>

<?php
    mysqli_close($conn); 
?>
















