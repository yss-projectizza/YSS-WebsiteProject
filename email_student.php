<?php 

	
	
	if(!isset($_SESSION))
    {
        session_start();
    }

  require __DIR__.'/vendor/autoload.php';




  // This assumes that you have placed the Firebase credentials in the same directory
  // as this PHP file.
  use Kreait\Firebase\Factory;
  use Kreait\Firebase\ServiceAccount;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	
	
	$mail = new PHPMailer(true);
	//echo "In Email Function";
	
  
	
	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');
    
    
	$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->create();
	$database = $firebase->getDatabase();
	$reference = $database->getReference('/users')->getValue();
	


		
    if ($_GET["studentEmail"] && $_GET["reset"]=="true"){
		try {
			
			
			$mail->setFrom('info@youthspiritualsummit.com', 'Youth Spiritual Summit');
			$mail->addAddress($_GET['studentEmail']);
	
			$email = $_GET['studentEmail'];
			$comma_email = str_replace(".",",",$email);
	
			// send email with token 
			$mail->Subject = 'Youth Spiritual Summit: Account Registration';
			
			// $mail->Body = 'Hi '.$studentName.', your Student Account has been created';
			$mail->Body = "Your student account has been created. Your temporary password is your last name and birth year, all in lower cases. Please use the link below to log in. Once log in, please update your password and personal information immediately. Thank you.\n
Login page: http://localhost:8000/login.php";
			$mail->Headers = 'From: youthspiritualsummit@gmail.com';
			//$mail = mail($email,$subject,$message,$headers);
						
			$mail->isSMTP();
			$mail->Host='a2plcpnl0093.prod.iad2.secureserver.net';
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Username = 'info@youthspiritualsummit.com';
			$mail->Password = 'admin123';
			$mail->Port = 465;
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
				echo "success. Email sent";
		} else {
				echo "failed. No email sent."; 
		}
		
		
		
		//<script> window.location.href = "dashboard.php"; </script>
		echo "<script> window.location.replace('dashboard.php') </script>";
		exit;
    }
		
?>
