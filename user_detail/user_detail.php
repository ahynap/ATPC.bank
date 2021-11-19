<?php

    /* Connect Database */ 

    session_start();
    include('..\server\server.php');

     /* Use Email Session to Access Data from Database for Display 'Username' and Profile Detail of Client */ 

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
    <title>User Detail</title>
    <link rel="stylesheet" href="user_detail.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin" rel="stylesheet"
        type="text/css" />
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

    <!-- ----- Niv Bar ----- -->
    <div class="niv_bar">

        <!-- ----- logo ATPC bank ----- -->
        <div class="logo">
            <input type="image" src="logo_blue.png" width="100" onclick="window.location.href='../MainAccount/mainAccount.php'" ?>
        </div>

        <!-- ----- logout button ----- -->
        <button type="submit" class="btn" onclick="window.location.href='../login_client/login_client.php'"> LOG OUT
        </button>

        <div class="icon">
            <img src="picture/client_icon.png" width=58.36>
        </div>

        <!-- ----- User's name show here! ----- -->
        <div class="user_detail">
            <?php while($row3 = mysqli_fetch_array($result3)) { ?>
            <span class="show_name" href="#"
                style="width: 350px; left: 450px; text-align: center"><?php echo $row3["Email"]; ?></span> <?php }
    ?>
        </div>
    </div>


    <!-------- header text  -------->
    <span class="header_txt">
        PROFILE <br />
        INFORMATION
    </span>

    <!-------- Personal detail Form -------->
    <div class="content">
        <form action="user_detail_insert.php" method="post">
            
            <!-- Personal Details text -->
            <p class="Personal_Details">Personal Details</p>
            <p class="name_surname">Name</p>

            <br />

            <!-- Edit display name -->
            <div class="Edit_displayName">

                <?php
             while($row = mysqli_fetch_array($result)) {
        ?>
                <!-- Edit name -->
                <input type="text" name="Name" placeholder=<?php echo $row["Name"]; ?> />
                <br />

            </div>

            <p class="name_surname">Surname</p>
            <br />

            <div class="Edit_displayName">
                
                <!-- Edit surname -->
                <input type="text" name="SurName" placeholder=<?php echo $row["SurName"]; ?> />
                <br />

            </div>

            <!-------- Edit Password Button  -------->
            <button type="button" class="Password_btn" onclick="location.href='old_password.php'"> Edit Password
                <img src="picture/edit.png" /></button>

            <br />

            <?php
            }
        ?>

            <!-- Save button -->
            <!-- link into user detail page -->
            <button type="submit" class="save_btn" name="user_detail">
                SAVE
            </button>
        </form>
    </div>
</body>

</html>

<?php
    mysqli_close($conn); 
?>