<?php
if(!isset($_SESSION))
{
    session_start();
}

require __DIR__.'/vendor/autoload.php';

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');


$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();
$database = $firebase->getDatabase();
$reference = $database->getReference('/users')->getValue();


$redirectpagename =$_POST["user_type"];
$_SESSION["newuserinfo"] = $_POST;
$year = substr($_SESSION["newuserinfo"]["age"],0,4);
$age = date("Y") - $year;

$actualEmail = $_SESSION["newuserinfo"]["email"];
$emailwithcomma = str_replace(".",",",$actualEmail);

function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

if($reference[$emailwithcomma]){
// print_r($reference[$emailwithcomma]);
// header("Location:MYcreateaccount.php");
alert("This email already exists. Please try again.");
include "MYcreateaccount.php";
exit;
}



if($age < 18) {
  header("Location:MYcreateaccount.php");
}
else{
  header("Location:$redirectpagename");
}

?>
