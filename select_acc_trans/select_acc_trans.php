<?php
  
    /* Connect Database */ 
    session_start();
    include('..\server\server.php');

    /* Use Email Session to Access Data from Database for Display 'Username' , Specify Account Money Type and Verify Account Money Number*/ 
    $Email = $_SESSION['Email'];

    $result3 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");
    $result5 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");

      $result2 =  "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
          WHERE account.Email = '$Email'";


    $result2 = "SELECT * FROM accountnoinfo
          JOIN accountno
            ON accountnoinfo.AccountNo = accountno.AccountNo
          JOIN account
            ON accountno.AccountID = account.AccountID
          WHERE account.Email = '$Email' AND accountnoinfo.AccountType = 'Savings'";

    $result4 =  mysqli_query($conn,"SELECT * FROM accountno WHERE MainAccount = 'Main Account'");
    $getResult4 = mysqli_fetch_assoc($result4);
    
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> select account </title>
    <link rel="stylesheet" href="select_acc.css">

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
          <?php while($row3 = mysqli_fetch_array($result3)) {?>
            <input type="image" src="logo_blue.png" width=100 onclick="window.location.href='../MainAccount/mainAccount.php'" name="Email" value=<?php echo $row3["Email"]; ?> />  
          <?php } ?>
      </div>

      <!-- ----- logout button ----- --> 
      <button type="submit" class="btn" onclick="window.location.href='../login_client/login_client.php'"> LOG OUT </button>

      <div class="icon">
        <img src="client_icon.png" width=58.36> 
      </div>

      <!-- ----- user's name show here! ----- --> 
      <div class="user_detail">
        <?php while($row5 = mysqli_fetch_array($result5)) { ?>
          <span class="show_name"><?php echo $row5["Email"]; ?></span>
        <?php } ?>
      </div>

      <!-- ----- BACK ----- --> 
      <div class="back">
        <button type="submit" class="btn"  onclick="window.location.href='../transfer/transfer.php'" > BACK </button>
      </div>

    </div>
    


    <!-- ----- header text ----- --> 
    <span class="header_txt"> SELECT <br> ACCOUNT </span>
    
    <!-- ----- show account list ----- --> 
    <?php mysqli_multi_query($conn, $result2);
      do {
        if ($result4 = mysqli_store_result($conn)) {
          $i = 1;
        while ($row4 = mysqli_fetch_row($result4)) {
    ?>

    <!-- ----- ##### now selected accout ##### ----- --> 
    <form action="..\select_acc_trans\select_acc_trans_insert.php" method="post">
      <button type="submit" class="select_accout" name="AccountNo" value=<?php echo $row4[0]; ?>>

        <!-- ----- in blue squre box detail ----- --> 
          <!-- ----- account_type ----- --> 
            <div class="account_type">
              <label> <?php echo $row4[1]; ?></label>
            </div>

          <!-- ----- account_number ----- --> 
            <div class="account_number">
              <label> <?php echo $row4[0]; ?></label>
            </div>

          <!-- ----- balance ----- --> 
            <div class="balance">
              <label><?php echo $row4[5]; ?></label>
            </div>
                
            <!-- ----- if this account is MAIN ACCOUNT please show this section ----- --> 
              <?php if($getResult4['MainAccount'] == $row4[10]) { ?>
              <div class="main_account">
                <label>MAIN ACCOUNT</label>
              </div> <?php } ?>

      </button>
            
      <br><br><br>
            
      <?php } $i++; }
      if (mysqli_more_results($conn)) {
        printf("-----------------\n");
      }
      } while (mysqli_next_result($conn));
      ?>

    </form>


  </body>
</html>

<?php
    mysqli_close($conn); 
?>










