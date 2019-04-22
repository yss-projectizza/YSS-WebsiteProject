<?php
  session_start();
?>
<html lang="en">
  <head>
    <title>View Campers</title>
    <script src="/dashboard/main_users/campers.js"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/campers.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light">
      <div class="container">
        <a class="navbar-brand" href="http://youthspiritualsummit.weebly.com">
          <img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="" style="background-color:#5b77a5">
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

    <div class="container rounded box">
      <button class="tablinks" onclick="toggleInfo(event, 'bus')">Bus</button>
      <button class="tablinks" onclick="toggleInfo(event, 'cabin')">Cabin</button>
      <button class="tablinks" onclick="toggleInfo(event, 'group')">Group</button>
      <br>
      <div id="bus" class="tabcontent">
        <h3 id="bus_test">Bus #<?php echo $_SESSION["queryData"]["bus_num"]; ?> </h3>
        <p id="data">This is bus information. </p>
      </div>
      <div id="cabin" class="tabcontent">
        <h3>Cabin #<?php echo $_SESSION["queryData"]["cabin_num"]; ?></h3>
        <p>This is cabin information. </p>
      </div>
      <div id="group" class="tabcontent">
        <h3>Group #<?php echo $_SESSION["queryData"]["group_num"]; ?></h3>
        <p>This is group information. </p>
      </div>
    </div>
    
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
    
      <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>

  </body>
</html>
