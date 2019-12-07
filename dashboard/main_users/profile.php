<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
require __DIR__. '/../../vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

  $user=$_SESSION["queryData"]["user_type"];
  $emailwcomma ="";
  if($user == "parent" || $user == "counselor" || $user == "admin")
  {
    $emailwcomma = $_SESSION["queryData"]["email"];
  }
  else if($user == "student")
  {
  $emailwcomma = $_SESSION["queryData"]["studentEmail"];
	$defaultPassword = $_SESSION["queryData"]["defaultPassword"];
	$password = $_SESSION["queryData"]["password"];
  }

  $email= str_replace(".",",",$emailwcomma);

?>

<!-- This block checks if student's password is still the default password. If yes, display a pop up
message to prompt the student to change password.
 -->
<?php
if ($user == "student" and $password == $defaultPassword){
	//echo "<script type='text/javascript'>alert('$email');</script>";
	$username = str_replace(".", ",", $email);
	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/../../yss-project-69ba2-firebase-adminsdk-qpgd1-772443326e.json');
	$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->create();
	$database = $firebase->getDatabase();
	$reference = $database->getReference('/users')->getValue();

	if (array_key_exists($username,$reference)){
		$_SESSION["queryData"] = $reference[$username];
	}
	$defaultPassword = $_SESSION["queryData"]["defaultPassword"];
	$password = $_SESSION["queryData"]["password"];
}

// Check student's password again after updating data. If student's password is still default password,
// redirect student to profile page.
if ($user == "student" and $password == $defaultPassword){
	echo "<script type='text/javascript'>alert('Your password is still the default password. Please update your password.');</script>";
}
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-storage.js"></script>

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
</script>

<html lang="en">

