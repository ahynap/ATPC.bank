<?php
    /* Connect Database */
    session_start();
    include('..\server\server.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mode staff</title>
    <link rel="stylesheet" href="role.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>
 
    <!-- ----- Login form ----- --> 
    <form method="post">

       

        <!-- ----- STAFF OPTIONS ----- --> 
        <span class="Text_question"> STAFF OPTIONS </span>


        <!-- ----- Add account number botton ----- --> 
        <div class="client_role">
            <button type="button" class="btn" onClick="this.form.action='../add_accountNo_staff/add_accountNo_staff.php'; submit()">
                Add account number 
            </button>
        </div>

        <!-- ----- History botton ----- --> 
        <div class="staff_role">
            <button type="button" class="btn" onClick="this.form.action='../report/report_access.php'; submit()">
                 History   
            </button>
        </div>

    </form>
   
</body>
</html>
<?php
    mysqli_close($conn); 
?>











