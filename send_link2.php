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
        $mail->setFrom('boombychilly@gmail.com', 'boombychilly');
		$mail->addAddress($_GET['email'];
		
		// 10/13/2019: To be continue by sky, using the example mailTest.php
		
		
		$email = $_GET['email'];
        $comma_email = str_replace(".",",",$email);
        // get random token
        $length = 5;
        $token = bin2hex(random_bytes($length));

        // add token to database of email
        $database->getReference("users/$comma_email/token")->set($token);

        // send email with token 
        $subject = 'Youth Spiritual Summit: Password Reset';
        $message = "password reset token: $token \n reset link: http://localhost:8000/new_password.php";
        $headers = 'From: youthspiritualsummit@gmail.com';
        $mail = mail($email,$subject,$message,$headers);

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
