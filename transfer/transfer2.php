<?php
    session_start();
    include('..\server\server.php');

    $AccountNo = $_SESSION['AccountNo'];
    $result = mysqli_query($conn,"SELECT * FROM account
         JOIN accountno
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");
    $result2 = mysqli_query($conn,"SELECT * FROM account
         JOIN accountno
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");


    $result3 = mysqli_query($conn,"SELECT * FROM accountno
         JOIN account
           ON accountno.AccountID = account.AccountID
         WHERE accountno.AccountNo = '$AccountNo'");

     $result5 = mysqli_query($conn,"SELECT * FROM accountnoinfo
         JOIN accountno
           ON accountnoinfo.AccountNo = accountno.AccountNo
         JOIN account
           ON accountno.AccountID = account.AccountID
        WHERE accountno.AccountNo = '$AccountNo'");

      $result6 = mysqli_query($conn,
        "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
         WHERE accountno.AccountNo = '$AccountNo'");

       $result7 = mysqli_query($conn,
        "SELECT * FROM accountno 
         JOIN account
           ON accountno.AccountID = account.AccountID
         WHERE accountno.AccountNo = '$AccountNo'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSFER</title>
    <link rel="stylesheet" href="transfer.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

    <!-- ----- select accout ----- --> 
    <link rel="stylesheet" href="show_account.css">


    <!-- ----- swipe for trans ----- --> 
    <link rel="stylesheet" type="text/css" href="swipe.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>


    
    <!-- ----- logo ATPC bank ----- --> 
    <div class="logo">

           <?php
                    while($row = mysqli_fetch_array($result)) {
                  ?>

                        <input type="image" src="logo_blue.png" width=127 onclick="window.location.href='../MainAccount/mainAccount.php'" name="Email" value=<?php echo $row["Email"]; ?> />  

                 <?php
                    }
                  ?>

    </div>

    <!-- ----- user's name show here! ----- --> 
    
        <?php
             while($row2 = mysqli_fetch_array($result2)) {
        ?>
                   <span class="show_name" href="#" style="width: 350px; left: 450px; text-align: center"><?php echo $row2["Email"]; ?></span>

        <?php
            }
        ?>
    <img src="client_icon.png" width=58.36 class="icon"> 
    
    <!-- ----- logout button ----- --> 
    <button type="submit" class="btn" > LOG OUT </button>

    <!-- ----- header text ----- --> 
    <span class="header_txt"> TRANSFER </span>

    <!-- ----- Text-with-line of from ----- --> 
    <span class="Text-with-line"> FROM </span>



    <!-- ----- select accout ----- --> 
    <button type="submit" class="select_accout" onclick="window.location.href='../select_acc_trans/select_acc_trans.php'">
        <!-- ----- in blue squre box detail ----- --> 
        <!-- ----- account_type ----- --> 

         <?php
                 while($row3 = mysqli_fetch_array($result3)) {
          ?>

        <div class="account_type">

            <label><?php echo $row3["AccountType"]; ?> </label>

        </div>

        <!-- ----- account_number ----- --> 
        <div class="account_number">
           
            <label><?php echo $row3["AccountNo"]; ?> </label>

        </div>


             <?php
                 }
              ?>


          <?php
                while($row5 = mysqli_fetch_array($result5)) {
          ?>


        <!-- ----- account_number ----- --> 
        <div class="balance">
        
            <label> <?php echo $row5["Balance"]; ?> </label>

        </div>

          <?php
                }
          ?>

          
          <?php
                 while($row7 = mysqli_fetch_array($result7)) {
                     if($row7['MainAccount'] == "Main Account") {
          ?>

                    <div class="main_account">
                        <label> MAIN ACCOUNT </label>
                     </div>

          <?php
                 }
           }
          ?>

        <!-- ----- if this account is MAIN ACCOUNT please show this section ----- --> 
      
    </button>


    <form action="..\transfer\transfer_insert2.php" method="post">
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


    
    <!-- ----- Text-with-line of from RECIPIENT ----- --> 
    <span class="Text-with-line_recipient"> RECIPIENT </span>

    <!-- ----- fill information ----- --> 
    <div class="fill_information">
        <select name="BankName">
            <option disabled selected>BANK </option>
            <option >ATPCBank</option>
            <option >Bbank</option>
            <option >Cbank</option>
        </select>

        <input type="text" placeholder="Account Number" Name="DestinationAccountNo"> <br>
        <input type="text" placeholder="0.00" name="Amount"> <br>
        
    </div>




      <!-- ----- trans ----- --> 
    <div class="trans">

         <?php
             while($row6 = mysqli_fetch_array($result6)) {
        ?>

        <button type="submit" class="btn" name="AccountNo" value=<?php echo $row6["AccountNo"]; ?> > SLIDE TO TRANSFER >>
                <confirm> TRANSFERED </confirm>
        </button>

          <?php
                }
          ?>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 

        <script>
        $(function()
        {
        $('button')
            .bind('mousedown', function()
            {
            if($(this).attr('disabled')) return !1;
            return $.data(this, 'sliding', 1), !1;
            })
            .bind('mouseup mouseleave', function(e)
            {
            e.preventDefault();
            
            if($.data(this, 'sliding'))
            {
                $.data(this, 'sliding', 0);

                var pct = (parseInt($(this).find('> confirm').css('right')) / $(this).outerWidth() * 100);
                
                if(pct <= 25)
                $(this).find('> confirm').animate({ right: '0' }, 500, 'easeOutSine', function()
                {
                    $(this).closest('button').trigger('change').attr('disabled', !0);
                });
                else
                $(this).find('> confirm').animate({ right: '100%' }, 500, 'easeOutBounce');
            }
            
            return false;
            })
            .bind('mousemove', function(e)
            {
            var sliding = $.data(this, 'sliding') ? !0 : !1,
                pos;
            
            if(sliding)
            {
                pos = (e.pageX - $(this).offset().left) / $(this).outerWidth() * 100;
                $(this).find('> confirm').css('right', (100 - pos) + '%');
            }
            });
        });
        </script>

    </div>

    
</form>
</body>


</html>

<?php
    mysqli_close($conn); 
?>












