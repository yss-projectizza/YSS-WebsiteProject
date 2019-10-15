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
    var data = Object.entries(snapshot.val());

    // Create box div containing tables
    const boxDiv = document.createElement('div');
    boxDiv.classList.add('container', 'family-div');
    boxDiv.style.paddingBottom = '13%';
  
    // Creates tables of students in families in the specified grade.
    for(let i = 0; i < data.length; i++)
    {
      // Creates table containing student names in family x if it contains at least one student, 
      // else creates an empty 6x6 table
      if(data[i][1].size > 0) 
      {
        firebase.database().ref('users').orderByChild('group_num').equalTo(data[i][1].name).once("value", function(snapshot) 
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

          createTable(data[i][1].max_size, 2, data[i][1].name, male_students, female_students, boxDiv);
        });
      }
      else
      {
        createTable(data[i][1].max_size, 2, data[i][1].name, [], [], boxDiv);
      }
    }

    document.getElementsByTagName("body")[0].appendChild(boxDiv);
  });


  function createTable(numRows, numCols, header="placeholder", males, females,  boxDiv) 
  {
    let body = document.getElementsByTagName('body')[0];
    let tbl = document.createElement('table');
    tbl.classList.add("name-table");
    
    let tbdy = document.createElement('tbody');
    let th = document.createElement('th');

    /* Name of family */
    th.appendChild(document.createTextNode(header));
    th.colSpan = numCols;

    tbl.appendChild(th);

    // Add student names that are already in the current group to the table
    for (let i = 0; i < numRows; i += 2) 
    {
      // document.write("here 6 <br>");
        let tr = document.createElement('tr');

        for (let j = 0; j < numCols; j++) 
        {
          // document.write("here 7 <br>");
          let td = document.createElement('td');

          if(j % 2 == 0)
          {
            // document.write("writing to left side <br>");
            if(males.length != 0)
            {
              td.appendChild(document.createTextNode(males[0]));
              males.shift(); // removes the first male in the males array
            }
            else
            {
              td.appendChild(document.createTextNode("\u0020"));
            }
          }
          else
          {
            // document.write("writing to right side <br>");
            if(females.length != 0)
            {
              td.appendChild(document.createTextNode(females[0]));
              females.shift(); // removes the first female in the females array
            }
            else
            {
              td.appendChild(document.createTextNode("\u0020"));
            }
          }
            
            
          tr.appendChild(td);
          tbdy.appendChild(tr);
        }

        tbl.appendChild(tbdy);
        body.appendChild(tbl);
    }

    // document.write("exited loop <br>");

    var buttonDiv = document.createElement('div');
    buttonDiv.classList.add("button-div");
    buttonDiv.id = "divID";

    // Adds button.
    var joinButton = document.createElement("Button");
    joinButton.appendChild(document.createTextNode("Join " + header));
    joinButton.classList.add('rounded');

    firebase.database().ref('families').orderByChild('name').equalTo(header).once("value", function(snapshot) 
    {
      var data = Object.keys(snapshot.val())[0]; // Returns parent of Object
      var temp = Object.entries(snapshot.val());

      let updated_size = temp[0][1].size + 1;
      let fam_path = 'families/' + data; // Path to families object that will be updated

      let studentEmail = "<?php echo $_SESSION["queryData"]["studentEmail"]; ?>";

      firebase.database().ref('users').orderByChild('studentEmail').equalTo(studentEmail).once("value", function(snapshot) 
      {
        var student = Object.entries(snapshot.val());

        let group_num = student[0][1].group_num;

        joinButton.addEventListener("click", function()
        {
          if(group_num != "N/A")
          {
            alert("You have already joined a family!");
            // document.location.href ='/dashboard.php';
          }
          else if(males.length + females.length == temp[0][1].max_size)
          {
            alert("This family is full! Please join a different family.");
          }
          else
          {
            warning("Are you sure you want to join " + header + "?", header, updated_size, fam_path);
          }
        });
      });
    });
    
    buttonDiv.appendChild(joinButton);

    boxDiv.appendChild(tbl);
    boxDiv.appendChild(buttonDiv);
}

function warning(text, new_group, updated_size, fam_path)
{ 
  let ok_clicked = confirm(text);

  if(ok_clicked)
  {
    document.location.href ='/dashboard/main_users/campers.php';

    let email = ("<?php echo $_SESSION["queryData"]["studentEmail"]; ?>");
    email = email.replace(".", ",");

    for(let i = 0; i < 1; i++) {
      firebase.database().ref('users/' + email).update({'group_num': new_group});

      group_num = new_group;

      firebase.database().ref(fam_path).update({'size': updated_size});}
  }
}
</script>