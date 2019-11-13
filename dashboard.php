<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

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
	
	if ($user_type == "student" && $password == $defaultPassword){
		
		//include 'dashboard/main_dashboard.php';
	    include "dashboard/main_users/profile.php";
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
