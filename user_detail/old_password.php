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
    <link rel="stylesheet" href="old_password.css" />

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
            <input type="image" src="logo_blue.png" width="100" onclick="window.location.href='../MainAccount/mainAccount.php'" ?>
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
                ><?php echo $row3["Email"]; ?></span> <?php }
    ?>
        </div>
    </div>

    <!-- ----- back button ----- -->
    <div class="back">
        <button type="submit" class="btn" onclick="window.location.href='../user_detail/user_detail.php'">BACK</button>
    </div>

    <!-------- Change Password FORM  -------->
    <div class="content">
    <form action="old_password_insert.php" method="post">

        <p class="Personal_Details">Change Password</p>

        <!----  old password  ---->
        <p class="old_password">Old Password</p>
        <br />

        <!-- message text  -->
        <p class="message">
            Please enter the old password to verify your identity.
        </p>
        <br />

        <!---- input old password ---->
        <div class="input_password">
            <input type="password" name="Password" id="myInput"><br>
        </div>

        <!-- Checkbox for show password -->
        <div class="checkboxPassword">
            <input type="checkbox" onclick="myFunction()" />
            <div class="ShowPassword">Show Password<br /></div>
        </div>

        <!-- JAVA Function -->
        <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>

        <!-- Next button -->
        <!-- link into new password page -->
        <button type="submit" class="next_btn" name="old_password">NEXT</button>

    </form>
    </div>
</body>

</html>


<?php
    mysqli_close($conn); 
?>