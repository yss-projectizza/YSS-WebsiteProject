<!doctype html>
<html lang="en">
    <head>
        <title>Youth Spiritual Summit</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredericka+the+Great"> -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"> -->
        <!-- <link rel="stylesheet" href="registrationstyle.css"> -->
        <!-- <link rel="stylesheet" href="StudentRegistration.css"> -->

            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> -->
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->

    </head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
		<div class="container" style = "background: LightSteelBlue">
			<a class="navbar-brand" href="http://youthspiritualsummit.weebly.com">
				<img src="https://youthspiritualsummit.weebly.com/uploads/1/1/0/7/110732989/published/yss-logo-white_2.png" width="150" height="65" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav mx-auto">
					<a class="nav-item nav-link" href="http://youthspiritualsummit.weebly.com"><font color="white">Home</font></a>
                    <!-- change to YSS Activities --> 
					<a class="nav-item nav-link" href="http://campizza.com/calendar"><font color="white">Activities</font></a>
                    <!-- change to YSS Fees --> 
					<a class="nav-item nav-link" href="http://campizza.com/camp-fees"><font color="white">Fees</font></a> 
                    <!-- change to YSS Contact --> 
					<a class="nav-item nav-link" href="http://campizza.com/contact"><font color="white">Contact</font></a>
				</div>
			</div>
		</div>
	</nav>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container" style = "background: white; margin-top: 20px;">
    <!-- Financial Aid Header -->
    <h1 align="center" style = "font-size:40px;padding-top: 20px;">Financial Aid Application</h1>
    
  	<div class="container">
    <!-- Financial Aid Information -->
        <label><p style = "font-size:26px;">Financial Information</p></label>

        <div class="row initial-task-padding">
		 	<div class="col">
                How many people live in your household?<b style = "color: red;">*</b>
                <input type="text" name="household" times-label="household" class="form-control" required>
                <br>
	  		</div>
	  	</div>
 
          <div class="row initial-task-padding">
		 	<div class="col">
                What is your total annual family household income? (combined income of everyone in the household)<b style = "color: red;">*</b>
                <br>
                <form action="/action_page.php">
                    <input type="radio" name="income" value="below $30,000"> Below $30,000 <br>
                    <input type="radio" name="income" value="$30,000 - $39,999"> $30,000 - $39,999 <br>
                    <input type="radio" name="income" value="$40,000 - $49,999"> $40,000 - $49,999 <br>
                    <input type="radio" name="income" value="$50,000 - $59,999"> $50,000 - $59,999 <br>
                    <input type="radio" name="income" value="$60,000 or above"> $60,000 or above <br>
                </form>
                <br>
	  		</div>
	  	</div>


        <div class="row initial-task-padding">
		 	<div class="col">
                How much of the $299 registration fee are you able to pay?<b style = "color: red;">*</b>
                <input type="text" name="can pay" times-label="can pay" class="form-control" required>
                <br>
	  		</div>
	  	</div>

        <div class="row initial-task-padding">
		 	<div class="col">
                What local organizations (e.g. masjids) do you attend ? The Youth Spiritual Summit will reach out to these organizations to see if they will support local youth to attend the Summit.?<b style = "color: red;">*</b>
                <input type="text" name="org" times-label="org" class="form-control" required>
                <br>
            </div>
        </div>

        <div class="row initial-task-padding">
		 	<div class="col">
                Provide a brief description of the circumstances that lead you to request financial aid.<b style = "color: red;">*</b>
                <input type="text" name="desc" times-label="org" class="form-control" required>
                <br>
            </div>
        </div> 

        <div class="row initial-task-padding">
            <div class="col">
            The Youth Spiritual Summit is a non-profit organization and everyone involved is a volunteer who earns no financial compensation for their participation. All funds made from the registration fees go into the cost of running the program. The Youth Spiritual Summit is committed to supporting every youth who wishes to attend this program, regardless of their financial means. By completing this application, the youth and family of the youth are committed to seeking sponsorship from local organizations and/or individuals who can support the program. By completing this application, you are assuming responsibility for finding the funding to attend the Youth Spiritual Summit. The Youth Spiritual Summit will assist you in identifying funding sources and in telling your story to those who may be able to assist. Someone from the Youth Spiritual Summit will be in touch with you to support and advise you on the work ahead.<b style = "color: red;">*</b>
            <br>
            <div class="ans">
                <form action="/action_page.php">
                    <input type="radio" name="income" value="below $30,000"> I agree to the statement above <br>
                </form>
            </div>
		</div>   
</div>

	
	<input type="hidden" id="gender" name="gender" value="">

	<!-- Submit -->
    <div class="row margin-data" style = "padding-bottom: 50px;padding-top: 10px;" align="center">
			<div class="col">
				<input type="submit" class="btn-xl" align="center" value="Submit" >
			</div>
		</div>
	</div>
	</form>

    <!--Javascript here-->
	<script type="text/javascript">
		$(".dropdown-menu a").click(function() {
		  $(this).parents(".dropdown").find('.btn').html($(this).text());
		  $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
		});
	</script>
	
	<script type="text/javascript">
		$(".dropdown-menu").click(function() {
			$("#gender").val($(this).data('value'));
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