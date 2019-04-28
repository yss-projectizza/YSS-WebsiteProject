<?php
  if(!isset($_SESSION))
  {
      session_start();
  }
  require 'formHandle.php';
  $emailwcomma = str_replace(".",",",$_SESSION["newuserinfo"]["email"]);
  if($_POST["password"] != $_POST["password2"]) {
    alert("Retyped password must match password");
  }
  else {
    $setToFirebase($emailwcomma,$_POST);
  }
?>
