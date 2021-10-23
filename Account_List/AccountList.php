<?php
    session_start();
    include('..\server\server.php');
    
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
    <link rel="stylesheet" href="AccountList.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet'
        type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body style="background-color: #F4F1EC;">
    <!--   navbar   -->


        <div class="navbar">
            <ul class="nav navbar-right" style="float: left!important;">
              <a href="#" style="text-align: left; width: 750px; height: 133px;">

                  <?php
                    while($row3 = mysqli_fetch_array($result3)) {
                  ?>

                        <input type="image" src="logo_blue.png" width="15%" onclick="window.location.href='../MainAccount/mainAccount.php'" name="Email" value=<?php echo $row3["Email"]; ?> />  

                 <?php
                    }
                  ?>

               </a>

                <a href="#">
                     <?php
                        while($row = mysqli_fetch_array($result)) {
                     ?>
                        <a class="navUser" href="#"><?php echo $row["Email"]; ?></a>

                     <?php 
                     }
                    ?>
                    <img src="picture/client_icon.png" width="58.36px" height="58.36px">
                </a>

                <a href="#">
                    <button class="btn navbar-btn" style="display: inline; 
                        color: white; 
                        background-color: #7585BD;  
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                        border: 0px;
                        border-radius: 35px; 
                        font-family: Kanit;
                        font-style: normal; 
                        font-weight: bold; 
                        font-size: 18px; 
                        text-decoration: none; 
                        outline: none ">
                        LOG OUT</button>
                </a>
            </ul>
        </div>


    <!--  Account List Button  -->
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
                      if($getResult4['MainAccount'] == $row4[9]) {
                    ?>

                    <div class="col-6" style="margin-top: -100px; margin-bottom: 38px;">
                        <span class="test3">MAIN ACCOUNT</span>
                    </div> 

                     <?php
                    }
                      ?>
 
                    <div class="col-6" style="margin-bottom: 11px;">
                        <p class="test4"><?php echo $row4[2]; ?></p>
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


