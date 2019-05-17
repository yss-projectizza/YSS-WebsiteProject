<?php
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

  <?php
  $emailwithperiod = $_SESSION["queryData"]["email"];
  $emailwithcomma = str_replace(".", ",", $emailwithperiod);
  ?>
  
  var email = "<?php echo $emailwithcomma; ?>"
  var bus_num = "<?php echo $_SESSION['queryData']['bus_num']; ?>"
  var cabin_num = "<?php echo $_SESSION['queryData']['cabin_num']; ?>"
  var group_num = "<?php echo $_SESSION['queryData']['group_num']; ?>"
  var user_type = "<?php echo $_SESSION['queryData']['user_type']; ?>"

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
   
    <?php include('../../header_loggedin.php') ?>

    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'Family')">Family</button>
      <button class="tablinks" onclick="openCity(event, 'Bus')">Bus</button>
      <button class="tablinks" onclick="openCity(event, 'Cabin')">Cabin</button>
    </div>

    <div id="Family" class="tabcontent">
        <script>
          firebase.database().ref('/users').once('value').then(item => {

            let firebasedataArray = Object.entries(item.val());

            for (let i = 0; i < firebasedataArray.length; ++i) {
              console.log(firebasedataArray[i][1])
              if (group_num == firebasedataArray[i][1].group_num && firebasedataArray[i][1] != email) {
                var updiv = document.getElementById("group_data");
                var newp = document.createElement("ul");

                if(user_type == "counselor"){
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " * " + firebasedataArray[i][1].phone;
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " " + firebasedataArray[i][1].phone;
                  }               
                  updiv.appendChild(newp)
                }else{
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " *";
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name;
                  }            
                }             
                updiv.appendChild(newp)
              }
            }
          });
        </script>
        <h3>Family: <?php echo $_SESSION["queryData"]["group_num"]; ?> </h3>
        <div id="group_data"></div>
    </div>

    <div id="Bus" class="tabcontent">
      <script>
        firebase.database().ref('/users').once('value').then(item => {

          let firebasedataArray = Object.entries(item.val());

          for (let i = 0; i < firebasedataArray.length; ++i) {
            console.log(bus_num);
            console.log(firebasedataArray[i][1].bus_num);
            if (bus_num == firebasedataArray[i][1].bus_num && firebasedataArray[i][1] != email) {
              var updiv = document.getElementById("bus_data");
              var newp = document.createElement("ul");

              if(user_type == "counselor"){
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " * " + firebasedataArray[i][1].phone;
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " " + firebasedataArray[i][1].phone;
                  }               
                  updiv.appendChild(newp)
                }else{
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " *";
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name;
                  }            
                }
              updiv.appendChild(newp)
            }
          }
        });
      </script>
      <h3>Bus: <?php echo $_SESSION["queryData"]["bus_num"]; ?> </h3>
      <div id=bus_data> </div>
    </div>

    <div id="Cabin" class="tabcontent">
        <script>
          firebase.database().ref('/users').once('value').then(item => {

            let firebasedataArray = Object.entries(item.val());

            for (let i = 0; i < firebasedataArray.length; ++i) {
              if (cabin_num == firebasedataArray[i][1].cabin_num && firebasedataArray[i][1] != email) {
                var updiv = document.getElementById("cabin_data");
                var newp = document.createElement("ul");

                if(user_type == "counselor"){
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " * " + firebasedataArray[i][1].phone;
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " " + firebasedataArray[i][1].phone;
                  }               
                  updiv.appendChild(newp)
                }else{
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " *";
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name;
                  }               
                  updiv.appendChild(newp)
                }
              }
            }
          });
        </script>
        <h3 id="cabin_num">Cabin: <?php echo $_SESSION["queryData"]["cabin_num"]; ?></h3>
        <div id="cabin_data"></div>
    </div>

    <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
             
      </div>
    </div>
  </body>
</html>
