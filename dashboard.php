<?php



    if(!isset($_SESSION))
    {
        session_start();
    }

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

if( !$_SESSION["loggedin"]){
		header("Location: login.php");
		exit;
}

  $data = $_SESSION["queryData"];


  $user_type = $_SESSION["queryData"]["user_type"];

  if($user_type == "student" || $user_type == "counselor" || $user_type == "parent"){
    if($user_type == "student")
    {
      $email = $_SESSION["queryData"]["studentEmail"];
      $year = $_SESSION["queryData"]["year"];
	  $defaultPassword = $_SESSION["queryData"]["defaultPassword"];
	  $password = $_SESSION["queryData"]["password"];
    }
    else
    {
      $email = $_SESSION["queryData"]["email"];
    }

    $first_name = $_SESSION["queryData"]["first_name"];
    $last_name = $_SESSION["queryData"]["last_name"];
    if ($user_type == "student" || $user_type == "counselor"){
      $group_num = $_SESSION["queryData"]["group_num"];
      $bus_num = $_SESSION["queryData"]["bus_num"];
      $cabin_num = $_SESSION["queryData"]["cabin_num"];
    }
    if($user_type == "parent"){
      $credit_due = $_SESSION["queryData"]["credit_due"];
    }

	
	
	// Check if student's password is still their default password. If yes, update current data
	// to make sure data is udpated.
	if ($user_type == "student" and $password == $defaultPassword){
		//echo "<script type='text/javascript'>alert('$email');</script>";
		$username = str_replace(".", ",", $email);
		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');
		$firebase = (new Factory)
			->withServiceAccount($serviceAccount)
			->create();
		$database = $firebase->getDatabase();
		$reference = $database->getReference('/users')->getValue();
		
		if (array_key_exists($username,$reference)){
			$_SESSION["queryData"] = $reference[$username];
		}
		$defaultPassword = $_SESSION["queryData"]["defaultPassword"];
		$password = $_SESSION["queryData"]["password"];
	}
	
	// Check student's password again after updating data. If student's password is still default password,
	// redirect student to profile page.
	if ($user_type == "student" and $password == $defaultPassword){	
		header("Location: dashboard/main_users/profile.php");		
	}
	else {
		include 'dashboard/main_dashboard.php';
	}
  } else if ($user_type == "admin"){
    // add any needed data for admin
    $name = "Admin";
    include 'dashboard/admin_dashboard.php';
  }
?>
