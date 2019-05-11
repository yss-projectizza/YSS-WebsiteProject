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
      <!-- php -->
      <div class="container rounded box" id="add-youth">
        <div class="rounded box youth-info">
          <div class="right">
            <button class="rounded" id="edit-youth"
              onclick="document.location.href = './editchild.php?childid=<?php echo $childid; ?>';">
              Edit Youth Participant
            </button>
            <button class="rounded" id="delete-youth" onclick="deleteChildById(<?php echo $childid; ?>)">
              Delete Youth Participant
            </button>
          </div>
          <div class="left">
            <h3><?php echo $first_name . " " . $last_name ?></h3>
            <h4>Amount Due: <span style="color: red;">$<?php echo $price?></span></h4>
            <h4>Credit: <span style="color: green;">$<?php echo $credit?></span></h4><br>
            <!-- <form action="updateAdditionalPaid.php" method="post">
          Update Credit: <input type="number" step="0.01" name="amount">
          <input type="hidden" name="childid" value="<?php echo $childid ?>">
          <input type="submit" value="Submit">
        </form>  -->
          </div>
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
    console.log(snapshot.val())

    var users = Object.entries(snapshot.val());
    console.log("this is users" + users);

    for (let i = 0; i < users.length; i++) {
      if (users[i][1].parent_email == parent_email) {
        buildYouthDiv(users[i][1]);
      }
    }
  });

  function buildYouthDiv(youth){
    const boxDiv = document.createElement('div');
    boxDiv.classList.add('rounded', 'box', 'youth-info');

    const infoDiv = document.createElement('div');
    infoDiv.classList.add('left');
    infoDiv.innerHTML = "<h3>"+youth.first_name + " " + youth.last_name + `</h3>
                        <h4>Amount Due: <span style="color: red;">$<?php echo $price?></span></h4>
                        <h4>Credit: <span style="color: green;">$<?php echo $credit?></span></h4></br>`
    
    const buttonDiv = document.createElement('div');
    buttonDiv.classList.add('right');
    const editButton = document.createElement('button');
    editButton.classList.add('rounded');
    editButton.id = 'edit-youth';
    editButton.setAttribute('onclick', "document.location.href = './editchild.php?childid=<?php echo $childid; ?>';");
    editButton.innerHTML = "Edit Youth Participant";
    buttonDiv.appendChild(editButton);
    const deleteButton = document.createElement('button');
    deleteButton.classList.add('rounded');
    deleteButton.id = 'delete-youth';
    deleteButton.setAttribute('onclick', "deleteChildById(<?php echo $childid; ?>)");
    deleteButton.innerHTML = "Delete Youth Participant";
    buttonDiv.appendChild(deleteButton);

    boxDiv.appendChild(infoDiv);
    boxDiv.appendChild(buttonDiv);

    document.getElementById("add-youth").appendChild(boxDiv);
  }

</script>