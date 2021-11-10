<?php
    /* Connect Database */
    session_start();
    include('..\server\server.php'); 

    /* Use Email Session to Access Data from Database for Display 'Username' */ 
    $Email = $_SESSION['Email'];
    $result = mysqli_query($conn,"SELECT * FROM staffaccount WHERE Email = '$Email'");
    $result2 = mysqli_query($conn,"SELECT * FROM staffaccount WHERE Email = '$Email'");
    $result3 = mysqli_query($conn,"SELECT * FROM staffaccount WHERE Email = '$Email'");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Account</title>
        <link rel="stylesheet" href="add_account.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
    </head>

    <body>
        
        <form action="..\add_accountNo_staff\add_accountNo_staff_insert.php" method="post">
        
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

            
        <!-- ----- Niv Bar ----- --> 
        <div class="niv_bar">

        <!-- ----- logo ATPC bank ----- --> 
         <div class="back">
        <button type="submit" class="btn"  onClick="this.form.action='../mode_staff/mode_staff.php'" > BACK </button>
        </div>

           
          
            <!-- ----- logout button ----- --> 
            <button type="submit" class="btn" onClick="this.form.action='../login_staff/login_staff.php'; submit()"> LOG OUT </button>
        
            <div class="icon">
                <img src="client_icon.png" width=58.36> 
            </div>

            <!-- ----- User's name show here! ----- -->
            <div class="user_detail">
                <?php while($row = mysqli_fetch_array($result)) { ?>
                    <span class="show_name" href="#" style="width: 350px; left: 450px; text-align: center"><?php echo $row["Email"]; ?></span> <?php }
                ?>
            </div>

        </div>
        
            
        <!-- ----- header text ----- --> 
        <span class="header_txt"> ADD ACCOUNT  <br> NUMBER </span>

        <!-- ----- fill information ----- --> 
        <div class="container_fill_info">
            
            <span class="text_fill"> please fill your information </span>

            <div class="fill_information">
                <input type="text" placeholder="Account Number" name="AccountNo"> <br>
                <input type="text" placeholder="Depositor Name" name="Name"><br>
                <input type="text" placeholder="Depositor Surname" name="SurName"><br>
                <input type="text" placeholder="Balance" name="Balance"><br>
                <select name="BankName">
                    <option value="" disabled selected>Bank Name</option>
                    <option value="ATPCBank">ATPCBank</option>
                </select>
            </div>

            <!-- ----- ADD Account to ATPC Bank  ----- --> 
            <div class="connect">
            <button type="submit" class="btn" name="add_account"> ADD ACCOUNT </button>
            </div>
        </div>

    </body>
</html>

<?php
    mysqli_close($conn); 
?>