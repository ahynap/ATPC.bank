<?php

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    /* Use AccountNo Session to Access Data from Database for Display 'Username', 'Account number detail', and 'History Transaction of that Account number' */
    
    $AccountNo = $_SESSION['AccountNo'];
    
    $result = mysqli_query($conn,"SELECT * FROM account
         JOIN accountno
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");
    $result2 = mysqli_query($conn,"SELECT * FROM account
         JOIN accountno
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");

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

     $result6 = mysqli_query($conn,"SELECT * FROM accountnoinfo
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
    <title>Account Detail</title>
    <link rel="stylesheet" href="AccountDetail2.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet'
        type='text/css'>
</head>

<body>

    <!-- niv -->
    
    <!-- ----- logo ATPC bank ----- -->
    <div class="nav">

        <div class="logo">
            <?php
             while($row2 = mysqli_fetch_array($result2)) {
        ?>

            <input type="image" src="logo_blue.png" width="100"
                onclick="window.location.href='../MainAccount/mainAccount.php'" name="Email"
                value=<?php echo $row2["Email"]; ?> />

            <?php
            }
        ?>
        </div>

        <!-- ----- logout button ----- -->
        <button type="submit" class="btn" onclick="window.location.href='../login_client/login_client.php'"> LOG OUT
        </button>

        <!-- --- user's icon show here! --- -->
        <img src="picture/client_icon.png" width=58.36 class="icon">

        <!-- --- user's email show here! --- -->
        <?php
        while($row = mysqli_fetch_array($result)) {
    ?>
        <span class="user_detail" href="#"><?php echo $row["Email"]; ?></span>

        <?php 
         }
    ?>

    </div>

    <!-- ----- back button ----- -->
    <div class="back">
        <button type="submit" class="btn" onclick="window.location.href='../Account_List/AccountList.php'" name="Email"
            value=<?php echo $row2["Email"]; ?>> BACK </button>
    </div>

    <!-- header text -->
    <p class="header_txt">DETAIL</p>

    <?php
        while($row6 = mysqli_fetch_array($result6)) {
    ?>

    <!-------- Account Detail  -------->
    <button type="button" class="Account">
        <div class="row">
            <div class="col-6">
                <br>
                <!-- Account type  -->
                <p class="AccountDetail"><?php echo $row6["AccountType"]; ?></p>
    <?php 
         }
    ?>


     <?php
        while($row3 = mysqli_fetch_array($result3)) {
     ?>
                <!-- Account number -->
                <p class="AccountDetail"><?php echo $row3["AccountNo"]; ?></p>

            </div>
      <?php 
      }
      ?>

    <?php
        while($row4 = mysqli_fetch_array($result4)) {
    ?>
            <!-- Account balance -->
            <div class="col-6-balance">
                <p class="Balance"><?php echo $row4["Balance"]; ?></p>
            </div>
        </div>
    </button>


    <?php 
         }
    ?>

    <!--------  History Transactions -------->
    <p class="Lastest_Transactions">Lastest Transactions</p>

    <?php

        $i = 1;
        while($row5 = mysqli_fetch_array($result5)) {  
             if($row5['AccountNo'] == $AccountNo){

     ?>

    <!-------- Lastest Transactions List -------->
    <button type="button" class="TransactionsButton1">
        <div class="row">
            <div class="col-6">

                <!-- Destination Account Number -->
                <p class="AccountNo">TO : <?php echo $row5["DestinationAccountNo"]; ?></p>

                <!-- Transaction day and time -->
                <p class="DayTime"><?php echo $row5["DayTime"]; ?></p>
            </div>

            <div class="col-6">

                <!-------- Amount in Lastest Transactions -------->
                <p class="Amounts" style="color: red;"><?php echo $row5["Amount"]; ?>&nbsp; &nbsp; THB</p>

                <!-- Inward and outward transfer mark -->
                <p class="signal" style="color: red;">-</p>
            </div>
        </div>
    </button>

    <?php

         } else if($row5['DestinationAccountNo'] == $AccountNo){
      ?>

    <button type="button" class="TransactionsButton1" style="height: 160px;">
        <div class="row">
            <div class="col-6">

                <!-- Source account -->
                <p class="AccountNo"> FROM : <?php echo $row5["AccountNo"]; ?></p>

                <!-- Transaction day and time -->
                <p class="DayTime"><?php echo $row5["DayTime"]; ?></p>
            </div>

            <div class="col-6">
                <p class="Amounts" style="color: green;"><?php echo $row5["Amount"]; ?>&nbsp; &nbsp; THB</p> 
                <p class="signal" style="color: green;">+</p>
            </div>
        </div>
    </button>

    <?php
         }
         $i++;
     }
       
     ?>

</body>

<?php
    mysqli_close($conn); 
?>