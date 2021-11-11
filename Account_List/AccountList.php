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

    <!--   navbar   -->

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

    <!-- ----- User's name show here! ----- -->

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

    <br><br><br><br><br><br><br><br><br><br><br>


    <!--  Account List  -->

    <div class="List">

    <?php
    mysqli_multi_query($conn, $result2);

    do {

    if ($result4 = mysqli_store_result($conn)) {
        $i = 1;

        while ($row4 = mysqli_fetch_row($result4)) {

         
     ?>

          <form action="..\Account_List\AccountList_insert.php" method="post">
            <button type="submit" class="button1" name="AccountNo" value=<?php echo $row4[0]; ?>>
                <div class="row">
                    <div class="col-6">
                        <p class="test1"><?php echo $row4[5]; ?></p>
                        <p class="test2"><?php echo $row4[0]; ?></p>
                    </div>
                    
                    <?php
                      if($getResult4['MainAccount'] == $row4[11]) {
                    ?>

                    <div class="col-6" style="margin-top: -100px; margin-bottom: 38px;">
                        <span class="test3">MAIN ACCOUNT</span>
                    </div> 

                     <?php
                    }
                      ?>
 
                    <div class="col-6" style="margin-bottom: 11px;">
                        <p class="test4"><?php echo $row4[4]; ?></p>
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
    </div>

</body>

</html>

<?php
    mysqli_close($conn); 
?>


