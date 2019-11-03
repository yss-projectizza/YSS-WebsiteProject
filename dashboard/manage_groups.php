<?php
if (!isset($_SESSION))
  session_start();
?>
<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

<html lang="en">
  <head>
    <title>Manage Groups | Youth Spiritual Summit</title>
      
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/student_tables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body> 
    <?php include('../header_loggedin.php') ?>

    <div class="container">
    <!-- Dashboard Title Registration Header -->
    <h1 align="center" style="font-size:50px;padding-top: 2%;">Manage Groups</h1>
    <br>
    <p> Add or delete families, cabins, and buses.</p>
    <hr/>
    </div>
    <div class="card container">
        <div class="dropdown">
            <button id="toggle-sort" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Manage:
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item">Group</a>
            </div>
        </div>
    </div>
  </body>
</html>