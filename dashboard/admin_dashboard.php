<?php
if (!isset($_SESSION))
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
  <?php include('header_loggedin.php') ?>
  <main class="main">
    <h3>Admin Panel</h3>
    <div class="main-cards">
      <div class="card">
        <h3>Edit User Information</h3>
        <p id="data"></p>
        <script>
          firebase.database().ref('/').once('value').then(async function(snapshot) {
            let alldata = Object.keys(snapshot.val().users);
            let printdata = alldata.map(item => {
              // console.log(item) 
              return '<p><a href=/admin_profile.php?name=' + item + '><button>' + item + '</button></a></p>'
            })
            document.getElementById("data").innerHTML = printdata.join("");
          });
        </script>
      </div>
      <div class="card">
        <h3>Groups</h3>
        <p id="group_numbers" />
        <script>
          firebase.database().ref('/').once('value').then(async function(snapshot) {
            let alldata = Object.entries(snapshot.val().users);
            // console.log(alldata)
            let newarray = {};
            for(var index in alldata){
              if( alldata[index][1].user_type !== "parent" && alldata[index][1].user_type !== "admin"){
                if(!(newarray[alldata[index][1].group_num]))
                  newarray[alldata[index][1].group_num] = new Array();
                newarray[alldata[index][1].group_num].push(alldata[index][0]);
              }

              
            }
            let groupobjectdata = Object.entries(newarray);
            let printdata = groupobjectdata.map(item => {
              return '<p>'+ item[0] + ": "+ "<p>" + item[1].map(item2 => {return '<p style="color:red;">' + item2 + '</p>'}).join("") + '</p></p>'
            })
            document.getElementById("group_numbers").innerHTML = printdata.join("");
          });
          </script>
      </div>

      <div class="card">
        <h3>Buses</h3>
        <p id="bus_numbers" />
        <script>
          firebase.database().ref('/').once('value').then(async function(snapshot) {
            let alldata = Object.entries(snapshot.val().users);
            // console.log(alldata)
            let newarray = {};
            for(var index in alldata){
              if( alldata[index][1].user_type !== "parent" && alldata[index][1].user_type !== "admin"){
                if(!(newarray[alldata[index][1].bus_num]))
                  newarray[alldata[index][1].bus_num] = new Array();
                newarray[alldata[index][1].bus_num].push(alldata[index][0]);
              }

              
            }
            let groupobjectdata = Object.entries(newarray);
            let printdata = groupobjectdata.map(item => {
              return '<p>'+ item[0] + ": "+ "<p>" + item[1].map(item2 => {return '<p style="color:red;">' + item2 + '</p>'}).join("") + '</p></p>'
            })
            document.getElementById("bus_numbers").innerHTML = printdata.join("");
          });
          </script>
      </div>

      <div class="card">
        <h3>Cabins</h3>
        <p id="cabin_numbers" />
        <script>
          firebase.database().ref('/').once('value').then(async function(snapshot) {
            let alldata = Object.entries(snapshot.val().users);
            // console.log(alldata)
            let newarray = {};
            for(var index in alldata){
              if( alldata[index][1].user_type !== "parent" && alldata[index][1].user_type !== "admin"){
                if(!(newarray[alldata[index][1].cabin_num]))
                  newarray[alldata[index][1].cabin_num] = new Array();
                newarray[alldata[index][1].cabin_num].push(alldata[index][0]);
              }

              
            }
            let groupobjectdata = Object.entries(newarray);
            let printdata = groupobjectdata.map(item => {
              return '<p>'+ item[0] + ": "+ "<p>" + item[1].map(item2 => {return '<p style="color:red;">' + item2 + '</p>'}).join("") + '</p></p>'
            })
            document.getElementById("cabin_numbers").innerHTML = printdata.join("");
          });
          </script>
      </div>

      <div class="card">
        <h3>Schedule</h3>
        <p id="schedule" />
        <div id="inside-div">
          
        <div>

        <button id="addEvent">
              Add an event
            </button>
          <button id="submit">
              Submit
            </button>
        <script>
          var counter = 0
            


            firebase.database().ref('/schedule/6').once('value').then(item => 
            {
              let firebasedataArray = Object.entries(item.val());

              for(let i = 0; i < firebasedataArray.length/ 3; ++i){
                counter++;
                

              var updiv = document.getElementById("inside-div");
              

              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Event " + counter;
              input.type = "text"
              input.id = "eventinput" + counter
              input.value = firebasedataArray[i][1];
              document.getElementById("inside-div").appendChild(label);
              document.getElementById("inside-div").appendChild(input);

              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Time " + counter;
              input.type = "text"
              input.id = "timeinput" + counter;
              input.value = firebasedataArray[i][1];
              document.getElementById("inside-div").appendChild(label);
              document.getElementById("inside-div").appendChild(input);


              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Date " + counter;
              input.type = "text"
              input.id = "dateinput" + counter;
              input.value = firebasedataArray[i][1];
              document.getElementById("inside-div").appendChild(label);
              document.getElementById("inside-div").appendChild(input);
              updiv.appendChild(input)

              }
            }
            ); 
            addEventButton = document.getElementById("addEvent");
            addEventButton.addEventListener("click", function(){
              counter++;
              
              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Event " + counter;
              input.type = "text"
              input.id = "eventinput" + counter
              document.getElementById("inside-div").appendChild(label);
              document.getElementById("inside-div").appendChild(input);

              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Time " + counter;
              input.type = "text"
              input.id = "timeinput" + counter
              document.getElementById("inside-div").appendChild(label);
              document.getElementById("inside-div").appendChild(input);
              
              var label = document.createElement("label");
              var input = document.createElement("input");
              label.innerHTML = "Date " + counter;
              input.type = "text"
              input.id = "dateinput" + counter
              document.getElementById("inside-div").appendChild(label);
              document.getElementById("inside-div").appendChild(input);
              
            });
            newdict = {}

            document.getElementById("submit").addEventListener("click", function(){
              for (let i = 1; i <= counter; i++){
                newdict["event" + i] = document.getElementById("eventinput" + i).value;
                newdict["time" + i] = document.getElementById("timeinput" + i).value;
                newdict["date" + i] = document.getElementById("dateinput" + i).value;
              }
            firebase.database().ref('/schedule/6').set(newdict);
          });

          </script>
      </div>

    </div>
  </main>
</body>
</html>