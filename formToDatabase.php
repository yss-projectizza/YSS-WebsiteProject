<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    require 'formHandle.php';

    $emailwcomma = str_replace(".",",",$_SESSION["newuserinfo"]["email"]);
    $redirectpagename = $_SESSION["newuserinfo"]["user_type"];

    if($redirectpagename == "counselor_registration.php")
    {
        $userInfo = array(
          "dob" => $_SESSION["newuserinfo"]["age"],
          "bus_num" => "N/A",
          "group_num" => "N/A",
          "cabin_num" => "N/A",
          "email" => $_SESSION["newuserinfo"]["email"],
          "account_verified" => true);

          $userInfo["user_type"] = "counselor";
          $userInfo["account_verified"] = false;
    }
    elseif($redirectpagename == "parentRegistration.php")
    {
        $userInfo = array(
          "dob" => $_SESSION["newuserinfo"]["age"],
          "email" => $_SESSION["newuserinfo"]["email"],
          "account_verified" => true);

        if($redirectpagename == "parentRegistration.php")
        {
			    $userInfo["group_num"] = "";
          $userInfo["user_type"] = "parent";
          $userInfo["credit_due"] = "0";
        }
    }

    if($_POST["password"] != $_POST["password2"])
    {
        alertRedirect("$redirectpagename", "Retyped password must match password");
    }
    else
    {
      $updateFirebase($emailwcomma, $userInfo, $_POST);

      // window.location.href = 'email_parents.php?email=' + $_SESSION['newuserinfo']['email'] + '&reset=true';

      // echo "<script> window.location.replace('dashboard.php') </script>";

      $email = $_SESSION["newuserinfo"]["email"];

      echo "<script type='text/javascript'>
              window.location.href = 'email_parents.php?email=$email&reset=true';
            </script>";

      alertRedirect("login.php",
      "Your account has been created successfully. Please log in to view your dashboard.");

    }
?>
