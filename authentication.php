<?php
session_start();
require __DIR__.'/vendor/autoload.php';

$username = $_POST["user"];
$password = $_POST["passwd"];

if ($username == "" || $password == ""){
    header("Location: Login.php");
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



if ($reference[$username]){
    if ($reference[$username]["password"] == $password){
        $_SESSION["loggedin"] = true;
        $_SESSION["queryData"] = $reference[$username];
        header("Location:Dashboard.php");
    }
}


		?>