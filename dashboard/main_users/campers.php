<?php
  session_start();
?>
<html lang="en">
  <head>
    <title>View Campers</title>
      <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
       <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
    <script src="/dashboard/main_users/campers.js"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/campers.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <?php include('../../navigation.php') ?>
    <div class="container rounded box">
      <button class="tablinks" onclick="toggleInfo(event, 'bus')">Bus</button>
      <button class="tablinks" onclick="toggleInfo(event, 'cabin')">Cabin</button>
      <button class="tablinks" onclick="toggleInfo(event, 'group')">Group</button>
      <br>
      <div id="bus" class="tabcontent">
        <h3 id="bus_num">Bus #<?php echo $_SESSION["queryData"]["bus_num"]; ?> </h3>
        <p id="bus_data"></p>
      </div>
      <div id="cabin" class="tabcontent">
        <h3 id="cabin_num">Cabin #<?php echo $_SESSION["queryData"]["cabin_num"]; ?></h3>
        <p id="cabin_data"></p>
      </div>
      <div id="group" class="tabcontent">
        <h3 id="group_num">Group #<?php echo $_SESSION["queryData"]["group_num"]; ?></h3>
        <p id="group_data"></p>
      </div>
    </div>
  </body>
</html>
