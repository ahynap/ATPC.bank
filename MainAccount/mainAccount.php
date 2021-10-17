<?php
    session_start();
    include('..\server\server.php');
    $Email = $_REQUEST['Email'];
    $result3 = mysqli_query($conn,"SELECT Name FROM account WHERE Email='$Email'");
    $result = mysqli_query($conn,"SELECT AccountNo FROM accountno WHERE AccountID ORDER BY DATE IN (SELECT AccountID FROM account WHERE Email='$Email') LIMIT 1");
    $result2 = mysqli_query($conn,"SELECT Balance FROM accountnoinfo WHERE AccountNo IN (SELECT AccountNo FROM accountno WHERE AccountID ORDER BY DATE IN (SELECT AccountID FROM account WHERE Email='$Email')  LIMIT 1");
     
//////////////////////
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

</head>

<body>
    <form action="login_staff_insert.php" method="post">
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

    <!--   navbar   -->
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">
            <img src="picture/logo_blue.png" style="width:15%">
        </a>
        <div class="navbar">
            <ul class="nav navbar-right">
                <a href="#">
                    <?php
                        if (mysqli_num_rows($result3) > 0) { 
                        $i=0;
                        while($row = mysqli_fetch_array($result3)) {?>
                        <?php
                        $i++;
                        }
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

    <!------- Main Account Form ------->
    <form>

        <!------- Info in form -------->

        <div class="Info">
            <div class="row">
                <div class="col-6">
                    <div class="profile">
                        <img src="picture/client_icon.png">

                    </div>
                </div>
            </div>

            
                <p class="test1">MAIN ACCOUNT</p>
               
                    <?php
                        if (mysqli_num_rows($result) > 0) { 
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {?>

                                <div class="col-6">
                                    
                                       <p class="test2">  <?php echo $row["BranchName"]; ?>
                                    <?php echo $row["AccountNo"]; ?>
                                 
                            < <?php
                        $i++;
                        }
                        }
                    ?>
                    </p>
            </div>

                    <?php
                        if (mysqli_num_rows($result2) > 0) { 
                        $i=0;
                        while($row = mysqli_fetch_array($result2)) {?>
                                  
                              <div class="col-6">
                                  
                                     <p class="test3"><?php echo $row["Balance"]; ?></p>
                                
                          
                            <?php
                        $i++;
                        }
                        }
                    ?>
            </div>




        </div>


        <!------- Connect Bank Account button ------->
        <div class="AddAccount">
            <button type="submit" class="btn" style="outline: none"> CONNECT BANK ACCOUNT </button>
        </div><br>

        <!---------- MyAccount Transfer ViewHistory ----------->
        <div class="row ">
            <div class="col">
                <a href="#">
                    <img src="picture/accountIcon.png" style="width:83%">
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

    </form>

</body>

</html>
<?php
    mysqli_close($conn); 
?>
