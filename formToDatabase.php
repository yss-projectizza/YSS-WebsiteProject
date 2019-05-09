<html>
<body>
  <?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    require 'formHandle.php';

    $emailwcomma = str_replace(".",",",$_SESSION["newuserinfo"]["email"]);
    $redirectpagename = $_SESSION["newuserinfo"]["user_type"];

    if($redirectpagename != "parentRegistration.php" &&
      $redirectpagename != "counselor_registration.php") {
        if($redirectpagename == "overage_registration.php") {
          $userType = "student18";
        }
        elseif($redirectpagename == "underage_registration.php") {
          $userType = "student";
        }
        $userInfo = array(
          "dob" => $_SESSION["newuserinfo"]["age"],
          "bus_num" => "N/A",
          "group_num" => "N/A",
          "cabin_num" => "N/A",
          "credit_due" => "299",
          "user_type" => $userType,
          "email" => $_SESSION["newuserinfo"]["email"]
        );
    }
    else {
        $userInfo = array(
          "dob" => $_SESSION["newuserinfo"]["age"],
          "email" => $_SESSION["newuserinfo"]["email"]
        );
        if($redirectpagename == "counselor_registration.php") {
          $userInfo["user_type"] = "counselor";
        }
        if($redirectpagename == "parentRegistration.php") {
          $userInfo["user_type"] = "parent";
          $userInfo["credit_due"] = "299";
        }
    }
    if($_POST["password"] != $_POST["password2"]) {
        //header("refresh:5; url=localhost:8000/overage_registration.php");
        alertRedirect("$redirectpagename", "Retyped password must match password");
    }
    else {
      $updateFirebase($emailwcomma, $userInfo, $_POST);
        //header("refresh:5; url=localhost:8000/login.php");
      alertRedirect("login.php",
      "Your account has been created successfully. Please log in to view your dashboard.");
    }
  ?>
</body>
</html>
