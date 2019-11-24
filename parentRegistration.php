<?php
// Initialize the session
session_start();
?>

<script>
    var email = "<?php echo $_SESSION["newuserinfo"]["email"];?>";
    var emailwcharactersreplaced = email.replace(".",",");
    var dob = "<?php echo $_SESSION["newuserinfo"]["age"];?>";
    var total_credit_due = "0";
</script>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title> Guardian Registration | Youth Spiritual Summit</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!--
    <link rel = "stylesheet" href = "/css/parentRegistrationStyle.css ">
    -->
  </head>

  <body style = "text-align: center" >
    <?php include("header_loggedout.php")?>
    <form id= "appForm" action="formToDatabase.php" method="post"
    enctype="multipart/form-data" onsubmit="return validateImgProcess()">
      <div class="container" style = "background: white; margin-top: 20px;">
          <!-- Parent Registration Header -->
          <h1 align="center" style = "font-size:50px;padding-top: 20px;">Register for a Guardian Account</h1>
          <br>

        <div class="block_1"><p style="padding-top:20px"</div>
            <hr  style="
              border-width: medium;
              border-color: LightSteelBlue;
            " />
        	<div class="container">
                <!-- Info and Exp -->
                    <p align="left" style = "font-size:30px;padding-top: 10px;">Contact Information</p>
                    <br>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">First Name:<b
                                style = "color: red;">*</b></span>
                        </div>
                        <input id = "fnameInput" type="text" pattern="[A-Za-z]+(((\'|\-|\.)?([A-Za-z])+))" placeholder="Ex: John"
                        name="first_name" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Last Name:<b
                                style = "color: red;">*</b></span>
                            </div>
                        <input id = "lnameInput" type="text" pattern="[A-Za-z]+(((\'|\-|\.)?([A-Za-z])+))" placeholder="Ex: Smith"
                        name="last_name" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone Number:
                                <b style = "color: red;">*</b>
                            </span>
                        </div>
                        <input id="phoneInput" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Ex: 123-456-7890"
                        name="phone" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Enter A Password:<b style = "color: red;">*</b></span>
                        </div>
                            <input type="password" name="password" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" placeholder="Ex: abcde123 (8+ char, at least one number)" id="password" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Retype Your Password:<b style = "color: red;">*</b></span>
                        </div>
                            <input type="password" name="password2" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" placeholder="Ex: abcde123 (8+ char, at least one number)" id="password2" class="form-control" required>
                    </div>

                    <div class="block_1"><p style="padding-top:30px"></div> <hr>

                    <p align="left" style = "font-size:30px;padding-top: 10px;">
                        Residence Information</p>
                    <br>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Address:
                                <b style = "color: red;">*</b>
                            </span>
                        </div>
                        <input id="addressInput" type="text"
                        placeholder="Ex: 102 Irvine Avenue" name="address"
                        class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">City:
                                <b style = "color: red;">*</b>
                            </span>
                        </div>
                        <input id="cityInput" type="text" placeholder="Ex: Irvine" name="city"
                        class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Zipcode:
                                <b style = "color: red;">*</b>
                            </span>
                        </div>
                        <input id="zipcodeInput" type="text" placeholder="Ex: 12345"
                        name="zipcode" class="form-control" required>
                    </div>

        <div class="block_1"><p style="padding-top:30px"></div> <hr>

        <div class="container">
        <!-- Emergency Contacts -->
        </div>
            <p align="left" style = "font-size:30px;padding-top: 10px;">Contact Information</p>
                    <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Emergency Contact 1 - Name (First & Last):<b style = "color: red;">*</b></span>
                    </div>
                    <input type="text" pattern="[A-Za-z]+((\s)?((\'|\-|\.)?([A-Za-z])+))*" placeholder="Ex: John Smith" name="ec_name1" id="ec_name1" class="form-control" required>
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
                    <input type="text" pattern="[A-Za-z]+((\s)?((\'|\-|\.)?([A-Za-z])+))*" placeholder="Ex: Emma Jones" name="ec_name2" id="ec_name2" class="form-control" required>
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

                    <p align="left" style = "font-size:30px;"> Parent Authentication</p>
                    <br>
                        <form enctype="multipart/form-data">
                        <p align="left" style = "font-size:18px;">Upload Picture of Drivers License:<b style = "color: red;">*</b></p>
                            <br>
                            <input type="file" name="license" id="licenseUpload" value="upload" class="form-control" required>
                        </form>

      	<!-- Submit -->
        <div class="row margin-data"
          style = "padding-bottom: 50px;
                  padding-top: 10px;
                  align: center;">
      			<div class="col">
      				<input type="submit" name="subscribe" class="btn-xl"
              align="center" value="Submit">
      			</div>
      		</div>
    	</form>



