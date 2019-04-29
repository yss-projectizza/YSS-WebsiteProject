<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container">
    <a title="Go back to main page" class="navbar-brand"
      href="http://youthspiritualsummit.weebly.com">
      <img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-auto">
        <a style="right:50" href="/logout.php"><font color="white">Logout</font></a>
        <div id="profile">
              <img title="Edit your profile information"
                src="/profile_placeholder.jpg" onClick="goToProfile();"/>
              <p style="color:#eff3f9;">Hello <?php echo $_SESSION["queryData"]["first_name"];?></p>
        </div>
      </div>
    </div>
  </div>
</nav>