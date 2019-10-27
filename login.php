<?php
	if(!isset($_SESSION)) 
	{ 
			session_start(); 
	} 

	if(  (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])){
		header("Location: dashboard.php");
		exit;

}
?>


<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>
<script>
  // Initialize Firebase
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

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Original Authors: Mark Otto, Jacob Thornton, and Bootstrap contributors -->
		<title>Sign in | Youth Spiritual Summit</title>
		<link rel="stylesheet" href="/css/main.css">
		<link rel="stylesheet" href="/css/login.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredericka+the+Great">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<!-- <link rel="stylesheet" href="registrationstyle.css"> -->
		<!-- <link href="signin.css" rel="stylesheet"> -->
	</head>

	<body class="text-center">
		<form action="authentication.php" method="POST">
				<div class="box rounded">
					<a title="Go back to Homepage" id="brandToHome" class="navbar-brand"
					href="http://youthspiritualsummit.weebly.com">
							<img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png"
							 width="200" height="80" alt="TEST" style="background-color:#5b77a5">
					</a>
					<hr>
					<h1 class="h3 mb-3 font-weight-normal" style="margin-top:10">Login</h1>
					<label for="inputEmail" class="sr-only">Email address</label>
					<input name="user" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" name="passwd" id="inputPassword" class="form-control" placeholder="Password" required>
					<input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign In" id="submitbutton"></input>
					<hr>

					<button type="reset" onclick="location.href = '/MYcreateaccount.php'" id="register"
					 class="btn btn-med btn-outline-info btn-block" role="button"
					 style="margin-top:18">Register</button>
					 
					<script>
						function registerApprove() {
						var age = prompt("Please enter your age:", "");
						if (age == null) {
							window.alert("Age not entered.");

						}
						else if (age >= 18){
							window.location.href = "/MYcreateaccount.php";
							exit();
						}
						else {
							window.alert("You must be 18 to register for an account.");
						}
						}
					</script>
				
					<button type="reset" onclick="forgotPassword()" id="forgot" class="btn btn-med btn-outline-info btn-block" role="button" style="margin-top:10">Forgot Password?</button>
					<script>
						function forgotPassword() {
							var email = prompt("Please enter your email:", "abcde@gmail.com");
							if (email != null){
								var comma_email = email.replace(/\./g,',');
								var ref = firebase.database().ref("/users");
								ref.once("value").then(function(snapshot){
									if (snapshot.child(comma_email).exists()){
										alert("A link to reset your password has been sent to (" + email +").");
										window.location.href = "send_link2.php?email=" + email + "&reset=true";
									}
									else {
										alert('The email: (' + email + ') does not exist in the system. Please create an account.');
									}
								});
							}	
						}
					</script>

					<!-- <a id="forgot" class="btn btn-med btn-outline-info btn-block" href="/forgot" role="button" style="margin-top:12">Forgot Password</a> -->
					<p class="mt-5 mb-3 text-muted" style="font-size:14">&copy; Youth Spiritual Summit 2019</p>
				</div>
		</form>
	</body>
</html>
