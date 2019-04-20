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
  if($user == "student"){
    $group_num = 3;
    $bus_num = 10;
    $cabin_num = 15;
    $name = "Student";
    $email = "test@example.com";
    include 'dashboards/student_dashboard.php';
  } else if ($user == "counselor"){
    $name = "Counselor";
    include 'dashboards/counselor_dashboard.php';
  } else if ($user == "admin"){
    $name = "Admin";
    include 'dashboards/admin_dashboard.php';
  }

?>