<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container">
    <a title="Go back to main page" class="navbar-brand"
      href="http://youthspiritualsummit.weebly.com">
      <img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="height: 13%;">
      <div>
        <div class="navbar-nav mx-auto">
          <a href="/dashboard.php" class="navlinks" style="margin-right: 20px;">Dashboard</font></a>
          <a href="/logout.php" class="navlinks">Logout</font></a>
          <div id="profile">
              <span style="color: white;"> Hello <?php echo $_SESSION["queryData"]["first_name"];?>!</span>
              <br/>
              <img title="Edit your profile information"
                src="/profile_placeholder.jpg" onClick="goToProfile();"/>
              <p style="color:#eff3f9;">Edit Profile</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>