<?php
    session_start();
    include('..\server\server.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect Account</title>
    <link rel="stylesheet" href="connect_account.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>
     <form action="connect_account_insert.php" method="post">
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


    <!-- ----- logo ATPC bank ----- --> 
    <div class="logo">
        <img src="logo_blue.png" width=127>   
    </div>

    <!-- ----- user's name show here! ----- --> 
    <span class="show_name"> username </span>
    <img src="client_icon.png" width=58.36 class="icon"> 
    
    <!-- ----- logout button ----- --> 
    <button type="submit" class="btn" > LOG OUT </button>

    <!-- ----- logo ATPC bank ----- --> 
    <div class="back">
        <button type="submit" class="btn"> BACK </button>
    </div>
        
    <!-- ----- header text ----- --> 
    <span class="header_txt"> CONNECT TO <br> BANK ACCOUNT </span>
    
    <!-- ----- fill information ----- --> 
    <span class="text_fill"> please fill your information </span>

    <div class="fill_information">
        <input type="text" placeholder="Account Number" name="AccountNo"> <br>
        <input type="text" placeholder="Depositor Name" name="DepositorName"><br>
        <input type="text" placeholder="Branch Name" name="BranchName"><br>
        <input type="text" placeholder="Serial Number" name="SerialNo"><br>
        <input type="password" placeholder="accountID" name="accountID"><br>

        <select name="AccountType">
            <option value="" disabled selected>Type of Account</option>
            <option value="normal">Savings</option>
            <option value="above 13">Fixed Deposites</option>
        </select>
    </div>

    <!-- ----- connect button ----- --> 
    <div class="connect">
    <button type="submit" class="btn" > CONNECT </button>
    </div>

</body>


</html>
<?php
    mysqli_close($conn); 
?>