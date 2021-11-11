<?php

   /* Connect Database */ 

    session_start();
    include('..\server\server.php');

     /* Use Email Session to Access Data from Database for Display 'Username' , Specify 'Main Account' and Verify Account Money Number*/ 

    $Email = $_SESSION['Email'];

    $result = mysqli_query($conn,
        "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
          WHERE account.Email = '$Email' AND accountno.MainAccount = 'Main Account'");
    $result2 = mysqli_query($conn, 
        "SELECT * FROM accountnoinfo
          JOIN accountno
            ON accountnoinfo.AccountNo = accountno.AccountNo
          JOIN account
            ON accountno.AccountID = account.AccountID
          WHERE account.Email = '$Email' AND accountno.MainAccount = 'Main Account'");

    $result3 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
    $result4 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");

    $result5 = mysqli_query($conn,
        "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
         WHERE account.Email = '$Email'");

   $result6 = mysqli_query($conn,
        "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
         WHERE account.Email = '$Email' AND accountno.MainAccount = 'Main Account'");
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSFER</title>
    <link rel="stylesheet" href="transfer.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

    <!-- ----- select accout ----- --> 
    <link rel="stylesheet" href="show_account.css">


    <!-- ----- swipe for trans ----- --> 
    <link rel="stylesheet" type="text/css" href="swipe.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>


    
    <!-- ----- logo ATPC bank ----- --> 
    <div class="logo">

           <?php
                    while($row4 = mysqli_fetch_array($result4)) {
           ?>

                        <input type="image" src="logo_blue.png" width=127 onclick="window.location.href='../MainAccount/mainAccount.php'" name="Email" value=<?php echo $row4["Email"]; ?> />  

           <?php
               }
           ?>

    </div>

    <!-- ----- user's name show here! ----- --> 
    
        <?php
             while($row3 = mysqli_fetch_array($result3)) {
        ?>
                   <span class="show_name" href="#" style="width: 350px; left: 450px; text-align: center"><?php echo $row3["Email"]; ?></span>

        <?php
            }
        ?>
    <img src="client_icon.png" width=58.36 class="icon"> 
    
    <!-- ----- logout button ----- --> 
    <button type="submit" class="btn" onclick="window.location.href='../login_client/login_client.php'"> LOG OUT </button>

    <!-- ----- header text ----- --> 
    <span class="header_txt"> TRANSFER </span>

    <!-- ----- Text-with-line of from ----- --> 
    <span class="Text-with-line"> FROM </span>



    <!-- ----- select accout ----- --> 
    <button type="submit" class="select_accout" onclick="window.location.href='../select_acc_trans/select_acc_trans.php'">
        <!-- ----- in blue squre box detail ----- --> 
        <!-- ----- account_type ----- --> 

         <?php
                    while($row = mysqli_fetch_array($result)) {
          ?>

        <div class="account_type">

            <label><?php echo $row["AccountType"]; ?> </label>

        </div>

        <!-- ----- account_number ----- --> 
        <div class="account_number">
           
            <label><?php echo $row["AccountNo"]; ?> </label>

        </div>


             <?php
                 }
              ?>


          <?php
                while($row2 = mysqli_fetch_array($result2)) {
          ?>


        <!-- ----- account_number ----- --> 
        <div class="balance">
        
            <label> <?php echo $row2["Balance"]; ?> </label>

        </div>

          <?php
                }
          ?>

          <?php
                 while($row5 = mysqli_fetch_array($result5)) {
                     if($row5['MainAccount'] == "Main Account") {
          ?>

                    <div class="main_account">
                        <label> MAIN ACCOUNT </label>
                     </div>

          <?php
                 }
                 }
          ?>
 

        <!-- ----- if this account is MAIN ACCOUNT please show this section ----- --> 
      
    </button>


    <form action="..\transfer\transfer_insert.php" method="post">
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


    
    <!-- ----- Text-with-line of from RECIPIENT ----- --> 
    <span class="Text-with-line_recipient"> RECIPIENT </span>

    <!-- ----- fill information ----- --> 
    <div class="fill_information">
        <select name="BankName">
            <option disabled selected>BANK </option>
            <option >ATPCBank</option>
            <option >Bbank</option>
            <option >Cbank</option>
        </select>

        <input type="text" placeholder="Account Number" Name="DestinationAccountNo"> <br>
        <input type="text" placeholder="0.00" name="Amount"> <br>
        
    </div>




    
    <!-- ----- trans ----- --> 
    <div class="trans">

         <?php
             while($row6 = mysqli_fetch_array($result6)) {
        ?>

        <button type="submit" class="btn" name="AccountNo" value=<?php echo $row6["AccountNo"]; ?>> CONFIRM TO TRANSFER 
  
        </button>

          <?php
                }
          ?>
      
    </div>

    
</form>
</body>


</html>

<?php
    mysqli_close($conn); 
?>












