<?php

    session_start();
    include('..\server\server.php');
    $Email = $_SESSION['Email'];
    $result3 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
    $result4 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");
    $result = mysqli_query($conn,
        "SELECT AccountNo FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
          WHERE account.Email = '$Email'  AND accountno.MainAccount = 'Main Account'");
    $result2 = mysqli_query($conn, 
        "SELECT Balance FROM accountnoinfo
          JOIN accountno
            ON accountnoinfo.AccountNo = accountno.AccountNo
          JOIN account
            ON accountno.AccountID = account.AccountID
          WHERE account.Email = '$Email' AND accountno.MainAccount = 'Main Account'");
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATPC Main Account</title>
    <link rel="stylesheet" href="mainAccount1.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet'
        type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body style="background: #F4F1EC;">

      <!-- ----- logo ATPC bank ----- --> 
    <div class="logo">

        <input type="image" src="logo_blue.png" width="127"/>  

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
    <button type="submit" id = "btn3" onclick="window.location.href='../login_client/login_client.php'"> LOG OUT </button>


 <!-- Main Account Form-->
  <form>
        <!--Info in form -->

        <div class="Info">
            <div class="row">
                <div class="col-3">
                    <div class="profile">
        
                        <img src="client_icon.png">

                    </div>
                </div>
      

            
            <div class="col-3" style="margin-top: 285px" >
               <!-- <br><br><br><br><br><br><br><br><br><br><br><br> -->

                <p class="test1" style="margin-left: 150px;">MAIN ACCOUNT </p>
               
                    <?php
                        while($row = mysqli_fetch_array($result)) {
                    ?>

                        <p class="test2" style="margin-left: 150px;"><?php echo $row["AccountNo"]; ?></p>
                                 
                    <?php
                      
                        }
                    ?>
                    </p>
            </div>

                <div class="col-3">
                             
                    <?php
                      while($row2 = mysqli_fetch_array($result2)) {
                    ?>
                                     
                         <p class="test3" style="text-align: right;"><?php echo $row2["Balance"]; ?></p>
                                
                          
                 <?php
                
                     }
                ?>
            </div>
        </div>
     
          <!-- Connect Bank Account button -->
        <div class="AddAccount">
             <button id ="btn2" style="outline: none;" onClick="this.form.action='../connect_account/connect_account_home.php'; submit()"> CONNECT BANK ACCOUNT </button> 
        </div><br>

        <!-- MyAccount Transfer ViewHistory -->
        <div class="row ">
            <div class="col">
                <a href="../Account_List/AccountList.php" style="text-decoration:none">
                    <input type="image" src="picture/accountIcon.png" style="width:83%" onClick="this.form.action='../Account_List/AccountList.php'; submit()">
                    <div class="method">
                        <h4>&nbsp;MY ACCOUNT</h4>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="../transfer/transfer.php" style="text-decoration:none">
                    <input type="image" src="picture/withdrawIcon.png" style="width:83%" onClick="this.form.action='../transfer/transfer.php'; submit()">
                    <div class="method">
                        <h4>&nbsp;&nbsp;&nbsp;TRANSFER</h4>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="../user_detail/user_detail.php" style="text-decoration:none">
                    <input type="image" src="picture/editprofileIcon.png" style="width:83%" onClick="this.form.action='../user_detail/user_detail.php'; submit()">

                    <div class="method">
                        <h4>&nbsp;EDIT PROFILE</button>
                    </div>
                </a>
            </div>
        </div><br>
    </form>
    

</body>

</html>

<?php
    mysqli_close($conn); 
?>
