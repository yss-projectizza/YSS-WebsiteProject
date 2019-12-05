<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    //This will display errors 
    ini_set('display_errors', 1);
require __DIR__.'/vendor/autoload.php';
$underscoreUsername = $_POST["user"];
$username = str_replace(".",",",$underscoreUsername);

$password = $_POST["passwd"];

if ($username == "" || $password == ""){
    header("Location: login.php");
}

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

if (array_key_exists($username,$reference)){
    if ($reference[$username]["password"] == $password){
        $_SESSION["loggedin"] = true;
        $_SESSION["queryData"] = $reference[$username];
        header("Location:dashboard.php");
    } else {
        include "login.php";
        echo "<script type='text/javascript'>alert('Incorrect Password. Please Try Again');</script>";
        exit;
    }
}
else {
    include "login.php";
    echo "<script type='text/javascript'>alert('Unrecognized email. Please try again or register for an account.');</script>";
    exit;
}
?>