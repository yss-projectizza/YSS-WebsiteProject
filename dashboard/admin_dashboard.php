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
        <h3>Driver's License</h3>
        <div id="dlImages"></div>
        <script>
          firebase.database().ref('/').once('value').then(async function(snapshot) {
            let alldata = Object.entries(snapshot.val().users);
            console.log("alldata: ", alldata);
            let newarray = [];
            for(var index in alldata){
              console.log("alldata[", index, "] = ", alldata[index]);
              if( alldata[index][1].user_type == "parent" || alldata[index][1].user_type == "student18"){
                var email = (alldata[index][1].email).replace(".",",");
                var dlRef = firebase.storage().ref('dl/'+email);
                //console.log('dl/'+ (alldata[index][1].email).replace(".",","));
                dlRef.getDownloadURL().then(function(url){
                  console.log("url: ", url);
                  var image = document.createElement("img");
                  image.src = url;
                  var br = document.createElement("br");
                  var desc = document.createTextNode(alldata[index][1].firstname + " " + alldata[index][1].lastname);
                  var dlDiv = document.getElementById("dlImages");
                  dlDiv.appendChild(desc);
                  dlDiv.appendChild(br);
                  dlDiv.appendChild(image);
                  dlDiv.appendChild(br);
                }).catch(function(error){
                  switch (error.code) {
                    case 'storage/object-not-found': // File doesn't exist
                      console.log("file doesn't exist");
                      break;
                    case 'storage/unauthorized': // User doesn't have permission to access the object
                      console.log("no permission");
                      break;
                    case 'storage/canceled': // User canceled the upload
                      console.log("canceled");
                      break;
                    case 'storage/unknown': // Unknown error occurred, inspect the server response
                      console.log("unknown error");
                      break;
                  }
                });
              }
            }
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

    </div>
  </main>
</body>
</html>