<?php

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    /* Use Emaill Session to Access Data from Database for Display 'Username' and 'Amount of Account number of that User' */
    
    $Email = $_SESSION['Email'];
    $result = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");
    $result3 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");
    $result2 =  "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
          WHERE account.Email = '$Email'";

    $result2 = "SELECT * FROM accountnoinfo
          JOIN accountno
            ON accountnoinfo.AccountNo = accountno.AccountNo
          JOIN account
            ON accountno.AccountID = account.AccountID
          WHERE account.Email = '$Email'";

    $result4 =  mysqli_query($conn,"SELECT * FROM accountno WHERE MainAccount = 'Main Account'");
    $getResult4 = mysqli_fetch_assoc($result4);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATPC Account List</title>
    <link rel="stylesheet" href="AccountList1.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet'
        type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body style="background-color: #F4F1EC;">

    <!-- ----- Niv Bar ----- -->
    <div class="niv_bar">

        <!-- ----- logo ATPC bank ----- -->
        <div class="logo"> 

            <input type="image" src="logo_blue.png" width="100" onclick="window.location.href='../MainAccount/mainAccount.php'" ?>
            
        </div>

        <!-- ----- logout button ----- -->
        <form>
            <button type="submit" class="btn" onClick="this.form.action='../login_client/login_client.php'; submit()">
                LOG
                OUT </button>
        </form>

        <div class="icon">
            <img src="client_icon.png" width=58.36>
        </div>

        <!-- ----- User's name show here! ----- -->
        <div class="user_detail">
            <?php while($row3 = mysqli_fetch_array($result3)) { ?>
            <span class="show_name" href="#"><?php echo $row3["Email"]; ?></span> <?php }
?>
        </div>

    </div>


    <?php
    mysqli_multi_query($conn, $result2);

    do {

    if ($result4 = mysqli_store_result($conn)) {
        $i = 1;

        while ($row4 = mysqli_fetch_row($result4)) {

         
     ?>

       <!--------- Account List --------->
       <form action="..\Account_List\AccountList_insert.php" method="post">
        <button type="submit" class="Account_list" name="AccountNo" value=<?php echo $row4[0]; ?>>
            <div class="row">
                <div class="col-6">

                    <!-- Account type -->
                    <p class="AccountType"><?php echo $row4[1]; ?></p>

                    <!-- Account number -->
                    <p class="AccountNo"><?php echo $row4[0]; ?></p>
                </div>

                <?php
                      if($getResult4['MainAccount'] == $row4[10]) {
                    ?>

                <div class="col-6" style="margin-top: -100px; margin-bottom: 38px;">

                    <!-- Indicates that it is the main account -->
                    <span class="MainAccount">MAIN ACCOUNT</span>
                </div>

                <?php
                    }
                      ?>

                <div class="col-6" style="margin-bottom: 11px;">

                    <!-- Balance in account -->
                    <p class="Amounts"><?php echo $row4[5]; ?></p>
                </div>
            </div>
        </button>
        </a> <br><br> <br><br>
        <?php
    }
        $i++;
        }

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


