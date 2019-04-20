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
					<a class="nav-item nav-link" href="http://campizza.com"><font color="white">Home</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/calendar"><font color="white">Activities</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/camp-fees"><font color="white">Fees</font></a>
					<a class="nav-item nav-link" href="http://campizza.com/contact"><font color="white">Contact</font></a>
				</div>
			</div>
		</div>
	</nav>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container" style = "background: white; margin-top: 20px;">
    <!-- Camp Registration Header -->
    <h1 align="center" style = "font-size:50px;padding-top: 20px;">Camper Registration</h1>
	
	 <!-- NEW STUFF STARTING HERE -->
	<div class="block_1"><p style="padding-top:20px"</div> <hr />

  	<div class="container">
    <!-- Camper Information -->
        <label><p style = "font-size:30px;">Camper Information</p></label>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">First Name:<b style = "color: red;">*</b></span>
                </div>
                <input type="text" placeholder="Ex: John" name="firstname" class="form-control" required>
            </div>
          
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Last Name:<b style = "color: red;">*</b></span>
                </div>
                <input type="text" placeholder="Ex: Smith" name="lastname" class="form-control" required>
            </div>

            <div class="input-group mb-3">
		  		<div class="input-group-prepend">
                  <span class="input-group-text">Gender:<b style = "color: red;">*</b></span>
				    <select class="form-control form-control-md" name="gender">
						    <option>Female</option>
						    <option>Male</option>
				    </select>
				</div>
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
			        <div class='input-group date'>
                         <span class="input-group-text">Date Of Birth:<b style = "color: red;">*</b></span>
			            <input type='date' name="dob" class="form-control" required>
			        </div>
				</div>
			</div>

			<div class="input-group mb-3">
		  		<div class="input-group-prepend">
                  <span class="input-group-text">Upcoming School Year:<b style = "color: red;">*</b></span>
				    <select class="form-control form-control-md" name="schoolyear">
						<option>Freshman</option>
						<option>Sophomore</option>
						<option>Junior</option>
						<option>Senior</option>
						<option>Early College</option>
						<option>Home School</option>
				    </select>
				</div>
			</div>

			<div class="input-group mb-3">
		  		<div class="input-group-prepend">
                  <span class="input-group-text">Age:<b style = "color: red;">*</b></span>
				    <select class="form-control form-control-md" name="age">
						<option>14</option>
						<option>15</option>
						<option>16</option>
						<option>17</option>
						<option>18</option>
				    </select>
				</div>
			</div>

			<div class="input-group mb-3">
		  		<div class="input-group-prepend">
                  <span class="input-group-text">Clothing Size:<b style = "color: red;">*</b></span>
				    <select class="form-control form-control-md" name="clothingsize">
						<option>Small</option>
						<option>Medium</option>
						<option>Large</option>
						<option>XL</option>
						<option>XXL</option>
				    </select>
				</div>
			</div>


			<form action="upload.php" method="post" enctype="multipart/form-data">
    			Picture of Student ID:
    			<input type="file" name="fileToUpload"">
			</form>
	</div>  

	<div class="block_1"><p style="padding-top:30px"</div> <hr />

	<div class="container">
    <!-- Personal Information -->
		<label><p style = "font-size:30px;padding-top: 10px;"">Personal Information</p></label>
	</div>
	<div class="container">
		<label><p style = "font-size:18px;"">How would you rate yourself in the following areas?</p></label>
			
			<div class="input-group mb-3">
		  		<div class="input-group-prepend">
                  <span class="input-group-text">Spirituality (closeness to God)<b style = "color: red;">*</b></span>
				    <select class="form-control form-control-md" name="spirituality">
						<option>Very High</option>
						<option>High</option>
						<option>Neutral</option>
						<option>Low</option>
						<option>Very Low</option>
				    </select>
				</div>
			</div>

			<div class="input-group mb-3">
		  		<div class="input-group-prepend">
                  <span class="input-group-text">Religious Knowledge:<b style = "color: red;">*</b></span>
				    <select class="form-control form-control-md" name="spirituality">
						<option>Very High</option>
						<option>High</option>
						<option>Neutral</option>
						<option>Low</option>
						<option>Very Low</option>
				    </select>
				</div>
			</div>

			<div class="input-group mb-3">
		  		<div class="input-group-prepend">
                  <span class="input-group-text">Actively Improving Myself:<b style = "color: red;">*</b></span>
				    <select class="form-control form-control-md" name="spirituality">
						<option>Very High</option>
						<option>High</option>
						<option>Neutral</option>
						<option>Low</option>
						<option>Very Low</option>
				    </select>
				</div>
			</div>

			<div class="input-group mb-3">
		  		<div class="input-group-prepend">
                  <span class="input-group-text">Actively Involved In Making My Community Better:<b style = "color: red;">*</b></span>
				    <select class="form-control form-control-md" name="spirituality">
						<option>Very High</option>
						<option>High</option>
						<option>Neutral</option>
						<option>Low</option>
						<option>Very Low</option>
				    </select>
				</div>
			</div>

			
			<div class="row initial-task-padding">
			  	<div class="col">
					<p>What do you hope to get out of attending Youth Spiritual Summit this year?<b style = "color: #DC143C;">*</b></p>  
					<textarea name="hopes" cols="135" rows="3"></textarea>
				</div>
			</div>

			<div class="row initial-task-padding">
			  	<div class="col">
					<p>What are some activities that you enjoy?<b style = "color: #DC143C;">*</b></p>  
					<textarea name="activities" cols="135" rows="3"></textarea>
				</div>
			</div>
		  
			<div class="row initial-task-padding">
			  	<div class="col">
					<p>What is one question you would like to have answered during this year's Summit?<b style = "color: #DC143C;">*</b></p>  
					<textarea name="question" cols="135" rows="3"></textarea>
				</div>
	  		</div>
			  

	<div class="block_1"><p style="padding-top:30px"</div> <hr />

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
				<p>Camp Izza is a 501 (c)(3) non-profit organization registered in the state of California with federal tax id #26-2174441</p>
				</div>
				<div class="vertline"></div>
				<div class="col">
				© 2019 Camp Izza
				</div>
			</div>
		</div>
	</div>
</body>
</html>