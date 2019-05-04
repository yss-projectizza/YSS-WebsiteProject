<?php
session_start();
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
        
    }
?>
<html lang="en">
  <head>
    <title>Youth Spiritual Summit</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/manage_attendees.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <?php include('header_loggedin.php') ?>
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
              <h4>Amount Due: $<?php echo $price?></h4>
              <h4>Credit: $<?php echo $credit?></h4><br>
              <!-- <form action="updateAdditionalPaid.php" method="post">
                Update Credit: <input type="number" step="0.01" name="amount">
                <input type="hidden" name="childid" value="<?php echo $childid ?>">
                <input type="submit" value="Submit">
              </form>   -->
            </div>			            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
