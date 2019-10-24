<?php
if (!isset($_SESSION))
  session_start();
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

<html lang="en">
  <head>
    <title>Select Bus | Youth Spiritual Summit</title>
      
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
    <h1 align="center" style="font-size:50px;padding-top: 2%;">Select Bus</h1>
    <br>
    <p> Please select the bus that you would like to take. </p>
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

  let bus_num = "<?php echo $_SESSION["queryData"]["bus_num"]; ?>";

  firebase.initializeApp(config);

    firebase.database().ref('buses').orderByChild('name').once("value", function(snapshot) 
    {
      // Stores family objects in the user's grade level
      var buses = Object.entries(snapshot.val());

      // Create box div containing tables
      const boxDiv = document.createElement('div');
      boxDiv.classList.add('container', 'bus-div');
      boxDiv.style.paddingBottom = '13%';

    if(buses.length > 0) 
    {
        // Creates tables of students in all available buses.
        for(let i = 0; i < buses.length; i++)
        {
            // Creates table containing student names in bus x if it contains at least one student, 
            // else creates an empty 6x6 table
            firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot) 
            {
                var student_data = Object.entries(snapshot.val());

                if(student_data.length > 0)
                {
                    var students = [];

                    for(let j = 0; j < student_data.length; j++)
                    {
                        if(student_data[j][1].bus_num == buses[i][1].name)
                        {
                            students.push(student_data[j][1]);
                        }
                    }

                    createTable(buses[i][1].max_size, 2, buses[i][1].name, "bus", buses[i][1].counselor, students, [], "student", true, false, boxDiv);
                }
                else
                {
                    createTable(buses[i][1].max_size, 2, buses[i][1].name, "bus", buses[i][1].counselor, [], [], "student", true, false, boxDiv);
                }
            });
        }
    }
    else
    {
        document.write("There are no available buses!");
    }

    document.getElementsByTagName("body")[0].appendChild(boxDiv);  
  }); 
</script>