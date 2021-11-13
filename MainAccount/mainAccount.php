<?php
    /* Connect Database */
    session_start();
    include('..\server\server.php');

    /* Use Email Session to Access Data from Database for Display 'Username' and Specify 'Main Account' */ 
    $Email = $_SESSION['Email'];

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
    
    $result3 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
    $result4 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ATPC Main Account</title>
        <link rel="stylesheet" href="Main.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

        <!-- ----- show accout ----- --> 
        <link rel="stylesheet" href="show_acc.css">
    
    </head>

    <body>
        <!-- ----- Niv Bar ----- --> 
        <div class="niv_bar">

            <!-- ----- logo ATPC bank ----- --> 
            <div class="logo">
                <input type="image" src="logo_blue.png" width="100"/>  
            </div>

            <!-- ----- logout button ----- --> 
            <button type="submit" class="btn" onclick="window.location.href='../login_client/login_client.php'"> LOG OUT </button>

            <div class="icon">
                <img src="client_icon.png" width=58.36> 
            </div>

            <!-- ----- User's name show here! ----- -->
            <div class="user_detail">
                <?php while($row3 = mysqli_fetch_array($result3)) { ?>
                    <span class="show_name"> 
                        <?php echo $row3["Email"]; ?></span> <?php }
                ?>
            </div>
        </div>

        <!-- ----- show main account ----- --> 
        <div class="over_blue_button">
            <div class="select_accout">
                <!-- ----- profile_pic ----- --> 
                <div class="profile_pic">
                    <img src="client_icon.png">
                </div>

                <div class="acc_descript">
                    <span> MAIN ACCOUNT </span>
                </div>

                <!-- ----- account_number ----- --> 
                <div class="account_number">
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <label><?php echo $row["AccountNo"]; ?> </label>
                </div> <?php } ?>


                 <!-- ----- balance ----- --> 
                <div class="balance">
                    <?php while($row2 = mysqli_fetch_array($result2)) {?>
                    <label> <?php echo $row2["Balance"]; ?> </label>
                </div> <?php } ?>
            </div>
                

            <!-- Connect Bank Account button -->
            <form>
                <div class="Connect_Account">
                    <button class="btn" onClick="this.form.action='../connect_account/connect_account_home.php'; submit()"> CONNECT BANK ACCOUNT </button> 
                </div>
            </form>

        </div>


        <!-- ----- function button ----- --> 
        <div class="containner">
            
            <!-- ----- row of function button ----- --> 
            <div class="function_btn">
                
                <!-- ----- MY ACCOUNT ----- --> 
                <div class="each_function">
                    <a href="../Account_List/AccountList.php" style="text-decoration:none">
                        <input type="image" src="picture/accountIcon.png" style="width:83%" onClick="this.form.action='../Account_List/AccountList.php'; submit()">
                        <div class="description">
                            <span> MY ACCOUNT </span>
                        </div>
                    </a>
                </div>

                <!-- ----- TRANSFER ----- --> 
                <div class="each_function">
                    <a href="../transfer/transfer.php" style="text-decoration:none">
                        <input type="image" src="picture/withdrawIcon.png" style="width:83%" onClick="this.form.action='../transfer/transfer.php'; submit()">
                        <div class="description">
                            <span> TRANSFER </span>
                        </div>
                    </a>
                </div>

                <!-- ----- EDIT PROFILE ----- --> 
                <div class="each_function">
                    <a href="../user_detail/user_detail.php" style="text-decoration:none">
                        <input type="image" src="picture/editprofileIcon.png" style="width:83%" onClick="this.form.action='../user_detail/user_detail.php'; submit()">
                        <div class="description">
                            <span> EDIT PROFILE </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </body>

</html>

<?php
    mysqli_close($conn); 
?>
