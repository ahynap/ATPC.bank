<?php
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATPC login</title>
    <link rel="stylesheet" href="login_client.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>

    <form action="login_client_insert.php" method="post">
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

    <!-- ----- Login form ----- --> 
    <form>

        <!-- ----- logo ATPC bank ----- --> 
        <div class="logo">
            <img src="logo_blue.png" width=242>
        </div>

        <!-- ----- logo ATPC bank ----- --> 
        <div class="SubmitForLogin">
            <input type="text" placeholder="Username" name="UserName">
            <input type="text" placeholder="Password" name="Password">
            <br>
            <button type="submit" class="btn" name="login_user"> LOG IN </button>
        </div>

        <!-- ----- Don’t have an account? ----- --> 
        <span class="Text-with-line"> Don’t have an account? </span>
      
        <!-- ----- SIGN UP FOR ATPC ACCOUNT button ----- --> 
        <div class="GoToSignIn">
            <button type="submit" class="btn" > SIGN UP FOR ATPC ACCOUNT </button>
        </div>
    </form>

</body>


</html>

<?php
    mysqli_close($conn); 
    echo "<br><br>";
    echo "--- END ---";

?>