<head>
    <title>Edit Your Account | Youth Spiritual Summit</title>
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <?php include('../../header_loggedin.php') ?>
    <div class="container profile-box">

        <!-- Profile Information -->
        <label>
            <p style="font-size:30px;">Profile Information</p>
        </label>
        <div class="row initial-task-padding">
            <div class="col">
                First name<b style="color: red;">*</b>
                <input id="first_name" type="text" name="first_name" times-label="first_name" class="form-control"
                    required>
                <br>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                Last name<b style="color: red;">*</b>
                <input id="last_name" type="text" name="last_name" times-label="last_name" class="form-control"
                    required>
                <br>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                Phone number<b style="color: red;">*</b>
                <input id="phone" type="tel" name="phone" times-label="phone" class="form-control" required>
                <br>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                Password<b style="color: red;">*</b>
                <input id="password" type="password" name="password" times-label="password" class="form-control"
                    required>
                <br>
            </div>
        </div>

        <div>

        <label>
            <p style="font-size:30px;padding-top: 10px;">Profile Picture</p>
        </label>
        <form method="post" enctype ="multipart/form-data">
            <input id ="iconUpload" type="file" name="icon_file" value="upload" times-label="file" required>
            <br> <br>
            <button type="button" class="rounded" onclick="validateImgProcess()">Upload</button>
        </form>

        <?php if($user == "student" || $user == "student18" || $user == "counselor"): ?>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Shirt Size:<b style="color: red;">*</b></span>
                <select class="form-control form-control-md" name="size" id="size">
										<option disabled selected value> -- select an option -- </option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    <option>XL</option>
                    <option>XXL</option>
                </select>
            </div>
        </div>

        <?php endif?>

        <!-- Personal Information -->
        <?php if($user == "student" || $user == "student18"): ?>
        <label>
            <p style="font-size:30px;padding-top: 10px;">Personal Information</p>
        </label>
        </div>
        <div class="container">
            <label>
                <p style="font-size:18px;">How would you rate yourself in the following areas?</p>
            </label>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Spirituality (closeness to God)<b style="color: red;">*</b></span>
                    <select class="form-control form-control-md" name="spiritual" id="spiritual">
												<option disabled selected value> -- select an option -- </option>
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
                    <span class="input-group-text">Religious Knowledge:<b style="color: red;">*</b></span>
                    <select class="form-control form-control-md" name="knowledge" id="knowledge">
												<option disabled selected value> -- select an option -- </option>
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
                    <span class="input-group-text">Commitment to Improving Myself:<b style="color: red;">*</b></span>
                    <select class="form-control form-control-md" name="improvement" id="improvement">
												<option disabled selected value> -- select an option -- </option>
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
                    <span class="input-group-text">Commitment to Making My Community Better:<b
                            style="color: red;">*</b></span>
                    <select class="form-control form-control-md" id="community">
											<option disabled selected value> -- select an option -- </option>
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
                    <p>What do you hope to get out of attending Youth Spiritual Summit this year?<b style="color: red;">*</b></p>
                    <textarea id="hopes" cols="132" rows="3" value=""></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>What are some activities that you enjoy?<b style="color: red;">*</b></p>
                    <textarea id="activities" cols="132" rows="3" value=""></textarea>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <p>What is one question you would like to have answered during this year's Summit?<b style="color: red;">*</b></b></p>
                    <textarea id="question" cols="132" rows="3" value=""></textarea>
                </div>
            </div>

        <?php endif?>
            <!-- Emergency Contacts -->
        <?php if($user == "parent" || $user == "student18"): ?>
        <div>
        <label>
            <p style="font-size:30px;padding-top: 10px;">Youth's Emergency Contacts</p>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Emergency Contact 1 - Name:<b style="color: red;">*</b></span>
            </div>
            <input type="text" placeholder="Ex: John" name="ec_name1" id="ec_name1" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Emergency Contact 1 - Phone:<b style="color: red;">*</b></span>
            </div>
            <input type="tel" placeholder="Ex: 123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="ec_phone1" id="ec_phone1" class="form-control"
                required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Emergency Contact 1 - Relationship:<b style="color: red;">*</b></span>
            </div>
            <input type="text" placeholder="Ex: Father" name="ec_relationship1" id="ec_relationship1"
                class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Emergency Contact 2 - Name:<b style="color: red;">*</b></span>
            </div>
            <input type="text" placeholder="Ex: John" name="ec_name2" id="ec_name2" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Emergency Contact 2 - Phone:<b style="color: red;">*</b></span>
            </div>
            <input type="tel" placeholder="Ex: 123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="ec_phone2" id="ec_phone2" class="form-control"
                required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Emergency Contact 2 - Relationship:<b style="color: red;">*</b></span>
            </div>
            <input type="text" placeholder="Ex: Mother" name="ec_relationship2" id="ec_relationship2"
                class="form-control" required>
        </div>
        <?php endif ?>
        <div class="block_1">
            <p style="padding-top:30px">
        </div>
        <hr>

        <div class="container">
            <!-- Health Information -->
        </div>
       <!--  no longer necessary since parent can have multiple youths, moved to underaged profile<?php if($user == "parent"): ?>
        <label>
            <p style="font-size:30px;padding-top: 10px;">Youth's Health Information</p>
        </label>
        <div class="row initial-task-padding">
            <div class="col">
                <p>Please List Any Allergies Your Youth Has. If None, Type N/A.<b style="color: red;">*</b></p>
                <input style="margin-top: -15px; margin-bottom:15px" type="text" name="allergies" id="allergies" times-label="allergies" class="form-control"
                    required>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <p>Please List Any Medication Your Youth Is Currently On. If None, Type N/A<b style="color: red;">*</b></p>
                <input style="margin-top: -15px; margin-bottom:15px" type="text" name="meds" id="meds" times-label="meds" class="form-control" required>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <p>Please List Any Activity Restrictions.</b></p>
                <input style="margin-top: -15px; margin-bottom:15px" style="margin-bottom: 15px"type="text" name="activity_restrictions" value="" id="activity_restrictions"
                    times-label="activity_restrictions" class="form-control">
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <p>Please List Any Dietary Restrictions.</b></p>
                <input style="margin-top: -15px; margin-bottom:15px" type="text" name="dietary_restrictions" value="" id="dietary_restrictions"
                    times-label="dietary_restrictions" class="form-control">
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <p>Other Important Information </b></p>
                <input style="margin-top: -15px; margin-bottom:15px" style="margin-bottom: 15px" type="text" name="other" value="" id="other" times-label="other" class="form-control">
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span style="margin-top: 20px" class="input-group-text">Insurance Provider:<b style="color: red;">*</b></span>
            </div>
            <input style="margin-top: 20px" type="text" placeholder="Ex: PPO" name="insurance" id="insurance" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span style="margin-top: 5px" class="input-group-text">Policy Holder:<b style="color: red;">*</b></span>
            </div>
            <input style="margin-top: 5px" type="text" placeholder="Ex: John" name="policy_holder" id="policy_holder" class="form-control"
                required>
        </div>
        <div class="block_1">
            <p style="padding-top:20px">
        </div>
        <?php endif?> -->
        <hr />

        <!-- Submit -->
        <div class="row margin-data" style="padding-bottom: 50px;padding-top: 10px;" align="center">
            <div class="row margin-data" style="padding-bottom: 50px;
               padding-top: 10px; margin-bottom: 5%;" align="center" ;>
                <button onclick="location.href = '/dashboard.php'" id="back" class="btn-xl rounded" align="center"
                    role="button"> Back
                </button>
                <input id="update" type="button" class="btn-xl rounded" align="center" value="Save changes">
            </div>
        </div>
    </div>
