<?php

    session_start();
    include('..\server\server.php');

    $Email = $_SESSION['Email'];
    $result2 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
    $result3 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email' ");
    $result4 = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");

    $result = mysqli_query($conn, "SELECT * FROM account WHERE Email = '$Email'");

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change your password Page</title>
    <link rel="stylesheet" href="old_password1.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin"
      rel="stylesheet"
      type="text/css"
    />
  </head>

  <body>

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

      <!-- ----- logo ATPC bank ----- -->
    <div class="back">
      <button type="submit" class="btn" onclick="window.location.href='../user_detail/user_detail.php'">BACK</button>
    </div>

    <!-------- Change Password FORM  -------->
    <form action="old_password_insert.php" method="post">

      <p class="Personal_Details">Change Password</p>

      <!----  old_password  ---->
      <p class="old_password">Old Password</p>
      <br />

      <p class="message">
        Please enter the old password to verify your identity.
      </p>
      <br />

      <!---- input old password ---->
      <div class="input_password">
        <input type="password" name="Password" id="myInput"><br>
      </div>

     <div class="checkboxPassword">
        <input type="checkbox" onclick="myFunction()" />
        <div class="ShowPassword">Show Password<br /></div>
      </div>
      

      <!-- JAVA Show password -->
      <script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type == "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
      </script>

        <button type="submit" class="next_btn" name="old_password">NEXT</button>

    </form>
  </body>
</html>


<?php
    mysqli_close($conn); 
?>
