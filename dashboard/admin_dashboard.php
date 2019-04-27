<?php
      if(!isset($_SESSION))
          session_start();
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

<html lang="en">
  <head>
    <title>Youth Spiritual Summit</title>
    <script src="dashboard/main_dashboard.js"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navigation.php') ?>
    <main class="main">
      <div class="main-cards">
        <div class="card">
          <h3>This is admin page</h3>
          <p id="data"></p>
            <script>
              firebase.database().ref('/').once('value').then(async function(snapshot) {
                let alldata = Object.keys(snapshot.val().users);
                let printdata = alldata.map(item=>{
                  return '<p><a href=/admin_profile.php?name=' + item +'>' + item + '</a></p>'
                })
                document.getElementById("data").innerHTML = printdata;
              });

            </script>
        </div>
        <div class="card">
        </div>
        <div class="card">
        </div>
      </div>
    </main>
  </body>
</html>

