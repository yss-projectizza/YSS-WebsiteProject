<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
  $emailwcomma = $_SESSION["queryData"]["email"];
  $email= str_replace(".",",",$emailwcomma);
?>
<html lang="en">
  <head>
    <title>Edit Your Account | Youth Spiritual Summit</title>
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <?php include '../../navigation.php'; ?>
    <div class="container profile-box">
    <!-- Profile Information -->
      <label><p style = "font-size:26px;">Profile Information</p></label>

      <div class="row initial-task-padding">
        <div class="col">
          First name<b style = "color: red;">*</b>
          <input id="fname"type="text" name="fname"
          times-label="fname" class="form-control" required>
          <br>
        </div>
      </div>

      <div class="row initial-task-padding">
        <div class="col">
          Last name<b style = "color: red;">*</b>
          <input id="lname"type="text" name="lname"
          times-label="lname" class="form-control" required>
          <br>
        </div>
      </div>

      <div class="row initial-task-padding">
        <!-- <div class="col">
          Email<b style = "color: red;">*</b>
          <br>
          <input id="email" type="semail" name="email"
           times-label="email" class="form-control" required>
          <br>
        </div> -->
      </div>

      <div class="row initial-task-padding">
        <div class="col">
          Phone number<b style = "color: red;">*</b>
          <input id="phone" type="tel" name="phone"
          times-label="phone" class="form-control" required>
          <br>
        </div>
      </div>

      <div class="row initial-task-padding">
        <div class="col">
            Password<b style = "color: red;">*</b>
            <input id="password" type="password" name="password"
            times-label="password" class="form-control" required>
            <br>
        </div>
      </div>

      <!-- Submit -->
      <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
        <div class="row margin-data"
          style = "padding-bottom: 50px;
               padding-top: 10px;"
               align="center";>
            <button onclick="location.href = '/dashboard.php'" id="back"
              class="btn-xl" align="center" role="button"> Back
            </button>
            <input id="update" type="button"
              class="btn-xl" align="center" value="Save changes" >
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

      firebase.database().ref('/users/' + "<?php echo $email?>").once("value").then(async function(snapshot) {
          let profiledata= snapshot.val();
          console.log(profiledata)
          document.getElementById("fname").value = profiledata.first_name;
          document.getElementById("lname").value = profiledata.last_name;
          document.getElementById("password").value = profiledata.password;
      });

      document.getElementById("update").addEventListener("click", function(){
        var database = firebase.database();
        //getting input data
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var phone = document.getElementById("phone").value; // There is no phone number in the database yet
        // var email = document.getElementById("email").value; //COMMENTED THIS BECAUSE EMAIL KEY IS UNCHANGEABLE
        var password = document.getElementById("password").value;
        // var email = email.replace(".",",");
        var oldemail = "<?php echo $email;?>";


        var newPostRef = firebase.database().ref('/users/' + oldemail).update({
            first_name: fname,
            last_name: lname,
            password: password
          },
            function(error){
              if(error) {
                  alert("didn't go through")
              }
              else {
                  var postID = newPostRef.key;
                  console.log("went to firebase");
              // Data saved successfully!
              }
            });
      });
    </script>
  </body>
</html>
