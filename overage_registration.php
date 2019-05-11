<?php
// Initialize the session
if(!isset($_SESSION))
{
    session_start();
}
?>

<script>
    var email = "<?php echo $_SESSION["newuserinfo"]["email"];?>";
    var emailwcharactersreplaced = email.replace(".",",");
    var dob = "<?php echo $_SESSION["newuserinfo"]["age"];?>";
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
    <link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <?php include("header_loggedout.php")?>

    <form id=form1 action="formToDatabase.php" method="post" enctype="multipart/form-data"
    onsubmit="imagetoDatabase()">
        <div class="container" style = "background: white; margin-top: 20px;">
        <!-- Camp Registration Header -->
        <h1 align="center" style = "font-size:40px;padding-top: 20px;">Youth Participant Registration</h1>

        <!-- NEW STUFF STARTING HERE -->
        <div class="block_1"><p style="padding-top:20px"</div>
            <hr  style="
              border-width: medium;
              border-color: LightSteelBlue;
            " />
        	<div class="container">
        </div>

        <div class="container">
        <!-- Camper Information -->
            <label><p style = "font-size:30px;">Participant Information (18+)</p></label>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">First Name:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" pattern="[A-Za-z'-]+" placeholder="Ex: John"
                           name="first_name" id="firstname" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Last Name:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" pattern="[A-Za-z'-]+" placeholder="Ex: Smith"
                           name="last_name" id="lastname" class="form-control" required>
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
                        <input type="password" placeholder="Ex: abcde123 (8+ char, at least one number)" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" name="password" id="password" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <span class="input-group-text">Retype Password:<b style = "color: red;">*</b></span>
                    </div>
                        <input type="password" placeholder="Must match above password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" name="password2" id="password2" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Phone number:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Format: 123-456-7890" name="phone" id="phone" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Upcoming School Year:<b style = "color: red;">*</b></span>
                        <select class="form-control form-control-md" name="year" id="schoolyear">
                            <option>Junior</option>
                            <option>Senior</option>
                            <option>Early College</option>
                            <option>Home School</option>
                        </select>
                    </div>
                </div>

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

                <form enctype="multipart/form-data">
                    Upload Picture of Drivers License / Government ID:<b style = "color: red;">*</b>
                    <input type="file" name="file" id="upload" value="upload" class="form-control" required>
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
                        <select class="form-control form-control-md" id="community" name="community">
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
                        <textarea id="hopes" name="hopes" cols="132" rows="3" value=""></textarea>
                    </div>
                </div>

                <div class="row initial-task-padding">
                    <div class="col">
                        <p>What are some activities that you enjoy?</p>
                        <textarea id="activities" name="activites" cols="132" rows="3" value=""></textarea>
                    </div>
                </div>

                <div class="row initial-task-padding">
                    <div class="col">
                        <p>What is one question you would like to have answered during this year's Summit?</b></p>
                        <textarea id="question" name="question" cols="132" rows="3" value=""></textarea>
                    </div>
                </div>


        <div class="block_1"><p style="padding-top:30px"</div> <hr />

        <div class="container">
        <!-- Emergency Contacts -->
        </div>
            <label><p style = "font-size:30px;padding-top: 10px;">Emergency Contacts</p></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Name (First & Last):<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" pattern="([A-Z][a-zA-Z]*)" placeholder="Ex: John Smith" name="ec_name1" id="ec_name1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Phone:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Format: 123-456-7890" name="ec_phone1" id="ec_phone1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Relationship:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" placeholder="Ex: Father" name="ec_relationship1" id="ec_relationship1" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 2 - Name (First & Last)<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" pattern="([A-Z][a-zA-Z]*)" placeholder="Ex: Emma Jones" name="ec_name2" id="ec_name2" class="form-control" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 2 - Phone:<b style = "color: red;">*</b></span>
                    </div>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Format: 123-456-7890" name="ec_phone2" id="ec_phone2" class="form-control" required>
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

            <div class="input-group mb-3"  style = "padding-top: 20px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Insurance Provider:<b style = "color: red;">*</b></span>
                 </div>
                <input type="text" placeholder="Ex: PPO" name="insurance" id="insurance" class="form-control" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Policy Holder:<b style = "color: red;">*</b></span>
                 </div>
                <input type="text" placeholder="Ex: Kaiser" name="policy_holder" id="policy_holder" class="form-control" required>
            </div>
        <div class="block_1"><p style="padding-top:30px"</div> <hr />

        <!-- Submit -->
            <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
                <div class="col">
                    <!-- <button id="myBtn">Submit</button> -->
                    <input type="submit" class="rounded" value="Submit" name="subscribe" id="submit">
                </div>
            </div>
        </div>
    </form>


	<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
        <!--<script src="counselor_app.js"></script>
        <script src="firebaseSetup.js"></script>-->

        <script>
        var dlImage;

        function uploadImage(evt){
            licenseUpload = document.getElementById('upload');
            dlImage = new File([licenseUpload.files[0]], emailwcharactersreplaced);
        }
        document.getElementById('upload').addEventListener('change', uploadImage, false);

        function imagetoDatabase(){
            var config = {
                apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
                authDomain: "yss-project-69ba2.firebaseapp.com",
                databaseURL: "https://yss-project-69ba2.firebaseio.com",
                projectId: "yss-project-69ba2",
                storageBucket: "yss-project-69ba2.appspot.com",
                messagingSenderId: "530416464878"
            };
            firebase.initializeApp(config);
            var storageRef = firebase.storage().ref();
            var database = firebase.database();
            var storageRef = firebase.storage().ref('dl/' + dlImage.name);
            alert("here! image name: " + dlImage.name);
            var metadata = {
                contentType: 'image/jpeg'
            };
            storageRef.put(dlImage, metadata).then(function(snapshot) {
                console.log("Uploaded an array!");
            });
        }
        </script>

</body>
</html>
