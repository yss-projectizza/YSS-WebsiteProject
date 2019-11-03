<?php
if (!isset($_SESSION))
  session_start();
?>

<script src="https://www.gstatic.com/firebasejs/5.10.0/firebase.js"></script>
<script>
    // Initialize Firebase
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
    <title>Manage Groups | Youth Spiritual Summit</title>
      
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
  </head>
  <body> 
    <?php include('../header_loggedin.php') ?>

    <div class="container">
        <!-- Dashboard Title Registration Header -->
        <h1 align="center" style="font-size:50px;padding-top: 2%;">Manage Groups</h1>
        <br>
        <p> Add or delete families, cabins, and buses.</p>
        <hr/>
        <div style="text-align:center">
            <div class="dropdown">
                <button id="toggle-sort" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Group Type:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" onclick="displayGroups('families')">Families</a>
                    <a class="dropdown-item" onclick="displayGroups('cabins')">Cabins</a>
                    <a class="dropdown-item"onclick="displayGroups('buses')">Buses</a>
                </div>
            </div>
        </div>
        <div class="container" id="group-list" style="text-align:center">
            <table style="table-layout:fixed; width:100%; text-align:center; margin-top:20px">
                <tr id="heading-row">
                    
                </tr>
            </table>
        </div>
    </div>
  </body>
</html>

<script>
function displayGroups(type)
{
    firebase.database().ref(type).once("value", function(snapshot)
    {
        let items = Object.entries(snapshot.val());

        let html = "";
        let heading_html = "<th>Name</th>"+"<th>Current Size</th>"+"<th>Maximum Capacity</th>";

        if(type == 'families')
        {
            heading_html += "<th>Grade Level</th>";
        }
        else if(type == 'cabins')
        {
            heading_html += "<th>Gender</th>";
        }

        heading_html += "<th>Counselors</th>";

        document.getElementById("heading-row").innerHTML = heading_html;


        // for(var i = 0; i < items.length;i++)
        // {
        //     html += "<p>" + items[i][1].name + "</p>";
        // }

        // document.getElementById("group-list").innerHTML = html;
    });
}
</script>
