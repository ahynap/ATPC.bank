<?php

    session_start();
    include('..\server\server.php');
     $AccountNo = $_SESSION['AccountNo'];

   $result = mysqli_query($conn,"SELECT * FROM account
         JOIN accountno
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");
    $result2 = mysqli_query($conn,"SELECT * FROM account
         JOIN accountno
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");


    $result3 = mysqli_query($conn,"SELECT * FROM transferhistory WHERE Email = '$Email' ORDER BY DayTime DESC"); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>History</title>
    <link rel="stylesheet" href="history.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin"
      rel="stylesheet"
      type="text/css"
    />
  </head>

  <body>
    <!-- ----- logo ATPC bank ----- -->
    <div class="logo">
       <?php
             while($row = mysqli_fetch_array($result)) {
        ?>

        <input type="image" src="logo_blue.png" width="127" onclick="window.location.href='../MainAccount/mainAccount.php'" name="Email" value=<?php echo $row["Email"]; ?> />  

         <?php
            }
        ?>
    </div>

        <!-- ----- user's name show here! ----- --> 
    <?php
        while($row2 = mysqli_fetch_array($result2)) {
    ?>
             <span class="show_name" href="#" style="width: 350px; left: 450px; text-align: center"><?php echo $row2["Email"]; ?></span>

    <?php 
         }
    ?>
    <img src="picture/client_icon.png" width="58.36" class="icon" />

    <!-- ----- logout button ----- -->
    <button type="submit" class="btn">LOG OUT</button>

    <!-------- Transactions Button -------->
    <p class="history">HISTORY</p>

    <p class="Transactions">Transactions</p>

    
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

    <div class="List2">
      <a href="#">
        <button type="button" class="TransactionsButton">
          <div class="row">
            <div class="col-6">
              <p class="bank_account">SAVINGS</p>
              <p class="account_num">9999xxxx9991</p>
              <p class="interbank_transfer">Interbank Transfer</p>
            </div>

            <div class="col-6">
                <p class="signal">+</p>
                <p class="amount">120000.00</p>
                <p class="unit">THB</p>
                <p class="date">Date: 18 Oct 2021</p>
                <p class="time">Time: 09:00 A.M.</p>
              </div>
          </div>
        </button>
      </a>

     
    </div>
  </body>
</html>
<?php
    mysqli_close($conn); 
?>
