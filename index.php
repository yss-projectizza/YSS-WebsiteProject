<?php
session_start();


if(  (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])){
		//if parent account
		header("Location: dashboard.php");
		exit;

		//if student account

		//if adult account

		//if no account
}   else {
		header("Location: login.php");


}
?>
