<?php
session_start();

// Require https
if ($_SERVER['HTTPS'] != "on") {
$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
}

if(  (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])){
		//if parent account
		header("Location: dashboard.php");
		exit;

}   else {
		header("Location: login.php");
}
?>
