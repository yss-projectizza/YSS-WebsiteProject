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

$comma_email = str_replace(".",",",$_POST['email']);
$redirectpagename = "new_password.php";

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

echo $emailwcomma;

// if email not in database
if(!$reference[$comma_email]){
    alert("This email is not in the database. Please try again.");
    include $redirectpagename;
    exit;
}

// if reset token not associated with email
else if ($reference[$comma_email]["token"] != $_POST['reset_token']){
    alert("This reset token is not associated with this email address. Please try again.");
    include $redirectpagename;
    exit;
}

// check password comparison
else if($_POST['new_password'] != $_POST['new_password2']) {
    alert("The passwords do not match. Please try again.");
    include $redirectpagename;
    exit;
}

// free to change password for user
else {
    $updates = [
        "/users/$comma_email/password" => $_POST['new_password'],
    ];
    $database->getReference() // this is the root reference
        ->update($updates);

    $database->getReference("/users/$comma_email/token")->remove();

    alert("Your password has been changed successfully. Please log in to view your dashboard.");
    include "login.php";
    exit;
}
?>