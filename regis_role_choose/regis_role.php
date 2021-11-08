<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register role</title>
    <link rel="stylesheet" href="role.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
</head>

<body>
 
    <!-- ----- Login form ----- --> 
    <form method="post">

        <div class="back">
            <button type="submit" class="btn" onClick="this.form.action='../login_client/login_client.php'; submit()"> BACK </button>
        </div>

        <!-- ----- WHO ARE YOU? ----- --> 
        <span class="Text_question"> WHO ARE YOU? </span>


        <!-- ----- Client botton ----- --> 
        <div class="client_role">
            <button type="button" class="btn" onClick="this.form.action='../regis_client/regis_client.php'; submit()">
                CLIENT 
               <input type="image" src="client.png" class="pic_in_btn"/>
            </button>
        </div>

        <!-- ----- Staff botton ----- --> 
        <div class="staff_role">
            <button type="button" class="btn" onClick="this.form.action='../regis_staff/regis_staff.php'; submit()">
                    STAFF
                <input type="image" src="staff.png" class="pic_in_btn"/>
            </button>
        </div>

    </form>
   
</body>


</html>











