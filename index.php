<?php
session_start();
$_SESSION["loggedin"] = false;


if(  (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])){
		echo "USER IS LOGGED IN";
		//if parent account
		header("Location: dashboard.php");
		exit;

		//if student account

		//if adult account

		//if no account
}   else {
		echo "NOT LOGGED IN";

}
?>
