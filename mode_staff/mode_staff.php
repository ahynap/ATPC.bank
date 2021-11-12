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
    <title>Staff</title>
    <link rel="stylesheet" href="staff_main.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- ----- Niv Bar ----- --> 
    <div class="niv_bar">

        <!-- ----- logo ATPC bank ----- --> 
        <div class="logo">
            <input type="image" src="logo_blue.png" width="100"/>  
        </div>

        <!-- ----- logout button ----- --> 
        <button type="submit" class="btn" onClick="this.form.action='../login_staff/login_staff.php'; submit()"> LOGOUT </button>

        <div class="icon">
            <img src="staff_icon.png" width=58.36> 
        </div>
    </div>

    <!-- ----- header text ----- --> 
    <span class="header_txt"> WELCOME STAFF !</span>
    <span class="sub_header"> please choose the option </span>

    <!-- ----- select option ----- --> 
    <form method="post">
        <div class="function_btn ">

            <!-- ----- REGISTER BANK ACCOUNT ----- --> 
            <div class="each_function">
                <div class="add_account">
                    <button type="button" class="btn" onClick="this.form.action='../add_accountNo_staff/add_accountNo_staff.php'; submit()">
                        REGISTER <br> BANK'S ACCOUNT
                    </button>
                </div>
            </div>

            <!-- ----- VIEW TRANSACTION REPORT  ----- --> 
            <div class="each_function">
                <div class="view_report">
                    <button type="button" class="btn" onClick="this.form.action='../report/report_access.php'; submit()">
                        VIEW TRANSACTION REPORT   
                    </button>
                </div>
            </div>

        </div>
    </form>
   
</body>
</html>
<?php
    mysqli_close($conn); 
?>