<!--
Javascript Segment
-->

    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-storage.js"></script>

    <script>
        var dlImage;

        function uploadImage(evt){
            licenseUpload = document.getElementById('licenseUpload');
            dlImage = new File([licenseUpload.files[0]], emailwcharactersreplaced);
        }
        document.getElementById('licenseUpload').addEventListener('change', uploadImage, false);

        function validateImgProcess(){
            var password = document.getElementById("password").value;
            var password2 = document.getElementById("password2").value;

            if(password != password2){
                alert("Retyped password must match password");
                return false;
            }
            else {
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
                //alert("here! image name: " + dlImage.name);
                var metadata = {
                    contentType: 'image/jpeg'
                };
                storageRef.put(dlImage, metadata).then(function(snapshot) {
                    console.log("Uploaded an array!");
                });
                return true;
            }
        }
                  /*
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
            var storageRef = firebase.storage().ref();
            var database = firebase.database();
            //name and password
            var fName = document.getElementById("fnameInput").value;
            var lName = document.getElementById("lnameInput").value;
            var password = document.getElementById("password").value;
            var password2 = document.getElementById("password2").value;
            //contact info
            var phoneNum = document.getElementById("phoneInput").value;
            //Residence info
            var address = document.getElementById("addressInput").value;
            var city = document.getElementById("cityInput").value;
            var zipCode = document.getElementById("zipcodeInput").value;
            //Emergency Contact 1
            var ec_name1 = document.getElementById("ec_name1").value;
            var ec_phone1 = document.getElementById("ec_phone1").value;
            var ec_relationship1 = document.getElementById("ec_relationship1").value;
            var ec_name2 = document.getElementById("ec_name2").value;
            var ec_phone2 = document.getElementById("ec_phone2").value;
            var ec_relationship2 = document.getElementById("ec_relationship2").value;


            if ( password != password2 ){
                    alert("Retyped password must match password");
            } else{

                //upload dl image to storage
                var storageRef = firebase.storage().ref('dl/' + dlImage.name);
                alert("here! image name: " + dlImage.name);
                var metadata = {
                    contentType: 'image/jpeg'
                };
                storageRef.put(dlImage, metadata).then(function(snapshot) {
                    console.log("Uploaded an array!");
                });
                //upload user data to database
                var newPostRef = firebase.database().ref('/users/' +  emailwcharactersreplaced).set({
                    dob: dob,
                    email: email,
                    user_type: "parent",
                    first_name: fName,
                    last_name: lName,
                    password: password,
                    phone: phoneNum,
                    address: address,
                    city: city,
                    zipcode: zipCode,
                    ec_name1: ec_name1,
                    ec_phone1: ec_phone1,
                    ec_relationship1: ec_relationship1,
                    ec_name2: ec_name2,
                    ec_phone2: ec_phone2,
                    ec_relationship2: ec_relationship2,
                    total_credit_due: total_credit_due,
                    credit_due:0,
                    attendees:[]
                },

                    function(error){
                    if(error) {
                        alert("didn't go through")
                    }
                    else {
                        var postID = newPostRef.key;
                        window.location.replace("login.php");
                        console.log("went to firebase");
                    }
                });

            }
            return false;
        }
                      */
    </script>
  </body>
</html>
