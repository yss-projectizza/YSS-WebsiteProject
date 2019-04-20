
<?php
session_start();

if(  (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])){
		//if parent account
		header("Location: dashboard.php");
		exit;

		//if student account

		//if adult account

		//if no account
}
?>



<?php
require __DIR__.'/vendor/autoload.php';



// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');


$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();
$database = $firebase->getDatabase();
$reference = $database->getReference('/emachta')->getValue();
print_r($reference["password"]);


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
		<title>Youth Spiritual Summit | Summer Day Camp | Irvine, CA</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredericka+the+Great">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<!-- <link rel="stylesheet" href="registrationstyle.css"> -->

		<!-- <link href="signin.css" rel="stylesheet"> -->
	</head>

<body class="text-center">
	<form style="display:inline-block;width:500;margin-top:50">

	  <img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="TEST" style="background-color:#dadada">
		<h1 class="h3 mb-3 font-weight-normal" style="margin-top:30">Login</h1>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
		<input class="btn btn-lg btn-primary btn-block" type="submit" id="submitbutton"></input>
		<hr>
		<a class="btn btn-sm btn-warning btn-block" href="/parentRegistration.html" role="button">Register</a>
		<a class="btn btn-sm btn-outline-info btn-block" href="/forgot" role="button">Forgot Password</a>
		<p class="mt-5 mb-3 text-muted" style="font-size:14">&copy; Youth Spiritual Summit 2019</p>
	</form>

	<script>
	document.getElementById("submitbutton").addEventListener("click", function(){
		var email = document.getElementById("inputEmail");

	})

	</script>


</body>
</html>
