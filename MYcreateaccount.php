<?php
// Initialize the session
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>Create an Account | Youth Spiritual Summit</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredericka+the+Great"> -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"> -->
	<!-- <link rel="stylesheet" href="registrationstyle.css"> -->
	<!-- <link rel="stylesheet" href="StudentRegistration.css"> -->

	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
		<div class="container" style = "background: #5b77a5">
			<a class="navbar-brand" href="http://youthspiritualsummit.weebly.com">
				<img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav mx-auto">
					<a class="nav-item nav-link" href="http://campizza.com"><font color="white">Home</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/calendar"><font color="white">Activities</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/camp-fees"><font color="white">Fees</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/contact"><font color="white">Contact</font></a>
				</div>
			</div>
		</div>
    </nav>

    <form id=form1 method="post">
        <div class="container" style = "background: white; margin-top: 20px;">
        <!-- Camp Registration Header -->
        <h1 align="center" style = "font-size:30px;padding-top: 20px;">Create a New Account</h1>

        <!-- NEW STUFF STARTING HERE -->
        <div class="block_1"><p style="padding-top:20px"</div> <hr />

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Enter email (same one registered with):<b style = "color: red;">*</b></span>
            </div>
                <input type="text" placeholder="Ex: 12345@gmail.com" name="email" id="email" class="form-control" required>
        </div>

        <div class="input-group mb-3">
             <div class="input-group-prepend">
                <span class="input-group-text">Date of Birth:<b style = "color: red;">*</b></span>
            </div>
                <input type="date" name="age" id="ageInput" class="form-control" required>
        </div>

				<div class="input-group mb-3">
						 <div class="input-group-prepend" style="padding-right: 30px;">
								<span class="input-group-text">Choose Account type:<b
									style = "color: red;">*</b></span>
						</div>
								<select id="accountType" class="input-group-option" style="
									padding-left: 15px;
									padding-right: 20px;
								">
									<option value="parent">Guardian</option>
									<option value="counselor">Counselor</option>
									<option value="overage">Youth</option>
								</select>
				</div>

        <div class="block_1"><p style="padding-top:30px"</div> <hr />
        <!-- Submit -->
        <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
                <div class="col">
                    <!-- <button id="myBtn">Submit</button> -->
                    <button type="button" value="Submit"
										 name="proceed" id="submitAccount" >Next
                </div>
            </div>
        </div>
    </form>

    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
        <!--<script src="counselor_app.js"></script>-->
        <script>
            var config = {
                apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
                authDomain: "yss-project-69ba2.firebaseapp.com",
                databaseURL: "https://yss-project-69ba2.firebaseio.com",
                projectId: "yss-project-69ba2",
                storageBucket: "yss-project-69ba2.appspot.com",
                messagingSenderId: "530416464878"
            };
            firebase.initializeApp(config);

            document.getElementById("submitAccount").addEventListener("click", function(){
                    var database = firebase.database();
                    var email = document.getElementById("email").value;
                    var dob = new Date(document.getElementById("ageInput").value);
										var acct = document.getElementById("accountType").value;
                    email = email.replace(".", ",");
                        console.log("testing");
                        console.log(dob, email);
                    if (!email || !dob){
                        alert("Please fill in all fields");
                    }
										else{
												var currentDate = new Date().getFullYear();
												var age = Number(currentDate) - Number(dob.getFullYear());
												if(age < 18) {
														alert("You do not have permission to make an account. Your guardian must make one for you.");
														window.location.replace("/login.php");
												}
												else {
													//alert("you are over 18!");
													if(acct == "counselor") {
														alert("navigating into counselor registration");
														window.location.replace("/counselor_registration.php");
													}
													else if(acct == "parent") {
														alert("navigating into guardian registration");
														window.location.replace("/parentRegistration.php");
													}
													else if(acct == "overage"){
														alert("navigating into youth registration");
														window.location.replace("/overage_registration.php");
													}
												}
									}
											/*
                        var check_e;
                        var check_u;
                        firebase.database().ref('/counselors/' + email + '/').once('value').then(function(snapshot)
                            {
                                console.log("checking if exists");
                                check_e = (snapshot.val() && snapshot.val().email);
                                //check_u = (snapshot.val() && snapshot.val().email);
                                console.log(check_e);
                            }
                        );

                        setTimeout(function(){

                    if (check_e == null){
                            var newPostRef = firebase.database().ref('/counselors/' + email + '/').set({
                            password: password,
                            dob: dob,
                            email: email
                            },
                            function(error) {
                                if (error) {
                                    alert("didn't go through");
                                } else {
                                    //var postID = newPostRef.key;
                                    //window.location.replace("index.php");
                                    console.log("went to firebase");
                                }
                                });
                            } else {
                                alert("email already exists")
                            }
                        }, 3000);
                    }
										*/
            });
                // Get the unique ID generated by push() by accessing its key




        </script>

</body>
</html>
