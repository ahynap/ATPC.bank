<?php

     /* Connect Database */ 

    session_start();
    include('..\server\server.php');

     /* Use Email Session to Access Data from Database for Display 'Username' */ 

    $Email = $_SESSION['Email'];
    $result2 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
    $result3 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
    $result4 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");

    $result = mysqli_query($conn, "SELECT * FROM account WHERE Email = '$Email'");

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change your password Page</title>
    <link rel="stylesheet" href="new_password.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin" rel="stylesheet"
        type="text/css" />
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

    <!-- ----- Niv Bar ----- -->
    <div class="niv_bar">

        <!-- ----- logo ATPC bank ----- -->
        <div class="logo">
            <input type="image" src="logo_blue.png" width="100" />
        </div>

        <!-- ----- logout button ----- -->
        <button type="submit" class="btn" onclick="window.location.href='../login_client/login_client.php'"> LOG OUT
        </button>

        <div class="icon">
            <img src="picture/client_icon.png" width=58.36>
        </div>

        <!-- ----- User's name show here! ----- -->
        <div class="user_detail">
            <?php while($row3 = mysqli_fetch_array($result3)) { ?>
            <span class="show_name" href="#"
                style="width: 350px; left: 450px; text-align: center"><?php echo $row3["Email"]; ?></span> <?php }
?>
        </div>
    </div>

    <!-- ----- back button ----- -->
    <div class="back">
        <button type="submit" class="btn" onclick="window.location.href='../user_detail/user_detail.php'">BACK</button>
    </div>

    <!-------- Change Password FORM  -------->
    <div class="content">
        <form action="new_password_insert.php" method="post">
            <p class="Personal_Details">Change Password</p>

            <!----  new password ---->
            <p class="new_password">New Password</p>
            <br />
            
            <!-- message text  -->
            <p class="message">
                Please enter the new password you wish to change.
            </p>
            <br />

            <!---- input new password ---->
            <div class="input_password">
                <input type="password" name="Password" id="myInput"><br>
            </div>

            <!---- Checkbox for show password ---->
            <div class="checkboxPassword">
                <input type="checkbox" onclick="myFunction()" />
                <div class="ShowPassword" style="margin-left: -10px;">Show Password<br /></div>
            </div>

            <!-- JAVA Function -->
            <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            </script>

            <!-- Confirm button -->
            <!-- link into success page -->
            <button type="submit" class="confirm_btn" name="new_password">CONFIRM</button>
        </form>
    </div>

</body>

</html>

<?php
    mysqli_close($conn); 
?>