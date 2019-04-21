<!-- Main logic for getting dashboard -->
<?php
session_start();

if( !$_SESSION["loggedin"]){
		header("Location: login.php");
		exit;
}

  $data = $_SESSION["queryData"];


  $user_type = $_SESSION["queryData"]["user_type"];

  if($user_type == "student" || $user_type == "student18" || $user_type == "counselor" || $user_type == "parent"){
    // add any needed data for student or counselor or parent
    $age = $_SESSION["queryData"]["age"];
    $dob = $_SESSION["queryData"]["dob"];
    $email = $_SESSION["queryData"]["email"];
    $file = $_SESSION["queryData"]["file"];
    $first_name = $_SESSION["queryData"]["first_name"];
    $gender = $_SESSION["queryData"]["gender"];
    $last_name = $_SESSION["queryData"]["last_name"];
    $size = $_SESSION["queryData"]["size"];
    
    $year = $_SESSION["queryData"]["year"];
    $group_num = $_SESSION["queryData"]["group_num"];
    $bus_num = $_SESSION["queryData"]["bus_num"];
    $cabin_num = $_SESSION["queryData"]["cabin_num"];
    $credit_due = $_SESSION["queryData"]["credit_due"];
    
    include 'dashboard/main_dashboard.php';
  } else if ($user_type == "admin"){
    // add any needed data for admin
    $name = "Admin";
    include 'dashboard/admin_dashboard.php';
  }
?>