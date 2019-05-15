<?php
session_start();

?>

<script>
    var email = "<?php echo $_SESSION["newuserinfo"]["email"];?>";
    var emailwcharactersreplaced = email.replace(".", ",");
    var dob = "<?php echo $_SESSION["newuserinfo"]["age"];?>";
</script>

<!doctype html>
<html lang="en">

<head>
    <title>Counselor Registration | Youth Spiritual Summit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php include("header_loggedout.php")?>

    <form action="formToDatabase.php" method="post" enctype="multipart/form-data">
        <div class="container" style="background: white; margin-top: 20px;">
            <!-- Counselor Registration Header -->
            <h1 align="center" style="font-size:50px;padding-top: 20px;">Counselor Application</h1>
            <br>
            <p>YSS 2019 will be taking place Labor Day Weekend, Aug. 30st - Sept. 2nd, 2019 in the San Bernardino Mts.
                **To be considered as a counselor you must be 21 years old or older by the first day of the retreat**
                Application closes: April 28th at midnight.

                All counselors may be interviewed via Skype or in-person meetings.
                If you have any questions, please contact us at youthspiritualsummit@gmail.com <p>

            <div class="block_1">
                <p style="padding-top:20px" </div> <hr />

                    <div class="container">
                    <!-- Availability -->
                    <label>
                        <p style="font-size:30px;">Availability</p>
                    </label>
                    <div class="row initial-task-padding">
                        <div class="col">
                            Are you available for the entire 2019 YSS (8/30 - 9/2)?<b style="color: red;">*</b>
                            <br>
                            <small span class="subtitle">This includes meeting at 3:30pm on Friday 8/30 and
                            staying with the youth until they are picked up at 3pm on Monday 9/2. If not,
                            please indicate otherwise.
                            </small> </span>
                            <br>
                            <select class="form-control form-control-md" name="yss_avail" id="yss_avail" style="width:30%" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            Are you available for the mandatory Counselor Retreat on June 8th?<b
                                style="color: red;">*</b>
                            <br>
                            <small span class="subtitle">We would like all counselors to attend this full day
                                (8am-6pm) mandatory counselor retreat prior to camp. Exceptions can be made on a
                                case by case basis.
                            </small> </span>
                            <br>
                            <select class="form-control form-control-md" name="cs_avail" id="cs_avail"
                                style="width:30%" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <!-- Info -->
                    <label>
                        <p style="font-size:30px;">Information</p>
                    </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">First Name:<b style="color: red;">*</b></span>
                        </div>
                        <input type="text" placeholder="Ex: John" name="first_name" id="firstname"
                            class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Last Name:<b style="color: red;">*</b></span>
                        </div>
                        <input type="text" placeholder="Ex: Smith" name="last_name" id="lastname"
                            class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Gender:<b style="color: red;">*</b></span>
                            <select class="form-control form-control-md" name="gender" id="gender" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Female</option>
                                <option>Male</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Enter A Password:<b style="color: red;">*</b></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Retype Your Password:<b
                                    style="color: red;">*</b></span>
                        </div>
                        <input type="password" name="password2" id="password2" class="form-control" required>
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">City of Residence:<b style="color: red;">*</b></span>
                        </div>
                        <input type="text" placeholder="Ex: Irvine" name="city" id="city" class="form-control"
                            required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone Number:<b style="color: red;">*</b></span>
                        </div>
                        <input type="text" placeholder="Ex: (123) 456-7890" name="phone" id="phone"
                            class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Sweatshirt Size:<b style = "color: red;">*</b></span>
                            <select class="form-control form-control-md" name="size" id="size">
                                <option disabled selected value> -- select an option -- </option>
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                        </div>
                    </div>

                    <!-- Experience -->
                    <label>
                        <p style="font-size:30px;">Experience</p>
                    </label>
                    
                    <div class="row initial-task-padding">
                        <div class="col">
                            How many years of experience do you have working with youth?<b style="color: red;">*</b>
                            <br>
                            <small span class="subtitle"> The Youth Spiritual Summit hosts high school students
                                (14-18 year olds), we would like to know if there is a specific age you feel
                                comfortable working with.
                            </small> </span>
                            <br>
                            <select class="form-control form-control-md" name="experience" id="experience"
                                style="width:30%" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10+</option>
                            </select>
                            <br>
                         </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            Do you have any siblings or relatives that you think will be attending YSS?<b
                                style="color: red;">*</b>
                            <br>
                            <select class="form-control form-control-md" name="sibling" id="sibling"
                                style="width:30%" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Yes</option>
                                <option>No</option>
                                <option>Unsure at this point</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            Have you ever been a counselor before?<b style="color: red;">*</b>
                            <br>
                            <select class="form-control form-control-md" name="counselor_short"
                                id="counselor_short" style="width:30%" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            If you answered yes to the above question, please describe your experience,
                            otherwise write "N/A"<b style="color: red;">*</b>
                            <input type="text" name="exp_desc" id="exp_desc" times-label="describe exp"
                                class="form-control" required>
                            <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            Is there a certain age group you feel comfortable working with?<b
                                style="color: red;">*</b>
                            <br>
                            <small span class="subtitle"> The Youth Spiritual Summit hosts high school students
                                (14-18 year olds), we would like to know if there is a specific age you feel
                                comfortable working with.
                            </small> </span>
                            <br>
                            <input type="text" name="group_age" id="group_age" times-label="group age"
                                class="form-control" required>
                            <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            What do you hope to get out of this experience?<b style="color: red;">*</b>
                            <br>
                            <small span class="subtitle"> Please describe in 2-3 sentence why you would like to
                                be a counselor
                            </small> </span>
                            <br>
                            <input type="text" name="gain" id="gain" times-label="gain" class="form-control"
                                required>
                            <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            What makes you a good fit for YSS?<b style="color: red;">*</b>
                            <input type="text" name="fit" id="fit" times-label="fit" class="form-control" required>
                            <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            Is there anything else you'd like us to know about you? (special accommodations, awards,
                        etc)?
                        <input type="text" value="" name="extra" id="extra" times-label="extra"
                            class="form-control">
                        <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            Please list the names and contact information of 3 references<b style="color: red;">*</b>
                            <input type="text" name="references" id="references" times-label="references"
                                class="form-control" required>
                            <br>
                        </div>
                    </div>

                    <div class="row initial-task-padding">
                        <div class="col">
                            Have you ever been convicted of a felony (if yes, please explain in the text box below)<b
                                style="color: red;">*</b>
                            <br>
                            <select class="form-control form-control-md" name="felony1" id="felony1" style="width:30%" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>No</option> 
                                <option>Yes</option>
                            </select>
                            <input type="text" name="felony2" id="felony2" times-label="references" class="form-control">
                            <br>
                        </div>
                    </div>

                    <!-- Verification -->
                    <label>
                        <p style="font-size:30px;">Verification</p>
                    </label>
                    <div class="row initial-task-padding">
                        <div class="col">
                            I certify that my answers are true and complete to the best of my knowledge. By checking
                            "yes," I certify that if this application leads to my participation, any false or misleading
                            information in my application or interview may result in my release.<b
                                style="color: red;">*</b>
                            <select class="form-control form-control-md" name="verification" id="verification"
                                style="width:30%" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                            <br>
                        </div>
                    </div>
        </div>
        </div>
        <!-- Submit -->
        <div class="row margin-data" style="padding-bottom: 50px;padding-top: 10px;" align="center">
            <div class="col">
                <input type="submit" class="btn-xl rounded" align="center" value="Submit">
            </div>
        </div>
        </div>
    </form>

    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
 
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
</body>

</html>
