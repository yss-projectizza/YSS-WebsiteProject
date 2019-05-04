<?php
  session_start();
?>
<!doctype html>
<html lang="en">

	<head>
		<title>Youth Spiritual Summit</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="/css/main.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
			integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	</head>

	<body>
		<?php include('header_loggedin.php') ?>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="container" style="background: white; margin-top: 20px;">
				<!-- Financial Aid Header -->
				<h1 align="center" style="font-size:40px;padding-top: 20px;">Financial Aid Application</h1>

				<div class="container">
					<!-- Financial Aid Information -->
					<label>
						<p style="font-size:26px;">Financial Information</p>
					</label>

					<div class="row initial-task-padding">
						<div class="col">
							How many people live in your household?<b style="color: red;">*</b>
							<input type="text" name="household" times-label="household" class="form-control" required>
							<br>
						</div>
					</div>

					<div class="row initial-task-padding">
						<div class="col">
							What is your total annual family household income? (combined income of everyone in the household)<b
								style="color: red;">*</b>
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
							How much of the $299 registration fee are you able to pay?<b style="color: red;">*</b>
							<input type="text" name="can pay" times-label="can pay" class="form-control" required>
							<br>
						</div>
					</div>

					<div class="row initial-task-padding">
						<div class="col">
							What local organizations (e.g. masjids) do you attend ? The Youth Spiritual Summit will reach out to these
							organizations to see if they will support local youth to attend the Summit.?<b style="color: red;">*</b>
							<input type="text" name="org" times-label="org" class="form-control" required>
							<br>
						</div>
					</div>

					<div class="row initial-task-padding">
						<div class="col">
							Provide a brief description of the circumstances that lead you to request financial aid.<b
								style="color: red;">*</b>
							<input type="text" name="desc" times-label="org" class="form-control" required>
							<br>
						</div>
					</div>

					<div class="row initial-task-padding">
						<div class="col">
							The Youth Spiritual Summit is a non-profit organization and everyone involved is a volunteer who earns no
							financial compensation for their participation. All funds made from the registration fees go into the cost
							of running the program. The Youth Spiritual Summit is committed to supporting every youth who wishes to
							attend this program, regardless of their financial means. By completing this application, the youth and
							family of the youth are committed to seeking sponsorship from local organizations and/or individuals who can
							support the program. By completing this application, you are assuming responsibility for finding the funding
							to attend the Youth Spiritual Summit. The Youth Spiritual Summit will assist you in identifying funding
							sources and in telling your story to those who may be able to assist. Someone from the Youth Spiritual
							Summit will be in touch with you to support and advise you on the work ahead.<b style="color: red;">*</b>
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
					<div class="row margin-data" style="padding-bottom: 50px;
               padding-top:10px; margin-bottom:5%;" align="center" ;>
						<button onclick="location.href = '/dashboard.php'" id="back" class="btn-xl" align="center"
								role="button" style="background-color:#ccced1; margin-right:1%;height:2%;"> Back
						</button>
						<input type="submit" class="btn-xl" align="center" value="Submit">
          </div>
				</div>
		</form>

		<!--Javascript here-->
		<script type="text/javascript">
			$(".dropdown-menu a").click(function () {
				$(this).parents(".dropdown").find('.btn').html($(this).text());
				$(this).parents(".dropdown").find('.btn').val($(this).data('value'));
			});
		</script>

		<script type="text/javascript">
			$(".dropdown-menu").click(function () {
						$("#gender").val($(this).data('value'));
		</script>
	</body>

</html>