<?php
  session_start();
?>
<html lang="en">
  <head>
    <title>Edit Your Account | Youth Spiritual Summit</title>
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light">
      <div class="container">
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
        <div class="col">
          Email<b style = "color: red;">*</b>
          <br>
          <input id="email" type="semail" name="email"
           times-label="email" class="form-control" required>
          <br>
        </div>
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


    <!--Javascript Segment
  -->
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

      document.getElementById("update").addEventListener("click", function(){
          var database = firebase.database();
          //getting input data
          var fname = document.getElementById("fname").value;
          var lname = document.getElementById("lname").value;
          var phone = document.getElementById("phone").value;
          var email = document.getElementById("email").value;
          var password = document.getElementById("password").value;
          var emailwcharactersreplaced = email.replace(".",",");
          var oldemail = "<?php echo $_SESSION["newuserinfo"]["email"];?>";


          var newPostRef = firebase.database().ref('/users/' + emailwcharactersreplaced).update({
              first_name: fname,
              last_name: lname,
              phone: phone,
              email: email,
              password: password
            },
             function(error){
                if(error) {
                    alert("didn't go through")
                }
                else {
                    var postID = newPostRef.key;
                    window.location.replace("/dashboard.php");
                    console.log("went to firebase");
                // Data saved successfully!
                }
            });
        //}
      });
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
