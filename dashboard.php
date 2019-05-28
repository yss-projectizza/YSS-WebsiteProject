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
  
  if($user_type == "student" || $user_type == "student18" || $user_type == "counselor" || $user_type == "parent"){
    $email = $_SESSION["queryData"]["email"];
    $first_name = $_SESSION["queryData"]["first_name"];
    $last_name = $_SESSION["queryData"]["last_name"];
    if ($user_type == "student" || $user_type == "student18" || $user_type == "counselor"){
      $year = $_SESSION["queryData"]["year"];
      $group_num = $_SESSION["queryData"]["group_num"];
      $bus_num = $_SESSION["queryData"]["bus_num"];
      $cabin_num = $_SESSION["queryData"]["cabin_num"];
    }
    if($user_type == "student18" || $user_type == "parent"){
      $credit_due = $_SESSION["queryData"]["credit_due"];
    }
    
    include 'dashboard/main_dashboard.php';
  } else if ($user_type == "admin"){
    // add any needed data for admin
    $name = "Admin";
    include 'dashboard/admin_dashboard.php';
  }
?>