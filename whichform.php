<?php

session_start();

$redirectpagename =$_POST["user_type"];
$_SESSION["newuserinfo"] = $_POST;
$year = substr($_SESSION["newuserinfo"]["age"],0,4);
$age = date("Y") - $year;

if($age < 18) {
  header("Location:MYcreateaccount.php");
}
else{
  header("Location:$redirectpagename");
}

?>
