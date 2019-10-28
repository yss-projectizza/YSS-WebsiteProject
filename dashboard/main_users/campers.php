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
  if($_SESSION["queryData"]["user_type"] == "student")
  {
    $emailwithperiod = $_SESSION["queryData"]["studentEmail"];
  }
  else
  {
    $emailwithperiod = $_SESSION["queryData"]["email"];
  }
  
  $emailwithcomma = str_replace(".", ",", $emailwithperiod);
  ?>
  
  var email = "<?php echo $emailwithperiod; ?>"
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
        const famTblDiv = document.createElement('div');
        famTblDiv.classList.add('container', 'family-div');
        famTblDiv.style.paddingBottom = '13%';

        firebase.database().ref('users').orderByChild('user_type').equalTo("student").once("value", function(snapshot) 
        {
          var student_data = Object.entries(snapshot.val());

          let group_num = "";

          if(user_type == "student")
          {
            group_num = get_user_num(student_data, email, "family");
          }
          else
          {
            group_num = "<?php echo $_SESSION['queryData']['group_num']; ?>";
          }

          if(group_num != "N/A")
          {
            firebase.database().ref('families').orderByChild('name').equalTo(group_num).once("value", function(snapshot) 
            {
              var family = Object.entries(snapshot.val());

              // Creates arrays of male and female student objects.
              if(family[0][1].size > 0)
              {
                var male_students = [];
                var female_students = [];
                
                for(let j = 0; j < student_data.length; j++)
                {
                  if(student_data[j][1].group_num == group_num)
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
                switch(user_type)
                {
                  case "counselor": createTable(family[0][1].max_size, 2, group_num, "family", family[0][1].counselor, male_students, female_students, "counselor", false, true, famTblDiv);
                    break;
                  case "student": createTable(family[0][1].max_size, 2, group_num, "family", family[0][1].counselor, male_students, female_students, "student", false, true, famTblDiv);
                }
              }
              else
              {
                const message = document.createElement('p');
                
                if(user_type == "counselor")
                {
                  message.appendChild(document.createTextNode("You do not have any students yet."));
                }
                
                famTblDiv.appendChild(message);
              }
            });
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
                message.appendChild(document.createTextNode("You have not joined a family yet."));
              }
              
              famTblDiv.appendChild(message);
          }
      });

      document.getElementById("Family").appendChild(famTblDiv);
      </script>
    </div>

    <div id="Bus" class="tabcontent">
      <script> 
        const busTblDiv = document.createElement('div');
        busTblDiv.classList.add('container', 'bus-div');
        busTblDiv.style.paddingBottom = '13%';
        
        firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot) 
        {
          var student_data = Object.entries(snapshot.val());

          let bus_num = "";

          if(user_type == "student")
          {
            bus_num = get_user_num(student_data, email, "bus");
          }
          else
          {
            bus_num = "<?php echo $_SESSION['queryData']['bus_num']; ?>";
          }

          if(bus_num != "N/A")
          {
            firebase.database().ref('buses').orderByChild('name').equalTo(bus_num).once("value", function(snapshot) 
            {
              var bus = Object.entries(snapshot.val());            

              if(bus[0][1].size > 0)
              {
                var students = [];
                
                for(let j = 0; j < student_data.length; j++)
                {
                  if(student_data[j][1].bus_num == bus_num)
                  {
                    students.push(student_data[j][1]);
                  }          
                }

                switch(user_type)
                {
                  case "counselor": createTable(bus[0][1].max_size, 2, bus_num, "bus", bus[0][1].counselor, students, [], "counselor", false, false, busTblDiv);
                    break;
                  case "student": createTable(bus[0][1].max_size, 2, bus_num, "bus", bus[0][1].counselor, students, [], "student", false, false, busTblDiv);
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
                  message.appendChild(document.createTextNode("You have not selected a bus yet."));
                }
                busTblDiv.appendChild(message);
              }
            });
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
                message.appendChild(document.createTextNode("You have not selected a bus yet."));
              }
              
              busTblDiv.appendChild(message);
          }
        });

        document.getElementById("Bus").appendChild(busTblDiv);
      </script>
    </div>

    <div id="Cabin" class="tabcontent">
      <script>
        const cabinTblDiv = document.createElement('div');
        cabinTblDiv.classList.add('container', 'cabin-div');
        cabinTblDiv.style.paddingBottom = '13%';
        
        firebase.database().ref('users').orderByChild('user_type').equalTo('student').once("value", function(snapshot) 
        {
          var student_data = Object.entries(snapshot.val());

          let cabin_num = "";

          if(user_type == "student")
          {
            cabin_num = get_user_num(student_data, email, "cabin");
          }
          else
          {
            cabin_num = "<?php echo $_SESSION['queryData']['cabin_num']; ?>";
          }

          if(cabin_num != "N/A")
          {
            firebase.database().ref('cabins').orderByChild('name').equalTo(cabin_num).once("value", function(snapshot) 
            {
              var cabin = Object.entries(snapshot.val());

              if(cabin[0][1].size > 0)
              {
                var students = [];
                
                for(let j = 0; j < student_data.length; j++)
                {
                  if(student_data[j][1].cabin_num == cabin_num)
                  {
                    students.push(student_data[j][1]);
                  }          
                }

                switch(user_type)
                {
                  case "counselor": createTable(cabin[0][1].max_size, 2, cabin_num, "cabin", cabin[0][1].counselor, students, [], "counselor", false, false, cabinTblDiv);
                    break;
                  case "student": createTable(cabin[0][1].max_size, 2, cabin_num, "cabin", cabin[0][1].counselor, students, [], "student", false, false, cabinTblDiv);
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
                  message.appendChild(document.createTextNode("You have not selected a cabin."));
                }
                cabinTblDiv.appendChild(message);
              }
            });
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
                message.appendChild(document.createTextNode("You have not selected a cabin yet."));
              }
              
              cabinTblDiv.appendChild(message);
          }
        });

        document.getElementById("Cabin").appendChild(cabinTblDiv);
      </script>
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

<script>
// Used to get the current user's family, cabin, or bus number
function get_user_num(student_data, email, data_type)
{
    let i = 0;

    let return_val = "";

    while(student_data[i][1].studentEmail != email)
    {
      i++;
    }

    switch(data_type)
    {
      case "family": return_val = student_data[i][1].group_num;
        break;
      case "cabin": return_val = student_data[i][1].cabin_num;
        break;
      case "bus": return_val = student_data[i][1].bus_num;
    }

  return return_val;
}
</script>