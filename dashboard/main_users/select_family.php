<?php
if (!isset($_SESSION))
  session_start();
?>

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
</script>

<html lang="en">
  <head>
    <title>Select Family | Youth Spiritual Summit</title>
      
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/student_tables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body> 
    <?php include('../../header_loggedin.php') ?>
    <?php include('../../create_table.php') ?>
    <?php include('../../display_profile_pic.php') ?>

    <div class="container">
    <!-- Dashboard Title Registration Header -->
    <h1 align="center" style="font-size:50px;padding-top: 2%;">Select Family</h1>
    <br>
    <p> Please add your name to the family that you would like to join. </p>
    <hr/>
    </div>
  </body>
</html>

<script>
  let year = "<?php echo $_SESSION["queryData"]["year"]; ?>";
  let gender = "<?php echo $_SESSION["queryData"]["gender"]; ?>";
  
  firebase.database().ref('families').orderByChild('grade_level').equalTo(year).once("value", function(snapshot) 
  {
    // Stores family objects in the user's grade level
    var families = Object.entries(snapshot.val());


    // Create box div containing tables
    const boxDiv = document.createElement('div');
    boxDiv.classList.add('container', 'family-div');
    boxDiv.style.paddingBottom = '13%';
  
    // Creates tables of students in families in the specified grade.
    for(let i = 0; i < families.length; i++)
    {
      // Creates table containing student names in family x if it contains at least one student, 
      // else creates an empty 6x6 table
      if(families[i][1].size > 0)
      {
        firebase.database().ref('users').orderByChild('group_num').equalTo(families[i][1].name).once("value", function(snapshot) 
        {
          var student_data = Object.entries(snapshot.val());
          var male_students = [];
          var female_students = [];

          for(let j = 0; j < student_data.length; j++)
          {
            if(student_data[j][1].user_type == "student")
            {
              if(student_data[j][1].gender == "Male")
              {
                male_students.push(student_data[j][1]);
              }
              else
              {
                female_students.push(student_data[j][1]);
              }
            }
          }

          let gender_capacity = families[i][1].max_size / 2;

          // Ensures that families are not displayed if their maximum capacity for the gender that is the same
          // as the user's has been reached.
          if((gender == "Male" && male_students.length != gender_capacity) || 
             (gender == "Female" && female_students.length != gender_capacity))
             {
              createTable(families[i][1].max_size, 2, families[i][1].name, "family", families[i][1].counselor, male_students, female_students,
                          "student", true, true, boxDiv);
             }
        });
      }
      else
      {
        createTable(families[i][1].max_size, 2, families[i][1].name, "family", families[i][1].counselor, [], [], "student", true, true, boxDiv);
      }
    }

    document.getElementsByTagName("body")[0].appendChild(boxDiv);
  });
</script>