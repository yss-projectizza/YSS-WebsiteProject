<html>
<body>
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
      $updateFirebase($emailwcomma,$_POST);
      alert("Your account has been created successfully. Please log in to view your dashboard.");
      header("Location:login.php");
    }
  ?>
</body>
</html>
