<?php
    /* Connect Database */
    session_start();
    include('..\server\server.php');

    /* Use AccountNo Session to Access Data from Database for Display 'Username' and Verify Account Money Number*/ 
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

     $result5 = mysqli_query($conn,"SELECT * FROM accountnoinfo
         JOIN accountno
           ON accountnoinfo.AccountNo = accountno.AccountNo
         JOIN account
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");

      $result6 = mysqli_query($conn,
        "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
         WHERE accountno.AccountNo = '$AccountNo'");

       $result7 = mysqli_query($conn,
        "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
         WHERE accountno.AccountNo = '$AccountNo'");
?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TRANSFER</title>
      <link rel="stylesheet" href="transfer_money.css">

      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

      <!-- ----- select accout ----- --> 
      <link rel="stylesheet" href="show_acc.css">
  </head>

  <body>
      <!-- ----- Niv Bar ----- --> 
      <div class="niv_bar">
    
        <!-- ----- logo ATPC bank ----- --> 
        <div class="logo">
            <input type="image" src="logo_blue.png" width=127 onclick="window.location.href='../MainAccount/mainAccount.php'" ?> 
        </div>
        
        <!-- ----- logout button ----- --> 
        <button type="submit" class="btn" onclick="window.location.href='../login_client/login_client.php'"> LOG OUT </button>
                    
        <div class="icon">
          <img src="client_icon.png" width=58.36> 
        </div>

        <!-- ----- user's name show here! ----- --> 
        <div class="user_detail">
            <?php while($row2 = mysqli_fetch_array($result2)) { ?>
              <span class="show_name"><?php echo $row2["Email"]; ?></span> <?php }
            ?>
        </div>
      </div>
     
    
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


      <!-- ----- header text ----- --> 
      <span class="header_txt"> TRANSFER </span>

      
      <!-- ----- containner ----- --> 
      <form  action="..\transfer\transfer_insert2.php" method="post">
        <div class="container">

          <!-- ----- FROM ----- --> 
          <span class="Text-with-line"> FROM </span>

          <!-- ----- auto select accout ----- --> 
          <div class="over_blue_button">
              
            <!-- ----- blue squre button ----- --> 
            <button type="submit" class="select_accout" onClick="this.form.action='../select_acc_trans/select_acc_trans.php'; submit()">
        
              <!-- ----- detail in blue squre button ----- --> 
                  

                <?php while($row5 = mysqli_fetch_array($result5)) { ?>
                <!-- ----- account_type ----- --> 
                <div class="account_type">
                  <label><?php echo $row5["AccountType"]; ?> </label>
                </div>

                <?php while($row3 = mysqli_fetch_array($result3)) { ?>
                <!-- ----- account_number ----- --> 
                <div class="account_number">
                  <label><?php echo $row3["AccountNo"]; ?> </label>
                </div> <?php } ?>
                    
                <!-- ----- balance ----- --> 
                <div class="balance">
                  <label> <?php echo $row5["Balance"]; ?> </label>
                </div> <?php } ?>

                <!-- ----- if this account is MAIN ACCOUNT please show this section ----- --> 
                <?php while($row7 = mysqli_fetch_array($result7)) {
                  if($row7['MainAccount'] == "Main Account") { ?>
                    <div class="main_account">
                      <label> MAIN ACCOUNT </label>
                    </div>
                <?php } } ?>
              
            </button>
            
            <div class="description"> * you can click to change account *</div>
            
          </div>

          <!-- ----- RECIPIENT ----- --> 
          <span class="Text-with-line"> RECIPIENT </span>

            <!-- ----- fill information ----- --> 
            <div class="fill_information">
              <select name="BankName">
                <option disabled selected>BANK </option>
                  <option >ATPCBank</option>
                  <option >Bbank</option>
                  <option >Cbank</option>
              </select><br>

              <input type="text" placeholder="Account Number" Name="DestinationAccountNo"> <br>
              
              <div class="amount">
                <span> AMOUNT </span>
                <input type="text" placeholder="0.00" name="Amount">
                <span> THB </span>
              </div>
            
            </div>

            <span class="Text-with-line">???????????????</span>

          <!-- ----- transfer Button ----- --> 
          <div class="trans_btn">
            <?php while($row6 = mysqli_fetch_array($result6)) { ?>
              <button type="submit" class="btn" name="AccountNo" value=<?php echo $row6["AccountNo"]; ?> > CONFIRM </button>
            <?php } ?>
          </div>
        
        </div>
      </form>
  </body>

</html>

<?php
    mysqli_close($conn); 
?>












