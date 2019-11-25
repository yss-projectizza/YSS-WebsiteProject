<?php
/* This is the the page for Manage Youth Participate*/
// Testing merge

session_start();

$parent_email = $_SESSION["queryData"]["email"];

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
require __DIR__. '/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// Refreshing session's database to make sure parent's balance is correct
$username = str_replace(".", ",", $parent_email);
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');
$firebase = (new Factory)
	->withServiceAccount($serviceAccount)
	->create();
$database = $firebase->getDatabase();
$reference = $database->getReference('/users')->getValue();

if (array_key_exists($username, $reference)){
	$_SESSION["queryData"] = $reference[$username];
}

$parentBal = $_SESSION["queryData"]["credit_due"];
$parentBal = floatval($parentBal);
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
		location.reload();
  }

  function buildYouthDiv(youth,key){
    const boxDiv = document.createElement('div');
    boxDiv.classList.add('rounded', 'box', 'youth-info');

    const infoDiv = document.createElement('div');
    infoDiv.classList.add('left');
    infoDiv.innerHTML = "<h3>"+ youth.first_name + " " + youth.last_name +
		"<span style ='color: orange;'>   (" + youth.accountStatus + ")</span>" +
			
			"</br>Group " + 
			youth.group_num + ", Bus " + youth.bus_num + ", Cabin " + youth.cabin_num + "</h3>" +
      "<h4>Amount Due: <span style='color: red;'>$" + youth.balance + "</span></h4>" + 
      "<h5>Credit: <span style='color: green;'>$0</span></h5></br>";
                        
    // Buttons Group
    const buttonDiv = document.createElement('div');
    buttonDiv.classList.add('right');
		
		// The Edit Youth Participant
    const editButton = document.createElement('button');
    editButton.classList.add('rounded');
    editButton.id = 'edit-youth';
    editButton.innerHTML = "Edit";
    editButton.onclick = () => {
      firebase.database().ref('users').orderByChild('parent_email').equalTo(parent_email).on("value", function(snapshot) {
        var children = Object.entries(snapshot.val());
        console.log(children);
        for (let i = 0; i < children.length; i++) {
          if (children[i][1].first_name == youth.first_name && children[i][1].last_name == youth.last_name) {
            console.log(children[i][0]);
            var child_key = children[i][0];
          }
        }
        location.href = "underage_profile.php?key=" + child_key
      });
    }
    	
		// The Delete Youth button
    const deleteButton = document.createElement('button');
    deleteButton.classList.add('rounded');
    deleteButton.id = 'delete-youth';
    deleteButton.innerHTML = "Delete";
    deleteButton.onclick = () => {var delete_user = confirm("Are you sure you would like to delete this youth participant?"); if (delete_user) {
      var credit_now = parseFloat("<?php echo $parentBal; ?>");
      
      if(youth.accountStatus == "Activated")
      {
        credit_now -= parseFloat(youth.balance);
        firebase.database().ref('/users/' + parentEmail_key).update({
          credit_due: credit_now
        });			
      }			
			deleteYouth(key);alert("Deleted youth participant successfully.")}}
   	
		// The Deactivate button
		var parentEmail_key = parent_email.replace(".",",");

		const deactivateButton = document.createElement('button');
		deactivateButton.classList.add('rounded');
		deactivateButton.id = 'activate_youth';
		deactivateButton.innerHTML = "Deactivate";
		
		// Switch student's status to deactivated and subtract balance from parent's balance
		deactivateButton.onclick = () => {
      var credit_now = parseFloat("<?php echo $parentBal; ?>");
      
      credit_now -= parseFloat(youth.balance);

      credit_now = credit_now.toFixed(2);

			firebase.database().ref('/users/' + parentEmail_key).update({
				credit_due: parseFloat(credit_now)
			});
			
			firebase.database().ref('/users/' + key).update({
				accountStatus: "Deactivated"
			});	
			location.reload();
		};
				
		// The Activate button
		const activateButton = document.createElement('button');
		activateButton.classList.add('rounded');
		activateButton.id = 'activate_youth';
		activateButton.innerHTML = "Activate";
		
		// Switch student's status to deactivated and subtract balance from parent's balance
		activateButton.onclick = () => {
			var credit_now = parseFloat("<?php echo $parentBal; ?>");
			
			credit_now += parseFloat(youth.balance);
			firebase.database().ref('/users/' + parentEmail_key).update({
				credit_due: parseFloat(credit_now)
			});
			firebase.database().ref('/users/' + key).update({
				accountStatus: "Activated"
			});
			location.reload();
		};
		
		if (youth.accountStatus == "Activated"){
			buttonDiv.appendChild(deactivateButton);
		}
		else{
			buttonDiv.appendChild(activateButton);
		}
		
		// Adding the delete and edit button:
		buttonDiv.appendChild(editButton);
		buttonDiv.appendChild(deleteButton);
		
    boxDiv.appendChild(infoDiv);
    boxDiv.appendChild(buttonDiv);

    document.getElementById("add-youth").appendChild(boxDiv);
  }

</script>




