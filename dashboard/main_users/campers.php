<?php
  session_start();
?>
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

  var bus_num = "<?php echo $_SESSION['queryData']['bus_num']; ?>"
  var group_num = "<?php echo $_SESSION['queryData']['group_num']; ?>"
  var cabin_nunum = "<?php echo $_SESSION['queryData']['cabin_num']; ?>"

</script>

<html lang="en">
  <head>
    <title>View Group Details</title>
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
      <button class="tablinks" onclick="toggleInfo(event, 'group')">Family</button>
      <br>
      <div id="bus" class="tabcontent">
            <script>
              let counter = 0
              firebase.database().ref('/users').once('value').then(item => {

                let firebasedataArray = Object.entries(item.val());

                for (let i = 0; i < firebasedataArray.length; ++i) {
                  if (bus_num == firebasedataArray[i][1].bus_num) {
                    var updiv = document.getElementById("bus_data");
                    var newp = document.createElement("ul");

                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name;
                    if($user_type == "counselor"){
                      new.innerHTML += " *";
                    }
                    updiv.appendChild(newp)
                  }
                }
              });
            </script>
            <b>Bus: <?php echo $bus_num; ?> </b>
            <div id=bus_data> </div>
      </div>
      <div id="cabin" class="tabcontent">
            <script>
              let counter = 0
              firebase.database().ref('/users').once('value').then(item => {

                let firebasedataArray = Object.entries(item.val());

                for (let i = 0; i < firebasedataArray.length; ++i) {
                  if (cabin_num == firebasedataArray[i][1].cabin_num) {
                    var updiv = document.getElementById("cabin_data");
                    var newp = document.createElement("ul");

                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name;
                    updiv.appendChild(newp)
                  }
                }
              });
            </script>
        <h3 id="cabin_num">Cabin: <?php echo $_SESSION["queryData"]["cabin_num"]; ?></h3>
        <div id="cabin_data"></div>
      </div>
      <div id="group" class="tabcontent">
        <h3 id="group_num">Family: <?php echo $_SESSION["queryData"]["group_num"]; ?></h3>
            <script>
              let counter = 0
              firebase.database().ref('/users').once('value').then(item => {

                let firebasedataArray = Object.entries(item.val());

                for (let i = 0; i < firebasedataArray.length; ++i) {
                  if (group_num == firebasedataArray[i][1].group_num) {
                    var updiv = document.getElementById("group_data");
                    var newp = document.createElement("ul");

                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name;
                    updiv.appendChild(newp)
                  }
                }
              });
            </script>
        <div id="group_data"></div>
      </div>
    </div>
  </body>
</html>
