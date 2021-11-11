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

    <title>STAFF REGISTER</title>

    <link rel="stylesheet" href="staffRegis.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

</head>

<body>

    <!---- Error Alert ----> 

    <form action="regis_staff_insert.php" method="post">
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

    <!---- Staff's Register Form ----> 

    <form>

        <div class="back">
            <button type="submit" class="btn" onClick="this.form.action='../regis_role_choose/regis_role.php'; submit()"> BACK </button>
        </div>

        <!---- Logo ATPC Bank ----> 

        <div class="logo">
            <img src="logo_wh.png" width=80>
        </div>

        <!---- Fill Information ----> 

        <span class="text_fill"> please fill your information </span>

        <div class="fill_information">
            <input type="text" placeholder="Staff ID" name="StaffID">
            <input type="text" placeholder="Name" name="Name">
            <input type="text" placeholder="Surname" name="SurName">
        </div>

        <!---- Create ATPC Account ----> 

        <span class="text_create"> create ATPC account! </span>

        <div class="create_ATPC_account">
            <input type="text" placeholder="Email" name="Email">
            <input type="password" placeholder="Password" name="Password">
            <button type="submit" class="btn" name="reg_user"> SIGN UP </button>
        </div>

    </form>

</body>

</html>

<?php
    mysqli_close($conn); 
?>











