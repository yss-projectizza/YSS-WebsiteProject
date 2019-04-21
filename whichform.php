<?php

session_start();
$redirectpagename =$_POST["user_type"];
$_SESSION["newuserinfo"] = $_POST;
header("Location:$redirectpagename");

?>