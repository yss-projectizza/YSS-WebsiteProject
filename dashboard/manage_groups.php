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

  <body style="background-color:rgb(233, 231, 231)"> 
    <?php include('../header_loggedin.php') ?>

    <div class="container">
        <!-- Dashboard Title Registration Header -->
        <h1 style="text-align:center; font-size:50px;padding-top: 2%;">Manage Groups</h1>
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
            <div class='card rounded' id="table-card" style='margin-top: 20px; display:none'>
            <table class="manage-groups-table">
                <tr id="heading-row"></tr>
                <tbody id="group-table-body"></tbody>
            </table>
            </div>
        </div>
    </div>
  </body>
</html>

<script>
function displayGroups(type)
{
    document.getElementById("table-card").style.display = 'block';
    document.getElementById("table-card").style.border = '1px solid black';

    firebase.database().ref(type).once("value", function(snapshot)
    {
        let items = Object.entries(snapshot.val());

        let heading_html = "<th>Name</th>"+"<th>Current Size</th>"+"<th>Max Capacity</th>";

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
        
        let body_html = "<tr>";
        
        for(let i = 0; i < items.length; i++)
        {
            body_html += "<td><div class='rounded name-cell'>" + items[i][1].name + "</div></td>"+
                         "<td>" + items[i][1].size + "</td>"+
                         "<td>" + items[i][1].max_size + "</td>";

            if(type == 'families')
            {
                body_html += "<td>" + items[i][1].grade_level + "</td>";
            }
            else if(type == 'cabins')
            {
                body_html += "<td>" + items[i][1].gender + "</td>";
            }
            
            body_html += "<td>" + get_counselors(items[i][1].counselor) + "</td>";
            
            body_html += "</tr>";
        }

        document.getElementById("group-table-body").innerHTML = body_html;
    });
}

function get_counselors(counselor_list)
{
    let counselors = "";

    if(counselor_list == "N/A")
    {
        counselors += "TBD";
    }
    else
    {
        if(counselor_list.includes(","))
        {
            counselor_list = counselor_list.split(",");
            
            for(let i = 0; i < counselor_list.length; i++)
            {
                if(i != counselor_list.length - 1)
                {
                    counselors += counselor_list[i] + ((counselor_list.length > 2) ? ", " : " ");
                }
                else
                {
                    counselors += "& " + counselor_list[i];
                }
            }
        }
        else
        {
            counselors += counselor_list;
        }
    }

    return counselors;
}
</script>
