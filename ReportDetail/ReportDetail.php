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
    <title>Account Detail</title>
    <link rel="stylesheet" href="ReportDetail.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>

     <!-- ----- logo ATPC bank ----- --> 
     <div class="logo">
        <img src="logo_blue.png" width="127"/>  
     </div>

    <!-- ----- user's name show here! ----- --> 
    <?php
        while($row = mysqli_fetch_array($result)) {
    ?>
             <span class="show_name" href="#" style="width: 350px; left: 450px; text-align: center"><?php echo $row["Email"]; ?></span>

    <?php 
         }
    ?>
    <img src="picture/client_icon.png" width=58.36 class="icon"> 

    <!-- ----- logout button ----- --> 
    <button type="submit" class="btn"onclick="window.location.href='../login_staff/login_staff.php'"> LOG OUT </button>

    <!-- ----- logo ATPC bank ----- --> 
    <div class="back">
        <button type="submit" class="btn"  onclick="window.location.href='../report/report_access.php'" > BACK </button>
    </div>

    <!--------  Account Detail Button  -------->
    <p class="detail" ">REPORT</p>

    <?php
        while($row3 = mysqli_fetch_array($result3)) {
    ?>

     <div class="List">
         <a href="#">
             <button type="button" class="button1" style="height: 180px;">
                 <div class="row">
                     <div class="col-6">
                     <br>
                     <p class="test2" style="width: 300px;"><?php echo $row3["AccountType"]; ?></p>
                     <p class="test2"><?php echo $row3["AccountNo"]; ?></p>

                     </div>

  <?php 
         }
    ?>
                         

     <?php
        while($row4 = mysqli_fetch_array($result4)) {
    ?>
                     <div class="col-6" style="float: right; margin-right: 20px;">
                         <p class="test4" style="font-size: 48px;"><?php echo $row4["Balance"]; ?></p>
                     </div>
                 </div>
             </button>
         </a>
     </div>

     <?php 
         }
    ?>
              
      
     <!--------  Lastest Transactions Button  -------->
     <p class="Lastest_Transactions">Lastest Transactions</p>


    <?php

        $i = 1;
        while($row5 = mysqli_fetch_array($result5)) {  
             if($row5['AccountNo'] == $AccountNo){

     ?>

        <div class="List2">
         <a href="#">
             <button type="button" class="TransactionsButton1" style="height: 160px;">
                 <div class="row">
                     <div class="col-6">
                         <p class="test5">TO : <?php echo $row5["DestinationAccountNo"]; ?></p>
                         <p class="test5" style="font-size: 20px;"><?php echo $row5["DayTime"]; ?></p>
                     </div>
                     
                     <div class="col-6">
                         <p class="test8" style="color: red;"><?php echo $row5["Amount"]; ?>&nbsp; &nbsp; THB</p>
                         <p class="signal" style="color: red;">-</p>
                     </div>
                 </div>
             </button>
         </a>
     </div>

     <?php

         } else if($row5['DestinationAccountNo'] == $AccountNo){
      ?>

             <div class="List2">
         <a href="#">
             <button type="button" class="TransactionsButton1" style="height: 160px;">
                 <div class="row">
                     <div class="col-6">
                         <p class="test5"> FROM : <?php echo $row5["AccountNo"]; ?></p>
                         <p class="test5" style="font-size: 20px;"><?php echo $row5["DayTime"]; ?></p>
                     </div>
                     
                     <div class="col-6">
                         <p class="test8" style="color: green;"><?php echo $row5["Amount"]; ?>&nbsp; &nbsp; THB</p>
                         <p class="signal" style="color: green;">+</p>
                     </div>
                 </div>
             </button>
         </a>
     </div>


     <?php
         }
         $i++;
     }
       
     ?>
   

</body>

<?php
    mysqli_close($conn); 
?>

