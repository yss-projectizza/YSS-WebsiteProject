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
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/manage_attendees.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
  <?php include('header_loggedin.php') ?>
  <div class="container">
    <!-- Dashboard Title Registration Header -->
    <h1 align="center" style="font-size:50px;padding-top: 1%;">Manage Youth Participant</h1>
    <br>
    <p> This page allows you to add, remove, and edit your Youth Participant information. </p>
    <div class="block_1"></div>
    <hr />

    <div>
      <button type="button" class="rounded" id="add-youth-btn"
          onclick="document.location.href = './underage_registration.php';">+ Add Youth Participant
      </button>

      <!-- php -->
    <div class="container rounded box" id="add-youth">
      <div class="right">
        <a href="editchild.php?childid=<?php echo $childid; ?>" role="button"
          class="btn btn-sm btn-secondary">Edit Youth Participant</a>
        <button onclick="deleteChildById(<?php echo $childid; ?>)" id="deletecamper"
          class="btn btn-sm btn-danger">Delete Youth Participant</button>
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
</body>

</html>