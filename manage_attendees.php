<?php
session_start();
}
?>

<?php
    $user_type = "admin";
    if($user_type == "admin"){
        $first_name = "First Name";
        $last_name = "Last Name";
        $group_num = 3;
        $bus_num = 10;
        $cabin_num = 15;
        $name = "admin";
        $email = "test@example.com";
        $status = "Registered!";
        $credit = "50";
        $price = "299";
        $childid = 123456;
        include 'dashboard/manage_attendees.php';
    }
?>
<html lang="en">
  <head>
    <title>Youth Spiritual Summit</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/manage_attendees.css">
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
  <div class="container" style = "background: white; margin-top: 20px;">
      <!-- Dashboard Title Registration Header -->
      <h1 align="center" style = "font-size:50px;padding-top: 20px;">Manage Youth Participant</h1>
      <br>
      <p> This page allows you to add, remove, and edit your Youth Participant information. </p>
  <div class="block_1"><p style="padding-top:20px"></div> <hr />

  <div>
    <div id="todos" class="box">
      <div class="row">
        <div class="col my-auto" style="padding-bottom: 20px;">
          <a href="./underage_registration.php" type="button" class="btn btn btn-success" style="border-color: white">+ Add Youth Participant</a>
        </div>        
      </div>
  </div>

  <!-- php -->
    <div class="row" style="padding-bottom:50px">
      <div class="col">
        <div class="card" style="border-color:grey; height: 30%;">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <a class="card-text"></a>
              <div class="right">
                <a href="editchild.php?childid=<?php echo $childid; ?>" role="button" class="btn btn-sm btn-secondary">Edit Youth Participant</a>
                <button onclick="deleteChildById(<?php echo $childid; ?>)" id="deletecamper" class="btn btn-sm btn-danger">Delete Youth Participant</button>
              </div>
            </div>
            <div class="left">
              <h3><?php echo $first_name . " " . $last_name ?></h3>
              <h4>Amount Paid: $<?php echo $price?></h4>
              <h4>Credit: $<?php echo $credit?></h4><br>
              <form action="updateAdditionalPaid.php" method="post">
                Update Credit: <input type="number" step="0.01" name="amount">
                <input type="hidden" name="childid" value="<?php echo $childid ?>">
                <input type="submit" value="Submit">
              </form>  
            </div>			            
          </div>
        </div>
      
      <!-- FOOTER -->
        <div class="footer top-buffer">
          <div class="container">
            <div class="row align-items-center">
              <div class="col">
                <a class="footerphone">
                  Call us:<br>
                  949-422-8123
                </a>
              </div>
              <div class="vertline"></div>
              <div class="col">
                <p>YSS</p>
              </div>
              <div class="vertline"></div>
              <div class="col">
                © 2019 Youth Spiritual Summit
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
