<?php
if (!isset($_SESSION))
  session_start();
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

<html lang="en">
  <head>
    <title>Select Cabin | Youth Spiritual Summit</title>
      
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
    <h1 align="center" style="font-size:50px;padding-top: 2%;">Select Cabin</h1>
    <br>
    <p> Please select the cabin that you would like to join. </p>
    <hr/>
    </div>
  </body>
</html>

<script>
  let cabin_num = "<?php echo $_SESSION["queryData"]["cabin_num"]; ?>";
  let gender = "<?php echo $_SESSION["queryData"]["gender"]; ?>";
  
  firebase.database().ref('cabins').orderByChild('gender').equalTo(gender).once("value", function(snapshot) 
  {
      // Stores family objects in the user's grade level
      var cabins = Object.entries(snapshot.val());

      // Create box div containing tables
      const boxDiv = document.createElement('div');
      boxDiv.classList.add('container', 'cabin-div');
      boxDiv.style.paddingBottom = '13%';

      // Creates tables of students in cabins in the same gender as the user.
      for(let i = 0; i < cabins.length; i++)
      {
        // Creates table containing student names in family x if it contains at least one student, 
        // else creates an empty 6x6 table
        if(cabins.length > 0) 
        {
          firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot) 
          {  
            var student_data = Object.entries(snapshot.val());
            var students = [];

            // Gets all students in the current cabin.
            for(let j = 0; j < student_data.length; j++) 
            {
              if(student_data[j][1].gender == gender && student_data[j][1].cabin_num == cabins[i][1].name)
              {
                  students.push(student_data[j][1]);
              }
            }
            
             createTable(cabins[i][1].max_size, 2, cabins[i][1].name, "cabin", cabins[i][1].counselor, students, [], "student", true, false, boxDiv);
          });
        }
        else
        {
          createTable(cabins[i][1].max_size, 2, cabins[i][1].name, "cabin", cabins[i][1].counselor, [], [], "student", true, false, boxDiv);
        }
      }

    document.getElementsByTagName("body")[0].appendChild(boxDiv);
      
  }); 
</script>