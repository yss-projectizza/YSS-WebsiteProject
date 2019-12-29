<?php
	// Sky: This method will try to use PHPMailer to send mail
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
	
	$mail = new PHPMailer(TRUE);
    
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');
    
    
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
    $database = $firebase->getDatabase();
    $reference = $database->getReference('/users')->getValue();

    if ($_GET["email"] && $_GET["reset"]=="true"){
		try {
			
			
			$mail->setFrom('youthspiritualsummit@gmail.com', 'Youth Spiritual Summit');
			$mail->addAddress($_GET['email']);
			
			// 10/13/2019: To be continue by sky, using the example C:\xampp\htdocs\tests
			$email = $_GET['email'];
			$comma_email = str_replace(".",",",$email);
			// get random token
			$length = 5;
			$token = bin2hex(random_bytes($length));

			// add token to database of email
			$database->getReference("users/$comma_email/token")->set($token);

			// send email with token 
			$mail->Subject = 'Youth Spiritual Summit: Password Reset';
			$mail->Body = "This is an automated email from Youth Spiritual Summit to reset your password. A personalized token has been generated for you. Please use it to reset your password by clicking on the included link.\n
			
	Password reset token: $token \n 
	Reset link: http://localhost:8000/new_password.php";
			$mail->Headers = 'From: youthspiritualsummit@gmail.com';
			//$mail = mail($email,$subject,$message,$headers);
						
			$mail->isSMTP();
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
		catch (\Exception $e)
		{
			echo $e->getMessage();
		}
		
		

        if($mail){
            echo "success. Email sent";
        } else {
            echo "failed. No email sent."; 
        }
   
        // go back to login.php
        include "login.php";
        exit;
    }
?>
