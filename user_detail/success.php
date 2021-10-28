
<?php

    session_start();
    include('..\server\server.php');

    $Email = $_SESSION['Email'];
    $result2 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
    $result3 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password successfully</title>
    <link rel="stylesheet" href="success.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin"
      rel="stylesheet"
      type="text/css"
    />
  </head>

  <body>
    <!-- ----- logo ATPC bank ----- -->
    <div class="logo">

       <?php
           while($row2 = mysqli_fetch_array($result2)) {
      ?>

        <input type="image" src="logo_blue.png" width="127" onclick="window.location.href='../MainAccount/mainAccount.php'" name="Email" value=<?php echo $row2["Email"]; ?> />  

        <?php
            }
        ?>

    </div>

    <!-- ----- user's name show here! ----- -->
    <span>

     <?php
          while($row3 = mysqli_fetch_array($result3)) {
     ?>
        
         <span class="show_name" style="width: 350px; left: 450px; text-align: center"><?php echo $row3["Email"]; ?></span>

   <?php
       }
    ?>

    </span>

    <img src="picture/client_icon.png" width="58.36" class="icon" />

    <!-- ----- logout button ----- -->
    <button type="submit" class="btn" onclick="window.location.href='../login_client/login_client.php'">LOG OUT</button>


    <!-------- Message FORM  -------->
    <form>
      <!----  message ---->
      <p class="message">Your password changed successfully.</p>
      <br />
    </form>

  </body>
</html>


<?php
    mysqli_close($conn); 
?>

