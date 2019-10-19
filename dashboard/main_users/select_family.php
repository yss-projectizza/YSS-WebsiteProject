<?php
if (!isset($_SESSION))
  session_start();
?>
<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

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

    <div class="container">
    <!-- Dashboard Title Registration Header -->
    <h1 align="center" style="font-size:50px;padding-top: 2%;">Select Family</h1>
    <br>
    <p> Please select the family that you would like to join. </p>
    <hr/>
    </div>
  </body>
</html>

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

  let group_num = "<?php echo $_SESSION["queryData"]["group_num"]; ?>";
  let year = "<?php echo $_SESSION["queryData"]["year"]; ?>";

  firebase.initializeApp(config);
  
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
            var name = student_data[j][1].first_name + ' ' + student_data[j][1].last_name[0] + '.';
            var gender = student_data[j][1].gender;

            if(student_data[j][1].user_type == "student")
            {
              if(gender == "Male")
              {
                male_students.push(name);
              }
              else
              {
                female_students.push(name);
              }
            }
          }

          createTable(families[i][1].max_size, 2, families[i][1].name, "family", male_students, female_students, "student", true, true, boxDiv);
        });
      }
      else
      {
        createTable(families[i][1].max_size, 2, families[i][1].name, "family", [], [], "student", true, true, boxDiv);
      }
    }

    document.getElementsByTagName("body")[0].appendChild(boxDiv);
  });
</script>