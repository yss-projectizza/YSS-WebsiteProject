<?php
session_start();
$user = "student";
// if user is a student or a counselor
if ($user == "student") {
  // get respective info from the database
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
  </head>
  <body>
    <nav>
      <ul class="navigation">
        <li><a class="active" href="http://youthspiritualsummit.weebly.com">Home</a></li>
      </ul>
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