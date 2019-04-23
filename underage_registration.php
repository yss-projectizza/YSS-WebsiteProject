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
        <h1 align="center" style = "font-size:40px;padding-top: 20px;">Youth Participant Registration</h1>

        <!-- NEW STUFF STARTING HERE -->
        <div class="block_1"><p style="padding-top:20px"</div> <hr />

        <div class="container">
        <!-- Youth Information -->
        <!-- ONLY PARENT SHOULD FILL THIS OUT. STUDENT CAN NOT CHANGE IT -->
            <label><p style = "font-size:30px;">Participant Information</p></label>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">First Name:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: John" name="firstname" id="firstname" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Last Name:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: Smith" name="lastname" id="lastname" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Gender:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="gender" id="gender">
                                <option>Female</option>
                                <option>Male</option>
                        </select>
                    </div>
                </div>

								<div class="input-group mb-3">
										 <div class="input-group-prepend">
												<span class="input-group-text">Enter A Password:<b style = "color: red;">*</b></span>
										</div>
												<input type="password" name="password" id="password" class="form-control" required>
								</div>

								<div class="input-group mb-3">
										 <div class="input-group-prepend">
												<span class="input-group-text">Retype Your Password:<b style = "color: red;">*</b></span>
										</div>
												<input type="password" name="password2" id="password2" class="form-control" required>
								</div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Upcoming School Year:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="schoolyear" id="schoolyear">
                            <option>Freshman</option>
                            <option>Sophomore</option>
                            <option>Junior</option>
                            <option>Senior</option>
                            <option>Early College</option>
                            <option>Home School</option>
                        </select>
                    </div>
                </div>

                <!-- SHOULD BE AUTOMATICALLY CALCULATED BASED OFF OF DOB -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Age:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="age" id="age">
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                        </select>
                    </div>
                </div>

                <!-- STUDENT FILL THIS OUT ONCE THERE'S AN ACCOUNT-->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Sweatshirt Size:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="size" id="size">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                    </div>
                </div>


                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Picture of Student ID:<b style = "color: red;">*</b>
                    <input type="file" name="upload" id="upload" class="form-control" required">
                </form>
        </div>

        <div class="block_1"><p style="padding-top:30px"</div> <hr />

        <div class="container">
        <!-- Health Information -->
        </div>
            <label><p style = "font-size:30px;padding-top: 10px;">Health Information</p></label>
            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Allergies You Have. If none, type N/A.<b style = "color: red;">*</b></p>
                    <textarea id="allergies" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Medication You Are Currently On. If none, type N/A<b style = "color: red;">*</b></p>
                    <textarea id="meds" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Activity Restrictions.</b></p>
                    <textarea id="activities" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Dietary Restrictions.</b></p>
                    <textarea id="dietary" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Other Important Information </b></p>
                    <textarea id="other" cols="132" rows="2"></textarea>
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Insurance Provider:<b style = "color: red;">*</b></span>
                 </div>
                <input type="text" placeholder="Ex: PPO" name="insurance" id="insurance" class="form-control" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Policy Holder:<b style = "color: red;">*</b></span>
                 </div>
                <input type="text" placeholder="Ex: John" name="policy_holder" id="policy_holder" class="form-control" required>
            </div>
        
        <div class="block_1"><p style="padding-top:30px"</div> <hr /><!-- Submit -->
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
                    var fn = document.getElementById("firstname").value;
                    var ln = document.getElementById("lastname").value;
                    var gender = document.getElementById("gender").value;
                    var year = document.getElementById("schoolyear").value;
                    var age = document.getElementById("age").value;
                    var size = document.getElementById("size").value;
                    var file = document.getElementById("upload").value;
                    var allergies = document.getElementById("allergies").value;
                    var meds = document.getElementById("meds").value;
                    var activity = document.getElementById("activities").value;
                    var dietary = document.getElementById("dietary").value;
                    var other = document.getElementById("other").value;
                    var insurance = document.getElementById("insurance").value;
                    var policy_holder = document.getElementById("policy_holder").value;
                    if (fn == ''){
                        alert("fill in first name");
                    }
                    else if (ln == ''){
                        alert("fill in last name");
                    }
                    else if (allergies == ''){
                        alert("please add any alleriges or type N/A");
                    }
                    else if (meds == ''){
                        alert("please add any medication or type N/A");
                    }
                    else {
                        var newPostRef = firebase.database().ref('/users').push({
                            user_type: "student",
                            first_name: fn,
                            last_name: ln,
                            gender: gender,
                            year: year,
                            age: age,
                            size: size,
                            file: file,
                            alleriges: allergies,
                            meds: meds,
                            activities: activities,
                            dietary: dietary,
                            other: other,
                            insurance: insurance,
                            policy_holder: policy_holder
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
