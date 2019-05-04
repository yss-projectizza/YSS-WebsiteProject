<html>
<body>
  <?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    require 'formHandle.php';

    $userCreated = false;
    $emailwcomma = str_replace(".",",",$_SESSION["newuserinfo"]["email"]);
    $redirectpagename = $_SESSION["newuserinfo"]["user_type"];
    $userInfo = array(
      "dob" => $_SESSION["newuserinfo"]["age"],
      "bus_num" => "N/A",
      "group_num" => "N/A",
      "cabin_num" => "N/A",
      "credit_due" => "N/A"
    );
    function alert($msg) {
      global $userCreated, $redirectpagename;
      echo "<script type='text/javascript'>
        alert('$msg');
        /*
        if($userCreated == true){
          location = 'login.php';
        }
        else{
          location = 'overage_registration.php';
        }
        */
      </script>";
    }
    if($_POST["password"] != $_POST["password2"]) {
      alert("Retyped password must match password");
      //header("Location:overage_registration.php");
    }
    else {
      $updateFirebase($emailwcomma, $userInfo, $_POST);
      alert("Your account has been created successfully. Please log in to view your dashboard.");
      header("Location:login.php");
    }
  ?>
</body>
</html>
