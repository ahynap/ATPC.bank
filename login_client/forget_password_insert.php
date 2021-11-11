<?php
    
    /* Connect Database */

    session_start();
    include('..\server\server.php');

	if(isset($_POST['password-reset-token']) && $_POST['Email'])
	{

     /* Get Data */
     
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
 
    $result = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$Email'");
 
    $getresult = mysqli_fetch_array($result);

    /* Check If Email Usage Exist */
 
    if($getresult)
    {
  	     
        /* Token to Verify Identity */

    	$Token = md5($Email).rand(10,9999);

        $update = mysqli_query($conn,"UPDATE account SET Token = '$Token' WHERE Email = '$Email'");

        /* Link to Reset Password */

        $link = "<a href='http://localhost/ATPCBank_1044/login_client/reset_password.php?key=".$Email."&token=".$Token."'>CLICK TO RESET PASSWORD</a>";
 
        /* PHP Mailer Class */

        require '../PHPMailer/PHPMailerAutoload.php';
 
        $mail = new PHPMailer;
 	
        $mail->IsSMTP();

        /* Sets GMAIL as The SMTP Server */
        $mail->Host = 'smtp.gmail.com';

        /* Enable SMTP Authentication */
        $mail->SMTPAuth = true;            

        /* Sender GMAIL Username */
        $mail->Username = "atpc.companyinternational@gmail.com";

        /* Sender GMAIL Password */
        $mail->Password = "10254466";
    
        $mail->SMTPSecure = "tls";  

        /* Set The SMTP Port For The  GMAIL Server */
        $mail->Port = 587;

        $mail->setFrom('atpc.companyinternational@gmail.com', 'AT PC'); 

        /* Recipient GMAIL Username */
        $mail->addAddress($Email);

        $mail->Subject = 'Reset Password';

        $mail->IsHTML(true);

        $mail->Body = 'CLICK THIS LINK TO RESET YOUR PASSWORD --> '.$link.'';

    /* Send Success */

    if($mail->Send())
    {

      echo "Reset Password Link Has Been Send To Your Email ! , Please Check Your Email";
    }  

    /* Send NOT Success */

    else {

      echo "Send Mail Error - >".$mail->ErrorInfo;

    }

  } else {

    echo "Invalid Email Address. Please Try Agian";

  }
}

?>