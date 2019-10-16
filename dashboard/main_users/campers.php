<?php
  session_start();
?>
<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>
<script> 
 // Initialize Firebase
 var config = {
    apiKey: "AIzaSyDJrK2EexTLW7UAirbRAByoHN5ZJ-uE35s",
    authDomain: "yss-project-69ba2.firebaseapp.com",
    databaseURL: "https://yss-project-69ba2.firebaseio.com",
    projectId: "yss-project-69ba2",
    storageBucket: "yss-project-69ba2.appspot.com",
    messagingSenderId: "530416464878"
  };
  firebase.initializeApp(config);

  <?php
  $emailwithperiod = $_SESSION["queryData"]["email"];
  $emailwithcomma = str_replace(".", ",", $emailwithperiod);
  ?>
  
  var email = "<?php echo $emailwithcomma; ?>"
  var bus_num = "<?php echo $_SESSION['queryData']['bus_num']; ?>"
  var cabin_num = "<?php echo $_SESSION['queryData']['cabin_num']; ?>"
  var group_num = "<?php echo $_SESSION['queryData']['group_num']; ?>"
  var user_type = "<?php echo $_SESSION['queryData']['user_type']; ?>"

</script>

<html lang="en">
  <head>
    <title>View Group Details</title>
      <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-app.js"></script>
       <script src="https://www.gstatic.com/firebasejs/5.10.0/firebase-database.js"></script>
       <link rel="stylesheet" href="/css/student_tables.css">
    <script src="/dashboard/main_users/campers.js"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/campers.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
   
    <?php include('../../header_loggedin.php') ?>
    <?php include('../../create_table.php') ?>

    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'Family')">Family</button>
      <button class="tablinks" onclick="openCity(event, 'Bus')">Bus</button>
      <button class="tablinks" onclick="openCity(event, 'Cabin')">Cabin</button>
    </div>

    <div id="Family" class="tabcontent">
      <script>
        // Create box div containing tables
        const boxDiv = document.createElement('div');
        boxDiv.classList.add('container', 'family-div');
        boxDiv.style.paddingBottom = '13%';

          firebase.database().ref('users').orderByChild('group_num').equalTo(group_num).once("value", function(snapshot) 
          {
            var student_data = Object.entries(snapshot.val());

            firebase.database().ref('families').orderByChild('name').equalTo(group_num).once("value", function(snapshot) 
            {
              var family = Object.entries(snapshot.val());
              var current_fam_size = family[0][1].size;

              if(current_fam_size > 0)
              {
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

                switch(user_type)
                {
                  case "counselor": createTable(family[0][1].max_size, 2, group_num, male_students, female_students, "counselor", false, boxDiv);
                    break;
                  case "student": createTable(family[0][1].max_size, 2, group_num, male_students, female_students, "student", false, boxDiv);
                }
              }
              else
              {
                const message = document.createElement('p');
                if(user_type == "counselor")
                {
                  message.appendChild(document.createTextNode("You do not have any students yet."));
                }
                else
                {
                  message.appendChild(document.createTextNode("You do not have any students yet."));
                }
                boxDiv.appendChild(message);
              }
            });
        });

        document.getElementById("Family").appendChild(boxDiv);
      </script>
    </div>

    <div id="Bus" class="tabcontent">
      <script>
        firebase.database().ref('/users').once('value').then(item => {

          let firebasedataArray = Object.entries(item.val());

          for (let i = 0; i < firebasedataArray.length; ++i) {
            console.log(bus_num);
            console.log(firebasedataArray[i][1].bus_num);
            if (bus_num == firebasedataArray[i][1].bus_num && firebasedataArray[i][1] != email) {
              var updiv = document.getElementById("bus_data");
              var newp = document.createElement("ul");

              if(user_type == "counselor"){
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " * " + firebasedataArray[i][1].phone;
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " " + firebasedataArray[i][1].phone;
                  }               
                  updiv.appendChild(newp)
                }else{
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " * " + firebasedataArray[i][1].email;
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name;
                  }            
                }
              updiv.appendChild(newp)
            }
          }
        });
      </script>
      <h3>Bus: <?php echo $_SESSION["queryData"]["bus_num"]; ?> </h3>
      <div id=bus_data> </div>
    </div>

    <div id="Cabin" class="tabcontent">
        <script>
          firebase.database().ref('/users').once('value').then(item => {

            let firebasedataArray = Object.entries(item.val());

            for (let i = 0; i < firebasedataArray.length; ++i) {
              if (cabin_num == firebasedataArray[i][1].cabin_num && firebasedataArray[i][1] != email) {
                var updiv = document.getElementById("cabin_data");
                var newp = document.createElement("ul");

                if(user_type == "counselor"){
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " * " + firebasedataArray[i][1].phone;
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " " + firebasedataArray[i][1].phone;
                  }               
                  updiv.appendChild(newp)
                }else{
                  if(firebasedataArray[i][1].user_type == "counselor"){
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name + " * " + firebasedataArray[i][1].email;
                  }else{
                    newp.innerHTML = firebasedataArray[i][1].first_name + " " + firebasedataArray[i][1].last_name;
                  }               
                  updiv.appendChild(newp)
                }
              }
            }
          });
        </script>
        <h3 id="cabin_num">Cabin: <?php echo $_SESSION["queryData"]["cabin_num"]; ?></h3>
        <div id="cabin_data"></div>
    </div>

    <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
             
      </div>
    </div>
  </body>
</html>
