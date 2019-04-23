<?php
// Initialize the session
session_start();
?>
<script>
    var email = "<?php echo $_SESSION["newuserinfo"]["email"];?>";
    var emailwcharactersreplaced = email.replace(".",",");
    var bus_num = "N/A";
    var group_num = "N/A";
    var cabin_num = "N/A";
    var credit_due = "299";

    </script>

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
		<div class="container" style = "background: #5b77a5">
			<a class="navbar-brand" href="http://youthspiritualsummit.weebly.com">
				<img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav mx-auto">
					<a class="nav-item nav-link" href="http://youthspiritualsummit.weebly.com"><font color="white">Home</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/calendar"><font color="white">Activities</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/camp-fees"><font color="white">Fees</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/contact"><font color="white">Contact</font></a>
				</div>
			</div>
		</div>
	</nav>

    <form id=form1 action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return submitForm();">
        <div class="container" style = "background: white; margin-top: 20px;">
        <!-- Camp Registration Header -->
        <h1 align="center" style = "font-size:40px;padding-top: 20px;">Youth Participant Registration</h1>

        <!-- NEW STUFF STARTING HERE -->
        <div class="block_1"><p style="padding-top:20px"</div> <hr />

        <div class="container">
        <!-- Camper Information -->
            <label><p style = "font-size:30px;">Participant Information (18+)</p></label>

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
                            <option>Junior</option>
                            <option>Senior</option>
                            <option>Early College</option>
                            <option>Home School</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Clothing Size:<b style = "color: red;">*</b></span>
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
                    Picture of Drivers License / Government ID:<b style = "color: red;">*</b>
                    <input type="file" name="upload" id="upload" class="form-control" required>
                </form>
        </div>

        <div class="block_1"><p style="padding-top:30px"</div> <hr />

        <div class="container">
        <!-- Personal Information -->
            <label><p style = "font-size:30px;padding-top: 10px;">Personal Information</p></label>
        </div>
        <div class="container">
            <label><p style = "font-size:18px;">How would you rate yourself in the following areas?</p></label>

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
                        <textarea id="hopes" cols="132" rows="3" value=""></textarea>
                    </div>
                </div>

                <div class="row initial-task-padding">
                    <div class="col">
                        <p>What are some activities that you enjoy?</p>
                        <textarea id="activities" cols="132" rows="3" value=""></textarea>
                    </div>
                </div>

                <div class="row initial-task-padding">
                    <div class="col">
                        <p>What is one question you would like to have answered during this year's Summit?</b></p>
                        <textarea id="question" cols="132" rows="3" value=""></textarea>
                    </div>
                </div>


        <div class="block_1"><p style="padding-top:30px"</div> <hr />

        <div class="container">
        <!-- Emergency Contacts -->
        </div>
            <label><p style = "font-size:30px;padding-top: 10px;">Emergency Contacts</p></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Name:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: John" name="ec_name1" id="ec_name1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Phone:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: 1234567890" name="ec_phone1" id="ec_phone1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Relationship:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: Father" name="ec_relationship1" id="ec_relationship1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 2 - Name:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: John" name="ec_name2" id="ec_name2" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 2 - Phone:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: 1234567890" name="ec_phone2" id="ec_phone2" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 2 - Relationship:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: Mother" name="ec_relationship2" id="ec_relationship2" class="form-control" required>
                </div>


        <div class="block_1"><p style="padding-top:30px"></div> <hr>

        <div class="container">
        <!-- Health Information -->
        </div>
            <label><p style = "font-size:30px;padding-top: 10px;">Health Information</p></label>
            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Allergies You Have. If none, type N/A.<b style = "color: red;">*</b></p>
                    <input type="text" name="allergies" id="allergies" times-label="allergies" class="form-control" required>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Medication You Are Currently On. If none, type N/A<b style = "color: red;">*</b></p>
                    <input type="text" name="meds" id="meds" times-label="meds" class="form-control" required>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Activity Restrictions.</b></p>
                    <input type="text" name="activity_restrictions" value="" id="activity_restrictions" times-label="activity_restrictions" class="form-control">
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Please List Any Dietary Restrictions.</b></p>
                    <input type="text" name="dietary_restrictions" value="" id="dietary_restrictions" times-label="dietary_restrictions" class="form-control">
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>Other Important Information </b></p>
                    <input type="text" name="other" value="" id="other" times-label="other" class="form-control">
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
        <div class="block_1"><p style="padding-top:30px"</div> <hr />

        <!-- Submit -->
            <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
                <div class="col">
                    <!-- <button id="myBtn">Submit</button> -->
                    <input type="submit" value="Submit" name="subscribe" id="submit">
                </div>
            </div>
        </div>
    </form>

    <!-- <script>
                            //TEMPORARY DATA TO FILL IN VALUES
                            document.getElementById("firstname").value = "hi";
                    document.getElementById("lastname").value = "hi";
                    document.getElementById("spiritual").value = "hi";
                    document.getElementById("knowledge").value = "hi";
                    document.getElementById("improvement").value = "hi";
                    document.getElementById("community").value = "hi";
                    document.getElementById("hopes").value = "hi";
                    document.getElementById("activities").value = "hi";
                    document.getElementById("question").value = "hi";
                    document.getElementById("ec_name1").value = "hi";
                    document.getElementById("ec_phone1").value = "hi";
                    document.getElementById("ec_relationship1").value = "hi";
                    document.getElementById("ec_name2").value = "hi";
                    document.getElementById("ec_phone2").value = "hi";
                    document.getElementById("ec_relationship2").value = "hi";
                    document.getElementById("ec_relationship2").value = "hi";
                    document.getElementById("meds").value = "hi";
                    document.getElementById("activities").value = "hi";
                    document.getElementById("dietary").value = "hi";
                    document.getElementById("other").value = "hi";
                    document.getElementById("insurance").value = "hi";
                    document.getElementById("policy_holder").value = "hi";
        </script> -->


	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
        <!--<script src="counselor_app.js"></script>-->
        <script>
            function submitForm(){
                console.log("submitForm called");
                var config = {
                    apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
                    authDomain: "yss-project-69ba2.firebaseapp.com",
                    databaseURL: "https://yss-project-69ba2.firebaseio.com",
                    projectId: "yss-project-69ba2",
                    storageBucket: "yss-project-69ba2.appspot.com",
                    messagingSenderId: "530416464878"
                };
                firebase.initializeApp(config);
                var database = firebase.database();
                var fn = document.getElementById("firstname").value;
                var ln = document.getElementById("lastname").value;
                var gender = document.getElementById("gender").value;
                var password = document.getElementById("password").value;
                var password2 = document.getElementById("password2").value;
                var year = document.getElementById("schoolyear").value;
                var size = document.getElementById("size").value;
                var file = document.getElementById("upload").value;
                var spiritual = document.getElementById("spiritual").value;
                var knowledge = document.getElementById("knowledge").value;
                var improvement = document.getElementById("improvement").value;
                var community = document.getElementById("community").value;
                var hopes = document.getElementById("hopes").value;
                var activities = document.getElementById("activities").value;
                var question = document.getElementById("question").value;
                var ec_name1 = document.getElementById("ec_name1").value;
                var ec_phone1 = document.getElementById("ec_phone1").value;
                var ec_relationship1 = document.getElementById("ec_relationship1").value;
                var ec_name2 = document.getElementById("ec_name2").value;
                var ec_phone2 = document.getElementById("ec_phone2").value;
                var ec_relationship2 = document.getElementById("ec_relationship2").value;
                var allergies = document.getElementById("allergies").value;
                var meds = document.getElementById("meds").value;
                var activity_r = document.getElementById("activity_restrictions").value;
                var dietary_r = document.getElementById("dietary_restrictions").value;
                var other = document.getElementById("other").value;
                var insurance = document.getElementById("insurance").value;
                var policy_holder = document.getElementById("policy_holder").value;



                    // if (fn == ''){
                    //     alert("fill in first name");
                    // }
                    // else if (ln == ''){
                    //     alert("fill in last name");
                    // }
                    // else if (file == ''){
					// 	alert("please add id file");
                    // }
                    // else if (ec_name1 == ''){
                    //     alert("please add emergency contact name 1");
                    // }
                    // else if (ec_phone1 == ''){
                    //     alert("please add emergency contact phone 1");
                    // }
                    // else if (ec_relationship1 == ''){
                    //     alert("please add emergency contact relationship 1");
                    // }
                    // else if (ec_name2 == ''){
                    //     alert("please add emergency contact name 2");
                    // }
                    // else if (ec_phone2 == ''){
                    //     alert("please add emergency contact phone 2");
                    // }
                    // else if (ec_relationship2 == ''){
                    //     alert("please add emergency contact relationship 2");
                    // }
                    // else if (allergies == ''){
                    //     alert("please add any alleriges or type N/A");
                    // }
                    // else if (meds == ''){
                    //     alert("please add any medication or type N/A");
                    // }
                     if ( password != password2 ){
                        alert("Retyped password must match password");
                    } else {
                        console.log("hellooo")
                        var newPostRef = firebase.database().ref('/users/' + emailwcharactersreplaced).set({
                            first_name: fn,
                            email:email,
                            password:password,
                            bus_num:"N/A",
                            group_num:"N/A",
                            cabin_num:"N/A",
                            user_type: "student18",
                            last_name: ln,
                            gender: gender,
                            year: year,
                            size: size,
                            file: file,
                            spiritual: spiritual, 
                            knowledge: knowledge,
                            improvement: improvement,
                            community: community,
                            hopes: hopes,
                            activities: activities,
                            question: question,
                            ec_name1: ec_name1,
                            ec_phone1: ec_phone1,
                            ec_relationship1: ec_relationship1,
                            ec_name2: ec_name2,
                            ec_phone2: ec_phone2,
                            ec_relationship2: ec_relationship2,
                            alleriges: allergies,
                            meds: meds,
                            activity_restrictions: activity_r,
                            dietary_restrictions: dietary_r,
                            other: other,
                            insurance: insurance,
                            policy_holder: policy_holder,
                            credit_due:credit_due
                        }, function(error){
                            if (error) {
                                alert("Did not go through")
                            } else {
                                alert("Your account has been created successfully. Please log in to view your dashboard.");
                                console.log("here")
                                var postID = newPostRef.key;
                                window.location.replace("index.php")
                            }
                        });
                    }
                return false;

            }

        </script>

</body>
</html>
