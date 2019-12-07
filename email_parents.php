<?php
// Updated: 12/04/2019 19:11
	if(!isset($_SESSION))
    {
        session_start();
    }

  require __DIR__.'/vendor/autoload.php';
	require __DIR__.'/vendor/PHPMailer/phpmailer/src/Exception.php';
	require __DIR__.'/vendor/PHPMailer/phpmailer/src/PHPMailer.php';
	require __DIR__.'/vendor/PHPMailer/phpmailer/src/SMTP.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer(true);

    if ($_GET["email"] && $_GET["reset"]=="true"){
		try {

			$mail->setFrom('info@youthspiritualsummit.com', 'Youth Spiritual Summit');
			$mail->addAddress($_GET['email']);

			$email = $_GET['email'];
			$comma_email = str_replace(".",",",$email);

			// send email with token
			$mail->Subject = 'Youth Spiritual Summit: Account Registration';

			// $mail->Body = 'Hi '.$studentName.', your Student Account has been created';
			$mail->Body = "Welcome to Youth Spiritual Summit. You have created an account. The login email address for your account is the email address this email is being sent to. Please use the link below to log in. Thank you.\n
Login page: http://www.youthspiritualsummit.com/login.php\n
This is an auto-generated email; please do not reply to this email. For any question, please email us at youthspiritualsummit@gmail.com";
				$mail->Headers = 'From: info@youthspiritualsummit.com';
			//$mail = mail($email,$subject,$message,$headers);

			$mail->isSMTP();
			//$mail->Host='relay-hosting.secureserver.net';
			$mail->Host='a2plcpnl0093.prod.iad2.secureserver.net';
			$mail->SMTPAuth = TRUE;
			$mail->SMTPSecure = 'tls';
			$mail->Username = 'info@youthspiritualsummit.com';
			$mail->Password = 'admin1234';
			$mail->Port = 587;
			$mail->send();
			echo "Email has been sent successfully!";
		}
		catch (Exception $e)
		{
			echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		echo "<script>
				window.location.replace('login.php')
				</script>";
		exit;
    }
?>
