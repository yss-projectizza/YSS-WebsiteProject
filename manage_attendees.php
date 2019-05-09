<?php
session_start();
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
    <!-- <div class="row" style="padding-bottom:100px">
      <div class="col" >
        <div id="test" class="card" style="border-color:grey; height: 40%;">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <a class="card-text"></a>
              <div class="right">
                <a href="editchild.php?childid=<?php echo $childid; ?>" role="button" class="btn btn-sm btn-secondary">Edit Youth Participant</a>
                <button onclick="deleteChildById(<?php echo $childid; ?>)" id="deletecamper" class="btn btn-sm btn-danger">Delete Youth Participant</button>
              </div>
            </div>		            
          </div>
        </div>
      </div>
    </div> -->

    <div id="test"></div>
  </body>
</html>


<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
    <script>
      let parent_email = decodeURIComponent(window.location.search.split("=")[1])

            var config = {
                apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
                authDomain: "yss-project-69ba2.firebaseapp.com",
                databaseURL: "https://yss-project-69ba2.firebaseio.com",
                projectId: "yss-project-69ba2",
                storageBucket: "yss-project-69ba2.appspot.com",
                messagingSenderId: "530416464878"
            };
            firebase.initializeApp(config);
          


          firebase.database().ref('/users').once('value').then(async function(snapshot) {
            console.log(snapshot.val())

            

            var idk = Object.entries(snapshot.val());
            console.log(idk)

            for(let i = 0; i < idk.length; i++){
              if (idk[i][1].parent_email == parent_email){
                console.log("found!", idk[i][0]);

                var div = document.createElement("div");  
                div.class = "card"

                var p = document.createElement("p"); 
                p.innerHTML = idk[i][0];
                div.appendChild(p); 
                
                
                document.getElementById("test").appendChild(div); 
                               
              }
            }


          });

        </script>
