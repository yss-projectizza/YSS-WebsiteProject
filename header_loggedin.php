<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container">
    <a title="Go back to main page" class="navbar-brand"
      href="http://youthspiritualsummit.weebly.com">
      <img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" alt="" width="175" height=auto>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="height: 13%;">
      <div>
        <div class="navbar-nav mx-auto">
          <a href="/dashboard.php" class="navlinks" style="margin-right: 20px;">Dashboard</a>
          <a href="/logout.php" class="navlinks">Logout</a>
          <div id="profile">
              <span id="name-span" style="color: white;"></span>
              <br/>
              <img id="profile-pic" title="Edit your profile information"
                 onClick="document.location.href = '/dashboard/main_users/profile.php';" style="size:auto;"/>
              <p style="color:#eff3f9;">Edit Profile</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
<div class="footer top-buffer">
  <div class="container">
    <div class="row align-items-center">
      <div class="col" id="left">
        Call Us: 949-416-3753
      </div>
      <div class="col" id="mid">
        Follow us:  
        <img src="/instagram.svg" width="10%" onClick="document.location.href = 'https://www.instagram.com/youth_summit/';"/>
        <img src="/facebook.svg" width="11%" onClick="document.location.href = 'https://www.facebook.com/youthspiritualsummit/';"/>
      </div>
      <div class="vertline"></div>
      <div class="col" id="right">
        © 2019 Youth Spiritual Summit
      </div>
    </div>
  </div>
</div>

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

  let key = "";

  if("<?php echo $_SESSION["queryData"]["user_type"]?>" == "student")
  {
    key = "<?php echo $_SESSION["queryData"]["studentEmail"]; ?>";
  }
  else
  {
    key = "<?php echo $_SESSION["queryData"]["email"]; ?>";
  }

  key = key.replace(".", ",");

  firebase.database().ref('users/' + key).once("value", function(snapshot)
  {
    document.getElementById("name-span").innerHTML = "Hello " + snapshot.val()["first_name"] + "!";
  });

  // grabs icon from storage.
  firebase.storage().ref('icons/' + key).getDownloadURL().then(function(url)
  {
    let profile_pic = document.getElementById("profile-pic");

    profile_pic.src = url;
  }).catch(function(error) // sets profile pic to default if no picture found.
  {
    let profile_pic = document.getElementById("profile-pic");

    profile_pic.src = "/profile_placeholder.jpg";
  });
</script>