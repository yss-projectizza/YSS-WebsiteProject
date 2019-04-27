<?php
session_start();

?>

<script>
    var email = "<?php echo $_SESSION["newuserinfo"]["email"];?>";
    var emailwcharactersreplaced = email.replace(".",",");
</script>

<!doctype html>
<html lang="en">
    <head>
        <title>Counselor Registration | Youth Spiritual Summit</title>
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
					<a class="nav-item nav-link" href="http://youthspiritualsummit.weebly.com"><font color="white">Home</font></a>
                    <!-- change to YSS Activities -->
					<a class="nav-item nav-link" href="http://campizza.com/calendar"><font color="white">Activities</font></a>
                    <!-- change to YSS Fees -->
					<a class="nav-item nav-link" href="http://campizza.com/camp-fees"><font color="white">Fees</font></a>
                    <!-- change to YSS Contact -->
					<a class="nav-item nav-link" href="http://campizza.com/contact"><font color="white">Contact</font></a>
				</div>
			</div>
		</div>
	</nav>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return submitForm();">
<div class="container" style = "background: white; margin-top: 20px;">
    <!-- Counselor Registration Header -->
    <h1 align="center" style = "font-size:50px;padding-top: 20px;">Counselor Application</h1>
    <br>
    <p>YSS 2019 will be taking place Labor Day Weekend, Aug. 30st - Sept. 2nd, 2019 in the San Bernardino Mts.
**To be considered as a counselor you must be 21 years old or older by the first day of the retreat**
Application closes: April 28th at midnight.

