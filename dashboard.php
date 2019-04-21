<!-- Main logic for getting dashboard -->
<?php
session_start();

if( !$_SESSION["loggedin"]){
		header("Location: login.php");
		exit;
}

  $data = $_SESSION["queryData"];


  $user_type = "student";

  if($user_type == "student" || $user_type == "student18" || $user_type == "counselor" || $user_type == "parent"){
    // add any needed data for student or counselor or parent
    $group_num = $data["first_name"];
    $bus_num = "registered";
    $cabin_num = "registered";
    $name = "registered";
    $email = "registered";
    $status = "registered";
    
    include 'dashboard/main_dashboard.php';
  } else if ($user_type == "admin"){
    // add any needed data for admin
    $name = "Admin";
    include 'dashboard/admin_dashboard.php';
  }
?>