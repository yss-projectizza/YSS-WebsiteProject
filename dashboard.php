<!-- Main logic for getting dashboard -->
<?php
  //session_start();
  $user = "student";
/*if(!($_SESSION["loggedin"])){
  //if parent account
  header("Location: login.php");
  exit;
}*/

  // get respective info from the database
  // temp dummy data
  // check whether use is a student or a counselor or admin
  if($user == "student" || $user == "counselor" || $user == "parent"){
    // add any needed data for student or counselor or parent
    $group_num = 3;
    $bus_num = 10;
    $cabin_num = 15;
    $name = "Grace Choe";
    $email = "test@example.com";
    $status = "Registered!";
    include 'dashboard/main_dashboard.php';
  } else if ($user == "admin"){
    // add any needed data for admin
    $name = "Admin";
    include 'dashboard/admin_dashboard.php';
  }
?>