</body>
</html>

<script>

    firebase.database().ref('/users/' + "<?php echo $email?>").once("value").then(async function (snapshot) {
        let profiledata = snapshot.val();
			if(profiledata.defaultPassword != null && profiledata.password == profiledata.defaultPassword)
			{
				document.getElementById("back").style.display = "none";
			}
        document.getElementById("first_name").value = profiledata.first_name;
        document.getElementById("last_name").value = profiledata.last_name;
		if("phone" in profiledata){
			document.getElementById("phone").value = profiledata.phone;
		}
		else{
			document.getElementById("phone").placeholder = "Ex: 123-456-7890";
		}
        document.getElementById("password").value = profiledata.password;

        if(profiledata.hasOwnProperty("spiritual")) // checks if the database object has the specified data field
        {
			document.getElementById("size").value = profiledata.size;
            document.getElementById("spiritual").value = profiledata.spiritual;
            document.getElementById("knowledge").value = profiledata.knowledge;
            document.getElementById("improvement").value = profiledata.improvement;
            document.getElementById("community").value = profiledata.community;
            document.getElementById("hopes").value = profiledata.hopes;
            document.getElementById("activities").value = profiledata.activities;
            document.getElementById("question").value = profiledata.question;
        }

        if(profiledata.user_type == "parent")
        {
            document.getElementById("ec_name1").value = profiledata.ec_name1;
            document.getElementById("ec_phone1").value = profiledata.ec_phone1;
            document.getElementById("ec_relationship1").value = profiledata.ec_relationship1;
            document.getElementById("ec_name2").value = profiledata.ec_name2;
            document.getElementById("ec_phone2").value = profiledata.ec_phone2;
            document.getElementById("ec_relationship2").value = profiledata.ec_relationship2;
        }
    });

    document.getElementById("update").addEventListener("click", function () {
        var database = firebase.database();

        //getting input data
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var phone = document.getElementById("phone").value;
        var password = document.getElementById("password").value;

        //needed to encrypt password but having issues with password_verify in php
        var h_password = "<?php echo password_hash('a', PASSWORD_BCRYPT); ?>";
        
        if("<?php echo $_SESSION["queryData"]["user_type"] ?>" == "student")
        {
            var size = document.getElementById("size").value;
            var spiritual = document.getElementById("spiritual").value;
            var knowledge = document.getElementById("knowledge").value;
            var improvement = document.getElementById("improvement").value;
            var community = document.getElementById("community").value;
            var hopes = document.getElementById("hopes").value;
            var activities = document.getElementById("activities").value;
            var question = document.getElementById("question").value;
        }

        if("<?php echo $_SESSION["queryData"]["user_type"] ?>" == "parent")
        {
            var ec_name1 = document.getElementById("ec_name1").value;
            var ec_phone1 = document.getElementById("ec_phone1").value;
            var ec_relationship1 = document.getElementById("ec_relationship1").value;
            var ec_name2 = document.getElementById("ec_name2").value;
            var ec_phone2 = document.getElementById("ec_phone2").value;
            var ec_relationship2 = document.getElementById("ec_relationship2").value;
        }
		if (first_name == ''){
				alert("Please fill in first name");
		}
		else if (last_name == ''){
				alert("Please fill in last name");
		}
		else if(phone == ''){
				alert("Please fill in phone number");
		}
		else if(size == ""){
				alert("Please select a shirt size");
		}
		else if(spiritual == ""){
				alert("Please select an option");
		}
		else if(knowledge == ""){
				alert("Please select an option");
		}
		else if(improvement == ""){
				alert("Please select an option");
		}
		else if(community == ""){
				alert("Please select an option");
		}
		else if(hopes == ""){
				alert("Please tell us what you hope to get out of attending Youth Spiritual Summit");
		}
		else if(activities == ""){
				alert("Please provide some activities you enjoy");
		}

		else if(question == ""){
				alert("Please provide a question that you would like answered");
		}
		else if(ec_name1 == ""){
				alert("Please provide a name for the Youth's emergency contact");
		}	
		else if(ec_relationship1 == ""){
				alert("Please provide a relationship to the Youth");
		}	
		else if(ec_name2 == ""){
				alert("Please provide a name for the Youth's emergency contact");
		}	
		else if(ec_relationship2 == ""){
				alert("Please provide a relationship to the Youth");
		}	
		var str = "";
		var num = "";
		var num2 = "";
		var num3 = "";
		var pwWithNum = 0;
		var counternum = 0;
		var counternum2 = 0;
		var counternum3 = 0;
		var counter = 0;
		for(str of password){
			if(isNaN(str) == false){
				pwWithNum += 1;
			}
		}
		for(num of phone){
			if(isNaN(num) == false){
				counternum += 1;
			}
			else if(isNaN(num) == true){
				if(counter == 3 || counter == 7){
					if(num == "-"){
						counternum +=1;
					}
				}
			}
			counter += 1;
		}

		counter = 0;
		if(ec_phone1 != null){
			for(num2 of ec_phone1){
				if(isNaN(num2) == false){
					counternum2 += 1;
					}
				else if(isNaN(num2) == true){
					if(counter == 3 || counter == 7){
						if(num2 == "-"){
							counternum2 +=1;
						}
					}
				}
				counter += 1;
			}
		}
		counter = 0;
		if(ec_phone2 != null){
			for(num3 of ec_phone2){
				if(isNaN(num3) == false){
					counternum3 += 1;
					}
				else if(isNaN(num3) == true){
					if(counter == 3 || counter == 7){
						if(num3 == "-"){
							counternum3 +=1;
						}
					}
				}
				counter += 1;
			}
		}
		if(password.length < 8){
			alert("Please provide at least 8 characters");
		}
		else if(pwWithNum < 1){
			alert("Please provide a password with at least one character and one number");
		}
		else if(counternum != 12){
			alert("Please provide a valid phone number following the format 123-456-7890 parent");
		}
		else if(counternum2 != 12 && ec_phone1 != null){
			alert("Please provide a valid Emergency Contact number following the format 123-456-7890");
		}
		else if(counternum3 != 12 && ec_phone2 != null){
			alert("Please provide a valid Emergency Contact number following the format 123-456-7890 ec2");
		}
		else{
        var newPostRef = firebase.database().ref('/users/' + "<?php echo $email?>").update({
                first_name: first_name,
                last_name: last_name,
                phone: phone,
                password: password,
            },
            function (error) {
                if (error) {
                    alert("didn't go through")
                } else {
                    var postID = newPostRef.key;
                    if("<?php echo $_SESSION["queryData"]["user_type"] ?>" == "counselor" || "<?php echo $_SESSION["queryData"]["user_type"] ?>" == "admin")
                    {
                        alert("Your information has been saved successfully.");
                        window.location.href = "/dashboard.php";
                    }
                    console.log("went to firebase");
                }
            });
				

        if("<?php echo $_SESSION["queryData"]["user_type"] ?>" == "parent")
        {
            var newPostRef = firebase.database().ref('/users/' + "<?php echo $email?>").update({
                ec_name1: ec_name1,
                ec_phone1: ec_phone1,
                ec_relationship1: ec_relationship1,
                ec_name2: ec_name2,
                ec_phone2: ec_phone2,
                ec_relationship2: ec_relationship2,
            },
            function (error) {
                if (error) {
                    alert("didn't go through")
                } else {
                    alert("Your information has been saved successfully.");
                    var postID = newPostRef.key;
                    console.log("went to firebase");
                    window.location.href = "/dashboard.php";
                }
            });
        }

        if("<?php echo $_SESSION["queryData"]["user_type"] ?>" == "student")
        {
            var newPostRef = firebase.database().ref('/users/' + "<?php echo $email?>").update({
                    size: size,
                    spiritual: spiritual,
                    knowledge: knowledge,
                    improvement: improvement,
                    community: community,
                    hopes: hopes,
                    activities: activities,
                    question: question
                },
                function (error) {
                    if (error) {
                        alert("didn't go through")
                    } else {
                        alert("Your information has been saved successfully.");
                        var postID = newPostRef.key;
                        console.log("went to firebase");
                        window.location.href = "/dashboard.php";
                    }
                });
        }
				
		}
    });

    // Uploads an image and sets it as the user's profile picture.
    function validateImgProcess()
    {
        var iconUpload = document.getElementById('iconUpload');

        if(iconUpload.files.length != 0)
        {
            var emailwcharactersreplaced = "<?php echo $email ?>";

            var iconImage = new File([iconUpload.files[0]], emailwcharactersreplaced);
        
            var metadata = {contentType: 'image/jpeg'};

            firebase.storage().ref('icon/' + iconImage.name).put(iconImage, metadata).then(function(snapshot) 
            {
                alert("Your profile picture was successfully changed!");

                window.location.href = "/dashboard.php";
            });
        }
    }
</script>

<!-- This line deletes info in fields if it is placed above the script tags for some reason -->
<?php include('../../display_profile_pic.php') ?>