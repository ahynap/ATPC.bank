<?php

    /* Connect Database */

    session_start();
    include('..\server\server.php'); 

    $Email = $_SESSION['Email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Report Access</title>

    <link rel="stylesheet" href="repost_access1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- ----- Login form ----- --> 
    <form action="report_access_insert.php" method="post">

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

         <!-- ----- logo ATPC bank ----- --> 
        <div class="back">
           <button type="submit" class="btn" onClick="this.form.action='../mode_staff/mode_staff.php'" > BACK </button>
        </div>

       <!-- ----- logo ATPC bank ----- --> 
        <div class="logo">
            <img src="logo_blue.png" width=242>
        </div>

        <!-- ----- Confirm you PIN ----- --> 
        <span class="Text-with-line"> ACCOUNT REPORT </span> <br>

        <!-- ----- get login input ----- --> 
        <div class="SubmitForLogin">
            <input type="text" placeholder="Account Number" name="AccountNo">

            <button type="submit" class="btn" name="repost_access"> CONFIRM </button>
        </div>
    </form>

</body>


</html>


<?php
    mysqli_close($conn); 
?>













