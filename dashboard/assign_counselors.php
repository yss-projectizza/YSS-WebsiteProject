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
    <title>Assign Counselors | Youth Spiritual Summit</title>
      
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

  <body style="background-color:rgb(233, 231, 231)"> 
    <?php include('../header_loggedin.php') ?>
    <div class="container">
        <h1 style="text-align:center; font-size:50px;padding-top: 2%;">Assign Counselors</h1>
        <br>
        <p> Assign the counselors</p>
        <hr/>
        <div style="text-align:center">
            <!-- <div class="dropdown">
                <button id="toggle-group-type" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Group Type:
                </button>
                FOR REFERENCE DELETE LATER
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" id="family-option" onclick="displayGroups('families')">Families</a>
                    <a class="dropdown-item" id="cabin-option" onclick="displayGroups('cabins')">Cabins</a>
                    <a class="dropdown-item" id="bus-option" onclick="displayGroups('buses')">Buses</a> -->
                <!-- </div>
            </div> -->
        </div>
        
        <div class="container" id="group-list" style="text-align:center; margin-bottom:13%">
            <div class='card rounded' id="table-card" style='margin-top: 20px'>
                <table class="manage-groups-table">
                    <tr id="heading-row"></tr>
                    <tbody id="group-table-body"></tbody>
                </table>
                <div id="add-btn" class="container" style="margin:1%">
                </div>
            </div>
        </div>
    </div>
  </body>

  </body>
</html>

<script>
    displayCounselors();

    function displayCounselors()
    {
        firebase.database().ref('users').orderByChild('user_type').equalTo('counselor').once("value", function(snapshot)
    {
        let counselors = Object.entries(snapshot.val());

        let heading_html = "<th>Counselor Name</th><th>Family</th><th>Cabin</th><th>Bus</th> <th> </th>";

        document.getElementById("heading-row").innerHTML = heading_html;

        let table_rows = "<tr>";


        for (let i = 0; i < counselors.length; ++i)
        {
            let counselor_name = counselors[i][1].first_name + " " + counselors[i][1].last_name;
            table_rows += `<td id='name-` + i +`'><div id="name-div-` + i +`" class='rounded name-cell'>${counselor_name}</div></td>
                         <td id='size-` + i + `'>
                         <div class="dropdown">
        <button id="toggle-families-` + i +`"  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Families:
        </button>
        <div class="dropdown-menu" id = 'family-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                         <td id='max-size-` + i + `'>
                         <div class="dropdown">
        <button id="toggle-cabins-` + i + `" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cabins:
        </button>
        <div class="dropdown-menu" id = 'cabin-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                         <td id='max-size-` + i + `'>
                         <div class="dropdown">
        <button id="toggle-buses-` + i + `" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Buses:
        </button>
        <div class="dropdown-menu" id = 'bus-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>
        <td><button id = "submit-` + i + `" onclick = "temp_alert('${i}')">Submit</button></td>`;

            table_rows += "</tr><tr>";
            group_dropdown("families", i);
            group_dropdown("cabins", i);
            group_dropdown("buses", i);
        }
        document.getElementById("group-table-body").innerHTML = table_rows;
    });
    }

    function group_dropdown(type, index)
    {
        firebase.database().ref(type).once("value", function(snapshot)
        {
            let groups = Object.entries(snapshot.val());
            let group_names = "";

            for (let i = 0; i < groups.length; ++i)
            {
                group_names += `<a class="dropdown-item" onclick = "update_dropdown_value('${type}','${groups[i][1].name}', ${index})">${groups[i][1].name} </a>`;
            }
            
            switch(type)
            {
                case 'families': document.getElementById("family-dropdown-" + index).innerHTML = group_names;
                    break;
                
                case 'cabins': document.getElementById("cabin-dropdown-" + index).innerHTML = group_names;
                    break;

                case 'buses': document.getElementById("bus-dropdown-" + index).innerHTML = group_names;

            }
        });
    }

    function update_dropdown_value(type, name, index)
    {
        switch(type)
            {
                case 'families': document.getElementById("toggle-families-" + index).innerHTML = name;
                    break;
                
                case 'cabins': document.getElementById("toggle-cabins-" + index).innerHTML = name;
                    break;

                case 'buses': document.getElementById("toggle-buses-" + index).innerHTML = name;

            }
    }

    function temp_alert(index)
    {
        alert(document.getElementById("toggle-families-" + index).innerHTML);
        alert(document.getElementById("toggle-cabins-" + index).innerHTML);
        alert(document.getElementById("toggle-buses-" + index).innerHTML);
    }

</script>
