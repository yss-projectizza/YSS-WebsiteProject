<?php
if(!isset($_SESSION))
{
    session_start();
}
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title> Reset Password | Youth Spiritual Summit</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!--
    <link rel = "stylesheet" href = "/css/parentRegistrationStyle.css ">
    -->
  </head>

  <body style = "text-align: center" >
    <?php include("header_loggedout.php")?>
    <form id= "reset-password-form" action="handle_password.php" method="post">
      <div class="container" style = "background: white; margin-top: 20px;">
          <!-- Parent Registration Header -->
          <h1 align="center" style = "font-size:40px;padding-top: 20px;">Reset Your Password</h1>
          <br>

        <div class="block_1"><p style="padding-top:20px"</div>
            <hr  style="
              border-width: medium;
              border-color: LightSteelBlue;
            " />
	
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Email:<b style = "color: red;">*</b></span>
            </div>
            <input id="email" type="email" name="email" placeholder="abcde@gmail.com" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Reset Token:<b style = "color: red;">*</b></span>
            </div>
            <input id="reset_token" type="text" name="reset_token" placeholder="Enter token from email." class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">New Password:<b style = "color: red;">*</b></span>
            </div>
            <input id="new_password" type="password" placeholder="Ex: abcde123 (8+ char, at least one number)" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" name="new_password" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Retype New Password:<b style = "color: red;">*</b></span>
            </div>
            <input id="new_password2" type="password" placeholder="Ex: abcde123 (8+ char, at least one number)" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" name="new_password2" class="form-control" required>
        </div>

        <div class="row margin-data"
          style = "padding-bottom: 50px;
                  padding-top: 10px;
                  align: center;">
      			<div class="col">
      				<button type="submit" id="submitPassword" name="continue" class="btn-xl" align="center" value="Submit">Submit
      			</div>
      		</div>
	</form>

    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
        <script>
            var config = {
                apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
                authDomain: "yss-project-69ba2.firebaseapp.com",
                databaseURL: "https://yss-project-69ba2.firebaseio.com",
                projectId: "yss-project-69ba2",
                storageBucket: "yss-project-69ba2.appspot.com",
                messagingSenderId: "530416464878"
            };
            firebase.initializeApp(config);


        </script>

</body>
</html>