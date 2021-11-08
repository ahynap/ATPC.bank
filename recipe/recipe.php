<?php
    /* Connect Database */
    session_start();
    include('..\server\server.php');

    $AccountNo = $_SESSION['AccountNo'];
    $DestinationAccountNo = $_SESSION['DestinationAccountNo']; 

    $result3 = mysqli_query($conn,"SELECT * FROM account
         JOIN accountno
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");

     $result4 = mysqli_query($conn,"SELECT * FROM account
         JOIN accountno
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");

    $result = mysqli_query($conn,
        "SELECT * FROM transferhistory
         JOIN accountnoinfo
           ON accountnoinfo.AccountNo = transferhistory.AccountNo
         WHERE accountnoinfo.AccountNo = '$AccountNo' ORDER BY transferhistory.DayTime DESC LIMIT 1");

    $result2 = mysqli_query($conn,
        "SELECT * FROM transferhistory
         JOIN accountnoinfo
           ON accountnoinfo.AccountNo = transferhistory.DestinationAccountNo
         WHERE accountnoinfo.AccountNo = '$DestinationAccountNo' ORDER BY transferhistory.DayTime DESC LIMIT 1");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RECIPET</title>
        <link rel="stylesheet" href="recipet.css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

    </head>

<body>
    
    <!-- ----- Niv Bar ----- --> 
    <div class="niv_bar">

        <!-- ----- logo ATPC bank ----- --> 
        <div class="logo">        
            <?php while($row3= mysqli_fetch_array($result3)) {?>
            <input type="image" src="logo_blue.png" width=127 onclick="window.location.href='../MainAccount/mainAccount.php'" 
                    name="Email" value=<?php echo $row3["Email"]; ?>/> <?php } ?>
        </div>

        <!-- ----- logout button ----- --> 
        <button type="submit" class="btn" onClick="this.form.action='../login_client/login_client.php'; submit()"> LOG OUT </button>

        <div class="icon">
            <img src="client_icon.png" width=58.36> 
        </div>

        <!-- ----- User's name show here! ----- -->
        <div class="user_detail">
            <?php while($row4 = mysqli_fetch_array($result4)) {?>
                <span class="show_name" href="#" 
                    style="width: 350px; left: 450px; text-align: center">
                    <?php echo $row4["Email"]; ?></span> <?php } ?>
        </div>

    </div>

    <!-- ----- RECIEPT ----- -->
    <div class="over_recipt">
        <div class="receiptContainer">
            
            <div class="top">
                <img src="logo_black.png" width=127> 
                <br>SUCCESS
            </div>

            <!-- ----- ref and date ----- -->
            <div class="date">
                <?php while($row = mysqli_fetch_array($result)) { ?> <?php echo "REF #" . $row["TransferID"]; ?>       
                <br>
                <?php echo $row["DayTime"]; ?>
            </div>

            <div class="line_dot">
                - - - - - - - - - - - - - - - - - - -
            </div>

            <div class="info">
            <!-- ----- from ----- -->
                FROM
                <div class="righthand">
                    <?php echo $row["Name"]. " " . $row["SurName"]; ?>
                    <br>
                    <?php echo $row["AccountNo"]; ?>
                </div> <?php } ?>
                
                <?php while($row2 = mysqli_fetch_array($result2)) { ?>

            <!-- ----- to ----- -->
                <br>
                TO
                <div class="righthand">
                    <?php echo $row2["Name"]. " " . $row2["SurName"]; ?>
                    <br>
                    <?php echo $row2["AccountNo"]; ?>
                </div>
            </div>

            <div class="line_dot">
                <br><br> - - - - - - - - - - - - - - - - - - -
            </div>

            <!-- ----- Amount ----- -->
            <div class="amount">
                AMOUNT
            </div>

            <div class="righthand">
                <?php echo $row2["Amount"]. " THB"; ?>
            </div>
        </div>

        <?php
            }
        ?>
                

        <!-- ----- DONE Button ----- -->
        <div class="ok_btn">
            <button type="submit" class="btn"> DONE </button>
        </div>
    </div>
   
</body>

</html>

<?php
    mysqli_close($conn); 
?>













