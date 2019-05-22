<?php
session_start();
?>


<html lang="en">

<head>
  <title>Youth Spiritual Summit</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/manage_attendees.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
  <?php include('header_loggedin.php') ?>
  <div class="container">
    <!-- Dashboard Title Registration Header -->
    <h1 align="center" style="font-size:50px;padding-top: 2%;">Manage Youth Participant</h1>
    <br>
    <p> This page allows you to add, remove, and edit your Youth Participant information. </p>
    <div class="block_1"></div>
    <hr />

    <div>
      <button class="rounded" id="add-youth-btn" onclick="document.location.href = './underage_registration.php';">+ Add
        Youth Participant
      </button>
      <div class="container rounded box" id="add-youth"></div>
    </div>
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

  firebase.database().ref('/users').once('value').then(async function (snapshot) {

    var users = Object.entries(snapshot.val());

    for (let i = 0; i < users.length; i++) {
      if (users[i][1].parent_email == parent_email) {
        buildYouthDiv(users[i][1],users[i][0]);
      }
    }
  });

  function deleteYouth(key){
    firebase.database().ref("/users/"+key).remove();
  }

  function buildYouthDiv(youth,key){
    const boxDiv = document.createElement('div');
    boxDiv.classList.add('rounded', 'box', 'youth-info');

    const infoDiv = document.createElement('div');
    infoDiv.classList.add('left');
    infoDiv.innerHTML = "<h3>"+youth.first_name + " " + youth.last_name + "</h3>" +
                        "<h4>Amount Due: <span style='color: red;'>$299</span></h4>" +
                        "<h4>Credit: <span style='color: green;'>$0</span></h4></br>"
                        
    
    const buttonDiv = document.createElement('div');
    buttonDiv.classList.add('right');
    const editButton = document.createElement('button');
    editButton.classList.add('rounded');
    editButton.id = 'edit-youth';
    editButton.innerHTML = "Edit Youth Participant";
    buttonDiv.appendChild(editButton);
    const deleteButton = document.createElement('button');
    deleteButton.classList.add('rounded');
    deleteButton.id = 'delete-youth';
    deleteButton.innerHTML = "Delete Youth Participant";
    deleteButton.onclick = () => {var delete_user = confirm("Are you sure you would like to delete this youth participant?"); if (delete_user) {deleteYouth(key);alert("Deleted youth participant successfully.")}}
    buttonDiv.appendChild(deleteButton);

    boxDiv.appendChild(infoDiv);
    boxDiv.appendChild(buttonDiv);

    document.getElementById("add-youth").appendChild(boxDiv);
  }

</script>