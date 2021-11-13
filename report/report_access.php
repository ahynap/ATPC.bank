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
    <link rel="stylesheet" href="access_report.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- ----- Niv Bar ----- --> 
    <div class="niv_bar">

        <!-- ----- logo ATPC bank ----- --> 
        <div class="logo">
            <input type="image" src="logo_blue.png" width="100">  
        </div>

        <!-- ----- logout button ----- --> 
        <button type="submit" class="btn" onClick="this.form.action='../login_staff/login_staff.php'; submit()"> LOGOUT </button>

        <div class="icon">
            <img src="staff_icon.png" width=58.36> 
        </div>
        
        <!-- ----- User's name show here! ----- -->
        <div class="user_detail">
            email
        </div>
    </div>

    <!-- ----- form for get input ----- --> 
    <form action="report_access_insert.php" method="post">
        
        <!-- ----- Error Alert ----- --> 
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
        <div class="logo">
            <img src="logo_blue.png" width=300>
        </div>
        
        <!-- ----- Text-with-line ----- --> 
        <span class="Text-with-line"> ACCOUNT REPORT </span> <br>

        <!-- ----- get input ----- --> 
        <div class="acc_number">
            <input type="text" placeholder="Account Number" name="AccountNo">
        </div>
        
        <!-- ----- comfirm ----- --> 
        <div class="confirm">
            <button type="submit" class="btn" name="repost_access"> CONFIRM </button>
        </div>
    </form>

</body>


</html>


<?php
    mysqli_close($conn); 
?>













