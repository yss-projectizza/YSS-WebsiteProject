<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
  $emailwcomma = $_SESSION["queryData"]["email"];
  $email= str_replace(".",",",$emailwcomma);
  $user=$_SESSION["queryData"]["user_type"];
?>
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

        <?php if($user == "student" || $user == "student18" || $user == "counselor"): ?>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Clothing Size:<b style="color: red;">*</b></span>
                <select class="form-control form-control-md" name="size" id="size">
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
                    <span class="input-group-text">Actively Improving Myself:<b style="color: red;">*</b></span>
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
                    <span class="input-group-text">Actively Involved In Making My Community Better:<b
                            style="color: red;">*</b></span>
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

        <?php endif?>
            <!-- Emergency Contacts -->
        <?php if($user == "parent" || $user == "student18"): ?>
        <div>
        <label>
            <p style="font-size:30px;padding-top: 10px;">Emergency Contacts</p>
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
            <input type="tel" placeholder="Ex: 1234567890" name="ec_phone1" id="ec_phone1" class="form-control"
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
            <input type="tel" placeholder="Ex: 1234567890" name="ec_phone2" id="ec_phone2" class="form-control"
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
        <?php if($user == "student" || $user == "student18"): ?>

        <label>
            <p style="font-size:30px;padding-top: 10px;">Health Information</p>
        </label>
        <div class="row initial-task-padding">
            <div class="col">
                <p>Please List Any Allergies You Have. If none, type N/A.<b style="color: red;">*</b></p>
                <input type="text" name="allergies" id="allergies" times-label="allergies" class="form-control"
                    required>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <p>Please List Any Medication You Are Currently On. If none, type N/A<b style="color: red;">*</b></p>
                <input type="text" name="meds" id="meds" times-label="meds" class="form-control" required>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <p>Please List Any Activity Restrictions.</b></p>
                <input type="text" name="activity_restrictions" value="" id="activity_restrictions"
                    times-label="activity_restrictions" class="form-control">
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <p>Please List Any Dietary Restrictions.</b></p>
                <input type="text" name="dietary_restrictions" value="" id="dietary_restrictions"
                    times-label="dietary_restrictions" class="form-control">
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
                <span class="input-group-text">Insurance Provider:<b style="color: red;">*</b></span>
            </div>
            <input type="text" placeholder="Ex: PPO" name="insurance" id="insurance" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Policy Holder:<b style="color: red;">*</b></span>
            </div>
            <input type="text" placeholder="Ex: John" name="policy_holder" id="policy_holder" class="form-control"
                required>
        </div>
        <div class="block_1">
            <p style="padding-top:30px">
        </div>

        <?php endif?>
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


    <!--Javascript Segment-->
    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>

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

        firebase.database().ref('/users/' + "<?php echo $email?>").once("value").then(async function (snapshot) {
            let profiledata = snapshot.val();
            console.log(profiledata)
            document.getElementById("first_name").value = profiledata.first_name;
            document.getElementById("last_name").value = profiledata.last_name;
            document.getElementById("phone").value = profiledata.phone;
            document.getElementById("password").value = profiledata.password;
            document.getElementById("spiritual").value = profiledata.spiritual;
            document.getElementById("knowledge").value = profiledata.knowledge;
            document.getElementById("improvement").value = profiledata.improvement;
            document.getElementById("community").value = profiledata.community;
            document.getElementById("hopes").value = profiledata.hopes;
            document.getElementById("activities").value = profiledata.activities;
            document.getElementById("question").value = profiledata.question;
            document.getElementById("ec_name1").value = profiledata.ec_name1;
            document.getElementById("ec_phone1").value = profiledata.ec_phone1;
            document.getElementById("ec_relationship1").value = profiledata.ec_relationship1;
            document.getElementById("ec_name2").value = profiledata.ec_name2;
            document.getElementById("ec_phone2").value = profiledata.ec_phone2;
            document.getElementById("ec_relationship2").value = profiledata.ec_relationship2;
            document.getElementById("allergies").value = profiledata.allergies;
            document.getElementById("meds").value = profiledata.meds;
            document.getElementById("activity_restrictions").value = profiledata.activity_restrictions;
            document.getElementById("dietary_restrictions").value = profiledata.dietary_restrictions;
            document.getElementById("other").value = profiledata.other;
            document.getElementById("insurance").value = profiledata.insurance;
            document.getElementById("policy_holder").value = profiledata.policy_holder;

        });

        document.getElementById("update").addEventListener("click", function () {
            var database = firebase.database();
            //getting input data
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;
            var phone = document.getElementById("phone").value;
            // var email = document.getElementById("email").value; //COMMENTED THIS BECAUSE EMAIL KEY IS UNCHANGEABLE
            // var email = email.replace(".",",");
            // var oldemail = "<?php echo $email;?>";
            var password = document.getElementById("password").value;
            var size = document.getElementById("size").value;
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

            var newPostRef = firebase.database().ref('/users/' + /*oldemail*/ "<?php echo $email?>").update({
                    first_name: first_name,
                    last_name: last_name,
                    phone: phone,
                    password: password,
                    size: size,
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
                },
                function (error) {
                    if (error) {
                        alert("didn't go through")
                    } else {
                        alert("Your information has been saved successfully.")
                        var postID = newPostRef.key;
                        console.log("went to firebase");
                        // Data saved successfully!
                    }
                });
        });
    </script>
</body>

</html>