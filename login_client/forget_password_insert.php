<?php

    session_start();
    include('..\server\server.php');

	if(isset($_POST['password-reset-token']) && $_POST['Email'])
	{
     
    $emailId = mysqli_real_escape_string($conn, $_POST['Email']);
 
    $result = mysqli_query($conn,"SELECT * FROM account WHERE Email = '$emailId'");
 
    $row = mysqli_fetch_array($result);
 
  if($row)
  {
  	
  	$token = md5($emailId).rand(10,9999);

    $update = mysqli_query($conn,"UPDATE account SET Token = '$token' WHERE Email = '$emailId'");

    $link = "<a href='http://localhost/ATPCBank_1044/login_client/reset_password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";
 
    require '../PHPMailer/PHPMailerAutoload.php';
 
    $mail = new PHPMailer;
 	
    $mail->IsSMTP();
    // sets GMAIL as the SMTP server
    $mail->Host = 'smtp.gmail.com';
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "atpc.companyinternational@gmail.com";
    // GMAIL password
    $mail->Password = "10254466";
    
    $mail->SMTPSecure = "tls";  
    // set the SMTP port for the  GMAIL server
    $mail->Port = 587;
    $mail->setFrom('atpc.companyinternational@gmail.com', 'AT PC'); 
    $mail->addAddress($emailId);
    $mail->Subject = 'Reset Password';
    $mail->IsHTML(true);
    $mail->Body = 'Click On This Link to Reset Password '.$link.'';;

    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "Invalid Email Address. Go back";
  }
}


?>