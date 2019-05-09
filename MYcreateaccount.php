<?php
if(!isset($_SESSION))
{
    session_start();
}
?>

<!doctype html>
<html lang="en">

    <head>
        <title>Create an Account | Youth Spiritual Summit</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    <body>
        <?php include('header_loggedout.php') ?>
        <form id=form1 method="post" action="whichform.php">
            <div class="container" style = "background: white; margin-top: 20px;">
            <!-- Camp Registration Header -->
            <h1 align="center" style = "font-size:30px;padding-top: 20px;">Create a New Account</h1>

            <!-- NEW STUFF STARTING HERE -->
            <div class="block_1"><p style="padding-top:20px"</div> <hr />

            <div class="input-group mb-3">
                    <div class="input-group-prepend" style="padding-right: 30px;">
                            <span class="input-group-text">Who Are You?<b
                                style = "color: red;">*</b></span>
                    </div>
                            <select name="user_type" id="accountType" class="input-group-option" style="
                                padding-left: 15px;
                                padding-right: 20px;
                            ">
                                <option value="parentRegistration.php">I am a Parent/Guardian.</option>
                                <option value="counselor_registration.php">I am a Counselor.</option>
                                <option value="overage_registration.php">I am a Youth Participant over the age of 18.</option>
                            </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Enter email:<b style = "color: red;">*</b></span>
                </div>
                    <input type="email" placeholder="Ex: 12345@gmail.com" name="email" id="email" class="form-control" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Date of Birth:<b style = "color: red;">*</b></span>
                </div>
                    <input type="date" name="age" id="ageInput" class="form-control" required>
            </div>

            <div class="block_1"><p style="padding-top:30px"</div> <hr />
            <!-- Submit -->
            <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
                    <div class="col">
                        <!-- <button id="myBtn">Submit</button> -->
                        <button type="submit" value="Submit"
                                            name="proceed" id="submitAccount" class="rounded">Next
                    </div>
                </div>
            </div>
        </form>

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

            document.getElementById("submitAccount").addEventListener("click", function(){

                    var database = firebase.database();
                    var email = document.getElementById("email").value;
                    var dob = new Date(document.getElementById("ageInput").value);
                    var acct = document.getElementById("accountType").value;
                    email = email.replace(".", ",");
                    return firebase.database().ref('/users/' + email).once('value')

                    console.log("testing");
                    console.log(dob, email);
                    if (!email || !dob){
                        alert("Please fill in all fields");

                    }

                    var currentDate = new Date().getFullYear();
                    var age = Number(currentDate) - Number(dob.getFullYear());
                    if(age < 18) {
                            alert("You do not have permission to make an account. Your guardian must make one for you.");
            }});
        </script>
    </body>
</html>
