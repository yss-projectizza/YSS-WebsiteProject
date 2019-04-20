<?php
session_start();
$user = "student";
// check whether use is a student or a counselor or admin
if ($user == "student") {
  // get respective info from the database
  // temp dummy data
  $group_num = 3;
  $bus_num = 10;
  $cabin_num = 15;
  $name = "Hello";
  $email = "test@example.com";
}
?>
<html lang="en">
  <head>
    <title>Youth Spiritual Summit</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-sm navbar-light bg-white">
		<div class="container" style = "background: LightSteelBlue">
			<a class="navbar-brand" href="http://youthspiritualsummit.weebly.com">
				<img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav mx-auto">
					<a class="nav-item nav-link" href="http://youthspiritualsummit.weebly.com"><font color="white">Home</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/calendar"><font color="white">Activities</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/camp-fees"><font color="white">Fees</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/contact"><font color="white">Contact</font></a>
				</div>
			</div>
		</div>
	</nav>
    <h1>Welcome to your Dashboard!</h1>
    <div>
      <div id="todos" class="box">
        <h2>Your To Dos:</h2>
        <p>Checklist placeholder</p>
      </div>
      <div class="hidden box">
        <h2>Camp Information</h2>
        <p>Group Number: <?php echo $group_num; ?></p>
        <p>Bus Number: <?php echo $bus_num; ?></p>
        <p>Cabin Number: <?php echo $cabin_num; ?></p>
      </div>
      <div class="hidden box">
        <h2>Your Information</h2>
        <p>Name: <?php echo $name; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Password: </p>
        <p>ETC</p>
      </div>
    </div>
  </body>
</html>