All counselors may be interviewed via Skype or in-person meetings.
If you have any questions, please contact us at youthspiritualsummit@gmail.com <p>

    <div class="block_1"><p style="padding-top:20px"</div> <hr />

  	<div class="container">

    <!-- Availability -->
        <label><p style = "font-size:30px;">Availability</p></label>
            <div class="row initial-task-padding">
                <div class="col">
                    Are you available for the entire 2019 YSS (8/30 - 9/2)?<b style = "color: red;">*</b>
                    <br>
                    <small span class="subtitle">This includes meeting at 3:30pm on Friday 8/30 and staying with the youth until they are picked up at 3pm on Monday 9/2. If not, please indicate otherwise.
                    </small> </span>
                    <br>
                    <select class="form-control form-control-md" name="yss_avail" id="yss_avail" style="width:30%" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                    <br>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    Are you available for the mandatory Counselor Retreat on June 8th?<b style = "color: red;">*</b>
                    <br>
                    <small span class="subtitle">We would like all counselors to attend this full day (8am-6pm) mandatory counselor retreat prior to camp. Exceptions can be made on a case by case basis.
                    </small> </span>
                    <br>
                    <select class="form-control form-control-md" name="cs_avail" id="cs_avail" style="width:30%" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                    <br>
                </div>
            </div>

        <!-- Info and Exp -->
        <label><p style = "font-size:30px;">Information and Experience</p></label>
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
				    <select class="form-control form-control-md" name="gender" id="gender" required>
						    <option disabled selected value> -- select an option -- </option>
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
                    <span class="input-group-text">City of Residence:<b style = "color: red;">*</b></span>
                </div>
                <input type="text" placeholder="Ex: Irvine" name="city" id="city" class="form-control" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone Number:<b style = "color: red;">*</b></span>
                </div>
                <input type="text" placeholder="Ex: (123) 456-7890" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">How many years of experience do you have working with youth?<b style = "color: red;">*</b></span>
                    <br>
                    <small span class="subtitle">Please put the number of years experience you have with either youth group work or MSA work
                    </small> </span>
                    <br>
                    </div>
                    <select class="form-control form-control-md" name="experience" id="experience" style="width:30%" required>
					        <option disabled selected value> -- select an option -- </option>
                            <option>0</option>
                            <option>1</option>
						    <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10+</option>
				    </select>
                    <br>
			</div>

            <div class="row initial-task-padding">
                <div class="col">
                    Do you have any siblings or relatives that you think will be attending YSS?<b style = "color: red;">*</b>
                    <br>
                    <select class="form-control form-control-md" name="sibling" id="sibling" style="width:30%" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option>Yes</option>
                        <option>No</option>
                        <option>Unsure at this point</option>
                    </select>
                    <br>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                Have you ever been a counselor before?<b style = "color: red;">*</b>
                    <br>
                    <select class="form-control form-control-md" name="counselor_short" id="counselor_short" style="width:30%" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                    <br>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    If you answered yes to the above question, please describe your experience, otherwise write "N/A"<b style = "color: red;">*</b>
                    <input type="text" name="exp_desc" id="exp_desc" times-label="describe exp" class="form-control" required>
                    <br>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                Is there a certain age group you feel comfortable working with?<b style = "color: red;">*</b>
                    <br>
                    <small span class="subtitle"> The Youth Spiritual Summit hosts high school students (14-18 year olds), we would like to know if there is a specific age you feel comfortable working with.
                    </small> </span>
                    <br>
                    <input type="text" name="group age" id="group_age" times-label="group age" class="form-control" required>
                    <br>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                What do you hope to get out of this experience?<b style = "color: red;">*</b>
                    <br>
                    <small span class="subtitle"> Please describe in 2-3 sentence why you would like to be a counselor
                    </small> </span>
                    <br>
                    <input type="text" name="gain" id="gain" times-label="gain" class="form-control" required>
                    <br>
                </div>
            </div></div>

            <div class="row initial-task-padding">
                <div class="col">
                    What makes you a good fit for YSS?<b style = "color: red;">*</b>
                    <input type="text" name="fit" id="fit" times-label="fit" class="form-control" required>
                    <br>
                </div>
            </div></div>

            <div class="row initial-task-padding">
                <div class="col">
                    Is there anything else you'd like us to know about you? (special accommodations, awards, etc)?
                    <input type="text" value="" name="extra" id="extra" times-label="extra" class="form-control">
                    <br>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    Please list the names and contact information of 3 references<b style = "color: red;">*</b>
                    <input type="text" name="references" id="references" times-label="references" class="form-control" required>
                    <br>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    Have you ever been convicted of a felony (if yes, please explain in the text box below)<b style = "color: red;">*</b>
                    <br>
                    <select class="form-control form-control-md" name="felony1" id="felony1" style="width:30%" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option>No</option>
                        <option>Yes</option>
                    </select>
                    <input type="text" name="felony2" id="felony2" times-label="references" class="form-control">
                    <br>
                </div>
            </div>

        <!-- Verification -->
        <label><p style = "font-size:30px;">Verification</p></label>
            <div class="row initial-task-padding">
                <div class="col">
                I certify that my answers are true and complete to the best of my knowledge. By checking "yes," I certify that if this application leads to my participation, any false or misleading information in my application or interview may result in my release.<b style = "color: red;">*</b>
                    <select class="form-control form-control-md" name="verification" id="verification" style="width:30%" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                    <br>
                </div>
            </div>
        </div>
    <!--</div>
	<input type="hidden" id="gender" name="gender" value="">-->

	<!-- Submit -->
    <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
			<div class="col">
				<input type="submit" class="btn-xl" align="center" value="Submit">
			</div>
		</div>
	</div>
	</form>

    <!--Javascript here-->
	<!--<script type="text/javascript">
		$(".dropdown-menu a").click(function() {
		  $(this).parents(".dropdown").find('.btn').html($(this).text());
		  $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
		});
	</script>-->

	<!--<script type="text/javascript">
		$(".dropdown-menu").click(function() {
			$("#gender").val($(this).data('value'));
	</script>-->

    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <script>

            //document.getElementById("submitform").addEventListener("click", function()
            function submitForm(){

                var config = {
                    apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
                    authDomain: "yss-project-69ba2.firebaseapp.com",
                    databaseURL: "https://yss-project-69ba2.firebaseio.com",
                    projectId: "yss-project-69ba2",
                    storageBucket: "yss-project-69ba2.appspot.com",
                    messagingSenderId: "530416464878"
                };
                firebase.initializeApp(config);

                console.log("form submitted");
                    var yss_avail = document.getElementById("yss_avail").value;
                    var cs_avail = document.getElementById("cs_avail").value;
                    var fn = document.getElementById("firstname").value;
                    var ln = document.getElementById("lastname").value;
                    var gender = document.getElementById("gender").value;
                    var password = document.getElementById("password").value;
                    var password2 = document.getElementById("password2").value;
                    var dob = document.getElementById("dob").value;
                    var city = document.getElementById("city").value;
                    var phone = document.getElementById("phone").value;
                    var experience = document.getElementById("experience").value;
                    var sibling = document.getElementById("sibling").value;
                    var counselor_short = document.getElementById("counselor_short").value;
                    var exp_desc = document.getElementById("exp_desc").value;
                    var group_age = document.getElementById("group_age").value;
                    var gain = document.getElementById("gain").value;
                    var fit = document.getElementById("fit").value;
                    var extra = document.getElementById("extra").value;
                    var references = document.getElementById("references").value;
                    var felony1 = document.getElementById("felony1").value;
                    var felony2 = document.getElementById("felony2").value;
                    var verification = document.getElementById("verification").value;
                    if (felony1 == "No"){
                        felony2 = "N/A"
                    }
                        //console.log("testing");
                        //console.log(fn, ln, dob, e);
                    // if (!yss_avail || !cs_avail || !fn || !ln || !gender || !dob ||
                    //     !city || !phone || !experience || !sibling || !counselor_short ||
                    //     !exp_desc || !group_age || !gain || !fit || !references ||
                    //     !felony1 || !felony2 || !verification){
                    //         alert("Please fill out all required fields");
                    //         return false;
                    // }

                    if ( password != password2 ){
                        alert("Retyped password must match password");
                    } else {
                            console.log("submitting to db")
                            var newPostRef = firebase.database().ref('/users/' + emailwcharactersreplaced).set({
                                email: emailwcharactersreplaced,
                                password: password,
                                user_type: "counselor",
                                yss_avail: yss_avail,
                                cs_avail: cs_avail,
                                first_name: fn,
                                last_name: ln,
                                gender: gender,
                                dob: dob,
                                city: city,
                                phone: phone,
                                experience: experience,
                                sibling: sibling,
                                counselor_short: counselor_short,
                                exp_desc: exp_desc,
                                group_age: group_age,
                                gain: gain,
                                fit: fit,
                                extra: extra,
                                references: references,
                                felony1: felony1,
                                verification: verification
                            },
                            function(error) {
                                if (error) {
                                    alert("didn't go through");
                                } else {
                                    lert("Your account has been created successfully. Please log in to view your dashboard.");
                                    var postID = newPostRef.key;
                                    window.location.replace("login.php");
                                    console.log("went to firebase");
                                }
                            });
                    }
                    return false;
            }

    </script>
	<div class="footer top-buffer">
		<div class="container">
			<div class="row align-items-center">
				<div class="col">
					<a class="footerphone">
						Call us:<br>
						949-422-8123
					</a>
				</div>
				<div class="vertline"></div>
				<div class="col">
				    <p>YSS</p>
				</div>
				<div class="vertline"></div>
				<div class="col">
				© 2019 Youth Spiritual Summit
				</div>
			</div>
		</div>
	</div>
</body>
</html>
