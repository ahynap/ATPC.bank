<?php 
    session_start();
    include('..\server\server.php');

    $errors = array();

    $Email = $_SESSION['Email'];

    if (isset($_POST['repost_access'])) {
        $AccountNo = mysqli_real_escape_string($conn, $_POST['AccountNo']);

        if (empty($AccountNo)) {
            array_push($errors, "AccountNo");
            $_SESSION['error'] = "Account required!";
        }


        $user_check_query = "SELECT * FROM accountnoinfo WHERE AccountNo = '$AccountNo'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

            if ($result['AccountNo'] != $AccountNo) {
                array_push($errors, "Account number not exists");
                $_SESSION['error'] = "Account number not exists";
                header("location: report_access.php");
            }
   
    if (count($errors) == 0) {
            {
            $sql = "
            INSERT INTO reporthistory (StaffID, AccountNo)
            VALUES ((SELECT StaffID FROM staffaccount WHERE Email = '$Email'), '$AccountNo');
            ";
            mysqli_query($conn, $sql);

            $_SESSION['AccountNo'] = $AccountNo;
         }
            
            header('location: ../ReportDetail/ReportDetail.php');
        } else {
            header("location: report_access.php");
        }
    }

?>