<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
  $emailwcomma = $_SESSION["queryData"]["email"];
  $email= str_replace(".",",",$emailwcomma);
  $user=$_SESSION["queryData"]["user_type"];
?>

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

    <div class="container">
    <!-- Dashboard Title Registration Header -->
    <h1 align="center" style="font-size:50px;padding-top: 2%;">Select Family</h1>
    <br>
    <p> Please select the family that you would like to join. </p>
    <hr/>
    </div>
  </body>
</html>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>

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

  // Returns objects who are in group x
  firebase.database().ref('users').orderByChild('user_type').equalTo("student").on("value", function(snapshot) {
    var students = Object.entries(snapshot.val());
    var a = [];

    for(var i = 0; i < students.length; i++)
    {
      a.push(students[i][1].first_name + ' ' + students[i][1].last_name[0] + '.');
    }

    firebase.database().ref('families').orderByChild('grade_level').equalTo("Junior").on("value", function(snapshot) {

      var families = Object.entries(snapshot.val());

      var fam_names = [];

      for(var i = 0; i < families.length; i++)
      {
        fam_names.push(families[i][1].name);
      }

      const boxDiv = document.createElement('div');
      boxDiv.classList.add('container', 'family-div');
      boxDiv.style.paddingBottom = '13%';

      for(let i = 0; i < fam_names.length; i++) 
      {
        createTable(a.length, 2, fam_names[i] /* "Family " + students[0][1].group_num*/, a, boxDiv);
      }

      document.getElementsByTagName("body")[0].appendChild(boxDiv);
    });
  });

  // div for button


  function createTable(numRows, numCols, header="placeholder", items, boxDiv) 
  {
    /* get all students in x grade */

    numRows *= 2;

    (numRows < 12)
        numRows = 12;

    let body = document.getElementsByTagName('body')[0];
    let tbl = document.createElement('table');
    tbl.classList.add('student-table');

    tbl.style.textAlign = 'center';

    tbl.style.width = '100%';
    tbl.height = 'auto';
    /* change parameter 3 to change border color */
    tbl.style.border = 'solid 5px #5b77a5';

    tbl.style.color = 'black';
    
    let tbdy = document.createElement('tbody');
    let th = document.createElement('th');
    th.style.border = 'solid 1px black';
    th.style.backgroundColor = '#5b77a5';
    th.style.color = 'white';
    th.style.height = '40px';
    th.style.verticalAlign = 'middle';

    /* Name of family */
    th.appendChild(document.createTextNode(header));
    th.colSpan = numCols;

    tbl.appendChild(th);
    for (let i = 0; i < numRows; i++) 
    {
        let tr = document.createElement('tr');
        tr.style.border = 'solid 1px black';
        tr.style.height = '30px';
        

        tbl.style.marginTop = '20px';
        
        for (let j = 0; j < numCols; j++) 
        {
            let td = document.createElement('td');
            td.style.width = '50%';
            td.style.border = 'solid 1px black';
            if(items.length == 0 || i >= items.length)
            {
                td.appendChild(document.createTextNode("\u0020"));
            }
            else
            {
              td.appendChild(document.createTextNode(items[i]));
            }

            tr.appendChild(td);
            tbdy.appendChild(tr);

            i++;
        }
          i--;
            tbl.appendChild(tbdy);
            body.appendChild(tbl);
    }

    var buttonDiv = document.createElement('div');
    buttonDiv.classList.add("button-div");
    buttonDiv.id = "divID";

      // Adds button.
      var joinButton = document.createElement("Button");
      var textForButton = document.createTextNode("Join " + header);
      joinButton.appendChild(textForButton);
      joinButton.classList.add('rounded');
      joinButton.addEventListener("click", function(){
          warning("Join " + header + "?"/*"Are you sure you want to join Family " + students[0][1].group_num + "?"*/);
      });
      buttonDiv.appendChild(joinButton);

    boxDiv.appendChild(tbl);
    boxDiv.appendChild(buttonDiv);
  }

  function warning(text)
  {
    let ok_clicked = confirm(text);

    if(ok_clicked == true)
    {
      document.location.href ='/dashboard/main_users/campers.php';
    }
  }
</script>