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
    <title>Parent Registration | Youth Spiritual Summit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!--
    <link rel = "stylesheet" href = "/css/parentRegistrationStyle.css ">
    -->
  </head>

  <body style = "text-align: center" >
    <!--
    Navigation bar
    -->
    <?php include("header_loggedout.php")?>

    <form id= "appForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return submitForm();">
        <div class="container" style = "background: white; margin-top: 20px;">
            <!-- Parent Registration Header -->
            <h1 align="center" style = "font-size:50px;padding-top: 20px;">Register for a Parent Account</h1>
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
                        <input id = "fnameInput" type="text" pattern="[A-Za-z'-]+" placeholder="Ex: John"
                        name="firstname" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Last Name:<b
                                style = "color: red;">*</b></span>
                            </div>
                        <input id = "lnameInput" type="text" pattern="[A-Za-z'-]+" placeholder="Ex: Smith"
                        name="lastname" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone Number:
                                <b style = "color: red;">*</b>
                            </span>
                        </div>
                        <input id="phoneInput" type="tel" placeholder="Ex: (123)-456-7890"
                        name="phone" class="form-control" required>
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
                        <input id="zipcodeInput" type="text" placeholder="Ex: 111222"
                        name="zipcode" class="form-control" required>
                    </div>

                    <p align="left" style = "font-size:20px;padding-top: 10px;">
                        Emergency Contact 1 Information</p>
                    <br>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Relationship: <b
                                style = "color: red;">*</b></span>
                        </div>
                        <input id = "ec1relInput" type="text"name="ec1relation"
                        class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name: <b
                                style = "color: red;">*</b></span>
                        </div>
                        <input id = "ec1nameInput" type="text"name="ec1name"
                        class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone Number:
                                <b style = "color: red;">*</b>
                            </span>
                        </div>
                        <input id="ec1phoneInput" type="tel" placeholder="Ex: (123)-456-7890"
                        name="ec1phone" class="form-control" required>
                    </div>

                    <p align="left" style = "font-size:20px;padding-top: 10px;">
                        Emergency Contact 2 Information</p>
                    <br>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Relationship: <b
                                style = "color: red;">*</b></span>
                        </div>
                        <input id = "ec2relInput" type="text"name="ec2relation"
                        class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name: <b
                                style = "color: red;">*</b></span>
                        </div>
                        <input id = "ec2nameInput" type="text"name="ec2name"
                        class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone Number:
                                <b style = "color: red;">*</b>
                            </span>
                        </div>
                        <input id="ec2phoneInput" type="tel" placeholder="Ex: (123)-456-7890"
                        name="ec2phone" class="form-control" required>
                    </div>

                    <p align="left" style = "font-size:20px;">
                        Parent Authentication</p>
                    <br>
                        <form enctype="multipart/form-data">
                            Picture of Drivers License:<b style = "color: red;">*</b>
                            <input type="file" name="license" id="licenseUpload" value="upload" class="form-control" required>
                        </form>
      	<!-- Submit -->
        <div class="row margin-data"
          style = "padding-bottom: 50px;
                  padding-top: 10px;
                  align: center"">
      			<div class="col">
      				<input type="submit" id="submitButton" class="btn-xl" align="center" value="Submit">
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
            //dlImage = evt.target.files[0];
            licenseUpload = document.getElementById('licenseUpload');
            dlImage = new File([licenseUpload.files[0]], licenseUpload.files[0].name);
            //dlImage = document.getElementById('licenseUpload').files[0];
            //dlImage = new File([evt.target.files[0]], evt.target.files[0].name);
            alert("upload image: " + dlImage.name + " size: " + dlImage.size);

        }
        document.getElementById('licenseUpload').addEventListener('change', uploadImage, false);
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
            var ecRelation1 = document.getElementById("ec1relInput").value;
            var ecName1 = document.getElementById("ec1nameInput").value;
            var ecPhone1 = document.getElementById("ec1phoneInput").value;
            //Emergency Contact2
            var ecRelation2 = document.getElementById("ec2relInput").value;
            var ecName2 = document.getElementById("ec2nameInput").value;
            var ecPhone2 = document.getElementById("ec2phoneInput").value;    
            
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
                    ec_name1: ecName1,
                    ec_relationship1: ecRelation1,
                    ec_phone1: ecPhone1,
                    ec_name2: ecName2,
                    ec_relationship2: ecRelation2,
                    ec_phone2: ecPhone2,
                    total_credit_due: total_credit_due
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
    </script>
  </body>
</html>
