<!-- Main logic for getting dashboard -->
<?php
//session_start();
$user = "counselor";
// check whether use is a student or a counselor or admin
/*if(!($_SESSION["loggedin"])){
  //if parent account
  header("Location: login.php");
  exit;
}*/

  // get respective info from the database
  // temp dummy data
  if($user == "student"){
    $group_num = 3;
    $bus_num = 10;
    $cabin_num = 15;
    $name = "Hello";
    $email = "test@example.com";
    include 'student_dashboard.php';
  } else if ($user == "counselor"){
    $name = "Hello";
    include 'counselor_dashboard.php';
  }

?>