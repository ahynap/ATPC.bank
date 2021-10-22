<?php

    session_start();
    include('..\server\server.php');
    $Email = $_SESSION['Email'];
    $result3 = mysqli_query($conn,"SELECT Email FROM account WHERE Email = '$Email' ");
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
          WHERE account.Email = '$Email' AND accountno.MainAccount = 'Main Account' ");
    
    
    
    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATPC Main Account</title>
    <link rel="stylesheet" href="mainAccount.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet'
        type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="jquery.js"></script>
    <script>
        $(function(){
            $("#includeContent").load("../connect_account/connect_account_insert.php");
        }
    </script>

</head>

<body style="background: #F4F1EC;">
   

    <!--   navbar   -->
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">
            <img src="picture/logo_blue.png" style="width:15%">
        </a>
        <div class="navbar">
            <ul class="nav navbar-right">
                <a href="#">
                    <?php
                        while($row3 = mysqli_fetch_array($result3)) {
                    ?>
                        <a class="navUser" href="#"><?php echo $row3["Email"]; ?></a>

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
    </nav>

    <!-- Main Account Form-->
    <form>

        <!--Info in form -->

        <div class="Info">
            <div class="row">
                <div class="col-3">
                    <div class="profile">
        
                        <img src="picture/client_icon.png">

                    </div>
                </div>
      

            
            <div class="col-3" style="margin-top:285px" >
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
      </form>

          <!-- Connect Bank Account button -->
        <div class="AddAccount" style="margin-top: 100px;">

              <?php
                      while($row4 = mysqli_fetch_array($result4)) {
                ?>

             <button class="btn" style="outline: none;" onClick="this.form.action='../connect_account/connect_account_home.php'; submit()" name="Email" value=<?php echo $row["Email"]; ?>> CONNECT BANK ACCOUNT </button> 


                 <?php
                
                     }
                ?>
        </div><br>
  


        <!-- MyAccount Transfer ViewHistory -->
        <div class="row ">
            <div class="col">
                <a href="../Account_List/AccountList.php">
                    <input type="image" src="picture/accountIcon.png" style="width:83%" onClick="this.form.action='../Account_List/AccountList.php'; submit()">
                    <div class="method">
                        <h4>MY ACCOUNT</h4>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#">
                    <img src="picture/withdrawIcon.png" style="width:83%">
                    <div class="method">
                        <h4>TRANSFER</h4>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#">
                    <img src="picture/historyIcon.png" style="width:83%">
                    <div class="method">
                        <h4>VIEW HISTORY</h4>
                    </div>
                </a>
            </div>
        </div><br>

    
  <div id="includedContent"></div>


</body>

</html>
<?php
    mysqli_close($conn); 
?>
