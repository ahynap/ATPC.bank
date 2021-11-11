<?php 

    /* Connect Database */

    session_start();
    include('..\server\server.php');

    $errors = array();

    $Email = $_SESSION['Email'];

    if (isset($_POST['repost_access'])) {

        /* Get Data */

        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);

        /* Check Fill Required */

        if (empty($AccountNo)) {
            array_push($errors, "AccountNo");
            $_SESSION['error'] = "Account number required !";
        }

        /* Check Account Money Number of Client --> View Transfer Transactions */

        $user_check_query = "SELECT * FROM accountnoinfo WHERE AccountNo = '$AccountNo'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

            if ($result['AccountNo'] != $AccountNo) {
                array_push($errors, "Account number not exists");
                $_SESSION['error'] = "Account number not exists";
                header("location: report_access.php");
            }
   
    if (count($errors) == 0) {

             /* Record history that Staff Access to Transfer Transactions of Client --> Insert Report History */
      
            $insert_reporthistory = "
            INSERT INTO reporthistory (StaffID, AccountNo)
            VALUES ((SELECT StaffID FROM staffaccount WHERE Email = '$Email'), '$AccountNo');
            ";
            mysqli_query($conn, $insert_reporthistory);

            $_SESSION['AccountNo'] = $AccountNo;
              
            header('location: ../ReportDetail/ReportDetail.php');

        } else {

            header("location: report_access.php");
        }
    }

?>