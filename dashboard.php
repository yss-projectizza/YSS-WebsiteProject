<!-- Main logic for getting dashboard -->
<?php
session_start();

if( !$_SESSION["loggedin"]){
		header("Location: login.php");
		exit;
}


    $data = $_SESSION["queryData"];


  $user = "student";



  if($user == "student" || $user == "counselor" || $user == "parent"){
    // add any needed data for student or counselor or parent
    $group_num = $data["groupNum"];
    $bus_num = $data["busNum"];
    $cabin_num = $data["cabinNum"];
    $name = $data["firstName"];
    $email = $data["email"];
    $status = $data["status"];
    include 'dashboard/main_dashboard.php';
  } else if ($user == "admin"){
    // add any needed data for admin
    $name = "Admin";
    include 'dashboard/admin_dashboard.php';
  }
?>