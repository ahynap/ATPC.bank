<?php

   /* Connect Database */ 

    session_start();
    include('..\server\server.php');

     /* Use AccountNo Session to Access Data from Database for Display 'Username'and 'Transaction Detail' */ 
    
    $AccountNo = $_SESSION['AccountNo'];

    $Email = $_SESSION['Email'];

    $result = mysqli_query($conn,"SELECT * FROM staffaccount WHERE Email = '$Email'");

    $result2 = mysqli_query($conn,"SELECT * FROM staffaccount WHERE Email = '$Email'");

    $result3 = mysqli_query($conn,"SELECT * FROM accountno
         JOIN account
           ON accountno.AccountID = account.AccountID
         WHERE accountno.AccountNo = '$AccountNo'");

    $result4 = mysqli_query($conn,"SELECT * FROM accountnoinfo
         JOIN accountno
           ON accountnoinfo.AccountNo = accountno.AccountNo
         JOIN account
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");

    $result5 = mysqli_query($conn,"SELECT * FROM transferhistory WHERE AccountNo = '$AccountNo' OR DestinationAccountNo = '$AccountNo' ORDER BY DayTime DESC"); 


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Transaction Report</title>
    <link rel="stylesheet" href="Report_view_by_staff.css">

    <!-- ----- show accout ----- --> 
    <link rel="stylesheet" href="show_account.css">

    <!-- ----- lasted transaction ----- --> 
    <link rel="stylesheet" href="Lastest_Trans.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- ----- Niv Bar ----- --> 
    <div class="niv_bar">

        <!-- ----- logo ATPC bank ----- --> 
        <div class="logo">
             <input type="image" src="logo_blue.png" width=100 onclick="window.location.href='../mode_staff/mode_staff.php'"/>       
        
        </div>

        <!-- ----- logout button ----- --> 
        <button type="submit" class="btn" onclick="window.location.href='../login_staff/login_staff.php'; submit()"> LOGOUT </button>

        <div class="icon">
            <img src="staff_icon.png" width=58.36> 
        </div>

        <!-- ----- User's name show here! ----- -->
        <div class="user_detail">
             <?php while($row = mysqli_fetch_array($result)) { ?>
                    <span class="show_name" href="#" style="width: 350px; left: 450px; text-align: center"><?php echo $row["Email"]; ?></span> <?php }
           ?>
        </div>

        <!-- ----- BACK ----- --> 
        <div class="back" action="report_access_insert.php" method="post">
        <button type="submit" class="btn" onclick="window.location.href='../report/report_access.php'"> BACK </button>
        </div>
    </div>


    <!-- ----- header text ----- --> 
    <span class="header_txt"> REPORT </span>


    <div class="container">
        <!-- ----- Show Account Detail ----- --> 
        <span class="Text-with-line"> transaction report of account </span>

            <div class="over_blue_button">
                <!-- ----- blue squre button ----- --> 
                <div class="select_accout">

                    <!-- ----- detail in blue squre button ----- --> 
                            
                        <!-- ----- account_type ----- --> 
                         <?php while($row4 = mysqli_fetch_array($result4)) {?>
                        <div class="account_type">
                            <label><?php echo $row4["AccountType"]; ?> </label>
                        </div>

                        <?php while($row3 = mysqli_fetch_array($result3)) { ?>
                        <!-- ----- account_number ----- --> 
                        <div class="account_number">
                            <label><?php echo $row3["AccountNo"]; ?> </label>
                        </div> <?php } ?>

                        <!-- ----- balance ----- -->
                        <div class="balance">
                            <label> <?php echo $row4["Balance"]; ?> </label>
                        </div> <?php } ?>
                </div>
            </div>


        <!-- ----- Show Lastest Transactions ----- --> 
        <span class="Text-with-line"> ✦ &nbsp;&nbsp;&nbsp;lastest transactions&nbsp;&nbsp;&nbsp; ✦ </span>
            
            <!-- ----- deduction (-) ----- --> 
            <?php
                $i = 1;
                while($row5 = mysqli_fetch_array($result5)) {  
                    if($row5['AccountNo'] == $AccountNo){
            ?>

            <div class="over_blue_button">
                <!-- ----- blue squre button ----- --> 
                <div class="Lastest_Trans">

                    <!-- ----- detail in blue squre button ----- -->       
                        <!-- ----- Destination Account ----- --> 
                        <div class="trans_to">
                            <label>Destination : <?php echo $row5["DestinationAccountNo"]; ?> </label>
                        </div>

                        <!-- ----- Time ----- --> 
                        <div class="date_time">
                            <label> <?php echo $row5["DayTime"]; ?> </label>
                        </div> 

                        <!-- ----- Balance ----- --> 
                        <div class="balance_deduct">
                            <label> - <?php echo $row5["Amount"]; ?> </label>
                        </div> 
                </div>
            </div>

            <!-- ----- addition (+) ----- -->
            <?php } 
                else if($row5['DestinationAccountNo'] == $AccountNo) {
            ?> 

            <div class="over_blue_button">
                <!-- ----- blue squre button ----- --> 
                <div class="Lastest_Trans">

                    <!-- ----- detail in blue squre button ----- -->       
                        <!-- ----- Destination Account ----- --> 
                        <div class="trans_to">
                            <label>Destination <?php echo $row5["DestinationAccountNo"]; ?> </label>
                        </div>

                        <!-- ----- Time ----- --> 
                        <div class="date_time">
                            <label> <?php echo $row5["DayTime"]; ?> </label>
                        </div> 

                        <!-- ----- Balance ----- --> 
                        <div class="balance_add">
                            <label> + <?php echo $row5["Amount"]; ?> </label>
                        </div> 
                </div>
            </div>
           
        <?php }
            $i++; }
        ?>
        
        <div class="footer"></div>
    </div>

</body>

<?php
    mysqli_close($conn); 
?>

