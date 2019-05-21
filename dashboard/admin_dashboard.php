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

  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/dashboard.css">
  <link rel="stylesheet" href="/css/admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <script>
    function update_groupnum(event,id){
      firebase.database().ref('/users/' + id + '/group_num').set(event.target.value);  
    }

    function update_cabinnum(event,id){
      firebase.database().ref('/users/' + id + '/cabin_num').set(event.target.value);  
    }

    function update_busnum(event,id){
      firebase.database().ref('/users/' + id + '/bus_num').set(event.target.value);  
    }
    </script>
</head>

<body>
  <?php include('header_loggedin.php') ?>
  <main class="main">
    <h3>Admin Panel</h3>
    <div class="main-cards">
      <div class="card">
        <h3>Name - Group Number - Bus Number - Cabin Number</h3>
        <div id="data">
</div>
        <script>
          firebase.database().ref('/').once('value').then(async function (snapshot) {
            let alldata = Object.entries(snapshot.val().users);

            let printdata = alldata.map(item => {
              return ("<p><a href=/admin_profile.php?name=" + item[0] + "><button class='rounded'>" + item[1].first_name 
              + " " + item[1].last_name + "</button></a><input onchange='update_groupnum(event," + `"${item[0]}"` + ")' + value="
              +  item[1].group_num + '></input>' + "<input onchange='update_cabinnum(event," + `"${item[0]}"` + ")' + value="
              +  item[1].cabin_num + '></input>' + "<input onchange='update_busnum(event," + `"${item[0]}"` + ")' + value="
              +  item[1].bus_num + '></input>'
            );})



            document.getElementById("data").innerHTML += printdata.join("");
          });
        </script>
      </div>
      <!-- <div class="card">
        <h3>Groups</h3>
        <p id="group_numbers"></p>
        <script>
          firebase.database().ref('/').once('value').then(async function (snapshot) {
            let alldata = Object.entries(snapshot.val().users);
            let newarray = {};
            for (var index in alldata) {
              if (alldata[index][1].user_type !== "parent" && alldata[index][1].user_type !== "admin") {
                if (!(newarray[alldata[index][1].group_num]))
                  newarray[alldata[index][1].group_num] = new Array();
                newarray[alldata[index][1].group_num].push(alldata[index][0]);
              }
            }
            let groupobjectdata = Object.entries(newarray);
            let printdata = groupobjectdata.map(item => {
              return '<p>' + item[0] + ": " + "<p>" + item[1].map(item2 => {
                return '<p style="color:red;">' + item2 + '</p>'
              }).join("") + '</p></p>'
            })
            document.getElementById("group_numbers").innerHTML = printdata.join("");
          });
        </script>
      </div>

      <div class="card">
        <h3>Buses</h3>
        <p id="bus_numbers"></p>
        <script>
          firebase.database().ref('/').once('value').then(async function (snapshot) {
            let alldata = Object.entries(snapshot.val().users);
            let newarray = {};
            for (var index in alldata) {
              if (alldata[index][1].user_type !== "parent" && alldata[index][1].user_type !== "admin") {
                if (!(newarray[alldata[index][1].bus_num]))
                  newarray[alldata[index][1].bus_num] = new Array();
                newarray[alldata[index][1].bus_num].push(alldata[index][0]);
              }
            }
            let groupobjectdata = Object.entries(newarray);
            let printdata = groupobjectdata.map(item => {
              return '<p>' + item[0] + ": " + "<p>" + item[1].map(item2 => {
                return '<p style="color:red;">' + item2 + '</p>'
              }).join("") + '</p></p>'
            })
            document.getElementById("bus_numbers").innerHTML = printdata.join("");
          });
        </script>
      </div>

      <div class="card">
        <h3>Cabins</h3>
        <p id="cabin_numbers"></p>
        <script>
          firebase.database().ref('/').once('value').then(async function (snapshot) {
            let alldata = Object.entries(snapshot.val().users);
            let newarray = {};
            for (var index in alldata) {
              if (alldata[index][1].user_type !== "parent" && alldata[index][1].user_type !== "admin") {
                if (!(newarray[alldata[index][1].cabin_num]))
                  newarray[alldata[index][1].cabin_num] = new Array();
                newarray[alldata[index][1].cabin_num].push(alldata[index][0]);
              }
            }
            let groupobjectdata = Object.entries(newarray);
            let printdata = groupobjectdata.map(item => {
              return '<p>' + item[0] + ": " + "<p>" + item[1].map(item2 => {
                return '<p style="color:red;">' + item2 + '</p>'
              }).join("") + '</p></p>'
            })
            document.getElementById("cabin_numbers").innerHTML = printdata.join("");
          });
        </script>
      </div> -->

      <div class="card">
        <h3>Schedule</h3>
        <p id="schedule"></p>
        <div id="inside-div">

          <div>

            <br/>
            <br/>
            <div id="schedule_buttons">
              <button id="addEvent" class="rounded">
                Add an event
              </button>
              <button id="submit" class="rounded">
                Submit
              </button>
              <br/>
              <br/>
            </div>
            <div id="dropdown-groupnum" class="dropdown-menu" aria-labelledby="dropdownMenuButton"></div>
            <script>
              var counter = 0

  

                let schedule_buttons = document.getElementById("schedule_buttons");
                schedule_buttons.style.display = "block";

                firebase.database().ref('/schedule/').once('value').then(item => {

                  if (!item.val()){
                    var firebasedataArray = [];
                  }
                  else{
                    var firebasedataArray= Object.entries(item.val());
                  }

                  for (let i = 0; i < firebasedataArray.length; ++i) {
                    let key = firebasedataArray[i][0];
                    counter++;
                    var updiv = document.getElementById("inside-div");
                    const eventDiv = document.createElement('div');

                    var label = document.createElement("label");
                    var input = document.createElement("input");
                    input.classList.add('input');
                    label.innerHTML = "Event " + counter;
                    input.type = "text";
                    input.id = "eventinput" + counter;
                    input.value = firebasedataArray[i][1]["event"];
                    eventDiv.appendChild(label);
                    eventDiv.appendChild(input);

                    var label = document.createElement("label");
                    var input = document.createElement("input");
                    input.classList.add('input');
                    label.innerHTML = "Time " + counter;
                    input.type = "text";
                    input.id = "timeinput" + counter;
                    input.value = firebasedataArray[i][1]["time"];
                    eventDiv.appendChild(label);
                    eventDiv.appendChild(input);

                    var label = document.createElement("label");
                    var input = document.createElement("input");
                    input.classList.add('input');
                    label.innerHTML = "Date " + counter;
                    input.type = "text";
                    input.id = "dateinput" + counter;
                    input.value = firebasedataArray[i][1]["date"];
                    eventDiv.appendChild(label);
                    eventDiv.appendChild(input);

                    var label = document.createElement("label");
                    var input = document.createElement("input");
                    input.classList.add('input');
                    label.innerHTML = "Group " + counter;
                    input.type = "text";
                    input.id = "groupinput" + counter;
                    input.value = firebasedataArray[i][1]["group"];
                    eventDiv.appendChild(label);
                    eventDiv.appendChild(input);

                    function delete_event(id){
                      firebase.database().ref('/schedule/' + id).remove();
                    }

                    var deletebutton = document.createElement("button");
                    deletebutton.innerHTML = "Delete"
                    deletebutton.onclick = () => {delete_event(key);alert("deleted successfully.");location.reload();}
                    
                    eventDiv.appendChild(label);
                    eventDiv.appendChild(input);
                    eventDiv.appendChild(deletebutton);


                    updiv.appendChild(eventDiv);
                  }
                });

                addEventButton = document.getElementById("addEvent");
                addEventButton.addEventListener("click", function () {

                  const eventDiv = document.createElement('div');
                  var updiv = document.getElementById("inside-div");
                  counter++;

                  var label = document.createElement("label");
                  var input = document.createElement("input");
                  label.innerHTML = "Event " + counter;
                  input.type = "text";
                  input.id = "eventinput" + counter;
                  eventDiv.appendChild(label);
                  eventDiv.appendChild(input);

                  var label = document.createElement("label");
                  var input = document.createElement("input");
                  label.innerHTML = "Time " + counter;
                  input.type = "text";
                  input.id = "timeinput" + counter;
                  eventDiv.appendChild(label);
                  eventDiv.appendChild(input);

                  var label = document.createElement("label");
                  var input = document.createElement("input");
                  label.innerHTML = "Date " + counter;
                  input.type = "text";
                  input.id = "dateinput" + counter;
                  eventDiv.appendChild(label);
                  eventDiv.appendChild(input);

                  var label = document.createElement("label");
                  var input = document.createElement("input");
                  label.innerHTML = "Group " + counter;
                  input.type = "text";
                  input.id = "groupinput" + counter;
                  eventDiv.appendChild(label);
                  eventDiv.appendChild(input);

                  updiv.appendChild(eventDiv);
                });
                newdict = {}

                document.getElementById("submit").addEventListener("click", function () {
                  newdict = {}
                  firebase.database().ref('/schedule/').set(null);

                  for(let i = 1; i <= counter; ++i){
                  
                    newdict["event"] = document.getElementById("eventinput" + i).value;
                    newdict["time"] = document.getElementById("timeinput" + i).value;
                    newdict["date"] = document.getElementById("dateinput" + i).value;
                    newdict["group"] = document.getElementById("groupinput" + i).value;
                    firebase.database().ref('/schedule/').push(newdict);
                  }
                  
                  
                });
              
            </script>
          </div>

        </div>
  </main>
</body>

</html>