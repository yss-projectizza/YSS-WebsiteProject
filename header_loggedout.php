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
					<a class="navlinks" href="/login.php">Login</a>
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