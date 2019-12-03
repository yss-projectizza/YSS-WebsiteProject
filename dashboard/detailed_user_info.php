<?php
if (!isset($_SESSION))
  session_start();
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

<script>
  var config = 
    {
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
    <title> Detailed Information | Youth Spiritual Summit</title>
      
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/student_tables.css">
    <link rel="stylesheet" href="/css/detailed_info.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body style="background-color:rgb(233, 231, 231)"> 
    <?php include('../header_loggedin.php') ?>
    <?php include('../display_profile_pic.php') ?>
    <?php $key=$_GET['key']; ?>
    <?php $user_type=$_GET['type']; ?>

    <div class="card" style="margin-top:2%; margin-left:5%; margin-right:5%; margin-bottom:13%; padding:5%; padding-left:10%; padding-right:10%">
        <h2>Profile Information</h2>
    
        <div class="row initial-task-padding">
            <img id="user-pic" style="border:3px solid black; border-radius:50%; width: 150px; margin-bottom:15px">
        </div>
        
        <div class="row initial-task-padding">
            <div class="col">
                <strong>First Name</strong>
                <input id="first_name" type="text" name="first_name" times-label="first_name" class="form-control"
                    required>
                <br>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <strong>Last Name</strong>
                <input id="last_name" type="text" name="first_name" times-label="first_name" class="form-control"
                    required>
                <br>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <strong>Date of Birth</strong>
                <input id="bday" type="date" name="first_name" times-label="first_name" class="form-control"
                    required>
                <br>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <strong>Phone Number</strong>
                <input id="phone" type="tel" name="phone" times-label="phone" class="form-control" required>
                <br>
            </div>
        </div>

        <div class="row initial-task-padding">
            <div class="col">
                <strong>Password</strong>
                <input id="password" type="password" name="password" times-label="password" class="form-control"
                    required>
                <br>
            </div>
        </div>

        <?php if($user_type == "student"): ?>
            <br>
            <h2>Retreat Information</h2>
            <br>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Shirt Size:</span>
                    <select class="form-control form-control-md" name="size" id="size">
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                        <option>XL</option>
                        <option>XXL</option>
                    </select>
                </div>
            </div>

            <div class="row initial-task-padding">
                <div class="col">
                    <strong>Balance Due</strong>
                    <input id="balance" type="number" step="0.01" class="form-control" required>
                    <br>
                </div>
            </div>

            <br>
            <h2>Emergency Contact Information</h2>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Name (First & Last):</span>
                    </div>
                    <input type="text" pattern="[A-Za-z]+((\s)?((\'|\-|\.)?([A-Za-z])+))*" name="ec_name1" id="ec_name1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Phone:</span>
                    </div>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="ec_phone1" id="ec_phone1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Relationship:</span>
                    </div>
                    <input type="text" name="ec_relationship1" id="ec_relationship1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 2 - Name (First & Last):</span>
                    </div>
                    <input type="text" pattern="[A-Za-z]+((\s)?((\'|\-|\.)?([A-Za-z])+))*" name="ec_name2" id="ec_name2" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 2 - Phone:</span>
                    </div>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="ec_phone2" id="ec_phone2" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 2 - Relationship:</span>
                    </div>
                    <input type="text" name="ec_relationship2" id="ec_relationship2" class="form-control" required>
                </div>
            

            <br>
            <h2>Health Information</h2>

            <div class="row initial-task-padding">
                <div class="col">
                    <strong>Allergies</strong>
                    <textarea id="allergies" cols="120" rows="3"></textarea>
                </div>
            </div>
            <br>

            <div class="row initial-task-padding">
                <div class="col">
                    <strong>Medications</strong>
                    <textarea id="meds" cols="120" rows="3"></textarea>
                </div>
            </div>
            <br>

            <div class="row initial-task-padding">
                <div class="col">
                    <strong>Activity Restrictions</strong>
                    <textarea id="activities" cols="120" rows="3"></textarea>
                </div>
            </div>
            <br>

            <div class="row initial-task-padding">
                <div class="col">
                    <strong>Dietary Restrictions</strong>
                    <textarea id="dietary" cols="120" rows="3"></textarea>
                </div>
            </div>
            <br>

            <div class="row initial-task-padding">
                <div class="col">
                    <strong>Other Important Information</strong>
                    <textarea id="other" cols="120" rows="3"></textarea>
                </div>
            </div>
            <br>
        <?php endif ?>

        <?php if($user_type == "counselor"): ?>
            <br>
            <h2>Retreat Information</h2>
            <br>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Shirt Size:</span>
                    <select class="form-control form-control-md" name="size" id="size">
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                        <option>XL</option>
                        <option>XXL</option>
                    </select>
                </div>
            </div>
        <?php endif ?>

        <div>
            <button type="button" class="rounded" id="submit-change-btn" onclick="submitChanges()">Save Changes</button>
            <button type="button" class="rounded" onclick="cancel()">Cancel</button>
        </div>
    </div> <!-- end of card -->
  </body>
</html>

<script>
    let key = "<?php echo $key ?>";
    let user_type = "<?php echo $user_type ?>";

    firebase.storage().ref('icon/' + key).getDownloadURL().then(function (url)
    {
        document.getElementById("user-pic").src = url;
    }).catch(function (error)
    {
        document.getElementById("user-pic").src = "/profile_placeholder.jpg";
    });

    firebase.database().ref("users/" + key).once("value", function(snapshot)
    {
        let user = snapshot.val();
        
        document.getElementById("first_name").value = user.first_name;
        document.getElementById("last_name").value = user.last_name;
        document.getElementById("bday").value = user.dob;
        
        if(user.hasOwnProperty("phone"))
            document.getElementById("phone").value = user.phone;
        else
            document.getElementById("phone").value = "000-000-0000";
        
        document.getElementById("password").value = user.password;
        
        if(user_type == "counselor")
        {
            document.getElementById("size").value = user.size;
        }

        if(user_type == "student")
        {
            if(user.hasOwnProperty("size"))
                document.getElementById("size").value = user.size;
            else
                document.getElementById("size").value = "Small";
                
            document.getElementById("balance").value = user.balance;

            if(user.hasOwnProperty("allergies"))
                document.getElementById("allergies").value = user.allergies;
            else
                document.getElementById("allergies").value = "N/A";

            if(user.hasOwnProperty("meds"))
                document.getElementById("meds").value = user.meds;
            else
                document.getElementById("meds").value = "N/A";

            if(user.hasOwnProperty("activities"))
                document.getElementById("activities").value = user.activities;
            else
                document.getElementById("activities").value = "N/A";

            if(user.hasOwnProperty("dietary"))
                document.getElementById("dietary").value = user.dietary;
            else
                document.getElementById("dietary").value = "N/A";

            if(user.hasOwnProperty("other"))
                document.getElementById("other").value = user.other;
            else
                document.getElementById("other").value = "N/A";

            let parent_key = user.parent_email.replace(".", ",");

            firebase.database().ref("users/" + parent_key).once("value", function(snapshot)
            {
                let parent = snapshot.val();

                document.getElementById("ec_name1").value = parent.ec_name1;
                document.getElementById("ec_phone1").value = parent.ec_phone1;
                document.getElementById("ec_relationship1").value = parent.ec_relationship1;
                
                document.getElementById("ec_name2").value = parent.ec_name2;
                document.getElementById("ec_phone2").value = parent.ec_phone2;
                document.getElementById("ec_relationship2").value = parent.ec_relationship2;
            });
        }
    });

    function submitChanges()
    {
        let user_type = "<?php echo $user_type ?>";
        let key = "<?php echo $key ?>";

        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var dob = document.getElementById("bday").value;
        var phone = document.getElementById("phone").value;
        var password = document.getElementById("password").value;

        firebase.database().ref('/users/' + key).update(
        {
            first_name: first_name,
            last_name: last_name,
            dob: dob,
            phone: phone,
            password: password
        });

        // Save changes specific to students
        if(user_type == "student")
        {
            var size = document.getElementById("size").value;
            var balance = parseFloat(document.getElementById("balance").value);
            var allergies = document.getElementById("allergies").value;
            var meds = document.getElementById("meds").value;
            var activities = document.getElementById("activities").value;
            var dietary = document.getElementById("dietary").value;
            var other = document.getElementById("other").value;

            firebase.database().ref('/users/' + key).update(
            {
                size: size,
                balance: balance,
                allergies: allergies,
                meds: meds,
                activities: activities,
                dietary: dietary,
                other: other
            });

            firebase.database().ref('users/' + key).once("value", function(snapshot)
            {
                let user = snapshot.val();

                let parent_key = user.parent_email.replace(".", ",");

                var ec_name1 = document.getElementById("ec_name1").value;
                var ec_phone1 = document.getElementById("ec_phone1").value;
                var ec_relationship1 = document.getElementById("ec_relationship1").value;
                
                var ec_name2 = document.getElementById("ec_name2").value;
                var ec_phone2 = document.getElementById("ec_phone2").value;
                var ec_relationship2 = document.getElementById("ec_relationship2").value;

                firebase.database().ref('users/' + parent_key).update(
                {
                    ec_name1: ec_name1,
                    ec_phone1: ec_phone1,
                    ec_relationship1: ec_relationship1,
                    ec_name2: ec_name2,
                    ec_phone2: ec_phone2,
                    ec_relationship2: ec_relationship2
                });
            });
        }

        alert("Changes successfully saved!");

        location.reload();
    }

    function cancel()
    {
        window.location.href='/dashboard/view_all_user_info.php';
    }
</script>