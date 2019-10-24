<?php
if (!isset($_SESSION))
  session_start();
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>

<html lang="en">
  <head>
    <?php $student_email=$_GET['email']; ?>
    <title> <?php echo $student_email ?> | Youth Spiritual Summit</title>
      
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/student_tables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body> 
    <?php include('../../header_loggedin.php') ?>
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

    let student_email = "<?php echo $student_email ?>";

    firebase.initializeApp(config);
    firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot)
    {
        let students = Object.entries(snapshot.val());
        
        let i = 0;
    
        while(students[i][1].studentEmail != student_email)
        {
            i++;   
        }

        if(i < students.length)
        {
            display_student_info(students[i][1]);
        }
        else
        {
            document.write("The student was not found!");
        }
    });

function display_student_info(student)
{
  let heading = document.createElement('h2');
  heading.appendChild(document.createTextNode(student.first_name + " " + student.last_name + "'s Information"));
  heading.style.textAlign = 'center';
  heading.style.paddingTop = '3%';
  document.getElementsByTagName("body")[0].appendChild(heading);
}
</script>