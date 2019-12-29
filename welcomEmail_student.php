<?php



	if(!isset($_SESSION))
    {
        session_start();
    }

  require __DIR__.'/vendor/autoload.php';
	require __DIR__.'/vendor/PHPMailer/phpmailer/src/Exception.php';
	require __DIR__.'/vendor/PHPMailer/phpmailer/src/PHPMailer.php';
	require __DIR__.'/vendor/PHPMailer/phpmailer/src/SMTP.php';




  // This assumes that you have placed the Firebase credentials in the same directory
  // as this PHP file.
  use Kreait\Firebase\Factory;
  use Kreait\Firebase\ServiceAccount;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;



	/*
	define('SMTP_HOST','relay-hosting.secureserver.net');
	define('SMTP_PORT',25);
	define('SMTP_AUTH',true);
	*/

	$mail = new PHPMailer(true);



	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');


	$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->create();
	$database = $firebase->getDatabase();
	$reference = $database->getReference('/users')->getValue();




    if ($_GET["studentEmail"] && $_GET["reset"]=="true"){
		try {



			$mail->setFrom('youthspiritualsummit@gmail.com', 'Youth Spiritual Summit');
			$mail->addAddress($_GET['studentEmail']);

			$email = $_GET['studentEmail'];
			$comma_email = str_replace(".",",",$email);

			// send email with token
			$mail->Subject = 'Youth Spiritual Summit: Account Registration';

			// $mail->Body = 'Hi '.$studentName.', your Student Account has been created';
			$mail->Body = "Congratulations! You have already selected your bus, your cabin and your family \n
			$mail->Headers = 'From: youthspiritualsummit@gmail.com';
			//$mail = mail($email,$subject,$message,$headers);

			//$mail->isSMTP();
			//$mail->Host='relay-hosting.secureserver.net';
			$mail->Host='smtp.gmail.com';
			$mail->SMTPAuth = TRUE;
			$mail->SMTPSecure = 'tls';
			$mail->Username = 'youthspiritualsummit@gmail.com';
			$mail->Password = '1Mu$limretre@t';
			$mail->Port = 587;
			$mail->send();
		}
		catch (Exception $e)
		{
			echo $e->errorMessage();
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}


		if($mail){
				echo "Success. Email sent";
		} else {
				echo "failed. No email sent.";
		}



		//<script> window.location.href = "dashboard.php"; </script>
		echo "<script> window.location.replace('dashboard.php') </script>";
		exit;
    }

?>
