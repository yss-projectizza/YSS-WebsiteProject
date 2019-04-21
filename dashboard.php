<!-- Main logic for getting dashboard -->
<?php
session_start();

/* if( !$_SESSION["loggedin"]){
		header("Location: login.php");
		exit;
} */


  $data = $_SESSION["queryData"];

  $user_type = "student";

  if($user_type == "student" || $user_type == "student18" || $user_type == "counselor" || $user_type == "parent"){
    // add any needed data for student or counselor or parent
    $group_num = $data["group_num"];
    $bus_num = $data["bus_num"];
    $cabin_num = $data["cabin_num"];
    $name = $data["first_name"];
    $email = $data["email"];
    $status = $data["status"];
    include 'dashboard/main_dashboard.php';
  } else if ($user_type == "admin"){
    // add any needed data for admin
    $name = "Admin";
    include 'dashboard/admin_dashboard.php';
  }
?>