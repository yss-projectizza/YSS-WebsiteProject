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
    <title>All User Information | Youth Spiritual Summit</title>
      
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
        <h1 style="text-align:center; font-size:50px;padding-top: 2%;">All User Information</h1>
        <br>
        <p> View and edit information for all users.</p>
        <hr/>
        <div style="text-align:center">
        </div>

        <div style="text-align:center">
            <div class="dropdown">
                <button id="toggle-group-type" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Type:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" id="counselor-option" onclick="displayUsers('counselor')">Counselors</a>
                    <a class="dropdown-item" id="student-option" onclick="displayUsers('student')">Students</a>
                    <a class="dropdown-item" id="parent-option" onclick="displayUsers('parent')">Parents</a>
                </div>
            </div>
        </div>
        
        <div class="container" id="user-list" style="text-align:center; margin-bottom:13%;display:none">
            <div class='card rounded' id="table-card" style='margin-top: 20px'>
                <table class="manage-groups-table">
                    <tr id="heading-row"></tr>
                    <tbody id="user-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>

<script>
function displayUsers(user_type)
{
    document.getElementById("user-list").style.display = 'block';

    firebase.database().ref('users').orderByChild('user_type').equalTo(user_type).once("value", function(snapshot)
    {
        let heading_html = "<th>Name</th>";

        let users = Object.entries(snapshot.val());
        
        if(user_type == "counselor" || user_type == "student")
        {
            heading_html += "<th>Family</th><th>Cabin</th><th>Bus</th>";
        }
        else
        {
            heading_html += "<th>Credit</th><th>Image</th>";
        }

        if(user_type == "counselor" || user_type == "parent")
        {
            heading_html += "<th>Verified</th>";
        }

        // empty cell for edit button
        heading_html += "<th> </th>";

        let table_rows = "";

        if(user_type == "counselor" || user_type == "student")
        {
            for(let i = 0; i < users.length; i++)
            {
                table_rows += "<tr>";

                let name = users[i][1].first_name + " " + users[i][1].last_name;
                let key = users[i][0];

                table_rows += `<td id='name-` + i +`'><div id="name-div-` + i +`" class='rounded name-cell'>${name}</div></td>
                            <td id='size-` + i + `'>
                            <div class="dropdown">
                                <button id="toggle-families-` + i +`"  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">`;
                
                if(users[i][1].group_num != "N/A")
                {
                    table_rows += users[i][1].group_num;
                }
                else
                {
                    table_rows += "Families:";
                }
                
                // Creates dropdown of group names
                table_rows += `</button>
                    <div class="dropdown-menu" id = 'family-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                                        <td id='max-size-` + i + `'>
                                        <div class="dropdown">
                    <button id="toggle-cabins-` + i + `" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">`;

                if(users[i][1].cabin_num != "N/A")
                {
                    table_rows += users[i][1].cabin_num;
                }
                else
                {
                    table_rows += "Cabins:";
                }
                    
                table_rows += `</button>
                    <div class="dropdown-menu" id = 'cabin-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                                        <td id='max-size-` + i + `'>
                                        <div class="dropdown">
                    <button id="toggle-buses-` + i + `" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">`;
                
                    if(users[i][1].bus_num != "N/A")
                {
                    table_rows += users[i][1].bus_num;
                }
                else
                {
                    table_rows += "Buses:";
                }
                    
                table_rows += `</button>
                    <div class="dropdown-menu" id = 'bus-dropdown-` + i + `' aria-labelledby="dropdownMenuButton"></div></div></td>
                    <td><button class="rounded" id = "submit-` + i + `" onclick = "submit_changes('${key}', '${i}')">Submit</button></td>`;

                table_rows += "</tr>";

                if(user_type != "student")
                {
                    group_dropdown("families", i);
                }
                else
                {
                    group_dropdown("families", i, users[i][1].year, "", user_type);
                }

                group_dropdown("cabins", i, "", users[i][1].gender);
                group_dropdown("buses", i,);
            }
        }
        else // for parents
        {
            for(let i = 0; i < users.length; i++)
            {
                var email = (users[i][1].email).replace(".", ",");
                
                // grabs image from storage
                firebase.storage().ref('dl/' + email).getDownloadURL().then(function (url)
                {
                    let name = users[i][1].first_name + " " + users[i][1].last_name;
                    let key = users[i][0];

                    table_rows += "<tr>";

                    var modal_id = "modal" + i;

                    // Fills in cells for parent table
                    table_rows += `<td>${name}</td><td>${users[i][1].credit_due}</td>
                               <td id = 'authentication-${i}'>
                                    <button class='rounded user-button' onclick="show_authenticaion('${email}', ${i}, '${modal_id}')" 
                                           data-toggle='modal' data-target='#` + modal_id + `'>
                                        Show Authentication
                                    </button>
                                    <div id ='` + modal_id + `' class='modal fade' role='dialog'>
                                            <div class="modal-dialog" style="background-color:white">
                                                <div class="modal-body">
                                                    <button type="button" class="close" style="margin-bottom:15px" data-dismiss="modal">&times;</button>
                                                    <img class="auth-img" src="` + url + `"/>
                                                </div>
                                            </div>
                                        </div>
                                </td>`; 
                    
                    table_rows += "</tr>";
                    
                    document.getElementById("user-table-body").innerHTML = table_rows;
                });
            }
        }

        if(user_type == "counselor" || user_type == "parent")
        {
            
        }

        document.getElementById("heading-row").innerHTML = heading_html;
        document.getElementById("user-table-body").innerHTML = table_rows;
    });
}

function show_authenticaion(email, index, modal_id)
{
    // alert(email);

    
}

function group_dropdown(type, index, grade="", gender="", user_type)
{
    firebase.database().ref(type).once("value", function(snapshot)
    {
        let groups = Object.entries(snapshot.val());
        let group_names = "";

        for (let i = 0; i < groups.length; ++i)
        {
            if(gender == "" && user_type != "student" /* prevents all families from being shown */)
            {
                group_names += `<a class="dropdown-item" onclick="update_dropdown_value('${type}','${groups[i][1].name}', ${index})">${groups[i][1].name} </a>`;
            }
            else
            {
                if(gender == groups[i][1].gender)
                {
                    group_names += `<a class="dropdown-item" onclick="update_dropdown_value('${type}','${groups[i][1].name}', ${index})">${groups[i][1].name} </a>`;
                }
            }

            // shows only families in the student's grade level
            if(user_type == "student")
            {
                if(grade == groups[i][1].grade_level)
                {
                    group_names += `<a class="dropdown-item" onclick="update_dropdown_value('${type}','${groups[i][1].name}', ${index})">${groups[i][1].name} </a>`;
                }
            }
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

</script>