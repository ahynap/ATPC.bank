<?php

    /* Connect Database */ 

    session_start();
    include('..\server\server.php');

    /* Use Email Session to Access Data from Database for Display 'Username' */ 

    $Email = $_SESSION['Email'];
    $result = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password successfully</title>
    <link rel="stylesheet" href="success1.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin" rel="stylesheet"
        type="text/css" />
</head>

<body>
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
            <?php while($row = mysqli_fetch_array($result)) { ?>
            <span class="show_name" href="#"
                style="width: 350px; left: 450px; text-align: center"><?php echo $row["Email"]; ?></span> <?php }
?>
        </div>
    </div>

    <!-------- Message notification FORM -------->
    <div class="content">
        <form>
            
            <!---- Message notification ---->
            <p class="message">Your name or password changed successfully.</p>
            <br />
        </form>
    </div>

</body>

</html>


<?php
    mysqli_close($conn); 
?>