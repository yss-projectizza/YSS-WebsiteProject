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

    if($redirectpagename != "parentRegistration.php") {
        $userInfo = array(
          "dob" => $_SESSION["newuserinfo"]["age"],
          "bus_num" => "N/A",
          "group_num" => "N/A",
          "cabin_num" => "N/A",
          "email" => $_SESSION["newuserinfo"]["email"],
          "account_verified" => true
        );
        if($redirectpagename == "overage_registration.php") {
          $userInfo["user_type"] = "student18";
          $userInfo["credit_due"] = "299";
        }
        elseif($redirectpagename == "underage_registration.php") {
          $userInfo["user_type"] = "student";
          $userInfo["credit_due"] = "299";
          $userInfo["account_verified"] = false;
        }
        elseif($redirectpagename == "counselor_registration.php") {
          $userInfo["user_type"] = "counselor";
          $userInfo["account_verified"] = false;
        }

    }
    else {
        $userInfo = array(
          "dob" => $_SESSION["newuserinfo"]["age"],
          "email" => $_SESSION["newuserinfo"]["email"],
          "account_verified" => true
        );

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
