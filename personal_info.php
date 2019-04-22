<?php
// Initialize the session
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>Youth Registration | Youth Spiritual Summit</title>
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
		<div class="container" style = "background: LightSteelBlue">
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
        <h1 align="center" style = "font-size:30px;padding-top: 20px;">Personal Information Form</h1>

        <!-- NEW STUFF STARTING HERE -->
        <div class="block_1"><p style="padding-top:20px"</div> <hr />
        <div class="container">
            <label><p style = "font-size:18px;"">How would you rate yourself in the following areas?</p></label>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Spirituality (closeness to God)<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="spiritual" id="spiritual">
                            <option>Very High</option>
                            <option>High</option>
                            <option>Neutral</option>
                            <option>Low</option>
                            <option>Very Low</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Religious Knowledge:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="knowledge" id="knowledge">
                            <option>Very High</option>
                            <option>High</option>
                            <option>Neutral</option>
                            <option>Low</option>
                            <option>Very Low</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Actively Improving Myself:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="improvement" id="improvement">
                            <option>Very High</option>
                            <option>High</option>
                            <option>Neutral</option>
                            <option>Low</option>
                            <option>Very Low</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Actively Involved In Making My Community Better:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" id="community">
                            <option>Very High</option>
                            <option>High</option>
                            <option>Neutral</option>
                            <option>Low</option>
                            <option>Very Low</option>
                        </select>
                    </div>
                </div>


                <div class="row initial-task-padding">
                    <div class="col">
                        <p>What do you hope to get out of attending Youth Spiritual Summit this year?</p>
                        <textarea id="hopes" cols="132" rows="3"></textarea>
                    </div>
                </div>

                <div class="row initial-task-padding">
                    <div class="col">
                        <p>What are some activities that you enjoy?</p>
                        <textarea id="activities" cols="132" rows="3"></textarea>
                    </div>
                </div>

                <div class="row initial-task-padding">
                    <div class="col">
                        <p>What is one question you would like to have answered during this year's Summit?</b></p>
                        <textarea id="question" cols="132" rows="3"></textarea>
                    </div>
                </div>


        <div class="block_1"><p style="padding-top:30px"</div> <hr />

        <!-- Submit -->
            <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
                <div class="col">
                    <!-- <button id="myBtn">Submit</button> -->
                    <button type="button" value="Submit" name="subscribe" id="submitContact">Submit
                </div>
            </div>
        </div>
    </form>


	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
        <!--<script src="counselor_app.js"></script>-->
        <script>
            var config = {
                apiKey: "AIzaSyDdBVALQJWdMvR5ed0UswgmdWY1me9eL20",
                authDomain: "inf117.firebaseapp.com",
                databaseURL: "https://inf117.firebaseio.com",
                projectId: "inf117",
                storageBucket: "inf117.appspot.com",
                messagingSenderId: "839601382632"
            };
            firebase.initializeApp(config);

            document.getElementById("submitContact").addEventListener("click", functSubmit);
                function functSubmit(event){
                    var database = firebase.database();
                    var spiritual = document.getElementById("spiritual").value;
                    var knowledge = document.getElementById("knowledge").value;
                    var improvement = document.getElementById("improvement").value;
                    var community = document.getElementById("community").value;
                    var hopes = document.getElementById("hopes").value;
                    var activities = document.getElementById("activities").value;
                    var question = document.getElementById("question").value;
                    else {
                        var newPostRef = firebase.database().ref('/').push({
                            spiritual: spiritual,
                            knowledge: knowledge,
                            improvement: improvement,
                            community: community,
                            hopes: hopes,
                            activities: activities,
                            question: question
                        }, function(error){
                        if (error) {
                            alert("Did not go through")
                        } else {
                            alert("The form was submitted.");
                            var postID = newPostRef.key;
                            window.location.replace("dashboard.php")
                        }
                        }
                        );
                    }

                };

        </script>

</body>
</html>
